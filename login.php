<?php

    $id = $_POST["id"];
    $pw = $_POST["pw"];

    include "./db_con.php";

    $sql = "select * from member where id = '$id'";
    $result = mysqli_query($con, $sql);
    $num_match = mysqli_num_rows($result);
    
    if(!$num_match){
      echo("
        <script>
          alert('존재하지 않는 아이디입니다. 다시 입력해주세요.');
          history.go(-1);
        </script>
      ");
    }else{
      $row = mysqli_fetch_array($result);
      $db_pass = $row['pass'];
      mysqli_close($con);

      if($pw != $db_pass){
        echo("
          <script>
            alert('입력하신 비밀번호가 일치하지 않습니다. 다시 입력해주세요.');
          </script>
        ");
        exit;
      }else{
        session_start();
        $_SESSION["userid"] = $row["id"];
        $_SESSION["username"] = $row["name"];
        $_SESSION["userlevel"] = $row["level"];
        $_SESSION["userpoint"] = $row["point"];

        echo("
          <script>
            location.href='./index.php';
          </script>
        ");
      }
    }
?>