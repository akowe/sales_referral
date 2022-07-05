-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 14, 2021 at 12:13 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meat247`
--

-- --------------------------------------------------------

--
-- Table structure for table `biggie`
--

CREATE TABLE `biggie` (
  `id` int(11) NOT NULL,
  `fname` varchar(600) NOT NULL,
  `email` varchar(600) NOT NULL,
  `phone_number` varchar(600) NOT NULL,
  `delivery_address` varchar(600) NOT NULL,
  `plan` varchar(600) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `agent_commission` varchar(100) NOT NULL,
  `customer_discount` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reference` varchar(600) NOT NULL,
  `paystack_status` varchar(600) NOT NULL,
  `paystack_reference_lsxpress` varchar(600) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meat_sharing`
--

CREATE TABLE `meat_sharing` (
  `id` int(11) NOT NULL,
  `cname` varchar(600) NOT NULL,
  `email` varchar(600) NOT NULL,
  `phone_number` varchar(600) NOT NULL,
  `delivery_address` varchar(600) NOT NULL,
  `plan` varchar(600) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `agent_commission` varchar(100) NOT NULL,
  `customer_discount` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reference` varchar(600) NOT NULL,
  `paystack_status` varchar(600) NOT NULL,
  `paystack_reference` varchar(600) NOT NULL,
  `agent_payment_status` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meat_sharing`
--

INSERT INTO `meat_sharing` (`id`, `cname`, `email`, `phone_number`, `delivery_address`, `plan`, `referral`, `agent_commission`, `customer_discount`, `amount`, `reference`, `paystack_status`, `paystack_reference`, `agent_payment_status`, `date`) VALUES
(3, 'Esther Akowe Eze', 'estherakowe@yahoo.com', '07033141516', '99 opebi Road Ikeja', 'Biggie', '07033141516', '962', '481', '47619', '2088927063', 'Pending', '', '', '2020-12-01 14:59:13'),
(4, 'Esther Akowe Eze', 'esther@ymail.com', '07033141516', '99 opebi', 'Mini', '07033141516', '258', '129', '12771', '1478523172', 'Success', 'T075123452264166', '', '2020-11-01 15:11:26'),
(7, 'Esther Akowe Eze', 'esther@ymail.com', '07033141516', '99 opebi', 'Biggie', '07033141516', '962', '481', '47619', '651699832', 'Success', 'T427858999669821', '', '2020-11-03 13:57:23'),
(8, 'Esther Akowe Eze', 'esther@ymail.com', '090980890898', '99 opebi Road Ikeja', 'Biggie', '09043994369', '962', '481', '47619', '1619763974', 'Success', 'T537254906431910', '', '2020-12-03 15:17:30'),
(9, 'Esther Akowe Eze', 'estherakowe@yahoo.com', '07033141516', '99 opebi Road Ikeja', 'Biggie', '09043994369', '962', '481', '47619', '1006521301', 'Success', 'T536661274737451', 'Not Paid', '2020-12-30 21:07:44'),
(10, 'Esther Akowe Eze', 'esther@ymail.com', '07033141516', '99 opebi Road Ikeja', 'Midi', '09043994369', '496', '248', '24552', '1847062794', 'Success', 'T683959493980594', 'Not Paid', '2021-01-11 15:31:39'),
(11, 'adamu', 'esther@ymail.com', '090980890898', '99', 'Mini', '', '0', '0', '12900', '508598785', 'Success', 'T814909552521456', 'Not Paid', '2021-01-11 15:33:48'),
(12, 'adamu', 'estherakowe@yahoo.com', '07033141516', '99 opebi Road Ikeja', 'Midi', '', '0', '0', '24800', '1492070984', 'Success', 'T257049209338716', 'Not Paid', '2021-01-11 15:34:54'),
(13, 'livestock247', 'admin@izeest.com', '07033141516', '99 opebi Road Ikeja', 'Biggie', '', '0', '0', '48100', '1827676759', 'Success', 'T058129306024493', 'Not Paid', '2021-01-11 15:35:52'),
(14, 'livestock247', 'estherakowe@yahoo.com', '07033141516', '99 opebi Road Ikeja', 'Mini', '', '0', '0', '12900', '367227913', 'Success', 'T464193531493930', 'Not Paid', '2021-01-11 15:36:42'),
(15, 'adamu', 'esther@ymail.com', '07033141516', '99 opebi Road Ikeja', 'Midi', '', '0', '0', '24800', '1493420414', 'Success', 'T481007336024506', 'Not Paid', '2021-01-11 15:37:29'),
(16, 'livestock247', 'esther@ymail.com', '090980890898', '99 opebi Road Ikeja', 'Mini', '', '0', '0', '12900', '956547560', 'Success', 'T806563494379077', 'Not Paid', '2021-01-11 15:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `midi`
--

CREATE TABLE `midi` (
  `id` int(11) NOT NULL,
  `fname` varchar(600) NOT NULL,
  `email` varchar(600) NOT NULL,
  `phone_number` varchar(600) NOT NULL,
  `delivery_address` varchar(600) NOT NULL,
  `plan` varchar(600) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `agent_commission` varchar(100) NOT NULL,
  `customer_discount` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reference` varchar(600) NOT NULL,
  `paystack_status` varchar(600) NOT NULL,
  `paystack_reference_lsxpress` varchar(600) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `midi`
