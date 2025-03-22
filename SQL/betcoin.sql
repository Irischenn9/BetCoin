-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-06-19 17:44:35
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `betcoin`
--
CREATE DATABASE IF NOT EXISTS `betcoin` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_bin;
USE `betcoin`;

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `no` int(11) NOT NULL,
  `t1No` int(11) NOT NULL,
  `t2No` int(11) NOT NULL,
  `team1Odds` double NOT NULL,
  `team2Odds` double NOT NULL,
  `outcome` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `channelParameter` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `gameStartTime` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 傾印資料表的資料 `game`
--

INSERT INTO `game` (`no`, `t1No`, `t2No`, `team1Odds`, `team2Odds`, `outcome`, `channelParameter`, `gameStartTime`) VALUES
(10, 2, 1, 2, 1.5, '未知', 'FM17PurmVrY', '2022-06-17 23:01:20'),
(12, 1, 4, 1.3, 1.35, '負', 'r5VWW2nq5Jk', '2022-06-15 23:40:46'),
(13, 4, 1, 1.5, 1.2, '未知', 'U9VpeXil8u8', '2022-06-16 07:58:29'),
(14, 1, 3, 1.67, 1.85, '未知', 'r5VWW2nq5Jk', '2024-06-19 07:40:01'),
(15, 2, 3, 1.7, 1.54, '負', 'r5VWW2nq5Jk', '2022-06-15 23:40:31'),
(16, 3, 4, 1.9, 1.7, '勝', 'xV5b03pse7w', '2022-06-15 22:39:21'),
(17, 2, 4, 1.75, 1.98, '勝', 'r5VWW2nq5Jk', '2022-06-15 23:40:38');

-- --------------------------------------------------------

--
-- 資料表結構 `money`
--

CREATE TABLE `money` (
  `no` int(11) NOT NULL,
  `uNo` int(11) NOT NULL,
  `sourceFrom` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `changeAmount` int(11) NOT NULL,
  `changeTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 傾印資料表的資料 `money`
--

INSERT INTO `money` (`no`, `uNo`, `sourceFrom`, `changeAmount`, `changeTime`) VALUES
(50, 12, 'T', 10000, '2022-06-15 14:48:41'),
(51, 12, 'G', -100, '2022-06-15 14:48:53'),
(52, 12, 'G', -200, '2022-06-15 14:49:10'),
(53, 12, 'G', -100, '2022-06-15 14:49:10'),
(54, 12, 'G', -300, '2022-06-15 14:49:18');

-- --------------------------------------------------------

--
-- 資料表結構 `moneytransfer`
--

CREATE TABLE `moneytransfer` (
  `no` int(11) NOT NULL,
  `uNo` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `inOrOut` varchar(2) COLLATE utf8mb4_bin NOT NULL,
  `comfirm` varchar(1) COLLATE utf8mb4_bin NOT NULL DEFAULT 'N',
  `askDate` datetime NOT NULL DEFAULT current_timestamp(),
  `comfirmDate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- 資料表結構 `team`
--

CREATE TABLE `team` (
  `no` int(11) NOT NULL,
  `teamName` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `icon` varchar(50) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 傾印資料表的資料 `team`
--

INSERT INTO `team` (`no`, `teamName`, `icon`) VALUES
(1, '台灣啤酒籃球隊', 'image/005.png'),
(2, '裕隆納智捷', 'image/006.png'),
(3, '達欣工程籃球隊', 'image/007.png'),
(4, '臺北富邦勇士', 'image/008.png');

-- --------------------------------------------------------

--
-- 資料表結構 `usergame`
--

CREATE TABLE `usergame` (
  `no` int(11) NOT NULL,
  `gNo` int(11) NOT NULL,
  `uNo` int(11) NOT NULL,
  `tNo` int(11) NOT NULL,
  `betAmount` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 傾印資料表的資料 `usergame`
--

INSERT INTO `usergame` (`no`, `gNo`, `uNo`, `tNo`, `betAmount`, `date`) VALUES
(15, 16, 12, 3, 200, '2022-06-15 15:02:48'),
(16, 12, 12, 1, 200, '2022-06-15 14:42:35'),
(17, 15, 12, 4, 100, '2022-06-15 14:51:25');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `no` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `pwd` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `bankAccount` bigint(14) NOT NULL,
  `role` varchar(1) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`no`, `email`, `name`, `pwd`, `bankAccount`, `role`) VALUES
(2, 'w@q.w', 'hello', '321', 1083365, 'A'),
(12, 'aaa@gmail.com', 'Jack', '123', 21333046242457, 'U'),
(13, 'a1083359@mail.nuk.edu.tw', 'Iris', '123', 12127102451335, 'U');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`no`),
  ADD KEY `team1` (`t1No`),
  ADD KEY `team2` (`t2No`);

--
-- 資料表索引 `money`
--
ALTER TABLE `money`
  ADD PRIMARY KEY (`no`),
  ADD KEY `uNo` (`uNo`);

--
-- 資料表索引 `moneytransfer`
--
ALTER TABLE `moneytransfer`
  ADD PRIMARY KEY (`no`),
  ADD KEY `uNo` (`uNo`);

--
-- 資料表索引 `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`no`);

--
-- 資料表索引 `usergame`
--
ALTER TABLE `usergame`
  ADD PRIMARY KEY (`no`),
  ADD KEY `gNo` (`gNo`),
  ADD KEY `uNo` (`uNo`),
  ADD KEY `tNo` (`tNo`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`no`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `game`
--
ALTER TABLE `game`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `money`
--
ALTER TABLE `money`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `moneytransfer`
--
ALTER TABLE `moneytransfer`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `team`
--
ALTER TABLE `team`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `usergame`
--
ALTER TABLE `usergame`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`t1No`) REFERENCES `team` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`t2No`) REFERENCES `team` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `money`
--
ALTER TABLE `money`
  ADD CONSTRAINT `money_ibfk_1` FOREIGN KEY (`uNo`) REFERENCES `users` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `moneytransfer`
--
ALTER TABLE `moneytransfer`
  ADD CONSTRAINT `moneytransfer_ibfk_1` FOREIGN KEY (`uNo`) REFERENCES `users` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `usergame`
--
ALTER TABLE `usergame`
  ADD CONSTRAINT `usergame_ibfk_1` FOREIGN KEY (`gNo`) REFERENCES `game` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usergame_ibfk_2` FOREIGN KEY (`uNo`) REFERENCES `users` (`no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usergame_ibfk_3` FOREIGN KEY (`tNo`) REFERENCES `team` (`no`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
