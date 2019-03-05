<?php
$f= explode(':',basename($_REQUEST['df']));
$path ="uploaddocs/";//change the path to fit your websites document structure
if(count($f)>1)
{
	$zipname=$path.date("YmdHis")."_"."download.zip";
	$zip=new ZipArchive;
	if ($zip->open($zipname, ZIPARCHIVE::CREATE) != TRUE) {
    	echo json_encode("Cannot Open");
	}
		foreach($f as $f1)
		{
			
			$zip->addFile($path.$f1,$f1);
		}
	$zip->close();	
	$down=$zipname;
}
else
{
	$down=$path.$_REQUEST['df'];
}

//echo $down;
//die;
ignore_user_abort(true);
set_time_limit(0); // disable the time limit for this script

$dl_file = preg_replace("([^\w\s\d\-_~,;:\[\]\(\].]|[\.]{2,})", '', $down); // simple file name validation
$dl_file = filter_var($dl_file, FILTER_SANITIZE_URL); // Remove (more) invalid characters
$fullPath = $down;
if ($fd = fopen ($fullPath, "r")) {
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) {
        case "pdf":
        header("Content-type: application/pdf");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        case "doc":    
		 header("Content-type: application/msword");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        case "docx":    
		 header("Content-type: application/msword");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
         case "txt":
        header("Content-type: text/plain");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "html":
		 header("Content-type: text/html");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "exe":
		 header("Content-type: application/octet-stream");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "zip":
		 header("Content-type: application/zip");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "xls":
		 header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "ppt":
		 header("Content-type: application/vnd.ms-powerpoint");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "gif":
		 header("Content-type: image/gif");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "png":
		 header("Content-type: image/png");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
            case "jpg":
		 header("Content-type: image/jpg");
        header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a file download
        break;
        // add more headers for other content types here
        default:
        header("Content-type: application/octet-stream");
        header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
        break;
    }
    header("Content-length: $fsize");
    header("Cache-control: private"); //use this to open files directly
    while(!feof($fd)) {
        $buffer = fread($fd, 2048);
        echo $buffer;
    }
}
fclose ($fd);
exit;
?>