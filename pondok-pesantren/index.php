<!-- index.php -->
<?php include 'includes/header.php'; ?>
<?php include 'includes/koneksi.php'?>

<div class="container mt-4">
  <div class="row align-items-center ">
    <div class="col text-center" style="margin-right: 300px;">
      <img src="assets/images/Fau.jpg" alt="" style="width: 300px;">
      <p>Pimpinan <br> Pondok Pesantren</p>
    </div>
    <div class="col-6 text-center">
      <h3>Visi dan Misi</h3>
      <h4>Visi</h4>
      <ol class="list-group-numbered">
        <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, earum!</li>
        <li class="list-group-item">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati quasi ducimus inventore soluta atque quidem dicta quis asperiores facilis aspernatur.</li>
        <li class="list-group-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque nihil placeat necessitatibus ipsa, nam exercitationem natus quisquam obcaecati possimus pariatur eum vitae quae optio nostrum nemo. Non, pariatur tempore?</li>
      </ol>
      <h4>Misi</h4>
      <ol class="list-group-numbered">
        <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, earum!</li>
        <li class="list-group-item">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati quasi ducimus inventore soluta atque quidem dicta quis asperiores facilis aspernatur.</li>
        <li class="list-group-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque nihil placeat necessitatibus ipsa, nam exercitationem natus quisquam obcaecati possimus pariatur eum vitae quae optio nostrum nemo. Non, pariatur tempore?</li>
        <li class="list-group-item">Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi, earum!</li>
        <li class="list-group-item">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Obcaecati quasi ducimus inventore soluta atque quidem dicta quis asperiores facilis aspernatur.</li>
        <li class="list-group-item">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur itaque nihil placeat necessitatibus ipsa, nam exercitationem natus quisquam obcaecati possimus pariatur eum vitae quae optio nostrum nemo. Non, pariatur tempore?</li>
      </ol>
    </div>
  </div>
</div>


<!-- SECTION 1 -->

<div class="container mt-5 text-center">
    <h3 class="program-title">PROGRAM</h3>
    <div class="row mt-4 d-flex justify-content-center">
        <?php
        // Query untuk mengambil data program
        $sql = "SELECT * FROM tb_program";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="col-md-3 mb-4">
                    <!-- Bungkus dengan <a> agar bisa diklik -->
                        <a href="detail_program.php?id=<?php echo $row['id']; ?>" class="text-decoration-none">
                        <div class="program-card">
                            <img src="assets/images/<?php echo $row['image']; ?>" class="program-image" alt="<?php echo $row['nama_program']; ?>" style="height: 300px; width: 300px;">
                            <div class="overlay">
                                <div class="text-overlay"><?php echo strtoupper($row['nama_program']); ?></div>
                            </div>
                        </div>
                        <p class="program-name"><?php echo $row['nama_program']; ?></p>
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

<style>
.card-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.card {
  margin: 20px;
  margin-top: 50px;
  margin-left: 10px;
  text-align: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 330px;
  height: 500px;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}

.container {
  padding: 2px 16px;
}
svg {
    width: 20px;
    margin: 6px;
}
.container p{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-bottom: 0;
}
</style>
<div class="container mt-5 text-center">
    <h3 class="program-title">BERITA DAN ARTIKEL</h3>
    <div class="card-container">

    <?php
    $sql = "SELECT * FROM tb_blog LIMIT 6";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            ?>
            <div class="card">
            <a href="blog.php?url=<?php echo urlencode($row['url']); ?>" class="text-decoration-none" style="color: black;">
            <img src="assets/images/blog/<?php echo $row['thumbnail']; ?>" class="card-img-top" alt="<?php echo $row['judul']; ?>" style="height: 300px; width: 300px;">
              <div class="container">
              <h5 class="card-title"><?php echo substr($row['judul'], 0, 50); ?>...</h5>
              <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M128 0c17.7 0 32 14.3 32 32l0 32 128 0 0-32c0-17.7 14.3-32 32-32s32 14.3 32 32l0 32 48 0c26.5 0 48 21.5 48 48l0 48L0 160l0-48C0 85.5 21.5 64 48 64l48 0 0-32c0-17.7 14.3-32 32-32zM0 192l448 0 0 272c0 26.5-21.5 48-48 48L48 512c-26.5 0-48-21.5-48-48L0 192zm64 80l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm128 0l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zM64 400l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16zm144-16c-8.8 0-16 7.2-16 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0zm112 16l0 32c0 8.8 7.2 16 16 16l32 0c8.8 0 16-7.2 16-16l0-32c0-8.8-7.2-16-16-16l-32 0c-8.8 0-16 7.2-16 16z"/></svg><?php echo date('d/m/Y', strtotime($row['tanggal_unggahan'])); ?></p>
              <p class="card-text" style="margin-top: 0;"><?php echo (html_entity_decode(substr($row ['content'], 0, 100))); ?>...</p>
              </div>
            </div>
            <?php
        }
        
    }else{
        echo "<p>Belum ada artikel.</p>";
    }
    ?>
</div>
</div>


<div class="container text-center ">
    <button type="button" id="button-berita" class="btn btn-lg mt-4" style="background-color: #24a148; color: #fff; font-family: 'Poppins'; margin-bottom: 50px;"><a href="blog.php" style="text-decoration: none; color: #fff;"><b>BERITA LAINNYA</b></a></button>
</div>

<div class="container mt-5 text-center">
    <h3 class="program-title">MAPS</h3>
    <div class="maps mt-4 mb-4">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.9245460036855!2d108.31167317454397!3d-7.134724169978807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f473c2cb4534d%3A0xa049efadf5625024!2sPondok%20Pesantren%20MIFTAHUL%20HUDA%20249!5e0!3m2!1sid!2sid!4v1730802634903!5m2!1sid!2sid" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
