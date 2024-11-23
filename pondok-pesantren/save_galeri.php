<?php
include 'includes/koneksi.php';

$nama_galeri = $_POST['nama_galeri'];
$deskripsi = $_POST['deskripsi'];

// Handle image upload
$imageName = basename($_FILES['image']['name']);
$tmpName = $_FILES['image']['tmp_name'];
move_uploaded_file($tmpName, "assets/images/" . $imageName);

// Insert into the database
$sql = "INSERT INTO tb_galeri (nama_galeri, deskripsi, image) VALUES ('$nama_galeri', '$deskripsi', '$imageName')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Galeri berhasil ditambahkan!'); window.location.href = 'dashboard.php?section=galeri';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
