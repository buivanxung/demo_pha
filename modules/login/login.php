<?php
error_reporting(E_ALL & ~E_NOTICE);
session_set_cookie_params(12000);
session_start();
define('ROOT_PATH', './');
define('CORE_PATH', ROOT_PATH.'core/');
$XAJAX_DIR = 'iot.vn/scripts/xajax';
require_once(CORE_PATH.'classes/xajax/xajax.inc.php');
$objXajax = new xajax();
$objXajax->bDebug = false;
$objXajax->bWaitCursor = true;
$objXajax->bCleanBuffer = true;
$objXajax->statusMessagesOn();

// Registry ajax function
$objXajax->processRequests();
$tplXajaxScript = $objXajax->getJavascript($XAJAX_DIR);

$action = isset($_POST['action']) ? trim($_POST['action']) : '';

if(IsLogin()){
    Redirect('index.php');
}
if($action == "login"){    //=======================================================

    global $objTemplate, $arrConfig,$objDbSelect,$objDbUpdate,$maxNoActivity;
    $sHideMethod = isset($_POST['hide_method']) ? $_POST['hide_method'] : 'none';
    $cookie_user = isset($_COOKIE["iot_user"]) ? $_COOKIE["iot_user"]:"";
    $cookie_pass = isset($_COOKIE["iot_pass"])  ? $_COOKIE["iot_pass"]:"";
    $cookie_auto = isset($_COOKIE["iot_auto"])   ? $_COOKIE["iot_auto"]:"";
    $lang_iot = isset($_COOKIE["lang_iot"])   ? $_COOKIE["lang_iot"]:"vi";
    $cookie_remember = isset($_COOKIE["iot_remember"]) ? $_COOKIE["iot_remember"]:"";
    $cookie_flag =isset($_COOKIE['iot_flag']) ? $_COOKIE['iot_flag'] : '';
    $userDisplay='';
    $passDisplay='';
    $rememberDisplay =0;
    $autoDisplay =0;
    $timeSave = time()+3600*30;

    $sUserName = isset($_POST['txtUserNameLogin']) ? $_POST['txtUserNameLogin'] : $cookie_user;
    $sPass = isset($_POST['txtPasswordLogin']) ? $_POST['txtPasswordLogin'] : $cookie_pass;
    $sUserName = MyAddSlashes($sUserName);

    // Query du lieu tu database
    $sPassEn = MyAddSlashes(EncryptPass($sPass));

    $sSqlString =  " select * from tbl_user WHERE username = '$sUserName' 
        and pass = '$sPassEn' and active = $sys_active";
        

    $rsResult = $objDbSelect->GetArray($sSqlString);

    if(!is_array($rsResult))
    {            // Loi khi query
        MsgBox1('Lỗi kết nối');
        $bLogin = 0;
        Redirect(ROOTURL.'?m=login');
        exit();
    }
    elseif(count($rsResult)==0)
    {

        // User khong ton tai
        setcookie('iot_flag',0,$timeSave);
       AlertAndGo('Đăng nhập thất bại vui lòng thử lại',ROOTURL.'?m=login');
       // Redirect(ROOTURL.'?m=login');
      // exit();
    }
    else
    {
        // them phan nho pass va tu dong dang nhap
        $now = date('Y-m-d').' 23:59:59';
        if($sHideMethod == 'login'){

            $cookie_auto = isset($_POST['chkAutoLogin'])?1:0;
            $cookie_remember = isset($_POST['chkRemember'])?1:0;
            if($cookie_auto==1||$cookie_remember==1){
                $cookie_user = $_POST['txtUserNameLogin'];
                $cookie_pass = $_POST['txtPasswordLogin'];
                $cookie_flag = $cookie_remember;
            }else{
                $cookie_user = '';
                $cookie_pass = '';
            }
        }
        if($cookie_remember==1){
            setcookie('iot_flag',$cookie_flag,$timeSave);
            setcookie('iot_user',$cookie_user,$timeSave);
            setcookie('iot_pass',$cookie_pass,$timeSave);
            setcookie('iot_auto',$cookie_auto,$timeSave);
            setcookie('iot_remember',$cookie_remember,$timeSave);
        } else
        {
            setcookie('iot_flag','',$timeSave);
            setcookie('iot_user','',$timeSave);
            setcookie('iot_pass','',$timeSave);
            setcookie('iot_auto','',$timeSave);
            setcookie('iot_remember','',$timeSave);

        }

        // them phan nho pass va tu dong dang nhap
        if($rsResult[0]['hotelActive']=='0'){
            Alert('Ba?n bi? kh?a di?ch vu? web, vui lo?ng li?n h?? ?a?i ly?.');
        }elseif($rsResult[0]['expire_date'] < $now && ($rsResult[0]['power_type_id']==POWER_CUSTOMER||$rsResult[0]['power_type_id']==POWER_SUB_CUSTOMER) ){
            Alert('Ba?n ?a? h??t ha?n s?? du?ng di?ch vu?,Vui lo?ng li?n h?? ?a?i ly? ho??c s?? ?i??n thoa?i nh? tr?n');
        }else{
            $_SESSION['islogin']=1;
            $_SESSION['current']['user_id']  =  $rsResult[0]['id'];
            $_SESSION['current']['user_name']  =  $rsResult[0]['username'];
            $_SESSION['current']['power_type_id']  =  $rsResult[0]['power_id']; 
            $_SESSION['num_day']  =  $rsResult[0]['num_day_report'];              
            $_SESSION['lang']  = $lang_iot;              
        }
        Redirect('index.php') ;

    }
}
$result="";
function Alert($message)
{
    $result =   '<script language="javascript" type="text/javascript">' . "alert('$message');</script>";

}

