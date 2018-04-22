<?php
error_reporting(0);
define('IN_CHUYENNHAT', TRUE);
define('ROOTURL', 'index.php');
$sTplRootUrl = ROOTURL;
global $arrConfig,$generalTitle,$lang,$modulecall,$ajax,$strMainMenu,$objXajax,$objDbSelect;
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'includes/constant_common.php');// chứa các hằng số sử dụng chung cho cả Vi và EN v co thay doi
include_once(CORE_PATH.'includes/functions.php');
include_once(CORE_PATH.'includes/functions_xajax.php');
include_once(CORE_PATH.'database/commonDB.php');  
//echo '<pre>'; print_r($_SESSION);die();
$objXajax->registerFunction("changeLang");
$objXajax->registerFunction("ChangeSysName");
$objXajax->registerFunction('frmchangepass_save');
$objXajax->registerFunction('saveSysName');
$objXajax->registerFunction('saveControlWasp');
$sys_active = ACTIVE;
$sys_deactive = DEACTIVE;
$user_id = '';
        
if(!ConnectDB())
{
    if(!isset($_REQUEST['xajax'])|| $_REQUEST['xajax']==null){
        echo $objDbSelect->ErrorMsg(), '<br>';
    }       
    if($arrConfig['debug'] === true)
    {
        Die('Ket noi bi loi');
    }else{
        $_POST['xajax']='ajxLogout';
    }
    Die(CONNECT_DB_ERR);
}

if(IsLogin()){
    if($_SESSION['current']['user_id']!=''){
        $user_id = $_SESSION['current']['user_id'];
    }
  
    $sModule = GetModule();
    if($_GET["m"]=='logout'){//trường hợp bấm nút logout
        logout();
        CloseDB();
    }else{
    $tplXajaxScript = ''; 
    $powertype = $_SESSION['current']['power_id']; // trung voi bien phia duoi
        include(chuyennhat_PATH.'module_customer.php');    
        include(chuyennhat_PATH.'module_water.php');    
    if($_REQUEST['xajax']==null){      
        $sIndexFile = TEMPL_PATH.'/index_2.html';
        $objTemplate->LoadTemplate($sIndexFile, 'UTF-8');
   
    }else{
        $fnName   = $_REQUEST['xajax'];
        $arrName  = explode('_',$fnName);
        $nameFile = str_replace('frm','main_',$arrName[0]) ;
    }
        $objXajax->processRequests();
        $tplXajaxScript = $objXajax->getJavascript('iot.vn/scripts/xajax');
        
        $objTemplate->Show(); 
        CloseDB(); 
    }

}else{
    $sModule = GetModule(true);
    if(isset($_GET["m"])&&$_GET["m"]!="")
    {
        $tplXajaxScript = '';

        $sIncFile = MODULE_PATH.'login/'.$_GET["m"].'.php';
        $strnamedisplay = getNameToDisplay();
        if(file_exists($sIncFile))
        {
            include_once($sIncFile);
        }
        $objXajax->processRequests();
        $tplXajaxScript = $tplXajaxScript.$objXajax->getJavascript('iot.vn/scripts/xajax');
        CloseDB();
        // Show page
        $objTemplate->Show();


    }else
    {
        $tplXajaxScript = '';

        //$sIncFile = MODULE_PATH.'login/main_'.$sModule.'_2.php';
        $sIncFile = MODULE_PATH.'login/login.php';
        $strnamedisplay = getNameToDisplay();
        if(file_exists($sIncFile))
        {
            include_once($sIncFile);
        }
        $objXajax->processRequests();
        $tplXajaxScript = $tplXajaxScript.$objXajax->getJavascript('iot.vn/scripts/xajax');
        CloseDB();
        // Show page
        $objTemplate->Show();
    }

}

function sqlForMainmenu(){
    global  $sys_active;
    $user_id =  $_SESSION['current']['user_id'];
    $power_type_id = $_SESSION['current']['power_type_id'];
    $flg_cus = $_SESSION['current']['flg_cus'];
    $result =''; 
    if($flg_cus==0){
      $result =  " select * from tbl_main_menu WHERE id in (select main_menu_id from tbl_mainmenu_powertype 
    where power_type_id ='$power_type_id') AND active = $sys_active order by ordershow "; 
    }else{
       $temp = "select * from tbl_main_menu_cus "  ;   // đang làm
       $where ='';
       $sertype ='0'; 
       $result =  $temp.' order by ordershow ' ;
    }
    return $result;
}

function ajxLogout($arrParams=null)
{
    $objResponse = new xajaxResponse();
    session_destroy();
    $objResponse->addRedirect('index.php?m=login');
    return $objResponse->getXML();
}

function logout()
{
    global $objDbSelect,$sessionID;
    session_destroy();
  
    Redirect('index.php?m=login'); 
    exit;  
}

