<?php

include("../config/db.php");

$search = $_POST['search'];

$query = "SELECT * FROM blogs 
WHERE title LIKE '%$search%' 
OR category LIKE '%$search%'
OR short_desc LIKE '%$search%'
ORDER BY id DESC";

$result = mysqli_query($conn,$query);

while($row = mysqli_fetch_assoc($result)) {

?>

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