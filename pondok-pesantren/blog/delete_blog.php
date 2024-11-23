<?php

session_start();
include '../includes/koneksi.php'; 


$id = $_GET['id'];

$query = "SELECT thumbnail FROM tb_blog WHERE id = $id";
$result = $conn->query($query);
$row = $result->fetch_assoc();

if ($row) {
    if($row['thumbnail']!='logo.png' || $row['thumbnail']!=''){
        $imagePath = '../../assets/images/blog/' . $row['thumbnail'];
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    $sql = "DELETE FROM tb_blog WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Blog berhasil dihapus!'); window.location.href = '../dashboard.php?section=blog';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Blog tidak ditemukan!";
}

$conn->close();
?>
