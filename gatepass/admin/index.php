<?php
	include 'header.php';
	include 'dbh.inc.php';
	$mail = $_SESSION['u_email'];
	$gravatar_link = 'https://www.gravatar.com/avatar/' . md5($mail) . '?s=120';
	$sql = 'SELECT * FROM users INNER JOIN request ON users.id = request.id WHERE approved = 1;';
	if (isset($_SESSION['u_email'])) {
		$result = mysqli_query($conn, $sql);
	}
?>
<!-- body of admin -->
<div class="container">
	<div class="row">
		<div class="col-md-4 mb-4">
			<div class="mt-5 card card-user shadow-sm rounded">
				<div class="card-body">
					<div class="author text-center">
						<img width="120px" height="120px" class="avatar border-gray mb-4 mt-4" src="<?php echo $gravatar_link; ?>" alt="pic" style="border-radius: 50%; object-fit: cover; box-shadow: 3px 3px 5px grey;">
					</div>
					<div class="text-center">
						<!-- Button trigger modal -->
						<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#onleave">Students on leave</a>
					</div>		
				</div>
			</div>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="onleave" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Students on leave</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="table-responsive">
							<table class="table table-sm">
								<thead class="thead-light">
									<tr>
										<th scope="col">Roll</th>
										<th scope="col">Name</th>
										<th scope="col">Suspend</th>
									</tr>
								</thead>
								<?php while ($row = mysqli_fetch_assoc($result)): ?>
								<tbody>
									<tr>
										<th scope="row"><?php echo $row['roll']; ?></th>
										<td><p style="text-transform: capitalize;"><?php echo $row['fname']." ".$row['lname']; ?></p></td>
										<td>
											<form method="POST" action="http://localhost/gatepass/includes/request.inc.php">
												<input type="hidden" name="id" value="<?php echo $row['id'];?>">
												<button type="submit" name="suspend" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
											</form>
										</td>
									</tr>
								</tbody>
								<?php endwhile; ?>
							</table>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
		<?php $sql = 'SELECT * FROM users INNER JOIN request ON users.id = request.id WHERE approved = 0;';
		if (isset($_SESSION['u_id'])) {
			$result = mysqli_query($conn, $sql);
		} ?>
		<div class="col-lg-8 col-md-8 col-sm-12 mt-5">
			<div class="table-responsive">
				<table class="table table-sm">
					<thead class="thead-light">
						<tr>
							<th scope="col">Roll</th>
							<th scope="col">Name</th>
							<th scope="col">Reason</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<?php while ($row = mysqli_fetch_assoc($result)): ?>
					<tbody>
						<tr>
							<th scope="row"><?php echo $row['roll']; ?></th>
							<td><p style="text-transform: capitalize;"><?php echo $row['fname']." ".$row['lname']; ?></p></td>
							<td><?php echo $row['reason']; ?></td>
							<td>
								<form method="POST" action="http://localhost/gatepass/includes/request.inc.php">
									<input type="hidden" name="id" value="<?php echo $row['id'];?>">
									<button type="submit" name="approve" class="btn btn-success"><i class="fas fa-check"></i></button>
									<button type="submit" name="reject" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
								</form>
							</td>
						</tr>
					</tbody>
					<?php endwhile; ?>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- including footer -->
<?php include 'footer.php'; ?>