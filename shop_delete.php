<?php
		$num = $_GET["num"];

		include "./db_con.php";

		$sql = "select * from shopping where num='$num'";
		$result = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($result);

		$copied_name = $row["file_copied"]; 
		if($copied_name){
				$file_path = "./data/shopping/".$copied_name; 
				unlink($file_path);  
		}

		$sql2 = "delete from shopping where num='$num'";
		mysqli_query($con, $sql2);
		mysqli_close($con);

		echo ("
				<script>
					location.href ='./admin.php?menu=shopping';
				</script>
		");
?>