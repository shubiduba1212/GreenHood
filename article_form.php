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
        <h2>ARTICLE</h2>
      </div>
    </div>
  </div>
  <div id="article_box">
    <h2 id="article_title">칼럼 > 등록하기</h2>
     <form name="article_form" action="article_insert.php" method="post" enctype="multipart/form-data">
        <ul id="article_form">
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
                    <label for="title">칼럼&nbsp;타이틀 : </label>
                </div>
                <div class="input">
                    <input type="text" name="title">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="sub">서브&nbsp;타이틀 : </label>
                </div>
                <div class="input">
                    <input type="text" name="sub">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="content">상세내용 : </label>
                </div>
                <div class="input">
                    <textarea name="content">
                    </textarea>
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="upfile">대표 이미지 : </label>
                </div>
                <div class="input">
                    <input type="file" class="upload" name="upfile">
                </div>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="button" onclick="check_input();">등록하기</button></li>
          <li><button type="button" onclick="location.href='./article_list.php?sort=num'">목록보기</button></li>
        </ul>
      </form>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/article.js"></script>
</body>
</html>