<?php include 'includes/header.php'; ?>
<?php include 'includes/koneksi.php.php'; // File koneksi database ?>

<?php
// Cek apakah ID ada di URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mengambil berita berdasarkan ID
    $sql = "SELECT judul, date, content, image FROM news WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Menampilkan berita jika ditemukan
        $row = $result->fetch_assoc();
        ?>
        <div class="container mt-5">
            <h3 class="program-title"><?php echo $row['judul']; ?></h3>
            <p><?php echo date('d/m/Y', strtotime($row['date'])); ?></p>
            <img src="assets/images/<?php echo $row['image']; ?>" class="img-fluid mb-4" alt="<?php echo $row['judul']; ?>">
            <p class="card-text"><?php echo $row['content']; ?></p>
        </div>
        <?php
    } else {
        echo "<p>Berita tidak ditemukan.</p>";
    }
} else {
    echo "<p>ID berita tidak disediakan.</p>";
}
?>

<?php include 'includes/footer.php'; ?>
