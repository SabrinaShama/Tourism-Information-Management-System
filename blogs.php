<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>

<!-- Retrieve all posts from database -->
<?php $posts = getPublishedPosts(); ?>
<html>

<head>
  <meta charset="utf-8">
  <title>Touristry | Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="static/css/public_styling.css">
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
            $("#dot5").click(function (){
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
				<a href="index.php"><button id="dot">Home</button></a>
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
	<?php include('includes/join.php') ?>
	<?php if (isset($_SESSION['user']['username'])) { ?>
	<div class="main_blog" id="commblog">
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
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
		</div>
	</div>
	<?php }else{ ?>
	<div class="main_blog" id="commblog">
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<p>Oops...You need an account to view our blogs....Shall we join ? <a href="joinnew.php" target="_blank">Sign up here</a> or just <a href="joinnew.php" target="_blank">Sign in</a></p>
		</div>
	</div>
	<?php } ?>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>
	