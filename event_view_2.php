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
  <?php
    include "./db_con.php";

    $sql = "select * from event where num='2'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $title = $row["title"];

  ?>
  <div id="event_frame_02">
    <div class="event_title">
      <h3><?=$title?></h3>
    </div>
    <div class="event_cont">
      <ul class="event_box">
        <li>
          <div class="img"></div>
          <div class="txt">
            <h4>"여러분만의 업사이클 작품을 뽐내주세요!"</h4>
            <p>클래스를 통해서 만든 작품부터 창작품까지</p>
            <p><strong>GREEN HOOD</strong>회원 여러분의&nbsp;<span>멋진 업사이클 작품을 기대합니다.</span><br>작품을 담은 사진을 업로드해주시면<span>온라인 전시회</span>를 개최할 예정입니다.</p>
          </div>
        </li>
        <li>
          <div class="txt">
            <h4 class="sub_txt">지원 관련 공지사항</h4>
          </div>          
          <div class="txt">
            <p>&bull;&nbsp;사진해상도는 72dpi 이상</p>
            <p>&bull;&nbsp;저장용량은 10mb 이하</p>
            <p>&bull;&nbsp;파일형식은 jpg, png, gif형식만 허용</p>
            <p>&bull;&nbsp;지원마감&nbsp;:&nbsp;~&nbsp;2021.04.15</p>
            <p>&bull;&nbsp;총 20 작품 선정</p>
          </div>
        </li>
        <li>
          <div class="txt">
            <h4>지원자 당첨 혜택</h4>
          </div>         
          <div class="txt">
            <p class="sub_tit">&lt;&nbsp;지원자 공통&nbsp;&gt;</p>
            <p>&bull;&nbsp;지원하시는 모든 회원분들께 3000포인트 증정</p>
            <p class="sub_tit">&lt;&nbsp;당첨 지원자 5분&nbsp;&gt;</p>
            <p>&bull;&nbsp;1만 포인트 증정</p>
          </div>
        </li>
        <p class="bottom_txt">작품 제출 마감기한은 일정에 따라 변경될 수 있습니다.</p>
      </ul>
      <div class="apply">
        <button type="button" onclick="location.href='./event_apply.php'">지원하기</button>
      </div>
    </div>
  </div>
<?php
    mysqli_close($con);
?>

  <ul class="buttons">
    <li><button type="button" onclick="location.href='./event_list.php?'">목록보기</button></li>
  </ul>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/event.js"></script>
</body>
</html>