<?php
// ============================================
// Program Menampilkan Data Mahasiswa
// ============================================

// 1. Array Asosiasi - Data Mahasiswa
$mahasiswa = array(
    array(
        'nama' => 'Ahmad Rudi Pratama',
        'nim' => '20220001',
        'nilai_tugas' => 85,
        'nilai_uts' => 78,
        'nilai_uas' => 82
    ),
    array(
        'nama' => 'Siti Nurhaliza',
        'nim' => '20220002',
        'nilai_tugas' => 92,
        'nilai_uts' => 88,
        'nilai_uas' => 95
    ),
    array(
        'nama' => 'Budi Santoso',
        'nim' => '20220003',
        'nilai_tugas' => 75,
        'nilai_uts' => 72,
        'nilai_uas' => 68
    ),
    array(
        'nama' => 'Dewi Lestari',
        'nim' => '20220004',
        'nilai_tugas' => 88,
        'nilai_uts' => 85,
        'nilai_uas' => 90
    ),
    array(
        'nama' => 'Roni Wijaya',
        'nim' => '20220005',
        'nilai_tugas' => 79,
        'nilai_uts' => 80,
        'nilai_uas' => 77
    )
);

// 2. Function untuk menghitung nilai akhir
// Rumus: (Nilai Tugas * 20%) + (Nilai UTS * 35%) + (Nilai UAS * 45%)
function hitungNilaiAkhir($nilaiTugas, $nilaiUts, $nilaiUas) {
    $nilaiAkhir = ($nilaiTugas * 0.20) + ($nilaiUts * 0.35) + ($nilaiUas * 0.45);
    return round($nilaiAkhir, 2);
}

// 3. Function untuk menentukan grade berdasarkan nilai akhir
function tentukanGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 85) {
        $grade = 'A';
    } elseif ($nilaiAkhir >= 80) {
        $grade = 'B+';
    } elseif ($nilaiAkhir >= 75) {
        $grade = 'B';
    } elseif ($nilaiAkhir >= 70) {
        $grade = 'C+';
    } elseif ($nilaiAkhir >= 65) {
        $grade = 'C';
    } else {
        $grade = 'D';
    }
    return $grade;
}

// 4. Function untuk menentukan status kelulusan
function tentukanStatus($nilaiAkhir) {
    if ($nilaiAkhir >= 65) {
        return 'LULUS';
    } else {
        return 'TIDAK LULUS';
    }
}

// 5. Proses data mahasiswa
$dataProses = array();
$totalNilai = 0;
$nilaiTertinggi = 0;

foreach ($mahasiswa as $mhs) {
    $nilaiAkhir = hitungNilaiAkhir($mhs['nilai_tugas'], $mhs['nilai_uts'], $mhs['nilai_uas']);
    $grade = tentukanGrade($nilaiAkhir);
    $status = tentukanStatus($nilaiAkhir);
    
    // Mengumpulkan data yang sudah diproses
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
    
    // Menghitung total nilai untuk rata-rata
    $totalNilai += $nilaiAkhir;
    
    // Menentukan nilai tertinggi
    if ($nilaiAkhir > $nilaiTertinggi) {
        $nilaiTertinggi = $nilaiAkhir;
    }
}

