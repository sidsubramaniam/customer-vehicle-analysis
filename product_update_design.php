<?php
$prod_id=$_GET['prod_id'];
$conn=new mysqli('localhost','root','','crud_demo');
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }

    $query_user="SELECT user_id,first_name from users_2";
    $result=mysqli_query($conn,$query_user);
    $row=mysqli_fetch_assoc($result);
    
    
    $query_cat="SELECT cat_id,cat_name from cat";
    $result_cat=mysqli_query($conn,$query_cat);
    $row_cat=mysqli_fetch_assoc($result_cat);

    $query_data="SELECT * from prod where prod_id='$prod_id'";
    $result_data=mysqli_query($conn,$query_data);
    $row_data=mysqli_fetch_assoc($result_data);

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Product Details </title>
    <link rel="stylesheet" href="style.css">
    <script src="product_validation.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <br><br>
    <div class="title">Product Details</div>
    <div class="content">
      <form action="product_update_backend.php"  method="post" enctype="multipart/form-data" onsubmit="">
      <input type="hidden" value="<?php echo $prod_id ?>" name="prod_id">
        <div class="user-details">
          <div class="input-box">
            <span class="details">User ID</span>
            <select name="user_id" id="user_id">
                <option value="">Select User</option>
                <?php while($row=mysqli_fetch_assoc($result))
                {echo 
                    "<option value=".$row['user_id']." ".print_r($row['first_name'])."</option>";
                }
              
              ?>
            </select>
            
          </div>
          <div class="input-box">
            <span class="details">Category ID</span>
            <select name="cat_id" id="cat_id">
                <option value="">Select Category</option>
            <?php while($row_cat=mysqli_fetch_assoc($result_cat))
                {echo 
                    "<option value=".$row_cat['cat_id']." ".print_r($row_cat['cat_name'])."</option>";
                }
                
              ?>
              
            </select>
            
          </div>
          <div class="input-box">
            <span class="details">Product Description</span>
            <textarea name="prod_desc" placeholder="Enter Product Description" id="prod_desc" cols="42" rows="5" required><?php echo $row_data['prod_desc']?></textarea>
          </div>
          <div class="input-box">
            <span class="details">Product Images</span>
            <input type="file" name="prod_images" id="prod_images" multiple required>            
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