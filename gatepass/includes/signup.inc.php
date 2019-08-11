<?php  

	if (isset($_POST['submit'])) {

		include_once 'dbh.inc.php';

		// function for validating mobile number
		function validate_phone_number($phone) {
		     // Allow +, - and . in phone number
		     $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
		     // Remove "-" from number
		     $phone_to_check = str_replace("-", "", $filtered_phone_number);
		     // Check the lenght of number
		     // This can be customized if you want phone number from a specific country
		     if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 10) {
		        return false;
		     } else {
		       return true;
		     }
		}

		$fname = mysqli_real_escape_string($conn, $_POST['fname']);
		$lname = mysqli_real_escape_string($conn, $_POST['lname']);
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$roll = mysqli_real_escape_string($conn, $_POST['roll']);
		$uid = mysqli_real_escape_string($conn, $_POST['uid']);
		$onleave = mysqli_real_escape_string($conn, $_POST['onleave']);
		$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
		$mob = mysqli_real_escape_string($conn, $_POST['mob']);


		// error handlers
		// check for empty fields

		if (empty($fname) || empty($lname) || empty($email) || empty($roll) || empty($uid) || empty($pwd) || empty($mob)) {
			header("Location: ../?msg=empty");
			exit();
		} else {
			// checking if input characters are valid
			if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname)) {
				header("Location: ../?msg=invalid");
				exit();
			} else {
				// checking a valid email
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					header("Location: ../?msg=email");
					exit();
				} else {
					// checking a valid phone number
					if (validate_phone_number($mob) == true) {
					   // now checking if any user exists with the same uid
						$sql = "SELECT * FROM users WHERE username = '$uid' or email = '$email' or roll = '$roll';";
						$result = mysqli_query($conn, $sql);
						$resultCheck = mysqli_num_rows($result);

						if ($resultCheck > 0) {
							header("Location: ../?msg=uidtaken");
							exit();
						} else {
							// hashing the password
							$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

							// insert the new user into the database
							$sql = "INSERT INTO users (fname, lname, email, roll, username, onleave, pwd, mobile) VALUES ('$fname', '$lname', '$email', '$roll', '$uid', $onleave, '$hashedPwd', '$mob');";
							
							if (mysqli_query($conn, $sql)) {
								header("Location: ../?msg=s-success");
								exit();
							} else {
								header("Location: ../?msg=failed");
								exit();
							}
						}
					} else {
					  	header("Location: ../?msg=mob");
						exit();
					}	
				}
			}
		}

	} else {
		header("Location: ../signup.php?msg=retry");
		exit();
	}