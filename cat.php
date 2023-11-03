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

$cat_code=$_POST["cat_code"];
$cat_name=$_POST["cat_name"];
$cat_desc=$_POST["cat_desc"];
$cat_index=$_POST["cat_index"];
$cat_active_status;

$conn=new mysqli('localhost','root','','crud_demo');
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}else{
    
    
    $stmt=$conn->prepare("insert into cat(cat_code,cat_name,cat_desc,cat_index,cat_active_status)values(?,?,?,?,1)");
    $stmt->bind_param("sssi",$cat_code,$cat_name,$cat_desc,$cat_index);
    $stmt->execute();
    
    echo "<br> PRODUCT CATEGORY REGISTERED <br><br>";
    echo "<hr><br>";
    
    $stmt->close();
    $conn->close();

}

?>
<?php
    $conn=new mysqli('localhost','root','','crud_demo');
    if($conn->connect_error){
        die("Connection Failed: ".$conn->connect_error);
    }
    $query="SELECT * FROM cat";
    $result=mysqli_query($conn,$query);
    ?>

    <table border="2">
        <tr>
        <th>Cat_ID</th>
        <th>Category Code</th>
        <th>Category Name</th>
        <th>Category Index</th>
        <th>Category Description</th>
        <th>Active Status</th>
        <th>Operations</th>
        </tr>
   

    <?php
    while($row=mysqli_fetch_assoc($result))
    {
       echo "<tr>
                <td>".$row["cat_id"]."</td>
                <td>".$row["cat_code"]."</td>
                <td>".$row["cat_name"]."</td>
                <td>".$row["cat_index"]."</td>
                <td>".$row["cat_desc"]."</td>
                
                <td>".$row["cat_active_status"]."</td>

                <td><a href='cat_update_design.php?cat_id=$row[cat_id]'><input type='submit' value='Update' class='update'</a>
                <a href='cat_delete.php?cat_id=$row[cat_id]'><input type='submit' value='Delete' class='delete'</a></td>
             </tr>"; 
        
    }
    $conn->close();

    
    
?>
</table>

<?php
echo "<br>";
echo "<a href='cat.html'>Back to Product Category Form</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='product.php'>Product Entry Form</a>";
echo "<br><br>";
?>