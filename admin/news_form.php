<?php include("DatabaseFiles/cn.php");
$table="news_tbl";
$pk="nid";
$nm="news";
$n="6";
if(isset($_REQUEST['sbtn'])) {

			$img_path1=$kfile=$err="";

			//echo $_FILES["file1"]["error"]."_fsdfsdf";exit;
			if($_REQUEST['h2']!="")	{
                $imgg = explode(',',$_REQUEST["himg"]);
                for($i=0;$i<count($_REQUEST['he']);$i++)
                { 
                    if($_REQUEST['he'][$i] != "")
                    {
                        $img_path1.=$_REQUEST['he'][$i].",";
                    }
                    else
                    {
                        unlink("../faculty/uploadimage/".$imgg[$i]);
                    }
                }
                $im=0;
				foreach($_FILES["file1"]["tmp_name"] as $sel)
                { 
			     if(!empty($sel))
                 {
						$fileName = date("YsmHis")."_".$_FILES["file1"]["name"][$im];
						$hidden  = $fileName;
						$myextension= strtolower(strrchr($fileName,"."));
						if($myextension == ".jpg" || $myextension == ".jpeg" || $myextension == ".gif" || $myextension == ".bmp" || $myextension == ".png") {
								/*if ($_FILES["file1"]["error"] > 0) {
								       $err=$_FILES["file1"]["error"] . "<br />";
									}
								else
									{
										if($_REQUEST["himg"]!= "") {
											unlink("../faculty/uploadimage/".$_REQUEST["himg"]);
										}*/
									move_uploaded_file($sel, "../faculty/uploadimage/" . $fileName);
									$img_path1 .=$fileName.',';
								//}
							}
						else
							{
								$err="Please upload image file...";
							}
				}
					else
						{
							$img_path1= $img_path1;
					 	}
				    $im++;
                    }
                    if($err == "")
					 {
				
                        $col=array('name','ndate','ntime','photo','description','enabled');
                        $val=array($_REQUEST['name'], $_REQUEST['ndate'], $_REQUEST['ntime'], $img_path1, $_REQUEST['description'],$_REQUEST['enabled']);
                        $db->update($table,$pk,$_REQUEST["h2"], $col, $val);
                        echo "<script>location.href='".$nm."_list.php?success'</script>";
					}
					else
					{
						echo "<script>location.href='".$nm."_form.php?un'</script>";
					}
			}
			else
			{  $im=0;
                foreach($_FILES["file1"]["tmp_name"] as $sel)
                { 
			  if(!empty($sel))
					{

						$fileName = date("YsmHis")."_".$_FILES["file1"]["name"][$im];
						$extension= strtolower(strrchr($fileName,"."));

						if($extension == ".jpg" || $extension == ".jpeg" || $extension == ".gif" || $extension == ".bmp" || $extension == ".png")
						{
							/*if ($_FILES["file1"]["error"] > 0)
							{
								$err=$_FILES["file1"]["error"] . "<br />";
							}
							else
							{*/

									move_uploaded_file($sel , "../faculty/uploadimage/" . $fileName);
									$img_path1 .=$fileName.",";


							//}
						}
						else
						{
							$err .="Please upload image file for field $im...";

						}

              }
              else
              {
                  $img_path1=$_REQUEST["himg"];
              }
                    $im++;
                }
					//echo $err."---".$img_path1;
					if($err == "")
					{
						$col=array($pk,'name','ndate','ntime' ,'photo','description','enabled');
						$val=array(null, $_REQUEST['name'], $_REQUEST['ndate'], $_REQUEST['ntime'], $img_path1, $_REQUEST['description'],'Y');
						$db->insert($table, $col, $val);
						echo "<script>location.href='".$nm."_form.php?success'</script>";
				//echo "<script>location.href='".$nm."_form.php'</script>";
				}
				else
				{
						echo "<script>location.href='".$nm."_form.php?un'</script>";
				}
             }
            
		}
