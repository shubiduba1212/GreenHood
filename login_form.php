<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Login</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/pop.css">
</head>
<body>
  <?php include "./header_fixed.php"; ?>

  <div id="main_upper_area">
    <div class="frame">
      <div class="m_upper_img"></div>
      <div class="m_upper_txt">
        <h2>LOGIN</h2>
        <P>“Waste isn’t ‘Waste’<br>&nbsp;<span>until we waste it</span>.”</P>
      </div>
    </div>
  </div>

  <div id="main_container">
    <div class="login_box">
      <form name="login_form" action="login.php" method="post">
          <ul>
            <li class="login_id">
              <label for="id">이메일 아이디</label>
              <input type="text" name="id" id="id" placeholder="이메일 아이디를 @까지 정확하게 입력하세요">
            </li>
            <li class="login_pw">
              <label for="pw">비밀번호</label>
              <input type="password" name="pw" id="pw" placeholder="영문+숫자+특수문자 조합 8~16자리를 입력해주세요.">
            </li>
          </ul>
          <div class="login_btn">
            <button type="button" onclick="check_input();">로그인</button>
          </div>
      </form>
    </div>
    <div class="join_btn">
      <span>*&nbsp;아직 <strong>GREEN HOOD</strong> 회원이 아니신가요?&nbsp;</span>
      <button type="button" onclick="location.href='./join_form.php'">회원가입</button>
    </div>
    <div class="sns_login">
      <div class="sns_login_tit">
        <div class="sns_border"></div>
        <span>SNS 로그인</span>
      </div>
      <ul>
        <li><a id="kakao_login" href="" onclick="kakao();">카카오톡</a></li>
        <li><a id="naver_login" href="" onclick="naver();">네이버</a></li>
        <li><a id="fbook_login" href="" onclick="fbook();">페이스북</a></li>
      </ul>
    </div>
  </div>
  <div id="dark2" class=""></div>
  <div id="popup2" class="pop_info">
        <span class="close">×</span>
        <div class="pop_cont info">
            <img src="./img/enter_logo.png" alt="GREEN HOOD 로고">            
        </div>
        <div class="pop_txt info">
              <h3>GREEN HOOD 로그인 안내</h3>
              <p>관리자&nbsp;&ndash;&nbsp;ID:&nbsp;admin@greenhood.com&nbsp;PW:0000</p>
              <p>회원1&nbsp;&ndash;&nbsp;ID:&nbsp;alpha@raver.com&nbsp;PW:0000</p>
              <p>회원2&nbsp;&ndash;&nbsp;ID:&nbsp;beta@baum.net&nbsp;PW:0000</p>
        </div>
        <button type="button" onclick="todayClosePop2();">하루동안 열리지 않기</button>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/login.js"></script>
  <script src="js/pop2.js"></script>
</body>
</html>