<?php
require("mysqli.php");
$insert_data = "insert into students values(1,'Mahesh Sharma','mistermaheshsharma@gmail.com','9918513434','Techstar Mahesh')";
$connection->query($insert_data);
?>