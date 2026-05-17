<?php

include("../config/db.php");

$id = $_GET['id'];

$query = "DELETE FROM blogs WHERE id=$id";

mysqli_query($conn, $query);

header("Location: manage-blog.php");

?>