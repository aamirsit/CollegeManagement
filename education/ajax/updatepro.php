<?php include("DatabaseFiles/cn.php");
//DB details
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'college';

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if($db->connect_error){
    die("Unable to connect database: " . $db->connect_error);
}
?>

<?php
$r=mysql_query("select * from student_tbl where studid='".$_SESSION["studid"]."'");
$r1=mysql_fetch_object($r);
unlink("../../faculty/uploadimage/".$r1->photo);
////////////////////////////////////////////////////////
if(!empty($_POST['email']) || !empty($_FILES['file']['name'])){
    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        if((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")) && in_array($file_extension, $valid_extensions)){
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "../../faculty/uploadimage/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
        }
    }
    echo $uploadedFile;
     $email = $_POST['email'];
     $studid = $_SESSION["studid"];
    
    $update = $db->query("UPDATE student_tbl SET username='$email', photo='$uploadedFile' WHERE studid='$studid'");
    echo "ok";
}
?>