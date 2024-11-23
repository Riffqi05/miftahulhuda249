<?php
session_start();
include '../includes/koneksi.php'; 
function ekstensi($name){
    $name=explode(".",$name);
    return ".".end($name);
}
$id=$conn->real_escape_string($_GET['id']);
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

 $sql = "UPDATE tb_blog SET 
 judul='$judul',
 tags='$tag',
 content='$content',
 url='$url'
  WHERE id='$id'";

 // Execute the query
 if ($conn->query($sql) === TRUE) {
     // Display success alert and redirect to the dashboard
     echo "<script>
             alert('Blog berhasil diubah!');
             window.location.href = '../dashboard.php?section=blog';
           </script>";
 } else {
     echo "<script>
             alert('Blog gagal diubah! Error: " . $conn->error . "');
             window.location.href = '../dashboard.php?section=blog';
           </script>";
 }

// Close the database connection
$conn->close();
?>