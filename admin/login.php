<?php

session_start();

include("../config/db.php");

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admins 
    WHERE username='$username' 
    AND password='$password'";

    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result)>0){

        $_SESSION['admin']=$username;

        header("Location: dashboard.php");

    }else{

        echo "<script>alert('Invalid Login')</script>";
    }
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Admin Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f8fafc;
}

.login-box{
    max-width:400px;
    margin:auto;
    margin-top:100px;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

</style>

</head>

<body>

<div class="login-box">

<h2 class="mb-4">
Admin Login
</h2>

<form method="POST">

<input 
type="text"
name="username"
class="form-control mb-3"
placeholder="Username"
required>

<input 
type="password"
name="password"
class="form-control mb-3"
placeholder="Password"
required>

<button 
type="submit"
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</body>
</html>