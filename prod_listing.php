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
    $conn=new mysqli('localhost','root','','crud_demo');
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }

    $query="SELECT prod.prod_id, users_2.first_name, cat.cat_name, prod.prod_name, prod.prod_active_status FROM prod 
    left JOIN users_2 ON users_2.user_id=prod.user_id and users_2.active_status=1 
    left JOIN cat on cat.cat_id=prod.cat_id and cat.cat_active_status=1 ";

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
        $status=null;
        if($row["prod_active_status"] ==1)
        {
            $status = "Active";
        }
        else if($row["prod_active_status"] ==0)
        {
            $status = "Deactive";
        }
       
        $pi_prod_id=$row['prod_id'];
       echo "<tr>
                <td>".$row["prod_id"]."</td>
                <td>".$row["first_name"]."</td>
                <td>".$row["cat_name"]."</td>
                <td>".$row["prod_name"]."</td>
                <td>".$status."</td>

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