-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 19, 2024 at 11:00 AM
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
-- Database: `havzayeg`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `designer_id` int(11) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_sort_order` int(11) NOT NULL,
  `in_header_menu` tinyint(1) NOT NULL DEFAULT 0,
  `in_footer_menu` tinyint(1) NOT NULL DEFAULT 0,
  `in_panel_menu` tinyint(1) NOT NULL DEFAULT 0,
  `icon` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `parent_id`, `designer_id`, `content_id`, `category_name`, `category_sort_order`, `in_header_menu`, `in_footer_menu`, `in_panel_menu`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(72, 0, 88, 382, 'Duyurular', 0, 0, 0, 1, 'fas fa-folder', 1, '2023-11-07 07:24:29', '2024-01-17 07:00:11'),
(75, 0, 54, 406, 'Gizlilik Politikası', 3, 0, 0, 0, 'fas fa-folder', 1, '2023-11-13 10:51:45', '2023-11-27 11:50:54'),
(76, 0, 54, 407, 'Çerez Politikası', 4, 0, 0, 0, 'fas fa-folder', 1, '2023-11-13 10:52:03', '2023-11-27 11:50:25'),
(85, 0, 70, 462, 'Anasayfa', 2, 0, 0, 1, 'fas fa-folder', 1, '2023-12-04 12:49:49', '2023-12-04 12:49:49'),
(88, 0, 69, 482, 'İletişim', 99, 0, 0, 1, 'fas fa-folder', 1, '2023-12-08 08:19:00', '2023-12-08 08:19:00'),
(90, 0, 80, 526, 'Hakkımızda', 99, 0, 0, 1, 'fas fa-folder', 1, '2023-12-13 10:05:29', '2024-01-13 08:08:18'),
(91, 0, 83, 562, 'Search', 99, 0, 0, 1, 'fas fa-folder', 1, '2023-12-18 09:46:16', '2023-12-18 09:46:16'),
(92, 0, 84, 818, 'Leader Yaklaşımı', 99, 0, 0, 1, 'fas fa-folder', 1, '2024-01-13 13:17:14', '2024-01-13 13:17:14'),
(94, 0, 86, 822, 'Faaliyetler', 0, 0, 0, 1, 'fas fa-folder', 1, '2024-01-16 08:52:20', '2024-01-16 08:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `content_id` int(11) UNSIGNED NOT NULL,
  `content_parent_id` int(11) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `designer_id` int(11) NOT NULL,
  `language_id` int(11) UNSIGNED NOT NULL,
  `content_name` varchar(255) NOT NULL,
  `content_sort_order` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(500) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `show_place` varchar(255) NOT NULL,
  `content_data` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`content_id`, `content_parent_id`, `category_id`, `designer_id`, `language_id`, `content_name`, `content_sort_order`, `slug`, `status`, `show_place`, `content_data`, `created_at`, `updated_at`) VALUES
(382, 382, 72, 88, 1, 'Duyurular', 1, 'duyurular', 1, '', '{\"titleSeo_1\":\"Havza YEG - Duyurular\",\"descriptionSeo_1\":\"Havza YEG - Duyurular\",\"banner_image_1_1802\":[\"duyurular-banner_30_.png\",\"99\"]}', '2023-11-07 07:24:29', '2024-01-19 09:31:41'),
(406, 406, 75, 54, 1, 'Gizlilik Politikası', 1, 'gizlilik-politikasi', 1, '', '{\"title_1\":\"112Life\'a ait Gizlilik Politikas\\u0131 Bilgilendirmesi\",\"content_1\":\"    <div class=\\\"container\\\">\\r\\n       <div class=\\\"row\\\">\\r\\n          <div class=\\\"col-md-12 my-class\\\">\\r\\n             <p>\\r\\n             <\\/p><div class=\\\"ltn__page-details-area ltn__blog-details-area mb-120\\\">\\r\\n                <div class=\\\"container\\\">\\r\\n                   <div class=\\\"row\\\">\\r\\n                      <div class=\\\"col-lg-12\\\">\\r\\n                         <div class=\\\"ltn__blog-details-wrap\\\">\\r\\n                            <div class=\\\"ltn__page-details-inner ltn__blog-details-inner\\\">\\r\\n                               <h2 class=\\\"ltn__blog-title\\\">\\r\\n                                  Gizlilik Politikas\\u0131\\r\\n                               <\\/h2>\\r\\n                               <div class=\\\"content\\\">\\r\\n                                  <p>Bu gizlilik politikas\\u0131, 112L\\u0130fe websitesi \\u00fczerinden toplanan ve kullan\\u0131lan ki\\u015fisel verilerle ilgili bilgileri a\\u00e7\\u0131klar.<\\/p>\\r\\n                                  <p><strong>Toplanan Ki\\u015fisel Veriler<\\/strong><\\/p>\\r\\n                                  <p>112L\\u0130fe, web sitesi \\u00fczerinden kullan\\u0131c\\u0131lar taraf\\u0131ndan sa\\u011flanan a\\u015fa\\u011f\\u0131daki ki\\u015fisel verileri toplayabilir:<\\/p>\\r\\n                                  <ul>\\r\\n                                     <li>\\u0130sim ve Soyisim<\\/li>\\r\\n                                     <li>Telefon Numaras\\u0131<\\/li>\\r\\n                                     <li>E-posta Adresi<\\/li>\\r\\n                                     <li>Adres<\\/li>\\r\\n                                     <li>Cinsiyet<\\/li>\\r\\n                                     <li>Medeni Durum<\\/li>\\r\\n                                     <li>Mezuniyet Bilgileri<\\/li>\\r\\n                                     <li>\\u0130\\u015f Tecr\\u00fcbeleri<\\/li>\\r\\n                                     <li>Ba\\u015fvurmak \\u0130stenilen Pozisyon<\\/li>\\r\\n                                  <\\/ul>\\r\\n                                  <p><strong>Ki\\u015fisel Verilerin Kullan\\u0131m\\u0131<\\/strong><\\/p>\\r\\n                                  <p>Toplanan ki\\u015fisel veriler, a\\u015fa\\u011f\\u0131daki ama\\u00e7larla kullan\\u0131labilir:<\\/p>\\r\\n                                  <ul>\\r\\n                                     <li>M\\u00fc\\u015fteri taleplerini yan\\u0131tlamak ve hizmet sunmak<\\/li>\\r\\n                                     <li>\\u0130\\u015f ba\\u015fvurular\\u0131n\\u0131 de\\u011ferlendirmek<\\/li>\\r\\n                                     <li>\\u0130leti\\u015fim kurmak ve g\\u00fcncellemeleri sa\\u011flamak<\\/li>\\r\\n                                     <li>\\u0130statistiksel analizler yapmak ve web sitesini geli\\u015ftirmek<\\/li>\\r\\n                                     <li>Yasal gerekliliklere uymak<\\/li>\\r\\n                                  <\\/ul>\\r\\n                                  <p><strong>Ki\\u015fisel Verilerin Payla\\u015f\\u0131lmas\\u0131<\\/strong><\\/p>\\r\\n                                  <p>112L\\u0130fe, toplanan ki\\u015fisel verileri yaln\\u0131zca belirtilen ama\\u00e7lar do\\u011frultusunda kullan\\u0131r ve \\u00fc\\u00e7\\u00fcnc\\u00fc taraflarla payla\\u015fmaz, satmaz veya kiralamaz, ancak yasal gereklilikler veya yetkili makamlar taraf\\u0131ndan talep edilmesi durumunda payla\\u015f\\u0131labilir.<\\/p>\\r\\n                                  <p><strong>Ki\\u015fisel Verilerin G\\u00fcvenli\\u011fi<\\/strong><\\/p>\\r\\n                                  <p>112L\\u0130fe, toplanan ki\\u015fisel verilerin g\\u00fcvenli\\u011fini sa\\u011flamak i\\u00e7in uygun teknik ve idari \\u00f6nlemler al\\u0131r. Ancak, internet \\u00fczerinden yap\\u0131lan ileti\\u015fimde tam g\\u00fcvenlik garantisi verilemez ve kullan\\u0131c\\u0131lar taraf\\u0131ndan sa\\u011flanan verilerin g\\u00fcvenli\\u011fi i\\u00e7in herhangi bir sorumluluk kabul edilmez.<\\/p>\\r\\n                                  <p><strong>Ki\\u015fisel Verilerin Korunmas\\u0131<\\/strong><\\/p>\\r\\n                                  <p>112L\\u0130fe, toplanan ki\\u015fisel verileri ilgili mevzuata uygun \\u015fekilde i\\u015fler ve saklar. Ki\\u015fisel veriler, topland\\u0131ktan sonra makul s\\u00fcrelerde silinir veya anonimle\\u015ftirilir, ancak yasal gereklilikler veya i\\u015f gereklilikleri do\\u011frultusunda muhafaza edilebilir.<\\/p>\\r\\n                                  <p><strong>Gizlilik Politikas\\u0131n\\u0131n G\\u00fcncellenmesi<\\/strong><\\/p>\\r\\n                                  <p>Bu gizlilik politikas\\u0131 zaman zaman g\\u00fcncellenebilir. G\\u00fcncellenmi\\u015f politikalar, web sitesinde yay\\u0131nland\\u0131\\u011f\\u0131 anda y\\u00fcr\\u00fcrl\\u00fc\\u011fe girecektir. L\\u00fctfen d\\u00fczenli olarak gizlilik politikam\\u0131z\\u0131 kontrol ederek g\\u00fcncellemeler hakk\\u0131nda bilgi sahibi olun.<\\/p>\\r\\n                                  <p><strong>\\u0130leti\\u015fim<\\/strong><\\/p>\\r\\n                                  <p>Gizlilik politikas\\u0131 ile ilgili herhangi bir sorunuz varsa, l\\u00fctfen bize <a href=\\\"mailto:info@112life.com\\\">info@112life.com<\\/a> \\u00fczerinden ula\\u015f\\u0131n.<\\/p>\\r\\n                                  <br>\\r\\n                                  <br>\\r\\n                                  <br>\\r\\n                               <\\/div>\\r\\n                            <\\/div>\\r\\n                         <\\/div>\\r\\n                      <\\/div>\\r\\n                   <\\/div>\\r\\n                <\\/div>\\r\\n             <\\/div>\\r\\n             <p><\\/p>\\r\\n          <\\/div>\\r\\n       <\\/div>\\r\\n    <\\/div>\"}', '2023-11-13 10:51:45', '2023-11-27 11:50:54'),
(407, 407, 76, 54, 1, 'Çerez Politikası', 1, 'cerez-politikasi', 1, '', '{\"title_1\":\"112Life\'a ait \\u00c7erez Politikas\\u0131 Bilgilendirmesi\",\"content_1\":\"            <div class=\\\"container\\\">\\r\\n               <div class=\\\"row\\\">\\r\\n                  <div class=\\\"col-md-12 my-class\\\">\\r\\n                     <p>\\r\\n                     <\\/p><div class=\\\"ltn__page-details-area ltn__blog-details-area mb-120\\\">\\r\\n                        <div class=\\\"container\\\">\\r\\n                           <div class=\\\"row\\\">\\r\\n                              <div class=\\\"col-lg-12\\\">\\r\\n                                 <div class=\\\"ltn__blog-details-wrap\\\">\\r\\n                                    <div class=\\\"ltn__page-details-inner ltn__blog-details-inner\\\">\\r\\n                                       <h2 class=\\\"ltn__blog-title\\\">\\r\\n                                          \\u00c7erez Politikas\\u0131\\r\\n                                       <\\/h2>\\r\\n                                       <div class=\\\"content\\\">\\r\\n                                          <p><strong>\\u00c7erez Politikas\\u0131<\\/strong><\\/p>\\r\\n                                          <p>Bu \\u00e7erez politikas\\u0131, 112L\\u0130fe websitesi \\u00fczerinden toplanan ve kullan\\u0131lan \\u00e7erezlerle ilgili bilgileri a\\u00e7\\u0131klar.<\\/p>\\r\\n                                          <p><strong>\\u00c7erezler nedir?<\\/strong><\\/p>\\r\\n                                          <p>\\u00c7erezler, bir internet sitesi taraf\\u0131ndan kullan\\u0131c\\u0131n\\u0131n taray\\u0131c\\u0131s\\u0131na veya cihaz\\u0131na yerle\\u015ftirilen k\\u00fc\\u00e7\\u00fck metin dosyalar\\u0131d\\u0131r. Bu dosyalar, taray\\u0131c\\u0131 taraf\\u0131ndan web sitesine geri g\\u00f6nderildi\\u011finde site taraf\\u0131ndan tan\\u0131nman\\u0131z\\u0131 sa\\u011flar. \\u00c7erezler, \\u00e7e\\u015fitli ama\\u00e7lar i\\u00e7in kullan\\u0131labilir, \\u00f6rne\\u011fin kullan\\u0131c\\u0131 deneyimini geli\\u015ftirmek, siteyi analiz etmek, ki\\u015fiselle\\u015ftirilmi\\u015f reklamlar sunmak gibi.<\\/p>\\r\\n                                          <p><strong>112L\\u0130fe websitesinde kullan\\u0131lan \\u00e7erezler<\\/strong><\\/p>\\r\\n                                          <p>112L\\u0130fe websitesi, a\\u015fa\\u011f\\u0131daki t\\u00fcrde \\u00e7erezleri kullanabilir:<\\/p>\\r\\n                                          <ol style=\\\"list-style: inside;\\\">\\r\\n                                             <li>Zorunlu \\u00c7erezler: Bu \\u00e7erezler, web sitesinin temel i\\u015flevselli\\u011fi i\\u00e7in gereklidir ve kullan\\u0131c\\u0131n\\u0131n siteyi gezebilmesi ve temel \\u00f6zelliklerini kullanabilmesi i\\u00e7in depolan\\u0131r. Bu \\u00e7erezler kullan\\u0131c\\u0131 taraf\\u0131ndan devre d\\u0131\\u015f\\u0131 b\\u0131rak\\u0131lamaz.<\\/li>\\r\\n                                             <li>Analitik ve Performans \\u00c7erezleri: Bu \\u00e7erezler, web sitesinin performans\\u0131n\\u0131 izlemek, kullan\\u0131c\\u0131 etkile\\u015fimlerini anlamak ve siteyi geli\\u015ftirmek i\\u00e7in kullan\\u0131l\\u0131r. Bu \\u00e7erezler arac\\u0131l\\u0131\\u011f\\u0131yla toplanan bilgiler ki\\u015fisel kimlik bilgileri i\\u00e7ermez ve anonim olarak i\\u015flenir.<\\/li>\\r\\n                                             <li>Hedefleme ve Reklam \\u00c7erezleri: Bu \\u00e7erezler, kullan\\u0131c\\u0131lar\\u0131n ilgi alanlar\\u0131na dayal\\u0131 olarak daha ki\\u015fiselle\\u015ftirilmi\\u015f reklamlar sunmak i\\u00e7in kullan\\u0131l\\u0131r. Bu \\u00e7erezler, kullan\\u0131c\\u0131lar\\u0131n web sitesindeki etkile\\u015fimlerini takip edebilir ve bu bilgiler reklamverenlerle payla\\u015f\\u0131labilir.<\\/li>\\r\\n                                          <\\/ol>\\r\\n                                          <p><strong>\\u00c7erezleri y\\u00f6netme<\\/strong><\\/p>\\r\\n                                          <p>Taray\\u0131c\\u0131n\\u0131z\\u0131n ayarlar\\u0131n\\u0131 kullanarak \\u00e7erezleri kontrol edebilir veya engelleyebilirsiniz. Taray\\u0131c\\u0131n\\u0131z\\u0131n ayarlar\\u0131 \\u00fczerinden \\u00e7erezleri kabul etmeyi, reddetmeyi veya istedi\\u011finiz durumda sizi uyar\\u0131 vermelerini sa\\u011flayabilirsiniz. Ancak, baz\\u0131 zorunlu \\u00e7erezlerin devre d\\u0131\\u015f\\u0131 b\\u0131rak\\u0131lmas\\u0131, web sitesinin baz\\u0131 i\\u015flevlerinin d\\u00fczg\\u00fcn \\u00e7al\\u0131\\u015fmas\\u0131n\\u0131 engelleyebilir.<\\/p>\\r\\n                                          <p><strong>Ki\\u015fisel Verilerin Korunmas\\u0131<\\/strong><\\/p>\\r\\n                                          <p>112L\\u0130fe, toplanan \\u00e7erezler arac\\u0131l\\u0131\\u011f\\u0131yla ki\\u015fisel verilerinizi izlememekte ve toplamamaktad\\u0131r. \\u00c7erezler arac\\u0131l\\u0131\\u011f\\u0131yla toplanan bilgiler anonim olarak i\\u015flenir ve istatistiksel ama\\u00e7larla kullan\\u0131l\\u0131r.<\\/p>\\r\\n                                          <p><strong>\\u00c7erez politikas\\u0131n\\u0131n g\\u00fcncellenmesi<\\/strong><\\/p>\\r\\n                                          <p>Bu \\u00e7erez politikas\\u0131 zaman zaman g\\u00fcncellenebilir. G\\u00fcncellenmi\\u015f politikalar, web sitesinde yay\\u0131nland\\u0131\\u011f\\u0131 anda y\\u00fcr\\u00fcrl\\u00fc\\u011fe girecektir. L\\u00fctfen d\\u00fczenli olarak \\u00e7erez politikam\\u0131z\\u0131 kontrol ederek g\\u00fcncellemeler hakk\\u0131nda bilgi sahibi olun.<\\/p>\\r\\n                                          <p><strong>\\u0130leti\\u015fim<\\/strong><\\/p>\\r\\n                                          <p>\\u00c7erez politikas\\u0131 ile ilgili herhangi bir sorunuz varsa, l\\u00fctfen bize <a href=\\\"mailto:info@112life.com\\\">info@112life.com<\\/a> \\u00fczerinden ula\\u015f\\u0131n.<\\/p>\\r\\n                                          <br>\\r\\n                                          <br>\\r\\n                                          <br>\\r\\n                                       <\\/div>\\r\\n                                    <\\/div>\\r\\n                                 <\\/div>\\r\\n                              <\\/div>\\r\\n                           <\\/div>\\r\\n                        <\\/div>\\r\\n                     <\\/div>\\r\\n                     <p><\\/p>\\r\\n                  <\\/div>\\r\\n               <\\/div>\\r\\n            <\\/div>\"}', '2023-11-13 10:52:03', '2023-11-27 11:50:25'),
(462, 462, 85, 70, 1, 'Anasayfa', 1, 'home', 1, '', '{\"seoDescription_1\":\"Havza YEG\",\"seoTitle_1\":\"Havza YEG\",\"image_1_4428\":[\"havza_image_32_.jpg\",\"99\"]}', '2023-12-04 12:49:49', '2024-01-18 09:06:12'),
(482, 482, 88, 69, 1, 'İletişim', 1, 'iletisim', 1, '', '{\"seoTitle_1\":\"Havza YEG -  \\u0130leti\\u015fim\",\"seoDescription_1\":\"Havza YEG -  \\u0130leti\\u015fim\",\"banner_image_1_902\":[\"slider_payroll_services_30_.jpg\",\"99\"]}', '2023-12-08 08:19:00', '2024-01-17 10:10:55'),
(526, 526, 90, 80, 1, 'Hakkımızda Sayfası', 1, 'hakkimizda', 1, '', '{\"image_1_9767\":[\"hakkimizda_33_.jpg\",\"99\"],\"seoTitle_1\":\"Havza YEG -  Hakk\\u0131m\\u0131zda\",\"seoDescription_1\":\"Havza YEG -  Hakk\\u0131m\\u0131zda\",\"banner_image_1_472366\":[\"hakk_30_.jpg\",\"99\"]}', '2023-12-13 10:05:29', '2024-01-19 08:12:58'),
(562, 562, 91, 83, 1, 'Search', 1, 'arama', 1, '', '{\"seoTitle_1\":\"112 Life - Search\",\"seoDescription_1\":\"112 Life - Search\"}', '2023-12-18 09:46:16', '2023-12-23 14:28:25'),
(818, 818, 92, 84, 1, 'Leader Yaklaşımı', 1, 'leader-yaklasimi', 1, '', '{\"seoDescription_1\":\"Havza YEG - Leader Yakla\\u015f\\u0131m\\u0131\",\"seoTitle_1\":\"Havza YEG - Leader Yakla\\u015f\\u0131m\\u0131\",\"banner_image_1_325015\":[\"hakkimizda-banner_30_.jpg\",\"99\"],\"image_1_244\":[\"leader1_34_.jpg\",\"99\"],\"image_1_245\":[\"leader2_34_.jpg\",\"99\"]}', '2024-01-13 13:17:14', '2024-01-19 08:33:32'),
(820, 820, 72, 89, 1, 'İşe Alım İlanı', 1, 'ise-alim-ilani', 1, '', '{\"image_1_4321\":[\"800x533-ph.jpg\",\"99\"],\"baslik_1\":\"Duyuru 1\",\"icerik_1\":\"Lorem ipsum dollor sit amet\"}', '2024-01-15 14:16:00', '2024-01-17 07:04:47'),
(821, 821, 72, 89, 1, 'Duyuru 2', 1, 'duyuru-2', 1, '', '{\"image_1_5531\":[\"800x533-ph.jpg\",\"99\"],\"baslik_1\":\"Duyuru 2\",\"icerik_1\":\"Lorem ipsum dollor sit amet\"}', '2024-01-15 14:41:50', '2024-01-17 07:05:14'),
(822, 822, 94, 86, 1, 'Faaliyetler', 1, 'faaliyetler', 1, '', '{\"seoTitle_1\":\"Havza YEG - Faalliyetler\",\"seoDescription_1\":\"Havza YEG - Faalliyetler\",\"banner_image_1_3821\":[\"faaliyetler-banner_30_.jpg\",\"99\"]}', '2024-01-16 08:52:20', '2024-01-17 09:42:40'),
(823, 823, 94, 87, 1, 'Faaliyet 1', 1, 'faaliyet-1', 1, '', '{\"image_1_7354\":[\"800x533-ph.jpg\",\"99\"],\"baslik_1\":\"Faaliyet 1\",\"icerik_1\":\"Lorem ipsum dollor sit amet Lorem ipsum dollor sit amet Lorem ipsum dollor sit amet Lorem ipsum dollor sit amet Lorem ipsum dollor sit amet \"}', '2024-01-16 12:05:56', '2024-01-16 12:09:04'),
(824, 824, 94, 87, 1, 'Faaliyet 2', 2, 'faaliyet-2', 1, '', '{\"image_1_4572\":[\"800x533-ph.jpg\",\"99\"],\"baslik_1\":\"Faaliyet 2\",\"icerik_1\":\"<p>Lorem ipsum dollor sit amet<\\/p>\"}', '2024-01-16 12:06:45', '2024-01-16 12:09:49'),
(825, 825, 94, 87, 1, 'Faaliyet 3', 3, 'faaliyet-3', 1, '', '{\"image_1_4593\":[\"800x533-ph.jpg\",\"99\"],\"baslik_1\":\"Faaliyet 3\",\"icerik_1\":\"<p>lorem ipsum dollor sit amet<\\/p>\"}', '2024-01-16 12:07:13', '2024-01-16 12:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `designer_id` int(11) UNSIGNED NOT NULL,
  `designer_name` varchar(255) NOT NULL,
  `view_name` varchar(255) NOT NULL,
  `designer_sort_order` int(11) NOT NULL DEFAULT 9999,
  `designer_data` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`designer_id`, `designer_name`, `view_name`, `designer_sort_order`, `designer_data`, `created_at`, `updated_at`) VALUES
(54, 'kvkk tasarım', 'kvkk', 99, '[{\"groupId\":\"groupqjipf1y19\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formq7wo30ej9\",\"formElementType\":\"File\",\"formElementName\":\"image\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form1lsow6u2c\",\"formElementType\":\"Input\",\"formElementName\":\"title\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formswl1ckdpf\",\"formElementType\":\"Text Area\",\"formElementName\":\"content\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2023-10-18 12:40:11', '2023-10-18 12:40:11'),
(69, 'İletişim Sayfası Tasarım', 'iletisim', 0, '[{\"groupId\":\"groupy66mp3g7k\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formvzjlmn2nm\",\"formElementType\":\"Input\",\"formElementName\":\"seoTitle\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form5cb44fosq\",\"formElementType\":\"Input\",\"formElementName\":\"seoDescription\",\"formElementRow\":\"2\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"forml2r61ng1o\",\"formElementType\":\"File\",\"formElementName\":\"banner_image\",\"formElementRow\":\"3\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2023-12-04 10:09:24', '2024-01-17 09:12:22'),
(70, 'Anasayfa Designer', 'home', 0, '[{\"groupId\":\"groupdjrrkxlkc\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formoyxfo95i6\",\"formElementType\":\"Input\",\"formElementName\":\"seoDescription\",\"formElementRow\":\"98\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formq7e73bmmj\",\"formElementType\":\"Input\",\"formElementName\":\"seoTitle\",\"formElementRow\":\"99\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]},{\"groupId\":\"groupyhghxq7v7\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formd8qnbm7uw\",\"formElementType\":\"File\",\"formElementName\":\"image\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2023-12-04 12:42:33', '2024-01-18 08:59:33'),
(80, 'Hakkımızda Sayfası Tasarım', 'hakkimizda', 99, '[{\"groupId\":\"groupouwe2j5he\",\"groupOrder\":\"2\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formbuckfytek\",\"formElementType\":\"File\",\"formElementName\":\"image\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]},{\"groupId\":\"groupl9wjqeyxk\",\"groupOrder\":\"1\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formx2mox8hnc\",\"formElementType\":\"Input\",\"formElementName\":\"seoTitle\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form18cl498vj\",\"formElementType\":\"Input\",\"formElementName\":\"seoDescription\",\"formElementRow\":\"2\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form47avzdtyu\",\"formElementType\":\"File\",\"formElementName\":\"banner_image\",\"formElementRow\":\"98\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2023-12-13 10:04:53', '2024-01-19 08:12:08'),
(83, 'Search Sayfası Tasarım', 'search', 99, '[{\"groupId\":\"groupot0auocbv\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"form77jxlb5s8\",\"formElementType\":\"Input\",\"formElementName\":\"seoTitle\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formzxnj9n3g7\",\"formElementType\":\"Input\",\"formElementName\":\"seoDescription\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2023-12-18 09:45:39', '2023-12-18 09:45:39'),
(84, 'Leader Yaklaşımı', 'leader-yaklasimi', 0, '[{\"groupId\":\"groupqq7n00krn\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formobezty48o\",\"formElementType\":\"Input\",\"formElementName\":\"seoDescription\",\"formElementRow\":\"98\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form4ekg8q08l\",\"formElementType\":\"Input\",\"formElementName\":\"seoTitle\",\"formElementRow\":\"99\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formu27q7q3i9\",\"formElementType\":\"File\",\"formElementName\":\"banner_image\",\"formElementRow\":\"100\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]},{\"groupId\":\"group4rxaoi22f\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"form40bukl3j3\",\"formElementType\":\"File\",\"formElementName\":\"image\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2024-01-13 13:16:44', '2024-01-19 08:32:19'),
(86, 'Faaliyetler', 'faaliyetler', 0, '[{\"groupId\":\"grouphvzk7wjtf\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"form360xmki6u\",\"formElementType\":\"Input\",\"formElementName\":\"seoTitle\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formizstx160q\",\"formElementType\":\"Input\",\"formElementName\":\"seoDescription\",\"formElementRow\":\"2\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formf7stap4gd\",\"formElementType\":\"File\",\"formElementName\":\"banner_image\",\"formElementRow\":\"3\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2024-01-16 08:47:34', '2024-01-17 09:13:41'),
(87, 'Faaliyet Detay Design', 'faaliyet-detay', 0, '[{\"groupId\":\"group77am68dkq\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"form4c4ubhn7z\",\"formElementType\":\"File\",\"formElementName\":\"image\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formqjiqfalzl\",\"formElementType\":\"Input\",\"formElementName\":\"baslik\",\"formElementRow\":\"2\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formg3yt480zk\",\"formElementType\":\"Text Area\",\"formElementName\":\"icerik\",\"formElementRow\":\"3\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2024-01-16 08:50:06', '2024-01-16 12:26:11'),
(88, 'Duyurular Sayfası Design', 'duyurular', 0, '[{\"groupId\":\"groupftoz7x3pc\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"form7olv2sstn\",\"formElementType\":\"Input\",\"formElementName\":\"titleSeo\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formw9vg9rzj7\",\"formElementType\":\"Input\",\"formElementName\":\"descriptionSeo\",\"formElementRow\":\"2\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form83cg4o7p1\",\"formElementType\":\"File\",\"formElementName\":\"banner_image\",\"formElementRow\":\"\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2024-01-17 06:59:52', '2024-01-17 09:16:15'),
(89, 'Duyurular Detay', 'duyuru-detay', 0, '[{\"groupId\":\"groupvrshv2p5h\",\"groupOrder\":\"\",\"groupType\":\"1\",\"forms\":[{\"formElementId\":\"formcqfj4nf93\",\"formElementType\":\"File\",\"formElementName\":\"image\",\"formElementRow\":\"1\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"formpadfiwdsl\",\"formElementType\":\"Input\",\"formElementName\":\"baslik\",\"formElementRow\":\"2\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"},{\"formElementId\":\"form3ebrzx20u\",\"formElementType\":\"Text Area\",\"formElementName\":\"icerik\",\"formElementRow\":\"3\",\"formElementDefault\":\"\",\"formElementRequired\":\"0\"}]}]', '2024-01-17 07:03:07', '2024-01-17 07:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `designer_data_languages`
--

CREATE TABLE `designer_data_languages` (
  `designer_data_languages_id` int(11) UNSIGNED NOT NULL,
  `designer_id` int(11) UNSIGNED NOT NULL,
  `language_id` int(11) UNSIGNED NOT NULL,
  `language_data` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `designer_data_languages`
--

INSERT INTO `designer_data_languages` (`designer_data_languages_id`, `designer_id`, `language_id`, `language_data`, `created_at`, `updated_at`) VALUES
(122, 54, 1, '[{\"groupId\":\"groupqjipf1y19\",\"groupName\":\"kvkk grup\",\"forms\":[{\"formElementId\":\"formq7wo30ej9\",\"formElementLabel\":\"Resim\"},{\"formElementId\":\"form1lsow6u2c\",\"formElementLabel\":\"Başlık\"},{\"formElementId\":\"formswl1ckdpf\",\"formElementLabel\":\"İçerik\"}]}]', '2023-10-18 15:40:11', '2023-10-18 15:40:11'),
(177, 69, 1, '[{\"groupId\":\"groupy66mp3g7k\",\"groupName\":\"SEO\",\"forms\":[{\"formElementId\":\"formvzjlmn2nm\",\"formElementLabel\":\"title\"},{\"formElementId\":\"form5cb44fosq\",\"formElementLabel\":\"description\"},{\"formElementId\":\"forml2r61ng1o\",\"formElementLabel\":\"Banner Resmi\"}]}]', '2023-12-04 13:09:24', '2024-01-17 12:12:22'),
(182, 70, 1, '[{\"groupId\":\"groupdjrrkxlkc\",\"groupName\":\"Anasayfa Veriler\",\"forms\":[{\"formElementId\":\"formoyxfo95i6\",\"formElementLabel\":\"description\"},{\"formElementId\":\"formq7e73bmmj\",\"formElementLabel\":\"title\"}]},{\"groupId\":\"groupyhghxq7v7\",\"groupName\":\"veriler\",\"forms\":[{\"formElementId\":\"formd8qnbm7uw\",\"formElementLabel\":\"Havza Resim\"}]}]', '2023-12-04 15:42:33', '2024-01-18 11:59:33'),
(222, 80, 1, '[{\"groupId\":\"groupouwe2j5he\",\"groupName\":\"Veriler\",\"forms\":[{\"formElementId\":\"formbuckfytek\",\"formElementLabel\":\"Hakkımızda Resim\"}]},{\"groupId\":\"groupl9wjqeyxk\",\"groupName\":\"SEO\",\"forms\":[{\"formElementId\":\"formx2mox8hnc\",\"formElementLabel\":\"Title\"},{\"formElementId\":\"form18cl498vj\",\"formElementLabel\":\"Description\"},{\"formElementId\":\"form47avzdtyu\",\"formElementLabel\":\"Banner Resim\"}]}]', '2023-12-13 13:04:53', '2024-01-19 11:12:08'),
(234, 83, 1, '[{\"groupId\":\"groupot0auocbv\",\"groupName\":\"\",\"forms\":[{\"formElementId\":\"form77jxlb5s8\",\"formElementLabel\":\"title\"},{\"formElementId\":\"formzxnj9n3g7\",\"formElementLabel\":\"description\"}]}]', '2023-12-18 12:45:39', '2023-12-18 12:45:39'),
(238, 84, 1, '[{\"groupId\":\"groupqq7n00krn\",\"groupName\":\"Veriler\",\"forms\":[{\"formElementId\":\"formobezty48o\",\"formElementLabel\":\"Description\"},{\"formElementId\":\"form4ekg8q08l\",\"formElementLabel\":\"Title\"},{\"formElementId\":\"formu27q7q3i9\",\"formElementLabel\":\"Banner Resmi\"}]},{\"groupId\":\"group4rxaoi22f\",\"groupName\":\"Veriler\",\"forms\":[{\"formElementId\":\"form40bukl3j3\",\"formElementLabel\":\"Resimler\"}]}]', '2024-01-13 16:16:44', '2024-01-19 11:32:19'),
(240, 86, 1, '[{\"groupId\":\"grouphvzk7wjtf\",\"groupName\":\"Faaliyet Veriler\",\"forms\":[{\"formElementId\":\"form360xmki6u\",\"formElementLabel\":\"Title\"},{\"formElementId\":\"formizstx160q\",\"formElementLabel\":\"Description\"},{\"formElementId\":\"formf7stap4gd\",\"formElementLabel\":\"Banner Resmi\"}]}]', '2024-01-16 11:47:34', '2024-01-17 12:13:41'),
(241, 87, 1, '[{\"groupId\":\"group77am68dkq\",\"groupName\":\"\",\"forms\":[{\"formElementId\":\"form4c4ubhn7z\",\"formElementLabel\":\"Resim\"},{\"formElementId\":\"formqjiqfalzl\",\"formElementLabel\":\"Başlık\"},{\"formElementId\":\"formg3yt480zk\",\"formElementLabel\":\"İçerik\"}]}]', '2024-01-16 11:50:06', '2024-01-16 15:26:11'),
(242, 88, 1, '[{\"groupId\":\"groupftoz7x3pc\",\"groupName\":\"veriler\",\"forms\":[{\"formElementId\":\"form7olv2sstn\",\"formElementLabel\":\"title\"},{\"formElementId\":\"formw9vg9rzj7\",\"formElementLabel\":\"description\"},{\"formElementId\":\"form83cg4o7p1\",\"formElementLabel\":\"Banner Resim\"}]}]', '2024-01-17 09:59:52', '2024-01-17 12:16:15'),
(243, 89, 1, '[{\"groupId\":\"groupvrshv2p5h\",\"groupName\":\"veriler\",\"forms\":[{\"formElementId\":\"formcqfj4nf93\",\"formElementLabel\":\"Resim\"},{\"formElementId\":\"formpadfiwdsl\",\"formElementLabel\":\"Başlık\"},{\"formElementId\":\"form3ebrzx20u\",\"formElementLabel\":\"İçerik\"}]}]', '2024-01-17 10:03:07', '2024-01-17 10:03:07');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `folder_id` int(10) UNSIGNED NOT NULL,
  `folder_name` varchar(255) NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`folder_id`, `folder_name`, `parent_id`, `created_at`, `updated_at`) VALUES
(30, 'Banner', NULL, '2023-12-11 13:00:50', '2023-12-11 13:00:50'),
(32, 'Anasayfa', NULL, '2024-01-18 12:05:16', '2024-01-18 12:05:16'),
(33, 'Hakkımızda', NULL, '2024-01-19 11:12:47', '2024-01-19 11:12:47'),
(34, 'Leader Yaklaşımı', NULL, '2024-01-19 11:33:05', '2024-01-19 11:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `form_id` int(11) UNSIGNED NOT NULL,
  `form_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forms_data`
--

CREATE TABLE `forms_data` (
  `form_data_id` int(11) UNSIGNED NOT NULL,
  `form_id` int(11) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `form_title` varchar(255) NOT NULL,
  `form_list_labels` varchar(255) NOT NULL,
  `designer_data` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `language_id` int(11) UNSIGNED NOT NULL,
  `language_code` varchar(255) NOT NULL,
  `language_name` varchar(255) NOT NULL,
  `language_sort_order` int(11) NOT NULL DEFAULT 9,
  `default_admin` int(11) NOT NULL DEFAULT 1,
  `default_front` int(11) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`language_id`, `language_code`, `language_name`, `language_sort_order`, `default_admin`, `default_front`, `created_at`, `updated_at`) VALUES
(1, 'tr', 'Türkçe', 9, 1, 1, '2023-08-10 12:35:18', '2023-08-10 12:35:18');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2023-06-03-021619', 'App\\Database\\Migrations\\Languages', 'default', 'App', 1691660004, 1),
(2, '2023-06-04-015149', 'App\\Database\\Migrations\\Categories', 'default', 'App', 1691660004, 1),
(3, '2023-06-04-020234', 'App\\Database\\Migrations\\Contents', 'default', 'App', 1691660004, 1),
(4, '2023-06-04-020430', 'App\\Database\\Migrations\\Designers', 'default', 'App', 1691660004, 1),
(5, '2023-06-04-021056', 'App\\Database\\Migrations\\Forms', 'default', 'App', 1691660004, 1),
(6, '2023-06-04-021402', 'App\\Database\\Migrations\\FormsData', 'default', 'App', 1691660004, 1),
(7, '2023-06-04-021403', 'App\\Database\\Migrations\\Folders', 'default', 'App', 1691660084, 2),
(8, '2023-06-04-021454', 'App\\Database\\Migrations\\Uploads', 'default', 'App', 1691660084, 2),
(9, '2023-06-04-021750', 'App\\Database\\Migrations\\OtherLanguageData', 'default', 'App', 1691660084, 2),
(10, '2023-06-04-024157', 'App\\Database\\Migrations\\Users', 'default', 'App', 1691660084, 2),
(11, '2023-06-08-201140', 'App\\Database\\Migrations\\DesignerDataLanguages', 'default', 'App', 1691660084, 2);

-- --------------------------------------------------------

--
-- Table structure for table `other_language_data`
--

CREATE TABLE `other_language_data` (
  `other_language_id` int(11) UNSIGNED NOT NULL,
  `language_id` int(11) UNSIGNED NOT NULL,
  `language_text` text NOT NULL,
  `language_link` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `upload_id` int(11) UNSIGNED NOT NULL,
  `upload_file` text NOT NULL,
  `folder_id` int(11) UNSIGNED DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`upload_id`, `upload_file`, `folder_id`, `created_at`, `updated_at`) VALUES
(313, '800x533-ph.jpg', NULL, '2024-01-15 17:38:01', '2024-01-15 17:38:01'),
(314, 'hakk_30_.jpg', 30, '2024-01-17 12:22:29', '2024-01-17 12:22:29'),
(315, 'hakkimizda-banner_30_.jpg', 30, '2024-01-17 12:37:14', '2024-01-17 12:37:14'),
(316, 'faaliyetler-banner_30_.jpg', 30, '2024-01-17 12:42:37', '2024-01-17 12:42:37'),
(317, 'duyuru-banner-ts_30_.jpeg', 30, '2024-01-17 13:02:55', '2024-01-17 13:02:55'),
(318, 'iletisim-banner_30_.jpg', 30, '2024-01-17 13:07:18', '2024-01-17 13:07:18'),
(319, 'slider_payroll_services_30_.jpg', 30, '2024-01-17 13:10:52', '2024-01-17 13:10:52'),
(320, 'havza_image_32_.jpg', 32, '2024-01-18 12:05:42', '2024-01-18 12:05:42'),
(321, 'hakkimizda_33_.jpg', 33, '2024-01-19 11:12:54', '2024-01-19 11:12:54'),
(322, 'leader1_34_.jpg', 34, '2024-01-19 11:33:14', '2024-01-19 11:33:14'),
(323, 'leader2_34_.jpg', 34, '2024-01-19 11:33:14', '2024-01-19 11:33:14'),
(324, 'duyurular-banner_30_.png', 30, '2024-01-19 12:31:38', '2024-01-19 12:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `authority` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `mail`, `password`, `authority`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'info@arnoma.com.tr', '$2y$10$lw3li/WcLgQ57zg1GxlKT.LyrXPZfpzpsdGfYd5ZazWjZh3SfNw.u', 1, 1, NULL, '2023-08-10 12:35:12', '2023-08-10 12:35:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`content_id`),
  ADD KEY `contents_category_id_foreign` (`category_id`),
  ADD KEY `contents_language_id_foreign` (`language_id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`designer_id`);

