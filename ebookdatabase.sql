-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 07:24 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `UserName`, `Password`) VALUES
(1, 'Wajahat Mansoori', 'admin0315');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `Book_Id` int(11) NOT NULL,
  `Book_Title` varchar(50) NOT NULL,
  `Book_Category` varchar(11) NOT NULL,
  `Book_Author` varchar(50) NOT NULL,
  `Book_Image` varchar(255) NOT NULL,
  `Book_PDF` varchar(400) NOT NULL,
  `Book_Description` varchar(400) NOT NULL,
  `Book_Price` int(11) NOT NULL,
  `Book_Shipping` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`Book_Id`, `Book_Title`, `Book_Category`, `Book_Author`, `Book_Image`, `Book_PDF`, `Book_Description`, `Book_Price`, `Book_Shipping`) VALUES
(13, 'A Tale of two cities', 'Novels', 'Charles Dickens', 'BookImage/220px-WhizComicsNo02.jpg', 'PDF/Fairy Tail 530 (2017) (Digital) (danke-Empire).pdf', 'asd', 1200, 3),
(16, 'ad', 'Story Books', 'Charles Dickens', 'BookImage/61AknkYcwfL._SX258_BO1,204,203,200_.jpg', 'PDF/just-like-me_BookDash-FKB.pdf', 'asd', 1200, 2),
(17, 'Pride and Prejudice ', 'Novels', 'Janes Austen', 'BookImage/pride.jpg', 'PDF/pride_and_prejudice.pdf', 'Great novel', 1800, 2),
(18, 'Sleeping Beauty', 'Story Books', 'Anne Rice', 'BookImage/sleeping_beauty-cover-231x300.jpg', 'PDF/Sleeping_Beauty-Picture_Book-CKF-FKB-LS2.pdf', 'Good Novel', 1400, 3),
(19, 'Node Js ', 'Programming', 'Richard Haltman', 'BookImage/nodejs.jpg', 'PDF/Nodejs.pdf', 'Learn Complete Node Js in one Book', 2200, 3),
(20, 'Csharp Programming', 'Programming', 'Charles Dickens', 'BookImage/Csharp.png', 'PDF/CSharpBook.pdf', '.Net Developer', 4500, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Cart_Id` int(11) NOT NULL,
  `Cus_Name` varchar(40) NOT NULL,
  `Book_Id` int(11) NOT NULL,
  `Book_Title` varchar(255) NOT NULL,
  `Book_Price` int(11) NOT NULL,
  `Book_Image` varchar(255) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Cart_Id`, `Cus_Name`, `Book_Id`, `Book_Title`, `Book_Price`, `Book_Image`, `Quantity`) VALUES
(13, 'Tahir', 17, 'Pride and Prejudice ', 1800, 'BookImage/pride.jpg', 1),
(66, 'Usman', 17, 'Pride and Prejudice ', 1800, 'BookImage/pride.jpg', 3),
(67, 'Usman', 19, 'Node Js ', 2200, 'BookImage/nodejs.jpg', 2),
(68, 'Farhan', 20, 'Csharp Programming', 4500, 'BookImage/Csharp.png', 2),
(69, 'Farhan', 18, 'Sleeping Beauty', 1400, 'BookImage/sleeping_beauty-cover-231x300.jpg', 2),
(71, 'Ali', 17, 'Pride and Prejudice ', 1800, 'BookImage/pride.jpg', 2),
(72, 'Ali', 19, 'Node Js ', 2200, 'BookImage/nodejs.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Cat_Id` int(11) NOT NULL,
  `Cat_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Cat_Id`, `Cat_Name`) VALUES
