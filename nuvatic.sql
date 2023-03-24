-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2023 at 08:45 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nuvatic`
--

-- --------------------------------------------------------

--
-- Table structure for table `customeraddress`
--

CREATE TABLE `customeraddress` (
  `tablename` varchar(100) NOT NULL,
  `customerAddress` varchar(150) NOT NULL,
  `customerPhone` varchar(15) NOT NULL,
  `deliveryNote` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customeraddress`
--

INSERT INTO `customeraddress` (`tablename`, `customerAddress`, `customerPhone`, `deliveryNote`) VALUES
('qwertya', 'ascscca', '', ''),
('Hariscust', 'Krishnalayam H,\r\nPanamukku,\r\nNedupuzha PO,\r\nThissur-680007', '+919876543210', ''),
('Nuvatic1234', 'Harikrishnan KB,\r\nKrishnalayam H,\r\nPanamukku,Nedupuzha-680007', '8157096325', ''),
('Sreerag', 'hari,\r\nthrissur,\r\n12345', '1234567890', ''),
('AswinCo', 'Aswin Co,\r\nKollam,\r\nKerala,\r\n31452', '9123098238', ''),
('AbcdHari', 'HariAbcd,\r\nweertyui,\r\nhgc,\r\n12365', '923534634', 'deliveryNote'),
('DeliveryNote', 'Abcd,\r\nAddress,\r\nstate,\r\n123456', '9651987654', '5002,5006'),
('NewBill', 'AvishithPM,\r\nHari,\r\nQwytf-123123\r\nKerala', '987654321', '1001'),
('Newbill2', 'Newbill,\r\nAbcd-123', '1234567878', '2008'),
('Newbill2', 'qwerty', '1234', '123'),
('Newbill2', 'qwerty', '1234', '123'),
('AvailabilityCheck', 'Availabilty', '12345678', '1003'),
('NuvaticBill123', 'Harikrishnan KB,\r\nKrishnalayam H,\r\nKerala-680007\r\nIndia', '9876543210', '4001,4009'),
('MyNewInvoice123', 'HARIKRISHNAN KB,\r\nKrishnalayam,\r\nThrissur-680007,\r\nKerala,\r\nIndia', '9876543210', '5002,4003');

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE `demo` (
  `product` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`product`, `price`, `unit`, `date`) VALUES
('hari', 1, 1, '2023-01-04'),
('qwerty', 2, 2, '2023-01-19'),
('dfg', 4, 3, '2023-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `haritwo`
--

CREATE TABLE `haritwo` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `haritwo`
--

INSERT INTO `haritwo` (`product`, `price`, `unit`, `date`) VALUES
('qwwe', 3, 4, '2023-02-08'),
('tgt', 5, 7, '2023-02-08');

-- --------------------------------------------------------

--
-- Table structure for table `mynewinvoice123`
--

CREATE TABLE `mynewinvoice123` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `available` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mynewinvoice123`
--

INSERT INTO `mynewinvoice123` (`product`, `price`, `unit`, `date`, `available`) VALUES
('LED', 10, 10, '0000-00-00', 'EX STOCK'),
('SWITCH', 2, 50, '0000-00-00', 'NOT IN STOCK'),
('WIRE 10g', 5, 25, '0000-00-00', 'EX STOCK');

-- --------------------------------------------------------

--
-- Table structure for table `newbill`
--

CREATE TABLE `newbill` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newbill2`
--

CREATE TABLE `newbill2` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `newbill3`
--

CREATE TABLE `newbill3` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `nuvatic123`
--

CREATE TABLE `nuvatic123` (
  `product` varchar(10) NOT NULL,
  `price` int(11) NOT NULL,
  `unit` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuvatic123`
--

INSERT INTO `nuvatic123` (`product`, `price`, `unit`, `date`) VALUES
('q', 1, 2, '2022-12-29'),
('w', 2, 2, '2023-01-12'),
('e', 2, 3, '2058-12-31'),
('1', 1, 1, '2023-01-05'),
('1', 1, 1, '2023-01-05'),
('1', 1, 1, '2023-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `nuvaticbill123`
--

CREATE TABLE `nuvaticbill123` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `available` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nuvaticbill123`
--

INSERT INTO `nuvaticbill123` (`product`, `price`, `unit`, `date`, `available`) VALUES
('LED BULB', 50, 2, '0000-00-00', 'EX STOCK'),
('SWITCH', 20, 1, '0000-00-00', 'NOT IN STOCK'),
('WIRE 10g', 50, 1, '0000-00-00', 'EX STOCK');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `availability` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `productname`, `price`, `availability`) VALUES
(1, 'Pvc conduit pipi', 100, 'Yes'),
(2, 'Elbow', 200, 'Yes'),
(3, 'Tee', 300, 'Yes'),
(4, 'Pvc cement solvent', 400, 'No'),
(5, 'Fan box', 100, 'Yes'),
(6, 'Switch', 500, 'Yes'),
(7, 'Socket', 600, 'Yes'),
(8, 'Dp swich', 700, 'No'),
(9, 'Dimmer', 800, 'Yes'),
(10, 'Indicator', 200, 'Yes'),
(11, 'Isolator', 1300, 'No'),
(12, 'Mcb', 140, 'Yes'),
(13, 'Mcd-Mini', 150, 'Yes'),
(14, 'Mcb-Cos', 170, 'No'),
(15, 'Mcb-Enclosure', 300, 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `qwert123`
--

CREATE TABLE `qwert123` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qwert123`
--

INSERT INTO `qwert123` (`product`, `price`, `unit`, `date`) VALUES
('Update successfull', 100, 2, '2023-02-08'),
('gvdfv', 22, 2, '2023-01-30');

-- --------------------------------------------------------

--
-- Table structure for table `qwertya`
--

CREATE TABLE `qwertya` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qwertya`
--

INSERT INTO `qwertya` (`product`, `price`, `unit`, `date`) VALUES
('ascsac', 3, 2, '2023-02-21'),
('ascsac', 3, 2, '2023-02-21'),
('ascsac', 3, 2, '2023-02-21');

-- --------------------------------------------------------

--
-- Table structure for table `rice`
--

CREATE TABLE `rice` (
  `id` int(11) NOT NULL,
  `product` varchar(30) DEFAULT NULL,
  `prize` varchar(10) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rice`
--

INSERT INTO `rice` (`id`, `product`, `prize`, `date`) VALUES
(1, 'Rice', '100', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `sreerag`
--

CREATE TABLE `sreerag` (
  `product` varchar(25) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sreerag`
--

INSERT INTO `sreerag` (`product`, `price`, `unit`, `date`) VALUES
('sss', 3, 3, '2023-03-14'),
('sdcs', 2, 1, '2023-04-03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(0, 'nuatic', '$2y$10$6rIwX9ctao6BEPnev30Q/.mlpcUxuiVH1l.x0ClVD2D'),
(1, 'admin', 'admin'),
(2, 'hari', 'Hari@2002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `rice`
--
ALTER TABLE `rice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
