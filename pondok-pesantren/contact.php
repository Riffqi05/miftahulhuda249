<?php include 'includes/koneksi.php'?>
<?php $hideCarousel = true;?>
<?php include 'includes/header.php'?>


<div class="container mt-5 text-center">
    <h3 class="program-title">Kontak</h3>
    <div class="row mt-4">
        <?php
        // Query untuk mengambil data program
        $sql = "SELECT * FROM tb_kontak";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3 mb-4">
                    <p class="program-name" style="color: black;">Nama : <?php echo $row['nama']; ?></p>
                    <p class="program-name" style="color: black;">Email : <?php echo $row['email']; ?></p>
                    <p class="program-name" style="color: black;">Telepon : <?php echo $row['telepon']; ?></p>
                </div>
                <?php
            }
        } else {
            echo "<p>Program tidak tersedia</p>";
        }
        ?>
    </div>
</div>
