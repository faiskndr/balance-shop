@extends('layouts.main')

@section('container')
<div class="content">
<div class="row">
 <div class="col-md-7 col-sm-12">
  <div class="card" style="min-height: 485px">
    <div class="card-header card-header-text">
    <h4 class="card-title">Mulai Transaksi</h4>
    </div>
      <div class="card-content col-12">
        {{-- <form action="/transaksi">
          <div class="input-group mb-3">
              <input type="text" class="form-control" placeholder="cari barang..." name="search" value="{{ request('search')}}">
              <button class="btn btn-outline-primary" type="submit" id="button-addon2">cari</button>
          </div>
      </form> --}}
      <form action="/transaksi/baru" method="POST">
        @csrf
        <div class="mb-3">
          <label for="jenis" class="form-label">Nama Barang</label>
          <select name="barang_id" id="jenis" class="form-control">
            <option value="">Pilih Barang</option>
            @foreach ($Barang as $item)
              <option value="{{ $item->id }}">{{ $item->nama_barang}}</option>
            @endforeach
          </select>
        </div>
        <div class="mb-3">
          <label for="kuantitas" class="form-label">Kuantitas</label>
          <input type="number" class="form-control" id="kuantitas" name="kuantitas">
        </div>
        {{-- <div class="mb-3">
          <label for="tgl" class="form-label">Tanggal</label>
          <input type="date" class="form-control" id="tgl" name="tanggal">
        </div> --}}
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="/kasir" class="btn btn-primary me-3">Detail Transaksi</a>
      </form>
      </div>
    </div>
  </div>
  <div class="col-lg-5 col-md-12 col-sm-12">
    <div class="card" style="min-height: 485px">
        <div class="card-header ">
            <h4 class="card-title">Total Transaksi</h4>
            @foreach ($TransaksiJoin as $item)
              <div class="card-content">
                <h6>{{ $item->total }}</h6>
              </div>
            @endforeach
        </div>
        
      <div class="card-header">
        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Keuntungan</th>
              <th>Tanggal</th>
            </tr>
            @foreach ($Transaksi as $item)
            <tr>
              <td>{{ ($item->barang->harga_jual - $item->barang->harga_beli) * $item->kuantitas}}</td>
              <td>{{ $item->tanggal }}</td>
              {{-- <h6>{{ $item->barang->sum( 'harga_jual')}}</h6> --}}
            </tr>
            
            @endforeach
          </table>
        </div>
      </div>
      </div>
    </div>
</div>
  <div class="col-lg-12">
    <div class="card">
      <div class="table-responsive">
        <table class="table table-hover ">
          <tr>
              <th>Id</th>
              <th>Id Barang</th>
              <th>Nama Barang</th>
              <th>Harga</th>
              <th>Jenis Barang</th>
              <th>Tanggal</th>
              <th>Kuantitas</th>
          </tr>
        @foreach ($Transaksi as $item)
          <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->barang->id }}</td>
            <td>{{ $item->barang->nama_barang }}</td>
            <td>{{ $item->barang->harga_jual * $item->kuantitas  }}</td>
            <td>{{ $item->barang->jenis_barang }}</td>
            <td>{{ $item->tanggal }}</td>
            <td>{{ $item->kuantitas }}</td>
          </tr>  
          @endforeach
          
          {{-- @foreach ($Transaksi as $item)
          <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->nama_barang}}</td>    
            <td></td>
              
          </tr>
          @endforeach --}}
        </table>
        
      </div>
    </div>
  </div>
</div>  
@endsection