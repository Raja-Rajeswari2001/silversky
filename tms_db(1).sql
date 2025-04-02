-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2025 at 07:26 PM
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
-- Database: `tms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(15) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `persons` int(11) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone`, `booking_date`, `booking_time`, `destination`, `persons`, `category`, `message`) VALUES
(1, 'John Doe', 'john.doe@example.com', '9876543210', '2025-04-05', '10:00:00', 'New York', 2, 'Business', 'Looking forward to my trip!'),
(2, 'Jane Smith', 'jane.smith@example.com', '8765432109', '2025-04-06', '12:30:00', 'Los Angeles', 4, 'Family', 'Need a comfortable ride for my family.'),
(3, 'Michael Johnson', 'michael.johnson@example.com', '7654321098', '2025-04-07', '15:00:00', 'Chicago', 1, 'Solo', 'Excited for my solo adventure!'),
(4, 'Emily Davis', 'emily.davis@example.com', '6543210987', '2025-04-08', '09:00:00', 'Miami', 3, 'Vacation', 'Please arrange for a beachfront hotel.'),
(5, 'Robert Brown', 'robert.brown@example.com', '5432109876', '2025-04-09', '14:00:00', 'San Francisco', 2, 'Honeymoon', 'Special arrangements requested for honeymoon trip.');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `subject`, `message`, `created_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', 'Product Inquiry', 'I would like to know more about your product.', '2025-04-02 05:00:00'),
(2, 'Jane Smith', 'jane.smith@example.com', 'Support Request', 'I am facing an issue with my account.', '2025-04-02 05:30:00'),
(3, 'Michael Johnson', 'michael.johnson@example.com', 'Feedback', 'Great service! Keep it up.', '2025-04-02 06:00:00'),
(4, 'Emily Davis', 'emily.davis@example.com', 'Billing Issue', 'There is an error in my latest bill.', '2025-04-02 06:30:00'),
(5, 'Robert Brown', 'robert.brown@example.com', 'General Inquiry', 'Do you offer international shipping?', '2025-04-02 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '4ff398ecdaff7e1d8e526ed9faedda54', '2025-03-01 09:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `comment` text NOT NULL,
  `registration_date` date NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending; 1=Confirmed; 2=Cancelled',
  `cancelled_by` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=User; 2=Admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `user_id`, `package_id`, `from_date`, `to_date`, `comment`, `registration_date`, `status`, `cancelled_by`, `created_at`) VALUES
(1, 1, 5001, '2025-05-01', '2025-05-07', 'Looking forward to the trip.', '2025-04-01', 0, 0, '2025-04-02 13:31:25'),
(2, 102, 5002, '2025-05-10', '2025-05-15', 'Honeymoon package.', '2025-04-02', 1, 0, '2025-04-02 05:00:00'),
(3, 103, 5003, '2025-06-01', '2025-06-07', 'Family vacation.', '2025-04-03', 2, 1, '2025-04-02 05:30:00'),
(4, 104, 5004, '2025-07-15', '2025-07-20', 'Business trip.', '2025-04-04', 0, 0, '2025-04-02 06:00:00'),
(5, 105, 5005, '2025-08-05', '2025-08-12', 'Adventure package.', '2025-04-05', 2, 2, '2025-04-02 06:30:00'),
(6, 3, 1, '2025-04-01', '2025-04-30', 'Hai', '2025-04-02', 1, 0, '2025-04-02 13:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_packagetype`
--

