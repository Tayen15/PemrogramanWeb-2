<?php
require 'config.php';

// Pastikan ada parameter id dan tabel
if (!isset($_GET['id']) || !isset($_GET['tabel'])) {
     die("ID atau tabel tidak ditemukan!");
}

$id = $_GET['id'];
$tabel = $_GET['tabel'];

// Ambil data dari tabel yang dipilih
$data = $koneksi->query("SELECT * FROM $tabel WHERE id = $id")->fetch_assoc();

if (!$data) {
     die("Data tidak ditemukan!");
}

// Ambil data untuk dropdown
$kelurahan_options = $koneksi->query("SELECT id, nama FROM kelurahan");
$unit_kerja_options = $koneksi->query("SELECT id, nama FROM unit_kerja");
$pasien_options = $koneksi->query("SELECT id, nama FROM pasien");
$dokter_options = $koneksi->query("SELECT id, nama FROM paramedik WHERE kategori='dokter'");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if ($tabel == 'pasien') {
          $kode = $_POST['kode'];
          $nama = $_POST['nama'];
          $tmp_lahir = $_POST['tmp_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $gender = $_POST['gender'];
          $email = $_POST['email'];
          $alamat = $_POST['alamat'];
          $kelurahan_id = $_POST['kelurahan_id'];

          $sql = "UPDATE pasien SET kode='$kode', nama='$nama', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', 
                gender='$gender', email='$email', alamat='$alamat', kelurahan_id='$kelurahan_id' WHERE id=$id";
     } elseif ($tabel == 'paramedik') {
          $nama = $_POST['nama'];
          $gender = $_POST['gender'];
          $tmp_lahir = $_POST['tmp_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $kategori = $_POST['kategori'];
          $telpon = $_POST['telpon'];
          $alamat = $_POST['alamat'];
          $unit_kerja_id = $_POST['unit_kerja_id'];

          $sql = "UPDATE paramedik SET nama='$nama', gender='$gender', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', 
                kategori='$kategori', telpon='$telpon', alamat='$alamat', unit_kerja_id='$unit_kerja_id' WHERE id=$id";
     } elseif ($tabel == 'periksa') {
          $tanggal = $_POST['tanggal'];
          $berat = $_POST['berat'];
          $tinggi = $_POST['tinggi'];
          $tensi = $_POST['tensi'];
          $keterangan = $_POST['keterangan'];
          $pasien_id = $_POST['pasien_id'];
          $dokter_id = $_POST['dokter_id'];

          $sql = "UPDATE periksa SET tanggal='$tanggal', berat='$berat', tinggi='$tinggi', tensi='$tensi', 
                keterangan='$keterangan', pasien_id='$pasien_id', dokter_id='$dokter_id' WHERE id=$id";
     }

     if ($koneksi->query($sql) === TRUE) {
          echo "<script>alert('Data berhasil diperbarui!'); window.location.href='index.php';</script>";
     } else {
          echo "Error: " . $sql . "<br>" . $koneksi->error;
     }
}
?>

<!DOCTYPE html>
<html>

<head>
     <title>Edit Data</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
     <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4">Edit Data <?php echo ucfirst($tabel); ?></h2>
          <form method="POST">
               <?php if ($tabel == 'pasien'): ?>
                    <input type="text" name="kode" value="<?= $data['kode']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="nama" value="<?= $data['nama']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="tmp_lahir" value="<?= $data['tmp_lahir']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir']; ?>" class="w-full px-4 py-2 border mb-2">
                    <select name="gender" class="w-full px-4 py-2 border mb-2">
                         <option value="L" <?= $data['gender'] == 'L' ? 'selected' : ''; ?>>Laki-laki</option>
                         <option value="P" <?= $data['gender'] == 'P' ? 'selected' : ''; ?>>Perempuan</option>
                    </select>
                    <input type="email" name="email" value="<?= $data['email']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="alamat" value="<?= $data['alamat']; ?>" class="w-full px-4 py-2 border mb-2">
                    <select name="kelurahan_id" class="w-full px-4 py-2 border mb-2">
                         <?php while ($row = $kelurahan_options->fetch_assoc()): ?>
                              <option value="<?= $row['id']; ?>" <?= $data['kelurahan_id'] == $row['id'] ? 'selected' : ''; ?>>
                                   <?= $row['nama']; ?>
                              </option>
                         <?php endwhile; ?>
                    </select>
               <?php elseif ($tabel == 'periksa'): ?>
                    <input type="date" name="tanggal" value="<?= $data['tanggal']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="number" name="berat" value="<?= $data['berat']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="number" name="tinggi" value="<?= $data['tinggi']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="tensi" value="<?= $data['tensi']; ?>" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="keterangan" value="<?= $data['keterangan']; ?>" class="w-full px-4 py-2 border mb-2">
                    <select name="pasien_id" class="w-full px-4 py-2 border mb-2">
                         <?php while ($row = $pasien_options->fetch_assoc()): ?>
                              <option value="<?= $row['id']; ?>" <?= $data['pasien_id'] == $row['id'] ? 'selected' : ''; ?>>
                                   <?= $row['nama']; ?>
                              </option>
                         <?php endwhile; ?>
                    </select>
                    <select name="dokter_id" class="w-full px-4 py-2 border mb-2">
                         <?php while ($row = $dokter_options->fetch_assoc()): ?>
                              <option value="<?= $row['id']; ?>" <?= $data['dokter_id'] == $row['id'] ? 'selected' : ''; ?>>
                                   <?= $row['nama']; ?>
                              </option>
                         <?php endwhile; ?>
                    </select>
               <?php endif; ?>
               <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan Perubahan</button>
          </form>
     </div>
</body>

</html>