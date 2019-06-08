-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `employee_id` int(11) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `emp_contact` varchar(100) NOT NULL,
  `emp_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `employee` (`employee_id`, `emp_name`, `emp_contact`, `emp_role`) VALUES
(1,	'Hardik Vyas',	'94085xxxxx',	'Web Developer'),
(3,	'Raj K Joshi',	'996633XXX',	'SEO Master'),
(4,	'Ram D Rv',	'55555XXX',	'Admin');

-- 2019-06-08 11:29:58
