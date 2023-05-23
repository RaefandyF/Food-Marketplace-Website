-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2022 at 05:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AMDP3`
--

-- --------------------------------------------------------

--
-- Table structure for table `AllUser`
--

CREATE TABLE `AllUser` (
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `UserEmail` varchar(255) NOT NULL,
  `UserPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `AllUser`
--

INSERT INTO `AllUser` (`UserID`, `RoleID`, `UserName`, `UserEmail`, `UserPassword`) VALUES
(3, 3, 'customer', 'customer@gmail.com', '$2y$10$geyQUIsoTB9OBFHOPSaj3O/9Uudh6.uK26vGl.OD/xKmmAYi/HZli'),
(5, 3, 'customeramdp', 'amdp3@unistore.com', '$2y$10$xYK0yym0BsCHzNeOzv7W/.WiY99hMrgc63kplWxpNKqNW8leRzHcG'),
(6, 1, 'Raefandy Fadila', 'admin1@unistore.com', 'admin123'),
(7, 3, 'andisuryo', 'cust2@gmail.com', '$2y$10$5I1mOqJN1IP9zi6HYV5SHuRX/vKQaeUMSHp0sF.VjpThDjO9WF1ym'),
(8, 3, 'karinaaa', 'cust3@gmail.com', '$2y$10$N7c7Can1hVFbNB1pwaZB3eBuc9EuVDMinbS7aJR7iHPv/YHjrXpCq'),
(9, 3, 'halmiasa', 'cust4@gmail.com', '$2y$10$xCuFsGjOFolTviV8kTrv0.H1vLU.W16tpFMaxuqHJqXkLdG4ct8AO'),
(10, 3, 'guritno', 'cust5@gmail.com', '$2y$10$eXpbWaMyCSw7Eq82jbtLdOaQew6dgmDegYK3hs1qarjqlkepzGDcS'),
(11, 3, 'bambangpamungkas', 'bambang@gmail.com', '$2y$10$Y8XjEN0hiE8zwFJ7KpbE3.nVoAUsN.ONMNVqM.Lue2oOoFLEgsmhi'),
(12, 3, 'messigoat', 'lionelmessi@barcelona.com', '$2y$10$nFCAw.Ea63k3V81wDLzyDOXaCsr3WfdB73Qj/1ARYuZ3HeqRgOC5S'),
(13, 3, 'ronaldowati', 'ronaldo@gmail.com', '$2y$10$GDqf8fRuumhpkRy81Dc9zeIxcmbb./zpofw0IsJnFBK1.3e7O8NPu'),
(14, 3, 'pepereal', 'pepe@gmail.com', '$2y$10$xQqbCENXQfRKjRYGx3o96ehhocJUoddDAom39fh.RN51uxlvOP/km');

-- --------------------------------------------------------

--
-- Table structure for table `Cart`
--