function getModule($login=false){ 
    global  $arrModuleLogin;  
    $module = 'login';    
    if(isset($_GET['m'])){
      $temp = $_GET['m'];
      if($login){          
          if(in_array($temp,$arrModuleLogin)){
            $module = $temp;  
          }
      }else{
        $module = $temp; 
      }
    }
    return $module;
}

function ajxLoadContent($main_menu_id)
{
    global $objDbSelect,$lang,$main_menu,$user_id,$hotel_id;
    $active= ACTIVE;
    $objResponse = new xajaxResponse();
    $power_type_id = $_SESSION['current']['power_type_id'];
    $lang = isset($_SESSION['lang'])?$_SESSION['lang']:'vi';
    $user_id = $_SESSION['current']['user_id'];
  $addCondition = '';
  $sql = '';
  if($power_type_id== POWER_CUSTOMER||$power_type_id== POWER_SUB_CUSTOMER){

      
      $condition ='';
      if($power_type_id==POWER_SUB_CUSTOMER){
         $condition = " and id in (select menu_cus_id from tbl_menu_for_subuser where service_id = $hotel_id )" ;
      } 
      $sql = " select distinct *,name_$lang as menuname from tbl_menu_cus where 
               main_menu_id = $main_menu_id  and active = $active $condition
               order by ordershow";
               
                  
  }else{
     $sql = "select distinct *,name_$lang as menuname from tbl_menu where main_menu_id = $main_menu_id and active = $active
     and  id in  (select menu_id from tbl_menu_powertype where power_id= '$power_type_id' and active =$active)
     order by ordershow";   
  }
  
    $arr = $objDbSelect->GetArray($sql); 
  //echo '<pre';print_r($arr);die();
    
    $oTbs = new clsTinyButStrong();    
    $oTbs->LoadTemplate('templates/'.$lang.'/page_main.html');
    $oTbs->MergeBlock('blk_data', $arr);
    $oTbs->Show(TBS_NOTHING);
    $main_tabs = "main_tabs_$main_menu_id";
    $objResponse->addAssign($main_tabs, 'innerHTML', $oTbs->Source);
    $objResponse->addScript("createTab('$main_tabs');");
  /*  $objResponse->addScript("resizePage()"); */
    if(count($arr)<1){
      $objResponse->addAlert("Bạn không có quyền với các chức năng trong mục này");   
    }  
    
           
    return $objResponse->getXML();
}

function frmindex_save($arrparams)
{
    global $objDbSelect;
     $objResponse = new xajaxResponse();
    $user_id = $_SESSION['current']['user_id'];
    $name = addslashes($arrparams['txtName']);
    $mail = $arrparams['txtMail'];
    $phone = $arrparams['txtPhone'];
    $title = addslashes($arrparams['txtSubj']);
    $content =addslashes($arrparams['txtMesg']) ;
    $sql = " insert into tbl_feedback(name,mail,phone,title,content,date_created,user_created)
     value('$name','$mail','$phone','$title','$content',now(),'$user_id')";   
     $objDbSelect->Execute($sql);
    /*$objResponse->addScript('changeWaiting(1);'); */
    $objResponse->addScript("$('#frmindex_feedback').dialog('close');"); 
    return $objResponse->getXML();
}

function loadregist(){
    global $objDbSelect,$lang;
    $objResponse = new xajaxResponse();
    $hotel_id = $_SESSION['current']['hotel_id'];
    $sql = "select * from tbl_cus_regist where service_id = '$hotel_id' and (
    datediff(date_create,now())=0 or status_process = 0) ";
    $arr = $objDbSelect->GetArray($sql);
    $oTbs = new clsTinyButStrong();
    $oTbs->LoadTemplate('templates/'.$lang.'/cus_regist_grid.html');
    $oTbs->MergeBlock('blk_data', $arr);
    $oTbs->Show(TBS_NOTHING);
    $objResponse->addAssign('frmcusregist_dialog_grid', 'innerHTML', $oTbs->Source);
    $objResponse->addScriptCall("dataTableObj.CreatDataTable('cusfrmregist_tbl');");
    $objResponse->addScript("$('#frmcusregist_dialog').dialog('open')"); 
    /*$objResponse->addScript('changeWaiting(1);');*/
    
    return $objResponse -> getXML(); 
}


