<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Shopping</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/shopping.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>SHOPPING</h2>
      </div>
    </div>
  </div>
  <div id="main_container">
    <div id="shopping_con">
         <aside class="side_con">
           <div class="side_bar">
<?php   
  include "./db_con.php";

  $sql = "select * from shopping order by num desc";
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);
  if(!$total_record){
    $total_record = "0";
  }
?>              
              <div class="view_btn">
                <a href="./shop_list.php?sort=num">View All</a><span class="count">(<?=$total_record?>)</span>
              </div>
              <ul class="shop_cate">
                <h3>Categories</h3>
<?php   
  $sql = "select * from shopping where category='acc'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result); 
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
?>                
                <li><a href="./shop_cate.php?category=<?=$category?>&sort=num">Accessories</a><span class="count">(<?=$count?>)</span></li>
<?php   
  $sql = "select * from shopping where category='bag'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result); 
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
?>                   
                <li><a href="./shop_cate.php?category=<?=$category?>&sort=num">Bag</a><span class="count">(<?=$count?>)</span></li>
<?php   
  $sql = "select * from shopping where category='clothes'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result); 
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
?>                   
                <li><a href="./shop_cate.php?category=<?=$category?>&sort=num">Clothing</a><span class="count">(<?=$count?>)</span></li>
<?php   
  $sql = "select * from shopping where category='home'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result); 
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
?>                   
                <li><a href="./shop_cate.php?category=<?=$category?>&sort=num">Home&nbsp;&&nbsp;Living</a><span class="count">(<?=$count?>)</span></li>
<?php   
  $sql = "select * from shopping where category='etc'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result);
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
  
?>                   
                <li><a href="./shop_cate.php?category=<?=$category?>&sort=num">etc</a><span class="count">(<?=$count?>)</span></li>
              </ul>
           </div>
         </aside>
         <div class="shop_contents">
          <div class="shop_sort"> 
<?php
  //http://localhost/portfolio/shop_list.php?sort=hit
  $sort = $_GET["sort"];

  if($sort == "num"){
    $sort_name = "신상품순";
  }elseif($sort == "hit"){
    $sort_name = "인기순";
  }elseif($sort == "high_price"){
    $sort_name = "높은 가격순";
  }elseif($sort == "low_price"){
    $sort_name = "낮은 가격순";
  }

?>                     
            <button type="button"><span class="sort_name"><?=$sort_name?></span><span class="arrow">▼</span></button>
            <ul class="shop_sort_type">             
              <li><a href="./shop_list.php?sort=num">신상품순</a></li>
              <li><a href="./shop_list.php?sort=hit">인기순</a></li>
              <li><a href="./shop_list.php?sort=high_price">높은 가격순</a></li>
              <li><a href="./shop_list.php?sort=low_price">낮은 가격순</a></li>
            </ul>
          </div>
          <ul class="shop_list">
<?php

	if(isset($_GET["page"])){ 
		$page = $_GET["page"];
	}else{ 
		$page = 1;
  }
  
  //http://localhost/portfolio/shop_list.php?sort=hit
  $sort = $_GET["sort"];

  if($sort == "num"||$sort == "hit"){
    $sql = "select * from shopping order by $sort desc";
  }elseif($sort == "high_price"){
    $sql = "select * from shopping order by price desc";  
  }elseif($sort == "low_price"){
    $sql = "select * from shopping order by price";
  } 

  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);

  $scale = 12;

	if($total_record % $scale == 0){
			$total_page = $total_record / $scale;
	}else{ 
			$total_page = floor($total_record / $scale) + 1;
	}
	
	$start = ($page - 1) * $scale;
  $number = $total_record - $start;

  for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);
      $num = $row["num"];
      $brand = $row["brand"];
      $product = $row["product"];
      $content = $row["content"];
      $price = number_format($row["price"]);
      $file_copied = "./data/shopping/".$row["file_copied"];
?>            
            <li>
                <a href="./shop_view.php?num=<?=$num?>" target="_blank">
                  <div class="pd_img">
                      <img src="<?=$file_copied?>" alt="<?=$brand?>&#124;<?=$product?>">
                  </div>
                  <h3 class="pd_brand"><?=$brand?></h3>
                  <p class="pd_name"><?=$product?></p>
                </a>
                  <div class="pd_info">
                    <div class="pd_price"><span><?=$price?></span>원</div>
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
      <button type="button" class="faved" rel="<?=$num?>" data-userid="<?=$userid?>" cate="shop_code"></button>
<?php
      }
?>                                                                                 
                      
                    </div>
                </div>
            </li>
<?php
  }
     mysqli_close($con);
?>            
          </ul>
          <ul id="page_num">

<?php
		if($total_page >= 2 && $page >= 2){
		$new_page = $page - 1;
		echo "<li><a href='shop_list.php?sort=$sort&page=$new_page'>◀ 이전</a></li>";
 }else{  
		echo "<li>&nbsp;</li>";
	}

	for($i=1; $i<=$total_page; $i++){
		if($page == $i){
			echo "<li><a href='shop_list.php?sort=$sort&page=$i' class='cur_page'> $i </a></li>";
		}else{
			echo "<li><a href='shop_list.php?sort=$sort&page=$i'> $i </a></li>";
		}
	}

	if($total_page >= 2 && $page != $total_page){
		$new_page = $page + 1;
		echo "<li><a href='shop_list.php?sort=$sort&page=$new_page'>다음 ▶</a></li>";
	}else{
		echo "<li>&nbsp;</li>";
	}
?>       </ul>   
        </div>
      </div>  
<?php 
    if($userlevel=="Admin"){
?>            
        <ul class="buttons">
            <li><button type="button" onclick="location.href='./shop_form.php'">등록하기</button></li>
        </ul>
<?php
    }
?>          
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/shop.js"></script>
  <script src="js/fav.js"></script>
</body>
</html>