<?php

// server name
$server_name = "localhost";

// username of sql
$user_name = "root";

// password of that user
$password = "";

// Database name
$db_name = "walkwell";

// sql port number
$sql_port_number = 3306;

// make a new object of mysqli class and store into the variable
$connection = new mysqli($server_name, $user_name, $password, $db_name, $sql_port_number);

// check connection is success or not
if ($connection->connect_error) {
    die("Connection Failed" . $connection->connect_error);
} else {
    echo "Connection Success";
}

// close connection of mysqli
// $connection->close();
?>