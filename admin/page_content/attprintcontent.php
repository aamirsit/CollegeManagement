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
                            <th class="text-center" colspan="5"><?= $name?></th>
                                                    </tr>
                                                </thead>
                    <tbody>
                        <tr>
                                    <th class="text-center">Date : <?= date('d-m-Y')?></th>
                                    <?php if(isset($_REQUEST['year'])){?>
                                    <th class="text-center">Year : <?=$_REQUEST['year']?></th><?php }?>
                                    <?php 
                                        if(isset($_REQUEST['min']))
                                        {?>
                                             <th class="text-center">Attendance Between:<?= date('d-m-Y',strtotime($_REQUEST['min']))." AND ".date('d-m-Y',strtotime($_REQUEST['max']))?></th>
                                             
                                    <?php }else if(isset($_REQUEST['studid'])){?>
                                            <th class="text-center">Rollno :<?php $st=mysql_fetch_object(mysql_query("select * from student_tbl where studid=".$_REQUEST['studid'])); echo $st->rollno; ?></th>
                                             <th class="text-center">Name: <?= $st->fname." ".$st->lname?> </th>
                                        <?php }
                                    ?>
                                    <th class="text-center">Semester : <?php
                                        if(isset($_REQUEST['sem']))
                                        { 
                                            echo $_REQUEST['sem']; 
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
         