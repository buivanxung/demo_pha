<?php

$objXajax->registerFunction("w01_loadGrid");      
$objXajax->registerFunction("w01_savelocname");      
function w01_loadGrid(){
    global $lang;
    $objResponse = new xajaxResponse();// dong luon luon co khi goi ham ajax
    $arrGrid = w01_getGrid();
    return $objResponse->getXML(); // dong luon luon co khi goi ham ajax   
}       
  
function  w01_getGrid(){
    global $objDbSelect,$user_id;
    $sqlSelect = " SELECT * FROM `tbl_water`  
                    WHERE wasp_id IN (SELECT wasp_id FROM tbl_wasp_user WHERE u_id = '$user_id') 
                    AND DATEDIFF(time_stamp,NOW())=0";
     return $objDbSelect->GetArray($sqlSelect);
}  
 function w01_savelocname($name,$id){
    global $lang,$objDbSelect;
    $objResponse = new xajaxResponse();// dong luon luon co khi goi ham ajax
    $sql = "update tbl_waspmote set name_$lang= '$name' where id = '$id'";

    if($objDbSelect->Execute($sql)){
        $objResponse->addScriptCall("changeWMName('$name','$id')");   
    }else{
       $objResponse->addAlert('Lưu thông tin tên vị trí bi lỗi'); 
    }
    return $objResponse->getXML(); // dong luon luon co khi goi ham ajax     
 }
?>