function AlertAndGo($message,$urlgo)
{
    $result =   '<script language="javascript" type="text/javascript">' . "alert('$message');window.location='$urlgo';</script>";
 echo $result;
}
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title> PHADISTRIBUTION IOT SYSTEM</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="Phần mềm quản lý thông minh IOT PHADISTRIBUTION">
<meta name="description" content="Phần mềm quản lý nông trại, môi trường và chất thải......"/>

    <link rel="stylesheet" href="iot.vn/css/bootstrap.min.css" />
    <script src='iot.vn/scripts/jquery.js'></script>
    <script src='iot.vn/scripts/jquery-1.12.0.min.js'></script>
    <script src='iot.vn/scripts/bootstrap.min.js'></script>
    <script type="text/javascript">
    
    
    </script>
        <script language="javascript">
    

    function login_click() {
        var user = $.trim($("#txtUserNameLogin").val());
        var pass = $.trim($("#txtPasswordLogin").val());
        if (user == '') {
            alert((lang_iot=='vi'?"Vui lòng nhập Tên Ðãng Nhập.":"Please input username.") );
            document.getElementById("txtUserNameLogin").focus();
            return false;
        }
        if (pass == '') {
            alert((lang_iot=='vi'?"Vui lòng nhập Mật Khẩu.":"Please input password."));
            document.getElementById("txtPasswordLogin").focus();
            return false;
        }
        
         document.getElementById("lg-form").submit();
    }
    document.getElementById("txtUserNameLogin").focus();
    function toggle(name) {
        document.getElementById(name).checked = false;
    }

</script>

<script type="text/javascript">
function getCookie_1(name) {
  var value = "; " + document.cookie;
  var parts = value.split("; " + name + "=");
  if (parts.length == 2) return parts.pop().split(";").shift();
}

function getCookie(w){
    cName = "";
    pCOOKIES = new Array();
    pCOOKIES = document.cookie.split('; ');
    //alert(document.cookie);
    for(bb = 0; bb < pCOOKIES.length; bb++){
        NmeVal  = new Array();
        NmeVal  = pCOOKIES[bb].split('=');
        if(NmeVal[0] == w){
            cName = unescape(NmeVal[1]);
        }
    }
    return cName;
}


    lang_iot ='vi'; 
    if(typeof(getCookie_1("lang_iot"))!='undefined'){
     lang_iot = getCookie_1("lang_iot");      
    }else{
        //document.cookie = "lang_iot=vi"; 
        var now = new Date();
        now.setTime(now.getTime() + 24*365* 3600 * 1000);
        document.cookie = "lang_iot=vi; expires=" + now.toUTCString() + "; path=/";
    }
                    
$(document).ready(function(){


document.getElementById('txtPasswordLogin').value= getCookie("iot_pass");
document.getElementById('txtUserNameLogin').value=getCookie("iot_user");
                    var ischeck =getCookie("iot_remember");
                    if(ischeck=='1')
                    {

                        document.getElementById('chkRemember').checked=true;
                    }
                    var isAuto ='<?php echo $cookie_auto ?>';

                    if(isAuto=='1')
                    {

                        //document.getElementById('chkAutoLogin').checked=true;
                        //login_click();
                    }
                    
                    changeName(lang_iot);
                    
});

