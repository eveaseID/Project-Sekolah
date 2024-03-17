<link rel="stylesheet" href="css/sidebar.css">

<body id="body-pd" class="body-pd">
    <header class="header body-pd" id="header">
        <div class="header_toggle shadow-sm"> <i class='bx bx-menu' id="header-toggle"></i> </div>
    </header>
    <div class="l-navbar showSidebar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="/" class="nav_logo mb-0"> <i class='bx bx-layer nav_logo-icon'></i> 
                    <span class="nav_logo-name">
                        {{ ucwords(Auth::user()->level) }}
                    </span>
                </a>
                <hr style="color: black; margin-left: 10px; margin-bottom: 30px">

                <div class="nav_list"> 


                    @if (Auth::user()->level == 'admin')
                        <a href="{{ route('dashboard') }}" class="nav_link {{ request()->is('dashboard') ? "active" : "" }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="{{ route('users') }}" class="nav_link {{ request()->is('users') ? "active" : "" }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                        <a href="{{ route('karyawan') }}" class="nav_link {{ request()->is('karyawan') ? "active" : "" }}"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Karyawan</span> </a> 
                    @endif

                    @if (Auth::user()->level == 'operator')
                        <a href="{{ route('dashboard') }}" class="nav_link {{ request()->is('dashboard') ? "active" : "" }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="{{ route('paketwisata') }}" class="nav_link {{ request()->is('paketwisata') ? "active" : "" }}"> <i class='bx bx-package nav_icon'></i> <span class="nav_name">Paket Wisata</span> </a> 
                        <a href="{{ route('daftarpaket') }}" class="nav_link {{ request()->is('daftarpaket') ? "active" : "" }}"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Daftar Paket</span> </a> 
                        <a href="{{ route('reservasi') }}" class="nav_link {{ request()->is('reservasi') ? "active" : "" }}"> <i class='bx bx-book-bookmark nav_icon'></i> <span class="nav_name">Reservasi</span> </a> 
                    @endif

                    @if (Auth::user()->level == 'pelanggan')
                        {{-- <a href="{{ route('pelanggan') }}" class="nav_link {{ request()->is('pelanggan') ? "active" : "" }}"> <i class='bx bx-message-dots nav_icon'></i> <span class="nav_name">Pelanggan</span> </a>  --}}
                        <a href="{{ route('home') }}" class="nav_link {{ request()->is('home') ? "active" : "" }}"> <i class='bx bx-message-dots nav_icon'></i> <span class="nav_name">Home</span> </a> 
                        <a href="{{ route('pelanggan') }}" class="nav_link {{ request()->is('pelanggan') ? "active" : "" }}"> <i class='bx bx-message-dots nav_icon'></i> <span class="nav_name">Profile</span> </a> 
                        <a href="{{ route('reservasi') }}" class="nav_link {{ request()->is('reservasi') ? "active" : "" }}"> <i class='bx bx-book-bookmark nav_icon'></i> <span class="nav_name">Reservasi</span> </a> 
                    @endif

                    @if (Auth::user()->level == 'pemilik')
                        <a href="{{ route('dashboard') }}" class="nav_link {{ request()->is('dashboard') ? "active" : "" }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="{{ route('users') }}" class="nav_link {{ request()->is('users') ? "active" : "" }}"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                        <a href="{{ route('karyawan') }}" class="nav_link {{ request()->is('karyawan') ? "active" : "" }}"> <i class='bx bx-user-pin nav_icon'></i> <span class="nav_name">Karyawan</span> </a> 
                        <a href="{{ route('pelanggan') }}" class="nav_link {{ request()->is('pelanggan') ? "active" : "" }}"> <i class='bx bx-message-dots nav_icon'></i> <span class="nav_name">Pelanggan</span> </a> 
                        <a href="{{ route('paketwisata') }}" class="nav_link {{ request()->is('paketwisata') ? "active" : "" }}"> <i class='bx bx-package nav_icon'></i> <span class="nav_name">Paket Wisata</span> </a> 
                        <a href="{{ route('daftarpaket') }}" class="nav_link {{ request()->is('daftarpaket') ? "active" : "" }}"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">Daftar Paket</span> </a> 
                        <a href="{{ route('reservasi') }}" class="nav_link {{ request()->is('reservasi') ? "active" : "" }}"> <i class='bx bx-book-bookmark nav_icon'></i> <span class="nav_name">Reservasi</span> </a> 
                    @endif

                    
                </div>
            </div> 
            <div class="dropup-center dropup">
                <a class="  nav_link " type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class='bx bx-log-out' ></i><span class="nav_name">{{ ucwords(Auth::user()->level) }}</span> 
                </a>
                <ul class="dropdown-menu bg-dark text-center">
                    <a class="text-white" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">SignOut</a>
                </ul>
              </div>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </nav>
    </div>

    <script src="js/sidebar.js"></script>
</body>
