<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Personal Details </title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="users_validation.js"></script>
  
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <br><br>
    <div class="title">Personal Details</div>
    <div class="content">
      <form action="users_1.php" name="reg_form" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
        <div class="user-details">
          <div class="input-box">
            <span class="details">First Name</span>
            <input type="text" placeholder="Enter your first name" name="first_name" id="first_name" onkeyup="white(this.value)" required>
          </div>
          <p>
            <error id="alert-caps"></error>
          </p>
          <div class="input-box">
            <span class="details">Last Name</span>
            <input type="text" placeholder="Enter your last name" name="last_name" id="last_name" required>
          </div>
          <div class="input-box">
            <span class="details">Date of Birth</span>
            <input type="date" placeholder="Enter your DOB" name="dob" id="dob" class="datepicker" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number" placeholder="Enter your number" name="number" id="number" onkeypress="return isNumber(event)" required><span class="formerror"></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email address" name="email" required><span class="formerror"></span>
          </div>
          <div class="input-box">
            <span class="details">Address</span>
            <textarea name="address" id="address" placeholder="Enter your address" cols="42" rows="5"></textarea>
          </div>
          <div class="input-box">
            <span class="details">City</span>
            <input type="text" placeholder="Enter your city" name="city" required>
          </div>
          <div class="input-box">
            <span class="details">State</span>
            <input type="text" placeholder="Enter your state" name="state" required>
          </div>
          <div class="input-box">
            <span class="details">Pincode</span>
            <input type="number" placeholder="Enter your pincode" name="pincode" required>
          </div>
          <div class="input-box">
            <span class="details">Profile Picture (jpg, jpeg and png)</span>
            <input type="file" name="profile_picture" id="profile_picture" required>
            
            
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="male" id="dot-1" required>
          <input type="radio" name="gender" value="female" id="dot-2" required>
          <input type="radio" name="gender" value="others" id="dot-3" required>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Submit">
        </div>
      </form>
      <div class="nav_next">
        <a href="users_listing.php"><input class="next" type="submit" value="Next"></a>
      </div>
      
    </div>
  </div>
</body>

<script type="text/javascript">
  var pattern=/\s/g;
  var alert=document.getElementbyId('alert-caps');
  function white(data){
    var isSpace=pattern.test(data);
    if(isSpace){
      alert.innerText="Space not allowed";
    }
  else{
    alert.innerText="";
  }
}

</script>

</html>
