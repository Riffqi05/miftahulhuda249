<?php
session_start();
include 'includes/koneksi.php';

// Fungsi untuk menampilkan konten berdasarkan menu
function displayContent($section, $conn) {
    switch($section) {
        case 'program':
            ?>
            <h2 class="text-2xl font-semibold mb-4">Data Program</h2>
            <!-- Form untuk tambah data program -->
            <form action="add_program.php" method="POST" class="mb-6">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Tambah Program</button>
            </form>

            <table class="min-w-full bg-white border border-gray-300 rounded shadow table-auto">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-300">
                        <th class="py-2 px-4 text-center border-r border-gray-300">ID</th>
                        <th class="py-2 px-4 text-center border-r border-gray-300">Nama Program</th>
                        <th class="py-2 px-4 text-center border-r border-gray-300">Deskripsi</th>
                        <th class="py-2 px-4 text-center border-r border-gray-300">Image</th>
                        <th class="py-2 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tb_program";
                    $result = $conn->query($query);
                    
                    while($row = $result->fetch_assoc()) {
                        $img = 'assets/images/' . $row['image'];
                        echo "<tr class='hover:bg-gray-50 border-b border-gray-300'>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['id']}</td>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['nama_program']}</td>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['deskripsi']}</td>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'><img src='$img' alt='Program Image' class='h-12 w-12 rounded-full'></td>";
                        echo "<td class='py-2 px-4 text-center'>
                                <a href='edit_program.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> | 
                                <a href='delete_program.php?id={$row['id']}' class='text-red-500 hover:underline'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            break;
            case 'blog':
                ?>
                <h2 class="text-2xl font-semibold mb-4">Data Blog</h2>
                <a href="blog/add_blog.php" class="bg-blue-500 text-white p-2 rounded mb-4">Tambah Blog</a>
                
            
                <table class="min-w-full mt-4 bg-white border border-gray-300 rounded shadow table-auto">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-300">
                            <th class="py-2 px-4 text-center border-r border-gray-300">#</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Judul </th>
                            <th class="py-2 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tb_blog";
                        $result = $conn->query($query);
                        $iteration=1;
                        while($row = $result->fetch_assoc()) {

                            echo "<tr class='hover:bg-gray-50 border-b border-gray-300'>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$iteration}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['judul']}</td>";
                            echo "<td class='py-2 px-4 text-center'>
                                    <a href='blog/edit_blog.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> | 
                                    <a href='blog/delete_blog.php?id={$row['id']}' class='text-red-500 hover:underline'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        $iteration++;
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                break;

        // Tambahkan case lainnya untuk menu yang berbeda
        case 'fasilitas':
            ?>
            <h2 class="text-2xl font-semibold mb-4">Data Fasilitas</h2>
            <!-- Form untuk tambah data fasilitas -->
            <form action="add_fasilitas.php" method="POST" class="mb-6">
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">Tambah Fasilitas</button>
            </form>

            <table class="min-w-full bg-white border border-gray-300 rounded shadow table-auto">
                <thead>
                    <tr class="bg-gray-100 border-b border-gray-300">
                        <th class="py-2 px-4 text-center border-r border-gray-300">ID</th>
                        <th class="py-2 px-4 text-center border-r border-gray-300">Nama Fasilitas</th>
                        <th class="py-2 px-4 text-center border-r border-gray-300">Deskripsi</th>
                        <th class="py-2 px-4 text-center border-r border-gray-300">Image</th>
                        <th class="py-2 px-4 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM tb_fasilitas";
                    $result = $conn->query($query);
                    
                    while($row = $result->fetch_assoc()) {
                        $img = 'assets/images/' . $row['image'];
                        echo "<tr class='hover:bg-gray-50 border-b border-gray-300'>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['id']}</td>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['nama_fasilitas']}</td>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['deskripsi']}</td>";
                        echo "<td class='py-2 px-4 text-center border-r border-gray-300'><img src='$img' alt='Fasilitas Image' class='h-12 w-12 rounded-full'></td>";
                        echo "<td class='py-2 px-4 text-center'>
                                <a href='edit_fasilitas.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> | 
                                <a href='delete_fasilitas.php?id={$row['id']}' class='text-red-500 hover:underline'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <?php
            break;

            case 'berita':
                ?>
                <h2 class="text-2xl font-semibold mb-4">Data Berita</h2>
                <form action="add_berita.php" method="POST" class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Tambah Berita</button>
                </form>
                
                <table class="min-w-full bg-white border border-gray-300 rounded shadow table-auto">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-300">
                            <th class="py-2 px-4 text-center border-r border-gray-300">ID</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Judul</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Tanggal</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Konten</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Image</th>
                            <th class="py-2 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tb_berita";
                        $result = $conn->query($query);
                        
                        while($row = $result->fetch_assoc()) {
                            $img = 'assets/images/' . $row['image'];
                            echo "<tr class='hover:bg-gray-50 border-b border-gray-300'>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['id']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['judul']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['date']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['content']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'><img src='$img' alt='Berita Image' class='h-12 w-12 rounded-full'></td>";
                            echo "<td class='py-2 px-4 text-center'>
                                    <a href='edit_berita.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> | 
                                    <a href='delete_berita.php?id={$row['id']}' class='text-red-500 hover:underline'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                break;
    
            case 'galeri':
                ?>
                <h2 class="text-2xl font-semibold mb-4">Data Galeri</h2>
                <form action="add_galeri.php" method="POST" class="mb-6">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded">Tambah Galeri</button>
                </form>
    
                <table class="min-w-full bg-white border border-gray-300 rounded shadow table-auto">
                    <thead>
                        <tr class="bg-gray-100 border-b border-gray-300">
                            <th class="py-2 px-4 text-center border-r border-gray-300">ID</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Nama Galeri</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Deskripsi</th>
                            <th class="py-2 px-4 text-center border-r border-gray-300">Image</th>
                            <th class="py-2 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tb_galeri";
                        $result = $conn->query($query);
                        
                        while($row = $result->fetch_assoc()) {
                            $img = 'assets/images/' . $row['image'];
                            echo "<tr class='hover:bg-gray-50 border-b border-gray-300'>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['id']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['nama_galeri']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['deskripsi']}</td>";
                            echo "<td class='py-2 px-4 text-center border-r border-gray-300'><img src='$img' alt='Galeri Image' class='h-12 w-12 rounded-full'></td>";
                            echo "<td class='py-2 px-4 text-center'>
                                    <a href='edit_galeri.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> | 
                                    <a href='delete_galeri.php?id={$row['id']}' class='text-red-500 hover:underline'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                break;

                case 'kontak':
                    ?>
                    <h2 class="text-2xl font-semibold mb-4">Data Kontak</h2>
                    <!-- Form untuk tambah data kontak -->
                    <form action="add_kontak.php" method="POST" class="mb-6">
                        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Tambah Kontak</button>
                    </form>
        
                    <table class="min-w-full bg-white border border-gray-300 rounded shadow table-auto">
                        <thead>
                            <tr class="bg-gray-100 border-b border-gray-300">
                                <th class="py-2 px-4 text-center border-r border-gray-300">ID</th>
                                <th class="py-2 px-4 text-center border-r border-gray-300">Nama</th>
                                <th class="py-2 px-4 text-center border-r border-gray-300">Email</th>
                                <th class="py-2 px-4 text-center border-r border-gray-300">Telepon</th>
                                <th class="py-2 px-4 text-center border-r border-gray-300">Pesan</th>
                                <th class="py-2 px-4 text-center">Tanggal</th>
                                <th class="py-2 px-4 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM tb_kontak";
                            $result = $conn->query($query);
                            
                            while($row = $result->fetch_assoc()) {
                                echo "<tr class='hover:bg-gray-50 border-b border-gray-300'>";
                                echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['id']}</td>";
                                echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['nama']}</td>";
                                echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['email']}</td>";
                                echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['telepon']}</td>";
                                echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['pesan']}</td>";
                                echo "<td class='py-2 px-4 text-center border-r border-gray-300'>{$row['tanggal']}</td>";
                                echo "<td class='py-2 px-4 text-center'>
                                        <a href='edit_kontak.php?id={$row['id']}' class='text-blue-500 hover:underline'>Edit</a> | 
                                        <a href='delete_kontak.php?id={$row['id']}' class='text-red-500 hover:underline'>Hapus</a>
                                      </td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    break;
        
        default:
            echo "<h2 class='text-2xl font-semibold mb-4'>Beranda</h2>";
            echo "<p>Selamat datang di dashboard admin.</p>";
            break;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <aside class="bg-gray-800 text-white w-64 p-6 space-y-4">
            <h2 class="text-2xl font-semibold mb-6">Admin Dashboard</h2>
            <nav class="space-y-4">
                <a href="?section=beranda" class="block py-2 px-4 rounded hover:bg-gray-700">Beranda</a>
                <a href="?section=program" class="block py-2 px-4 rounded hover:bg-gray-700">Program</a>
                <a href="?section=blog" class="block py-2 px-4 rounded hover:bg-gray-700">Blog</a>
                <a href="?section=fasilitas" class="block py-2 px-4 rounded hover:bg-gray-700">Fasilitas</a>
                <a href="?section=berita" class="block py-2 px-4 rounded hover:bg-gray-700">Berita</a>
                <a href="?section=galeri" class="block py-2 px-4 rounded hover:bg-gray-700">Galeri</a>
                <a href="?section=kontak" class="block py-2 px-4 rounded hover:bg-gray-700">Kontak</a>
                <a href="index.php" class="block py-2 px-4 rounded hover:bg-gray-700 text-red-500">Logout</a>
            </nav>
        </aside>
        
        <!-- Main Content -->
        <div class="flex-1 p-6">
            <h2 class="text-3xl font-semibold mb-6">Dashboard Admin</h2>
            <?php
            // Tampilkan konten berdasarkan section yang dipilih
            $section = isset($_GET['section']) ? $_GET['section'] : 'beranda';
            displayContent($section, $conn);
            ?>
        </div>
    </div>
</body>
</html>
