<?php
		include("../cn.php");
		date_default_timezone_set('Asia/Kolkata');
		require_once '../PHPExcel/Classes/PHPExcel.php';
		
		$filename = 'Fabric '.date("d-m-Y"); //your file name
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'Fabric Stock ('.date("d-m-Y").")")
					->mergeCells('A1:E1')
					->setCellValue('A2', 'COLOUR')
					->setCellValue('A3', 'FABRIC');
					
		/************************ Header  ****************************/			
		$alpha=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");	
		$i=1;		
		$c=mysql_query("select * from tbl_color");
		while($c1=mysql_fetch_object($c))
		{
			$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($alpha[$i]."2", $c1->color_name)
					->setCellValue($alpha[$i]."3", "KGS")
					->setCellValue($alpha[$i+1]."3", "MTR")
					->mergeCells($alpha[$i++].'2:'.$alpha[$i++].'2');
					
		}
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($alpha[$i]."2", "Total Amount");
			
		/************************ Content  ****************************/			
		$f=$db->select("tbl_item_type where item_id=1");
		$fi=5;
		
		while($f1=mysql_fetch_object($f))
		{
			$j=1;
			$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue("A".$fi, $f1->type_name);
			$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue("A".($fi+1), "Stock Amt");
			$c=mysql_query("select * from tbl_color");
			$tp=$tavg=$tremain=0;
			while($c1=mysql_fetch_object($c))
			{		
				$stock=mysql_fetch_object(mysql_query("select * from tbl_item_detail where it_id='".$f1->it_id."' and color_id='".$c1->color_id."' and measure='KGS'"));
				$stock1=mysql_fetch_object(mysql_query("select * from tbl_item_detail where it_id='".$f1->it_id."' and color_id='".$c1->color_id."' and measure='MTR'"));
				$price=mysql_query("select ped.* from tbl_purchase_order po,tbl_purchase_order_detail pod,tbl_purchase_entry_detail ped where po.po_id=pod.po_id and pod.pod_id=ped.pod_id and po.item_id=1 and pod.it_id='".$f1->it_id."' and pod.color_id='".$c1->color_id."'");
								
				if(mysql_num_rows($price)>0)
				{
					$p=$avg=$remain=0;
					while($price1=mysql_fetch_object($price))
					{
						$p=$p+($price1->rate * $price1->remain);
						$remain=$remain+$price1->remain;
					}
					$avg=$p/$remain;
					$tp=$tp+$p;
					$tremain=$tremain+$remain;
					$objPHPExcel->setActiveSheetIndex(0) 
								->setCellValue($alpha[$j].($fi+1), $p."(avg:".$avg.")")
								->mergeCells($alpha[$j].($fi+1).':'.$alpha[$j+1].($fi+1));
				}
				if($stock->stock=="")
					$kgs=0;
				else
					$kgs=$stock->stock;
					
				if($kgs<20)
				{
					cellColor($alpha[$j].$fi, 'FFFF00');
					
				}
				if($stock1->stock=="")
					$mtr=0;
				else
					$mtr=$stock1->stock;
				if($mtr<20)
				{
					cellColor($alpha[$j+1].$fi, 'FFFF00');
						
				}
				$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($alpha[$j++].$fi, $kgs);
				$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($alpha[$j++].$fi, $mtr);	
			}
			$tavg=$tp/$tremain;
			$tavg=round($tavg,2);
			$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue($alpha[$j++].($fi+1), $tp."(avg:".$tavg.")");
					$fi=$fi+3;
			
		}
		
		function cellColor($cells,$color){
			global $objPHPExcel;
		
			$objPHPExcel->getActiveSheet()->getStyle($cells)->getFill()->applyFromArray(array(
				'type' => PHPExcel_Style_Fill::FILL_SOLID,
				'startcolor' => array(
					 'rgb' => $color
				)
			));
		}


		/*********************Add column headings START**********************
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A1', 'Fabric Stock'.date("d-m-Y"))
					->setCellValue('B1', 'Email')
					->setCellValue('C1', 'Date of Registration')
					->setCellValue('D1', 'Total count of login')
					->setCellValue('E1', 'Facebook Login');
		/*********************Add column headings END**********************/
		
		// You can add this block in loop to put all ur entries.Remember to change cell index i.e "A2,A3,A4" dynamically 
		/*********************Add data entries START**********************
		$objPHPExcel->setActiveSheetIndex(0) 
					->setCellValue('A2', 'Dinesh Belakare')
					->setCellValue('B2', 'dineshluck1@gmail.com')
					->setCellValue('C2', '07-08-2015')
					->setCellValue('D2', '5')
					->setCellValue('E2', 'No');
		/*********************Add data entries END**********************/
		
		/*********************Autoresize column width depending upon contents START**********************/
        foreach(range('A','P') as $columnID) {
			$objPHPExcel->getActiveSheet()->getColumnDimension($columnID)->setAutoSize(true);
		}
		/*********************Autoresize column width depending upon contents END***********************/
		//$objPHPExcel->setActiveSheetIndex(0)->mergeCells('A1:E1');
		$objPHPExcel->getActiveSheet()->getStyle('A1:E1')->getFont()->setBold(true); //Make heading font bold
		
		/*********************Add color to heading START**********************/
		$objPHPExcel->getActiveSheet()
					->getStyle('A1:E1')
					->getFill()
					->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
					->getStartColor()
					->setARGB('99ff99');
		/*********************Add color to heading END***********************/
		
		$objPHPExcel->getActiveSheet()->setTitle('Fabric'); //give title to sheet
		$objPHPExcel->setActiveSheetIndex(0);
		header('Content-Type: application/vnd.ms-excel');
		header("Content-Disposition: attachment;Filename=$filename.xls");
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		$objWriter->save('php://output');
		
	
?>