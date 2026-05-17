<?php
include("config/db.php");

$query = "SELECT * FROM blogs ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$cat_query = "SELECT DISTINCT category FROM blogs";
$cat_result = mysqli_query($conn, $cat_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>INDIAN BLOGS</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    border-bottom:1px solid #e2e8f0;
    padding:20px 0;
    box-shadow:0 2px 10px rgba(0,0,0,0.05);
}

.brand-text{
    font-size:32px;
    font-weight:700;
    color:#0f172a;
}

.admin-icon{
    width:45px;
    height:45px;
    background:#0f172a;
    color:white;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    text-decoration:none;
    font-size:20px;
    transition:0.3s;
}

.admin-icon:hover{
    background:#2563eb;
    transform:scale(1.05);
    color:white;
}

.hero{
    padding:30px 0;
    text-align:center;
}

.search-box{
    height:55px;
    border-radius:16px;
    border:none;
    padding-left:20px;
    box-shadow:0 5px 15px rgba(0,0,0,0.08);
    font-size:16px;
}

.search-box:focus{
    box-shadow:0 5px 20px rgba(59,130,246,0.25);
    border:none;
}

.filter-btn{
    border:none;
    padding:10px 25px;
    border-radius:30px;
    margin:5px;
    background:white;
    color:#0f172a;
    border:1px solid #cbd5e1;
    transition:0.3s;
    font-weight:500;
}

.filter-btn:hover{
    background:#3b82f6;
    color:white;
    transform:translateY(-2px);
}

.blog-card{
    background:white;
    border:none;
    border-radius:20px;
    overflow:hidden;
    transition:0.3s;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    height:100%;
    cursor:pointer;
}

.blog-card:hover{
    transform:translateY(-8px);
}

.blog-image{
    width:100%;
    height:220px;
    object-fit:cover;
}

.blog-content{
    padding:20px;
}

.blog-title{
    font-size:24px;
    font-weight:600;
    margin-bottom:10px;
    color:#0f172a;
}

.blog-desc{
    color:#64748b;
    font-size:15px;
}

.blog-date{
    color:#94a3b8;
    font-size:14px;
}

.category-badge{
    background:linear-gradient(135deg,#3b82f6,#06b6d4);
    padding:8px 15px;
    border-radius:20px;
    font-size:13px;
    display:inline-block;
    margin-top:10px;
    color:white;
}

.footer{
    text-align:center;
    padding:40px 0;
    color:#64748b;
}

@media(max-width:768px){

.brand-text{
    font-size:24px;
}

.hero{
    padding:20px 10px;
}

.filter-btn{
    padding:8px 18px;
    font-size:14px;
}

.blog-title{
    font-size:20px;
}

.blog-image{
    height:200px;
}

.admin-icon{
    width:40px;
    height:40px;
}

}

</style>

</head>

<body>

<div class="navbar-custom">

<div class="container d-flex justify-content-between align-items-center">

<h2 class="brand-text m-0">
INDIAN BLOGS
</h2>

<a 
href="admin/login.php"
class="admin-icon">

👤

</a>

</div>

</div>

<div class="hero">

<div class="container">

<div class="row justify-content-center mb-4">

<div class="col-lg-6">

<input 
type="text"
id="search"
class="form-control search-box"
placeholder="Search blogs...">

</div>

</div>

<button class="filter-btn" onclick="location.reload()">
All Blogs
</button>

<?php while($cat = mysqli_fetch_assoc($cat_result)) { ?>

<button 
class="filter-btn"
data-category="<?php echo $cat['category']; ?>">

<?php echo $cat['category']; ?>

</button>

<?php } ?>

</div>

</div>

<div class="container pb-5">

<div class="row" id="blog-data">

<?php while($row = mysqli_fetch_assoc($result)) { ?>

<div class="col-lg-4 col-md-6 mb-4">

<a 
href="blog.php?id=<?php echo $row['id']; ?>" 
style="text-decoration:none; color:inherit;">

<div class="blog-card">

<img 
src="http://localhost/blog-system/uploads/<?php echo $row['image']; ?>" 
class="blog-image">

<div class="blog-content">

<h3 class="blog-title">
<?php echo $row['title']; ?>
</h3>

<p class="blog-desc">
<?php echo $row['short_desc']; ?>
</p>

<p class="blog-desc">
<?php echo substr($row['content'],0,120); ?>...
</p>

<p class="blog-date">
<?php echo $row['created_at']; ?>
</p>

<div class="category-badge">
<?php echo $row['category']; ?>
</div>

</div>

</div>

</a>

</div>

<?php } ?>

</div>

</div>

<div class="footer">
© 2026 INDIAN BLOGS
</div>

<script>

$(document).ready(function(){

    $(".filter-btn").click(function(){

        var category = $(this).data("category");

        if(category == undefined){
            return;
        }

        $.ajax({

            url:"ajax/filter.php",

            method:"POST",

            data:{category:category},

            success:function(data){

                $("#blog-data").html(data);

            }

        });

    });

    $("#search").keyup(function(){

        var search = $(this).val();

        $.ajax({

            url:"ajax/search.php",

            method:"POST",

            data:{search:search},

            success:function(data){

                $("#blog-data").html(data);

            }

        });

    });

});

</script>

</body>
</html>