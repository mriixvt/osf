<td class="right-bar">
	<div class="hr-1"></div>
	<div class="right-bar-1">
		<?php
		if (isset($_GET['s'])) {
			$tag = $_GET['s']; 
			$sql = "SELECT * FROM h_content WHERE tag='$tag' AND status='show' ORDER BY `id` DESC";
			$result = $db->query($sql);
			if (!$result) {
				echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
				exit;
			}
			while ($row = $result->fetch_assoc()) {
		?>

		<div class="content">

			<table class="content-header"><tr>
				<td class="content-left">
					<div class="content-title"><a href="index.php?p=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
				</td>
				<td class="content-right">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<div class="content-date">
						<a href="index.php?date=<?php echo $row['date'] ?>"><?php echo $row['date']; ?></a>
					</div>
					<i class="fa fa-tag" aria-hidden="true"></i>
					<div class="content-cat">
						<a href="index.php?s=<?php echo $row['tag']; ?>"><?php echo $row['cat']; ?></a>
					</div>
				</td>
				</tr></table>

			<div class="content-text"><?php echo $row['text']; ?></div><br>

		</div>
		<?php } } elseif (isset($_GET['date'])) {
			$date = $_GET['date'];
			$sql = "SELECT * FROM h_content WHERE date='$date' AND status='show' ORDER BY `id` DESC";
			$result = $db->query($sql);
			if (!$result) {
				echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
				exit;
			}
			while ($row = $result->fetch_assoc()) {
		?>

		<div class="content">

			<table class="content-header"><tr>
				<td class="content-left">
					<div class="content-title"><a href="index.php?p=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
				</td>
				<td class="content-right">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<div class="content-date">
						<a href="index.php?date=<?php echo $row['date'] ?>"><?php echo $row['date']; ?></a>
					</div>
					<i class="fa fa-tag" aria-hidden="true"></i>
					<div class="content-cat">
						<a href="index.php?s=<?php echo $row['tag']; ?>"><?php echo $row['cat']; ?></a>
					</div>
				</td>
				</tr></table>

			<div class="content-text"><?php echo $row['text']; ?></div><br>

		</div>
		<?php } } elseif (isset($_GET['p'])) {
			$p = $_GET['p'];
			$sql = "SELECT * FROM h_content WHERE id='$p'";
			$result = $db->query($sql);
			if (!$result) {
				echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
				exit;
			}
			
			$view = 1;

			while ($row = $result->fetch_assoc()) {
	
				mysqli_query($db, "UPDATE h_content SET views = views + $view WHERE id='$p' ");

		?>

		<div class="content">

			<table class="content-header"><tr>
				<td class="content-left">
					<div class="content-title"><a href="index.php?p=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
				</td>
				<td class="content-right">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<div class="content-date">
						<a href="index.php?date=<?php echo $row['date'] ?>"><?php echo $row['date']; ?></a>
					</div>
					<i class="fa fa-tag" aria-hidden="true"></i>
					<div class="content-cat">
						<a href="index.php?s=<?php echo $row['tag']; ?>"><?php echo $row['cat']; ?></a>
					</div>
				</td>
				</tr></table>
		
			<div class="content-text"><?php echo $row['text']; ?></div><br>

		</div>
		<?php  } }   else { 
			
			$per_page=5;

			if (isset($_GET['page'])) {
				$page = $_GET['page'];
			} else {
				$page=1;
			}
			$start_from = ($page-1) * $per_page;
			
			$sql = "SELECT * FROM h_content WHERE status='show' ORDER BY `id` DESC LIMIT $start_from, $per_page";
			$result = $db->query($sql);
			$total = $result->num_rows;
			if (!$result) {
				echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
				exit;
			}
			if ($total >= 1){
			while ($row = $result->fetch_assoc()) {
		?> 

		<div class="content">

			<table class="content-header"><tr>
				<td class="content-left">
					<div class="content-title"><a href="index.php?p=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
				</td>
				<td class="content-right">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<div class="content-date">
						<a href="index.php?date=<?php echo $row['date'] ?>"><?php echo $row['date']; ?></a>
					</div>
					<i class="fa fa-tag" aria-hidden="true"></i>
					<div class="content-cat">
						<a href="index.php?s=<?php echo $row['tag']; ?>"><?php echo $row['cat']; ?></a>
					</div>
				</td>
				</tr></table>
			<?php
				$text = $row['text'];
				
				$string = strip_tags($text);

				if (strlen($string) > 3000) {

					
					$stringCut = substr($string, 0, 3000);

					
					$string = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="index.php?p='.$row['id'].'">
					<i class="fa fa-arrow-circle-right" aria-hidden="true"></i> სრულად</a>'; 
				}
				
				
				
			?>
			<div class="content-text"><?php echo $string; ?></div>

		</div>

		<?php }  }else { echo $post_null; }
				//Now select all from table
				$query = "SELECT * FROM h_content WHERE status='show'";
				$result2 = $db->query($query);

				// Count the total records
				$total_records = mysqli_num_rows($result2);
				
				$current_page = $_GET['page'];
				
				//Using ceil function to divide the total records on per page
				$total_pages = ceil($total_records / $per_page); 
			if ($total_records > 5) {
		?>
				
		<nav aria-label="...">
			<ul class="pagination">
				<li class="page-item <?php if($current_page == 1){ echo 'disabled'; } ?>">
					<?php if($current_page != 1) { ?><a class="page-link" href="index.php?page=<?php echo $current_page - 1; ?>" tabindex="-1" aria-label="უკან"> <?php } ?>
						<span aria-hidden="true">&laquo;</span>
					</a> 


				
				
		<?php
				for ($i=1; $i<=$total_pages; $i++) { 
		?> 

				<li class="page-item">
					<a class="page-link" href="index.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
				</li>
		<?php } ?>
				

				<li class="page-item <?php if($current_page == $total_pages){ echo 'disabled'; } ?>">
					<?php if($current_page != $total_pages ) { ?><a class="page-link" href="index.php?page=<?php echo $current_page + 1; ?>" aria-label="Next"><?php } ?>
						<span aria-hidden="true">&raquo;</span>
					</a>
				</li>
			</ul>
		</nav>
		<?php }else { echo ''; }} ?>
		
		<?php require_once "inc/contact.php"; ?>
		
		<!-- VARIABLE TEST -->
		<?php require_once "inc/functions.php"; ?>



		<div class="hr-2"></div>
	</div>

</td>
