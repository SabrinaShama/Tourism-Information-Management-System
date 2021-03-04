<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/division_functions.php'); ?>

<?php 
	if (isset($_GET['edit-dis'])) {
		$dis = $_GET['edit-dis'];
		$divisions = getDivisionname($dis);
		$districts = getAllDistricts($dis);
	}
?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Manage Districts</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="action">
			<h1 class="page-title">Create/Edit Districts</h1>
			<form method="post" action="<?php echo BASE_URL . 'admin/districts.php'; ?>" >

				<?php include(ROOT_PATH . '/includes/errors.php') ?>

				<?php if ($isEditingDistrict === true): ?>
					<input type="hidden" name="district_id" value="<?php echo $district_id; ?>">
				<?php endif ?>
				<input type="text" name="district_name" value="<?php echo $district_name; ?>" placeholder="District">
				<select name="division_id">
					<option value="" selected disabled>Choose Division</option>
					<?php foreach ($divisions as $division): ?>
						<option value="<?php echo $division['id']; ?>">
							<?php echo $division['name']; ?>
						</option>
					<?php endforeach ?>
				</select>	

				<?php if ($isEditingDistrict === true): ?> 
					<button type="submit" class="btn" name="update_district">UPDATE</button>
				<?php else: ?>
					<button type="submit" class="btn" name="create_district">Save District</button>
				<?php endif ?>
			</form>
		</div>
		
		<div class="table-div">
			<?php include(ROOT_PATH . '/includes/messages.php') ?>
			<?php if (empty($districts)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No district in the database.</h1>
			<?php else: ?>
			<table class="table">
				<thead>
					<th>N</th>
					<th>District Name</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?php foreach ($districts as $key => $district): ?>
					<tr>
						<td><?php echo $key + 1; ?></td>
						<td><?php echo $district['name']; ?></td>
						<td>
							<a class="fa fa-pencil btn edit"
								href="districts.php?edit-district=<?php echo $district['id'] ?>">
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