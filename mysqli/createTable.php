<?php
require("mysqli.php");
$create_table = "CREATE TABLE students (
    id INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    full_name VARCHAR(100),
    email VARCHAR(100),
    phone_number INT(10),
    comments TEXT
)";

if($connection->query($create_table)){
    echo "Database created";
}
else{
    echo "Database creation have some error";
}
?>