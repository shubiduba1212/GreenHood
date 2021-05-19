<?php
    $code = $_GET["code"];
    if($code == "shop_code"){
      $shop_code = $_GET["num"];
      $userid = $_GET["userid"];
      $class_code = "";
      $price = $_GET["price"];

      include "./db_con.php";
      $sql = "select * from cart where id='$userid' and shop_code='$shop_code'";
    }else{
    $class_code = $_GET["num"];
    $userid = $_GET["userid"];
    $shop_code = "";
    $price = $_GET["price"];

      include "./db_con.php";
      $sql = "select * from cart where id='$userid' and class_code='$class_code'";
    }
   
    $result = mysqli_query($con, $sql);
    $cur_cart = mysqli_num_rows($result);  //하나라도 존재한다면 숫자 1이라는 값으로 반환
  if($cur_cart){  //현재 동일 아이디 사용자가 특정 제품을 장바구니에 추가한 내용이 DB에 존재한다면
    $added= "added"; 
  }else{
    $added = "Now";
		$sql= "insert into cart (id, shop_code, class_code, price)";
		$sql.="values('$userid', '$shop_code', '$class_code', '$price')";
    //var_dump($sql);
    mysqli_query($con, $sql);

    $sql1= "select * from cart where id='$userid'";
    $result = mysqli_query($con, $sql1);
    $cart_num = mysqli_num_rows($result);

    mysqli_close($con);
  }

  $json_list = [$added, $cart_num];
	echo json_encode($json_list);

?>