<head>
    <style>
        .img{
            width: 50%;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>

<?php

$prod_id=$_GET['prod_id']; 

$conn=new mysqli('localhost','root','','crud_demo');
if($conn->connect_error){
    die("Connection Failed: ".$conn->connect_error);
}

$query="SELECT pi_url from prod_images where pi_prod_id='$prod_id'";

$data=mysqli_query($conn,$query);

?>

<table border="2">
    <tr>
        <th width="40px">No.</th>
        <th width="400px">Image</th>
    </tr>


<?php
while($result=mysqli_fetch_assoc($data)){
    $no=1;

    ?>
    <tr>
        <td><?php echo $no ?></td>
        <td><img class="img" src="<?php echo $result['pi_url'];?>"></td>
    </tr>
    <?php
    $no++;
}
?>
</table>