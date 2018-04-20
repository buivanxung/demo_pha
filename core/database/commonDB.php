<?php

//Ham ket noi vao database.
function ConnectDB()
{
    global $objDbUpdate, $objDbSelect;
    if(!$objDbUpdate->Connect(_DBSERVER_MASTER, _DBUSER_MASTER, _DBPASS_MASTER, _DBNAME_MASTER))
    {
        //die('hehehhe');
        return false;
    }
    // Set connection charset database to utf-8
    $objDbUpdate->Execute('SET NAMES UTF8');

    if(!$objDbSelect->Connect(_DBSERVER_MASTER, _DBUSER_MASTER, _DBPASS_MASTER, _DBNAME_MASTER))
    {
        return false;
    }
    // Set connection charset database to utf-8
    $objDbSelect->Execute('SET NAMES '.CONN_CHARSET);

    // set fetch mode
    $ADODB_FETCH_MODE = ADODB_FETCH_ASSOC;

    return true;
}
  //Ham Dong ket noi voi database.
function CloseDB()
{
    global $objDbUpdate, $objDbSelect;
    if($objDbUpdate->_connectionID !== false)
    {
        $objDbUpdate->Close();
    }
    if($objDbSelect->_connectionID !== false)
    {
        $objDbSelect->Close();
    }
    return(true);
}

