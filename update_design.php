<?php
$user_id=$_GET['id'];
$conn=new mysqli('localhost','root','','crud_demo');
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }
$query="SELECT * FROM users_2 where user_id='$user_id'";
$result=mysqli_query($conn,$query);
$row=mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Update Details </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="users_validation.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <br><br>
    <div class="title">Update Details</div>
    <div class="content">
      <form action="update_backend.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo $user_id ?>" name="user_id">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" value="<?php echo $row['first_name'] ?>" placeholder="Enter your first name" name="first_name" required>
          </div>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" value="<?php echo $row['last_name'] ?>" placeholder="Enter your last name" name="last_name" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" value="<?php echo $row['dob'] ?>" placeholder="Enter your DOB" name="dob" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" value="<?php echo $row['number'] ?>" placeholder="Enter your number" name="number" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" value="<?php echo $row['email'] ?>" placeholder="Enter your email address" name="email" required>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <textarea name="address" id="address" placeholder="Enter your address" cols="42" rows="5" required><?php echo $row['address'] ?></textarea>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" value="<?php echo $row['city'] ?>" placeholder="Enter your city" name="city" required>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" value="<?php echo $row['state'] ?>" placeholder="Enter your state" name="state" required>
          </div>
          <div class="input-box">
            <span class="details">Pincode</span>
            <input type="number" value="<?php echo $row['pincode'] ?>" placeholder="Enter your pincode" name="pincode" required>
          </div>
          <div class="input-box">
            <span class="details">Profile Picture</span>
            <input type="file" value="" name="profile_picture" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="male" 
          
          
          id="dot-1">
          <input type="radio" name="gender" value="female"
          
          id="dot-2">
          <input type="radio" name="gender" value="others"
         
          id="dot-3">
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender"
                
            >Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender"
                
            >Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender"
                
            >Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Update" name="update">
        </div>
      </form>
    </div>
  </div>

</body>





