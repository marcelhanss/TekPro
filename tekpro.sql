-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2024 at 01:32 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tekpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id_buku` bigint UNSIGNED NOT NULL,
  `fk_id_kategori` bigint UNSIGNED NOT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penulis` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_terjual` int NOT NULL DEFAULT '0',
  `link_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id_buku`, `fk_id_kategori`, `judul`, `penulis`, `harga`, `stok`, `deskripsi`, `gambar`, `jumlah_terjual`, `link_pdf`) VALUES
(1, 2, 'Filosofi Teras', 'Henry Manampiring', 95000.00, 16, 'Dalam buku “Filosofi Teras” ini, tidak menjabarkan bagaimana solusi yang dapat dilakukan untuk mengatasi permasalahan, tetapi mengubah perspektif individu untuk memperoleh ketenangan, kebahagiaan dan pandangan lebih baik dalam menyikapi permasalahan.', 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/img20220101_11444970.jpg', 4, 'https://rakyatfilsafat.com/wp-content/uploads/2022/01/filosofi-teraspdf.pdf'),
(2, 1, 'Kambing Jantan', 'Raditya Dika', 50000.00, 14, 'Buku Kambing Jantan karya Raditya Dika berisi kumpulan cerita kesehariannya yang pernah ia posting di blog pribadinya. Cerita-cerita tersebut menceritakan pengalaman lucu Dika saat SMA, kuliah di Australia, liburan di Singapura dan Jakarta. Buku ini menampilkan gaya humoristik Dika dalam menceritakan berbagai pengalamannya sehari-hari.', 'https://upload.wikimedia.org/wikipedia/id/8/8d/Kambing_Jantan_The_Movie.jpg', 15, 'http://103.44.149.34/elib/assets/buku/Raditya_Dika_-_Kambing_Jantan.pdf'),
(3, 2, 'Atomic Habits', 'James Clear', 90000.00, 23, 'Atomic Habits karya James Clear adalah panduan praktis untuk membangun kebiasaan baik dan menghentikan kebiasaan buruk dengan pendekatan berbasis sains. Buku ini menjelaskan bagaimana perubahan kecil yang konsisten dapat menghasilkan perbaikan besar dalam jangka panjang. Dengan konsep seperti The Habit Loop dan The Four Laws of Behavior Change, Clear memberikan strategi sederhana namun efektif untuk menciptakan sistem yang mendukung pertumbuhan pribadi, meningkatkan produktivitas, dan mencapai tujuan hidup. Melalui kombinasi penelitian ilmiah, cerita inspiratif, dan langkah-langkah konkret, buku ini menunjukkan bahwa kebiasaan adalah kunci untuk menguasai perubahan dan menciptakan kehidupan yang lebih baik.', 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/items/9786020633176_.Atomic_Habit.jpg', 2, 'https://archive.org/details/atomic-habits-perubahan-kecil-yang-memberikan-hasil-luar-biasa-james/page/46/mode/1up'),
(4, 4, 'Linimasa', '@Kisahhorror', 40000.00, 12, 'Debbie membacakan isi kicauan itu dengan bibir gemetaran, dan suara yang serak (hampir tercekat). Ia juga tidak tahu mengapa ia bisa seperti itu, yang jelas ada sebuah perasaan ngeri yang mengalir ke seluruh tubuhnya saat membaca kicauan itu. Kicauan itu berisi: terima kasih buat temen-temen yang udah maki-maki gue, semoga kita nanti ketemu lagi. Jalan yang gue ambil ini adalah jalan Tuhan. Seketika itu mereka diam, tidak ada yang berani mengeluarkan suara. Bibir mereka seperti dijahit hingga sulit terbuka, mereka saling memandang. Bukan pandangan yang penuh dendam lagi seperti biasanya, tetapi pandangan yang penuh dengan kengerian. Seperti ada sesuatu yang memberitahu mereka bahwa sebuah peristiwa yang mengerikan terjadi, anggap saja itu sebuah firasat.', 'https://mediakita.com/wp-content/uploads/2013/11/linimasa.jpg', 0, 'https://library.nusaputra.ac.id/repository/Linimasa.pdf'),
(5, 4, 'The Exorcist', 'William Peter Blatty', 70000.00, 10, 'The Exorcist karya William Peter Blatty adalah novel horor klasik yang menceritakan perjuangan melawan kekuatan jahat yang mengerikan. Kisahnya berpusat pada seorang gadis muda bernama Regan MacNeil yang mulai menunjukkan perilaku aneh dan menakutkan, yang akhirnya didiagnosis sebagai kerasukan makhluk jahat. Ketika ilmu pengetahuan dan pengobatan modern gagal, sang ibu, Chris MacNeil, meminta bantuan seorang imam Katolik, Pastor Damien Karras, untuk melakukan ritual pengusiran setan. Bersama seorang pendeta senior, Pastor Merrin, mereka menghadapi pertarungan spiritual yang mengguncang iman, membawa trauma, dan menguji batas kekuatan manusia melawan kegelapan.', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRV_n-j9IAlGWx3y_M0YEpihKj_-GMXJeWlBQ&s', 0, 'https://www.geocities.ws/thebookstore/the%20exorcist.pdf'),
(6, 1, 'Manusia Setengah Salmon', 'Raditya Dika', 96000.00, 8, 'Novel ini mengisahkan tentang perjalanan hidup Raditya Dika, yang pada awalnya adalah seorang pemuda dengan berbagai masalah dan ketidakmampuan dalam berbagai hal, termasuk hubungan asmara. Dalam novel ini, Raditya Dika menggunakan bahasa yang khas, humor yang cerdas, dan candaan untuk menggambarkan peristiwa-peristiwa dalam hidupnya.', 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/9789797808983_Manusia-Seten.jpg', 5, 'http://103.44.149.34/elib/assets/buku/Raditya_Dika_-_Manusia_Setengah_Salmon.pdf'),
(7, 2, 'The Power of Habit', 'Charles Duhigg', 85000.00, 16, 'Kebiasaan adalah Rahasia Keberhasilan. Travis, seorang pemuda broken home degan orang tua pecandu obat, berkali-kali dipecat dari pekerjaan karena tidak bisa mengendalikan emosi. Namun sesudah menjalani pelatihan pegawai Starbucks yang mengajarkan kekuatan tekad, Travis kini sukses menjadi manajer dua cabang kafe terkenal itu. Seorang CEO baru memegang salah satu perusahaan raksasa Amerika. Perintah pertamanya adalah menumbuhkan kepedulian keselamatan kerja-dan hasilnya saham perusahaan itu, Alcoa, menjadi salah satu yang berkinerja terbaik di Dow Jones.', 'https://image.gramedia.net/rs:fit:256:0/plain/https://cdn.gramedia.com/uploads/items/img20190902_16534294.jpg', 1, 'https://ia803102.us.archive.org/35/items/CharlesDuhigg.ThePowerOfHabit_201808/Charles-Duhigg.The-Power-of-Habit.pdf'),
(8, 5, 'Harry Potter and the Philosophers Stone', 'J. K. Rowling', 100000.00, 4, 'Harry Potter adalah seri tujuh novel fantasi yang dikarang oleh penulis Inggris J. K. Rowling. Novel ini mengisahkan tentang petualangan seorang penyihir remaja bernama Harry Potter dan sahabatnya, Ron Weasley dan Hermione Granger, yang merupakan pelajar di Sekolah Sihir Hogwarts.', 'https://encrypted-tbn0.gstatic.com/shopping?q=tbn:ANd9GcQWP8SXegydDBnvzY_8jPN7rMR069lOy8G30V0VrW6W82xB3PDZwivZmmiqNLpUO_D1vi_e2KZkZrP-eIT94YEizMkWp_5cqvjAEux2xqGusDzpapYtw31k&usqp=CAE', 4, 'https://docenti.unimc.it/antonella.pascali/teaching/2018/19055/files/ultima-lezione/harry-potter-and-the-philosophers-stone'),
(9, 3, 'The True Life of Habibie', 'A. Makmur Makka', 30000.00, 7, 'Membaca Detik-Detik yang Menentukan membuat serasa dekat dengan sosok Habibie sebagai abdi bangsa yang berjuang mengorbankan seluruh waktu dan tenaga untuk kepentingan bangsa; pernah hanya sempat tidur 1 jam dalam larut mengatasi situasi gawat darurat krisis. Dari mana akar semua itu? Buku ini bercerita tentang garis hidup seorang Habibie yang menarik: genius dan prestisius, tapi dengan jiwa religius; gila kerja tapi juga suka bercanda; gila teknologi tapi juga suka berpuisi. Kesemuanya barangkali adalah jalinan kontinuitas dari energi dan ruh pengabdian dalam diri Habibie-lepas dari kekurangannya sebagai manusia.', 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTk0D8b0pASIxVY5yFMwfNQ2BmAYF_Mh3NK-E966nHzUvfl0YVMs7ihLL5UFm-HBbZHwzveT4ncr6-ysGCOY0vHDELWjD4aGa71jdwiWITX-R71rql8VsLl&usqp=CAE', 1, 'https://perpus.min9blitar.sch.id/uploaded_files/temporary/DigitalCollection/OTUxMWY5OWEzYzJiOWY0YWZiN2U2MTk0OTY0NDk0OWU1ODcwNmI4Yg==.pdf'),
(11, 1, 'a', 'a', 1.00, 0, 'aa', 'https://image.gramedia.net/rs:fit:0:0/plain/https://cdn.gramedia.com/uploads/items/9789792251289.jpg', 1, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id_cart` bigint UNSIGNED NOT NULL,
  `id` bigint UNSIGNED NOT NULL,
  `id_buku` bigint UNSIGNED NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id_kategori` bigint UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Komedi'),
(2, 'Motivasi'),
(3, 'Biografi'),
(4, 'Horor'),
(5, 'Fantasi');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id_history` bigint UNSIGNED NOT NULL,
  `fk_user_id` bigint UNSIGNED NOT NULL,
  `fk_book_id` bigint UNSIGNED NOT NULL,
  `link_pdf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id_history`, `fk_user_id`, `fk_book_id`, `link_pdf`) VALUES
