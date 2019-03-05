<?php
        include("DatabaseFiles/cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once 'PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Pass'; //your file name
		$objPHPExcel = new PHPExcel();
        if($_REQUEST["sem"]==6)
        {
            $nm='H';
            $mn='F';
            $mm='G';
        }
        else{
            $nm='I';
            $mn='G';
            $mm='H';
        }
        /******************************Header********************************/
        /**************************************Name**************************/
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'IQRA BCA COLLEGE')
					->mergeCells('A1:'.$nm.'1');
        //Center    
        $objPHPExcel->getActiveSheet()->getStyle("A1:".$nm."1")->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A1:".$nm."1")->getFont()->setName('Josefin Sans')->setSize(25)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle("A1:".$nm."1")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
        /********************************Address**************************/
        $border_style= array('borders' => array('top' => array('style' => 
        PHPExcel_Style_Border::BORDER_THICK,'color' => array('rgb' => '6C8391'),)));
        $objPHPExcel->getActiveSheet()->getStyle("A3:".$nm."3")->applyFromArray($border_style);
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A2', 'Dahegam, Dahej Road ,Bharuch  PH. (02642)223484')
					->mergeCells("A2:".$nm."2");
        //Center
        $objPHPExcel->getActiveSheet()->getStyle("A2:".$nm."2")->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A2:".$nm."2")->getFont()->setName('Josefin Sans')->setSize(10)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle("A2:".$nm."2")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
        /********************************Exam,Subject,Date,Sem**************************/
        $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST['exid']));
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A3', 'Exam :'.$ex->exname)
					->mergeCells('A3:B3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('C3', 'Semester :'.$_REQUEST['sem'])
					->mergeCells('C3:D3');
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('E3', 'Report :Pass Students')
					->mergeCells("E3:".$mn."3");
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($mm."3", 'Date :'.date('d-m-Y'))
					->mergeCells($mm."3:".$nm."3");
        
        //Center
        $objPHPExcel->getActiveSheet()->getStyle("A3:".$nm."3")->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A3:".$nm."3")->getFont()->setName('Josefin Sans')->setSize(10)->getColor()
            ->setRGB('6C8391');
        //Background Color
         $objPHPExcel->getActiveSheet()->getStyle("A3:".$nm."3")->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
             ->getStartColor()->setRGB('F7F7F7');
		/*********************Add column headings START**********************/
        //Background Color
        $objPHPExcel->getActiveSheet()
					->getStyle("A4:".$nm."4")
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setRGB('222845');
        //Font& Color    
        $objPHPExcel->getActiveSheet()->getStyle("A4:".$nm."4")->getFont()->setName('Josefin Sans')->setSize(12)->getColor()
            ->setRGB('FFFFFF');
        //Values for A4 : H4
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A4', 'Rollno')
					->setCellValue('B4', 'Name');
        $chr=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
        $count=0;
        $ainc=2;
		$c=mysql_query("select * from subject_tbl where sname!='Practical' AND sem=".$_REQUEST["sem"]." order by scode");
		while($c1=mysql_fetch_object($c)){
        $subid[]=$c1->subid;
        $count++;
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($chr[$ainc].'4',$c1->sname);
            $ainc++;
        }
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($chr[$ainc].'4','Total');
        $ainc++;
        $objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($chr[$ainc].'4','Percentage');
        //center
        $objPHPExcel->getActiveSheet()->getStyle('A4:'.$chr[$ainc].'4')->getAlignment()
            ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************/
                            $fail1=0;
                            $key=0;
                             $total=0;
                            $c2=0;
							$e=mysql_query("select student_tbl.*,student_sem_tbl.* from student_sem_tbl inner join student_tbl where student_tbl.studid=student_sem_tbl.studid AND student_tbl.isdetend=0 AND student_tbl.isleave=0 AND student_sem_tbl.sem=".$_REQUEST["sem"]." AND student_sem_tbl.year='".$_SESSION["year"]."'");
							while($e1=mysql_fetch_object($e)){
                                for($i=0;$i<$count;$i++)
                                        {   $m1=mysql_fetch_object(mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]."      and smid=$e1->smid and subid=$subid[$i]"));
                                            $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));       
                                            if($ex->exname=="Internal")
                                            { if($m1!=null){
                                                $total=$total+$m1->marks;
                                                if($m1->marks<17)
                                                {
                                                    $fail1++;
                                                }   
                                            }
                                            }
                                            else
                                            { if($m1!=null){
                                                $total=$total+$m1->marks;
                                                if($m1->marks<7)
                                                {
                                                    $fail1++;
                                                }   
                                            }
                                            }
                                        }
                                //echo "<script>alert($fail1);</script>";
                                if($fail1==0)
                                {
                                    $c2++;
                                    $roll[$key]=$e1->rollno;
                                    $totalmr[$key]=$total;
                                    $stud[$key]=$e1->smid;
                                    $studname[$key]=$e1->fname." ".$e1->lname;
                                    $key++;
                                }
                                $fail1=0;
                            }$key=0;
                            $iinc=5;
                            
                            for($j=0;$j<$c2;$j++)
                                {
                                    $ainc=0; $chr=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
                                           $objPHPExcel->setActiveSheetIndex(0) 
                                                ->setCellValue($chr[$ainc].$iinc, $roll[$j]);
                                           $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc)->getAlignment()
                                                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                               $ainc++;
                                           $objPHPExcel->setActiveSheetIndex(0) 
                                                ->setCellValue($chr[$ainc].$iinc,$studname[$j]);
                                        $total=0;
                                        $per=0;
                                        $fail=0;
                                        $cc=0;
                                            for($i=0;$i<$count;$i++)
                                                {   $m=mysql_query("select * from exam_result_tbl where exid=".$_REQUEST["exid"]." and smid=$stud[$j] and subid=$subid[$i]");
                                                    while($m1=mysql_fetch_object($m))
                                                    {
                                                    $total=$total+$m1->marks;
                                                    if($subid[$i]==$m1->subid)
                                                    {   $ex=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                                        //echo $m1->subid." ".$subid[$i];
                                                        $ainc++;
                                                        $objPHPExcel->setActiveSheetIndex(0) 
                                                               ->setCellValue($chr[$ainc].$iinc,$m1->marks);
                                                    }
                                                }
                                                 
                                                    if(mysql_num_rows($m)<=0)
                                                    { $cc++;
                                                        $ainc++;
                                                        $objPHPExcel->setActiveSheetIndex(0) 
                                                                ->setCellValue($chr[$ainc].$iinc,'NULL');
                                                    }
                                                }
                                            $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":".$chr[$ainc].$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle("A".$iinc.":".$chr[$ainc].$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                            $objPHPExcel->getActiveSheet()->getStyle('C'.$iinc.":".$chr[$ainc].$iinc)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                        $ainc++;
                                if($cc==0){
                                
                                           $objPHPExcel->setActiveSheetIndex(0) 
                                                        ->setCellValue($chr[$ainc].$iinc,$total);
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                                           $ainc++;
                                $rr=mysql_fetch_object(mysql_query("select * from exam_tbl where exid=".$_REQUEST["exid"]));
                                if($_REQUEST["sem"]==6)
                                {
                                    $per=$total*100/2/$rr->marks;
                                }
                                else
                                {
                                    $per=$total*100/5/$rr->marks;
                                }
                                           $objPHPExcel->setActiveSheetIndex(0) 
                                                        ->setCellValue($chr[$ainc].$iinc,round($per).'%');
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                  }else{ $objPHPExcel->setActiveSheetIndex(0) 
                                                        ->setCellValue($chr[$ainc].$iinc,'NULL');
                                        $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); 
                                           $ainc++;
                                           $objPHPExcel->setActiveSheetIndex(0) 
                                                        ->setCellValue($chr[$ainc].$iinc,'NULL'); 
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFont()->setName('Josefin Sans')->setSize(11)->getColor()->setRGB('6C8391');
                                
                                //Background Color
                                $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getFill()
                                ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F7F7F7');
                                
                                //Center    
                                            $objPHPExcel->getActiveSheet()->getStyle($chr[$ainc].$iinc.":".$chr[$ainc].$iinc)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                                       }
                                        $iinc++;
                                    }

		/*********************Add data entries END**********************/
		
		/*********************Autoresize column width depending upon contents START**********************/
        foreach(range('A',$chr[$ainc]) as $columnID) {
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