<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>
<?php require_once( ROOT_PATH . '/includes/registration_login.php') ?>

<!-- Retrieve all posts from database -->
<?php 
	$posts = getPublishedPostsOnly(); 
	$divbutton = (isset($_GET['divi']) ? $_GET['divi'] : '');
	$result = mysqli_query($conn, "SELECT * FROM division WHERE id='$divbutton'");
	$divdata = mysqli_fetch_array($result);
?>
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
	.aboutleft {
		float:left;
		width: 60%;
		height: 50%;
		background-color: #dbcbbd;
		margin-bottom: 10px;
		border: 5px solid #b3aba4;
	}
	.imageright {
		float: right;
		width: 39%;
		height: 50%;
		margin-bottom: 10px;
	}
	.aboutright {
		float: right;
		width: 60%;
		height: 50%;
		background-color: #dbcbbd;
		margin-bottom: 10px;
		border: 5px solid #b3aba4;
	}
	.imageleft {
		float: left;
		width: 39%;
		height: 50%;
		margin-bottom: 10px;
	}
	.aboutleft p{
		color: #290001;
		font-family: Bradley Hand, cursive;
		padding: 5px 2%;
		font-size: 16px;
	}
	.aboutright p{
		color: #290001;
		font-family: Bradley Hand, cursive;
		padding: 5px 2%;
		font-size: 16px;
	}
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
                    scrollTop: $("#comm3").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot3").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm4").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot4").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm4").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot5").click(function (){
                $('html, body').animate({
                    scrollTop: $("#commfooter").offset().top -100
                }, 1000);
            });
        });
	jQuery(function() {
	  jQuery('.showSingleDiv').click(function() {
		var index = $(this).index(),
		  newTarget = jQuery('.targetDiv').eq(index).slideDown(500);
		  $('.activeDiv').hide(500);
		jQuery('.targetDiv').not(newTarget).slideUp(500);
	  });
	});
	
	var modal = document.getElementById('id01');
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
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
				<button id="dot1">Welcome</button>
            </li>
			<li>				
				<button id="dot2">SiteList</button>
            </li>
            <li>
				<button id="dot3">Our Blog</button>
            </li>
			<li>
				<a href="tours.php" target="_blank" ><button id="dot4">Our Tours</button></a>
            </li>
			<li>
				<button id="dot5">Contact</button>
            </li>
		</div>
      </div>
    </div>
	<div class="main_page_form_home" id="comm1">
		<h1><span></span></h1>
	</div>
	<!--reg/login-->
	<?php include('includes/join.php') ?>
	<div class="main_page_form_about" id="comm2">
		<h1>Welcome to Bangladesh</h1>
		<div class="aboutleft">
			<h2><span><strong>Natural Beauty</strong></span></h2>
			<p>Bangladesh has flourished herself as a beautiful country around the world due to its unlimited natural beauty like the longest sea beach in 
				Cox's bazaar, the largest mangrove forest & the royal Bengal tiger in Sundarbans. ... Its beauty lies in its unique natural surroundings. 
				Bangladesh has plenty to brag about – its natural environment is far more diverse and dramatic than most people realise. Add a fascinating architectural
				heritage to the mix, and you have plenty of reasons to pack your bags for a trip to this beautiful country.</p>
		</div>
		<div class="imageright">
			<img src="./static/images/nature.png" alt="Bangladesh Natural Beauty" width="100%" height="100%">
		</div>
		<div class="aboutright">
			<h2><span><strong>History</strong></span></h2>
			<p>The modern state of Bangladesh gained independence from Pakistan only in 1971. 
				For centuries, the area that is now Bangladesh was ruled by the same empires that ruled central India. When British India gained its independence in August 1947, the Muslim section of Bengal became a non-contiguous part of the new nation 
				of Pakistan,called "East Pakistan." For 24 years, East Pakistan struggled under financial and political neglect from West Pakistan. Political unrest 
				was endemic in the region, as military regimes repeatedly overthrew democratically elected governments. March 27, 1971, Sheikh Mujibar Rahman declared Bangladeshi 
				independence from Pakistan. The Pakistani Army fought to stop the secession. On January 11, 1972, Bangladesh became 
				an independent parliamentary democracy.</p>
		</div>
		<div class="imageleft">
			<img src="./static/images/liberationwar.jpg" alt="Bangladesh Liberation War" width="100%" height="100%">
		</div>
		<div class="aboutleft">
			<h2><span><strong>Culture</strong></span></h2>
			<p>Bangladeshis are essentially simple in nature. Since time immemorial they are noted for their valour and resilience as well as hospitality 
				and friendliness. Bangladeshis are also equally known for their creativity. They have an innate quality of open mindedness. Communal or ethnic 
				feeling is alien to them and despite diverse racial mix from pre-historic days they are, by and large, a homogeneous group. Almost all the people 
				speak and understand Bangla, a language which occupies an exalted position because of the richness of its literature. Generally speaking, fish, 
				rice and lentils constitute the main diet of the masses, the vast majority of whom live in the country's villages.</p>
		</div>
		<div class="imageright">
			<img src="./static/images/culture.jpg" alt="Bangladesh Culture" width="100%" height="100%">
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="main_page_form_sites" id="comm3">  
		<div class="detailcontent">
			<a id="o1" class="showSingleDiv" target="1">Dhaka Division</a>
			<a id="o2" class="showSingleDiv" target="2">Chittagong Division</a>
			<a id="o3" class="showSingleDiv" target="3">Rajshahi Division</a>
			<a id="o4" class="showSingleDiv" target="4">Khulna Division</a>
			<a id="o5" class="showSingleDiv" target="5">Barisal Division</a>
			<a id="o6" class="showSingleDiv" target="6">Rangpur Division</a>
			<a id="o7" class="showSingleDiv" target="7">Sylhet Division</a>
			<a id="o8" class="showSingleDiv" target="8">Mymensingh Division</a>
			<hr>
			<div class="activeDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='1'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='1'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='2'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='3'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='4'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='5'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='6'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='7'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			<div class="targetDiv">
				<?php 
					$result = mysqli_query($conn, "SELECT * FROM division WHERE id='8'");
					$divdata = mysqli_fetch_array($result);
				?>
				<div class="gallary">
					<div id="slider">
						<figure> <?php echo '<img id="disgal" src="./static/images/division/'.$divdata['div_image1'].'" />'; ?> </figure>
					</div>
				</div>
				<div class="info">
					<p> <?php echo $divdata['description']; ?> </p>
				</div>
				<div class="bottomright">
					<a href="divisions.php?div-slug=<?php echo $divdata['slug']; ?>">
					<span class="see_all">Know details..</span></a>
				</div>
			</div>
			
		</div>
		
	</div>
	<div class="main_page_form_gap"></div>
	<div class="main_page_form_blog" id="comm4">
		<div class="blogcontent">
			<h2 class="blogcontent-title">Recent Articles</h2>
			<hr>
			<?php foreach ($posts as $post): ?>
				<div class="blogpost" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/post/' . $post['image']; ?>" class="blogpost_image" alt="">
					<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" target="_blank" >
						<div class="blogpost_info">
							<h3><?php echo $post['title'] ?></h3>
							<div class="bloginfo">
								<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
								<span class="blogread_more">Read more...</span>
							</div>
						</div>
					</a>						
				</div>
			<?php endforeach ?>
			<div class="bottomright">
				<a href="blogs.php" target="_blank"><span class="see_all">View all blogs..</span></a>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>