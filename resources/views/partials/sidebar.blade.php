<div class="sidebar" data-color="white" data-active-color="danger">
  <div class="logo">
    <a href="https://www.creative-tim.com" class="simple-text logo-mini">
      <div class="logo-image-small">
        <img src="/akl.jpeg">
      </div>
      <!-- <p>CT</p> -->
    </a>
    <a href="https://www.creative-tim.com" class="simple-text logo-normal">
      Balance Shop
      <!-- <div class="logo-image-big">
        <img src="../assets/img/logo-big.png">
      </div> -->
    </a>
  </div>
  <div class="sidebar-wrapper">
    <!--MENU-->
    <ul class="nav">
      <li class=" {{($title === "Dashboard") ? 'active' : ''}}">
        <a href="/dashboard">
          <i class="nc-icon nc-bank"></i>
          <p>Dashboard</p>
        </a>
      </li >
      @if (auth()->user()->role_id == 1)
      <li class=" {{($title === "Staff") ? 'active' : ''}}">
        <a href="/staff">
          <i class="nc-icon nc-single-02"></i>
          <p>Staff</p>
        </a>
      </li >
      @endif
      <li class=" {{($title === "Barang") ? 'active' : ''}}">
        <a href="/barang">
          <i class="nc-icon nc-box"></i>
          <p>Barang</p>
        </a>
      </li>
      <li class=" {{($title === "Transaksi") ? 'active' : ''}}">
        <a href="/transaksi">
          <i class="nc-icon nc-basket"></i>
          <p>Transaksi</p>
        </a>
      </li>
      <li class=" {{($title === "Dana") ? 'active' : ''}}">
        <a href="/dana">
          <i class="nc-icon nc-simple-add"></i>
          <p>Pemasukan</p>
        </a>
      </li>
      <li class=" {{($title === "Pengeluaran") ? 'active' : ''}}">
        <a href="/pengeluaran">
          <i class="nc-icon nc-simple-delete"></i>
          <p>Pengeluaran</p>
        </a>
      </li>
      {{-- <li>
        <a href="./tables.html">
          <i class="nc-icon nc-tile-56"></i>
          <p>Table List</p>
        </a>
      </li>
      <li>
        <a href="./typography.html">
          <i class="nc-icon nc-caps-small"></i>
          <p>Typography</p>
        </a>
      </li> --}}
      
    </ul>
  </div>
</div>