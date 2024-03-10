<?php
// import connection method
require("mysqli.php");

// create database after make sussifull connection 
$create_db = "create database IF NOT EXISTS walkwell";

// execute quary if successfull or not print message
if($connection->query($create_db )){
    echo "\nDatabase successfully Created";
}
else{
    echo "\nDatabase not created";
}

// delete database
$delete_db = "drop database walkwell";

// execute quary if successfull or not print message
// if($connection->query($delete_db)){
//     echo "\nDatabase successfully Deleted";
// }
// else{
//     echo "\nDatabase not deleted ";
// }

?>