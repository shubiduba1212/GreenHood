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
	if(isset($_SESSION["userlevel"])){
		$userlevel = $_SESSION["userlevel"];
	}else{
		$userlevel = "";
  }
  
	$subject = str_replace("'","&#39;", $_POST["subject"]);
	$content = str_replace("'","&#39;", $_POST["content"]);
	$regist_day = date("Y-m-d (H:i)");
	$notice = $_POST["note"];
	$upload_dir = "./data/notice/"; 
	$upfile_name = $_FILES["upfile"]["name"]; 
	$upfile_tmp_name = $_FILES["upfile"]["tmp_name"]; 
	$upfile_type = $_FILES["upfile"]["type"];
	$upfile_size = $_FILES["upfile"]["size"];
	$upfile_error = $_FILES["upfile"]["error"]; 

	if($upfile_name && !$upfile_error){ 
		$file = explode(".",$upfile_name); 
		$file_name = $file[0]; 
		$file_ext = $file[1];

		$new_file_name = date("Y_m_d_H_i_s");
		$copied_file_name = $new_file_name.".".$file_ext;
		$uploaded_file = $upload_dir.$copied_file_name; 

		if($upfile_size > 3000000){
				echo ("
						<script>
							alert('업로드한 파일의 크기가 3MB를 초과하였습니다.\n파일 사이즈를 조정하여 다시 업로드 하시기 바랍니다.');
							history.go(-1);
						<script>
				");
		}

		if(!move_uploaded_file($upfile_tmp_name, $uploaded_file)){
				echo("
					<script>
						alert('파일을 지정한 디렉토리에 옮기는 것에 실패했습니다.');
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
		$sql = "insert into notice (id, name, subject, content, regist_day, hit, file_name, file_type, file_copied, note, level) ";
		$sql .="values('$userid', '$username', '$subject', '$content','$regist_day', 0, '$upfile_name','$upfile_type','$copied_file_name', '$notice', '$userlevel')";

    mysqli_query($con, $sql);


		echo("
			<script>
				location.href='notice_list.php';
			</script>
		");


?>