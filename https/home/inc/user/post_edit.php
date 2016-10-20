<div class="content">
	<table class="content-header"><tr>
		<td class="content-left">
			<div class="content-title">რედაქტირება</div>
		</td>
		</tr></table>

<?php 
	
	$p = $_GET['p'];
	$sql2 = "SELECT * FROM h_content WHERE id='$p'";
	$result2 = $db->query($sql2);
	if (!$result2) {
		echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
		exit;
	}
	$row2 = $result2->fetch_assoc();
	
	$msg = "";
	if(isset($_POST["submit"]))
	{ 
		$title = $_POST["title"];
		$text = $_POST["text"];
		$cat = $_POST["cat"];
		$status = $_POST["status"];

		$title = mysqli_real_escape_string($db, $title);
		$text = mysqli_real_escape_string($db, $text);
		$tag = mysqli_real_escape_string($db, $tag);
		$cat = mysqli_real_escape_string($db, $cat);
		$status = mysqli_real_escape_string($db, $status);
		$author = mysqli_real_escape_string($db, $user);

		if ($cat == 'ჰერეთის სახლი') {
			$tag = 'ჰერეთის-სახლი';
		} elseif ($cat == 'ბიბლიოთეკა') {
			$tag = 'ჰერეთის-ბიბლიოთეკა';
		} elseif ($cat == 'არქივი') {
			$tag = 'ჰერეთის-არქივი';
		} elseif ($cat == 'ჰერულა') {
			$tag = 'ანსამბლი-ჰერულა';
		} else {

		}

		
		$query = mysqli_query($db, "UPDATE h_content SET title='$title',text='$text',tag='$tag',cat='$cat',status='$status',author='$author',last_update = NOW() WHERE id='$p'");
			if($query)
			{
				$msg = "<div class='alert alert-success'>თემა წარმატებით დარედაქტირდა</div>";
			}
			else {
				$msg = "<div class='alert alert-danger'>თემა ვერ დარედაქტირდა</div>";
			}

		
	}
?>

	<form method="post" action="">


		<?php echo $msg; ?>
		
		<div class="form-group user-upload">
			<a href="upload.php" class="btn  btn-primary" data-toggle="modal" data-target="#myModal">ატვირთვა</a>
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Content will be loaded here from "remote.php" file -->
					</div>
				</div>
			</div>
		</div>
		
		<div class="form-group" style="width: 400px">
			<label for="title">სათაური</label>
			<input name="title" value="<?php echo $row2['title'] ?>"  id="title" type="text" class="form-control" size="25" required /> 
		</div>

		<div class="form-group" style="width: 100%;">
			<textarea class="form-control" name="text" style="height:800px;width:100%;" id="text" > 
				<?php echo $row2['text'] ?>
			</textarea>
		</div>

		<div class="form-group" style="width: 300px;">
			<label for="status">კატეგორია</label>
			<select class="form-control selectpicker show-menu-arrow" name="cat" id="cat">
				<?php
					$sql3 = "SELECT * FROM h_lm";
					$result3 = $db->query($sql3);
					   if (!$result3) {
						   echo '<div class="content">Could not run query: ' . mysql_error().'</div>';
						   exit;
					   }
					   while ($row3 = $result3->fetch_assoc()){
				?>
				<option><?php echo $row3['name']; ?></option>
				<?php } ?>
			</select>
		</div> 

		<div class="form-group" style="width: 100px;">
			<label for="status">სტატუსი</label>
			<select class="form-control selectpicker show-menu-arrow" name="status" id="status">
				<option data-icon="fa-eye-slash">hide</option>
				<option data-icon="fa-eye" >show</option>
			</select>
		</div>


		<input id="submit" type="submit" name="submit" value="რედაქტირება" class="submit" /> 

	</form>

</div>