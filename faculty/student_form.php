<?php 
$table="student_tbl";
$pk="studid";
$nm="student";
if(isset($_REQUEST['sbtn']))
{
        include("DatabaseFiles/cn.php");
		if($_REQUEST["h2"]==""){

			mysql_query("INSERT INTO `student_tbl` (`studid`,`rollno`,`fname`,`lname`,`admissionyear`,`enrollid`,`approve`) VALUES ('NULL','".$_REQUEST['rollno']."','".$_REQUEST['fname']."','".$_REQUEST['lname']."','".$_REQUEST['admissionyear']."','".$_REQUEST['enrollid']."','N')");
            $id1 = mysql_insert_id();
            
            $col=array('smid','studid','year','sem');
            $val=array(null,$id1,$_SESSION['year'],$_REQUEST["sem"]);
            $db->insert('student_sem_tbl',$col, $val);
			echo "<script>location.href='".$nm."_form.php'</script>";

		} else {
			$col=array('rollno','fname','lname','admissionyear','enrollid');
			$val=array( $_REQUEST['rollno'],$_REQUEST['fname'], $_REQUEST['lname'], $_REQUEST['admissionyear'],$_REQUEST['enrollid']);
			$db->update($table,$pk,$_REQUEST["h2"], $col, $val);
			echo "<script>location.href='".$nm."_list.php'</script>";
		}
	}
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
        $rollno=$r->rollno;
		$fname=$r->fname;
		$lname=$r->lname;
        $admissionyear=$r->admissionyear;
        $enrollid=$r->enrollid;
		$id=$r->$pk;
	}else{
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
							<span class="input-group-addon"><i class="icon-user"></i></span>
							<input type="text" data-bvalidator="digit,minlength[4],maxlength[4],required" value="<?= $rollno;?>" id="example-username" name="rollno" class="form-control" placeholder="Rollno eg.1544">
						</div>
					</div>
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-user"></i></span>
							<input type="text" data-bvalidator="alpha,required" value="<?= $fname; ?>" id="example-username" name="fname" class="form-control" placeholder="First Name">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-asterisk"></i></span>
							<input type="text" data-bvalidator="alpha,required" value="<?= $lname; ?>" id="example-password" name="lname" class="form-control" placeholder="Last Name">
						</div>
					</div>
                  <?php if(!isset($_REQUEST["h2"])){?>
                   <div class="form-group">
                         <div class="input-group">
                            <span class="input-group-addon"><i class="icon-envelope"></i></span>
                            <input type="Text" data-bvalidator="digit,maxlength[1],required" value="" name="sem" class="form-control" placeholder="semister">
                         </div>
                     </div> <?php }?>
                    <div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-envelope"></i></span>
							<input type="Text" data-bvalidator="digit,minlength[4],maxlength[4],required" value="<?= $admissionyear; ?>" id="example-email" name="admissionyear" class="form-control" placeholder="YYYY">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-envelope"></i></span>
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
<?php include("page_content/frmfooter.php");?>