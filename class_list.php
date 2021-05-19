<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Class</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/class.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>CLASS</h2>
      </div>
    </div>
  </div>
  <div id="class_upper">
    <h2>The Best Class</h2>
    <div id="class_upper_box">
			<div id="class_con_box">
        <div class="cl_view_box_01">
          <div class="cl_top"></div>
        </div>				
				<div class="cl_contxt">
					<h3 class="cl_title">업사이클을 넘어 Helper로</h3>
					<h4 class="cl_tutor">-&nbsp;Cho's Utopia</h4>
					<h4 class="cl_sub">업사이클링 마스크로 따뜻함 전해요!</h4>
					<div class="cl_content">
            <p>이번달 베스트 클래스로 선정된 <span>[업사이클을 넘어 Helper]</span></p>
            <p>미국출신의 업사이클 패션 디자이너인 <strong>Cho Hernández</strong>와 <strong>GREEN HOOD</strong>가 특별한 프로젝트 클래스를 개설</p>
            <P>업사이클도 실천하고 기부도 할 수 있는 프로젝트</p>
            <p>코로나로 고통받고 있는 아프리카 사람들에게 업사이클링 마스크 전달 캠페인</p>
          </div>
					<div class="cl_info">	
              <div class="cl_button">
								<button type="button" class="detail_btn" onclick="location.href='./class_best.php'">상세보기</button>
              </div>			
					</div>
        </div>
      </div>
    </div>
  </div>
  <div id="main_container">
    <div id="class_con">
    <aside class="side_con">
           <div class="side_bar">
<?php   
  include "./db_con.php";

  $sql = "select * from class order by num desc";
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);
  if(!$total_record){
    $total_record = "0";
  }
?>              
              <div class="view_btn">
                <a href="./class_list.php?sort=num">View All</a><span class="count">(<?=$total_record?>)</span>
              </div>
              <ul class="class_cate">
                <h3>Categories</h3>
<?php   
  $sql = "select * from class where category='day'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result); 
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
?>                
                <li><a href="./class_cate.php?category=<?=$category?>&sort=num">1DAY CLASS</a><span class="count">(<?=$count?>)</span></li>
<?php   
  $sql = "select * from class where category='pro'";
  $result = mysqli_query($con, $sql);
  $row = mysqli_fetch_array($result);
  $count = mysqli_num_rows($result); 
  if(!$count){
    $count = "0";
  }else{
    $category = $row["category"];
  }
?>                   
                <li><a href="./class_cate.php?category=<?=$category?>&sort=num">PROJECT CLASS</a><span class="count">(<?=$count?>)</span></li>
              </ul>
           </div>
         </aside>
         <div class="class_contents">
          <div class="class_sort"> 
<?php
  //http://localhost/portfolio/shop_list.php?sort=hit
  $sort = $_GET["sort"];
 
  if($sort == "num"){
    $sort_name = "신상품순";
  }elseif($sort == "hit"){
    $sort_name = "인기순";
  }elseif($sort == "difficulty"){
    $sort_name = "난이도순";
  }elseif($sort == "high_price"){
    $sort_name = "높은 가격순";
  }elseif($sort == "low_price"){
    $sort_name = "낮은 가격순";
  }

?>                     
            <button type="button"><span class="sort_name"><?=$sort_name?></span><span class="arrow">▼</span></button>
            <ul class="class_sort_type">             
              <li><a href="./class_list.php?sort=num">신상품순</a></li>
              <li><a href="./class_list.php?sort=hit">인기순</a></li>
              <li><a href="./class_list.php?sort=difficulty">난이도순</a></li>
              <li><a href="./class_list.php?sort=high_price">높은 가격순</a></li>
              <li><a href="./class_list.php?sort=low_price">낮은 가격순</a></li>              
            </ul>
          </div>
          <ul class="class_list">
<?php

	if(isset($_GET["page"])){ 
		$page = $_GET["page"];
	}else{ 
		$page = 1;
  }
  //http://localhost/portfolio/shop_list.php?sort=hit
  $sort = $_GET["sort"];

  if($sort == "num"||$sort == "hit"){
    $sql = "select * from class order by $sort desc";
  }elseif($sort == "high_price"){
    $sql = "select * from class order by price desc";  
  }elseif($sort == "low_price"){
    $sql = "select * from class order by price";
  }elseif($sort == "difficulty"){
    $sql = "select * from class order by $sort asc";
  } 
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);

  $scale = 9;

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
      $title = $row["title"];
      $tutor = $row["tutor"];
      $sub = $row["sub"];
      $content = $row["content"];
      $price = number_format($row["price"]);
      $fav = $row["fav"];
      $file_copied = "./data/class/".$row["file_copied"];

?>            
            <li>
                <a href="./class_view.php?num=<?=$num?>" target="_blank">
                  <div class="cl_img">
                      <img src="<?=$file_copied?>" alt="<?=$title?>">
                  </div>
                  <h3 class="cl_title"><?=$title?>&nbsp;</h3>
                  <h4 class="cl_tutor"><?=$tutor?></h4>
                  <p class="cl_sub"><?=$sub?></p>
                </a>
                  <div class="cl_info">
                    <div class="cl_price"><span><?=$price?></span>원</div>
                    <div class="pd_fav">                     
<?php
      $sql1 = "select * from fav where id='$userid' and class_code='$num'";
      $result1 = mysqli_query($con, $sql1);
      $total_num = mysqli_num_rows($result1);
      $row1 = mysqli_fetch_array($result1);
      if(!$total_num){
?>
      <button type="button" class="unfav" rel="<?=$num?>" data-userid="<?=$userid?>" cate="class_code"></button>
<?php
      }else{
?>           
      <button type="button" class="faved" rel="<?=$num?>" data-userid="<?=$userid?>" cate="class_code"></button>
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
		echo "<li><a href='class_list.php?sort=$sort&page=$new_page'>◀ 이전</a></li>";
 }else{  
		echo "<li>&nbsp;</li>";
	}

	for($i=1; $i<=$total_page; $i++){
		if($page == $i){
			echo "<li><a href='class_list.php?sort=$sort&page=$i' class='cur_page'> $i </a></li>";
		}else{
			echo "<li><a href='class_list.php?sort=$sort&page=$i'> $i </a></li>";
		}
	}

	if($total_page >= 2 && $page != $total_page){
		$new_page = $page + 1;
		echo "<li><a href='class_list.php?sort=$sort&page=$new_page'>다음 ▶</a></li>";
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
            <li><button type="button" onclick="location.href='./class_form.php'">등록하기</button></li>
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
  <script src="js/class.js"></script>
  <script src="js/fav.js"></script>
</body>
</html>