<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Nilai Siswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Form Nilai Siswa</h2>
        <form method="POST" action="nilai_siswa.php">
            <!-- Nama Siswa -->
            <div class="mb-4">
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input type="text" id="nama" name="nama" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Mata Kuliah -->
            <div class="mb-4">
                <label for="matkul" class="block text-sm font-medium text-gray-700">Mata Kuliah</label>
                <input type="text" id="matkul" name="matkul" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Nilai UTS -->
            <div class="mb-4">
                <label for="nilai_uts" class="block text-sm font-medium text-gray-700">Nilai UTS</label>
                <input type="number" id="nilai_uts" name="nilai_uts" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Nilai UAS -->
            <div class="mb-4">
                <label for="nilai_uas" class="block text-sm font-medium text-gray-700">Nilai UAS</label>
                <input type="number" id="nilai_uas" name="nilai_uas" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Nilai Tugas Praktikum -->
            <div class="mb-6">
                <label for="nilai_tugas" class="block text-sm font-medium text-gray-700">Nilai Tugas Praktikum</label>
                <input type="number" id="nilai_tugas" name="nilai_tugas" required
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Hidden Input untuk Proses -->
            <input type="hidden" name="proses" value="Proses Nilai">

            <!-- Tombol Submit -->
            <button type="submit" name="submit"
                class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                Submit
            </button>
        </form>
    </div>
</body>
</html>

<?php 

include_once '../../Pertemuan-4/daftar_nilai.php';

$proses = $_POST['proses'];

if (!empty($proses)) {
    $daftar_nilai[] = new NilaiMahasiswa(
        $_POST['nama'],
        $_POST['matkul'],
        $_POST['nilai_uts'],
        $_POST['nilai_uas'],
        $_POST['nilai_tugas']
    );
}


?>