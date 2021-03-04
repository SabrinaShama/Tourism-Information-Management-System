<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>  
	<title>Touristry | Admin Panel</title>
</head>
<body>
	<div class="header">
		<div class="logo">
			<a href="<?php echo BASE_URL .'admin/dashboard.php' ?>">
				<h1>Touristry - Admin</h1>
			</a>
		</div>
		<?php if (isset($_SESSION['user'])): ?>
			<div class="user-info">
				<span><?php echo $_SESSION['user']['username'] ?></span> &nbsp; &nbsp; 
				<a href="<?php echo BASE_URL . '/logout.php'; ?>" class="logout-btn">logout</a>
			</div>
		<?php endif ?>
	</div>
	<div class="container dashboard">
		<h1>Welcome</h1>
		<div class="stats">
			<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
				<a href="users.php" class="first">
					<span>Manage Users</span>
				</a>
				<a href="manage_divisions.php">
				<span>Manage Divisions</span>
				</a>
				<a href="manage_places.php">
					<span>Manage Places</span>
				</a>
				<a href="manage_tours.php" class="first">
					<span>Manage Tours</span>
				</a>
			<?php endif ?>
				<a href="manage_posts.php" class="first">
					<span>Manage Posts</span>
				</a>
			<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
				<a href="topics.php">
					<span>Manage Topics</span>
				</a>
			<?php endif ?>
		</div>
		<br><br><br>
	</div>
</body>
</html>