function loadAlertRegist(){
    global $objDbSelect,$lang;
    $objResponse = new xajaxResponse();
    session_start(); 
    $hotel_id = $_SESSION['current']['hotel_id'];
    $sql = "select status_process from tbl_cus_regist where service_id = '$hotel_id' and (
    datediff(date_register,now())=0 or status_process = 0) group by status_process order by status_process"; 
    $arr = $objDbSelect->GetArray($sql);
    $count = count($arr);
    if(is_array($arr) && $count>0){
        $status_process = $arr[0]['status_process'];
        if($status_process==0){
           $objResponse->addScript("$('#registdiv').removeClass('divAlert_0').addClass('divAlert_1');"); 
        }else{
           $objResponse->addScript("$('#registdiv').removeClass('divAlert_1').addClass('divAlert_0');"); 
        }
       $objResponse->addScript("$('#registdiv').show();"); 
    }else{
      $objResponse->addScript("$('#registdiv').hide();");   
    }    
    return $objResponse -> getXML(); 
}
function updateRegist($id){
    global $objDbSelect,$lang;
    $objResponse = new xajaxResponse();
    $hotel_id = $_SESSION['current']['hotel_id'];
    $sql = "update  tbl_cus_regist set status_process =1 where service_id = '$hotel_id' and id = '$id'"; 
    $arr = $objDbSelect->Execute($sql);
    $objResponse->addScript("$('#cusregistupdate_$id').remove();");  
    return $objResponse -> getXML(); 
}
function deleteRegist($id){
    global $objDbSelect;
    $objResponse = new xajaxResponse();
    $hotel_id = $_SESSION['current']['hotel_id'];
    $sql = "delete from tbl_cus_regist  where service_id = '$hotel_id' and id = '$id'"; 
    $arr = $objDbSelect->Execute($sql);
    $objResponse->addScript("$('#tr_regist$id').remove();");  
    return $objResponse -> getXML(); 
} 

function active($id){
    global $objDbSelect;
    $objResponse = new xajaxResponse();
    $arr_id = explode('-',$id);
    $id_row =$arr_id[1];  
    $tr_id =$arr_id[0];  
    $tbl = '-1';
    switch($tr_id){
      case 'f15_tr': $tbl = 'tbl_user';break;
      case 'f14_tr': $tbl = 'cus_product';break;
      case 'f14_lsp': $tbl = 'cus_product_type';break;
      case 'f16_tr': $tbl = 'cus_product_type';break;
      case 'f17_tr': $tbl = 'fm_promotion';break;
      case 'f19_tr': $tbl = 'fm_room';break;
      default: $tbl='-1';  
    }
    if($tbl=='-1'){
       $objResponse->addAlert('Không kích hoạt/(ngưng kích hoạt) đuợc!'); 
    }else{
       $sql= "update $tbl set active = MOD(active +1,2) where id =$id_row "; 
       $objDbSelect->Execute($sql);
       $objResponse->addScriptCall("changeActive('$id')");
    }
    
    return $objResponse -> getXML(); 
    
}
function changeLang($lang){
    global $objDbSelect;
    $objResponse = new xajaxResponse();
    //echo $lang; die();
    $lang_s = ($lang=='vi')? 'en':'vi';
    $_SESSION['lang']= $lang_s;
    $objResponse->addScriptCall('location.reload();');    
    return $objResponse -> getXML();  
}

function frmchangepass_save($arrparams)
{
    global $objDbSelect;
    $objResponse = new xajaxResponse();
    $user_id = $_SESSION['current']['user_id'];
    $oldpass = EncryptPass($arrparams['txtOldPass']);
    $newpass = $arrparams['txtNewPass'];
    $newpassconfirm = $arrparams['txtNewPassConfirm'];
    if(strlen($newpass)<6){
      $objResponse->addAlert("Vui lòng nhập mật khẩu mới trên 5 kí tự");  
    }elseif($newpass!=$newpassconfirm){
      $objResponse->addScript("Mật khẩu mới và mật khẩu xác nhận không trùng");  
    }else{
        $sqlconfirm = "select count(id) as rowcount from tbl_user where pass = '$oldpass' and id = '$user_id'";
        $arr = $objDbSelect->GetArray($sqlconfirm);
        if($arr[0]['rowcount']>0&&is_array($arr)){
            $newpass = EncryptPass($newpass);
           $sqlupdate = "update  tbl_user SET pass = '$newpass' WHERE id = '$user_id'";
           if($objDbSelect->Execute($sqlupdate)){
              $objResponse->addAlert("Bạn đã thay đổi mật khẩu thành công!");
              $objResponse->addScript("$('#w01_changepass').modal('hide')");   
           }else{
              $objResponse->addAlert("Bạn đã thay đổi mật khẩu that bai."); 
           }
           //$objResponse->addScript("$('#frmchangepass_dialog').dialog('close');");   
        }else{
           $objResponse->addAlert("Mật khẩu cũ sai, vui lòng nhập lại!");
        }     
    
    }
  $objResponse->addScript('changeWaiting(1);');
  return $objResponse->getXML();
}