include("page_content/frmheader.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){pops('News Added Successfully!','success');});</script>";
}
if(isset($_REQUEST['un']))
{
    echo "<script>$(document).ready(function(){pops('There Some Error Occured!','error');});</script>";
}
	if(isset($_REQUEST["eid"]))	{
		$r=mysql_fetch_object(mysql_query("select * from $table where $pk=".$_REQUEST["eid"]));	
		$name=$r->name;
		$ndate=$r->ndate;
        $ntime=$r->ntime;
		$file1=$r->photo;
		$description=$r->description;
        $enabled=$r->enabled;
		$id=$r->$pk;
	}else{
		$name="";
		$ndate="";
        $ntime="";
		$file1="";
		$description="";
        $enabled="";
		$id="";
	}

?>
<style>
     .icn2{
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        margin-right:10px;
        position: relative;
        z-index: 2;
    }
    .icn3{
        position: relative;
        padding-top:37px;
        padding-bottom:37px;
        padding-left:40px;
        padding-right:40px;
        border-radius: 50%;
        background-color: rgba(255,0,0,0.3);
        right: 104px;
        top:6px;
        color:white;
        font-size: 2em;
        cursor:pointer;
        visibility: hidden;
    }
    img:hover + .icn3 , .icn3:hover {
        visibility: visible;
    }
    .icn{
        float: left;
        margin-left: -155px;
        margin-top: -34px;
        background-color: #FCFCFC;
        border:1px solid #D9D9D9;
        padding: 9px 6px 9px 6px;
        position: relative;
        z-index: 1;
        cursor:pointer;
    }
</style>

<form method="post" id="form1" enctype="multipart/form-data">
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
           <?php
                if(isset($_REQUEST["eid"]))	{
                    $img = explode(',',$file1);
                    for($i=0;$i<count($img)-1;$i++)
                    {?>
                      <img class="img<?=$i?>" src="../faculty/uploadimage/<?= $img[$i]?>" width="100px" height="100px" style="border-radius:50%;" >
                      <span class="icn3 ispan<?=$i?> icon-remove"></span>
                      <input type="hidden" value="<?=$img[$i]?>" name="he[]" class="hi<?=$i?>"/> 
                      <script>
                          $('.ispan<?=$i?>').click(function(){
                             $(".hi<?=$i?>").val('');
                             $('.img<?=$i?>').remove(); 
                             $('.ispan<?=$i?>').remove(); 
                          });
                      </script> 
                      
              <?php }
                    
                }
                
            ?>
        </div>
    </div>
</div>
	<div class="row gutter30">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">Newsname</span>
							<input type="text" value="<?= $name; ?>" id="example-username" name="name" class="form-control" placeholder="News Name" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">News Date</span>
							<input type="text" id="example-datepicker" name="ndate" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD" value="<?= $ndate; ?>" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon">News Time</span>
							<input type="time" value="<?= $ntime; ?>" id="example-password" name="ntime" class="form-control" placeholder="Time" data-time-format="hh:mm AM" data-bvalidator="required">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon" style="padding-right: 58px;">Image </span>
							<input type="file" id="example-email" <?php if(!isset($_REQUEST['eid'])){ echo "data-bvalidator='required'"; } ?> name="file1[]" data-toggle="file" class="form-control" placeholder="Photo">
							<span data-toggle="tooltip" title="Add More Images" class="input-group-addon icn icn1 toggle-file icon-plus"></span>
							<input name="himg" type="hidden" value="<?= $file1; ?>">
						</div>
					</div>
                    <div class="new">
                        
                    </div>
                    <div class="form-group">
						<div class="input-group">
							<textarea id="reply-msg" name="description" class="form-control textarea-editor" rows="6" style="width: 100%;" placeholder="Decription" data-bvalidator="required"><?= $description; ?></textarea>
						</div>
					</div>

					<input type="hidden" value="<?= $id ?>" name="h2">
					<input type="hidden" value="<?= $enabled ?>" name="enabled">
					<div class="form-group">
						<input type="submit" name="sbtn" class="btn btn-primary">
					</div>
				
			</div>
		</div>
	</div>
	</form>
</div>
<script>
    $(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".new"); //Fields wrapper
    var add_button      = $(".icn1"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="form-group"><div class="input-group"><span class="input-group-addon" style="padding-right: 58px;">Image </span><input type="file" id="example-email" name="file1[]" data-toggle="file" class="form-control" placeholder="Photo" <?php if(!isset($_REQUEST['h2'])){?>data-bvalidator="required"<?php }?>><span class="icn2 icon-remove remove_field"></span></div></div><div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>
<?php include("page_content/frmfooter.php");?>