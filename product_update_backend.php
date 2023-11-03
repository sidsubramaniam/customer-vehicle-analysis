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

    .view{
        background-color: #79b6da;
        cursor: pointer;
        font-weight: bold;
    }
        
</style>
</head>

<?php

$prod_id=$_POST["prod_id"];
$user_id=$_POST["user_id"];
$cat_id=$_POST["cat_id"];
$prod_desc=$_POST["prod_desc"];
$prod_active_status;

$conn=new mysqli('localhost','root','','crud_demo');
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}else{
    
    $query="update prod set user_id='$user_id',cat_id='$cat_id',prod_desc='$prod_desc' where prod_id='$prod_id'";

    $data=mysqli_query($conn,$query);

    if($data)
    {
        echo "<br>";
        echo "RECORD UPDATED";
        echo "<br><br><hr><br>";
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

    $query="SELECT prod.prod_id, users_2.first_name, cat.cat_name, prod.prod_name, prod.prod_active_status FROM users_2 JOIN prod ON users_2.user_id=prod.user_id INNER JOIN cat on prod.cat_id=cat.cat_id";

    $data=mysqli_query($conn,$query);
    ?>

    <table border="2">
        <tr>
        <th>Prod ID</th>
        <th>User Name</th>
        <th>Category Name</th>
        <th>Product Name</th>
        <th>Active Status</th>
        <th width="15%">Operations</th>
        
        </tr>
   

    <?php
    while($row=mysqli_fetch_assoc($data))
    {
        $pi_prod_id=$row['prod_id'];
       echo "<tr>
                <td>".$row["prod_id"]."</td>
                <td>".$row["first_name"]."</td>
                <td>".$row["cat_name"]."</td>
                <td>".$row["prod_name"]."</td>
                <td>".$row["prod_active_status"]."</td>

                <td><a href='product_images.php?prod_id=$row[prod_id]'><input type='submit' value='View Images' class='view'</a>
                <a href='product_update_design.php?prod_id=$row[prod_id]'><input type='submit' value='Update' class='update'</a>
                <a href='product_delete.php?prod_id=$row[prod_id]'><input type='submit' value='Delete' class='delete'</a></td>
                
             </tr>"; 
        
    }
    $conn->close();

    
    
?>
</table>

<?php
echo "<br>";
echo "<a href='product.php'>Back to Product Entry Form</a>";
echo "<br><br>";
?>

<?php

$conn=new mysqli('localhost','root','','crud_demo');

if(!isset($prod_images)){
    die('No file uploaded.');
}

$fileCount=count($_FILES['prod_images']['name']);
for($i=0;$i<$fileCount;$i++){
    $fileName=$_FILES['prod_images']['name'][$i];

    $fileLoc='C:/xampp/htdocs/internship/responsive registration form/prod_images/'.$fileName;

    move_uploaded_file($_FILES['prod_images']['tmp_name'][$i],$fileLoc);

    $query_images="insert into prod_images(pi_prod_id,pi_name,pi_url)values('$pi_prod_id','$fileName','$fileLoc')";
    $result=mysqli_query($conn,$query_images);
    
    

}

$conn->close();

?>