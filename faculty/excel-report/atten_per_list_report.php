<?php
        include("DatabaseFiles/cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Percentagewise'; //your file name
		$objPHPExcel = new PHPExcel();
        /******************************Header********************************/
        /**************************************Name**************************/
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'IQRA BCA COLLEGE')
					->mergeCells('A1:H1');
        //Center    
        $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A1:H1")->getFont()->setName('Josefin Sans')->setSize(25)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle('A1:H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
        /********************************Address**************************/
        $border_style= array('borders' => array('top' => array('style' => 
        PHPExcel_Style_Border::BORDER_THICK,'color' => array('rgb' => '6C8391'),)));
        $objPHPExcel->getActiveSheet()->getStyle("A3:H3")->applyFromArray($border_style);
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A2', 'Dahegam, Dahej Road ,Bharuch  PH. (02642)223484')
					->mergeCells('A2:H2');
        //Center
        $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A2:H2")->getFont()->setName('Josefin Sans')->setSize(10)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
        /********************************Sem**************************/
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Report : Percentage Wise Attendance')
					->mergeCells('A3:D3');
        if(isset($_REQUEST['year']))
        {
            $year = $_REQUEST['year'];
            $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('E3', 'Year :'.$_REQUEST['year'])
					->mergeCells('E3:F3');
            $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('G3', 'Semester :'.$_REQUEST['sem'])
					->mergeCells('G3:H3');
        }
        else
        {
            $year = $_SESSION['year'];
            $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('E3', 'Semester :'.$_REQUEST['sem'])
					->mergeCells('E3:H3');
        }
        
        //Center
        $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A3:H3")->getFont()->setName('Josefin Sans')->setSize(10)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle('A3:H3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
		/*********************Add column headings START**********************/
        //Background Color
        $objPHPExcel->getActiveSheet()
					->getStyle('A4:H4')
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setRGB('222845');
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A4:H4")->getFont()->setName('Josefin Sans')->setSize(12)->getColor()
            ->setRGB('FFFFFF');
        //Values for A4 : H4
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A4', 'Rollno')
                    ->mergeCells('A4:B4');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('C4', 'Name')
                    ->mergeCells('C4:E4');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('F4', 'Attendance')
                    ->mergeCells('F4:G4');
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('H4', 'Per');
        //center
        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************/
		
                             $r=mysql_query("select student_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0  AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$year."'");
                                $iinc=5;
							while($r1=mysql_fetch_object($r)){
                                //echo $r1->studid."-----";
                                $y=explode("-",$year);
                                $y1=mysql_query("select * from attendence_tbl where sem=".$_REQUEST["sem"]);
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
                                if($count>0)
                                {
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                        ->setCellValue('A'.$iinc, $r1->rollno)
                                        ->mergeCells('A'.$iinc.':B'.$iinc);
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                        ->setCellValue('C'.$iinc, $r1->fname." ".$r1->lname)
                                        ->mergeCells('C'.$iinc.':E'.$iinc);
								if(isset($attid)){
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
                                                    if($r1->studid == $stud[$i])
                                                    {
                                                        $c1--;
                                                    }
                                                }
                                            }
                                        }
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                        ->setCellValue('F'.$iinc, $c1."/".$p)
                                        ->mergeCells('F'.$iinc.':G'.$iinc);
                                    
                                 if($p!=0){ $per=(100*$c1)/$p;}else {$per=0;}
                                  $objPHPExcel->setActiveSheetIndex(0) 
                                        ->setCellValue('H'.$iinc, number_format((float)$per,2,'.','')."%");
							 }else
                                    {
                                        $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('E'.$iinc, 'NULL')
                                            ->mergeCells('E'.$iinc.':F'.$iinc);
                                        $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('G'.$iinc, 'NULL')
                                            ->mergeCells('G'.$iinc.':H'.$iinc);
                                    }
                                    
                                    $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":H".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":H".$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":H".$iinc)->getAlignment()
                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                }
                                $iinc++;
                            }
		/*********************Add data entries END**********************/
		
		/*********************Autoresize column width depending upon contents START**********************/
        foreach(range('A','H') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}
		/*********************Autoresize column width depending upon contents END***********************/
		//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');
        //Make heading font bold
		
		/*********************Add color to heading START**********************/
		/*********************Add color to heading END***********************/
		
		$objPHPExcel->getActiveSheet()->setTitle('userReport'); //give title to sheet
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;Filename=$filename.xls");
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');

        echo "<script>location.href='../internal_30.php';<script>";
	   
?>