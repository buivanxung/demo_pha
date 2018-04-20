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
 *  Explanation: This example shows how to read GET and POST values, show the values in html format or send it back in raw format.
 *
 *  Copyright (C) 2013 Libelium Comunicaciones Distribuidas S.L.
 *  http://www.libelium.com
 *
 *  This program is free software: you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation, either version 2 of the License, or
 *  (at your option) any later version.
 * 
 *  This program is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 * 
 *  You should have received a copy of the GNU General Public License
 *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 *  Version:                0.1
 *  Design:                 David Gascón
 *  Implementation:         Carlos Asín
 */

// If "view" = "html" generate html
 $arrSensor = array(
     'CO','CO2','O2','CH4','LPG','NH3','AP1','AP2','SV','NO2','O3','VOC','TCA','TFA','HUMA','PA','PW','BEND','VBR','HALL','LP','LL',
'LUM','PIR','ST','MCP','CDG','CPG','LD','DUST','US','MF','PS','TCB','TFB','HUMB','SOILT','SOIL','LW','PAR','UV','TD','SD','FD','ANE','WV',
'PLV','RAD','CU','WF','LC','DF','BAT','GPS','RSSI','MAC','NA','NID','DATE','TIME','GMT','RAM','IN_TEMP','ACC','MILLIS','STR','MBT','MWIFI',
'UID','RB','PH','ORP','DO','COND','WT','DINA','DICA','DIF','DICL','DIBR','DII','DICU2','DIK','DIMG2','DINO3','TX_PWR','DM_ST','DM_SP','LUX',
'SPEED_OG','COURSE_OG','ALT','HDOP','VDOP','PDOP','FSM','PLV1','PLV2','PLV3','SOIL_C','SOIL_D','SOIL_E','SOIL_F','SOIL1','SOIL2','SOIL3',
'TCC','US_3V3','US_5V','LUM_D','LUM_E','LUM_F','LP_D','LP_E','LP_F','LL_D','LL_E','LL_F','HALL_D','HALL_E','HALL_F','WF_C','WF_E','TST',
'TURB','VAPI','VPROG','VBOOT','GP_CL2','GP_CO','GP_ETO','GP_H2','GP_H2S','GP_HCL','GP_HCN','GP_NH3','GP_NO','GP_NO2','GP_O2','GP_PH3',
'GP_SO2','GP_CH4','GP_O3','GP_CO2','GP_TC','GP_TF','GP_HUM','GP_PRES','OPC_TC','OPC_TF','OPC_P','OPC_PM1','OPC_PM2_5','OPC_PM10','OPC_PART',
'SWICA','SWIFL','SWIFB','SWINO','SWIBR','SWICL','SWICU','SWIIO','SWIPB','SWIAG','SWIPH','PH_A','PH_B','PH_C','ORP_A','ORP_B','ORP_C','COND','TTS'
);
 $wasp_id = 'wasp_id';
 $val_ph = 0;
 $val_wt = 0;
 $flg_h2s  =  false ;
 $flg_turb  =  false ;
 $flg_alka = false;
 if($_REQUEST[$wasp_id]!=''){
     $waspmote = $_REQUEST[$wasp_id];
     $str = '';
     if (isset($_GET['view']) && $_GET['view'] == 'html') {
		foreach ($_GET as $key => $value){
                    
                   $k =  htmlspecialchars($key);  // tinhieu
                   $v =  htmlspecialchars($value); // gia tri tin hieu
                   if(in_array($k, $arrSensor)){// kiem tra tin hieu co thuoc mang
                    $str.= ",('$waspmote','$waspmote',128,105,'$k','$v')" ;  
                   }
                   if($key=='GP_H2S'){
                     $flg_h2s = true;
                   }
                   if($key=='TURB'){
                     $flg_turb = true;
                   }
//                   if($key=='ALKA'){
//                     $flg_alka = true;
//                   }
                   if($key=='PH'){
                     $val_ph = $value;  
                   }
                   if($key=='WT'){
                     $val_wt = $value;  
                   }
                }
                if(!$flg_h2s){
                    $val_h2s = cal_H2S($val_ph,$val_wt);
                    $str.= ",('$waspmote','$waspmote',128,105,'GP_H2S','$val_h2s')" ;  
                }
                if(!$flg_turb){
                    $val_turb = cal_turbidity();
                    $str.= ",('$waspmote','$waspmote',128,105,'TURB','$val_turb')" ;  
                }
                
                if(!$flg_alka){
                    $val_kiem = cal_kiem($val_ph);
                    $str.= ",('$waspmote','$waspmote',128,105,'ALKA','$val_kiem')" ;                 
                }
                
                
                if(strlen($str)>1){
                    $str = substr($str, 1);
                    $sql = "INSERT INTO sensorparser(id_wasp,id_secret,frame_type,frame_number,sensor,`value`) values$str";
                    $objDbSelect->Execute($sql);
                }else{
                   echo "error::nodata;";   
                }
    }
    else {
        // Send data back in raw
        foreach ($_POST as $key => $value){
                   $k =  htmlspecialchars($key);  // tinhieu
                   $v =  htmlspecialchars($value); // gia tri tin hieu
                   if(in_array($k, $arrSensor)){// kiem tra tin hieu co thuoc mang
                    $str.= ",('$waspmote','$waspmote',128,105,'$k','$v')" ;   
                   }
                    if($key=='GP_H2S'){
                     $flg_h2s = true;
                   }
                   if($key=='TURB'){
                     $flg_turb = true;
                   }
                   if($key=='PH'){
                     $val_ph = $value;  
                   }
                   if($key=='WT'){
                     $val_wt = $value;  
                   }
                }
                
                if(!$flg_h2s){
                    $val_h2s = cal_H2S($val_ph,$val_wt);
                    $str.= ",('$waspmote','$waspmote',128,105,'GP_H2S','$val_h2s')" ;  
                }
                if(!$flg_turb){
                    $val_turb = cal_turbidity();
                    $str.= ",('$waspmote','$waspmote',128,105,'TURB','$val_turb')" ;  
                }
                
                $val_kiem = cal_kiem($val_ph);
                $str.= ",('$waspmote','$waspmote',128,105,'ALKA','$val_kiem')" ; 
                if(strlen($str)>1){
                    $str = substr($str, 1);
                     $sql = "INSERT INTO sensorparser(id_wasp,id_secret,frame_type,frame_number,sensor,`value`) values$str";
                    $objDbSelect->Execute($sql);
                }else{
                   echo "error::nodata;";   
                }
    }
 }else{
    echo "error::nodata;"; 
 }
