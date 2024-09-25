<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Persewaan Mobil</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <!-- Menu Umum -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('cars.index') }}">Daftar Mobil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('rentals.rent') }}">Sewa Mobil</a>
            </li>
            <!-- Menu berdasarkan peran -->
            @if(auth()->user() && auth()->user()->role == 'admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.manage_users') }}">Kelola Pengguna</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.manage_cars') }}">Kelola Mobil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.rentals') }}">Penyewaan</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.returns') }}">Pengembalian</a>
            </li>
            @elseif(auth()->user() && auth()->user()->role == 'user')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.my_rentals') }}">Penyewaan Saya</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.profile') }}">Profil Saya</a>
            </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}">Logout</a>
            </li>
        </ul>
    </div>
</nav>