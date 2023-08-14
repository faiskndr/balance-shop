<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\DanaTersedia;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DanaController extends Controller
{
    public function index()
    {
        return view('dana.index',[
            'title' => 'Dana',
            'Dana' => Pemasukan::all(),
            'DanaTersedia' => DanaTersedia::all(),
            'DanaKeluar' => Pengeluaran::all()
        ]);
    }

    public function create()
    {
        return view('dana.create',[
            'title' => 'Dana Masuk'
        ]);
    }

    public function store(Request $request)
    {
        
        Pemasukan::create($request->except('_token'));
        $dana = DanaTersedia::first();
        $dana->dana_masuk += $request->dana_masuk;
        $dana->save();
        return redirect('/dana');
    }

    public function edit($id)
    {
        return view('dana.edit',[
            'title' => 'Edit Dana',
            'Dana' => Pemasukan::find($id)
        ]);
    }

    public function update($id, Request $request)
    {
      
       $dana = Pemasukan::find($id);
       $dana->update($request->except('_token'));
       return redirect('/dana');
    }

    public function showPengeluaran()
    {
        return view('pengeluaran.create',[
            'title' => 'Pengeluaran',
            'Dana' => Pengeluaran::all()
        ]);
    }

    public function storePengeluaran(Request $request)
    {
        Pengeluaran::create($request->except('_token'));

        $dana = DanaTersedia::first();
        $dana->dana_masuk -= $request->dana_keluar;
        $dana->save();
        return redirect('/dana');
    }
}
