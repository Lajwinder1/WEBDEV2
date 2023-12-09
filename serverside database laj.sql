-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 06:26 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serverside`
--

-- --------------------------------------------------------

--
-- Table structure for table `arts`
--

CREATE TABLE `arts` (
  `art_id` int(255) NOT NULL,
  `art_name` varchar(500) NOT NULL,
  `artist_name` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `arts`
--

INSERT INTO `arts` (`art_id`, `art_name`, `artist_name`, `image`, `description`) VALUES
(2, 'Mona Lisa', 'Leonardo Di Vinci', 'uploads/eric-terrade-0WQOCx1g8hw-unsplash.jpg', 'Good Picture'),
(3, 'Whistler&#039;s Mother  Painting', 'James Whistle', 'uploads/lance-anderson-SkRpJhqrodQ-unsplash.jpg', ' Arrangement in Grey and Black No. 1, best known under its colloquial name Whistler&#039;s Mother or Portrait of Artist&#039;s Mother, is a painting in oils on canvas created by the American-born painter James M&hellip;'),
(4, 'Sistine Chapel Ceiling: A Detail', 'Michelangelo', 'uploads/photo-1576016770956-debb63d92058.jfif', 'The panel showing the creation of man is probably the best-known scene in the famous fresco by Michelangelo on the ceiling the Sistine Chapel.'),
(5, 'Guernica', 'Pablo Picasso', 'uploads/wp3193113.png', 'Guernica (Spanish: [ɡeɾˈnika]; Basque: [ɡernika]) is a large 1937 oil painting by Spanish artist Pablo Picasso.[1][2] It is one of his best-known works, regarded by many art critics as the most moving and powerful anti-war painting in history.[3] It is exhibited in the Museo Reina Sof&iacute;a in Madrid.[4]'),
(6, 'The Birth of Venus', ' Sandro Botticelli,', 'uploads/Sandro_Botticelli_-_La_nascita_di_Venere_-_Google_Art_Project_-_edited.jpg', 'The Birth of Venus (Italian: Nascita di Venere [ˈnaʃʃita di ˈvɛːnere]) is a painting by the Italian artist Sandro Botticelli, probably executed in the mid 1480s. It depicts the goddess Venus arriving at the shore after her birth, when she had emerged from the sea fully-grown (called Venus Anadyomene and often depicted in art). The painting is in the Uffizi Gallery in Florence, Italy.'),
(7, 'Last Supper', 'Leonardo da Vinci', 'uploads/Detail_of_the_Da_Vinci\'s_The_Last_Supper_by_Giacomo_Raffaelli,_Vienna.jpg', '.\r\nThe Last Supper by Leonardo da Vinci - Clickable Image\r\nDepictions of the Last Supper in Christian art have been undertaken by artistic masters for centuries, Leonardo da Vinci&#039;s late-1490s mural painting in Milan, Italy, being the best-known example.[1] (Clickable image&mdash;use cursor to identify.)\r\nThe Last Supper is the final meal that, in the Gospel accounts, Jesus shared with his apostles in Jerusalem before his crucifixion.[2] The Last Supper is commemorated by Christians especia'),
(8, 'The Kiss', 'Gustav Klimt', 'uploads/The_Kiss_-_Gustav_Klimt_-_Google_Cultural_Institute.jpg', 'The Kiss (in German Der Kuss) is an oil-on-canvas painting with added gold leaf, silver and platinum by the Austrian Symbolist painter Gustav Klimt.[3] It was painted at some point in 1907 and 1908, during the height of what scholars call his &quot;Golden Period'),
(9, 'The Creation of Adam', 'Michelangelo', 'uploads/Michelangelo_-_Creation_of_Adam_(cropped).jpg', 'The Creation of Adam (Italian: Creazione di Adamo) is a fresco painting by Italian artist Michelangelo, which forms part of the Sistine Chapel&#039;s ceiling, painted c.&thinsp;1508&ndash;1512.[2] It illustrates the Biblical creation narrative from the Book of Genesis in which God gives life to Adam, the first man. The fresco is part of a complex iconographic scheme and is chronologically the fourth in the series of panels depicting episodes from Genesis.'),
(10, 'The Scream', 'Edvard Munch', 'uploads/Edvard_Munch,_1893,_The_Scream,_oil,_tempera_and_pastel_on_cardboard,_91_x_73_cm,_National_Gallery_of_Norway.jpg', 'The Scream is a composition created by Norwegian artist Edvard Munch in 1893. The Norwegian name of the piece is Skrik (Scream), and the German title under which it was first exhibited is Der Schrei der Natur (The Scream of Nature). The agonized face in the painting has become one of the most iconic images of art, seen as symbolizing the anxiety of the human condition. Munch&#039;s w'),
(11, 'Girl With a Pearl Earring', 'Johannes Vermeer', 'uploads/1665_Girl_with_a_Pearl_Earring(1).jpg', 'Girl with a Pearl Earring (Dutch: Meisje met de parel)[1][2] is an oil painting by Dutch Golden Age painter Johannes Vermeer, dated c. 1665. Going by various names over the centuries, it became known by its present title towards the end of the 20th century after the earring worn by the girl portrayed there.[3] The work has been in the collection of the Mauritshuis in The Hague since 1902 and has been the subject of various literary and cinematic treatments.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `name` varchar(255) NOT NULL,
  `email` varchar(500) NOT NULL,
  `message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(255) NOT NULL,
  `Username` varchar(250) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `role` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Username`, `Password`, `role`) VALUES
(2, 'Lajwinder', '$2y$10$c76c4m8Pi.tTdGu7cOG3kezTBdFsyw6J0lZlBm6ugVJ8o31Q1pp6m', 'admin'),
(3, 'hargun', '$2y$10$MAg.yZ2T2cLBmxSkhH5Oz.h5bdyRvCQUlRTgSpkWTQEDCjNEZJi9u', 'user'),
(4, 'Lajwinder', '$2y$10$ly4fQFpUimJGEySDjZPBveMxqinyf1sTeFiUjevPDIJ7gR2CKf4sq', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arts`
--
ALTER TABLE `arts`
  ADD PRIMARY KEY (`art_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arts`
--
ALTER TABLE `arts`
  MODIFY `art_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
