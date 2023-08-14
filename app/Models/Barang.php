<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    // private static $barang =[[
    //     "id" => "1",
    //     "barang" => "Sweater",
    //     "harga" => "320000",
    //     "jenis" => "Casual",
    //     "tanggal" => "2023-01-27",
    //     "stok" => "5"
    // ],
    // [
    //     "id" => "2",
    //     "barang" => "Hodie",
    //     "harga" => "220000",
    //     "jenis" => "Casual",
    //     "tanggal" => "2023-02-20",
    //     "stok" => "2"
    // ]];

    // public static function show(){
    //     return collect(self::$barang);
    // }
    protected $guarded = ['id'];

    public function transaksi(){
        return $this->hasMany(Transaksi::class);
    }

    public function orderProducts()
    {
        return $this->hasMany(OrderProducts::class);
    }
}
