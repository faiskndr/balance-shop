<?php

namespace App\Http\Livewire\Kasir;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Transaksi;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\Pemasukan;
use App\Models\DanaTersedia;

class Index extends Component
{
    public $barang_id;
    public $bayar;
    

    protected $rules =[
        'barang_id' => 'required|unique:transaksis'
    ];

    public function submit()
    {
        $this->validate();
        $transaksi = Transaksi::create([
            'barang_id' => $this->barang_id,
            'kuantitas' => 1
        ]);
        
        $transaksi->total = $transaksi->barang->harga_jual;
        $transaksi->save();

        session()->flash('msg', 'Data berhasil ditambah!');
    }

    public function increment($id)
    {
        $transaksi = Transaksi::find($id);
        if($transaksi->kuantitas >= $transaksi->barang->stok){
            return false;
        }
        $transaksi->update([
            'kuantitas' => $transaksi->kuantitas+1,
            'total' => $transaksi->barang->harga_jual *($transaksi->kuantitas+1)
        ]);
    }

    public function decrement($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'kuantitas' => $transaksi->kuantitas-1,
            'total' => $transaksi->barang->harga_jual *($transaksi->kuantitas-1)
        ]);
    }

    public function delete($id)
    {
       $transaksi = Transaksi::find($id);
       $transaksi->delete();
    }

    public function store()
    {
        $order = Order::create([
            'no_order' => 'OD-'.date('Ymd').rand(111,999),
            'total' => Transaksi::sum('total')
        ]);

        $transaksi = Transaksi::get();
        foreach ($transaksi as $item) {
            $barang = array([
                'order_id' => $order->id,
                'barang_id' => $item->barang_id,
                'kuantitas' => $item->kuantitas,
                'total' => $item->total,
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now()
            ]);
            
            $orderBarang = OrderProducts::insert($barang);
            $hapusTransaksi = Transaksi::where('id', $item->id)->delete();
            $stokBarang = Barang::find($item->barang_id);
            $stokBarang->stok -= $item->kuantitas;
            $stokBarang->save();
            if($item->count('id') > 1){
                $keuntungan = ($item->total - $item->barang->harga_beli) * $item->kuantitas;
                
            }
            $keuntungan = $item->total - $item->barang->harga_beli * $item->kuantitas;
           
            $pemasukan = Pemasukan::insert([
                'order_id' => $order->id,
                'dana_masuk' => $keuntungan,
                'sumber_dana' => 'Keuntungan Transaksi',
                'created_at' => \Carbon\carbon::now(),
                'updated_at' => \Carbon\carbon::now()
            ]);
            $dana = DanaTersedia::first();
            if(!$dana){
                $dana =DanaTersedia::insert([
                    'dana_masuk' => $keuntungan
                ]);
            }else {
                $dana->dana_masuk += $keuntungan;
                $dana->save();
            }

            
         }

        
    }


    public function render()
    {
        return view('livewire.kasir.index',[
            'Barang' => Barang::orderBY('nama_barang','asc')->where('stok','>', 0)->get(),
            'Transaksi' => Transaksi::get()
        ]);
    }
}
