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
  <div id="notice_box">
    <h2 id="notice_title">게시판 작성</h2>
<?php
    $num = $_GET["num"];
    $page = $_GET["page"];

    include "./db_con.php";
    $sql = "select * from notice where num='$num'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $name = $row["name"];
    $subject = $row["subject"];
    $content = $row["content"];
    $file_name = $row["file_name"];
    $notice = $row["note"];

    if($row["note"]=="0"){
      $notice = "일반 게시글";
    }elseif($row["note"] == "1"){
      $notice = "공지 게시글";
    };
?>    
    <form name="notice_form" action="notice_modify.php?num=<?=$num?>&page=<?=$page?>" method="post" enctype="multipart/form-data">
      <ul id="notice_form">
        <li>
          <div class="label">
            <label>이름 : </label>
          </div>
          <div class="input">
              <p><?=$userid?></p>
          </div>
        </li>
        <li>
          <div class="label">
            <label for="subject">제목 : </label>
          </div>
          <div class="input">
              <input type="text" name="subject" value="<?=$subject?>">
          </div>
        </li>
        <li>
          <div class="label">
              <label for="content">내용 : </label>
          </div>
          <div class="input">
              <textarea name="content"><?=$content?></textarea>
          </div>
        </li>
        <li>
          <div class="label">
              <label for="upfile">첨부파일 : </label>
          </div>
          <div class="input">
              <p class="origin_file"><?=$file_name?></p>
          </div>
        </li>
        <li>
          <div class="label">
              <label for="notice">공지여부 : </label>
          </div>
          <div class="input">
              <select name="note">
                <option value="0" selected>일반 게시글</option>
                <option value="1">공지 게시글</option>
              </select>
          </div>
        </li>
      </ul>
      <ul class="buttons">
          <li><button type="button" onclick="check_input();">수정 완료</button></li>
          <li><button type="button" onclick="location.href='notice_list.php?page=<?=$page?>'">목록 보기</button></li>
      </ul>
    </form>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/common.js"></script>
		<script src="./js/notice.js"></script>
</body>
</html>