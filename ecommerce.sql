
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `userId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `quanty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`userId`, `productId`, `quanty`) VALUES
(1002, 2002, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(5001, 'Sách', 1),
(5002, 'Đồng hồ', 1),
(5003, 'Laptop', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `totalPrice` int(20) NOT NULL,
  `receivedDate` date DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `userId`, `createdDate`, `totalPrice`, `receivedDate`, `status`) VALUES
(4001, 1002, '2022-03-10', 10267000, '2022-03-15', 'processing'),
(4002, 1002, '2022-03-10', 9798000, '2022-03-15', 'processing');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) NOT NULL,
  `productQty` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `orderId`, `userId`, `productId`, `productQty`, `rate`, `comment`) VALUES
(3000, 4001, 1002, 2001, 2, 4, 'OK'),
(3001, 4001, 1002, 2002, 3, 4, 'OK1'),
(3002, 4002, 1002, 2003, 2, 5, 'OK2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `originalPrice` decimal(10,0) NOT NULL,
  `promotionPrice` decimal(10,0) NOT NULL,
  `image` varchar(50) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDate` date NOT NULL,
  `cateId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `des` varchar(1000) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `soldCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `originalPrice`, `promotionPrice`, `image`, `createdBy`, `createdDate`, `cateId`, `qty`, `des`, `status`, `soldCount`) VALUES
(2001, 'Tâm Lý Học Về Tiền', '113400', '113400', '2001.png', 1000, '2022-10-26', 5001, 10, 'Tiền bạc có ở khắp mọi nơi, nó ảnh hưởng đến tất cả chúng ta, và khiến phần lớn chúng ta bối rối. Mọi người nghĩ về nó theo những cách hơi khác nhau một chút. Nó mang lại những bài học có thể được áp dụng tới rất nhiều lĩnh vực trong cuộc sống, như rủi ro, sự tự tin, và hạnh phúc. Rất ít chủ đề cung cấp một lăng kính phóng to đầy quyền lực giúp giải thích vì sao mọi người lại hành xử theo cách họ làm hơn là về tiền bạc. Đó mới là một trong những chương trình hoành tráng nhất trên thế giới. Mục đích của cuốn sách này là sử dụng những câu chuyện ngắn để thuyết phục bạn rằng những kỹ năng mềm còn quan trọng hơn khía cạnh lý thuyết của đồng tiền. Thông qua một tập hợp những thử nghiệm và sai lầm của nhiều năm chúng ta đã học được cách trở thành những nông dân giỏi giang hơn, những thợ sửa ống nước nhiều kỹ năng hơn, và những nhà hóa học tiên tiến hơn. Nhưng liệu việc thử nghiệm và sai lầm có dạy chúng ta trở nên giỏi hơn trong cách quản lý tài chính cá nhân của chính mình không?', 1, 1),
(2002, 'Rèn Luyện Tư Duy Phản Biện', '49500', '49500', '2002.jpg', 1000, '2022-10-26', 5001, 9, 'Những người tư duy phản biện cũng biết rằng họ cần thu thập những ý tưởng và đức tin của mọi người. Tư duy phản biện không thể tự nhiên mà có. Việc lắng nghe những ý kiến của người khác cũng có thể giúp bạn nhận ra rằng phạm vi tri thức của bạn không phải là vô hạn. Không ai có thể biết hết tất cả mọi thứ. Nhưng với việc chia sẻ và đánh giá phê bình kiến thức, chúng ta có thể mở rộng tâm trí. Nếu điều này khiến bạn cảm thấy không thoải mái, không sao cả. Trên thực tế, bước ra ngoài vùng an toàn là một điều quan trọng để mở rộng niềm tin và suy nghĩ của bạn. Tư duy phản biện không phải là chỉ biết vài thứ, và chắc chắn không phải việc xác nhận những điều bạn đã biết. Thay vào đó, nó xoay quanh việc tìm kiếm sự thật – và biến chúng trở thành thứ bạn biết.', 1, 0),
(2003, 'Clean Code – Mã Sạch Và Con Đường Trở Thành Lập Trình Viên Giỏi', '362500', '362500', '2003.jpg', 1000, '2022-10-26', 5001, 10, 'Cuốn sách được chia thành ba phần lớn. Phần đầu tiên mô tả các nguyên tắc, mô hình và cách thực hành viết mã sạch. Phần thứ hai gồm nhiều tình huống điển hình với mức độ phức tạp gia tang không ngừng. Mỗi tình huống là một bài tập giúp làm sạch mã, chuyển đổi mã có nhiều vấn đề thành mã có ít vấn đề hơn. Và phần cuối là tuyển tập rất nhiều những dấu hiệu của mã có vấn đề, những tìm tòi, suy nghiệm từ thực tiễn được đúc rút qua cách tình huống điển hình.', 1, 0),
(2004, 'Đồng Hồ Casio Nam G-Shock GA-800-1ADR', '2684800', '2684800', '2004.png', 1000, '2022-10-26', 5002, 20, 'Từ G-SHOCK, thương hiệu đồng hồ không ngừng đặt ra các tiêu chuẩn mới về độ bền đồng hồ hiển thị giờ hiện hành đã xuất hiện mẫu kết hợp đồng hồ kim-số ba kim GA-800 mới.\r\nCác mẫu mới này có thiết kế G-SHOCK nổi bật với nút bấm phía trước ở vị trí 6 giờ. Mẫu cơ sở là GA-800 với vỏ gọn nhẹ và thiết kế thanh mảnh giúp đeo vừa vặn trên cổ tay hơn. Định dạng kết hợp cho phép bạn dễ dàng đọc giờ hiện hành trên mặt đồng hồ kim nhờ kim giây hoạt động độc lập và các vạch giờ đa chiều cỡ lớn.\r\nCác mẫu này hiện có màu đen hoặc đỏ. Cả hai màu này đều là màu của nhãn hiệu G-SHOCK.\r\nToàn bộ tính hữu dụng của định dạng kim-số, hai đèn LED Chiếu sáng cực mạnh, chức năng chuyển kim và nhiều chức năng khác tạo nên chiếc đồng hồ tiện dụng nhất.', 1, 2),
(2005, 'Đồng Hồ Nam Chính Hãng Dây Thép Lưới Đen ECONOMICXI', '1390000', '1390000', '2005.jpg', 1000, '2022-10-26', 5002, 20, 'ĐỒNG HỒ ECONOMICXI NAM TÍNH: Những chiếc đồng hồ ECONOMICXI làm tôn lên vẻ đẹp hiện đại mang lại sự cuốn hút mạnh mẽ cho nam giới từ cái nhìn đầu tiên. Đàn ông là phải thế, dù bạn không cao nhưng người khác phải ngước nhìn. ', 1, 2),
(2006, 'MacBook Air M1 13 inch 2020', '23590000', '23590000', '2006.png', 1000, '2022-10-26', 5003, 30, 'MacBook Air là máy tính xách tay mỏng và nhẹ nhất của Apple, siêu mạnh mẽ với chip M1. Tạo ra một bước đột phá về hiệu năng CPU và đồ họa, cùng với thời lượng pin lên đến 18 giờ.(1) Giúp bạn hoàn thành mọi khối lượng bài tập thật dễ dàng.\r\n', 1, 10),
(2007, 'Lenovo ThinkPad T470s', '10300000', '10300000', '2007.jpg', 1000, '2022-10-26', 5003, 30, 'ThinkPad T470s  là laptop được giới doanh nhân cao cấp ở Mỹ ưa chuộng vì thiết kế mỏng nhẹ như X1 Carbon mà giá thành lại kinh tế. Hãng Lenovo ngoài việc nâng cấp CPU lên Intel thế hệ 7 còn cải thiện độ sáng màn hình mà vẫn đảm bảo được vấn đề tản nhiệt và tối ưu thời lượng pin sử dụng. Lenovo T470s là laptop mới mỏng nhất trong dòng Thinkpad T hỗ trợ tùy chọn màn hình 14 inch WQHD, cấu hình Lenovo T470s Intel Core i5-7300U vPro, 8GB RAM DDR4, 256GB SSD có mức giá xuất xưởng ở Mỹ là 1380 USD tương đương 31 triệu Việt Nam Đồng.  ', 1, 10),
#thêm hình
(2008, 'Dell Inspiron 15 3515 G6GR72', '12300000', '12300000', '', 1000, '2022-10-26', 5003, 30, 'Laptop Dell Inspiron 3515 được đánh giá làchiếc laptop có cấu hình chất lượng cùng kiểu dáng linh hoạt để làm việc từ xa thuận tiện hơn. Cùng với vi xử lý Ryzen 5 mạnh mẽ, bộ nhớ lưu trữ 256 GB và thời lượng pin khá lâu chắc chắn sẽ đồng hành cùng bạn hoàn tất mọi công việc có trong ngày. ', 1, 10),
(2009, 'How Money Works - Hiểu Hết Về Tiền', '300000', '300000', '', 1000, '2022-10-26', 5001, 30, 'How money works – Hiểu hết về tiền tìm hiểu cách thức các chính phủ kiểm soát tiền tệ, cách các công ty kiếm ra tiền, cách các thị trường tài chính vận hành, cách các cá nhân tối đa hóa thu nhập thông qua đầu tư…', 1, 10),
(2010, 'Đồng hồ CASIO 39.7 mm', '1098000', '1098000', '', 1000, '2022-10-26', 5002, 30, 'Thương hiệu đồng hồ nổi tiếng đến từ Nhật Bản không ngừng cải tiến và cho ra mắt những dòng sản phẩm chất lượng phù hợp với nhiều đối tượng khách hàng. Những dòng sản phẩm nổi tiếng của Casio là: G-Shock với thiết kế mạnh mẽ cùng độ bền cao, Edifice thiết kế hiện đại cùng nhiều tính năng vượt trội, Sheen với thiết kế cổ điển và sang trọng,…', 1, 10),
(2011, 'Apple Macbook Pro 13 M2 2022', '30590000', '30590000', '', 1000, '2022-10-26', 5003, 30, 'Macbook Pro M2 2022 là phiên bản nâng cấp mạnh mẽ của Macbook Pro M1 với nhiều cải tiến vô cùng ấn tượng. Đây sẽ là chiếc laptop mang đến cho người dùng trải nghiệm cực tốt. Từ đó giúp mọi hoạt động giải trí cũng như các công việc nặng như đồ họa, thiết kế đều được xử lý một cách mượt mà và nhanh chóng hơn.', 1, 10),
(2012, 'Sự Im Lặng Của Bầy Cừu', '92000', '92000', '', 1000, '2022-10-26', 5001, 30, 'Những cuộc phỏng vấn ở xà lim với kẻ ăn thịt người ham thích trò đùa trí tuệ, những tiết lộ nửa chừng hắn chỉ dành cho kẻ nào thông minh, những cái nhìn xuyên thấu thân phận và suy tư của cô mà đôi khi cô muốn lảng tránh... Clarice Starling đã dấn thân vào cuộc điều tra án giết người lột da hàng loạt như thế, để rồi trong tiếng bức bối của chiếc đồng hồ đếm ngược về cái chết, cô phải vật lộn để chấm dứt tiếng kêu bao lâu nay vẫn đeo đẳng giấc mơ mình: tiếng kêu của bầy cừu sắp bị đem đi giết thịt.', 1, 10),
(2013, 'Đồng hồ CITIZEN 40 mm', '6856000', '6856000', '', 1000, '2022-10-26', 5002, 30, 'Xu hướng thiết kế chính của đồng hồ Citizen là đơn giản và thanh lịch. Citizen luôn chú trọng đến việc đổi mới và tạo sự phong phú cho các mẫu thiết kế. Các chi tiết cũng được Citizen đầu tư kỹ lưỡng trong khâu chế tác.', 1, 10),
(2014, 'HP Gaming Victus 15-FA0031DX 6503849', '16990000 ', '16990000 ', '', 1000, '2022-10-26', 5003, 30, 'Laptop HP Gaming Victus 15-FA0031DX 6503849 mang đến một sản phẩm tuyệt vời cho cộng đồng game thủ với màn hình đẹp mắt cùng khả năng hoạt động ấn tượng. Bạn sẽ có cơ hội trải nghiệm chơi game mượt mà đi kèm với khung hình sắc nét, sinh động khi sở hữu laptop HP này trong tay.', 1, 10),
(2015, 'Thị Trấn Chuyện Kể - Nghi Thức Nghỉ Lễ Dành Cho Người Trưởng Thành', '119970', '119970', '', 1000, '2022-10-26', 5001, 30, 'Tiếp nối những câu chuyện “cổ tích” dành cho người lớn, Thị Trấn Chuyện Kể - Nghi thức nghỉ lễ dành cho người trưởng thành sẽ đưa bạn đến những kỳ nghỉ lễ ấm cúng dưới góc nhìn của một người trưởng thành. Đó là một thế giới phong phú với mọi cảm xúc và giác quan thông qua những khoảnh khắc ta dành cho bản thân, quây quần bên người thân, bạn bè và cả những vật nuôi bé nhỏ: giỏ rau củ đầy ắp dưới gốc cây, bản nhạc trong một đêm bão, rượu táo ủ ấm những ngày đông, mùi mứt thơm và những khoảnh khắc lấp lánh khi chậm rãi ngắm nụ cười của những người ta thương mến…', 1, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `isConfirmed` tinyint(4) NOT NULL DEFAULT 0,
  `phone` varchar(10) NOT NULL,
  `image` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `dob`, `address`, `password`, `roleId`, `status`, `isConfirmed`, `phone`, `image`) VALUES
(1000, 'Thanh Sang', 'admin@gmail.com', '2022-06-12', '276/1, Đường Tỉnh Lộ 827B', 'sang123', 1, 1, 1, '0365840620', 'ic.jpg'),
(1001, 'Nguyễn Tuấn Vinh', 'nguyentuanvinh1222@gmail.com', '2022-06-12', '276/1, Đường Tỉnh Lộ 827B', '123456', 1, 1, 1, '0793191854', ''),
(1002, 'Thanh Sang', 'sang@gmail.com', '2022-06-13', '276/1, Đường Tỉnh Lộ 827B', 'sang123', 2, 1, 1, '0345667789', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD KEY `user_id` (`userId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`userId`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`orderId`),
  ADD KEY `product_id` (`productId`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cate_id` (`cateId`),
  ADD KEY `createdBy` (`createdBy`);
ALTER TABLE `products` ADD FULLTEXT KEY `name` (`name`,`des`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`roleId`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5004;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4003;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3003;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2008;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cateId`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`createdBy`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
