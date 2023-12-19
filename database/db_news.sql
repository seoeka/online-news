-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 05:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_news`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL COMMENT 'dienkripsi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`) VALUES
(1, 'admin@admin.com', 'admin', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `article_image` varchar(255) NOT NULL,
  `article_desc` text NOT NULL,
  `created_at` datetime NOT NULL COMMENT 'Timestamp when the product was created',
  `article_type` int(11) DEFAULT NULL,
  `article_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `category_id`, `author_id`, `article_title`, `article_image`, `article_desc`, `created_at`, `article_type`, `article_active`) VALUES
(1, 1, 1, 'Fitur Pin WhatsApp, Bisa Sematkan Pesan Penting di Chat', 'article-1-1702835452.png', 'Jakarta, CNN Indonesia -- WhatsApp merilis fitur \'Pin\' yang memungkinkan pengguna menyematkan atau menempatkan sebuah pesan di tempat teratas dalam jendela percakapan. Bagaimana caranya?\r\nPerusahaan mengatakan bahwa pengguna dapat menyematkan semua jenis percakapan, termasuk teks, jajak pendapat, gambar, dan emoji. Namun, pengguna hanya dapat menyematkan satu percakapan dalam satu waktu.\r\n\r\nAplikasi chatting milik Meta ini menyebutkan bahwa pengguna dapat menyematkan sebuah obrolan dengan menekan lama pada percakapan dan memilih \'Pin\' dari menu.\r\n\r\nUntuk menyematkan pesan, pengguna dapat menekan lama pada pesan, dan pilih \'Pin dari menu konteks.\r\nBanner kemudian akan muncul untuk memilih durasi pesan yang disematkan.\r\n\r\nPesan yang disematkan bisa bertahan selama 24 jam, 7 hari, maupun 30 hari, tergantung pilihan pengguna. Dalam chat grup, admin memiliki opsi untuk memilih apakah semua anggota atau hanya admin yang dapat menyematkan pesan.\r\n\r\nBaca artikel CNN Indonesia \"Fitur Pin WhatsApp, Bisa Sematkan Pesan Penting di Chat\" selengkapnya di sini: https://www.cnnindonesia.com/teknologi/20231215072908-185-1037532/fitur-pin-whatsapp-bisa-sematkan-pesan-penting-di-chat.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 3, 1),
(3, 1, 1, 'Konservasi Indonesia Kolab Bareng OceanX buat Teliti Laut RI  Baca artikel CNN Indonesia ', 'article-1-1702823772.jpeg', 'Jakarta, CNN Indonesia -- Konservasi Indonesia berkolaborasi dengan OceanX, organisasi global untuk eksplorasi laut, termasuk terumbu karang, lewat penelitian bersama untuk mendukung program Blue Halo S yang meluncur akhir tahun lalu.\r\nBlue Halo S merupakan program inisiatif antara Kementerian Koordinator Bidang Maritim dan Investasi (Kemenko Marves), Kementerian Kelautan dan Perikanan bersama Konservasi Indonesia, Conservation International dan juga Green Climate Fund.\r\n\r\nSasarannya adalah Wilayah Pengelolaan Perikanan (WPP) 572 yang meliputi pesisir barat Sumatera dan sebagian wilayah pesisir Selat Sunda.\r\n\r\nKesepakatan kerja sama ini diresmikan pada side event COP28 dan disaksikan secara resmi oleh Deputi Bidang Koordinasi Sumber Daya Maritim Kemenko Marves Firman Hidayat.\r\n\r\nKesepakatan kerja sama ini diresmikan pada side event COP28 dan disaksikan secara resmi oleh Deputi Bidang Koordinasi Sumber Daya Maritim Kemenko Marves Firman Hidayat.\r\n\r\nBaca artikel CNN Indonesia \"Konservasi Indonesia Kolab Bareng OceanX buat Teliti Laut RI\" selengkapnya di sini: https://www.cnnindonesia.com/teknologi/20231215151116-199-1037765/konservasi-indonesia-kolab-bareng-oceanx-buat-teliti-laut-ri.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 2, 1),
(4, 1, 1, 'Mengenal JAKI, Aplikasi yang Dipamerkan Anies di Debat Pertama Capres', 'article-1-1702824041.jpeg', 'Jakarta, CNN Indonesia -- Aplikasi JAKI mendapat sorotan warganet usai calon presiden nomor urut 1 Anies Baswedan membanggakan aplikasi tersebut dalam debat pertama calon presiden pada Selasa (12/12) malam. Apa sebetulnya aplikasi JAKI?\r\nPembahasan mengenai JAKI mengemuka saat Anies menanggapi capres nomor urut 3 Ganjar Pranowo terkait masalah layanan publik.\r\n\r\n\"Dulu di Jakarta kami buat namanya JAKI. JAKI adalah sebuah super apps yang membantu setiap pelayanannya ada ukurannya,\" kata Anies.\r\n\r\nAplikasi ini diluncurkan saat Anies masih menjabat sebagai Gubernur DKI Jakarta. JAKI pertama kali diperkenalkan dalam Town Hall Meeting 2019.\r\n\r\nPemerintah Provinsi DKI Jakarta saat itu menyatakan bahwa aplikasi ini bertujuan untuk memenuhi kebutuhan informasi dan mengintegrasikan seluruh layanan masyarakat. Dengan kata lain, JAKI menjadi aplikasi pusat informasi dan layanan berbagai kebutuhan di Jakarta.\r\n\r\n\"Dengan JAKI, Anda bisa menikmati fitur layanan dan informasi hingga melapor kondisi fasilitas umum serta layanan publik di Jakarta,\" tulis Pemprov DKI di laman resminya.\r\n\r\nBaca artikel CNN Indonesia \"Mengenal JAKI, Aplikasi yang Dipamerkan Anies di Debat Pertama Capres\" selengkapnya di sini: https://www.cnnindonesia.com/teknologi/20231213095418-185-1036594/mengenal-jaki-aplikasi-yang-dipamerkan-anies-di-debat-pertama-capres.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 2, 1),
(5, 1, 1, 'Menkominfo Bocorkan Kisi-kisi Regulasi AI di Indonesia', 'article-1-1702824204.jpeg', 'Aplikasi ini diluncurkan saat Anies masih menjabat sebagai Gubernur DKI Jakarta. JAKI pertama kali diperkenalkan dalam Town Hall Meeting 2019.\r\n\r\nPemerintah Provinsi DKI Jakarta saat itu menyatakan bahwa aplikasi ini bertujuan untuk memenuhi kebutuhan informasi dan mengintegrasikan seluruh layanan masyarakat. Dengan kata lain, JAKI menjadi aplikasi pusat informasi dan layanan berbagai kebutuhan di Jakarta.\r\n\r\n\"Dengan JAKI, Anda bisa menikmati fitur layanan dan informasi hingga melapor kondisi fasilitas umum serta layanan publik di Jakarta,\" tulis Pemprov DKI di laman resminya.\r\n\r\nMenurut dia regulasi ini nantinya akan diadopsi dari peraturan Uni Eropa yang baru saja disahkan belum lama ini. Indonesia, kata dia, bakal mempelajari lebih lanjut aturan Uni Eropa terkait AI.\r\n\r\n\"Di Eropa sudah mulai muncul, nah kita pelajari bagaimana nanti implementasinya di Indonesia. Karena nilai-nilainya sudah kelihatan, begitu juga tentang pemanfaatan, dan kontrolnya, kita mengadopsi apa yang udah diputuskan negara maju,\" ucapnya.\r\n\r\nBudi menjelaskan aturan soal AI tersebut mengambil pendekatan berbasis risiko terhadap produk atau layanan yang menggunakan kecerdasan buatan dan berfokus pada mengatur penggunaan AI dibandingkan mengatur teknologinya.\r\n\r\nRegulasi tersebut dibuat untuk melindungi hak fundamental, pencegahan penyalahgunaan teknologi, aturan hukum, dan melindungi demokrasi. Di saat yang bersamaan juga mendorong adanya investasi dan inovasi', '2023-12-17 00:00:00', 3, 1),
(6, 1, 1, 'Senator AS Kritik Keras \'Pembungkaman\' Meta pada Unggahan Kondisi Gaza', 'article-1-1702824337.jpeg', 'Jakarta, CNN Indonesia -- Senator asal Massachusetts, Amerika Serikat (AS), Elizabeth Warren mengkritik keras raksasa teknologi Meta karena menyembunyikan postingan soal kondisi Gaza di platform Instagram.\r\nWarren adalah tokoh publik terbaru yang mempertanyakan bagaimana Meta memoderasi konten selama perang Israel-Hamas.\r\n\r\nDalam sebuah surat yang ditujukan kepada CEO Meta Mark Zuckerberg, Warren mengangkat beberapa masalah yang dilaporkan oleh pengguna Instagram sejak 7 Oktober.\r\n\r\nBaca artikel CNN Indonesia \"Senator AS Kritik Keras \'Pembungkaman\' Meta pada Unggahan Kondisi Gaza\" selengkapnya di sini: https://www.cnnindonesia.com/teknologi/20231215203053-192-1037952/senator-as-kritik-keras-pembungkaman-meta-pada-unggahan-kondisi-gaza.\r\n\r\nPara pengguna menekan Meta untuk memberi lebih banyak informasi tentang kebijakan yang mendasari dan berapa banyak konten yang telah dihapus oleh mereka terkait dengan konflik tersebut.\r\n\r\nDalam surat tersebut, Warren mengutip laporan dari media dan kelompok-kelompok hak asasi manusia tentang ketidakkonsistenan dalam praktik moderasi perusahaan sejak dimulainya perang.\r\n\r\nSecara khusus, dia menggarisbawahi bahwa banyak pengguna Instagram menuding Meta \"melarang\" mereka untuk memposting tentang kondisi di Gaza.\r\n\r\nWarren juga merujuk pada audit pihak ketiga, yang ditugaskan oleh Meta dan diterbitkan tahun lalu, yang menemukan perusahaan tersebut melanggar hak-hak warga Palestina untuk berekspresi secara bebas pada 2021, saat terjadi eskalasi besar dalam kekerasan di Jalur Gaza.\r\n\r\n\"Laporan-laporan mengenai pembungkaman suara-suara Palestina oleh Meta menimbulkan pertanyaan serius mengenai praktik moderasi konten dan perlindungan anti-diskriminasi yang dilakukan oleh Meta,\" tulis Warren, dikutip dari Engadget.\r\n\r\n\"Pengguna media sosial berhak untuk mengetahui kapan dan mengapa akun dan postingan mereka dibatasi, terutama di platform terbesar di mana terjadi penyebaran informasi penting,\" tambahnya.\r\n\r\nBaca artikel CNN Indonesia \"Senator AS Kritik Keras \'Pembungkaman\' Meta pada Unggahan Kondisi Gaza\" selengkapnya di sini: https://www.cnnindonesia.com/teknologi/20231215203053-192-1037952/senator-as-kritik-keras-pembungkaman-meta-pada-unggahan-kondisi-gaza.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 4, 1),
(7, 3, 5, 'Sinopsis Godzilla Tahun 1998 - Bioskop Trans TV 17 Desember 2023 ', 'article-3-1702824524.png', 'Jakarta, CNN Indonesia -- Bioskop Trans TV malam ini, Minggu (17/12), akan menayangkan Godzilla (1998) pukul 21.30 WIB. Film ini dibintangi Matthew Broderick, Jean Reno, Maria Pitillo, dan Hank Azaria.\r\nGodzilla (1998) merupakan film reboot dari film Jepang bertajuk serupa yang tayang perdana pada 1954.\r\n\r\nBaca artikel CNN Indonesia \"Sinopsis Godzilla (1998), Bioskop Trans TV 17 Desember 2023\" selengkapnya di sini: https://www.cnnindonesia.com/hiburan/20231215174945-220-1037873/sinopsis-godzilla-1998-bioskop-trans-tv-17-desember-2023.\r\n\r\nSuatu hari pada Juni 1968, pemerintah Prancis melakukan uji coba nuklir di Polinesia. Uji coba itu membuat sarang iguana kejatuhan radioaktif.\r\n\r\nSekitar 30 tahun berlalu, sebuah kapal pengalengan Jepang diserang makhluk raksasa di daerah Pasifik Selatan. Serangan itu hanya menyisakan satu orang nelayan yang selamat.\r\n\r\nSeorang ilmuwan bernama Dr. Niko \"Nick\" Tatopoulos (Matthew Broderick) ditugaskan untuk menyelidiki serangan tersebut.\r\n\r\nHasil identifikasi Nick menunjukkan sampel kulit yang dia temukan di kapal karam tersebut berasal dari spesies yang tidak diketahui.\r\n\r\nNamun, ia menolak teori pihak militer bahwa makhluk itu adalah dinosaurus hidup. Nick menyimpulkan monster itu adalah mutan yang tercipta akibat radiasi uji coba nuklir.\r\n\r\nMenurut Nick, mutan tersebut berwujud kadal raksasa yang terpapar radiasi nuklir yang sebelumnya diuji coba di lautan pasifik. Dampak dari radiasi membuat tubuh kadal berkembang lebih cepat dan besar.\r\n\r\nDi tengah penyelidikannya, Nick menemukan fakta kadal raksasa tersbeut diketahui sedang menuju ke New York dan bakal menyerang kota itu.\r\n\r\nBaca artikel CNN Indonesia \"Sinopsis Godzilla (1998), Bioskop Trans TV 17 Desember 2023\" selengkapnya di sini: https://www.cnnindonesia.com/hiburan/20231215174945-220-1037873/sinopsis-godzilla-1998-bioskop-trans-tv-17-desember-2023.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/\r\n\r\n', '2023-12-17 00:00:00', 1, 1),
(8, 3, 5, 'Travis Kelce Dirumorkan Bakal Meramal Taylor Swift', 'article-3-1702824659.jpeg', 'Jakarta, CNN Indonesia -- Travis Kelce dikabarkan akan melamar Taylor Swift tahun depan. Sinyal komitmen serius itu terungkap setelah atlet football itu disebut sudah mempersiapkan cincin tunangan.\r\nDilansir Page Six, Minggu (16/12), sumber orang dekat Kelce mengungkapkan Kelce sudah meminta izin dari ayah Swift, Scott Swift, untuk melamar sang putri. Bahkan, keluarga mereka dikabarkan juga menghabiskan liburan bersama.\r\n\r\n\"Scott telah dimintai restunya dan dengan sepenuh hati telah memberikannya, dan Travis telah berbicara dengan teman-temannya tentang sebuah cincin,\" ujar sumber tersebut.\r\n\r\nSumber tersebut juga menilai Kelce sebagai sosok paling ekstrovert yang pernah dikencani Swift selama ini. Hal itu berbeda dengan hubungan Swift sebelumnya yang terkesan ingin jauh dari sorotan media.\r\n\r\n\"Taylor akhirnya memiliki pasangan yang bersedia dan siap bermain. Dia seperti, \'Saya akan berdiri di sisi panggung dan menunggu Anda melompat ke pelukan saya-saya akan melakukannya!\',\" ujar sumber itu.\r\n\r\nKendati demikian, belum ada klarifikasi resmi dari pihak Swift maupun Kelce terkait kabar rencana pertunangan itu.\r\n\r\nKisah cinta Swift dan Kelce mulai mekar saat musim panas lalu. Kala itu, keduanya dikabarkan berkencan setelah Swift putus dengan mantannya, Joe Alwyn.\r\n\r\nBaca artikel CNN Indonesia \"Travis Kelce Dirumorkan Bakal Melamar Taylor Swift\" selengkapnya di sini: https://www.cnnindonesia.com/hiburan/20231217115417-234-1038314/travis-kelce-dirumorkan-bakal-melamar-taylor-swift.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 3, 1),
(9, 3, 5, 'Paul Banks Interpol Terpesona dengan Es Kopi dan Arsitektur Indoensia', 'article-3-1702824852.jpeg', '\r\nJakarta, CNN Indonesia -- Segelas es kopi susu tersaji di depan Paul Banks. Bongkahan es dalam minuman es kopi susu kedemenan anak-anak \'Jaksel\' itu diam mendengarkan pentolan band Interpol asal Amerika Serikat itu cerita pengalaman pertamanya ke Jakarta.\r\n\"Kopi di sini enak banget ya,\" kata Banks usai menyeruput es kopi susu di gelas yang berkeringat embun itu. \"Salah satu terenak yang pernah saya coba dari seluruh dunia,\"\r\n\r\nBaca artikel CNN Indonesia \"Paul Banks Interpol Terpana Es Kopi dan Arsitektur Indonesia\" selengkapnya di sini: https://www.cnnindonesia.com/hiburan/20231216113147-227-1038045/paul-banks-interpol-terpana-es-kopi-dan-arsitektur-indonesia.\r\n\r\nInterpol menjadi salah satu penampil dalam Joyland Festival akhir November 2023. Sebelum naik panggung menjajal Lapangan Baseball Gelora Bung Karno, Paul menyediakan waktu mengobrol singkat dengan CNNIndonesia.com.\r\n\r\nBanks bukan hanya mengomentari es kopi yang konon diambil dari biji kopi yang ditanam di Indonesia itu, tetapi juga kesan pertamanya melihat langsung Jakarta untuk pertama kali dalam hidupnya.\r\n\r\n\"Saya suka banget di sini, bahkan saya jalan sampai 4 mil (6,5 kilometer) hari ini,\" kata Banks.\r\n\r\nRupanya, Banks termasuk yang tak terganggu dengan cuaca gerah nan lembap khas tropis di Jakarta. Ia bahkan dengan semangat menceritakan terpikat dengan sejumlah bangunan di Jakarta yang ia anggap keren.\r\n\r\n\r\n\r\nBaca artikel CNN Indonesia \"Paul Banks Interpol Terpana Es Kopi dan Arsitektur Indonesia\" selengkapnya di sini: https://www.cnnindonesia.com/hiburan/20231216113147-227-1038045/paul-banks-interpol-terpana-es-kopi-dan-arsitektur-indonesia.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 4, 1),
(10, 4, 3, 'Hasil Liga 1: Radja Nainggolan Debut, Bhayangkara Bantai Persita ', 'article-4-1702832271.jpeg', 'Jakarta, CNN Indonesia -- Bhayangkara FC sukses mengalahkan Persita Tangerang 3-0 pada pertandingan Liga 1 2023/2024 di Stadion Patriot Candrabhaga, Bekasi, Minggu (17/12) malam.\r\nIni menjadi kemenangan kedua Bhayangkara FC di Liga 1 dari 23 pertandingan yang dijalani musim ini. Selain itu kemenangan ini mengakhiri puasa kemenangan Bhayangkara FC setelah tidak pernah menang dalam 16 pertandingan terakhir atau sejak 3 Agustus 2023 atau dalam empat bulan terakhir.\r\n\r\nDi sisi lain dalam pertandingan ini Radja Nainggolan resmi menjalani debut bersama Bhayangkara FC.\r\n\r\nRadja Nainggolan masuk pada menit ke-55 menggantikan Muhammad Ragil. Radja Nainggolan bermain di posisi aslinya yaitu gelandang tengah.\r\n\r\nSaat Radja Nainggolan masuk, Bhayangkara FC sudah unggul 1-0 berkat gol Anderson Sallespada menit ke-27. Salles mencetak gol lewat tendangan bebas indah untuk membawa Bhayangkara FC memimpin 1-0 atas Persita.\r\n\r\nSalles melepaskan tendangan melengkung ke arah sudut atas kiri yang tidak bisa dijangkau kiper Persita.\r\n\r\nBaca artikel CNN Indonesia \"Hasil Liga 1: Radja Nainggolan Debut, Bhayangkara Bantai Persita\" selengkapnya di sini: https://www.cnnindonesia.com/olahraga/20231217204257-142-1038439/hasil-liga-1-radja-nainggolan-debut-bhayangkara-bantai-persita.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 4, 1),
(11, 4, 3, 'Viktor Axelsen Lempar Raket Usai Juara BWF World Tour Finals ', 'article-4-1702832373.jpeg', 'Jakarta, CNN Indonesia -- Selebrasi lempar raket Viktor Axelsen usai menjadi juara BWF World Tour Finals 2023 menjadi hiburan tersendiri di laga final, Minggu (17/12).\r\nViktor Axelsen sukses menjadi juara tunggal putra BWF World Tour Finals 2023 usai mengalahkan\r\n\r\nAxelsen nyaris tidak mendapat kesulitan berarti saat menghadapi Shi Yu Qi di final tunggal putra BWF World Tour Finals 2023.\r\nAxelsen akhirnya sukses mengalahkan Shi Yu Qi 21-11 di gim pertama.\r\n\r\nPada gim kedua, Shi Yu Qi mampu memberikan perlawanan sengit di awal permainan.\r\n\r\nSkor imbang 2-2, 3-3, 4-4, 5-5, 6-6, 7-7, dan 8-8 mengiringi jalannya pertandingan.\r\n\r\nNamun Axelsen berhasil memimpin 11-8 di interval gim pertama.\r\n\r\nUsai interval gim kedua Axelsen berhasil memperlebar keunggulan menjadi 15-9. Akhirnya Axelsen menang 21-12 di gim kedua.\r\n\r\nSetelah memastikan kemenangan Axelsen melakukan selebrasi dengan melemparkan raket yang dipakainya ke arah tribune penonton.\r\n\r\nBaca artikel CNN Indonesia \"Viktor Axelsen Lempar Raket Usai Juara BWF World Tour Finals\" selengkapnya di sini: https://www.cnnindonesia.com/olahraga/20231217191752-170-1038429/viktor-axelsen-lempar-raket-usai-juara-bwf-world-tour-finals.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 3, 1),
(12, 4, 3, 'Persib Resmi Ubah Tanggal Lahir Klub: Alasan dan Prosesnya', 'article-4-1702832479.jpeg', 'Jakarta, CNN Indonesia -- Persib resmi mengumumkan perubahan hari lahir klub dari 14 Maret 1933 menjadi 5 Januari 1919. Berikut alasan Persib ubah hari lahir klub.\r\nPengumuman tersebut dilakukan langsung oleh CEO PT Persib Bandung Bermartabat, Glenn T. Sugita sesaat setelah menerima hasil riset dari Tim Peneliti Hari Jadi Persib yang diketuai Guru Besar Fakultas Ilmu Budaya Universitas Padjadjaran (FIB Unpad), Prof. Kunto Sofianto, Ph.D di Graha Persib, Minggu (17/12).\r\n\r\n\"Setelah hasil riset ini ditetapkan, mulai tahun depan, Persib akan memperingati hari jadinya setiap tanggal 5 Januari,\" kata Glenn dikutip dari laman Persib.\r\n\r\nLebih lanjut Glenn mengatakan, manajemen dan stakeholders akan melakukan sosialisasi kepada masyarakat terkait perubahan hari lahir ini.\r\n\r\n\"Maklum, kita sudah bertahun-tahun merayakan hari jadi setiap tanggal 14 Maret. Kita berharap, penetapan hari jadi yang baru ini bisa menghadirkan berkah dan Persib semakin berjaya di kemudian hari,\" kata Glenn.\r\n\r\nSementara itu Prof. Kunto menjelaskan penetapan tanggal 5 Januari 1919 sebagai hari jadi Persib dilakukan setelah tim peneliti yang beranggotakan Dr. Miftahul Falah M.Hum, Budi Gustaman Sunarya, M.A, Iqbal Reza Satria, S.H., M.I.P. dan Muhammad Ridha Taufiq Rahman, S.IP., MA, bekerja cukup lama melakukan riset sejarah dengan merujuk pada sumber primer dan sumber sezaman.\r\n\r\nBaca artikel CNN Indonesia \"Persib Resmi Ubah Tanggal Lahir Klub: Alasan dan Prosesnya\" selengkapnya di sini: https://www.cnnindonesia.com/olahraga/20231217194731-142-1038431/persib-resmi-ubah-tanggal-lahir-klub-alasan-dan-prosesnya.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-17 00:00:00', 1, 1),
(13, 2, 6, 'BEI Setop Sementara Perdagangan Saham WIKA Buntut Gagal Bayar Sukuk', 'article-2-1702879866.jpg', 'Jakarta, CNN Indonesia -- PT Bursa Efek Indonesia (BEI) menghentikan sementara perdagangan saham PT Wijaya Karya (Persero) Tbk atau WIKA pada Senin (18/12) ini.\r\nPenghentian itu dilakukan karena WIKA telah menunda pembayaran pokok Sukuk Mudharabah Berkelanjutan I Wijaya Karya Tahap I Tahun 2020 Seri A (SMWIKA01ACN1). Padahal, kewajiban pembayaran itu jatuh tempo pada hari ini.\r\n\r\nMenurut BEI, hal tersebut mengindikasikan adanya permasalahan pada kelangsungan usaha perusahaan pelat merah itu.\r\n\r\n\"Bursa Efek Indonesia (Bursa) memutuskan untuk melakukan penghentian sementara Perdagangan Efek PT Wijaya Karya (Persero) Tbk. (WIKA) di seluruh pasar terhitung sejak sesi I perdagangan efek tanggal 18 Desember 2023, hingga pengumuman Bursa lebih lanjut,\" tulis BEI seperti dikutip dari keterbukaan informasi.\r\n\r\nBaca artikel CNN Indonesia \"BEI Setop Sementara Perdagangan Saham WIKA Buntut Gagal Bayar Sukuk\" selengkapnya di sini: https://www.cnnindonesia.com/ekonomi/20231218120109-92-1038620/bei-setop-sementara-perdagangan-saham-wika-buntut-gagal-bayar-sukuk.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-18 00:00:00', 1, 1),
(14, 2, 6, 'PBB Tinjau Pembangunan Proyek IKN ', 'article-2-1702953754.jpeg', 'Jakarta, CNN Indonesia -- PT Bursa Efek Indonesia (BEI) menghentikan sementara perdagangan saham PT Wijaya Karya (Persero) Tbk atau WIKA pada Senin (18/12) ini.\r\nPenghentian itu dilakukan karena WIKA telah menunda pembayaran pokok Sukuk Mudharabah Berkelanjutan I Wijaya Karya Tahap I Tahun 2020 Seri A (SMWIKA01ACN1). Padahal, kewajiban pembayaran itu jatuh tempo pada hari ini.\r\n\r\nMenurut BEI, hal tersebut mengindikasikan adanya permasalahan pada kelangsungan usaha perusahaan pelat merah itu.\r\n\r\nUsai peninjauan Executive Director UNESCAP Armida Alisjahbana mengatakan proses pembangunan IKN telah selaras dalam prinsip dan tren global saat ini. Ia mengatakan pembangunan juga sudah mendukung keberlanjutan dalam pembangunan kota modern.\r\n\r\n\"Sustainability (keberlanjutan) merupakan poin utama yang saya lihat dalam kunjungan kali ini, dengan upaya Otorita IKN melakukan reforestasi serta memberikan upskilling (pemberdayaan) kepada warga sekitar dalam menunjang mata pencaharian yang berkelanjutan. Ini adalah langkah pertama yang bagus,\" ungkap Armida dalam keterangannya di Jakarta, Senin (18/12).\r\n\r\nIa menambahkan dua program penghijauan dan pemberdayaan yang dikunjungi oleh UNESCAP di proyek IKN tersebut akan menjadi salah satu sumber data yang  menjadi laporan dalam VLR nusantara mengenai perkembangan SDGs di Indonesia pada High-Level Political Forum SDGs.\r\n\r\nForum itu sedianya akan dilaksanakan di New York pada 2024.\r\n\r\nKepala Otorita IKN Bambang Susantono menyebut implementasi SDGs memang menjadi perhatian penting dalam pembangunan IKN Nusantara.\r\n\r\n\"Perhatian pertama kami (Otorita IKN) dalam membangun Nusantara adalah menjadikannya sebagai sustainable dan livable city (kota layak hidup dan berkelanjutan), pengimplementasian SDG sudah kita masukkan dalam setiap proyek di Nusantara, di mana terlihat dalam Persemaian Mentawir sebagai langkah awal reforestasi serta Pertanian Hidroponik dari Warga Sepaku yang menjadi aksi dukungan usaha ekonomi yang berkelanjutan,\" katanya.\r\n\r\nBaca artikel CNN Indonesia \"PBB Tinjau Pembangunan Proyek IKN\" selengkapnya di sini: https://www.cnnindonesia.com/ekonomi/20231218111206-92-1038598/pbb-tinjau-pembangunan-proyek-ikn.\r\n\r\nDownload Apps CNN Indonesia sekarang https://app.cnnindonesia.com/', '2023-12-18 00:00:00', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `article_type`
--

CREATE TABLE `article_type` (
  `artype_id` int(11) NOT NULL,
  `artype_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `article_type`
--

INSERT INTO `article_type` (`artype_id`, `artype_name`) VALUES
(1, 'Standar'),
(2, 'Pilihan Redaksi'),
(3, 'Topik Utama'),
(4, 'Populer');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `author_id` int(11) NOT NULL,
  `email` varchar(55) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL COMMENT 'dienkripsi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`author_id`, `email`, `username`, `password`) VALUES
(1, 'author@author.com', 'Ekasari Amalia', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'raafi@raafi.com', 'Muhammad Raafi', 'b91aea98620cfe0bc7e3db5352e92ad1'),
(4, 'fahri@fahri.com', 'Fahri Salam', 'dad1e0bd5145d5a1be0bfc74e5f7ca16'),
(5, 'ayu@ayu.com', 'Ayu Kartika', 'c1f8a56df25c33eefd8d0ca07d4641e8'),
(6, 'riska@riska.com', 'Riska Amalia', '6b24045d226e846dc55c0c54e0fb8837');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Teknologi'),
(2, 'Ekonomi'),
(3, 'Hiburan'),
(4, 'Olahraga'),
(5, 'Politik');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `author_id` (`author_id`),
  ADD KEY `article_type` (`article_type`);

--
-- Indexes for table `article_type`
--
ALTER TABLE `article_type`
  ADD PRIMARY KEY (`artype_id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  ADD CONSTRAINT `articles_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `author` (`author_id`),
  ADD CONSTRAINT `articles_ibfk_3` FOREIGN KEY (`article_type`) REFERENCES `article_type` (`artype_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