(3, 'Novels'),
(4, 'Story Books'),
(5, 'Programming'),
(6, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Cus_Id` int(11) NOT NULL,
  `Cus_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Cus_Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Cus_Id`, `Cus_Name`, `Email`, `Pass`, `Phone`, `Cus_Address`, `City`) VALUES
(3, 'Ali', 'ali@gmail.com', 'ali0315', '03152887123', 'Nazimabad', 'Karachi'),
(4, 'Usman', 'usman@gmail.com', 'usman0315', '03425296774', 'Nazimabad', 'Karachi'),
(6, 'Asad', 'asad@gmail.com', 'asad0315', '03002467112', 'North Karachi', 'Karachi'),
(7, 'Umer', 'umer@gmail.com', 'umer0315', '03002459623', 'khayaban e Tanzeen', 'Karachi'),
(8, 'Tahir', 'tahir@gmail.com', 'tahir0315', '03013384963', 'khayaban e Baddar', 'Karachi'),
(9, 'Farhan', 'farhanAli111@gmail.com', 'farhan0315', '03122455753', 'Tauheed Commercial', 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `essaytbl`
--

CREATE TABLE `essaytbl` (
  `Essay_Id` int(11) NOT NULL,
  `Essay_Topic` varchar(255) NOT NULL,
  `Essay_Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `essaytbl`
--

INSERT INTO `essaytbl` (`Essay_Id`, `Essay_Topic`, `Essay_Description`) VALUES
(2, 'Pros & Cons of Science ', 'Write an essay on Pros and Cons of Science with at least 1500 words '),
(6, 'My Aim in Life', 'Write an essay describing your Aim in life with at least 1200 word');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `Order_Id` int(11) NOT NULL,
  `Cus_Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cus_Address` varchar(50) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Payment` varchar(50) NOT NULL,
  `Prod_Count` int(11) NOT NULL,
  `Total_Amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`Order_Id`, `Cus_Name`, `Email`, `Cus_Address`, `City`, `Payment`, `Prod_Count`, `Total_Amount`) VALUES
(1, 'Ali ', 'ali@gmail.com', 'Nazimabad', 'Karachi', '0', 3, 4800),
(8, 'Tahir', 'tahir@gmail.com', 'khayaban e Baddar', 'Karachi', 'Credit Card', 3, 8500),
(9, 'Asad', 'asad@gmail.com', 'North Karachi', 'Karachi', 'Credit Card', 1, 4500),
(10, 'Asad', 'asad@gmail.com', 'North Karachi', 'Karachi', 'Cheque', 1, 4500),
(11, 'Usman', 'usman@gmail.com', 'Nazimabad', 'Karachi', 'Credit Card', 2, 6700),
(12, 'Usman', 'usman@gmail.com', 'Nazimabad', 'Karachi', 'Credit Card', 2, 9800),
(13, 'Farhan', 'farhanali111@gmail.com', 'Tauheed Commercial', 'Karachi', 'Credit Card', 3, 14200),
(14, 'Usman', 'usman@gmail.com', 'Nazimabad', 'Karachi', 'Credit Card', 2, 9800),
(15, 'Ali', 'wajahatmansoori111@gmail.com', 'Nazimabad', 'Karachi', 'Credit Card', 2, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `Shipping_Id` int(11) NOT NULL,
  `Shipping_Charges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`Shipping_Id`, `Shipping_Charges`) VALUES
(2, 250),
(3, 400),
(4, 500);

-- --------------------------------------------------------

--
-- Table structure for table `timer`
--

CREATE TABLE `timer` (
  `ID` int(11) NOT NULL,
  `Timer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timer`
--

INSERT INTO `timer` (`ID`, `Timer`) VALUES
(1, 10800);

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_essay`
--

CREATE TABLE `uploaded_essay` (
  `Id` int(11) NOT NULL,
  `Topic` int(11) NOT NULL,
  `Essay` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploaded_essay`
--

INSERT INTO `uploaded_essay` (`Id`, `Topic`, `Essay`) VALUES
(2, 2, '../Essay/epdf.pub_the-outsider.pdf'),
(3, 2, '../Essay/epdf.pub_the-outsider.pdf'),
(6, 6, 'Essay/CSharpBook.pdf'),
(7, 6, 'Essay/GK.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`Book_Id`),
  ADD KEY `Book_Category` (`Book_Category`),
  ADD KEY `books_ibfk_1` (`Book_Shipping`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`Cart_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Cat_Id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Cus_Id`);

--
-- Indexes for table `essaytbl`
--
ALTER TABLE `essaytbl`
  ADD PRIMARY KEY (`Essay_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Order_Id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`Shipping_Id`);

--
-- Indexes for table `timer`
--
ALTER TABLE `timer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `uploaded_essay`
--
ALTER TABLE `uploaded_essay`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Topic` (`Topic`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `Book_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `Cart_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `Cat_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Cus_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `essaytbl`
--
ALTER TABLE `essaytbl`
  MODIFY `Essay_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `Order_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `Shipping_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timer`
--
ALTER TABLE `timer`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `uploaded_essay`
--
ALTER TABLE `uploaded_essay`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`Book_Shipping`) REFERENCES `shipping` (`Shipping_Id`);

--
-- Constraints for table `uploaded_essay`
--
ALTER TABLE `uploaded_essay`
  ADD CONSTRAINT `uploaded_essay_ibfk_1` FOREIGN KEY (`Topic`) REFERENCES `uploaded_essay` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
