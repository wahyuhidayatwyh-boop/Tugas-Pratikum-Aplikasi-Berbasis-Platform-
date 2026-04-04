<?php
function hitungNilaiAkhir($nilaiTugas, $nilaiUts, $nilaiUas) {
    $nilaiAkhir = ($nilaiTugas * 0.20) + ($nilaiUts * 0.35) + ($nilaiUas * 0.45);
    return round($nilaiAkhir, 2);
}


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


function tentukanStatus($nilaiAkhir) {
    if ($nilaiAkhir >= 65) {
        return 'LULUS';
    } else {
        return 'TIDAK LULUS';
    }
}


function getGradeClass($grade) {
    $gradeClassMap = array(
        'A' => 'success',
        'B+' => 'info',
        'B' => 'primary',
        'C+' => 'warning',
        'C' => 'warning',
        'D' => 'danger'
    );
    return isset($gradeClassMap[$grade]) ? $gradeClassMap[$grade] : 'secondary';
}


function getStatusClass($status) {
    return ($status == 'LULUS') ? 'success' : 'danger';
}
?>
