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
 $sql1 = "select * from cart where id='$userid' order by num desc";
 $result = mysqli_query($con, $sql1);
 $total_record = mysqli_num_rows($result); //장바구니 개수를 파악하기 위함
// $row = mysqli_fetch_array($result); 
 if(!$total_record){
?>
      <li class="emp_cart">장바구니가 비었습니다.</li>
<?php
  }else{

        for($i=0; $i<$total_record; $i++){
//        if($shop_code){
//          $sql2 = "select * from shopping where num='$shop_code' order by num desc";
//          $result = mysqli_query($con, $sql2);
          mysqli_data_seek($result, $i);
          $row = mysqli_fetch_array($result);
          $shop_code = $row["shop_code"];
          $class_code = $row["class_code"];
          $shop = "shop";
          $class = "class";

          if($shop_code){
            $sql2 = "select * from shopping where num='$shop_code' order by num desc";
            $result2 = mysqli_query($con, $sql2);
            $row = mysqli_fetch_array($result2);
            $brand = $row["brand"];
            $product = $row["product"];
            $price = number_format($row["price"]);
            $price2 = $row["price"];            
            $file_copied = "./data/shopping/".$row["file_copied"];  
          }else{
            $sql3 = "select * from class where num='$class_code' order by num desc";
            $result3 = mysqli_query($con, $sql3);
            $row = mysqli_fetch_array($result3);
            $brand = $row["title"];
            $product = $row["tutor"];
            $price = number_format($row["price"]);
            $price2 = $row["price"]; 
            $file_copied = "./data/class/".$row["file_copied"];
          }

             
?>
      <li>
<?php
          if($shop_code){
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
          if($shop_code){
?>              
                <button type="button" class="cart_del" onclick="location.href='./cart_list_delete.php?num=<?=$shop_code?>&code=<?=$shop?>'">삭제하기</button>
<?php
          }else{
?>
                <button type="button" class="cart_del" onclick="location.href='./cart_list_delete.php?num=<?=$class_code?>&code=<?=$class?>'">삭제하기</button>
<?php             
          }
?>                       
        </div>
      </li>
<?php 
         $total_price += $price2;
         $total_price2 = number_format($total_price);
        }
      }
?>      
    </ul>
    <div class="order">
          <div class="total_price">
            <p>총 주문(신청)&nbsp;금액&nbsp;:&nbsp;<span><?=$total_price2?></span>&nbsp;원</p>
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