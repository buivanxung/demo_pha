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
$result  = $arr = array();
$dataName = array("DEN","OXY_DAY","QUAT","OXY_NHUYEN");
if(isset($_POST['wm_id'])){ 
    $wm_id= $_POST['wm_id'];
    //Get dieu kien
    $arrDK = "select * from config_control where wasp_id = '".$_POST['wm_id']."' AND num = (select max(num) as num from config_control limit 1)";
    $arrDK = $objDbSelect->GetArray($arrDK);
    if(count($arrDK) > 0) {        
        foreach ($arrDK as $key => $value){
            $name = $value['name'];
            if(in_array($name, $dataName)) {
                $arr[$name] = $value['status'];                
            }            
        }
        $result['lastdata']=$arr;    
    }   
}
CloseDB();
die (json_encode($result));
?>