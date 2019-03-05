<?php include("DatabaseFiles/cn.php");
$table="login_tbl";
$pk="lid";
$nm="Change Password";
$name="Change Password";
$n=0;
		if(isset($_REQUEST['sbtn']))
		{
            
			if(isset($_SESSION["lid"]))
			{
                
                        
                $r1=mysql_fetch_object(mysql_query("select * from ".$table." where lid=".$_SESSION["lid"]));
                if($r1->password == $_REQUEST["cpwd"])
				    {
                        $col=array('password');
                        $val=array($_REQUEST['npwd']);
                        $db->update($table,'lid',$_SESSION["lid"], $col, $val);
                        echo "<script>location.href='cp.php?success'</script>";
					
                    }
                else
                {
                        //echo "<script>alert('Current Password Did not Matched');</script>";
                        echo "<script>location.href='cp.php?un'</script>";
                }
            }

			}
include("page_content/frmheader.php");
	if(isset($_SESSION["lid"]))	{
         $r=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$_SESSION["lid"]));
        $file1=$r->photo;
	}
?>
<style>
    .icn{
        float: right;
        margin-left: -25px;
        margin-top: -25px;
        margin-right:10px;
        position: relative;
        z-index: 2;
    }
</style>
	<div class="row">
		<div class="col-sm-4 col-sm-offset-4">
			<div class="block" style="border: none;box-shadow: none;margin:50px 0">
				<form method="post"  id="form1">
                    <center>
                    <div class="form-group">
						<div class="input-group">
							 <img src="../faculty/uploadimage/<?= $file1;?>" width="150" height="150" style="box-shadow:0px 2px 20px black;" alt="Avatar" class="profile-photo animation-expandUp img-circle">
						</div>
					</div>
                    </center>
					<div class="form-group" >
						<div class="input-group">
                            <span class="input-group-addon"><b>Current Password&nbsp;</b></span>
							<input id="current" type="password" class="form-control current" data-toggle="password" placeholder="Current Password" name="cpwd" data-bvalidator="required">
							<span toggle=".current" class="icon-eye-open icn toggle-password"></span>
						</div>
						<span id="msg"></span>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>New Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></span>
							<input type="password" id="np"  id="new" name="npwd" class="form-control" placeholder="New Password" data-bvalidator="minlength[8],alphanum,required">
							<span toggle="#np" class="icon-eye-open icn toggle-password"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<span class="input-group-addon"><b>Confirm Password</b></span>
							<input type="password" id="nnp"  id="example-password" name="cnpwd" class="form-control" placeholder="Confirm Password" data-bvalidator="alphanum,equalto[np],required">
							<span toggle="#nnp" class="icon-eye-open icn toggle-password"></span>
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
							<input type="submit" id="button" style="width:390px;" name="sbtn" class="btn btn-default form-control" value="Submit" >
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
	<script>
      	$(document).ready(function() {
            $(".toggle-password").click(function(){
               $(this).toggleClass("icon-eye-close");
                var input = $($(this).attr("toggle"));
                if(input.attr("type")=="password"){
                    input.attr("type","text");
                }
                else
                    {
                        input.attr("type","password");
                    }
            });
            $('#np,#nnp').prop('disabled',true);
      						$('#button').prop('disabled',true);
      		$('#current').keyup(function() {
      			var p = $(this).val();
      			if(p != ""){
      				$.ajax({
      				type: 'POST',
      				url: "ajax_page/check.php",
      				data: {password: p},
      				success: function(data) {
      					$('#msg').html(data);

      					if(data == "Correct") {
      						
      						$('#np,#nnp').prop('disabled',false);
      						$('#button').prop('disabled',false);
                            $('#current').css('border','2px solid green');
      					}else{
      						
      						$('#np,#nnp').prop('disabled',true);
      						$('#button').prop('disabled',true);
                            //$('#current').toggleClass('animated shake');
                            $('#current').css('border','2px solid red');
      					}
      					
      				}
      			});
      			}else{
      				$('#msg').html("");
      			}
      		});
      	});
      </script>
      
<?php include("page_content/frmfooter.php");
if(isset($_REQUEST['success']))
{
    echo "<script>$(document).ready(function(){ pops('Password Changed Successfully!','success');});</script>";
}
if(isset($_REQUEST['un']))
{
    echo "<script>$(document).ready(function(){ pops('Current Password didn't Matched!','error');});</script>";
}
?>