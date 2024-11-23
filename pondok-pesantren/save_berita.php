<?php
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $content = $_POST['content'];
    $date = date('Y-m-d');

    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $tmpName = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']);
        move_uploaded_file($tmpName, "assets/images/" . $imageName);
    }

    $sql = "INSERT INTO tb_berita (judul, date, content, image) VALUES ('$judul', '$date', '$content', '$imageName')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Berita berhasil ditambahkan!'); window.location.href = 'dashboard.php?section=berita';</script>";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>
