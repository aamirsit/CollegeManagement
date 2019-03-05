<?php include("DatabaseFiles/cn.php");
$table="faculty_tbl";
$pk="fid";
$nm="faculty";
$n="4";
		
		if(isset($_REQUEST['sbtn'])) {

			$img_path1=$kfile=$err="";
			//echo $_FILES["file1"]["error"]."_fsdfsdf";exit;
			if($_REQUEST['h2']!="")	{

				if(!empty($_FILES["file1"]["name"])) {

						$fileName = date("YsmHis")."_".$_FILES["file1"]["name"];
						$hidden  = $fileName;
						$myextension= strtolower(strrchr($fileName,"."));
						if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png") {
								if ($_FILES["file1"]["error"] > 0) {
								       $err=$_FILES["file1"]["error"] . "<br />";
									}
								else
									{
										if($_REQUEST["himg"]!= "") {
											unlink("../faculty/uploadimage/".$_REQUEST["himg"]);
										}
									move_uploaded_file($_FILES["file1"]["tmp_name"], "../faculty/uploadimage/" . $fileName);
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
				
				$col=array('fname','lname','dob','gender','doj','photo');
				$val=array($_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['dob'],$_REQUEST['gender'],$_REQUEST['doj'],$img_path1);
				$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
				echo "<script>location.href='".$nm."_list.php?success'</script>";
					}
					else
					{
						echo "<script>alert('".$err."');</script>";
					}
			}
			else
			{
			  if(!empty($_FILES["file1"]["name"]))
					{

						$fileName = date("YsmHis")."_".$_FILES["file1"]["name"];
						$extension= strtolower(strrchr($fileName,"."));

						if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" || $extension == ".bmp" || $extension == ".png")
						{
							if ($_FILES["file1"]["error"] > 0)
							{
								$err=$_FILES["file1"]["error"] . "<br />";
							}
							else
							{

									move_uploaded_file($_FILES["file1"]["tmp_name"], "../faculty/uploadimage/" . $fileName);
									$img_path1=$fileName;

							}
						}
						else
						{
							$err .="Please upload image file...";

						}

              }
              else
              {
                  $img_path1=$_REQUEST["himg"];
              }
					//echo $err."---".$img_path1;
					if($err == "")
					{
						if($_REQUEST["sem"]==""){

							$col=array($pk,'fname','lname','dob','gender','doj','photo');
							$val=array(null,$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['dob'],$_REQUEST['gender'],$_REQUEST['doj'],$img_path1);
							$db->insert($table, $col, $val);

							$id=mysql_insert_id();
							$col=array('lid','username','password','usertype','fid');
							$val=array(null, $_REQUEST['username'],$_REQUEST['password'], "Faculty", $id);
							$db->insert('login_tbl', $col, $val);

						}else{

							$col=array($pk,'fname','lname','dob','gender','doj','photo');
							$val=array(null,$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['dob'],$_REQUEST['gender'],$_REQUEST['doj'],$img_path1);
							$db->insert($table, $col, $val);
							
								$id=mysql_insert_id();
								$col=array('lid','username','password','usertype','fid');
								$val=array(null, $_REQUEST['username'],$_REQUEST['password'], "Faculty", $id);
								$db->insert('login_tbl', $col, $val);

								$year = $_SESSION["year"]; 				
								$col=array('fsid','year','sem','fid');
								$val=array(null, $year,$_REQUEST['sem'], $id);
								$db->insert('faculty_sem_tbl', $col, $val);

						}		
				echo "<script>location.href='".$nm."_form.php?success'</script>";
				}
				else
				{
						echo "<script>alert('Error');</script>";
				}
				   } 
                    



			
		}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{?>
	<style type="text/css">
		.pass,.use,.sem{
			display: none;
		}
	</style>

	<?php $r=mysql_fetch_object(mysql_query("select * from $table where $pk='".$_REQUEST["eid"]."'"));
      	$fname=$r->fname;
		$lname=$r->lname;
		$dob=$r->dob;
		$gender=$r->gender;
        $doj=$r->doj;
        $file1=$r->photo;
        $username="";
        $password="";
        $id=$r->$pk;
	}else{
		$fname= "";
		$lname= "";
		$dob= "";
		$gender= "";
        $doj= "";
        $sem= "";
        $file1= "";
        $username="";
        $password="";
        $id= "";
	}

?>
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" enctype="multipart/form-data" id="form1" action="">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 28px;">Firstname </span>
							<input type="text" value="<?= $fname; ?>" id="example-username" name="fname" class="form-control" placeholder="First Name" data-bvalidator="alpha,required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 31px;">Lastname </span>
							<input type="text" value="<?= $lname; ?>" id="example-password" name="lname" class="form-control" placeholder="Last Name" data-bvalidator="alpha,required">
						</div>
					</div>
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Date of birth </span>
							<input type="text" id="example-datepicker2" name="dob" class="form-control input-datepicker" value="<?= $dob; ?>" data-date-format="yyyy-mm-dd" placeholder="YYYY/MM/DD" data-bvalidator="date[yyyy-mm-dd],required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 48px;">Gender </span>
							<select class="form-control" name="gender">
								<option value="Male" <?php if(isset($_REQUEST["eid"])&&$r->gender=="male"){echo "Selected";}?>>Male</option>
								<option value="Female" <?php if(isset($_REQUEST["eid"])&&$r->gender=="Female"){echo "Selected";}?> >Female</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 22px;">Date of Join </span>
							<input type="text" id="example-datepicker2" name="doj" class="form-control input-datepicker" value="<?= $doj; ?>" data-date-format="yyyy-mm-dd" placeholder="YYYY/MM/DD" data-bvalidator="date[yyyy-mm-dd],required">
						</div>
					</div>
                    <div class="form-group sem">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 35px;">Semester </span>
							<input type="Text" value="<?= $sem; ?>" id="example-email" name="sem" class="form-control" placeholder="Semister Incharge">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 63px;">Avtar </span>
							<input type="file" id="example-email" name="file1" class="form-control" placeholder="Photo" data-bvalidator="required">
							<input name="himg" type="hidden" value="<?= $file1; ?>">
						</div>
					</div>
					<div class="form-group use">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 28px;">Username</span>
							<input type="Text" value="<?= $username; ?>" id="example-email" name="username" class="form-control" placeholder="Username" data-bvalidator="alphanum,minlength[8],required">
						</div>
					</div>
					<div class="form-group pass">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 30px;">Password</span>
							<input type="password" value="<?= $password; ?>" id="example-email" name="password" class="form-control" placeholder="Password" data-bvalidator="alphanum,minlength[8],required">
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
</div>
<?php include("page_content/frmfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Faculty Added Successfully!','success');});</script>";
}
?>