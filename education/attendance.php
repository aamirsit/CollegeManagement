<?php include("DatabaseFiles/cn.php");
    if(!isset($_SESSION["studid"]))
    {
        echo "<script type='text/javascript'>
        function preventBack() {
            window.history.forward();
        }
        setTimeout('preventBack()',0);location.href='index.php'</script>";
    }
include("pages/head.php");?>
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
				       		<h1>Attendance Records</h1> 
				        </div>
				        <div class="wm-breadcrumb">
				          	<ul>		          	 	
                                <li><a href="attendance.php">Attendance</a></li>
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
        <h3>Percentage Wise Attendance</h3>
    </div>
</div>
</div>
<div class="container" style="margin-top:20px;">
  <div class="row">
   <div class="col-sm-12 col-md-12 col-xs-12">
    <div class="block full">
        <div class="block-title" style="background-color:#222845;color:white;">
        <h2 style="color:white;text-align:center;font-family:'Josefin Sans';">Percentage Wise
            </h2>
        </div>
       </div>
    </div>
  </div>
    <div class="table-responsive">
				<table id="example" class="table table-borderless borderless table-hover">
					<thead class="text-center">
						<tr>
						    <th>Present Days</th>
						    <th>Absent Days</th>
						    <th>Total Days</th>
							<th>Percentage</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php
                                $y=explode("-",$_SESSION["year"]);
                                $y1=mysql_query("select * from attendence_tbl where sem=".$_SESSION["ssem"]);
                                $k=0;
                                while($yy1=mysql_fetch_object($y1))
                                {
                                    $at=explode("-",$yy1->attenddate);
                                    if($at[0]==$y[0] || $at[0]==$y[1])
                                    {
                                        $attid[$k]=$yy1->attid;
                                        $k++;
                                    }
                                }
                                //echo "<script>alert($year);</script>";
                                $count=$k;
                                $c1=$count;
                        ?>

							    <tr>
								<?php if(isset($attid)){?>
								<td>
								    <?php 
                                        $p=$c1;
                                        for($j=0;$j<count($attid);$j++)
                                        {
                                            $q=mysql_query("select * from attendence_tbl where attid=$attid[$j]");
                                            while($q1=mysql_fetch_object($q))
                                            {
                                                $stud=explode(",",$q1->studid);
                                                $s1="";

                                                for($i=0;$i<count($stud)-1;$i++)
                                                {
                                                    if($_SESSION['studid'] == $stud[$i])
                                                    {
                                                        $c1--;
                                                    }
                                                }
                                            }
                                        }
                                $ab=$p-$c1;
                                echo $c1."</td><td>".$ab."</td><td>".$p."</td>"; if($p!=0){ $per=(100*$c1)/$p;}else {$per=0;}?>
								<td <?php if($per<70){echo "style='background-color:red;color:white;'";} ?>><?php echo number_format((float)$per,2,'.','');?></td></tr>
			
							<?php }else echo "<td>No Entry</td><td>No Entry</td><td>No Entry</td><td>No Entry</td><tr>";	
							?>
					</tbody>
				</table>
			</div>
</div>
<div class="container-fluid" style="margin-top:10px;background-color:#f7f7f7">
<div class="container" style="padding:15px 0 15px 33px;" >
    <div class="row" style="border-left:3px solid grey;padding:10px 0 0 20px;">
        <h3>Overall Attendance Datewise</h3>
    </div>
</div>
</div>
<div class="container" style="margin-top:10px;">
  <div class="row">
   <div class="col-sm-12 col-md-12 col-xs-12"  style="margin-top:15px;">
    <div class="block full">
        <div class="block-title" style="background-color:#222845;color:white;">
        <h2 style="color:white;text-align:center;font-family:'Josefin Sans';">Datewise
            </h2>
        </div>
       </div>
    </div>
    </div>
    <div class="table-responsive">
				<table id="example-datatable" class="table table-borderless borderless table-hover">
					<thead class="text-center">
						<tr>
						    <th>Attendance Date</th>
							<th>Present/Absent</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<?php 
                                $y=explode("-",$_SESSION["year"]);
                                $y1=mysql_query("select * from attendence_tbl where sem=".$_SESSION["ssem"]);
                                $k=0;
                                while($yy1=mysql_fetch_object($y1))
                                {
                                    $at=explode("-",$yy1->attenddate);
                                    if($at[0]==$y[0] || $at[0]==$y[1])
                                    {
                                        $attid[$k]=$yy1->attid;
                                        $k++;
                                    }
                                }
                                for($j=0;$j<count($attid);$j++)
                                    {
                                        $r=mysql_query("select * from attendence_tbl where attid=$attid[$j]");
                                         while($r1=mysql_fetch_object($r))
                                         {
                                            $stud=explode(",",$r1->studid);
                                            $flag=0;
                                            $col="";
                                            for($i=0;$i<count($stud)-1;$i++)
                                            {
                                                if($_SESSION['studid'] == $stud[$i])
                                                {
                                                    $flag=1;
                                                    break;
                                                }
                                                else
                                                {
                                                    $flag=0;
                                                }
                                            }
                                            if($flag==1)
                                            {?>
                                               <tr>
                                               <?php 
                                                $pre="Absent";
                                                $col="rgb(255,0,0)";
                                                $col1="white";
                                            }
                                            elseif($flag==0)
                                            {?>
                                               <tr><?php 
                                                $pre="Present";
                                                $col1="Black";
                                            }?>

                                               <td class="text-center"><?= $r1->attenddate?></td>
                                                <td class="text-center" style="background-color:<?=$col?>;color:<?=$col1?>;"><?= $pre?></td>
                                               <?php
                                         }
                                     }               
                        ?>
                        </tr>
					</tbody>
                </table>
    </div>
</div>
<?php include("pages/footer.php");?>