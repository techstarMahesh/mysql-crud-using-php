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
    <h1>Student Database: </h1>
        <form action="./index.php" method="post">
            <div class="form-group">
                <label for="name">
                    <h3>Enter Full Name</h3>
                </label>
                <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">
                    <h3>Enter Email</h3>
                </label>
                <input class="form-control" type="text" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="email">
                    <h3>Enter Phone Number</h3>
                </label>
                <input class="form-control" type="number" name="phoneNumber" id="phoneNumber">
            </div>
            <div class="form-group">
                <label for="comments">
                    <h3>Enter Comments</h3>
                </label>
                <textarea class="form-control" name="comments" id="comments" cols="30" rows="10"></textarea>
            <input class="btn btn-primary m-2" type="submit" value="Add Data">
        </form>
    </div>
</body>
</html>