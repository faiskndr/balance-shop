<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Barang;
use App\Models\Order;
use App\Models\OrderProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public $harga;
    public function index()
    {
       


        $transaksi = DB::table('transaksis')
                    ->join('barangs','transaksis.barang_id', '=','barangs.id')
                    ->select('transaksis.id','barangs.nama_barang', DB::raw('sum(barangs.harga_jual * transaksis.kuantitas) AS total'))
                    ->get();

        
        return view('transaksi.index',[
                    'title' => 'Transaksi',
                    'TransaksiJoin' => $transaksi,
                    'Transaksi' => Transaksi::all(),
                    'Barang' => Barang::all()
                ]);
    }

    public function daftarTransaksi()
    {
        return view('transaksi.daftar',[
                    'title' => 'Daftar Transaksi',
                    'Order' => Order::all(),
                    
        ]);
    }

    public function store(Request $request)
    {
       

        // if ($request->kuantitas > Barang::find($request->barang_id)->stok) {
        //     return "stok tidak cukup";
        // }

        Transaksi::create($request->except('_token'));

        $barang = Barang::find($request->barang_id);
        
        $barang->stok -= $request->kuantitas;
        $barang->save();
        // $barangKeluar = DB::table('barangs')
        //                 ->join('transaksis', 'barangs.id','=', 'transaksis.barang_id')
        //                 ->update(['barangs.stok' => "barangs.stok - transaksis.kuantitas"]);
        return redirect('/transaksi');
    }
}
