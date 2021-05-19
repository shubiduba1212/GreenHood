<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Article</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/article.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>Article</h2>
      </div>
    </div>
  </div>
  <div id="side_menu">
    <aside>
      <ul>
        <li><a href="./about.php">GREEN&nbsp;HOOD</a></li>
        <li><a href="./notice_list.php">NOTICE</a></li>
        <li><a href="./article_list.php">ARTICLE</a></li>
      </ul>
    </aside>
  </div>
  <div class="article_list_box">
    <ul class="article_list">
    <?php

if(isset($_GET["page"])){ 
  $page = $_GET["page"];
}else{ 
  $page = 1;
}

include "./db_con.php"; 
$sql = "select * from article order by num desc";
$result = mysqli_query($con, $sql);
$total_record = mysqli_num_rows($result);

$scale = 6;

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
    $sub = $row["sub"];
    $content = $row["content"];
    $file_copied = "./data/article/".$row["file_copied"];
?>      
      <li>
        <a href="./article_view_<?=$num?>.php">
          <div class="list_img">
            <img src=<?=$file_copied?> alt="animal article poster">
          </div>
          <p class="tit"><?=$title?></p>
          <p class="sub_tit"><?=$sub?></p>
        </a>
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
		echo "<li><a href='article_list.php?page=$new_page'>◀ 이전</a></li>";
 }else{  
		echo "<li>&nbsp;</li>";
	}

	for($i=1; $i<=$total_page; $i++){
		if($page == $i){
			echo "<li><a href='article_list.php?page=$i' class='cur_page'> $i </a></li>";
		}else{
			echo "<li><a href='article_list.php?page=$i'> $i </a></li>";
		}
	}

	if($total_page >= 2 && $page != $total_page){
		$new_page = $page + 1;
		echo "<li><a href='article_list.php?page=$new_page'>다음 ▶</a></li>";
	}else{
		echo "<li>&nbsp;</li>";
	}
?>       </ul>      
<?php 
    if($userlevel=="Admin"){
?>            
        <ul class="buttons">
            <li><button type="button" onclick="location.href='./article_form.php'">등록하기</button></li>
        </ul>
<?php
    }
?>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/article.js"></script>
</body>
</html>