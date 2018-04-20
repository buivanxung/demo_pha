<?php
 $objXajax->registerFunction("w05_update");
 function w05_update($arr_insert,$arr_delete){ 
    global $objDbSelect,$user_id;
      $strVal='';
      $objResponse =  new xajaxResponse(); 
     if(is_array($arr_insert)&&count($arr_insert)>0){
         foreach($arr_insert as $val){
           $strVal .=",($user_id,$val)";  
         }
         
        $strInsert =  'INSERT INTO tbl_mocdo(user_id,mocdo) values'.substr($strVal,1);
        $objDbSelect->Execute($strInsert);
     } 
     if(is_array($arr_delete)&&count($arr_delete)>0){
       
        $str_id = implode(',',$arr_delete);         
        $strDelete =  "DELETE FROM tbl_mocdo where user_id = '$user_id' AND mocdo IN ($str_id)";
        $objDbSelect->Execute($strDelete);
        
     }
    $objResponse->addScript("changeWaiting(1)");
    return $objResponse->getXML();
     
 } 
?>
