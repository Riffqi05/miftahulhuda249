<?php
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nama_fasilitas = $_POST['nama_fasilitas'];
    $deskripsi = $_POST['deskripsi'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $image = basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        $sql = "UPDATE tb_fasilitas SET nama_fasilitas = ?, deskripsi = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $nama_fasilitas, $deskripsi, $image, $id);
    } else {
        $sql = "UPDATE tb_fasilitas SET nama_fasilitas = ?, deskripsi = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssi", $nama_fasilitas, $deskripsi, $id);
    }

    if ($stmt->execute()) {
        echo "<script>
                alert('Fasilitas berhasil diperbarui!');
                window.location.href = 'dashboard.php?section=fasilitas';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }
}
?>
