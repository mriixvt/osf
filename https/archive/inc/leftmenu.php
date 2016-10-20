<content>
	<div class="content-wrap">
		<table class="content-table">
			<tr>
				<td class="content-menu">
					<table class="menu-header">
						<tr>
							<div class="forum-header">
								ახალი გამოქვეყნებული
							</div>
						</tr>
					
						<tr >
							<td>	თემები	</td>
						</tr>
						</table>
					<table>
						<tr>
							<?php 
							$sql = "SELECT * FROM a_topics WHERE cats_fk='2' AND status='show'";
							$result = $db->query($sql);
							$total = $result->num_rows;
							if (!$result) {
								echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
								exit;
							}
								while ($row = $result->fetch_assoc()) { ?>
							
							<div class="menu">
								<li>
									<x class="menu-title">
										<a href="v.php?cat=<?php echo $row['cats_fk']."&pid=".$row['pid']; ?>">
											<?php echo $row['title']; ?>
										</a>
									</x>
								</li>
								<x class="menu-date">
									<li>
										<a href="#"><?php echo $row['date']; ?>
										</a>
									</li>
								</x>
							</div>
								
								<?php } ?>
						</tr>
					</table>
					<table class="menu-header2">
						<tr>
							<td>	გვერდები	</td>
						</tr>
					</table>
					<table>
						<tr>
							<?php 
							$sql = "SELECT T.*, V.page FROM a_topics T, a_topics_v V WHERE V.status='show' ORDER BY V.id DESC LIMIT 10";
							$result = $db->query($sql);
							$total = $result->num_rows;
							if (!$result) {
								echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
								exit;
							}

							while ($row = $result->fetch_assoc()) { ?>

							<div class="menu">
								<li>
									<a href="#">
										<x class="menu-page">
											<?php echo $row['page']; ?>
										</x> 
										<i class="fa fa-arrow-right" aria-hidden="true"></i> 
										<x class="menu-title">
										<?php echo $row['title']; ?> 
										</x>
									</a>
								</li>
								<x class="menu-date"><li><a href="#"><?php echo $row['date']; ?></a></li></x>
							</div>
						

							<?php } ?>
						</tr>
					</table>
				</td>