<?php
$number=$_GET['number'];
$password=$_GET['password'];
$file="userdata/$number/$number.txt";
if(!$number){echo'{"statua":"false","message":"provide number"}';}else{
	if($number<5999999999){echo'{"status":"false","message":"invalid number"}';}else{
	if(!$password){echo'{"status":"false","message":"provide password"}';}else{
if(file_exists($file)){
	$data=file_get_contents($file);
$json=json_decode($data,true);
$password1=$json['password'];
$status=$json['status'];
$token6=$json['token'];
$token1=base64_decode($token6);
$jsone=json_decode($token1,1);
$token7=$jsone["decode_token"];
$time=time();
$time1=$time+86400;
$token94='{"decode_token":"'.$token7.'","time":"'.$time1.'"}';
$token=base64_encode($token94);
if($password1==$password){
  if($status=='active'){
  
  echo'{"status":"true","message":"login success","token":"'.$token.'"}';
  }else{echo'{"status":"false","message":"Your Account not Activated, Contact to dminn"}';}
  
  
  
  
  
}
	else{echo'{"status":"false","message":"wrong password"}';}

	}else{echo'{"status":"false","message":"number not rejester"}';}

}}}




?>
