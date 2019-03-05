        <style>
            .print{
                display: inline-block;
            }
        </style> 
		<div class="table-responsive printdata col-md-12 col-lg-12 col-sm-12 col-xs-12">
				
               <table  class="table table-borderless table-hover" style="margin-top:-30px;">
                            <thead class="text-center">
                               <tr>
                                   <th colspan="5"><img src="img/iqraheader.png" alt="IQRA BCA COLLEGE" width="100%"/></th>
                               </tr>
                                <tr>
                            <th class="text-center th" colspan="5"><?= $name?></th>
                                                    </tr>
                                                </thead>
                    <tbody>
                        <tr>
                                    <th class="text-center">Date : <?= date('d-m-Y')?></th>
                                    <?php if(isset($_REQUEST['year'])){?>
                                    <th class="text-center">Year : <?=$_REQUEST['year']?></th><?php }?>
                                    <th class="text-center">Exam Date :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;20&nbsp;&nbsp;&nbsp;</th>
                                    <th class="text-center">Exam : <?php
                                if(isset($_REQUEST["exid"]))
                                { 
                                    $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                    echo $ex->exname;
                                }
                                else if(isset($_REQUEST['subid']))
                                {
                                    echo "Internal 30";
                                }
                                else{ echo "$name";}
                                
                                ?></th>
                                    <th class="text-center">Semester : <?php
                                        if(isset($_REQUEST['sem']))
                                        { 
                                            echo $_REQUEST['sem']; 
                                        }
                                        else if(isset($_REQUEST['exid']) || isset($_REQUEST['subid']))
                                        {
                                           $sem=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST['subid']));
                                           echo $sem->sem;
                                        }
                                        else{ echo $_SESSION["sem"];}
                                        
                                        ?></th>
                                    <th class="text-center"><?php if(isset($_REQUEST["subid"])){  
                                $s1=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST["subid"]));
                                echo "Subject : ".$s1->sname;}
                            ?>
                            </th>
                                </tr>
                            </tbody>
            </table>   
        </div>     
         