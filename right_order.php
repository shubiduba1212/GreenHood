<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Cart</title>  
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/cart.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>CART</h2>
      </div>
    </div>
  </div>
  <div id="cart_box">
  <h3>Cart list&nbsp;&gt;&nbsp;Order</h3>
    <ul class="cart_list">
<?php
 include "./db_con.php";
  $num = $_GET["num"];
  $code = $_GET["code"];
  if($code == "shop"){
    $sql = "select * from shopping where num='$num'";
  }else{
    $sql = "select * from class where num='$num'";
  }
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $brand = $row["brand"];
  $product = $row["product"];
  $price = number_format($row["price"]); 
  if($code == "shop"){
    $file_copied = "./data/shopping/".$row["file_copied"];
  }else{
    $file_copied = "./data/class/".$row["file_copied"];
  }             

             
?>
      <li>
<?php
          if($code == "shop"){
?>              
                <a href="./shop_view.php?num=<?=$shop_code?>">
<?php
          }else{
?>
                <a href="./class_view.php?num=<?=$class_code?>">
<?php             
          }
?>
          <div class="pd_img">
              <img src="<?=$file_copied?>" alt="<?=$brand?>&#124;<?=$product?>">
          </div>
          <div class="pd_txt">
            <h3 class="pd_brand"><?=$brand?></h3>
            <p class="pd_name"><?=$product?></p>
          </div>
        </a>
        <div class="pd_info">
            <div class="pd_price"><span><?=$price?></span>원</div>            
        </div>
        <div class="buttons">
<?php
          if($code == "shop"){
?>              
                <button type="button" class="cart_del" onclick="location.href='./shop_list.php?sort=num'">삭제하기</button>
<?php
          }else{
?>
                <button type="button" class="cart_del" onclick="location.href='./class_list.php?sort=num'">삭제하기</button>
<?php             
          }
?>                       
        </div>
      </li>
    </ul>
    <div class="order">
          <div class="total_price">
            <p>총 주문(신청)&nbsp;금액&nbsp;:&nbsp;<span><?=$price?></span>&nbsp;원</p>
          </div>
          <button type="button" class="checkOut">주문(신청)하기</button> 
    </div>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/cart.js"></script>
</body>
</html>