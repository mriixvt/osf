<td class="right-bar">
	<div class="right-bar-1">
		<div class="hr-1"></div>
		<?php
		if (isset($_GET['h'])) {
			$tag = $_GET['h']; 
			$sql = "SELECT * FROM h_user_lmh WHERE h='$tag'";
			$result = $db->query($sql);
			if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			
			$p = $_GET['p'];
			if ($tag == 'რედაქტირება' && !empty($p)) {


				require_once "inc/user/post_edit.php";


			} elseif ($tag == 'ახალი-თემის-გახსნა'){
			while ($row = $result->fetch_assoc()) 
			{ 
				
				require_once "inc/user/post_add.php"; 
		
			}}else { 
				echo '<div class="content"> <div class="alert alert-warning"> თემა ვერ მოიძებნა </div> </div> '; } 	
		} elseif (isset($_GET['u'])) {
			$tag = $_GET['u'];
			
			$sql = "SELECT * FROM h_user_lm WHERE u='$tag'";
			$result = $db->query($sql);
			
			$sql2 = "SELECT * FROM h_user_lm WHERE u='$tag'";
			$result2 = $db->query($sql2);
			$row2 = $result2->fetch_assoc();
			if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			if (!$result2) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			
			if ($row2['id'] == 2) {
			while ($row = $result->fetch_assoc()) {
		
		?>
		
		<div class="content">

			<?php echo $error_web; ?>

		</div>
		
		<?php } } elseif ($row2['id'] == 3) { ?>
		
		<div class="content">

			<?php echo $error_web; ?>

		</div>
		
		<?php } else { ?>
		
		<div class="content">

			NO VALUE

		</div>
		
		<?php } } else { 
			if(isset($_GET['delete_id']))
			{
				$delete_id = $_GET['delete_id'];
				mysqli_query($db, "DELETE FROM h_content WHERE id='$delete_id'");
				
			}
		?>
		
		<div class="content user-page-content-top">
			<table><tr>
				<td>
					<i class="fa fa-info-circle" aria-hidden="true" style="font-size: 100px; margin-right: -58px;"></i>
				</td>
				<td>
					<?php 
			$sql2 = "SELECT * FROM users WHERE username='$user'";
			$result2 = $db->query($sql2);
			$row2 = $result2->fetch_assoc();

			if ($row2['status'] == '1') {
				$row2['status'] = "ადმინისტრატორი";
			} elseif ($row2['status'] == '2') {
				$row2['status'] = "მომხმარებელი";
			}

			$sql3 = "SELECT * FROM h_content WHERE author='$user'";
			$result3 = $db->query($sql3);
			$rowcount =mysqli_num_rows($result3);
					?>

					<div class="user-page">

						<?php echo $row2['name']." ".$row2['lastname']." (".$row2['username'].") <a href='#' class='user-edit-button'><i class='fa fa-pencil-square-o' aria-hidden='true'></i></a><br>სტატუსი: ".$row2['status']."<br><br> თემების რაოდენობა: <b>".$rowcount."</b>"; ?>

					</div>
				</td>
			</tr></table>
		</div>
			<?php
			
			$sql = "SELECT * FROM h_content WHERE author='$user' ORDER BY `id` DESC";
			$result = $db->query($sql);
			$total = $result->num_rows;
			
			if (!$result) {
				echo 'Could not run query: ' . mysql_error();
				exit;
			}
			if ($total >= 1) {
			while ($row = $result->fetch_assoc()) {
		?> 


		<div class="user-page-content">
			
			<table class="user-page-content-header"><tr>
				<td class="user-page-content-left">
					<div class="user-page-content-title"><a href="index.php?p=<?php echo $row['id']; ?>"><?php echo $row['title']; ?></a></div>
				</td>
				<td class="user-page-content-right">
					<i class="fa fa-calendar" aria-hidden="true"></i>
					<div class="user-page-content-date">
						<a href="index.php?date=<?php echo $row['date'] ?>"><?php echo $row['date']; ?></a>
					</div>
					<i class="fa fa-tag" aria-hidden="true"></i>
					<div class="user-page-content-cat">
						<a href="index.php?s=<?php echo $row['tag']; ?>"><?php echo $row['cat']; ?></a>
					</div>
					
				
				</td>
				</tr>
				<tr>
					<td class="user-page-content-info">
						<?php if ($row['status'] == 'hide') { echo "<i class='fa fa-eye-slash' aria-hidden='true'></i>  <a href='#' class='user-page-content-status-h'>".$row['status']; } else { echo "<i class='fa fa-eye' aria-hidden='true'></i> <a href='#' class='user-page-content-status-s'>".$row['status']; } ?></a>
						
					<i class="fa fa-bullseye" aria-hidden="true"></i> <?php echo $row['views']; ?>
					
				<i class="fa fa-pencil" aria-hidden="true"></i>
				<a href="user.php?delete_id=<?php echo $row['id']; ?>" class="user-page-content-info-delete" onclick="return confirm('ნამდვილად გსურთ წაშლა?'); ">წაშლა</a> / 
				<a href="user.php?h=რედაქტირება&p=<?php echo $row['id']; ?>" class="user-page-content-info-edit">შესწორება</a>
				
					</td>
				</tr>
				</table>

		</div>

<?php } } else { echo $post_null; } } ?>
		
		
		<!-- VARIABLE TEST -->
		<?php require_once "inc/functions.php"; ?>



		<div class="hr-2"></div>
	</div>
</td>

<script type="text/javascript">
	function delete_id(id)
	{
		if(confirm('Sure To Remove This Record ?'))
		{
			window.location.href='user.php?delete_id='+id;
		}
	}

</script>