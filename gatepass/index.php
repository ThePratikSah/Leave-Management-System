<?php include 'header.php'; ?>

<div class="container mt-5">
	<div class="row d-flex justify-content-center">
		<blockquote class="blockquote mb-0">
			<div class="px-3 py-3 pb-md-4 mx-auto text-center">
				<h1 class="display-4">Register</h1>
				<p class="lead">Create your account here. It's free and only takes a minute.</p>
			</div>
		</blockquote>
		<div class="col-lg-7">
			<div class="card border-success mb-3">
					<form class="container mt-3" method="POST" action="http://localhost/gatepass/includes/signup.inc.php">
					<div class="row">
						<div class="col-md-12">
							<div class="form-row">
								<input type="hidden" value="0" name="onleave">
								<div class="form-group col-md-6">
									<label for="fname">First Name</label>
									<input style="text-transform: capitalize;" required="" type="text" class="form-control border-success" id="fname" name="fname" placeholder="first name">
								</div>
								<div class="form-group col-md-6">
									<label for="lname">Last Name</label>
									<input style="text-transform: capitalize;" required="" type="text" class="form-control border-success" id="lname" name="lname" placeholder="last name">
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-md-8">
									<label for="email">E-mail</label>
									<input style="text-transform: lowercase;" required="" type="email" class="form-control border-success" id="email" name="email" placeholder="e-mail">
								</div>
								<div class="form-group col-md-4">
									<label for="email">Roll</label>
									<input required="" type="number" class="form-control border-success" id="roll" name="roll" placeholder="roll">
								</div>
							</div>
							<div class="form-group">
								<label for="username">Username</label>
								<input style="text-transform: lowercase;" required="" type="text" class="form-control border-success" id="uid" name="uid" placeholder="username">
							</div>
							<div class="form-group">
								<label for="pwd">Password</label>
								<input required="required" type="password" class="form-control border-success" id="pwd" name="pwd" placeholder="password">
							</div>
							<div class="form-group">
								<label for="mob">Mobile number</label>
								<input required="" type="text" class="form-control border-success" id="mob" name="mob" placeholder="eg. 999-888-7777">
							</div>
						</div>
					</div>
					<button id="signup" type="submit" name="submit" class="btn btn-success btn-md btn-block">Sign Up</button>
				</form>
				<p class="text-center text-secondary mt-3 mb-3">Already have account, <a class="text-center text-success mt-3 mb-3" data-toggle="modal" data-target="#login-modal">Sign in</a></p>
			</div>
		</div>
	</div>
</div>
<?php include 'footer.php'; ?>