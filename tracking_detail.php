<?php
// Connect Database
define('IN_CHUYENNHAT', TRUE);
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'database/commonDB.php');
if(!ConnectDB()) {
    die('Không kết nối DATABASE');
}
global $objDbSelect,$user_id; 
$user_id = $_SESSION['current']['user_id'];
$result = array();
if(isset($_POST['wm_id'])&&isset($_POST['param_ss'])){ 
    $wm_id= $_POST['wm_id'];
    $str_ss = "('-1'";
    foreach($_POST['param_ss'] as $val){
        $str_ss.=  ",'$val'";
    }
    $str_ss.=')';
    $sql = "SELECT l.*,m.s_type FROM last_data l 
LEFT JOIN tbl_wt_sensor m ON m.`sensor`= l.`sensor`
  WHERE  l.id_wasp = '$wm_id' AND (l.sensor in $str_ss  OR l.sensor in('IN_TEMP','BAT') ) ORDER BY m.`priority` " ;
    $arr = $objDbSelect->GetArray($sql);     
    $result['lastdata']=$arr;
    
    $sql = "SELECT  `id`, `id_wasp`,`id_secret`,`sensor`,`value`,`timestamp` FROM `sensorparser` 
         WHERE id_wasp='$wm_id' AND sensor in $str_ss AND TIMESTAMPDIFF(HOUR,`timestamp`,NOW()) <24
          order by sensor,`timestamp`" ;
        $arr = $objDbSelect->GetArray($sql);
        $result['sensorparser']=$arr;
        
}
CloseDB();
die (json_encode($result));
?>