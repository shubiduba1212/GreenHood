<?php
 $userid = $_GET["userid"];
 $code_num = $_GET["num"];
 $code = $_GET["code"];
 include "./db_con.php";
 if($code == "shop"){
   $cross_check= "delete_shop"; 
   $sql = "delete from fav where id='$userid' and shop_code='$code_num'";
   mysqli_query($con, $sql);
 }else{
  $cross_check= "delete_class"; 
  $sql = "delete from fav where id='$userid' and class_code='$code_num'";
  mysqli_query($con, $sql);
 }
 

 mysqli_close($con);

 $json_list = [$cross_check];
 echo json_encode($json_list);
?>