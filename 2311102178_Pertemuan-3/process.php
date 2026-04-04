<?php

require_once 'data.php';
require_once 'functions.php';

$dataProses = array();
$totalNilai = 0;
$nilaiTertinggi = 0;

foreach ($mahasiswa as $mhs) {
    $nilaiAkhir = hitungNilaiAkhir($mhs['nilai_tugas'], $mhs['nilai_uts'], $mhs['nilai_uas']);
    $grade = tentukanGrade($nilaiAkhir);
    $status = tentukanStatus($nilaiAkhir);
    
    
    $dataProses[] = array(
        'nama' => $mhs['nama'],
        'nim' => $mhs['nim'],
        'nilai_tugas' => $mhs['nilai_tugas'],
        'nilai_uts' => $mhs['nilai_uts'],
        'nilai_uas' => $mhs['nilai_uas'],
        'nilai_akhir' => $nilaiAkhir,
        'grade' => $grade,
        'status' => $status
    );
    
    $totalNilai += $nilaiAkhir;
    
    // Menentukan nilai tertinggi
    if ($nilaiAkhir > $nilaiTertinggi) {
        $nilaiTertinggi = $nilaiAkhir;
    }
}

// Hitung rata-rata kelas
$rataRataKelas = $totalNilai / count($dataProses);
$rataRataKelas = round($rataRataKelas, 2);
?>
