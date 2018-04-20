<?php
// Connect Database
define('IN_CHUYENNHAT', TRUE);
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'database/commonDB.php');
if(!ConnectDB()) {
    die('Không kết nối được DATABASE');
}
global $objDbSelect,$user_id; 
$user_id = $_SESSION['current']['user_id'];
$result = array();
if(isset($_POST['sign_arr'])&&isset($_POST['wasp_type'])&&isset($_POST['sign_ext'])){ 
     // load cac loai sensor
    $strSensor = '' ;
    $type = $_POST['wasp_type'];
    for($i=0;$i<count($_POST['sign_arr']);$i++){
        $sensor=  $_POST['sign_arr'][$i];
        $strSensor .=",'$sensor'"  ;
    }    
    foreach($_POST['sign_ext'] as $key=>$val){
        $strSensor .=",'$val'"  ;
    }
    $strSensor= substr($strSensor,1);
    $sql = "select * from last_data where id_wasp in (select id from tbl_waspmote where u_id = '$user_id' and wasp_type='$type') and sensor in ($strSensor) order by id_wasp,sensor" ;
    $arr = $objDbSelect->GetArray($sql);     
    $result=$arr;
}
CloseDB();
die (json_encode($result));
?>