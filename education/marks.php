<?php include("DatabaseFiles/cn.php");
 if(!isset($_SESSION["studid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='index.php'</script>";
    } include("pages/head.php");?>
<?php include("pages/header.php");?>
<style>
    
    table.borderless th{
        border-color:transparent;
        color:grey;
        color:#424242;
        font-family: 'Josefin Sans';
        font-size:1.3em;
    }
    table.borderless td{
        border-color:transparent;
        color:black;
        font-family: 'Josefin Sans';
        font-size:1.1em;
    }
    table tr:nth-child(1) 
    {
        border-top:3px solid white;
    }
    table tr:nth-child(2n) td:nth-child(5n) , table tr:nth-child(3) td:nth-child(5n)
    {
        border-right:3px solid grey;
    }
    table.borderless tr{
        border-left:3px solid grey;
        border-right:3px solid grey;
    }
    
    table.borderless tr:last-child{
        border-bottom:3px solid grey;
    }
</style>
<!--// Mini Header \\-->
<div class="container-fluid" style="padding:0px;">
		<div class="wm-mini-header">
			<span class="wm-blue-transparent"></span>
			 <div class="container">
			    <div class="row">
				    <div class="col-sm-12">
				        <div class="wm-mini-title">
				       		<h1>Internal , Unit Test , Internal (30) & Practical Marks</h1> 
				        </div>
				        <div class="wm-breadcrumb">
				          	<ul>		          	 	
                                <li><a href="marks.php">Marks</a></li>
				          	</ul>
				        </div>      
				    </div>
			    </div>
			</div>    
		</div>
		</div>
  		<!--// Mini Header \\-->
<div class="container-fluid" style="margin-top:10px;background-color:#f7f7f7">
<div class="container" style="padding:15px 0 15px 33px;" >
    <div class="row" style="border-left:3px solid grey;padding:10px 0 0 20px;">
        <h3>Internal Out 0f 30 Marks</h3>
    </div>
</div>
</div>
<div class="container" style="margin-top:10px;">
  <div class="row">
   <div class="col-sm-12 col-md-12 col-xs-12"  style="margin-top:15px;">
    <div class="block full">
        <div class="block-title" style="background-color:#222845;color:white;">
        <h2 style="color:white;text-align:center;font-family:'Josefin Sans';">Internal 30
            </h2>
        </div>
       </div>
    </div>
    </div>
    <div class="table-responsive">
				<table id="example-datatable" class="table table-borderless borderless table-hover">
					<thead class="text-center">
						<tr>
						    <th>Subject &dArr; | Marks By  &rArr;</th>
							<th>Internal</th>
							<th>Unit Test</th>
							<th>Attendance</th>
							<th>Performance</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody class="text-center">
                       <?php
                            $cnt=0;
							$c=mysql_query("select * from subject_tbl where sname!='Practical' AND sem=".$_SESSION["ssem"]." order by scode");
							while($c1=mysql_fetch_object($c)){
                            $subid[]=$c1->subid;
                            $sname[]=$c1->sname;
                            $cnt++;
                            ?>
                            
							
                        <?php }
                             for($mx=0;$mx<$cnt;$mx++){?>
                             <tr>
							<td class="text-center"><?= $sname[$mx]?> </td><?php 
                             $cc=0;  
							 $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_sem_tbl.sem=".$_SESSION["ssem"]." AND student_sem_tbl.year='".$_SESSION["year"]."' AND student_sem_tbl.smid=".$_SESSION['smid']);
                                
							while($r1=mysql_fetch_object($r)){
                                $c=mysql_query("select count(*) c from attendence_tbl a,student_sem_tbl s where a.sem=s.sem AND s.sem=".$_SESSION["ssem"]." AND s.year='".$_SESSION["year"]."' group by a.attenddate");
                                $count=mysql_num_rows($c);
                                $c1=$count;
                                $intotal=0;
                                 $p=$c1;
                                 $y=$p;
                        ?>
								<td><?php 
                                     $total=0;
                                     $per=0;
                                    $count=0;
                                    $iinc=0;
                                    $en=mysql_fetch_object(mysql_query("select * from exam_tbl where exname='Internal'"));
                                    $m=mysql_query("select * from exam_result_tbl where exid=".$en->exid." and smid=".$_SESSION['smid']." and subid=".$subid[$mx]);
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
                                    $q=mysql_query("select * from exam_tbl where exname like 'U%'");
                                    $sub=0;
                                    $uinc=0;
                                    while($q1=mysql_fetch_object($q))
                                    {
                                        $qq=mysql_query("SELECT * FROM exam_result_tbl ex INNER JOIN student_sem_tbl ss where ex.smid=ss.smid and ss.sem=".$_SESSION["ssem"]." and ss.year='".$_SESSION["year"]."' and ex.exid=".$q1->exid." group by ex.exid");
                                        if($qq)
                                        {
                                            while($qq1=mysql_fetch_object($qq))
                                            {
                                             
                                                $m=mysql_query("select * from exam_result_tbl where exid=".$qq1->exid." and smid=".$_SESSION['smid']." and subid=".$subid[$mx] );
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
                                        $q=mysql_query("select a.* from attendence_tbl a,student_sem_tbl s where a.sem=s.sem AND s.sem=".$_SESSION["ssem"]." AND s.year='".$_SESSION["year"]."' group by a.attenddate");
                                        
                                       
                                        while($q1=mysql_fetch_object($q))
                                        {
                                        $stud=explode(",",$q1->studid);
                                        $s1="";
                                        
                                        for($i=0;$i<count($stud)-1;$i++)
                                        {
                                            if($_SESSION['studid'] == $stud[$i])
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
                                    $m=mysql_query("select * from exam_result_tbl where exid=".$en->exid." and smid=".$_SESSION['smid']." and subid=".$subid[$mx]);
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
			                    <td <?php if($intotal<11){?>style="background-color:red;color:white"<?php }?>><?= $intotal?></td><?php }else{ echo "<td><b style='color:#B99663;'>Pending...</b></td>";}?>
							<?php 	}}
                                    ?></tr>
					</tbody>
				</table>
			</div>
</div>
<div class="container-fluid" style="margin-top:10px;background-color:#f7f7f7">
<div class="container" style="padding:15px 0 15px 33px;" >
    <div class="row" style="border-left:3px solid grey;padding:10px 0 0 20px;">
        <h3>Internal & Unit Test Marks</h3>
    </div>
</div>
</div>
<div class="container">
<?php 
    $ex=mysql_query("select * from exam_result_tbl where smid =".$_SESSION['smid']." AND exid IN (select exid from exam_tbl where  exname like 'In%' OR exname like 'Un%') group by exid");
    $inc = (int)mysql_num_rows($ex);
    for($j=0;$j<$inc;$j++)
    { $ex=mysql_query("select * from exam_result_tbl where smid =".$_SESSION['smid']." AND exid IN (select exid from exam_tbl where  exname like 'In%' OR exname like 'Un%') group by exid");
      mysql_data_seek($ex,$j);
      $row = mysql_fetch_assoc($ex);
      mysql_free_result($ex);
    ?>		
<div class="col-sm-4 col-md-4 col-xs-4"  style="margin:15px 15px 0 -15px;">
    <div class="block full">
        <div class="block-title" style="background-color:#222845;color:white;">
        <h2 style="color:white;text-align:center;font-family:'Josefin Sans';"><?php 
            $ee=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$row['exid']));
            echo $ee->exname;
        ?></h2>
        </div>
        <div class="col-sm-6 col-xs-4 text-center" style="border-left:2px solid rgb(100,100,100);border-bottom:2px solid rgb(100,100,100);" ><b style="font-size:1.5em;font-family:'Josefin Sans';">Subjects</b></div>
        <div class="col-sm-6 col-xs-4 text-center" style="border-right:2px solid rgb(100,100,100);border-bottom:2px solid rgb(100,100,100);" ><b style="font-size:1.5em;font-family:'Josefin Sans';">Marks</b></div>
        <div class="col-sm-6 col-xs-4 text-center" style="border-left:2px solid rgb(100,100,100);border-bottom:2px solid rgb(100,100,100);">
            <ul style="list-style-type:none;font-family:'Josefin Sans';">
                <?php
                        $count=0;
                        $exid=$row['exid'];
                        $ss=mysql_fetch_object(mysql_query("select * from student_sem_tbl where studid=".$_SESSION['studid']." order by smid DESC LIMIT 1"));
                        $sem=$ss->sem;
				        $c=mysql_query("select * from subject_tbl where sname!='Practical' AND  sem=$sem order by scode");
				        while($c1=mysql_fetch_object($c)){
                        $subid[]=$c1->subid;
                        $count++;
                        ?>
				        <li><?= $c1->sname?></li>
				        <?php }
                ?> 
                <li style="color:black;border-top:2px solid rgb(100,100,100);">Total</li>
                <li style="color:black;">Percentage</li>
            </ul>
        </div>
        <div class="col-sm-6 col-xs-4 text-center" style="border-bottom:2px solid rgb(100,100,100);border-right:2px solid rgb(100,100,100);">
            <ul style="list-style-type:none;font-family:'Josefin Sans';">
                <?php
					$e=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_tbl.studid=student_sem_tbl.studid AND student_sem_tbl.sem=$sem AND student_sem_tbl.year='".$_SESSION["year"]."' AND student_tbl.studid=".$_SESSION['studid']);
					while($e1=mysql_fetch_object($e))
                    {
                    $total=0;
                    $per=0;
                    $fail=0;
                    $cc=0;
                    for($i=0;$i<$count;$i++)
                    {   $m=mysql_query("select * from exam_result_tbl where exid=$exid and smid=$e1->smid and subid=$subid[$i]");
                    while($m1=mysql_fetch_object($m))
                    {
                    $total=$total+$m1->marks;
                    if($subid[$i]==$m1->subid)
                    { 
                    if($ee->exname=="Internal"){
                    //echo $m1->subid." ".$subid[$i]; 
                    ?>    
                    <li <?php if($m1->marks<17){$fail++;?>style="color:red"<?php }?> ><?= $m1->marks;?></li><?php }else{?> <li class="text-center" <?php if($m1->marks<7){$fail++;?>style="color:red"<?php }?> ><?= $m1->marks;?></li><?php } 
                                }}if(mysql_num_rows($m)<=0){$cc++; echo "<li ><b style='color:#B99663;'>Pending...</b></li>";}}
                                if($cc==0){
                            ?>
                    <li style="color:black;border-top:2px solid rgb(100,100,100);"><?= $total?></li>
                              <li <?php if($fail!=0){?>style="background-color:red;color:white"<?php }else{?>style="color:black;"<?php }?>>
                               <?php
                                $rr=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$exid));
                                if($sem==6)
                                {
                                    $per=$total*100/2/$rr->marks;
                                }
                                else
                                {
                                    $per=$total*100/5/$rr->marks;
                                }
                                echo round($per)."%";
                                ?></li>
							<?php 	}else{ echo "<li style='color:#B99663;border-top:2px solid rgb(100,100,100);'>Pending...</li>"; echo "<li><b style='color:#B99663;'>Pending...</b></li>"; }}
							?>
            </ul>
        </div>
    </div>
</div>
<?php  } ?></div>
<div class="container-fluid" style="margin-top:10px;background-color:#f7f7f7">
<div class="container" style="padding:15px 0 15px 33px;" >
    <div class="row" style="border-left:3px solid grey;padding:10px 0 0 20px;">
        <h3>Internal Practical Marks</h3>
    </div>
</div>
</div>
<div class="container" style="margin-top:10px;">
  <div class="row">
   <div class="col-sm-12 col-md-12 col-xs-12"  style="margin-top:15px;">
    <div class="block full">
        <div class="block-title" style="background-color:#222845;color:white;">
        <h2 style="color:white;text-align:center;font-family:'Josefin Sans';">Practical Marks
            </h2>
        </div>
       </div>
    </div>
    </div>
    <div class="table-responsive">
				<table id="example-datatable" class="table table-borderless borderless table-hover">
					<thead class="text-center">
						<tr>
						    <th>Subject</th>
							<th>Total</th>
						</tr>
					</thead>
					<tbody class="text-center">
                       <?php
                                    $con=mysql_fetch_object(mysql_query("select * from exam_tbl where exname like 'Pra%'"));
                                    ?>
                                    
                                    <tr>
                                       <td style="border-right:3px solid grey;">Practical</td>
                                        <?php
                                        $subb=mysql_fetch_object(mysql_query("select * from subject_tbl where sem=".$_SESSION["ssem"]." AND sname like 'Pra%'"));
                                        $mr1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where smid=".$_SESSION['smid']." AND exid=".$con->exid." AND subid=".$subb->subid));
                                        if(!$mr1)
                                        {?>
                                          <td style="color:#B99663;">Pending...</td><?php }else{
                                        ?>
                                     <td><?= $mr1->marks;?></td><?php }?>
                                    </tr>
                    </tbody>
                </table>
    </div>
</div>
    <script src="js/main-1.03.js"></script><script>$(function(){webApp.datatables(),$("#example-datatable").dataTable({aoColumnDefs:[{bSortable:!0,aTargets:[1]}],iDisplayLength:15,aLengthMenu:[[-1,15,30,50],["All",15,30,50]]}),$(".dataTables_filter input").addClass("form-control").attr("placeholder","Search")});</script>
<?php include("pages/footer.php");?>