@extends('layouts.main')
@section('container')
<h2>Hello, {{ auth()->user()->id}}</h2>

                <div class="row justify-content-md-center">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-primary">
                                       <span class="fas fa-box"></span>
                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Stok Tersedia</strong></p>
                                    <h4 class="card-title">{{ $Barang->sum('stok')}}</h4>
                                </div>
                                <!-- <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons text-info">info</i>
                                        <a href="#pablo">See detailed report</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-primary">
                                       <span class="fas fa-box-open"></span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    {{-- <p class="category"><strong>Stok Non Titipan</strong></p> --}}
                                    @foreach ($barangGroup as $item)            
                                        <h5 class="card-title"> <strong>{{$item->total}} {{$item->jenis_barang}}</strong></h5>
                                    @endforeach
                                </div>
                                <!-- <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Product-wise sales
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-primary">
                                       <span class="fas fa-box-open"></span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Stok Terjual</strong></p>
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Product-wise sales
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Rincian barang</h4>
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <a href="/barang/tambah" class="btn btn-outline-primary">Tambah Barang</a>
                                        </div>
                                        <div class="col-md-6 col-sm-6">
                                            <form action="/barang">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="cari barang..." name="search" value="{{ request('search')}}">
                                                    <button class="btn btn-outline-primary" type="submit" id="button-addon2">cari</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                    @if ($Barang->count())

                                <div class="card-content table-responsive">
                                    <table class="table table-hover table-sm">
                                        <tr>
                                            <th>Id</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Jenis Barang</th>
                                            <th>Tanggal</th>
                                            <th>stok</th>
                                            <th>Opsi</th>
                                        </tr>
                                        @foreach($Barang as $barang)
                                        <tr>
                                            <td>{{ $barang["id"] }}</td>
                                            <td>{{ $barang["nama_barang"] }}</td>
                                            <td>{{ $barang["harga_jual"] }}</td>
                                            <td>{{ $barang["jenis_barang"] }}</td>
                                            <td>{{ $barang["tanggal"] }}</td>
                                            <td>{{ $barang->stok}}</td>
                                            <td><a href="/barang/{{$barang->id}}/edit" class="btn btn-success btn-sm me-2">Edit</a><a href="/barang/{{ $barang->id }}/hapus" class="btn btn-danger btn-sm">Hapus</a></td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            @else
                            <p class="text-center mt-3"><strong>Barang tidak ditemukan!</strong></p> 
                            @endif
                        </div>
                      
                        <div class="col-lg-5 col-md-12 col-sm-12">
                            <div class="card" style="min-height: 485px">
                                <div class="card-header card-header-text">
                                    <h4 class="card-title">Activities</h4>
                                </div>
                               
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
    </div>
@endsection