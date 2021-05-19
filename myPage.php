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
          <p>TODAY&nbsp;:&nbsp;<?=$date?></p>
          <p><span>GREEN HOOD</span>에 방문해 주셔서 감사합니다.</p>
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