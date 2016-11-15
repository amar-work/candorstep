<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * This method is used to generate a random number for password generation.
 */
if(!function_exists('generateRandNumber')){
	
	function generateRandNumber($length=0){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return strtolower($randomString);
	}
}
if(!function_exists('gen_uuid')){
function gen_uuid($bits) {
		switch($bits){
			case "8":
				return sprintf( '%04x-%04x-%04x-%04x-%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
				break;
			case "16":
				$code='';
				return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
				break;
			case "32":
				$code='%04x%04x%04x-%04x-%04x-%04x-%04x%04x%04x';
				return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
				break;
			case "64":
				$code='%04x%04x%04x-%04x%04x%04x-%04x%04x%04x-%04x%04x%04x-%04x%04x%04x';
				$hexaFirst= sprintf( '%04x%04x%04x-%04x%04x%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
				$hexaSecond= sprintf( '%04x%04x%04x-%04x%04x%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
				return $hexaFirst.'-'.$hexaSecond;
				break;
			default:
				$code='%04x%04x-%04x-%04x-%04x-%04x%04x';
				return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x',mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ),mt_rand( 0, 0xffff ),mt_rand( 0, 0x0fff ) | 0x4000,mt_rand( 0, 0x3fff ) | 0x8000,mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ), mt_rand( 0, 0xffff ));
		}
    }
}
if(!function_exists('order_export_pdf')){
	function order_export_pdf($orderObj,$prdouctObj)
	{	//echo "<pre>";
		//print_r($prdouctObj);
		//exit();
		require (LIBRARIES_FOLDER . '/fpdf/fpdf.php');
		$CI = & get_instance ();
		$CI->load->library ( 'Pdf' );
		$pdf = new FPDF ( 'p', 'mm', 'A4' );
		$pdf->SetTitle ( 'Order Details' );
		$pdf->AddPage ();
		$pdf->setDisplayMode ('fullpage');
		$pdf->setFont ( 'times', 'B', 8 );
		$pdf->Line(10, 10, 200, 10);// top horizonal line
		$pdf->Line(10, 10, 10, 285); // first left vertical line
		$pdf->Line(200, 10, 200, 285); // first left vertical line
		$pdf->Line(10, 285, 200, 285);// bottom horizonal line
		$pdf->Image ( ADMIN_IMAGES_PATH . '/logos/logo.png',8, 2, 38, 0, 'PNG' );
		$pdf->setXY(170,02);
		$pdf->write (5,"Date:".date("d-m-Y"));
		$pdf->setXY(170,8);
		$pdf->write (0,"Vat No:36351360543");
		$pdf->Line(10, 15, 200, 15);// horizonal line 
		$pdf->setFont ( 'times', 'B', 8 );
		$pdf->setXY(10,13);
		$pdf->write (0,"Kanav Enterprises Ltd");
		$pdf->setXY(160,13);
		$pdf->write (0,"Bill No:".$orderObj['order_unique_id']);
		$pdf->setXY(10,16.5);
		$pdf->write (0,"Student Name: ".ucfirst($orderObj['student_name']));
		$pdf->setXY(170,16.5);
		$pdf->write (0,"Student Section: ".ucfirst($orderObj['section_name']));
		$pdf->setXY(10,19.5);
		$pdf->write (0,"School Name: ".ucfirst($orderObj['school_name']));
		$pdf->setXY(170,19.5);
		$pdf->write (0,"Student Class: ".$orderObj['class_name']);
		$pdf->Line(10, 21, 200, 21);// horizonal line
		$pdf->setXY(10,22.5);
		$pdf->write (0,"Product Name");
		$pdf->setXY(80,22.5);
		$pdf->write (0,"Size");
		$pdf->setXY(90,22.5);
		$pdf->write (0,"Quantity");
		$pdf->setXY(110,22.5);
		$pdf->write (0,"Price");
		$pdf->setXY(135,22.5);
		$pdf->write (0,"Total Amt");
		$pdf->setXY(163,22.5);
		$pdf->write (0,"Pending");
		$pdf->setXY(180,22.5);
		$pdf->write (0,"Delivered");
		$pdf->Line(10, 24, 200, 24);// horizonal line
		$x=10;
		$y=25;
		$total_cost='';
		foreach($prdouctObj as $keys=>$vals){
			$pdf->setXY($x,$y+2);
			$pdf->write (0,ucfirst($vals['product_name']));
			$pdf->Line(80, $y-4, 80, $y+5); // left vertical line
			$pdf->setXY(82,$y+2);
			$pdf->write (0,$vals['product_size']);
			$pdf->Line(90, $y-4, 90, $y+5); // left vertical line
			$pdf->setXY(92,$y+2);
			$pdf->write (0,$vals['product_quantity']);
			$pdf->Line(108, $y-4, 108, $y+5); // left vertical line
			$pdf->setXY(110,$y+2);
			$pdf->write (0,$vals['product_cost']/$vals['product_quantity']);
			$pdf->Line(130, $y-4, 130, $y+5); // left vertical line
			$pdf->setXY(140,$y+2);
			$pdf->write (0,$vals['product_cost'].'.00');
			$pdf->Line(162, $y-4, 162, $y+5); // left vertical line
			$pdf->setXY(165,$y+2);
			$pdf->write (0,'-');
			$pdf->Line(180, $y-4, 180, $y+5); // left vertical line
			$pdf->setXY(185,$y+2);
			$pdf->write (0,'-');
			$y=$y+4;
			$total_cost+=$vals['product_cost'];
		}
		$pdf->Line(10, $y+1, 200, $y+1);// horizonal line
		$pdf->setXY(10,$y+3);
		$pdf->write (0,'Total Amount');
		$pdf->setXY(140,$y+3);
		$pdf->write (0,$total_cost.'.00');
		$pdf->Line(10, $y+5, 200, $y+5);// horizonal line
		// for second print 
		$pdf->Line(10, $y+18, 200, $y+18);// top horizonal line
		$pdf->Image ( ADMIN_IMAGES_PATH . '/logos/logo.png',8, $y+11, 38, 0, 'PNG' );
		$pdf->setXY(170,$y+10);
		$pdf->write (5,"Date:".date("d-m-Y"));
		$pdf->setXY(170,$y+16);
		$pdf->write (0,"Vat No:36351360543");
		$pdf->Line(10, $y+22.5, 200, $y+22.5);// horizonal line 
		$pdf->setFont ( 'times', 'B', 8 );
		$pdf->setXY(10,$y+20);
		$pdf->write (0,"Kanav Enterprises Ltd");
		$pdf->setXY(160,$y+20);
		$pdf->write (0,"Bill No:".$orderObj['order_unique_id']);
		$pdf->setXY(10,$y+24.5);
		$pdf->write (0,"Student Name: ".ucfirst($orderObj['student_name']));
		$pdf->setXY(170,$y+24.5);
		$pdf->write (0,"Student Section: ".ucfirst($orderObj['section_name']));
		$pdf->setXY(10,$y+27.5);
		$pdf->write (0,"School Name: ".ucfirst($orderObj['school_name']));
		$pdf->setXY(170,$y+27.5);
		$pdf->write (0,"Student Class: ".$orderObj['class_name']);
		$pdf->Line(10, $y+29, 200, $y+29);// horizonal line
		$pdf->setXY(10,$y+30.5);
		$pdf->write (0,"Product Name");
		$pdf->setXY(80,$y+30.5);
		$pdf->write (0,"Size");
		$pdf->setXY(90,$y+30.5);
		$pdf->write (0,"Quantity");
		$pdf->setXY(110,$y+30.5);
		$pdf->write (0,"Price");
		$pdf->setXY(135,$y+30.5);
		$pdf->write (0,"Total Amt");
		$pdf->setXY(163,$y+30.5);
		$pdf->write (0,"Pending");
		$pdf->setXY(180,$y+30.5);
		$pdf->write (0,"Delivered");
		$pdf->Line(10, $y+32, 200, $y+32);// horizonal line
		$x=10;
		$y=$y+33;
		$total_cost='';
		foreach($prdouctObj as $keys=>$vals){
			$pdf->setXY($x,$y+2);
			$pdf->write (0,ucfirst($vals['product_name']));
			$pdf->Line(80, $y-4, 80, $y+5); // left vertical line
			$pdf->setXY(82,$y+2);
			$pdf->write (0,$vals['product_size']);
			$pdf->Line(90, $y-4, 90, $y+5); // left vertical line
			$pdf->setXY(92,$y+2);
			$pdf->write (0,$vals['product_quantity']);
			$pdf->Line(108, $y-4, 108, $y+5); // left vertical line
			$pdf->setXY(110,$y+2);
			$pdf->write (0,$vals['product_cost']/$vals['product_quantity']);
			$pdf->Line(130, $y-4, 130, $y+5); // left vertical line
			$pdf->setXY(140,$y+2);
			$pdf->write (0,$vals['product_cost'].'.00');
			$pdf->Line(162, $y-4, 162, $y+5); // left vertical line
			$pdf->setXY(165,$y+2);
			$pdf->write (0,'-');
			$pdf->Line(180, $y-4, 180, $y+5); // left vertical line
			$pdf->setXY(185,$y+2);
			$pdf->write (0,'-');
			$y=$y+4;
			$total_cost+=$vals['product_cost'];
		}
		$pdf->Line(10, $y+1, 200, $y+1);// horizonal line
		$pdf->setXY(10,$y+3);
		$pdf->write (0,'Total Amount');
		$pdf->setXY(140,$y+3);
		$pdf->write (0,$total_cost.'.00');
		$pdf->Line(10, $y+5, 200, $y+5);// horizonal line
		// third bill print 
		$pdf->Line(10, $y+18, 200, $y+18);// top horizonal line
		$pdf->Image ( ADMIN_IMAGES_PATH . '/logos/logo.png',8, $y+11, 38, 0, 'PNG' );
		$pdf->setXY(170,$y+10);
		$pdf->write (5,"Date:".date("d-m-Y"));
		$pdf->setXY(170,$y+16);
		$pdf->write (0,"Vat No:36351360543");
		$pdf->Line(10, $y+22.5, 200, $y+22.5);// horizonal line 
		$pdf->setFont ( 'times', 'B', 8 );
		$pdf->setXY(10,$y+20);
		$pdf->write (0,"Kanav Enterprises Ltd");
		$pdf->setXY(160,$y+20);
		$pdf->write (0,"Bill No:".$orderObj['order_unique_id']);
		$pdf->setXY(10,$y+24.5);
		$pdf->write (0,"Student Name: ".ucfirst($orderObj['student_name']));
		$pdf->setXY(170,$y+24.5);
		$pdf->write (0,"Student Section: ".ucfirst($orderObj['section_name']));
		$pdf->setXY(10,$y+27.5);
		$pdf->write (0,"School Name: ".ucfirst($orderObj['school_name']));
		$pdf->setXY(170,$y+27.5);
		$pdf->write (0,"Student Class: ".$orderObj['class_name']);
		$pdf->Line(10, $y+29, 200, $y+29);// horizonal line
		$pdf->setXY(10,$y+30.5);
		$pdf->write (0,"Product Name");
		$pdf->setXY(80,$y+30.5);
		$pdf->write (0,"Size");
		$pdf->setXY(90,$y+30.5);
		$pdf->write (0,"Quantity");
		$pdf->setXY(110,$y+30.5);
		$pdf->write (0,"Price");
		$pdf->setXY(135,$y+30.5);
		$pdf->write (0,"Total Amt");
		$pdf->setXY(163,$y+30.5);
		$pdf->write (0,"Pending");
		$pdf->setXY(180,$y+30.5);
		$pdf->write (0,"Delivered");
		$pdf->Line(10, $y+32, 200, $y+32);// horizonal line
		$x=10;
		$y=$y+33;
		$total_cost='';
		foreach($prdouctObj as $keys=>$vals){
			$pdf->setXY($x,$y+2);
			$pdf->write (0,ucfirst($vals['product_name']));
			$pdf->Line(80, $y-4, 80, $y+5); // left vertical line
			$pdf->setXY(82,$y+2);
			$pdf->write (0,$vals['product_size']);
			$pdf->Line(90, $y-4, 90, $y+5); // left vertical line
			$pdf->setXY(92,$y+2);
			$pdf->write (0,$vals['product_quantity']);
			$pdf->Line(108, $y-4, 108, $y+5); // left vertical line
			$pdf->setXY(110,$y+2);
			$pdf->write (0,$vals['product_cost']/$vals['product_quantity']);
			$pdf->Line(130, $y-4, 130, $y+5); // left vertical line
			$pdf->setXY(140,$y+2);
			$pdf->write (0,$vals['product_cost'].'.00');
			$pdf->Line(162, $y-4, 162, $y+5); // left vertical line
			$pdf->setXY(165,$y+2);
			$pdf->write (0,'-');
			$pdf->Line(180, $y-4, 180, $y+5); // left vertical line
			$pdf->setXY(185,$y+2);
			$pdf->write (0,'-');
			$y=$y+4;
			$total_cost+=$vals['product_cost'];
		}
		$pdf->Line(10, $y+1, 200, $y+1);// horizonal line
		$pdf->setXY(10,$y+3);
		$pdf->write (0,'Total Amount');
		$pdf->setXY(140,$y+3);
		$pdf->write (0,$total_cost.'.00');
		$pdf->Line(10, $y+5, 200, $y+5);// horizonal line
		$pdf->output ( 'Kappaas_Order.pdf', 'I' );
		/*require('html_table.php');
		$CI = & get_instance ();
		$CI->load->library ( 'Pdf' );
		$pdf=new PDF();
		$pdf->AddPage();
		$pdf->SetFont('Arial','',12);
		$html='<table border="1"><tr><td width="200" height="30">cell 1</td><td width="200" height="30" bgcolor="#D0D0FF">cell 2</td></tr><tr><td width="200" height="30">cell 3</td><td width="200" height="30">cell 4</td></tr></table>';
		$pdf->WriteHTML($html);
		$pdf->Output();*/
		
		
	}
}

if(!function_exists('send_email_helper')){
	function send_email_helper($mailObj)
	{
		$config = Array(
               'protocol' => 'smtp',
               'smtp_host' => 'ssl://smtp.googlemail.com',
               'smtp_port' => '465',
               'smtp_user' => 'entrac.ind@gmail.com',
               'smtp_pass' => 'entr@c!nd',
               'mailtype'  => 'html',
               'charset'   => 'utf-8'
           );
		$CI =& get_instance();
		$CI->load->library('email', $config);
		$CI->email->set_newline("\r\n");
		$CI->email->clear(TRUE);
		$CI->email->from($mailObj['from'], $mailObj['from_role']);
		$CI->email->to($mailObj['send_to']);
		$CI->email->cc($mailObj['send_to']); 
		$CI->email->subject($mailObj['subject']);
		//$CI->email->attach($mailObj['attachemnt']);  /* Enables you to send an attachment */
		$CI->email->message(urldecode($mailObj['message']));
		$mailStatus = $CI->email->send();
		return $mailStatus;
	}
}
if(!function_exists('mailcurl')){
	function mailcurl($mailObj)
	{
	$url = 'http://candorstep.com/dev/mail.php';
	
	//url-ify the data for the POST
	$field_string = http_build_query($mailObj);

	//open connection
	$ch = curl_init();

	//set the url, number of POST vars, POST data
	curl_setopt($ch,CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS, $field_string);

	//execute post
	$result = curl_exec($ch);
	//echo $result;

	//close connection
	curl_close($ch);
	}
}

if(!function_exists('time_ago')){
	function time_ago($date_time)
	{
		$date2= date_create(date('Y-m-d H:i:s'));
		$date1= date_create($date_time);
		$diff=date_diff($date1,$date2);
		$left='0 sec ago';
		if($date1 < $date2)
		{
			if($diff->s != 0)
				$left = $diff->s.' sec ago';
			if($diff->i != 0)
				$left = $diff->i.' mins ago';
			if($diff->h != 0)
				$left = $diff->h.' hours ago';
			if($diff->d != 0)
				$left = $diff->d.' days ago';
			if($diff->m != 0)
				$left = $diff->m.' months ago';
			if($diff->y != 0)
				$left = $diff->y.' years ago';
		}
	
		return $left;
	}
}

if(!function_exists('generateBreadcrumb')){
	function generateBreadcrumb(){
		$ci = &get_instance();
		$i=1;
		$uri = $ci->uri->segment($i);
		$link = '
  <div class="pageheader">
      <h2><i class="fa fa-edit"></i>'.$ci->uri->segment($i).'</h2>
      <div class="breadcrumb-wrapper">

  <ol class="breadcrumb">';

		while($uri != ''){
			$prep_link = '';
			for($j=1; $j<=$i;$j++){
				$prep_link .= $ci->uri->segment($j).'/';
			}

			if($ci->uri->segment($i+1) == ''){
				$link.='<li class="active"><a href="'.site_url($prep_link).'">';
				$link.=$ci->uri->segment($i).'</a></li> ';
			}else{
				$link.='<li><a href="'.site_url($prep_link).'">';
				$link.=$ci->uri->segment($i).'</a><span class="divider"></span></li> ';
			}

			$i++;
			$uri = $ci->uri->segment($i);
		}
		$link .= '</ol></div></div>';
		return $link;
	}
}

if (! function_exists ( 'neatPrintAndDie' )) {
	function neatPrintAndDie($variable) {
		echo "<pre>";
		print_r ( $variable );
		echo "</pre>";
		die ();
	}
}
if(!function_exists('loadViewHelper')){
	function loadViewHelper($filepath,$data){
		$CI =& get_instance();
		
			if(isset($CI->session->userdata['logged_in'])){
				$header= $CI->session->userdata['logged_in']['usr_role']=='candidate'?'layout/candidateHeader':'layout/employerHeader';
				$footer= $CI->session->userdata['logged_in']['usr_role']=='candidate'?'layout/candidateFooter':'layout/employerFooter';
			}else{
				$header='layout/cmsHeader';	
				$footer='layout/footer';	
			}
			$CI->load->view('layout/header');
			$CI->load->view($header);
			$CI->load->view($filepath,$data);
			$CI->load->view($footer);
		
	}
	
}