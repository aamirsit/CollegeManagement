<?php include("DatabaseFiles/cn.php");
	$val = $_POST["password"];

	$q=mysql_fetch_object(mysql_query("select * from login_tbl where lid=".$_SESSION["lid"]));

	if($q->password==$val){
		echo "Correct";
	}else{
		echo "Passsowrd In-correct";
	}
?>