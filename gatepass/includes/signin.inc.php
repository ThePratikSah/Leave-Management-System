<?php
		
	session_start();

	if (isset($_POST['submit'])) {
		
		include 'dbh.inc.php';

		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		// checking for empty fields
		if (empty($uid) || empty($pwd)) {
			header("Location: ../?msg=empty");
			exit();
		} else {
			$sql = "SELECT * FROM users WHERE username = '$uid' OR email = '$uid';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1) {
				header("Location: ../?msg=error");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					// dehashing the password
					$hashPwd = password_verify($pwd, $row['pwd']);
					if ($hashPwd == false) {
						header("Location: ../?msg=error");
						exit();
					} elseif ($hashPwd == true) {
						// log in the user here
						$_SESSION['u_id'] = $row['id'];
						$_SESSION['u_fname'] = $row['fname'];
						$_SESSION['u_lname'] = $row['lname'];
						$_SESSION['u_email'] = $row['email'];
						$_SESSION['u_uid'] = $row['username'];
						$_SESSION['u_mob'] = $row['mobile'];
						
        				header("Location: ../dashboard.php");
						exit();
					}
				} 
			}
		}
	} else {
		header("Location: ../?msg=error");
		exit();
	}