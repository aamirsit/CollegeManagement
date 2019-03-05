
<?php 
    include("DatabaseFiles/cn.php");
    $r=mysql_query("select * from exam_result_tbl where exid=1 AND smid between 1 AND 10 AND subid=11");
    $chart_data = '';
    while($r1=mysql_fetch_object($r))
    {
        $smid=mysql_fetch_object(mysql_query("select * from student_sem_tbl where smid=".$r1->smid));
        $roll=mysql_fetch_object(mysql_query("select * from student_tbl where studid=".$smid->studid));
        $chart_data .="{ rollno :'".$roll->rollno."' , Marks :".$r1->marks." , }, ";
    }
    $chart_data = substr($chart_data, 0, -2);
?>   

<html>
    <head>
        <link rel="stylesheet" href="graph/morris.css">
        <script src="graph/jquery-3.2.1.min.js"></script>
        <script src="graph/morris.min.js"></script>
        <script src="graph/raphael-min.js"></script>
    </head>
    <body>
        <br>
        <br>
            <div id="chart"></div>
    </body>
</html>
<script>
new Morris.Line({
 element : 'chart',
 data: [<?php echo $chart_data; ?>],
 xkey:'rollno',
 ykeys:['Marks'],
 labels:['Marks'],
hideHover:'auto',
stacked :'true'
});
</script>
<!-- <script>
   new Morris.Line({
  // ID of the element in which to draw the chart.
  element: 'chart',
  // Chart data records -- each entry in this array corresponds to a point on
  // the chart.
  data: [
    { year: '2008', value: 200 },
    { year: '2009', value: 10 },
    { year: '2010', value: 5 },
    { year: '2011', value: 5 },
    { year: '2012', value: 20 }
  ],
  // The name of the data record attribute that contains x-values.
  xkey: 'year',
  // A list of names of data record attributes that contain y-values.
  ykeys: ['value'],
  // Labels for the ykeys -- will be displayed when you hover over the
  // chart.
  labels: ['Value']
});
</script> -->