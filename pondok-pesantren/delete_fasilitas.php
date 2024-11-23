<?php
include 'includes/koneksi.php';

$id = $_GET['id'] ?? '';

if ($id) {
    $sql = "DELETE FROM tb_fasilitas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Fasilitas berhasil dihapus!');
                window.location.href = 'dashboard.php?section=fasilitas';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    echo "ID fasilitas tidak ditemukan!";
}
?>
