<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tambah Program</title>
<style>
    /* Body Styling */
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f4f3;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    /* Form Container Styling */
    .form-container {
        background-color: #ffffff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 90%;
        max-width: 400px;
    }

    /* Title Styling */
    .form-container h2 {
        color: #2d6a4f;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form Group Styling */
    .form-group {
        margin-bottom: 15px;
    }

    /* Label Styling */
    label {
        display: block;
        margin-bottom: 6px;
        font-weight: bold;
        color: #4f8a5f;
    }

    /* Input, Textarea, and File Styling */
    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #c2dccb;
        border-radius: 6px;
        outline: none;
        transition: border-color 0.3s ease;
        font-size: 14px;
        background-color: #f9fcfb;
    }

    /* Input Focus Styling */
    input[type="text"]:focus,
    textarea:focus,
    input[type="file"]:focus {
        border-color: #2d6a4f;
    }

    /* Textarea Styling */
    textarea {
        resize: vertical;
        min-height: 100px;
    }

    /* Button Styling */
    button[type="submit"] {
        width: 100%;
        padding: 12px;
        background-color: #2d6a4f;
        color: #ffffff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    /* Button Hover Effect */
    button[type="submit"]:hover {
        background-color: #1b4d37;
    }
</style>
</head>
<body>

<div class="form-container">
    <h2>Tambah Program</h2>
    <form action="save_program.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nama_program">Nama Program:</label>
            <input type="text" id="nama_program" name="nama_program" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi Program:</label>
            <textarea id="deskripsi" name="deskripsi" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Upload Gambar:</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>

        <button type="submit">Tambah Program</button>
    </form>
</div>

</body>
</html>
