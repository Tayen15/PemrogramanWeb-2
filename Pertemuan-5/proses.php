<?php 
     require 'config.php';

     if (isset($_POST['submit'])) {
          $kode = $_POST['kode'];
          $nama = $_POST['nama'];
          $kaprodi = $_POST['kaprodi'];

          $sql = "INSERT INTO prodi (kode, nama, kaprodi) VALUES ('$kode', '$nama', '$kaprodi')";
          if ($koneksi->query($sql) === TRUE) {
               header("Location: index.php");
          } else {
               echo "Error: " . $sql . "<br>" . $koneksi->error;
          }
     }

?>