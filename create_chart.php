<?php
// Connect Database
define('IN_CHUYENNHAT', TRUE);
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'database/commonDB.php');
if(!ConnectDB()) {
    die('KhĂ´ng káº¿t ná»‘i Ä‘Æ°á»£c  DATABASE');
}
global $objDbSelect,$user_id; 
$user_id = $_SESSION['current']['user_id'];
$result = array();
if(isset($_POST['wt'])){ 
    $wt =  $_POST['wt'];
    $st =  $_POST['st'];
    $rt =  $_POST['rt'];
    $pl =  $_POST['pl'];
    $df =  $_POST['df'];
    $dt =  $_POST['dt'];
    $mocdo =  $_POST['mocdo'];
    $ss ="('-1'";
    foreach($st as $val){
        $ss.=",'$val'";
    }
    $ss.=')';
    $md ="('-1'";
    if(is_array($mocdo)){
        foreach($mocdo as $val){
           $val=  str_pad($val,2,"0",STR_PAD_LEFT);
            $md.=",'$val'";
        }
    }
    $md.=')';
    
    if($rt==1){
        $sql = "SELECT  `id`, `id_wasp`,`id_secret`,`sensor`,`value`,`timestamp` FROM `sensorparser` 
         WHERE sensor in $ss AND id_wasp='$pl' AND `timestamp`>='$df' AND `timestamp`<='$dt' order by sensor,`timestamp`" ;
        $arr = $objDbSelect->GetArray($sql);   
        $result=$arr;
    }elseif($rt==2){
        $df= substr($df,0,10).' 00:00:00';
        $dt= substr($dt,0,10).' 23:59:59';
                $sql = "SELECT `value` AS val,sensor,`timestamp` ,id_wasp,DATE_FORMAT(`timestamp`,'%Y-%m-%d') AS ymd , DATE_FORMAT(`timestamp`,'%H') AS time_h FROM sensorparser
                 WHERE sensor in $ss AND id_wasp='$pl' AND `timestamp`>='$df' AND `timestamp`<='$dt' and DATE_FORMAT(`timestamp`,'%H') in $md " ;
        $arr = $objDbSelect->GetArray($sql);   	
$result = $arr ;
        //$result=removeDO('sensor','val',$arr);
    } 
}

function removeDO($colname,$val,$arr){
    $arrtemp= array();
    $cnt =count($arr);
    for($i=0;$i<$cnt;$i++){
       $sensor = $arr[$i][$colname];
       if($sensor == 'DO'){
           if(intval($arr[$i][$val])<6){
            $arrtemp[]=$arr[$i];   
           }
       }else{
        $arrtemp[]=$arr[$i];   
       }
      
    }
    return $arrtemp;
    
}


CloseDB();
die (json_encode($result));
?>