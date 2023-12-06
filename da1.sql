-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2023 lúc 01:58 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL COMMENT 'Id giỏ hàng',
  `kh_id` int(10) NOT NULL COMMENT 'ID khách hàng',
  `tongtien` int(50) NOT NULL COMMENT 'Tổng tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `kh_id`, `tongtien`) VALUES
(1, 41, 0),
(2, 42, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_chitiet`
--

CREATE TABLE `cart_chitiet` (
  `cart_chitiet_id` int(10) NOT NULL COMMENT 'Chi tiết giỏ hàng',
  `cart_id` int(10) NOT NULL COMMENT 'ID giỏ hàng',
  `pro_id` int(10) NOT NULL COMMENT 'ID sản phẩm',
  `color_id` int(10) NOT NULL COMMENT 'ID màu',
  `size_id` int(10) NOT NULL COMMENT 'ID size',
  `price` int(50) NOT NULL COMMENT 'Đơn giá sản phẩm',
  `soluong` int(20) NOT NULL COMMENT 'Số lượng',
  `total_price` int(20) NOT NULL COMMENT 'Tổng tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart_chitiet`
--

INSERT INTO `cart_chitiet` (`cart_chitiet_id`, `cart_id`, `pro_id`, `color_id`, `size_id`, `price`, `soluong`, `total_price`) VALUES
(36, 2, 66, 3, 3, 300, 1, 300),
(75, 1, 63, 1, 1, 130, 2, 260),
(76, 1, 66, 1, 2, 300, 1, 300);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cate_id` int(10) NOT NULL,
  `cate_name` varchar(55) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `trangthai`) VALUES
(9, 'blazer', 0),
(10, 'hoodies', 0),
(11, 'caps', 0),
(12, 'trourser', 0),
(13, 't-shirt', 0),
(14, 'shorts', 0),
(15, 'sweater', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

CREATE TABLE `color` (
  `color_id` int(10) NOT NULL COMMENT 'ID màu',
  `color_name` varchar(50) NOT NULL COMMENT 'Tên màu',
  `color_ma` varchar(50) NOT NULL COMMENT 'Mã màu css'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_id`, `color_name`, `color_ma`) VALUES
(1, 'Xanh', 'aquamarine'),
(2, 'Vàng', 'Yellow'),
(3, 'Trắng', '#FFFFFF');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coment`
--

CREATE TABLE `coment` (
  `cmt_id` int(10) NOT NULL COMMENT 'ID bình luận',
  `cmt_content` text NOT NULL COMMENT 'Nội dung bình luận',
  `cmt_date` varchar(50) NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày bình luận',
  `pro_id` int(10) NOT NULL COMMENT 'ID Sản phẩm',
  `kh_id` int(10) NOT NULL COMMENT 'Id Khách hàng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `coment`
--

INSERT INTO `coment` (`cmt_id`, `cmt_content`, `cmt_date`, `pro_id`, `kh_id`) VALUES
(8, 'ỵgj', '2023-12-01 08:55:45', 66, 41),
(9, 'sản phẩm tốt\r\n', '2023-12-03 20:33:25', 66, 41),
(10, 'Sản Phẩm Chất lượng cao\r\n', '2023-12-04 11:02:22', 65, 41);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `kh_id` int(11) NOT NULL,
  `kh_name` varchar(55) NOT NULL,
  `kh_pass` varchar(55) NOT NULL,
  `kh_mail` varchar(255) NOT NULL,
  `kh_tel` varchar(55) NOT NULL,
  `kh_address` varchar(255) NOT NULL,
  `vaitro_id` int(11) NOT NULL,
  `trangthai` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`kh_id`, `kh_name`, `kh_pass`, `kh_mail`, `kh_tel`, `kh_address`, `vaitro_id`, `trangthai`) VALUES
(36, 'admin', 'Phonglb2004@', 'luongbaphong20041@gmail.com', '0398748313', 'Hà Nội', 1, 0),
(39, 'PhongLB', 'Phonglb2004@', 'admin@gmail.com', '0398748313', 'Hà Nội', 2, 0),
(41, 'nguyendanhquan', 'Quan123@', 'quan23566888@gmail.com', '0967016683', 'Hà Nội', 1, 0),
(42, 'Danhquan', 'Quan123@', 'trung@gmail.com', '0967016683', 'Hà Nội', 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `order_id` int(10) NOT NULL COMMENT 'ID hóa đơn',
  `kh_id` int(10) NOT NULL COMMENT 'ID khách hàng',
  `order_date` varchar(20) NOT NULL COMMENT 'Ngày đặt hàng',
  `order_trangthai` varchar(50) NOT NULL COMMENT 'Trạng thái đơn hàng',
  `order_adress` varchar(250) NOT NULL COMMENT 'Địa chỉ giao hàng',
  `order_totalprice` int(50) NOT NULL COMMENT 'Tổng tiền hóa đơn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`order_id`, `kh_id`, `order_date`, `order_trangthai`, `order_adress`, `order_totalprice`) VALUES
(26, 41, '24-11-23', 'Đã hủy', '', 310),
(33, 41, '24-11-23', 'Đang giao hàng', '', 770),
(100, 41, '01-12-23', 'Đã hủy', '', 455),
(104, 41, '02-12-23', 'Đã nhận hàng', '', 140),
(130, 41, '03-12-23', 'Đã hủy', '', 440),
(131, 41, '03-12-23', 'Đang giao hàng', '', 310),
(132, 41, '04-12-23', 'Đã hủy', '', 310),
(133, 41, '04-12-23', 'Đã hủy', '', 310),
(134, 41, '04-12-23', 'Đang giao hàng', '', 310),
(135, 41, '06-12-23', 'Đang chờ xác nhận', '', 310);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_chitiet`
--

