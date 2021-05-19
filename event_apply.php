<?php
session_start();

if(!isset($_SESSION['userid'])){
  echo("
  <script>
      alert('로그인 후 이용해주세요.');
      location.href = './login_form.php';
  </script>    
  ");  
}



?>