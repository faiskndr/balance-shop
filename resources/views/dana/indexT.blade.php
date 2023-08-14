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
                  <i class="nc-icon nc-globe text-warning"></i>
                </div>
              </div>
              <div class="col-7 col-md-8">
                <div class="numbers">
                  <p class="card-category">Dana Masuk</p>
                  <p class="card-title">{{ $Dana->sum('dana_masuk')}}<p>
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
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header">
                                    <div class="icon icon-success">
                                       <span class="material-icons">archive</span>
                                    </div>
                                </div>
                                <div class="card-content">
                                        <p class="category"><strong>Dana Masuk</strong></p>
                                        
                                        <h3 class="card-title">{{ $Dana->sum('dana_masuk') }}</h3>
                                    
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
                                    <div class="icon icon-danger">
                                       <span class="material-icons">unarchive</span>

                                    </div>
                                </div>
                                <div class="card-content">
                                    <p class="category"><strong>Dana Keluar</strong></p>
                                    <h3 class="card-title"></h3>
                                </div>
                                <!-- <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">local_offer</i> Product-wise sales
                                    </div>
                                </div> -->
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
                                              <th>Opsi</th>
                                          </tr>
                                          @foreach ($Dana as $item)
                                          <tr>
                                              <td>{{ $item->id }}</td>
                                              <td>{{ $item->dana_masuk }}</td>
                                              <td>{{ $item->sumber_dana }}</td>
                                              <td>{{ $item->tanggal }}</td>
                                              <td>
                                                <a href="/dana/{{$item->id}}/edit" class="btn btn-success btn-sm me-2">Edit</a>
                                                <a href="/barang/{{ $item->id }}/hapus" class="btn btn-danger btn-sm">Hapus</a>
                                              </td>
                                          </tr>
                                          @endforeach
                                      </table>
                                  </div>
                              </div>
                          </div>
                          <div class="row">
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
</div>
@endsection