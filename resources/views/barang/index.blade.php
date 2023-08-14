@extends('layouts.main')
@section('container')

<div class="content">    
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <div class="row ">
            <h5 class="card-title col-sm-9">Tabel Barang</h5>
            
            <form class="d-flex col-sm-3" action="/barang">
                <div class="input-group no-border">
                  <input type="text" value="{{ request('search')}}" class="form-control" name="search" placeholder="Search...">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <button class="nc-icon nc-zoom-split" type="submit"></button>
                      {{-- <i class="nc-icon nc-zoom-split"></i> --}}
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="card-body ">
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
                        <td><a href="/barang/{{$barang->id}}/edit" class="btn btn-success btn-sm me-2">Edit</a><button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalDelItem{{ $barang->id }}">Hapus</button></td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">

                @foreach($Barang as $barang)
                {{-- <i class="fa fa-history"></i>last update {{$barang->latest()}} --}}
            </div>
          </div>
          <div class="modal fade" id="modalDelItem{{$barang->id}}">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <h6 class="text-center">Delete
                            <span>{{ $barang->nama_barang}} ?</span>
                        </h6>
                    </div>
                    <div class="modal-footer">
                        <a href="/barang/{{ $barang->id }}/hapus" class="btn btn-danger btn-sm">Hapus</a>
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    

                
@endsection