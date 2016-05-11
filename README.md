#Wifidog-master
A simple wifidog auth program writed with PHP
# database
CREATE TABLE IF NOT EXISTS `users` (
  `userid` varchar(16) NOT NULL,
  `userpass` varchar(32) NOT NULL,
  `usertoken` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

this program does not have backgrand