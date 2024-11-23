<?php include 'includes/koneksi.php'; ?>

<?php
// Inisialisasi variabel untuk menghindari error
$count = 0;

// Periksa apakah 'url' ada di dalam $_GET
if (isset($_GET['url'])) {
    $url = $_GET['url'];
    
    // Query untuk mendapatkan data artikel berdasarkan url
    $sql = "SELECT * FROM tb_blog WHERE url='$url'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $count = $result->num_rows;
        $headline = $result->fetch_assoc();

        // Gunakan default thumbnail jika kosong
        $headline['thumbnail'] = $headline['thumbnail'] ?: 'logo.png';
        $headline['tags'] = explode(",", $headline['tags']);
    }
} else {
    echo "<p>URL artikel tidak ditemukan.</p>";
}
?>

<?php if ($count > 0): ?>
<div class="container">   
    <div class="image">
        <img src="assets/images/blog/<?= htmlspecialchars($headline['thumbnail']); ?>" alt="Image related to the blog post">
    </div>
    <div class="title"><?= htmlspecialchars($headline['judul']); ?></div>
    <div class="author">
        <img src="assets/images/logo.png" alt="Author's photo">
        <div class="author-info">
            <strong>Pondok Pesantren Miftahul Huda</strong><br>
            <?= date("d F Y", strtotime($headline['tanggal_unggahan'])); ?>
        </div>
    </div>
    <div class="post-content">
        <?= html_entity_decode($headline['content']); ?>
    </div>
    <div class="tags">
        <?php foreach ($headline['tags'] as $tag): if (trim($tag) !== ""): ?>
            <a href="blog.php?tag=<?= urlencode(substr(trim($tag), 1)); ?>" class="tag"><?= htmlspecialchars($tag); ?></a>
        <?php endif; endforeach; ?>
    </div>
</div>
<?php else: ?>
<p>Artikel tidak ditemukan.</p>
<?php endif; ?>
