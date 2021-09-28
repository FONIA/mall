<?php
error_reporting(0);
require("./mA8n_fUn/common.php");
if(!defined('CHECK_REAL'))exit;
function resend($msg){
	$result=array("code"=>-1,"msg"=>$msg,"data"=>$data);
	exit(json_encode($result));
}
$times=stopview();
if($times<=300){
function datasave($data){
	$n = array();
	$a = explode(",",$data);
	$c = count($a);
	for ( $i =0; $i < $c; $i ++ ){
	$n[]= daddslashes($a[$i]);	
	}
	return $n;
}
function iansertcheck($inserdata,$selt){
	$sql=0;
	switch($selt){
	case '1':
	list($spid,$ipt1,$ipt2)=$inserdata;
	if(is_numeric($spid)&&is_numeric($ipt2)){
	if(strlen($ipt2)==11&&strlen($ipt1)<100){$sql=1;}}
	break;
	case '2':
	list($ipt1,$ipt2,$ipt3)=$inserdata;
	if(is_numeric($ipt1)&&is_numeric($ipt3)){
	if(strlen($ipt3)==11&&strlen($ipt2)<100){$sql=1;}}	
	break;
	default:break;
	}
	return $sql;
}
function hetsplist(){
$SpCar=isset($_COOKIE['SpCar'])?daddslashes($_COOKIE['SpCar']):0;
function datasavet($data){
$ac = new spgta();$a = explode("|",$data);$c = count($a);$ac->Count = $c;
for($i=0;$i<$c;$i++){$data= ItemToObject($a[$i]);array_push($ac->arr,$data);}return $ac;}
function ItemToObject($str){$arr=explode(",",$str);$item = new splist();$item->spid = $arr[0];$item->spcount = $arr[1];return $item;}
class splist{public $spid=0;public $spcount=0;}class spgta{public $Count=0;public $arr = array();}
function payspmny($id,$selt){
$id=intval($id);if($id==0){return 1000000;}else{global $dbconfig;
try{$DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbddt']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);}catch(Exception $e){exit('链接数据库失败:'.$e->getMessage());}$DB->exec("set names utf-8");
$spinfo = $DB->query("SELECT * FROM `mall` WHERE `id`='{$id}' limit 1")->fetch();
if($selt==1){if($spinfo['status']==0){return 1000000;}else{return $spinfo['price'];}}else{return $spinfo['name'];}
}
}
$aar=datasavet($SpCar);
for($i=0;$i<$aar->Count;$i++){
$cc=$aar->arr[$i]->spid;
$dd=$aar->arr[$i]->spcount;
$result +=payspmny($cc,1)*intval($dd);
$result2 .=payspmny($cc,2).'*'.intval($dd).'<br>';
}
$result=round($result,2);
$ac=datasave($result.','.$result2);
return $ac;
}
function iansert($inserdata,$selt){
	global $dbconfig;
try{$DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbddt']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);}catch(Exception $e){exit('链接数据库失败:'.$e->getMessage());}
$DB->exec("set names utf-8");
$flock=fopen(SYSTEM_ROOT.'sql.lock', 'r');flock($flock, LOCK_EX);
	$sql=0;
	switch($selt){
	case '1':
    list($spid,$ipt1,$ipt2)=$inserdata;$spid=intval($spid);$uid=isset($_COOKIE['extendid'])?daddslashes($_COOKIE['extendid']):0;
	$uid=intval($uid);$ipt1=trim(cutstr($ipt1,100));$ipt2=trim(cutstr($ipt2,100));
	$spinfo = $DB->query("SELECT * FROM `mall` WHERE `id`='{$spid}' limit 1")->fetch();
	$price=round($spinfo['price']+$spinfo['dprice'],2);
	if($spinfo['status']!=0){$orderid = date("YmdHis").mt_rand(100,999);$lirnn=round(randomFloat(0.1,0.5),2);
	$sql=$DB->exec("INSERT INTO payoder(`uid`,`notiord`,`list`,`addtime`,`money`,`status`,`address`,`uphone`,`lirnn`) VALUES ('{$uid}','{$orderid}','{$spinfo['name']}','{$date}','{$price}',-1,'{$ipt1}','{$ipt2}','{$lirnn}')");
	if($sql){$sql=$orderid;}}	
	break;
	case '2':
	$info=$DB->query("SELECT * FROM `userlist` WHERE `user` = '{$inserdata}' limit 1")->rowCount();
	if($info<=0){	
	$mima=random(10);
	$sql=$DB->exec("INSERT INTO userlist(`user`,`mima`,`stime`,`status`) VALUES('{$inserdata}','{$mima}','{$date}',1)");
	if($sql){
	$info = $DB->query("SELECT * FROM `userlist` WHERE `user`='{$inserdata}' limit 1")->fetch();
	$sql=datasave($info['user'].','.$info['mima'].','.$dbconfig['domain'].'?i='.$info['uid']);	
	}}else{$sql=0;}
	break;
	case '3':
    list($ipt1,$ipt2,$ipt3)=$inserdata;$psfei=$DB->query("SELECT * FROM `psprice` WHERE 1")->fetch();
    switch($ipt1){case '1':$a='1-3层';$b=$psfei['aprice'];break;case '2':$a='4-6层';$b=$psfei['bprice'];break;case '3':$a='7-8层';$b=$psfei['cprice'];break;default:$a='异常';$b=$psfei['cprice'];break;}
    $ipt2=trim(cutstr($ipt2,100));$ipt3=trim(cutstr($ipt3,100));$uid=isset($_COOKIE['extendid'])?daddslashes($_COOKIE['extendid']):0;
	$uid=intval($uid);list($price,$splist)=hetsplist();if($price<=0||$price>=10000){$sql=0;}else{
	$orderid = date("YmdHis").mt_rand(100,999);$lirnn=round(randomFloat(0.1,0.5),2);$price=round($price+$b,2);
	$sql=$DB->exec("INSERT INTO payoder(`uid`,`notiord`,`list`,`addtime`,`money`,`status`,`cen`,`address`,`uphone`,`lirnn`) VALUES ('{$uid}','{$orderid}','{$splist}','{$date}','{$price}',-1,'{$a}','{$ipt2}','{$ipt3}','{$lirnn}')");
	if($sql){$sql=$orderid;}}
	break;
	default:break;
	}
flock($flock, LOCK_UN);fclose($flock);
	return $sql;
}
$act=isset($_GET['act'])?daddslashes($_GET['act']):NULL;
switch($act){
	case 'payorder':
	$ac=postcheck('spid,ipt1,ipt2','post');list($spid,$ipt1,$ipt2)=$ac;
	$inserdata=datasave($spid.','.$ipt1.','.$ipt2);$check=iansertcheck($inserdata,1);
	if($check){$check=iansert($inserdata,1);
	if($check!=0){$result=array("code"=>0,"orderid"=>$check,"data"=>$data);
	exit(json_encode($result));}else{resend('服务器繁忙，请稍后下单！');}
	}else{resend('输入值非正常，你确定你不是机器人？');}
	break;
	case 'tuiguan':
	$ac=postcheck('uemil','post');list($uemil)=$ac;
	if(is_numeric($uemil)&&strlen($uemil)==11){$check=iansert($uemil,2);if($check!=0){
	list($zhh,$mima,$href)=$check;$result=array("code"=>0,"zhh"=>$zhh,"mima"=>$mima,"href"=>$href,"data"=>$data);
	exit(json_encode($result));}else{resend('该手机号已注册、或系统忙碌请稍后尝试！');}
	}else{resend('手机号错误，你确定你不是机器人？');}	
	break;
	case 'payordercar':
	$ac=postcheck('ipt1,ipt2,ipt3','post');list($ipt1,$ipt2,$ipt3)=$ac;
	$inserdata=datasave($ipt1.','.$ipt2.','.$ipt3);$check=iansertcheck($inserdata,2);
	if($check){$check=iansert($inserdata,3);
	if($check!=0){$result=array("code"=>0,"orderid"=>$check,"data"=>$data);
	exit(json_encode($result));}else{resend('服务器忙碌，稍后尝试！');}	
	}else{resend('输入值非正常，你确定你不是机器人？');}		
	break;	
	case 'do_searchpay':
	$ac=postcheck('id');list($id)=$ac;
	if(is_numeric($id)&&strlen($id)==11){
	try{$DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbddt']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);}catch(Exception $e){exit('链接数据库失败:'.$e->getMessage());}
$DB->exec("set names utf-8");
$info=$DB->query("SELECT * FROM `payoder` WHERE `uphone` = '{$id}' and `status` >= 0 limit 1")->rowCount();	
	if($info>0){
	$rs=$DB->query("SELECT * FROM `payoder` WHERE `uphone` = '{$id}' and `status` >= 0 order by id desc limit 10");
	$data = array();
	while($res = $rs->fetch()){
	$data[]=array('id'=>$res['id'],'status'=>$res['status'],'ekey'=>encrypt($res['notiord'],'E',$safe['key']));}
    $result=array("code"=>0,"data"=>$data);exit(json_encode($result));
	}else{resend('此号无订单记录！');}
	}else{resend('手机号错误，你确定你不是机器人？');}		
	break;	
	case 'showorder':
	$ac=postcheck('ekey','post');list($ekey)=$ac;
	$dkey=encrypt($ekey,'D',$safe['key']);$dkey=intval($dkey);
	if(preg_match("/^\d*$/",$dkey)){
	try{$DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbddt']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);}catch(Exception $e){exit('链接数据库失败:'.$e->getMessage());}
$DB->exec("set names utf-8");
$info = $DB->query("SELECT * FROM `payoder` WHERE `notiord` = '{$dkey}' and `status` >= 0 limit 1")->rowCount();
	if($info>0){
    $rs=$DB->query("SELECT * FROM `payoder` WHERE `notiord` = '{$dkey}' and `status` >= 0 limit 1")->fetch();
	$result=array("code"=>0,"list"=>$rs['list'],"money"=>$rs['money'],"time"=>$rs['addtime'],"data"=>$data);
	exit(json_encode($result));
	}else{resend('无记录！');}
	}else{resend('参数错误！');}		
	break;	
	default:
    resend('act参数错误!');
	break;
}	
}else{resend('您当日行为异常，已禁止操作10分钟，重复访问时间累加！');}
?>