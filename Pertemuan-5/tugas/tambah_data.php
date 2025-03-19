<?php
require 'config.php';

// Tentukan tabel yang dipilih
$tabel = isset($_GET['tabel']) ? $_GET['tabel'] : 'pasien';

// Fetch data untuk dropdown relasional
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

          $sql = "INSERT INTO pasien (kode, nama, tmp_lahir, tgl_lahir, gender, email, alamat, kelurahan_id) 
                  VALUES ('$kode', '$nama', '$tmp_lahir', '$tgl_lahir', '$gender', '$email', '$alamat', '$kelurahan_id')";
     } elseif ($tabel == 'paramedik') {
          $nama = $_POST['nama'];
          $gender = $_POST['gender'];
          $tmp_lahir = $_POST['tmp_lahir'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $kategori = $_POST['kategori'];
          $telpon = $_POST['telpon'];
          $alamat = $_POST['alamat'];
          $unit_kerja_id = $_POST['unit_kerja_id'];

          $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id) 
                  VALUES ('$nama', '$gender', '$tmp_lahir', '$tgl_lahir', '$kategori', '$telpon', '$alamat', '$unit_kerja_id')";
     } elseif ($tabel == 'periksa') {
          $tanggal = $_POST['tanggal'];
          $berat = $_POST['berat'];
          $tinggi = $_POST['tinggi'];
          $tensi = $_POST['tensi'];
          $keterangan = $_POST['keterangan'];
          $pasien_id = $_POST['pasien_id'];
          $dokter_id = $_POST['dokter_id'];

          $sql = "INSERT INTO periksa (tanggal, berat, tinggi, tensi, keterangan, pasien_id, dokter_id) 
                  VALUES ('$tanggal', '$berat', '$tinggi', '$tensi', '$keterangan', '$pasien_id', '$dokter_id')";
     }

     if ($koneksi->query($sql) === TRUE) {
          echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='index.php';</script>";
     } else {
          echo "Error: " . $sql . "<br>" . $koneksi->error;
     }
}
?>

<!DOCTYPE html>
<html>

<head>
     <title>Tambah Data</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-10">
     <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-lg">
          <h2 class="text-2xl font-bold mb-4">Tambah Data <?php echo ucfirst($tabel); ?></h2>
          <form method="POST">
               <?php if ($tabel == 'pasien'): ?>
                    <input type="text" name="kode" placeholder="Kode" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="nama" placeholder="Nama" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="w-full px-4 py-2 border mb-2">
                    <input type="date" name="tgl_lahir" class="w-full px-4 py-2 border mb-2">
                    <select name="gender" class="w-full px-4 py-2 border mb-2">
                         <option value="L">Laki-laki</option>
                         <option value="P">Perempuan</option>
                    </select>
                    <input type="email" name="email" placeholder="Email" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="alamat" placeholder="Alamat" class="w-full px-4 py-2 border mb-2">
                    <select name="kelurahan_id" class="w-full px-4 py-2 border mb-2">
                         <option value="">Pilih Kelurahan</option>
                         <?php while ($row = $kelurahan_options->fetch_assoc()): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                         <?php endwhile; ?>
                    </select>
               <?php elseif ($tabel == 'paramedik'): ?>
                    <input type="text" name="nama" placeholder="Nama" class="w-full px-4 py-2 border mb-2">
                    <select name="gender" class="w-full px-4 py-2 border mb-2">
                         <option value="L">Laki-laki</option>
                         <option value="P">Perempuan</option>
                    </select>
                    <input type="text" name="tmp_lahir" placeholder="Tempat Lahir" class="w-full px-4 py-2 border mb-2">
                    <input type="date" name="tgl_lahir" class="w-full px-4 py-2 border mb-2">
                    <select name="kategori" class="w-full px-4 py-2 border mb-2">
                         <option value="dokter">Dokter</option>
                         <option value="perawat">Perawat</option>
                         <option value="bidan">Bidan</option>
                    </select>
                    <input type="text" name="telpon" placeholder="Telpon" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="alamat" placeholder="Alamat" class="w-full px-4 py-2 border mb-2">
                    <select name="unit_kerja_id" class="w-full px-4 py-2 border mb-2">
                         <option value="">Pilih Unit Kerja</option>
                         <?php while ($row = $unit_kerja_options->fetch_assoc()): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                         <?php endwhile; ?>
                    </select>
               <?php elseif ($tabel == 'periksa'): ?>
                    <input type="date" name="tanggal" class="w-full px-4 py-2 border mb-2">
                    <input type="number" name="berat" placeholder="Berat" class="w-full px-4 py-2 border mb-2">
                    <input type="number" name="tinggi" placeholder="Tinggi" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="tensi" placeholder="Tensi" class="w-full px-4 py-2 border mb-2">
                    <input type="text" name="keterangan" placeholder="Keterangan" class="w-full px-4 py-2 border mb-2">
                    <select name="pasien_id" class="w-full px-4 py-2 border mb-2">
                         <option value="">Pilih Pasien</option>
                         <?php while ($row = $pasien_options->fetch_assoc()): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                         <?php endwhile; ?>
                    </select>
                    <select name="dokter_id" class="w-full px-4 py-2 border mb-2">
                         <option value="">Pilih Dokter</option>
                         <?php while ($row = $dokter_options->fetch_assoc()): ?>
                              <option value="<?php echo $row['id']; ?>"><?php echo $row['nama']; ?></option>
                         <?php endwhile; ?>
                    </select>
               <?php endif; ?>
               <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Simpan</button>
          </form>
     </div>
</body>

</html>