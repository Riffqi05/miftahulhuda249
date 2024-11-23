<?php
// delete_kontak.php
include 'includes/koneksi.php';

// Pastikan id kontak yang akan dihapus ada
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Query untuk menghapus data kontak berdasarkan ID
    $sql = "DELETE FROM tb_kontak WHERE id = $id";
    
    // Mengeksekusi query untuk menghapus
    if ($conn->query($sql) === TRUE) {
        echo "<script>
                if (confirm('Kontak berhasil dihapus. Apakah Anda ingin kembali ke dashboard kontak?')) {
                    window.location.href = 'dashboard.php?section=kontak';
                } else {
                    window.location.href = 'dashboard.php?section=kontak';
                }
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus kontak!');
                window.location.href = 'dashboard.php?section=kontak';
              </script>";
    }
    
    $conn->close();
} else {
    echo "<script>alert('ID tidak ditemukan!'); window.location.href = 'dashboard.php?section=kontak';</script>";
}
?>
