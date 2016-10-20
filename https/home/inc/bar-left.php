<td class="left-bar">
	<div class="hr-1"></div>
	<div class="left-bar-1">
		<?php 

		$sql = "SELECT * FROM h_lm";
		$result = $db->query($sql);

		if ($result->num_rows > 0) 
		{
			while($row = $result->fetch_assoc()) 
			{
				print '<a href="index.php?s='.$row['s'].'"><li><i class="fa '.$row['icon'].'" aria-hidden="true"></i>'.$row['name'].'</li></a>';
			}
		}
		?>
	</div>

	<div class="news">



	</div>
</td>