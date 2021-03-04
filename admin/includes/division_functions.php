<?php 
	$div_id = 0;
	$isEditingDivision = false;
	$name = "";
	$div_slug = "";
	$description = "";
	$first_featured_image = "";
	$second_featured_image = "";
	$third_featured_image = "";
	$map_url = "";
	
	//district variables
	$district_id = 0;
	$isEditingDistrict = false;
	$district_name = "";
	$dis = "";

function getAllDivisions()
{
	global $conn;
	$sql = "SELECT * FROM division";
	$result = mysqli_query($conn, $sql);
	$divs = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_divs = array();
	foreach ($divs as $div) {
		array_push($final_divs, $div);
	}
	return $final_divs;
}

// Create Division actions
// Edit division button
if (isset($_GET['edit-div'])) {
	$isEditingDivision = true;
	$div_id = $_GET['edit-div'];
	editDiv($div_id);
}
// Update division button
if (isset($_POST['update_div'])) {
	updateDiv($_POST);
}

// Division functions
function editDiv($role_id) {
	global $conn, $name, $map_url, $description, $first_featured_image, $second_featured_image, $third_featured_image, $div_slug, $isEditingDivision;
	$sql = "SELECT * FROM division WHERE id=$role_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$div = mysqli_fetch_assoc($result);

	$name = $div['name'];
	$description = $div['description'];
	$map_url = $div['map_url'];
}

function updateDiv($request_values) {
	global $conn, $errors, $div_id, $name, $map_url, $description, $first_featured_image, $second_featured_image, $third_featured_image, $div_slug;
	
	$div_id = esc($request_values['div_id']);
	$name = esc($request_values['name']);
	$map_url = esc($request_values['map_url']);
	$description = htmlentities(esc($request_values['description']));
	$div_slug = makeSlug($name);

	if (empty($name)) { array_push($errors, "Division title is required"); }
	if (empty($map_url)) { array_push($errors, "Division Map is required"); }
	if (empty($description)) { array_push($errors, "Division description is required"); }

	if (isset($_POST['first_featured_image'])) {
		$first_featured_image = $_FILES['first_featured_image']['name'];
		$target = "../static/images/division/" . basename($first_featured_image);
		if (!move_uploaded_file($_FILES['first_featured_image']['tmp_name'], $target)) {
			array_push($errors, "Failed to upload First Featured image. Please check file settings for your server");
		}
	}
	if (isset($_POST['second_featured_image'])) {
		$second_featured_image = $_FILES['second_featured_image']['name'];
		$target = "../static/images/division/" . basename($second_featured_image);
		if (!move_uploaded_file($_FILES['second_featured_image']['tmp_name'], $target)) {
			array_push($errors, "Failed to upload Second Featured image. Please check file settings for your server");
		}
	}
	if (isset($_POST['third_featured_image'])) {
		$third_featured_image = $_FILES['third_featured_image']['name'];
		$target = "../static/images/division/" . basename($third_featured_image);
		if (!move_uploaded_file($_FILES['third_featured_image']['tmp_name'], $target)) {
			array_push($errors, "Failed to upload Third Featured image. Please check file settings for your server");
		}
	}

	if (count($errors) == 0) {
		$query = "UPDATE division SET name='$name', slug='$div_slug', description='$description', map_url='$map_url' WHERE id=$div_id";
		if(mysqli_query($conn, $query)){
			$_SESSION['message'] = "Division updated successfully";
			header('location: manage_divisions.php');
			exit(0);
		}
		$_SESSION['message'] = "Division updated successfully";
		header('location: manage_divisions.php');
		exit(0);
	}
}


// District Actions
// Create district button
if (isset($_POST['create_district'])) { createDistrict($_POST); }
// Edit district button
if (isset($_GET['edit-district'])) {
	$isEditingDistrict = true;
	$district_id = $_GET['edit-district'];
	editDistrict($district_id);
}
// Update district button
if (isset($_POST['update_district'])) {
	updateDistrict($_POST);
}


// District functions
function getAllDistricts($dis) {
	global $conn;
	$sql = "SELECT * FROM district WHERE division = '$dis'";
	$result = mysqli_query($conn, $sql);
	$districts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $districts;
}
// get division name
function getDivisionname($dis) {
	global $conn;
	$sql = "SELECT id, name FROM division WHERE id = '$dis'";
	$result = mysqli_query($conn, $sql);
	$divisions = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $divisions;
}
function createDistrict($request_values){
	global $conn, $errors, $district_name, $district_slug, $division_id;
	$district_name = esc($request_values['district_name']);
	$district_slug = makeSlug($district_name);
	if (isset($request_values['division_id'])) {
		$division_id = esc($request_values['division_id']);
	}

	if (empty($district_name)) { 
		array_push($errors, "District name required"); 
	}

	$district_check_query = "SELECT * FROM district WHERE slug='$district_slug' LIMIT 1";
	$result = mysqli_query($conn, $district_check_query);
	if (mysqli_num_rows($result) > 0) {
		array_push($errors, "District already exists");
	}

	if (count($errors) == 0) {
		$query = "INSERT INTO district (name, slug, division) 
				  VALUES('$district_name', '$district_slug', '$division_id')";
		mysqli_query($conn, $query);

		$_SESSION['message'] = "District created successfully";
		header('location: districts.php');
		exit(0);
	}
}
function editDistrict($district_id) {
	global $conn, $district_name, $isEditingDistrict, $district_id;
	$sql = "SELECT * FROM district WHERE id=$district_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$district = mysqli_fetch_assoc($result);

	$district_name = $district['name'];
}
function updateDistrict($request_values) {
	global $conn, $errors, $district_name, $district_slug, $division_id;
	$district_name = esc($request_values['district_name']);
	$district_id = esc($request_values['district_id']);
	$district_slug = makeSlug($district_name);
	if (isset($request_values['division_id'])) {
		$division_id = esc($request_values['division_id']);
	}

	if (empty($district_name)) { 
		array_push($errors, "District name required"); 
	}

	if (count($errors) == 0) {
		$query = "UPDATE district SET name='$district_name', slug='$district_slug' WHERE id=$district_id";
		mysqli_query($conn, $query);

		$_SESSION['message'] = "District updated successfully";
		header('location: districts.php');
		exit(0);
	}
}
?>