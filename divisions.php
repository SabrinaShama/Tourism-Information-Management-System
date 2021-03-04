<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>

<!-- Retrieve all division details from database -->
<?php
	if (isset($_GET['div-slug'])) {
		$div = getDiv($_GET['div-slug']);
		$divid = $div['id'];
		$cults = getCultPlaces($divid);
		$trads = getTradPlaces($divid);
		$mods = getModPlaces($divid);
		$posts = getPublishedPostsThisDiv($divid);
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
                    scrollTop: $("#commfooter").offset().top -100
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#attr1").click(function (){
                $('html, body').animate({
                    scrollTop: $("#but1").offset().top -200
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#attr2").click(function (){
                $('html, body').animate({
                    scrollTop: $("#but2").offset().top -200
                }, 1000);
            });
        });
	$(document).ready(function (){
            $("#attr3").click(function (){
                $('html, body').animate({
                    scrollTop: $("#but3").offset().top -200
                }, 1000);
            });
        });

	function expand_1(){
        if(document.getElementById("but1").style.display == 'block' ){
            document.getElementById("but1").style.display = 'none'
        }
        else{
             document.getElementById("but1").style.display = 'block'
        }
    }
      
    function expand_2(){
        if(document.getElementById("but2").style.display == 'block' ){
            document.getElementById("but2").style.display = 'none'
        }
        else{
             document.getElementById("but2").style.display = 'block'
        }
    } 
    
    function expand_3(){
        if(document.getElementById("but3").style.display == 'block' ){
            document.getElementById("but3").style.display = 'none'
        }
        else{
             document.getElementById("but3").style.display = 'block'
        }
    }
	
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
        <div class="col-md-offset-5"> 
            <li class="active">
				<a href="index.php"><button id="dot">Home</button></a>
			</li>
            <li>
				<button id="dot1">About<br><?php echo $div['name']; ?></button>
            </li>
			<li>				
				<button id="dot2">Gallery</button>
            </li>
            <li>
				<button id="dot3">Places <br> to visit</button>
            </li>
			<li>
				<button id="dot4">Related Blog</button>
            </li>
			<li>
				<button id="dot5">Contact</button>
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
		<div class="about">
			<h1><?php echo $div['name']; ?></h1>
			<p><?php echo $div['description']; ?></p>
		</div>
		<div class="map_area">
			<?php
				echo  "<iframe src=\"{$div['map_url']}\" style=\frameborder=\"0\" height=\"400\" width=\"400\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\" ></iframe>";
			?>
		</div>
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
					<?php echo '<img id="divgal" src="./static/images/division/'.$div['div_image1'].'" />'; ?>
				  </div>
				  <div class="item">
					<?php echo '<img id="divgal" src="./static/images/division/'.$div['div_image2'].'" />'; ?>
				  </div>				
				  <div class="item">
					<?php echo '<img id="divgal" src="./static/images/division/'.$div['div_image3'].'" />'; ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_places" id="comm4">
		<button id="attr1" class="attr1" onclick="expand_1()"><div ><center><h3>Traditional Attractions</h3></center></div></button>
        <div id="but1">
			<div class="attrlist">
			<?php foreach ($trads as $trad): ?>				
				<div class="placelist" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/place/' . $trad['pl_image1']; ?>" class="placelist_image" alt="">
					<a href="places.php?place-slug=<?php echo $trad['slug']; ?>" class="btn category">
						<?php echo $trad['name']; ?>
					</a>
				</div>
			<?php endforeach ?>
			<?php if (empty($trads)): ?>
				<p>Sorry... There is no place in this category...</p>
			<?php endif ?>
			</div>
        </div>    
        <button id="attr2" class="attr2" onclick="expand_2()"><div ><center><h3>Cultural Attractions</h3></center></div></button>
        <div id="but2">
            <div class="attrlist">
			<?php foreach ($cults as $cult): ?>				
				<div class="placelist" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/place/' . $cult['pl_image1']; ?>" class="placelist_image" alt="">
					<a href="places.php?place-slug=<?php echo $cult['slug']; ?>" class="btn category">
						<?php echo $cult['name']; ?>
					</a>
				</div>
			<?php endforeach ?>
			<?php if (empty($cults)): ?>
				<p>Sorry... There is no place in this category...</p>
			<?php endif ?>
			</div>
        </div>
        <button id="attr3" class="attr3" onclick="expand_3()"><div ><center><h3>Modern Attractions</h3></center></div></button>
        <div id="but3">
            <div class="attrlist">
			<?php foreach ($mods as $mod): ?>				
				<div class="placelist" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/place/' . $mod['pl_image1']; ?>" class="placelist_image" alt="">
					<a href="places.php?place-slug=<?php echo $mod['slug']; ?>" class="btn category">
						<?php echo $mod['name']; ?>
					</a>
				</div>
			<?php endforeach ?>
			<?php if (empty($mods)): ?>
				<p>Sorry... There is no place in this category...</p>
			<?php endif ?>
			</div>
        </div>
	</div>
	<div class="main_page_form_gap"></div>
	<div class="loc_page_form_blog" id="comm5">
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
				<p>Sorry... There is no post related to this division...</p>
			<?php endif ?>
			<div class="bottomright">
				<a href="blogs.php"><span class="see_all">View all blogs..</span></a>
			</div>
		</div>
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>