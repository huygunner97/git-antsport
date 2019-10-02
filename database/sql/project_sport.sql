-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 26, 2019 lúc 05:11 AM
-- Phiên bản máy phục vụ: 10.1.33-MariaDB
-- Phiên bản PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project_sport`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `pk_category_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`pk_category_id`, `c_name`, `c_img`) VALUES
(1, 'XE THỂ THAO', '1555146912introduct_1.jpg'),
(2, 'GIÀY', '1548172538introduct_2.jpg'),
(3, 'TRANG PHỤC THỂ THAO', '1548172532introduct_3.jpg'),
(4, 'DỤNG CỤ THỂ THAO', '1555146896introduct_4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_detail`
--

CREATE TABLE `category_detail` (
  `pk_category_detail_id` int(11) NOT NULL,
  `fk_category_detail_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category_detail`
--

INSERT INTO `category_detail` (`pk_category_detail_id`, `fk_category_detail_id`, `c_name`) VALUES
(1, 1, 'Xe đạp'),
(2, 1, 'Xe máy'),
(3, 2, 'Giày nam'),
(4, 2, 'Giày nữ'),
(5, 2, 'Giày thể thao'),
(6, 3, 'Trang phục nam'),
(7, 3, 'Trang phục nữ'),
(8, 3, 'Đồ bơi'),
(9, 4, 'Gym, yoga'),
(10, 4, 'Các môn cá nhân'),
(11, 4, 'Phụ kiện thể thao');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `pk_customer_id` int(11) NOT NULL,
  `hoten` varchar(500) NOT NULL,
  `diachi` varchar(500) NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `date` date NOT NULL,
  `fk_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`pk_customer_id`, `hoten`, `diachi`, `dienthoai`, `date`, `fk_user_id`) VALUES
(34, 'nguyen van huy', 'mai thon- chi lang', 374068393, '2019-04-29', 1),
(37, 'nguyen van huy', 'mai thon- chi lang', 374068393, '2019-05-21', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `pk_news_id` int(11) NOT NULL,
  `c_title` varchar(500) NOT NULL,
  `c_content` varchar(5000) NOT NULL,
  `c_img` varchar(500) NOT NULL,
  `c_date` date NOT NULL,
  `c_type` int(11) NOT NULL,
  `c_hotnews` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`pk_news_id`, `c_title`, `c_content`, `c_img`, `c_date`, `c_type`, `c_hotnews`) VALUES
(6, 'Khi thời trang lên tiếng: ‘Gã khổng lồ’ adidas và lời hứa sản xuất 11 triệu đôi giày tái chế từ rác thải nhựa trong năm 2019', '<h2 style=\"font-style:normal; margin-left:0px; margin-right:0px; text-align:start\">Những đ&ocirc;i gi&agrave;y mang sứ mệnh giải cứu đại dương</h2>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">Bước đột ph&aacute; bắt nguồn từ năm 2015, khi giới mộ điệu v&agrave; cả những nh&agrave; hoạt động m&ocirc;i trường tr&ecirc;n to&agrave;n thế giới dần rỉ tai nhau về sự ra mắt của một mẫu gi&agrave;y chạy mới -&nbsp;<strong>Parley x adidas Ultra BOOST</strong>&nbsp;- l&agrave; sự kết hợp của một mặt l&agrave; chất liệu đế boost từng đặt nền m&oacute;ng cho cả văn h&oacute;a shoegame đậm t&iacute;nh c&ocirc;ng nghệ ở thời hiện đại, nhưng mặt kh&aacute;c lại l&agrave; thứ phế liệu nhựa đang ng&agrave;y ng&agrave;y đầu độc đại dương.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">Tương truyền, trong một cuộc họp của ban l&atilde;nh đạo adidas diễn ra trước đ&oacute;:</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><em>- Người ti&ecirc;u d&ugrave;ng đang than phiền về độ bền những đ&ocirc;i gi&agrave;y chạy adidas, thậm ch&iacute; c&ograve;n đem cả chất lượng của ch&uacute;ng ta ra so s&aacute;nh với&nbsp;<strong>đối thủ N*</strong>&nbsp;(*xin được giấu t&ecirc;n) nữa! Ai c&oacute; đề xuất g&igrave; để khắc phục điều n&agrave;y kh&ocirc;ng?</em>&nbsp;- ban l&atilde;nh đạo l&ecirc;n tiếng.</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><em>- T&ocirc;i c&oacute; &yacute; tưởng n&agrave;y!</em>&nbsp;- Nh&agrave; s&aacute;ng lập của&nbsp;<strong>Parley for the Oceans</strong>, ki&ecirc;m nh&agrave; hoạt động bảo vệ m&ocirc;i trường biển, Cyrill Gutsch, chen ngang v&agrave;o cuộc họp căng thẳng.<em>&nbsp;- Sao kh&ocirc;ng thử d&ugrave;ng chất liệu nhựa t&aacute;i chế nhỉ? V&igrave;, c&aacute;c bạn biết đấy, ch&uacute;ng kh&oacute; ph&acirc;n hủy lắm, c&oacute; lẽ cả trăm năm nữa đ&ocirc;i gi&agrave;y chạy&nbsp;<strong>adidas x r&aacute;c nhựa&nbsp;</strong>cũng kh&ocirc;ng hỏng ấy chứ!</em></p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\">V&agrave; thế l&agrave; sản phẩm gi&agrave;y đầu ti&ecirc;n do Parley bắt tay hợp t&aacute;c với adidas ra đời...</p>\r\n\r\n<p style=\"margin-left:0px; margin-right:0px; text-align:start\"><span style=\"background-color:#ffffff; color:#222222; font-family:&quot;Times New Roman&quot;,Georgia,serif; font-size:17px\">N&oacute;i vui l&agrave; vậy, chắc hẳn động lực s&aacute;ng tạo ra mẫu Ultra BOOST c&aacute;ch t&acirc;n n&agrave;y kh&ocirc;ng phải từ mong muốn sản xuất những đ&ocirc;i gi&agrave;y chạy &quot;trường tồn với thời gian&quot; đ&acirc;u (tuy th&ocirc;ng tin vẫn chưa được kiểm chứng). Với Cyrill Gutsch, c&acirc;u trả lời lại rất dễ hiểu:&nbsp;</span><strong>Anh muốn l&agrave; người ti&ecirc;n phong trong lĩnh vực thời trang gắn liền với sứ mệnh bảo vệ m&ocirc;i trường biển</strong><span style=\"background-color:#ffffff; color:#222222; font-family:&quot;Times New Roman&quot;,Georgia,serif; font-size:17px\">. Những m&oacute;n đồ thời trang kh&ocirc;ng chỉ truyền tải th&ocirc;ng điệp nhanh hơn, hiệu quả hơn những c&acirc;u khẩu hiệu &quot;bớt r&aacute;c nhựa&quot; s&aacute;o rỗng, ch&uacute;ng c&ograve;n đặt ra xu hướng v&agrave; truyền cảm hứng m&atilde;nh liệt hơn cả.</span></p>', '1556440578photo-1-15556607047861067227378.jpg', '2019-04-28', 0, 1),
(7, 'The Fire Monkey - Thổi hồn thời trang một đôi sneaker diện mọi trang phục', '<p>B&ecirc;n cạnh Athleisure, xu hướng thời trang diện sneaker trong mọi bộ trang phục đang trở n&ecirc;n phổ biến. Nếu như Athleisure c&oacute; c&aacute;ch gọi cụ thể th&igrave; xu hướng mix sneaker kh&ocirc;ng cần đến một c&aacute;i t&ecirc;n vẫn l&agrave;m đi&ecirc;n đảo cộng đồng y&ecirc;u thời trang.</p>\r\n\r\n<p>Với phong c&aacute;ch n&agrave;y, gi&agrave;y thể thao kh&ocirc;ng c&ograve;n l&agrave; s&acirc;n chơi cho những bộ đồ sport hay trang phục chống chỉ định với d&acirc;n văn ph&ograve;ng nữa. Giờ đ&acirc;y, ch&uacute;ng xuất hiện ở khắp nẻo đường, từ phong c&aacute;ch casual wear h&agrave;ng ng&agrave;y cho tới những set đồ văn ph&ograve;ng nghi&ecirc;m t&uacute;c, thậm ch&iacute; đ&ocirc;i sneaker tr&ocirc;ng khỏe khoắn vậy m&agrave; c&oacute; thể kết hợp được với cả suit lịch l&atilde;m.</p>\r\n\r\n<p>Với những &quot;con nghiện&quot; thời trang ch&iacute;nh hiệu, sẽ chẳng c&oacute; một giới hạn n&agrave;o cho c&aacute;c t&iacute;n đồ về loại phong c&aacute;ch m&agrave; họ c&oacute; thể mix với đ&ocirc;i sneaker của m&igrave;nh. Bởi đ&acirc;y đ&iacute;ch thị l&agrave; m&oacute;n đồ c&acirc;n bằng phong c&aacute;ch, th&iacute;ch hợp cho mọi thiết kế.</p>\r\n\r\n<p>V&agrave;, giữa bạt ng&agrave;n c&aacute;c shop thời trang lớn nhỏ đang mọc l&ecirc;n ng&agrave;y c&agrave;ng nhiều như hiện nay, bỏ t&uacute;i một địa chỉ tin cậy để mua đồ auth với nhiều item phong ph&uacute; thực sự kh&oacute; khăn, nhất l&agrave; khi t&igrave;nh trạng h&agrave;ng giả, h&agrave;ng nh&aacute;i ng&agrave;y c&agrave;ng nhiều. Nhưng đừng lo lắng qu&aacute;! The Fire Monkey ch&iacute;nh l&agrave; điểm đến ho&agrave;n hảo d&agrave;nh cho bạn, l&agrave; một địa chỉ uy t&iacute;n m&agrave; rất nhiều t&iacute;n đồ sneaker lựa chọn v&agrave; thường xuy&ecirc;n gh&eacute; đến.</p>', '1556462382photo-1-1554372147110571019670.jpg', '2019-04-28', 0, 0),
(8, 'Bộ đôi mới từ PaperPlanes: Chỉn chu, tiện dụng, hợp thời trang và hợp cả thời tiết', '<p>Trước ti&ecirc;n, phải nhắc đến PP1465 - cậu bạn &ldquo;Giản đơn nhưng độc đ&aacute;o&rdquo; của đ&ocirc;i ch&acirc;n. To&agrave;n th&acirc;n PP1465 được l&agrave;m từ chất liệu vải lưới, kết bằng tay để đảm bảo phom &ocirc;m s&aacute;t ch&acirc;n, tạo n&ecirc;n cảm gi&aacute;c thoải m&aacute;i nhưng vẫn tho&aacute;ng m&aacute;t.</p>\r\n\r\n<p>Th&ecirc;m v&agrave;o đ&oacute;, đế được cấu tạo ba phần đệm cao su ở ba phần chạm đất nhiều nhất của ch&acirc;n, gi&uacute;p tăng độ b&aacute;m khi sử dụng v&agrave; với khả năng uốn cong theo từng bước ch&acirc;n gi&uacute;p cho c&aacute;c hoạt động thể thao, chạy bộ trở n&ecirc;n thoải m&aacute;i, nhẹ nh&agrave;ng hơn.</p>\r\n\r\n<p>Ngo&agrave;i ra, sản phẩm được mệnh danh &ldquo;ch&agrave;ng trai tinh tế&rdquo; SN198 cũng đ&atilde; về với c&aacute;c n&agrave;ng rồi đ&acirc;y!&nbsp;Với thiết kế<a class=\"link-tag\" href=\"http://kenh14.vn/giay-slip-on.html\" target=\"_blank\" title=\"giày slip-on \"> slip-on</a> kh&ocirc;ng d&acirc;y, sử dụng sợi vải chuy&ecirc;n dụng trong sản xuất quần &aacute;o để tạo sự thoải m&aacute;i, th&ocirc;ng tho&aacute;ng nhưng vẫn cứng c&aacute;p vừa đủ để kh&ocirc;ng bị mất phom.</p>\r\n\r\n<p>Điểm đặc biệt nhất ở d&ograve;ng n&agrave;y l&agrave; đế gi&agrave;y tăng độ b&aacute;m, sử dụng c&ocirc;ng nghệ Memory Form Fit gi&uacute;p &ocirc;m s&aacute;t ch&acirc;n nhưng kh&ocirc;ng g&acirc;y kh&oacute; chịu.</p>', '1556462890img_201811261737433594.jpg', '2019-04-28', 0, 1),
(9, 'Cách chọn xe đạp thể thao nam chuẩn nhất', '<p><span style=\"color:#000000\"><strong>Chọn mua xe đạp thể thao ph&ugrave; hợp với nhu cầu sở th&iacute;ch&nbsp;</strong></span></p>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những lưu &yacute; c&oacute; tầm quan trọng đặc biệt m&agrave; bạn kh&ocirc;ng thể kh&ocirc;ng cần nhắc trước khi mua xe đạp thể thao. Ph&acirc;n theo chức năng, xe đạp thể thao c&oacute; nhiều loại kh&aacute;c nhau, mỗi loại lại c&oacute; những đặc điểm cấu tạo ri&ecirc;ng biệt. Do đ&oacute;, trước ti&ecirc;n bạn cần x&aacute;c định mục đ&iacute;ch sử dụng xe đạp thể thao của bạn nhằm mục đ&iacute;ch g&igrave; v&agrave; bạn th&iacute;ch những d&ograve;ng xe n&agrave;o.&nbsp; Nếu bạn l&agrave; người đam m&ecirc; v&agrave; muốn chinh phục tốc độ th&igrave; Road Bike sẽ l&agrave; một gợi &yacute; ho&agrave;n to&agrave;n, tuy nhi&ecirc;n nếu bạn thường xuy&ecirc;n c&oacute; những trải nghiệm tr&ecirc;n những đoạn đường gồ ghề, leo n&uacute;i th&igrave; MTB với kiểu d&aacute;ng thể thao khỏe khoắn c&ugrave;ng khả năng di chuyển tốt tr&ecirc;n những cung đường nhiều chướng ngại vật chắc chắn sẽ l&agrave; gợi &yacute; ho&agrave;n hảo cho bạn. B&ecirc;n cạnh đ&oacute;, nếu bạn l&agrave; người c&oacute; kỹ thuật cao v&agrave; th&iacute;ch biểu diễn c&ugrave;ng bạn b&egrave; v&agrave; những người c&ugrave;ng đam m&ecirc; th&igrave; một mẫu xe đạp thể thao nam theo phong c&aacute;ch biểu diễn sẽ v&ocirc; c&ugrave;ng th&iacute;ch hợp với bạn.</p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Chọn k&iacute;ch cỡ xe</strong></span></p>\r\n\r\n<p>Để c&oacute; thể sử dụng thoải m&aacute;i nhất trong thời gian di chuyển với xe đạp thể thao th&igrave; việc lựa chọn, xem x&eacute;t k&iacute;ch cỡ xe cũng l&agrave; lưu &yacute; kh&aacute; quan trọng. Bởi nếu lựa chọn một chiếc xe kh&ocirc;ng ph&ugrave; hợp qu&aacute; nhỏ hoặc qu&aacute; lớn so với tầm v&oacute;c của bản th&acirc;n sẽ g&acirc;y cảm gi&aacute;c kh&ocirc;ng thoải m&aacute;i, thậm ch&iacute; c&ograve;n l&agrave; nguy&ecirc;n nh&acirc;n khiến sự an to&agrave;n trở n&ecirc;n hạn chế. V&igrave; thế bạn cần chắc chắn rằng, c&aacute;c bộ phận như: khung xe, tay l&aacute;i, y&ecirc;n phải thực sự ph&ugrave; hợp với v&oacute;c d&aacute;ng bạn. Như nam giới nếu c&oacute; chiều cao tr&ecirc;n 1m75 n&ecirc;n chọn khung cỡ 18&rdquo;, ngược lại nam giới c&oacute; chiều cao thấp hơn th&igrave; những chiếc xe c&oacute; khung 16&rdquo; hoặc 17&rdquo; sẽ l&agrave; sự lựa chọn ph&ugrave; hợp nhất.</p>\r\n\r\n<p><span style=\"color:#000000\"><strong>Th&ocirc;ng số của xe đạp thể thao nam&nbsp;</strong></span></p>\r\n\r\n<p>Cấu tạo của một chiếc xe đạp thể thao cũng như <strong>xe đạp thể thao nam </strong>l&agrave; sự kết hợp của rất nhiều bộ phận, phụ t&ugrave;ng kh&aacute;c nhau. V&igrave; thế, để chọn được một mẫu xe chuẩn, đảm bảo chất lượng cũng như độ an to&agrave;n trong qu&aacute; tr&igrave;nh di chuyển th&igrave; việc xem x&eacute;t, t&igrave;m hiểu những th&ocirc;ng số kỹ thuật của xe l&agrave; hết sức cần thiết. C&ugrave;ng với đ&oacute;, bạn n&ecirc;n ch&uacute; &yacute; tới c&aacute;c mối h&agrave;n tr&ecirc;n khung xe, chất liệu khung, chất lượng của lớp sơn phủ, số khung xe, bộ chuyển động của xe&hellip; Ngo&agrave;i ra bạn cần lưu t&acirc;m tới v&agrave;nh, x&iacute;ch, phanh&hellip; để x&aacute;c định chất lượng cũng như đảm bảo chiếc xe thuộc xe ch&iacute;nh h&atilde;ng.</p>\r\n\r\n<p>&nbsp;</p>', '1556463362cach-chon-xe-nam.jpg', '2019-04-28', 1, 1),
(10, 'Xe đạp Twitter 736 – độ bền thách thức vượt thời gian', '<h2><span style=\"color:#ff0000; font-size:16px\"><strong>Xe đạp Twitter 736 &ndash; phi&ecirc;n bản hội tụ sự ho&agrave;n hảo của thương hiệu nổi tiếng</strong></span></h2>\r\n\r\n<h3><span style=\"font-size:16px\"><strong><em>+ </em></strong><strong><em>Thương hiệu xe đạp Twitter nổi tiếng</em></strong></span></h3>\r\n\r\n<p>Với những ai từng biết đến thương hiệu Twitter th&igrave; kh&ocirc;ng c&ograve;n xa lạ g&igrave; với c&aacute;i t&ecirc;n qu&aacute; nổi tiếng n&agrave;y. Đ&acirc;y l&agrave; thương hiệu xe đạp h&agrave;ng đầu của Đức &ndash; nơi sản sinh ra những c&aacute;i t&ecirc;n khổng lồ trong ng&agrave;nh c&ocirc;ng nghiệp chế tạo như: Audi,BMW, Mercedes-Benz, Porsche, Volkswagen&hellip;</p>\r\n\r\n<h3><strong><em><span style=\"font-size:16px\">+&nbsp;Xe đạp Twitter 736 l&agrave; một phi&ecirc;n bản nổi bật của h&atilde;ng Twitter</span></em></strong></h3>\r\n\r\n<p>Mẫu xe đạp Twitter 736 l&agrave; một trong số rất nhiều sản phẩm kh&aacute;c của thương hiệu nổi tiếng thế giới. Thế nhưng, với phi&ecirc;n bản mới nhất n&agrave;y, người d&ugrave;ng c&oacute; thể cảm nhận được những điều mới mẻ.</p>\r\n\r\n<h2><span style=\"color:#ff0000; font-size:16px\"><strong>Xe đạp Twitter 736 c&oacute; độ bền cao nhờ chất liệu cao cấp</strong></span></h2>\r\n\r\n<h3><strong><em><span style=\"font-size:16px\">+</span> <span style=\"font-size:16px\">Khung xe đạp</span></em></strong></h3>\r\n\r\n<p>Khung xe được coi l&agrave; bộ phận xương sống của to&agrave;n bộ chiếc xe. Ở phi&ecirc;n bản mới n&agrave;y, Twitter đặc biệt ch&uacute; trọng đến chất liệu chế tạo cho bộ phận khung xe.</p>\r\n\r\n<h3><strong><em><span style=\"font-size:16px\">+</span> <span style=\"font-size:16px\">C&aacute;c bộ phận kh&aacute;c của xe đạp</span></em></strong></h3>\r\n\r\n<p>C&aacute;c th&agrave;nh phần kh&aacute;c như tay l&aacute;i, cổ l&aacute;i, y&ecirc;n xe, cọc y&ecirc;n cũng được l&agrave;m từ chất liệu hợp kim. Chất liệu được gia cố độ bền, tăng khả năng chống va đập, chống cong v&ecirc;nh. Lốp Kenda c&oacute; chất lượng cao với tuổi thọ sử dụng c&oacute; thể l&ecirc;n tới 2,3 năm.</p>\r\n\r\n<h3><strong><em><span style=\"font-size:16px\">+</span> <span style=\"font-size:16px\">C&ocirc;ng nghệ sơn xe đạp</span></em></strong></h3>\r\n\r\n<p>Một điều đ&aacute;ng phải n&oacute;i đến l&agrave; c&ocirc;ng nghệ sơn tĩnh điện của Twitter cũng rất đ&aacute;ng được hoan ngh&ecirc;nh. C&ocirc;ng nghệ n&agrave;y kết hợp với thẩm mỹ cao v&agrave; chống xước tuyệt đối, đem lại sự bền bỉ theo thời gian cho sản phẩm.</p>', '1556463768xe-dap-Twitter-736-do-ben-thach-thuc-vuot-thoi-gian1.jpg', '2019-04-28', 0, 1),
(11, 'Nơi bán xe đạp thể thao giá rẻ tốt nhất tại Hà Nội', '<h2><span style=\"color:#ff0000; font-size:16px\"><strong>Mua xe đạp thể thao gi&aacute; rẻ &ndash; chỉ c&oacute; thể l&agrave; F-x Bike </strong></span></h2>\r\n\r\n<p>F-x Bike l&agrave; c&aacute;i t&ecirc;n kh&ocirc;ng c&ograve;n qu&aacute; xa lạ với giới chơi xe đạp ở H&agrave; Nội. F-x Bike được biết đến l&agrave; c&ocirc;ng ty chuy&ecirc;n ph&acirc;n phối c&aacute;c sản phẩm xe đạp thể thao thương hiệu nổi tiếng thế giới.</p>\r\n\r\n<p>Sản phẩm tại đ&acirc;y được đ&aacute;nh gi&aacute; cao về sự phong ph&uacute; v&agrave; đa dạng chủng loại. Hầu hết những thương hiệu xe đạp phổ biến v&agrave; c&oacute; tiếng đều c&oacute; mặt tại đ&acirc;y. C&oacute; thể kể đến như: Motachie, Furious, XDS, Giant, Forward, Nakxus, Galaxy, Audi, BMW, Cadillac, Lamborghini, Porsche, Ferrari&hellip; Đ&acirc;y cũng l&agrave; địa chỉ cung cấp linh phụ kiện xe đạp ch&iacute;nh h&atilde;ng v&agrave; uy t&iacute;n nhất ở H&agrave; Nội.</p>\r\n\r\n<p>Địa chỉ n&agrave;y thường xuy&ecirc;n cập nhật c&aacute;c mẫu m&atilde; mới nhất n&ecirc;n bạn c&oacute; thể dễ d&agrave;ng nhất săn t&igrave;m c&aacute;c mẫu xe đạp thể thao gi&aacute; rẻ hot hiện nay. Thế mạnh của F-x Bike ch&iacute;nh l&agrave; phục vụ được đa dạng kh&aacute;ch h&agrave;ng nhờ nguồn h&agrave;ng phong ph&uacute;.</p>\r\n\r\n<p>Bạn y&ecirc;u th&iacute;ch thương hiệu xe đạp n&agrave;o, muốn t&igrave;m mẫu sản phẩm n&agrave;o, mức gi&aacute; bao nhi&ecirc;u? F-x Bike đều c&oacute; thể sẵn s&agrave;ng đ&aacute;p ứng c&aacute;c nhu cầu đ&oacute;.</p>\r\n\r\n<h2><span style=\"color:#ff0000; font-size:16px\"><strong>Tại sao n&ecirc;n mua xe đạp thể thao gi&aacute; rẻ tại F-x Bike?</strong></span></h2>\r\n\r\n<h3><span style=\"font-size:16px\"><strong><em>+ Cửa h&agrave;ng xe đạp F-x Bike với sản phẩm ch&iacute;nh h&atilde;ng, đa dạng</em></strong></span></h3>\r\n\r\n<p><strong><em>&nbsp;</em></strong>Ưu điểm lớn của F-x Bike ch&iacute;nh l&agrave; sự đa dạng của c&aacute;c thương hiệu xe đạp m&agrave; c&ocirc;ng ty ph&acirc;n phối. Đồng h&agrave;nh c&ugrave;ng với đ&oacute; l&agrave; cam kết ch&iacute;nh h&atilde;ng của c&ocirc;ng ty đối với kh&aacute;ch h&agrave;ng.</p>\r\n\r\n<p>Nhờ c&oacute; khả năng cập nhật li&ecirc;n tục mẫu m&atilde; n&ecirc;n bạn chỉ c&oacute; thể săn t&igrave;m c&aacute;c mẫu xe đạp thể thao gi&aacute; rẻ tại đ&acirc;y m&agrave; nơi kh&aacute;c kh&ocirc;ng c&oacute;. Mỗi sản phẩm đều được nhập khẩu ch&iacute;nh h&atilde;ng từ nh&agrave; sản xuất. Cam kết chất lượng như khuyến c&aacute;o.</p>\r\n\r\n<h3><span style=\"font-size:16px\"><strong><em>+ Cửa h&agrave;ng xe đạp F-x Bike c&oacute; gi&aacute; cả hợp l&yacute; nhất </em></strong></span></h3>\r\n\r\n<p>Sản phẩm được nhập khẩu trực tiếp từ nh&agrave; sản xuất n&ecirc;n F-x Bike c&oacute; thể đảm bảo gi&aacute; xe đạp ở đ&acirc;y gần s&aacute;t nhất với gi&aacute; nh&agrave; sản xuất đưa ra. Đặc biệt l&agrave; c&aacute;c mẫu xe đạp thể thao gi&aacute; rẻ lu&ocirc;n được cung cấp đến tay kh&aacute;ch h&agrave;ng ở mức gi&aacute; hợp l&yacute;, đa dạng. Từ khoảng 2 -5 triệu l&agrave; bạn đ&atilde; ho&agrave;n to&agrave;n sở hữu ngay 1 chiếc xe đạp thể thao m&igrave;nh ưa th&iacute;ch. Với mức gi&aacute; n&agrave;y th&igrave; c&aacute;c bạn sinh vi&ecirc;n, văn ph&ograve;ng đều dễ d&agrave;ng mua được.</p>', '1556464118noi-ban-xe-dap-the-thao-gia-re-tot-nhat-tai-ha-noi1.jpg', '2019-04-28', 1, 0),
(12, 'Adidas Future Craft 4D nhận giải thưởng cao quý tại cuộc thi thiết kế của Fast Company', '<h2>Với c&ocirc;ng nghệ mang t&iacute;nh c&aacute;ch mạng Futurecraft 4D - sử dụng oxy v&agrave; &aacute;nh s&aacute;ng tạo n&ecirc;n phần đế, adidas đ&atilde; được vinh danh trong hạng mục &quot;sản phẩm&quot; tại giải thưởng Innovation By Design Award 2017 do tạp ch&iacute; Fast Company tổ chức.</h2>\r\n\r\n<div class=\"clearfix contentdetail news-content\" id=\"ContentFirstFull\">\r\n<div class=\"maincontent\">\r\n<p>C&ocirc;ng nghệ v&agrave; sự đổi mới l&agrave; cuộc đua kh&ocirc;ng c&oacute; điểm dừng v&agrave; Futurecraft 4D của adidas l&agrave; một &quot;tay đua&quot; cự ph&aacute;ch, hứa hẹn sẽ đem lại tương lai mới cho nền c&ocirc;ng nghiệp gi&agrave;y d&eacute;p. Sự nỗ lực của thương hiệu đến từ Đức đ&atilde; được một trong những cuộc thi thiết kế danh gi&aacute; nhất c&ocirc;ng nhận.</p>\r\n</div>\r\n</div>\r\n\r\n<p>Vừa qua, sự kiện trao giải thường ni&ecirc;n cho những s&aacute;ng tạo c&oacute; t&iacute;nh đột ph&aacute; v&agrave; ứng dụng cao của Fast Company đ&atilde; ch&iacute;nh thức kh&eacute;p lại, với 13 hạng mục kh&aacute;c nhau cho h&agrave;ng ngh&igrave;n sản phẩm đầy ấn tượng, adidas đ&atilde; được vinh danh trong hạng mục &quot;sản phẩm&quot; (product) tại giải thưởng Innovation By Design Award 2017.</p>\r\n\r\n<p>V&agrave; tin mừng n&agrave;y đ&atilde; được <a class=\"link-inline-content\" href=\"http://genk.vn/adidas-lan-dau-tien-danh-tang-gift-card-free-tron-doi-cho-nguoi-co-cong-hien-voi-hang-20170112161804881.chn\">Jon Wexler</a> - Gi&aacute;m đốc To&agrave;n Cầu Mảng Giải Tr&iacute; v&agrave; Người Nổi Tiếng của adidas th&ocirc;ng b&aacute;o tr&ecirc;n Instagram c&aacute; nh&acirc;n.</p>\r\n\r\n<h2>Innovation By Design Award 2017 do tạp ch&iacute; Fast Company tổ chức.</h2>\r\n\r\n<div class=\"clearfix contentdetail news-content\" id=\"ContentFirstFull\">\r\n<p>C&ocirc;ng nghệ v&agrave; sự đổi mới l&agrave; cuộc đua kh&ocirc;ng c&oacute; điểm dừng v&agrave; Futurecraft 4D của adidas l&agrave; một &quot;tay đua&quot; cự ph&aacute;ch, hứa hẹn sẽ đem lại tương lai mới cho nền c&ocirc;ng nghiệp gi&agrave;y d&eacute;p. Sự nỗ lực của thương hiệu đến từ Đức đ&atilde; được một trong những cuộc thi thiết kế danh gi&aacute; nhất c&ocirc;ng nhận.</p>\r\n\r\n<p>Vừa qua, sự kiện trao giải thường ni&ecirc;n cho những s&aacute;ng tạo c&oacute; t&iacute;nh đột ph&aacute; v&agrave; ứng dụng cao của Fast Company đ&atilde; ch&iacute;nh thức kh&eacute;p lại, với 13 hạng mục kh&aacute;c nhau cho h&agrave;ng ngh&igrave;n sản phẩm đầy ấn tượng, adidas đ&atilde; được vinh danh trong hạng mục &quot;sản phẩm&quot; (product) tại giải thưởng Innovation By Design Award 2017.</p>\r\n\r\n<p>V&agrave; tin mừng n&agrave;y đ&atilde; được <a class=\"link-inline-content\" href=\"http://genk.vn/adidas-lan-dau-tien-danh-tang-gift-card-free-tron-doi-cho-nguoi-co-cong-hien-voi-hang-20170112161804881.chn\">Jon Wexler</a> - Gi&aacute;m đốc To&agrave;n Cầu Mảng Giải Tr&iacute; v&agrave; Người Nổi Tiếng của adidas th&ocirc;ng b&aacute;o tr&ecirc;n Instagram c&aacute; nh&acirc;n.</p>\r\n\r\n<p>Future Craft 4D l&agrave; th&agrave;nh quả của adidas v&agrave; Carbon - c&ocirc;ng ty c&ocirc;ng nghệ đ&igrave;nh đ&aacute;m tại thung lũng Silicon, với phần đế được tạo n&ecirc;n bằng c&ocirc;ng nghệ phức tạp sử dụng oxy v&agrave; &aacute;nh s&aacute;ng.</p>\r\n</div>', '1556464380image-1505248927333-crop1505248931162p.png', '2019-04-28', 0, 0),
(13, 'Mách cách giặt giày thể thao \"một phút xong ngay\" mà lại sạch thơm như mới', '<p><strong>1. Sử dụng b&agrave;n chải đ&aacute;nh răng</strong></p>\r\n\r\n<p>Để dễ d&agrave;ng &ldquo;luồn l&aacute;ch&rdquo; v&agrave;o những ng&oacute;c ng&aacute;ch ph&iacute;a trong đ&aacute;nh bật được những vết bẩn cứng đầu th&igrave; b&agrave;n chải đ&aacute;nh răng l&agrave; một trợ thủ kh&aacute; đắc lực. H&atilde;y tận dụng những chiếc b&agrave;n chải cũ của gia đ&igrave;nh bạn, l&agrave;m ướt bằng nước sạch hoặc nước c&oacute; chứa chất tẩy rửa sau đ&oacute; ch&agrave; c&aacute;c vết bẩn. Tuy hơi mất thời gian v&agrave; c&ocirc;ng sức nhưng chắc chắn đ&acirc;y sẽ l&agrave; một trong số những c&aacute;ch giặt gi&agrave;y thể thao hiệu quả nhất khiến cho đ&ocirc;i gi&agrave;y của bạn sạch ho&agrave;n to&agrave;n.</p>\r\n\r\n<p><strong>2. Sử dụng kem đ&aacute;nh răng</strong></p>\r\n\r\n<p>Kh&ocirc;ng chỉ c&oacute; t&aacute;c dụng l&agrave;m sạch &ldquo;bộ nh&aacute;&rdquo; m&agrave; kem đ&aacute;nh răng c&ograve;n &ldquo;thần th&aacute;nh&rdquo; hơn bạn tưởng đấy. Đối với những vết ố, v&ecirc;t bẩn kh&oacute; l&agrave;m sạch, h&atilde;y b&ocirc;i một &iacute;t kem đ&aacute;nh răng l&ecirc;n vị tr&iacute; đ&oacute;, kết hợp với b&agrave;n chải ch&agrave; x&aacute;t rồi l&agrave;m sạch lại bằng khăn ẩm. Bạn cũng c&oacute; thể d&ugrave;ng kem đ&aacute;nh răng vệ sinh những bộ phận tr&ecirc;n gi&agrave;y c&oacute; chất liệu cao su, nhựa mềm, sẽ rất hiệu quả.</p>\r\n\r\n<div class=\"txtCent\" id=\"ADS_159_15s\">&nbsp;</div>\r\n\r\n<p><strong>3. Kết hợp baking soda v&agrave; giấm</strong></p>\r\n\r\n<p>Trong danh s&aacute;ch những nguy&ecirc;n vật liệu tự nhi&ecirc;n c&oacute; khả năng l&agrave;m sạch v&agrave; tẩy rửa tuyệt vời nhất m&agrave; kh&ocirc;ng nhắc đến baking soda (muối nở) v&agrave; giấm th&igrave; thật l&agrave; sai lầm. Trong những c&aacute;ch giặt gi&agrave;y thể thao chất liệu vải, bạn c&oacute; thể sử dụng &ldquo;cặp đ&ocirc;i ho&agrave;n hảo&rdquo; n&agrave;y kết hợp với b&agrave;n chải để vệ sinh thật sạch.</p>\r\n\r\n<p>H&ograve;a 3 phần giấm trắng v&agrave; 2 phần baking soda, h&ograve;a tan rồi d&ugrave;ng b&agrave;n chải ch&agrave; x&aacute;t l&ecirc;n gi&agrave;y với hỗn hợp tr&ecirc;n. L&agrave;m sạch lại bằng c&aacute;ch l&agrave;m ướt b&agrave;n chải ch&agrave; x&aacute;t lại nhiều lần hoặc d&ugrave;ng khăn ẩm, đừng qu&ecirc;n phơi nắng cho gi&agrave;y kh&ocirc; v&agrave; thơm tho nh&eacute;.</p>\r\n\r\n<p><strong>4. Sử dụng chanh tươi</strong></p>\r\n\r\n<p>Một trong những c&aacute;ch giặt gi&agrave;y thể thao đơn giản kh&ocirc;ng sử dụng h&oacute;a chất l&agrave; tận dụng ngay những quả chanh tươi c&oacute; sẵn trong nh&agrave; bếp. Trong chanh c&oacute; chứa nhiều axit, khi bạn ch&agrave; chanh l&ecirc;n vị tr&iacute; gi&agrave;y bị bẩn v&agrave; để c&agrave;ng l&acirc;u th&igrave; axit tự nhi&ecirc;n của chanh c&agrave;ng thấm v&agrave;o gi&agrave;y v&agrave; &ldquo;đ&aacute;nh bật&rdquo; c&aacute;c vết bẩn thật hiệu quả. H&atilde;y nhớ vệ sinh lại bằng nước sạch, khăn ẩm rồi <a href=\"https://eva.vn/nha-dep/chang-can-phoi-hay-say-lau-giay-uot-den-may-cung-kho-nhanh-voi-6-cach-don-gian-c169a349284.html\">phơi gi&agrave;y kh&ocirc;</a> nh&eacute;.</p>\r\n\r\n<p><strong>5. D&ugrave;ng cục tẩy (g&ocirc;m)</strong></p>\r\n\r\n<p>Kh&ocirc;ng chỉ l&agrave; dụng cụ học tập kh&ocirc;ng thể thiếu của c&aacute;c b&eacute; m&agrave; cục tẩy (g&ocirc;m) c&ograve;n trợ gi&uacute;p bạn trong việc l&agrave;m sạch những vết bẩn tr&ecirc;n gi&agrave;y đấy. C&aacute;ch n&agrave;y &aacute;p dụng với những vết dơ bẩn, vết ố tr&ecirc;n gi&agrave;y thể thao với chất liệu cao su, nhựa dẻo trắng, chỉ bằng động t&aacute;c đơn giản l&agrave; h&atilde;y ch&agrave; x&aacute;t như khi bạn tẩy vết b&uacute;t ch&igrave; tr&ecirc;n giấy m&agrave; th&ocirc;i.</p>', '1556464671mach-ban-nhung-cach-giat-giay-the-thao-nhanh-gon-ben-dep-luc-nao-cung-sach-nhu-moi-1-1529571521-408-width600height363.jpg', '2019-04-28', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$eS3gydaz6e5F58ORKUspC.Ri4LJwrEO5ZpYf3v69HAmtyT3WYSPra', '2019-05-05 08:36:14'),
('huy1@gmail.com', '$2y$10$.6oQo0SIlK/VGkDfPxcFPuLRLeV9Yh6B3ftHWzxFA7rqoewarY3Oi', '2019-05-05 10:27:39'),
('vietnamtrongtien@gmail.com', '$2y$10$8zQZijBVHZWnmScSzhl92O7EPZ/eLopelrYSkUbPxc1rCgHN0KVyW', '2019-05-05 21:32:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `pk_product_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `c_name` varchar(500) NOT NULL,
  `c_description` varchar(1000) NOT NULL,
  `c_img` varchar(500) NOT NULL,
  `c_img1` varchar(250) DEFAULT NULL,
  `c_img2` varchar(250) DEFAULT NULL,
  `c_img3` varchar(250) DEFAULT NULL,
  `c_img4` varchar(250) DEFAULT NULL,
  `c_hotproduct` int(1) NOT NULL,
  `c_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`pk_product_id`, `fk_product_id`, `c_name`, `c_description`, `c_img`, `c_img1`, `c_img2`, `c_img3`, `c_img4`, `c_hotproduct`, `c_price`) VALUES
(1, 1, 'Xe đạp đua Twitter CZ-1', '<p>Xe đạp đua thể thao Twitter CZ &ndash; 1 mới được Twitter ra mắt mới đ&acirc;y với kiểu d&aacute;ng khung carbon cao cấp si&ecirc;u nhẹ . Đ&acirc;y c&oacute; lẽ l&agrave; điều m&agrave; rất nhiều người d&ugrave;ng y&ecirc;u th&iacute;ch bởi n&oacute; kh&ocirc;ng chỉ mang lại ưu điểm về động lực học đem lại tốc độ tối ưu cho một cuộc đua. Nếu như bạn l&agrave; người mới chơi Roadbike chắc chắn rằng sẽ mong ng&oacute;ng những trải nghiệm tr&ecirc;n Twitter T10 .</p>', '1556361732xe_dap_twitter_mantis_15_8d74e6d81cac47b68f0eee7e9ea10cee_grande.jpg', '1556361732xe-dap-dua-twitter-stealth-02.jpg', '1556361732xe-dap-dua-twitter-t10-05_6510.jpg', '1556361732xe-dap-dua-twitter-r570-02.jpg', '1556361732xe_dap_twitter_mantis_15_8d74e6d81cac47b68f0eee7e9ea10cee_grande.jpg', 1, 1000000),
(2, 1, 'Xe đạp thể thao Fornix MS207', '<p>Xe đạp thể thao trẻ em Fornix MS207 l&agrave; chiếc xe đạp địa h&igrave;nh gi&aacute; rẻ được thiết kế d&agrave;nh ri&ecirc;ng cho trẻ em từ độ tuổi 7-10 tuổi với thiết kế thể thao , chắc chắn v&agrave; t&iacute;nh thẩm mỹ cao . Xe được trang bị phuộc nh&uacute;n địa h&igrave;nh gi&uacute;p b&eacute; tự do trải nghiệm địa h&igrave;nh th&uacute; vị hơn . Sở hữu mức gi&aacute; kh&aacute; hợp l&yacute; , chiếc xe đạp n&agrave;y l&agrave; sự lựa chọn tuyệt vời của c&aacute;c bậc phụ huynh d&agrave;nh cho con em m&igrave;nh</p>', '155636104172fa4c0bd9b837e06f36c33329560caa.png', '15563610411503650001898_9127482.jpg', '15563610411503650022285_2777343.jpg', '1556361041ghi-dong-ngang-xe-dap-the-thao-tre-em-fornix-ms207-compressed.jpg', '155636104172fa4c0bd9b837e06f36c33329560caa.png', 1, 2130000),
(3, 1, 'Xe đạp thể thao Nakxus MT20', '<p>Xe đạp Nakxus MT20 l&agrave; d&ograve;ng xe đạp thể thao gi&aacute; rẻ được Nakxus trang bị bộ khung th&eacute;p hợp kim, bộ đề 21 tốc độ cơ bản, c&ocirc;ng nghệ sơn tĩnh điện 3 lớp gi&uacute;p xe c&oacute; m&agrave;u sơn b&oacute;ng v&agrave; bền hơn, phuộc th&eacute;p chống gỉ kh&ocirc;ng kh&oacute;a. Xe Nakxus MT20 c&oacute; 3 m&agrave;u cơ bản cho c&aacute;c bạn lựa chọn: Đen- Xanh dương, Trắng, Đen- Đỏ.</p>', '1556361213tai_xuong_1_master.jpg', '1556360747IMG_9319.JPG', '1556360747IMG_9320.JPG', '15563612821547884419nakxus-mt20-trang-xanh-1.jpg', '1556361282tai_xuong_1_master.jpg', 0, 2238000),
(4, 1, 'Xe đạp thể thao Fujisan khung thép', '<p>l&agrave; thương hiệu xe đạp gi&aacute; rẻ tại Nhật Bản. Xe đạp Fujisan được trang bị g&aacute;c ba ga chắc chắn ph&iacute;a sau, bộ chuyển động Shimano 21 tốc độ gi&uacute;p bạn c&oacute; nhiều lựa chọn hơn trện mọi cung đường. Đ&acirc;y l&agrave; d&ograve;ng sản phẩm xe đạp thể thao gi&aacute; rẻ kh&aacute; ph&ugrave; hợp cho nhu cầu đi lại của c&aacute;c bạn học sinh, sinh vi&ecirc;n với mức gi&aacute; kh&aacute; hợp l&yacute;.</p>', '1556361127z984501946749_62fd1dad548923a60130360ec46a4c41(1).jpg', '1556360490Fujisan-Đen-Xanh-Biển_3.jpg', '1556360490Fujisan-Trắng-4.jpg', '1556360490Fujisan-Trắng-6.jpg', '1556361127z984501946749_62fd1dad548923a60130360ec46a4c41(1).jpg', 0, 2002100),
(5, 3, 'Adidas X_PLR Shoes White CQ2406', '<p>- Chất liệu cao cấp đảm bảo độ bền v&agrave; thoải m&aacute;i ch&acirc;n khi mang. - Kiểu d&aacute;ng đơn giản nhưng kh&ocirc;ng k&eacute;m phầm sang trọng. - Đường may tỉ mỉ, miếng l&oacute;t &ecirc;m ch&acirc;n.</p>', '15563561381899866_L.jpg', '1556360427s-l1000.jpg', '1556360427adidas-X_PLR-CQ2406-white-black-white-2_600x.jpg', '1556360427X_PLR_Shoes_White_CQ2406_02_standard.jpg', '15563604271899866_L.jpg', 1, 1024000),
(6, 3, 'Giày thể thao nam Bitis Hunter X DSUH00400TIM', '<p>Giới thiệu sản phẩm Gi&agrave;y thể thao nam Bitis Hunter X DSUH00400TIM - 1972968 Gi&agrave;y thể thao nam Bitis Hunter X DSUH00400TIM với chất liệu cao cấp đảm bảo độ bền v&agrave; thoải m&aacute;i ch&acirc;n khi mang. Kiểu d&aacute;ng đơn giản nhưng kh&ocirc;ng k&eacute;m phầm sang trọng. Phần quai: Được thiết kế với kiểu d&aacute;ng tối giản, bằng lớp lưới th&ocirc;ng tho&aacute;ng điểm nhấn l&agrave; phần trang tr&iacute; &eacute;p Nosaw phản quang, dễ nhận diện v&agrave; phản s&aacute;ng khi c&oacute; &aacute;nh đ&egrave;n chiếu v&agrave;o. Phần đế: Cấu tr&uacute;c đế fylong cải tiến &eacute;p liền Fylong tăng độ b&aacute;m d&iacute;nh &ndash; phần c</p>', '15563560431985493_L.jpg', '1556360000TuanKhuyenMai.com-sp-459292_20190205020306.jpg', '1556360000giay-the-thao-nam-bitis-hunter-x-midnight-mystery-dsuh00400tim-tim-1m4G3-gp3jt7_simg_d0daf0_800x1200_max.jpg', '1556360000giay-the-thao-nam-bitis-hunter-x-midnight-mystery-dsuh00400tim-tim-1m4G3-Erp5JM_simg_d0daf0_800x1200_max.jpg', '15563600001985493_L.jpg', 1, 809000),
(7, 3, 'Giày thể thao nam chính hãng adidas Energy Cloud 2', '<p>Gi&agrave;y thể thao Adidas Energy Cloud 2 ch&iacute;nh h&atilde;ng thiết kế đơn giản, cổ điển mang n&eacute;t đặc trưng của Adidas tạo cho đ&ocirc;i gi&agrave;y vẻ sang trong tinh tế, phối m&agrave;u trang nh&atilde; của đ&ocirc;i gi&agrave;y gi&uacute;p người mang dễ phối đồ v&agrave; sử dụng trong mọi ho&agrave;n cảnh Đ&ocirc;i gi&agrave;y được t&iacute;ch hợp c&ocirc;ng nghệ CLOUDFOAM l&agrave; một lớp đệm cực nhẹ v&agrave; mềm mại, sẽ đem đến một thế hệ gi&agrave;y si&ecirc;u &ecirc;m mới cho c&aacute;c bạn trẻ năng động</p>', '15481532191971700_L.jpg', '1555728197img1.jpg', '1555728197img2.jpg', '1555728197img3.jpg', '1555728197img4.jpg', 0, 1000500),
(8, 3, 'Giày thể thao nam Biti’s Hunter Core – 2K18 – MIST GREY', '<p>Gi&agrave;y thể thao nam Biti&rsquo;s Hunter Core &ndash; 2K18 &ndash; MIST GREY - DSMH00300XAD l&agrave; d&ograve;ng sản phẩm thế hệ ho&agrave;n to&agrave;n mới: Cao hơn x &Ecirc;m hơn x Cool hơn. C&ocirc;ng nghệ đế LiteFoam độc quyền từ Biti&rsquo;s Hunter mang đến những cải tiến vượt bậc từ bộ đến &ldquo;Nhẹ Như Bay&rdquo; chất liệu Phylon quen thuộc nay th&ecirc;m phần &ecirc;m &aacute;i v&agrave; tăng chiều cao đế l&ecirc;n đến 4,3cm mang đến cảm gi&aacute;c đầy mới mẻ.</p>', '15563618771935297_L.jpg', '1556361877f62d01cd39f62d4dd0ecc1fb06bdfe31.jpg', '155636187715748238802974.jpg', '1556361877DSMH00300XAD (3).jpg', '15563618771935297_L.jpg', 0, 612000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `price`, `status`) VALUES
(27, 34, 3238500, 1),
(30, 37, 1000500, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_detail`
--

CREATE TABLE `tbl_order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `fk_product_id` int(11) NOT NULL,
  `classify` varchar(100) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order_detail`
--

INSERT INTO `tbl_order_detail` (`order_detail_id`, `order_id`, `fk_product_id`, `classify`, `number`, `price`) VALUES
(30, 27, 7, 'Size : 39', 1, 1000500),
(31, 27, 3, 'Màu : Xanh', 1, 2238000),
(34, 30, 7, 'Size : 39', 1, 1000500);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `pk_user_id` int(11) NOT NULL,
  `c_email` varchar(500) NOT NULL,
  `c_password` varchar(500) NOT NULL,
  `c_fullname` varchar(500) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`pk_user_id`, `c_email`, `c_password`, `c_fullname`, `level`) VALUES
(1, 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 'Nguyễn Văn Huy', 1),
(5, 'thanhvien@gmail.com', '202cb962ac59075b964b07152d234b70', 'Van Huy', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` int(11) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `diachi`, `dienthoai`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Huy', 'admin@gmail.com', 'Chi Lăng - Quế Võ - Bắc Ninh', 374068393, NULL, '$2y$10$r6F0nlUsFWYUCN0HopmHq.tHZLlJw11OY4i8cp7IwPv69z4NoKZ0O', 1, NULL, NULL, '2019-04-20 07:58:40'),
(2, 'Văn Huy', 'thanhvien@gmail.com', 'bac ninh', 123456789, NULL, '$2y$10$C7IxC/r7OJOez5yNGtIum.NWRbg4rBJVYcUVSh6JeHHmO8kK0ctGa', 0, NULL, NULL, '2019-05-21 08:52:58'),
(7, 'huy', 'huy1@gmail.com', 'mai thon- chi lang', 374068393, NULL, '$2y$10$iEaAjkb1Idr1woxS9Y9xlu52JmR4S1/oWnFGoEjICaU1886I04eNq', 0, NULL, '2019-05-21 09:37:46', '2019-05-21 09:37:46');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`pk_category_id`);

--
-- Chỉ mục cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  ADD PRIMARY KEY (`pk_category_detail_id`),
  ADD KEY `fk_category_product_id` (`fk_category_detail_id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`pk_customer_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`pk_news_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pk_product_id`),
  ADD KEY `fk_product_id` (`fk_product_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`pk_user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `pk_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  MODIFY `pk_category_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `pk_customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `pk_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `pk_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tbl_order_detail`
--
ALTER TABLE `tbl_order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `pk_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_detail`
--
ALTER TABLE `category_detail`
  ADD CONSTRAINT `category_detail_ibfk_1` FOREIGN KEY (`fk_category_detail_id`) REFERENCES `category` (`pk_category_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`fk_product_id`) REFERENCES `category_detail` (`pk_category_detail_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
