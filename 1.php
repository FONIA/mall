<?php
function hetsplist(){
$SpCar=isset($_COOKIE['SpCar'])?daddslashes($_COOKIE['SpCar']):0;
function datasave($data){
$ac = new spgta();$a = explode("|",$data);$c = count($a);$ac->Count = $c;
for($i=0;$i<$c;$i++){$data= ItemToObject($a[$i]);array_push($ac->arr,$data);}return $ac;}

function ItemToObject($str){$arr=explode(",",$str);$item = new splist();$item->spid = $arr[0];$item->spcount = $arr[1];return $item;}
class splist{public $spid=0;public $spcount=0;}
class spgta{public $Count=0;public $arr = array();}
function payspmny($id,$selt){
$id=intval($id);if($id==0){return 1000000;}else{
global $dbconfig;
try{$DB = new PDO("mysql:host={$dbconfig['host']};dbname={$dbconfig['dbddt']};port={$dbconfig['port']}",$dbconfig['user'],$dbconfig['pwd']);}catch(Exception $e){exit('链接数据库失败:'.$e->getMessage());}$DB->exec("set names utf-8");
$spinfo = $DB->query("SELECT * FROM `mall` WHERE `id`='{$id}' limit 1")->fetch();
if($selt==1){if($spinfo['status']==0){return 1000000;}else{return $spinfo['price'];}}else{return $spinfo['name'];}
}
}
$aar=datasave($SpCar);
for($i=0;$i<$aar->Count;$i++){
$cc=$aar->arr[$i]->spid;
$dd=$aar->arr[$i]->spcount;
$result +=payspmny($cc,1)*intval($dd);
$result2 .=payspmny($cc,2).'*'.intval($dd).'/';
}
$result=round($result,2);
$ace=datasave($result.','.$result2);
return $ace;
}
?>
