<?php  include('../config.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/admin_functions.php'); ?>
<?php  include(ROOT_PATH . '/admin/includes/post_functions.php'); ?>

<?php $posts = getAllPosts(); ?>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../static/css/admin_styling.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.8.0/ckeditor.js"></script>
	<title>Admin | Manage Posts</title>
</head>
<body>
	<?php include(ROOT_PATH . '/admin/includes/navbar.php') ?>
	<div class="container content">
		<?php include(ROOT_PATH . '/admin/includes/menu.php') ?>

		<div class="table-div"  style="width: 80%;">
			<?php include(ROOT_PATH . '/includes/messages.php') ?>

			<?php if (empty($posts)): ?>
				<h1 style="text-align: center; margin-top: 20px;">No posts in the database.</h1>
			<?php else: ?>
				<table class="table">
					<thead>
						<th>N</th>
						<th>Author</th>
						<th>Title</th>
						<th>Views</th>
						<?php if ($_SESSION['user']['role'] == "Admin"): ?>
							<th><small>Publish</small></th>
						<?php endif ?>
						<th><small>Edit</small></th>
						<th><small>Delete</small></th>
					</thead>
					<tbody>
					<?php foreach ($posts as $key => $post): ?>
						<tr>
							<td><?php echo $key + 1; ?></td>
							<td><?php echo $post['author']; ?></td>
							<td>
								<a 	target="_blank"
								href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
									<?php echo $post['title']; ?>	
								</a>
							</td>
							<td><?php echo $post['views']; ?></td>
							
							<?php if ($_SESSION['user']['role'] == "Admin" ): ?>
								<td>
								<?php if ($post['published'] == true): ?>
									<a class="fa fa-check btn unpublish"
										href="manage_posts.php?unpublish=<?php echo $post['id'] ?>">
									</a>
								<?php else: ?>
									<a class="fa fa-times btn publish"
										href="manage_posts.php?publish=<?php echo $post['id'] ?>">
									</a>
								<?php endif ?>
								</td>
							<?php endif ?>

							<td>
								<a class="fa fa-pencil btn edit"
									href="create_post.php?edit-post=<?php echo $post['id'] ?>">
								</a>
							</td>
							<td>
								<a  class="fa fa-trash btn delete" 
									href="create_post.php?delete-post=<?php echo $post['id'] ?>">
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