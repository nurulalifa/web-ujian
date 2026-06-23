<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Jenis Ujian</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0f172a] text-slate-200 font-sans min-h-screen flex">

    <aside class="w-64 bg-[#1e293b] p-6 flex flex-col gap-6 border-r border-slate-700">
        <div class="text-xl font-bold text-blue-400 tracking-wide">PANEL ADMIN</div>
        
        <nav class="flex flex-col gap-4">
            <a href="#" class="flex items-center gap-3 text-blue-400 font-medium bg-[#0f172a] p-3 rounded-lg border-l-4 border-blue-500">
                📄 <span>Jenis Ujian</span>
            </a>
            <div class="text-xs font-semibold text-slate-500 uppercase tracking-wider mt-4">Akademik</div>
            <a href="#" class="flex items-center gap-3 text-slate-400 hover:text-slate-200 transition p-2 rounded">
                🎓 <span>Data Siswa</span>
            </a>
            <a href="#" class="flex items-center gap-3 text-slate-400 hover:text-slate-200 transition p-2 rounded">
                📖 <span>Bank Soal</span>
            </a>
            <a href="#" class="flex items-center gap-3 text-slate-400 hover:text-slate-200 transition p-2 rounded">
                📊 <span>Rekap Nilai</span>
            </a>
        </nav>
    </aside>

    <main class="flex-1 p-8">
        <header class="mb-8">
            <h1 class="text-3xl font-bold text-white">Kelola Jenis Ujian</h1>
            <p class="text-slate-400 mt-1">Tambah, ubah, atau hapus kategori ujian sekolah.</p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="bg-[#1e293b] p-6 rounded-xl border border-slate-700 h-fit">
                <h2 id="form-title" class="text-xl font-semibold mb-4 text-white">Tambah Jenis Ujian</h2>
                <form id="ujian-form" onsubmit="saveData(event)">
                    <input type="hidden" id="edit-id">
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-400 mb-2">Kode Ujian</label>
                        <input type="text" id="kode-ujian" required placeholder="Contoh: UH, UTS, UAS" 
                            class="w-full bg-[#0f172a] border border-slate-600 rounded-lg p-2.5 text-white focus:outline-none focus:border-blue-500">
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-slate-400 mb-2">Nama Jenis Ujian</label>
                        <input type="text" id="nama-ujian" required placeholder="Contoh: Ulangan Harian" 
                            class="w-full bg-[#0f172a] border border-slate-600 rounded-lg p-2.5 text-white focus:outline-none focus:border-blue-500">
                    </div>

                    <button type="submit" id="btn-submit" 
                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2.5 rounded-lg transition mt-2">
                        Simpan Data
                    </button>
                    <button type="button" id="btn-cancel" onclick="resetForm()" 
                        class="w-full bg-slate-700 hover:bg-slate-600 text-slate-300 font-medium py-2 rounded-lg transition mt-2 hidden">
                        Batal
                    </button>
                </form>
            </div>

            <div class="lg:col-span-2 bg-[#1e293b] p-6 rounded-xl border border-slate-700 overflow-x-auto">
                <h2 class="text-xl font-semibold mb-4 text-white">Daftar Jenis Ujian</h2>
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b border-slate-700 text-slate-400 text-sm">
                            <th class="pb-3 pl-2 w-16">No</th>
                            <th class="pb-3 w-32">Kode</th>
                            <th class="pb-3">Nama Ujian</th>
                            <th class="pb-3 pr-2 text-center w-36">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" class="text-sm divide-y divide-slate-700/50">
                        </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        // Data Default/Awal
        let dataUjian = [
            { id: 1, kode: 'UH', nama: 'Ulangan Harian' },
            { id: 2, kode: 'UTS', nama: 'Ujian Tengah Semester' },
            { id: 3, kode: 'UAS', nama: 'Ujian Akhir Semester' }
        ];

        // Fungsi menampilkan data ke tabel
        function renderTable() {
            const tbody = document.getElementById('table-body');
            tbody.innerHTML = '';
            
            dataUjian.forEach((item, index) => {
                tbody.innerHTML += `
                    <tr class="hover:bg-slate-800/50 transition">
                        <td class="py-4 pl-2 font-medium text-slate-400">${index + 1}</td>
                        <td class="py-4 font-mono text-blue-400">${item.kode}</td>
                        <td class="py-4 text-slate-200 font-medium">${item.nama}</td>
                        <td class="py-4 pr-2 text-center">
                            <button onclick="editData(${item.id})" class="text-amber-400 hover:text-amber-300 mr-3 transition font-medium">Edit</button>
                            <button onclick="deleteData(${item.id})" class="text-red-400 hover:text-red-300 transition font-medium">Hapus</button>
                        </td>
                    </tr>
                `;
            });
        }

        // Fungsi Simpan (Tambah / Edit)
        function saveData(e) {
            e.preventDefault();
            const id = document.getElementById('edit-id').value;
            const kode = document.getElementById('kode-ujian').value.toUpperCase();
            const nama = document.getElementById('nama-ujian').value;

            if (id) {
                // Edit Data yang sudah ada
                const index = dataUjian.findIndex(item => item.id == id);
                dataUjian[index] = { id: parseInt(id), kode, nama };
            } else {
                // Tambah Data Baru
                const newId = dataUjian.length > 0 ? Math.max(...dataUjian.map(o => o.id)) + 1 : 1;
                dataUjian.push({ id: newId, kode, nama });
            }

            resetForm();
            renderTable();
        }

        // Fungsi Edit (Load data ke form)
        function editData(id) {
            const item = dataUjian.find(item => item.id === id);
            document.getElementById('edit-id').value = item.id;
            document.getElementById('kode-ujian').value = item.kode;
            document.getElementById('nama-ujian').value = item.nama;

            document.getElementById('form-title').innerText = 'Ubah Jenis Ujian';
            document.getElementById('btn-submit').innerText = 'Simpan Perubahan';
            document.getElementById('btn-cancel').classList.remove('hidden');
        }

        // Fungsi Hapus Data
        function deleteData(id) {
            if (confirm('Apakah Anda yakin ingin menghapus jenis ujian ini?')) {
                dataUjian = dataUjian.filter(item => item.id !== id);
                renderTable();
                resetForm();
            }
        }

        // Fungsi Reset Form
        function resetForm() {
            document.getElementById('ujian-form').reset();
            document.getElementById('edit-id').value = '';
            document.getElementById('form-title').innerText = 'Tambah Jenis Ujian';
            document.getElementById('btn-submit').innerText = 'Simpan Data';
            document.getElementById('btn-cancel').classList.add('hidden');
        }

        // Jalankan fungsi tabel saat pertama kali halaman dimuat
        renderTable();
    </script>
</body>
</html>