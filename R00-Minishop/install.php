<?php
include('./config.php');

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass);
mysqli_query($mysqli, "CREATE DATABASE $mysqli_db");
mysqli_close($mysqli);

$mysqli = mysqli_connect($mysqli_host, $mysqli_user, $mysqli_pass, $mysqli_db, $mysqli_port);

$req = "CREATE TABLE IF NOT EXISTS `users` (`username` varchar(255) NOT NULL,`password` varchar(255) NOT NULL,`name` varchar(255) NOT NULL,`classe` int(11) NOT NULL,UNIQUE KEY `username` (`username`)) ENGINE=InnoDB DEFAULT CHARSET=utf8;";
mysqli_query($mysqli, $req);
$req = "INSERT INTO `users` (`username`, `password`, `name`, `classe`) VALUES('clara', 'kikoo', 'Clara Corazza', '3'),('client1', 'client1', 'Joli Client', '0'), ('client2', 'client2', 'Mignon Client', '0');";
mysqli_query($mysqli, $req);
$req = " CREATE TABLE IF NOT EXISTS `catalog` (`ID` int(11) NOT NULL AUTO_INCREMENT,`name` text NOT NULL,`price` int(11) NOT NULL,`img` varchar(500) NOT NULL,`species` text NOT NULL,`country` text NOT NULL,PRIMARY KEY (`ID`)) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15;";
mysqli_query($mysqli, $req);
$req = "INSERT INTO `catalog` (`ID`, `name`, `price`, `img`, `species`, `country`) VALUES"
."(1, 'Panda', 7500, 'http://images.boomsbeat.com/data/images/full/3009/baby-panda_7-jpg.jpg', 'animal', 'asia'),"
."(2, 'Lion', 9000, 'http://kitten.cat/wp-content/uploads/2012/09/Lion-cute.jpg', 'animal', 'africa'),"
."(3, 'Deer', 4500, 'http://www.laboiteverte.fr/wp-content/uploads/2011/01/bebe-enfant-animal-mignon-poshoo-12.jpg', 'animal', 'Namerica'),"
."(4, 'Lynx', 3000, 'http://www.laboiteverte.fr/wp-content/uploads/2011/01/bebe-enfant-animal-mignon-poshoo-14.jpg', 'animal', 'samerica'),"
."(5, 'Lamb', 1200, 'http://www.laboiteverte.fr/wp-content/uploads/2011/01/bebe-enfant-animal-mignon-poshoo-03.jpg', 'animal', 'euro'),"
."(6, 'Lola', 12, 'http://gdj.gdj.netdna-cdn.com/wp-content/uploads/2012/08/cute-baby-photo-27.jpg', 'human', 'samerica'),"
."(7, 'Hugo', 56, 'http://gdj.gdj.netdna-cdn.com/wp-content/uploads/2012/08/cute-baby-photo-2.jpg', 'human', 'namerica');";
mysqli_query($mysqli, $req);

echo "Install [OK]";

mysqli_close($mysqli);
?>
