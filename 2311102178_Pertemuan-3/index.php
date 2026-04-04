<?php
require_once 'process.php';
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
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        .wrapper {
            max-width: 1000px;
            margin: 0 auto;
            background-color: #fff;
            padding: 30px;
        }
        
        h1 {
            font-size: 24px;
            color: #000;
            margin-bottom: 5px;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
        }
        
        .subtitle {
            color: #666;
            font-size: 13px;
            margin-bottom: 20px;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 30px;
        }
        
        .stat-item {
            padding: 15px;
            border: 1px solid #ddd;
            text-align: center;
        }
        
        .stat-label {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
        }
        
        .stat-value {
            font-size: 28px;
            font-weight: bold;
            color: #000;
        }
        
        .table-wrapper {
            margin-top: 30px;
            overflow-x: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
        }
        
        thead {
            background-color: #000;
            color: #fff;
        }
        
        th {
            padding: 12px;
            text-align: center;
            font-size: 13px;
            font-weight: bold;
            border: 1px solid #000;
        }
        
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 13px;
        }
        
        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        
        tbody tr:hover {
            background-color: #f0f0f0;
        }
        
        .grade-badge {
            display: inline-block;
            padding: 4px 8px;
            background-color: #000;
            color: #fff;
            font-weight: bold;
            border-radius: 3px;
            font-size: 12px;
        }
        
        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            background-color: #000;
            color: #fff;
            font-weight: bold;
            border-radius: 3px;
            font-size: 12px;
        }
        
        .info-box {
            margin-top: 25px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            font-size: 12px;
            line-height: 1.6;
        }
        
        .info-box p {
            margin-bottom: 8px;
        }
        
        .info-box p:last-child {
            margin-bottom: 0;
        }
        
        .info-box strong {
            color: #000;
        }
        
        @media (max-width: 768px) {
            .stats {
                grid-template-columns: 1fr;
            }
            
            .wrapper {
                padding: 15px;
            }
            
            th, td {
                padding: 8px;
                font-size: 12px;
            }
        }
    </style>
</head>
<body>
    
        <h1>Data Nilai Mahasiswa</h1>
        <p class="subtitle">Program Manajemen Nilai Akademik</p>
        
        <!-- Statistik -->
        <div class="stats">
            <div class="stat-item">
                <div class="stat-label">Rata-rata Kelas</div>
                <div class="stat-value"><?php echo $rataRataKelas; ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Nilai Tertinggi</div>
                <div class="stat-value"><?php echo $nilaiTertinggi; ?></div>
            </div>
            <div class="stat-item">
                <div class="stat-label">Jumlah Mahasiswa</div>
                <div class="stat-value"><?php echo count($dataProses); ?></div>
            </div>
        </div>
        
        <!-- Tabel -->
        <div class="table-wrapper">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Tugas</th>
                        <th>UTS</th>
                        <th>UAS</th>
                        <th>Nilai Akhir</th>
                        <th>Grade</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($dataProses as $data) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td style="text-align: left;"><?php echo htmlspecialchars($data['nama']); ?></td>
                        <td><?php echo htmlspecialchars($data['nim']); ?></td>
                        <td><?php echo $data['nilai_tugas']; ?></td>
                        <td><?php echo $data['nilai_uts']; ?></td>
                        <td><?php echo $data['nilai_uas']; ?></td>
                        <td><strong><?php echo $data['nilai_akhir']; ?></strong></td>
                        <td><span class="grade-badge"><?php echo $data['grade']; ?></span></td>
                        <td><span class="status-badge"><?php echo $data['status']; ?></span></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <!-- Info -->
        <div class="info-box">
            <p><strong>Keterangan Penilaian:</strong> Nilai Akhir = (Nilai Tugas × 20%) + (Nilai UTS × 35%) + (Nilai UAS × 45%)</p>
            <p><strong>Kriteria Grade:</strong> A (≥85), B+ (80-84), B (75-79), C+ (70-74), C (65-69), D (<65)</p>
            <p><strong>Status Kelulusan:</strong> LULUS (≥65), TIDAK LULUS (<65)</p>
        </div>
    
</body>
</html>
