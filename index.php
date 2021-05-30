<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREEN HOOD</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/pop.css">
</head>
<body>
  
  <?php include "./header_main.php"; ?>
  <div id="container">
    <div id="main_01">
      <div class="frame">
        <div class="left">
          <div class="introduce">
            <div class="intro_title">
              <span class="tit_01">Grow</span>
              <span class="tit_02">Your Own</span>
              <span class="tit_03"><strong>Green</strong> Life</span>
            </div>
            <div class="intro_txt">
              <p>지금 바로 새로운 <span>Green Hood</span>가 되어주세요. <br><span>Upcycle</span> 세계가 여러분을 기다리고 있습니다.</p>
            </div>
            <div class="intro_img">
              <ul class="water_box">
                <li class="waterCan"></li>
                <li class="waterDrop"></li>
              </ul>
              <ul class="upcycle_box"> 
                <li class="upcycle_01"></li>
                <li class="upcycle_02"></li>
                <li class="upcylce_03"></li>
              </ul> 
            </div>
            <div class="join_btn">
              <button type="button" onclick="location.href='./join_form.php'">Join Us</button>
            </div>
          </div>
        </div>
        <div class="right">
          <div class="top">
            <ul class="slider">
              <li class="slide_01">
                <a href="./event_view_1.php" target="_blank">
                  <div class="slide_txt">
                    <h3>Animals in Your WORK</h3>
                    <p>멸종 위기 동물을 위한 특별한 재능 기부 캠페인</p>
                  </div>
                </a>
              </li>
              <li class="slide_02">
                <a href="./event_view_2.php" target="_blank">
                  <div class="slide_txt">
                    <h3>뽐내봐요<br>UPCYCLE</h3>
                    <p>업사이클 작품 사진 전시 이벤트</p>
                  </div>
                </a>
              </li>
              <li class="slide_03">
                <a href="./event_view_3.php" target="_blank">
                  <div class="slide_txt">
                    <h3>PLEATS MAMA 한정판 출시</h3>
                    <p>플리츠마마의 한정판 출시 제품 구매 이벤트</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
          <div class="bottom">
            <ul class="slider">
              <li class="slide_01">
                <a href="./notice_view.php?num=2&page=1" target="_blank">
                  <div class="slide_txt">
                    <h3>코로나19 관련 택배 지연 공지사항</h3>
                    <p>폭설로 인한 지역별 택배 지연 포함</p>
                  </div>
                </a>
              </li>
              <li class="slide_02">
                <a href="./notice_view.php?num=1&page=1" target="_blank">
                  <div class="slide_txt">
                    <h3>리뷰 관련 공지사항</h3>
                    <p>포인트 지급 시스템 도입</p>
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div id="main_02">
      <div class="frame">
        <h2 class="main_title">WHAT'S NEW</h2>
        <ul class="new_box"> 
            <li>
              <a href="./article_view_1.php" target="_blank">
                <div class="new_img"></div>
                <div class="new_txt">
                  <h3>인기 Upcycle 브랜드 BEST&nbsp;5</h3>
                  <p>아직도 이 브랜드를 모른다면, 당신은 Greensumer 초보. 과연 어떤 브랜드가 활동하고 있는지 알고싶다면 지금 Click!</p>
                </div>
              </a>
            </li>
            <li>
              <a href="./event_view_3.php" target="_blank">
                <div class="new_img"></div>
                <div class="new_txt">
                  <h3>PLEATS MAMA 신제품 출시</h3>
                  <p>플라스틱 업사이클링 시그니쳐 숄더백으로 인지도를 높인 플리츠마마. 이번에는 따끈한 한정판 신제품으로 새해인사를 건넨다.</p>
                </div>
              </a>
            </li>
            <li>
              <a href="./class_best.php" target="_blank">
                <div class="new_img"></div>
                <div class="new_txt">
                  <h3>&lt;업사이클을 넘어 Helper로&gt;</h3>
                  <p>이번달 베스트 클래스&nbsp;[업사이클을 넘어 Helper]&nbsp;-&nbsp;업사이클도 실천하고 기부도 할 수 있는 프로젝트. 지금 신청하세요!</p>
                </div>
              </a>
            </li>     
        </ul>
      </div>
      <div class="bg"></div>
    </div>
    <div id="main_03">
      <div class="frame">
        <h2 class="main_title">WEEKLY PICKS</h2>
        <div class="weekly_tab">
          <div class="weekly_tag">
            <ul class="hash_tag">
              <li class="active"><a href="#">#NEW</a></li>
              <li><a href="#">#LIMITED</a></li>
              <li><a href="#">#PRACTICAL</a></li>
            </ul>
          </div>
          <div class="weekly_cont">
            <ul class="weekly_pd new active">
              
