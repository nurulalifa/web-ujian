<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Guru - Web Ujian</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">

    <style>
        body { background-color: #f4f6f9; color: #333; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .sidebar { width: 260px; background: #2c3e50; min-height: 100vh; position: fixed; top: 0; left: 0; padding-top: 15px; z-index: 999; }
        .sidebar .brand { font-size: 22px; color: #fff; font-weight: bold; text-align: center; padding: 15px 0; border-bottom: 1px solid #34495e; margin-bottom: 20px; letter-spacing: 1px; }
        .sidebar a { padding: 12px 25px; text-decoration: none; font-size: 15px; color: #bdc3c7; display: flex; align-items: center; gap: 12px; transition: 0.3s; }
        .sidebar a:hover, .sidebar a.active { background: #34495e; color: #fff; border-left: 4px solid #3498db; }
        .main-content { margin-left: 260px; padding: 30px; }
        .navbar-top { background: #fff; padding: 15px 30px; box-shadow: 0 2px 4px rgba(0,0,0,0.04); margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; border-radius: 8px; }
        .stat-card { border: none; border-radius: 10px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transition: 0.3s; background: #fff; }
        .stat-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

    <div class="sidebar">
        <div class="brand"><i class='bx bx-laptop'></i> WEB UJIAN</div>
        <a href="{{ url('/guru/dashboard') }}" class="{{ Request::is('guru/dashboard') ? 'active' : '' }}">
            <i class='bx bx-grid-alt fs-5'></i> Dashboard
        </a>
        <a href="{{ url('/guru/soal') }}" class="{{ Request::is('guru/soal*') ? 'active' : '' }}">
            <i class='bx bx-book-open fs-5'></i> Kelola Soal
        </a>
        <a href="{{ url('/guru/ujian') }}" class="{{ Request::is('guru/ujian*') ? 'active' : '' }}">
            <i class='bx bx-time-five fs-5'></i> Kontrol Ujian
        </a>
        <a href="{{ url('/guru/nilai') }}" class="{{ Request::is('guru/nilai*') ? 'active' : '' }}">
            <i class='bx bx-bar-chart-alt-2 fs-5'></i> Daftar Nilai
        </a>
        <hr class="text-secondary mx-3">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-danger">
            <i class='bx bx-log-out fs-5'></i> Keluar
        </a>
        <form id="logout-form" action