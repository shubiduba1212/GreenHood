<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Class</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/class.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>
  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>CLASS</h2>
      </div>
    </div>
  </div>
  <div id="class_box">
    <h2 id="class_title">클래스 > 등록하기</h2>
     <form name="class_form" action="class_insert.php" method="post" enctype="multipart/form-data">
        <ul id="class_form">
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
                    <label for="title">클래스명 : </label>
                </div>
                <div class="input">
                    <input type="text" name="title">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="tutor">강사명 : </label>
                </div>
                <div class="input">
                    <input type="text" name="tutor">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="sub">서브타이틀 : </label>
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
                    <label for="price">가격(￦) : </label>
                </div>
                <div class="input">
                    <input type="text" name="price">
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
          <li>
                <div class="label">
                    <label for="category">카테고리 : </label>
                </div>
                <div class="input">
                    <input type="text" name="category">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="tag">해시태그 : </label>
                </div>
                <div class="input">
                    <input type="text" name="tag">
                </div>
          </li>
          <li>
                <div class="label">
                    <label for="difficulty">난이도 : </label>
                </div>
                <div class="input">
                    <input type="text" name="difficulty">
                </div>
          </li>
        </ul>
        <ul class="buttons">
          <li><button type="button" onclick="check_input();">등록하기</button></li>
          <li><button type="button" onclick="location.href='./class_list.php?sort=num'">목록보기</button></li>
        </ul>
      </form>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/class.js"></script>
</body>
</html>