--

INSERT INTO `midi` (`id`, `fname`, `email`, `phone_number`, `delivery_address`, `plan`, `referral`, `agent_commission`, `customer_discount`, `amount`, `reference`, `paystack_status`, `paystack_reference_lsxpress`, `date`) VALUES
(14, 'Esther Eze', 'estherakowe@yahoo.com', '07033141516', '99 opebi', 'Midi', '07033141516', '496', '248', '24552', '1362742608', 'Pending', '', '2020-11-18 09:10:34'),
(15, 'Esther Akowe Eze', 'admin@izeest.com', '07033141516', '99 opebi Road Ikeja', 'Midi', '07033141516', '496', '248', '24552', '654603676', 'Pending', '', '2020-11-18 09:56:07'),
(16, 'Esther Akowe Eze', 'esther@ymail.com', '07033141516', '99 opebi Road Ikeja', 'Midi', '07033141516', '496', '248', '24552', '1008067369', 'Success', 'T725019766049778', '2020-12-01 14:19:35');

-- --------------------------------------------------------

--
-- Table structure for table `mini`
--

CREATE TABLE `mini` (
  `id` int(11) NOT NULL,
  `fname` varchar(600) NOT NULL,
  `email` varchar(600) NOT NULL,
  `phone_number` varchar(600) NOT NULL,
  `delivery_address` varchar(600) NOT NULL,
  `plan` varchar(600) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `agent_commission` varchar(100) NOT NULL,
  `customer_discount` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `reference` varchar(600) NOT NULL,
  `paystack_status` varchar(600) NOT NULL,
  `paystack_reference_lsxpress` varchar(600) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mini`
--

INSERT INTO `mini` (`id`, `fname`, `email`, `phone_number`, `delivery_address`, `plan`, `referral`, `agent_commission`, `customer_discount`, `amount`, `reference`, `paystack_status`, `paystack_reference_lsxpress`, `date`) VALUES
(7, 'Esther Eze', 'estherakowe@yahoo.com', '07033141516', '99 opebi', 'Mini', '07033141516', '258', '129', '12771', '161910910', 'Pending', '', '2020-11-18 09:11:28'),
(8, 'Esther Eze', 'estherakowe@yahoo.com', '07033141516', '99 opebi', 'Mini', '07033141516', '258', '129', '12771', '161910910', 'Pending', '', '2020-11-18 09:14:31'),
(9, 'Esther Akowe Eze', 'estherakowe@yahoo.com', '07033141516', '99 opebi Road Ikeja', 'Mini', '07033141516', '258', '129', '12771', '1759131463', 'Success', 'T723061544766788', '2020-11-18 10:04:03'),
(10, 'esther', 'estherakowe@yahoo.com', '9789789798', 'opebi', 'Mini', '07033141516', '258', '129', '12771', '732153170', 'Pending', '', '2020-11-18 10:04:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `email` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `key` varchar(250) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `expDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`email`, `key`, `expDate`) VALUES
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f647454c1bcfe2f1', '2020-09-27 01:33:14'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745c1a71fc818', '2020-09-29 14:24:59'),
('esther.akowe@livestock247.com', 'UK4SI1oOkAcG', '0000-00-00 00:00:00'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f647450b313254b8', '2020-12-08 16:01:57'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745c54cc4ddab', '2020-12-08 16:59:28'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f6474526ef5bfd74', '2020-12-09 09:25:13'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f6474594adf53eb9', '2020-12-09 09:29:03'),
('estherakowe@yahoo.com', '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', '2020-12-15 10:12:35'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f647456839316a9d', '2020-12-15 10:13:30'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f647453c6c80148e', '2020-12-15 10:15:36'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745a2981eee38', '2020-12-15 10:16:55'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745df57182fa6', '2020-12-15 10:37:30'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745ba8bcff807', '2020-12-15 10:48:11'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f6474544e98c7362', '2020-12-15 10:56:13'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745193ead194a', '2020-12-15 11:22:53'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745513883c131', '2020-12-15 11:25:30'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f6474568e5981a35', '2020-12-15 11:30:39'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745ed1ee7c97c', '2020-12-15 11:44:34'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f6474533464c067a', '2020-12-15 12:42:13'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f6474554083299fb', '2020-12-15 12:43:42'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745016e01b808', '2020-12-15 12:46:44'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745ff705b12f4', '2020-12-15 14:20:27'),
('estherakowe@yahoo.com', '768e78024aa8fdb9b8fe87be86f64745ce65c67d72', '2020-12-15 14:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `referral` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reset_password` varchar(100) NOT NULL,
  `code` varchar(100) NOT NULL,
  `active` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(100) NOT NULL,
  `percentage` float NOT NULL,
  `user_image` longtext NOT NULL,
  `user_card` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `referral`, `address`, `user_type`, `password`, `reset_password`, `code`, `active`, `status`, `bank`, `account_name`, `account_number`, `percentage`, `user_image`, `user_card`, `date`) VALUES
