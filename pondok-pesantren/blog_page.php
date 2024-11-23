
<?php
  $sql = "SELECT * FROM tb_blog";
  if(isset($_GET['tag'])){
    $TAG=$_GET['tag'];
    $sql = "SELECT * FROM tb_blog WHERE tags LIKE '%#{$TAG}%'";
    }
    $result = $conn->query($sql);
    $count=0;
    
    if ($result->num_rows > 0) {
        $count=$result->num_rows;
        $headline = null;
        $posts = [];
        while ($row = $result->fetch_assoc()) {
            preg_match('/<p>(.*?)<\/p>/', $row['content'], $matches);
            $deskripsi = isset($matches[1]) ? $matches[1] : '';
            if ($deskripsi != '') {
                $words = explode(' ', $deskripsi);
                if (count($words) > 20) {
                    $deskripsi = implode(' ', array_slice($words, 0, 20)) . '...';
                }
            } else {
                $deskripsi = '';
            }
            if(count(explode(",",$row['tags']))>0){
                $row['tags']=explode(",",$row['tags']);
        
            }

          $row['deskripsi']=$deskripsi;
            if($row['thumbnail']==""){
                $row['thumbnail']="logo.png";
            }
            
            if ($headline === null) {
                $headline = $row;
            } else {
                $posts[] = $row;
            }
        }
    }
?>
<?php if($count>0):?>
<a href="blog.php?url=<?=$headline['url']?>" class="text-decoration-none">
<div class="container">   
    <div class="title" style="color:#333"><?=$headline['judul']?></div>
        <div class="subtitle">
                <?= $headline['deskripsi']?>
            </div>
            <div class="image">
                <img src="assets/images/blog/<?=$headline['thumbnail']?>" alt="Decorative image related to the blog post">
            </div>
            <div class="author">
                <img src="assets/images/logo.png" alt="Author's photo">
                <div class="author-info">
                    <strong>Pondok Pesantren Miftahul Huda</strong><br>
                    <?=formatDate($headline['tanggal_unggahan'])?>
                </div>
            </div>
            <div class="tags">
                 <?php foreach($headline['tags'] as $tag): if($tag!=""):?>
                    <a href="?tag=<?=substr($tag,1)?>" class="tag"><?=$tag?></a>
                <?php endif;endforeach;?>
            </div>
        </a>
    </div>
    <div class="container">
        <?php foreach($posts as $p):?>
    <a href="blog.php?url=<?=$p['url']?>" style="text-decoration:none;color:#333" class="article">
    <img src="assets/images/blog/<?=$p['thumbnail']?>"  alt="Article Image">
            <div class="article-content">
                <div class="date"><?=formatDate($p['tanggal_unggahan'])?></div>
                <div class="title"><?=$p['judul']?></div>
                <div class="deskripsi"><?= $p['deskripsi']; ?></div>
            </div>
        </a>
        <?php endforeach?>
    </div>
    
   <?php else: ?>
   <div style="height:60vh;display:flex;justify-content:center;align-items:center">

       <p style="">Artikel tidak Ditemukan <a href="blog.php">Kembali</a></p>
    </div>
   <?php endif ?>