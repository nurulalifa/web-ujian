<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Web Ujian</span>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item">
            <a href="{{ url('/guru/dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>Dashboard</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/guru/soal') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-book-open"></i>
                <div>Kelola Soal</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/guru/ujian') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-stopwatch"></i>
                <div>Kontrol Ujian</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ url('/guru/nilai-siswa') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-medal"></i>
                <div>Daftar Nilai</div>
            </a>
        </li>
    </ul>
</aside>