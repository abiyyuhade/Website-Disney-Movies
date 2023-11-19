-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 12:00 PM
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
-- Database: `db_disney`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `id_movies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `characters`
--

INSERT INTO `characters` (`id`, `name`, `picture`, `id_movies`) VALUES
(7, 'Ember Lumen', '65571891a4be9.png', 8),
(8, 'Wade Ripple', '655718ded5b92.png', 8),
(9, 'Bernie Lumen', '6557501e83291.png', 8),
(10, 'Cinder Lumen', '6557503244ba2.png', 8),
(11, 'Clod', '6557503f4f3cb.png', 8),
(12, 'Brook Ripple', '6557505158bdf.png', 8),
(13, 'Gale', '6557505d072f6.png', 8),
(14, 'Fern', '6557506748df1.png', 8),
(15, 'Buzz Lightyear', '65583d4b0fb65.png', 12),
(16, 'Izzy Hawthorne', '65583d5ad5e53.png', 12),
(17, 'Sox', '65583d6b3d94c.png', 12),
(18, 'Maurice “Mo” Morrison', '65583d7708491.png', 12),
(19, 'Darby Steel', '65583d860d664.png', 12),
(20, 'Zurg', '65583d8fa36ac.png', 12),
(21, 'Alisha Hawthorne', '65583d9a6ac1c.png', 12),
(22, 'Zyclops', '65583da4a9b8f.png', 12),
(23, 'Commander Burnside', '65583db08f132.png', 12),
(24, 'Airman DÍaz', '65583dbb2eaf1.png', 12),
(25, 'I.V.A.N.', '65583dc5d4a91.png', 12),
(26, 'Meilin Lee', '655840ad7940e.png', 13),
(27, 'Red Panda Mei', '655840b8480e2.png', 13),
(28, 'Ming Lee', '655840c26a648.png', 13),
(29, 'Jin Lee', '655840ccbd61b.png', 13),
(30, 'Miriam Mendelsohn', '655840d7cc42c.png', 13),
(31, 'Priya Mangal', '655840e06095b.png', 13),
(32, 'Abby Park', '655840ec115ba.png', 13),
(33, 'Tyler Nguyen-Baker', '655840f552a5d.png', 13),
(34, 'Grandma', '655840ff04aec.png', 13),
(35, 'Sun Yee', '655841083d235.png', 13),
(36, ' Luca Paguro', '655843da35329.png', 14),
(37, ' Alberto Scorfano', '655843e799a60.png', 14),
(38, 'Giulia Marcovaldo', '655843f638b76.png', 14),
(39, 'Ercole Visconti', '6558440355e80.png', 14),
(40, 'Massimo Marcovaldo', '6558440dab3ed.png', 14),
(41, 'Daniela Paguro', '65584418af0f6.png', 14),
(42, 'Lorenzo Paguro', '65584423ee4e2.png', 14),
(43, 'Grandma Paguro', '65584430881ef.png', 14),
(44, 'Uncle Ugo', '6558443d107f9.png', 14),
(45, 'Machiavelli', '6558444b38585.png', 14),
(46, 'Joe Gardner', '6559a181882b5.png', 15),
(47, '22', '6559a18d22a00.png', 15),
(48, 'Dez', '6559a19888924.png', 15),
(49, 'Dorothea Williams ', '6559a1a21f3ff.png', 15),
(50, 'Libba Gardner', '6559a1ab984e5.png', 15),
(51, 'Moonwind', '6559a1b48f286.png', 15),
(52, 'The Counselors', '6559a1beaaa9e.png', 15),
(53, 'Terry', '6559a1c9e8a36.png', 15),
(54, 'Curley', '6559a1d2aac42.png', 15),
(55, 'Miho ', '6559a1e1a5335.png', 15),
(56, 'New Souls', '6559a1eb97979.png', 15),
(57, 'Mr. Mittens', '6559a1f7d0747.png', 15),
(58, 'Lost Souls', '6559a201283ba.png', 15),
(59, 'Carl Fredricksen', '6559ae4754d5e.png', 16),
(60, 'Russell ', '6559ae57cb420.png', 16),
(61, 'Dug', '6559ae62a634b.png', 16),
(62, 'Kevin', '6559ae6ca80c5.png', 16),
(63, 'Charles F. Muntz', '6559ae76509bb.png', 16),
(64, 'Alpha Pack', '6559ae804cf53.png', 16),
(65, 'Ellie', '6559ae89b2254.png', 16),
(66, 'James P. “Sulley” Sullivan', '6559b1a7c06f8.png', 17),
(67, 'Mike Wazowski', '6559b1b5486f5.png', 17),
(68, 'Boo', '6559b1bfaa13f.png', 17),
(69, 'Randall Boggs', '6559b1ce08786.png', 17),
(70, 'Henry J. Waternoose III', '6559b1d824491.png', 17),
(71, 'Roz', '6559b1e121a22.png', 17),
(72, 'Celia', '6559b1ea4fdb0.png', 17),
(73, 'Yeti', '6559b1f648763.png', 17),
(74, 'George Sanderson', '6559b203230e6.png', 17),
(75, 'Monsters', '6559b20d462f3.png', 17),
(76, 'Child Detection Agency', '6559b2162b579.png', 17),
(77, 'Lightning McQueen', '6559b48d4623b.png', 18),
(78, 'Mater', '6559b49914e5b.png', 18),
(79, 'Sally', '6559b4a2d6d40.png', 18),
(80, 'Doc Hudson', '6559b4aedd98b.png', 18),
(81, 'Luigi & Guido', '6559b4b951bb3.png', 18),
(82, 'Fillmore', '6559b4c3f0f30.png', 18),
(83, 'Sheriff', '6559b4ce0289b.png', 18),
(84, 'Sarge', '6559b4d9d6c65.png', 18),
(85, 'Ramone', '6559b4e41cb51.png', 18),
(86, 'Flo', '6559b4ed78905.png', 18),
(87, 'Woody', '6559b7352b3fc.png', 19),
(88, 'Buzz Lightyear', '6559b741b34f9.png', 19),
(89, 'Hamm', '6559b74bc434c.png', 19),
(90, 'Mr. Potato Head', '6559b77620761.png', 19),
(91, 'Rex', '6559b7811fecf.png', 19),
(92, 'Slinky', '6559b78bd8400.png', 19),
(93, 'Sid', '6559b7966d19c.png', 19),
(94, 'Andy', '6559b7a086348.png', 19),
(95, 'Miguel', '6559b94469bc7.png', 20),
(96, 'Héctor', '6559b94e5d062.png', 20),
(97, 'Dante', '6559b959699ea.png', 20),
(98, 'Ernesto de la Cruz', '6559b9638554a.png', 20),
(99, 'Abuelita', '6559b96e03590.png', 20),
(100, 'Mamá Imelda', '6559b9820d87e.png', 20),
(101, 'Frida', '6559b98b354de.png', 20),
(102, 'Nemo', '6559bcc8e0a63.png', 21),
(103, 'Marlin', '6559bcd9c486b.png', 21),
(104, 'Dory', '6559bce785592.png', 21),
(105, 'Gill', '6559bcf1321fd.png', 21),
(106, 'Sharks', '6559bcfd41d65.png', 21),
(107, 'Turtles', '6559bd08f0b1e.png', 21),
(108, 'Nigel', '6559bd12eb97f.png', 21),
(109, 'Dentist', '6559bd208af94.png', 21),
(110, 'Darla', '6559bd28ea25e.png', 21),
(111, 'Mr.Incredible', '6559bffe5cb43.png', 22),
(112, 'Elastigirl', '6559c0085b9ef.png', 22),
(113, 'Dash', '6559c012572ed.png', 22),
(114, 'Violet', '6559c01e2c975.png', 22),
(115, 'Syndrome', '6559c02834cee.png', 22),
(116, 'Edna \"E\" Mode', '6559c034bf36a.png', 22),
(117, 'Jack-Jack', '6559c0447d7d8.png', 22),
(118, 'Frozone', '6559c04f7dd2d.png', 22),
(119, 'Mirage', '6559c058dbc9b.png', 22),
(120, 'Gilbert Huph', '6559c06440cc5.png', 22),
(121, 'Woody', '6559c30c9063a.png', 23),
(122, 'Buzz Lightyear', '6559c3332f27b.png', 23),
(123, 'Jessie', '6559c33c94526.png', 23),
(124, 'Bullseye', '6559c3473a82a.png', 23),
(125, 'Mrs. Potato Head', '6559c35059f83.png', 23),
(126, 'Weezy', '6559c35af3649.png', 23),
(127, 'The Prospector', '6559c36605883.png', 23),
(128, 'Emperor Zurg', '6559c3725c9ba.png', 23),
(129, 'Al', '6559c37ba4642.png', 23),
(130, 'Woody', '6559c5f0ef8e7.png', 24),
(131, 'Buzz Lightyear', '6559c5fabcba4.png', 24),
(132, 'Lotso', '6559c60409f39.png', 24),
(133, 'Ken', '6559c61740e98.png', 24),
(134, 'Buttercup', '6559c6214270a.png', 24),
(135, 'Dolly', '6559c62a6b229.png', 24),
(136, 'Mr. Pricklepants', '6559c634cd3aa.png', 24),
(137, 'Peas-In-A-Pod', '6559c64058679.png', 24),
(138, 'Big Baby', '6559c6497081e.png', 24),
(139, 'Chunk', '6559c65363912.png', 24),
(140, 'Stretch', '6559c65c8927d.png', 24),
(141, 'Twitch', '6559c665a1dfc.png', 24),
(142, 'Andy', '6559c672bd268.png', 24),
(143, 'Bonnie', '6559c67d24c41.png', 24),
(144, 'Mater', '6559c87ed6c5d.png', 25),
(145, 'Lightning McQueen', '6559c88b52142.png', 25),
(146, 'Francesco Bernoulli ', '6559c8961c303.png', 25),
(147, 'Finn McMissile', '6559c8a288fd7.png', 25),
(148, 'Holley Shiftwell', '6559c8ad0a40e.png', 25),
(149, 'Professor Z', '6559c8b7638b6.png', 25),
(150, 'Miles Axlerod', '6559c8c24c768.png', 25),
(151, 'Acer', '6559c8cc577f1.png', 25),
(152, 'Grem', '6559c8d542004.png', 25),
(153, 'Siddeley', '6559c8dfcc881.png', 25);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `year` varchar(4) NOT NULL,
  `director` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `synopsis`, `year`, `director`, `thumbnail`, `banner`) VALUES
(8, 'Elemental', 'Set in Element City, where Fire-, Water-, Earth- and Air-residents live together, Elemental introduces Ember, a tough, quick-witted and fiery young woman, whose friendship with a fun, sappy, go-with-the-flow guy named Wade challenges her beliefs about the world they live in.', '2023', 'Peter Sohn', '655751e5678de.png', '655706a95b45b.png'),
(12, 'Lightyear', 'A sci-fi action adventure and the definitive origin story of Buzz Lightyear, the hero who inspired the toy, “Lightyear” follows the legendary Space Ranger after he’s marooned on a hostile planet 4.2 million light-years from Earth alongside his commander and their crew. As Buzz tries to find a way back home through space and time, he’s joined by a group of ambitious recruits and his charming robot companion cat, Sox. Complicating matters and threatening the mission is the arrival of Zurg, an imposing presence with an army of ruthless robots and a mysterious agenda.', '2022', 'Angus MacLane', '65583d37bb06c.png', '65583d37bb3a5.png'),
(13, 'Turning Red', 'Disney and Pixar’s “Turning Red” introduces Mei Lee, a confident, dorky 13-year-old torn between staying her mother’s dutiful daughter and the chaos of adolescence. Her protective, if not slightly overbearing mother, Ming, is never far from her daughter—an unfortunate reality for the teenager. And as if changes to her interests, relationships and body weren’t enough, whenever she gets too excited (which is practically ALWAYS), she “poofs” into a giant red panda!', '2022', 'Domee Shi', '6558409e89ba0.png', '6558409e89d8a.png'),
(14, 'Luca', 'Set in a beautiful seaside town on the Italian Riviera, Disney and Pixar’s original feature film “Luca” is a coming-of-age story about one young boy experiencing an unforgettable summer filled with gelato, pasta and endless scooter rides. Luca shares these adventures with his newfound best friend, but all the fun is threatened by a deeply-held secret: they are sea monsters from another world just below the water’s surface.', '2021', 'Enrico Casarosa', '655842aa47a04.png', '655844b43008d.png'),
(15, 'Soul', 'What is it that makes you...YOU? “Soul” introduces Joe Gardner (voice of Jamie Foxx) – a middle-school band teacher who has a passion for jazz. “Joe wants more than anything to become a professional jazz pianist,” says director Pete Docter. “So when he’s offered a rare, once-in-a-lifetime opportunity to play with one of the greats, Joe feels he’s reached the top of the ultimate mountain.” \r\n\r\nBut one small misstep takes him from the streets of New York City to The Great Before – a fantastical place where new souls get their personalities, quirks and interests before they go to Earth. According to Docter, the idea for this unique world was 23 years in the making. “It started with my son—he’s 23 now—but the instant he was born, he already had a personality,” says Docter. “Where did that come from? I thought your personality developed through your interaction with the world. And yet, it was pretty clear that we’re all born with a very unique, specific sense of who we are.', '2020', 'Pete Docter', '6559a16fe83ca.png', '6559a16fe878c.png'),
(16, 'Up', 'A 78-year-old curmudgeonly balloon salesman, is not your average hero. When he ties thousands of balloons to his house and flies away to the wilds of South America, he finally fulfills his lifelong dream of adventure. But after Carl discovers an 8-year-old stowaway named Russell, this unlikely duo soon finds themselves on a hilarious journey in a lost world filled with danger and surprises.', '2009', 'Pete Docter', '6559ae37335aa.png', '6559ae37338a3.png'),
(17, 'Monsters, Inc.', 'There\'s a reason why there are monsters in children\'s closets—it\'s their job. Monsters, Inc. is the most successful scream-processing factory in the monster world, and there is no better Scarer than James P. Sullivan. But when \"Sulley\" accidentally lets a little human girl into Monstropolis, life turns upside down for him and his buddy Mike.', '2001', 'Pete Docter', '6559b197ce301.png', '6559b197ce5fe.png'),
(18, 'Cars', 'Aspiring champion race car Lightning McQueen is on the fast track to success, fame, and everything he\'s ever hoped for—until he takes an unexpected detour on dusty Route 66. His have-it-all-now attitude is thrown into a tailspin when a small-town community that time forgot shows McQueen what he\'s been missing in his high-octane life.', '2006', 'John Lasseter', '6559b476454e9.png', '6559b47645722.png'),
(19, 'Toy Story ', 'Ever wonder what toys do when people aren\'t around? Toy Story answers that question with a fantastic fun-filled journey, viewed mostly through the eyes of two rival toys – Woody, the lanky, likable cowboy, and Buzz Lightyear, the fearless space ranger.  Led by Woody, Andy\'s toys live happily in his room until Andy\'s birthday brings Buzz Lightyear onto the scene. Afraid of losing his place in Andy\'s heart, Woody plots against Buzz.\r\n\r\nBut when circumstances separate Buzz and Woody from their owner, the comically-mismatched duo eventually learn to put aside their differences, and they find themselves on a hilarious adventure-filled mission where the only way they can survive is to form an uneasy alliance.', '1995', 'John Lasseter', '6559baa829293.png', '6559b723b79aa.png'),
(20, 'Coco', 'Despite his family\'s generations-old ban on music, young Miguel dreams of becoming an accomplished musician like his idol Ernesto de la Cruz. Desperate to prove his talent, Miguel finds himself in the stunning and colorful Land of the Dead. After meeting a charming trickster named Héctor, the two new friends embark on an extraordinary journey to unlock the real story behind Miguel\'s family history.', '2017', 'Adrian Molina', '6559b9344a47f.png', '6559b9344a6d5.png'),
(21, 'Finding Nemo ', 'In the colorful and warm tropical waters of the Great Barrier Reef, a Clown Fish named Marlin lives safe and secluded in his anemone home with his only son, Nemo. Fearful of the ocean and its unpredictable risks, he struggles to protect his son. Nemo, like all young fish, is eager to explore the mysterious reef. When Nemo is unexpectedly taken far from home and thrust into a tacky dentist’s office fish tank, Marlin finds himself the unlikely hero on an epic journey to rescue his son.', '2003', 'Andrew Stanton', '6559bcb84be2a.png', '6559bcb84c004.png'),
(22, 'The Incredibles', 'It takes a will of steel to hide your superhero talents from a world that still needs you, yet no longer appreciates what you can do. Battling a bulging belly and a boring job, Mr. Incredible longs for the glory days of upholding law and order while his superhuman family tries to fit in with their \"normal\" life. Relief from quiet suburbia finally comes years later, when the family uncovers a diabolical plan and must bring together their respective strengths to save the day.', '2004', 'Brad Bird', '6559bfea78bb6.png', '6559bfea78d90.png'),
(23, 'Toy Story 2', 'Buzz, Woody, and their friends are back as Andy heads off to Cowboy Camp, leaving his toys to their own devices.  Things shift into high gear when an obsessive toy collector name Al McWhiggin, owner of Al\'s Toy Barn, kidnaps Woody.  At Al\'s apartment, Woody discovers that he is a highly valued collectible from a 1950s TV show called \"Woody\'s Roundup.\"  He meets the other prized toys from the show:  Jessie the Cowgirl, Bullseye the Horse, and Stinky Pete the Prospector.  Andy\'s toys mount a daring rescue mission, Buzz Lightyear meets his match, and Woody has to decide where he and his heart truly belong.', '1999', 'Josh Cooley', '6559c2df47b1d.png', '6559c2df47d21.png'),
(24, 'Toy Story 3', 'The creators of the beloved Toy Story films re-open the toy box and bring moviegoers back to the delightful world of our favorite gang of toy characters in Toy Story 3. As Andy prepares to depart for college, Buzz, Woody, and the rest of his loyal toys are troubled about their uncertain future. \r\n\r\nToy Story 3 is a comical adventure that lands the toys in a room full of untamed tots who can\'t wait to get their sticky little fingers on these \"new\" toys. It\'s pandemonium as the toys try to stay together, ensuring that \"no toy gets left behind.', '2010', 'Lee Unkrich', '6559c5e1a2e3a.png', '6559c5e1a301b.png'),
(25, 'Cars 2', 'Star racecar Lightning McQueen and the incomparable tow truck Mater take their friendship to exciting new places in Cars 2 when they head overseas to compete in the first-ever World Grand Prix to determine the world\'s fastest car. But the road to the championship is filled with plenty of potholes, detours, and hilarious surprises when Mater gets caught up in an intriguing adventure of his own: international espionage.', '2011', 'John Lasseter', '6559c8745d1c6.png', '6559c8745d3c1.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin', '$2y$10$/33u5ZdybiVr3lpDm.8sXuf1FA1i9PCbYNYpAmWIfBSWGOhT3.lzm', 'Admin'),
(7, 'Abiyyu', 'Hade', 'test@gmail.com', '$2y$10$xy9e9UHY8q1PTcCr8r31Je7jq7CtqheNBTC1Aev1Y0flXthjztu/W', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_movies` (`id_movies`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
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
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `characters`
--
ALTER TABLE `characters`
  ADD CONSTRAINT `id_movies` FOREIGN KEY (`id_movies`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