// 6. Hitung rata-rata kelas
$rataRataKelas = $totalNilai / count($dataProses);
$rataRataKelas = round($rataRataKelas, 2);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Nilai Mahasiswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            padding: 30px;
        }
        
        h1 {
            color: #333;
            margin-bottom: 10px;
            text-align: center;
            font-size: 28px;
        }
        
        .header-info {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }
        
        .statistics {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .stat-card h3 {
            font-size: 14px;
            margin-bottom: 10px;
            opacity: 0.9;
        }
        
        .stat-card .value {
            font-size: 28px;
            font-weight: bold;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        
        thead {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            border-bottom: 2px solid #667eea;
        }
        
        td {
            padding: 12px 15px;
            border-bottom: 1px solid #e0e0e0;
        }
        
        tbody tr:hover {
            background-color: #f5f5f5;
            transition: background-color 0.3s ease;
        }
        
        tbody tr:nth-child(even) {
            background-color: #fafafa;
        }
        
        .grade {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            text-align: center;
            min-width: 50px;
            display: inline-block;
        }
        
        .grade.a {
            background-color: #4CAF50;
            color: white;
        }
        
        .grade.b_plus {
            background-color: #8BC34A;
            color: white;
        }
        
        .grade.b {
            background-color: #CDDC39;
            color: #333;
        }
        
        .grade.c_plus {
            background-color: #FFC107;
            color: #333;
        }
        
        .grade.c {
            background-color: #FF9800;
            color: white;
        }
        
        .grade.d {
            background-color: #F44336;
            color: white;
        }
        
        .status {
            font-weight: bold;
            padding: 5px 10px;
            border-radius: 4px;
            text-align: center;
            min-width: 90px;
            display: inline-block;
        }
        
        .status.lulus {
            background-color: #4CAF50;
            color: white;
        }
        
        .status.tidak-lulus {
            background-color: #F44336;
            color: white;
        }
        
        .footer {
            text-align: center;
            color: #999;
            font-size: 12px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>📊 Data Nilai Mahasiswa</h1>
        <div class="header-info">
            <p>Program Manajemen Nilai Akademik</p>
        </div>
        
        <!-- Statistik -->
        <div class="statistics">
            <div class="stat-card">
                <h3>Rata-rata Kelas</h3>
                <div class="value"><?php echo $rataRataKelas; ?></div>
            </div>
            <div class="stat-card">
                <h3>Nilai Tertinggi</h3>
                <div class="value"><?php echo $nilaiTertinggi; ?></div>
            </div>
            <div class="stat-card">
                <h3>Jumlah Mahasiswa</h3>
                <div class="value"><?php echo count($dataProses); ?></div>
            </div>
        </div>
        
        <!-- Tabel Data Mahasiswa -->
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Nilai Tugas</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Nilai Akhir</th>
                    <th>Grade</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // 7. Loop untuk menampilkan semua data mahasiswa
                $no = 1;
                foreach ($dataProses as $data) {
                    $gradeClass = '';
                    if ($data['grade'] == 'A') $gradeClass = 'a';
                    elseif ($data['grade'] == 'B+') $gradeClass = 'b_plus';
                    elseif ($data['grade'] == 'B') $gradeClass = 'b';
                    elseif ($data['grade'] == 'C+') $gradeClass = 'c_plus';
                    elseif ($data['grade'] == 'C') $gradeClass = 'c';
                    elseif ($data['grade'] == 'D') $gradeClass = 'd';
                    
                    $statusClass = ($data['status'] == 'LULUS') ? 'lulus' : 'tidak-lulus';
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['nim']; ?></td>
                        <td style="text-align: center;"><?php echo $data['nilai_tugas']; ?></td>
                        <td style="text-align: center;"><?php echo $data['nilai_uts']; ?></td>
                        <td style="text-align: center;"><?php echo $data['nilai_uas']; ?></td>
                        <td style="text-align: center; font-weight: bold;"><?php echo $data['nilai_akhir']; ?></td>
                        <td style="text-align: center;">
                            <span class="grade <?php echo $gradeClass; ?>">
                                <?php echo $data['grade']; ?>
                            </span>
                        </td>
                        <td style="text-align: center;">
                            <span class="status <?php echo $statusClass; ?>">
                                <?php echo $data['status']; ?>
                            </span>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        
        <div class="footer">
            <p><strong>Keterangan Penilaian:</strong> Nilai Akhir = (Nilai Tugas × 20%) + (Nilai UTS × 35%) + (Nilai UAS × 45%)</p>
            <p><strong>Kriteria Grade:</strong> A (≥85), B+ (80-84), B (75-79), C+ (70-74), C (65-69), D (<65)</p>
            <p><strong>Status Kelulusan:</strong> LULUS (≥65), TIDAK LULUS (<65)</p>
        </div>
    </div>
</body>
</html>
