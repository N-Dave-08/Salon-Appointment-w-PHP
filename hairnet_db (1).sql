-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 01:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hairnet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `admin_picture` varchar(255) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `admin_picture`, `admin_name`, `admin_password`) VALUES
(1, 'profiles/people-3120717_1280.jpg', 'Big Boss', 'damn'),
(5, 'profiles/Mᴇɢᴜᴍɪ _ Png gambar, Gambar profil, Gambar animasi kartun.jpg', 'bentong', 'amazing'),
(6, '', 'admin', 'pogi'),
(7, '', 'John', 'superman');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `book_name` varchar(50) NOT NULL,
  `book_price` int(11) NOT NULL,
  `book_image` varchar(100) NOT NULL,
  `booked_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `book_date` date NOT NULL,
  `book_s_time` time(6) NOT NULL,
  `book_e_time` time(6) NOT NULL,
  `book_payment` varchar(50) NOT NULL,
  `book_transaction` varchar(50) NOT NULL,
  `book_status` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `book_name`, `book_price`, `book_image`, `booked_date`, `book_date`, `book_s_time`, `book_e_time`, `book_payment`, `book_transaction`, `book_status`, `user_id`) VALUES
(98, 'Hair Spa', 300, '../public/new_uploads/spa-4481538_1280.jpg', '2024-05-19 16:29:22', '2024-06-08', '08:00:00.000000', '09:00:00.000000', 'Cash', 'Not Paid', 'Pending', 59),
(99, 'Hair Spa', 300, '../public/new_uploads/spa-4481538_1280.jpg', '2024-05-19 16:29:43', '2024-06-07', '08:00:00.000000', '09:00:00.000000', 'Cash', 'Not Paid', 'Pending', 59),
(148, 'Haircut', 60, '../public/new_uploads/haircut.jpg', '2024-05-25 04:38:25', '2024-05-27', '08:00:00.000000', '09:00:00.000000', 'Cash', 'Not Paid', 'Pending', 57),
(149, 'Manicure', 60, '../public/new_uploads/giorgio-trovato-gb6gtiTZKB8-unsplash.jpg', '2024-05-25 04:40:52', '2024-06-07', '08:00:00.000000', '09:00:00.000000', 'Cash', 'Not Paid', 'Pending', 57),
(150, 'Pedicure', 70, '../public/new_uploads/foot-1885546_1280.jpg', '2024-05-25 04:42:58', '2024-08-28', '08:00:00.000000', '09:00:00.000000', 'Cash', 'Not Paid', 'Pending', 57),
(151, 'Pedicure', 70, '../public/new_uploads/foot-1885546_1280.jpg', '2024-05-25 11:05:34', '2024-10-31', '08:00:00.000000', '09:00:00.000000', 'Cash', 'Not Paid', 'Pending', 57);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `rating`, `review`) VALUES
(6, 57, 5, 'this is amazing'),
(10, 59, 4, 'the service is good'),
(12, 61, 5, 'THIS IS AMAZING!!');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `image`, `description`, `price`) VALUES
(23, 'Haircut', '../public/new_uploads/haircut.jpg', 'Experience a revitalizing transformation as our expert stylists meticulously craft each haircut to suit your individual style and preferences, ensuring a personalized and flawless finish.', 60),
(24, 'Manicure', '../public/new_uploads/giorgio-trovato-gb6gtiTZKB8-unsplash.jpg', 'Indulge in a pampering session as our skilled technicians expertly shape, buff, and polish your nails to perfection, leaving you with a stunning and long-lasting manicure that complements your style.', 60),
(25, 'Pedicure', '../public/new_uploads/foot-1885546_1280.jpg', 'Treat your feet to the ultimate relaxation with our luxurious pedicure service, where our attentive technicians will expertly groom, exfoliate, and moisturize your feet, leaving them feeling refreshed, rejuvenated, and ready to flaunt in style.', 70),
(26, 'Hair Spa', '../public/new_uploads/spa-4481538_1280.jpg', 'Revitalize your hair with our indulgent hair spa treatment, where luxurious hot oil is expertly massaged into your scalp and strands, nourishing and hydrating from root to tip for luscious, healthy-looking locks.', 300),
(27, 'Hair Mask', '../public/new_uploads/woman-washing-head-hairsalon-scaled.jpg', 'Restore your hair\'s vitality with our revitalizing hair mask treatment, expertly administered by our talented stylists to nourish, repair, and fortify your locks, leaving them visibly healthier and more radiant.', 100),
(29, 'Golden Mask Treatment', '../public/new_uploads/images.jpg', 'Experience luxury with our golden mask treatment, where indulgent ingredients are meticulously blended to nourish and rejuvenate your hair, leaving it radiant, silky-smooth, and infused with a golden glow.', 400),
(30, 'Hair and Make-up', '../public/new_uploads/images (2).jpg', 'Elevate your look with our professional hair and makeup services, expertly tailored to enhance your natural beauty and complement your individual style, leaving you feeling confident and glamorous for any occasion.', 500),
(31, 'Rebond with Treatment', '../public/new_uploads/images (1).jpg', 'Transform your hair with our rebonding treatment, expertly combined with a nourishing hair treatment to achieve sleek, straight strands that are smooth, shiny, and irresistibly soft to the touch.', 1500),
(33, 'Hair Color with Trim', '../public/new_uploads/images (4).jpg', 'Refresh your look with our hair color and trim service, expertly executed by our skilled stylists to revitalize your hair color and shape, leaving you with a vibrant, polished style that complements your individual beauty.', 300);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `number` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `picture`, `firstname`, `lastname`, `number`, `email`, `password`) VALUES
(57, 'profiles/fc5f288ac75d46d99a3cf1d77175504f.jpg', 'Juan', 'Dela Cruz', '09086687975', 'lesterestrada871@gmail.com', 'Juandelacruz123456'),
(58, '', 'ian', 'pogi', '09863564897', 'pogi@gmail.com', 'pogidasd'),
(59, '../public/profiles/images (5).jpg', 'Akosi', 'Dogie', '09123456789', 'this@gmail.com', 'asd'),
(60, '', 'madame', 'web', '09865899999', 'spiderman@gmail.com', 'amazingspiderman'),
(61, '', 'bruce', 'wayne', '09421555545', 'batman@gmail.com', 'dark knight');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id_ra` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `fk_user_id_ra` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
