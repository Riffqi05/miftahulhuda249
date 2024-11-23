<?php
include 'includes/koneksi.php';

// Cek apakah form dikirimkan dan data tersedia
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? '';
    $nama_program = $_POST['nama_program'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    
    // Proses gambar jika ada yang diunggah
    $uploadOk = 1;
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "assets/images/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Cek tipe file gambar
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File bukan gambar.";
            $uploadOk = 0;
        }

        // Cek ukuran file (limit 2MB)
        if ($_FILES["image"]["size"] > 2000000) {
            echo "Ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Izinkan format file tertentu
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo "Hanya format JPG, JPEG, PNG & GIF yang diperbolehkan.";
            $uploadOk = 0;
        }

        // Coba unggah file jika lolos validasi
        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["image"]["name"]);
            } else {
                echo "Terjadi kesalahan saat mengunggah gambar.";
                $uploadOk = 0;
            }
        }
    } else {
        $image = ''; // Set kosong jika tidak ada gambar baru yang diunggah
    }

    // Update database
    if ($uploadOk == 1) {
        if (!empty($image)) {
            // Update dengan gambar baru
            $sql = "UPDATE tb_program SET nama_program = ?, deskripsi = ?, image = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssi", $nama_program, $deskripsi, $image, $id);
        } else {
            // Update tanpa mengganti gambar
            $sql = "UPDATE tb_program SET nama_program = ?, deskripsi = ? WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssi", $nama_program, $deskripsi, $id);
        }

        if ($stmt->execute()) {
            // Notifikasi pop-up dan redirect menggunakan JavaScript
            echo "<script>
                alert('Program berhasil diperbarui!');
                window.location.href = 'dashboard.php'; // Arahkan ke dashboard
            </script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
} else {
    echo "Invalid request!";
}
?>
