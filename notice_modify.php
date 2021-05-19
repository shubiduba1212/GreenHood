<?php
  //http://localhost/portfolio/notice_modify_form.php?num=1&page=1
  $num = $_GET["num"]; 
  $page = $_GET["page"];
  
  $subject = str_replace("'","&#39;", $_POST["subject"]);
  $content = str_replace("'","&#39;", $_POST["content"]);
  $notice = $_POST["note"];
  
  include "./db_con.php";
  
  $sql = "update notice set subject='$subject', content='$content', note='$notice' where num='$num'";
  mysqli_query($con, $sql);
  
  mysqli_close($con);
  
  echo ("
    <script>
      location.href='notice_list.php?page=$page';
    </script>
  ");
?>