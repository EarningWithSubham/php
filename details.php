<?php
$token6=$_GET['token'];
$token1=base64_decode($token6);
$jsone=json_decode($token1,1);
$token7=$jsone["decode_token"];
$time=$jsone["time"];
$time1=time();
$token9=base64_decode($token7);
$token2=$token9*8;
$token3=$token2-6;
$number=$token3/7;
$file="userdata/$number/$number.txt";

if(file_exists($file)){
	if($time>$time1){
	$data=file_get_contents($file);
	$jso=json_decode($data,true);
	$name=$jso['name'];
	$password=$jso['password'];
	$added=$jso['gateway_added'];
	$botad=$jso['bot_added'];


	echo'{"status":"success","message":"token validated","name":"'.$name.'","number":"'.$number.'","password":"'.$password.'","gateway_added":"'.$added.'","bot_added":"'.$botad.'","token":"'.$token6.'"}';

	}else{echo'{"status":"false","message":"token expired login again"}';}

	}else{echo'{"status":"false","message":"token not validate"}';}
?>