<?php
  $code = $_GET["code"];
  if($code == "shop_code"){
    $shop_code = $_GET["num"];
    $userid = $_GET["userid"];
    $class_code = "";

    include "./db_con.php";
    $sql = "select * from fav where id='$userid' and shop_code='$shop_code'";
  }else{
    $class_code = $_GET["num"];
    $userid = $_GET["userid"];
    $shop_code = "";

    include "./db_con.php";
    $sql = "select * from fav where id='$userid' and class_code='$class_code'";
  }
  
  $result = mysqli_query($con, $sql);
  $fav_num = mysqli_num_rows($result);
  if(!$fav_num){
    $cross_check= "add"; 
    $sql1= "insert into fav (id, shop_code, class_code, fav_value)";
    $sql1.= "values('$userid', '$shop_code', '$class_code', 1)";   
    mysqli_query($con, $sql1);
  }else{
    $cross_check= "delete"; 
    if($code == "shop_code"){
      $sql2 = "delete from fav where id='$userid' and shop_code='$shop_code'";
    }else{
      $sql2 = "delete from fav where id='$userid' and class_code='$class_code'";
    }
    
    mysqli_query($con, $sql2);
  }
  
  mysqli_close($con);



  $json_list = [$cross_check, $fav_num];
  echo json_encode($json_list);



?>