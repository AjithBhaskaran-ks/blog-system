<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<h1>
Admin Dashboard
</h1>

<a href="add-blog.php" class="btn btn-primary mt-3">
Add Blog
</a>

<a href="manage-blog.php" class="btn btn-dark mt-3">
Manage Blogs
</a>

</div>

</body>
</html>