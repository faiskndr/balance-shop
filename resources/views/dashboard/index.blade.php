@extends('layouts.main')
@section('container')

<div class="content">
    <h2>Hello, {{ auth()->user()->name}}</h2>
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-box text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Stok Tersedia</p>
                  <p class="card-title">{{ $Barang->sum('stok')}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
              <i class="fa fa-refresh"></i>
              <a href="/barang/tambah" style="color: rgba(0, 0, 0, 0.479)">Tambah Barang</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-box text-primary"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                    @foreach ($barangGroup as $item)            
                            <p class="card-category">{{$item->total}} {{$item->jenis_barang}}</p>
                    @endforeach
                  {{-- <p class="card-category">Revenue</p>
                  <p class="card-title">$ 1,345<p> --}}
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
              <i class="fa fa-calendar-o"></i>
              Last day
            </div> --}}
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card card-stats">
          <div class="card-body ">
            <div class="row">
              <div class="col-5 col-md-4">
                <div class="icon-big text-center icon-warning">
                  <i class="nc-icon nc-money-coins text-success"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Pemasukan</p>
                  <p class="card-title">{{ number_format($Dana->sum('dana_masuk'))}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
              {{-- <div class="stats">
                <i class="fa fa-clock-o"></i>
                In the last hour
              </div> --}}
          </div>
        </div>
      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">Tabel Barang</h5>
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
                        <td><a href="/barang/{{$barang->id}}/edit" class="btn btn-success btn-sm me-2">Edit</a><a href="/barang/{{ $barang->id }}/hapus" class="btn btn-danger btn-sm">Hapus</a></td>
                    </tr>
                    @endforeach
                </table>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            <div class="stats">
                
              {{-- <i class="fa fa-history"></i>last update {{$Barang->last('updated_at')->get()}} --}}
           
            </div>
          </div>
          
        </div>
      </div>
    </div>
    {{-- <div class="row">
      <div class="col-md-4">
        <div class="card ">
          <div class="card-header ">
            <h5 class="card-title">Email Statistics</h5>
            <p class="card-category">Last Campaign Performance</p>
          </div>
          <div class="card-body ">
            <canvas id="chartEmail"></canvas>
          </div>
          <div class="card-footer ">
            <div class="legend">
              <i class="fa fa-circle text-primary"></i> Opened
              <i class="fa fa-circle text-warning"></i> Read
              <i class="fa fa-circle text-danger"></i> Deleted
              <i class="fa fa-circle text-gray"></i> Unopened
            </div>
            <hr>
            <div class="stats">
              <i class="fa fa-calendar"></i> Number of emails sent
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card card-chart">
          <div class="card-header">
            <h5 class="card-title">NASDAQ: AAPL</h5>
            <p class="card-category">Line Chart with Points</p>
          </div>
          <div class="card-body">
            <canvas id="speedChart" width="400" height="100"></canvas>
          </div>
          <div class="card-footer">
            <div class="chart-legend">
              <i class="fa fa-circle text-info"></i> Tesla Model S
              <i class="fa fa-circle text-warning"></i> BMW 5 Series
            </div>
            <hr />
            <div class="card-stats">
              <i class="fa fa-check"></i> Data information certified
            </div>
          </div>
        </div>
      </div>
    </div> --}}
  </div>
                
@endsection