<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM POFKIP - @yield('title', 'Anggota')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* CSS KUSTOM DARI KODE AWAL ANDA */
        body {
            background: url('{{ asset("img/logo.jpg") }}') center/cover fixed no-repeat;
            position: relative;
            overflow-x: hidden;
            min-height: 100vh;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.55);
            backdrop-filter: blur(2px);
            z-index: -1;
        }

        .navbar {
            background: rgba(29, 204, 195, 0.95);
            backdrop-filter: blur(5px);
            padding: 10px 0;
        }
        .navbar-brand { font-weight: 700; color: white !important; }
        .nav-link { color: white !important; font-weight: 500; }
        .nav-link:hover { color: #f7e8c3 !important; }
        
        .container {
            position: relative;
            z-index: 10; 
            padding-bottom: 50px; 
        }
        
        h2 { color: #d5ff66; font-weight: 700; }
        label { color: white; font-weight: 500;}
        .table { --bs-table-bg: transparent; }
        .table th, .table td { border-color: rgba(255,255,255,0.2); }
        
        footer {
            background: linear-gradient(to right, #1dcfc3, #767f78);
            padding: 20px 0;
            color: white;
            text-align: center;
            position: relative; 
            width: 100%;
            margin-top: 50px;

        }
        /* AKHIR CSS KUSTOM */
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="/">MOH. DIMAS UBAIDILLAH</a>

            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}" href="{{ route('anggota.index') }}">ANGGOTA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">FASILITAS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">PROKER</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form-app').submit();">
                            LOGOUT
                        </a>
                    </li>
                    <form id="logout-form-app" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        {{-- INI ADALAH TEMPAT KONTEN DINAMIS DIMASUKKAN --}}
        @yield('content')
    </main>

    <footer>
        <p>© 2025 UKM POFKIP | Universitas Trunojoyo Madura</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>