<header class="header-bar">
	<div class="top-wrap">
		<table class="header-bar-table">
			<tr>
				<td class="header-bar-left">
					<div class="header-bar-time">
						<i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("d.m.Y H:i:s"); ?>
						
					</div>
				</td>
				<td class="header-bar-right">
					<div class="header-bar-auth">
						
						<?php 
						$login_path=$_SESSION['login_user'];
						$login_session=$_SESSION['login_user'];
						$user = $_SESSION['login_user'];

						if (empty($login_session)) {

						?>
						<a href="auth.php" class="header-bar-login"><li><i class="fa fa-sign-in" aria-hidden="true"></i> ავტორიზაცია </li></a>
						

						<?php } else { 

							$sql = "SELECT * FROM a_users WHERE username='$login_session'";

							if ($result = $db->query($sql)) {
								$row = $result->fetch_assoc();

								if ($row['status'] == '1') {
						?>

						<a href="#" class="header-bar-cpanel"><li class="cpanel-button"><i class="fa fa-user-secret" aria-hidden="true"></i> cPanel</li></a>
						<a href="#" class="header-bar-login"><li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_session; ?></li></a>
						<a href='logout.php'><li><i class="fa fa-sign-out" aria-hidden="true"></i> გასვლა</li></a>

						<?php }else { ?>
						<a href="#" class="header-bar-login"><li><i class="fa fa-user" aria-hidden="true"></i> <?php echo $login_session; ?></li></a>
						<a href='logout.php'><li><i class="fa fa-sign-out" aria-hidden="true"></i> გასვლა</li></a>
						<?php }}} ?>
						
						
						
						<a href="#REGISTRATION" class="header-bar-reg sr-only"><li>რეგისტრაცია</li></a>
						<i class="fa fa-tripadvisor" aria-hidden="true" style="margin-left: 10px; font-size: 20px;"></i>
						
					</div>
				</td>
			</tr>
		</table>
	</div>
</header>
<header>
		<div class="top-wrap">
			<table class="top-table">
				<tr>
					<td class="top-left">
						<div class="top-title">
							<a href="<?php echo WEBSITE_URL; ?>">
								<?php echo WEBSITE_TITLE; ?>
							</a>
						</div>
					</td>
					<td class="top-right">
						<!-- BLANK  -->
					</td>
				</tr>
				<td class="top-left-menu">
					
					<ul>
						<a href="<?php echo WEBSITE_URL; ?>"><li>მთავარი</li></a>
						<a href="#CONTACT"><li>კონტაქტი</li></a>
					</ul>
				</td>
			</table>
		</div>
</header>







