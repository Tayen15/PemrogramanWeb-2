<?php
require 'config.php';

if (isset($_GET['tabel']) && isset($_GET['id'])) {
     $tabel = $_GET['tabel'];
     $id = intval($_GET['id']); // Pastikan ID adalah angka untuk keamanan

     // Cek tabel yang diperbolehkan
     $allowedTables = ['pasien', 'paramedik', 'periksa'];
     if (!in_array($tabel, $allowedTables)) {
          die("Tabel tidak valid.");
     }

     // Query DELETE menggunakan prepared statement
     $query = "DELETE FROM $tabel WHERE id = ?";
     $stmt = $koneksi->prepare($query);
     if ($stmt) {
          $stmt->bind_param("i", $id);
          if ($stmt->execute()) {
               // Redirect kembali setelah berhasil
               header("Location: index.php?message=Data berhasil dihapus.");
               exit();
          } else {
               echo "Gagal menghapus data.";
          }
          $stmt->close();
     } else {
          echo "Query error.";
     }
} else {
     echo "Parameter tidak lengkap.";
}

$koneksi->close();
