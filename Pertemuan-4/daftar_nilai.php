<?php
require_once "class.php";
session_start(); // Mulai session untuk menyimpan data

// Array untuk menyimpan daftar mahasiswa
if (!isset($_SESSION["daftar_mahasiswa"])) {
     $_SESSION["daftar_mahasiswa"] = [];
}

// Cek apakah form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $nama = $_POST["nama"];
     $mata_kuliah = $_POST["mata_kuliah"];
     $nilai_uts = $_POST["nilai_uts"];
     $nilai_uas = $_POST["nilai_uas"];
     $nilai_tugas = $_POST["nilai_tugas"];

     // Validasi sederhana
     if (!empty($nama) && !empty($mata_kuliah) && is_numeric($nilai_uts) && is_numeric($nilai_uas) && is_numeric($nilai_tugas)) {
          // Simpan data dalam array session
          $_SESSION["daftar_mahasiswa"][] = new NilaiMahasiswa($nama, $mata_kuliah, $nilai_uts, $nilai_uas, $nilai_tugas);
     }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Input Nilai Mahasiswa</title>
     <style>
          body {
               font-family: Arial, sans-serif;
               margin: 20px;
          }

          form {
               margin-bottom: 20px;
               max-width: 400px;
               padding: 15px;
               background: #f4f4f4;
               border-radius: 5px;
          }

          label,
          input,
          button {
               display: block;
               width: 100%;
               margin-bottom: 10px;
          }

          table {
               width: 100%;
               border-collapse: collapse;
               margin-top: 20px;
          }

          th,
          td {
               border: 1px solid black;
               padding: 10px;
               text-align: center;
          }

          th {
               background: #ddd;
          }
     </style>
</head>

<body>
     <h2>Form Input Nilai Mahasiswa</h2>
     <form method="POST">
          <label>Nama Mahasiswa:</label>
          <input type="text" name="nama" required>

          <label>Mata Kuliah:</label>
          <input type="text" name="mata_kuliah" required>

          <label>Nilai UTS:</label>
          <input type="number" name="nilai_uts" required>

          <label>Nilai UAS:</label>
          <input type="number" name="nilai_uas" required>

          <label>Nilai Tugas:</label>
          <input type="number" name="nilai_tugas" required>

          <button type="submit">Tambah Data</button>
     </form>

     <h2>Daftar Nilai Mahasiswa</h2>
     <table>
          <tr>
               <th>No</th>
               <th>Nama</th>
               <th>Mata Kuliah</th>
               <th>Nilai UTS</th>
               <th>Nilai UAS</th>
               <th>Nilai Tugas</th>
               <th>Nilai Akhir</th>
               <th>Grade</th>
               <th>Status</th>
          </tr>
          <?php
          if (!empty($_SESSION["daftar_mahasiswa"])) {
               $no = 1;
               foreach ($_SESSION["daftar_mahasiswa"] as $mhs) {
                    echo "<tr>
                              <td>{$no}</td>
                              <td>{$mhs->nama}</td>
                              <td>{$mhs->mata_kuliah}</td>
                              <td>{$mhs->nilai_uts}</td>
                              <td>{$mhs->nilai_uas}</td>
                              <td>{$mhs->nilai_tugas}</td>
                              <td>{$mhs->getNilaiAkhir()}</td>
                              <td>{$mhs->getGrade()}</td>
                              <td>{$mhs->getStatus()}</td>
                          </tr>";
                    $no++;
               }
          } else {
               echo "<tr><td colspan='9'>Belum ada data</td></tr>";
          }
          ?>
     </table>
</body>

</html>