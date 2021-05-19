<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>GREENHOOD ｜ join</title>
  <link rel="shortcut icon" href="./img/logo.png">
  <link rel="stylesheet" href="./css/id_chk.css">
</head>
<body>
  <h2>아이디 중복 체크</h2>
  <div id="id_chk_txt">
  <?php
    $id = $_GET["id"];

    if(!$id){
      echo("<p>이메일 아이디(@포함 전체)를 입력해주세요</p>");
    }else{
      include "./db_con.php";
      $sql = "select * from member where id='$id'";
      $result = mysqli_query($con, $sql);
      $num_record = mysqli_num_rows($result);

      if($num_record){
        echo "<p><b>".$id."</b> 는 중복된 이메일 아이디입니다.</p><p>다른 이메일 아이디를 사용해주세요.</p>";
      }else{
        echo "<p><b>".$id."</b> 는 사용 가능한 이메일 아이디입니다.</p>";
      }
      mysqli_close($con); 
    }
  ?>
  </div>
  <div id="close">
    <button type="button" onclick="self.close();">닫기</button>
  </div>
</body>
</html>