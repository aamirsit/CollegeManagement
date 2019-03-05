<?php
        include("DatabaseFiles/cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Semlist'; //your file name
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
					->mergeCells('A3:C3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('D3', 'Between : '.date('d-m-y',strtotime($_REQUEST['min']))." AND ".date('d-m-y',strtotime($_REQUEST['max'])))
                    ->mergeCells('D3:H3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('I3', 'SEM : '.$sem)
                    ->mergeCells('I3:K3');
        }
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
					->setCellValue('A4', 'Rollno')
                    ->mergeCells('A4:F4');
        
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('G4', 'Attendance Date')
                    ->mergeCells('G4:K4');
        //center
        $objPHPExcel->getActiveSheet()->getStyle('A4:K4')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************/
                                $y=explode("-",$_SESSION["year"]);
                                $min=$_REQUEST["min"];
                                $max=$_REQUEST["max"];
                                $y1=mysql_query("select * from attendence_tbl where sem=".$sem." AND attenddate  between '$min' AND '$max'");
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
                                        while($r1=mysql_fetch_object($r)){
                                            //echo $r1->studid."-----";
                                            $stud=explode(",",$r1->studid);
                                            $s1="";
                                            //echo "<pre>";print_r($stud);
                                            for($i=0;$i<count($stud)-1;$i++)
                                            {
                                                $roll=mysql_fetch_object(mysql_query("select * from student_tbl where isdetend=0 AND isleave=0 AND  studid='".$stud[$i]."'"));
                                                if($roll)
                                                {    
                                                    $s1.=$roll->rollno.",";
                                                }
                                            }
                                            $objPHPExcel->setActiveSheetIndex(0) 
                                                ->setCellValue('A'.$iinc, $s1)
                                                ->mergeCells('A'.$iinc.':F'.$iinc);
                                            if(strlen($s1)>60)
                                            {
                                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":F".$iinc)->getFont()->setName('Josefin Sans')->setSize(7)->getColor()->setRGB('6C8391');
                                            }
                                            else{
                                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":F".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                            }
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                        ->setCellValue('G'.$iinc, date('d-m-Y',strtotime($r1->attenddate)))
                                        ->mergeCells('G'.$iinc.':K'.$iinc);

                                    }
                                    $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                    //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":K".$iinc)->getAlignment()
                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                 $iinc++;
                                }} 
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