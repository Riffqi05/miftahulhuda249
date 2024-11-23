<?php
// save_kontak.php
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $pesan = $_POST['pesan'];

    // Prevent SQL Injection
    $nama = $conn->real_escape_string($nama);
    $email = $conn->real_escape_string($email);
    $telepon = $conn->real_escape_string($telepon);
    $pesan = $conn->real_escape_string($pesan);

    $sql = "INSERT INTO tb_kontak (nama, email, telepon, pesan) VALUES ('$nama', '$email', '$telepon', '$pesan')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Kontak berhasil disimpan!'); window.location.href = 'dashboard.php?section=kontak';</script>";
    } else {
        echo "<script>alert('Gagal menyimpan kontak!'); window.location.href = 'add_kontak.php';</script>";
    }

    $conn->close();
}
?>
