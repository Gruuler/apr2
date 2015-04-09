<?php
include("connect.php");
$sTerm="";
if(!empty($_GET["sTerm"])){
  $sTerm = $_GET["sTerm"];
}
$sql = "SELECT id,name,image,price FROM products WHERE (name LIKE '%$sTerm%' OR description LIKE '%$sTerm%') LIMIT 10";

if(!empty($_GET["sCat"]) and $_GET["sCat"]>0){
  $sCat = $_GET["sCat"];
  $sql = "SELECT id,name,price FROM products WHERE (name LIKE '%$sTerm%' OR description LIKE '%$sTerm%') AND cat_id=$sCat LIMIT 10";
}
$results = mysqli_query($link,$sql);
echo (!$results?die(mysqli_error($link)."<br>".$sql):"");
$count=mysqli_num_rows($results);
for($i=0;$i<$count;$i++){
  /*
   $array = mysqli_fetch_array($results);
   $id=$array[0];
   $name=$array[1];

  */
  list($id,$name,$price) = mysqli_fetch_array($results);
  //first array index is row number. Do not put variable name as the first array index because if a variable is missing for a row then it will mess up the count of rows. 
  $rows[$i]["id"]=$id;
  $rows[$i]["name"]=$name;
  $rows[$i]["price"]=$price;
}
echo json_encode($rows);
?>