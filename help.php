<?php
//error_reporting(ALL); 
define('IN_CHUYENNHAT', TRUE); 

             
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'database/commonDB.php'); 
if(!ConnectDB())
{
    if( $_REQUEST['xajax']==null){
        echo $objDbSelect->ErrorMsg(), '<br>';
    }       
    if($arrConfig['debug'] === true)
    {
        Die(CONNECT_DB_ERR);
    }else{
        $_POST['xajax']='ajxLogout';
    }
    Die(CONNECT_DB_ERR);
}
if(!isset($_SESSION['current']['user_name'])){
  header('Location: index.php'); 
  exit(); 
}
//global $objDbSelect;

$objXajax->registerFunction('loadhelpById');
$objXajax->registerFunction('frmhelp_save');
$objXajax->registerFunction('CheckAuthor');

$objXajax->processRequests();
$tplXajaxScript = $objXajax->getJavascript('iot.vn/scripts/xajax');    

//  echo  $helpIndex; 
$lang = $_SESSION['lang'];
$sql = "SELECT t.name_$lang as name_sub,t.id_control as id, main_menu_id,m.name_$lang name_main
FROM tbl_menu_cus t join tbl_main_menu_cus as m on t.main_menu_id = m.id and t.active=1 and m.active=1
order by m.ordershow,t.ordershow,t.name_vi" ;

$arr = $objDbSelect->GetArray($sql);
$count =count($arr);
$arrNew=array();
$temp='';
$index_new =-1;
for($i=0;$i<$count;$i++){
  if($temp!=$arr[$i]['main_menu_id']){
    $index_new++;
    $arrNew[$index_new]['name']=$arr[$i]['name_main'];  
    $arrNew[$index_new]['matches'][]=array('name'=>$arr[$i]['name_sub'],'id'=>$arr[$i]['id']); 
    $temp = $arr[$i]['main_menu_id'];
  }else{
    $arrNew[$index_new]['matches'][]=array('name'=>$arr[$i]['name_sub'],'id'=>$arr[$i]['id']);  
  }  
} 

$TBS = new clsTinyButStrong;
$TBS->LoadTemplate('help.html');
$helpIndex = isset($_GET['helpIndex'])? $_GET['helpIndex']:0;
$TBS->MergeBlock('mb','array','arrNew');
$TBS->MergeBlock('sb','array','arrNew[%p1%][matches]');   
$TBS->Show();
CloseDB();

function CheckAuthor(){
    
    $objResponse = new xajaxResponse();
    if($_SESSION['current']['power_type_id']==0){
      $objResponse->addScript("$('#td_helptitle').show()");  
    }else{
      $objResponse->addScript("$('#td_helptitle').remove()");  
    }
    return $objResponse->getXML();
}

function loadhelpById($id){
   global $objDbSelect;
   is_int($id)?$id:0;
   $objResponse = new xajaxResponse();
   $lang = $_SESSION['lang'];   
    
   $sql = "select help_content_$lang as help_content,help_status from tbl_menu_cus where id_control = '$id' and active = 1 ";
   $arr = $objDbSelect->GetArray($sql);
   $content ='';
       //echo  $sql; die();
   if(is_array($arr)&&count($arr)){
      $content = htmlspecialchars_decode(trim($arr[0]['help_content'])); 
      $help_status = trim($arr[0]['help_status']); 
      if($content==''){
          $content = 'Đang cập nhật...';
      }
   }else{
     $TBS = new clsTinyButStrong;
     $TBS->LoadTemplate('help_page_first.html');
     $TBS->Show(TBS_NOTHING);
     $content = $TBS->Source;
       
   } 
   $objResponse->addAssign('td_helpcontent', 'innerHTML', $content); 
   $objResponse->addScriptCall("help_assignContent()" ); 
   return $objResponse->getXML();
}

function frmhelp_save($arrParams){                    
    global $objDbSelect;
    $objResponse = new xajaxResponse();
    $lang =  $_SESSION['lang'];
    $username =  $_SESSION['current']['user_name'];
    if($_SESSION['current']['power_type_id']!=0){
       $objResponse->addAlert("Bạn không có quyền sử dụng chức năng này");
       return $objResponse->getXML();  
    }
    $help_index        =     $arrParams['help_index'];
    $content    =    htmlspecialchars_decode($arrParams['content']) ;
    $content_col = 'help_content_'.$lang;
    
  
           $sql = "UPDATE tbl_menu_cus SET $content_col='$content' WHERE id_control = '$help_index'";
    //echo $sql; die();
    if(!$objDbSelect->Execute($sql)){
        $objResponse->addAlert("luu that bai");
        return $objResponse->getXML(); 
    }
    $objResponse->addScript("loadHelp('$help_index')");
    $objResponse->addScript("$('#help_edit_closediaglog').click();");
    return $objResponse->getXML(); 
 }
?>
                                         
