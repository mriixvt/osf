<?php require_once "config.php";


$p = $_GET['p']; 

$sqlt = "SELECT id, title, cat FROM h_content WHERE id='$p'";
$resultt = $db->query($sqlt);
$rowt = $resultt->fetch_assoc();


?>
<html>

<head>
	<title><?php 
		
		if (isset($_GET['p'])) {
			echo to_utf8($rowt['title'])." - ".to_utf8($rowt['cat'])." - ".WEBSITE_TITLE;
		} elseif (isset($_GET['s'])) { 
			$get = $_GET['s'];
			$sql = "SELECT * FROM h_lm WHERE s='$get'";
			$result = $db->query($sql);
			$row = $result->fetch_assoc();
			
			$sql2 = "SELECT * FROM h_tm WHERE s='$get'";
			$result2 = $db->query($sql2);
			$row2 = $result2->fetch_assoc();
			echo to_utf8($row['name']).to_utf8($row2['name'])." - ".WEBSITE_TITLE;
		} else {
			echo WEBSITE_TITLE;
		}
	
	?></title>
	
	<?php require_once "inc/links.php" ?>
	
</head>

<body>


	<?php require_once "inc/header.php" ?>
	

	<div class="main-wrap"> 
		
		<?php require_once "inc/main.php" ?>
		
	
	</div>
	

	<?php require_once "inc/footer.php" ?>




</body>

</html>