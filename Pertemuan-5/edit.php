<?php 
     require 'config.php';

     if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $query = "SELECT * FROM prodi WHERE id = ?";
          $stmt = $koneksi->prepare($query);
          $stmt->bind_param("i", $id);
          $stmt->execute();
          $result = $stmt->get_result();
          $data = $result->fetch_assoc();

          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
               $nama_prodi = $_POST['nama_prodi'];
               $kode_prodi = $_POST['kode_prodi'];
               $kaprodi = $_POST['kaprodi'];

               $updateQuery = "UPDATE prodi SET kode = ?, nama = ?, kaprodi = ? WHERE id = ?";
               $updateStmt = $conn->prepare($updateQuery);
               $updateStmt->bind_param("ssi", $kode_prodi, $nama_prodi, $kaprodi, $id);

               if ($updateStmt->execute()) {
                    header("Location: index.php");
                    exit;
               } else {
                    echo "Error updating record: " . $conn->error;
               }
          }
     } else {
          echo "ID not provided.";
          exit;
     }
     ?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
     <form method="POST" class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
          <div class="mb-4">
               <label for="nama_prodi" class="block text-gray-700 font-bold mb-2">Nama Prodi:</label>
               <input type="text" id="nama_prodi" name="nama_prodi" value="<?php echo htmlspecialchars($data['nama']); ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
               <label for="kode_prodi" class="block text-gray-700 font-bold mb-2">Kode Prodi:</label>
               <input type="text" id="kode_prodi" name="kode_prodi" value="<?php echo htmlspecialchars($data['kode']); ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <div class="mb-4">
               <label for="kaprodi" class="block text-gray-700 font-bold mb-2">Kaprodi:</label>
               <input type="text" id="kaprodi" name="kaprodi" value="<?php echo htmlspecialchars($data['kaprodi']); ?>" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
          </div>
          <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
               Update
          </button>
     </form>
</body>
</html>
