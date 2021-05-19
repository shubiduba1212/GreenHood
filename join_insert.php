<?php
$id = $_POST["id"];
$pass = $_POST["pass"];
$name = $_POST["name"];
$regist_day = date("Y-m-d (H:i)");


include "./db_con.php";

//기존 아이디 유무 확인
$sql = "select * from member where id = '$id'";
$result = mysqli_query($con, $sql);
$num_record = mysqli_num_rows($result);
if($num_record){ 
  echo("
      <script>
        alert('동일한 아이디가 존재합니다. 아이디를 변경해주세요.');
      </script>  
      history.go(-1);
  ");
}else{
  $sql = "insert into member (id, pass, name, email, regist_day, level, point) values('$id','$pass','$name', '','$regist_day', 'Friend', 2000)";
  mysqli_query($con, $sql);
}
  mysqli_close($con);

  echo("
    <script>
      location.href='./index.php';
    </script>
  ");

?>