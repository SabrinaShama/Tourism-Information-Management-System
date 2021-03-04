<?php 
	$place_id = 0;
	$isEditingPlace = false;
	$name = "";
	$place_slug = "";	
	$first_featured_image = "";
	$second_featured_image = "";
	$third_featured_image = "";
	$map_url = "";
	$description = "";
	$location = "";
	$highway = "";	
	$activities = "";
	$tips = "";
	$money = "";
	$resturl = "";
	$hotelurl = "";
	$storeurl = "";
	$libraurl = "";

function getAllPlaces()
{
	global $conn;
	$sql = "SELECT * FROM place WHERE id != 1";
	$result = mysqli_query($conn, $sql);
	$places = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_places = array();
	foreach ($places as $place) {
		$id = $place['id'];
		$place['division'] = getDivisionById($place['id']);
		array_push($final_places, $place);
	}
	return $final_places;
}
function getDivisionById($id)
{
	global $conn;
	$sql = "SELECT name FROM division WHERE division.id IN (SELECT division FROM division_place_types WHERE division_place_types.place='$id')";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		return mysqli_fetch_assoc($result)['name'];
	} else {
		return null;
	}
}


// Create Place actions
// Create place button
if (isset($_POST['create_place'])) { 
	createPlace($_POST); 
}
// Edit place button
if (isset($_GET['edit-place'])) {
	$isEditingPlace = true;
	$place_id = $_GET['edit-place'];
	editPlace($place_id);
}
// Update place button
if (isset($_POST['update_place'])) {
	updatePlace($_POST);
}
// Delete place button
if (isset($_GET['delete-place'])) {
	$place_id = $_GET['delete-place'];
	deletePlace($place_id);
}

// place functions
// get all divisions
function getAllDivisionnames() {
	global $conn;
	$sql = "SELECT id, name FROM division";
	$result = mysqli_query($conn, $sql);
	$divisions = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $divisions;
}
// get all districts
function getAllDistrictnames() {
	global $conn;
	$sql = "SELECT id, name FROM district ORDER BY name ASC";
	$result = mysqli_query($conn, $sql);
	$districts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $districts;
}
// get all types
function getAllTypes() {
	global $conn;
	$sql = "SELECT * FROM types";
	$result = mysqli_query($conn, $sql);
	$types = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $types;
}

