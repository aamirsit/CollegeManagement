<?php 
$table="mail_from_tbl";
$pk="mfid";
$nm="compose";
$name="Compose Message";
		date_default_timezone_set("Asia/Kolkata");
		if(isset($_REQUEST['sbtn']))
		{ include("DatabaseFiles/cn.php");
			$img_path1=$kfile=$err="";
				if($_REQUEST['h2']!="")	
                {
                    if(!empty($_REQUEST["fac"]))
                    {
				    if(!empty($_FILES["file1"]["name"]))
                    {

						$fileName = date("YmdHis")."_".$_FILES["file1"]["name"];
						$hidden  = $fileName;
						$myextension= strtolower(strrchr($fileName,"."));
						if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png" || $myextension == ".pdf" || $myextension == ".doc" || $myextension == ".docx" || $myextension == ".html" || $myextension == ".htm" || $myextension == ".txt" || $myextension == ".psd" || $myextension == ".xls" || $myextension == ".ppt" || $myextension == ".php" || $myextension == ".js" || $myextension == ".css" || $myextension == ".aspx" || $myextension == ".exe" || $myextension == ".mp3" || $myextension == ".mp4" || $myextension == ".mpeg" || $myextension == ".mkv" || $myextension == ".avi") {
								if ($_FILES["file1"]["error"] > 0) {
								       $err=$_FILES["file1"]["error"] . "<br />";
									}
								else
									{
										if($_REQUEST["himg"]!= "") {
											unlink("uploaddocs/".$_REQUEST["himg"]);
										}
									move_uploaded_file($_FILES["file1"]["tmp_name"], "uploaddocs/" . $fileName);
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
				
                        $col=array('subject','description','attach','maildate','isdraft');
                        $val=array($_REQUEST['subject'], $_REQUEST['description'],$img_path1,date('Y-m-d h:i:s'),0);
                        $db->update($table,$pk,$_REQUEST["h2"], $col, $val);
                         
                        for($i=0;$i<count($_REQUEST["fac"]);$i++)
                        {
                            $col=array('mtid','mfid','mailto','isread','isdelete');
                            $val=array(null,$_REQUEST["h2"],$_REQUEST["fac"][$i],0,0);
                            $db->insert('mail_to_tbl',$col,$val);
                        }
                         
                        echo "<script>location.href='message_center.php?sc'</script>";
					}
					else
					{
						echo "<script>alert('".$err."');</script>";
					}
			     }
                    else
                    {
                        echo "<script>alert('Select Faculty to whom you want to send');</script>";
                        echo "<script>location.href='compose.php?eid=".$_REQUEST['eid']."'</script>";
                    }
                 
                }
			else
			{
                if(!empty($_REQUEST["fac"]))
                    {
                    if(!empty($_FILES["file1"]["name"]))
					{

						$fileName = date("YmdHis")."_".$_FILES["file1"]["name"];
						$extension= strtolower(strrchr($fileName,"."));

						if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" || $extension == ".bmp" || $extension == ".png" || $extension == ".pdf" || $extension == ".doc" || $extension == ".docx" || $extension == ".html" || $extension == ".htm" || $extension == ".txt" || $extension == ".psd" || $extension == ".xls" || $extension == ".ppt" || $extension == ".php" || $extension == ".js" || $extension == ".css" || $extension == ".aspx" || $extension == ".exe" || $extension == ".mp3" || $extension == ".mp4" || $extension == ".mpeg" || $extension == ".mkv" || $extension == ".avi")
						{
							if ($_FILES["file1"]["error"] > 0)
							{
								$err=$_FILES["file1"]["error"] . "<br />";
							}
							else
							{

									move_uploaded_file($_FILES["file1"]["tmp_name"], "uploaddocs/" . $fileName);
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
				

					 if($err == "")
					{
                       
                        $col=array($pk,'mailfrom','subject','description','attach','maildate','isdraft','isdelete');
                        $val=array(null, $_SESSION["fid"], $_REQUEST['subject'], $_REQUEST['description'],$img_path1,date('Y-m-d h:i:s'),0,0);
                        $db->insert($table, $col, $val);
                        
                        $id=mysql_insert_id(); 
                        
                        for($i=0;$i<count($_REQUEST["fac"]);$i++)
                        {
                            $col=array('mtid','mfid','mailto','isread','isdelete');
                            $val=array(null,$id,$_REQUEST["fac"][$i],0,0);
                            $db->insert('mail_to_tbl',$col,$val);
                        }
                        echo "<script>location.href='message_center.php?sc'</script>";
				    } 
                    else
                    {
                    	echo "<script>alert(".$err.");</script>";
                    }
                 }
                    else
                    {
                        echo "<script>alert('Select Faculty to whom you want to send');</script>";
                        echo "<script>location.href='compose.php?eid=".$_REQUEST['eid']."'</script>";
                    }
            }
        }
        if(isset($_REQUEST['dbtn']))
		{
            include("DatabaseFiles/cn.php");    
			$img_path1=$kfile=$err="";
				if($_REQUEST['h2']!="")	
                {
				    if(!empty($_FILES["file1"]["name"]))
                    {

						$fileName = date("YmdHis")."_".$_FILES["file1"]["name"];
						$hidden  = $fileName;
						$myextension= strtolower(strrchr($fileName,"."));
						if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png" || $myextension == ".pdf" || $myextension == ".doc" || $myextension == ".docx" || $myextension == ".html" || $myextension == ".htm" || $myextension == ".txt" || $myextension == ".psd" || $myextension == ".xls" || $myextension == ".ppt" || $myextension == ".php" || $myextension == ".js" || $myextension == ".css" || $myextension == ".aspx" || $myextension == ".exe" || $myextension == ".mp3" || $myextension == ".mp4" || $myextension == ".mpeg" || $myextension == ".mkv" || $myextension == ".avi") {
								if ($_FILES["file1"]["error"] > 0) {
								       $err=$_FILES["file1"]["error"] . "<br />";
									}
								else
									{
										if($_REQUEST["himg"]!= "") {
											unlink("uploaddocs/".$_REQUEST["himg"]);
										}
									move_uploaded_file($_FILES["file1"]["tmp_name"], "uploaddocs/" . $fileName);
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
                        $col=array('subject','description','attach','maildate','isdraft');
                        $val=array($_REQUEST['subject'],$_REQUEST['description'],$img_path1,date('Y-m-d h:i:s'),1);
                        $db->update('mail_from_tbl','mfid',$_REQUEST["h2"],$col,$val);
                         
                        echo "<script>location.href='message_center.php?sv'</script>";
                         
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

						$fileName = date("YmdHis")."_".$_FILES["file1"]["name"];
						$extension= strtolower(strrchr($fileName,"."));

						if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" || $extension == ".bmp" || $extension == ".png" || $extension == ".doc" || $extension == ".docx" || $extension == ".html" || $extension == ".htm" || $extension == ".txt" || $extension == ".psd" || $extension == ".xls" || $extension == ".ppt" || $extension == ".php" || $extension == ".js" || $extension == ".css" || $extension == ".aspx" || $extension == ".exe" || $extension == ".mp3" || $extension == ".mp4" || $extension == ".mpeg" || $extension == ".mkv" || $extension == ".avi" || $extension == ".pdf")
						{
							if ($_FILES["file1"]["error"] > 0)
							{
								$err=$_FILES["file1"]["error"] . "<br />";
							}
							else
							{

									move_uploaded_file($_FILES["file1"]["tmp_name"], "uploaddocs/" . $fileName);
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
				

					 if($err == "")
					{
                       
                        $col=array($pk,'mailfrom','subject','description','attach','maildate','isdraft','isdelete');
                        $val=array(null, $_SESSION["fid"], $_REQUEST['subject'], $_REQUEST['description'],$img_path1,date('Y-m-d h:i:s'),1,0);
                        $db->insert($table, $col, $val);
                        echo "<script>location.href='message_center.php?sv'</script>";
				    } 
                    else
                    {
                    	echo "<script>alert(".$err.");</script>";
                    }
            }
        }
include("page_content/frmheader.php");	
	if(isset($_REQUEST["eid"]))	{
        $r=mysql_fetch_object(mysql_query("select * from mail_from_tbl where mfid=".$_REQUEST["eid"]));
        $subject=$r->subject;
		$description=$r->description;
        $file1=$r->attach;
        $id=$r->$pk;
	}else{
        $subject="";
		$description="";
        $file1="";
        $id="";
	}
?>
	<div class="row" >
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="padding:10px 50px 30px 50px;border: none;box-shadow:0 0 10px silver;margin:50px 0">
				<form method="post" enctype="multipart/form-data" id="form1">
							  <h3>Compose Message</h3><br>
                    <div class="form-group">
						<div class="input-group">
							  <b style="font-size:15px;margin-left:-10px;">&nbsp;&nbsp;&nbsp;From :&nbsp;&nbsp;<?php $f=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$_SESSION["fid"])); echo $f->fname." ".$f->lname;?></b>
						</div>
					</div>
					<div class="form-group" >
						<div class="input-group">
                            <select  id="example-chosen-multiple" name="fac[]" class="select-chosen" data-placeholder="Send To" style="width:550px;" multiple>
                                <?php  
                                    $r=mysql_query("select * from faculty_tbl where fid!=".$_SESSION["fid"]);
                                    while($r1=mysql_fetch_object($r))
                                    {
                                ?>
                                <option value="<?= $r1->fid?>"><?= $r1->fname." ".$r1->lname?></option>
                                <?php }?>
                            </select>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input style="width:550px;" type="text"  id="example-username" name="subject" class="form-control" placeholder="subject" value="<?= $subject?>" data-bvalidator="required">
						</div>
					</div>
                    <div class="form-group">
						<div class="input-group">
							<textarea style="width:550px;" id="compose-message" name="description" rows="4" class="form-control" data-bvalidator="required"  placeholder="Compose Message"><?= $description?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="file" id="example-email"  name="file1" class="form-control" style="width:550px;">
							<input name="himg" type="hidden" value="<?= $file1; ?>">
                            <b><?php if($file1){echo "1 File alredy choosen<br>".$file1;}?></b>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
					        <input type="hidden" value="<?= $id ?>" name="h2">
							<input type="submit" style="width:100px;" name="sbtn" data-toggle='tooltip' title='Send' class="btn btn-default form-control" value="Send" >
                            <input type="submit" data-toggle='tooltip' title='Save As Draft' name="dbtn" class="btn btn-default form-control" Value="Save As Draft" style="position:absolute;width:200px;margin:-34px 0 34px 350px">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php include("page_content/frmfooter.php");

?>

