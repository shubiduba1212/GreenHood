<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ 회원정보수정</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="css/common_fixed.css">
  <link rel="stylesheet" href="css/join.css">
</head>
<body>
  <?php include "./header_fixed.php";?>
  <?php
    //http://localhost/portfolio/member_modify_form.php?num=3
    $num = $_GET["num"];

    include "./db_con.php";
    $sql= "select * from member where num='$num'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $id = $row["id"];
    $pass = $row["pass"];
    $name = $row["name"];
    $level = $row["level"];
    $point = $row["point"];
    if(!$row["email"]){
      
    }else{
      $email = explode("@", $row["email"]);
      $email1 = $email[0];
      $email2 = $email[1];
    }
    mysqli_close($con);
  ?>
  <div id="main_container">
    <div class="join_box">
      <form name="join_form" action="manage_member.php?id=<?=$id?>" method="post">
          <h2>Manage Member</h2>
          <p><span>*&nbsp;</span>필수 입력 항목</p>
          <div class="form id">
            <div class="label">
                <label for="id">이메일 아이디<span>&nbsp;*</span></label>
            </div>
            <div class="input">
                <input type="text" name="id" value="<?=$id?>" readonly>
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
                  <input type="password" name="pass" value="<?=$pass?>">
              </div>
          </div>

          <div class="form">
              <div class="label">
                  <label for="pass_confirm">비밀번호 확인<span>&nbsp;*</span></label>
              </div>
              <div class="input">
                  <input type="password" name="pass_confirm" value="<?=$pass?>">
              </div>
          </div>

          <div class="form">
              <div class="label">
                  <label for="name">이름<span>&nbsp;*</span></label>
              </div>
              <div class="input">
                  <input type="text" name="name" value="<?=$name?>">
              </div>
          </div>
          <div class="form">
              <div class="label">
                  <label for="level">레벨</label>
              </div>
              <div class="input">
                  <input type="text" name="level" value="<?=$level?>">
              </div>
          </div>
          <div class="form">
              <div class="label">
                  <label for="point">포인트</label>
              </div>
              <div class="input">
                  <input type="text" name="point" value="<?=$point?>">
              </div>
          </div>
<?php
 if(!$row["email"]){
?>
          <div class="form">
              <div class="label">
                  <label for="name">이메일</label>
              </div>
              <div class="input">
              <input type="text" name="email1">&nbsp;@&nbsp;<input type="text" name="email2">
              </div>
              <span class="email">이메일을 등록하시면 더 다양한 <strong>GREEN HOOD</strong>최신 소식을 받아볼 수 있습니다</span>
          </div>  
<?php   
 }else{
?>
          
          <div class="form email">
              <div class="label">
                  <label for="email1">이메일</label>
              </div>
              <div class="input">
                  <input type="text" name="email1" value="<?=$email1?>">@<input type="text" name="email2" value="<?=$email2?>">
              </div>
          </div>
<?php
        }    
?>
          

          <hr>

          <div class="buttons">
              <button type="button" onclick="reset_form();">취소</button>
              <button type="button" onclick="check_input();">수정</button>
          </div>
      </form>
    </div>
  </div>
  <div id="footer">
    <?php include "./footer.php"; ?>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/common.js"></script>
  <script src="js/join_form.js"></script>
</body>
</html>