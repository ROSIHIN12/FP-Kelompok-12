<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EnSa Course</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f4;
            position: relative; 
        }

        main .header {
            background-color: blue;
        }

        header .logo img {
            height: 50px;
        }

        header .logo span {
            font-size: 1.2rem;
            font-weight: bold;
        }

        header nav .nav-link {
            color: #000;
            font-weight: bold;
        }

        header nav ul.nav {
            margin-bottom: 0;
        }

        header nav ul.nav.ml-auto {
            margin-left: auto !important;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
        }

        main .welcome-section {
            background-image: url('{{ asset('storage/bgku.webp') }}');
            background-size: cover;
            background-position: center;
            color: black;
            padding: 60px 20px;
            border-radius: 10px;
            animation: fadeIn 2s ease-in-out;
            text-shadow: 0 0 10px rgba(0,0,0,0.5);
        }

        main .welcome-section h1 {
            margin-top: 0;
            font-size: 2.5rem;
            font-weight: bold;
        }

        main .welcome-section p {
            font-size: 1.2rem;
        }

        main .welcome-section a {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        main .welcome-section a:hover {
            background-color: #0056b3;
        }

        .card img {
            height: 150px;
            object-fit: cover;
        }

        .card {
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        footer address {
            font-style: normal;
        }

        .footer-logo img {
            height: 60px;
        }

        .custom-address p {
            margin-bottom: 5px; /* Ubah nilai ini untuk merapatkan atau merenggangkan jarak */
        }

        .back-to-top {
            position: fixed;
            bottom: 20px;
            right: 20px;
            display: none;
            z-index: 99;
            cursor: pointer;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .animated-section {
            animation: fadeIn 2s ease-in-out;
        }

        /* Media Queries */
        @media (max-width: 768px) {
            header .navbar-container {
                flex-direction: column;
                align-items: flex-start;
            }

            header nav ul.nav {
                flex-direction: column;
                width: 100%;
            }

            header nav ul.nav.ml-auto {
                margin-left: 0 !important;
            }

            header nav ul.nav li.nav-item {
                margin-bottom: 10px;
            }

            .footer-logo {
                flex-direction: column;
                align-items: flex-start;
            }
        }

        @media (max-width: 576px) {
            main .welcome-section {
                padding: 40px 10px;
            }

            main .welcome-section h1 {
                font-size: 2rem;
            }

            main .welcome-section p {
                font-size: 1rem;
            }

            .card img {
                height: 100px;
            }

            footer .container {
                flex-direction: column;
                text-align: center;
            }

            footer .custom-address, footer .footer-logo {
                margin-bottom: 20px;
            }

            .footer-logo {
                align-items: center;
            }

            .footer-logo img {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <header class="bg-light-blue py-3 mb-4">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ url('storage/' . config('app.logo', 'vendor/admin-lte/img/AdminLTELogo.png')) }}" alt="EnSa Course Logo" class="mr-2" height="50">
                    <span>EnSa Course</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="#teachers" class="nav-link">Guru</a></li>
                        <li class="nav-item"><a href="#Courses" class="nav-link">Kursus</a></li>
                        <li class="nav-item"><a href="#About" class="nav-link">Tentang Kami</a></li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                        <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <main class="container">
        <section class="text-center mb-5 welcome-section">
            <h1>Selamat Datang di EnSa Course</h1>
            <p>Bergabunglah dengan kursus online kami dan mulai belajar hari ini.</p>
            <p>Belajar dari instruktur terbaik di berbagai bidang. Apakah Anda ingin meningkatkan keterampilan, mempelajari sesuatu yang baru, atau memajukan karier Anda, kami memiliki kursus yang tepat untuk Anda.</p>
            <a href="{{ route('register') }}" class="btn btn-primary">Get Started</a>
        </section>

        <section id="teachers" class="mb-5 animated-section">
            <h2 class="text-center">Guru</h2><br>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_teacher/naura_amara.jpg') }}" class="card-img-top" alt="Teacher Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">NAURA AMARA</p>
                            <p class="card-text">FIGMA</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_teacher/ahmad_muzaki.jpEg') }}" class="card-img-top" alt="Teacher Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">AHMAD MUZAKI</p>
                            <p class="card-text">LARAVEL 9</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_teacher/fatan_hamdan.png') }}" class="card-img-top" alt="Teacher Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">FATAN HAMDAN</p>
                            <p class="card-text">HTML & CSS</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_teacher/nova_ardani.jpg') }}" class="card-img-top" alt="Teacher Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">NOVA ARDANI</p>
                            <p class="card-text">MYSQL</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_teacher/robi_anggara.jpg') }}" class="card-img-top" alt="Teacher Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">ROBI ANGGARA</p>
                            <p class="card-text">IONIC</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="Courses" class="mb-5 animated-section">
            <h2 class="text-center">Kursus</h2><br>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_kursus/html_css.jpg') }}" class="card-img-top" alt="Course Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">HTML & CSS</p>
                            <p class="card-text">Basic Level</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_kursus/laravel_9.jpg') }}" class="card-img-top" alt="Course Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">LARAVEL</p>
                            <p class="card-text">Basic Level</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_kursus/ionic.jpg') }}" class="card-img-top" alt="Course Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">IONIC</p>
                            <p class="card-text">Basic Level</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_kursus/mysql.jpg') }}" class="card-img-top" alt="Course Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">MYSQL</p>
                            <p class="card-text">Basic Level</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('storage/foto_kursus/figma.jpg') }}" class="card-img-top" alt="Course Image">
                        <div class="card-body text-center">
                            <p class="card-title font-weight-bold">FIGMA</p>
                            <p class="card-text">Basic Level</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="About" class="text-center mb-5 welcome-section">
            <h2 class="text-center">Tentang Kami</h2>
            <p class="text-center">"Kursus online memberikan kesempatan bagi siapa saja untuk mengakses pembelajaran dari mana saja, memungkinkan fleksibilitas yang lebih besar dalam meningkatkan keterampilan dan pengetahuan."</p>
            <p class="text-center">"Tingkat partisipasi yang tinggi dan beragamnya materi yang tersedia membuat kursus online menjadi pilihan yang sangat populer bagi mereka yang ingin terus belajar dan berkembang, tanpa terbatas oleh waktu atau lokasi."</p>
        </section>
    </main>

    <footer class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between align-items-center flex-wrap">
            <address class="mb-0 custom-address">
                <p>Alamat: Jl. Tegalgendu 10 Karawaci Jawa Barat</p>
                <p>Contact: ensacourse@gmail.com</p>
                <p>Hp: 085620222777</p>
                <p>Telepon: 0262 332 7464</p>
            </address>
            <div class="footer-logo d-flex align-items-center">
                <span>EnSa Course 2024</span>
                <img src="{{ url('storage/' . config('app.logo', 'vendor/admin-lte/img/AdminLTELogo.png')) }}" alt="EnSa Course Logo" class="ml-2">
            </div>
            <a class="back-to-top" href="#" aria-label="Kembali ke Atas">
                <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M36.3636 25.4546H26.9091V36L13.4546 22.5455L26.9091 9.09091V19.6364H36.3636V25.4546Z" fill="#6c63ff"/>
                </svg>
            </a>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function(){
            // Saat pengguna menggulir halaman, periksa posisinya
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) { // Jika posisi guliran lebih besar dari 100px dari atas
                    $('.back-to-top').fadeIn(); // Munculkan tombol kembali ke atas
                } else {
                    $('.back-to-top').fadeOut(); // Sembunyikan tombol kembali ke atas
                }
            });

            // Saat tombol kembali ke atas diklik
            $('.back-to-top').click(function(){
                $('html, body').animate({scrollTop : 0},800); // Gulir halaman kembali ke atas dalam 800 milidetik
                return false;
            });
        });
    </script>
</body>
</html>
