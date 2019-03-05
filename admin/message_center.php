<?php include("DatabaseFiles/cn.php");
include("page_content/message_header.php");
?>
<div class="col-sm-6 col-md-9" id="open">
</div>
</div>
</div>
</div>
</div>
<?php include("page_content/frmfooter.php");
if(isset($_REQUEST['sc']))
    {
        echo "<script>$(document).ready(function(){ pops('Message sent Successfully!','success');});</script>";
    }
    if(isset($_REQUEST['sv']))
    {
        echo "<script>$(document).ready(function(){ pops('Message Saved as Draft Successfully!','success');});</script>";
    }
    ?>
?>