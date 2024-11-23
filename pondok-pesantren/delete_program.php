<?php
include 'includes/koneksi.php';

// Pastikan id ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ambil data program dari database untuk mendapatkan nama file gambar
    $sql = "SELECT image FROM tb_program WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $program = $result->fetch_assoc();

    if ($program) {
        // Menghapus gambar jika ada
        if (file_exists($program['image']) && $program['image'] != 'images/default.jpg') { // Pastikan gambar bukan default
            unlink($program['image']); // Menghapus file gambar dari server
        }

        // Menghapus data program dari database
        $sql = "DELETE FROM tb_program WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo "<script>alert('Program berhasil dihapus!'); window.location.href = 'dashboard.php?section=program';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Program tidak ditemukan!";
    }

    $conn->close();
} else {
    echo "ID program tidak ditemukan!";
}
?>
