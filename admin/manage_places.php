<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/place_functions.php'); ?>

<?php $places = getAllPlaces(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Manage Places</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="table-div"  style="width: 80%;">
			<?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($places)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>N</th>
						<th>Place Title</th>
						<th>Division</th>
						<th><small>Edit</small></th>
						<th><small>Delete</small></th>
					</thead>
					<tbody>
					<?php foreach ($places as $key => $place): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td>
								<a 	target="_blank"
								href="<?php echo BASE_URL . 'places.php?place-slug=' . $place['slug'] ?>">
									<?php echo $place['name']; ?>	
								</a>
							</td>
							<td><?php echo $place['division']; ?></td>

							<td>
								<a class="fa fa-pencil btn edit"
									href="create_place.php?edit-place=<?php echo $place['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="create_place.php?delete-place=<?php echo $place['id'] ?>">
								</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
			<?php endif ?>
		</div>
	</div>
</body>
</html>