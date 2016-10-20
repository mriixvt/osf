<script>
	function scrollTo(hash) {
		location.hash = "#" + hash;
	}
</script>
<td class="forum">
	<?php if(isset($_GET['cat']) AND isset($_GET['pid'])) { 
	$cat = $_GET['cat'];
	$pid = $_GET['pid'];
	// CAT_FK 1
	$sql = "SELECT T.* FROM a_topics T, a_cats C WHERE C.cat='$cat' AND T.cats_fk='$cat'";
	$result = $db->query($sql);
	$row = $result->fetch_assoc();
	// CAT_FK 2
	$sql2 = "SELECT T.* FROM a_topics T, a_cats C WHERE C.cat='$cat' AND T.cats_fk2='$cat'";
	$result2 = $db->query($sql2);
	$row2 = $result2->fetch_assoc();
	// CATS
	$set = "ბიბლიოთეკა";
	$sql_cat = "SELECT * FROM a_cats WHERE s='$set' AND cat='$cat'";
	$result_cat = $db->query($sql_cat);
	$row_cat = $result_cat->fetch_assoc();
	?>
	<table class="forum-wrap">
		
		<tr>
			<div class="forum-header">
				<i class="fa fa-angle-double-right" aria-hidden="true"></i> 
				<?php echo '<a href="topic.php?cat='.$row_cat['cat'].'">'.$row_cat['title'].'</a> <i class="fa fa-angle-double-right" aria-hidden="true"></i> '.$row['title'].$row2['title']; ?>
			</div>
		</tr>
		<tr class="view-content-header">
			
			
			
			
		</tr>
		<?php 
	$sql3 = "SELECT V.* FROM a_topics T, a_topics_v V, a_cats C WHERE (T.cats_fk='$cat' AND V.title='$pid') AND (C.cat='$cat' AND T.pid='$pid')";
			$result3 = $db->query($sql3);
			$view = 1;
			mysqli_query($db, "UPDATE a_topics SET view = view + $view WHERE pid='$pid'");
			while ($row3 = $result3->fetch_assoc()) {
		?>
		<tr class="view">
			
			<div class="view-content" id="p<?php echo $row3['id']; ?>">
				<div class="view-name">
					<?php echo $row['title']; ?>
				</div>
				<div class="view-title">
					<?php echo $row3['title2']; ?>
				</div>
				
				
				<?php echo str_repeat('&nbsp;', 5); echo $row3['text']; ?>
				
				
				<div class="view-scholium">
					<div class="scholium-hr">
						<div class="scholium-hr3"></div>
						<div class="scholium-hr2">
							სქოლიო
						</div>
						<div class="scholium-hr4"></div>
					</div>
					<?php echo $row3['scholium']; ?>
				</div>
				
				<div class="view-page">
					<n><?php echo $row3['page']; ?></n>
				</div>				
			</div>
			<div class="view-hr"></div>
		</tr>
		<?php } ?>
		
		<?php 
	$sql4 = "SELECT V.* FROM a_topics T, a_topics_v V, a_cats C WHERE  (T.cats_fk2='$cat' AND V.title='$pid') AND (C.cat='$cat' AND T.pid='$pid')";
	$result4 = $db->query($sql4);
	while ($row4 = $result4->fetch_assoc()) {
		?>
		
		
		
			<tr class="insert">
			
				<td class="insert-logo">
					<i class="fa fa-pencil-square" aria-hidden="true"></i>
				</td>
			<td class="insert-rows">
				<a href="v.php?<?php echo $_SERVER['QUERY_STRING']."&id=".$row4['id'] ?>">
					<?php echo "გვერდი: ".$row4['page']." - "; ?>

					<?php 
						if (empty($row4['title2'])){
							echo "***";
						}else {
							echo $row4['title2'];
						}
					?>
				</a></td>
				<td class="insert-author"><?php echo $row4['author']; ?></td>
				<td class="insert-date">
					<li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row4['date']; ?></li>
				</td>
			
		</tr>
		
		<?php } ?>
		
</table> <!-- FORUM WRAP -->
	
	<?php  } else {
		header("Location: index.php");
		die("Redirecting to index.php");
	} ?>
	
	
</td>

</tr>
</table>
</div>
</content>