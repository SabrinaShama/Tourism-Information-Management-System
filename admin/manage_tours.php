<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/tour_functions.php'); ?>

<?php $tours = getAllTours(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Manage Tours</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="table-div"  style="width: 80%;">
			<?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($tours)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No tours in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>N</th>
						<th>Title</th>
						<th>Views</th>
						<th><small>Edit</small></th>
						<th><small>Delete</small></th>
					</thead>
					<tbody>
					<?php foreach ($tours as $key => $tour): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td>
								<a 	target="_blank"
								href="<?php echo BASE_URL . 'single_tour.php?tour-slug=' . $tour['slug'] ?>">
									<?php echo $tour['title']; ?>	
								</a>
							</td>
							<td><?php echo $tour['views']; ?></td>
							<td>
								<a class="fa fa-pencil btn edit"
									href="create_tour.php?edit-tour=<?php echo $tour['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="create_tour.php?delete-tour=<?php echo $tour['id'] ?>">
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