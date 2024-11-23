<?php
include 'includes/koneksi.php';

$id = $_GET['id'];

// Delete the image file associated with this entry
$query = "SELECT image FROM tb_galeri WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();
if ($row && file_exists("assets/images/" . $row['image'])) {
    unlink("assets/images/" . $row['image']);
}

// Delete the database entry
$sql = "DELETE FROM tb_galeri WHERE id = $id";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Galeri berhasil dihapus!'); window.location.href = 'dashboard.php?section=galeri';</script>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
