﻿<?php
define('IN_CHUYENNHAT', TRUE);
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'database/commonDB.php');
if(!ConnectDB()) {
    die('Không kết nối được DATABASE');
}
global $objDbSelect;

/*
 *  ------Test GET/POST--------
 *
 */

$dataName = array("DEN","OXY_DAY","QUAT","OXY_NHUYEN");
$wasp_id  = 'wasp_id';
$result   = array();
$s_status = 'OFF';
$str      = "";
if(isset($_REQUEST[$wasp_id]) && $_REQUEST[$wasp_id]!=''){
    $waspmote = $_REQUEST[$wasp_id];
    $sqlData  = "select * from config_control where wasp_id = '$waspmote'"; 
    $arr      = $objDbSelect->GetArray($sqlData);
    if (isset($_GET) && count($_GET) >0 && count($arr) > 0) {
        foreach ($arr as $key => $value){
            $name = $value['name'];
            if(in_array($name, $dataName)) {
                if($value['status'] > 0 && strtotime($value['time_expired']) == 0) {
                    $s_status = 'ON';
                } else if($value['status'] > 0 && strtotime($value['time_expired']) > 0 && time() < strtotime($value['time_expired'])) {
                    $s_status = 'ON';
                } else {
                    $s_status = 'OFF';
                }
                $str .= "$name:$s_status,";
            }            
        }
        if(strlen($str)>1){
            $str    = substr($str,0,-1);
            $result['data'] = $str;
            $result['code'] = 200;
        }
        echo json_encode($result);
    }
}else{
   echo "error::nodata;"; 
}
CloseDB();
?>
