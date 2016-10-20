
				
				<td class="forum">
					<?php 
					$set = "ბიბლიოთეკა";
					$sql = "SELECT * FROM a_cats WHERE s='$set'";
					$result = $db->query($sql);
					$total = $result->num_rows;
					
					if ($total > 0) {
					?>
					<table class="forum-wrap">
						<tr>
							<div class="forum-header">
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> ბიბლიოთეკა
							</div>
						</tr>
						<tr class="forum-set">
							<td style="border-left: 0;">	#	</td>
							<td style="text-align: left; padding-left: 10px; "> კატეგორიები</td>
							<td>	თემები	</td>
							<td>	გვერდები	</td>
							<td>	ინფორმაცია	</td>
						</tr>
						
						<?php 
						$set = "ბიბლიოთეკა";
						$sql = "SELECT * FROM a_cats WHERE s='$set' AND status='show' ORDER BY `cat`";
						$result = $db->query($sql);
						//
						
						
							
							while ($row = $result->fetch_assoc()) {
						?>
						<tr class="topic">
							<td class="topic-logo"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></td>
							<td class="topic-content">
								<li class="topic-title"><a href="topic.php?cat=<?php echo $row['cat'] ?>"> <?php echo $row['title']; ?></a></li>
								<?php if (!empty($row['description'])) { ?>
								<li class="topic-description"><i class="fa fa-caret-right" aria-hidden="true"></i><?php echo $row['description']; ?></li>
								<?php } ?>
							</td>
							<td class="topic-info-1"><?php echo $row['topics_sum']; ?></td>
							<td class="topic-info-2">0</td>
							<td class="topic-info-3">
								<li><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row['catupdate'].", ".$row['catuptime']; ?></li>
							</td>
						</tr>
						
						<?php } ?>
						
					</table>
					<?php } 
					$set = "არქივი";
					$sql = "SELECT * FROM a_cats WHERE s='$set'";
					$result = $db->query($sql);
					$total = $result->num_rows;

					if ($total > 0) {
					?>
					<table class="forum-wrap">
						<tr>
							<div class="forum-header">
								<i class="fa fa-angle-double-right" aria-hidden="true"></i> არქივი
							</div>
						</tr>

						<tr class="forum-set">
							<td style="border-left: 0;">	#	</td>
							<td style="text-align: left; padding-left: 10px;"> კატეგორიები</td>
							<td>	თემები	</td>
							<td>	გვერდები	</td>
							<td>	ინფორმაცია	</td>
						</tr>
						
						<tr class="topic">
							<td class="topic-logo"><i class="fa fa-circle-o-notch" aria-hidden="true"></i></td>
							<td class="topic-content">2</td>
							<td class="topic-info-1">2</td>
							<td class="topic-info-2">2</td>
							<td class="topic-info-3">2</td>
						</tr>
					</table>
					<?php } ?>
				</td>
				
			</tr>
		</table>
	</div>
</content>