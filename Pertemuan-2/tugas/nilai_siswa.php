<?php
$proses = $_POST['proses'];
$nama_siswa = $_POST['nama'];
$mata_kuliah = $_POST['matkul'];
$nilai_uts = $_POST['nilai_uts'];
$nilai_uas = $_POST['nilai_uas'];
$nilai_tugas = $_POST['nilai_tugas'];

if (!empty($proses)) {
    // Menghitung nilai total
    $nilai_total = ($nilai_uts * 0.3) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

    // Menentukan kelulusan
    $kelulusan = ($nilai_total > 55) ? "LULUS" : "TIDAK LULUS";

    // Menentukan grade nilai
    if ($nilai_total >= 85 && $nilai_total <= 100) {
        $grade = 'A';
    } elseif ($nilai_total >= 70 && $nilai_total < 85) {
        $grade = 'B';
    } elseif ($nilai_total >= 56 && $nilai_total < 70) {
        $grade = 'C';
    } elseif ($nilai_total >= 36 && $nilai_total < 56) {
        $grade = 'D';
    } elseif ($nilai_total >= 0 && $nilai_total < 36) {
        $grade = 'E';
    } else {
        $grade = 'I';
    }

    // Menentukan predikat nilai
    switch ($grade) {
        case 'A':
            $predikat = 'Sangat Memuaskan';
            break;
        case 'B':
            $predikat = 'Memuaskan';
            break;
        case 'C':
            $predikat = 'Cukup';
            break;
        case 'D':
            $predikat = 'Kurang';
            break;
        case 'E':
            $predikat = 'Sangat Kurang';
            break;
        default:
            $predikat = 'Tidak Ada';
            break;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Nilai Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Hasil Nilai Siswa</h2>
        <div class="space-y-4">
            <div>
                <span class="font-medium text-gray-700">Proses:</span>
                <span class="text-gray-900"><?= $proses ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Nama:</span>
                <span class="text-gray-900"><?= $nama_siswa ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Mata Kuliah:</span>
                <span class="text-gray-900"><?= $mata_kuliah ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Nilai UTS:</span>
                <span class="text-gray-900"><?= $nilai_uts ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Nilai UAS:</span>
                <span class="text-gray-900"><?= $nilai_uas ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Nilai Tugas Praktikum:</span>
                <span class="text-gray-900"><?= $nilai_tugas ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Nilai Total:</span>
                <span class="text-gray-900"><?= number_format($nilai_total, 2) ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Status Kelulusan:</span>
                <span class="text-gray-900"><?= $kelulusan ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Grade:</span>
                <span class="text-gray-900"><?= $grade ?></span>
            </div>
            <div>
                <span class="font-medium text-gray-700">Predikat:</span>
                <span class="text-gray-900"><?= $predikat ?></span>
            </div>
        </div>
        <div class="mt-6 text-center">
            <a href="form_nilai.php" class="text-indigo-600 hover:text-indigo-800">Kembali ke Form</a>
        </div>
    </div>
</body>
</html>
<?php
}
?>