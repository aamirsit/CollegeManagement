<?php
        include("DatabaseFiles/cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Internal 30'; //your file name
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
        $ssub=mysql_fetch_object(mysql_query("select * from subject_tbl where subid=".$_REQUEST['subid']));
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Exam : Internal (30)')
					->mergeCells('A3:B3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('C3', 'Semester :'.$ssub->sem)
					->mergeCells('C3:D3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('E3', 'Subject :'.$ssub->sname)
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
					->setCellValue('B4', 'Name')
					->setCellValue('C4', 'Internal')
					->setCellValue('D4', 'Unit Test')
					->setCellValue('E4', 'Attendance')
                    ->setCellValue('F4', 'Performance')
                    ->setCellValue('G4', 'Total')
                    ->mergeCells('G4:H4');
        //center
        $objPHPExcel->getActiveSheet()->getStyle('A4:H4')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************/
		
                             $cc=0;  
							 $r=mysql_query("select student_tbl.*,student_sem_tbl.* from student_tbl inner join student_sem_tbl where student_tbl.studid = student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$ssub->sem." AND student_sem_tbl.year='".$_SESSION["year"]."'");
                             $exinc=5;   
							while($r1=mysql_fetch_object($r)){
                                $c=mysql_query("select count(*) c from attendence_tbl a,student_sem_tbl s where a.sem=s.sem AND s.sem=".$ssub->sem." AND s.year='".$_SESSION["year"]."' group by a.attenddate");
                                $count=mysql_num_rows($c);
                                $c1=$count;
                                $intotal=0;
                                 $p=$c1;
                                 $y=$p;
                                $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('A'.$exinc, $r1->rollno)
                                    ->setCellValue('B'.$exinc, $r1->fname." ".$r1->lname); 
                                //FOR Internal
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
                                $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('C'.$exinc, round($imarks));
                                $intotal=$intotal+round($imarks);
                                }
                                else{ $cc++;
                                     $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('C'.$exinc,'Pending...');
                                }
                                //For Unit Test
                                     $total=0;
                                     $per=0;
                                    $count=0;
                                    $uinc=0;
                                    $q=mysql_query("select * from exam_tbl where exname like 'U%'");
                                    $sub=0;
                                    while($q1=mysql_fetch_object($q))
                                    {
                                        $qq=mysql_query("SELECT * FROM exam_result_tbl ex INNER JOIN student_sem_tbl ss where ex.smid=ss.smid and ss.sem=".$ssub->sem." and ss.year='".$_SESSION["year"]."' and ex.exid=".$q1->exid." group by ex.exid");
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
                                  $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('D'.$exinc, round($umarks)); $intotal=$intotal+round($umarks);
                                    }else
                                    {
                                        $cc++;
                                        $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('D'.$exinc,'Pending...');
                                    }
                                
                                //For Attendance
                                        $q=mysql_query("select a.* from attendence_tbl a,student_sem_tbl s where a.sem=s.sem AND s.sem=".$ssub->sem." AND s.year='".$_SESSION["year"]."' group by a.attenddate");
                                        
                                       
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
                                            } 
                                        }
                                if(mysql_num_rows($q)>0){
                                $atmarks=(5*$y)/$p;
                                $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('E'.$exinc, round($atmarks));
                                    $intotal=$intotal+round($atmarks);
                                }else{$cc++; 
                                      $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('E'.$exinc, 'Pending...');}
                                
                               //For Performance
                                
                                $total=0;
                                    $en=mysql_fetch_object(mysql_query("select * from exam_tbl where exname like 'Per%'"));
                                    $m=mysql_query("select * from exam_result_tbl where exid=".$en->exid." and smid=$r1->smid and subid=".$_REQUEST["subid"]);
                                            while($m1=mysql_fetch_object($m))
                                            {
                                                $total=$total+$m1->marks;
                                            }
                                if(mysql_num_rows($m)>0){
                                $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('F'.$exinc,$total); $intotal=$intotal+round($total);
                                }else{ $cc++; $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('F'.$exinc, 'Pending...');}
                                // For Total
                                if($cc==0){
			                       $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('G'.$exinc, $intotal)
                                    ->mergeCells('G'.$exinc.':H'.$exinc);}else{ $objPHPExcel->setActiveSheetIndex(0) 
					                ->setCellValue('G'.$exinc, 'Pending...')
                                    ->mergeCells('G'.$exinc.':H'.$exinc);}
                                
                                $objPHPExcel->getActiveSheet()->getStyle("A".$exinc.":H".$exinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$exinc.":H".$exinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                $objPHPExcel->getActiveSheet()->getStyle("C".$exinc.":H".$exinc)->getAlignment()
                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                $objPHPExcel->getActiveSheet()->getStyle("A".$exinc)->getAlignment()
                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                $exinc++;
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