<?php
		
	session_start();

	if (isset($_POST['submit'])) {
		
		include 'dbh.inc.php';

		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

		// checking for empty fields
		if (empty($email) || empty($pwd)) {
			header("Location: ../?msg=empty");
			exit();
		} else {
			$sql = "SELECT * FROM admin WHERE email = '$email';";
			$result = mysqli_query($conn, $sql);
			$resultCheck = mysqli_num_rows($result);
			if ($resultCheck < 1) {
				header("Location: ../?msg=error");
				exit();
			} else {
				if ($row = mysqli_fetch_assoc($result)) {
					if ($pwd == $row['pwd']) {
						// log in the user here
						$_SESSION['u_id'] = $row['id'];
						$_SESSION['u_name'] = $row['name'];
						$_SESSION['u_email'] = $row['email'];
						
        				header("Location: ../admin/index.php");
						exit();
					} else {
						header("Location: ../?msg=error");
						exit();
					}
				} 
			}
		}
	} else {
		header("Location: ../?msg=error");
		exit();
	}