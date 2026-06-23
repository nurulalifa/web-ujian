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
    <style>
/* =========================
   SIDEBAR
========================= */

.bg-menu-theme{
    background:#0f172a !important;
}

.app-brand{
    background:#020617 !important;
    border-bottom:1px solid #1e293b;
}

.app-brand-text{
    color:#ffffff !important;
    font-weight:700;
}

.menu-inner{
    padding-top:15px;
}

.menu-link{
    color:#94a3b8 !important;
    border-radius:12px;
    margin:2px 10px;
    transition:all .2s ease;
}

.menu-link:hover{
    background:#1e293b !important;
    color:#e2e8f0 !important;
}

.menu-link i{
    color:inherit !important;
}

/* Menu Aktif */

.menu-item.active .menu-link{
    background:#2563eb !important;
    color:#fff !important;
    box-shadow:0 4px 12px rgba(37,99,235,.25);
}

.menu-item.active .menu-link i{
    color:#fff !important;
}

/* Section Divider */

.menu-header{
    color:#64748b !important;
}

/* =========================
   HEADER
========================= */

.layout-navbar{
    background:#ffffff !important;
    border-bottom:1px solid #e2e8f0 !important;
    box-shadow:0 1px 3px rgba(0,0,0,.05);
}

/* =========================
   CONTENT
========================= */

.content-wrapper{
    background:#f8fafc !important;
}

/* Card */

.card{
    border:none !important;
    border-radius:18px !important;
    box-shadow:0 1px 3px rgba(0,0,0,.08) !important;
}

.card-header{
    border-bottom:1px solid #e2e8f0 !important;
}

/* =========================
   TABLE
========================= */

.table thead th{
    background:#f8fafc !important;
    color:#475569 !important;
    font-weight:600;
}

.table tbody tr:hover{
    background:#f8fafc;
}

/* =========================
   BUTTON
========================= */

.btn-primary{
    background:#2563eb !important;
    border-color:#2563eb !important;
}

.btn-primary:hover{
    background:#1d4ed8 !important;
    border-color:#1d4ed8 !important;
}

.btn-success{
    background:#10b981 !important;
    border-color:#10b981 !important;
}

.btn-danger{
    background:#ef4444 !important;
    border-color:#ef4444 !important;
}

/* =========================
   BADGE
========================= */

.badge.bg-primary{
    background:#dbeafe !important;
    color:#1d4ed8 !important;
}

.badge.bg-success{
    background:#dcfce7 !important;
    color:#15803d !important;
}

.badge.bg-danger{
    background:#fee2e2 !important;
    color:#b91c1c !important;
}

.badge.bg-info{
    background:#cffafe !important;
    color:#0f766e !important;
}

/* =========================
   SCROLLBAR
========================= */

::-webkit-scrollbar{
    width:8px;
}

::-webkit-scrollbar-track{
    background:#f1f5f9;
}

::-webkit-scrollbar-thumb{
    background:#94a3b8;
    border-radius:20px;
}

::-webkit-scrollbar-thumb:hover{
    background:#64748b;
}
</style>
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