function createPlace($request_values) {
	global $conn, $errors, $name, $map_url, $location, $description, $highway, $activities, $tips, $money, $resturl, $hotelurl, $storeurl, $libraurl, $first_featured_image, $second_featured_image, $third_featured_image, $division_id, $district_id, $types_id, $place_slug;
	$name = esc($request_values['name']);
	$map_url = esc($request_values['map_url']);
	$location = esc($request_values['location']);
	$description = htmlentities(esc($request_values['description']));
	$highway = htmlentities(esc($request_values['highway']));
	$activities = htmlentities(esc($request_values['activities']));
	$tips = htmlentities(esc($request_values['tips']));
	$money = htmlentities(esc($request_values['money']));
	$resturl = esc($request_values['resturl']);
	$hotelurl = esc($request_values['hotelurl']);
	$storeurl = esc($request_values['storeurl']);
	$libraurl = esc($request_values['libraurl']);
	if (isset($request_values['division_id'])) {
		$division_id = esc($request_values['division_id']);
	}
	if (isset($request_values['district_id'])) {
		$district_id = esc($request_values['district_id']);
	}
	if (isset($request_values['types_id'])) {
		$types_id = esc($request_values['types_id']);
	}
	$place_slug = makeSlug($name);

	if (empty($name)) { array_push($errors, "Place title is required"); }
	if (empty($map_url)) { array_push($errors, "Place Map is required"); }
	if (empty($location)) { array_push($errors, "Place location is required"); }
	if (empty($description)) { array_push($errors, "Place description is required"); }
	if (empty($highway)) { array_push($errors, "Place route is required"); }
	if (empty($activities)) { array_push($errors, "Place activities is required"); }
	if (empty($tips)) { array_push($errors, "Place tips is required"); }
	if (empty($money)) { array_push($errors, "Place expense is required"); }
	if (empty($resturl)) { array_push($errors, "Map for restaurant list is required"); }
	if (empty($hotelurl)) { array_push($errors, "Map for hotel list is required"); }
	if (empty($storeurl)) { array_push($errors, "Map for store list is required"); }
	if (empty($libraurl)) { array_push($errors, "Map for library list is required"); }
	if (empty($division_id)) { array_push($errors, "Place division is required"); }
	if (empty($district_id)) { array_push($errors, "Place district is required"); }
	if (empty($types_id)) { array_push($errors, "Place types is required"); }

	$first_featured_image = $_FILES['first_featured_image']['name'];
	if (empty($first_featured_image)) { array_push($errors, "First Featured image is required"); }
	$target = "../static/images/place/" . basename($first_featured_image);
	if (!move_uploaded_file($_FILES['first_featured_image']['tmp_name'], $target)) {
 		array_push($errors, "Failed to upload First Featured image. Please check file settings for your server");
	}
	$second_featured_image = $_FILES['second_featured_image']['name'];
	if (empty($second_featured_image)) { array_push($errors, "Second Featured image is required"); }
	$target = "../static/images/place/" . basename($second_featured_image);
	if (!move_uploaded_file($_FILES['second_featured_image']['tmp_name'], $target)) {
 		array_push($errors, "Failed to upload Second Featured image. Please check file settings for your server");
	}
	$third_featured_image = $_FILES['third_featured_image']['name'];
	if (empty($third_featured_image)) { array_push($errors, "Third Featured image is required"); }
	$target = "../static/images/place/" . basename($third_featured_image);
	if (!move_uploaded_file($_FILES['third_featured_image']['tmp_name'], $target)) {
 		array_push($errors, "Failed to upload Third Featured image. Please check file settings for your server");
	}

	$place_check_query = "SELECT * FROM place WHERE slug='$place_slug' LIMIT 1";
	$result = mysqli_query($conn, $place_check_query);

	if (mysqli_num_rows($result) > 0) { 
		array_push($errors, "A place already exists with that title.");
	}
	if (count($errors) == 0) {
		$query = "INSERT INTO place (name, slug, description, pl_image1, pl_image2, pl_image3, map_url, location, highway, activities, tips, money, resturl, hotelurl, storeurl, libraurl, district_id) VALUES('$name', '$place_slug', '$description', '$first_featured_image', '$second_featured_image', '$third_featured_image', '$map_url', '$location', '$highway', '$activities', '$tips', '$money', '$resturl', '$hotelurl', '$storeurl', '$libraurl', '$district_id')";
		if(mysqli_query($conn, $query)){
			$inserted_place_id = mysqli_insert_id($conn);
			$sql = "INSERT INTO division_place_types (division, place, types) VALUES($division_id, $inserted_place_id, $types_id)";
			mysqli_query($conn, $sql);

			$_SESSION['message'] = "Place created successfully";
			header('location: manage_places.php');
			exit(0);
		}
	}
}

function editPlace($role_id) {
	global $conn, $name, $map_url, $location, $description, $highway, $activities, $tips, $money, $resturl, $hotelurl, $storeurl, $libraurl, $first_featured_image, $second_featured_image, $third_featured_image, $division_id, $district_id, $types_id, $place_slug, $isEditingPlace;
	$sql = "SELECT * FROM place WHERE id=$role_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$place = mysqli_fetch_assoc($result);

	$name = $place['name'];
	$description = $place['description'];
	$map_url = $place['map_url'];
	$location = $place['location'];
	$highway = $place['highway'];
	$activities = $place['activities'];
	$tips = $place['tips'];
	$money = $place['money'];
	$resturl = $place['resturl'];
	$hotelurl = $place['hotelurl'];
	$storeurl = $place['storeurl'];
	$libraurl = $place['libraurl'];
}

