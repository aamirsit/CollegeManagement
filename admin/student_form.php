<?php include("DatabaseFiles/cn.php");
$table="student_tbl";
$pk="studid";
$nm="student";
$n="5";
if(isset($_REQUEST['sbtn']))
{       $y=mysql_fetch_object(mysql_query("select * from year_tbl order by yid DESC LIMIT 1"));
        $year=$y->year;
		if($_REQUEST["h2"]==""){

			mysql_query("INSERT INTO `student_tbl` (`studid`,`rollno`,`fname`,`lname`,`admissionyear`,`enrollid`) VALUES ('NULL','".$_REQUEST['rollno']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['admissionyear']."','".$_REQUEST['enrollid']."')");
            $id1 = mysql_insert_id();
            
            $col=array('smid','studid','year','sem');
            $val=array(null,$id1,$year,$_REQUEST["sem"]);
            $db->insert('student_sem_tbl',$col, $val);
			echo "<script>location.href='".$nm."_form.php?success'</script>";

		}else if(isset($_REQUEST["eeid"])){
            $col=array('rollno','fname','lname','gender','dob','admissionyear','enrollid','username','password');
			$val=array( $_REQUEST['rollno'],$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST["gender"],$_REQUEST["dob"],$_REQUEST['admissionyear'],$_REQUEST['enrollid'],$_REQUEST["username"],$_REQUEST["password"]);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='canceled_stud.php?success'</script>";
        }
        else if(isset($_REQUEST["apid"])){
            $col=array('rollno','fname','lname','gender','dob','admissionyear','enrollid','username','password');
			$val=array( $_REQUEST['rollno'],$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST["gender"],$_REQUEST["dob"],$_REQUEST['admissionyear'],$_REQUEST['enrollid'],$_REQUEST["username"],$_REQUEST["password"]);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='approved_stud.php?success'</script>";
        } 
        else if(isset($_REQUEST["eid"]) && (isset($_REQUEST["det"]) || isset($_REQUEST["lea"])))
        {
            $col=array('rollno','fname','lname','admissionyear','enrollid');
			$val=array( $_REQUEST['rollno'],$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['admissionyear'],$_REQUEST['enrollid']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
            
            $col=array('smid','studid','year','sem');
            $val=array(null,$_REQUEST["eid"],$year,$_REQUEST["sem"]);
            $db->insert('student_sem_tbl',$col, $val);
            echo "<script>location.href='".$nm."_list.php?cur&success'</script>";
        }
        else {
			$col=array('rollno','fname','lname','admissionyear','enrollid');
			$val=array( $_REQUEST['rollno'],$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['admissionyear'],$_REQUEST['enrollid']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php?cur&success'</script>";
		}
	}
include("page_content/frmheader.php");
	if(isset($_REQUEST["eid"]))	{
        $r=mysql_fetch_object(mysql_query("select * from $table where $pk=".$_REQUEST["eid"]));
        $rollno=$r->rollno;
		$fname=$r->fname;
		$lname=$r->lname;
        $admissionyear=$r->admissionyear;
        $enrollid=$r->enrollid;
		$id=$r->$pk;
	}else if(isset($_REQUEST["eeid"]) || isset($_REQUEST["apid"]))	{
        if(isset($_REQUEST['eeid']))
        {
            $studid = $_REQUEST['eeid'];
        }
        else
        {
            $studid = $_REQUEST['apid'];
        }
        $r=mysql_fetch_object(mysql_query("select * from $table where $pk=".$studid));
        $rollno=$r->rollno;
		$fname=$r->fname;
		$lname=$r->lname;
        $admissionyear=$r->admissionyear;
        $enrollid=$r->enrollid;
        $password=$r->password;
        $username=$r->username;
        $dob=$r->dob;
        $gender=$r->gender;
		$id=$r->$pk;
	}

    else{
		$rollno="";
		$fname="";
		$lname="";
        $admissionyear="";
        $enrollid="";
		$id="";
	}

?>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post" id="form1">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Roll No</span>
							<input type="text" data-bvalidator="digit,minlength[4],maxlength[4],required" value="<?= $rollno;?>" id="example-username" name="rollno" class="form-control" placeholder="Rollno eg.1544">
						</div>
					</div>
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Firstname</span>
							<input type="text" data-bvalidator="alpha,required" value="<?= $fname; ?>" id="example-username" name="fname" class="form-control" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Lastname</span>
							<input type="text" data-bvalidator="alpha,required" value="<?= $lname; ?>" id="example-password" name="lname" class="form-control" placeholder="Last Name">
						</div>
					</div>
                  <?php if((isset($_REQUEST["eid"]) && (isset($_REQUEST["det"]) || isset($_REQUEST["lea"]))) || (!isset($_REQUEST['eeid']) && !isset($_REQUEST['apid']) && !isset($_REQUEST['eid'])) ) {?>
                   <div class="form-group">
                         <div class="input-group">
                            <span class="input-group-addon">Semester</span>
                            <input type="Text" data-bvalidator="digit,between[1:6],maxlength[1],required" value="" name="sem" class="form-control" placeholder="semister">
                         </div>
                     </div> <?php }if(isset($_REQUEST["eeid"]) || isset($_REQUEST["apid"])){?>
                     <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Gender</span>
							<select class="form-control" name="gender">
								<option value="Male" <?php if(isset($_REQUEST["eeid"])&&$r->gender=="Male"){echo "Selected";}?>>Male</option>
								<option value="Female" <?php if(isset($_REQUEST["eeid"])&&$r->gender=="Female"){echo "Selected";}?> >Female</option>
							</select>
						</div>
					</div>
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Date of Birth</span>
							<input type="Text" data-bvalidator="date[yyyy-mm-dd],required" data-date-format="yyyy-mm-dd" id="example-datepicker2" value="<?= $dob; ?>" id="example-email" name="dob" class="form-control input-datepicker" placeholder="yyyy-mm-dd">
						</div>
					</div>
                     <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Email</span>
							<input type="Text" data-bvalidator="email,required" value="<?= $username; ?>" id="example-email" name="username" class="form-control" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Password</span>
							<input type="password" data-bvalidator="alphanum,minlength[8],required" value="<?= $password; ?>" id="example-email" name="password" class="form-control" placeholder="password">
						</div>
					</div><?php }?>
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Admission Year</span>
							<input type="Text" data-bvalidator="digit,minlength[4],maxlength[4],required" value="<?= $admissionyear; ?>" id="example-email" name="admissionyear" class="form-control" placeholder="YYYY">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Enrollment</span>
							<input type="Text" data-bvalidator="alphanum,minlength[15],maxlength[15],required" value="<?= $enrollid; ?>" id="example-email" name="enrollid" class="form-control" placeholder="Enrollment Id">
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
    echo "<script>$(document).ready(function(){ pops('Student Added Successfully!','success');});</script>";
}
?>