<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UKM POFKIP</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('{{ asset("img/logo.jpg") }}') center/cover fixed no-repeat;
            position: relative;
            overflow-x: hidden;
        }

        /* Overlay gelap */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.55);
            backdrop-filter: blur(2px);
            z-index: -1;
        }

        /* Navbar */
        .navbar {
            background: rgba(29, 204, 195, 0.95);
            backdrop-filter: blur(5px);
            padding: 10px 0;
        }
        .navbar-brand {
            font-weight: 700;
            color: white !important;
        }
        .nav-link {
            color: white !important;
            font-weight: 500;
        }
        .nav-link:hover {
            color: #f7e8c3 !important;
        }

        /* Hero Section */
        .hero {
            padding: 140px 20px;
            text-align: center;
            color: white;
        }

        .hero h1 {
            font-size: 4rem;
            font-weight: 800;
            text-shadow: 3px 3px 10px rgba(0,0,0,0.8);
            color: #d5ff66;
        }

        .hero h2 {
            font-size: 2rem;
            margin-bottom: 30px;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
        }

        .hero .btn {
            background: #c6f740;
            border-radius: 30px;
            padding: 12px 28px;
            font-size: 1.2rem;
            border: none;
            transition: 0.3s;
            color: #0b1b0a;
        }

        .hero .btn:hover {
            background: #e1d27a;
            transform: scale(1.07);
        }

        /* Features */
        .features {
            padding: 80px 0;
        }

        .features h2 {
            color: #d5ff66;
            text-align: center;
            margin-bottom: 50px;
            font-weight: 700;
            font-size: 2.5rem;
        }

        .card {
            border-radius: 20px;
            border: none;
            background: rgba(255,255,255,0.15);
            backdrop-filter: blur(6px);
            color: white;
            box-shadow: 0 10px 25px rgba(0,0,0,0.35);
            transition: 0.3s;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.55);
        }

        .card-title {
            color: #d5ff66;
            font-weight: 700;
        }

        footer {
            background: linear-gradient(to right, #1dcfc3, #767f78);
            padding: 20px 0;
            color: white;
            text-align: center;
            margin-top: 70px;
        }
        footer a { color: #ffeead; }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">MOH. DIMAS UBAIDILLAH</a>

            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item">
                        <a class="nav-link active" href="/anggota">ANGGOTA</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">FASILITAS</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">PROKER</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           LOGOUT
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                        @csrf
                    </form>

                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <section class="hero">
        <h1>UKM POFKIP</h1>
        <h2>Universitas Trunojoyo Madura</h2>
        <a href="#features" class="btn">Jelajahi Fasilitas Kami</a>
    </section>

    <!-- FEATURES -->
    <section class="features container" id="features">
        <h2>Fakultas dan Prodi Unggulan Kami</h2>

        <div class="row g-4">

            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="{{ asset('img/LOGO UTM BARU.png') }}" class="card-img-top mx-auto mb-3" style="width:80px;">
                    <h5 class="card-title">Universitas Trunojoyo Madura</h5>
                    <p class="card-text">
                        Universitas Trunojoyo Madura (UTM) adalah perguruan tinggi negeri di Bangkalan...
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="{{ asset('img/LOGO FIP.png') }}" class="card-img-top mx-auto mb-3" style="width:80px;">
                    <h5 class="card-title">Fakultas Keguruan Ilmu Pendidikan</h5>
                    <p class="card-text">
                        FKIP UTM berfokus pada pengembangan tenaga pendidik profesional...
                    </p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-4 text-center">
                    <img src="{{ asset('img/LOGO HIMAPIF.png') }}" class="card-img-top mx-auto mb-3" style="width:80px;">
                    <h5 class="card-title">Prodi PIF</h5>
                    <p class="card-text">
                        HIMAPIF adalah wadah mahasiswa Pendidikan Fisika dalam pengembangan akademik dan kreativitas...
                    </p>
                </div>
            </div>

        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>© 2025 UKM POFKIP | Universitas Trunojoyo Madura</p>
    </footer>

</body>
</html>
