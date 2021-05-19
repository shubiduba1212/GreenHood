<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ MyPage</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/mypage.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_txt">
        <h2><a href="./myPage.php">MY PAGE</a></h2>
      </div>
    </div>
  </div>
<?php
  //http://localhost/portfolio/myPage.php?id=bbb@bbb.com
  include "./db_con.php";
  $sql= "select * from member where id='$userid'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);

  $name = $row["name"];
  $level = $row["level"];
  $point = $row["point"];
  $date = date("Y-m-d");

?>  
  <div id="myP_box">
    <div class="myP_con">
      <aside>
        <ul>
          <li><a href="./fav_list.php">찜한 목록</a></li>
          <li><a href="./member_modify_form.php">회원정보수정</a></li>
        </ul>
      </aside>
      <div class="profile">
        <div class="summary">
          <div class="name">
            <p><span><?=$name?></span>&nbsp;님</p>
          </div>
          <div class="my_info">
            <ul>
              <li>회원등급&nbsp;:&nbsp;<strong><?=$level?></strong></li>
              <li>포인트&nbsp;:&nbsp;<strong><?=$point?></strong>&nbsp;점</li>
            </ul>
          </div>
        </div>
        <div class="context">
        <ul class="fav_list">
<?php

	if(isset($_GET["page"])){ 
		$page = $_GET["page"];
	}else{ 
		$page = 1;
  }
  
  $sql1 = "select * from fav where id='$userid' order by num desc";
  $result = mysqli_query($con, $sql1);
  $total_record = mysqli_num_rows($result);

  $scale = 12;
  if($total_record % $scale == 0){
			$total_page = $total_record / $scale;
	}else{ 
			$total_page = floor($total_record / $scale) + 1;
	}

  $start = ($page - 1) * $scale;
  $number = $total_record - $start;

  if(!$total_record){
?>
            <li class="emp_list">찜한 목록이 없습니다.</li>
<?php
	
	}else{

        for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
          mysqli_data_seek($result, $i);
          $row = mysqli_fetch_array($result);
          $shop_code = $row["shop_code"];
          $class_code = $row["class_code"];

          if($shop_code){
            $sql2 = "select * from shopping where num='$shop_code' order by num desc";
            $result2 = mysqli_query($con, $sql2);
            $row = mysqli_fetch_array($result2);
            $brand = $row["brand"];
            $product = $row["product"];
            $price = number_format($row["price"]);
            $file_copied = "./data/shopping/".$row["file_copied"];        
          }else{
            $sql3 = "select * from class where num='$class_code' order by num desc";
            $result3 = mysqli_query($con, $sql3);
            $row = mysqli_fetch_array($result3);
            $brand = $row["title"];
            $product = $row["tutor"];
            $price = number_format($row["price"]);
            $file_copied = "./data/class/".$row["file_copied"];
          }
	
?>            
            <li>
<?php
          if($shop_code){
?>              
                <a href="./shop_view.php?num=<?=$shop_code?>" target="_blank">
<?php
          }else{
?>
                <a href="./class_view.php?num=<?=$class_code?>" target="_blank">
<?php             
          }
?>                
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
          if($shop_code){
                        
?>                  <!-- <button type="button" class="faved" onclick="location.href='./mypage_shop_fav.php?num=<?=$shop_code?>'"></button>-->
                      <button type="button" class="faved" rel="<?=$shop_code?>" data-userid="<?=$userid?>" code="shop"></button>
<?php
          }else{
?>
                    <!--<button type="button" class="faved" onclick="location.href='./mypage_class_fav.php?num=<?=$class_code?>'"></button>-->
                      <button type="button" class="faved" rel="<?=$class_code?>" data-userid="<?=$userid?>" code="class"></button>
<?php             
          }
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
		echo "<li><a href='fav_list.php?page=$new_page'>◀ 이전</a></li>";
 }else{  
		echo "<li>&nbsp;</li>";
	}

	for($i=1; $i<=$total_page; $i++){
		if($page == $i){
			echo "<li><a href='fav_list.php?page=$i' class='cur_page'> $i </a></li>";
		}else{
			echo "<li><a href='fav_list.php?page=$i'> $i </a></li>";
		}
	}

	if($total_page >= 2 && $page != $total_page){
		$new_page = $page + 1;
		echo "<li><a href='fav_list.php?page=$new_page'>다음 ▶</a></li>";
	}else{
		echo "<li>&nbsp;</li>";
	}
?>       </ul>   
        </div>
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
  <script src="js/mypage.js"></script>

</body>
</html>