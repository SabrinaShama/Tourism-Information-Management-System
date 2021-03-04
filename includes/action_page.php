<?php 

//index blog
// Returns all published posts
function getPublishedPostsOnly() {
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true order by created_at DESC LIMIT 3";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}

// division datas
// returns all division details
function getDiv($slug){
	global $conn;
	// Get single div slug
	$div_slug = $_GET['div-slug'];
	$sql = "SELECT * FROM division WHERE slug='$div_slug'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$divdetails = mysqli_fetch_assoc($result);
	/* if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
	} */
	return $divdetails;
}
// didnot work - image
function getDivImage($divid){
	global $conn;
	$sql = "SELECT div_image FROM division_image WHERE div_id='$divid'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$divimages = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$divimagelist = array();
	foreach ($divimages as $divimage) { 
		array_push($divimagelist, $divimage);
	}
	
	return $divimagelist;
}
// Returns all traditional places
function getTradPlaces($divid) {
	global $conn;
	$sql = "SELECT * FROM division_place_types JOIN place ON division_place_types.place = place.id AND division_place_types.division = '$divid' AND division_place_types.types = '1'";
	$result = mysqli_query($conn, $sql);

	// fetch all places as an associative array called $trads
	$trads = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$tradplaces = array();
	foreach ($trads as $trad) { 
		array_push($tradplaces, $trad);
	}
	return $tradplaces;
}
// Returns all cultural places
function getCultPlaces($divid) {
	global $conn;
	$sql = "SELECT * FROM division_place_types JOIN place ON division_place_types.place = place.id AND division_place_types.division = '$divid' AND division_place_types.types = '2'";
	$result = mysqli_query($conn, $sql);

	// fetch all places as an associative array called $cults
	$cults = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$cultplaces = array();
	foreach ($cults as $cult) { 
		array_push($cultplaces, $cult);
	}
	return $cultplaces;
}
// Returns all cultural places
function getModPlaces($divid) {
	global $conn;
	$sql = "SELECT * FROM division_place_types JOIN place ON division_place_types.place = place.id AND division_place_types.division = '$divid' AND division_place_types.types = '3'";
	$result = mysqli_query($conn, $sql);

	// fetch all places as an associative array called $mods
	$mods = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$modplaces = array();
	foreach ($mods as $mod) { 
		array_push($modplaces, $mod);
	}
	return $modplaces;
}
// Returns all posts from this Div
function getPublishedPostsThisDiv($divid) {
	global $conn;
	$sql = "SELECT * FROM posts ps WHERE published=true AND ps.id IN 
			(SELECT post_id FROM division_place_types JOIN post_topic_place ON division_place_types.place = post_topic_place.place_id AND division_place_types.division ='$divid')";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}


// place datas
// returns all place details
function getPlace($slug){
	global $conn;
	// Get single div slug
	$place_slug = $_GET['place-slug'];
	$sql = "SELECT * FROM place WHERE slug='$place_slug'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$placedetails = mysqli_fetch_assoc($result);
	return $placedetails;
}
// Returns all posts from this place
function getPublishedPostsThisPlace($placeid) {
	global $conn;
	$sql = "SELECT * FROM posts ps WHERE published=true AND ps.id IN 
			(SELECT post_id FROM post_topic_place WHERE post_topic_place.place_id = '$placeid')";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
// Returns all nearby places
function getNearbyPlaces($placedis, $placeid) {
	global $conn;
	$sql = "SELECT * FROM place WHERE district_id = '$placedis' AND id != 1 AND id != '$placeid'";
	$result = mysqli_query($conn, $sql);

	// fetch all places as an associative array called $nears
	$nears = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$nearplaces = array();
	foreach ($nears as $near) { 
		array_push($nearplaces, $near);
	}
	return $nearplaces;
}

//blog
// Returns all published posts
function getPublishedPosts() {
	global $conn;
	$sql = "SELECT * FROM posts WHERE published=true order by created_at DESC";
	$result = mysqli_query($conn, $sql);

	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}


// Receives a post id and Returns topic of the post
function getPostTopic($post_id){
	global $conn;
	$sql = "SELECT * FROM topics WHERE id=
			(SELECT topic_id FROM post_topic_place WHERE post_id=$post_id) LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic;
}


// Filtered post
// Returns all posts under a topic
function getPublishedPostsByTopic($topic_id) {
	global $conn;
	$sql = "SELECT * FROM posts ps 
			WHERE published=true AND ps.id IN 
			(SELECT pt.post_id FROM post_topic_place pt 
				WHERE pt.topic_id=$topic_id GROUP BY pt.post_id 
				HAVING COUNT(1) = 1)";
	$result = mysqli_query($conn, $sql);
	// fetch all posts as an associative array called $posts
	$posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

	$final_posts = array();
	foreach ($posts as $post) {
		$post['topic'] = getPostTopic($post['id']); 
		array_push($final_posts, $post);
	}
	return $final_posts;
}
// Returns topic name by topic id
function getTopicNameById($id)
{
	global $conn;
	$sql = "SELECT name FROM topics WHERE id=$id";
	$result = mysqli_query($conn, $sql);
	$topic = mysqli_fetch_assoc($result);
	return $topic['name'];
}


// Full post
// Returns a single post
function getPost($slug){
	global $conn;
	// Get single post slug
	$post_slug = $_GET['post-slug'];
	$sql = "SELECT * FROM posts WHERE slug='$post_slug' AND published=true";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$post = mysqli_fetch_assoc($result);
	if ($post) {
		// get the topic to which this post belongs
		$post['topic'] = getPostTopic($post['id']);
		updateView($post['id']);
	}
	return $post;
}
// Returns all topics
function getAllTopics()
{
	global $conn;
	$sql = "SELECT * FROM topics";
	$result = mysqli_query($conn, $sql);
	$topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
	return $topics;
}
//update view
function updateView($post_id)
{
	global $conn;
	$sql = "UPDATE posts SET views = views+1 WHERE id=$post_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
}

//tour
// Returns all tours
function getAllTours() {
	global $conn;
	$sql = "SELECT * FROM tours";
	$result = mysqli_query($conn, $sql);

	// fetch all tours as an associative array called $tours
	$tours = mysqli_fetch_all($result, MYSQLI_ASSOC);
	$all_tours = array();
	foreach ($tours as $tour) {
		array_push($all_tours, $tour);
	}
	return $all_tours;
}
// Returns a single tour
function getTour($slug){
	global $conn;
	// Get single tour slug
	$tour_slug = $_GET['tour-slug'];
	$sql = "SELECT * FROM tours WHERE slug='$tour_slug'";
	$result = mysqli_query($conn, $sql);

	// fetch query results as associative array.
	$tour = mysqli_fetch_assoc($result);
	if ($tour) {
		updateTourView($tour['id']);
	}
	return $tour;
}
//update view
function updateTourView($tour_id)
{
	global $conn;
	$sql = "UPDATE tours SET views = views+1 WHERE id=$tour_id LIMIT 1";
	$result = mysqli_query($conn, $sql);
}
?>

