<?php require_once "config.php";



if($_SERVER["REQUEST_METHOD"] == "POST")
{
	// username and password received from loginform 
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$password=mysqli_real_escape_string($db,$_POST['password']);
	// $password=md5($password);

	$sql_query="SELECT * FROM a_users WHERE username='$username' and password='$password'";
	$result=mysqli_query($db,$sql_query);
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$count=mysqli_num_rows($result);



	// If result matched $username and $password, table row must be 1 row
	if($count==1)
	{    
		$_SESSION['login_user'] = $username;
		$_SESSION['uid'] = $row['uid'];
		$_SESSION['name'] = $row['name'];
		$_SESSION['lastname'] = $row['lastname'];

		header("location: index.php");
	}
	else
	{
		$error="სახელი ან პაროლი არასწორია <br><br>";
	}
}

// At the top of the page check to see whether the user is logged in or not
if($_SESSION['login_user'])
{
	// If they are not, redirect them to the login page.
	header("Location: index.php");

	// Remember that this die statement is absolutely critical.  Without it,
	// people can view your members-only content without logging in.

}
?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once "inc/links.php"; ?>
		<title>Login Form</title>
		<style>
			body {
				font-family: Montserrat;
			}

			.wrap {
				width: 100%;

			}

			.login-block {
				width: 320px;
				padding: 20px;
				background: #fff;
				border-radius: 5px;
				border-top: 5px solid #22527b;
				margin: 0 auto;
				margin-top: 140px;
			}

			.login-block h1 {
				text-align: center;
				font-size: 18px;
				text-transform: uppercase;
				margin-top: 0;
				margin-bottom: 20px;
			}

			.login-block input {
				width: 100%;
				height: 42px;
				box-sizing: border-box;
				border-radius: 5px;
				border: 1px solid #ccc;
				margin-bottom: 20px;
				font-size: 14px;
				font-family: Montserrat;
				padding: 0 20px 0 50px;
				outline: none;
				position: relative;
			}

			.login-block input#username:focus {
				background: #fff url('img/login_u.png') 20px bottom no-repeat;
				background-size: 16px 80px;
			}

			.login-block input#password {
				background: #fff url('img/login_p.png') 20px top no-repeat;
				background-size: 16px 80px;
			}

			.login-block input#password:focus {
				background: #fff url('img/login_p.png') 20px bottom no-repeat;
				background-size: 16px 80px;
			}

			.login-block input:active, .login-block input:focus {
				border: 1px solid #22527b;
			}

			.login-block button {
				width: 100%;
				height: 40px;
				background: #173753;
				box-sizing: border-box;
				border-radius: 5px;
				border: 1px solid #173753;
				color: #fff;
				font-weight: bold;
				text-transform: uppercase;
				font-size: 14px;
				font-family: Montserrat;
				outline: none;
				cursor: pointer;
			}

			.login-block button:hover {
				background: #22527b;
			}

			.login-block a#reg {
				text-decoration: none;
				line-height: 40px;
				text-align: center;
				width: 100%;
				height: 40px;
				background: #ff656c;
				box-sizing: border-box;
				border-radius: 5px;
				border: 1px solid #e15960;
				color: #fff;
				font-weight: bold;
				text-transform: uppercase;
				font-size: 14px;
				font-family: Montserrat;
				outline: none;
				cursor: pointer;
				display: block;
			}
			.login-block a#reg:hover  {
				background: #ff7b81;
			}
		</style>
	</head>

	<body class="wrap">

		<div class="login-block">
			<h1>ჰერეთის ბიბლიოთეკა</h1>
			<?php echo $error;  ?>
			<form method="post" action="" name="loginform">
				<input type="text" value="" placeholder="სახელი" id="username" name="username" />
				<input type="password" value="" placeholder="პაროლი" id="password" name="password" />
				<button type="submit">ავტორიზაცია</button>
			</form>
			<br>
		</div>
	</body>

</html>