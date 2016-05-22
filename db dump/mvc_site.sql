-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2016 at 05:23 PM
-- Server version: 5.5.48
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `status` smallint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `status`) VALUES
(1, 'Смартфоны', 1),
(2, 'Планшеты', 1),
(3, 'Ноутбуки', 1),
(4, 'Аккустика', 1),
(5, 'Пылесосы', 1),
(6, 'Стиральные машины', 1),
(7, 'Нерабочая', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `price` float NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `category_id`, `price`, `brand`, `description`, `status`) VALUES
(1, 'Iphone 3', 1, 2000, 'Apple', 'Описание Iphone 3', 1),
(3, 'Samsung Galaxy S7 Edge Black', 1, 24000, 'Samsung', 'Диагональ экрана: 5.5"; Разрешение экрана: 2560х1440; Камера: 12 Mpx; Количество ядер: 8; Оперативная память: 4 Гб; Внутренняя память: 32 Гб;', 1),
(4, 'Samsung Galaxy A7 (2016) Duos SM-A710 Black', 1, 12000, 'Samsung', 'Диагональ экрана: 5.5"; Разрешение экрана: 1920x1080; Камера: 13 Mpx; Количество ядер: 8; Оперативная память: 3 Гб; Внутренняя память: 16 Гб;', 1),
(5, 'HTC Desire 326G DS white', 1, 2600, 'HTC', 'Диагональ экрана: 4.5";\r\nРазрешение экрана: 854x480;\r\nКамера: 8 Mpx;\r\nКоличество ядер: 4;\r\nОперативная память: 1 Гб;\r\nВнутренняя память: 8 Гб;', 1),
(6, 'Meizu M2 Note 16Gb White', 1, 4000, 'Meizu', '13Мп модуль от Samsung\r\n4x-кратный цифровой зум, панорама 300°\r\nСиний ИК-фильтр\r\nЗащитное стекло Corning® Gorilla® Glass 3\r\n5-элементная линза, апертура F/2.2\r\nСкорость съемки 30 к/с', 1),
(10, 'ZELMER AQUAWELT 919.0 ST', 5, 3300, 'ZELMER ', 'Тип обычный .\r\nТип уборки сухая, влажная .\r\nПотребляемая мощность 1600 Вт .\r\nРегулятор мощности на корпусе .\r\nФильтр тонкой очистки есть .\r\nТип пылесборника аквафильтр .', 1),
(11, 'SAMSUNG VC-C6590', 5, 2800, 'SAMSUNG', 'Тип обычный. Тип уборки сухая. Потребляемая мощность 2000 Вт. Мощность всасывания 360 Вт. Регулятор  мощности на корпусе. Тип пылесборника циклонный фильтр. \r\n', 1),
(12, 'Samsung VCC6590H3R/XEV', 5, 3199, 'Samsung', 'Две камеры, в два раза чище дом \r\nУникальная двухкамерная система Twin Chamber System компании Samsung включает две рабочие камеры, благодаря чему повышается эффективность чистки и сохранение высокой мощности всасывания. Поскольку чатсицы пыли увлекаются вихревым потоком воздух во внутреннюю камеру, частицы мусора удаляются из потока воздух под действием центробежных сил. В результате крупные частицы пыли и мусора остаются во внешней камере и легко удаляются при опустошении пылесборника. Наконец, эта система означает, что вам не надо тратить время на трудоемкую процедуру удаления собранной пыли из пылесоса и тратить деньги на приобретение запасных мешков для сбора пыли.', 1),
(13, 'Huawei MediaPad Т1 7.0 8GB 3G', 2, 3000, 'Huawei', 'Характеристики и комплектация товара могут изменяться производителем без уведомления. Магазин не несет ответственность за изменения, внесенные производителем.', 1),
(14, 'Samsung Galaxy Tab E 9.6 T561 3G', 2, 5902, 'Samsung', 'Характеристики и комплектация товара могут изменяться производителем без уведомления. Магазин не несет ответственность за изменения, внесенные производителем.', 1),
(15, 'Asus ZenPad 7 Z170CG 8Gb 3G', 2, 3100, 'Asus', 'Характеристики и комплектация товара могут изменяться производителем без уведомления. Магазин не несет ответственность за изменения, внесенные производителем.', 1),
(16, 'Ноутбук LENOVO B5010', 3, 8900, 'LENOVO', 'ип Ноутбук / Серия процессора Intel Pentium Quad Core / Частота процессора 2.16 гГц / Диагональ дисплея 15.6 " / Жесткий диск HDD 500 Гб / Модель видеокарты Intel HD Graphics', 1),
(17, 'Ноутбук ASUS F540SA-XX183T', 3, 9000, 'ASUS', 'Тип Ноутбук / Серия процессора Intel Celeron Dual Core / Частота процессора 1.6 гГц / Диагональ дисплея 15.6 " / Жесткий диск HDD 500 Гб / Модель видеокарты Intel HD Graphics', 1),
(18, 'Ноутбук DELL Inspiron 5758 ', 3, 25085, 'DELL', 'Тип Ноутбук / Серия процессора Intel Core i7 (V поколение) / Частота процессора 2.4 гГц / Диагональ дисплея 17.3 " / Жесткий диск HDD 1000 Гб / Модель видеокарты GeForce GT920M', 1),
(19, 'Konoos 2.1 KNS-T420 Black', 4, 1040, 'Konoos', 'Общая выходная мощность, RMS	26 Вт.\r\nМатериал корпуса: сателлиты - пластик, сабвуфер - дерево.', 1),
(20, 'JBL 2.0 Pulse 2 Silver', 4, 5160, 'JBL', 'Общая выходная мощность, RMS	16 Вт.\r\nМатериал: сателлиты - алюминий, резина.', 1),
(21, 'ELECTROLUX EWF 1076 GDW', 6, 10300, 'ELECTROLUX', 'Тип: полногабаритная. Количество белья при стирке: 7 кг. Скорость отжима: 1000 об/мин. Класс энергопотребления: А+++. Дисплей: есть. Габариты (ВхШхГ) : 85x60x52,2 см. Цвет:белый.', 1),
(22, 'BOSCH WAT28660BY ', 6, 16800, 'BOSCH', 'Тип: полногабаритная. Количество белья при стирке: 9 кг. Скорость отжима: 1400 об/мин. Класс энергопотребления: А+++. Дисплей: есть. Количество программ: 14. Габариты (ВхШхГ) : 84,8х59,8х59 см. Вес: 72 кг. Цвет:белый.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE IF NOT EXISTS `product_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `products` text NOT NULL,
  `total_price` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`id`, `user_name`, `user_phone`, `user_email`, `date`, `products`, `total_price`, `status`) VALUES
(3, 'Иванна Петрова', '+8005109304', 'example@sobaca.cot', '2016-05-22 11:12:46', 'a:1:{i:1;i:1;}', 2000, 3),
(4, 'Иванов Иваныч', '8004567370', 'test92@mail.ru', '2016-05-22 11:13:14', 'a:2:{i:3;i:1;i:4;i:1;}', 36000, 3),
(5, 'Петр Петров', '8004567370', 'sedsdsd@ti.ru', '2016-05-22 12:04:49', 'a:2:{i:6;i:2;i:3;i:1;}', 32000, 2),
(6, 'Дядя Семен', '8666999394', 'sedsdsd@ti.ru', '2016-05-22 12:05:42', 'a:1:{i:5;i:1;}', 2600, 0),
(7, 'Томара Петрова', '8005109304', 'tomarra@mail.ru', '2016-05-22 14:07:21', 'a:3:{i:21;i:1;i:22;i:1;i:6;i:1;}', 31100, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
