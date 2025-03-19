<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.2/dist/tailwind.min.css">
</head>
<body>
     <form action="proses.php" method="post" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
          <h2 class="text-2xl font-bold mb-4 text-center">Tambah Data Prodi</h2>
          <div class="mb-4">
               <label for="kode" class="block text-sm font-medium text-gray-700">Kode Prodi</label>
               <input type="text" name="kode" id="kode" placeholder="Kode Prodi" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
          <div class="mb-4">
               <label for="nama" class="block text-sm font-medium text-gray-700">Nama Prodi</label>
               <input type="text" name="nama" id="nama" placeholder="Nama Prodi" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
          <div class="mb-4">
               <label for="kaprodi" class="block text-sm font-medium text-gray-700">Ketua Prodi</label>
               <input type="text" name="kaprodi" id="kaprodi" placeholder="Ketua Prodi" 
                       class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
          </div>
          <div class="text-center">
               <button type="submit" name="submit" 
                         class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                    Tambah Data
               </button>
          </div>
     </form>
</body>
</html>
