<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ Join</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/join.css">
</head>
<body>
  <?php include "./header_fixed.php";?>
  <div id="main_container">
    <div class="join_box">
      <form name="join_form" action="join_insert.php" method="post">
          <h2>Join Member</h2>
          <p><span>*&nbsp;</span>필수 입력 항목</p>
          <div class="form id">
            <div class="label">
                <label for="id">이메일 아이디<span>&nbsp;*</span></label>
            </div>
            <div class="input">
                <input type="text" name="id" placeholder="@까지 정확하게 입력해주세요.">
            </div>
        
              <div class="add_btn">             
                  <button type="button" onclick="check_id();">중복체크</button>
              </div>
          </div>

          <div class="form">
              <div class="label">
                  <label for="pass">비밀번호<span>&nbsp;*</span></label>
              </div>
              <div class="input">
                  <input type="password" name="pass" placeholder="영문+숫자+특수문자 조합 8~16자리를 입력해주세요.">
              </div>
          </div>

          <div class="form">
              <div class="label">
                  <label for="pass_confirm">비밀번호 확인<span>&nbsp;*</span></label>
              </div>
              <div class="input">
                  <input type="password" name="pass_confirm">
              </div>
          </div>

          <div class="form">
              <div class="label">
                  <label for="name">이름<span>&nbsp;*</span></label>
              </div>
              <div class="input">
                  <input type="text" name="name" placeholder="ex)홍길동">
              </div>
          </div>

          

          <hr>

          <div class="buttons">
              <button type="button" onclick="reset_form();">취소</button>
              <button type="button" onclick="check_input();">확인</button>
          </div>
      </form>
    </div>
    <div class="sns_login">
      <div class="sns_login_tit">
        <div class="sns_border"></div>
        <span>SNS 간편가입</span>
      </div>
      <ul>
        <li><a id="kakao_login" href="" onclick="kakao();">카카오톡</a></li>
        <li><a id="naver_login" href="" onclick="naver();">네이버</a></li>
        <li><a id="fbook_login" href="" onclick="fbook();">페이스북</a></li>
      </ul>
    </div>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/login.js"></script>
  <script src="js/join_form.js"></script>
</body>
</html>