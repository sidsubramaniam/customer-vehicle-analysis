<head>
<style>
    .delete{
            background-color: rgb(192, 87, 87);
            font-weight: bold;
            cursor: pointer;
        }
          
    .update{
            background-color: rgb(111, 200, 116);
            font-weight: bold;
            cursor: pointer;
        }
        
</style>
</head>

<?php

$user_id=$_POST['user_id'];
$first_name=$_POST["first_name"];
$last_name=$_POST["last_name"];
$dob=$_POST["dob"];
$number=$_POST["number"];
$email=$_POST["email"];
$address=$_POST["address"];
$city=$_POST["city"]; 
$state=$_POST["state"]; 
$pincode=$_POST["pincode"]; 
$gender=$_POST["gender"];
$profile_picture=$_FILES["profile_picture"]['name'];
$active_status;

if(!isset($profile_picture)){
    die('No file uploaded.');
}

move_uploaded_file(
    $profile_picture,
   
    __DIR__ ."/images/". $profile_picture

);

//basically the uploaded file gets sent to the folder that u specify


$conn=new mysqli('localhost','root','','crud_demo');
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}else{
    
    
    $query="update users_2 set first_name='$first_name',last_name='$last_name',dob='$dob',number='$number',email='$email',address='$address',city='$city',state='$state',pincode='$pincode',gender='$gender',profile_picture='$profile_picture' where user_id='$user_id'";
    
    $data=mysqli_query($conn,$query);

    if($data)
    {
        echo "UPDATE SUCCESSFUL";
        echo "<br><hr>";
    }
    else
    {
        echo "update unsuccessful";
    }

    $conn->close();

}
?>

<?php
$conn=new mysqli('localhost','root','','crud_demo');
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}
$query="SELECT * FROM users_2";
$result=mysqli_query($conn,$query);


?>
<table border="2">
    <tr>
    <th>User ID</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>DOB</th>
    <th>Phone Number</th>
    <th>Email</th>
    <th>Address</th>
    <th>City</th>
    <th>State</th>
    <th>Pincode</th>
    <th>Gender</th>
    <th>Profile Picture</th>
    <th width="4%">User Status</th>
    <th width="4%">Active Status</th>
    <th width="10%">Operations</th>
    
    </tr>


<?php

while($row=mysqli_fetch_assoc($result))
{
   echo "<tr>
            <td>".$row["user_id"]."</td>
            <td>".$row["first_name"]."</td>
            <td>".$row["last_name"]."</td>
            <td>".$row["dob"]."</td>
            <td>".$row["number"]."</td>
            <td>".$row["email"]."</td>
            <td>".$row["address"]."</td>
            <td>".$row["city"]."</td>
            <td>".$row["state"]."</td>
            <td>".$row["pincode"]."</td>
            <td>".$row["gender"]."</td>
            <td>".$row["profile_picture"]."</td>
            <td>".$row["user_status"]."</td>
            <td>".$row["active_status"]."</td>

            <td><a href='update_design.php?id=$row[user_id]'><input type='submit' value='Update' class='update'</a>
                <a href='delete.php?id=$row[user_id]'><input type='submit' value='Delete' class='delete'</a></td>
         </tr>"; 
    
}

$conn->close();
?>
</table>


<?php
echo "<br>";
echo "<a href='index.html'>Back to User Registration Form</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='cat.html'>Category Registration Form</a>";


?>
