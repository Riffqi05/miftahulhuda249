<!-- edit_berita.php -->
<?php
include 'includes/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_berita WHERE id = $id";
$result = $conn->query($query);
$berita = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Berita</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Berita</h2>
    <form action="update_berita.php?id=<?php echo $berita['id']; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <label class="block mb-2 font-semibold">Judul Berita:</label>
        <input type="text" name="judul" value="<?php echo $berita['judul']; ?>" required class="w-full p-2 mb-4 border rounded">

        <label class="block mb-2 font-semibold">Deskripsi:</label>
        <textarea name="content" required class="w-full p-2 mb-4 border rounded"><?php echo $berita['content']; ?></textarea>

        <label class="block mb-2 font-semibold">Tanggal:</label>
        <input type="date" name="date" value="<?php echo $berita['date']; ?>" required class="w-full p-2 mb-4 border rounded">

        <label class="block mb-2 font-semibold">Gambar:</label>
        <input type="file" name="image" class="mb-4">
        <p>Current Image:</p>
        <img src="assets/images/<?php echo $berita['image']; ?>" class="h-24 w-24 rounded mb-4">

        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update</button>
    </form>
</body>
</html>
