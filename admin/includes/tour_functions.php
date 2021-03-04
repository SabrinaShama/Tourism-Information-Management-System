<?php 
	$tour_id = 0;
	$isEditingTour = false;
	$title = "";
	$tour_slug = "";
	$description = "";
	$featured_image = "";

// Manage Tour functions
function getAllTours() {
	global $conn;
	$sql = "SELECT * FROM tours";
	$result = mysqli_query($conn, $sql);
	$tours = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$all_tours = array();
	foreach ($tours as $tour) {
		array_push($all_tours, $tour);
	}
	return $all_tours;
}

// Create Tour actions
// Create tour button
if (isset($_POST['create_tour'])) { 
	createTour($_POST); 
}
// Edit tour button
if (isset($_GET['edit-tour'])) {
	$isEditingTour = true;
	$tour_id = $_GET['edit-tour'];
	editTour($tour_id);
}
// Update tour button
if (isset($_POST['update_tour'])) {
	updateTour($_POST);
}
// Delete tour button
if (isset($_GET['delete-tour'])) {
	$tour_id = $_GET['delete-tour'];
	deleteTour($tour_id);
}

// Tour functions
function createTour($request_values) {
	global $conn, $errors, $title, $featured_image, $description;
	$title = esc($request_values['title']);
	$description = htmlentities(esc($request_values['description']));
	$tour_slug = makeSlug($title);

	if (empty($title)) { array_push($errors, "Tour title is required"); }
	if (empty($description)) { array_push($errors, "Tour description is required"); }

	$featured_image = $_FILES['featured_image']['name'];
	if (empty($featured_image)) { array_push($errors, "Featured image is required"); }
	$target = "../static/images/tours/" . basename($featured_image);
	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
 		array_push($errors, "Failed to upload image. Please check file settings for your server");
	}

	$tour_check_query = "SELECT * FROM tours WHERE slug='$tour_slug' LIMIT 1";
	$result = mysqli_query($conn, $tour_check_query);

	if (mysqli_num_rows($result) > 0) { 
		array_push($errors, "A tour already exists with that title.");
	}
	if (count($errors) == 0) {
		$query = "INSERT INTO tours (title, slug, image, description) VALUES('$title', '$tour_slug', '$featured_image', '$description')";
		if(mysqli_query($conn, $query)){
			$_SESSION['message'] = "Tour created successfully";
			header('location: manage_tours.php');
			exit(0);
		}
	}
}

function editTour($role_id) {
	global $conn, $title, $tour_slug, $description, $isEditingTour, $tour_id;
	$sql = "SELECT * FROM tours WHERE id=$role_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$tour = mysqli_fetch_assoc($result);

	$title = $tour['title'];
	$description = $tour['description'];
}

function updateTour($request_values) {
	global $conn, $errors, $tour_id, $title, $featured_image, $description;
	
	$title = esc($request_values['title']);
	$description = esc($request_values['description']);
	$tour_id = esc($request_values['tour_id']);
	$tour_slug = makeSlug($title);

	if (empty($title)) { array_push($errors, "Tour title is required"); }
	if (empty($description)) { array_push($errors, "Tour Description is required"); }
	if (isset($_POST['featured_image'])) {
	  	$featured_image = $_FILES['featured_image']['name'];
	  	$target = "../static/images/tours/" . basename($featured_image);
	  	if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $target)) {
	  		array_push($errors, "Failed to upload image. Please check file settings for your server");
	  	}
	}

	if (count($errors) == 0) {
		$query = "UPDATE tours SET title='$title', slug='$tour_slug', views=0, description='$description' WHERE id=$tour_id";
		if(mysqli_query($conn, $query)){
				$_SESSION['message'] = "Tour updated successfully";
				header('location: manage_tours.php');
				exit(0);
		}
		$_SESSION['message'] = "Tour updated successfully";
		header('location: manage_tours.php');
		exit(0);
	}
}

function deleteTour($tour_id) {
	global $conn;
	$sql = "DELETE FROM tours WHERE id=$tour_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "Tour successfully deleted";
		header("location: manage_tours.php");
		exit(0);
	}
}

?>