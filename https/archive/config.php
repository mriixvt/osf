<?php 



// DB
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'ramses2');
define('DB_DATABASE', 'herulage_archive');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
if (!$db) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



$dat1 = date ("d");
$dat2 = date ("m");
$dat3 = date ("Y");
$start = mktime (date("G")+9,date("i"),0,date("m"),date("d"),date("Y"));
$time = date ("Y/m/d G:i", $start);


$ip=$_SERVER['REMOTE_ADDR'];
$sys=$_SERVER['HTTP_USER_AGENT'];


// DEFINITIONS

// CONFIG
$sql = "SELECT id, title, name FROM a_config"; 

if ($result = $db->query($sql)) {

	while ($row = $result->fetch_assoc()) {
		
		define ($row["name"], $row["title"]);
		
	}
}

// USER RANKS 


// DEFINITIONS END

// FUNCTIONS 
$sql_get = "SELECT * FROM a_topics WHERE status='show'";
$result_get = $db->query($sql_get);
$total_get = $result_get->num_rows;
$row_get = $result_get->fetch_assoc();
$sum = $row_get['cats_fk'];

$sql_topics_get = "SELECT C.* FROM a_topics T, a_cats C WHERE T.cats_fk=C.cat AND T.status='show'"; 
$result_topics_get = $db->query($sql_topics_get);

mysqli_query($db, "UPDATE a_cats SET `topics_sum` = $total_topics_get WHERE `cat` = $sum");


// ########################
 
$error_web = 'გვერდი დროებით გათიშულია';

$post_null = '<div class="content"><div class="alert alert-danger" role="alert">
  				<strong>თემა ვერ მოიძებნა</strong> <br><br><center>
				<i class="fa fa-home" aria-hidden="true" style="font-size: 17px;"></i> 
  				<a href="index.php" class="alert-link">ჰერეთის სახლი</a></center>
			</div></div>';



session_start();


header('Content-Type: text/html; charset=UTF-8');

?>