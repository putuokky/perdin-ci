-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Des 2020 pada 06.31
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perdin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `nama_config` varchar(200) NOT NULL,
  `config_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `config`
--

INSERT INTO `config` (`id_config`, `nama_config`, `config_value`) VALUES
(1, 'brand', 'SIPERDIN'),
(2, 'main_header', 'SISTEM INFORMASI PERJALANAN DINAS PEMERINTAH KOTA DENPASAR'),
(4, 'version', '1.11.20'),
(5, 'nama_pengembang', 'balecreator.id'),
(6, 'link_pengembang', '#');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_perdin`
--

CREATE TABLE `input_perdin` (
  `id_perdin` int(11) NOT NULL,
  `id_dana` int(20) NOT NULL,
  `klasifikasi_jabtan` varchar(100) NOT NULL,
  `tahun` varchar(100) NOT NULL,
  `tahapan_anggaran` varchar(100) NOT NULL,
  `kategori_perjalanan` varchar(100) NOT NULL,
  `no_sp2d` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tujuan` varchar(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `lama` int(100) NOT NULL,
  `no_surat_tgs` text NOT NULL,
  `nama_personil` text NOT NULL,
  `maskapai` int(11) DEFAULT NULL,
  `rute` text DEFAULT NULL,
  `tnggal` date DEFAULT NULL,
  `no_tiket` varchar(100) DEFAULT NULL,
  `harga` int(20) DEFAULT NULL,
  `uang_harian` int(20) NOT NULL,
  `uang_transport` int(20) DEFAULT NULL,
  `penginapan` int(20) NOT NULL,
  `uang_representatif` int(20) NOT NULL,
  `lain_lain` int(20) NOT NULL,
  `jumlah` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `input_perdin`
--

INSERT INTO `input_perdin` (`id_perdin`, `id_dana`, `klasifikasi_jabtan`, `tahun`, `tahapan_anggaran`, `kategori_perjalanan`, `no_sp2d`, `nama_kegiatan`, `tujuan`, `tgl_berangkat`, `tgl_selesai`, `lama`, `no_surat_tgs`, `nama_personil`, `maskapai`, `rute`, `tnggal`, `no_tiket`, `harga`, `uang_harian`, `uang_transport`, `penginapan`, `uang_representatif`, `lain_lain`, `jumlah`) VALUES
(4, 2, '', '', '', '', '111rrrr', 'ttttt', 'hhhh', '2020-12-01', '2020-12-16', 15, '55ttttt', 'hhhh', 0, '', '1970-01-01', '', 0, 2000, 0, 2000, 2000, 2000, 8000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_dana`
--

CREATE TABLE `ms_dana` (
  `id_dana` int(20) NOT NULL,
  `klasifikasi_jabatan` varchar(11) NOT NULL,
  `sumberdana` varchar(100) NOT NULL,
  `tahun_anggaran` varchar(100) NOT NULL,
  `kategori_perdin` varchar(100) NOT NULL,
  `dana` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_dana`
--

INSERT INTO `ms_dana` (`id_dana`, `klasifikasi_jabatan`, `sumberdana`, `tahun_anggaran`, `kategori_perdin`, `dana`) VALUES
(2, '001', '1', '2015', '1', 5000000),
(3, '00101', '1', '2015', '1', 200000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_kategori_perdin`
--

CREATE TABLE `ms_kategori_perdin` (
  `id_kat_perdin` int(7) NOT NULL,
  `nama_kat_perdin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_kategori_perdin`
--

INSERT INTO `ms_kategori_perdin` (`id_kat_perdin`, `nama_kat_perdin`) VALUES
(1, 'Belanja perjalanan dinas dalam daerah'),
(2, 'Belanja Perjalanan dinas luar daerah'),
(3, 'Belanja Perjalanan dinas luar negeri');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_klasifikasi_jabatan`
--

CREATE TABLE `ms_klasifikasi_jabatan` (
  `kode_kj` varchar(11) NOT NULL,
  `jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_klasifikasi_jabatan`
--

INSERT INTO `ms_klasifikasi_jabatan` (`kode_kj`, `jabatan`) VALUES
('001', 'Walikota & Wakil Walikota & Pendamping'),
('00101', 'Sekretaris Daerah'),
('0010101', 'Assisten, Staf Ahli'),
('001010101', 'Kepala Bagian Humas'),
('00101010101', 'Eselon III/ Eselon IV Bagian Humas'),
('00101010102', 'Golongan IV/ Golongan III Bagian Humas'),
('00101010103', 'Golongan II / Golongan I Bagian Humas'),
('001010102', 'Kepala Bagian Adbang'),
('00101010201', 'Eselon III/ Eselon IV Bagian Adbang'),
('00101010202', 'Golongan IV/ Golongan III Bagian Adbang'),
('00101010203', 'Golongan II / Golongan I Bagian Adbang'),
('001010103', 'Kepala Bagian Umum'),
('00101010301', 'Eselon III/ Eselon IV Bagian Umum'),
('00101010302', 'Golongan IV/ Golongan III Bagian Umum'),
('00101010303', 'Golongan II / Golongan I Bagian Umum'),
('001010104', 'Kepala Bagian Kerjasama'),
('00101010401', 'Eselon III/ Eselon IV Bagian Kerjasama'),
('00101010402', 'Golongan IV/ Golongan III Bagian Kerjasama'),
('00101010403', 'Golongan II / Golongan I Bagian Kerjasama'),
('001010105', 'Kepala Bagian Pem Otda'),
('00101010501', 'Eselon III/ Eselon IV  Bagian Pem Otda'),
('00101010502', 'Golongan IV/ Golongan III Bagian Pem Otda'),
('00101010503', 'Golongan II / Golongan I Bagian Pem Otda'),
('001010106', 'Kepala Bagian Kesra'),
('00101010601', 'Eselon III/ Eselon IV Bagian Kesra'),
('00101010602', 'Golongan IV/ Golongan III Bagian Kesra'),
('00101010603', 'Golongan II / Golongan I Bagian Kesra'),
('001010107', 'Kepala Bagian Hukum'),
('00101010701', 'Eselon III/ Eselon IV Bagian Hukum'),
('00101010702', 'Golongan IV/ Golongan III Bagian Hukum'),
('00101010703', 'Golongan II / Golongan I Bagian Hukum'),
('001010108', 'Kepala Bagian Ekonomi'),
('00101010801', 'Eselon III/ Eselon IV Bagian Ekonomi'),
('00101010802', 'Golongan IV/ Golongan III Bagian Ekonomi'),
('00101010803', 'Golongan II / Golongan I Bagian Ekonomi'),
('001010109', 'Kepala Bagian PPBJ'),
('00101010901', 'Eselon III/ Eselon IV Bagian PPBJ'),
('00101010902', 'Golongan IV/ Golongan III Bagian PPBJ'),
('00101010903', 'Golongan II / Golongan I Bagian PPBJ'),
('001010110', 'Kepala Bagian Organisasi'),
('00101011001', 'Eselon III/ Eselon IV Bagian Organisasi'),
('00101011002', 'Golongan IV/ Golongan III Bagian Organisasi'),
('00101011003', 'Golongan II / Golongan I Bagian Organisasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_maskapai`
--

CREATE TABLE `ms_maskapai` (
  `id_maskapai` int(11) NOT NULL,
  `nama_maskapai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_maskapai`
--

INSERT INTO `ms_maskapai` (`id_maskapai`, `nama_maskapai`) VALUES
(1, 'Garuda Indonesia'),
(2, 'Citilink Airlines'),
(3, 'Air Asia'),
(4, 'Merpati Nusantara'),
(5, 'Lion Air'),
(6, 'Batik Air'),
(7, 'Wings Air'),
(8, 'Tiger Air'),
(9, 'Sriwijaya Air'),
(10, 'Batavia Air'),
(11, 'Mandala Airlines'),
(12, 'Kal Star Aviation'),
(13, 'Susi Air');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ms_sumberdana`
--

CREATE TABLE `ms_sumberdana` (
  `id_sumberdana` int(11) NOT NULL,
  `nama_sumberdana` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_sumberdana`
--

INSERT INTO `ms_sumberdana` (`id_sumberdana`, `nama_sumberdana`) VALUES
(1, 'Induk'),
(2, 'Perubahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `usrname` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `nama_bagian` varchar(100) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `usrname`, `password`, `nama_bagian`, `role_id`, `is_active`, `date_user`) VALUES
(1, 'Okky Maheswara', 'putuokky', '$2y$10$p7MPGe3IGqcWU5TIyEFCEuH/BqcPqlYnArP5YvFaAVJ6MMdptaz/a', NULL, 1, 1, 1585405006),
(6, 'Admin Humas', 'adminhumas', '$2y$10$xFimgkXMknyeW8VZuZ4//.so.cQE8W2I9dTqL49MVj7V.RGF9UZEK', 'Bagian Humas', 3, 1, 1605768861),
(7, 'Admin Adbang', 'adminadbang', '$2y$10$VOx64oOPROl1DKMdnJsMdeAkJok3z47Hn27j/hNCIkCVihurVWF0O', 'Bagian Adbang', 3, 1, 1605769287),
(8, 'Admin Umum', 'adminumum', '$2y$10$s0u2G3zB6hfsIFCyms7P6OWJPprjOAK22q9cO/vQ0tJu.TXAgejXy', 'Bagian Umum', 3, 1, 1605769341),
(9, 'Admin Kerjasama', 'adminkerjasama', '$2y$10$VN1iA.a9W8xZtNsXAa01ru/JdgS6PqawT.x4uzN0JX2J0pJmBTHM.', 'Bagian Kerjasama', 3, 1, 1605769350),
(10, 'Admin Pem Otda', 'adminpemotda', '$2y$10$9.OIPk4zeXEu.mP9WGpMEOE6Ybluky4uYIpHnux7SRTWVcByH7Sbu', 'Bagian Pem Otda', 3, 1, 1605769361),
(11, 'Admin Kesra', 'adminkesra', '$2y$10$n.xLRVpSe6d4Pst.1mi24uj9DLGg68ZvRBL5E0l6bt/IHmeMZFCSm', 'Bagian Kesra', 3, 1, 1605769376),
(12, 'Admin Hukum', 'adminhukum', '$2y$10$DIXx9vum1MWuFMLLdgoWL.Umx0WXsiRe.zkEzWDpyRforW5/Tnr9i', 'Bagian Hukum', 3, 1, 1605769331),
(13, 'Admin Ekonomi', 'adminekonomi', '$2y$10$63q6lYpuOsxYwsj.1FAZp.l5NAKtLLj8aB.hq6DyURp/JtR0REwti', 'Bagian Ekonomi', 3, 1, 1605769319),
(14, 'Admin PPBJ', 'adminppbj', '$2y$10$kh0KUMiRidZGM.a84TyExuIR4kF440NtQfX4s1Twsc/qZiXTtSdDO', 'Bagian PPBJ', 3, 1, 1605769308),
(15, 'Admin Organisasi', 'adminorganisasi', '$2y$10$QTyj.mIvgS2eHtFedWXG5uHQRnB5D01UJkp6zDllb2FquNFU4ZjJG', 'Bagian Organisasi', 3, 1, 1605769299),
(17, 'Operator Humas', 'ophumas', '$2y$10$rJcn1V/NeSSaQ6qCd8pxsuOy8eRW5EzfBNpKReVOx4l1.GaCfkGrm', 'Bagian Humas', 4, 1, 1606126160),
(18, 'Denpasar Kota', 'denpasarkota', '$2y$10$tZO3TgV9N9WMUi0airmuL.Q8etFfG.CKzCCUoc1NqSrV5A9zOc6CO', '', 2, 1, 1606126067);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 6),
(2, 1, 4),
(4, 1, 3),
(5, 1, 2),
(6, 2, 6),
(7, 2, 4),
(8, 2, 2),
(9, 2, 8),
(10, 3, 6),
(11, 3, 4),
(12, 3, 2),
(14, 2, 9),
(15, 1, 9),
(16, 3, 8),
(17, 1, 10),
(19, 3, 10),
(20, 2, 10),
(21, 1, 12),
(22, 2, 12),
(23, 3, 12),
(24, 4, 6),
(25, 4, 10),
(27, 1, 13),
(28, 1, 8),
(29, 2, 13),
(30, 3, 13),
(31, 4, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) DEFAULT NULL,
  `is_active_menu` int(1) NOT NULL,
  `urutan_user_menu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `is_active_menu`, `urutan_user_menu`) VALUES
(3, 'Developer', 1, 6),
(6, 'Home', 1, 1),
(8, 'Settings', 1, 4),
(10, 'Perdin', 1, 2),
(12, 'Master', 1, 3),
(13, 'Laporan', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id_role`, `role`) VALUES
(1, 'Developer'),
(2, 'Super Administrator'),
(3, 'Administrator'),
(4, 'Operator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id_user_sub_menu` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `submenu` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL,
  `urutan_user_sub_menu` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id_user_sub_menu`, `menu_id`, `submenu`, `url`, `icon`, `is_active`, `urutan_user_sub_menu`) VALUES
(8, 3, 'Role User', 'roleuser', 'fas fa-users-cog', 1, 2),
(9, 3, 'Menu Management', 'menu', 'fas fa-folder', 1, 3),
(10, 3, 'SubMenu Management', 'submenu', 'fas fa-folder-open', 1, 4),
(11, 3, 'Configuration', 'config', 'fas fa-cogs', 1, 5),
(13, 6, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt', 1, 1),
(14, 8, 'User', 'user', 'fas fa-user', 1, 1),
(17, 10, 'Perjalanan Dinas', 'inperdin', 'fas fa-road', 1, 1),
(18, 12, 'Sumberdana', 'dana', 'fas fa-money-bill-alt', 1, 3),
(19, 12, 'Kategori Perdin', 'katperdin', 'fas fa-car-side', 1, 3),
(20, 12, 'Klasifikasi Jabatan', 'klasijabatan', 'fas fa-user-tie', 1, 4),
(21, 12, 'Maskapai', 'maskapai', 'fas fa-plane', 1, 5),
(22, 12, 'Tahapan Anggaran', 'anggaran', 'fas fa-money-check', 1, 6),
(23, 13, 'Laporan Perdin', 'laporperdin', 'fas fa-file-alt', 1, 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indeks untuk tabel `input_perdin`
--
ALTER TABLE `input_perdin`
  ADD PRIMARY KEY (`id_perdin`);

--
-- Indeks untuk tabel `ms_dana`
--
ALTER TABLE `ms_dana`
  ADD PRIMARY KEY (`id_dana`);

--
-- Indeks untuk tabel `ms_kategori_perdin`
--
ALTER TABLE `ms_kategori_perdin`
  ADD PRIMARY KEY (`id_kat_perdin`);

--
-- Indeks untuk tabel `ms_klasifikasi_jabatan`
--
ALTER TABLE `ms_klasifikasi_jabatan`
  ADD PRIMARY KEY (`kode_kj`);

--
-- Indeks untuk tabel `ms_maskapai`
--
ALTER TABLE `ms_maskapai`
  ADD PRIMARY KEY (`id_maskapai`);

--
-- Indeks untuk tabel `ms_sumberdana`
--
ALTER TABLE `ms_sumberdana`
  ADD PRIMARY KEY (`id_sumberdana`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id_user_sub_menu`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `input_perdin`
--
ALTER TABLE `input_perdin`
  MODIFY `id_perdin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ms_dana`
--
ALTER TABLE `ms_dana`
  MODIFY `id_dana` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ms_kategori_perdin`
--
ALTER TABLE `ms_kategori_perdin`
  MODIFY `id_kat_perdin` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `ms_maskapai`
--
ALTER TABLE `ms_maskapai`
  MODIFY `id_maskapai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `ms_sumberdana`
--
ALTER TABLE `ms_sumberdana`
  MODIFY `id_sumberdana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
