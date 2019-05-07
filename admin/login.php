<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
  <div class="container d-flex justify-content-center">
  	<div class="row mt-5">
  		<div class="col-md-8">
				<form role="form" action="loggedin.php" method="post">

						<div class="form-group">
              <label>Admin Password</label>
							<input class="form-control" placeholder="Password" name="password" type="password" value="">
						</div>

						<button class="btn btn-primary" type="submit" name="save">Login</button>
				</form>
    	</div>
		</div>
	</div><!-- /.col-->


<?php include 'script.php'; ?>

</body>

</html>
