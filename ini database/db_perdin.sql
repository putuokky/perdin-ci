-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2021 pada 02.44
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.2.34

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
(4, 'version', '1.02.21'),
(5, 'nama_pengembang', 'balecreator.id'),
(6, 'link_pengembang', 'https://www.balecreator.id/');

-- --------------------------------------------------------

--
-- Struktur dari tabel `input_perdin`
--

CREATE TABLE `input_perdin` (
  `id_perdin` int(11) NOT NULL,
  `id_dana` int(20) NOT NULL,
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
  `jumlah` int(20) NOT NULL,
  `debit_perdin` int(20) NOT NULL,
  `userid` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `dana` int(20) NOT NULL,
  `debit` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_dana`
--

INSERT INTO `ms_dana` (`id_dana`, `klasifikasi_jabatan`, `sumberdana`, `tahun_anggaran`, `kategori_perdin`, `dana`, `debit`) VALUES
(4, '001', '1', '2020', '2', 5000000, 792000),
(5, '001', '2', '2020', '2', 1000000, 1000000),
(8, '001010101', '1', '2021', '1', 10000000, 10000000),
(9, '00101010101', '1', '2021', '1', 50000000, 50000000);

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
  `jabatan` varchar(100) NOT NULL,
  `opd_klasijabat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ms_klasifikasi_jabatan`
--

INSERT INTO `ms_klasifikasi_jabatan` (`kode_kj`, `jabatan`, `opd_klasijabat`) VALUES
('001', 'Walikota & Wakil Walikota & Pendamping', 0),
('00101', 'Sekretaris Daerah', 0),
('0010101', 'Assisten, Staf Ahli', 0),
('001010101', 'Kepala Bagian Humas', 30),
('00101010101', 'Eselon III/ Eselon IV Bagian Humas', 30),
('00101010102', 'Golongan IV/ Golongan III Bagian Humas', 30),
('00101010103', 'Golongan II / Golongan I Bagian Humas', 30),
('001010102', 'Kepala Bagian Adbang', 32),
('00101010201', 'Eselon III/ Eselon IV Bagian Adbang', 32),
('00101010202', 'Golongan IV/ Golongan III Bagian Adbang', 32),
('00101010203', 'Golongan II / Golongan I Bagian Adbang', 32),
('001010103', 'Kepala Bagian Umum', 35),
('00101010301', 'Eselon III/ Eselon IV Bagian Umum', 35),
('00101010302', 'Golongan IV/ Golongan III Bagian Umum', 35),
('00101010303', 'Golongan II / Golongan I Bagian Umum', 35),
('001010104', 'Kepala Bagian Kerjasama', 37),
('00101010401', 'Eselon III/ Eselon IV Bagian Kerjasama', 37),
('00101010402', 'Golongan IV/ Golongan III Bagian Kerjasama', 37),
('00101010403', 'Golongan II / Golongan I Bagian Kerjasama', 37),
('001010105', 'Kepala Bagian Pem Otda', 36),
('00101010501', 'Eselon III/ Eselon IV  Bagian Pem Otda', 36),
('00101010502', 'Golongan IV/ Golongan III Bagian Pem Otda', 36),
('00101010503', 'Golongan II / Golongan I Bagian Pem Otda', 36),
('001010106', 'Kepala Bagian Kesra', 33),
('00101010601', 'Eselon III/ Eselon IV Bagian Kesra', 33),
('00101010602', 'Golongan IV/ Golongan III Bagian Kesra', 33),
('00101010603', 'Golongan II / Golongan I Bagian Kesra', 33),
('001010107', 'Kepala Bagian Hukum', 28),
('00101010701', 'Eselon III/ Eselon IV Bagian Hukum', 28),
('00101010702', 'Golongan IV/ Golongan III Bagian Hukum', 28),
('00101010703', 'Golongan II / Golongan I Bagian Hukum', 28),
('001010108', 'Kepala Bagian Ekonomi', 31),
('00101010801', 'Eselon III/ Eselon IV Bagian Ekonomi', 31),
('00101010802', 'Golongan IV/ Golongan III Bagian Ekonomi', 31),
('00101010803', 'Golongan II / Golongan I Bagian Ekonomi', 31),
('001010109', 'Kepala Bagian PPBJ', 34),
('00101010901', 'Eselon III/ Eselon IV Bagian PPBJ', 34),
('00101010902', 'Golongan IV/ Golongan III Bagian PPBJ', 34),
('00101010903', 'Golongan II / Golongan I Bagian PPBJ', 34),
('001010110', 'Kepala Bagian Organisasi', 29),
('00101011001', 'Eselon III/ Eselon IV Bagian Organisasi', 29),
('00101011002', 'Golongan IV/ Golongan III Bagian Organisasi', 29),
('00101011003', 'Golongan II / Golongan I Bagian Organisasi', 29);

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
-- Struktur dari tabel `tb_opd`
--

CREATE TABLE `tb_opd` (
  `idopd` int(11) NOT NULL,
  `namaopd` varchar(100) NOT NULL,
  `nama_pendek_opd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_opd`
--

INSERT INTO `tb_opd` (`idopd`, `namaopd`, `nama_pendek_opd`) VALUES
(1, 'Badan Pendapatan Daerah', ''),
(2, 'Badan Kepegawaian dan Pengembangan Sumber Daya Manusia', ''),
(3, 'Badan Kesatuan Bangsa dan Politik', ''),
(4, 'Badan Pengelolaan Keuangan Aset Daerah', ''),
(5, 'Badan Penanggulangan Bencana Daerah', ''),
(6, 'Badan Penelitian dan Pengembangan', ''),
(7, 'Satuan Polisi Pamong Praja', ''),
(8, 'Dinas Kesehatan', ''),
(9, 'Dinas Pendidikan, Kepemudaan dan Olahraga', ''),
(10, 'Dinas Pekerjaan Umum dan Penataan Ruang', ''),
(11, 'Dinas Perumahan, Kawasan Permukiman dan Pertanahan', ''),
(12, 'Dinas Perhubungan', ''),
(13, 'Dinas Lingkungan Hidup dan Kebersihan', ''),
(14, 'Dinas Kependudukan dan Pencatatan Sipil', ''),
(15, 'Dinas Pemberdayaan Perempuan dan Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana', ''),
(16, 'Dinas Sosial', ''),
(17, 'Dinas Tenaga Kerja dan Sertifikasi Kompetensi', ''),
(18, 'Dinas Koperasi Usaha Mikro Kecil dan Menengah', ''),
(19, 'Dinas Kebudayaan', ''),
(20, 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', ''),
(21, 'Dinas Pemberdayaan Masyarakat dan Desa', ''),
(22, 'Dinas Perpustakaan dan Kearsipan', ''),
(23, 'Dinas Komunikasi, Informatika dan Statistik', ''),
(24, 'Dinas Pertanian', ''),
(25, 'Dinas Perikanan dan Ketahanan Pangan', ''),
(26, 'Dinas Pariwisata', ''),
(27, 'Dinas Perindustrian dan Perdagangan', ''),
(28, 'Bagian Hukum dan Hak Asasi Manusia Sekretariat Daerah', 'Bag. Hukum Ham'),
(29, 'Bagian Organisasi Sekretariat Daerah', 'Bag. Organisasi'),
(30, 'Bagian Humas dan Protokol', 'Bag. Humas'),
(31, 'Bagian Perekonomian dan Sumber Daya Alam', 'Bag. Perekonomian dan SDA'),
(32, 'Bagian Administrasi Pembangunan', 'Bag. Adbang'),
(33, 'Bagian Kesejahteraan Rakyat', 'Bag. Kesra'),
(34, 'Bagian Pengadaan Barang dan Jasa', 'Bag. PBJ'),
(35, 'Bagian Umum', 'Bag. Umum'),
(36, 'Bagian Pemerintahan dan Otonomi Daerah', 'Bag. Pem Otda'),
(37, 'Bagian Kerjasama', 'Bag. Kerjasama'),
(38, 'Rumah Sakit Umum Daerah Wangaya', ''),
(39, 'Perumda Air Minum Tirta Sewakadarma', ''),
(40, 'PD Pasar', ''),
(41, 'Perumda Bhukti Praja Sewakadarma', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `usrname` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `opd` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `usrname`, `password`, `opd`, `role_id`, `is_active`, `date_user`) VALUES
(1, 'Okky Maheswara', 'putuokky', '$2y$10$E3BW0lENMZBGkIQ9ayuAP.jLmMxe/h7XjcYyslMcyzvBySCgQadh6', NULL, 1, 1, 1585405006),
(6, 'Admin Humas', 'adminhumas', '$2y$10$xFimgkXMknyeW8VZuZ4//.so.cQE8W2I9dTqL49MVj7V.RGF9UZEK', 30, 3, 1, 1613095240),
(7, 'Admin Adbang', 'adminadbang', '$2y$10$VOx64oOPROl1DKMdnJsMdeAkJok3z47Hn27j/hNCIkCVihurVWF0O', 32, 3, 1, 1613095229),
(8, 'Admin Umum', 'adminumum', '$2y$10$s0u2G3zB6hfsIFCyms7P6OWJPprjOAK22q9cO/vQ0tJu.TXAgejXy', 35, 3, 1, 1613095220),
(9, 'Admin Kerjasama', 'adminkerjasama', '$2y$10$VN1iA.a9W8xZtNsXAa01ru/JdgS6PqawT.x4uzN0JX2J0pJmBTHM.', 37, 3, 1, 1613095210),
(10, 'Admin Pem Otda', 'adminpemotda', '$2y$10$9.OIPk4zeXEu.mP9WGpMEOE6Ybluky4uYIpHnux7SRTWVcByH7Sbu', 36, 3, 1, 1613095201),
(11, 'Admin Kesra', 'adminkesra', '$2y$10$n.xLRVpSe6d4Pst.1mi24uj9DLGg68ZvRBL5E0l6bt/IHmeMZFCSm', 33, 3, 1, 1613095188),
(12, 'Admin Hukum', 'adminhukum', '$2y$10$DIXx9vum1MWuFMLLdgoWL.Umx0WXsiRe.zkEzWDpyRforW5/Tnr9i', 28, 3, 1, 1613095171),
(13, 'Admin Ekonomi', 'adminekonomi', '$2y$10$63q6lYpuOsxYwsj.1FAZp.l5NAKtLLj8aB.hq6DyURp/JtR0REwti', 31, 3, 1, 1613095161),
(14, 'Admin PPBJ', 'adminppbj', '$2y$10$kh0KUMiRidZGM.a84TyExuIR4kF440NtQfX4s1Twsc/qZiXTtSdDO', 34, 3, 1, 1613095146),
(15, 'Admin Organisasi', 'adminorganisasi', '$2y$10$QTyj.mIvgS2eHtFedWXG5uHQRnB5D01UJkp6zDllb2FquNFU4ZjJG', 29, 3, 1, 1613095132),
(17, 'Operator Humas', 'ophumas', '$2y$10$rJcn1V/NeSSaQ6qCd8pxsuOy8eRW5EzfBNpKReVOx4l1.GaCfkGrm', 30, 4, 1, 1613095118),
(18, 'Denpasar Kota', 'denpasarkota', '$2y$10$tZO3TgV9N9WMUi0airmuL.Q8etFfG.CKzCCUoc1NqSrV5A9zOc6CO', 0, 2, 1, 1606126067);

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
(29, 2, 13),
(30, 3, 13),
(31, 4, 13),
(34, 1, 8);

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
(8, 'Settings', 1, 5),
(10, 'Perdin', 1, 2),
(12, 'Master', 1, 4),
(13, 'Laporan', 1, 3);

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
(8, 3, 'Role User', 'roleuser', 'fas fa-users-cog', 1, 1),
(9, 3, 'Menu Management', 'menu', 'fas fa-folder', 1, 2),
(10, 3, 'SubMenu Management', 'submenu', 'fas fa-folder-open', 1, 3),
(11, 3, 'Configuration', 'config', 'fas fa-cogs', 1, 4),
(13, 6, 'Dashboard', 'dashboard', 'fas fa-tachometer-alt', 1, 1),
(14, 8, 'User', 'user', 'fas fa-user', 1, 1),
(17, 10, 'Perjalanan Dinas', 'inperdin', 'fas fa-road', 1, 1),
(18, 12, 'Sumberdana', 'dana', 'fas fa-money-bill-alt', 1, 1),
(19, 12, 'Kategori Perdin', 'katperdin', 'fas fa-car-side', 1, 2),
(20, 12, 'Klasifikasi Jabatan', 'klasijabatan', 'fas fa-user-tie', 1, 3),
(21, 12, 'Maskapai', 'maskapai', 'fas fa-plane', 1, 4),
(22, 12, 'Tahapan Anggaran', 'anggaran', 'fas fa-money-check', 1, 5),
(23, 13, 'Laporan Perdin', 'laporperdin', 'fas fa-file-alt', 1, 5),
(24, 12, 'Instansi Pemerintahan', 'skpd', 'far fa-building', 1, 6);

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
-- Indeks untuk tabel `tb_opd`
--
ALTER TABLE `tb_opd`
  ADD PRIMARY KEY (`idopd`);

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
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `input_perdin`
--
ALTER TABLE `input_perdin`
  MODIFY `id_perdin` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `ms_dana`
--
ALTER TABLE `ms_dana`
  MODIFY `id_dana` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `ms_kategori_perdin`
--
ALTER TABLE `ms_kategori_perdin`
  MODIFY `id_kat_perdin` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `ms_maskapai`
--
ALTER TABLE `ms_maskapai`
  MODIFY `id_maskapai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `ms_sumberdana`
--
ALTER TABLE `ms_sumberdana`
  MODIFY `id_sumberdana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_opd`
--
ALTER TABLE `tb_opd`
  MODIFY `idopd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id_user_sub_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
