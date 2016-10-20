<div class="content">
	<table class="content-header"><tr>
		<td class="content-left">
			<div class="content-title">ახალი თემის დამატება</div>
		</td>
		</tr></table>
	
	<?php
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
		$views = mysqli_real_escape_string($db, '0');

		if ($cat == 'ჰერეთის სახლი') {
			$tag = 'ჰერეთის-სახლი';
		} elseif ($cat == 'ჰერეთის ბიბლიოთეკა') {
			$tag = 'ჰერეთის-ბიბლიოთეკა';
		} elseif ($cat == 'ჰერეთის არქივი') {
			$tag = 'ჰერეთის-ბიბლიოთეკა';
		} elseif ($cat == 'ჰერულა') {
			$tag = 'ანსამბლი-ჰერულა';
		} else {
			
		}
		
		// email check
		$sql="SELECT title FROM h_content WHERE title='$title'";
		$result=mysqli_query($db,$sql);
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

		if(mysqli_num_rows($result) > 0)
		{
			$msg = "<div class='alert alert-warning'>მსგავსი თემა უკვე არსებობს.</div>";
		}
		else
		{
			$query = mysqli_query($db, "INSERT INTO h_content (title,text,tag,cat,status,views,author,date,last_update)VALUES ('$title','$text','$tag','$cat','$status','$views','$author',NOW(),NOW())");
			if($query)
			{
				$msg = "<div class='alert alert-success'>თემა დაემატა.</div>";
			}
			else {
				$msg = "<div class='alert alert-danger'>თემა ვერ დაემატა.</div>";
			}

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
				<input name="title"  id="title" type="text" class="form-control" size="25" required /> 
			</div>
			
			
			<div class="form-group" style="width: 100%;">
				<textarea class="form-control" name="text" style="height:300px;width:100%;" id="text" > </textarea>
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
			

			<input id="submit" type="submit" name="submit" value="თემის დამატება" class="submit btn btn-primary" /> 

		</form>

</div>