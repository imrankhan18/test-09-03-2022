<?php 
session_start();
include("./db.php");
include_once("./index.php");
// class User extends DB{
//     public string $productname;
//     public string $price;
// public function products($productname,$price){
//     $this->productname=$productname;
//     $this->price=$price;
// }
// function addList($name,$id,$price)
// {
//     $add=new Cart();
//     $add->Detail($rname,$id,$price);
//     $add->addList($add);
// }
function addToList($name,$id,$price){
    DB::getInstance()->exec("INSERT INTO addproducts(product_name,product_id,product_price) 
    VALUES('$name','$id','$price');"
    );
    

}
function fetchDetails(){    
    $stmt = DB::getInstance()->prepare("SELECT * from  addproducts ");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt->fetchAll();
}
function showDetails(){
    $details=fetchDetails();
    $_SESSION['display']='';
    $_SESSION['display'].="<form action='index.php' method='post'><table><tr><th>Product Name</th><th>Product ID</th><th>Product Price</th></tr>";
   foreach($details as $key => $val){
    $_SESSION['display'].=
    "<tr>
    <td><input value='".$val['product_name']."' name='name-" . $val['product_id'] . "'></td>
    <td><input value='".$val['product_id']."' name='update-" . $val['product_id'] . "'></td>
    <td><input value='".$val['product_price']."' name='update-" . $val['product_id'] . "'></td>
    <td><button name='edit' value='".$val['product_id']."'>Update</button></td>
    <td><a href='index.php?pid=".$val['product_id']."' >Delete</a></td></tr>";
    
   }
   $_SESSION['display'].="</table></from>";
}

function delete($id){
    DB::getInstance()->exec("DELETE FROM addproducts WHERE product_id=$eid");
    header("loaction:index.php");
}
// function editDetails($eid){
//     $editdeails=fetchDetails();

// $_SESSION['editdetails']="";
// foreach($editdetails as $key => $val){
//  $_SESSION['display']="<form action='edit' method='post'>
//  <tr>
//  <td>".$val['product_name']."</td>
//  <td>".$val['product_id']."</td>
//  <td>".$val['product_price']."</td>
// </table></from>";
// }


function updateProducts($updated_value,$updated_name,$eid)
{
    DB::getInstance()->exec("UPDATE addproducts SET product_name='$updated_name', product_price ='$updated_value', product_price='$updated_value' WHERE product_id=$eid");
}


?>
