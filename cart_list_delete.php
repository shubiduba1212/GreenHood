<?php
    $num = $_GET["num"];
    $code = $_GET["code"];
    include "./db_con.php";
    if($code == "shop"){
      $sql2 = "delete from cart where shop_code='$num'";
    }else{
      $sql2 = "delete from cart where class_code='$num'";
    }
    var_dump($sql2);
		mysqli_query($con, $sql2);
		mysqli_close($con);

  
  echo("
    <script>
    location.href = './cart_list.php';
    </script>
  ");
?>