<?php
$cat_id=$_GET['cat_id'];
$conn=new mysqli('localhost','root','','crud_demo');
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }
$query="SELECT * FROM cat where cat_id='$cat_id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Product Category Details </title>
    <link rel="stylesheet" href="style.css">
    <script src="category_validation.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <br><br>
    <div class="title">Product Category Details</div>
    <div class="content">
      <form action="cat_update_backend.php" name="reg_form" method="post" enctype="multipart/form-data">
      <input type="hidden" value="<?php echo $cat_id ?>" name="cat_id">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Category Code</span>
            <input type="text" value="<?php echo $row['cat_code']?>" placeholder="Enter category code" name="cat_code" id="cat_code" required>
          </div>
          <div class="input-box">
            <span class="details">Category Name</span>
            <input type="text" value="<?php echo $row['cat_name']?>" placeholder="Enter category name" name="cat_name" id="cat_name" required>
          </div>
          <div class="input-box">
            <span class="details">Category Index</span>
            <input type="number" value="<?php echo $row['cat_index']?>" placeholder="Enter category index" name="cat_index" id="cat_index" required>
          </div>
          <div class="input-box">
            <span class="details">Category Description</span>
            <textarea name="cat_desc" id="cat_desc" placeholder="Enter category description" cols="42" rows="5" required><?php echo $row['cat_desc']?></textarea>
          </div>
        </div>
        
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
    </div>
  </div>
</body>

</html>