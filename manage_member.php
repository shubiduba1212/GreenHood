<?php
		$id = $_POST["id"];
    $pass = $_POST["pass"];
    $name = $_POST["name"];
    $level = $_POST["level"];
    $point = $_POST["point"];
    if($_POST["email1"] && $_POST["email2"]){
        $email1 = $_POST["email1"];
        $email2 = $_POST["email2"];
        $email = $email1."@".$email2;
    }

		include "./db_con.php";
    if(!$email){
      $sql = "update member set pass='$pass', name='$name', level='$level', point='$point'";
	  }else{
      $sql = "update member set pass='$pass', name='$name', email='$email', level='$level', point='$point'";
    }
    $sql .= "where id= '$id'";

		mysqli_query($con, $sql);

	
		$sql2 = "select * from member where id='$id'";
		$result = mysqli_query($con, $sql2);
		$row = mysqli_fetch_array($result); 

		session_start(); 
		$_SESSION["username"] = $row["name"];
		$_SESSION["userlevel"] = $row["level"];
		$_SESSION["userpoint"] = $row["point"];




		mysqli_close($con);
		
		echo ("
			<script>
				location.href='./admin.php?menu=member';
			</script>
		")
		
?>