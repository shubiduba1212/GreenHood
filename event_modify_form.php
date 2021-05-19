<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Event</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/event.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>EVENT</h2>
      </div>
    </div>
  </div>
  <div id="event_box">
    <h2 id="event_title">이벤트 > 수정 및 삭제하기</h2>
<?php
    //
    $num = $_GET["num"];
    include "./db_con.php";
    $sql = "select * from event where num='$num'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $num = $row["num"];
    $title = $row["title"];
    $sub = $row["sub"];
    $content = $row["content"];
    $file_copied = "./data/event/".$row["file_copied"];

?>     
     <form name="event_form" action="./event_modify.php?num=<?=$num?>" method="post" enctype="multipart/form-data">
        <ul id="event_form">
          <li>
                <div class="label">
                    <label for="">이름 : </label>
                </div>
                <div class="input">
                    <p><?=$userid?></p>
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="title">이벤트&nbsp;타이틀 : </label>
                </div>
                <div class="input">
                    <input type="text" name="title" value="<?=$title?>">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="sub">서브&nbsp;타이틀 : </label>
                </div>
                <div class="input">
                    <input type="text" name="sub" value="<?=$sub?>">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="content">상세내용 : </label>
                </div>
                <div class="input">
                    <textarea name="content"><?=$content?></textarea>
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="upfile">대표 이미지 : <?=$file_copied?></label>
                </div>
                <div class="input">
                    <input type="file" class="upload" name="upfile">
                </div>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="button" onclick="check_input();">수정</button></li>
          <li><button type="button" onclick="location.href='./event_delete.php?num=<?=$num?>'">삭제</button></li>
        </ul>
      </form>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/event.js"></script>
</body>
</html>