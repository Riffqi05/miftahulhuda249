<?php
session_start();
include 'includes/koneksi.php';

// Pastikan ID program tersedia
$id = isset($_GET['id']) ? $_GET['id'] : '';

if ($id) {
    // Ambil data program dari database
    $sql = "SELECT * FROM tb_program WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $program = $result->fetch_assoc();

    if (!$program) {
        die("Program tidak ditemukan!");
    }
} else {
    die("ID program tidak ditemukan!");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program</title>
</head>
<body>
    <!-- Form untuk edit program -->
    <form action="save_edit_program.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($program['id']) ? $program['id'] : ''; ?>">
        
        <label for="nama_program">Nama Program:</label>
        <input type="text" id="nama_program" name="nama_program" value="<?php echo isset($program['nama_program']) ? $program['nama_program'] : ''; ?>" required><br>

        <label for="deskripsi">Deskripsi:</label>
        <textarea id="deskripsi" name="deskripsi" required><?php echo isset($program['deskripsi']) ? $program['deskripsi'] : ''; ?></textarea><br>

        <label for="image">Gambar:</label>
        <input type="file" id="image" name="image"><br>

        <input type="submit" value="Update Program">
    </form>
</body>
</html>
