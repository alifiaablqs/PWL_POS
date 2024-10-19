<!-- Header Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light py-3">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
   
    <!-- Notifications Dropdown Menu -->
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="far fa-bell"></i>
        <span class="badge badge-warning navbar-badge">15</span>
      </a>
      <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <span class="dropdown-item dropdown-header">15 Notifications</span>
        <!-- Notification Content -->
        <a href="#" class="dropdown-item">
          <i class="fas fa-envelope mr-2"></i> 4 new messages
          <span class="float-right text-muted text-sm">3 mins</span>
        </a>
        <!-- Add more notifications here -->
      </div>
    </li>
    <head>
<!-- Profile dan Dropdown Logout -->
<li class="nav-item dropdown">
    <a class="nav-link" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        @if(Auth::user()->avatar && file_exists(public_path('storage/photos/' . Auth::user()->avatar)))
            <img src="{{ asset('storage/photos/' . Auth::user()->avatar) }}" class="rounded-circle" style="width: 40px; height: 40px;" alt="User Avatar">
        @else
            <img src="{{ asset('img/default-profile.png') }}" class="rounded-circle" style="width: 40px; height: 40px;" alt="Default User Avatar">
        @endif
        <span class="ml-2">{{ Auth::user()->username }}</span>
    </a>

    <!-- Dropdown Menu -->
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown" style="width: 280px; padding: 20px;">
        <div class="dropdown-item text-center">
            @if(Auth::user()->avatar && file_exists(public_path('storage/photos/' . Auth::user()->avatar)))
                <img src="{{ asset('storage/photos/' . Auth::user()->avatar) }}" class="img-fluid rounded-circle" style="width: 80px; height: 80px;" alt="User Avatar">
            @else
                <img src="{{ asset('img/default-profile.png') }}" class="img-fluid rounded-circle" style="width: 80px; height: 80px;" alt="Default User Avatar">
            @endif
            <p class="text-muted" style="margin-bottom: 5px;">Login sebagai {{ Auth::user()->role }}</p> <!-- Reduced margin-bottom -->
            <h5 class="mt-1">{{ Auth::user()->username }}</h5> <!-- Adjusted margin-top to mt-1 -->
        </div>

        <a class="dropdown-item text-center btn profile-btn my-2" href="{{ route('profile.index') }}" style="width: 100%;">Profile</a>

        <!-- Tombol Logout -->
        <a class="dropdown-item text-center btn logout-btn my-2" href="{{ url('logout') }}" style="width: 100%;">Logout</a>
    </div>
</li>
</ul>
</nav>

<!-- CSS untuk Tombol Profile dan Logout -->
<style>
    /* Menambahkan flexbox pada kontainer dropdown */
    .dropdown-item.text-center {
        display: flex;
        align-items: center;
        justify-content: center; 
        flex-direction: column; 
    }

    .dropdown-item.text-center img {
        margin-bottom: 3px; /* Menambahkan jarak di bawah gambar */
        margin-top: -5px; /* Memindahkan gambar sedikit ke atas */
    }

    p.text-muted {
        margin-bottom: 5px; /* Reduced margin-bottom */
    }

    h5 {
        margin-top: 2px; /* Reduced top margin to bring username closer to the role */
        margin-bottom: 0;
    }

    .profile-btn {
        background-color: #205989; 
        border: none;
        color: white;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .profile-btn:hover {
        background-color: #003366; /* Warna biru gelap saat hover */
        color: white;
    }

    /* Tombol Logout dengan warna solid oranye */
    .logout-btn {
        background-color: #FF9800; /* Oranye penuh */
        border: none;
        color: white;
        font-weight: bold;
        transition: background 0.3s ease;
    }

    .logout-btn:hover {
        background-color: #e68900; /* Oranye lebih gelap saat hover */
        color: white;
    }
</style>


  </ul>
</nav>
