<?php include("DatabaseFiles/cn.php");
if(isset($_REQUEST['sbtn'])) {

if(!empty($_FILES["file1"]["name"])) {

						$fileName = date("YmdHis")."_".$_FILES["file1"]["name"];
						$hidden  = $fileName;
						$myextension= strtolower(strrchr($fileName,"."));
						if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png") {
								if ($_FILES["file1"]["error"] > 0) {
								       $err=$_FILES["file1"]["error"] . "<br />";
									}
								else
									{
										/*if($_REQUEST["himg"]!= "") {
											unlink("uploadimage/".$_REQUEST["himg"]);
										}*/
									move_uploaded_file($_FILES["file1"]["tmp_name"], "uploadimage/" . $fileName);
									$img_path1=$fileName;
									echo $img_path1;
								}
							}
						else
							{
								$err="Please upload image file...";
								echo $err;
							}
					 	}
					 }
?>
<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" enctype="multipart/form-data" id="form1" action="">
					
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-envelope"></i></span>
							<input type="file" id="example-email" name="file1" class="form-control" placeholder="Photo" data-bvalidator="required">
						</div>
					</div>
					</div>
						<input type="hidden" value="<?= $id ?>" name="h2" placeholder="Last Name">
					<div class="form-group">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				</form>
			</div>
		</div>
	</div>