<?php

  /*$tab = $_GET["tab"];*/
  include "./db_con.php";

  $sql = "select * from shopping where tag='new_sem' order by num desc"; //tag='new_sem'제품만 가져오기
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);

  for($j=0; $j < 2; $j++){
   $no = 3*$j;
?>              
                <li class="pd_box">
<?php 
              
      for($i=$no; $i < $no+3; $i++){
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);
      $price=$row["price"];
      $file_copied = "./data/shopping/".$row["file_copied"];
      $num = $row["num"];
     
?>                      
                  <div class="item">
                    <a href="./shop_view.php?num=<?=$num?>" target="_blank">
                      <div class="pd_img" style="background-image:url(<?=$file_copied?>);"></div>
                      <h4 class="pd_price">￦<?=$price?></h4>
                    </a>
                  </div>
                
<?php

      }
?> 
                </li>
<?php
    }//tab for문 끝나는 부분
?>                
            </ul>    
            <ul class="weekly_pd limited">
              
<?php

  $sql = "select * from shopping where tag='limited' order by num desc"; //tag='limited'에 해당하는 제품만 가져오기
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);

  for($j=0; $j < 2; $j++){
   $no = 3*$j;
?>              
                <li class="pd_box">
<?php 
              
      for($i=$no; $i < $no+3; $i++){
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);
      $price=$row["price"];
      $file_copied = "./data/shopping/".$row["file_copied"];
      $num = $row["num"];
     
?>                      
                  <div class="item">
                    <a href="./shop_view.php?num=<?=$num?>" target="_blank">
                      <div class="pd_img" style="background-image:url(<?=$file_copied?>);"></div>
                      <h4 class="pd_price">￦<?=$price?></h4>
                    </a>
                  </div>
                
<?php

      }
?> 
                </li>
<?php
    }//tab for문 끝나는 부분
?>                
            </ul>    
            <ul class="weekly_pd new">
              
<?php

  $sql = "select * from shopping where tag='practical' order by num desc"; //tag='practical'에 해당하는 제품만 가져오기
  $result = mysqli_query($con, $sql);
  $total_record = mysqli_num_rows($result);

  for($j=0; $j < 2; $j++){
   $no = 3*$j;
?>              
                <li class="pd_box">
<?php 
              
      for($i=$no; $i < $no+3; $i++){
      mysqli_data_seek($result, $i);
      $row = mysqli_fetch_array($result);
      $price=$row["price"];
      $file_copied = "./data/shopping/".$row["file_copied"];
      $num = $row["num"];
     
?>                      
                  <div class="item">
                    <a href="./shop_view.php?num=<?=$num?>" target="_blank">
                      <div class="pd_img" style="background-image:url(<?=$file_copied?>);"></div>
                      <h4 class="pd_price">￦<?=$price?></h4>
                    </a>
                  </div>
                
<?php

      }
?> 
                </li>
<?php
    }//tab for문 끝나는 부분
