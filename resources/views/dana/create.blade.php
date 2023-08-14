@extends('layouts.main')
@section('container')
<div class="content">
<div class="col-md-12 col-sm-12">
  <div class="card" style="min-height: 485px">
      <div class="card-header card-header-text text-center">
        <h4 class="card-title">Dana Masuk</h4>
      </div>
      <div class="card-content col-12">
      {{------ Form Strat ------}}
        <form class="mt-3" action="/dana/masuk/simpan" method="POST">
          @csrf
          
            <div class="mb-3">
              <label for="dana" class="form-label">Dana Masuk</label>
              <input type="text" class="form-control" id="dana" name="dana_masuk">
            </div>
            <div class="mb-3">
                <label for="sumber" class="form-label">Sumber Dana</label>
                <input type="text" class="form-control" id="sumber" name="sumber_dana">
            </div>
          
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        {{------- End Form -------}}
      </div>
  </div>
</div>
</div>
@endsection