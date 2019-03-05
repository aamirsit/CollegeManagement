<?php
include("DatabaseFiles/cn.php");
    if(isset($_REQUEST["sbtn"]))
{
    $u=$_REQUEST["username"];
    if(!isset($_REQUEST["fgid"])){
    $p=$_REQUEST["password"];
	$r=mysql_query("select * from login_tbl where username='$u' and password='$p'");
	
	if(mysql_num_rows($r)==1){ 
	
		$r1=mysql_fetch_object($r);
		if($r1->username==$u && $r1->password==$p)
		{
        $y=mysql_fetch_object(mysql_query("select * from year_tbl order by yid DESC LIMIT 1"));
              $year=$y->year;
			
            if($r1->usertype=="Faculty")
            {
              $yy=mysql_query("select * from faculty_sem_tbl where fid=".$r1->fid." order by fsid DESC LIMIT 1");
              if(mysql_num_rows($yy)>0)
              {
                $yyy=mysql_fetch_object($yy);
                $_SESSION["year"]=$yyy->year;  
              }
              else{
                $_SESSION["year"]=$year;
              }
              $name=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r1->fid));
              $_SESSION["name"]=$name->fname." ".$name->lname;    
              $_SESSION["fid"]=$r1->fid;
              $flag=0;
              $d=mysql_query("select * from student_sem_tbl where year='".$_SESSION["year"]."' group by sem");
              while($d1=mysql_fetch_object($d))
              { if($d1->sem!=null && $d1->sem%2==0){
              $flag++;
              }}
              if($flag!=0)
              {
                $s=mysql_query("select * from faculty_sem_tbl where sem%2=0 AND year='".$year."' AND fid=".$r1->fid);
              }else
              {
                $s=mysql_query("select * from faculty_sem_tbl where sem%2!=0 AND year='".$year."' AND fid=".$r1->fid);
              }
              $s=mysql_query("select * from faculty_sem_tbl where year='".$year."' AND fid=".$r1->fid);
              $s1=mysql_fetch_object($s);
              if($s1)
              {
                    $_SESSION["ffid"]=$s1->fid;                    
                    $_SESSION["sem"]=$s1->sem;
                    echo " <script>location.href='../faculty/index.php?success'</script>";  
              }
              else
              {
                    $r2=mysql_fetch_object(mysql_query("select * from faculty_sem_tbl where fid=".$r1->fid));
                    if($r2)
                    {
                        $_SESSION["ffid"]=$r2->fid;
                    }
                    $_SESSION["sem"]=$r2->sem;
                    echo "<script>location.href='../faculty/index.php?success'</script>";   
              }
            }
            else
            {
              $_SESSION["year"]=$year;
              $l = $r1->lid;
              $_SESSION["lid"]=$l;
			 echo " <script>location.href='../admin/index.php?success'</script>";
			}
		}
		
		else
		{
				echo " <script>location.href='login.php?un'</script>";
		}
	}
	else
	{
			echo " <script>location.href='login.php?un'</script>";
	}
    }
    else
    {
        //echo "<script>location.href='FormMail/sendmail.php?email=$r1->emailid&name=IQRA BCA COLLEGE&fid=$r1->fid';</script>";
        $d=$_REQUEST["dob"];
        $r=mysql_fetch_object(mysql_query("select * from login_tbl where username='".$u."'"));
        if($r)
        {
            $r1=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r->fid));
            if($r1)
             {
                if($r1->dob == $d)
                {
                    //echo "<script>location.href='FormMail/sendmail.php?email=$r1->emailid&name=IQRA BCA COLLEGE&fid=$r1->fid';</script>";
                   echo "<script>location.href='http://mybws.online/FormMail/email.php?email=$r1->emailid&message=Your Password is : $r->password&name=IQRACOLLEGE';</script>";
                }
                else
                echo " <script>location.href='login.php?fgid&unn'</script>";
            }
            
        }
        else
        echo " <script>location.href='login.php?fgid&unn'</script>";
        
    }
}
include("page_content/head.php");
if(isset($_REQUEST['un']))
    {
        echo "<script>$(document).ready(function(){ pops('Invalid Username Or Password!','error');});</script>";
    } 
if(isset($_REQUEST['unn']))
    {
        echo "<script>$(document).ready(function(){ pops('Invalid Username Or DOB!','error');});</script>";
    } 
    ?>
?>
<style>
    .icn{
        float: right;
        margin-left: -25px;
        margin-top: -30px;
        margin-right:10px;
        position: relative;
        z-index: 2;
    }
