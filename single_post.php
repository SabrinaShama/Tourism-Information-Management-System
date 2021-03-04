<!--connect-->
<?php require_once('config.php') ?>
<?php require_once( ROOT_PATH . '/includes/action_page.php') ?>
<?php require_once( ROOT_PATH . '/includes/like.php') ?>

<!-- Retrieve all posts from database -->
<?php 
	if (isset($_GET['post-slug'])) {
		$post = getPost($_GET['post-slug']);
	}
	$topics = getAllTopics();
?>
<html>

<head>
  <meta charset="utf-8">
  <title>Touristry | Blog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
  <link rel="stylesheet" href="static/css/public_styling.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
	
	$(document).ready(function(){

	// if the user clicks on the like button ...
	$('.like-btn').on('click', function(){
	  var post_id = $(this).data('id');
	  $clicked_btn = $(this);
	  if ($clicked_btn.hasClass('fa-thumbs-o-up')) {
		action = 'like';
	  } else if($clicked_btn.hasClass('fa-thumbs-up')){
		action = 'unlike';
	  }
	  $.ajax({
		url: 'single_post.php',
		type: 'post',
		data: {
			'action': action,
			'post_id': post_id
		},
		success: function(data){
			res = JSON.parse(data);
			if (action == "like") {
				$clicked_btn.removeClass('fa-thumbs-o-up');
				$clicked_btn.addClass('fa-thumbs-up');
			} else if(action == "unlike") {
				$clicked_btn.removeClass('fa-thumbs-up');
				$clicked_btn.addClass('fa-thumbs-o-up');
			}
			// display the number of likes and dislikes
			$clicked_btn.siblings('span.likes').text(res.likes);
			$clicked_btn.siblings('span.dislikes').text(res.dislikes);

			// change button styling of the other button if user is reacting the second time to post
			$clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
		}
	  });		

	});

	// if the user clicks on the dislike button ...
	$('.dislike-btn').on('click', function(){
	  var post_id = $(this).data('id');
	  $clicked_btn = $(this);
	  if ($clicked_btn.hasClass('fa-thumbs-o-down')) {
		action = 'dislike';
	  } else if($clicked_btn.hasClass('fa-thumbs-down')){
		action = 'undislike';
	  }
	  $.ajax({
		url: 'single_post.php',
		type: 'post',
		data: {
			'action': action,
			'post_id': post_id
		},
		success: function(data){
			res = JSON.parse(data);
			if (action == "dislike") {
				$clicked_btn.removeClass('fa-thumbs-o-down');
				$clicked_btn.addClass('fa-thumbs-down');
			} else if(action == "undislike") {
				$clicked_btn.removeClass('fa-thumbs-down');
				$clicked_btn.addClass('fa-thumbs-o-down');
			}
			// display the number of likes and dislikes
			$clicked_btn.siblings('span.likes').text(res.likes);
			$clicked_btn.siblings('span.dislikes').text(res.dislikes);
			
			// change button styling of the other button if user is reacting the second time to post
			$clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up'); 
		}
	  });	

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
	<div class="singlecontent" >		
		
		<?php if (isset($_SESSION['user']['username'])) { ?>
		<div class="post-wrapper">
		<div class="postimg">
		<?php echo '<img id="postimg" src="./static/images/post/'.$post['image'].'" />'; ?>
		</div>
			<div class="full-post-div">
			<?php if ($post['published'] == false): ?>
				<h2 class="post-title">Sorry... This post has not been published</h2>
			<?php else: ?>
				<h2 class="post-title"><?php echo $post['title']; ?></h2>
				<div class="post-body-div">
					<p><?php echo html_entity_decode($post['body']); ?></p>
				</div>
				<?php if (isset($_SESSION['user']['username'])): ?>
					<div class="post-info">

						<i <?php if (userLiked($post['id'])): ?>
							  class="fa fa-thumbs-up like-btn"
						  <?php else: ?>
							  class="fa fa-thumbs-o-up like-btn"
						  <?php endif ?>
						  data-id="<?php echo $post['id'] ?>"></i>
						<span class="likes"><?php echo getLikes($post['id']); ?></span>
						
						&nbsp;&nbsp;&nbsp;&nbsp;


						<i <?php if (userDisliked($post['id'])): ?>
							  class="fa fa-thumbs-down dislike-btn"
						  <?php else: ?>
							  class="fa fa-thumbs-o-down dislike-btn"
						  <?php endif ?>
						  data-id="<?php echo $post['id'] ?>"></i>
						<span class="dislikes"><?php echo getDislikes($post['id']); ?></span>
					 </div>
					 <?php endif ?>
			<?php endif ?>
			</div>
		</div>
		<?php }else{ ?>		
		<div class="post-wrapper">
			<div class="full-post-div">
				<div class="post-body-div">
				<p>Oops...You need an account to view what's written here....Shall we join ? <a href="joinnew.php" target="_blank">Sign up here</a> or just <a href="joinnew.php" target="_blank">Sign in</a></p>			
				</div>
			</div>
		</div>
		<?php } ?>
		
		<div class="post-sidebar">
			<div class="card">
				<div class="card-header">
					<h2>Topics</h2>
				</div>
				<div class="card-content">
					<?php foreach ($topics as $topic): ?>
						<a 
							href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $topic['id'] ?>">
							<?php echo $topic['name']; ?>
						</a> 
					<?php endforeach ?>
				</div>
			</div>
		</div>
		
	</div>
	<div class="main_page_form_gap"></div>
	<!-- footer -->
	<?php include('includes/footer.php') ?>
	