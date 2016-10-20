<td class="left-bar">
	
<div class="user-left-bar-1">
	<div class="hr-1"></div>
		<x><?php echo $_SESSION['name']." ".$_SESSION['lastname']; ?></x>
		<?php 

		$sql = "SELECT * FROM h_user_lm ORDER BY `id`";
		$result = $db->query($sql);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				print '<a href="';
					if (!empty($row['url'])) {
						echo $row['url'];
					} else {
						echo 'user.php?u='.$row['u'];
					}
				print	'"><li><i class="fa '.$row['icon'].'" aria-hidden="true"></i>'.$row['name'].'</li></a>';
			}
		}
		?>
		
	<x>ჰერეთის სახლი</x>
	<?php 

	$sql = "SELECT * FROM h_user_lmh WHERE status='show' ORDER BY `id` ";
	$result = $db->query($sql);

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc()) 
		{
			print '<a href="user.php?h='.$row['h'].'"><li><i class="fa '.$row['icon'].'" aria-hidden="true"></i>'.$row['name'].'</li></a>';
		}
	}
	?>
				
	<div class="hr-2"></div>
</div>
