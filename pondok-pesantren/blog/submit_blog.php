<?php
session_start();
include '../includes/koneksi.php'; 
function ekstensi($name){
    $name=explode(".",$name);
    return ".".end($name);
}

 $now=(date('Y-m-d H:i:s'));
$thumbnail="";
if (isset($_FILES['thumbnail']) && $_FILES['thumbnail']['error'] === UPLOAD_ERR_OK) {
      $tmpName = $_FILES['thumbnail']['tmp_name'];
    $imageName = basename($_POST['url'].ekstensi($_FILES['thumbnail']['name'])); 
$thumbnail=$imageName;
    move_uploaded_file($tmpName, "../assets/images/blog/" . $imageName); 
}
$judul=$conn->real_escape_string($_POST["judul"]);
$tag=$conn->real_escape_string($_POST["tags"]);
$content=$conn->real_escape_string($_POST["editor"]);
$url=$conn->real_escape_string($_POST["url"]);
$content=htmlspecialchars($content);
$username = $_SESSION['username'];
 $id = mysqli_fetch_assoc( mysqli_query($conn, "SELECT * FROM users WHERE username='$username'"))["Id"];
 $sql = "INSERT INTO tb_blog VALUES ('','$judul','$url','$thumbnail','$content','$tag','$now','$id')";

 if ($conn->query($sql) === TRUE) {
     echo "<script>
             alert('Blog berhasil ditambahkan!');
             window.location.href = '../dashboard.php?section=blog';
           </script>";
 } else {
     echo "<script>
             alert('Blog gagal ditambahkan! Error: " . $conn->error . "');
             window.location.href = '../dashboard.php?section=blog';
           </script>";
 }

$conn->close();
?>