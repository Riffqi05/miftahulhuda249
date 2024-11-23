<!-- add_berita.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
</head>
<body>
    <h2>Tambah Berita</h2>
    <form action="save_berita.php" method="POST" enctype="multipart/form-data">
        <label>Judul:</label>
        <input type="text" name="judul" required><br>
        <label>Konten:</label>
        <textarea name="content" required></textarea><br>
        <label>Image:</label>
        <input type="file" name="image" required><br>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>
