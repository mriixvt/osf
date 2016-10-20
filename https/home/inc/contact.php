
	
	<?php
	if (isset($_GET['s'])) {
		$tag = $_GET['s'];
		$sql = "SELECT * FROM h_content WHERE tag='$tag' ";
		$result = $db->query($sql);
		
		if ($tag == 'კონტაქტი') {
		while ($row = $result->fetch_assoc()) {
	?>

	<div class="content">

		<table class="content-header"><tr>
			<td class="content-left">
				<div class="content-title"><?php echo $row['title']; ?></div>
			</td>
			</tr>
		</table>
		
		
		<div class="alert alert-warning">
			<strong>გვერდი დამუშავების პროცესშია.</strong> მოგვწერეთ: <a href="#">info@herula.ge</a>
		</div>
		
		
		</div>
<?php } // WHILE 
		} // IF
	
		else {
			echo '';
		}
		
	} 
?>
