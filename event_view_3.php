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

    $sql = "select * from event where num='3'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $title = $row["title"];

  ?>
  <div id="event_frame_03">
    <div class="event_title">
      <h3><?=$title?></h3>
    </div>
    <div class="event_cont">
      <ul class="event_box">
        <li>
          <div class="img"></div>
          <div class="txt">
            <h4>PLEATS MAMA의 한정판 판매</h4>
            <p><strong>GREEN HOOD</strong>단독판매</p>
            <p><strong>GREEN HOOD</strong>회원 여러분께&nbsp;<span>PLEATS MAMA 한정판 구입 기회</span>를 먼저 드립니다.<br><span>놓치지 마세요!</span></p>
          </div>
        </li>
        <li>
          <div class="txt">
            <h4 class="sub_txt">판매기한</h4>
          </div>          
          <div class="txt">
            <p>기간&nbsp;:&nbsp;~&nbsp;2021.04.15</p>
          </div>
        </li>
        <p class="bottom_txt">판매기한 경과 후 구매 불가합니다.</p>       
      </ul>
      <ul class="event_list">
<?php
  include "./db_con.php";

  $sql = "select * from shopping where brand='PLEATS MAMA' order by num desc";
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);

  for($i = 0; $i < $total_record; $i++){
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);
      $num = $row["num"];
      $brand = $row["brand"];
      $product = $row["product"];
      $content = $row["content"];
      $price = number_format($row["price"]);
      $file_copied = "./data/shopping/".$row["file_copied"];

?>            
          <li>
              <a href="./shop_view.php?num=<?=$num?>">
                <div class="pd_img">
                    <img src="<?=$file_copied?>" alt="<?=$brand?>&#124;<?=$product?>">
                </div>
                <h3 class="pd_brand"><?=$brand?></h3>
                <p class="pd_name"><?=$product?></p>
              </a>
                <div class="pd_info">
                  <div class="pd_price"><span><?=$price?></span>원</div>
              </div>
          </li>
<?php
  }
?>                  
      </ul>
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