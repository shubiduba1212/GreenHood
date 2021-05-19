<?php
		$num = $_GET["num"];
		$page = $_GET["page"];

		include "./db_con.php";

		$sql = "select * from notice where num='$num'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);

		$copied_name = $row["file_copied"]; 
		if($copied_name){
				$file_path = "./data/notice/".$copied_name; 
				unlink($file_path);  
		}

		$sql2 = "delete from notice where num='$num'";
		mysqli_query($con, $sql2);
		mysqli_close($con);

		echo ("
				<script>
					location.href = 'notice_list.php?page=$page';
				</script>
		");
?>