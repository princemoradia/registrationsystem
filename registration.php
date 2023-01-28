<?php
require 'config.php';
if(isset($_POST["submit"])){
    $name= $_POST["name"];
    // $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    $conpassword=$_POST["conpassword"];
    $duplicate= mysqli_query($conn,"SELECT * from user WHERE email='$email'");
    if(mysqli_num_rows($duplicate) > 0)
    {
        echo
        "<script>alert('Username or Email Has Already Taken')</script>";
    }
    else
    {
        if($password == $conpassword)
        {
            $query="INSERT INTO user VALUES('$name','$email','$password','$conpassword')";
            mysqli_query($conn,$query);
            echo
            "<script>alert('Registration Done Successfully!!')</script>";
        }
        else
        {
            echo
            "<script>alert('Password Does Not Match')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h2>Registration</h2>
    <form action="" method="post" autocomplete="off">
        <b>Name</b>
        <input type="name" name="name" id="name" required><br><br>
        <!-- <b>User Name</b>
        <input type="username" name="username" id="username" required><br><br> -->
        <b>Email</b>
        <input type="email" name="email" id="email" required><br><br>
        <b>Password</b>
        <input type="password" name="password" id="password" required><br><br>
        <b>Confirm Password</b>
        <input type="password" name="conpassword" id="conpassword" required><br><br>
        <button type="submit" name="submit">Register</button>
    </form>
    <br>
    <a href="login.php">Login</a>
</body>
</html>