(2, 'esther', 'akowe', 'esther.akowe@livestock247.com', '09043994369', '44 Igodo Road, Magboro off Lagos-Ibadan expressway', 'user', '827ccb0eea8a706c4c34a16891f84e7b', '', 'kD3lAHoz75fy', 'verified', 'Approved', 'Access', 'Bethel David', '0121190898', 2, 'b8237faecfe9ed32785d2b3893b127de.jpg', 'cbe363449f432417b94f194ca0127131.jpg', '2020-10-22 20:36:17'),
(3, 'Livestock247', 'Admin', 'admin@livestock247.com', '09062903550', '99 opebi road ikeja lagos', 'admin', '8b8d3a18b8f14a0509b62be22b215dad', '', 'bagLYr6jWEvH', 'verified', 'Admin', 'Zenith', 'Esther Akowe Omonego Eze', '0121190898', 0, '', '', '2020-10-23 04:36:14'),
(11, 'Omonego', 'Esther', 'estherakowe@yahoo.com', '07033141516', '99 Opebi Road Ikeja Lagos', 'user', 'c7ec7622a90bff8a4f08ba7f4a3dd490', 'wjXueniz2RkG', 'kBeOrdLPwuXg', 'verified', 'Approved', 'Zenith', 'Faith', '544654654', 2, '4c3a85f7000e701470182e83d4b0d9a4.jpg', '27ff88e00383068339c601deb101bfc8.jpg', '2020-11-06 17:22:04'),
(12, 'Support', 'Livestock247', 'support@livestock247.com', '090629035500', '99 opebi road ikeja lagos', 'support', '827ccb0eea8a706c4c34a16891f84e7b', '', 'RohuTlbF5KUv', 'verified', 'Admin', '', '', '', 0, '', '', '2020-12-04 10:38:37'),
(15, 'Finance', 'Livestock247', 'finance@livestock247.com', '090629035501', '99 opebi road ikeja lagos', 'finance', '827ccb0eea8a706c4c34a16891f84e7b', '', 'lJH1nrdvLGem', 'verified', 'Admin', '', '', '', 0, '', '', '2020-12-31 03:20:41'),
(16, 'Esther', 'Ify', 'estherakowe13@gmail.com', '0986565735764', '99 opebi road ikeja lagos', 'user', '827ccb0eea8a706c4c34a16891f84e7b', '', 'LPlc6IUnmKip', 'inactive', 'Pending', '', '', '', 2, '', '', '2021-01-11 16:13:45'),
(17, 'Stan', 'Ify', 'omonego@gmail.com', '070554467243', '99 opebi road ikeja lagos', 'user', '827ccb0eea8a706c4c34a16891f84e7b', '', 'O478JqDvzAST', 'inactive', 'Pending', '', '', '', 2, '', '', '2021-01-11 16:15:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biggie`
--
ALTER TABLE `biggie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meat_sharing`
--
ALTER TABLE `meat_sharing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `midi`
--
ALTER TABLE `midi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mini`
--
ALTER TABLE `mini`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`referral`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biggie`
--
ALTER TABLE `biggie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meat_sharing`
--
ALTER TABLE `meat_sharing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `midi`
--
ALTER TABLE `midi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `mini`
--
ALTER TABLE `mini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
