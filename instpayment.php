<?php
$token6=$_GET['token'];
$id=$_GET['offerid'];
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
$tg="userdata/$number/camps/$id.txt";
if(file_exists($tg)){
$data=file_get_contents($file);
$jso=json_decode($data,true);
$added=$jso['gateway_added'];
$botad=$jso['bot_added'];
if($added=='true'){
if($botad=='true'){
$file1="gatew/$number/$number.txt";
$file2="bottel/$number/$number.txt";
$file3="userdata/$number/camps/$id.txt";
$data1=file_get_contents($file1);
$data2=file_get_contents($file2);
$data3=file_get_contents($file3);
$json1=json_decode($data1,true);
$json2=json_decode($data2,true);
$json3=json_decode($data3,true);
$bottoken=$json2['bottoken'];
$telid=$json2['telid'];

$peruser=$json3['peruser'];
$perrefer=$json3['perrefer'];
$refernumber=$_GET['refernumber'];
$usernumber=$_GET['usernumber'];
$event=$_GET['event'];
$refer1=$json3['total_refer'];
$refer=$refer1+1;
$msg=$json3['message'];
$de='{"perrefer":"'.$perrefer.'","peruser":"'.$peruser.'","event":"'.$event.'","message":"'.$msg.'","total_refer":"'.$refer.'"}';
file_put_contents("userdata/$number/camps/$id.txt",''.$de.'');

$massege=urlencode("$msg");
$type=$json1['type'];
if($type=='f'){$gas="FULL2SMS GATEWAY";}
elseif($type=='e'){$gas="RARNING AREA GATEWAY";}
$tex='*🚀New Conversation🚀*

🔑Gateway ==> *'.$gas.'*

🔰Event ==> *'.$event.'*

🤝Payment Status ==> *Successful*

❇️Paytm Number ==> *'.$refernumber.'*
♻️Refer Amount ==> *'.$perrefer.'*

❇️Paytm Number ==> *'.$usernumber.'*
🎉User Amount ==> *'.$peruser.'*

💝Devloper ==> *@I_AMANKIT*';

$file9="userdata/$number/ban/$refernumber.txt";
if(file_exists($file9)){
echo'{"status":"false","message":"your number banned"}';
}else{
$files="userdata/$number/ban/$usernumber.txt";
if(file_exists($files)){
echo'{"status":"false","message":"your number banned"}';
}else{
$text=urlencode("$tex");
$url99='https://api.telegram.org/bot'.$bottoken.'/sendMessage?chat_id='.$telid.'&text='.$text.'&parse_mode=markdown';
$headers[]='user-agent: Mozilla/5.0 (Linux; Android 10; TECNO KE6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.99 Mobile Safari/537.36';
$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url99);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_HTTPHEADER,$headers);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$output=curl_exec($ch);

if($type=='f'){
	$mkey=$json1['mkey'];
$mid=$json1['mid'];
$giud=$json1['guid'];
$url51="https://job2all.xyz/api/index.php?mid=$mid&mkey=$mkey&guid=$guid&mob=$usernumber&amount=$peruser&info=$massege";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url51);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$output=curl_exec($ch);
curl_close($ch);
$url5="https://job2all.xyz/api/index.php?mid=$mid&mkey=$mkey&guid=$guid&mob=$refernumber&amount=$perrefer&info=$massege";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url5);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$output=curl_exec($ch);
curl_close($ch);}
if($type=='e'){$key=$json1['key'];
$mid=$json1['mid'];
$gtoken=$json1['gtoken'];
$url5="https://api.earningarea.in/?key=$key&token=$gtoken&mid=$mid&amo=$peruser&num=$usernumber&com=$massege";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url5);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$output=curl_exec($ch);
curl_close($ch);
$url5="https://api.earningarea.in/?key=$key&token=$gtoken&mid=$mid&amo=$perrefer&num=$refernumber&com=$massege";

$ch=curl_init();
curl_setopt($ch,CURLOPT_URL,$url5);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
$output=curl_exec($ch);
curl_close($ch);}
		echo'{"status":"true","message":"payment transfered"}';}}
}else{echo'{"status":"false","message":"first add bot"}';}
}else{echo'{"status":"false","message":"first add gateway"}';}
}else{echo'{"status":"false","message":"invalid offer id"}';}}else{echo'{"status":"false","message":"token not validate"}';}



?>