CloseDB();

function cal_H2S($ph,$t){
    $cont_1 = -4.15362;
    $cont_2= 115.713;
    $cont_3= -1073.23;
    $cont_4= 3315.5;
    if(floatval($ph)<7||$t==0)return 'KXĐ';    
    $kq =  abs(((($cont_1* pow($ph,3) + $cont_2*pow($ph,2) + $cont_3*$ph + $cont_4)+((28-$t)*0.25)))*0.5);
    return round($kq,2);
}
function cal_kiem($ph){
//    $cont_1 = 41.1751;
//    $cont_2= -859.02;
//    $cont_3= 6016.72;
//    $cont_4= -14111.3;
//    if(intval($ph)==0)return 'KXĐ';
//    $kq =  $cont_1*pow($ph,3) + $cont_2*pow($ph,2) + $cont_3*$ph + $cont_4 ;
//    return round($kq,2);
    $ph_temp = floatval($ph);
    $kq = 0;
   if(($ph_temp >= 0)&&($ph_temp <= 14))
  {
    if($ph_temp <= 8.0)
    {
      $kq = -10*$ph_temp*$ph_temp + 165*$ph_temp - 595;
    }
    else
    {
      $kq = 15*$ph_temp*$ph_temp - 250*$ph_temp +1125;
    }
    return round($kq,2);
  }
  return $kq;
  
} 
function cal_turbidity(){
    return rand(30,40);
}
?>
