-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2025 at 04:12 PM
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
-- Database: `churches`
--

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` int(11) NOT NULL,
  `donation_amount` decimal(10,2) NOT NULL,
  `donation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `donation_amount`, `donation_date`) VALUES
(1, 12580.00, '2025-02-01'),
(2, 10890.00, '2025-01-01'),
(3, 9850.00, '2024-12-01'),
(4, 11300.00, '2024-11-01'),
(5, 8900.00, '2024-10-01'),
(6, 10250.00, '2024-09-01'),
(7, 9700.00, '2024-08-01'),
(8, 8500.00, '2024-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `message`, `submitted_at`) VALUES
(1, 'Rodgers Muriuki', 'tedcornelius7@gmail.com', 'k', '2025-03-20 12:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `memory_verses`
--

CREATE TABLE `memory_verses` (
  `id` int(11) NOT NULL,
  `verse` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `memory_verses`
--

INSERT INTO `memory_verses` (`id`, `verse`, `created_at`) VALUES
(1, 'For I know the plans I have for you, declares the Lord - Jeremiah 29:11', '2025-03-20 12:19:58'),
(2, 'The Lord is my shepherd, I lack nothing - Psalm 23:1', '2025-03-20 12:19:58'),
(3, 'Trust in the Lord with all your heart - Proverbs 3:5', '2025-03-20 12:19:58'),
(4, 'I can do all things through Christ who strengthens me - Philippians 4:13', '2025-03-20 12:19:58'),
(5, 'Be strong and courageous. Do not be afraid; do not be discouraged - Joshua 1:9', '2025-03-20 12:19:58'),
(6, 'Cast all your anxiety on Him because He cares for you - 1 Peter 5:7', '2025-03-20 12:19:58'),
(7, 'Do everything in love - 1 Corinthians 16:14', '2025-03-20 12:19:58'),
(8, 'Come to me, all you who are weary and burdened, and I will give you rest - Matthew 11:28', '2025-03-20 12:19:58'),
(9, 'The Lord is my light and my salvation—whom shall I fear? - Psalm 27:1', '2025-03-20 12:19:58'),
(10, 'With God all things are possible - Matthew 19:26', '2025-03-20 12:19:58'),
(11, 'In all your ways acknowledge Him, and He will make your paths straight - Proverbs 3:6', '2025-03-20 12:19:58'),
(12, 'But those who hope in the Lord will renew their strength - Isaiah 40:31', '2025-03-20 12:19:58'),
(13, 'The steadfast love of the Lord never ceases - Lamentations 3:22', '2025-03-20 12:19:58'),
(14, 'A friend loves at all times - Proverbs 17:17', '2025-03-20 12:19:58'),
(15, 'We love because He first loved us - 1 John 4:19', '2025-03-20 12:19:58'),
(16, 'You will seek me and find me when you seek me with all your heart - Jeremiah 29:13', '2025-03-20 12:19:58'),
(17, 'Do not be anxious about anything - Philippians 4:6', '2025-03-20 12:19:58'),
(18, 'For God so loved the world that He gave His one and only Son - John 3:16', '2025-03-20 12:19:58'),
(19, 'The Lord is good, a refuge in times of trouble - Nahum 1:7', '2025-03-20 12:19:58'),
(20, 'Give thanks to the Lord, for He is good; His love endures forever - Psalm 107:1', '2025-03-20 12:19:58'),
(21, 'The joy of the Lord is your strength - Nehemiah 8:10', '2025-03-20 12:19:58'),
(22, 'If God is for us, who can be against us? - Romans 8:31', '2025-03-20 12:19:58'),
(23, 'For the wages of sin is death, but the gift of God is eternal life - Romans 6:23', '2025-03-20 12:19:58'),
(24, 'God is our refuge and strength, an ever-present help in trouble - Psalm 46:1', '2025-03-20 12:19:58'),
(25, 'I am the way and the truth and the life - John 14:6', '2025-03-20 12:19:58'),
(26, 'The Lord bless you and keep you - Numbers 6:24', '2025-03-20 12:19:58'),
(27, 'Let everything that has breath praise the Lord - Psalm 150:6', '2025-03-20 12:19:58'),
(28, 'Commit to the Lord whatever you do, and He will establish your plans - Proverbs 16:3', '2025-03-20 12:19:58'),
(29, 'Blessed are the peacemakers, for they will be called children of God - Matthew 5:9', '2025-03-20 12:19:58'),
(30, 'Fear not, for I am with you - Isaiah 41:10', '2025-03-20 12:19:58'),
(31, 'But seek first His kingdom and His righteousness - Matthew 6:33', '2025-03-20 12:19:58'),
(32, 'Give thanks in all circumstances - 1 Thessalonians 5:18', '2025-03-20 12:19:58'),
(33, 'This is the day that the Lord has made; let us rejoice and be glad in it - Psalm 118:24', '2025-03-20 12:19:58'),
(34, 'Faith comes from hearing, and hearing through the word of Christ - Romans 10:17', '2025-03-20 12:19:58'),
(35, 'You are the light of the world - Matthew 5:14', '2025-03-20 12:19:58'),
(36, 'He must become greater; I must become less - John 3:30', '2025-03-20 12:19:58'),
(37, 'The Lord is near to all who call on Him - Psalm 145:18', '2025-03-20 12:19:58'),
(38, 'Teach us to number our days, that we may gain a heart of wisdom - Psalm 90:12', '2025-03-20 12:19:58'),
(39, 'Rejoice in the Lord always. I will say it again: Rejoice! - Philippians 4:4', '2025-03-20 12:19:58'),
(40, 'For where two or three gather in my name, there am I with them - Matthew 18:20', '2025-03-20 12:19:58'),
(41, 'Do not store up for yourselves treasures on earth - Matthew 6:19', '2025-03-20 12:19:58'),
(42, 'Do not let your hearts be troubled - John 14:1', '2025-03-20 12:19:58'),
(43, 'Be kind and compassionate to one another - Ephesians 4:32', '2025-03-20 12:19:58'),
(44, 'Therefore encourage one another and build each other up - 1 Thessalonians 5:11', '2025-03-20 12:19:58'),
(45, 'For the Lord watches over the way of the righteous - Psalm 1:6', '2025-03-20 12:19:58'),
(46, 'The name of the Lord is a strong tower - Proverbs 18:10', '2025-03-20 12:19:58'),
(47, 'I praise you because I am fearfully and wonderfully made - Psalm 139:14', '2025-03-20 12:19:58'),
(48, 'Let us love not with words or speech but with actions and in truth - 1 John 3:18', '2025-03-20 12:19:58'),
(49, 'Be still, and know that I am God - Psalm 46:10', '2025-03-20 12:19:58'),
(50, 'Trust in the Lord forever - Isaiah 26:4', '2025-03-20 12:19:58'),
(51, 'For nothing will be impossible with God - Luke 1:37', '2025-03-20 12:19:58'),
(52, 'The Lord is my rock, my fortress and my deliverer - Psalm 18:2', '2025-03-20 12:19:58'),
(53, 'But God demonstrates His own love for us in this - Romans 5:8', '2025-03-20 12:19:58'),
(54, 'My grace is sufficient for you - 2 Corinthians 12:9', '2025-03-20 12:19:58'),
(55, 'Come near to God and He will come near to you - James 4:8', '2025-03-20 12:19:58'),
(56, 'Love the Lord your God with all your heart - Matthew 22:37', '2025-03-20 12:19:58'),
(57, 'He gives strength to the weary and increases the power of the weak - Isaiah 40:29', '2025-03-20 12:19:58'),
(58, 'May the Lord give strength to His people - Psalm 29:11', '2025-03-20 12:19:58'),
(59, 'Do not conform to the pattern of this world - Romans 12:2', '2025-03-20 12:19:58'),
(60, 'Love your neighbor as yourself - Mark 12:31', '2025-03-20 12:19:58'),
(61, 'The Lord is righteous in all His ways - Psalm 145:17', '2025-03-20 12:19:58'),
(62, 'Blessed is the one who perseveres under trial - James 1:12', '2025-03-20 12:19:58'),
(63, 'Whatever you do, do it all for the glory of God - 1 Corinthians 10:31', '2025-03-20 12:19:58'),
(64, 'Your word is a lamp to my feet and a light to my path - Psalm 119:105', '2025-03-20 12:19:58'),
(65, 'Come to me, all you who are weary, and I will give you rest - Matthew 11:28', '2025-03-20 12:19:58'),
(66, 'He heals the brokenhearted and binds up their wounds - Psalm 147:3', '2025-03-20 12:19:58'),
(67, 'Let us not love with words or speech but with actions - 1 John 3:18', '2025-03-20 12:19:58'),
(68, 'The Lord is my strength and my song - Exodus 15:2', '2025-03-20 12:19:58'),
(69, 'Give, and it will be given to you - Luke 6:38', '2025-03-20 12:19:58'),
(70, 'The fear of the Lord is the beginning of wisdom - Proverbs 9:10', '2025-03-20 12:19:58'),
(71, 'Blessed are the poor in spirit, for theirs is the kingdom of heaven - Matthew 5:3', '2025-03-20 12:19:58'),
(72, 'You are my hiding place; you will protect me from trouble - Psalm 32:7', '2025-03-20 12:19:58'),
(73, 'May the God of hope fill you with all joy and peace - Romans 15:13', '2025-03-20 12:19:58'),
(74, 'For the Lord takes delight in His people - Psalm 149:4', '2025-03-20 12:19:58'),
(75, 'The fruit of the Spirit is love, joy, peace, patience - Galatians 5:22', '2025-03-20 12:19:58'),
(76, 'He who began a good work in you will carry it on to completion - Philippians 1:6', '2025-03-20 12:19:58'),
(77, 'For you created my inmost being; you knit me together in my mother’s womb - Psalm 139:13', '2025-03-20 12:19:58'),
(78, 'Do not be overcome by evil, but overcome evil with good - Romans 12:21', '2025-03-20 12:19:58'),
(79, 'He will cover you with His feathers, and under His wings you will find refuge - Psalm 91:4', '2025-03-20 12:19:58'),
(80, 'Be on your guard; stand firm in the faith; be courageous - 1 Corinthians 16:13', '2025-03-20 12:19:58');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(11) NOT NULL,
  `resource_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `uploaded_by` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`id`, `resource_name`, `description`, `uploaded_by`, `phone`, `image`, `upload_date`) VALUES
(3, 'bus', '44-seater', 'church', '+00045261929', 'uploads/bus1.jpeg', '2025-03-20 14:47:50'),
(4, 'bus', 'supermetro', 'church', '+00045261929', 'uploads/bus3.jpeg', '2025-03-20 14:48:38'),
(5, 'bus', '33-seater', 'church', '+00045261929', 'uploads/bus5.jpeg', '2025-03-20 14:49:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `firstName`, `lastName`, `email`, `password`, `created_at`) VALUES
(1, 'ted', 'kimemia', 'tedcornelius7@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2025-03-20 12:56:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memory_verses`
--
ALTER TABLE `memory_verses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `memory_verses`
--
ALTER TABLE `memory_verses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
