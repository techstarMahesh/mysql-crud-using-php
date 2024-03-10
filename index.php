<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Tutiral</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container p-5 w-50">
        <form action="#" method="post">
            <div class="form-group">
                <label for="database-name">
                    <h3>Enter Database name</h3>
                </label>
                <input class="form-control" type="text" name="database" id="database-name" required>
            </div>
            <div class="form-group">
                <label for="table-name">
                    <h3>Enter Table name</h3>
                </label>
                <input class="form-control" type="text" name="table" id="table-name" required>
            </div>
            <input class="btn btn-primary m-2" type="submit" value="Submit">
        </form>
    </div>
</body>

<?php
if (isset($_POST["database"]) && isset($_POST["table"])) {
    // get data from post
    $database_name = $_POST["database"];
    $table_name = $_POST["table"];
    session_start();
    $_SESSION["database"] = $database_name;
    $_SESSION["table"] = $table_name;
    echo $database_name;
    echo $table_name;

    // make connection
    $connection = new mysqli("localhost", "root", "");

    // create database
    $create_db = "CREATE DATABASE IF NOT EXISTS $database_name";
    $connection->query($create_db);

    // make connection
    $connection = new mysqli("localhost", "root", "", $database_name);

    // create table
    $create_table = "CREATE TABLE IF NOT EXISTS $table_name (
        id INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
        full_name VARCHAR(100),
        email VARCHAR(100),
        phone_number INT(10),
        comments TEXT
    )";
    if($connection->query($create_table)){
        echo "<div><h2 class='text-center text-success'>Database created <a class='text-info text-decoration-none' href='./crud/'>Go to table page</a> </h2></div>";
    }
}

?>
</html>