(1, 2, 1, 'https://rakyatfilsafat.com/wp-content/uploads/2022/01/filosofi-teraspdf.pdf'),
(2, 2, 8, 'https://docenti.unimc.it/antonella.pascali/teaching/2018/19055/files/ultima-lezione/harry-potter-and-the-philosophers-stone'),
(3, 3, 9, 'https://perpus.min9blitar.sch.id/uploaded_files/temporary/DigitalCollection/OTUxMWY5OWEzYzJiOWY0YWZiN2U2MTk0OTY0NDk0OWU1ODcwNmI4Yg==.pdf'),
(4, 3, 6, 'http://103.44.149.34/elib/assets/buku/Raditya_Dika_-_Manusia_Setengah_Salmon.pdf'),
(5, 2, 2, 'http://103.44.149.34/elib/assets/buku/Raditya_Dika_-_Kambing_Jantan.pdf'),
(6, 2, 7, 'https://ia803102.us.archive.org/35/items/CharlesDuhigg.ThePowerOfHabit_201808/Charles-Duhigg.The-Power-of-Habit.pdf'),
(7, 2, 3, 'https://archive.org/details/atomic-habits-perubahan-kecil-yang-memberikan-hasil-luar-biasa-james/page/46/mode/1up'),
(8, 3, 11, 'a'),
(9, 4, 3, 'https://archive.org/details/atomic-habits-perubahan-kecil-yang-memberikan-hasil-luar-biasa-james/page/46/mode/1up');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(9, '2024_12_09_081701_create_categories', 1),
(10, '2024_12_13_101556_create_book', 1),
(11, '2024_12_15_071216_create_carts_table', 1),
(12, '2024_12_15_111023_create_histories_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `isAdmin`) VALUES
(1, 'a', '$2y$12$CGWwVEhFHR4HXspiYq/0IOcVhT1yyqvdpz2sZQ/FDgWfEdmfBi1Ca', 1),
(2, 'b', '$2y$12$I3DDev6WBHox8a8DigAIkON7g0cop4UaArmSb1gE8WGGUCFr3fofW', 0),
(3, 'c', '$2y$12$hsdEZvhhHNHlwnAZuejX5OWOuBUzY7ONsh0Xb.yfVFkt7Mr2t9GCy', 0),
(4, 'd', '$2y$12$mKJFBCzfT334yxQSFs3mj.Cjbw1sZxXkjI.LMorNWnfEF4K367hqS', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `book_fk_id_kategori_foreign` (`fk_id_kategori`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `carts_id_foreign` (`id`),
  ADD KEY `carts_id_buku_foreign` (`id_buku`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `categories_id_kategori_unique` (`id_kategori`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id_history`),
  ADD KEY `histories_fk_user_id_foreign` (`fk_user_id`),
  ADD KEY `histories_fk_book_id_foreign` (`fk_book_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_unique` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id_buku` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_kategori` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id_history` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_fk_id_kategori_foreign` FOREIGN KEY (`fk_id_kategori`) REFERENCES `categories` (`id_kategori`) ON DELETE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_id_buku_foreign` FOREIGN KEY (`id_buku`) REFERENCES `book` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_id_foreign` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_fk_book_id_foreign` FOREIGN KEY (`fk_book_id`) REFERENCES `book` (`id_buku`) ON DELETE CASCADE,
  ADD CONSTRAINT `histories_fk_user_id_foreign` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
