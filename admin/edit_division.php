<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/division_functions.php'); ?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Edit Divisions</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="action create-place-div">
			<h1 class="page-title">Edit Divisions</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/edit_division.php'; ?>" >

				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<?php if ($isEditingDivision === true): ?>
					<input type="hidden" name="div_id" value="<?php echo $div_id; ?>">
				<?php endif ?>

				<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Title">
				<label style="float: left; margin: 5px auto 5px;">First Featured image</label>
				<input type="file" name="first_featured_image" >
				<label style="float: left; margin: 5px auto 5px;">Second Featured image</label>
				<input type="file" name="second_featured_image" >
				<label style="float: left; margin: 5px auto 5px;">Third Featured image</label>
				<input type="file" name="third_featured_image" >
				<input type="text" name="map_url" value="<?php echo $map_url; ?>" placeholder="Map Url">				
				<textarea name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
				
				<button type="submit" class="btn" name="update_div">UPDATE</button>

			</form>
		</div>
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('description');
</script>