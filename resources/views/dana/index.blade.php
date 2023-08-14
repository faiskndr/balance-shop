@extends('layouts.main')

@section('container')
<div class="content">
<div class="row">
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
                  <p class="card-category">Dana Masuk</p>
                  <p class="card-title">{{ number_format($Dana->sum('dana_masuk'))}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
              <i class="fa fa-refresh"></i>
              <a href="/dana/masuk" style="color: rgba(0, 0, 0, 0.479)">Tambah Dana</a>
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
                  <p class="card-category">Dana Tersedia</p>
                  @foreach ($DanaTersedia as $item)
                  <p class="card-title">{{ number_format($item->dana_masuk)}}<p>
                  @endforeach
                 
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
            {{-- <div class="stats">
              <i class="fa fa-refresh"></i>
              <a href="/dana/masuk" style="color: rgba(0, 0, 0, 0.479)">Tambah Dana</a>
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
                  <i class="nc-icon nc-money-coins text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Dana Keluar</p>
                   <p class="card-title">{{ number_format($DanaKeluar->sum('dana_keluar'))}}<p>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer ">
            <hr>
          
          </div>
        </div>
      </div>
      <div class="col-md-12 col-sm-12">
        <div class="card" style="min-height: 485px">
            <div class="card-header card-header-text">
                <h4 class="card-title">Pemasukan</h4>
                <a href="/dana/masuk" class="btn btn-outline-primary btn-sm">Tambah Pemasukan</a>
            </div>
            <div class="card-content table-responsive">

                <table class="table table-hover">
                    <tr>
                        <th>Id Pemasukan</th>
                        <th>Dana Masuk</th>
                        <th>Sumber Dana</th>
                        <th>Tanggal Masuk</th>
                        
                    </tr>
                    @foreach ($Dana as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->dana_masuk }}</td>
                        <td>{{ $item->sumber_dana }}</td>
                        <td>{{ $item->created_at }}</td>
                        
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
  </div>
</div>
@endsection