CREATE TABLE `tbl_packagetype` (
  `id` int(11) NOT NULL,
  `package_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_packagetype`
--

INSERT INTO `tbl_packagetype` (`id`, `package_type`, `created_at`) VALUES
(1, 'Corporates', '2025-02-13 03:30:13'),
(2, 'Family', '2025-02-14 03:30:32'),
(3, 'School/Colleges', '2025-01-25 03:30:43'),
(4, 'Couple', '2025-06-30 03:30:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribe`
--

CREATE TABLE `tbl_subscribe` (
  `id` int(11) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tourpackage`
--

CREATE TABLE `tbl_tourpackage` (
  `id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_type` smallint(6) NOT NULL,
  `package_location` varchar(255) NOT NULL,
  `package_price` int(11) NOT NULL,
  `package_details` text NOT NULL,
  `package_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tourpackage`
--

INSERT INTO `tbl_tourpackage` (`id`, `package_name`, `package_type`, `package_location`, `package_price`, `package_details`, `package_image`, `created_at`) VALUES
(1, 'Mesmerising Manali Package', 1, 'Manali', 1000, 'Explore the vibrant city of Bangkok, visit the Grand Palace & Wat Arun.\n✅ Enjoy the nightlife and beaches of Pattaya, including Coral Island.', 'img1.jpg', '2025-04-02 17:15:24'),
(2, 'Stunning Kashmir Holiday Experience', 1, 'Kashmir', 12000, 'Experience the Alcazar Cabaret Show and floating market.\n✅ Daily breakfast, sightseeing tours, and airport transfers included.', 'img2.jpg', '2025-04-02 17:15:32'),
(3, 'Amazing Ladakh with Nurba Valley', 1, 'Leh Ladakh', 11000, 'Relax at Bali’s stunning beaches - Kuta, Seminyak & Nusa Dua.\n✅ Visit Tanah Lot Temple, Ubud, and the famous Bali Swing.', 'img3.jpg', '2025-04-02 17:15:41'),
(4, 'Munnar', 1, 'Chennai', 2000, 'Famous for tea plantations, waterfalls, and viewpoints.\r\n\r\nMust-visit places: Eravikulam National Park, Mattupetty Dam, Anamudi Peak.', 'img4.jpg', '2025-04-02 06:55:35'),
(5, 'Kerala Backwater Tour', 1, 'Alleppey, Kerala', 7500, 'Experience the serene beauty of Kerala backwaters on a houseboat in Alleppey. Enjoy traditional cuisine and breathtaking landscapes.', 'img7.jpg', '2025-04-02 07:20:14'),
(6, 'Munnar Hill Station Trip', 1, 'Munnar, Kerala', 8500, 'Explore the misty hills of Munnar with lush tea plantations, waterfalls, and breathtaking viewpoints. Ideal for nature lovers.', 'img8.jpg', '2025-04-02 07:20:25'),
(7, 'Kovalam Beach Vacation', 1, 'Kovalam, Kerala', 6800, 'Relax on the golden beaches of Kovalam, experience thrilling water sports, and witness stunning sunsets over the Arabian Sea.', 'img9.jpg', '2025-04-02 07:20:32'),
(11, 'Thailand - Bangkok & Pattaya', 1, 'Bangkok & Pattaya', 49000, '4 Nights & 5 Days Package   Visit Marina Bay Sands, Gardens by the Bay & Sentosa Island.\n✅ Experience Universal Studios with thrilling rides & shows.', 'img1.jpg', '2025-04-02 17:16:16'),
(12, 'Thailand - Changmai & Changrai', 1, 'Changmai & Changrai', 59000, '5 Days ANA Package', 'img1.jpg', '2025-04-02 17:11:22'),
(13, 'Thailand - Phuket & Krabi', 1, 'Phuket & Krabi', 64000, 'UNASD Package', 'img1.jpg', '2025-04-02 17:11:25'),
(14, 'Bali - Indonesia', 1, 'Bali', 74000, ' Explore the Langkawi Sky Bridge & Cable Car Ride.\n✅ Enjoy duty-free shopping and beach relaxation at Pantai Cenang.\n✅ Discover Kuala Lumpur’s Petronas Towers & Batu Caves.\n✅ Experience a Genting Highlands day trip with a theme park.', 'img1.jpg', '2025-04-02 17:17:31'),
(15, 'Singapore - 3N & 4D', 1, 'Singapore', 75000, ' Explore the Langkawi Sky Bridge & Cable Car Ride.\n✅ Enjoy duty-free shopping and beach relaxation at Pantai Cenang.\n✅ Discover Kuala Lumpur’s Petronas Towers & Batu Caves.\n✅ Experience a Genting Highlands day trip with a theme park.', 'img2.jpg', '2025-04-02 17:17:34'),
(16, 'Singapore - 4N & 5D', 1, 'Singapore', 85000, '4 Nights & 5 Days Package', 'img2.jpg', '2025-04-02 17:10:52'),
(17, 'Malaysia - 3N/A HD', 1, 'Malaysia', 39000, '3 Nights & Half Day Tour', 'img2.jpg', '2025-04-02 17:10:55'),
(18, 'Malaysia - Padara 4W', 1, 'Malaysia', 45000, '4 Nights Package   Visit the famous Phi Phi Islands & James Bond Island.\n✅ Relax at Ao Nang Beach and experience Krabi’s stunning islands.\n✅ Enjoy Phuket’s nightlife at Bangla Road & Patong Beach.\n✅ Snorkeling, island-hopping, and delicious Thai cuisine included.', 'img2.jpg', '2025-04-02 17:17:02'),
(19, 'Langkawi & Malacca', 1, 'Malaysia', 65000, '4 Nights & 5 Days Package   Visit the famous Phi Phi Islands & James Bond Island.\n✅ Relax at Ao Nang Beach and experience Krabi’s stunning islands.\n✅ Enjoy Phuket’s nightlife at Bangla Road & Patong Beach.\n✅ Snorkeling, island-hopping, and delicious Thai cuisine included.', 'img2.jpg', '2025-04-02 17:16:58'),
(20, 'Langkawi Special (GNS 7D)', 1, 'Langkawi', 74000, '7 Days Package   Visit the famous Phi Phi Islands & James Bond Island.\n✅ Relax at Ao Nang Beach and experience Krabi’s stunning islands.\n✅ Enjoy Phuket’s nightlife at Bangla Road & Patong Beach.\n✅ Snorkeling, island-hopping, and delicious Thai cuisine included.', 'img2.jpg', '2025-04-02 17:16:55'),
(21, 'Singapore & Malaysia', 1, 'Singapore & Malaysia', 86000, '5 Nights & 6 Days Combo Package   Visit the famous Phi Phi Islands & James Bond Island.\n✅ Relax at Ao Nang Beach and experience Krabi’s stunning islands.\n✅ Enjoy Phuket’s nightlife at Bangla Road & Patong Beach.\n✅ Snorkeling, island-hopping, and delicious Thai cuisine included.', 'img2.jpg', '2025-04-02 17:16:51');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userquery`
--

CREATE TABLE `tbl_userquery` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userquery`
--

INSERT INTO `tbl_userquery` (`id`, `name`, `emailid`, `mobile`, `subject`, `message`, `created_at`) VALUES
(1, 'John Doe', 'john.doe@example.com', '9876543210', 'Product Inquiry', 'I would like to know more about your product.', '2025-04-02 05:00:00'),
(2, 'Jane Smith', 'jane.smith@example.com', '8765432109', 'Support Request', 'I am facing an issue with my account.', '2025-04-02 05:30:00'),
(3, 'Michael Johnson', 'michael.johnson@example.com', '7654321098', 'Feedback', 'Great service! Keep it up.', '2025-04-02 06:00:00'),
(4, 'Emily Davis', 'emily.davis@example.com', '6543210987', 'Billing Issue', 'There is an error in my latest bill.', '2025-04-02 06:30:00'),
(5, 'Robert Brown', 'robert.brown@example.com', '5432109876', 'General Inquiry', 'Do you offer international shipping?', '2025-04-02 07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_userregistration`
--

CREATE TABLE `tbl_userregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registration_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_userregistration`
--

INSERT INTO `tbl_userregistration` (`id`, `name`, `emailid`, `mobile`, `password`, `registration_date`, `created_at`) VALUES
(2, 'Rashmika', 'rash@gmail.com', '7867564534', '21232f297a57a5a743894a0e4a801fc3', '2025-04-01', '2025-04-01 06:46:29'),
(3, 'Raja Suresh', 'raji@gmail.com', '7867564534', '4c70f58a64b89d508158c5ef5fe5af9c', '2025-04-02', '2025-04-02 06:19:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_packagetype`
--
ALTER TABLE `tbl_packagetype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tourpackage`
--
ALTER TABLE `tbl_tourpackage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userquery`
--
ALTER TABLE `tbl_userquery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_userregistration`
--
ALTER TABLE `tbl_userregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_packagetype`
--
ALTER TABLE `tbl_packagetype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_subscribe`
--
ALTER TABLE `tbl_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tourpackage`
--
ALTER TABLE `tbl_tourpackage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_userquery`
--
ALTER TABLE `tbl_userquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_userregistration`
--
ALTER TABLE `tbl_userregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
