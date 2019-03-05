<?php
        include("DatabaseFiles/cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Practical'; //your file name
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
        /********************************Exam,Subject,Date,Sem**************************/
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Exam : Practical')
					->mergeCells('A3:B3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('C3', 'Semester :'.$_REQUEST['sem'])
					->mergeCells('C3:D3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('E3', 'Subject:Practical'.$_REQUEST['sem'].'06')
					->mergeCells('E3:F3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('G3', 'Date :'.date('d-m-Y'))
					->mergeCells('G3:H3');
        
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
					->setCellValue('F4', 'Marks')
                    ->mergeCells('F4:H4');
        //center
        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************/
		                    $iinc=5;
                            $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_sem_tbl.studid = student_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");   
                            while($r1=mysql_fetch_object($r))
                            { 
                                $con=mysql_fetch_object(mysql_query("select * from exam_tbl where exname like 'Pra%'"));
                                $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('A'.$iinc, $r1->rollno)
                                    ->mergeCells('A'.$iinc.':B'.$iinc);
                                $objPHPExcel->setActiveSheetIndex(0) 
                                    ->setCellValue('C'.$iinc, $r1->fname." ".$r1->lname)
                                    ->mergeCells('C'.$iinc.':E'.$iinc);
                                $subb=mysql_fetch_object(mysql_query("select * from subject_tbl where sem=".$_REQUEST["sem"]." AND sname like 'Pra%'"));
                                $mr1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where smid=$r1->smid AND exid=".$con->exid." AND subid=".$subb->subid));
                                if(!$mr1)
                                {
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                                 ->setCellValue('F'.$iinc,'NULL')
                                                 ->mergeCells('F'.$iinc.':H'.$iinc);
                                }
                                else
                                {
                                    $objPHPExcel->setActiveSheetIndex(0) 
                                                 ->setCellValue('F'.$iinc,$mr1->marks)
                                                 ->mergeCells('F'.$iinc.':H'.$iinc);
                                }
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":H".$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                            
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":H".$iinc)->getFill()
                                    ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');

                                //Center    
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":H".$iinc)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
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