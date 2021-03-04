<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>

<?php $tours = getAllTours(); ?>
<html>

<head>
  <meta charset="utf-8">
  <title>Touristry | Tours</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="static/css/public_styling.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>
  <style>
	.tour_page_form_about{
		background-color: #290001;
		opacity: 100%;
		z-index: -1;
		position: relative;
		min-height: 50vh;
		height: auto;
        padding: 5vh 8%;
		width: 100vw;
		box-sizing: border-box;
		box-shadow: 0 -1px 10px rgba(0, 0, 0, .7);
		transform-style: inherit;
	}
	.content {
		margin: 5px auto;
		border-radius: 5px;
		min-height: 100px;
	}
	.content:after {
		content: "";
		display: block;
		clear: both;
	}
	.content .content-title {
		margin: 10px 0px;
		color: #dbcbbd;
		font-stretch: expanded;
	}
	.content .post {
		width: 48%;
		margin: 9px;
		min-height: 200px;
		float: left;
		border-radius: 2px;
		border: 1px solid #b3b3b3;
		position: relative;
	}
	.content .post .post_image {
		height: 320px;
		width: 100%;
		background-size: 100%;
	}
	.content .post .post_info {
		color: #222;
	}
	.tour_page_form_about h3{
		width: 100%; 
		text-align: right; 
		border-bottom: 3px solid #dbcbbd; 
		margin: 10px 0 20px; 
	}
  </style>
  <script>
	 
    $(document).ready(function (){
            $("#dot").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm1").offset().top 
                }, 1000);
            });
        })
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
				<button id="dot1">Tours</button>
            </li>
			<li>
				<button id="dot2">Contact</button>
            </li>
		</div>
      </div>
    </div>
	<div class="join_page_form_home" id="comm1">
	</div>
	<?php include('includes/join.php') ?>
	<div class="tour_page_form_about" id="comm2">
		<div class="content">
			<h2 class="content-title">Our Tours</h2>
			<hr> 
			<?php foreach ($tours as $tour): ?>
				<div class="post" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/tours/' . $tour['image']; ?>" class="post_image" alt="">					
					<a href="single_tour.php?tour-slug=<?php echo $tour['slug']; ?>" target="_blank" >
						<div class="post_info">
							<h3><?php echo $tour['title'] ?></h3>
						</div>
					</a>
				</div>
			<?php endforeach ?>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>