?>                
            </ul>    
          </div>
        </div>
      </div>
    </div>
    <div id="main_04">
      <div class="frame">
        <h2 class="main_title">REVIEW</h2>
          <div class="review_box">
            <ul class="rev_slider">
              <li class="slide_01">
                <a href="#">
                  <div class="rev_img"></div>
                  <div class="rev_txt">
                    <h4>완전 부드러워요!</h4>
                    <span class="rating">★★★★★</span>
                    <p>플라스틱으로 만들어서 거칠지 않을까했는데, 진짜 부드럽고 다른 브랜드 후리스 부럽지 않아요!</p> 
                  </div>
                </a>
              </li>
              <li class="slide_02 active">
                <a href="#">
                  <div class="rev_img"></div>
                  <div class="rev_txt">
                    <h4>빈티지 장식으로 굳굳</h4>
                    <span class="rating">★★★★☆</span>
                    <p>가볍고 살짝 내구성이 걱정되지만, 방에 놓으니, 카페에 있는 느낌이에요 ㅎ 독특해서 좋아요!</p> 
                  </div>
                </a>
              </li>
              <li class="slide_03">
                <a href="#">
                  <div class="rev_img"></div>
                  <div class="rev_txt">
                    <h4>진짜 튼튼해요!</h4>
                    <span class="rating">★★★★★</span>
                    <p>저 가방 완전 험하게 쓰는데, 튼튼하고 15인치 노트북도 들어가요! 가격값 합니다.</p> 
                  </div>
                </a>
              </li>
              <li class="slide_04">
                <a href="#">
                  <div class="rev_img"></div>
                  <div class="rev_txt">
                    <h4>우리 댕댕이 넘예뻐요</h4>
                    <span class="rating">★★★★★</span>
                    <p>저희집 댕댕이가 3살 생일이어서 기념으로 만들었는데, 생각보다 오래 안걸리고 잘만들었어요! 쌤이 친절하십니다 ㅎㅎ</p> 
                  </div>
                </a>
              </li>
              <li class="slide_05">
                <a href="#">
                  <div class="rev_img"></div>
                  <div class="rev_txt">
                    <h4>퀄리티 좋아요!</h4>
                    <span class="rating">★★★★★</span>
                    <p>빈티지한 것 좋아하는데, 포인트도 되고 자주 하고 다닐 것 같아요.</p> 
                  </div>
                </a>
              </li>
              <li class="slide_06">
                <a href="#">
                  <div class="rev_img"></div>
                  <div class="rev_txt">
                    <h4>만족도100%</h4>
                    <span class="rating">★★★★★</span>
                    <p>넘 어렵지 않을까 싶었는데, 쌤이 수업도 천천히 하시고, 무엇보다 만들고 나니 뿌듯함이 장난아니에요!꼭 들어보세요!</p> 
                  </div>
                </a>
              </li>
            </ul>
          </div>
        </div>  
    </div>
    <div id="main_05">
      <div class="frame">
        <h2 class="main_title">PARTNERS</h2>
        <div class="video_txt">
          <p><span class="site">GREEN HOOD</span>는 <span class="partners">GUP</span>와 함께 합니다.</p>
        </div>
        <div class="video_space">
          <div class="video">
            <video loop autoplay playsinline muted> 
               <source type="video/mp4" src="video/GUP.mp4">
               Your browser does not supported the video tag.
            </video>
         </div>
        </div>
      </div>
    </div>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <div id="dark" class=""></div>
  <div id="popup" class="">
        <span class="close">×</span>
        <div class="pop_cont">
            <img src="./img/popup.png" alt="톱니바퀴">            
        </div>
        <div class="pop_txt">
              <h3>이벤트 시스템 점검 안내</h3>
              <p>시스템 운영 상에 문제가 발생하여 사이트 이용에 불편을 드려 죄송합니다.</p>
              <p>최대한 빠른 시일 내에 해결하여 원활한 이용이 가능토록 하겠습니다.</p>
        </div>
        <button type="button" onclick="todayClosePop();">하루동안 열리지 않기</button>
  </div>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/main.js"></script>
  <script src="js/pop.js"></script>
</body>
</html>
