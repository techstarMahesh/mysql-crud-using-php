<!DOCTYPE html>
<html lang="en">
<?php
// store session data
session_start();
$database_name = $_SESSION["database"];
$table_name = $_SESSION["table"];
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MySQL Tutiral</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <?php
    $table_data = "select * from $table_name";
    $connection = new mysqli("localhost", "root", "", $database_name);
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }
    $result = $connection->query($table_data);


    // Delete data
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        // echo $id;
        $delete_data = "DELETE FROM $table_name WHERE id=$id";
        $connection->query($delete_data);
    }

    if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["phoneNumber"]) && isset($_POST["comments"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $phoneNumber = $_POST["phoneNumber"];
        $comments = $_POST["comments"];
        $connection = new mysqli("localhost", "root", "", $database_name);
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }
        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $update_data = "UPDATE $table_name SET full_name='$name', email='$email', phone_number='$phoneNumber', comments='$comments' WHERE id=$id";
            $connection->query($update_data);
        } else {
            $insert_data = "INSERT INTO $table_name (full_name, email, phone_number, comments) VALUES ('$name', '$email', '$phoneNumber', '$comments')";
            $connection->query($insert_data);
        }
    }
    ?>
    <div class="container p-5 w-50">
        <h1>Student Database: <a class="btn btn-primary" href="./insertdata.php">Add</a> <a class="btn btn-primary"
                href="./">Refresh</a> <a class="btn btn-primary" href="../index.php">Logout</a> </h1>
        <?php
        if ($result->num_rows > 0) {
            ?>
            <table class='table table-striped table-hover table-bordered'>
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Comments</th>
                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <td>
                                <?php echo $row["full_name"]; ?>
                            </td>
                            <td>
                                <?php echo $row["email"]; ?>
                            </td>
                            <td>
                                <?php echo $row["phone_number"]; ?>
                            </td>
                            <td>
                                <?php echo $row["comments"]; ?>
                            </td>
                            <td><a class="btn btn-primary text-decoration-none"
                                    href="view_data.php?id=<?php echo $row["id"]; ?>">View</a></td>
                            <td><a class="btn btn-primary text-decoration-none"
                                    href="update_data.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
                            <td><a class="btn btn-danger text-decoration-none"
                                    href="delete_data.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <?php
        } else {
            echo "0 results";
        }
        ?>
    </div>
</body>

</html>