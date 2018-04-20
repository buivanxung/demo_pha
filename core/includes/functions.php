<?php
if(!defined('IN_CHUYENNHAT'))
{
    die(SYSTEM_DIRECT_ACCESS);
}

/*
SELECT ".$fieldName." AS `name` FROM ".$table." WHERE ".$fieldId." = ".$id
*/
function GetNameById($table, $fieldId, $fieldName, $id)
{
    global $objDbUpdate;

    $sSQL = "SELECT ".$fieldName." AS `name`
            FROM ".$table." WHERE ".$fieldId." = ".$id;
    $rs = $objDbUpdate->Execute($sSQL);
    $result = isset($rs->fields['name']) ?$rs->fields['name']: "";
        if($result==''){
            $result = STR_ALL;
        }
    return $result;
}

function checkAuthorToGoPage(&$sCanEdit){
  try{
        global $objDbSelect;         
         if(isset($_GET['m'])){
            $arrGeneralModules = array('color_picker','login','forgotpass','login_contact',
            'login_new_tech','login_complain','login_list_customer','login_terms', 'resetpass', 'default', 
            'home','logout','switchuser','general_day_ex','login_help','test');
           $arrModulesforUser = array(  
                     POWERID_ADMINISTRATOR=>array('historylog_detail','tracking_conf','branch_managerment','newtech_managerment'),
                     POWERID_ACCOUNTANT=>array('historylog_detail','newtech_managerment'),
                     POWERID_AGENCY=>array('historylog_detail','newtech_managerment'),
                     POWERID_CUSTOMER=>array('maps','reportgpsdetail','login_new_tech'),
                     POWERID_SALE=>array('newtech_managerment'),
                     POWERID_SUBCUSTOMER=>array('maps','reportgpsdetail','login_new_tech'),
                     POWERID_INSTALL_HARDWARE=>array('historylog_detail','newtech_managerment'),
                     POWERID_TECHNICAL_SUPPORT=>array('historylog_detail','newtech_managerment')
                    );   
            for($i=0;$i<count($arrGeneralModules);$i++){
                if($_GET['m']==$arrGeneralModules[$i]){
                    $sCanEdit=1;
                    return true;
                }
            }
            $group = $_SESSION['group'];
            $arrModule = $arrModulesforUser[$group];
             for($i=0;$i<count($arrModule);$i++){
                if($_GET['m']==$arrModule[$i]){
                    $sCanEdit=1;
                    return true;
                }
            }
            
            $mModules = addslashes($_GET['m']);
            $User     = addslashes($_SESSION['username']);
            $sqlMenu = "select id from tbl_menu where module = '$mModules'";
            $arrMenu = $objDbSelect->GetArray($sqlMenu);
            $menuId =-1;
            if(count($arrMenu)>0){
                $menuId = $arrMenu[0]['id'];
            }else{
                return false;
            }
            
            $sqlResult = " select powers  from tbl_powers where id = (select roleid from tbl_users 
            where username = '$User') and (powers like '%;$menuId:%' or powers like '$menuId:%' )";
            $arrResult = $objDbSelect->GetArray($sqlResult);
            if(count($arrResult)>0){
                $pos = strpos($arrResult[0]['powers'], "$menuId:");
                $posOffset =0;
                if($pos!=0){
                    $posOffset = strpos($arrResult[0]['powers'],";$menuId:")+1;
                }
                $temp = substr($arrResult[0]['powers'],strlen($menuId)+1+$posOffset,1);
                if($temp==2){
                    $sCanEdit=1;
                }else{
                    $sCanEdit=0;
                }
                return true;
            }else{
                return false;
            }
        }else{
           return true;
        }
      }
    catch(Exception  $e){
        return false;
    }
}

function SetCombobox($rs, $display, $value, $default = '', $recordset = true)
{
    $sHtml = '';
    if($recordset)
    {
        if(!$rs) return $sHtml;
        if($rs->RecordCount() == 0) return "";   
        do
        {
            $sHtml .= '<option value="'.(isset($rs->fields[$value]) ? $rs->fields[$value] : '').'"'
                .($default == $rs->fields[$value] ? ' selected' : '').'>'
                .(isset($rs->fields[$display]) ? $rs->fields[$display] : '').'</option>';
        } while($rs->MoveNext());
    }
    else
    {
         if(!$rs) 
        {
          return "";  
        }
        if($rs->RecordCount() == 0) return "";
        if(!is_array($rs)) return $sHtml;
        foreach($rs as $val)
        {
            if(is_array($val))
            {
                $sHtml .= '<option value="'.(isset($val[$value]) ? $val[$value] : '').'"'
                    .($default == $val[$value] ? ' selected' : '').'>'
                    .(isset($val[$display]) ? $val[$display] : '').'</option>';
            }
        }
    }
    return $sHtml;
}



//Tao combobox tu recordset
function setComboRs($rs, $text, $value, $selected = "")
{
    $str = "";
    if($rs)
    {
        $rs->MoveFirst();
        while($r = $rs->FetchRow())
        {
            $str .= "<option value=\"".(isset($r[$value]) ? $r[$value] : "")."\"".((isset($r[$value]) && $r[$value] == $selected) ? " selected" : "").">".(isset($r[$text]) ? $r[$text] : "")."</option>";
        }
    }
    return $str;
}

/*
    Function MsgBox($sMessage): hien thi messagebox
*/
function MsgBox1($sMessage)
{
    echo '<script language="Javascript" type="text/javascript">alert("'.$sMessage.'");</script>';
}

/*
  Function DBErro(): Xu ly khi bi loi xu ly database
*/
function DBErro()
{
    CloseDB();
    die(ERROR_CONNECT_DB);
}

function EncryptPass($sSrc)
{
    $sReturn = base64_encode( pack( "H*", md5($sSrc) ) );
    return($sReturn);
}// end of function EncryptPass

// Ham show navbar: hien thi thanh chon trang cua grid du lieu

 
function GetVarVal($sVar, $sDefVal = 'default')
{
    global $arrModuleNoAutho,$objDbSelect;    
    
    if(!isset($_SESSION['userid'])){
       // session_destroy();
        if(in_array($sVar,$arrModuleNoAutho)){
            return $sVar;
        }
        return 'login';        
    }else{
       $userid = $_SESSION['userid'];
       $sVar = addslashes($sVar);
       $sql = "select id from tbl_menu where id = (select menu_id from tbl_power where role_id = (select role_id from tbl_user where id = $userid  )) and module = '$sVar' and active = 1 and category_type =2 ";
       $arrTemp = $objDbSelect->GetArray($sql);
       if(count($arrTemp)>0){
           return $sVar;
       }
       return 'default' ;
    }
}


function Redirect($sUrl)
{
    $sRedirect_Notice = StringFormat(SYSTEM_SWICH_PAG,$sUrl);
    echo '<script language="Javascript" type="text/javascript">';
    echo 'window.location.href="'.$sUrl.'"';
    echo '</script>';
    echo $sRedirect_Notice;
    exit;
}
function StringFormat($sourceMessage,$arrReplace=null)
{
    $numargs = func_num_args();
    $arrLetter=array();
    if(func_num_args()<3)
    {
        if($arrReplace==null)
        {
            return $sourceMessage;
        }
        if(!is_array($arrReplace))
        {
            return str_replace('{0}',$arrReplace,$sourceMessage);
        }
        else
        {

            for($i=0;$i<count($arrReplace);$i++)
            {
                $arrLetter[]='{'.$i.'}';
            }
            return str_replace($arrLetter,$arrReplace,$sourceMessage);
        }
    }
    else
    {
        $arrToReplace=array();
        $arg_list = func_get_args();
        for($i=0;$i<$numargs-1;$i++){
            $arrLetter[]='{'.$i.'}';
            $arrToReplace[]=$arg_list[$i+1];
        }
        return str_replace($arrLetter,$arrToReplace,$sourceMessage);
    }
}


