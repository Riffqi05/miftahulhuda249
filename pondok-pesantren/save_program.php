<?php
include 'includes/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari form
    $name = $_POST['nama_program'] ?? '';
    $description = $_POST['deskripsi'] ?? '';
    
    // Memproses file gambar
    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Menyimpan file gambar
        $tmpName = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']); // Lokasi dan nama file gambar
        move_uploaded_file($tmpName,"assets/images/" .$imageName);  // Memindahkan file ke folder 'images'
    }

    // Menghindari masalah SQL injection dan karakter khusus dengan mysqli_real_escape_string
    $name = $conn->real_escape_string($name);
    $description = $conn->real_escape_string($description);
    $imageName = $conn->real_escape_string($imageName);

    // Cek apakah data lengkap
    if ($name && $description && $imageName) {
        // Query untuk memasukkan data ke database
        $sql = "INSERT INTO tb_program (nama_program, deskripsi, image) VALUES ('$name', '$description', '$imageName')";

        // Eksekusi query
        if ($conn->query($sql) === TRUE) {
            echo "<script>
                    alert('Program berhasil ditambahkan!');
                    window.location.href = 'dashboard.php?section=program';
                  </script>";
        } else {
            echo "<script>
                    alert('Program gagal ditambahkan!');
                    window.location.href = 'dashboard.php?section=program';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Data tidak lengkap atau gambar gagal diunggah!');
                window.location.href = 'dashboard.php?section=program';
              </script>";
    }

    // Tutup koneksi database
    $conn->close();
}
?>
