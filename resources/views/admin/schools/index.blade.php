<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Sekolah | SMKN 7 Pekanbaru</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <style>
        .hover-scale {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .hover-scale:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 20px -3px rgba(0, 0, 0, 0.08), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
    </style>
</head>
<body class="bg-slate-50 font-sans text-slate-700 min-h-screen flex flex-col justify-between p-6">

    <div class="max-w-5xl mx-auto space-y-6 w-full animate__animated animate__fadeIn">
        
        <div class="flex justify-between items-center bg-white px-6 py-4 rounded-2xl shadow-sm border border-slate-100">
            <a href="/admin/dashboard" class="text-sm font-medium text-blue-600 hover:text-blue-800 transition duration-300 flex items-center gap-2 group">
                <i class="fas fa-arrow-left transform group-hover:-translate-x-1 transition-transform"></i> 
                Kembali ke Dashboard
            </a>
            <span class="text-xs bg-blue-50 text-blue-600 px-3 py-1.5 rounded-full font-mono font-semibold tracking-wider border border-blue-100">
                ID Sekolah: #007
            </span>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col md:flex-row items-center gap-6 hover-scale">
            <div class="w-20 h-20 bg-gradient-to-tr from-blue-600 to-indigo-600 rounded-2xl flex items-center justify-center text-white text-3xl font-bold shadow-md shadow-blue-200 animate__animated animate__zoomIn">
                S7
            </div>
            <div class="text-center md:text-left flex-1 space-y-1">
                <h1 class="text-2xl font-bold text-slate-800 tracking-tight">SMK Negeri 7 Pekanbaru</h1>
                <p class="text-sm text-slate-500 flex items-center justify-center md:justify-start gap-4">
                    <span><strong class="text-slate-700">NPSN:</strong> 10404445</span>
                    <span class="inline-block w-1 h-1 bg-slate-300 rounded-full"></span>
                    <span><strong class="text-slate-700">Akreditasi:</strong> <span class="bg-green-100 text-green-700 px-2 py-0.5 rounded text-xs font-bold">A</span></span>
                </p>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 animate__animated animate__fadeInUp animate__delay-1s">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 space-y-2 hover-scale">
                <div class="flex items-center gap-2 text-blue-600 font-bold text-sm uppercase tracking-wider">
                    <i class="fas fa-map-marker-alt"></i> Alamat Sekolah
                </div>
                <p class="text-sm text-slate-600 leading-relaxed font-medium">
                    J.Yos Sudarso KML.8
                </p>
            </div>
            
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 space-y-2 hover-scale">
                <div class="flex items-center gap-2 text-blue-600 font-bold text-sm uppercase tracking-wider">
                    <i class="fas fa-envelope"></i> Email
                </div>
                <p class="text-sm font-medium">
                    <a href="mailto:info@smkn7pekanbaru.sch.id" class="text-slate-600 hover:text-blue-600 transition duration-200 break-all">smkn7.rbi@gmail.com</a>
                </p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 space-y-2 hover-scale">
                <div class="flex items-center gap-2 text-blue-600 font-bold text-sm uppercase tracking-wider">
                    <i class="fas fa-phone-alt"></i> Kontak 
                </div>
                <p class="text-sm text-slate-600 font-medium">
                    0761-54246,54247
                </p>
            </div>
        </div>

        <div class="flex items-center gap-2 pt-2 animate__animated animate__fadeInUp animate__delay-1s">
            <div class="h-6 w-1 bg-blue-600 rounded-full"></div>
            <h2 class="text-lg font-bold text-slate-800">Distribusi Jurusan Berdasarkan Tingkat Kelas</h2>
        </div>

        <div class="space-y-6 animate__animated animate__fadeInUp animate__delay-1s">
            
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover-scale">
                <div class="bg-gradient-to-r from-slate-50 to-slate-100/50 px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                    <span class="text-xl font-black text-slate-800 tracking-wide flex items-center gap-2">
                        <i class="fas fa-graduation-cap text-blue-500 text-base"></i> KELAS X
                    </span>
                    <span class="text-sm font-semibold bg-blue-50 text-blue-600 px-4 py-1.5 rounded-xl border border-blue-100 shadow-sm">
                        Total Siswa: <strong class="text-blue-700 font-extrabold text-base">921</strong>
                    </span>
                </div>
                <div class="p-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TKJ</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(110)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Multimedia</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(72)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">RPL</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(108)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Animasi</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(68)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TKR</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(105)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TSM</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(70)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TOI (4 Thn)</p><p class="text-sm font-bold text-slate-700">1 Kelas <span class="text-xs font-normal text-slate-500">(36)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TPTU</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(72)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Akuntansi</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(108)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">P. Syariah</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(72)</span></p></div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover-scale">
                <div class="bg-gradient-to-r from-slate-50 to-slate-100/50 px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                    <span class="text-xl font-black text-slate-800 tracking-wide flex items-center gap-2">
                        <i class="fas fa-graduation-cap text-indigo-500 text-base"></i> KELAS XI
                    </span>
                    <span class="text-sm font-semibold bg-indigo-50 text-indigo-600 px-4 py-1.5 rounded-xl border border-indigo-100 shadow-sm">
                        Total Siswa: <strong class="text-indigo-700 font-extrabold text-base">894</strong>
                    </span>
                </div>
                <div class="p-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TKJ</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(108)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Multimedia</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(70)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">RPL</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(105)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Animasi</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(64)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TKR</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(102)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TSM</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(68)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TOI (4 Thn)</p><p class="text-sm font-bold text-slate-700">1 Kelas <span class="text-xs font-normal text-slate-500">(34)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TPTU</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(68)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Akuntansi</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(105)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">P. Syariah</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(70)</span></p></div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover-scale">
                <div class="bg-gradient-to-r from-slate-50 to-slate-100/50 px-6 py-4 border-b border-slate-100 flex justify-between items-center">
                    <span class="text-xl font-black text-slate-800 tracking-wide flex items-center gap-2">
                        <i class="fas fa-graduation-cap text-teal-500 text-base"></i> KELAS XII
                    </span>
                    <span class="text-sm font-semibold bg-teal-50 text-teal-600 px-4 py-1.5 rounded-xl border border-teal-100 shadow-sm">
                        Total Siswa: <strong class="text-teal-700 font-extrabold text-base">1141</strong>
                    </span>
                </div>
                <div class="p-6 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TKJ</p><p class="text-sm font-bold text-slate-700">4 Kelas <span class="text-xs font-normal text-slate-500">(142)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Multimedia</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(105)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">RPL</p><p class="text-sm font-bold text-slate-700">4 Kelas <span class="text-xs font-normal text-slate-500">(140)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Animasi</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(70)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TKR</p><p class="text-sm font-bold text-slate-700">4 Kelas <span class="text-xs font-normal text-slate-500">(138)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TSM</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(102)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TOI (4 Thn)</p><p class="text-sm font-bold text-slate-700">1 Kelas <span class="text-xs font-normal text-slate-500">(35)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">TPTU</p><p class="text-sm font-bold text-slate-700">2 Kelas <span class="text-xs font-normal text-slate-500">(70)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">Akuntansi</p><p class="text-sm font-bold text-slate-700">4 Kelas <span class="text-xs font-normal text-slate-500">(135)</span></p></div>
                    <div class="bg-slate-50/60 p-3.5 rounded-xl border border-slate-100"><p class="text-xs text-slate-400 font-semibold mb-1">P. Syariah</p><p class="text-sm font-bold text-slate-700">3 Kelas <span class="text-xs font-normal text-slate-500">(102)</span></p></div>
                </div>
            </div>

        </div>

    </div>

    <footer class="text-center text-xs text-slate-400 mt-12 py-4 border-t border-slate-200/60 w-full animate__animated animate__fadeIn">
        &copy; 2026 SMK Negeri 7 Pekanbaru. All Rights Reserved.
    </footer>

</body>
</html>