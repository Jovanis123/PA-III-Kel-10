-- Adminer 4.8.1 MySQL 5.7.33 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `exercise`;
CREATE TABLE `exercise` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_exercise` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id_teacher` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `exercise` (`id`, `mapel`, `kelas`, `nama_exercise`, `deskripsi`, `user_id_teacher`, `created_at`, `updated_at`) VALUES
(1,	'Pemprograman Berorientasi Objek',	'XI RPL 1',	'Tipe Data',	'HAYO EXERCISE NIH! ^o^',	2,	NULL,	NULL);

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `kelas` (`id`, `nama_kelas`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1,	'XI RPL 1',	'Kelas 11 Rekayasa Perangkat Lunak 1',	NULL,	NULL),
(2,	'XI RPL 2',	'Kelas 11 Rekayasa Perangkat Lunak 2',	NULL,	NULL),
(3,	'XI RPL 3',	'Kelas 11 Rekayasa Perangkat Lunak 3',	NULL,	NULL);

DROP TABLE IF EXISTS `mata_pelajaran`;
CREATE TABLE `mata_pelajaran` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `mata_pelajaran` (`id`, `nama_mapel`, `created_at`, `updated_at`) VALUES
(1,	'Pemprograman Berorientasi Objek',	NULL,	NULL),
(2,	'Matematika',	NULL,	NULL);

