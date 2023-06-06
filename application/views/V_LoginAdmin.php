<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>NOERI KITCHEN</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons -->
    <link href="<?php echo base_url(); ?>/assets/img/1.png" rel="icon">
    <link href="<?php echo base_url(); ?>/assets/img/1.png" rel="logo">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets_login/admin/css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login as Admin</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
		      	<div class="icon d-flex align-items-center justify-content-center">
		      		<span class="fa fa-user-o"></span>
		      	</div>
		      	<!-- <h3 class="text-center mb-4">Sign In</h3> -->
						<form action="<?php echo site_url('C_Noeri/CekLoginAdmin')?>" method="post" class="login-form">
		      		<div class="form-group">
		      			<input type="text" name="usn_admin" id="usn_admin" class="form-control rounded-left" placeholder="Username" required>
		      		</div>
	            <div class="form-group d-flex">
	              <input type="password" name="pass_admin" id="pass_admin" class="form-control rounded-left" placeholder="Password" required>
	            </div>
                <div class="form-group">
                    <?php
                            $info = $this->session->flashdata('info');
                            if(!empty($info))
                            {
                                echo $info;
                            }
                        ?>	            </div>
	            <div class="form-group">
	            	<button type="submit" value="login" name="login" class="form-control btn btn-primary rounded submit px-3">Login</button>
	            </div>
	            <!-- <div class="form-group d-md-flex">
	            	<div class="w-50">
	            		<label class="checkbox-wrap checkbox-primary">Remember Me
									  <input type="checkbox" checked>
									  <span class="checkmark"></span>
									</label>
								</div>
								<div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div>
	            </div> -->
	          </form>
	        </div>
				</div>
			</div>
		</div>
	</section>

	<script src="<?php echo base_url(); ?>/assets_login/admin/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets_login/admin/js/popper.js"></script>
  <script src="<?php echo base_url(); ?>/assets_login/admin/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assets_login/admin/js/main.js"></script>

	</body>
</html>

