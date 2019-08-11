<?php
	include 'header.php';
	include 'includes/dbh.inc.php';
	if (!isset($_SESSION['u_id'])) {
		header("Location: ./?msg=failed");
	}
	$mail = $_SESSION['u_email'];
	$gravatar_link = 'https://www.gravatar.com/avatar/' . md5($mail) . '?s=120';
	$sql = 'SELECT * FROM users';
	if (isset($_SESSION['u_id'])) {
		$result = mysqli_query($conn, $sql);
	}
?>
<!-- Modal -->
<div class="modal fade" id="change-password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<form method="POST" action="">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
						<label>Your Old Password</label>
						<input required="" name="old-pwd" type="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<label>Enter New Password</label>
						<input required="" name="new-pwd" type="password" class="form-control" placeholder="password">
					</div>
					<div class="form-group">
						<label>Re-Enter Password</label>
						<input required="" name="re-pwd" type="password" class="form-control" placeholder="password">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-info">Change</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="main-panel">
	<div class="content mt-4 mb-4">
		<div class="container">
			<div class="row">
				<div class="col-md-4 mb-4">
					<div class="card card-user shadow-sm rounded">
						<div class="card-body">
							<?php if (mysqli_num_rows($result) > 0):
								while ($row = mysqli_fetch_assoc($result)):
									if ($row['id'] == $_SESSION['u_id']):
							?>
							<div class="author text-center">
								<img width="120px" height="120px" class="avatar border-gray mb-3 mt-4" src="<?php echo $gravatar_link; ?>" alt="pic" style="border-radius: 50%; object-fit: cover; box-shadow: 3px 3px 5px grey;">
								<p class="title text-center text-info font-weight-bold">
									<?php //echo "@" . $row['username']."<br/>";
										//if ($row['verified'] == 1) {
										//	echo '<span class="badge badge-success">Verified</span>';
										//} else {
										//	echo '<span class="badge badge-danger">Unverified</span>';
										//}
									?>
								</p>
							</div>
							<blockquote class="description text-center blockquote">
								<?php if($row['requested'] == 1 && $row['onleave'] == 0): ?>
								<a href="#" class="btn btn-info btn-sm shadow-sm mb-2 <?php echo "disabled"; ?>" data-toggle="modal" data-target="#request-modal">Leave requested</a>
								<?php endif; ?>
								<?php if($row['onleave'] == 1): ?>
								<a href="#" class="btn btn-success btn-sm shadow-sm mb-2 <?php echo "disabled"; ?>" data-toggle="modal" data-target="#request-modal">Leave approved</a>
								<?php endif; ?>
								<?php if($row['requested'] == 0): ?>
								<a href="#" class="btn btn-info btn-sm shadow-sm" data-toggle="modal" data-target="#request-modal">Request Gate Pass</a>
								<?php endif; ?>
							</blockquote>
							<div class="text-center">
								<a href="#" class="btn btn-outline-dark shadow-sm d-none" data-toggle="modal" data-target="#change-password">Change password</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<div class="alert alert-info alert-dismissible fade show shadow-sm rounded" role="alert">
						Update profile picture of your email on <a href="https://gravatar.com/" target="_blank" class="alert-link">Gravator</a> <i class="fas fa-external-link-alt fa-sm"></i>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="card shadow-sm rounded">
						<div class="card-header">
							<span class="card-title mt-2">Edit Profile</span>
						</div>
						<div class="card-body">
							<!-- form for the edit profile -->
							<form action="includes/submit.inc.php" method="POST">
								<div class="row">
									<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
									<div class="col-md-5 pr-md-1 col-sm-12">
										<div class="form-group">
											<label>Username</label>
											<input autocomplete="off" type="text" class="form-control" placeholder="Username" disabled="" value="<?php echo $row['username']; ?>">
										</div>
									</div>
									<div class="col-md-7 col-sm-12">
										<div class="form-group">
											<label>Email address</label>
											<input autocomplete="off" type="email" class="form-control" placeholder="Email" disabled="" value="<?php echo $row['email']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-4 pr-md-1 col-sm-12">
										<div class="form-group">
											<label>First Name</label>
											<input style="text-transform: capitalize;" name="fname" autocomplete="off" type="text" class="form-control" placeholder="First Name" disabled="" value="<?php echo $row['fname']; ?>">
										</div>
									</div>
									<div class="col-md-4 pr-md-1 col-sm-12">
										<div class="form-group">
											<label>Last Name</label>
											<input style="text-transform: capitalize;" name="lname" autocomplete="off" type="text" class="form-control" placeholder="Last Name" disabled="" value="<?php echo $row['lname']; ?>">
										</div>
									</div>
									<div class="col-md-4 col-sm-12">
										<div class="form-group">
											<label>Roll Number</label>
											<input name="lname" autocomplete="off" type="text" class="form-control" placeholder="Last Name" disabled="" value="<?php echo $row['roll']; ?>">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
											<label>Mobile number</label>
											<input name="mob" autocomplete="off" type="text" class="form-control" placeholder="Mobile number" disabled="" value="<?php echo $row['mobile']; ?>">
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- request gatepass modal -->
	<div class="modal fade" id="request-modal" tabindex="-1" role="dialog" aria-labelledby="request-modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<form method="POST" action="http://localhost/gatepass/includes/request.inc.php">
					<div class="modal-header">
						<h1 class="h3 font-weight-normal">Enter leave details</h1>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Reason for leave (max 55 letters)</label>
							<input type="hidden" value="<?php echo $row['id']; ?>" name="id">
							<input required="" maxlength="65" name="reason" autocomplete="off" type="text" class="form-control" placeholder="I want to go...">
						</div>
						<div class="row">
							<div class="col-md-6 pr-md-1 col-sm-12">
								<div class="form-group">
									<label>From date</label>
									<div class="input-group">
										<input required="" class="form-control" id="date" name="fromdate" placeholder="dd/mm/yyyy" type="text"/>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label>To date</label>
									<div class="input-group">
										<input required="" class="form-control" id="date" name="todate" placeholder="dd/mm/yyyy" type="text"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="submit" name="submit" class="btn btn-success">Request</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php
		endif;
		endwhile;
		endif;
	?>
	<?php include 'footer.php'; ?>