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
    $query="SELECT * FROM users_2";
    $result=mysqli_query($conn,$query);
    ?>

    <table border="2">
        <tr>
        <th>User ID</th>
        <th>First Name</th>
        <th width="5%">Last Name</th>
        <th>DOB</th>
        <th width="6%">Phone Number</th>
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
        $status=null;

        if($row['active_status']==1)
        {
            $status="Active";
        }
        else if($row['active_status']==0)
        {
            $status="Deactive";
        }
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
                <td>".$status."</td>

                <td><a href='update_design.php?id=$row[user_id]'><input type='submit' value='Update' class='update'</a>
                <a href='delete.php?id=$row[user_id]'><input type='submit' value='Delete' class='delete'</a></td>
             </tr>"; 
        
    }
    $conn->close();

    //echo $row["id"]." ".$row["first_name"]." ".$row["last_name"]." ".$row["dob"]." ".$row["number"]." ".$row["email"]." ".$row["address"]." ".$row["city"]." ".$row["state"]." ".$row["gender"]." ".$row["profile_picture"]." ".$row["user_status"]." ".$row["active_status"]."<br>";
    
?>
</table>

<?php
echo "<br>";
echo "<a href='users.php'>Back to User Registration Form</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='cat.html'>Category Registration Form</a>";


?>