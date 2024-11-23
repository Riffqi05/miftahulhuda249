-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2024 at 10:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pondok_pesantren`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_berita`
--

INSERT INTO `tb_berita` (`id`, `judul`, `date`, `content`, `image`) VALUES
(1, 'Penerimaan peserta didik baru', '2024-11-07', 'penerimaan peserta didik baru tahun ajaran 2025 - 2026', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_blog`
--

CREATE TABLE `tb_blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `url` varchar(150) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `tags` text NOT NULL,
  `tanggal_unggahan` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_blog`
--

INSERT INTO `tb_blog` (`id`, `judul`, `url`, `thumbnail`, `content`, `tags`, `tanggal_unggahan`, `user_id`) VALUES
(12, 'Menelusuri Kehidupan di Pesantren: Antara Ilmu dan Iman', 'menelusuri-kehidupan-di-pesantren', 'logo.png', '<p>Pesantren merupakan sebuah lembaga pendidikan tradisional yang memadukan pembelajaran akademik dengan pendidikan agama. Dalam kehidupan sehari-harinya, para santri belajar berbagai disiplin ilmu mulai dari tafsir Al-Qur\'an, hadits, hingga ilmu sosial. Kehidupan di pesantren mengajarkan kedisiplinan, kesederhanaan, dan nilai kebersamaan.</p><p>Salah satu keunikan pesantren adalah kegiatan subuhan, di mana para santri bangun sebelum fajar untuk melaksanakan sholat tahajud, membaca Al-Qur\'an, dan dilanjutkan dengan sholat subuh berjamaah. Tradisi ini tidak hanya memperkuat kedekatan dengan Tuhan, tetapi juga membangun semangat persaudaraan di antara santri.</p>', '#Pesantren, #Pendidikan Islam, #Kehidupan Santri', '2024-11-13 08:00:00', 1),
(13, 'Kegiatan Subuh di Pesantren: Membentuk Karakter Disiplin', 'kegiatan-subuh-di-pesantren', 'logo.png', '<p>Kegiatan subuhan di pesantren dimulai dengan bangun di sepertiga malam terakhir. Para santri melaksanakan sholat tahajud, disusul membaca Al-Qur\'an secara bersama-sama hingga waktu subuh tiba. Kemudian, mereka melanjutkan dengan sholat subuh berjamaah dan mendengarkan ceramah pendek yang menginspirasi.</p>', '#Subuhan, #Disiplin, #Tradisi Pesantren', '2024-11-13 09:00:00', 1),
(14, 'Mengapa Pesantren Menjadi Pilihan Pendidikan yang Tepat?', 'mengapa-pesantren-menjadi-pilihan', 'logo.png', '<p>Pesantren bukan hanya tempat belajar agama, tetapi juga tempat menimba ilmu kehidupan. Pendidikan karakter yang ditekankan di pesantren melatih para santri untuk hidup mandiri, berdisiplin, dan saling menghormati satu sama lain.</p><p>Pendidikan berbasis nilai-nilai agama ini membantu membentuk individu yang tangguh secara spiritual dan mental.</p>', '#Pendidikan, #Pilihan Pesantren, #Nilai-nilai Islam', '2024-11-13 10:00:00', 1),
(15, 'Mengenal Lebih Dekat Program Keterampilan di Pesantren', 'program-keterampilan-di-pesantren', 'logo.png', '<p>Pondok pesantren masa kini tidak hanya fokus pada ilmu agama, tetapi juga keterampilan tambahan seperti teknologi informasi, bahasa asing, dan kewirausahaan. Program ini dirancang untuk mempersiapkan santri menghadapi dunia luar dengan keahlian yang relevan.</p>', '#Keterampilan, #IT, #Program Pesantren', '2024-11-13 11:00:00', 1),
(16, 'Pesantren Modern: Harmoni antara Ilmu Agama dan Umum', 'pesantren-modern', 'logo.png', '<p>Pesantren modern memadukan pembelajaran agama dengan ilmu umum seperti matematika, sains, dan bahasa Inggris. Hal ini membuat para santri lebih siap bersaing di dunia akademik maupun profesional tanpa kehilangan nilai-nilai keagamaan.</p>', '#Pesantren Modern, #Ilmu Agama, #Pendidikan Umum', '2024-11-13 12:00:00', 1),
(18, 'Pondok subuhan', 'Pondok-subuhan', 'Pondok-subuhan.jpg', '&lt;p&gt;Pondok Subuhan adalah sebuah tradisi yang penuh makna dan menjadi bagian tak terpisahkan dari kehidupan di beberapa pesantren. Acara ini diadakan setiap pagi sebelum fajar menyingsing, di mana para santri berkumpul untuk melaksanakan salat Subuh berjamaah, diikuti dengan kajian singkat yang dipimpin oleh seorang ustadz atau kyai.&lt;/p&gt;&lt;p&gt;Tradisi ini bukan hanya sekadar rutinitas ibadah, tetapi juga momen kebersamaan yang menguatkan persaudaraan di antara para santri. Setiap subuh, mereka diajak merenungi ayat-ayat suci Al-Qur&#039;an dan hadis, serta mendiskusikan hikmah yang terkandung di dalamnya.&lt;/p&gt;&lt;p&gt;Melalui Pondok Subuhan, santri belajar untuk mengawali hari dengan keberkahan. Dengan semangat kebersamaan dan niat yang tulus, mereka memupuk rasa cinta kepada ilmu dan kedisiplinan dalam beribadah.&lt;/p&gt;&lt;p&gt;Pondok Subuhan mengajarkan bahwa setiap hari adalah kesempatan baru untuk memperbaiki diri dan mendekatkan diri kepada Allah. Di sini, setiap santri memulai langkah mereka dengan penuh doa dan harapan agar diberikan kekuatan dalam menempuh perjalanan hidup.&lt;/p&gt;&lt;p&gt;&quot;&lt;/p&gt;&lt;p&gt;&quot;&lt;/p&gt;', '', '2024-11-14 08:06:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_fasilitas`
--

CREATE TABLE `tb_fasilitas` (
  `id` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_fasilitas`
--

INSERT INTO `tb_fasilitas` (`id`, `nama_fasilitas`, `deskripsi`, `image`) VALUES
(1, 'Sepak bola', 'fauzan', 'Fau.jpg'),
(2, 'Sepak bola', 'fauzan', 'SHP-1087.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id` int(11) NOT NULL,
  `nama_galeri` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id`, `nama_galeri`, `deskripsi`, `image`) VALUES
(1, 'Madrasah', 'Tempat santri belajar', 'Screenshot_2023-01-20-21-11-07-883-edit_com.facebook.katana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `pesan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kontak`
--

INSERT INTO `tb_kontak` (`id`, `nama`, `email`, `telepon`, `pesan`, `tanggal`) VALUES
(3, 'ahmad', 'morgan10@gmail.com', '085624620000', 'Bismillah', '2024-11-11 17:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_program`
--

CREATE TABLE `tb_program` (
  `id` int(50) NOT NULL,
  `nama_program` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_program`
--

INSERT INTO `tb_program` (`id`, `nama_program`, `deskripsi`, `image`) VALUES
(6, 'Tahfidzul Qur\'an', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'images (1).jpeg'),
(7, 'Bahasa Arab', 'Bahasa Arab', 'pp.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `username`, `password`) VALUES
(1, 'admin', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_blog`
--
ALTER TABLE `tb_blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_program`
--
ALTER TABLE `tb_program`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_blog`
--
ALTER TABLE `tb_blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_fasilitas`
--
ALTER TABLE `tb_fasilitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_program`
--
ALTER TABLE `tb_program`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
