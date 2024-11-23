<?php
include 'includes/koneksi.php';

$id = $_GET['id'];

// Query to get the image associated with the news entry
$query = "SELECT image FROM tb_berita WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($row) {
    // Delete the image file from the server
    $imagePath = 'assets/images/' . $row['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Query to delete the berita entry
    $sql = "DELETE FROM tb_berita WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Berita berhasil dihapus!'); window.location.href = 'dashboard.php?section=berita';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Berita tidak ditemukan!";
}

$conn->close();
?>
