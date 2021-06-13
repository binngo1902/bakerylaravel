-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2021 at 10:01 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bakerylaravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `id_customer` bigint(20) UNSIGNED NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bills_products`
--

CREATE TABLE `bills_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_bill` bigint(20) UNSIGNED NOT NULL,
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(28, '2014_10_12_000000_create_users_table', 1),
(29, '2014_10_12_100000_create_password_resets_table', 1),
(30, '2019_08_19_000000_create_failed_jobs_table', 1),
(31, '2021_06_02_180225_create_type_products_table', 1),
(32, '2021_06_02_180237_create_products_table', 1),
(33, '2021_06_02_180254_create_news_table', 1),
(34, '2021_06_02_180304_create_slides_table', 1),
(35, '2021_06_02_191425_bills', 1),
(36, '2021_06_02_192023_bills_products', 1),
(37, '2021_06_08_160129_customer', 2),
(38, '2021_06_08_160738_customer', 3),
(39, '2021_06_08_193343_add_colum', 4);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2021-06-02 16:25:29', '2021-06-02 16:25:29'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2021-06-02 16:25:29', '2021-06-02 16:25:29'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2021-06-02 16:25:29', '2021-06-02 16:25:29'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2021-06-02 16:25:29', '2021-06-02 16:25:29'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2021-06-02 16:25:29', '2021-06-02 16:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `new` int(11) NOT NULL,
  `promotion_price` double(8,2) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_type` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `unit_price`, `new`, `promotion_price`, `image`, `unit`, `id_type`, `created_at`, `updated_at`) VALUES
