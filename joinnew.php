<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>
<?php  include('includes/registration_login.php'); ?>
<html>

<head>
  <meta charset="utf-8">
  <title>Touristry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="static/css/public_styling.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>
  <style>
	
  </style>
<script>
	 
    $(document).ready(function (){
            $("#dot").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm1").offset().top 
                }, 1000);
            });
        });
    $(document).ready(function (){
            $("#dot1").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm2").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot2").click(function (){
                $('html, body').animate({
                    scrollTop: $("#commfooter").offset().top -100
                }, 1000);
            });
        });
</script>
</head>
<body>
  <div class="parallax">
    <div class="navigator">
      <div class="row">
        <div class="col-md-6">
			<li>
				<a href="index.php"><h1><span>Touristry</span></h1></a>
			</li>
		</div>
        <div class="col-md-offset-6"> 
            <li class="active">
				<button id="dot">Home</button>
			</li>
            <li>
				<button id="dot1">Registration/Login</button>
            </li>
			<li>
				<button id="dot2">Contact</button>
            </li>
		</div>
      </div>
    </div>
	<div class="join_page_form_home" id="comm1">
	</div>
	<div class="join_page_form_about" id="comm2">
		<div class="joincontainer">
		<?php include(ROOT_PATH . '/includes/errors.php') ?>
			<div class= "position">
				<form method="post" action="joinnew.php" >
					<h1>Registration</h1>
					
					<input  type="text" name="username" value="<?php echo $username; ?>"  placeholder="Username">
					<input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
					<input type="password" name="password_1" placeholder="Password">
					<input type="password" name="password_2" placeholder="Password confirmation">
					<button type="submit" class="btn" id="newreg" name="reg_user">Register</button>
					<p class= "joinlink">
						Already a member? <a href="">Sign in</a>
					</p>
				</form>
			</div>
			<div class="positionright">
				<form method="post" action="joinnew.php" >
					<h1>Login</h1>
					<input type="text" name="username" value="<?php echo $username; ?>" value="" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<button type="submit" class="btn" id="newlog" name="login_btn">Login</button>
					<p>
						Not yet a member? <a href="">Sign up</a>
					</p>
				</form>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>