@extends('layouts.main')
@section('container')

<div class="col-md-12 col-sm-12">
  <div class="card" style="min-height: 485px">
      <div class="card-header card-header-text text-center">
        <h4 class="card-title">Dana Masuk</h4>
      </div>
      <div class="card-content col-12">
      {{------ Form Strat ------}}
        <form class="mt-3" action="/dana/{{$Dana->id}}" method="POST">
          @method('put')
          @csrf
            <div class="mb-3">
              <label for="dana" class="form-label">Dana Masuk</label>
              <input type="text" class="form-control" id="dana" name="dana_masuk" value="{{ $Dana->dana_masuk}}">
            </div>
            <div class="mb-3">
                <label for="sumber" class="form-label">Sumber Dana</label>
                <input type="text" class="form-control" id="sumber" name="sumber_dana" value="{{ $Dana->sumber_dana }}">
            </div>
            
              <div class="mb-3">
                <label for="tgl" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="tgl" name="tanggal" value="{{ $Dana->tanggal }}">
              </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        {{------- End Form -------}}
      </div>
  </div>
</div>
@endsection