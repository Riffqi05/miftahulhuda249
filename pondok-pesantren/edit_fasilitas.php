<?php
include 'includes/koneksi.php';

$id = $_GET['id'] ?? '';

if ($id) {
    $sql = "SELECT * FROM tb_fasilitas WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $fasilitas = $result->fetch_assoc();

    if (!$fasilitas) {
        die("Fasilitas tidak ditemukan!");
    }
} else {
    die("ID fasilitas tidak ditemukan!");
}
?>

<!-- Form untuk edit fasilitas -->
<form action="save_edit_fasilitas.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $fasilitas['id']; ?>">
    
    <label for="nama_fasilitas">Nama Fasilitas:</label>
    <input type="text" id="nama_fasilitas" name="nama_fasilitas" value="<?php echo $fasilitas['nama_fasilitas']; ?>" required><br>

    <label for="deskripsi">Deskripsi:</label>
    <textarea id="deskripsi" name="deskripsi" required><?php echo $fasilitas['deskripsi']; ?></textarea><br>

    <label for="image">Gambar:</label>
    <input type="file" id="image" name="image"><br>

    <input type="submit" value="Update Fasilitas">
</form>
