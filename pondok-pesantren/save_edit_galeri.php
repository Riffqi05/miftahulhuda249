<?php
include 'includes/koneksi.php';

$id = $_GET['id'];
$nama_galeri = $_POST['nama_galeri'];
$deskripsi = $_POST['deskripsi'];

$imageName = '';
if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmpName = $_FILES['image']['tmp_name'];
    $imageName = basename($_FILES['image']['name']);
    move_uploaded_file($tmpName, "assets/images/" . $imageName);
    $imageUpdate = ", image='$imageName'";
} else {
    $imageUpdate = '';
}

$sql = "UPDATE tb_galeri SET nama_galeri='$nama_galeri', deskripsi='$deskripsi' $imageUpdate WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Galeri berhasil diperbarui!'); window.location.href = 'dashboard.php?section=galeri';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
