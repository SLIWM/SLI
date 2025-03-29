-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2025 at 06:47 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sli`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `ID` int(11) NOT NULL,
  `Label` text NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `CreatedDate` date NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `UpdatedDate` date DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`ID`, `Label`, `isActive`, `CreatedDate`, `CreatedBy`, `UpdatedDate`, `UpdatedBy`, `order`) VALUES
(2, 'test', 1, '0000-00-00', 1, '0000-00-00', 1, NULL),
(3, '11', 1, '0000-00-00', 1, '0000-00-00', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `embed`
--

CREATE TABLE `embed` (
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `iframe` text NOT NULL,
  `createdDate` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `label` text NOT NULL,
  `description` text NOT NULL,
  `serviceDate` date NOT NULL,
  `title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `embed`
--

INSERT INTO `embed` (`id`, `type`, `iframe`, `createdDate`, `isActive`, `label`, `description`, `serviceDate`, `title`) VALUES
(1, 2, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/_X2zgWE3Yw4?si=6JWToXmc5jb4ztta\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" referrerpolicy=\"strict-origin-when-cross-origin\" allowfullscreen></iframe>', '2025-03-29 06:21:26', 1, '', '<p>Romans 15:1-7 (ESV),</p>\r\n\r\n<p>1 We who are strong have an obligation to bear with the failings of the weak, and not to please ourselves.&nbsp;<br />\r\n2 Let each of us please his neighbor for his good, to build him up.&nbsp;<br />\r\n3 For Christ did not please himself, but as it is written, &ldquo;The reproaches of those who reproached you fell on me.&rdquo;&nbsp;<br />\r\n4 For whatever was written in former days was written for our instruction, that through endurance and through the encouragement of the Scriptures we might have hope.&nbsp;<br />\r\n5 May the God of endurance and encouragement grant you to live in such harmony with one another, in accord with Christ Jesus,&nbsp;<br />\r\n6 that together you may with one voice glorify the God and Father of our Lord Jesus Christ.&nbsp;<br />\r\n7 Therefore welcome one another as Christ has welcomed you, for the glory of God.</p>\r\n', '2025-03-23', 'Adopt and Embrace our Community');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `Label` text NOT NULL,
  `FileName` text NOT NULL,
  `IsActive` tinyint(1) NOT NULL,
  `UploadedBy` int(11) NOT NULL,
  `UploadedDate` date NOT NULL,
  `Path` text NOT NULL,
  `Link` text DEFAULT NULL,
  `isIntegrated` tinyint(1) NOT NULL,
  `AlbumID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`ID`, `Label`, `FileName`, `IsActive`, `UploadedBy`, `UploadedDate`, `Path`, `Link`, `isIntegrated`, `AlbumID`) VALUES
(3, '05.jpg', '05.jpg', 1, 1, '2024-12-08', 'files/test/05.jpg', NULL, 0, 3),
(4, '2022-toyota-raize-12-g-cvt-first-impressions-01-1645611080.jpg', '2022-toyota-raize-12-g-cvt-first-impressions-01-1645611080.jpg', 1, 1, '2024-12-08', 'files/test/2022-toyota-raize-12-g-cvt-first-impressions-01-1645611080.jpg', NULL, 0, 3),
(5, 'Game-4k-Wallpapers-of-PC-games.jpg', 'Game-4k-Wallpapers-of-PC-games.jpg', 1, 1, '2024-12-08', 'files/test/Game-4k-Wallpapers-of-PC-games.jpg', NULL, 0, 2),
(6, 'Sep 15-30.png', 'Sep 15-30.png', 1, 1, '2024-12-08', 'files/test/Sep 15-30.png', NULL, 0, 2),
(7, '', 'Game-4k-Wallpapers-of-PC-games.jpg', 1, 1, '2025-01-29', 'files/Game-4k-Wallpapers-of-PC-games.jpg', NULL, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `Label` text NOT NULL,
  `Description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `IsActive` int(11) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Email`, `IsActive`, `Password`) VALUES
(1, 'rijanlexters', 'a@asd', 1, '$2y$10$CF4fzT/1u3QLRU.TvdD7Pucw6VEXG9D34hnpmhTqdZ3y2vsdeMEyS');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `ID` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Address` text DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE `userrole` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_created_by` (`CreatedBy`),
  ADD KEY `fk_updated_by` (`UpdatedBy`);

--
-- Indexes for table `embed`
--
ALTER TABLE `embed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_uploaded_by` (`UploadedBy`),
  ADD KEY `FK_Album` (`AlbumID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_user_details_user` (`UserID`);

--
-- Indexes for table `userrole`
--
ALTER TABLE `userrole`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_user` (`UserID`),
  ADD KEY `fk_role` (`RoleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `embed`
--
ALTER TABLE `embed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userrole`
--
ALTER TABLE `userrole`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `fk_created_by` FOREIGN KEY (`CreatedBy`) REFERENCES `user` (`ID`),
  ADD CONSTRAINT `fk_updated_by` FOREIGN KEY (`UpdatedBy`) REFERENCES `user` (`ID`);

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_Album` FOREIGN KEY (`AlbumID`) REFERENCES `album` (`ID`),
  ADD CONSTRAINT `fk_uploaded_by` FOREIGN KEY (`UploadedBy`) REFERENCES `user` (`ID`);

--
-- Constraints for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD CONSTRAINT `fk_user_details_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `userrole`
--
ALTER TABLE `userrole`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`RoleID`) REFERENCES `role` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
