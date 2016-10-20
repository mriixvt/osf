	<?php 

/* VARIABLES IN MAIN / s, data / */

if(isset($_GET['s']) && empty($_GET['s'])){
	header('Location: index.php');
	exit;
} 


if(isset($_GET['s'])) {
	$get = $_GET['s']; 

	$sql = "SELECT s FROM h_lm WHERE s='$get'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();

	$sql2 = "SELECT s FROM h_tm WHERE s='$get'";
	$result2 = $db->query($sql2);
	$row2 = $result2->fetch_assoc();

	if ($row['s'] == $get || $row2['s'] == $get) {
		echo '';
	} else {
		echo '<div class="content"><div class="alert alert-danger" role="alert"><center><h1>404</h1>გვერდი <b>"'.$get.'"</b> ვერ მოიძებნა <br><br> <i class="fa fa-home" aria-hidden="true" style="font-size: 17px;"></i> <a href="index.php" class="alert-link">ჰერეთის სახლი</a></center><br></div></div>';
	}
}


if(isset($_GET['date']) && empty($_GET['date'])){
	header('Location: index.php');
	exit;
} 

if(isset($_GET['date'])) {
	$get = $_GET['date']; 

	$sql = "SELECT date FROM h_content WHERE date='$get'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();

	$sql2 = "SELECT date FROM h_content WHERE date='$get'";
	$result2 = $db->query($sql2);
	$row2 = $result2->fetch_assoc();

	if ($row['date'] == $get || $row2['date'] == $get) {
		echo '';
	} else {
		echo '<div class="content"><div class="alert alert-danger" role="alert"><center><h1>404</h1>გვერდი <b>"'.$get.'"</b> ვერ მოიძებნა <br><br> <i class="fa fa-home" aria-hidden="true" style="font-size: 17px;"></i> <a href="index.php" class="alert-link">ჰერეთის სახლი</a></center><br></div></div>';
	}
}


if(isset($_GET['s'])) {
	$get = $_GET['s']; 

	$sql = "SELECT tag FROM h_content WHERE tag='$get'";
	$result = $db->query($sql);
	$row_cnt = $result->num_rows;

	

	if ($row_cnt > 0) {
		echo '';
	} else {
		echo '<div class="content"><div class="alert alert-danger" role="alert">
  				<strong>თემა ვერ მოიძებნა</strong> <br><br><center>
				<i class="fa fa-home" aria-hidden="true" style="font-size: 17px;"></i> 
  				<a href="index.php" class="alert-link">ჰერეთის სახლი</a></center>
			</div></div>
		';
	}
}

/* END VARIABLES  */
?>