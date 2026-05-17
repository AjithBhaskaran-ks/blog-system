<?php

session_start();

if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit();
}

include("../config/db.php");

$query = "SELECT * FROM blogs ORDER BY id DESC";

$result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Manage Blogs</title>

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
    background:#f1f5f9;
    color:#0f172a;
}

.sidebar{
    width:260px;
    height:100vh;
    position:fixed;
    left:0;
    top:0;
    background:#0f172a;
    padding:30px 20px;
    overflow-y:auto;
}

.logo{
    color:white;
    font-size:28px;
    font-weight:700;
    margin-bottom:40px;
}

.sidebar a{
    display:block;
    color:#cbd5e1;
    text-decoration:none;
    padding:14px 18px;
    border-radius:12px;
    margin-bottom:10px;
    transition:0.3s;
    font-weight:500;
}

.sidebar a:hover{
    background:#1e293b;
    color:white;
}

.main-content{
    margin-left:260px;
    padding:40px;
}

.topbar{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
    gap:15px;
}

.page-title{
    font-size:34px;
    font-weight:700;
}

.add-btn{
    background:linear-gradient(135deg,#3b82f6,#06b6d4);
    border:none;
    color:white;
    padding:12px 24px;
    border-radius:14px;
    text-decoration:none;
    font-weight:600;
    transition:0.3s;
    display:inline-block;
}

.add-btn:hover{
    transform:translateY(-2px);
    color:white;
}

.table-box{
    background:white;
    padding:25px;
    border-radius:24px;
    box-shadow:0 10px 30px rgba(0,0,0,0.08);
    overflow-x:auto;
}

.table{
    margin-bottom:0;
    min-width:700px;
}

.table th{
    border:none;
    padding:18px;
    color:#475569;
    font-size:14px;
    text-transform:uppercase;
    white-space:nowrap;
}

.table td{
    padding:18px;
    vertical-align:middle;
    border-top:1px solid #e2e8f0;
}

.blog-image{
    width:100px;
    height:70px;
    object-fit:cover;
    border-radius:12px;
}

.blog-title{
    font-weight:600;
    color:#0f172a;
}

.category-badge{
    background:#dbeafe;
    color:#2563eb;
    padding:8px 14px;
    border-radius:20px;
    font-size:13px;
    font-weight:600;
}

.action-btn{
    border:none;
    padding:8px 16px;
    border-radius:10px;
    color:white;
    text-decoration:none;
    font-size:14px;
    font-weight:500;
    margin-right:6px;
    display:inline-block;
}

.edit-btn{
    background:#10b981;
}

.delete-btn{
    background:#ef4444;
}

.edit-btn:hover,
.delete-btn:hover{
    opacity:0.9;
    color:white;
}

@media(max-width:768px){

.sidebar{
    width:100%;
    height:auto;
    position:relative;
    padding:20px;
}

.logo{
    text-align:center;
    margin-bottom:25px;
}

.main-content{
    margin-left:0;
    padding:20px;
}

.topbar{
    flex-direction:column;
    align-items:flex-start;
}

.page-title{
    font-size:28px;
}

.table-box{
    padding:15px;
}

.blog-image{
    width:80px;
    height:60px;
}

.action-btn{
    display:block;
    margin-bottom:8px;
    text-align:center;
}

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">
INDIAN BLOGS
</div>

<a href="dashboard.php">
Dashboard
</a>

<a href="add-blog.php">
Add Blog
</a>

<a href="manage-blog.php">
Manage Blogs
</a>

<a href="login.php">
Logout
</a>

</div>

<div class="main-content">

<div class="topbar">

<h1 class="page-title">
Manage Blogs
</h1>

<a href="add-blog.php" class="add-btn">
+ Add New Blog
</a>

</div>

<div class="table-box">

<table class="table">

<thead>

<tr>

<th>ID</th>
<th>Image</th>
<th>Title</th>
<th>Category</th>
<th>Date</th>
<th>Actions</th>

</tr>

</thead>

<tbody>

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<tr>

<td>
<?php echo $row['id']; ?>
</td>

<td>

<img 
src="http://localhost/blog-system/uploads/<?php echo $row['image']; ?>" 
class="blog-image">

</td>

<td class="blog-title">
<?php echo $row['title']; ?>
</td>

<td>

<span class="category-badge">
<?php echo $row['category']; ?>
</span>

</td>

<td>
<?php echo $row['created_at']; ?>
</td>

<td>

<a 
href="edit-blog.php?id=<?php echo $row['id']; ?>"
class="action-btn edit-btn">

Edit

</a>

<a 
href="delete-blog.php?id=<?php echo $row['id']; ?>"
class="action-btn delete-btn"
onclick="return confirm('Delete this blog?')">

Delete

</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</body>
</html>