<?php
// add_kontak.php
include 'includes/koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-lg mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-2xl font-semibold mb-4">Tambah Kontak</h2>
        <form action="save_kontak.php" method="POST">
            <label for="nama" class="block mb-2">Nama:</label>
            <input type="text" id="nama" name="nama" required class="w-full p-2 mb-4 border rounded">
            
            <label for="email" class="block mb-2">Email:</label>
            <input type="email" id="email" name="email" required class="w-full p-2 mb-4 border rounded">
            
            <label for="telepon" class="block mb-2">Telepon:</label>
            <input type="text" id="telepon" name="telepon" required class="w-full p-2 mb-4 border rounded">
            
            <label for="pesan" class="block mb-2">Pesan:</label>
            <textarea id="pesan" name="pesan" required class="w-full p-2 mb-4 border rounded"></textarea>

            <button type="submit" class="bg-green-500 text-white p-2 rounded">Simpan Kontak</button>
        </form>
    </div>
</body>
</html>
