<?php

$objXajax->registerFunction("w03_loadconfig");
$objXajax->registerFunction("w03_save");
$objXajax->registerFunction("w03_delete");
    
function w03_loadconfig(){     

    global $lang,$user_id;
    $objResponse = new xajaxResponse();// dong luon luon co khi goi ham ajax
    $arrGrid = w03_getGrid(); 
    $email = $arrGrid[0]['email'];
    $phone = $arrGrid[0]['phone'];
    $time_loop = $arrGrid[0]['time_loop'];
    $address = $arrGrid[0]['address'];
   // echo '<pre>'; print_r($arrGrid);   die();
    $objResponse->addScript("$('#w03_email').val($email);");                              
    $objResponse->addScript("$('#w03_phone').val($phone);");                              
    $objResponse->addScript("$('#w03_time_loop').val($time_loop);");                              
    $objResponse->addScript("$('#w03_address').val($address);");                              
                           
    return $objResponse->getXML(); // dong luon luon co khi goi ham ajax   
}

function  w03_save($params){
    global $objDbSelect,$user_id,$tbl_postfix,$hotel_id,$tbl_pay;
    $objResponse =  new xajaxResponse();  
    $id =  $params['id'] ;
    $stt =  $params['stt'] ;
    //echo '<pre>'; print_r($params);  die();
    if($id==''){
        $strCol = '';
        $strVal ='';
        foreach($params as $key=>$value){
            if($key!='id'&&$key!='stt'){
                $strCol .= ','.$tbl_pay[$key];
                $value = addslashes($value) ;
                $strVal .=",'$value'"; 
            }
            
        }
       $sql = "insert into cus_pay(user_created,date_created,user_update,date_update,service_id,active$strCol) value($user_id,now(),$user_id,now(),$hotel_id,1$strVal)" ;
       $objDbSelect->Execute($sql);
       $id_new = mysql_insert_id();
       $objResponse->addScript("changerow('w03_tbl',$id_new,$stt)");      
    }else{
        $arrId = explode('-',$id);
        $id =  $arrId[1];
        $strCol ="user_update=$user_id,date_update=now()";
        foreach($params as $key=>$value){
             if($key!='id'&&$key!='stt'){ 
                $value = addslashes($value) ;
                $strCol .= ','.$tbl_pay[$key]."='$value'"; 
             }
        }
        $sql = "update cus_pay set $strCol where id = $id and datediff(date_created,now())=0 and service_id = $hotel_id";
        $objDbSelect->Execute($sql);
        $objResponse->addScript("changerow('w03_tbl','',$stt)");  
    }
    
    return $objResponse->getXML();
    
} 
  
function  w03_getGrid(){
    global $objDbSelect,$user_id;
    $sqlSelect = " SELECT `phone`,`address`,`email`,`time_loop`
    FROM tbl_user  WHERE  id = '$user_id'";
     return $objDbSelect->GetArray($sqlSelect);
}  


function w03_delete($id){
    global $objDbSelect,$hotel_id;
    $objResponse =  new xajaxResponse();
    $arrId = explode('-',$id);
    $id =  $arrId[1];
    $sql= "delete from cus_pay where id =$id and datediff(date_created,now()) = 0 and service_id = $hotel_id";
    $objDbSelect->Execute($sql);
    return $objResponse->getXML(); 
     
}
?>
