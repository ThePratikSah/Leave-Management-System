<?php  
	include 'dbh.inc.php';
	if (isset($_POST['submit'])) {
		$id = $_POST['id'];
		$fromdate = $_POST['fromdate'];
		$todate = $_POST['todate'];
		$reason = $_POST['reason'];

		// sql query for request
		$sql = "INSERT into request (id, fromdate, todate, reason) VALUES ('$id', '$fromdate', '$todate', '$reason')";
	
		if (mysqli_query($conn, $sql)) {
			$sql = "UPDATE users SET requested='1' WHERE id = $id;";
			mysqli_query($conn, $sql);
			header("Location: ../dashboard.php/?msg=requested-successfully");
			exit();
		} else {
			header("Location: ../dashboard.php/?msg=failed");
			exit();
		}
	}

	// Deleting leave request
	if (isset($_POST['reject'])) {
		$id = $_POST['id'];
		$sql = "DELETE FROM request WHERE id = $id";
		mysqli_query($conn, $sql);
		$sql = "UPDATE users SET requested='0' WHERE id=$id";
		mysqli_query($conn, $sql);
		header("location: http://localhost/gatepass/admin/index.php/?msg=rejected");
	}

	// Approving leave request
	if (isset($_POST['approve'])) {
		$id = $_POST['id'];
		$sql = "UPDATE request SET approved='1' WHERE id=$id";
		mysqli_query($conn, $sql);
		$sql = "UPDATE users SET onleave='1' WHERE id=$id";
		mysqli_query($conn, $sql);

		header("location: http://localhost/gatepass/admin/index.php/?msg=approved");
	}	

	// suspending someone from leave
	if (isset($_POST['suspend'])) {
		$id = $_POST['id'];
		$sql = "DELETE FROM request WHERE request.r_id = 0";
		mysqli_query($conn, $sql);
		$sql = "UPDATE users SET onleave='0', requested='0' WHERE id=$id";
		mysqli_query($conn, $sql);
		header("location: http://localhost/gatepass/admin/index.php/?msg=suspended");
	}

	