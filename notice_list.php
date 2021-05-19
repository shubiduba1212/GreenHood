<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>GREENHOOD ｜ Notice</title>
	<link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/notice.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>NOTICE</h2>
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
  <div id="notice_box">
      <h2 id="notice_title">공지사항 게시판</h2>
      <ul id="notice_list">
        <li>
          <span class="field_1">번호</span>
          <span class="field_2"><a href="">제목</a></span>
          <span class="field_3">작성자</span>
          <span class="field_4">첨부파일</span>
          <span class="field_5">작성일</span>
          <span class="field_6">조회수</span>
        </li>
<?php

		if(isset($_GET["page"])){ 
			$page = $_GET["page"];
		}else{ 
			$page = 1;
		}
		include "./db_con.php";
		if($page == 1){
		$notice = "1"; 

		$sql = "select * from notice where note='1' order by num desc";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);
		$row_num = mysqli_num_rows($result);

		$num = $row["num"];
		$subject = $row["subject"];
		$name = $row["name"];
		$file_name = $row["file_name"];
		$regist_day = $row["regist_day"];
		$hit = $row["hit"];
		
		for($i=0; $i<$row_num; $i++){
				mysqli_data_seek($result,$i);
				$row =mysqli_fetch_array($result);

				$num = $row["num"];
				$subject = $row["subject"];
				$name = $row["name"];
				$regist_day = $row["regist_day"];
				$hit = $row["hit"];

				if($row["file_name"]){
					$file_name = "<img src='./img/file.gif'>";
				}else{
					$file_name = "";
				}



?>
						<li class="notice">
							<span class="field_1">[공지]</span>
							<span class="field_2"><a href="notice_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
							<span class="field_3"><?=$name?></span>
							<span class="field_4"><?=$file_name?></span>
							<span class="field_5"><?=$regist_day?></span>
							<span class="field_6"><?=$hit?></span>
						</li>
<?php
		}	
	}	
?>						
<?php
	$sql = "select * from notice order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result);

	$scale = 10; 

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
		$id = $row["id"];
		$name = $row["name"];
		$subject = $row["subject"];
		$regist_day = $row["regist_day"];
		$hit = $row["hit"];
		
		if($row["file_name"]){ 
			$file_name = "<img src='./img/file.gif'>";
		}else{ 
			$file_name = "";
		}

?>
						<li>
							<span class="field_1"><?=$number?></span>
							<span class="field_2"><a href="notice_view.php?num=<?=$num?>&page=<?=$page?>"><?=$subject?></a></span>
							<span class="field_3"><?=$name?></span>
							<span class="field_4"><?=$file_name?></span>
							<span class="field_5"><?=$regist_day?></span>
							<span class="field_6"><?=$hit?></span>
						</li>
<?php
	$number--;
}
mysqli_close($con);
?>
					</ul>
					<ul id="page_num">

<?php
		if($total_page >= 2 && $page >= 2){
		$new_page = $page - 1;
		echo "<li><a href='notice_list.php?page=$new_page'>◀ 이전</a></li>";
 }else{  
		echo "<li>&nbsp;</li>";
	}

	for($i=1; $i<=$total_page; $i++){
		if($page == $i){
			echo "<li><span class='cur_page'> $i </span></li>";
		}else{
			echo "<li><a href='notice_list.php?page=$i'> $i </a></li>";
		}
	}

	if($total_page >= 2 && $page != $total_page){
		$new_page = $page + 1;
		echo "<li><a href='notice_list.php?page=$new_page'>다음 ▶</a></li>";
	}else{
		echo "<li>&nbsp;</li>";
	}
?>
<?php
	if($userlevel=="Admin"){

	
?>
					</ul>
						<ul class="buttons">
							<li><button type="button" onclick="location.href='./notice_form.php'">작성하기</button></li>
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
		<script src="./js/notice.js"></script>
</body>
</html>