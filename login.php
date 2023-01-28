<?php
require 'config.php';
if(isset($_POST["submit"])){
    $nameemail = $_POST["nameemail"];
    $password = $_POST["password"];
    $result = mysqli_query($conn ,"SELECT * FROM user WHERE  email='$nameemail'");
    $row = mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0)
    {
        if($password == $row["password"])
        {
            $_SESSION["login"] = true;
            header("Location:index.php");
        }
        else{
            echo
            "<script>alert('Wrong Psassword')</script>";
        }
    }
    else
    {
        echo
        "<script>alert('User Not Found')</script>";
    } 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="" method="post" autocomplete="off">
        Email
        <input type="nameemail" id="nameemail" name="nameemail" required><br><br>
        Password
        <input type="password" id="password" name="password" required><br><br> 
        <button type="submit" name="submit" value="submit">Login</button><br><br>
    </form>
    <br>
    <a href="registartion.php">Registration</a>
</body>
</html>