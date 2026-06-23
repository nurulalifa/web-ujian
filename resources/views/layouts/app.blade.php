<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Dashboard Guru - Web Ujian</title>

    <link rel="stylesheet" href="/backend/assets/vendor/fonts/boxicons.css" />
    <link rel="stylesheet" href="/backend/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="/backend/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="/backend/assets/css/demo.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize;">Web Ujian</span>
                </div>
                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">
                    
                    <li class="menu-item {{ Request::is('guru/dashboard*') ? 'active' : '' }}">
                        <a href="{{ url('guru/dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div>Dashboard</div>
                        </a>
                    </li>
                    
                    <li class="menu-item {{ Request::is('guru/soal*') ? 'active' : '' }}">
                        <a href="{{ url('guru/soal') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book-open"></i>
                            <div>Kelola Soal</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('guru/jenis-ujian*') ? 'active' : '' }}">
                        <a href="{{ url('guru/jenis-ujian') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-purchase-tag"></i>
                            <div>Jenis Ujian</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('guru/ujian*') ? 'active' : '' }}">
                        <a href="{{ url('guru/ujian') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-stopwatch"></i>
                            <div>Kontrol Jadwal</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('guru/status-siswa*') ? 'active' : '' }}">
                        <a href="{{ url('guru/status-siswa') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-group"></i>
                            <div>Status Siswa</div>
                        </a>
                    </li>

                    <li class="menu-item {{ Request::is('guru/nilai*') ? 'active' : '' }}">
                        <a href="{{ url('guru/nilai') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-award"></i>
                            <div>Nilai Siswa</div>
                        </a>
                    </li>

                </ul>
            </aside>
            <div class="layout-page">
                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 py-4">
                        @yield('content')
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="/backend/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="/backend/assets/vendor/js/bootstrap.js"></script>
    <script src="/backend/assets/vendor/js/menu.js"></script>
    <script src="/backend/assets/js/main.js"></script>
</body>
</html>