--
-- Indexes for table `designer_data_languages`
--
ALTER TABLE `designer_data_languages`
  ADD PRIMARY KEY (`designer_data_languages_id`),
  ADD KEY `designer_data_languages_designer_id_foreign` (`designer_id`),
  ADD KEY `designer_data_languages_language_id_foreign` (`language_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`folder_id`),
  ADD KEY `folders_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`form_id`);

--
-- Indexes for table `forms_data`
--
ALTER TABLE `forms_data`
  ADD PRIMARY KEY (`form_data_id`),
  ADD KEY `forms_data_form_id_foreign` (`form_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `other_language_data`
--
ALTER TABLE `other_language_data`
  ADD PRIMARY KEY (`other_language_id`),
  ADD KEY `other_language_data_language_id_foreign` (`language_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`upload_id`),
  ADD KEY `uploads_folder_id_foreign` (`folder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `content_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=826;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `designer_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `designer_data_languages`
--
ALTER TABLE `designer_data_languages`
  MODIFY `designer_data_languages_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `folder_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `form_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms_data`
--
ALTER TABLE `forms_data`
  MODIFY `form_data_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `language_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `other_language_data`
--
ALTER TABLE `other_language_data`
  MODIFY `other_language_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `upload_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=325;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contents_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `designer_data_languages`
--
ALTER TABLE `designer_data_languages`
  ADD CONSTRAINT `designer_data_languages_designer_id_foreign` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`designer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `designer_data_languages_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `folders`
--
ALTER TABLE `folders`
  ADD CONSTRAINT `folders_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `folders` (`folder_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `forms_data`
--
ALTER TABLE `forms_data`
  ADD CONSTRAINT `forms_data_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`form_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_language_data`
--
ALTER TABLE `other_language_data`
  ADD CONSTRAINT `other_language_data_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`language_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_folder_id_foreign` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`folder_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
