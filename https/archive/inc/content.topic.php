

				<td class="forum">
					<?php 
					if(isset($_GET['cat'])) {
					$set = "ბიბლიოთეკა";
					$cat = $_GET['cat'];
					$sql = "SELECT * FROM a_cats WHERE s='$set' AND cat='$cat'";
					$result = $db->query($sql);
					$total = $result->num_rows;
					$row = $result->fetch_assoc();

					if ($total > 0) {
					?>
					<table class="forum-wrap">
						<tr>
							<div class="forum-header">
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> <?php echo $row['title']; ?>
							</div>
						</tr>
						<tr class="forum-set">
							<td style="border-left: 0;">	#	</td>
							<td style="text-align: left; padding-left: 10px; "> თემები</td>
							<td>	ნახვა	</td>
							<td>	გვერდები	</td>
							<td>	ინფორმაცია	</td>
						</tr>

						<?php 
						$cat = $_GET['cat'];
						$sql = "SELECT T.* FROM a_topics T, a_cats C  WHERE (T.status='show' AND C.cat='$cat') AND (T.cats_fk='$cat' OR T.cats_fk2='$cat')";
						$result = $db->query($sql);
						$total = $result->num_rows;
						if (!$result) {
							echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
							exit;
						}
						if ($total > 0) {
						while ($row = $result->fetch_assoc()) {
						?>
						<tr class="topic">
							<td class="topic-logo"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></td>
							<td class="topic-content">
								<li class="topic-title"><a href="v.php?<?php echo $_SERVER['QUERY_STRING']."&pid=".$row['pid'] ?>"> <?php echo $row['title']; ?></a></li>
								<?php if (!empty($row['description'])) { ?>
								<li class="topic-description"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $row['description']; ?></li>
								<?php } ?>
							</td>
							<td class="topic-info-1"><?php echo $row['view']; ?></td>
							<td class="topic-info-2">0</td>
							<td class="topic-info-3">
								<li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row['topicupdate'].", ".$row['topicuptime']; ?></li>
							</td>
						</tr>

						<?php } } else { echo "REDIRECT IN NULL POST WARNING PAGE"; } ?>

					</table>
					<?php } } else {
						header("Location: index.php");
						die("Redirecting to index.php");
					} ?>
				</td>

			</tr>
		</table>
	</div>
</content>