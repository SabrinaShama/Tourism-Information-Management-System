<div class="menu">
	<div class="card">
		<div class="card-header">
			<h2>Actions</h2>
		</div>
		<div class="card-content">
			<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
				<a href="<?php echo BASE_URL . 'admin/create_place.php' ?>">Create Places</a>
				<a href="<?php echo BASE_URL . 'admin/manage_places.php' ?>">Manage Places</a>
				<a href="<?php echo BASE_URL . 'admin/create_tour.php' ?>">Create Tours</a>
				<a href="<?php echo BASE_URL . 'admin/manage_tours.php' ?>">Manage Tours</a>
			<?php endif ?>
				<a href="<?php echo BASE_URL . 'admin/create_post.php' ?>">Create Posts</a>			
				<a href="<?php echo BASE_URL . 'admin/manage_posts.php' ?>">Manage Posts</a>
			<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
				<a href="<?php echo BASE_URL . 'admin/users.php' ?>">Manage Users</a>
				<a href="<?php echo BASE_URL . 'admin/topics.php' ?>">Manage Topics</a>
				<a href="<?php echo BASE_URL . 'admin/manage_divisions.php' ?>">Manage Divisions</a>
			<?php endif ?>
		</div>
	</div>
</div>