function ChangeSysName(){
    
    $objResponse = new xajaxResponse();     
    if($_SESSION['current']['power_type_id']!=0){
      $objResponse->addScript("$('#w01_changeSysName').remove()");
      $objResponse->addScript("$('.named').removeAttr('onclick')");
      $objResponse->addScript("$('.named').removeAttr('data-toggle')");
      $objResponse->addScript("$('.named').removeAttr('data-target')");
    }
    return $objResponse->getXML();
}

function saveSysName($param){
    global $objDbSelect;
   $objResponse = new xajaxResponse();
     if($_SESSION['current']['power_type_id']!=1){
      $objResponse->addAlert('Bạn không có quyền thực hiện chức năng này!');  
    }else{
      $newtitle_vi  =  addslashes($param['newtitle_vi']) ;
      $newtitle_en  =  addslashes($param['newtitle_en']) ;
      $id  =  addslashes($param['id']) ;
      $sql ="update tbl_language set en = '$newtitle_en',vi = '$newtitle_vi' where id_element =  '$id'" ;
      if($objDbSelect->Execute($sql)){
         $objResponse->addAlert('Cập Nhật Thành Công'); 
         $objResponse->addScript("$('#w01_changeSysName').modal('hide')"); 
		 $objResponse->addScriptCall('location.reload();');		 
      }else{
         $objResponse->addAlert('Cập nhật thất bại'); 
      }
      //$objResponse->addScript("$('#td_helptitle').remove()");  
    } 
   
   return $objResponse->getXML(); 
}
function saveControlWasp($param){
    global $objDbSelect;
    $objResponse = new xajaxResponse();
    if(empty($param['control_wasp_id'])){
      $objResponse->addAlert('Xin vui lòng thực hiện lại');
      $objResponse->addScriptCall('location.reload();');	
    }else{
        $wasp_id   = $param['control_wasp_id'];
        $sqlDelete = "delete from config_control where wasp_id = '$wasp_id'"; 
        $arr       = $objDbSelect->Execute($sqlDelete);
        $dataName  = array("DEN","OXY_DAY","QUAT","OXY_NHUYEN");
        $str = '';
        $time_current = $timestam = date('Y-m-d H:i');
        $duration_den       = $param['duration_den'];
        $duration_oxyday    = $param['duration_oxyday'];
        $duration_quat      = $param['duration_quat'];
        $duration_oxynhuyen = $param['duration_oxynhuyen'];
        
        $status_den      = $param['control_den_status'];
        $status_oxyday   = $param['control_oxyday_status'];
        $status_quat     = $param['control_quat_status'];
        $status_oxynhuyen= $param['control_oxynhuyen_status'];
        
        $expired_den       = (!empty($status_den) && $duration_den > 0)?date('Y-m-d H:i', strtotime($time_current . " +$duration_den hours")):NULL;
        $expired_oxyday    = (!empty($status_oxyday) && $duration_oxyday > 0)?date('Y-m-d H:i', strtotime($time_current . " +$duration_oxyday hours")):NULL;
        $expired_quat      = (!empty($status_quat) && $duration_quat > 0)?date('Y-m-d H:i', strtotime($time_current . " +$duration_quat hours")):NULL;
        $expired_oxynhuyen = (!empty($status_oxynhuyen) && $duration_oxynhuyen > 0)?date('Y-m-d H:i', strtotime($time_current . " +$duration_oxynhuyen hours")):NULL;
        
        for($i=0;$i<count($dataName);$i++){
            $name =  $dataName[$i];
            if($name == 'DEN') {
                $str.= ",('$wasp_id','$name','$status_den','$duration_den','$time_current','$expired_den','$timestam')";
            }
            if($name == 'OXY_DAY') {
                $str.= ",('$wasp_id','$name','$status_oxyday','$duration_oxyday','$time_current','$expired_oxyday','$timestam')";
            }
            if($name == 'QUAT') {
                $str.= ",('$wasp_id','$name','$status_quat','$duration_quat','$time_current','$expired_quat','$timestam')";
            }
            if($name == 'OXY_NHUYEN') {
                $str.= ",('$wasp_id','$name','$status_oxynhuyen','$duration_oxynhuyen','$time_current','$expired_oxynhuyen','$timestam')";
            }
        }
        if(strlen($str)>1){
            $str = substr($str, 1);
            $sql = "INSERT INTO config_control(wasp_id,name,status,duration,time_current,time_expired,timestamp) values$str";            
        }
        if($objDbSelect->Execute($sql)){
           $objResponse->addAlert('Cập Nhật Thành Công'); 
           $objResponse->addScript("$('#w02_control').modal('hide')"); 
           //$objResponse->addScriptCall('location.reload();');		 
        }else{
           $objResponse->addAlert('Cập nhật thất bại'); 
        }       
    }    
    return $objResponse->getXML(); 
}