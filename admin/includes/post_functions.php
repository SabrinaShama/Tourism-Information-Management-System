<?php 
	$post_id = 0;
	$isEditingPost = false;
	$published = 0;
	$title = "";
	$post_slug = "";
	$body = "";
	$featured_image = "";
	$post_topic = "";
	$log_user = $_SESSION['user']['id'];
	$place_id = "";

// Manage Post functions
function getAllPosts() {
	global $conn;
	if ($_SESSION['user']['role'] == "Admin") {
		$sql = "SELECT * FROM posts";
	} elseif ($_SESSION['user']['role'] == "Author") {
		$user_id = $_SESSION['user']['id'];
		$sql = "SELECT * FROM posts WHERE user_id=$user_id";
	}
	$result = mysqli_query($conn, $sql);
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['author'] = getPostAuthorById($post['user_id']);
		array_push($final_posts, $post);
	}
	return $final_posts;
}
function getPostAuthorById($user_id) {
	global $conn;
	$sql = "SELECT username FROM users WHERE id=$user_id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return mysqli_fetch_assoc($result)['username'];
	} else {
		return null;
	}
}

// Create Post actions
// Create post button
if (isset($_POST['create_post'])) { 
	createPost($_POST); 
}
// Edit post button
if (isset($_GET['edit-post'])) {
	$isEditingPost = true;
	$post_id = $_GET['edit-post'];
	editPost($post_id);
}
// Update post button
if (isset($_POST['update_post'])) {
	updatePost($_POST);
}
// Delete post button
if (isset($_GET['delete-post'])) {
	$post_id = $_GET['delete-post'];
	deletePost($post_id);
}

// Post functions
// get all places
function getAllPlacenames() {
	global $conn;
	$sql = "SELECT id, name FROM place";
	$result = mysqli_query($conn, $sql);
	$places = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $places;
}
function createPost($request_values) {
	global $conn, $errors, $title, $featured_image, $topic_id, $place_id, $body, $published, $log_user;
	$log_user = $_SESSION['user']['id'];
	$title = esc($request_values['title']);
	$body = htmlentities(esc($request_values['body']));
	if (isset($request_values['topic_id'])) {
		$topic_id = esc($request_values['topic_id']);
	}
	if (isset($request_values['place_id'])) {
		$place_id = esc($request_values['place_id']);
	}
	if (isset($request_values['publish'])) {
		$published = esc($request_values['publish']);
	}
	$post_slug = makeSlug($title);

	if (empty($title)) { array_push($errors, "Post title is required"); }
	if (empty($body)) { array_push($errors, "Post body is required"); }
	if (empty($topic_id)) { array_push($errors, "Post topic is required"); }

	$featured_image = $_FILES['featured_image']['name'];
	if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
	$target = "../static/images/post/" . basename($featured_image);
	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
 		array_push($errors, "Failed to upload image. Please check file settings for your server");
	}

	$post_check_query = "SELECT * FROM posts WHERE slug='$post_slug' LIMIT 1";
	$result = mysqli_query($conn, $post_check_query);

	if (mysqli_num_rows($result) > 0) { 
		array_push($errors, "A post already exists with that title.");
	}
	if (count($errors) == 0) {
		$query = "INSERT INTO posts (user_id, title, slug, image, body, published, created_at, updated_at) VALUES('$log_user', '$title', '$post_slug', '$featured_image', '$body', $published, now(), now())";
		if(mysqli_query($conn, $query)){
			$inserted_post_id = mysqli_insert_id($conn);
			$sql = "INSERT INTO post_topic_place (post_id, topic_id, place_id) VALUES('$inserted_post_id', '$topic_id', '$place_id')";
			mysqli_query($conn, $sql);
			
			$_SESSION['message'] = "Post created successfully";
			header('location: manage_posts.php');
			exit(0);
		}
	}
}

function editPost($role_id) {
	global $conn, $title, $post_slug, $body, $published, $isEditingPost, $post_id;
	$sql = "SELECT * FROM posts WHERE id=$role_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$post = mysqli_fetch_assoc($result);

	$title = $post['title'];
	$body = $post['body'];
	$published = $post['published'];
}

function updatePost($request_values) {
	global $conn, $errors, $post_id, $title, $featured_image, $topic_id, $place_id, $body, $published, $log_user;
	
	$log_user = $_SESSION['user']['id'];
	$title = esc($request_values['title']);
	$body = esc($request_values['body']);
	$post_id = esc($request_values['post_id']);
	if (isset($request_values['topic_id'])) {
		$topic_id = esc($request_values['topic_id']);
	}
	if (isset($request_values['place_id'])) {
		$place_id = esc($request_values['place_id']);
	}
	$post_slug = makeSlug($title);

	if (empty($title)) { array_push($errors, "Post title is required"); }
	if (empty($body)) { array_push($errors, "Post body is required"); }
	if (isset($_POST['featured_image'])) {
	  	$featured_image = $_FILES['featured_image']['name'];
	  	$target = "../static/images/post/" . basename($featured_image);
	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  	}
	}

	if (count($errors) == 0) {
		$query = "UPDATE posts SET title='$title', slug='$post_slug', views=0, body='$body', published=$published, updated_at=now() WHERE id=$post_id";
		if(mysqli_query($conn, $query)){
			if (isset($topic_id)) {
				$inserted_post_id = mysqli_insert_id($conn);
				$sql = "UPDATE post_topic_place SET topic_id='$topic_id', place_id='$place_id' WHERE id=$post_id";
				mysqli_query($conn, $sql);
				$_SESSION['message'] = "Post updated successfully";
				header('location: manage_posts.php');
				exit(0);
			}
		}
		$_SESSION['message'] = "Post updated successfully";
		header('location: manage_posts.php');
		exit(0);
	}
}

function deletePost($post_id) {
	global $conn;
	$sql = "DELETE FROM posts WHERE id=$post_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "Post successfully deleted";
		header("location: manage_posts.php");
		exit(0);
	}
}

// Publish post button
if (isset($_GET['publish']) || isset($_GET['unpublish'])) {
	$message = "";
	if (isset($_GET['publish'])) {
		$message = "Post published successfully";
		$post_id = $_GET['publish'];
	} else if (isset($_GET['unpublish'])) {
		$message = "Post successfully unpublished";
		$post_id = $_GET['unpublish'];
	}
	togglePublishPost($post_id, $message);
}
// Unpublish blog post
function togglePublishPost($post_id, $message) {
	global $conn;
	$sql = "UPDATE posts SET published=!published WHERE id=$post_id";
	
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = $message;
		header("location: manage_posts.php");
		exit(0);
	}
}
?>