(2, 'Bánh Crepe Chocolate ngon', 'ngon yumme', 180000.00, 0, 160000.00, 'crepe-chocolate.jpg', 'hộp', 6, '2021-06-02 16:26:23', '2021-06-11 09:21:34'),
(3, 'Bánh Crepe Sầu riêng - Chuối', '', 150000.00, 0, 120000.00, 'crepe-chuoi.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(4, 'Bánh Crepe Đào', '', 160000.00, 1, 100000.00, 'crepe-dao.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(5, 'Bánh Crepe Dâu', '', 160000.00, 1, 0.00, 'crepedau.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(6, 'Bánh Crepe Pháp', '', 200000.00, 1, 180000.00, 'crepe-phap.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(7, 'Bánh Crepe Táo', '', 160000.00, 0, 0.00, 'crepe-tao.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(8, 'Bánh Crepe Trà xanh', '', 160000.00, 1, 150000.00, 'crepe-traxanh.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(9, 'Bánh Crepe Sầu riêng và Dứa', '', 160000.00, 1, 150000.00, 'saurieng-dua.jpg', 'hộp', 5, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(11, 'Bánh Gato Trái cây Việt Quất', '', 250000.00, 0, 0.00, '544bc48782741.png', 'cái', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(12, 'Bánh sinh nhật rau câu trái cây', '', 200000.00, 0, 180000.00, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(13, 'Bánh kem Chocolate Dâu', '', 300000.00, 0, 280000.00, 'banh kem sinh nhat.jpg', 'cái', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(14, 'Bánh kem Dâu III', '', 300000.00, 1, 280000.00, 'Banh-kem (6).jpg', 'cái', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(15, 'Bánh kem Dâu I', '', 350000.00, 0, 320000.00, 'banhkem-dau.jpg', 'cái', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(16, 'Bánh trái cây II', '', 150000.00, 1, 120000.00, 'banhtraicay.jpg', 'hộp', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(17, 'Apple Cake', '', 250000.00, 0, 240000.00, 'Fruit-Cake_7979.jpg', 'cai', 3, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(18, 'Bánh ngọt nhân cream táo', '', 180000.00, 0, 0.00, '20131108144733.jpg', 'hộp', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(19, 'Bánh Chocolate Trái cây', '', 150000.00, 0, 0.00, 'Fruit-Cake_7976.jpg', 'hộp', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(20, 'Bánh Chocolate Trái cây II', '', 150000.00, 0, 0.00, 'Fruit-Cake_7981.jpg', 'hộp', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(21, 'Peach Cake', '', 160000.00, 0, 150000.00, 'Peach-Cake_3294.jpg', 'cái', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(22, 'Bánh bông lan trứng muối I', '', 160000.00, 0, 150000.00, 'banhbonglantrung.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(23, 'Bánh bông lan trứng muối II', '', 180000.00, 1, 0.00, 'banhbonglantrungmuoi.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(24, 'Bánh French', '', 180000.00, 0, 0.00, 'banh-man-thu-vi-nhat-1.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(25, 'Bánh mì Australia', '', 80000.00, 0, 70000.00, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(26, 'Bánh mặn thập cẩm', '', 50000.00, 0, 0.00, 'Fruit-Cake.png', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(27, 'Bánh Muffins trứng', '', 100000.00, 0, 80000.00, 'maxresdefault.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(28, 'Bánh Scone Peach Cake', '', 120000.00, 0, 0.00, 'Peach-Cake_3300.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(29, 'Bánh mì Loaf I', '', 100000.00, 0, 0.00, 'sli12.jpg', 'hộp', 1, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(30, 'Bánh kem Chocolate Dâu I', '', 380000.00, 0, 350000.00, 'sli12.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(31, 'Bánh kem Trái cây I', '', 380000.00, 0, 350000.00, 'Fruit-Cake.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(32, 'Bánh kem Trái cây II', '', 380000.00, 0, 350000.00, 'Fruit-Cake_7971.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(33, 'Bánh kem Doraemon', '', 280000.00, 0, 250000.00, 'p1392962167_banh74.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(34, 'Bánh kem Caramen Pudding', '', 280000.00, 0, 0.00, 'Caramen-pudding636099031482099583.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(35, 'Bánh kem Chocolate Fruit', '', 320000.00, 0, 300000.00, 'chocolate-fruit636098975917921990.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(36, 'Bánh kem Coffee Chocolate GH6', '', 320000.00, 0, 300000.00, 'COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(37, 'Bánh kem Mango Mouse', '', 320000.00, 0, 300000.00, 'mango-mousse-cake.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(38, 'Bánh kem Matcha Mouse', '', 350000.00, 0, 330000.00, 'MATCHA-MOUSSE.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(39, 'Bánh kem Flower Fruit', '', 350000.00, 0, 330000.00, 'flower-fruits636102461981788938.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(40, 'Bánh kem Strawberry Delight', '', 350000.00, 0, 330000.00, 'strawberry-delight636102445035635173.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(41, 'Bánh kem Raspberry Delight', '', 350000.00, 0, 330000.00, 'raspberry.jpg', 'cái', 4, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(42, 'Beefy Pizza', 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 150000.00, 0, 130000.00, '40819_food_pizza.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(43, 'Hawaii Pizza', 'Sốt cà chua, ham , dứa, pho mai mozzarella', 120000.00, 0, 0.00, 'hawaiian paradise_large-900x900.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(44, 'Smoke Chicken Pizza', 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 120000.00, 0, 0.00, 'chicken black pepper_large-900x900.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(45, 'Sausage Pizza', 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 120000.00, 0, 0.00, 'pizza-miami.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(46, 'Ocean Pizza', 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 120000.00, 0, 0.00, 'seafood curry_large-900x900.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(47, 'All Meaty Pizza', 'Ham, bacon, chorizo, pho mai mozzarella.', 140000.00, 0, 0.00, 'all1).jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(48, 'Tuna Pizza', 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 140000.00, 0, 0.00, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(49, 'Bánh su kem nhân dừa', '', 120000.00, 0, 100000.00, 'maxresdefault.jpg', 'cái', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(50, 'Bánh su kem sữa tươi', '', 120000.00, 0, 100000.00, 'sukem.jpg', 'cái', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(51, 'Bánh su kem sữa tươi chiên giòn', '', 150000.00, 0, 0.00, '1434429117-banh-su-kem-chien-20.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(52, 'Bánh su kem dâu sữa tươi', '', 150000.00, 0, 0.00, 'sukemdau.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(53, 'Bánh su kem bơ sữa tươi', '', 150000.00, 0, 0.00, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(54, 'Bánh su kem nhân trái cây sữa tươi', '', 150000.00, 0, 0.00, 'foody-banh-su-que-635930347896369908.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(55, 'Bánh su kem cà phê', '', 150000.00, 0, 0.00, 'banh-su-kem-ca-phe-1.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(56, 'Bánh su kem phô mai', '', 150000.00, 0, 0.00, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(57, 'Bánh su kem sữa tươi chocolate', '', 150000.00, 0, 0.00, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 7, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(58, 'Bánh Macaron Pháp', 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000.00, 0, 180000.00, 'Macaron9.jpg', '', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(59, 'Bánh Tiramisu - Italia', 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000.00, 0, 0.00, '234.jpg', '', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(60, 'Bánh Táo - Mỹ', 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000.00, 0, 0.00, '1234.jpg', '', 2, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(61, 'Bánh Cupcake - Anh Quốc', 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000.00, 0, 120000.00, 'cupcake.jpg', 'cái', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23'),
(62, 'Bánh Sachertorte', 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm', 250000.00, 0, 220000.00, '111.jpg', '', 6, '2021-06-02 16:26:23', '2021-06-02 16:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, '', 'banner1.jpg', NULL, NULL),
(2, '', 'banner2.jpg', NULL, NULL),
(3, '', 'banner1.jpg', NULL, NULL),
(4, '', 'banner2.jpg', NULL, NULL),
(5, '', 'banner3.jpg', NULL, NULL),
(6, '', 'banner4.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `type_products`
--

CREATE TABLE `type_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 'banh-man-thu-vi-nhat-1.jpg', '2021-06-02 16:26:11', '2021-06-11 20:48:59'),
(2, 'Bánh ngọt', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', '20131108144733.jpg', '2021-06-02 16:26:11', '2021-06-02 16:26:11'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'banhtraicay.jpg', '2021-06-02 16:26:11', '2021-06-02 16:26:11'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'banhkem.jpg', '2021-06-02 16:26:11', '2021-06-02 16:26:11'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'crepe.jpg', '2021-06-02 16:26:11', '2021-06-02 16:26:11'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'pizza.jpg', '2021-06-02 16:26:11', '2021-06-02 16:26:11'),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'sukemdau.jpg', '2021-06-02 16:26:11', '2021-06-02 16:26:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`, `phone`, `address`) VALUES
(5, 'Bin_4', 'Bin_4@mail.com', NULL, '123456', 0, NULL, '2021-06-02 16:27:02', NULL, '', ''),
(6, 'Bin_5', 'Bin_5@mail.com', NULL, '$2y$10$FAwMvs5NSgl.DlMvduqjseYEiqK7Wg9iYsEaI8cO4lKPWxQwVtal6', 0, NULL, '2021-06-02 16:27:02', NULL, '', ''),
(7, 'Bin_6', 'Bin_6@mail.com', NULL, '$2y$10$evp26J88W1lINLTKnYtaFOiN5QZ6ocqoMtTG2AKTzoq54BI/dSFxu', 0, NULL, '2021-06-02 16:27:02', '2021-06-12 03:56:29', '0909335081', '704 đoàn văn bơ'),
(8, 'Bin_7', 'Bin_7@mail.com', NULL, '$2y$10$cGcF5WEd0uHENY3AJkppm.tKdG1YMc07Esl5KQo/zeQXdJMIgh5qG', 0, NULL, '2021-06-02 16:27:02', NULL, '', ''),
(9, 'Bin_8', 'Bin_8@mail.com', NULL, '$2y$10$tt2KexzDHaOc1oLB.vT5RuhQ3bXBoCVnq980hcc9ZyCV9Q8DveCq.', 0, NULL, '2021-06-02 16:27:02', NULL, '', ''),
(16, 'binh', 'bin@123a.com', NULL, '$2y$10$41qxsdyrL4hx67rOPMTsVOXzSumftDNMOVWSqi6oUkpI8Z7J3EEVe', 0, NULL, '2021-06-08 14:45:28', '2021-06-08 14:45:28', '0909335081', 'Street Address'),
(17, 'bin', 'binngo1902@gmail.com', NULL, '$2y$10$jzkbvfWJi9B1rLREeDKwo.FEdAFB5EgXhfgMb1/bKmlke3pXSlazW', 1, NULL, '2021-06-08 16:27:40', '2021-06-13 02:56:48', '0909335085', '100 bùi thị xuân');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_id_customer_foreign` (`id_customer`);

--
-- Indexes for table `bills_products`
--
ALTER TABLE `bills_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_products_id_bill_foreign` (`id_bill`),
  ADD KEY `bills_products_id_product_foreign` (`id_product`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `bills_products`
--
ALTER TABLE `bills_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_id_customer_foreign` FOREIGN KEY (`id_customer`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bills_products`
--
ALTER TABLE `bills_products`
  ADD CONSTRAINT `bills_products_id_bill_foreign` FOREIGN KEY (`id_bill`) REFERENCES `bills` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bills_products_id_product_foreign` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
