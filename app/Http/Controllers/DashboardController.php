<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){

        $barang = Barang::latest();

        if (request('search')) {
            $barang->where('nama_barang', 'like', '%'.request('search'). '%');
        }

        $group = DB::table('barangs')
                ->select(DB::raw('sum(stok) AS total'), 'jenis_barang')
                ->groupBy('jenis_barang')
                ->get();

        return view('dashboard.index',[
            'title' => 'Dashboard',
            'Barang' =>$barang->get() ,
            'barangGroup' => $group,
            'Dana' => Pemasukan::all()
        ]);
    }
}
