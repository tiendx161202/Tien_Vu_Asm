-- bang admin
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_level` int(11) NOT NULL,
  `admin_fullname` varchar(30) NOT NULL,
  `admin_sex` int(11) NOT NULL,
  `admin_phone` varchar(30) NOT NULL,
  `admin_address` varchar(200) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- bang loai qua
CREATE TABLE IF NOT EXISTS `category` (
    `category_id` int(10) NOT NULL,
    `category_name` varchar(40) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--bang san pham
CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL 	AUTO_INCREMENT,
  `product_img` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` float NOT NULL, --gia
  `product_strock` varchar(50) NOT NULL, -- so luong
  `product_information` varchar(100) NOT NULL, --mo ta
  `product_detail` varchar(300) NOT NULL, -- chi tiet
  `category_id` int(10) NOT NULL, -- phan loai
  `product_status` int(11) NOT NULL, -- trang thai
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--bang tin tuc
CREATE TABLE IF NOT EXISTS `news` (
  `news_id` int(11) NOT NULL,
  `news_img` varchar(100) NOT NULL,
  `news_name` varchar(100) NOT NULL,
  `news_content` varchar(10000) NOT NULL,
  `date_submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--bang khach hang
CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(30) NOT NULL,
  `customer_phone` int(11) NOT NULL,
  `customer_address` varchar(200) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_sex` int(11) NOT NULL DEFAULT '0',
  `customer_username` varchar(30) NOT NULL,
  `customer_password` varchar(30) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

-- bang don dat hang
CREATE TABLE IF NOT EXISTS `the_order` (
  `order_id` int(10) NOT NULL,
  `customer_name` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_delivery` varchar(10) NOT NULL,
  `order_address` varchar(300) NOT NULL,
  `order_status` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;


--bang chi tiet don dat hang
CREATE TABLE IF NOT EXISTS `order_details` (
  `customer_name` int(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `product_price` float NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
