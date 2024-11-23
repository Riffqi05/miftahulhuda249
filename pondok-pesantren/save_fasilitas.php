<?php
include 'includes/koneksi.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $nama_fasilitas = $_POST['nama_fasilitas'] ?? '';
    $deskripsi = $_POST['deskripsi'] ?? '';
    
    // Process the image file
    $imageName = '';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        // Save the uploaded image file
        $tmpName = $_FILES['image']['tmp_name'];
        $imageName = basename($_FILES['image']['name']); // Get the image file name
        move_uploaded_file($tmpName, "assets/images/" . $imageName); // Move the file to the 'images' folder
    }

    // Prevent SQL injection and special characters with real_escape_string
    $nama_fasilitas = $conn->real_escape_string($nama_fasilitas);
    $deskripsi = $conn->real_escape_string($deskripsi);
    $imageName = $conn->real_escape_string($imageName);

    // Check if the form data is complete
    if ($nama_fasilitas && $deskripsi && $imageName) {
        // SQL query to insert data into the database
        $sql = "INSERT INTO tb_fasilitas (nama_fasilitas, deskripsi, image) VALUES ('$nama_fasilitas', '$deskripsi', '$imageName')";

        // Execute the query
        if ($conn->query($sql) === TRUE) {
            // Display success alert and redirect to the dashboard
            echo "<script>
                    alert('Fasilitas berhasil ditambahkan!');
                    window.location.href = 'dashboard.php?section=fasilitas';
                  </script>";
        } else {
            echo "<script>
                    alert('Fasilitas gagal ditambahkan! Error: " . $conn->error . "');
                    window.location.href = 'dashboard.php?section=fasilitas';
                  </script>";
        }
    } else {
        echo "<script>
                alert('Data tidak lengkap atau gambar gagal diunggah!');
                window.location.href = 'dashboard.php?section=fasilitas';
              </script>";
    }

    // Close the database connection
    $conn->close();
}
?>