DROP TABLE IF EXISTS `materi`;
CREATE TABLE `materi` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mapel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `kesimpulan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id_teacher` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `materi` (`id`, `mapel`, `kelas`, `judul`, `isi`, `kesimpulan`, `keterangan`, `user_id_teacher`, `created_at`, `updated_at`) VALUES
(1,	'Matematika',	'XI RPL 1',	'Matriks Ordo 2x2',	'\r\n            <h1>Matriks Ordo 2x2 - Heading 1</h1>\r\n\r\n            <h2>Heading 2</h2>\r\n\r\n            <p>Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.&nbsp;Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.Ini adalah paragraf, anda tahu apa itu paragraf? Ya, silahkan jawab karena saya tidak tahu, jadi tolong jelaskan.</p>\r\n\r\n            <h3>Ini Numbering - Heading 3&nbsp;:&nbsp;</h3>\r\n\r\n            <ol>\r\n                <li>Ini nomor 1</li>\r\n                <li>Ini nomor 2</li>\r\n                <li>Ini nomor 3</li>\r\n                <li>Dan sayangnya kamu nomor 4 bagi saya.&nbsp;</li>\r\n            </ol>\r\n\r\n            <h2>Heading 2 lagi... cieee.... ^.^</h2>\r\n\r\n            <p>Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;Eh ketemu paragraf lagi yah. kaya nya kamu memang cocok dengan paragraf... #JODOH&nbsp;^.^&nbsp;</p>\r\n\r\n            <h3>Gaya Huruf :</h3>\r\n\r\n            <ul>\r\n                <li>Nih <cite>italic</cite> nih</li>\r\n                <li>Nih <ins>Underline</ins> nih</li>\r\n                <li>Dan lain-lain...&nbsp;^.^&nbsp;</li>\r\n            </ul>\r\n\r\n            <p>Custom :</p>\r\n\r\n            <p>Kata Mutiara :&nbsp;</p>\r\n\r\n            <blockquote>\r\n            <p><cite><big>&quot;It doesn&#39;t matter how slowly you go, as long as you do not STOP!&quot;</big></cite>- Dari Orang</p>\r\n            </blockquote>\r\n\r\n            <blockquote>\r\n            <p><big>&quot;With Music To Become Thousands Lines Of Code&quot;</big> - Punya Orang juga</p>\r\n            </blockquote>\r\n\r\n            <p>&nbsp;</p>\r\n\r\n            <h1>Author :</h1>\r\n\r\n            <p><img alt=\"\" src=\"http://localhost:8000/photos/2/IMG_20191016_101634.jpg\" style=\"float:left; height:162px; width:150px\" />&nbsp; Nama : Abdurozzaq Nurul Hadi</p>\r\n\r\n            <p>&nbsp; Profesi : Pelajar</p>\r\n\r\n            <p>&nbsp; Bio : <cite>&quot;Beliau adalah seorang anak muda Bucin yang bercita-cita menjadi Full Stack Web Developer.&quot;</cite></p>\r\n\r\n            <p>&nbsp; #NOHARDFEELING #NOOFFENSE #STAYCODING #CODINGINLIFE&nbsp;</p>\r\n\r\n            <p>&nbsp;&nbsp;<big><cite>STATUS &quot;KIA&quot;&nbsp;</cite></big></p>\r\n\r\n            <p>&nbsp;&nbsp;</p>\r\n\r\n            <p>&nbsp;</p>\r\n            ',	'Ini Hanya suatu EasterEgg dari Creator LaraELearn. SO, NO HARD FEELING!',	'Ini adalah Keterangan jadi jangan takut gelap.',	2,	NULL,	NULL);

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1,	'2014_10_12_000000_create_users_table',	1),
(2,	'2014_10_12_100000_create_password_resets_table',	1),
(3,	'2019_08_19_000000_create_failed_jobs_table',	1),
(4,	'2019_10_12_030653_create_roles_table',	1),
(5,	'2019_10_12_030752_create_role_user_table',	1),
(6,	'2019_10_16_153041_create_mata_pelajaran_table',	1),
(7,	'2019_10_16_153122_create_kelas_table',	1),
(8,	'2019_10_17_051051_create_materi_table',	1),
(9,	'2019_10_26_035951_create_exercise_table',	1),
(10,	'2019_10_26_040125_create_question_table',	1),
(11,	'2019_10_26_040201_create_student_answer_table',	1);

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `exercise` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opt4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `correct_opt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1,	'Admin',	'Admin Role (Okemin)',	NULL,	NULL),
(2,	'Teacher',	'Teacher Role',	NULL,	NULL),
(3,	'Student',	'Student Role',	NULL,	NULL);

DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1,	1,	1,	NULL,	NULL),
(2,	2,	2,	NULL,	NULL),
(3,	3,	3,	NULL,	NULL);

DROP TABLE IF EXISTS `student_answer`;
CREATE TABLE `student_answer` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nisn` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelas` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bulan_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_lahir` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tahun_masuk` int(11) DEFAULT NULL,
  `no_telp` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_nisn_unique` (`nisn`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `nisn`, `nip`, `name`, `username`, `email`, `kelas`, `jabatan`, `tempat_lahir`, `tgl_lahir`, `bulan_lahir`, `tahun_lahir`, `jenis_kelamin`, `agama`, `tahun_masuk`, `no_telp`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1,	NULL,	NULL,	'Okemin',	'Okemin',	'okemin@example.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$QyqGGDySTNS1sK3a6gN1jeVT.0cPEnsBKRggoVoIN8xgks0ZpADee',	'1_avatar1655436378.jpg',	'ZYcO93cHSE3s3m3A8UB6kFltD8eMXz9FVfmM8F12f9H0wawhXqfrFsycpSTd',	NULL,	'2022-06-16 20:26:18'),
(2,	NULL,	NULL,	'Teacher',	'Teacher',	'Teacher@example.com',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	'$2y$10$fcUhDCNJs67GmBrbu6hKZOewai89P8mUvmBHEdFajnaObuAuym5Am',	'2_avatar1655452609.jpg',	NULL,	NULL,	'2022-06-17 00:56:49'),
(3,	NULL,	NULL,	'Student',	'Student',	'Student@example.com',	'XI RPL 1',	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	2003,	NULL,	'$2y$10$ttCZ3B7ImfyUe406SvSHoefNWMoXmJJ0s2Xuj3g84.A8kG8pj4qZ6',	'3_avatar1655436488.jpg',	NULL,	NULL,	'2022-06-16 20:28:08');

-- 2022-06-25 04:45:13
