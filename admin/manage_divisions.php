<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/division_functions.php'); ?>

<?php $divs = getAllDivisions(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Manage Divisions</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="table-div"  style="width: 80%;">
			<?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($divs)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No divisions in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>N</th>
						<th>Division Title</th>
						<th><small>Edit</small></th>
						<th><small>Districts</small></th>
					</thead>
					<tbody>
					<?php foreach ($divs as $key => $div): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td>
								<a 	target="_blank"
								href="<?php echo BASE_URL . 'divisions.php?div-slug=' . $div['slug'] ?>">
									<?php echo $div['name']; ?>	
								</a>
							</td>
							<td>
								<a class="fa fa-pencil btn edit"
									href="edit_division.php?edit-div=<?php echo $div['id'] ?>">
								</a>
							</td>
							<td>
								<a class="fa btn"
									href="districts.php?edit-dis=<?php echo $div['id'] ?>">
									View List
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