<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/tour_functions.php'); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Create Tours</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="action create-post-div">
			<h1 class="page-title">Create/Edit Tour</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_tour.php'; ?>" >

				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<?php if ($isEditingTour === true): ?>
					<input type="hidden" name="tour_id" value="<?php echo $tour_id; ?>">
				<?php endif ?>

				<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Title">
				<label style="float: left; margin: 5px auto 5px;">Featured image</label>
				<input type="file" name="featured_image" >
				<textarea name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
				
				<?php if ($isEditingTour === true): ?> 
					<button type="submit" class="btn" name="update_tour">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_tour">Save Tour</button>
				<?php endif ?>

			</form>
		</div>
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('description');
</script>