 <script src="../js/jquery-3.2.1.min.js"></script>
       <script>
        //$(document).ready(function(){
        function send_mail(e,m,n)
        {
            //alert('hello');
            $.ajax({
               type: 'POST',
               url: 'http://mybws.online/FormMail/email.php?email='+e+'&message=Your Password Is :'+m+'&name='+n,
               
               success: function(data){
                   alert(data + " To your emailid = "+e);
                   location.href='http://localhost/project/faculty/login.php';
                }, error: function(jqXHR, textStatus, errorThrown){

              console.log(" The following error occured: "+ textStatus, errorThrown);
            }
            });
        }
   // });
</script>
   <?php
    include("DatabaseFiles/cn1.php");
    $email = $_REQUEST["email"];
    $name = $_REQUEST["name"];
    $fid = $_REQUEST["fid"];
    $r=mysql_fetch_object(mysql_query("select * from login_tbl where fid=$fid"));
//echo "<script>send_mail();</script>";
    echo "<script>send_mail('".$email."','".$r->password."','".$name."');</script>";
?>
<h1>Sending Email To <?= $email?>.....</h1>     