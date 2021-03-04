<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>
<?php 
	$posts = getPublishedPosts();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Touristry | Write to Us</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="static/css/public_styling.css">
  <link rel="stylesheet" href="../static/css/admin_styling.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>
  <script>
	jQuery(function() {
	  jQuery('.showSingle').click(function() {
		var index = $(this).index(),
		  newTarget = jQuery('.targetDiv').eq(index).slideDown();
		jQuery('.targetDiv').not(newTarget).slideUp();

	  });
	});
  </script>
  <style>
	.loc_page_form_recom{
		background-color: #290001;
		opacity: 100%;
		position: relative;
		min-height: 20vh;
		height: auto;
		width: 100vw;
		transform-style: inherit;
		padding-bottom: 5%;
		height: auto;
        padding: 5vh 8%;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
	}
	.loc_page_form_recom h1{
		padding-top: 20px;
		font-family: Trebuchet MS, sans-serif;
		color: #dbcbbd;
		font-style: italic;
	}
	.loc_page_form_recom h2{
		padding-top: 10px;
		font-family: Trebuchet MS, sans-serif;
		color: #dbcbbd;
		font-style: italic;
	}
	.loc_page_form_recom hr { margin: 10px 0px; opacity: .25; }
	.showSingle{
		background-color: #b3aba4;
		color: #290001;
        position: inline-block;
        transition: background-color 0.8s ease;
		font-family: Trebuchet MS, sans-serif;
		font-size: 20px;
		padding: 13px 93px;
	}
	.showSingle:hover {
		background-color: #b3aba4;
        color: #290001;
        cursor: pointer;
	}
	.targetDiv {
		display: none;
	}
	.detailcontent {
		padding-top: 20px;
		margin: 5px auto;
		border-radius: 5px;
		min-height: 100px;		
	}
	.detailcontent:after {
		content: "";
		display: block;
		clear: both;
	}
	.detailcontent a{
		text-decoration: none;
	}
  </style>
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
      </div>
    </div>
	<div class="join_page_form_home" id="comm1">
	</div>
	<div class="loc_page_form_recom" id="comm2">
		<div class="detailcontent">
			<a class="showSingle" target="1">Restaurnts</a>
			<a class="showSingle" target="2">Hotels</a>
			<a class="showSingle" target="3">Convenient Stores</a>
			<a class="showSingle" target="4">Libraries</a>
			<hr>
			<div id="divRes" class="targetDiv">
				<div class="nearbyurl">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3071.6255561758776!2d90.38701484801557!3d23.71887207376363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Lalbagh%20Fort%2C%20Lalbagh%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1601898698450!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div id="divHot" class="targetDiv">
				<div class="nearbyurl">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3071.6255561758776!2d90.38701484801557!3d23.71887207376363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Lalbagh%20Fort%2C%20Lalbagh%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1601898698450!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div id="divHot" class="targetDiv">
				<div class="nearbyurl">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3071.6255561758776!2d90.38701484801557!3d23.71887207376363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Lalbagh%20Fort%2C%20Lalbagh%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1601898698450!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div id="divHot" class="targetDiv">
				<div class="nearbyurl">
					<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d3071.6255561758776!2d90.38701484801557!3d23.71887207376363!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sstore%20near%20Lalbagh%20Fort%2C%20Lalbagh%20Road%2C%20Dhaka!5e0!3m2!1sen!2sbd!4v1601898698450!5m2!1sen!2sbd" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>