<?php include("databaseFiles/cn.php");
$table="gd_topic_tbl";
$pk="gdtid";
$nm="add_topic";
$n="7";
date_default_timezone_set("Asia/Kolkata");
include("page_content/listheader.php");
?>
<?php 
    if(isset($_REQUEST["csbtn"]))
    {
        if(isset($_REQUEST["gdtid"]))
        {
            $col=array('gdcid','fid','gdtid','comment','gdcdate');
            $val=array(null,$_SESSION["lid"],$_REQUEST["gdtid"],$_REQUEST["comment"],date('Y-m-d h:i:s A'));
            $db->insert('gd_comment_tbl',$col,$val);
        }
    }
?>
<script>
    $(document).ready(function(){
       $(".panel-body").animate({scrollTop:$(document).height()},"fast");
        return false;
    });
    $(document).ready(function(){
       $('html,body').animate({scrollTop:$(document).height()},"fast");
        return false; 
    });
</script>
        <!-- <meta http-equiv="refresh" content="30" />-->
			 <div class="table-responsive">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">Topic</th>
							<th class="text-center">Added By</th>
							<th class="text-center">Date & Time</th>
                            <th class="text-center">Total Comments</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
							$r=mysql_query("select * from $table order by $pk DESC");
							while($r1=mysql_fetch_object($r)){
                        ?>

							<tr><td class='text-center'><a href='topic_comment_list.php?gdtid=<?= $r1->gdtid?>'><?= $r1->topic;?></a></td>
								<td><?php 
                                        $r2=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r1->fid));
                                        echo $r2->fname." ".$r2->lname;
                                    ?></td>
								<td><?=  $r1->gdtdate?></td>
                                <td><?php 
                                        $r3=mysql_fetch_object(mysql_query("select count(*) c from gd_comment_tbl where gdtid=".$r1->$pk));
                                        echo $r3->c;
                                    ?></td>
								</tr>
							<?php 	}
							?>
					</tbody>
				</table>
			</div>
		</div>
<div id="fx-container" class="fx-opacity"><div id="page-content" class="block">
	<div class="block-header">
<link rel="stylesheet" href="css/chat.css">
<div class="container-fluid" style="padding:20px;">
    <div class="row">
        <div class="col-md-12" style="margin-top:20px;">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:orange;" id="accordion">
                    <span class="glyphicon glyphicon-comment" style="color:white;font-family:'Josefin Sans';font-size:1.5em;"><?php 
                            if(isset($_REQUEST['gdtid'])){
                            $g=mysql_fetch_object(mysql_query("select * from gd_topic_tbl where gdtid=".$_REQUEST['gdtid']));
                            echo " ".$g->topic;}else{echo " Chat";}
                        ?></span> 
                    <div class="btn-group pull-right">
                        <a type="button" class="btn btn-default btn-xs" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                    </div>
                </div>
            <div class="panel-collapse <?php if(!isset($_REQUEST["gdtid"])){echo "collapse";}?>" id="collapseOne">
                <div class="panel-body">
                <ul class="timeline remove-margin" style="height:auto;min-height:70px;">
                    <?php 
                    if(isset($_REQUEST["gdtid"]))
                    {
                        $r=mysql_query("select * from gd_comment_tbl where gdtid=".$_REQUEST["gdtid"]);
                        while($r1=mysql_fetch_object($r))
                        {
                            $r2=mysql_fetch_object(mysql_query("select * from faculty_tbl where fid=".$r1->fid));
                            if($_SESSION["lid"]!=$r1->fid)
                            {
        ?>
                <li class="alt-color">
                  <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta"><?=$r1->gdcdate?></small><?= $r2->fname." ".$r2->lname?></h4>
                    <div class="timeline-content">
                     <?= $r1->comment?>
                    </div>
                  </div>
                </li>
                    <?php 
                        }else{
                    ?>
                <li class="text-right">
                  <div class="timeline-item">
                    <h4 class="timeline-title"><small class="timeline-meta"><?= $r1->gdcdate?></small><?= $r2->fname." ".$r2->lname;?></h4>
                    <div class="timeline-content"><?= $r1->comment?></div>
                  </div>
                </li>
                    <?php }}}?>
              </ul>
                </div>
                <form method="post">
                <div class="panel-footer">
                    <div class="input-group">
                       <textarea id="status-update" name="comment" rows="3" class="form-control" placeholder="Write your Comments!" style="height: 40px; width:99%;"></textarea>
                        <span class="input-group-btn">
                            <button style="height:40px;" type="submit" title="Send" data-toggle='tooltip' name="csbtn" class="btn btn-warning btn-sm csbtn" id="btn-chat">
                                <i class="icon-location-arrow" style="font-size:20px;"></i></button>
                        </span>
                    </div>
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>
</div>
    </div>
    </div>
<?php include("page_content/listfooter.php");?>
