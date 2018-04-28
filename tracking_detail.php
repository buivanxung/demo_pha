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
$str_user_dk = $str_trangthai_dk = $str = "";
$dataName = array("DEN","OXY_DAY","QUAT","OXY_NHUYEN");
if(isset($_POST['wm_id'])&&isset($_POST['param_ss'])){ 
    $wm_id= $_POST['wm_id'];
    //Get dieu kien
    $arrDK = "select * from config_control where wasp_id = '".$_POST['wm_id']."' AND num = (select max(num) as num from config_control limit 1)";
    $arrDK = $objDbSelect->GetArray($arrDK);
    if(count($arrDK) > 0) {
        //get user dieu khien
        $userDK    = "select username from tbl_user where id = '".$arrDK[0]['user_id']."'";
        $userData  = $objDbSelect->GetArray($userDK);
        if(count($userData) > 0) {
            $str_user_dk = ' <b>'.$userData[0]['username']. "</b> điều khiển lúc [".$arrDK[0]['timestamp']."]";
        }
        $result['user_dieukhien'] = $str_user_dk;
        foreach ($arrDK as $key => $value){
            $name = $value['name'];
            if(in_array($name, $dataName)) {
                if($value['status'] > 0 ) {
                    $s_status = ' ON';
                }  else {
                    $s_status = ' OFF';
                }
                $str .= "<b>$name</b>:$s_status, ";
            }
            if(strlen($str)>1){
                $str_trangthai_dk  = substr($str,0,-2);                
            }
        }
        $result['trangthai_dieukhien'] = $str_trangthai_dk;        
    }
    
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