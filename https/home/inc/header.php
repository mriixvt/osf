<header>
	<div class="top-wrap">
		<table>
			<tr>
				<td class="top-left">

					<div class="title">
						<a href="index.php"> ჰერეთის სახლი </a>
					</div>


					<div class="header-menu">
						<li><a href="index.php">მთავარი</a></li>
						<?php 

						$sql = "SELECT * FROM h_tm";
						$result = $db->query($sql);

						if ($result->num_rows > 0) 
						{
							while($row = $result->fetch_assoc()) 
							{
								print ' <li><a href="index.php?s='.$row['s'].'">'.$row['name'].'</a></li>';
							}
						}
						?>
					
					<div class="header-menu-2">
					
					<?php 
						$login_path=$_SESSION['login_user'];
						$login_session=$_SESSION['login_user'];
						$user = $_SESSION['login_user'];
						
						if (empty($login_session)) {
						
					?>
						
						<li><a href="auth.php"><i class="fa fa-sign-in" aria-hidden="true"></i> ავტორიზაცია</a></li>
						
					<?php } else { 
						
							$sql = "SELECT * FROM users WHERE username='$login_session'";

							if ($result = $db->query($sql)) {
								$row = $result->fetch_assoc();
				
								if ($row['status'] == '1') {
						?>
						
						<li class="cpanel-button"><a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i> cPanel</a></li>
						<li class="auth"><a href="user.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_session; ?></a></li>
						<li class="logout"><a href='logout.php'><i class="fa fa-sign-out" aria-hidden="true"></i> გასვლა</a></li>
						
						<?php }else { ?>
						<li class="auth"><a href="user.php"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_session; ?></a></li>
						<li class="logout"><a href='logout.php'><i class="fa fa-sign-out" aria-hidden="true"></i> გასვლა</a></li>
						<?php }}} ?>
					
					
					</div>
					
					</div>

				</td>
				
				
			</tr>
		</table>
	</div>
</header>