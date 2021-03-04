<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>

<?php 
	$topics = getAllTopics();
	$places = getAllPlacenames();
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Create Posts</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="action create-post-div">
			<h1 class="page-title">Create/Edit Post</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_post.php'; ?>" >

				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<?php if ($isEditingPost === true): ?>
					<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<?php endif ?>

				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
				<label style="float: left; margin: 5px auto 5px;">Featured image</label>
				<input type="file" name="featured_image" >
				<textarea name="body" id="body" cols="30" rows="10"><?php echo $body; ?></textarea>
				<select name="topic_id">
					<option value="" selected disabled>Choose topic</option>
					<?php foreach ($topics as $topic): ?>
						<option value="<?php echo $topic['id']; ?>">
							<?php echo $topic['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				<select name="place_id">
					<option value="" selected disabled>Choose related place</option>
					<?php foreach ($places as $place): ?>
						<option value="<?php echo $place['id']; ?>">
							<?php echo $place['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				
				<?php if ($_SESSION['user']['role'] == "Admin"): ?>
					<?php if ($published == true): ?>
						<label for="publish">
							 Publish
							<input type="checkbox" value="1" name="publish" checked="checked">&nbsp;
						</label>
					<?php else: ?>
						<label for="publish">
							 Publish
							<input type="checkbox" value="1" name="publish">&nbsp;
						</label>
					<?php endif ?>
				<?php endif ?>
				
				<?php if ($isEditingPost === true): ?> 
					<button type="submit" class="btn" name="update_post">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_post">Save Post</button>
				<?php endif ?>

			</form>
		</div>
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body');
</script>