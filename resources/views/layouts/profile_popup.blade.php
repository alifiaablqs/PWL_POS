@include('profile_dropdown')
<div class="card shadow" style="width: 18rem;">
    <div class="card-body text-center">
        <!-- Gambar Profil -->
        <img src="{{ asset('img/default-profile.png') }}" alt="Profile" class="img-fluid rounded-circle mb-3" style="width: 80px; height: 80px;">
        
        <!-- Username dari Database -->
        <h5 class="card-title">{{ Auth::user()->username }}</h5>
        <p class="card-text">Login sebagai <strong>{{ Auth::user()->role }}</strong></p>

        <!-- Tombol Aksi -->
        <a href="{{ route('profile.show', Auth::user()->id) }}" class="btn btn-success">Profile</a>
        <a href="{{ route('logout') }}" class="btn btn-warning">Logout</a>
    </div>
</div>
