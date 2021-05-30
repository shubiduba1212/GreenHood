<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Manager</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/admin.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_txt">
        <h2>MANAGER PAGE</h2>
      </div>
    </div>
  </div>
  <div id="manage_box">
    <div class="manage_con">
      <aside>
        <ul>
          <li><a href="./admin.php?menu=member">MEMBER</a></li>
          <li><a href="./admin.php?menu=notice">NOTICE</a></li>
          <li><a href="./admin.php?menu=shopping">SHOPPING</a></li>
          <li><a href="./admin.php?menu=class">CLASS</a></li>
          <li><a href="./admin.php?menu=event">EVENT</a></li>
        </ul>
      </aside>
      <div class="manage_sec">
<?php
    //
    $menu_tit = $_GET["menu"];
?>        
        <h3 class="menu_tit"><?=$menu_tit?></h3>
        <div class="manage_con">
          <ul id="manage_list">
<?php
    if($menu_tit=='member'){     
?>         
            <li>
              <span class="field_1">번호</span>
              <span class="field_2">아이디</span>
              <span class="field_3">등록번호</span>
              <span class="field_4">변경</span>
            </li>
<?php
  }elseif($menu_tit=='notice'){
?>
            <li>
              <span class="field_1">번호</span>
              <span class="field_2">제목</span>
              <span class="field_3">등록번호</span>
              <span class="field_4">변경</span>
            </li>
<?php
  }elseif($menu_tit=='shopping'){
?>
            <li>
              <span class="field_1">번호</span>
              <span class="field_2">브랜드&nbsp;제품명</span>
              <span class="field_3">등록번호</span>
              <span class="field_4">변경</span>
            </li>
<?php
  }elseif($menu_tit=='class'){
?>
            <li>
              <span class="field_1">번호</span>
              <span class="field_2">타이틀</span>
              <span class="field_3">등록번호</span>
              <span class="field_4">변경</span>
            </li>
<?php
  }elseif($menu_tit=='event'){
?>
            <li>
              <span class="field_1">번호</span>
              <span class="field_2">타이틀</span>
              <span class="field_3">등록번호</span>
              <span class="field_4">수정</span>
            </li>
<?php
  }
?>            
<?php

  if(isset($_GET["page"])){ 
    $page = $_GET["page"];
  }else{ 
    $page = 1;
  }
  include "./db_con.php";
		
  $sql = "select * from $menu_tit order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result);

	$scale = 15; 

	if($total_record % $scale == 0){
			$total_page = $total_record / $scale;
	}else{
			$total_page = floor($total_record / $scale) + 1;
	}

	$start = ($page - 1) * $scale;

  $number = $total_record - $start;
?>  
<?php
  if($menu_tit=='member'){
	for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
		mysqli_data_seek($result, $i); 
		$row = mysqli_fetch_array($result);
		$num = $row["num"]; 
		$id = $row["id"];
		$name = $row["name"];
    
?>
						<li>
							<span class="field_1"><?=$number?></span>
							<span class="field_2"><?=$id?></span>
              <span class="field_3"><?=$num?></span>
              <span class="field_4"><a href="./manage_member_form.php?num=<?=$num?>">수정</a></span>
            </li>           
<?php
      $number--;
    }
  }elseif($menu_tit=='notice'){
    for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
      mysqli_data_seek($result, $i); 
      $row = mysqli_fetch_array($result);
      $num = $row["num"]; 
      $subject = $row["subject"];
      $name = $row["name"];
?>
            <li>
              <span class="field_1"><?=$number?></span>
              <span class="field_2"><?=$subject?></span>
              <span class="field_3"><?=$num?></span>
              <span class="field_4"><a href="./notice_modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a></span>
            </li> 
<?php
      $number--;
    }
  }elseif($menu_tit=='shopping'){
    for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
      mysqli_data_seek($result, $i); 
      $row = mysqli_fetch_array($result);
      $num = $row["num"]; 
      $brand = $row["brand"];
      $product = $row["product"];
?>
            <li>
              <span class="field_1"><?=$number?></span>
              <span class="field_2"><?=$brand?>&nbsp;<?=$product?></span>
              <span class="field_3"><?=$num?></span>
              <span class="field_4"><a href="./shop_modify_form.php?num=<?=$num?>">수정</a></span>
            </li>
<?php
      $number--;
    }  
  }elseif($menu_tit=='class'){
    for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
      mysqli_data_seek($result, $i); 
      $row = mysqli_fetch_array($result);
      $num = $row["num"]; 
      $title = $row["title"];
?>
            <li>
              <span class="field_1"><?=$number?></span>
              <span class="field_2"><?=$title?></span>
              <span class="field_3"><?=$num?></span>
              <span class="field_4"><a href="./class_modify_form.php?num=<?=$num?>">수정</a></span>
            </li>
<?php
      $number--;
    }  
  }elseif($menu_tit=='event'){
    for($i = $start; $i < $start + $scale && $i < $total_record; $i++){
      mysqli_data_seek($result, $i); 
      $row = mysqli_fetch_array($result);
      $num = $row["num"]; 
      $title = $row["title"];
?>
            <li>
              <span class="field_1"><?=$number?></span>
              <span class="field_2"><?=$title?></span>
              <span class="field_3"><?=$num?></span>
              <span class="field_4"><a href="./event_modify_form.php?num=<?=$num?>">수정</a></span>
            </li>
<?php
      $number--;
    }  
  }
  mysqli_close($con);
?>
					</ul>
					<ul id="page_num">

<?php
		if($total_page >= 2 && $page >= 2){
		$new_page = $page - 1;
		echo "<li><a href='admin.php?menu=$menu_tit&page=$new_page'>◀ 이전</a></li>";
 }else{  
		echo "<li>&nbsp;</li>";
	}

	for($i=1; $i<=$total_page; $i++){
		if($page == $i){
			echo "<li><span class='cur_page'> $i </span></li>";
		}else{
			echo "<li><a href='admin.php?menu=$menu_tit&page=$i'> $i </a></li>";
		}
	}

	if($total_page >= 2 && $page != $total_page){
		$new_page = $page + 1;
		echo "<li><a href='admin.php?menu=$menu_tit&page=$new_page'>다음 ▶</a></li>";
	}else{
		echo "<li>&nbsp;</li>";
	}
?>
         
        </div>
      </div>
    </div>  
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
</body>
</html>
