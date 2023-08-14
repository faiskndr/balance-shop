@extends('layouts.main')
@section('container')
<div class="content">
<div class="col-md-12 col-sm-12">
  <div class="card" style="min-height: 485px">
      <div class="card-header card-header-text text-center">
        <h4 class="card-title">Pengeluaran</h4>
      </div>
      <div class="card-content col-12">
      {{------ Form Strat ------}}
        <form class="mt-3" action="/pengeluaran/store" method="POST">
          @csrf
          
            <div class="mb-3">
              <label for="dana" class="form-label">Pengeluaran</label>
              <input type="text" class="form-control" id="dana" name="dana_keluar">
            </div>
            <div class="mb-3">
                <label for="sumber" class="form-label">Rincian</label>
                <input type="text" class="form-control" id="sumber" name="rincian">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        {{------- End Form -------}}
      </div>
  </div>
</div>
<div class="card-content table-responsive">

  <table class="table table-hover">
      <tr>
          <th>Id Pemasukan</th>
          <th>Dana Keluar</th>
          <th>Rincian</th>
          <th>Tanggal Keluar</th>
      </tr>
      @foreach ($Dana as $item)
      <tr>
          <td>{{ $item->id }}</td>
          <td>{{ $item->dana_keluar }}</td>
          <td>{{ $item->rincian }}</td>
          <td>{{ $item->created_at }}</td>
      </tr>
      @endforeach
  </table>
</div>
</div>
@endsection