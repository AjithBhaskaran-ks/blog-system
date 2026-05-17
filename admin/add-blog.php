<?php

include("../config/db.php");

if(isset($_POST['submit']) && isset($_FILES['image'])) {

    $title = $_POST['title'];
    $category = $_POST['category'];
    $short_desc = $_POST['short_desc'];
    $content = $_POST['content'];

    $image = $_FILES['image']['name'];
    $temp_name = $_FILES['image']['tmp_name'];

    move_uploaded_file($temp_name, "../uploads/$image");

    $query = "INSERT INTO blogs(title, category, image, short_desc, content, created_at)
    VALUES('$title', '$category', '$image', '$short_desc', '$content', NOW())";

    mysqli_query($conn, $query);

    echo "<script>alert('Blog Added Successfully!')</script>";
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Blog</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

body{
    background:#f8fafc;
    font-family:'Poppins',sans-serif;
}

.card{
    border:none;
    border-radius:20px;
    background:white;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
}

.form-control,
.form-select{
    border-radius:12px;
    padding:12px;
    border:1px solid #cbd5e1;
}

.form-control:focus,
.form-select:focus{
    border-color:#3b82f6;
    box-shadow:none;
}

.btn-custom{
    background:linear-gradient(135deg,#3b82f6,#06b6d4);
    border:none;
    padding:12px;
    border-radius:12px;
    color:white;
    font-weight:600;
}

.btn-custom:hover{
    opacity:0.9;
}

</style>

</head>

<body>

<div class="container mt-5">

<div class="row justify-content-center">

<div class="col-md-8">

<div class="card p-4">

<h2 class="mb-4">
Add Blog
</h2>

<form method="POST" enctype="multipart/form-data">

<div class="mb-3">

<input 
type="text" 
name="title" 
class="form-control"
placeholder="Blog Title"
required>

</div>

<div class="mb-3">

<select 
name="category" 
class="form-select"
required>

<option value="">
Select Category
</option>

<option value="Results">
Results
</option>

<option value="Admit Card">
Admit Card
</option>

<option value="Jobs">
Jobs
</option>

<option value="Notifications">
Notifications
</option>

<option value="Exams">
Exams
</option>

</select>

</div>

<div class="mb-3">

<input 
type="file" 
name="image"
class="form-control"
required>

</div>

<div class="mb-3">

<textarea 
name="short_desc" 
class="form-control"
rows="3"
placeholder="Short Description"
required></textarea>

</div>

<div class="mb-3">

<textarea 
name="content" 
class="form-control"
rows="6"
placeholder="Full Content"
required></textarea>

</div>

<button 
type="submit" 
name="submit"
class="btn btn-custom w-100">

Publish Blog

</button>

</form>

</div>

</div>

</div>

</div>

</body>
</html>