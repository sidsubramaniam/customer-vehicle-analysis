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
$conn=new mysqli('localhost','root','','crud_demo');
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}
$user_id=$_GET['id'];

$query="delete from users_2 where user_id='$user_id'";
$data=mysqli_query($conn,$query);

if($data)
{
  echo "<br>";
  echo "RECORD DELETED";
  echo "<br><br><hr><br>";
}
else{
  echo "FAILED TO DELETE";
}


$query="SELECT * FROM users_2";
$result=mysqli_query($conn,$query);


?>
<table border="2">
    <tr>
    <th>ID</th>
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
echo "<a href='users.php'>Back to User Registration Form</a>";
echo "<br><br>";
?>
