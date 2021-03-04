<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>

<!-- Retrieve all division details from database -->
<?php
	if (isset($_GET['place-slug'])) {
		$place = getPlace($_GET['place-slug']);
		$placeid = $place['id'];
		$posts = getPublishedPostsThisPlace($placeid);
		$placedis = $place['district_id'];
		$nears = getNearbyPlaces($placedis, $placeid);
	}	
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Touristry</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="static/css/public_styling.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>
  <style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th, td {
		padding: 8px;
		text-align: left;
		width: 33%;
	}
	th:not(:last-child), td:not(:last-child) { border-right: 5px solid #dbcbbd; bor }
	
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
                    scrollTop: $("#comm5").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot5").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm6").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot6").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm7").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot7").click(function (){
                $('html, body').animate({
                    scrollTop: $("#comm8").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#dot8").click(function (){
                $('html, body').animate({
                    scrollTop: $("#commfooter").offset().top -100
                }, 1000);
            });
        });
	
	var modal = document.getElementById('id01');
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
	
	jQuery(function() {
	  jQuery('.showSingle').click(function() {
		var index = $(this).index(),
		  newTarget = jQuery('.targetDiv').eq(index).slideDown();
		jQuery('.targetDiv').not(newTarget).slideUp();

	  });
	});
	
  </script>
</head>

<body>
  <div class="parallax">
    <div class="navigator">
      <div class="row">
        <div class="col-md-4">
			<li>
				<a href="index.php"><h1><span>Touristry</span></h1></a>
			</li>
		</div>
        <div class="col-md-offset-4"> 
            <li class="active">
				<a href="index.php"><button id="dot">Home</button></a>
			</li>
            <li>
				<button id="dot1">About<br><?php echo $place['name']; ?></button>
            </li>
			<li>		
				<button id="dot2">Gallery</button>
            </li>
            <li>
				<button id="dot3">Transport</button>
            </li>
			<li>
				<button id="dot4">Activities</button>
            </li>
			<li>
				<button id="dot5">Nearby<br>Places</button>
            </li>
			<li>
				<button id="dot6">Suggested</button>
            </li>
			<li>
				<button id="dot7">Related<br>Blog</button>
            </li>
			<li>
				<button id="dot8">Contact</button>
            </li>
		</div>
      </div>
    </div>
	<div class="other_page_form_home" id="comm1">
		<h1><span></span></h1>
	</div>
	<!--reg/login-->
	<?php include('includes/join.php') ?>
	<div class="loc_page_form_about" id="comm2">
			<h1><?php echo $place['name']; ?></h1>
			<p><?php echo $place['description']; ?></p>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_gallary" id="comm3">
		<div class="container"> 
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				  <li data-target="#myCarousel" data-slide-to="1"></li>
				  <li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				  <div class="item active">
					<?php echo '<img id="divgal" src="./static/images/place/'.$place['pl_image1'].'" />'; ?>
				  </div>
				  <div class="item">
					<?php echo '<img id="divgal" src="./static/images/place/'.$place['pl_image2'].'" />'; ?>
				  </div>				
				  <div class="item">
					<?php echo '<img id="divgal" src="./static/images/place/'.$place['pl_image3'].'" />'; ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_about" id="comm4">
		<div class="about">
			<br>
			<h1>Location:</h1>
			<p><?php echo $place['location']; ?></p>
			<br>
			<h1>How to reach:</h1>
			<p><?php echo $place['highway']; ?></p>
		</div>
		<div class="map_area">
			<?php
				echo  "<iframe src=\"{$place['map_url']}\" style=\frameborder=\"0\" height=\"400\" width=\"400\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\" ></iframe>";
			?>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_activities" id="comm5">
		<table>
			  <tr>
				<th><h1>What To Do</h1></th>
				<th><h1>Tips</h1></th>
				<th><h1>Money matters</h1></th>
			  </tr>
			  <tr>
				<td><p><?php echo $place['activities']; ?></p></td>
				<td><p><?php echo $place['tips']; ?></p></td>
				<td><p><?php echo $place['money']; ?></p></td>
			  </tr>
		</table>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_nearby" id="comm6">
		<div class="attrlist">
			<h2 class="content-title">Nearby Places</h2>
			<hr>
			<?php foreach ($nears as $near): ?>				
				<div class="placelist" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/place/' . $near['pl_image1']; ?>" class="placelist_image" alt="">
					<a href="places.php?place-slug=<?php echo $near['slug']; ?>" class="btn category">
						<?php echo $near['name']; ?>
					</a>
				</div>
			<?php endforeach ?>
			<?php if (empty($nears)): ?>
				<p>Sorry... There is no nearby places to tour...</p>
			<?php endif ?>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_recom" id="comm7">
		<div class="detailcontent">
			<a class="showSingle" target="1">Restaurnts</a>
			<a class="showSingle" target="2">Hotels</a>
			<a class="showSingle" target="3">Convenient Stores</a>
			<a class="showSingle" target="4">Libraries</a>
			<hr>
			<div id="divRes" class="targetDiv">
				<div class="nearbyurl">
					<?php	echo  "<iframe src=\"{$place['resturl']}\" style=\frameborder=\"0\" height=\"300\" width=\"100%\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\" ></iframe>";	?>
				</div>
			</div>
			<div id="divHot" class="targetDiv">
				<div class="nearbyurl">
					<?php	echo  "<iframe src=\"{$place['hotelurl']}\" style=\frameborder=\"0\" height=\"300\" width=\"100%\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\" ></iframe>";	?>
				</div>
			</div>
			<div id="divSto" class="targetDiv">
				<div class="nearbyurl">
					<?php	echo  "<iframe src=\"{$place['storeurl']}\" style=\frameborder=\"0\" height=\"300\" width=\"100%\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\" ></iframe>";	?>
				</div>
			</div>
			<div id="divLib" class="targetDiv">
				<div class="nearbyurl">
					<?php	echo  "<iframe src=\"{$place['libraurl']}\" style=\frameborder=\"0\" height=\"300\" width=\"100%\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\" ></iframe>";	?>
				</div>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_blog" id="comm8">
		<div class="content"> 
			<h2 class="content-title">Related Blogs</h2>
			<hr>
			<?php foreach ($posts as $post): ?>
				<div class="post" style="margin-left: 0px;">
					<?php if (isset($post['topic']['name'])): ?>
						<a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>"
							class="btn category">
							<?php echo $post['topic']['name']; ?>
						</a>
					<?php endif ?>
					<img src="<?php echo BASE_URL . '/static/images/post/' . $post['image']; ?>" class="post_image" alt="">
					
					<a href="single_post.php?post-slug=<?php echo $post['slug']; ?>" >
						<div class="post_info">
							<h3><?php echo $post['title'] ?></h3>
							<div class="info">
								<span><?php echo date("F j, Y ", strtotime($post["created_at"])); ?></span>
								<span class="read_more">Read more...</span>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach ?>
			<?php if (empty($posts)): ?>
				<p>Sorry... There is no post related to this place...</p>
			<?php endif ?>
			<div class="bottomright">
				<a href="blogs.php"><span class="see_all">View all blogs..</span></a>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>