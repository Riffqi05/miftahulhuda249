<!-- edit_galeri.php -->
<?php
include 'includes/koneksi.php';

$id = $_GET['id'];
$query = "SELECT * FROM tb_galeri WHERE id = $id";
$result = $conn->query($query);
$galeri = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-6">
    <h2 class="text-2xl font-semibold mb-4">Edit Galeri</h2>
    <form action="save_edit_galeri.php?id=<?php echo $galeri['id']; ?>" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        <label class="block mb-2 font-semibold">Nama Galeri:</label>
        <input type="text" name="nama_galeri" value="<?php echo $galeri['nama_galeri']; ?>" required class="w-full p-2 mb-4 border rounded">

        <label class="block mb-2 font-semibold">Deskripsi:</label>
        <textarea name="deskripsi" required class="w-full p-2 mb-4 border rounded"><?php echo $galeri['deskripsi']; ?></textarea>

        <label class="block mb-2 font-semibold">Gambar:</label>
        <input type="file" name="image" class="mb-4">
        <p>Current Image:</p>
        <img src="assets/images/<?php echo $galeri['image']; ?>" class="h-24 w-24 rounded mb-4">

        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Galeri</button>
    </form>
</body>
</html>
