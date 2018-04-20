<?php

if(!defined('IN_CHUYENNHAT'))
{
    die('Loi truy xuat truc tiep ');
} 
    date_default_timezone_set('Asia/Bangkok');
    session_set_cookie_params(12000);
    session_start();
    if(!isset($_SESSION['lang'])){
       $_SESSION['lang'] ='vi'; 
    }
    $lang=$_SESSION['lang'];
         
    //============================= Define some include path ==========================//
    define('ROOT_PATH', './');
    define('CORE_PATH', ROOT_PATH.'core/');
    define('chuyennhat_PATH', ROOT_PATH.'iot.vn/');
    define('MODULE_PATH', ROOT_PATH.'modules/');
    define('TEMPL_PATH', ROOT_PATH.'templates/');
    define('BOX_PATH', ROOT_PATH.'boxes/');
    //============================= End of define some include path hai ==========================//

    //============================= Define database connection paramaters ==========================//

     define('_DBUSER_MASTER', 'root');
    define('_DBSERVER_MASTER', 'localhost');
    define('_DBPASS_MASTER', '');    
    define('_DBNAME_MASTER', 'db_demo');  
    
    /*define('_DBUSER_MASTER', 'phadistr_iot');
    define('_DBSERVER_MASTER', 'localhost');
    define('_DBPASS_MASTER', 'libelium2007');    
    define('_DBNAME_MASTER', 'phadistr_iot');*/ 
    
/*   define('_DBUSER_MASTER', 'phadistr_iot');
    define('_DBSERVER_MASTER', 'db06.serverhosting.vn');//112.78.2.173
    define('_DBPASS_MASTER', 'iot@pha123');    
    define('_DBNAME_MASTER', 'phadistr_iot'); */  


    define('TBL_PREFIX', 'tbl_');
    define('CONN_CHARSET', 'UTF8');    
    include_once(CORE_PATH.'classes/adodb/adodb.inc.php');
    include_once(CORE_PATH.'includes/constants_'.$lang.'.php');
    $objDbUpdate = &ADONewConnection('mysql');    // This object will connect to master db
    $objDbSelect = &ADONewConnection('mysql');    // Try to connect to slaver db, if fail then connect to master db.  
    //============================= End of database connection paramaters ==========================//

    
    //============================= Define template object ==========================//
    // template object to load and process template
    include_once(CORE_PATH.'classes/tbs_class.php');
    $objTemplate = new clsTinyButStrong();
    $objTemplate->NoErr = true;
    //============================= End of template object ==========================//

    //============================= Define validator object =======================
    include_once(CORE_PATH.'classes/clsvalidator.php');
    $objValidator = new CValidator();
    //============================= End of validator object ==========================//

    //============================= Define mailer object ==========================//
    include_once(CORE_PATH.'classes/phpmailer/class.phpmailer.php');
    $objMailer = new PHPMailer();
    define('SMTP_HOST', 'smtp.gmail.com');
    define('SMTP_PORT', 465);
    define('SMTP_DEBUG', 2);
    define('SMTP_USER', 'trongseo@gmail.com');
    define('SMTP_PASS', 'tinhgia!1');
    define('SMTP_CHARSET', 'UTF-8');
    define('IS_HTML', true);
    define('IS_SMTP', true);
    define('SMTP_SECURE', 'ssl');   
    define('NAME_FROM', 'Nguyen van trong');
    $arrSMTP_CC = array('trungvan1929@gmail.com', 'trongtayninh@gmail.com');
    define('SMTP_RECEIVE_MAIL', 'trongtayninh@yahoo.com');
    //============================= End of mailer object ==========================//

    //============================= defined xajax object ==========================//
    $XAJAX_DIR = 'scripts/xajax';
    require_once(CORE_PATH.'classes/xajax/xajax.inc.php');
    $objXajax = new xajax();
    $objXajax->bDebug = false;
    $objXajax->bWaitCursor = true;
    $objXajax->bCleanBuffer = true;
    $objXajax->statusMessagesOn();

    //============================= Other variables  ==========================//
    $arrConfig                         = array();
    $arrConfig['debug']             = true;
    $arrConfig['langs']             = array('vi', 'en');    // Available language
    $arrConfig['langname']          = array('Tiếng việt', 'English');
    $arrConfig['deflang']             = 'vi'; // Default language
    $arrConfig['pagenavsize']         = 10;
    $arrConfig['itemsperpage']      = 20;
    $arrModuleLogin = array('login');// các form không cần phải login module khong can phai login 
    //============================= End of other variables==========================//

    //============================= Start  defined power ==========================//
    define('POWER_MASTER', 1);// 
    define('POWER_SUPERVISOR', 2);
    define('POWER_ACCOUNT', 3);
    define('POWER_AGENCY', 4);
    define('POWER_CUSTOMER',5);
    define('POWER_SUB_CUSTOMER',6);
    define('POWER_CUSTOMER_MANAGER',7);
    define('POWER_SUPPORTER',8);
    
    define('SVT_HOTEL', 1);// 
    define('SVT_CAFE', 2);
    define('SVT_BIDA', 3);
    define('SVT_KARAOKE', 4);
    define('SVT_MASSAGE',5);
    define('SVT_FILM',8);
        
    $arrPostFix[1] = array('a','b') ;
    $arrPostFix[2] = array('a','b','c','d') ;
    $arrPostFix[3] = array('a','b','c','d') ;
    $arrPostFix[4] = array('a','b','c','d') ;
    $arrPostFix[5] = array('a','b','c','d') ;
    
    
    $arrpowerview = array();
    $arrpowerview[1]='2,3,4,5,7,8';
    $arrpowerview[2]='3,4,5,7,8';
    $arrpowerview[3]='4,5,7,8';
    $arrpowerview[4]='5';
    $arrpowerview[7]='5';
    $arrpowerview[8]='4,5';   
        
    define('PASS_DEFAULT','zzz666');   
    
    //============================= End defined power ==========================//
    
    define('MAX_USER_MANAGEMENT_HOTEL',3);
    define('ACTIVE',1);
    define('DEACTIVE',0);
    define('MAXHOTEL',3);
    define('SEP_ROW',';xrowx;');
    define('SEP_COL',';xcolx;');
    define('SEP_TITLE',';xtitlex;');
    