<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    session_start();
    $id = $_GET['id'];
    $database_name = $_SESSION["database"];
    $table_name = $_SESSION["table"];
    $connection = new mysqli("localhost", "root", "", $database_name);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $table_data = "select * from $table_name where id = $id";
    $result = $connection->query($table_data);
    // echo $result->num_rows;
    $name = "";
    $email = "";
    $phoneNumber = "";
    $comments = "";
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $name = $row["full_name"];
            // echo $name;
            $email = $row["email"];
            // echo $email;
            $phoneNumber = $row["phone_number"];
            // echo $phoneNumber;
            $comments = $row["comments"];
            // echo $comments;
        }
    }
    ?>
    <?php $name ?>
    <div class="container p-5 w-50">
        <form action="./index.php" method="post">
            <div class="form-group">
                <label for="name">
                    <h3>Enter Full Name</h3>
                </label>
                <input class="form-control" type="text" value="<?php echo $name ?>" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">
                    <h3>Enter Email</h3>
                </label>
                <input class="form-control" type="text" value="<?php echo $email ?>" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="email">
                    <h3>Enter Phone Number</h3>
                </label>
                <input class="form-control" type="number" value="<?php echo $phoneNumber ?>" name="phoneNumber"
                    id="phoneNumber">
            </div>
            <div class="form-group">
                <label for="comments">
                    <h3>Enter Comments</h3>
                </label>
                <textarea class="form-control" name="comments" id="comments" cols="30"
                    rows="10"><?php echo $comments ?></textarea>
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input class="btn btn-danger m-2" type="submit" value="Update">
            <a class="btn btn-primary" href="./index.php">Go Back</a>
        </form>
    </div>
</body>

</html>