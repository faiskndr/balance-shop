{{-- @include('livewire.staff.create') --}}
<div class="content">    
    <div class="row">
        <div class="col-md-12">
            @if (session()->has('msg'))
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
          @endif
          <div class="card ">
            <div class="card-header ">
              <h5 class="card-title">Daftar Anggota</h5>
              <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modalCreate">Tambah</button>
            </div>
            <div class="card-body ">
              <div class="card-content table-responsive">
                  <table class="table table-hover table-sm">
                      <tr>
                          <th>Id</th>
                          <th>Nama</th>
                          <th>Jabatan</th>
                      </tr>
                      @foreach ($user as $item)
                      <tr>
                          <td>{{$item->id}}</td>
                          <td>{{ $item->name}}</td>
                          <td>{{ $item->role->role}}</td>
                      </tr>
                      @endforeach
                  </table>
              </div>
            </div>
            <div class="card-footer ">
              <hr>
              <div class="stats">
                
              </div>
            </div>
            
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div wire:ignore.self class="modal fade" id="modalCreate" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fs-5" id="exampleModalLabel">+staff</h5>
            </div>
            <div class="modal-body">
              <form class="" wire:submit.prevent="submit">
                <div class="row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" wire:model="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="colFormLabel" class="col-sm-2 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control"  wire:model="password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                  </div>
                </div>
                
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="specificSizeSelect">Jabatan</label>
                  <div class="col-sm-10">
                  <select class="form-select form-control" id="specificSizeSelect" wire:model="role">
                    <option selected>Choose...</option>
                    <option value="1">Admin</option>
                    <option value="2">Staff</option>
                  </select>
                  @error('role') <span class="error">{{ $message }}</span> @enderror
                </div>
                </div>
                
              
              
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">submit</button>
            </div>
          </form>
          </div>
        </div>
      </div>


</div>


