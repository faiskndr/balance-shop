
    {{-- The Master doesn't talk, he acts. --}}
   
        <div class="row">
         <div class="col-md-12 col-sm-12">
          <div class="card" style="min-height: 485px">
            <div class="card-header card-header-text">
                <h4 class="card-title">Mulai Transaksi</h4>
            </div>
              <div class="card-content col-12">
              <form wire:submit.prevent="submit">
                <div class="mb-3">
                  <label for="jenis" class="form-label">Nama Barang</label>
                  <select name="barang_id" id="jenis" class="form-control" wire:model="barang_id">
                    <option value="">Pilih Barang</option>
                    @foreach ($Barang as $item)
                      <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                    @endforeach
                  </select>
                  @error('barang_id')
                        <span class="error">{{ $message }}</span>
                    @enderror
                  <button type="submit" class="btn btn-primary float-right">Submit</button>
                </div>
                {{-- <div class="mb-3">
                  <label for="kuantitas" class="form-label">Kuantitas</label>
                  <input type="number" class="form-control" id="kuantitas" name="kuantitas">
                </div> --}}
              </form>
              </div>
              @if (session()->has('msg'))
                <div class="alert alert-success">
                    {{session('msg')}}
                </div>
              @endif
                <div class="card-content col-12">
                    <div class="table-responsive">
                        <table class="table table-hover ">
                        <tr>
                            <th>Nama Barang</th>
                            <th>Kuantitas</th>
                            <th>Harga</th>
                            <th>Total</th>
                        </tr>
                    @foreach ($Transaksi as $item)
                    <tr>
                        <td>{{ $item->barang->nama_barang }}</td>
                        <td>
                            
                                @if ($item->kuantitas > 1)
                                    <span class="btn btn-danger btn-sm" wire:click="decrement({{$item->id}})">-</span>
                                @endif
                                {{ $item->kuantitas }}
                                <span class="btn btn-success btn-sm" wire:click="increment({{$item->id}})">+</span>
                            
                        </td>
                        <td>{{ $item->barang->harga_jual }}</td>
                        <td>
                            {{ number_format($item->barang->harga_jual*$item->kuantitas) }}</td>
                        <td>
                            <form wire:submit.prevent="delete({{ $item->id }})">
                                <button type="submit" class="btn btn-danger btn-sm">hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach    
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        <td>{{ number_format($Transaksi->sum('total')) }}</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Bayar</td>
                        <td><input type="number" class="form-control" wire:model="bayar"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>Kembali</td>
                        <td>
                          
                          @if ($bayar === NULL)
                            {{$bayar = 0;}}
                          @else
                          {{ number_format($bayar-$Transaksi->sum('total')) }}</td>
                          @endif
                    </tr>
                        </table>
                        <button type="button" wire:click="store" class="btn btn-success float-right">submit</button>
                        <a href="/transaksi/daftar" class="btn btn-success btn-sm me-2">daftar transaksi</a>
                    </div>
                </div>
            </div>
          </div>
        </div>
          
             
           
        
