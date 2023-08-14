@extends('layouts.stun')
@section('container')

  <!-- Outer Row -->
  <div class="row justify-content-center mt-5">
      <div class="col-lg-6">
        @if (session()->has('loginError'))
            <div class="alert alert-danger alert-dismissible fade-show" role="alert">
                {{ session('loginError') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
          <div class="card o-hidden border-0 shadow-lg my-5">
              <div class="card-body p-0">
                  <!-- Nested Row within Card Body -->
                  <div class="row"> 
                      <div class="col-lg">
                          <div class="p-5">
                              <div class="text-center">
                                  <h1 class="h4 text-gray-900">BALANCE SHOP</h1>
                                  <p>Please Login</p>
                              </div>
                              <form class="user" action="/login" method="POST">
                                @csrf
                                  <div class="form-group">
                                      <input type="text" class="form-control form-control-user @error('id') is-invalid @enderror" id="id" name="id" placeholder=" masukan id ">
                                      @error('id')
                                          <div class="invalid-feedback">
                                            Masukkan id!
                                          </div>
                                      @enderror
                                  </div>
                                  <br>
                                  <div class="form-group">
                                      <input type="password" class="form-control form-control-user" id="pass" name="password" placeholder="Password">
                                  </div>
                                  <br>
                                 
                                  <button type="submit" class="btn btn-primary">Login</button>
                              </form>
                              <hr>
                              <div class="text-center">
                                  <a class="small" href="">Forgot Password?</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

      </div>

  </div>



@endsection