<!-- add_galeri.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h2 class="text-2xl font-semibold mb-4">Tambah Galeri</h2>
    <form action="save_galeri.php" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <label class="block mb-2 font-semibold">Nama Galeri:</label>
        <input type="text" name="nama_galeri" required class="w-full p-2 mb-4 border rounded">

        <label class="block mb-2 font-semibold">Deskripsi:</label>
        <textarea name="deskripsi" required class="w-full p-2 mb-4 border rounded"></textarea>

        <label class="block mb-2 font-semibold">Upload Gambar:</label>
        <input type="file" name="image" required class="mb-4">

        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Simpan</button>
    </form>
</body>
</html>
