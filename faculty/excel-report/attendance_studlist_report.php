<?php
        include("DatabaseFiles/cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Student List'; //your file name
		$objPHPExcel = new PHPExcel();
        /******************************Header********************************/
        /**************************************Name**************************/
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'IQRA BCA COLLEGE')
					->mergeCells('A1:K1');
        //Center    
        $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A1:K1")->getFont()->setName('Josefin Sans')->setSize(25)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle('A1:K1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
        /********************************Address**************************/
        $border_style= array('borders' => array('top' => array('style' => 
        PHPExcel_Style_Border::BORDER_THICK,'color' => array('rgb' => '6C8391'),)));
        $objPHPExcel->getActiveSheet()->getStyle("A3:K3")->applyFromArray($border_style);
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A2', 'Dahegam, Dahej Road ,Bharuch  PH. (02642)223484')
					->mergeCells('A2:K2');
        //Center
        $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A2:K2")->getFont()->setName('Josefin Sans')->setSize(10)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle('A2:K2')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
        /********************************Sem**************************/
        $stu=mysql_fetch_object(mysql_query("select * from student_tbl where studid=".$_REQUEST['studid']));
        if(isset($_REQUEST['year']))
        {
            $year = $_REQUEST['year'];
        }
        else
        {
            $year = $_SESSION['year'];
        }
        if(isset($_REQUEST['sem']))
        {
            $sem=$_REQUEST['sem'];   
        }
        else
        {
            $sem=$_SESSION['sem'];    
        }
        if(isset($_REQUEST['min']))
        {
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Report : Attendance')
					->mergeCells('A3:B3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('C3', 'Between : '.date('d-m-y',strtotime($_REQUEST['min']))." AND ".date('d-m-y',strtotime($_REQUEST['max'])))
                    ->mergeCells('C3:E3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('F3', 'SEM : '.$sem);
        }
        else{
            if(isset($_REQUEST['year']))
            {
                $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Report : Attendance')
					->mergeCells('A3:B3');
                $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('C3', 'Year : '.$year)
                    ->mergeCells('C3:D3'); 
                $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('E3', 'SEM : '.$sem)
                    ->mergeCells('E3:F3'); 
            }
            else{
            $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Report : Attendance')
					->mergeCells('A3:C3');
            $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('D3', 'SEM : '.$sem)
                    ->mergeCells('D3:F3'); 
            }
            
        }
        
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('G3', 'Rollno : '.$stu->rollno)
					->mergeCells('G3:H3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('I3', 'Name : '.$stu->fname." ".$stu->lname)
					->mergeCells('I3:K3');
        //Center
        $objPHPExcel->getActiveSheet()->getStyle('A3:K3')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A3:K3")->getFont()->setName('Josefin Sans')->setSize(10)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle('A3:K3')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
		/*********************Add column headings START**********************/
        //Background Color
        $objPHPExcel->getActiveSheet()
					->getStyle('A4:K4')
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setRGB('222845');
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A4:K4")->getFont()->setName('Josefin Sans')->setSize(12)->getColor()
            ->setRGB('FFFFFF');
        //Values for A4 : H4
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A4', 'Date')
                    ->mergeCells('A4:F4');
        
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('G4', 'Attendance')
                    ->mergeCells('G4:K4');
        //center
        $objPHPExcel->getActiveSheet()->getStyle('A4:K4')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************/
		                  if(isset($_REQUEST["min"]))
                            {
                                $min=$_REQUEST["min"];
                                $max=$_REQUEST["max"];
                                $r=mysql_query("select * from attendence_tbl where sem=".$sem." AND attenddate between '$min' AND '$max' order by attenddate");
                                $iinc=5;
                                while($r1=mysql_fetch_object($r))
                                {
                                    $stud=explode(",",$r1->studid);
                                    $flag=0;
                                    $col="";
                                    for($i=0;$i<count($stud)-1;$i++)
                                    {
                                        if($_REQUEST['studid'] == $stud[$i])
                                        {
                                            $flag=1;
                                            break;
                                        }
                                        else
                                        {
                                            $flag=0;
                                        }
                                    }
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('A'.$iinc, date('d-m-Y',strtotime($r1->attenddate)))
                                            ->mergeCells('A'.$iinc.':F'.$iinc);
                                    $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":F".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                    if($flag==1)
                                    {
                                        $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('G'.$iinc, 'Absent')
                                            ->mergeCells('G'.$iinc.':K'.$iinc);
                                        $objPHPExcel->getActiveSheet()->getStyle("G".$iinc.":K".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('FF0000');
                                    }
                                    elseif($flag==0)
                                    {
                                       $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('G'.$iinc, 'Present')
                                            ->mergeCells('G'.$iinc.':K'.$iinc);
                                        $objPHPExcel->getActiveSheet()->getStyle("G".$iinc.":K".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                    }
                                    //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getAlignment()
                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                    $iinc++;
                                }
                            }
                            else
                            {
                                $y=explode("-",$year);
                                $y1=mysql_query("select * from attendence_tbl where sem=".$sem);
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
                                if(isset($attid)){
                                    $iinc=5;
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
                                                if($_REQUEST['studid'] == $stud[$i])
                                                {
                                                    $flag=1;
                                                    break;
                                                }
                                                else
                                                {
                                                    $flag=0;
                                                }
                                            }
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                        ->setCellValue('A'.$iinc, date('d-m-Y',strtotime($r1->attenddate)))
                                        ->mergeCells('A'.$iinc.':F'.$iinc);
                                    $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":F".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                    if($flag==1)
                                    {
                                        $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('G'.$iinc, 'Absent')
                                            ->mergeCells('G'.$iinc.':K'.$iinc);
                                        $objPHPExcel->getActiveSheet()->getStyle("G".$iinc.":K".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('FF0000');
                                    }
                                    elseif($flag==0)
                                    {
                                       $objPHPExcel->setActiveSheetIndex(0) 
                                            ->setCellValue('G'.$iinc, 'Present')
                                            ->mergeCells('G'.$iinc.':K'.$iinc);
                                        $objPHPExcel->getActiveSheet()->getStyle("G".$iinc.":K".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                    }

                                    }
                                    //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getAlignment()
                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                 $iinc++;
                                }}   
							 }
		/*********************Add data entries END**********************/
		
		/*********************Autoresize column width depending upon contents START**********************/
        
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

        echo "<script>location.href='../index.php';<script>";
	   
?>