<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GREENHOOD ｜ Class</title>
	<link rel="shortcut icon" href="./img/logo.png">
	<link rel="stylesheet" href="./css/common_fixed.css">
	<link rel="stylesheet" href="./css/class.css">
</head>
<body>
	<header>
		<?php include "./header_fixed.php" ?>
	</header>
	<div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>Class</h2>
      </div>
    </div>
  </div>
<?php
	//http://localhost/website/product_view.php?num=3
	$num = $_GET["num"];
	$code = "class_code";
	include "./db_con.php";
	$sql = "select * from class where num='$num'";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

	$title = $row["title"];
	$tutor = $row["tutor"];
	$sub = $row["sub"];
	$content = $row["content"];
	$price = number_format($row["price"]);
	$price2 = $row["price"];
	$file_copied = "./data/class/".$row["file_copied"];
	$fav = $row["fav"];
	$hit = $row["hit"];

	$new_hit = $hit + 1;
	$sql = "update class set hit='$new_hit' where num='$num'";
	mysqli_query($con, $sql);
?>

		<div id="class_box">
			<div id="class_detail">
				<div class="cl_view" style="background-image:url(<?=$file_copied?>);"></div>
				<div class="cl_contxt">
					<h3 class="cl_title"><?=$title?></h3>
					<h4 class="cl_tutor"><?=$tutor?></h4>
					<h4 class="cl_sub"><?=$sub?></h4>
					<p class="cl_content"><?=$content?></p>
					<div class="cl_info">
							<div class="cl_price">정상가&nbsp;<span><?=$price?></span>원</div>							
					</div>
					<div class="cl_buttons">
						<div class="order">
								<button type="button" class="order_btn" onclick="location.href='./right_order.php?num=<?=$num?>&code=class'" >SIGN&nbsp;UP</button>
						</div>
						<div class="cart">
								<button type="button" class="cart_btn" rel="<?=$num?>" data-userid="<?=$userid?>" price="<?=$price2?>" cate="<?=$code?>">CART</button>
						</div>
						<div class="pd_fav">
<?php
      $sql1 = "select * from fav where id='$userid' and class_code='$num'";
      $result1 = mysqli_query($con, $sql1);
      $total_num = mysqli_num_rows($result1);
      $row1 = mysqli_fetch_array($result1);
      if(!$total_num){
?>
      					<button type="button" class="unfav" rel="<?=$num?>" data-userid="<?=$userid?>" cate="class"></button>
<?php
      }else{
?>           
      					<button type="button" class="faved" rel="<?=$num?>" data-userid="<?=$userid?>" cate="class"></button>
<?php
      }
?>
								<span>ITEM</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	<div id="footer">
    <?php include "./footer.php"; ?>
  </div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/common.js"></script>
	<script src="js/product_view.js"></script>
	<script src="js/fav.js"></script>		
</body>
</html>