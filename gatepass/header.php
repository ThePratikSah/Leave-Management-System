<?php 
session_start();
include 'includes/message.inc.php';
$url = $_SERVER['SCRIPT_NAME'];
?>
<!doctype html>
<html lang="en">
	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
		<link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<title>Gate Pass</title>
	</head>
	<body>
		<!-- navbar -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
			<a class="navbar-brand ml-lg-5 text-success" href="./">Gate Pass</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<?php if (isset($_SESSION['u_id'])): ?>
				<ul class="navbar-nav mr-auto">
					
			
				</ul>
				<?php echo '<form class="form-inline my-2 my-lg-0" action="http://localhost/gatepass/includes/logout.inc.php" method="POST">
					<button type="submit" name="submit" class="btn btn-outline-success mr-lg-5">Logout</button>
				</form>'; ?>
				<?php else:
				echo '<ul class="navbar-nav mr-auto"></ul>
					<form class="form-inline my-2 my-lg-0">
						<a href="" class="btn btn-outline-success mr-lg-5" data-toggle="modal" data-target="#login-modal">Login</a>
					</form>'; ?>
				<?php endif; ?>
			</div>
		</nav>

		<!-- alert message -->
		<?php if (!empty($message)): ?>
		<div class="alert alert-<?php echo $type; ?>  alert-dismissible fade show" role="alert">
			<?php echo $message; ?>
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<?php endif; ?>



		<!-- Login Modal -->
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form method="POST" action="includes/signin.inc.php">
						<div class="modal-header">
							<h1 class="h3 font-weight-normal">Please sign in</h1>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input required="" type="text" name="uid" class="form-control mb-3 border border-success" placeholder="Username / E-mail" required autofocus>
							<input required="" type="password" name="pwd" class="form-control border border-success" placeholder="Password" required autofocus>
						</div>
						<div class="modal-footer">
							<a href="" class="p-2 text-dark" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#forget-pass-modal">Forget Password?</a>
							<button type="submit" name="submit" class="btn btn-success">Sign In</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- Forget password modal -->
		<div class="modal fade" id="forget-pass-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<form method="POST" action="">
						<div class="modal-header">
							<h3 class="h3 font-weight-normal">Reset Password</h1>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<input required="" type="email" name="email" class="form-control border border-success" placeholder="Email address" required autofocus>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="submit" name="reset" class="btn btn-success btn-md btn-block">Request Reset Email</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		
		<!-- script for the modal -->
		<script type="text/javascript">
			$('#myModal').on('shown.bs.modal', function () {
				$('#myInput').trigger('focus')
			})
		</script>