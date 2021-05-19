<?php
   session_start();
   if(isset($_SESSION["userid"])){
      $userid = $_SESSION["userid"];
   }else{
      $userid = "";
   }
   if(isset($_SESSION["username"])){
      $username = $_SESSION["username"];
   }else{
      $username = "";
   }

   $num = $_GET["num"];
   $title = $_POST["title"];
   $tutor = $_POST["tutor"];
   $sub = $_POST["sub"];
   $content = $_POST["content"];
   $price = $_POST["price"];
   $category = $_POST["category"];
   $tag= $_POST["tag"];   
   $category = $_POST["category"];
   $tag= $_POST["tag"];
   $difficulty= $_POST["difficulty"];



   $upload_dir = "./data/class/"; 
   $upfile_name = $_FILES["upfile"]["name"]; 
   $upfile_tmp_name = $_FILES["upfile"]["tmp_name"];  
   $upfile_type = $_FILES["upfile"]["type"]; 
   $upfile_size = $_FILES["upfile"]["size"]; 
   $upfile_error = $_FILES["upfile"]["error"]; 


   if($upfile_name && !$upfile_error){  
      $file = explode(".", $upfile_name);  
      $file_name = $file[0];  
      $file_ext = $file[1];
      $new_file_name = date("Y_m_d_H_i_s");
      $copied_file_name = $new_file_name.".".$file_ext;  
      $uploaded_file = $upload_dir.$copied_file_name;   


      if($upfile_size > 5000000){
         echo ("
            <script>
               alert('업로드한 파일의 크기가 5MB를 초과하였습니다. \n파일 사이즈를 조정하여 다시 업로드 하시기 바랍니다.');
               history.go(-1);
            </script>
         ");
      }


      if(!move_uploaded_file($upfile_tmp_name, $uploaded_file)){
         echo("
            <script>
               alert('파일을 지정한 디렉토리에 옮기는 것을 실패했습니다.');
               history.go(-1);
            </script>
         ");
         exit;
      }
   }else{  
      $upfile_name = "";
      $upfile_type = "";
      $copied_file_name = "";
   }

   include "./db_con.php";
   $sql = "update class set title='$title', tutor='$tutor', sub='$sub', content='$content', price='$price', file_name='$upfile_name', file_type='$upfile_type', file_copied='$copied_file_name', category='$category', tag='$tag', difficulty='$difficulty' where num='$num'";


   mysqli_query($con, $sql);

   mysqli_close($con);

   echo ("
   <script>
    location.href = './class_view.php?num=$num?';
   </script>
   ");


?>