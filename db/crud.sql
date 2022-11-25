-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2022 at 02:42 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_security`
--

CREATE TABLE IF NOT EXISTS `admin_security` (
  `Id` int(11) NOT NULL,
  `User_name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Date` DATETIME NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_security`
--



-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `Blog_id` int(11) NOT NULL,
  `Date` DATETIME  NOT NULL DEFAULT current_timestamp(),
  `Author` varchar(255) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Article` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`Blog_id`, `Date`, `Author`, `Title`, `Article`) VALUES
(13, '2022-11-18', 'Abubeker Abdu', 'Do you think your password is secure?', 'Have you wonder how much your password is secured? Those passwords that you are using for your emails , your social media accounts even those hardware you are using in your hand have passwords that it asks you to enter when setting up. And most people think they set up the best, secured and unforgettable password  while is an easy to crack.<br />\r\n<br />\r\nStatistics shows that **59%** users use their **name** or **birthdate** in their password. Even if people are smart enough not to use the popular passwords like ***“123456”***, ***“password”*** or  “***qwerty”***,  majority of users polled by Google have included easily discoverable personal information in their passwords such as their name or birthdate. Other common names which include  the names of pets, spouses, or children.<br />\r\n<br />\r\nHave you ever wonder why some websites gives you an error of short password when signing up? why would the length matter if you have a short and unique password? Every additional character you add in your password increases the strength of your password and makes it difficult to crack.<br />\r\n<br />\r\nIn order to keep those ugly photos you take with your selfie or the text you send for your crush from revealing, consider this must do practices and make your password strong.<br />\r\n<br />\r\n**Use different passwords for different accounts:-** This may seem difficult to manage but have faith in your brain it will remember all your passwords . . . .am just kidding if you have a shitty memory like me you can use trusted password managers to keep all your passwords and it will do all the work of remembering your login details for that  website you signed up<br />\r\n<br />\r\n**Increase your password length:-** why are you making your password easy to crack for that hacker?  The longer your password the harder it is to crack. But not alone, with the aid of other tips.<br />\r\n<br />\r\n**Don’t Use Dictionary Words:-** dictionary words are easy to guess if you used the common and single ones. But if you have to use dictionary words use some random connected words and make a phrase. <br />\r\n<br />\r\n********Use Special characters:-********  most people don’t consider adding special characters, Special characters are the ones that you found on the top of your keyboard. There are around 32 special characters you can use in your password. Including those characters will add an enormous amount of different passwords'),
(15, '2022-11-21', 'James Bridle', 'Something is wrong on the internet', 'As someone who grew up on the internet, I credit it as one of the most important influences on who I am today. I had a computer with internet access in my bedroom from the age of 13. It gave me access to a lot of things which were totally inappropriate for a young teenager, but it was OK. The culture, politics, and interpersonal relationships which I consider to be central to my identity were shaped by the internet, in ways that I have always considered to be beneficial to me personally. I have always been a critical proponent of the internet and everything it has brought, and broadly considered it to be emancipatory and beneficial. I state this at the outset because thinking through the implications of the problem I am going to describe troubles my own assumptions and prejudices in significant ways.<br />\r\n<br />\r\nOne of the thus-far hypothetical questions I ask myself frequently is how I would feel about my own children having the same kind of access to the internet today. And I find the question increasingly difficult to answer. I understand that this is a natural evolution of attitudes which happens with age, and at some point this question might be a lot less hypothetical. I don’t want to be a hypocrite about it. I would want my kids to have the same opportunities to explore and grow and express themselves as I did. I would like them to have that choice. And this belief broadens into attitudes about the role of the internet in public life as whole.<br />\r\n<br />\r\nI’ve also been aware for some time of the increasingly symbiotic relationship between younger children and YouTube. I see kids engrossed in screens all the time, in pushchairs and in restaurants, and there’s always a bit of a Luddite twinge there, but I am not a parent, and I’m not making parental judgments for or on anyone else. I’ve seen family members and friend’s children plugged into Peppa Pig and nursery rhyme videos, and it makes them happy and gives everyone a break, so OK.<br />\r\n<br />\r\nBut I don’t even have kids and right now I just want to burn the whole thing down.<br />\r\n<br />\r\nSomeone or something or some combination of people and things is using YouTube to systematically frighten, traumatise, and abuse children, automatically and at scale, and it forces me to question my own beliefs about the internet, at every level. Much of what I am going to describe next has been covered elsewhere, although none of the mainstream coverage I’ve seen has really grasped the implications of what seems to be occurring.<br />\r\n<br />\r\nTo begin: Kid’s YouTube is definitely and markedly weird. I’ve been aware of its weirdness for some time. Last year, there were a number of articles posted about the Surprise Egg craze. Surprise Eggs videos depict, often at excruciating length, the process of unwrapping Kinder and other egg toys. That’s it, but kids are captivated by them. There are thousands and thousands of these videos and thousands and thousands, if not millions, of children watching them.<br />\r\n<br />\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `Blog_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_security`
--

CREATE TABLE `user_security` (
  `Id` int(6) UNSIGNED NOT NULL,
  `User_name` varchar(25) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Date` DATETIME  NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_security`
--

INSERT INTO `user_security` (`Id`, `User_name`, `Email`, `Password`, `Date`) VALUES
(1, 'Abuki', 'abubekerabdu85@gmail.com', 'A123456', '2022-11-16'),
(2, 'Abebe', 'abebe@gmail.com', 'fdb122e7c906013a9bc0cb02c436fa8a', '2022-11-16'),
(3, 'a', 'a@gmail.com', '0cc175b9c0f1b6a831c399e269772661', '2022-11-16'),
(4, 's', 's@gmail.com', '03c7c0ace395d80182db07ae2c30f034', '2022-11-22'),
(5, 'b', 'd@gmail.com', '03c7c0ace395d80182db07ae2c30f034', '2022-11-22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_security`
--
ALTER TABLE `admin_security`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`Blog_id`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD KEY `Blog_id` (`Blog_id`);

--
-- Indexes for table `user_security`
--
ALTER TABLE `user_security`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_security`
--
ALTER TABLE `admin_security`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `Blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_security`
--
ALTER TABLE `user_security`
  MODIFY `Id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`Blog_id`) REFERENCES `blog` (`Blog_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
