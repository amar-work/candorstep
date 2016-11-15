<?php
$path="http://candorstep.com/dev/signup";
$imgPath="http://candorstep.com/dev/mailImages/";
//print_r($_POST);
if(sizeof($_POST)>0){
	$mailAction=$_POST['action'];
	$sendTo=$_POST['send_to'];
	switch($mailAction){
		case "loginActivation" :
			$subject='New User Registration-Employee';
			$link=$path.$_POST['reference_link'];
			$message="Dear ".$_POST['user_name']."<br/><br/> Welcome to candorstep<br/>";
			$message.="your new account has been created please click on the below button to activate your acoount<br/>";
			$mail_button=$imgPath.'verify_account.png';
			$user_link=$path.'/'.$_POST['reference_link'];
			break;
		case "resetPaaswordRequest" :
			$subject='Password Reset Request';
			$link=$path.$_POST['reference_link'];
			$message="Dear ".$_POST['user_name']."<br/>";
			$message.="Forgot your password? Let us help you get back on track.<br/>To reset your password, click on the following button";
			$mail_button=$imgPath.'reset_pswd.png';
			$user_link=$path.'/'.$_POST['reference_link'];
			break;	
		default:	
			$subject='New User Registration-Employee';
			$link=$path.$_POST['reference_link'];
			$message="Dear ".$_POST['user_name']."<br/> Welcome to candorstep<br/>";
			$message.="your new account has been created please click on the below button to activate your acoount";
			$mail_button=$imgPath.'verify_account.png';
			
	}
	 $template='<table style="border:1px solid;color:#333;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:15px">
					<tbody><tr style="background:#f2f2f2">
					<td style="height:60px"><img src="'.$imgPath . '/candorstep_logo.png" alt="Candorstep" ></td></tr>
					<tr><td>'.$message.'</td></tr>
					
					<tr><td><br><a href="'.$user_link.'" target="_blank" ><img src="'.$mail_button.'" alt="Login to Account" ></a></td></tr>
					<tr><td>Or copy the link to browser '.$user_link.'<br></td></tr>
					<tr><td></td></tr>
					<tr><td></td></tr>
					<tr><td></td></tr>
					<tr><td>Thanks<br><span class="il">Candorstep Team</span> </td></tr>
					<tr style="background:#f2f2f2;font-family:Helvetica Neue,Helvetica,Arial,sans-serif;font-size:12px;line-height:17px;color:#777">
						<td>This e-notification is automatically generated.<br>Please do not reply to this email.</td></tr>
					<tr><td><table></table></td></tr></tbody></table>';
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

	// More headers
	mail($sendTo,$subject,$template,$headers);
	
	
	
	
}else{
	exit("herer");
}


?>