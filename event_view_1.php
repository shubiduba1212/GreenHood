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

    $sql = "select * from event where num='1'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $title = $row["title"];

  ?>
  <div id="event_frame">
    <div class="event_title">
      <h3><?=$title?></h3>
    </div>
    <div class="event_cont">
      <ul class="event_box">
        <li>
          <div class="img"></div>
          <div class="txt">
            <h4>"향후 10년 안에 100만여 종의 동물이 사라진다"</h4>
            <p>기후변화는 폭염 뿐 아니라 걷잡을 수 없는 산불, 초대형 허리케인, 홍수 등 이상 기후 현상을 일으켜 지구 생태계를 위협하고 있습니다.</p>
            <p>지난 1세기 동안 아프리카 사바나 사막, 남아메리카 열대우림 등에 서식하는 <span>동식물의 20%가 사라졌습니다.</span> 그 중 절반이 기후변화로 인한 멸종이었다고 과학자들은 말합니다. <span>향후 10년 안에 100만여 종의 동물이 지구상에서 영영 자취를 감추게</span> 될 것입니다. (2019년 5월9 제7차 생물다양성과학기구(IPBES) 총회에서 채택한 “전 지구 생물다양성 및 생태계 서비스 평가에 대한 정책결정자를 위한 요약보고서(이하 지구평가보고서)”가 진단내린 지구 생태계의 건강상태).</p>
          </div>  
          <div class="txt">
            <p>그래서 <strong>GREEN HOOD</strong>가 준비한 특별한 이벤트</p>
            <p class="sub_tit">멸종 위기 동물을 그려주세요</p>
            <p>기후변화로 인해 멸종 위기에 처한 100만여 생물종 가운데<br><strong>10종을 선정하여 해당 동물의 일러스트로 업사이클링 작품을 제작하는 캠페인</strong><br>입니다.</p>
          </div>
        </li>
        <li>
          <div class="txt">
            <h4>The Animal of The Month</h4>
          </div> 
          <div class="img"></div>           
          <div class="txt">
            <p class="sub_tit">벵갈 호랑이</p>
            <p>방글라데시와 인도의 습지에는 현재 약 5,000 마리의 벵갈 호랑이가 살고 있습니다. 그러나 기후변화로 인한 해수면 상승으로 인해 벵갈호랑이의 서식처가 물에 잠길 위험에 처했습니다. 유엔은 2070년이 되면 벵갈호랑이가 살 수 있는 습지가 모두 물에 잠겨 완전히 멸종할 것이라고 경고했습니다.</p>
          </div>
        </li>
        <li>
          <div class="txt">
            <h4>"여러분의 솜씨로 벵갈 호랑이를 표현해주세요"</h4>
          </div> 
          <div class="img"></div>           
          <div class="txt">
            <p class="sub_tit">&lt;&nbsp;일러스트 예시&nbsp;&gt;</p>
            <p>&bull;&nbsp;일러스트는 해상도 300dpi 이상</p>
            <p>&bull;&nbsp;저장용량은 5mb 이하</p>
            <p>&bull;&nbsp;표현방식은 자유</p>
            <p>&bull;&nbsp;파일형식은 jpg, png, gif, pdf 형식만 허용</p>
            <p>&bull;&nbsp;지원마감&nbsp;:&nbsp;~&nbsp;2021.04.15</p>
            <p>&bull;&nbsp;총 다섯 작품 선정</p>
          </div>
        </li>
        <li>
          <div class="txt">
            <h4>지원자 당첨 혜택</h4>
          </div> 
          <div class="img"></div>           
          <div class="txt">
            <p class="sub_tit">&lt;&nbsp;지원자 공통&nbsp;&gt;</p>
            <p>&bull;&nbsp;지원하시는 모든 회원분들께 3000포인트 증정</p>
            <p class="sub_tit">&lt;&nbsp;당첨 지원자 5분&nbsp;&gt;</p>
            <p>&bull;&nbsp;1만 포인트 증정</p>
            <p>&bull;&nbsp;해당 제작 상품 30%할인쿠폰 2장 증정</p>
          </div>
        </li>
        <p class="bottom_txt">이벤트 제품 수익금 100% 동물보호단체에 기부됩니다.</p>
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