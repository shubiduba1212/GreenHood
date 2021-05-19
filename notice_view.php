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
						<h2>공지사항 > 상세 페이지</h2>
<?php
			$num = $_GET["num"];
			$page = $_GET["page"];

			include "./db_con.php";
			$sql = "select * from notice where num = '$num'";
			$result = mysqli_query($con, $sql);
			$row = mysqli_fetch_array($result);
			$id = $row["id"];
			$name = $row["name"];
			$subject = $row["subject"];
			$content = $row["content"];
			$regist_day = $row["regist_day"];
      $hit = $row["hit"];
      $level = $row["level"];
			$file_name = $row["file_name"];
			$file_type = $row["file_type"];
			$file_copied = $row["file_copied"];

			$new_hit = $hit + 1;
			$sql = "update notice set hit=$new_hit where num='$num'";
			mysqli_query($con, $sql);

?>



						<ul id="view_content">
								<li>
									<span><b>제목 : </b><?=$subject?></span>
									<span><?=$name?> ｜ <?=$regist_day?></span>
								</li>
								<li>
<?php
			if($file_name){
				$real_name = $file_copied; 
				$file_path = "./data/notice/".$real_name; 
				$file_size = filesize($file_path);
				echo "<div>첨부파일 : $file_name ($file_size Byte) <a class='down' href='notice_download.php?num=$num&real_name=$real_name&file_name=$file_name&file_type=$file_type'>다운로드</a></div>";



			}
?>									
									<div><?=$file_name?> :
										<a href=""><?=$file_copied?></a>
									</div>
									<p><?=$content?></p>
								</li>
								</ul>
								<ul class="buttons">
									<li><button type="button" onclick="location.href='./notice_list.php?page=<?=$page?>'">목록</button></li>
<?php
		
			if($userlevel == $level){
?>

									<li><button type="button" onclick="location.href='./notice_modify_form.php?num=<?=$num?>&page=<?=$page?>'">수정</button></li>
									<li><button type="button" onclick="location.href='./notice_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
<?php
			} 
			if($userlevel=="Admin"){
?>

									<li><button type="button"  onclick="location.href='./notice_form.php'">작성하기</button></li>
<?php
			}
?>									
								</ul>
						
				</div>
				<div id="footer">
				<?php include "./footer.php"; ?>
				</div>
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script src="js/common.js"></script>
				<script src="./js/notice.js"></script>
</body>
</html>