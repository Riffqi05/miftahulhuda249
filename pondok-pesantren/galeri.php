<?php include 'includes/koneksi.php'?>
<?php $hideCarousel = true;?>
<?php include 'includes/header.php'?>


<div class="container mt-5 text-center">
    <h3 class="program-title">Galeri</h3>
    <div class="row mt-4">
        <?php
        // Query untuk mengambil data program
        $sql = "SELECT * FROM tb_galeri";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3 mb-4">
                    <!-- Bungkus dengan <a> agar bisa diklik -->
                        <a href="detail_fasilitas.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                        <div class="program-card">
                            <img src="assets/images/<?php echo $row['image']; ?>" class="program-image" alt="<?php echo $row['nama_galeri']; ?>">
                        </div>
                        <p class="program-name"><?php echo $row['nama_galeri']; ?></p>
                        </a>
                </div>
                <?php
            }
        } else {
            echo "<p>Program tidak tersedia</p>";
        }
        ?>
    </div>
</div>
