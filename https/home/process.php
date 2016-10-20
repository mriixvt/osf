<?php
############ Configuration ##############
$config["generate_image_file"]			= true;
$config["generate_thumbnails"]			= true;
$config["image_max_size"] 			= 800; //Maximum image size (height and width)
$config["thumbnail_size"]  			= 200; //Thumbnails will be cropped to 200x200 pixels
$config["thumbnail_prefix"]			= "thumb_"; //Normal thumb Prefix
$config["destination_folder"]			= './uploads/img/'; //upload directory ends with / (slash)
$config["thumbnail_destination_folder"]		= './uploads/img/'; //upload directory ends with / (slash)
$config["upload_url"] 				= "http://localhost/herula/h/home/uploads/img/"; 
$config["quality"] 				= 90; //jpeg quality
$config["random_file_name"]			= true; //randomize each file name


if(!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) {
	exit;  //try detect AJAX request, simply exist if no Ajax
}

//specify uploaded file variable
$config["file_data"] = $_FILES["__files"]; 


//include sanwebe impage resize class
include("resize.class.php"); 


//create class instance 
$im = new ImageResize($config); 


try{
	$responses = $im->resize(); //initiate image resize
	
	echo '<h3></h3>';
	//output thumbnails
	foreach($responses["thumbs"] as $response){
		echo '
			<img src="'.$config["upload_url"].$response.'" class="thumbnails" title="'.$response.'" />
			<br />
			<input onClick="this.setSelectionRange(0, this.value.length)" value="'.$config["upload_url"].$response.'" style="width: 90%;" />
		';
	}
	
	echo '<h3></h3>';
	//output images
	foreach($responses["images"] as $response){
		echo '
			<img src="'.$config["upload_url"].$response.'" class="images" title="'.$response.'" />
			<br />
			<input onClick="this.setSelectionRange(0, this.value.length)" value="'.$config["upload_url"].$response.'" style="width: 90%;" />
		';
		
	}
	
}catch(Exception $e){
	echo '<div class="error">';
	echo $e->getMessage();
	echo '</div>';
}



		
?>
