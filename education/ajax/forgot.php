<?php
    include("DatabaseFiles/cn.php");
    
    $email = $_POST["email"];
    $dob = $_POST["dob"];

    $r=mysql_fetch_object(mysql_query("select * from student_tbl where username='".$email."' AND dob='".$dob."'"));
        if($r)
        {
                   //echo "<script>location.href='http://mybws.online/FormMail/email.php?email=$r1->emailid&message=Your Password is : $r->password&name=IQRACOLLEGE';</script>";
            echo "1:".$r->password;
        }
?>