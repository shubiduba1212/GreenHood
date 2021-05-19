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
  <?php
    include "./db_con.php";

    $sql = "select * from article where num='1'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);

    $title = $row["title"];

  ?>
  <div id="article_frame">
    <div class="article_title">
      <h3><?=$title?></h3>
    </div>
    <div class="article_cont">
      <ul class="article_box">
        <li>
            <ul>
               <li class="img_01"></li>
               <li class="img_02"></li>
            </ul>
            <div class="txt">
            <h4>Gaâla</h4>
            <p>리투아니아 브랜드로 여성스러운 의류 브랜드이다. 생산공정의 쓰고 남은 천이나 재고 의류 그리고 포인트가 될만한 천연재료를 사용하여 제작한다. 캐쥬얼부터 오피스룩까지 커버하며 소재 및 가공이 뛰어나다.</p>
            <p><a href="https://gaala.com/" target="_blank">&rarr;&nbsp;공식 홈페이지 이동</a></p>
            <p class="madein">Made in Belarus</p>
            </div>
        </li>
        <li>
            <ul>
               <li class="img_01"></li>
               <li class="img_02"></li>
            </ul>
            <div class="txt">
            <h4>Ahimsa Collective</h4>
            <p>오스트레일리아 브랜드로 가방 및 액세서리 패션 브랜드이다. 세계에 그 어떤 해도 끼치지 않는 다는 기업 이념 아래 고급스러우면서도 지속가능한 제품들을 제작한다. 특히, 파인텍스(Pinatex-파인애플로 부터 추출한 셀룰로오스 섬유)로 천연가죽 텍스처를 재현한 가방 제품이 시그니쳐 제품이다.</p>
            <p><a href="https://www.ac-official.com/" target="_blank">&rarr;&nbsp;공식 홈페이지 이동</a></p>
            <p class="madein">Made in China</p>
            </div>
        </li>
        <li>
            <ul>
               <li class="img_01"></li>
               <li class="img_02"></li>
            </ul>
            <div class="txt">
            <h4>Ecoalf</h4>
            <p>스페인에 기반을 둔 브랜드로 제품 전체를 오래된 타이어, 재활용 천, 플라스틱 병과 같은 재활용된 재료로 제작한다.탄소배출량을 줄이기 위해 사용하는 재료가 재활용 및 생산되는 곳에서 생산된다. 브랜드 자체가 업사이클링하기 위해 노력하는 브랜드이다.</p>
            <p><a href="https://ecoalf.com/en/" target="_blank">&rarr;&nbsp;공식 홈페이지 이동</a></p>
            <p class="madein">Made in Spain, Portugal, Taiwan, China, South Korea and Thailand</p>
            </div>
        </li>
        <li>
            <ul>
               <li class="img_01"></li>
               <li class="img_02"></li>
            </ul>
            <div class="txt">
            <h4>Anekdot</h4>
            <p>독일 브랜드로 생산공정에서 남는 의류용 천, 의류 라인에 사용되고 남는 부분, 잘린 부분, 빈티지 가공 등을 통해 제작되는 란제리 브랜드이다. 업사이클링 브랜드라고 해서 디자인이 별로일 거라 생각한다면, 걱정마시라. 유럽 특유의 레이스 및 패턴을 살린 세련된 디자인의 속옷이 당신을 기다리고 있다.</p>
            <p><a href="https://anekdotboutique.com/" target="_blank">&rarr;&nbsp;공식 홈페이지 이동</a></p>
            <p class="madein">Made in Germany and Poland</p>
            </div>
        </li>
        <li>
            <ul>
               <li class="img_01"></li>
               <li class="img_02"></li>
            </ul>
            <div class="txt">
            <h4>RE/DONE</h4>
            <p>완벽한 빈티지 청바지를 찾고있고, 그 청바지를 찾기 위한 지루한 검색과정을 생략하고 싶다면, 이 브랜드에 주목하자. 미국브랜드로 각각의 제품은 빈티지 청바지를 수거하여 트렌드에 맞춰 새로운 청바지로 탈바꿈하는 브랜드이다. 기성품과 다른 청바지를 찾는다면 이 브랜드를 추천!</p>
            <p><a href="https://shopredone.com/" target="_blank">&rarr;&nbsp;공식 홈페이지 이동</a></p>
            <p class="madein">Made in the United States</p>
            </div>
        </li>
      </ul>
    </div>
  </div>
<?php
    mysqli_close($con);
?>

  <ul class="buttons">
    <li><button type="button" onclick="location.href='./article_list.php?'">목록보기</button></li>
  </ul>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/article.js"></script>
</body>
</html>