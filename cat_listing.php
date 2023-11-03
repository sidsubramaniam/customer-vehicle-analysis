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
        $status=null;
        if($row["cat_active_status"]==1)
        {
            $status="Active";
        }
        else if($row["cat_active_status"]==0)
        {
            $status="Deactive";
        }

       echo "<tr>
                <td>".$row["cat_id"]."</td>
                <td>".$row["cat_code"]."</td>
                <td>".$row["cat_name"]."</td>
                <td>".$row["cat_index"]."</td>
                <td>".$row["cat_desc"]."</td>
                
                <td>".$status."</td>

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