<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function show(){

        $barang = Barang::latest();
     

        if (request('search')) {
            $barang->where('nama_barang', 'like', '%'.request('search'). '%');
        }

        $group = DB::table('barangs')
                ->select(DB::raw('sum(stok) AS total'), 'jenis_barang')
                ->groupBy('jenis_barang')
                ->get();

        return view('barang.index',[
            'title' => 'Barang',
            'Barang' =>$barang->get() ,
            'barangGroup' => $group
        ]);
    }

    public function edit($id){
        return view('barang.edit',[
            'title' => 'Edit Barang',
            'Barang' => Barang::find($id)
        ]);
    }

   

    public function create()
    {
        return view('barang.create',[
            'title' => 'Tambah Barang'
        ]);
    }

    public function store(Request $request)
    {
        Barang::create($request->except('_token'));
        return redirect('/barang');
    }

    public function update($id, Request $request)
    {
       $barang = Barang::find($id);
       $barang->update($request->except('_token'));
       return redirect('/barang');
    }

    public function remove($id)
    {
        $barang = Barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}
