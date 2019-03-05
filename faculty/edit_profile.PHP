<?php 
$table="faculty_tbl";
$pk="fid";
$nm="Update Profile";
$name="Edit Profile";
		if(isset($_REQUEST['sbtn']))
		{
            include("DatabaseFiles/cn.php");
			$img_path1=$kfile=$err="";
			if(isset($_SESSION["fid"]))
			{
				if(!empty($_FILES["file1"]["name"]))
					 {
						$fileName = date("YsmHis")."_".$_FILES["file1"]["name"];
						$hidden  = $fileName;
						$myextension= strtolower(strrchr($fileName,"."));
						if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png")
						{
							if ($_FILES["file1"]["error"] > 0)
							{
								$err=$_FILES["file1"]["error"] . "<br />";
							}
							else
							{
									if($_REQUEST["himg"]!= "")
									{
										unlink("uploadimage/".$_REQUEST["himg"]);
									}
									move_uploaded_file($_FILES["file1"]["tmp_name"], "uploadimage/" . $fileName);
									$img_path1=$fileName;
							}
						}
						else
						{
							$err="Please upload image file...";

						}
					 }

					 else
					 {
						 $img_path1=$_REQUEST["himg"];
					 }
				

					 if($err == "")
					 {
				
				$col=array('fname','lname','photo');
				$val=array($_REQUEST['fname'], $_REQUEST['lname'],$img_path1);
				$db->update($table,$pk,$_SESSION["fid"], $col, $val);
				echo "<script>location.href='edit_profile.php?success'</script>";
					}
            }

			}
include("page_content/frmheader.php");	
	if(isset($_SESSION["fid"]))	{
        $r=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$_SESSION["fid"]));
        $fname=$r->fname;
		$lname=$r->lname;
        $file1=$r->photo;
	}else{
		$fname= "";
		$lname= "";
        $file1= "";
	}

?>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" enctype="multipart/form-data" id="form1">
                    <center>
                    <div class="form-group">
						<div class="input-group">
							 <img src="uploadimage/<?= $file1;?>" width="150" height="150" style="box-shadow:0px 2px 20px black;" alt="Avatar" class="profile-photo animation-expandUp img-circle">
						</div>
					</div>
                    </center>
					<div class="form-group" >
						<div class="input-group">
                            <span class="input-group-addon"><b>First Name</b></span>
							<input type="text" value="<?= $fname; ?>" id="example-username" name="fname" class="form-control" placeholder="First Name" data-bvalidator="alpha,required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>Last Name</b></span>
							<input type="text" value="<?= $lname; ?>" id="example-password" name="lname" class="form-control" placeholder="Last Name" data-bvalidator="alpha,required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>Photo</b></span>
							<input type="file" id="example-email"  name="file1" class="form-control" placeholder="Photo">
							<input name="himg" type="hidden" value="<?= $file1; ?>">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="submit" style="width:390px;" name="sbtn" class="btn btn-default form-control" value="Submit" >
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include("page_content/frmfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Profile Updated Successfully!','success');});</script>";
}
?>