function lat($lat)
{
    $lat1=substr($lat,0,2);
    $lat2=substr($lat,2);


    $lat=$lat1 + $lat2/600000;
    return $lat;
}
function long($long)
{
    $long1=substr($long,0,3);
    $long2=substr($long,3);
    $long=$long1 + $long2/600000;
    return $long;
}


/**
* Hàm kiểm tra trong chuổi có ký tự đặt biệt không.
* Input $string: là chuổi cần kiểm tra.
* Output True nếu có, False nếu không có.
**/
function Checkspecialchar($string)
{
    $char='[~`!@#$%^&*()+=|]';
    $found = ereg($char, $string); // true
    if($found==true)
    {
        return true;
    }
    else
    {
        return false;
    }
}

/**
* Hàm chuyển số giây thành định dạng hh:ii:
* Input: $second: giây cần chuyển.
* Output: chuyển về thành định dạng hh:ii
**/
function ConvertToHMS($otime)
{
    global $lang;
    $day = ' ngày ';
    $hour = ' giờ ';
    $minute = ' phút';
    
    if($lang=='en'){
        $day = ' d';
        $hour = ' h ';
        $minute = ' m';  
    }
    $d = (int)($otime / (3600*24));
    $otime = $otime % (3600*24);
    $h = (int)($otime / 3600);
    $md = $otime % 3600;
    $m = (int)($md / 60);
    $strResult = '';
    if($d>0){
      $strResult.=  $d . $day;
    }
     if($h>0){
      $strResult.=  $h . $hour;
    }
     if($m>0){
      $strResult.=  $m . $minute;
    }
       
    return $strResult;
    
}

/**
* Hàm chuyển số giây thành định dạng hh:ii:
* Input: Phut  cần chuyển.
* Output: chuyển về thành định dạng hh:ii
**/
function ConvertTimeToHM($otime)
{
   global $lang;
    $hour = 'h';
    $minute = 'p';
    
    if($lang=='en'){
        $hour = ' h ';
        $minute = ' m';  
    }
    $h = (int)($otime / 60);
    $m = (int)($otime % 60);
    $m = str_pad($m,2,"0",STR_PAD_LEFT);
    $strResult='';
    $strResult.=  $h . $hour .$m.$minute;
    return $strResult;
    
}

function Query($sql)
{
    global  $objDbSelect;
    $objDbSelect = &$objDbSelect;
    $rsResult = $objDbSelect->ExeCute($sql);
    return $rsResult;
}
function CovertVn($str)
{
    $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|� �|ặ|ẳ|ẵ)/", 'a', $str);
    $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
    $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
    $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|� �|ợ|ở|ỡ)/", 'o', $str);
    $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
    $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
    $str = preg_replace("/(đ)/", 'd', $str);
    $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|� �|Ặ|Ẳ|Ẵ)/", 'A', $str);
    $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
    $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
    $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|� �|Ợ|Ở|Ỡ)/", 'O', $str);
    $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
    $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
    $str = preg_replace("/(Đ)/", 'D', $str);
    $str = preg_replace("/( )/", ' ', $str);
    $str = preg_replace("/(<br>)/", '', $str);
    $str = preg_replace("/(\n)/", '', $str);
    return $str;
}

// Add-Start By Lamdhn - 2010.11.02 - Chuyen tu V2.1 -> V3.0 
/**
* Hàm thêm phân trang bằng xajax
* 
* @param int $nRecCnt Tổng số dòng
* @param int $nPageNum Trang hiện tại
* @param int $nItemsperPage Số dòng trên 1 trang
* @param clsTinyButStrong Đối tượng Template engine
*/
function ShowNavBarXAjax($nRecCnt, $nPageNum=1, $nItemsperPage=10, $objTemplate)
{
    global $tpl_bDisPlayNavBar;

    if($nItemsperPage <= 0)
    {
        $nItemsperPage = 100;
    }

    $nPages = (int)($nRecCnt/$nItemsperPage);
    if($nRecCnt%$nItemsperPage > 0)
    {
        $nPages++;
    }
    if($nPages > 1)
    {
        $tpl_bDisPlayNavBar = "";
    }
    else
    {
        $tpl_bDisPlayNavBar = "none";
    }
    // Merge data to main grid's pages nav
    $arrNavInfo = array();
    $arrNavInfo['navsize'] = 10;
    $arrNavInfo['navpos'] = 'centred';

    include_once(CORE_PATH.'classes/plug-ins/tbs_plugin_navbar.php');
    $objTemplate->PlugIn(TBS_INSTALL,TBS_NAVBAR);
    $objTemplate->PlugIn(TBS_NAVBAR,'nv', $arrNavInfo, $nPageNum,$nRecCnt, $nItemsperPage) ;
}