/*
    Function IsConnect(): Kiem tra co dang connect database khong
    return : neu da connect thi return true else false
*/
function IsConnect($bMaster = true)
{
    global $objDbUpdate, $objDbSelect;
    if($bMaster === true)
    {
        if($objDbUpdate->_connectionID === false)
        {
            return(false);
        }
        return(true);
    }
    else
    {
        if($objDbSelect->_connectionID === false)
        {
            return(false);
        }
        return(true);
    }

}
function UpdateDB($table,$arrValue,$condition=''){
    global $objDbUpdate;
       if($table==''||!is_array($arrValue)||count($arrValue)<1){
           return false;
       }
       $strFields ='';
       foreach($arrValue as $key=>$value) {
           $value = addslashes($value);
           $strFields.=     ",`$key`='$value'";
       }
       $strFields = substr($strFields,1)  ;
       $where = '';
       if(is_array($condition)){
           $FieldKeywords = array('<','>','!','=');
           
           if(count($condition)>0){
               foreach($condition as $key=>$value){
                   
                   $tempValue = strtolower($value);
                   $subKey = substr(trim($value),0,1);
                   $isFlag = (substr($tempValue,0,3)=='is '|| substr($tempValue,0,3)=='in '||substr($tempValue,0,7)=='between' || in_array($subKey,$FieldKeywords));
                  
                   if(!is_double($value)||!is_int($value)||!$isFlag){
                        $value = "'".addslashes($value)."'";   
                   }

                   if($isFlag){
                     $where .=   "AND `$key`  $value "  ;  
                   } else{
                     $where .=   "AND `$key` = $value "  ;  
                   }                    
               }
               $where =  ' WHERE ' . substr($where,3);
           }                  
       }
       else if($condition!=''){
           $where = ' WHERE '.$condition;
       }
       
       $sqlUpdate = " UPDATE $table SET $strFields $where"  ;
       return   $objDbUpdate->Execute($sqlUpdate);           
}
function DeleteDB($table,$condition=''){
    global $objDbUpdate;
       if($table==''){
           return false;
       }       
       $where = '';
       if(is_array($condition)){
           $FieldKeywords = array('<','>','!','=');
           
           if(count($condition)>0){
               foreach($condition as $key=>$value){
                   
                   $tempValue = strtolower($value);
                   $subKey = substr(trim($value),0,1);
                   $isFlag = (substr($tempValue,0,3)=='is '|| substr($tempValue,0,3)=='in '||substr($tempValue,0,7)=='between'  || in_array($subKey,$FieldKeywords));
                  
                   if(!is_double($value)||!is_int($value)||!$isFlag){
                        $value = "'".addslashes($value)."'";   
                   }

                   if($isFlag){
                     $where .=   "AND `$key`  $value "  ;  
                   } else{
                     $where .=   "AND `$key` = $value "  ;  
                   }                    
               }
               $where =  ' WHERE ' . substr($where,3);
           }

                  
       }
       else if($condition!=''){
           $where = ' WHERE '.$condition;
       }
       
       $sqlDelete = " DELETE FROM $table $where"  ;
       return   $objDbUpdate->Execute($sqlDelete);           
}
function SelectDB($table,$arrValue=array('*'),$condition=''){
        global $objDbSelect;
       if($table==''||!is_array($arrValue)||count($arrValue)<1){
           return false;
       }
       $strFields ='';
       $arrString = array('*','-','+','%',')',' ');       
       foreach($arrValue as $key=>$value) {
           if($value!=''){
               if(strpos($value,' as ')>0){
                   $temp = explode(' as ',$value);
                   $temp0 = $tem[0];
                   $temp1 = $tem[1];
                   if(!in_array($temp0,$arrString)){
                     $value = "`$temp0`  as `$temp1`";
                   }else{
                     $value = "$temp0  as `$temp1`";  
                   }
               }else
               {
                   if(!in_array($value,$arrString)){
                     $value = "`$value`";
                   }                   
               }
           }
           $strFields.=     ",$value";
       }
       $strFields = substr($strFields,1)  ;
       $where = '';
       if(is_array($condition)){
           $FieldKeywords = array('<','>','!','=');
           
           if(count($condition)>0){
               foreach($condition as $key=>$value){                   
                   $tempValue = strtolower($value);
                   $subKey = substr(trim($value),0,1);
                   $isFlag =false;
                   if (substr($tempValue,0,3)=='is '|| substr($tempValue,0,3)=='in '||substr($tempValue,0,7)=='between' || in_array($subKey,$FieldKeywords)){
                   $isFlag= true;    
                   }
                  
                   if(!is_double($value)||!is_int($value)||!$isFlag){
                        $value = "'".addslashes($value)."'";   
                   }

                   if($isFlag){
                     $where .=   "AND `$key`  $value "  ;  
                   } else{
                     $where .=   "AND `$key` = $value "  ;  
                   }                    
               }
               $where =  ' WHERE ' . substr($where,3);
           }                  
       }
       else if($condition!=''){
           $where = ' WHERE '.$condition;
       }
       
       $sqlselect = " SELECT  $strFields FROM $table $where"  ;
       return   $objDbSelect->GetArray($sqlselect); 
}
function SaveFormNormal($params){
    global $objDbUpdate,$arrTable;
      $table = $params['hdtable'];
      $hdSaveId = $params['hdSaveId'];
      $arrMapFields =$arrTable[$table];
      $arrField =array();
      $arrValue = array();
      $index =0;
      foreach($arrMapFields as $key=>$value){
          if(isset($params[$key])){
              $arrField[$index]=$value;
              $arrValue[$index]="'".addslashes($params[$key])."'";
              ++$index;              
          }
      }
      if($params['hdSaveStatus']=='add'){
          $arrField[$index]='user_created';
          $arrField[$index+1]='date_created'; 
      }else{
          $arrField[$index]='user_updated';          
          $arrField[$index+1]='date_updated';
      }
      $arrValue[$index]="'".$_SESSION['user_id']."'";
      $arrValue[$index+1]='now()';
      $sql = '';
      if($params['hdSaveStatus']=='add'){
          $strField = implode(',',$arrField);
          $strValue = implode(',',$arrValue);
          $sql = "INSERT INTO $table($strField) value($strValue)";
          
      }else{
          $len = count($arrField);
          $trSet ='';
          for($i=0;$i<$len;$i++){
             $trSet = ','.$arrField[$i].'='.$arrValue[$i];
          }
          $trSet = substr($trSet,1);
          $sql = "UPDATE $table SET $trSet WHERE id = $hdSaveId";          
      }
     // echo $sql;die();
      return $objDbUpdate->Execute($sql);
}
function DeleteNormal($params,$table){
    global $objDbUpdate;
    $strId = '';
    $strId = implode(',',$params); 
    $sql = "DELETE FROM $table WHERE id IN ($strId)";
    return $objDbUpdate->Execute($sql);
}
  function SaveFormAdd($params){
      $objResponse = new xajaxResponse();
      $result = SaveFormNormal($params);
      if(!$result){
          $objResponse->addAlert(SAVEFAIL);
      }
      return $objResponse->getXML();
  }
  
  function DeleteData($params,$table){
       $objResponse = new xajaxResponse();
       DeleteNormal($params,$table);           
       return    $objResponse->getXML(); 

  }
  function SearchData($params,$arrField=''){
      global $objDbSelect,$arrTableSearch;
      $table = $params['hdtable'];
      $arrDate = array('0'=>'txtFromDate',1=>'txtToDate');
      $conditons = ' WHERE 1=1 ';
          foreach($arrTableSearch[$table] as $key=>$value){
              $valueParam = addslashes($params[$key]);
              //echo $key .":".$params[$key]."<br/>";
              if($valueParam!='' && !in_array($key,$arrDate)){
                  if(strpos($key,'txt')===0){
                      $conditons .= " AND `$value` LIKE '%$valueParam%' ";
                  }else{
                     $conditons .= " AND `$value` = '$valueParam' ";  
                  }
              }else if(in_array($key,$arrDate)){  
             
                  if($_SESSION['lang'] =='vi'){
                     $valueParam = RevertDate($valueParam) ;
                  } 
                  $compare ='>=';
                  if($key==$arrDate[1]){
                      $compare = '<=';
                  }
                  $conditons .= " AND DATEDIFF($value,'$valueParam') $compare 0 "   ;               
                                   
              }               
                  
      }
      $fieldGet= ' * ';
      if($arrField!=''){
         $fieldGet = implode(',',$arrField);
      }
      $sql = " SELECT $fieldGet FROM $table $conditons";    
     // echo  $sql; die(); 
      return $objDbSelect->GetArray($sql);
  }
  
?>
