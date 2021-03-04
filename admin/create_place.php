<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/place_functions.php'); ?>

<?php 
	$divisions = getAllDivisionnames();
	$districts = getAllDistrictnames();
	$types = getAllTypes();
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Create Places</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="action create-place-div">
			<h1 class="page-title">Create/Edit Places</h1>
			<form method="post" enctype="multipart/form-data" action="<?php echo BASE_URL . 'admin/create_place.php'; ?>" >

				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<?php if ($isEditingPlace === true): ?>
					<input type="hidden" name="place_id" value="<?php echo $place_id; ?>">
				<?php endif ?>

				<input type="text" name="name" value="<?php echo $name; ?>" placeholder="Title">
				<label style="float: left; margin: 5px auto 5px;">First Featured image</label>
				<input type="file" name="first_featured_image" >
				<label style="float: left; margin: 5px auto 5px;">Second Featured image</label>
				<input type="file" name="second_featured_image" >
				<label style="float: left; margin: 5px auto 5px;">Third Featured image</label>
				<input type="file" name="third_featured_image" >
				<input type="text" name="map_url" value="<?php echo $map_url; ?>" placeholder="Map Url(Only the src part)">	
				<label style="float: left; margin: 5px auto 5px;">Description</label>
				<textarea name="description" id="description" cols="30" rows="10"><?php echo $description; ?></textarea>
				<input type="text" name="location" value="<?php echo $location; ?>" placeholder="Location">
				<label style="float: left; margin: 5px auto 5px;">Route from Dhaka</label>
				<textarea name="highway" id="highway" cols="30" rows="10"><?php echo $highway; ?> </textarea>
				<label style="float: left; margin: 5px auto 5px;">Activities</label>
				<textarea name="activities" id="activities" cols="30" rows="10"><?php echo $activities; ?></textarea>
				<label style="float: left; margin: 5px auto 5px;">Tips</label>
				<textarea name="tips" id="tips" cols="30" rows="10"><?php echo $tips; ?></textarea>
				<label style="float: left; margin: 5px auto 5px;">Expense</label>
				<textarea name="money" id="money" cols="30" rows="10"><?php echo $money; ?></textarea>
				<input type="text" name="resturl" value="<?php echo $resturl; ?>" placeholder="Restaurant list Url(Only the src part)">
				<input type="text" name="hotelurl" value="<?php echo $hotelurl; ?>" placeholder="Hotel list Url(Only the src part)">
				<input type="text" name="storeurl" value="<?php echo $storeurl; ?>" placeholder="Store list Url(Only the src part)">
				<input type="text" name="libraurl" value="<?php echo $libraurl; ?>" placeholder="Library list Url(Only the src part)">
				<select name="division_id">
					<option value="" selected disabled>Choose Division</option>
					<?php foreach ($divisions as $division): ?>
						<option value="<?php echo $division['id']; ?>">
							<?php echo $division['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				<select name="district_id">
					<option value="" selected disabled>Choose District</option>
					<?php foreach ($districts as $district): ?>
						<option value="<?php echo $district['id']; ?>">
							<?php echo $district['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				<select name="types_id">
					<option value="" selected disabled>Choose types</option>
					<?php foreach ($types as $type): ?>
						<option value="<?php echo $type['id']; ?>">
							<?php echo $type['name']; ?>
						</option>
					<?php endforeach ?>
				</select>
				
				<?php if ($isEditingPlace === true): ?> 
					<button type="submit" class="btn" name="update_place">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_place">Save Post</button>
				<?php endif ?>

			</form>
		</div>
	</div>
</body>
</html>

<script>
	CKEDITOR.replace('body');
</script>