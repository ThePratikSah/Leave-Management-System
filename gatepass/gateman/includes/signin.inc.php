<?php
		
    session_start();

	if (isset($_POST['submit'])) {
		
		include 'includes/dbh.inc.php';

		// receiving the data from the login page
		$uid = $_POST['username'];
		$pwd = $_POST['pwd'];

		// checking for empty fields
		if (empty($uid) || empty($pwd)) {
			header("Location: ../?msg=empty");
			exit();
		}
		
		$sql = 'SELECT * from gateman WHERE username = "$uid"';
		$result = mysqli_query($conn, $sql);
		$resultCheck = mysqli_num_rows($result);
		if ($resultCheck < 1) {
			header("Location: ../?msg=error1");
			exit();
		} else {
			if ($row = mysqli_fetch_assoc($result)) {
				if ($row['pwd'] != $pwd) {
					header("Location: ../?msg=error2");
					exit();
				} elseif ($row['pwd'] == $pwd) {
					// log in the user here
					$_SESSION['u_id'] = $row['id'];
					$_SESSION['u_uid'] = $row['username'];
					
					header("Location: ../dashboard.php");
					exit();
				}
			} 
		}
	} else {
		header("Location: ../?msg=error3");
		exit();
	}