CREATE TABLE `Cart` (
  `CartID` int(11) NOT NULL,
  `TenantID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Cart`
--

INSERT INTO `Cart` (`CartID`, `TenantID`, `ProductID`, `CustomerID`) VALUES
(9, 2, 7, 11),
(10, 2, 7, 11);

-- --------------------------------------------------------

--
-- Table structure for table `MsAdmin`
--

CREATE TABLE `MsAdmin` (
  `AdminID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL DEFAULT 1,
  `AdminName` varchar(255) NOT NULL,
  `AdminEmail` varchar(255) NOT NULL,
  `AdminPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MsAdmin`
--

INSERT INTO `MsAdmin` (`AdminID`, `RoleID`, `AdminName`, `AdminEmail`, `AdminPassword`) VALUES
(1, 1, 'Raefandy Fadila', 'admin1@unistore.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `MsCustomer`
--

CREATE TABLE `MsCustomer` (
  `CustomerID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL DEFAULT 3,
  `CustomerEmail` varchar(255) NOT NULL,
  `CustomerUsername` varchar(255) NOT NULL,
  `CustomerPhone` varchar(20) NOT NULL,
  `CustomerPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MsCustomer`
--

INSERT INTO `MsCustomer` (`CustomerID`, `RoleID`, `CustomerEmail`, `CustomerUsername`, `CustomerPhone`, `CustomerPassword`) VALUES
(9, 3, 'customer@gmail.com', 'customer', '081212343051', '$2y$10$geyQUIsoTB9OBFHOPSaj3O/9Uudh6.uK26vGl.OD/xKmmAYi/HZli'),
(11, 3, 'amdp3@unistore.com', 'customeramdp', '08123321123', '$2y$10$xYK0yym0BsCHzNeOzv7W/.WiY99hMrgc63kplWxpNKqNW8leRzHcG'),
(12, 3, 'cust2@gmail.com', 'andisuryo', '082176127188', '$2y$10$5I1mOqJN1IP9zi6HYV5SHuRX/vKQaeUMSHp0sF.VjpThDjO9WF1ym'),
(13, 3, 'cust3@gmail.com', 'karinaaa', '08263272723', '$2y$10$N7c7Can1hVFbNB1pwaZB3eBuc9EuVDMinbS7aJR7iHPv/YHjrXpCq'),
(14, 3, 'cust4@gmail.com', 'halmiasa', '0822673262232', '$2y$10$xCuFsGjOFolTviV8kTrv0.H1vLU.W16tpFMaxuqHJqXkLdG4ct8AO'),
(15, 3, 'cust5@gmail.com', 'guritno', '08237623767', '$2y$10$eXpbWaMyCSw7Eq82jbtLdOaQew6dgmDegYK3hs1qarjqlkepzGDcS'),
(16, 3, 'bambang@gmail.com', 'bambangpamungkas', '081524524232', '$2y$10$Y8XjEN0hiE8zwFJ7KpbE3.nVoAUsN.ONMNVqM.Lue2oOoFLEgsmhi'),
(17, 3, 'lionelmessi@barcelona.com', 'messigoat', '08262625262', '$2y$10$nFCAw.Ea63k3V81wDLzyDOXaCsr3WfdB73Qj/1ARYuZ3HeqRgOC5S'),
(18, 3, 'ronaldo@gmail.com', 'ronaldowati', '082818118901', '$2y$10$GDqf8fRuumhpkRy81Dc9zeIxcmbb./zpofw0IsJnFBK1.3e7O8NPu'),
(19, 3, 'pepe@gmail.com', 'pepereal', '08327322323', '$2y$10$xQqbCENXQfRKjRYGx3o96ehhocJUoddDAom39fh.RN51uxlvOP/km');

-- --------------------------------------------------------

--
-- Table structure for table `MsProduct`
--

CREATE TABLE `MsProduct` (
  `ProductID` int(11) NOT NULL,
  `TenantID` int(11) NOT NULL,
  `ProductIMG` varchar(255) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `ProductDeksripsi` varchar(500) NOT NULL,
  `ProductPrice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MsProduct`
--

INSERT INTO `MsProduct` (`ProductID`, `TenantID`, `ProductIMG`, `ProductName`, `ProductDeksripsi`, `ProductPrice`) VALUES
(1, 1, 'https://media.istockphoto.com/id/1346097498/photo/mie-goreng.jpg?b=1&s=170667a&w=0&k=20&c=AYsHSk6KJdxysCe7FfoO5_Plu7dkbBhpSOs7jVrQR58=', 'Mie Goreng Kecap', 'Mie goreng enak dibumbui kecap manis gurih', 15000),
(6, 1, 'https://media.istockphoto.com/id/1418114980/photo/top-view-of-spicy-noodle-soup-served-in-a-bowl.jpg?b=1&s=170667a&w=0&k=20&c=4-1HEh2io7pZTCU7MRJb2rF53fINWg8r2TUqYKfe4Tc=', 'Bakmi Rebus Pedas', 'Bakmi dengan kuah kaldu pedas', 18000),
(7, 2, 'https://media.istockphoto.com/id/1065027752/photo/home-made-indonesia-meatballs.jpg?b=1&s=170667a&w=0&k=20&c=QeWfBpU_yF1XpINEi_mxSigUuQ-TQIuV-u6ovhC0Pck=', 'Bakso Urat', 'Bakso besar berurat daging sapi enak', 20000),
(8, 3, 'images/pexels-pixabay-33129.jpg', 'Pop Corn', 'Pop corn enak banget', 15000),
(9, 3, 'images/pexels-alexander-grey-1407346.jpg', 'Donat mesis', 'Enak pokoknya dan halal', 25000),
(10, 3, 'images/pexels-pixabay-36756.jpg', 'Tahu Modern', 'Tahu isi nya modern kekinian', 30000),
(11, 18, 'https://images.pexels.com/photos/60616/fried-chicken-chicken-fried-crunchy-60616.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Ayam goreng 2', 'Ayam goreng deh', 10000),
(12, 18, 'https://images.pexels.com/photos/2232433/pexels-photo-2232433.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Ayam goreng 3', 'Enak pokoknya', 40000),
(13, 18, 'https://images.pexels.com/photos/96974/pexels-photo-96974.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Orange Juice', 'Seger banget', 10000),
(14, 19, 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Ayam Vanila 2', 'Ayam Vanila 2 enak', 30000),
(15, 19, 'https://images.pexels.com/photos/1624487/pexels-photo-1624487.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Ayam rasa strawberry', 'Enak banget', 29000),
(16, 19, 'https://images.pexels.com/photos/1633578/pexels-photo-1633578.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Burger Big', 'Ukurannya Gede', 30000),
(17, 2, 'https://images.pexels.com/photos/1279330/pexels-photo-1279330.jpeg?auto=compress&cs=tinysrgb&w=1600', 'Spageti', 'spageti panjang', 30000),
(18, 2, 'https://images.pexels.com/photos/1640772/pexels-photo-1640772.jpeg?auto=compress&cs=tinysrgb&w=1600', 'salad sehat', 'sehat banget', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `MsRole`
--

CREATE TABLE `MsRole` (
  `RoleID` int(11) NOT NULL,
  `RoleType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MsRole`
--

INSERT INTO `MsRole` (`RoleID`, `RoleType`) VALUES
(1, 'Admin'),
(2, 'Tenant'),
(3, 'Customer');

-- --------------------------------------------------------

--
-- Table structure for table `MsTenant`
--

CREATE TABLE `MsTenant` (
  `TenantID` int(11) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `RoleID` int(11) NOT NULL DEFAULT 2,
  `TenantName` varchar(255) NOT NULL,
  `TenantRating` int(11) NOT NULL,
  `TenantCategory` varchar(255) NOT NULL,
  `TenantIMG` varchar(255) NOT NULL,
  `TenantEmail` varchar(255) NOT NULL,
  `TenantPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MsTenant`
--

INSERT INTO `MsTenant` (`TenantID`, `CategoryID`, `RoleID`, `TenantName`, `TenantRating`, `TenantCategory`, `TenantIMG`, `TenantEmail`, `TenantPassword`) VALUES
(1, 1, 2, 'Bakmi Enak', 5, 'Makanan', 'https://www.nibble.id/uploads/bakmi-di-jakarta-01.jpg', 'bakmienak@unistore.com', 'bakmienak123'),
(2, 1, 2, 'Bakso Pak Jali', 4, 'Makanan', 'https://media.istockphoto.com/id/1438134301/id/foto/batagor-kuah-indonesian-traditional-food.jpg?s=612x612&w=0&k=20&c=K9mKJSdy10mTYcaxSZe8ZTz7L0N7Zz2G7uJLDDEthFM=', 'baksojali@unistore.com', 'baksojali123'),
(3, 3, 2, 'Warung Jajan', 5, 'Snack', 'https://media.istockphoto.com/id/1392560322/photo/three-various-snacks-market-indonesian-traditional-snack-for-tea-time-putu-ayu-cake-wajik-and.jpg?b=1&s=170667a&w=0&k=20&c=64-VxnAWuju6eUAIsecQcUNis6P4yu0EfvNQ6v7IiMY=', 'warungjajan@unistore.com', 'warungjajan123'),
(18, 1, 2, 'Bebek Goreng Penyet', 0, 'Makanan', 'images/pexels-polina-tankilevitch-5848594.jpg', 'babihalal@unistore.com', 'hqlsw338'),
(19, 2, 2, 'Ayam Vanila', 0, 'Minuman', 'images/pexels-meraj-kazi-11299743.jpg', 'ayamvanila@unistore.com', 'lfqyd241');

-- --------------------------------------------------------

--
-- Table structure for table `MsTenantCategory`
--

CREATE TABLE `MsTenantCategory` (
  `CategoryId` int(10) NOT NULL,
  `CategoryName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `MsTenantCategory`
--

INSERT INTO `MsTenantCategory` (`CategoryId`, `CategoryName`) VALUES
(1, 'Makanan'),
(2, 'Minuman'),
(3, 'Snack');

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `id` int(11) NOT NULL,
  `TenantName` varchar(255) NOT NULL,
  `TenantEmail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `TransactionDetail`
--

CREATE TABLE `TransactionDetail` (
  `OrderID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `TransactionHeader`
--

CREATE TABLE `TransactionHeader` (
  `OrderID` int(11) NOT NULL,
  `TenantID` int(11) NOT NULL,
  `CustomerID` int(11) NOT NULL,
  `CustomerAddress` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `TransactionHeader`
--

INSERT INTO `TransactionHeader` (`OrderID`, `TenantID`, `CustomerID`, `CustomerAddress`) VALUES
(3, 1, 9, ''),
(4, 2, 19, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `TenantID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `TenantName` varchar(255) NOT NULL,
  `TenantRating` int(10) NOT NULL,
  `TenantCategory` varchar(255) NOT NULL,
  `TenantIMG` varchar(255) NOT NULL,
  `TenantEmail` varchar(255) NOT NULL,
  `TenantPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`TenantID`, `CategoryID`, `TenantName`, `TenantRating`, `TenantCategory`, `TenantIMG`, `TenantEmail`, `TenantPassword`) VALUES
(1, 0, 'czcczz', 0, 'Makanan', 'images/PNG image.png', 'raefanfadila@gmail.com', 'kdcnd094'),
(2, 0, 'czzc', 0, 'Snack', 'images/PNG image.png', 'raefanfadila@gmail.com', 'lrkfh476'),
(3, 0, 'zcczc', 1, 'Makanan', 'images/PNG image.png', 'raefanfadila@gmail.com', 'nrklg301'),
(4, 0, 'jahjsahj', 1, 'Makanan', 'images/PNG image.png', 'raefandyf@gmail.com', 'kqlxe731');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `AllUser`
--
ALTER TABLE `AllUser`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `Cart`
--
ALTER TABLE `Cart`
  ADD PRIMARY KEY (`CartID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `TenantID` (`TenantID`);

--
-- Indexes for table `MsAdmin`
--
ALTER TABLE `MsAdmin`
  ADD PRIMARY KEY (`AdminID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `MsCustomer`
--
ALTER TABLE `MsCustomer`
  ADD PRIMARY KEY (`CustomerID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `MsProduct`
--
ALTER TABLE `MsProduct`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `TenantID` (`TenantID`);

--
-- Indexes for table `MsRole`
--
ALTER TABLE `MsRole`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `MsTenant`
--
ALTER TABLE `MsTenant`
  ADD PRIMARY KEY (`TenantID`),
  ADD UNIQUE KEY `Email` (`TenantEmail`),
  ADD KEY `CategoryID` (`CategoryID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `MsTenantCategory`
--
ALTER TABLE `MsTenantCategory`
  ADD PRIMARY KEY (`CategoryId`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `TransactionDetail`
--
ALTER TABLE `TransactionDetail`
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `ProductID` (`ProductID`);

--
-- Indexes for table `TransactionHeader`
--
ALTER TABLE `TransactionHeader`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`),
  ADD KEY `TenantID` (`TenantID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`TenantID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `AllUser`
--
ALTER TABLE `AllUser`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `Cart`
--
ALTER TABLE `Cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `MsAdmin`
--
ALTER TABLE `MsAdmin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `MsCustomer`
--
ALTER TABLE `MsCustomer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `MsProduct`
--
ALTER TABLE `MsProduct`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `MsRole`
--
ALTER TABLE `MsRole`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `MsTenant`
--
ALTER TABLE `MsTenant`
  MODIFY `TenantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `MsTenantCategory`
--
ALTER TABLE `MsTenantCategory`
  MODIFY `CategoryId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `TransactionHeader`
--
ALTER TABLE `TransactionHeader`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `TenantID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `AllUser`
--
ALTER TABLE `AllUser`
  ADD CONSTRAINT `alluser_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `MsRole` (`RoleID`);

--
-- Constraints for table `Cart`
--
ALTER TABLE `Cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `MsCustomer` (`CustomerID`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `MsProduct` (`ProductID`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`TenantID`) REFERENCES `MsTenant` (`TenantID`);

--
-- Constraints for table `MsAdmin`
--
ALTER TABLE `MsAdmin`
  ADD CONSTRAINT `msadmin_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `MsRole` (`RoleID`);

--
-- Constraints for table `MsCustomer`
--
ALTER TABLE `MsCustomer`
  ADD CONSTRAINT `mscustomer_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `MsRole` (`RoleID`);

--
-- Constraints for table `MsProduct`
--
ALTER TABLE `MsProduct`
  ADD CONSTRAINT `msproduct_ibfk_1` FOREIGN KEY (`TenantID`) REFERENCES `MsTenant` (`TenantID`);

--
-- Constraints for table `MsTenant`
--
ALTER TABLE `MsTenant`
  ADD CONSTRAINT `mstenant_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `MsTenantCategory` (`CategoryId`),
  ADD CONSTRAINT `mstenant_ibfk_2` FOREIGN KEY (`RoleID`) REFERENCES `MsRole` (`RoleID`);

--
-- Constraints for table `TransactionDetail`
--
ALTER TABLE `TransactionDetail`
  ADD CONSTRAINT `transactiondetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `TransactionHeader` (`OrderID`),
  ADD CONSTRAINT `transactiondetail_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `MsProduct` (`ProductID`);

--
-- Constraints for table `TransactionHeader`
--
ALTER TABLE `TransactionHeader`
  ADD CONSTRAINT `transactionheader_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `MsCustomer` (`CustomerID`),
  ADD CONSTRAINT `transactionheader_ibfk_2` FOREIGN KEY (`TenantID`) REFERENCES `MsTenant` (`TenantID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
