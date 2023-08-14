@extends('layouts.main')
@section('container')

<div class="content">    
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header">
            <div class="row ">
            <h5 class="card-title col-sm-9">Tabel Transaksi</h5>
            
            {{-- <form class="d-flex col-sm-3" action="/barang">
                <div class="input-group no-border">
                  <input type="text" value="{{ request('search')}}" class="form-control" name="search" placeholder="Search...">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <button class="nc-icon nc-zoom-split" type="submit"></button>
                      <i class="nc-icon nc-zoom-split"></i>
                    </div>
                  </div>
                </div>
              </form> --}}
            </div>
          </div>
          <div class="card-body ">
            <div class="card-content table-responsive">
                <table class="table table-hover table-sm">
                    <tr>
                        <th>Id</th>
                        <th>Kode Order</th>
                        <th>Total</th>
                        <th>Tanggal</th>
                        <th>Detail</th>
                    </tr>
                    @foreach($Order as $item)
                    <tr>
                        <td>{{ $item->id}}</td>
                        <td>{{ $item->no_order }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalDetail{{ $item->id }}">Detail</button></td>
                    </tr>
                    @endforeach
                </table>
    
          {{-- <i class="fa fa-history"></i>last update {{$barang->latest()}} --}}
      </div>
    </div>
    @foreach($Order as $item)
    <div class="modal fade" id="modalDetail{{$item->id}}">
      <div class="modal-dialog modal-lg">
          <div class="modal-content">
              <div class="modal-body">
                <table class="table table-hover table-sm">
                  <tr>
                    <th>Id Order</th>
                    <th>Nama Barang</th>
                    <th>Harga Satuan</th>
                    <th>Qty</th>
                    <th>Sub Total</th>
                  </tr>
                  @foreach ($item->productOrder as $productOrder)
                  <tr>
                  </tr>
                  <tr>
                      <td>{{$productOrder->order_id}}</td>
                      <td>{{$productOrder->barang->nama_barang}}</td>
                      <td>{{$productOrder->barang->harga_jual}}</td>
                      <td>{{$productOrder->kuantitas}}</td>
                      <td>{{$productOrder->total}}</td>
                      
                  @endforeach
                          
                  </tr>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <th>Total</th>
                    <td>{{ $item->total }}</td>
                  </tr>
              </table>
                
              </div>
              <div class="modal-footer">
                  
              </div>
          </div>
      </div>
    </div>
    @endforeach          
      
        </div>
      </div>
    </div>
   
   
@endsection