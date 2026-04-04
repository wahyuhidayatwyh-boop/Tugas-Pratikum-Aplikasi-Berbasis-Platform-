# Program Manajemen Nilai Mahasiswa

Program PHP sederhana untuk menampilkan data mahasiswa dengan perhitungan nilai akhir, penentuan grade, dan status kelulusan.

## 📁 Struktur File

```
praktikum-abp/
├── index.php          # File utama (tampilan & Bootstrap)
├── data.php           # Data array mahasiswa
├── functions.php      # Fungsi-fungsi yang digunakan
├── process.php        # Proses & perhitungan data
└── README.md          # Dokumentasi
```

## 📋 Deskripsi File

### 1. **index.php**

- File utama aplikasi
- Menampilkan halaman HTML dengan Bootstrap CSS
- Menampilkan statistik kelas (rata-rata, nilai tertinggi, jumlah mahasiswa)
- Menampilkan tabel data mahasiswa dengan styling Bootstrap

### 2. **data.php**

- Menyimpan array asosiasi data mahasiswa
- Setiap mahasiswa memiliki: nama, nim, nilai_tugas, nilai_uts, nilai_uas

### 3. **functions.php**

- `hitungNilaiAkhir()` - Menghitung nilai akhir (Tugas 20% + UTS 35% + UAS 45%)
- `tentukanGrade()` - Menentukan grade berdasarkan nilai akhir
- `tentukanStatus()` - Menentukan status kelulusan (LULUS/TIDAK LULUS)
- `getGradeClass()` - Mendapatkan class Bootstrap untuk styling grade
- `getStatusClass()` - Mendapatkan class Bootstrap untuk styling status

### 4. **process.php**

- Include data.php dan functions.php
- Memproses setiap data mahasiswa
- Menghitung nilai akhir, grade, dan status
- Menghitung rata-rata kelas dan nilai tertinggi

## 🚀 Cara Menggunakan

1. Letakkan semua file di folder: `c:\laragon\www\praktikum-abp\`
2. Buka browser dan akses: `http://localhost/praktikum-abp/`

## 📊 Fitur Aplikasi

✅ Array Asosiasi untuk data mahasiswa (minimal 3, ada 5)
✅ Function untuk menghitung nilai akhir
✅ If/else untuk menentukan grade
✅ Operator aritmatika untuk perhitungan
✅ Operator perbandingan untuk penentuan lulus/tidak
✅ Loop untuk menampilkan data
✅ Tabel HTML dengan Bootstrap CSS
✅ Tampil rata-rata kelas
✅ Tampil nilai tertinggi
✅ Design responsif dan modern

## 🎨 Styling

- Menggunakan **Bootstrap 5.3.0** dari CDN
- Menggunakan **Font Awesome 6.4** untuk icons
- Design responsif untuk desktop, tablet, dan mobile
- Gradient background yang menarik
- Card components dengan hover effect
- Badge components untuk grade dan status

## 📈 Kriteria Penilaian

**Grade:**

- A: ≥ 85
- B+: 80-84
- B: 75-79
- C+: 70-74
- C: 65-69
- D: < 65

**Status Kelulusan:**

- LULUS: ≥ 65
- TIDAK LULUS: < 65

**Rumus Nilai Akhir:**

- Nilai Akhir = (Nilai Tugas × 20%) + (Nilai UTS × 35%) + (Nilai UAS × 45%)

## ✨ Keunggulan Struktur

✓ **Modular** - Setiap file punya tanggung jawab tersendiri
✓ **Maintainable** - Mudah untuk dimodifikasi dan dikembangkan
✓ **Reusable** - Functions dapat digunakan di file lain
✓ **Clean** - Pemisahan logic dari presentation
✓ **Scalable** - Mudah untuk menambah data atau fitur baru

## 🔧 Cara Menambah Data Mahasiswa

Edit file `data.php` dan tambahkan array baru:

```php
array(
    'nama' => 'Nama Mahasiswa',
    'nim' => '20220006',
    'nilai_tugas' => 80,
    'nilai_uts' => 75,
    'nilai_uas' => 78
)
```

---

**Dibuat pada:** April 4, 2026
**Bahasa:** PHP 7.4+
**Framework CSS:** Bootstrap 5.3.0
