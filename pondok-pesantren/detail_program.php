<?php
include 'includes/koneksi.php';
$hideCarousel = true;
include 'includes/header.php';

if (isset($_GET['id'])) {
    $id_program = $_GET['id'];
    
    // Query untuk mengambil detail program berdasarkan ID
    $sql = "SELECT * FROM tb_program WHERE id= ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_program);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $program = $result->fetch_assoc();
        ?>
        <div class="container mt-5">
            <h2><?php echo $program['nama_program']; ?></h2>
            <img src="assets/images/<?php echo $program['image']; ?>" alt="<?php echo $program['nama_program']; ?>" class="program-detail-image" style="width: 300px; height: 300px;">
            <p><?php echo $program['deskripsi']; ?></p>
            <!-- Tambahkan detail program lainnya sesuai kebutuhan -->
        </div>
        <?php
    } else {
        echo "<p>Program tidak ditemukan</p>";
    }
} else {
    echo "<p>ID program tidak tersedia</p>";
}
?>