function GetCurrentURL() 
{
    $pageURL = 'http';
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") 
    {
        $pageURL .= "s";
    }
    
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") 
    {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    }
    else 
    {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
            
    return $pageURL;
}


// Add-End By Lamdhn - 2010.11.02 - Chuyen tu V2.1 -> V3.0 

// Các hàm Maps
/**
* Get map key
* @author ĐậmPV
* @since 2010-08-31
*
*/
//function GetMapsKey()
//{
//    global $vkey, $gkey;
//    if ($_SERVER['HTTP_HOST']=='192.168.0.149')
//    {
//        $vkey='E43pcmZHdUgHgZ1BVAdwb0qcGS57Z/Dw';
//        $gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRTO6Nofa28CSIvRoZJ3A5zfJd6sJxQZ6RbD0XPodHHc55-ykJpyIzdPsg';
//    }
//    else if ($_SERVER['HTTP_HOST']=='210.86.239.199')
//    {
//        $vkey='5lJdIlKaLKebTH7QMtkzdYE/2OcAXFBz';
//        $gkey='ABQIAAAAlztVfZUqzeQOopFxYIBBHhQAThoAZDUbKKqpcwHg1m-B1ZkOuhRx_s5O0pWJ5EN9AnpeP0Dbh_g13w';
//    }
//    else if ($_SERVER['HTTP_HOST']=='chuyennhat.vn')
//    {
//        $vkey='5lJdIlKaLKebTH7QMtkzdYE/2OcAXFBz';
//        $gkey= 'ABQIAAAA5jt47M8H8oITy6bqaDj9lRRBs9vyYicbEmSJTyHlzx-qOuBEuBRf0K8udIV55wIjtoUqgYBFhNJrDA';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.chuyennhat.vn')
//    {
//        $vkey='1hYnaBX17cQxRIBSO/B0ud2M8fah5NAv';
//        $gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRQfjv_CbxCrA7BzWTVMIwhZfcGWTBSpgbI2IlVyibpmNhsnLAn-zFqv6g';

//    }
//    else if ($_SERVER['HTTP_HOST']=='theodoidinhvi.com')
//    {
//        $vkey='xRFQCP4sH3nCMD5LEK81H62YZO8sssaMI44EhSSXaos=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxQc9EHybtzV69KEmdh7xxYlsVH1KhQ_0YxGHJyODDwE6J9Z5G1b3JItaA';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.theodoidinhvi.com')
//    {
//        $vkey='1hYnaBX17cSSY+AiMpzAdUFs7oV8CrDPwL0B7mmFx8c=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRh1QnnyfL7qKCd47VIa-GwMU7ZWRRmUgdEB4sPlyJID_Aa5p1hGpKK4g';
//    }
    //==== dinh vi theo doi
//    else if ($_SERVER['HTTP_HOST']=='dinhvitheodoi.com')
//    {
//        $vkey='Rb3AOZxodVPHXVb+FymWGTfaZqoe7VqPwyc/GeA+aMo=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxQm6l6Pt1lYzw2QAvPgmtA1BXu28RRVoXBAG7nB86iYcSKBZNlEm_w-kQ';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.dinhvitheodoi.com')
//    {
//        $vkey='1hYnaBX17cS7NT/99yNx3z37Dz7EKkQuIaeEMUFjiys=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR7M6d_HFOK2ma5xKWlagXtnYXWHBR-MXmxHyMEvqOValdUZeMl5BTkrw';

//    }
    //==== theo doi o to
//    else if ($_SERVER['HTTP_HOST']=='theodoioto.com')
//    {
//        $vkey='xRFQCP4sH3npnISjL95Pjl3GrzFi5mQW';
//        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBRzNWJe9MXGIFjaaDpbNi1LOOm6vBR893ALKFcfQrd07h7h5oQFu0w2BA';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.theodoioto.com')
//    {
//        $vkey='1hYnaBX17cSSY+AiMpzAdfbtQLjaKONXWiBvgJl6DlY=';
//        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBS1mEdBchzjhgLg3qUHelcXR2Cz1BQexnYLOKwlfZhJifLAv_hXjCWDCw';
//    }
//====
//    elseif($_SERVER['HTTP_HOST'] == 'localhost')
//    {
//        $vkey='e7vjH+pgQHuSyV75dwG6hq0WQek+cVqm';
//        $gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxRAN8zE0L5YLzQ4s3Grt2HN3XH-jg';

//    }
//    else if ($_SERVER['HTTP_HOST']=='gps.tru-e.vn')
//    {
//        $vkey='OgU0D+rO9mGR4SZLqM+NvAE+TL1KFyrG';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRj2rDGjOyISiWF9mP6wn2hudI4rxSxGUMpJQr1UUstwJfU12RJVwdsYw';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.gps.tru-e.vn')
//    {
//        $vkey='1hYnaBX17cRYVi/HtGWCNdHsFWWb6d3YvhPTT4ZC2fM=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSw-WdHrSh9K4IqJ-cg8aMacIdIChQkrWW2LVUQYZP9AYZPJfDKFe1dAw';

//    }
//    else if ($_SERVER['HTTP_HOST']=='prossgps.com')
//    {
//        $vkey='MrR9ZR4xcGdY3wQK5vhpSdMbnTYUQwVw';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxQYI8XWnc9Nw82tfB6gw0RVRzBpxxQpFfl61F7l7aO2s0lwgsOzwD1GUw';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.prossgps.com')
//    {
//        $vkey='1hYnaBX17cTgN6SMySPzxdhalCnM+GlsuPr5h++Lt0Y=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR8_0RLBcv7iFwqetI0DjiPbEM5VhTsV7R2vyNvGVlPjJkto02mEy-rIg';
//    }
//    else if ($_SERVER['HTTP_HOST']=='dcttgps.com')
//    {
//        $vkey='Rb3AOZxodVOqJxifEsi3g6YREXAx+kuH';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSm8H8fp7XLu_cOqfF4GPThBCuYIBQsoORMTcCrG0KFM6i0CxfBoobLHw';
//    }
//    else if ($_SERVER['HTTP_HOST']=='www.dcttgps.com')
//    {
//        $vkey='1hYnaBX17cRFVYvhy1bPc4GPkY4PjPdV';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRy78bcu6CmzIHFVw-ZzNK9oH0_sxQC5dWsuQfcZi-GxU_xjm0E0bMylA';
//    }
//    else if ($_SERVER['HTTP_HOST']=='huyphatgps.com')
//    {
//        $vkey='ZJmw3yKQ3juiP3cVw7aIJb2ClC5V0xYd';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxTNJ6re42JINpO9v7ele3WPi73feBTxjrYZxq-LTu8RVzicwsx9KRVp8Q';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.huyphatgps.com')
//    {
//        $vkey='1hYnaBX17cRi0tmnrEHVJeSLy77ZD1p+aCe0KpldL/I=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSxHD1wa6EkhsbxOxMJrM8azxET3RQygA4zeA02sxuqUyVKwBYH3HLwHw';
//    }
//    else if ($_SERVER['HTTP_HOST']=='gps.phuhoa.com')
//    {
//        $vkey='OgU0D+rO9mGO6hel0BOyq1Ai4Hsc7zLp';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR3JnlpIZ9-xWp8E28TRkERPzeH1RQDBkI_ODi2-0Dx5uAVgvFlY9tt_Q';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.gps.phuhoa.com')
//    {
//        $vkey='1hYnaBX17cQcwZURoqNrZ4FhuuYHBWZWMwku4HYQCek=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRPPFw_Pq7qhP0LM7D66_-GTccNORSK0cHm1vrXtTXCRUtOB2y48CvLFQ';

//    }
//    else if ($_SERVER['HTTP_HOST']=='www.dananggps.com')
//    {
//        $vkey='1hYnaBX17cRCNxe9+dwoy8A/OH6OC1LhLB0WgbaSQKo=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR8Ig2TBjUZyT-jIHEQ08MWhQc3lRTZzdfSAZJIddBIOqk8j98J0cPHcg';

//    }
//    else if ($_SERVER['HTTP_HOST']=='dananggps.com')
//    {
//        $vkey='Rb3AOZxodVNrrkKrhsx7qx/x2QXgMKcb';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxTmSvPpRb7av6D0A3nXzH4ZWFNr7BRZE2FK73SHwgyXryTXfNLTtELjHA';

//    }
//    else if ($_SERVER['HTTP_HOST']=='gps.congnghethantai.com')
//    {
//        $icon ='thantai.png';
//        $Logo='thantai.JPG';
//        $URL = 'congnghethantai.com';
//        $vkey='OgU0D+rO9mGFLlC1IGNKZbmW8sVB7qmGhIu6+QXjYIY=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSeot0UXC85Ssi64vTFvzC88W2GPBTRBtSKfvlWpbwqp6mmCLxr39Feqg';
//    }
//    else if ($_SERVER['HTTP_HOST']=='www.gps.congnghethantai.com')
//    {
//        $icon ='thantai.png';
//        $Logo='thantai.JPG';
//        $URL = 'congnghethantai.com';
//        $vkey='1hYnaBX17cSD+92OxdCeO5okHQ321W1AfzXhpOqqSiIEstC7dDiJGg==';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSyzREWOFAiWn4bt_AnXvFElQsDbhQfJvdGOHcqwARFV-_I5lE-LnCgnA';

//    }
//    else if ($_SERVER['HTTP_HOST']=='gps.adasolution.net')
//    {
//        $URL = 'gps.adasolution.net';
//        $vkey='OgU0D+rO9mG4+2Y4dfYKZ6jbo+fpFJX/ry06bQ9lrH4=';
//        $gkey='ABQIAAAAjid_8ZzkReKvKNPMF_W4ghSaamLcNm8Al0d6bQGTEEeFR3Gr9RQmI3yR_0vzRwiU9RkgP9lsxwpY1Q';
//    }
//    else if ($_SERVER['HTTP_HOST']=='www.gps.adasolution.net')
//    {
//        $URL = 'gps.adasolution.net';
//        $vkey='1hYnaBX17cQg5dLsQXOUKpKsTzuV5wJduWHRQ8+80wM=';
//        $gkey='ABQIAAAAjid_8ZzkReKvKNPMF_W4ghSvKdP_G4heX4LTRt0J40doWMP3DBSOeTu4pilcr49aCcSBoXXzso90tw';
//    }
//    else if ($_SERVER['HTTP_HOST']=='gps.thinhtoanvn.com')
//    {
//        $URL = 'thinhtoanvn.com';
//        $Logo='logothinhtoan.png';
//        $icon ='favicon.ico';
//        $vkey='OgU0D+rO9mHqRHm+0qKEwdXymtlIJyfPi2zlgOjl40w=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRiVrcjpmeL7GoeohGIPhFWfZ88SBTGAYFlfjqeD3t4lvHP_W7CQEXd8g';
//    }
//    else if ($_SERVER['HTTP_HOST']=='www.gps.thinhtoanvn.com')
//    {
//        $URL = 'thinhtoanvn.com';
//        $Logo='logothinhtoan.png';
//        $icon ='favicon.ico';
//        $vkey='1hYnaBX17cRYVi/HtGWCNVw9Uewvrf2ILBAzQZ0Y/jg=';
//        $gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRwB9PGO0W1ud2MVLBuN28LI0Qd0RSg331KBQtRt1oJkZTViQsTkB49CQ';
//    }
//    else if ($_SERVER['HTTP_HOST']=='v3.chuyennhat.vn')
//    {
//        $icon ='favicon.ico';
//        $vkey='zR18NATbNEZXixl05tehka//+6ZRNa5p';
//        $gkey='ABQIAAAAQSKty3ydIP9bHhY95JxgVRTaiOOMFheALUby0UD5OInaXRAtMxRhmeQLe334ojqHh6aAGG6kp8GkZA';
//    }
//    else if ($_SERVER['HTTP_HOST']=='phuongtrang.chuyennhat.vn')
//    {
//        $icon ='favicon.ico';
//        $vkey='MrR9ZR4xcGff7kzS6w8B1ntjqpegSF3J3IXJM7g9xGI=';
//        $gkey='ABQIAAAAlztVfZUqzeQOopFxYIBBHhT7iv-3DjZTjMgmC51AeDVe-nJMZRRopKY1ppesaQcpMU1I-8EM3u_r7Q';
//    }
//    else if ($_SERVER['HTTP_HOST']=='futa.chuyennhat.vn')
//    {
//        $icon ='favicon.ico';
//        $vkey='s8VtT2zFF/x1x3iVRsrtPwh1TW4e1OmX';
//        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBTaKABekK5UCUUEYXD5B8Dr4K27fRTNu9WA2z3AK5sf_yuiC5glsR2DUA';
//    }
//     else if ($_SERVER['HTTP_HOST']=='localhost:8081')
//    {
//        $icon ='favicon.ico';
//        $vkey='e7vjH+pgQHuSyV75dwG6hmzegcW44MhD';
//        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBTaKABekK5UCUUEYXD5B8Dr4K27fRTNu9WA2z3AK5sf_yuiC5glsR2DUA';
//    }
//    else
//    {
//        
//        $vkey='E43pcmZHdUidihFQnTP4CPtCvmL1MeGC';
//        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBRIjWmpOxcwII4fD3JFn_ThfKEAPRT8CYl0W1my4TBHsm9RFQ3R3dujJw';

//    }
//}
function checkfrmDate($date,$type=0){
    $regexdate ='';
    $regexdatetime ='';
    if($_SESSION['lang']=='vi'){
      $regexdate = '(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)[0-9]{2}';
      $regexdatetime = '(0[1-9]|[12][0-9]|3[01])[- /.](0[1-9]|1[012])[- /.](19|20)[0-9]{2} (([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))';  
    }   
    else if($_SESSION['lang']=='en')
    {
      $regexdate = '(19|20)[0-9]{2}[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])';
      $regexdatetime = '(19|20)[0-9]{2}[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01]) (([0-1][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))';  
    }
    
    if($type!=0)
    return eregi($regexdatetime,$date);
    return eregi($regexdate,$date);    
}
 function ToDisplayDateTime($sSrc)
 {  
    if($_SESSION['lang']!='vi'){
      $arrT = split(" ",$sSrc);
      return $arrT[0]; 
   }
    $arrT = split(" ",$sSrc);
    $arrTmp = split("-",$arrT[0]);
    $sReturn = $arrTmp[2]."/".$arrTmp[1]."/".$arrTmp[0];    
    return($sReturn);
 }
 

/**
* hàm này kiểm tra user nào được chuyển quyền user
* 
*/
function Is_Can_Switchuser($group)
{
  // nếu là quyền quản trị  , đại lý ,kinh doanh,nhân viên lắp đặt,hổ trợ kỹ thuật
  if ($group==POWERID_ADMINISTRATOR || $group==POWERID_AGENCY  
     || $group==POWERID_SALE || $group==POWERID_INSTALL_HARDWARE || $group==POWERID_TECHNICAL_SUPPORT) 
     {
     return true;  
     }
  else
     {
       return false;   
     }    
}



 function convertSecondToHM($time){
    $minute =  $time/60;
    $hour =  floor($minute/60);
    $minute = $minute % 60   ;
    if(strlen($minute)==1){
         $minute = "0".$minute;
    }
    return $hour . ":" .$minute; 
 } 

function funcConvertDateToYMD($sSrc)
{
    if($_SESSION['lang']!='vi'){
     return $sSrc;   
    }
    $arrT = split(" ",$sSrc);
    $arrTmp = split("/",$arrT[0]);
    $sReturn = $arrTmp[2]."-".$arrTmp[1]."-".$arrTmp[0]." ".$arrT[1];    
    return($sReturn);
}

function LoadHelp($smodule)
{
    global $objDbSelect,$arrConfig;  
    
    $cond ='';
    if ($_SESSION['group'] != POWERID_ADMINISTRATOR)
    {
       $cond .= " AND h.active = 1";   
    }
    $lang = $arrConfig['lang'] ;    
    $sSQL = "SELECT h.id,m.name$lang as name FROM tbl_menu as m LEFT JOIN tbl_help as h ON m.id = h.screenid $cond WHERE m.module ='$smodule'";
    // echo   $sSQL;die();
    $rs = $objDbSelect->Execute($sSQL);
    if($rs->RecordCount() == 0)
    {
      return ''   ;
    }
    else
    {   $strImage ='';
        if($rs->fields['id']!=''){
           $strImage  = '<img style="height:22px;cursor:pointer; padding-top:5px;" alt="Hướng dẫn sử dụng" title="Hướng dẫn sử dụng" src="images/treeview/help.png" onclick="fn_help('.$rs->fields['id'] .');" /> ';

        }
      return '<table align="center" width="100%"  border="0"  cellSpacing="0" cellPadding="2">
                <tr>
                <td width="95%">
                <div class="aligntitle"> 
                <span class="title">'.$rs->fields['name'] .'</span>
                </div>
                </td> 
                <td width="5%"> 
                '.$strImage.'
                </td>
                </tr>
                </table>';
    }
}

function GetDependEngine($devid,$input){
    global $objDbSelect;
    $result = false;
    $sql = "select engine$input as engine from tbl_input_devices where devid='$devid'";
    $arr = $objDbSelect->GetArray($sql);
    if(count($arr)>0){
        if($arr[0]['engine']=='1'){
           $result=true; 
        }
    }
    return $result;
}

//trung add ham để dùng cho transaction
function ExecuteTranc($arrStatement){
    global  $dbTranc;
    try {  
      $dbTranc->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
      $dbTranc->beginTransaction();      
      for($i=0;$i<count($arrStatement);$i++){
          $dbTranc->exec($arrStatement[$i]);  
      }
      $dbTranc->commit();
      return 1;
      
    } catch (Exception $e) {
      $dbTranc->rollBack();
      return 0;
    }  
}
//trung add ham để dùng cho transaction
function createArrayPowers($strPowers){
    $arr = explode(';',$arr) ;
    $arrResult = array();
    for($i=0;$i<count($arr);$i++){
        if($arr[$i]!=''){
              $temp = explode(':',$arr[$i]);
              $arrResult[$temp[0]]= $temp[1];
        }
    }
    return  $arrResult;
}
function createStrPowers($strPowers,$substrPowers){
      $arr = createArrayPowers($strPowers);
      $arrSub =  createArrayPowers($substrPowers);
      $arrLast = array_intersect_key($arr,$arrSub);
      $strLast ='';
      foreach($arrLast as $key => $value){
          if($values==2){
             $strLast .= $key.':'.$arrSub[$key].';';            
          }else{
             $strLast .= $key.':'.$value.';';   
          }
      }
      if(strlen($strLast)>0){
          $strLast = substr($strLast,0,strlen($strLast)-1);
      }
      return  $strLast;
             
}

function GetRowCount($sSQL) {
    global $objDbSelect;
    
    $rs = $objDbSelect->Execute($sSQL);

    $row_count = isset($rs->fields['rownum']) ? $rs->fields['rownum'] : 1;
    
    return $row_count;
}

function saveLogs($actionType,$objType,$obj,$sql_text){
        global $objDbUpdate,$objDbSelect,$sModule;
        $sql = " Select id from tbl_menu where module= '$sModule' ";
        $arrMenuId = $objDbSelect->GetArray($sql);
        $sMenuId = $arrMenuId[0]['id'];
        $username = (isset($_SESSION['su_by'])?$_SESSION['su_by']:$_SESSION['username']);
        $sql_text = addslashes($sql_text);
        $username = addslashes($username);
        $sql = " insert into tbl_newactionlogs(action_time,username,module_id,action_type,obj_type,obj,sql_text) 
        values(now(),'$username',$sMenuId,$actionType,$objType,'$obj','$sql_text') " ; 
        $objDbUpdate->Execute($sql);
}
# Start Region cho cac ham moi tao sau

    
  function RevertDate($sDate, $bTime = false)
{
    $sTime = '';
    if($bTime)
    {
        $sTime = substr($sDate, -8);
        // Kiem tra ngay thang dung dinh dang
        $TimePatt = '/^(([0-1][0-9])|(2[0-4])):[0-5][0-9]:[0-5][0-9]$/';
        if(!preg_match($TimePatt, $sTime))
        {
            //MsgBox1('Gio khong hop le');
            return('');
        }
        $sDate = substr($sDate, 0, 10);
    }

    $DatePatt = '/^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4}$/';
    if(!preg_match($DatePatt, $sDate))
    {
        //MsgBox1('Ngay khong hop le: '.$sDate);
        return('');
    }

    $arrTmp = split("/", $sDate);
    if(count($arrTmp) != 3)
    {
        MsgBox1('Ngay khong hop le 1: '.$sDate);
        return("");
    }
    $sReturn = $arrTmp[2]."-".$arrTmp[1]."-".$arrTmp[0].' '.$sTime;
    return(trim($sReturn));
}
/*
*description : tao menu theo quyen cua cac user 
* params : no params
* return : menu list
*/
function CreateListMenu(){
    global $objDbSelect;
    $power = $_SESSION['power'];
    $module = (isset($_GET['m'])?$_GET['m']:'-1');
    $order = (isset($_GET['o'])?$_GET['o']:'-1');
  //  $sql = 'SELECT name_vi_menu,id,category_order,category_type,module FROM tbl_menu WHERE id IN (SELECT menu_id 
//    FROM tbl_power WHERE id = '.$power.' AND active =1 ) AND active =1 order by category_order,category_type,name_vi_menu';
  $sql = 'SELECT name_vi_menu,id,category_order,category_type,module FROM tbl_menu WHERE  active =1 order by category_order,category_type,name_vi_menu';
    //echo $sql;die();
    //$sql = 'SELECT name_vi_menu,id,category_order,category_type,module FROM tbl_menu order by category_order,category_type,name_vi_menu';

    $arrMenu = $objDbSelect->GetArray($sql);
    $count = count($arrMenu);  
    $curOrder =-1;  
    $strResult ='';
    $nameMenuShow = '';
    $hdmenu = 0;
    for($i=0;$i<$count;$i++){
        $menuname = $arrMenu[$i]['name_vi_menu'];
        $ordertemp = $arrMenu[$i]['category_order'];
        $moduletemp = $arrMenu[$i]['module'];
        $type = $arrMenu[$i]['category_type'];
        $id = $arrMenu[$i]['id'];      
            if($type==2){
                $liselect ='';
                if($moduletemp==$module){
                    $liselect = "class='liselect'";
                    $strResult.= "<li $liselect>$menuname</li>";
                }else{
                  $strResult.= "<li ><a href='index.php?m=$moduletemp&o=$ordertemp'>$menuname</a></li>";  
                }
               
            }else{
               $tagClose = '</ul></div>'; 
                if($curOrder==-1){
                 $tagClose='';   
                }
                $strResult.= $tagClose;
                $strResult.=  '<div class="container">';
                $clshead = 'menu_head';
                $typedisplay ='';
                if($order==$ordertemp){
                    $clshead = 'menu_head_select';
                    $nameMenuShow = "menu_bodymenu$id";
                    $typedisplay = " disblock";
                    $hdmenu='#menu_bodymenu'.$id;                    
                }
                $strResult.=  "<div id='menu$id' class='$clshead'> $menuname </div>";
                $strResult.=  "<ul class='menu_body$typedisplay' id='menu_bodymenu$id'  >";
                $curOrder = $ordertemp;
            }
            
        
    }
     $strResult.=  '</ul></div><input type="hidden" value="'.$hdmenu.'" id="hdmenu" />';   
  return $strResult;
}

//  function createChangeBox(){
//    global $objDbSelect,$arrayOrderPowerType,$arrayPowerColor,$arrayChange;   
//     $module = $_GET['m'];
//     $category = $_GET['o'];
//     
//     $powerType=$_SESSION['curpowertype'];     
//     $_SESSION['id'];
//     $usename=$_SESSION['username'];
//     $arrSess = $_SESSION['user'];
//     $strResult='';
//     for($i=0;$i<count($arrayOrderPowerType);$i++){
//         $color = $arrayPowerColor[$arrayOrderPowerType[$i]];
//         $userid=$arrSess[$arrayOrderPowerType[$i]]['id'];
//         if($userid!=''){             
//             if($userid==$_SESSION['id']){
//                $strResult.="<span class='$color'>$usename</span>";
//             }else{
//                $strResult.="<span class='$color'><a href='#' onclick='switchUser($userid,$module,$category)'>$usename</a></span> &nbsp;"; 
//             }             
//         }
//     }
//     if($strResult==''){
//        $color= $arrayPowerColor[$powerType];
//        $strResult.="<span class='$color'>$usename</span>";
//     }
//     $cmbBox=createComboboxByUser($_SESSION['id'],false,false);
//     if($cmbBox!=''){
//         $cmbBox.='<button class="changebutton" onclick="changeUser()">Chuyen</button>';
//     }
//     $strResult .= $cmbBox;
//    return $strResult;
//  }
//  
//  function createChangeBoxUser($userType){
//    global $objDbSelect,$arrayOrderPowerType,$arrayPowerColor,$arrayChange;   
//     $module = $_GET['m'];
//     $category = $_GET['o'];     
//     $powerType=$_SESSION['curpowertype'];     
//     $_SESSION['id'];
//     $usename=$_SESSION['username'];
//     $arrSess = $_SESSION['user'];
//     $strResult='';
//     for($i=0;$i<count($arrayOrderPowerType);$i++){
//         $color = $arrayPowerColor[$arrayOrderPowerType[$i]];
//         $userid=$arrSess[$arrayOrderPowerType[$i]]['id'];
//         if($userid!=''){             
//             if($userid==$_SESSION['id']){
//                $strResult.="<span class='$color'>$usename</span>";
//             }else{
//                $strResult.="<span class='$color'><a href='#' onclick='switchUser($userid,$module,$category)'>$usename</a></span> &nbsp;"; 
//             }             
//         }
//     }
//     if($strResult==''){
//        $color= $arrayPowerColor[$powerType];
//        $strResult.="<span class='$color'>$usename</span>";
//     }
//     $cmbBox=createComboboxByUser($_SESSION['id'],false,false);
//     if($cmbBox!=''){
//         $cmbBox.='<button class="changebutton" onclick="changeUser()">Chuyen</button>';
//     }
//     $strResult .= $cmbBox;
//    return $strResult;
//  }
  
  function createComboboxByUser($userId,$all=true,$allshow=true){
      global $objDbSelect;
      $sql = "select id as id,username as name from tbl_user where user_create=$userId";
      $arrUser= $objDbSelect->GetArray($sql);
      $count=count($arrUser);
      if($count==0&&!$allshow){
          return '';
      }
      $result = "<select name='cmbUser' id='cmbUser' style='width:140px'>";
      if ($all){
        $result.= "<option value=''>-- Tất cả --</option>"  ;
      }else{
        $result.= "<option value='-1'>-- Chon --</option>";
      }
      for($i=0;$i<$count;$i++){
          $value = $arrUser[$i]['id'];
          $name = $arrUser[$i]['name'];
        $result.= "<option value='$value'>$name</option>";
      }
      $result .= '</select>';
      return $result;
  }
  function getNameToDisplay(){
      global $objDbSelect;
      if(isset($_SESSION['current']['username'])) {
         return $_SESSION['current']['username'];
      }
      return '';
  }  
  function createCombobox($table,$arrFields,$arrKeyValue,$cmbName,$all=true,$condition=''){
      global $objDbSelect;
      $strField = implode($arrFields,',');
      $sql      = "SELECT $strField FROM $table $condition";
     // echo $sql; die();
      $name      =  $arrKeyValue['name'];
      $value    =  $arrKeyValue['value'];
      $arrValue = $objDbSelect->GetArray($sql);
      $required ='';
      if(!$all){
        $required='cbbRequired'  ;
      }
      $strResult ="<select id='$cmbName' name='$cmbName' class='width100 $required'>";
      if($all){
        $strResult.="<option value=''>".SYSTEM_SELECT_ALL."</option>";  
      }else{
        $strResult.="<option value='-1'>".SYSTEM_MUST_SELECT."</option>";    
      }
      $count = count($arrValue);
      for($i=0;$i<$count;$i++){
          $valuetemp = $arrValue[$i][$value];
          $nametemp = $arrValue[$i][$name];
          $strResult.="<option value='$valuetemp'>$nametemp</option>"; 
      }
      $strResult.="</select>";
      return $strResult;
  }
  
  // Add-End By Lamdhn - 2010.11.02 - Chuyen tu V2.1 -> V3.0 

// Các hàm Maps
/**
* Get map key
* @author ĐậmPV
* @since 2010-08-31
*
*/
function GetMapsKey()
{
    global  $gkey;
    if ($_SERVER['HTTP_HOST']=='192.168.0.149')
    {
        $vkey='E43pcmZHdUgHgZ1BVAdwb0qcGS57Z/Dw';
        $gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRTO6Nofa28CSIvRoZJ3A5zfJd6sJxQZ6RbD0XPodHHc55-ykJpyIzdPsg';
    }    
     else if ($_SERVER['HTTP_HOST']=='localhost:8081')
    {
        $icon ='favicon.ico';
        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBTaKABekK5UCUUEYXD5B8Dr4K27fRTNu9WA2z3AK5sf_yuiC5glsR2DUA';
    }
    else
    {       
        $gkey='ABQIAAAAjAdf-0JAIV137-ME4XgIcBRIjWmpOxcwII4fD3JFn_ThfKEAPRT8CYl0W1my4TBHsm9RFQ3R3dujJw';

    }
}

function IsLogin()
{
    if(isset($_SESSION['islogin'])&&$_SESSION['islogin']==1)
    {
        return true;
    }
    return false;
}

function ActiveItem($id){
    global $tbl,$objDbUpdate;
    $objResponse = new xajaxResponse();                            
    $sql = "update $tbl set active = (active + 1)%2 where id = $id";
    if($objDbUpdate->Execute($sql)){
      $objResponse->addScript("changeStatus($id);");  
    }else{
      $objResponse->addAlert('Cập nhật thất bại...!'); 
    }  
    return $objResponse->getXML();
}

function MyAddSlashes($str)
{
    if(!get_magic_quotes_gpc())
    {
        $str = addslashes($str);
    }
    return($str);
}
/*
* Hàm dùng lay tat ca cac khach san theo user, neu là user admin, subpervisor , account thì lây hêt
* Neu là d?i lý hoac là quan lý user thì lay theo khach san cua nguoi do tao
* 
*/
function getListHotelByUser($all=false){
    $powerType = $_SESSION['powers_type'];
    $sql = '';
    $addCond = '';
    if(!$all){
        $addCond = " AND active =". ACTIVE;
    }
    if($powerType==POWER_ACCOUNT||$powerType==POWER_SUPERVISOR||$powerType==POWER_MASTER){
       $sql='SELECT * FROM tbl_service WHERE 1=1 '.$addCond ;
    }else if($powerType==POWER_AGENCY){
       $sql='SELECT * FROM tbl_service WHERE 1=1 '.$addCond ; 
    }
}
# End Region cho cac ham moi tao sau
function createMainMenu($arrMainMenu){
    $strResult ='<div id="radio">'; 
    $flgfirst = true;
    for($i=0;$i<count($arrMainMenu);$i++){
      $id   =  $arrMainMenu[$i]['id'];
      $icon =  $arrMainMenu[$i]['icon'];
      $name =  $arrMainMenu[$i]['name'];
      $check = '';
      if($flgfirst){
        $check= "checked='checked'"; 
        $flgfirst= false; 
      }
      $strResult.= "<input type='radio' $check id='radio$id' name='radio' onclick='changeDisplay($id);' />
      <label for='radio$id'><img src='images/menu/$icon'  /><br />$name</label>";
    }
    $strResult.='</div>';
    return $strResult;
}


/*
* @Nguyen thanh trung -18/12/2011
* @Ham dung de tao user tu dong khi tao hotel
* @hotel_id: id cua hotel moi vua tao
* @hotel_type : loai hotel duoc tao
* @agent_id : id  cua dai ly tao hotel
* @return : tra ve true neu  tao thanh cong. co loi thi tra ve cau thong bao
*/
function AutoCreateUser($hotel_id,$hotel_type,$agent_id){
    global $arrPostFix,$objDbUpdate;
   $sql = "select if(a.numcustomer='',1,a.numcustomer+1) as maxnum ,u.username as name from tbl_users as u left
     join tbl_agent_customer as a on a.agent_id = u.id where u.id = '$agent_id'";
    $arr    =  $objDbUpdate->GetArray($sql);
    $name   = $arr[0]['name'] ;
    $maxnum = $arr[0]['maxnum'];
    $tbl_postfix = str_pad("$maxnum",3,'0',STR_PAD_LEFT);
    $sqlInsert = "INSERT INTO tbl_user(username,pass,power_type_id,power_id,hotel_id,user_created) values";
    $nameCus= $name.$maxnum;
    $passCus = EncryptPass(date('Ymd'));
    $passSubCus  = EncryptPass(PASS_SUBCUS);
    
    $powercus = POWER_CUSTOMER;
    $power_id = 10;
    
    $powersubcus = POWER_SUB_CUSTOMER;
    $power_sub_id = 10;
    
    $values = "('$nameCus','$passCus','$powercus',$power_id,$hotel_id,$agent_id)";
    $arrPostFixSub = $arrPostFix[$hotel_type];
    for($i=0;$i<count($arrPostFixSub);$i++){
        $nameSubCus =$nameCus.$arrPostFixSub[$i];
       $values.=",('$nameSubCus','$passSubCus','$powersubcus',$power_sub_id,$hotel_id,$agent_id)"; 
    }
    $sqlInsert.=$values;
    $result  = $objDbUpdate->Execute($sqlInsert);
    $last=true;
    if($result){
        if($maxnum>1){
            $sqlUpdate= " UPDATE tbl_agent_customer SET numcustomer = $maxnum where agent_id = '$agent_id'"; 
        }else{
            $sqlUpdate= " INSERT INTO tbl_agent_customer(agent_id,numcustomer) values($agent_id,$maxnum) ";   
        }
        $result = $objDbUpdate->Execute($sqlUpdate);       
    }else{
      $last =   'Chưa tạo được user';
    }
    return $last;    
}

function autoCreateTable($arrName,$id){
    global $arrTableCreateAuTo,$objDbSelect;
    $result = true;
    foreach($arrName as $value){
        $sql = $arrTableCreateAuTo[$value];
        $sql = str_replace($value,$value.'_'.$id,$sql);
        if($objDbSelect->Execute($sql)){
            $result .=$value;
        }
    }
    return $result;    
}
/*
* @hàm dùng để tạo ra select box phòng
* @id của select box
* @$clsrequired : nếu true thì có class required
* @hotel_id id của hotel
* return : chuổi định dạng kiểu select box
*/
function createCbbRoomByHotel($id,$clsrequired= false,$hotel=''){
    global $objDbSelect;
    $hotel_id = ($hotel==''?$_SESSION['current']['hotel_id']:$hotel);
    $sql = " SELECT id,name as name FROM tbl_room Where room_type in 
            (select id from tbl_room_type where hotel_id ='$hotel_id')";

    $arr = $objDbSelect->GetArray($sql);
    $cls = $clsrequired? "class='cbbRequired'":"class='width100'";
    $result ="<select id='$id' $cls ><option value=''>--Chọn--</option>";
    for($i=0;$i<count($arr);$i++){
        $name = $arr[$i]['name'];
        $id   = $arr[$i]['id'];
        $result .= "<option value='$id'>$name</option>";
    }
    $result.="</select>";
    return $result;
    
}

function commonLoadRoom($roomtype=''){
    global $objDbSelect,$tbl_postfix;
    $hotel_id = ($hotel==''?$_SESSION['current']['hotel_id']:$hotel);
    $sql ='';
    if($roomtype==''){
      $sql = "select name,id as val from ht_room$tbl_postfix ";
    }else{
      $sql = "select name,id as val from ht_room$tbl_postfix where room_type= '$roomtype'";
    }
    //echo  $sql; die();
    $arr =  $objDbSelect->GetArray($sql);
    return $arr;
                            //
}

/*
* @function: hàm trả về tên của ngày tương ứng với chỉ số nhập vào
* @params: $indexDay 1:CN,2:Thứ 2,3 thứ 3;...........
* @return: string name of day of week.
*/
function convertToNameDayOfWeek($indexDay){
    $result = '';
    switch($indexDay){
     case 1: $result = 'Chủ nhật';break;  
     case 2: $result = 'Thứ hai';break;  
     case 3: $result = 'Thứ ba';break;  
     case 4: $result = 'Thứ tư';break;  
     case 5: $result = 'Thứ năm';break;  
     case 6: $result = 'Thứ sáu';break;  
     case 7: $result = 'Thứ bảy';break;  
    }
    return $result;
}

function createRangeForChart($min,$max,&$rangmax,&$rangemin){
    if($max<=0){
     $rangmax=0;   
    }else{
      $fisrtdigit = substr($max,0,1);
    $fisrtdigit = $fisrtdigit +1 ;
    $rangmax = $fisrtdigit * pow(10,strlen($max)-1);   
    }
   
    if($min>=0){
        $rangemin=0;
    }else{
        $tempmin=-$min;
        $fisrtdigit = substr($tempmin,0,1);
        $fisrtdigit = $fisrtdigit +1 ;
        $rangemin = -$fisrtdigit * pow(10,strlen($tempmin)-1);   
    }
}


/*
*hàm trả về tổng giá trị tiền thuê phòng trong khoảng thời gian từ $from đến $to 
* $from : thời gian bắt đầu
* $to : thời gian kết thúc
* $room_type_id : loại phòng
*/
function ka_calTotal($from,$to,$room_type_id){
    $total =0;
    while (strtotime($from) <= strtotime(($to))) 
    {
        $dofw = date('w',strtotime($from));
        if(substr($from,0,10)==substr($to,0,10)){            
          $total+=ka_calInday($from,$to,$room_type_id,$dofw)  ;
        }else{
            $totemp = Date('Y-m-d 23:59:59',strtotime($from)) ;            
            $total+=ka_calInday($from,$totemp,$room_type_id,$dofw)  ;  
        }
        $from=Date('Y-m-d 00:00:00', (strtotime( '+1 day' , strtotime($from)))) ;
    }
    return $total;
}

/*
*hàm trả về tổng giá trị tiền thuê phòng trong khoảng thời gian từ $from đến $to 
* $from : thời gian bắt đầu
* $to : thời gian kết thúc
* $room_type_id : loại phòng
*/
function fm_calTotal($from,$to,$room_type_id){
    $total =0;
    while (strtotime($from) <= strtotime(($to))) 
    {
        $dofw = date('w',strtotime($from));
        if(substr($from,0,10)==substr($to,0,10)){            
          $total+=fm_calInday($from,$to,$room_type_id,$dofw)  ;
        }else{
            $totemp = Date('Y-m-d 23:59:59',strtotime($from)) ;            
            $total+=fm_calInday($from,$totemp,$room_type_id,$dofw)  ;  
        }
        $from=Date('Y-m-d 00:00:00', (strtotime( '+1 day' , strtotime($from)))) ;
    }
   // echo $from.$to ; die();
    return $total;
}

/*
*Hàm tính giá trị theo từng ngày đưa vào 
*/

function ka_calInday($fromhms,$tohms,$room_type_id,$dofw){
    $arrPrice= array();
    $hourFrm =    (int)Date('H',strtotime($fromhms));
    $hourTo =    (int)Date('H',strtotime($tohms));
    $minuteFrm = (int)Date('i',strtotime($fromhms));
    $minuteTo =   (int)Date('i',strtotime($tohms));
    $price=0;
    $arrPrice = createArrPrice($dofw,$room_type_id);
   // echo '<pre>'; print_r($arrPrice);die();
    for($i=$hourFrm;$i<=$hourTo;$i++){
        if($i==$hourFrm){
            if($i==$hourTo){
               $price += ($minuteTo-$minuteFrm)*$arrPrice[$i]/60 ; 
            }else{
              $price += (60-$minuteFrm)*$arrPrice[$i]/60 ;  
            }
            
        }elseif($i==$hourTo){
            if($minuteTo==59){
                $minuteTo=60;
            }
            $price += $minuteTo*$arrPrice[$i]/60 ;
        }else{
           $price += $arrPrice[$i];
        }
    }
    return round($price,-3);
}

/*
*Hàm tính giá trị theo từng ngày đưa vào 
*/

function fm_calInday($fromhms,$tohms,$room_type_id,$dofw){
    $arrPrice= array();
    $hourFrm =    (int)Date('H',strtotime($fromhms));
    $hourTo =    (int)Date('H',strtotime($tohms));
    $minuteFrm = (int)Date('i',strtotime($fromhms));
    $minuteTo =   (int)Date('i',strtotime($tohms));
    $price=0;
    $arrPrice = createArrPrice($dofw,$room_type_id,'fm');
    //echo '<pre>'; print_r($arrPrice);die();
    for($i=$hourFrm;$i<=$hourTo;$i++){
        if($i==$hourFrm){
            if($i==$hourTo){
               $price += ($minuteTo-$minuteFrm)*$arrPrice[$i]/60 ; 
            }else{
              $price += (60-$minuteFrm)*$arrPrice[$i]/60 ;  
            }
            
        }elseif($i==$hourTo){
            if($minuteTo==59){
                $minuteTo=60;
            }
            $price += $minuteTo*$arrPrice[$i]/60 ;
        }else{
           $price += $arrPrice[$i];
        }
    }
    return round($price,-3);
}
/*
*Hàm dùng để tạo mãng giá trị theo từng giờ theo loại phòng và ngày
*/
function createArrPrice($dateofweek,$room_type_id=1,$prefixtable='ka'){
    global $objDbSelect, $tbl_postfix,$hotel_id;
    $table =     $prefixtable."_room_price" ;
    $sql = "select timefrom, timeto, price from $table where service_id = $hotel_id and
      room_type_id = '$room_type_id' and dateofweek = '$dateofweek' order by timefrom";
      //echo $sql; die() ;
    $arr = $objDbSelect->GetArray($sql);
    $arrResult = array();
    for($i=0;$i<count($arr);$i++){
        $timefrom=$arr[$i]['timefrom'];
        $timeto=$arr[$i]['timeto'];
        $price=$arr[$i]['price'];
        for($j=$timefrom;$j<$timeto;$j++){
           $arrResult[$j]= $price;
        }
    }
    return $arrResult;
}



function ConvertToHM($second)
{
    $tempHM=(int)($second/(60*60)).'h'.(int)(($second/60)%60);
    return $tempHM;
}

/*
* ham nay dung de merge 2 mang Thu va Chi co ngay tao bang nhau de lay bao cao thu chi
* $arrS= mang du lieu cua bao cao thu;
* 
*/
function FuncMergeThuAndChi($arrS,$arrT,$colName = 'date_created'){
    $arrResult =array();
    $countS = count($arrS); // so dong cua S
    $countT = count($arrT);  // So dong cua T
    $handleT = 0;            // bien tam de luu lai chi so cua T
    $handleR =0;          // bien tam de nam giu chi so cua $arrResult
    for($s=0;$s<$countS;$s++){
        if($countS[$s][$colName]==$arrT[$handleT][$colName]){
           $arrResult[$handleR] = $arrS[$s] ;
           $arrResult[$handleR]['chi'] = $arrT[$handleT]['chi'];
           $arrResult[$handleR]['total'] = $arrS[$handleT]['thu']-$arrT[$handleT]['chi'];
           $handleT++;
           $handleR++;
        }elseif($countS[$s][$colName]<$arrT[$handleT][$colName]){
           $arrResult[$handleR] = $arrS[$s] ;
           $arrResult[$handleR]['chi'] = 0;
           $arrResult[$handleR]['total'] = $arrS[$handleT]['thu'];
           $handleR++; 
        }else{
            //$temp = true;
            do{
                if($countS[$s][$colName]==$arrT[$handleT][$colName]){
                  $arrResult[$handleR] = $arrS[$s] ;
                   $arrResult[$handleR]['chi'] = $arrT[$handleT]['chi'];
                   $arrResult[$handleR]['total'] = $arrS[$handleT]['thu']-$arrT[$handleT]['chi'];
                   $handleT++;
                   $handleR++;  
                }
               $arrResult[$handleR] = $arrS[$s] ;
               $arrResult[$handleR]['chi'] = $arrT[$handleT]['chi'];
               $arrResult[$handleR]['total'] = $arrS[$handleT]['thu']-$arrT[$handleT]['chi'];
               $handleT++;
               $handleR++;
                
            }while($countS[$s][$colName]>=$arrT[$handleT][$colName]);
        }
    }                            
    
}

/*
 * ham bo dau tieng việt
 */
function vn_str_filter ($str){
    $unicode = array(
        'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
        'd'=>'đ',
        'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
        'i'=>'í|ì|ỉ|ĩ|ị',
        'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
        'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
        'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
        'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'D'=>'Đ',
        'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
        'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );

    foreach($unicode as $nonUnicode=>$uni){
        $str = preg_replace("/($uni)/i", $nonUnicode, $str);
    }
    return $str;
}
/*
* @hàm dùng để lấy các sản phẩm để hiển thị lên menu
* 
*/
function common_getMenu(&$arr,&$arrDetail){
    global $objDbSelect,$lang,$tbl_postfix;    
    $sql = "select p1.name_vi as name,p1.price as price,p1.unit,p1.id,p1.product_type ,
    p2.name_vi as parentname ,p2.icon,p1.parent_id from cus_product$tbl_postfix as p1 join 
         cus_product$tbl_postfix   as p2 on p1.parent_id
    = p2.id and p2.active = 1  where  p1.active = 1 order by p1.parent_id,p1.product_type,p1.name_vi " ;
    $arr = $objDbSelect->GetArray($sql);
    $count = count($arr);
    $arrResult = array();
    $index =-1;  
    $strresult='';
    $arrResult = array();
    for($i=0;$i<$count;$i++){
        $name = $arr[$i]['name'];
        $price = $arr[$i]['price'];
        if($arr[$i]['product_type']==0){
            $arrResult[$arr[$i]['parent_id']] = array('name'=>$name);
        }else{
            $arrDetail[$arr[$i]['parent_id']][]=array('name'=>$name,'id'=>$arr[$i]['id'],'price'=>$price);
        }
    }
    return $arrResult;
}
function GetHM4Show($time){
    $timeshow = substr($time,11,5);
    $timeend = str_replace(':','h',$timeshow);
    return $timeend;
}

function FormatMoney($money){
    $len = strlen($money);
    $postInt = strpos($money,'.')===false?$len:strpos($money,'.');
    
    $arrAra=array();
    if($postInt<4) return $money;
    else{
        for($i=$postInt;$i>=3;$i=$i-3){
            $arrAra[] = substr($money,$i-3,$len);
            $money = substr($money,0,$i-3);
            $len=$i-3;
        }
        if(strlen($money)>0){
          $arrAra[]=  $money;
        }
        
    }
   // echo '<pre>'; print_r($arrAra); die();
    $count = count($arrAra);
    $result = '';
    for($i=$count-1;$i>0;$i--){
        $result.=$arrAra[$i].',';
    }
    $result .=$arrAra[0];
    return $result;
}

// Ham chuyen dinh dang ngay thang: nam-thang-ngay chuyen thanh ngay/thang/nam
function ConvertDate($sDate, $bTime = false)
{
    $sTime = '';
    if(!$bTime){
     $sDate = substr($sDate,0,10);   
    }
    if($bTime)
    {
        $sTime = substr($sDate, -8);
        // Kiem tra ngay thang dung dinh dang
        $TimePatt = '/^(([0-1][0-9])|(2[0-4])):[0-5][0-9]:[0-5][0-9]$/';
        if(!preg_match($TimePatt, $sTime))
        {
            //MsgBox1('Gio khong hop le');
            return('');
        }
        $sDate = substr($sDate, 0, 10);
    }

    $DatePatt = '/^\d{4}-((0[1-9])|(1[0-2]))-((0[1-9]|([1-2][0-9])|3[0-1]))$/';
    if(!preg_match($DatePatt, $sDate))
    {
        //MsgBox1('Ngay khong hop le: '.$sDate);
        return('');
    }

    $arrTmp = split("-", $sDate);
    if(count($arrTmp) != 3)
    {
        //MsgBox1('Ngay khong hop le 1: '.$sDate);
        return("");
    }
    $sReturn = $arrTmp[2]."/".$arrTmp[1]."/".$arrTmp[0].' '.$sTime;
    return(trim($sReturn));
}

function changeDO($val,$sensor = 'DO'){
     if($sensor=='DO'){
         return round(sqrt($val),1);
     }
     return $val;
}

