<?php

include("config/db.php");

$id = $_GET['id'];

$query = "SELECT * FROM blogs WHERE id=$id";

$result = mysqli_query($conn, $query);

$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>
<?php echo $row['title']; ?>
</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}

body{
    background:#f8fafc;
    color:#0f172a;
}

.navbar-custom{
    background:white;
    padding:20px 0;
    border-bottom:1px solid #e2e8f0;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.brand-text{
    font-size:30px;
    font-weight:700;
    color:#0f172a;
    text-decoration:none;
}

.blog-container{
    max-width:900px;
    margin:auto;
    margin-top:50px;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.blog-image{
    width:100%;
    border-radius:20px;
    height:450px;
    object-fit:cover;
}

.blog-title{
    font-size:40px;
    font-weight:700;
    margin-top:25px;
}

.blog-date{
    color:#64748b;
    margin-top:10px;
}

.blog-category{
    display:inline-block;
    margin-top:15px;
    background:linear-gradient(135deg,#3b82f6,#06b6d4);
    color:white;
    padding:8px 18px;
    border-radius:25px;
    font-size:14px;
}

.blog-content{
    margin-top:30px;
    font-size:18px;
    line-height:1.9;
    color:#334155;
}

.back-btn{
    margin-top:30px;
    display:inline-block;
    text-decoration:none;
    background:#0f172a;
    color:white;
    padding:12px 25px;
    border-radius:12px;
}

.back-btn:hover{
    background:#1e293b;
}

</style>

</head>

<body>

<div class="navbar-custom">

<div class="container">

<a href="index.php" class="brand-text">
INDIAN BLOGS
</a>

</div>

</div>

<div class="container">

<div class="blog-container">

<img 
src="uploads/<?php echo $row['image']; ?>" 
class="blog-image">

<h1 class="blog-title">
<?php echo $row['title']; ?>
</h1>

<p class="blog-date">
<?php echo $row['created_at']; ?>
</p>

<div class="blog-category">
<?php echo $row['category']; ?>
</div>

<div class="blog-content">
<?php echo nl2br($row['content']); ?>
</div>

<a href="index.php" class="back-btn">
← Back to Blogs
</a>

</div>

</div>

</body>
</html>