function updatePlace($request_values) {
	global $conn, $errors, $place_id, $name, $map_url, $location, $description, $highway, $activities, $tips, $money, $resturl, $hotelurl, $storeurl, $libraurl, $first_featured_image, $second_featured_image, $third_featured_image, $division_id, $district_id, $types_id, $place_slug;
	
	$place_id = esc($request_values['place_id']);
	$name = esc($request_values['name']);
	$map_url = esc($request_values['map_url']);
	$location = esc($request_values['location']);
	$description = htmlentities(esc($request_values['description']));
	$highway = htmlentities(esc($request_values['highway']));
	$activities = htmlentities(esc($request_values['activities']));
	$tips = htmlentities(esc($request_values['tips']));
	$money = htmlentities(esc($request_values['money']));
	$resturl = esc($request_values['resturl']);
	$hotelurl = esc($request_values['hotelurl']);
	$storeurl = esc($request_values['storeurl']);
	$libraurl = esc($request_values['libraurl']);
	if (isset($request_values['division_id'])) {
		$division_id = esc($request_values['division_id']);
	}
	if (isset($request_values['district_id'])) {
		$district_id = esc($request_values['district_id']);
	}
	if (isset($request_values['types_id'])) {
		$types_id = esc($request_values['types_id']);
	}
	$place_slug = makeSlug($name);

	if (empty($name)) { array_push($errors, "Place title is required"); }
	if (empty($map_url)) { array_push($errors, "Place Map is required"); }
	if (empty($location)) { array_push($errors, "Place location is required"); }
	if (empty($description)) { array_push($errors, "Place description is required"); }
	if (empty($highway)) { array_push($errors, "Place route is required"); }
	if (empty($activities)) { array_push($errors, "Place activities is required"); }
	if (empty($tips)) { array_push($errors, "Place tips is required"); }
	if (empty($money)) { array_push($errors, "Place expense is required"); }
	if (empty($resturl)) { array_push($errors, "Map for restaurant list is required"); }
	if (empty($hotelurl)) { array_push($errors, "Map for hotel list is required"); }
	if (empty($storeurl)) { array_push($errors, "Map for store list is required"); }
	if (empty($libraurl)) { array_push($errors, "Map for library list is required"); }
	if (empty($division_id)) { array_push($errors, "Place division is required"); }
	if (empty($district_id)) { array_push($errors, "Place district is required"); }
	if (empty($types_id)) { array_push($errors, "Place types is required"); }

	if (isset($_POST['first_featured_image'])) {
		$first_featured_image = $_FILES['first_featured_image']['name'];
		$target = "../static/images/place/" . basename($first_featured_image);
		if (!move_uploaded_file($_FILES['first_featured_image']['tmp_name'], $target)) {
			array_push($errors, "Failed to upload First Featured image. Please check file settings for your server");
		}
	}
	if (isset($_POST['second_featured_image'])) {
		$second_featured_image = $_FILES['second_featured_image']['name'];
		$target = "../static/images/place/" . basename($second_featured_image);
		if (!move_uploaded_file($_FILES['second_featured_image']['tmp_name'], $target)) {
			array_push($errors, "Failed to upload Second Featured image. Please check file settings for your server");
		}
	}
	if (isset($_POST['third_featured_image'])) {
		$third_featured_image = $_FILES['third_featured_image']['name'];
		$target = "../static/images/place/" . basename($third_featured_image);
		if (!move_uploaded_file($_FILES['third_featured_image']['tmp_name'], $target)) {
			array_push($errors, "Failed to upload Third Featured image. Please check file settings for your server");
		}
	}

	if (count($errors) == 0) {
		$query = "UPDATE place SET name='$name', slug='$place_slug', description='$description', map_url='$map_url', location='$location', highway='$highway', activities='$activities', tips='$tips', money='$money', resturl='$resturl', hotelurl='$hotelurl', storeurl='$storeurl', libraurl='$libraurl', district_id='$district_id' WHERE id=$place_id";
		if(mysqli_query($conn, $query)){
			if (isset($division_id, $types_id)) {
				$inserted_place_id = mysqli_insert_id($conn);
				$sql = "UPDATE division_place_types SET division='$division_id', types='$types_id' WHERE id=$place_id";
				mysqli_query($conn, $sql);
				$_SESSION['message'] = "Place updated successfully";
				header('location: manage_places.php');
				exit(0);
			}
		}
		$_SESSION['message'] = "Place updated successfully";
		header('location: manage_places.php');
		exit(0);
	}
}

function deletePlace($place_id) {
	global $conn;
	$sql = "DELETE FROM place WHERE id=$place_id";
	if (mysqli_query($conn, $sql)) {
		$_SESSION['message'] = "Place successfully deleted";
		header("location: manage_places.php");
		exit(0);
	}
}
?>