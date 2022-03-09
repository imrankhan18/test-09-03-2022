<?php
include_once("./user.php");
if(isset($_POST['addToList'])){
    $name=$_POST['pname'];
    $id=$_POST['pid'];
    $price=$_POST['pprice'];
    addToList($name, $id, $price);
}
if(isset($_GET['pid'])){
    $id=$_GET['pid'];
    delete($id);
}
if(isset($_POST['edit'])){
    $eid=$_POST['edit'];
    echo $eid;
    $updated_value=$_POST['update-'.$eid ];
    $updated_name=$_POST['name-'.$eid];
    updateProducts($updated_value,$updated_name, $eid); 
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
    <h4>Product Name:<input type="text" name="pname" placeholder="product name" ></h4>
    <h4>Product ID:<input type="number" name="pid" placeholder="product id" ></h4>
    <h4>Product Price:<input type="text" name="pprice" placeholder="product price"></h4>
    <button name="addToList" value="submit">Submit</button>
    <div>
        <?php 
        showDetails();
        echo $_SESSION['display']
        ?>
    </div>

</form>
</body>
</html>