CREATE TABLE `order_chitiet` (
  `order_chitiet_id` int(10) NOT NULL COMMENT 'ID chi tiết hóa đơn',
  `order_id` int(10) NOT NULL COMMENT 'ID hóa đơn',
  `pro_id` int(10) NOT NULL COMMENT 'ID sản phẩm',
  `color_id` int(10) NOT NULL COMMENT 'Mã màu',
  `size_id` int(10) NOT NULL COMMENT 'Id size',
  `pro_price` int(50) NOT NULL COMMENT 'Đơn giá sản phẩm',
  `soluong` int(20) NOT NULL COMMENT 'Số lượng sản phẩm',
  `total_price` int(25) NOT NULL COMMENT 'Tổng tiền hóa đơn chi tiết'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_chitiet`
--

INSERT INTO `order_chitiet` (`order_chitiet_id`, `order_id`, `pro_id`, `color_id`, `size_id`, `pro_price`, `soluong`, `total_price`) VALUES
(72, 100, 66, 2, 1, 300, 1, 300),
(73, 100, 61, 2, 3, 145, 1, 145),
(77, 104, 63, 1, 1, 130, 1, 130),
(103, 130, 66, 1, 2, 300, 1, 300),
(104, 130, 63, 1, 1, 130, 1, 130),
(105, 131, 66, 1, 2, 300, 1, 300),
(106, 132, 66, 1, 2, 300, 1, 300),
(107, 133, 66, 1, 2, 300, 1, 300),
(108, 134, 66, 1, 2, 300, 1, 300),
(109, 135, 66, 1, 3, 300, 1, 300);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `pro_id` int(10) NOT NULL,
  `pro_name` varchar(255) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_price` float NOT NULL,
  `pro_desc` text NOT NULL,
  `pro_brand` varchar(55) NOT NULL,
  `pro_stock` int(11) NOT NULL,
  `cate_id` int(10) NOT NULL,
  `trangthai` int(1) NOT NULL,
  `pro_viewer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`pro_id`, `pro_name`, `pro_img`, `pro_price`, `pro_desc`, `pro_brand`, `pro_stock`, `cate_id`, `trangthai`, `pro_viewer`) VALUES
(41, 'Fleece Hoodies For Men and Women Patchwork Stripe Hooded', 'clothes_1.jpg', 130, 'Usually We Will Send Out the Goods Within 3 - 7 Days by Fast and Reliable Shipping Methods. As different computers display colors differently, the color of the actual item may very slightly from the above images. Your Happy Shopping Experience and Five Star Feedback is Very Important to Us. Please Feel Free to Contact Us if You Have Any Questions. We Will Try Our Best to Serve You.', 'Lining', 230, 10, 0, 1),
(43, 'School Leavers Hoodie - School Leavers 2023 Hoodie - Class Of 2023 Hoodie', 'clothes_2.jpg', 300, 'Usually We Will Send Out the Goods Within 3 - 7 Days by Fast and Reliable Shipping Methods. As different computers display colors differently, the color of the actual item may very slightly from the above images. Your Happy Shopping Experience and Five Star Feedback is Very Important to Us. Please Feel Free to Contact Us if You Have Any Questions. We Will Try Our Best to Serve You.', 'Nice', 230, 10, 0, 0),
(44, 'Branded Premium Basic Mesh Shorts', 'clothes_3.jpg', 200, 'Branded Premium Basic Mesh Shorts Mesh 2 Pockets Eric Emanuel New York City Skyline Basketball shorts', 'Lining', 130, 14, 0, 0),
(45, 'High Waist Trousers Pants Palazzo Bottoms Casual Loose Wide Leg Long Harem', 'clothes_4.jpg', 50, 'Usually We Will Send Out the Goods Within 3 - 7 Days by Fast and Reliable Shipping Methods. As different computers display colors differently, the color of the actual item may very slightly from the above images. Your Happy Shopping Experience and Five Star Feedback is Very Important to Us. Please Feel Free to Contact Us if You Have Any Questions. We Will Try Our Best to Serve You.', 'Lining', 230, 12, 0, 0),
(46, 'Wizard Frog Corduroy Hat, Handmade Embroidered Corduroy Dad Cap', 'clothes_5.jpg', 50, 'All clothes are tailored and handmade with love and attention to details. Pure natural linen materials, comfortable, breathable, refreshing and soft fabric', 'Nice', 300, 11, 0, 1),
(47, 'Women Linen Blazer, Linen Jacket Linen Blazer 3/4 Sleeves Coat', 'clothes_6.jpg', 300, 'All clothes are tailored and handmade with love and attention to details. Pure natural linen materials, comfortable, breathable, refreshing and soft fabric', 'Nice', 130, 9, 0, 1),
(48, 'Masculine-cut Blazer with Contrasting Details', 'clothes_7.jpg', 150, 'An oversize blazer with masculine cut and contrasting seam details. An avant-garde piece with linen and tulle elements. Bold addition to any elegant outfit.', 'Need', 400, 9, 0, 0),
(49, 'Sorrows, Sorrows, Prayers Tshirt, Queen Charlotte Fan Shirt, Bridgerton T-Shirt', 'clothes_8.jpg', 100, 'Unisex Heavy Cotton Tee Gildan 5000: Medium fabric - Classic fit - Runs true to size - 100% cotton (fiber content may vary for different colors) - Tear-away label. Unisex Heavy Blend™ Crewneck Sweatshirt Gildan 18000: Medium-heavy fabric - Loose fit - Runs true to size - 50% cotton, 50% polyester - Sewn-in label', 'Lining', 450, 13, 0, 1),
(51, 'Hat Embroidered Hat Dad Hat Womens Baseball Cap Man Hat', 'clothes_10.jpg', 50, 'Usually We Will Send Out the Goods Within 3 - 7 Days by Fast and Reliable Shipping Methods. As different computers display colors differently, the color of the actual item may very slightly from the above images. Your Happy Shopping Experience and Five Star Feedback is Very Important to Us. Please Feel Free to Contact Us if You Have Any Questions. We Will Try Our Best to Serve You.', 'Lining', 230, 11, 0, 0),
(52, 'Chicken Sweatshirt, Farm Life Sweater, Chicken Lover Sweater, Easter Retro Sweater', 'clothes_11.jpg', 130, 'Welcome to Prime Tee Lab. Your all-inclusive stop for all custom sweatshirt, hoodie, and gift needs. We print on the highest quality garments! Our state of the art printers help us bring you the most vibrant and long lasting colorful designs.', 'Nice', 300, 15, 0, 0),
(53, 'Have A Good Day Hoodie- Trendy sweatshirt, hoodie', 'clothes_12.jpg', 300, 'Have A Good Day Hoodie- Trendy sweatshirt, hoodie, Sweatshirt and hoodies with words on back. Hey there, welcome to my store! I hope you will love my store.', 'Thosc', 300, 10, 0, 4),
(54, 'Floral Embroidered Cap, Baseball Cap, Custom Embroidery Hat, Hand Embroidery Hat', 'clothes_13.jpg', 50, 'A pretty hand embroidered cap that is perfect for everyday wear! Available in different colors and designs. Feel free to send me a message for any custom work!', 'Lining', 300, 11, 0, 2),
(55, 'Drawstring Pants - Spring Summer Trousers - Pockets', 'clothes_14.jpg', 300, 'Stay comfortable and stylish with these cotton and linen drawstring pants for women. Designed with a basic style and loose fit, these mid-waist trousers have a nine-point length and trendy button details. Plus, they come with pockets to keep your essentials handy. Available in light gray, white, dark gray,', 'Nice', 130, 12, 0, 1),
(56, 'Loose linen blazer PLACID Long sleeve light linen jacket  Linen womens clothing', 'clothes_15.jpg', 300, 'Womens linen blazer PLACID in lightweight linen with front button closure is an autumn wardrobes essential', 'Need', 230, 9, 0, 2),
(57, 'Baseball Hat with Embroidery - Embroidered & Cap Color of your choice! Dad Hat', 'clothes_16.jpg', 130, 'Due to the current covid situation, there may be delays in international shipment. We hope for your kind understanding. Please let us know if you have a specific date that you would like to receive by. Orders that have been shipped out are non-refundable.', 'Thosc', 300, 11, 0, 1),
(58, 'Embroidered Silly Goose Sweatshirt, Embroidered Goose Crewneck Sweats', 'clothes_17.jpg', 120, 'This embroidered Silly Goose sweatshirt is super soft and cozy. Perfect to lounge around, run errands, or walk your dog. Our crewnecks use the highest quality material for ultra-soft and comfortable wear, with advanced embroidery to ensure vibrant colors and detailed graphics.', 'Densnis', 320, 15, 0, 1),
(59, 'Embroidered Hat Initial cap Personalized Ball cap Custom Hat Mens Hat 90s Vintagea', 'clothes_18.jpg', 100, 'Personalize these comfortable and stylish dad hats to say whatever you like. A traditional baseball cap is a great way to show off your style. one-of-a-kind gift for any occasion such as Mothers Day, Fathers Day, birthday gifts, Bachelor party, Christmas etc. We can not only customize the text', 'Need', 230, 11, 0, 3),
(60, 'Thin Cotton Blazer Loose Linen Jackets Pockets Soft Linen Coats Three Quarter Single Button', 'clothes_19.jpg', 300, 'Cotton Blazer Loose Linen Jackets Pockets Soft Linen Coats Three Quarter Single Button. Please refer to the final image for size chart before ordering (and choose the correct size).', 'Densnis', 230, 9, 0, 2),
(61, 'Fashion Sweaters Men Autumn Solid Color Wool Sweaters Slim Fit', 'clothes_20.jpg', 145, 'Fashion Sweaters Men Autumn Solid Color Wool Sweaters Slim Fit Men Street Wear Mens Clothes Knitted Sweater Men Pullovers', 'Lining', 130, 15, 0, 2),
(62, 'portrait from photo to shirt, outline photo sweatshirt, Custom Photo, custom portrait, Couple Hoodie', 'clothes_21.jpg', 130, 'Set-in sleeve 1x1 rib at neck collar Inside back neck tape in self fabric Tubular construction Sleeve hem and bottom hem with wide double topstitch Comfortable crew neckline', 'Need', 300, 10, 0, 4),
(63, 'Cotton Corduroy Pant Elastic Waist Pants Womens Soft Warm trousers baggy pants Casual', 'clothes_22.jpg', 130, 'All our items are Tailored and Handmade and Made to Order ,I can make Any Size . I design new styles every week, please collect my store. I believe that you will meet your favorite styles.', 'Densnis', 125, 12, 0, 4),
(64, 'Knitted Sweater Little Dinosaur, Unisex, Winter Harajuku', 'clothes_23.jpg', 160, 'Super soft comfortable knitted sweater. A perfect gift for streetwear style lovers and a perfect harajuku outfit.', 'Thosc', 300, 15, 0, 3),
(65, 'Japanese Harajuku Style Hoodies, Streetwear Oversized Hoodie, Thick Winter Autumn Pullover', 'clothes_24.jpg', 300, 'Recommend ordering two sizes up. MATERIAL: Cotton, PolyesterIt is printed with eco-friendly ink. Soft and comfy hoodie with a print of Japanese graphic art. This kawaii clothing pullover is an excellent addition to your wardrobe.', 'Densnis', 230, 10, 0, 8),
(66, 'Unleash Your Summer Swag with High-Quality Fear Of God Shorts for Men and Women', 'clothes_25.jpg', 300, 'Upgrade your summer wardrobe with our exclusive collection of Essentials Shorts for both men and women! Discover the perfect blend of comfort and style with our high-quality Fear Of God shorts, designed to elevate your streetwear game to new heights. Whether youre hitting the beach or strolling through the city, these trendy FOG shorts are a must-have for any fashion-conscious individual. Embrace the essence of urban fashion and make a bold statement this summer with our eye-catching streetwear essentials. Get ready to turn heads and exude confidence wherever you go!', 'Lining', 300, 14, 0, 31);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_favourite`
--

CREATE TABLE `products_favourite` (
  `pro_favourite_id` int(10) NOT NULL,
  `kh_id` int(10) NOT NULL,
  `pro_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products_favourite`
--

INSERT INTO `products_favourite` (`pro_favourite_id`, `kh_id`, `pro_id`) VALUES
(1, 44, 57),
(3, 44, 44),
(11, 44, 65),
(12, 44, 62),
(23, 44, 64),
(24, 44, 64),
(25, 44, 65),
(30, 44, 62),
(31, 44, 63),
(34, 48, 57),
(35, 48, 54),
(36, 48, 44),
(37, 48, 41),
(38, 48, 59),
(39, 48, 51),
(40, 48, 56),
(41, 48, 46),
(42, 44, 43),
(116, 41, 66),
(117, 41, 65),
(119, 41, 64),
(120, 41, 63),
(127, 41, 59),
(128, 41, 62),
(129, 41, 53),
(130, 41, 46),
(131, 41, 49);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pro_chitiet`
--

CREATE TABLE `pro_chitiet` (
  `ctiet_pro_id` int(10) NOT NULL COMMENT 'Id chi tiết sản phẩm',
  `pro_id` int(10) NOT NULL COMMENT 'ID sản phẩm',
  `color_id` int(10) NOT NULL COMMENT 'ID màu',
  `size_id` int(10) NOT NULL COMMENT 'ID size',
  `soluong` int(10) NOT NULL COMMENT 'Số Lượng'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `pro_chitiet`
--

INSERT INTO `pro_chitiet` (`ctiet_pro_id`, `pro_id`, `color_id`, `size_id`, `soluong`) VALUES
(4, 61, 2, 3, 11),
(5, 63, 1, 1, -4),
(7, 66, 2, 1, 15),
(13, 66, 1, 3, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `size_id` int(10) NOT NULL COMMENT 'ID size',
  `size_name` varchar(50) NOT NULL COMMENT 'Tên size'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`size_id`, `size_name`) VALUES
(1, 'M'),
(2, 'L'),
(3, 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vaitro`
--

CREATE TABLE `vaitro` (
  `vaitro_id` int(10) NOT NULL COMMENT 'ID vai trò',
  `vaitro_name` varchar(250) NOT NULL COMMENT 'Vai trò'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `vaitro`
--

INSERT INTO `vaitro` (`vaitro_id`, `vaitro_name`) VALUES
(1, 'Admin'),
(2, 'User');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `lk_cart_kh` (`kh_id`);

--
-- Chỉ mục cho bảng `cart_chitiet`
--
ALTER TABLE `cart_chitiet`
  ADD PRIMARY KEY (`cart_chitiet_id`),
  ADD KEY `lk_chitetcart_cart` (`cart_id`),
  ADD KEY `lk_chitetcart_color` (`color_id`),
  ADD KEY `lk_chitetcart_size` (`size_id`),
  ADD KEY `lk_cartchitiet_pro` (`pro_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_id`);

--
-- Chỉ mục cho bảng `coment`
--
ALTER TABLE `coment`
  ADD PRIMARY KEY (`cmt_id`),
  ADD KEY `lk_cmt_kh` (`kh_id`),
  ADD KEY `lk_cmt_pro` (`pro_id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`kh_id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `lk_order_khs` (`kh_id`);

--
-- Chỉ mục cho bảng `order_chitiet`
--
ALTER TABLE `order_chitiet`
  ADD PRIMARY KEY (`order_chitiet_id`),
  ADD KEY `lk_orderchitiet_order` (`order_id`),
  ADD KEY `lk_orderchitiet_color` (`color_id`),
  ADD KEY `lk_orderchitiet_size` (`size_id`),
  ADD KEY `lk_orderchitiet_pro` (`pro_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `cate_id` (`cate_id`);

--
-- Chỉ mục cho bảng `products_favourite`
--
ALTER TABLE `products_favourite`
  ADD PRIMARY KEY (`pro_favourite_id`),
  ADD KEY `FK_kh` (`kh_id`),
  ADD KEY `Fk_pro` (`pro_id`);

--
-- Chỉ mục cho bảng `pro_chitiet`
--
ALTER TABLE `pro_chitiet`
  ADD PRIMARY KEY (`ctiet_pro_id`),
  ADD KEY `lk_pro_color` (`color_id`),
  ADD KEY `lk_pro_size` (`size_id`),
  ADD KEY `lk_proctiet_pro` (`pro_id`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Chỉ mục cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  ADD PRIMARY KEY (`vaitro_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id giỏ hàng', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_chitiet`
--
ALTER TABLE `cart_chitiet`
  MODIFY `cart_chitiet_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Chi tiết giỏ hàng', AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `color`
--
ALTER TABLE `color`
  MODIFY `color_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID màu', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `coment`
--
ALTER TABLE `coment`
  MODIFY `cmt_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID bình luận', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `kh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID hóa đơn', AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT cho bảng `order_chitiet`
--
ALTER TABLE `order_chitiet`
  MODIFY `order_chitiet_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID chi tiết hóa đơn', AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `pro_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT cho bảng `products_favourite`
--
ALTER TABLE `products_favourite`
  MODIFY `pro_favourite_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT cho bảng `pro_chitiet`
--
ALTER TABLE `pro_chitiet`
  MODIFY `ctiet_pro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Id chi tiết sản phẩm', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID size', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `vaitro`
--
ALTER TABLE `vaitro`
  MODIFY `vaitro_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID vai trò', AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_cart_kh` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `cart_chitiet`
--
ALTER TABLE `cart_chitiet`
  ADD CONSTRAINT `lk_cartchitiet_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_chitetcart_cart` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_chitetcart_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_chitetcart_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `coment`
--
ALTER TABLE `coment`
  ADD CONSTRAINT `lk_cmt_kh` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_cmt_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `lk_order_khs` FOREIGN KEY (`kh_id`) REFERENCES `khachhang` (`kh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_chitiet`
--
ALTER TABLE `order_chitiet`
  ADD CONSTRAINT `lk_orderchitiet_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_orderchitiet_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_orderchitiet_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_orderchitiet_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `pro_chitiet`
--
ALTER TABLE `pro_chitiet`
  ADD CONSTRAINT `lk_pro_color` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_pro_size` FOREIGN KEY (`size_id`) REFERENCES `size` (`size_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lk_proctiet_pro` FOREIGN KEY (`pro_id`) REFERENCES `products` (`pro_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