</style>
<body>
<header class="navbar navbar-default navbar-fixed-top">
<a href="login.php" class="navbar-brand">
<img width="50" height="50" style="margin:-3px 0 0 -15px;" src="img/iqra1.svg" alt="FreshUI">
<span>Iqra</span>
</a>
</header>
<div id="login-container">
<div id="page-content" class="block remove-margin">
<div class="block-header">
<div class="header-section">
<h1 class="text-center">Welcome to Iqra Panel<br><small><i class="icon-user"></i> Please Login</small></h1>
</div>
</div>
<form method="post" id="form1">
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="icon-user"></i></span>
<input type="text" data-bvalidator="required" name="username" class="form-control input-lg" placeholder="Username">
</div>
</div>
<?php if(!isset($_REQUEST["fgid"])){?>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="icon-cog"></i></span>
<input type="password" id="np" data-bvalidator="required" name="password" class="form-control input-lg" placeholder="Password">
<span toggle="#np" class="icon-eye-open icn toggle-password"></span>
</div>
</div><?php }?>
<?php if(isset($_REQUEST["fgid"])){?>
<div class="form-group">
<div class="input-group">
<span class="input-group-addon"><i class="icon-calendar"></i></span>
<input type="text" id="example-datepicker2" name="dob" class="form-control input-datepicker" data-date-format="yyyy-mm-dd" placeholder="Date Of Birth (YYYY-MM-DD)" data-bvalidator="date[yyyy-mm-dd],required">
</div>
</div><?php }?>
<div class="form-group">
<div class="row">
<div class="col-md-6" style="line-height:40px;">
<?php if(!isset($_REQUEST["fgid"])){?>
<a href="login.php?fgid" id="forget">Forget Password ?</a>
<?php }?>
</div>
<?php if(isset($_REQUEST["fgid"])){?>
<div class="col-sm-3 text-right">
<a href="login.php"><button type="button" class="btn btn-default"><i class="icon-remove"></i> Cancel</button></a>
</div>
<?php }else{?>
<div class="col-sm-3 text-right">
<a href="../education/index.php"><button type="button" class="btn btn-default"><i class="icon-remove"></i> Cancel</button></a>
</div>
<?php }?>
<div class="col-xs-3 text-right">
<button type="submit" name="sbtn" class="btn btn-default btn-primary"><?php if(!isset($_REQUEST["fgid"])){?><i class="icon-off"></i> Login<?php }else echo "Get Passwd";?></button>
</div>
</div>
</div>
</form>
</div>
</div>
<script>
    $(doument).ready(function(){
       $("#forget").click(function(){
           var d1 = $(this).attr('href');
           window.open(d1,'_blank');
       }); 
    });
</script>
<div class="pop animated slideInRight" style="z-index:99;text-align:center;background:;display:flex;opacity:0;position: fixed;top:80%;left:75%;visibility:hidden">
    <div class="msg" style="padding-top:12px;width:250px;height:50px auto;background-color:#222843;border-top-left-radius:5px;border-bottom-left-radius:5px;font-size:18px;color:#FFE">
    </div>     
    <div class="ic" style="padding-top:12px;width:50px;height:50px;border-top-right-radius:5px;border-bottom-right-radius:5px;background-color:#90D473;font-size:1.5em;color:#FFE">
    <i class="icon-smile" style="font-size:1.5em;"></i>
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
        });
</script>
<script>
    function pops(msg,icon){
                $('.pop').css('visibility','visible');
                //variable for function
                var string = $('#uname').text(),text = string.split(" "),name = text[1];
                var red = "#ef8989",green = "#90d473",blue = "#83c6e4";

                if(icon == "error") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-ban-circle");
                    var he = $('.msg').height();
                    $('.ic').css({background:red,'padding-top': he/2-3+"px"}).height(he);
                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }else if(icon == "success") {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-smile");
                     var he = $('.msg').height();
                    $('.ic').css({background:green,'padding-top': he/2-3+"px"}).height(he);

                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }else {
                    $('.msg').text(msg);
                    $('.pop i').attr('class', "icon-exclamation");
                     var he = $('.msg').height();
                    $('.ic').css({background:blue,'padding-top': he/2-3+"px"}).height(he);
                    $('.pop').css({'display':'flex','opacity':'1'});
                    setTimeout(function(){
                       $('.pop').addClass('animated slideOutRight');
                    },3000);
                    $('.pop').delay(3500).fadeOut();
                }
            }
</script>
</body>
</html>