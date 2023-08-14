@extends('layouts.main')
@section('container')
<div class="content">
<div class="col-md-12 col-sm-12">
  <div class="card" style="min-height: 485px">
      <div class="card-header card-header-text text-center">
        <h4 class="card-title">Tambah Data Barang</h4>
      </div>
      <div class="card-content col-12">
      {{------ Form Strat ------}}
        <form class="mt-3" action="/barang/simpan" method="POST">
          @csrf
          <div class="">
            <div class="mb-3">
              <label for="namba" class="form-label">Nama Barang</label>
              <input type="text" class="form-control" id="namba" name="nama_barang">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga Beli</label>
                <input type="text" class="form-control" id="harga" name="harga_beli">
            </div>
            <div class="mb-3">
              <label for="harga_jual" class="form-label">Harga Jual</label>
              <input type="text" class="form-control" id="harga_jual" name="harga_jual">
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis Barang</label>
                <select name="jenis_barang" id="jenis" class="form-control">
                  <option value="">Pilih Kategori</option>
                  <option value="titipan">Titipan</option>
                  <option value="non titipan">Non Titipan</option>
                </select>
              </div>
              {{-- <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tgl" name="tanggal">
              </div> --}}
              <div class="mb-3">
                <label for="kts" class="form-label">Kuantitas</label>
                <input type="number" class="form-control" id="kts" name="stok">
              </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        {{------- End Form -------}}
      </div>
  </div>
</div>
</div>
@endsection