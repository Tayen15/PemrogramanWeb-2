<?php 
session_start();
require_once 'class.php';

$daftar_nilai = [
     new NilaiMahasiswa("John Doe", "Pemrograman Web", 80, 90, 85),
     new NilaiMahasiswa("Jane Doe", "Pemrograman Web", 70, 75, 80),
     new NilaiMahasiswa("Foo Bar", "Pemrograman Web", 60, 65, 70),
     new NilaiMahasiswa("Baz Qux", "Pemrograman Web", 50, 55, 60),
     new NilaiMahasiswa("Corge Grault", "Pemrograman Web", 40, 45, 50)
];

if (!empty($_POST['submit'])) {
     array_push($daftar_nilai, new NilaiMahasiswa(
          $_POST['nama'],
          $_POST['mata_kuliah'],
          $_POST['nilai_uts'],
          $_POST['nilai_uas'],
          $_POST['nilai_tugas']
     ));
}
?>

<h3>Tambah Data Mahasiswa</h3>
<form action="" method="post">
     <input type="text" name="nama" placeholder="Nama Mahasiswa">
     <input type="text" name="mata_kuliah" placeholder="Mata Kuliah">
     <input type="number" name="nilai_uts" placeholder="Nilai UTS">
     <input type="number" name="nilai_uas" placeholder="Nilai UAS">
     <input type="number" name="nilai_tugas" placeholder="Nilai Tugas">
     <button type="submit" name="submit">Tambah Data</button>
</form>

<h1>Nilai Mahasiswa</h1>
<table border="1" width="100%">
     <thead>
          <tr>
               <th>Nama</th>
               <th>Mata Kuliah</th>
               <th>Nilai UTS</th>
               <th>Nilai UAS</th>
               <th>Nilai Tugas</th>
               <th>Nilai Akhir</th>
               <th>Grade</th>
               <th>Status</th>
          </tr>
     </thead>
     <tbody>
          <?php foreach ($daftar_nilai as $nilai) : ?>
               <tr>
                    <td><?= $nilai->nama ?></td>
                    <td><?= $nilai->mata_kuliah ?></td>
                    <td><?= $nilai->nilai_uts ?></td>
                    <td><?= $nilai->nilai_uas ?></td>
                    <td><?= $nilai->nilai_tugas ?></td>
                    <td><?= number_format($nilai->getNilaiAkhir(), 2) ?></td>
                    <td><?= $nilai->getGrade() ?></td>
                    <td><?= $nilai->getStatus() ?></td>
               </tr>
          <?php endforeach; ?>
     </tbody>
</table>
