<?php
$connection = new mysqli("localhost", "root", "", "walkwell", "3306", null);
if($connection){
    echo "Connection Successfull";
}
else{
    echo "Connection Failed";
}
?>