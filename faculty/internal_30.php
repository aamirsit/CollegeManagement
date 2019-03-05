
<?php 
$table="attendence_tbl";
$pk="attid";
$nm="Internal Out of 30 "; 
$name="Internal out of 30";
if(isset($_REQUEST["excel"]))
    {
        echo "<script>location.href='excel-report/internal_30_report.php?subid=".$_REQUEST['subid']."';</script>";
    }
include("page_content/listheader.php");
include("page_content/printheader.php");
?>
</ul>
    <div class="row gutter30">
        <form method="post" id="form1" action="">
		<div class="col-sm-3 col-sm-offset-2">
			<div class="block" style="border: none;box-shadow: none;margin:20px 0">
					<div class="input-group" >
						<span class="input-group-addon">Subject Name</span>
						<select name="subid" class="form-control" style="width:200px;">
							<?php
							$r=mysql_query("select * from subject_tbl where sname!='Practical' AND sem=".$_SESSION["sem"]);
							while($r1=mysql_fetch_object($r)){?>
								<option value="<?= $r1->subid?>" <?php if(isset($_REQUEST["subid"])){if($r1->subid==$_REQUEST["subid"]){echo "selected";}}?>><?= $r1->sname ?></option>
							<?php }?>
						</select>
					</div>
			</div>
		    </div>
				<div class="col-sm-6" >
					<div class="block" style="border: none;box-shadow: none;margin:20px 0 0 40px">
						<div class="input-group">
							<input type="submit" name="sbtn" class="btn btn-primary" value="Get Report">
                            <button type="submit" style="margin-left:20px;" onclick="divprint();" name="print" class="btn btn-primary print" >
                                <i class="icon-print">&nbsp;&nbsp;Print</i>
                            </button>
                            <button type="submit" style="margin-left:20px;" name="excel" class="btn btn-primary print" >
                                <i class="icon-list">&nbsp;&nbsp;Excel</i>
                            </button>
						</div>
					</div>
				</div>
                </form>
	</div>
	<?php if(isset($_REQUEST["sbtn"])) {
        include("page_content/printcontent.php");
		?>     
		
			<div class="table-responsive pdata">
				<table id="example-datatable" class="table table-bordered table-hover">
					<thead class="text-center">
						<tr>
							<th class="text-center">RollNO</th>
							<th class="text-center">Name</th>
							<th class="text-center">Internal</th>
							<th class="text-center">Unit Test</th>
							<th class="text-center">Attendence</th>
							<th class="text-center">Performance</th>
							<th class="text-center">Total</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
                             $cc=0;  
							 $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_SESSION["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
                                
							while($r1=mysql_fetch_object($r)){
                                $c=mysql_query("select count(*) c from attendence_tbl a,student_sem_tbl s where a.sem=s.sem AND s.sem=".$_SESSION["sem"]." AND s.year='".$_SESSION["year"]."' group by a.attenddate");
                                $count=mysql_num_rows($c);
                                $c1=$count;
                                $intotal=0;
                                 $p=$c1;
                                 $y=$p;
                        ?>

							    <tr><td class='text-center'><?= $r1->rollno?></td>
								<td><?=  $r1->fname." ".$r1->lname?></td>
								<td><?php 
                                     $total=0;
                                     $per=0;
                                    $count=0;
                                    $iinc=0;
                                    $en=mysql_fetch_object(mysql_query("select * from exam_tbl where exname='Internal'"));
                                    $m=mysql_query("select * from exam_result_tbl where exid=".$en->exid." and smid=$r1->smid and subid=".$_REQUEST["subid"]);
                                            while($m1=mysql_fetch_object($m))
                                            {
                                                $total=$m1->marks;
                                                if($m1)
                                                {
                                                    $iinc++;
                                                }
                                            }
                                if($iinc!=0){
                                $imarks=(10*round($total))/$en->marks;
                                echo round($imarks); $intotal=$intotal+round($imarks);
                                }
                                else{ $cc++;
                                    echo "<b style='color:#B99663;'>Pending...</b>";
                                }
                                ?>
                                </td>
								<td><?php 
                                     $total=0;
                                     $per=0;
                                    $count=0;
                                    $uinc=0;
                                    $q=mysql_query("select * from exam_tbl where exname like 'U%'");
                                    $sub=0;
                                    while($q1=mysql_fetch_object($q))
                                    {
                                        $qq=mysql_query("SELECT * FROM exam_result_tbl ex INNER JOIN student_sem_tbl ss where ex.smid=ss.smid and ss.sem=".$_SESSION["sem"]." and ss.year='".$_SESSION["year"]."' and ex.exid=".$q1->exid." group by ex.exid");
                                        if($qq)
                                        {
                                            while($qq1=mysql_fetch_object($qq))
                                            {
                                             
                                                $m=mysql_query("select * from exam_result_tbl where exid=".$qq1->exid." and smid=$r1->smid and subid=".$_REQUEST["subid"] );
                                                while($m1=mysql_fetch_object($m))
                                                {
                                                  $total=$total+$m1->marks;
                                                if($m1)
                                                  {
                                                      $uinc++;
                                                  }
                                                } 
                                                 $sub=$sub+1;
                                            }
                                           
                                        }
                                    }
                                   if($uinc!=0){
                                   $umarks=(10*round($total))/(20*$sub);
                                   echo round($umarks); $intotal=$intotal+round($umarks);
                                    }else
                                    {
                                        $cc++;
                                        echo "<b style='color:#B99663;'>Pending...</b>";
                                    }
                                ?>
                                </td>
                                <td>
								    <?php 
                                        $q=mysql_query("select a.* from attendence_tbl a,student_sem_tbl s where a.sem=s.sem AND s.sem=".$_SESSION["sem"]." AND s.year='".$_SESSION["year"]."' group by a.attenddate");
                                        
                                       
                                        while($q1=mysql_fetch_object($q))
                                        {
                                        $stud=explode(",",$q1->studid);
                                        $s1="";
                                        
                                        for($i=0;$i<count($stud)-1;$i++)
                                        {
                                            if($r1->studid == $stud[$i])
                                            {
                                                $y--;
                                            }
                                        } }
                                if(mysql_num_rows($q)>0){
                                $atmarks=(5*$y)/$p;
                                echo round($atmarks); $intotal=$intotal+round($atmarks);
                                }else{$cc++; echo "<b style='color:#B99663;'>Pending...</b>";}
                                ?>
								</td>
								<td><?php 
                                     $total=0;
                                    $en=mysql_fetch_object(mysql_query("select * from exam_tbl where exname like 'Per%'"));
                                    $m=mysql_query("select * from exam_result_tbl where exid=".$en->exid." and smid=$r1->smid and subid=".$_REQUEST["subid"]);
                                            while($m1=mysql_fetch_object($m))
                                            {
                                                $total=$total+$m1->marks;
                                            }
                                if(mysql_num_rows($m)>0){
                                echo round($total); $intotal=$intotal+round($total);
                                }else{ $cc++; echo "<b style='color:#B99663;'>Pending...</b>";}
                                ?>
                                </td>
                                <?php if($cc==0){?>
			                    <td <?php if($intotal<11){?>style="background-color:red;text-decoration:underline;color:white"<?php }?>><?= $intotal?></td><?php }else{ echo "<td><b style='color:#B99663;'>Pending...</b></td>";}?></tr>
							<?php 	}
                                    ?>
					</tbody>
				</table>	
            <?php }?>
			</div>
		</div>
<?php include("page_content/listfooter.php");?>