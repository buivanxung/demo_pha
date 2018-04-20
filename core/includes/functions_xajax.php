<?php
$objXajax->registerFunction("ajxdeleteData");
$objXajax->registerFunction("ajxdeleteCommonData");
$objXajax->registerFunction("ajxActive");
$objXajax->registerFunction("common_loadroomall");
$objXajax->registerFunction("commom_changePass");
function ajxdeleteData($strId,$tblId){
    global $arrmapTable,$objDbUpdate,$tbl_postfix;
    $objResponse = new xajaxResponse();
    $table = $arrmapTable[$tblId];
    $sql = "DELETE FROM $table$tbl_postfix WHERE id IN ($strId)";   
    $result = $objDbUpdate->Execute($sql);
    if(!$result){
        
    }else{
        
        $objResponse->addScriptCall("deleteRowlogic();");
        $objResponse->addScriptCall("checkOne();"); 
    }
   $funcname ='xajax_'.$tblId.'_loadGrid';  
    $objResponse->addScriptCall("$funcname();");                              
    return $objResponse->getXML(); // dong luon luon 
}
/*
*  xÃ³a nhá»¯ng hÃ m mÃ  cÃ³ sá»§  service_id   , khÃ´ng quang tÃ¢m tá»›i tbl_prefix
* 
* 
*/
function ajxdeleteCommonData($strId,$tblId){
    global $arrmapTable,$objDbUpdate;
    $objResponse = new xajaxResponse();
    $table = $arrmapTable[$tblId];
    $sql = "DELETE FROM $table WHERE id IN ($strId)";   
    $result = $objDbUpdate->Execute($sql);
    if(!$result){
        
    }else{
        
        $objResponse->addScriptCall("deleteRowlogic();");
        $objResponse->addScriptCall("checkOne();"); 
    }
   $funcname ='xajax_'.$tblId.'_loadGrid';  
    $objResponse->addScriptCall("$funcname();");                              
    return $objResponse->getXML(); // dong luon luon 
}

function ajxActive($id,$tblId,$status=0){
    global $arrmapTable,$objDbUpdate,$tbl_postfix;
    $objResponse = new xajaxResponse();
    $table = $arrmapTable[$tblId];
    if($status==1){
     $table .= $tbl_postfix; 
    }
    
    $sql = "UPDATE $table SET active = (active+1)%2  WHERE id = '$id'"; 
    $result = $objDbUpdate->Execute($sql);
    if(!$result){
        
    }
    $objResponse->addScriptCall("changeWaiting(1);");                              
    return $objResponse->getXML(); // dong luon luon 
}

function common_loadroomall($frmId,$roomtype=''){
    global $objDbUpdate,$cbbId,$lang,$path;
    $cbbId =  $frmId.'_cbbroom';
    $objResponse = new xajaxResponse();
    $arrData = commonLoadRoom($roomtype)  ;     
     $oTbs = new clsTinyButStrong();
    $oTbs->LoadTemplate('templates/'.$lang.'/'.$path.'/common_cbbroom.html');
    $oTbs->MergeBlock('blk_data', $arrData); 
    $oTbs->Show(TBS_NOTHING);  
    $objResponse->addAssign($frmId.'_tdcbbroom', 'innerHTML', $oTbs->Source);  
    return $objResponse->getXML(); // dong luon luon  
}

function commom_changePass($newpass,$id){
    global $objDbSelect,$user_id,$hotel_id;
    $objResponse = new xajaxResponse();// dong luon luon co khi goi ham ajax
    $id = addslashes($id);
    $sqlcheck = " SELECT `active`, `power_type_id`, `user_created`,hotel_id FROM tbl_user WHERE id = $id " ;
    $arrCheck = $objDbSelect->GetArray($sqlcheck);
    $power_check   = $arrCheck[0]['power_type_id'];
    $user_created  = $arrCheck[0]['user_created'];
    $hotel_check   = $arrCheck[0]['hotel_id'];
    $power_type_id = $_SESSION['current']['power_type_id'];
    
    if(is_array($arrCheck)&&count($arrCheck)>0){
        
        if(($id==$user_id)||($power_type_id<$power_check&&$power_type_id!=POWER_AGENCY&&$power_type_id!=POWER_CUSTOMER&&$power_type_id!=POWER_SUB_CUSTOMER)
    ||$user_id==$user_created||($hotel_id==$hotel_check&&$power_type_id==POWER_CUSTOMER)){
        $pass        =   EncryptPass($newpass);
        $sql         =  "UPDATE tbl_user SET pass ='$pass' WHERE id =$id";
        if(!$objDbSelect->Execute($sql)){
           $objResponse->addAlert('Đổi mật khẩu thất bại');
        }   
    }else{
      $objResponse->addAlert('Bạn không đủ quyền để đổi pass tài khoản này!');  
    }
        
    }else{
      $objResponse->addAlert('Không tồn tại tài khoản này');        
    }
    $objResponse->addScript('changeWaiting(1);');
    return $objResponse->getXML(); // dong luon luon co khi goi ham ajax 
}
?>
