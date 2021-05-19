<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GREENHOOD ｜ Shopping</title>
	<link rel="shortcut icon" href="./img/logo.png">
	<link rel="stylesheet" href="./css/common_fixed.css">
	<link rel="stylesheet" href="./css/shopping.css">
</head>
<body>
	<header>
		<?php include "./header_fixed.php" ?>
	</header>
	<div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>SHOPPING</h2>
      </div>
    </div>
  </div>
<?php
	$num = $_GET["num"];
	$code = "shop_code";
	include "./db_con.php";
	$sql = "select * from shopping where num='$num'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$brand = $row["brand"];
	$product = $row["product"];
	$content = $row["content"];
	$price = number_format($row["price"]);
	$price2 = $row["price"];
	$file_copied = "./data/shopping/".$row["file_copied"];
	$fav = $row["fav"];
	$hit = $row["hit"];

	$new_hit = $hit + 1;
	$sql = "update shopping set hit='$new_hit' where num='$num'";
	mysqli_query($con, $sql);
?>

		<div id="product_box">
			<div id="product_detail">
				<div class="pd_view" style="background-image:url(<?=$file_copied?>);"></div>
				<div class="pd_contxt">
					<h3 class="pd_brand"><?=$brand?></h3>
					<h4 class="pd_name"><?=$product?></h4>
					<p class="pd_content"><?=$content?></p>
					<div class="pd_info">
							<div class="pd_price">정상가&nbsp;<span><?=$price?></span>원</div>							
					</div>
					<div class="pd_buttons">
						<div class="order">
								<button type="button" class="order_btn" onclick="location.href='./right_order.php?num=<?=$num?>&code=shop'">BUY NOW</button>
						</div>
						<div class="cart">
								<button type="button" class="cart_btn" rel="<?=$num?>" data-userid="<?=$userid?>" price="<?=$price2?>" cate="<?=$code?>">CART</button>
						</div>
						<div class="pd_fav">
<?php
      $sql1 = "select * from fav where id='$userid' and shop_code='$num'";
      $result1 = mysqli_query($con, $sql1);
      $total_num = mysqli_num_rows($result1);
      $row1 = mysqli_fetch_array($result1);
      if(!$total_num){
?>
								<button type="button" class="unfav" rel="<?=$num?>" data-userid="<?=$userid?>" cate="shop_code"></button>
<?php
      }else{
?>           
								<<button type="button" class="faved" rel="<?=$num?>" data-userid="<?=$userid?>" cate="shop_code"></button>
<?php
      }
?>
								<span>ITEM</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<div id="footer">
    <?php include "./footer.php"; ?>
  </div> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/common.js"></script>
	<script src="js/product_view.js"></script>
	<script src="js/fav.js"></script>

</body>
</html>