function ToggleLang(obj){
       lang_iot = $(obj).val();
       var now = new Date();
        now.setTime(now.getTime() + 24*365* 3600 * 1000);
        document.cookie = "lang_iot="+lang+"; expires=" + now.toUTCString() + "; path=/";
        changeName(lang_iot);
}
function  changeName(lang_iot){     
        
    if(lang_iot=='en'){
        $('#title_login').html('Login');
        $('#lg_username').html('Username:');
        $('#lg_pass').html('Password:');
        $('#lg_ngonngu').html('Language:');
        $('#lg_remember').html('Remember:');
        $('#rd_english').prop('checked',true);
    }else{
        $('#title_login').html('Đăng Nhập');
       $('#lg_username').html('Tên Đăng Nhập:');
        $('#lg_pass').html('Mật Khẩu:');
        $('#lg_ngonngu').html('Ngôn Ngữ:');
        $('#lg_remember').html('Nhớ Mật Khẩu:'); 
        $('#rd_vietnam').prop('checked',true);  
    }
}

                </script>
</head>



<body style="display:flex">
    <div class="container text-center" style="display:flex;height:500px" >
   <div class="panel panel-primary center-block" style="width:500px;margin:auto">
   <div class="panel-heading">
        <h1 id="title_login">Đăng Nhập</h1>
     </div>  
     <div class="panel-body"> 
        <form action="index.php" id="lg-form" name="lg-form" role="form" method="post">
            
            <div class="row">
            <div class="col-xs-5 text-right" style="padding-right:1px">
                <label for="txtUserNameLogin" id="lg_username">Tên Đăng Nhập:</label>
                </div>
                <div class="col-xs-7 text-left" style="padding-left:1px">
                <input type="text" class="form-control" style="height:28px;max-width:250px" name="txtUserNameLogin" id="txtUserNameLogin" value="<?php echo $cookie_user ?>" placeholder="Tên Đăng Nhập" onkeydown="if (event.keyCode == 13) return login_click();" />
                </div>
            </div>
            
            <div class="row">
            <div class="col-xs-5 text-right" style="padding-right:1px" >
                <label for="txtPasswordLogin" id="lg_pass"> Mật Khẩu:</label>
                </div>
                <div class="col-xs-7 text-left" style="padding-left:1px">
                <input type="password"  class="form-control" style="height:28px;max-width:250px" name="txtPasswordLogin" id="txtPasswordLogin" placeholder="Mật Khẩu"  onkeydown="if (event.keyCode == 13) return login_click();"/>
                </div>
            </div>
            
            <!--<div class="row">
            <div class="col-xs-5 text-right" style="padding-right:1px" >
                <label  id="lg_ngonngu"> Ngôn Ngữ:</label>
                </div>
                <div class="col-xs-7 text-left" style="padding-left:1px">
                &nbsp;<input type="radio" id="rd_vietnam" name="rd_ngonngu" value="vi" onchange="ToggleLang(this)" checked="checked"> &nbsp;  <label  id="lg_vietnam"> Việt Nam</label>&nbsp; &nbsp; &nbsp;  <input type="radio" onchange="ToggleLang(this)" id="rd_english" name="rd_ngonngu" value="en"> &nbsp;  <label  id="rd_english"> English</label> 
                </div>
            </div> -->
            
            
            <div class="row">
            <div class="col-xs-5 text-right" style="padding-right:1px;" ><label for="chkRemember" style="font-weight:thin" id="lg_remember">Nhớ Mật Khẩu:</label></div>
            <div class="col-xs-7 text-left" style="padding-left:1px">
            <input type="hidden" value="login" name="hide_method">
<input type="hidden" value="default" name="ref_url">
<input type="hidden" value="" name="ref_id">
<input type="hidden" value="" name="ref_cat">
<input type="hidden" value="login" name="action">
 <input type="checkbox" name="chkRemember" id="chkRemember" onkeydown="if (event.keyCode == 13) return login_click();"
                       value="1"></div>  
</div>
            
            <div class="row">
                <div class="text-center">            
                <button type="button" class="btn btn-primary btn-xs" style="width:60px" id="login"  onclick="login_click();" onkeydown="if (event.keyCode == 13) return login_click();">Login</button>
                </div>
            </div>
            
                        
        </form>
        <div id="message"></div>
     </div>   
        </div>
</div>


                
</body>
</html>


