<?php
 $objXajax->registerFunction("w04_update");
 function w04_update($arr_id,$arr_limit){ 
    // echo '<pre>'; print_r($arr_limit); die();
    global $objDbSelect,$user_id;
    $objResponse =  new xajaxResponse(); 
    $str_id = "('-1'"; 
   for($i=0;$i<count($arr_id);$i++){
     $str_id.=",'".$arr_id[$i]."'";  
   }
   $str_id.=')';
   $flg=true;// nêư trả về true là thực hiện hết, false là thực hiện ko duợc
  // echo '<pre>'; print_r($arr_limit); die();
   foreach($arr_limit as $key=>$val){
       $min_val = $val['w04-min'];
       $max_val = $val['w04-max'];
       $str_update = '';
       if($min_val==''){
         $str_update = " max_val='$max_val' " ; 
       }else{
           $str_update = "min_val='$min_val'" ;
           if($max_val!=''){
              $str_update.=" ,max_val='$max_val' " ; 
           }
       }
       $sql = "update tbl_limit set $str_update where id_sensor = '$key' 
       and id_wasp in $str_id and id_wasp in (select id from tbl_waspmote where u_id = $user_id)" ;
       //echo  $sql; die();
       if(!$objDbSelect->Execute($sql)){
         $flg=false;
         break;  
       }else{
          $objResponse->addScriptCall("w04_finish('$key','$max_val','$min_val')");   
       }
   }
   if(!$flg){
     $objResponse->addAlert('Cập nhật thất bại, vui lòng thử lại');  
   }
    
    return $objResponse->getXML();
     
 } 
?>
