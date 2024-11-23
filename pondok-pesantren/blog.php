<?php include 'includes/koneksi.php'?>
<?php include 'dateFormat.php'?>
<?php $hideCarousel = true;?>
<?php include 'includes/header_blog.php'?>

    <?php if(isset($_GET['url'])):?>
    
        <?php include 'blog_read.php'?>
        <?php else:?>
            <?php include 'blog_page.php'?>
    <?php endif?>

<?php include 'includes/footer.php'; ?>