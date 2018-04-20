<?php
	/*define('ERROR_CONNECT_DB', 'Loi khi ket noi database');
	define('ERR_USER_EXISTED', 'Trung ma');
	define('ERR_USER_INVALID', 'Username khong hop le');
	define('ERR_PASS_INVALID', 'Password khong hop le');
	define('ERR_CODE_EXISTED', 'Trung ma');
	define('ERR_CODE_INVALID', 'Ma khong hop le');
	define('ERR_NAME_INVALID', 'Ten khong hop le');
	define('ERR_GENERAL', 'Co loi xay ra');
	define('ERR_SQL_SYNTAX', 'Loi cu phap');

	define('ERR_NOTFOUND', 'ID is invalid');
	define('ERR_DATA_INVALID', 'Data is invalid, please check again');


	
	define('NOT_DELETED', 'Da xoa xong');
	define('NOT_UPDATED', 'Da cap nhat xong');*/
	////////////////////////////////////////////
    DEFINE("SYSTEM_DATE_FROM",date('Y-m-d').' 00:00:00'); 
    DEFINE("SYSTEM_DATE_TO",date('Y-m-d').' 23:59:59');
    DEFINE("SYSTEM_DATE",date('Y-m-d'));
    DEFINE("SYSTEM_FORMAT_DATE_REVIEW",'Y-m-d');
    DEFINE("SYSTEM_NO_SELECT",'No select');
    DEFINE("SYSTEM_TIME_TITLE_HMS",''); 
    DEFINE("SYSTEM_DATE_FORMAT_HHMMSS","hh:mm:ss");
    DEFINE("SYSTEM_DATE_HHMMSS","Time");           
    ///////////// 
        //Phuong add hằng số: Số ngày dùng cho danh mục tính năng mới
    DEFINE("SYSTEM_NEWTECH_DATE_CREATED","7");
    //Phuong end add hằng số: Số ngày dùng cho danh mục tính năng mới   
	DEFINE("STR_ACCESS_DENY","Error on direct access!");
	//DEFINE("STR_PERMIT","You haven't permission to access this function!");
	DEFINE("STR_MODULE_FAIL","module structure is incorrect! ");
	DEFINE("STR_NO_USER","No user! ");
	DEFINE("STR_DEL_DATA","Delete Success ! ");
	DEFINE("STR_ERROR_GET_LOCATION","Error get list Location! ");
	DEFINE("STR_ERROR_GET_DEVICE","Error get list Device! ");
	DEFINE("STR_ERROR_GET_DATA","Error get data! ");
	define('NOT_INSERTED', 'Insert Success! ');
    define('STR_LOCATION_UNDEFINE', 'Undefine');
	//define('STR_NO_GPRS', 'Lost signal ');
	//define('STR_STOP', 'Stopped ');
	//define('STR_NO_GPS', 'Lost GPS ');
	//DEFINE('STR_RUN', 'Running');
    
   // DEFINE("POWER_OFF", 'Power off');
    //DEFINE('POWER_LOW', 'Power low');
    //DEFINE('POWER_NORMAL', 'Power normal');
    //DEFINE('POWER_BATTERY', 'On battery');       // Trạng thái đang dùng Pin DF220
    
    define('STR_BUFFERING', 'Sending log');
    
	//DEFINE('STR_DEVICE', 'Device');
	define('LBL_SATELLINE', 'SATELLINE');
	DEFINE("STR_LOGIN","Please login to use !");
	DEFINE("STR_REPORT", "Please note you must load more money on the SIM device, to use the services smoothly. Thank!");
    
    //Start-Format data type for Grid
    //DEFINE('FORMAT_DATETIME_SHORT', 'yyyy-mm-dd');
    //DEFINE('FORMAT_DATETIME_SHORT_EXCEL', 'Y-m-d');
    DEFINE('FORMAT_DATETIME_SQL', '%Y-%m-%d');
    DEFINE('FORMAT_DATETIME_FOREVER', '2100-01-01');
    DEFINE('FORMAT_DATETIME_DATE', 'Y-m-d');
    
    //DEFINE('FORMAT_DATETIME_LONG', 'yyyy-mm-dd hh:nn:ss');
    //DEFINE('FORMAT_DATETIME_LONG_EXCEL', 'Y-m-d H:i:s');
    
    //DEFINE('FORMAT_FUEL', '0,000.0');
    //DEFINE('FORMAT_FUEL_EXCEL', '1');
    
    //DEFINE('FORMAT_KM', '0,000.00');
    //DEFINE('FORMAT_KM_EXCEL', '2');
    
    //DEFINE('FORMAT_SPEED', '0,000.');
    //DEFINE('FORMAT_SPEED_EXCEL', '0');
    
    //DEFINE('FORMAT_AMOUNT', '0,000.');
//    DEFINE('FORMAT_AMOUNT_EXCEL', '0');
    
//    DEFINE('FORMAT_PERCENT', '0.00');
//    DEFINE('FORMAT_PERCENT_EXCEL', '2');
    
//    DEFINE('FORMAT_LONGITUDE', '0.00000');
//    DEFINE('FORMAT_LONGITUDE_EXCEL', '5');
    
//    DEFINE('FORMAT_LATITUDE', '0.00000');
//    DEFINE('FORMAT_LATITUDE_EXCEL', '5');
    
//    DEFINE('FORMAT_TEMPERATURE', '0,000.');
//    DEFINE('FORMAT_TEMPERATURE_EXCEL', '0');
    //End-Format data type for Grid
    
    //Start-File Excel
//    DEFINE('EXCEL_PREFIX', 'ada_');
    
//    DEFINE('EXCEL_REPLY_LIST', 'thietbiphanhoi');
//    DEFINE('EXCEL_R_GENERAL', 'baocaotonghop');
//    DEFINE('EXCEL_LAND_MARK', 'baocaodiadiem');
//    DEFINE('EXCEL_REPORT_GPS', 'baocaosucogps');
//    DEFINE('EXCEL_GENERAL_DAY', 'baocaotonghoptheongay');
//    DEFINE('EXCEL_ACTIVE_DAY', 'baocaotinhtranghoatdong');
//    DEFINE('EXCEL_SPEED_REPORT', 'baocaovuottocdo');
//    DEFINE('EXCEL_ACTIVE_LOC', 'baocaovitrihoatdong');
//    DEFINE('EXCEL_DEVICE_GENERAL_CARTYPE', 'baocaotonghoploaiphuongtien');
    //END-File Excel
    
//    ///////* Phuong : 21/03/2011 : device_alarm  *///////////////
//    define('STR_DEVICE', 'Device');
//    define('STR_ALARM', 'Alarm type');
//    define('STR_REPORT_ALARMS', 'Device Alarms Report');
    define('STR_REPORT_ALARMS_TITLE', 'ALERT DEVICE REPORT');
//    define('STR_REPORT_ALARMS_EXCEL', 'DeviceAlarmsReport');
//    define('STR_ALARM_TIME', 'Alarm time');
//    define('STR_ALARM_PRESENT', 'Present status');
//    define('STR_ALARM_LOCATION', "Alarm begin's location");
    define('STR_ALL', 'All');
//    define('ALARM_01', 'Input 1 active');
//    define('ALARM_02', 'Input 2 active');
//    define('ALARM_03', 'Input 3 active');
    define('ALARM_04', 'Input 4 activation');
    define('ALARM_05', 'Input 5 activation');
    define('ALARM_10', 'Battery low');
    define('ALARM_11', 'Overspeed');
    define('ALARM_12', 'Movement');
    define('ALARM_13', 'Geo-fencing');
    define('ALARM_14', 'Alarm on');
    define('ALARM_15', 'Enter blind area');
    define('ALARM_16', 'Exit blind area');
    define('ALARM_31', 'Input 1 deactivation');
    define('ALARM_32', 'Input 2 deactivation');
    define('ALARM_33', 'Input 3 deactivation');
    define('ALARM_34', 'Input 4 deactivation');
    define('ALARM_35', 'Input 5 deactivation');
    define('ALARM_50', 'Power cut off');
    define('ALARM_52', 'Veer report');     
    ///////* Phuong : 21/03/2011 : End report_address_general *///////////   

    /////////* Phuong : 21/03/2011 :Start Genaral Forms
    DEFINE("STR_NOTICE","");
    DEFINE("STR_UNDEFINE_ADDRESS","UNDEFINE");//SYSTEM_TYPE
    DEFINE("SYSTEM_ADD_BUTTON","Add");
    DEFINE("SYSTEM_EDIT_BUTTON","Edit");
    DEFINE("SYSTEM_DELETE_BUTTON","Delete");
    DEFINE("SYSTEM_SAVE_BUTTON","Save");
    DEFINE("SYSTEM_BACK_BUTTON","Back");
    DEFINE("SYSTEM_NEXT_BUTTON","Next");
    DEFINE("STR_PERMIT","You have not authority to access this feature");
    DEFINE("SYSTEM_ACCESS_DENIED","Cannot access this page directly.");
    
    DEFINE("SYSTEM_ADD_ERR","Adding is fail.");
    DEFINE("SYSTEM_DELETE_SUCCESS","Delete success");
    DEFINE("SYSTEM_DELETE_ERR","Deleting is fail.");
    DEFINE("SYSTEM_DELETE_ERR_EXIST_USER","Having a user is using this authority.");
    DEFINE("SYSTEM_PAGING_ERROR_LOAD_DATA",'Syntax error when getting the data from the paging');
    DEFINE("SYSTEM_SWICH_PAG",'If the browser does not change automatically, please click on the <a href= "{0}"> </a>.');   
   
    DEFINE("SYSTEM_EDIT_SUCCESS","Edit success");
    DEFINE("SYSTEM_EDIT_ERR","Updating is failed");
    DEFINE("SYSTEM_REDIRECT_WAIT","If the browser doesn't change automatically, please press ..");    
    DEFINE("SYSTEM_ERR_GETDATA","Data processing error, please try later");    
    DEFINE("SYSTEM_INPUTDATA_INVALID","Input data is invalid, please check again!");
    DEFINE("SYSTEM_INPUTDATA_NOT_ENOUGH_DATA","Please fully fill information in");    
    DEFINE("SYSTEM_INVALID_FORMAT_EMAIL","The format of email address is incorrect");    
    DEFINE("SYSTEM_USERNAME_INVALID","User name is invalid, please check again");    
    DEFINE("SYSTEM_USER_NOT_EXISTS_SYSTEM","User isn't exist in the system, please check again");    
    DEFINE("SYSTEM_DATA_NOT_EXISTS_SYSTEM","Cannot  find the data in system");    
    DEFINE("SYSTEM_WATING","Please wait for more 60 seconds and try again.");    
    DEFINE("SYSTEM_TITLE_FORM_DATE","From: ");    
    DEFINE("SYSTEM_TITLE_TO_DATE","To: ");
    DEFINE("SYSTEM_TITLE_FORM","From");
    DEFINE("SYSTEM_TITLE_TO","To");    
    DEFINE("SYSTEM_TITLE_STATUS","Status");    
    DEFINE("SYSTEM_TITLE_START_TIME","Start time");    
    DEFINE("SYSTEM_TITLE_END_TIME","End time");    
    DEFINE("SYSTEM_TITLE_DURATION","Total time");   
    DEFINE("SYSTEM_TITLE_START_ADDRESS","Start point");    
    DEFINE("SYSTEM_TITLE_END_ADDRESS","End point");  
    DEFINE("SYSTEM_TITLE_DISTANCE","Total of km");    
    DEFINE("SYSTEM_MAIL_SEND_SUCCESS","Announcement email has already sent to selected accounts.");
    DEFINE("SYSTEM_MAIL_SEND_FAIL","Cannot send email, please try later");
    DEFINE("SYSTEM_TITLE_DEVICE","Vehicle");
    DEFINE("SYSTEM_TITLE_DEV","Device");            
    DEFINE("SYSTEM_TITLE_TIME","Time");    
    DEFINE("SYSTEM_TITLE_TOTAL","Total");    
    DEFINE("SYSTEM_ORDER_NUMBER","No.");
    DEFINE("SYSTEM_BEGIN","Start");
    DEFINE("SYSTEM_END","End");
    DEFINE("SYSTEM_TIME","Time");
    DEFINE("SYSTEM_TITLE_DATE","Date");
    DEFINE("SYSTEM_ACTIVE","Operating");
    DEFINE("SYSTEM_LOCATION","Location");
    DEFINE("SYSTEM_SELECT_ALL","All");
    DEFINE("SYSTEM_REINPUT_PASS_ERR","Password is incorrect!");
    DEFINE("SYSTEM_SENDNUMBERS","Number of sending-times");
    DEFINE("SYSTEM_TIME_BETWEEN_2_SENDING","TimeTime between two of sending-times (minute)");
    DEFINE("SYSTEM_ACCOUNT","Account");
    DEFINE("SYSTEM_ADDRESS","Address");
    DEFINE("SYSTEM_EMAIL","Email");
    DEFINE("SYSTEM_PHONE","Telephone");
    DEFINE("SYSTEM_PHONE_NUMBER","Phone number");
    DEFINE("SYSTEM_CELL_PHONE","Cell Phone");
    DEFINE("SYSTEM_SUMMARY","Summary");
    DEFINE("SYSTEM_ON","On");
    DEFINE("SYSTEM_ON2","on");    
    DEFINE("SYSTEM_OFF","Off");
    DEFINE("SYSTEM_OPEN","Open");
    DEFINE("SYSTEM_OPEN2","open");
    DEFINE("SYSTEM_ACTIVE2","activation");
    DEFINE("SYSTEM_INACTIVE2","deactivation");    
    DEFINE("SYSTEM_HIDE","Hidden");
    DEFINE("SYSTEM_SHOW","Show");
    DEFINE("SYSTEM_OPEN_DOOR","Open");
    DEFINE("SYSTEM_CLOSE_DOOR","Close");
    DEFINE("SYSTEM_CLOSE_DOOR2","close");
    DEFINE("SYSTEM_NO_DOING","Not doing");
    DEFINE("SYSTEM_OFF2","off");
    DEFINE("SYSTEM_ENGINE_ON","Engine on");
    DEFINE("SYSTEM_OVER","Over");
    DEFINE("SYSTEM_SLOW","Slow");
    DEFINE("SYSTEM_ENGINE_OFF","Engine off");
    DEFINE("SYSTEM_TITLE_CREATE_DATE","Create day");
    DEFINE("SYSTEM_TITLE_CREATE_AUTHOR","Creator");
    DEFINE("SYSTEM_TITLE_CREATE_CELLPHONE","Cellphone");
    DEFINE('STR_DEVICE_TYPE_EXIST', 'Type of device  already exist!');
    DEFINE("SYSTEM_TITLE_ACCOUNT","Account");
    DEFINE("SYSTEM_TITLE_PAGE","Pag");
    DEFINE("SYSTEM_TITLE_ACCOUNT_ADA","ADA accounting");
    DEFINE("SYSTEM_TITLE_AGENT","Agent");
    DEFINE("SYSTEM_MSG_NOT_SELECT_DEVICE","You haven't selected  device");
    DEFINE("SYSTEM_TITLE_LOCATION","Location");
    DEFINE("SYSTEM_DEVICE_CONFIG_SUCCESS",'The device has already configured successfully ');
    DEFINE("SYSTEM_DEVICE_CONFIG_ERROR",'The device has not configured successfully ');
    DEFINE("DRIVER_LICENSE_EXIST",'Driver license information is existed.'); 
    DEFINE("SYSTEM_ACTIVE_DEV",'Activation');
    DEFINE("SYSTEM_DEACTIVE",'Deactivation');
    DEFINE("SYSTEM_ACTIVE_DEV_EX",'Activation');
    DEFINE("SYSTEM_DEACTIVE_EX",'Deactivation');
    DEFINE('SYSTEM_TYPE', 'Type');
    DEFINE("SYSTEM_NO_ACTIVE","No activation");
    DEFINE("SYSTEM_NO_DATA",'Data not found');
    DEFINE("SYSTEM_ALL_DEVICE",'-- All --');
    DEFINE("SYSTEM_ADD_SUCCESS",'Add success!');
    DEFINE("SYSTEM_ACTIVED",'Activated');
    DEFINE("SYSTEM_NOT_ACTIVED",'Inactive');
    
   // DEFINE('STR_DEVICE', 'Device');
    DEFINE('STR_STORE', 'Store');
    DEFINE('STR_SIM', 'SIM number');
    DEFINE('STR_IMEI', 'IMEI number');
    DEFINE('STR_DEVICE_TYPE', 'Type of device');
    DEFINE('STR_VIHICLE_TYPE', 'Type of vehicle');
    DEFINE('STR_DRIVER_NAME', 'Driver name');
    DEFINE('STR_DRIVER', 'Driver');
    DEFINE('STR_VEHICLE', 'Vehicle');
    DEFINE('STR_OBJECT', 'Object'); 
   //DEFINE('STR_ALL', 'All');
    DEFINE('SYSTEM_IMAGE', 'Images');
    DEFINE('STR_DEVICE_SELECT', '-- Select --');
    DEFINE('STR_DRIVER_SELECT', '-- Select --');    
    DEFINE('STR_COST_SELECT', '-- Select --');
    DEFINE('STR_COST_TYPE', '-- Select --');
    DEFINE('STR_ACCOUNT_SELECT', '-- Select --');
    DEFINE('STR_SUBACCOUNT_SELECT', '-- Select --'); 
    DEFINE('STR_VEHICLE_SELECT', '-- Select --');
    DEFINE('SYSTEM_UNLIMITED', 'Unlimited');
    DEFINE("DELETEDLOCATION"," (location deleted)");//SYSTEM_TYPE  
    
    DEFINE("VEHICLE_SOS",'SOS');
    DEFINE("VEHICLE_CABIN",'Cabin door');  
    DEFINE("VEHICLE_MAYLANH",'Air-conditioner');  
    DEFINE("VEHICLE_ENGINE",'Engine');  
    DEFINE("VEHICLE_FUEL",'Fuel');
    DEFINE("VEHICLE_TEMPERATURE",'Temperature');
        //More
    DEFINE('STR_STATUS', 'Status');
    DEFINE('STR_STOPED', 'Stoped');
    DEFINE('STR_GPS_LOST', 'Lost GPS');                 
    DEFINE('STR_SPEED', 'Speed');
    
    DEFINE('STR_ENGIN', 'Engine');                 
    DEFINE('STR_ENGIN_STATUS_ON', 'Engine on');
    DEFINE('STR_ENGIN_STATUS_OFF', 'Engine off');
    
    DEFINE('STR_AIRCON', 'Air-conditioner');
    DEFINE('STR_AIRCON_STATUS_ON', 'Air-conditioner on');
    DEFINE('STR_AIRCON_STATUS_OFF', 'Air-conditioner off');    
     
    DEFINE('STR_DOOR', 'Door');
    DEFINE('STR_DOOR_STATUS_OPEN', 'Open door');
    DEFINE('STR_DOOR_STATUS_ClOSE', 'Close door');
    
    DEFINE("STR_TEMPERATURE","Temperature");
      
    DEFINE('STR_RUN_DATE', 'Run/Date');
    DEFINE('STR_STOP_DATE', 'Stop/Date'); 
    DEFINE('STR_ROUTE_DATE', 'Distance/Date (km)');
    DEFINE('STR_MOVE_DATE', 'Move/Date(times)');    ///////mai làm tiếp
    DEFINE('STR_DONT_MOVE_DATE', 'Stop/Date(times)');
    DEFINE('STR_OVER_SPEED_DATE', 'Over speed/Date(times)');
    DEFINE('STR_LOST_GPS_DATE', 'Lost GPS/Date');
    DEFINE('STR_LOST_GPRS_DATE', 'Lost GPRS/Date'); 
    
    DEFINE('STR_BOX_OPEN', 'Goods box open/Date');
    DEFINE('STR_BOX_CLOSE', 'Goods box close/Date');
    DEFINE('STR_CABIN_OPEN', 'Cabin door open/Date');
    DEFINE('STR_CABIN_CLOSE', 'Cabin door close/Date');
    DEFINE('STR_AIRCON_OPEN', 'Air-conditioner on/Date');
    DEFINE('STR_AIRCON_CLOSE', 'Air-conditioner off/Date');
    DEFINE('STR_ENGIN_ON', 'Engine on/Date');
    DEFINE('STR_ENGIN_OFF', 'Engine off/Date');
    DEFINE('STR_DOOR_OPEN', 'Open door/Date(times)');
    DEFINE('STR_AIRCON_OPEN_DAY', 'Air-conditioner on/Date(times)');
    DEFINE('STR_DETAIL', 'Detail');
    DEFINE("STR_ACCOUNT", "Account");   
    //End Genaral Forms        
    /////////* Phuong : 21/03/2011 :End Genaral Forms
    
    ///*Phuong add for Report*/////////////////////////// 
    DEFINE('STR_ALARM_LCD', 'LCD display alert');
    DEFINE('STR_ALARM_VOICE', 'Voice alert');
    DEFINE('STR_ALARM_WEB', 'Web alert');       
    ///*End Phuong add for Report*/////////////////////////// 
    
    /////////* Phuong : 21/03/2011 :Start-Index
    DEFINE("INDEX_SELECT_USER","Please select user!");
    /////////* Phuong : 21/03/2011 :End-Index

    /////////* Phuong : 21/03/2011 :Start-Login
    DEFINE("LOGIN_INVALID_USER","Please input your login name!");  
    DEFINE("LOGIN_INVALID_PASS","Please input your password!");
    DEFINE("LOGIN_INVALID_ACTIVE", "Database connection error.");
    DEFINE("CONNECT_DB_ERR","The connection to database is failed.");
    DEFINE("ERR_USER_INVALID","Login name is inexistent.");
    DEFINE("ERR_PASS_INVALID","Password is incorrect.");     
    /////////* Phuong : 21/03/2011 :End-Login
    
    /////////* Phuong : 21/03/2011 :Start Permission
    DEFINE("PER_ACCESS_DENIED","User has not authority to access this functionality");
    /////////* Phuong : 21/03/2011 :End Permission
    
    /////////* Phuong : 21/03/2011 :CONTACT 
    DEFINE("CONTACT_NAME","Name");
    DEFINE("CONTACT_EMAIL","Email address");
    DEFINE("CONTACT_MSG","Content");
    DEFINE("CONTACT_REQUIRED","Please input information: Name, address, email and feedback.");
    DEFINE("CONTACT_INVALID_EMAIL","Email address is incorrect!");
    DEFINE("CONTACT_TITLE","Feedback");
    DEFINE("CONTACT_SUCCESS","Information has already been sent to us.");
    DEFINE("CONTACT_ERR","Error occurred while sending. Please try again later!");
    /////////* Phuong : 21/03/2011 :End Conttact
    
    /////////* Phuong : 21/03/2011 :Persional
    DEFINE("CHANGE_PASS_UNS","Change password failed. Please try again later!");
    DEFINE("CHANGE_PASS_SUC","Your password has been changed. Please login again!");
    /////////* Phuong : 21/03/2011 :End persional
    
    // ///////* Phuong : 21/03/2011 :Devices manager
    DEFINE("ADDDEV_TITLE","Adding new device");    
    DEFINE("ADDDEV_EX_NAME","Device name has been used.");
    DEFINE("ADDDEV_EX_SIM","SIM number has been used.");
    DEFINE("ADDDEV_EX_SERIAL","Serial/IMEI number has been used");
    DEFINE("ADDDEV_EX_ERR","Cannot add this device because of:");
    DEFINE("ADDDEV_OK","Adding device  successful");
    DEFINE("EDIDEV_TITLE","Updating device information");
    DEFINE("EDIDEV_BUTTON","Save");
    DEFINE("EDIDEV_EX_ERR","Cannot update device information because of:");
    DEFINE("EDIDEV_OK","Device information is already saved");
    // ///////* Phuong : 21/03/2011 :End Edit Device
    
    /////////* Phuong : 21/03/2011 :Start-user manager
    DEFINE("ACTIVE_USER","User is already activated.");
    DEFINE("DEACTIVE_USER","User is already deactivated");
    DEFINE("ACTIVE_USER_ERR","User is already deactivated");
    DEFINE("DEACTIVE_USER_ERR","Deactivating user error");
    DEFINE("ADD_USER_EXIST","This login name was already used, please input another one");
    DEFINE("ADD_USER_EMAIL_EXIST","This email was already used, please input another one");
    DEFINE("ADD_USER_PHONE_EXIST","This phone number was already used, please input another one");
    DEFINE("SET_USER_ROLE_ERR","Have an error when updating authority for the account ");
    DEFINE("LOAD_USER_BY_USERNAME_NOT_EXIST","This username is inexistent ");
    DEFINE("DELETE_USER_ERR","Deletting user information is failed, please inform to administrator ");
    DEFINE("DELETE_SELECT_USER","NoDon't select user to delete yet.");
    DEFINE("CHANGE_NOT_SELECT_USER","Don't select account yet");
    DEFINE("CAPTION_RESTORE","Recovery ");
    DEFINE("CAPTION_UPDATE","Update ");
    DEFINE("RESTORE_SUCCESS","Accounts are already recovered success.");
    DEFINE("UPDATE_SUCCESS","Accounts are already updated success");
    DEFINE("RESTORE_ERR","Cannot recover the accounts");
    DEFINE("UPDATE_ERR","Cannot update the accounts");
    /////////* Phuong : 21/03/2011 :End-user manager
    
    /////////* Phuong : 21/03/2011 :Start- user change 
    DEFINE("CHANGEUSER_ACCOUNT","Account");
    DEFINE("CHANGEUSER_ADDRESS","Address");
    DEFINE("CHANGEUSER_EMAIL","Email");
    DEFINE("CHANGEUSER_PHONE","Phone");
    DEFINE("CHANGEUSER_CELL_PHONE","Cell Phone");
    DEFINE("CHANGEUSER_ADDRESS_OLD","Old address");
    DEFINE("CHANGEUSER_EMAIL_OLD","Old email");
    DEFINE("CHANGEUSER_PHONE_OLD","Old phone");
    DEFINE("CHANGEUSER_CELL_PHONE_OLD","Old cell phone");
    /////////* Phuong : 21/03/2011 :End- user change
    
    /////////* Phuong : 21/03/2011 :Start-subusers
    DEFINE("ADDSUBUSER_WATING","Please waiting for more 60 seconds and try again.");
    DEFINE("ADDSUBUSER_EXISTS_USER","This user name was already registered, please select another one");
    DEFINE("ADDSUBUSER_REINPUT_PASS_ERR","Password is incorrect");
    DEFINE("ADDSUBUSER_USER_USING","Login name was already used");
    DEFINE("ADDSUBUSER_EMAIL_USING","Email address was already used");
    DEFINE("ADDSUBUSER_ERR_INFO","Sub-account information is invalid. Please check again");
    DEFINE("ADDSUBUSER_NOT_EXIST","Sub-account isn't exist");
    /////////* Phuong : 21/03/2011 :End-subusers
    
    /////////* Phuong : 21/03/2011 :Start-subuser device
    DEFINE("SUBUSERDEV_LIST_DEVICE_INVALID","Generated list of device is invalid");
    /////////* Phuong : 21/03/2011 :End-subuser device
    
    /////////* Phuong : 21/03/2011 :Start-Speed Alert Congig 
    DEFINE("ADDSPEEDALERT_NOT_DEVICE","HaveThere is no device to configure");
    DEFINE("ADDSPEEDALERT_SPEED_0","MaxMax speed is not equal to zero");
    DEFINE("ADDSPEEDALERT_NOT_INPUT_PHONE","Phone number is not inputted yet for alerting");
    DEFINE("ADDSPEEDALERT_SMS_0","Number of message sending is not equal to zero");
    DEFINE("ADDSPEEDALERT_SMS_TIME","TimeTime between two messages is not equal to zero");
    DEFINE("DELETESPEEDALERT_NOT_DEV","NoPlease select configuration to delete.");
    DEFINE("SPEEDALERT_TITLE_DEVNAME","Device");
    DEFINE("SPEEDALERT_TITLE_LIMITS","Speed (km/h)");
    DEFINE("SPEEDALERT_TITLE_PHONENUMBER","Phone number");
    DEFINE("SPEEDALERT_TITLE_ALERTNUMBER","Number of sending times");
    DEFINE("SPEEDALERT_TITLE_ALERTINTERVAL","Time between two sending-times(minute)");
    DEFINE("SPEEDALERT_TITLE_FLAGTEXT","Status");
    DEFINE("SPEEDALERT_TITLE_GENERAL","Summary");
    /////////* Phuong : 21/03/2011 :End-Speed Alert Congig 
    
    /////////* Phuong : 21/03/2011 :Start - ReportStatus
    DEFINE("REPORTSTATUS_TITLE","Route report");
    DEFINE("REPORTSTATUS_TITLE_FROM_DATE","From: ");
    DEFINE("REPORTSTATUS_TITLE_TO_DATE","To: ");
    DEFINE("REPORTSTATUS_TITLE_ROUTESTYPE","Status");
    DEFINE("REPORTSTATUS_TITLE_START_TIME","Start time");
    DEFINE("REPORTSTATUS_TITLE_END_TIME","End time");
    DEFINE("REPORTSTATUS_TITLE_DURATION","Total of time");
    DEFINE("REPORTSTATUS_TITLE_START_ADDRESS","Start point");
    DEFINE("REPORTSTATUS_TITLE_END_ADDRESS","End point");
    DEFINE("REPORTSTATUS_TITLE_DISTANCE","Total of km"); 
    /////////* Phuong : 21/03/2011 :End- ReportStatus
    
    /////////* Phuong : 21/03/2011 :Start-reportspeed
    DEFINE("REPORTSPEED_TITLE","Over speed report");
    DEFINE("REPORTSPEED_TITLE_FROM_DATE","From: ");
    DEFINE("REPORTSPEED_TITLE_TO_DATE","To: ");
    DEFINE("REPORTSPEED_TITLE_TRKTIME","Day");
    DEFINE("REPORTSPEED_TITLE_SPEEDLIMITS","Limited speed (km/h)");
    DEFINE("REPORTSPEED_TITLE_SPEED","Over speed (km/h)");
    /////////* Phuong : 21/03/2011 :End-reportspeed
    
     //////*phuong: Report history status ////////////////////////////////////
//      DEFINE("REPORT_HISTORY_STATUS_TITLE_EXCEL",'BÁO CÁO LỊCH SỬ TRẠNG THÁI' );
//      DEFINE("REPORT_HISTORY_START_POSISION",'Starting position' );
//      DEFINE("REPORT_HISTORY_END_POSISION",'Ending position' );
      DEFINE("REPORT_HISTORY_FROM",'From');
      DEFINE("REPORT_HISTORY_TO",'To');
    
    /////////* Phuong : 21/03/2011 :Start-reportroute
    DEFINE("REPORTROUTE_TITLE","Route report");
    /////////* Phuong : 21/03/2011 :End-reportroute
    
    /////////* Phuong : 21/03/2011 :Start-reportgps
    DEFINE("REPORGPS_TITLE","GPS LOST SIGNAL REPORT ");
    DEFINE("REPORGPS_TIMES_LOSTGPS","GPS lost times");     
    DEFINE("REPORGPS_TIMES_LOSTGPRS","GPRS lost times");
    DEFINE("REPORGPS_TIME","Time");  
    DEFINE("REPORGPS_SIGNAL","Signal");
    DEFINE("REPORGPS_DETAIL_SIGNAL_TYPE","Signal");
    DEFINE("REPORGPS_DETAIL_TITLE","GPS LOST SIGNAL DETAIL REPORT");
    DEFINE("REPORGPS_TITLE_EXCEL"," GPSlostsignaldetailreport "); 
    /////////* Phuong : 21/03/2011 :End-reportgps
    
    /////////* Phuong : 21/03/2011 :Start-reportbranch
    DEFINE("REPORT_BRANCH_TITLE","Summary chuyennhat device");
    DEFINE("REPORT_BRANCH_TITLE_AGENTNAME","Agent");
    DEFINE("REPORT_BRANCH_TITLE_NUMBER_DEV","Number of device");
    DEFINE("REPORT_BRANCH_TITLE_NUMBER_DEV_RUN","Number of running device");
    DEFINE("REPORT_BRANCH_TITLE_NUMBER_DEV_LOST","Number of loss-signal device");
    DEFINE("REPORT_BRANCH_TITLE_PERCENT","Ratio");
    DEFINE("REPORT_BRANCH_TITLE_BRANCHNAME","Branch office");
    DEFINE("REPORT_BRANCH_TITLE_TOTAL_DEV","Total of  device");
    DEFINE("REPORT_BRANCH_TITLE_TOTAL_DEV_RUN","Living");
    DEFINE("REPORT_BRANCH_TITLE_TOTAL_PERCENT","Living ratio");
    DEFINE("REPORT_BRANCH_TITLE_STATISTICS","Statistic");
    DEFINE("REPORT_BRANCH_TITLE_TOTAL","Total");      
    /////////* Phuong : 21/03/2011 :End-reportbranch
    
    /////////* Phuong : 21/03/2011 :Start-Reportactivebyday
    DEFINE("REPORT_ACTIVEBYDAY_TITLE","Activity report by date");
    DEFINE("REPORT_ACTIVEBYDAY_TITLE_DATE","Day");
    DEFINE("REPORT_ACTIVEBYDAY_TITLE_BEGIN","Start");
    DEFINE("REPORT_ACTIVEBYDAY_TITLE_END","End");
    DEFINE("REPORT_ACTIVEBYDAY_VIEW_MAP","View map");  
    /////////* Phuong : 21/03/2011 :End-Reportactivebyday
    
    /////////* Phuong : 21/03/2011 :Start-reportstatus
    DEFINE("REPORT_STATUS_TITLE","Device status report");
    DEFINE("REPORT_STATUS_TITLE_START_LOCATION","Start location");
    DEFINE("REPORT_STATUS_TITLE_END_LOCATION","End location");
    DEFINE("REPORT_STATUS_TITLE_TYPELOST","Problem type:");
    DEFINE("REPORT_STATUS_TITLE_LOSTGPS","Lost GPS");
    DEFINE("REPORT_STATUS_TITLE_LOSTGPRS","Lost GPRS");
    
    
    /////////* Phuong : 21/03/2011 :End-reportstatus
    
    /////////* Phuong : 21/03/2011 :Start-reportaddress
    DEFINE("REPORT_ADDRESS_TITLE","General outside/Inside geo-fence report");
    DEFINE("REPORT_ADDRESS_TITLE_NUMBERIN","Times");
    DEFINE("REPORT_ADDRESS_TITLE_NUMBEROUT","Times");
    /////////* Phuong : 21/03/2011 :End-reportaddress  
    
    /////////* Phuong : 21/03/2011 :Start-r-vbd
    DEFINE("R_VBD_TITLE_PHONE","Phone number");
    DEFINE("R_VBD_TITLE_PREFIXNUMBER","SMS center");
    DEFINE("R_VBD_TITLE_CONTENT","Content");
    DEFINE("R_VBD_TITLE_TIMESEND","Sending time");
    /////////* Phuong : 21/03/2011 :End-r-vbd
    
    /////////* Phuong : 21/03/2011 :Start-r_stop_on
    DEFINE("R_STOP_ON_TITLE_BEGIN_TIME","Start time");
    DEFINE("R_STOP_ON_TITLE_END_TIME","End time");
    DEFINE("R_STOP_ON_TITLE_TOTAL_TIME","Total of time (minute)");
    DEFINE("R_STOP_ON_TITLE_FUEL_SUPPORT","Supporting fuel (liter)");
    /////////* Phuong : 21/03/2011 :End-r_stop_on
    
    /////////* Phuong : 21/03/2011 :Start-r-general
    DEFINE("R_GENERAL_TITLE_EXCEL","GENERAL REPORT ");
    DEFINE("R_GENERAL_TIME_RUN","Running time ");
    DEFINE("R_GENERAL_TIME_STOP","Stop time ");
    DEFINE("R_GENERAL_PERCENT_RUN","Running ratio (%)");
    DEFINE("R_GENERAL_DISTANCE","Distance (km)");
    DEFINE("R_GENERAL_SPEED_AVG","Average speed (km/h) ");
    DEFINE("R_GENERAL_FUEL"," Fuel (liter)");
    DEFINE("R_GENERAL_COST_ORTHER"," Other cost (vnd) ");
    DEFINE("R_GENERAL_TIME_ENGINE_ON","Time of start engine ");
    DEFINE("R_GENERAL_TIME_FRIDEGE_ON","Time of start air-conditioner ");
    DEFINE("R_GENERAL_COUNT_OVER_SPEED","Overspeed times ");
    DEFINE("R_GENERAL_COUNT_OPEN_DOOR","Door open times");
    DEFINE("R_GENERAL_COUNT_ENGINE_OFF","Stop and engine off times "); 
        
//    DEFINE("R_GENERAL_TITLE_EXCEL","BÁO CÁO TỔNG HỢP ");
    DEFINE("R_GENERAL_MAX_SPEED","Max speed");
//    DEFINE("R_GENERAL_TIME_RUN","Thời gian chạy ");
//    DEFINE("R_GENERAL_TIME_STOP","Thời gian dừng ");
    DEFINE("R_GENERAL_TIME_STOP_IN","Stop time in region");
    DEFINE("R_GENERAL_TIME_STOP_OUT","Stop time out region");
    DEFINE("R_GENERAL_COUNT_STOP","Stop times");  
//    DEFINE("R_GENERAL_SPEED_AVG","Vận tốc TB (km/h)");
//    DEFINE("R_GENERAL_COUNT_OVER_SPEED","Số lần vượt tốc độ");
//    DEFINE("R_GENERAL_DISTANCE","Quãng đường (km)");
    DEFINE("R_GENERAL_FUEL_NORM","Norm fuel (liter)");
    DEFINE("R_GENERAL_FUEL_REAL","Actual fuel (liter)");
//    DEFINE("R_GENERAL_COST_ORTHER","Chi phí khác (vnd)");
    DEFINE("R_GENERAL_COUNT_INPUT_1_ON","Input1 on times ");
    DEFINE("R_GENERAL_TIME_INPUT_1_ON","Input1 on time");
    DEFINE("R_GENERAL_COUNT_INPUT_2_ON","Input2 on times");
    DEFINE("R_GENERAL_TIME_INPUT_2_ON","Input2 on time");
    DEFINE("R_GENERAL_COUNT_INPUT_3_ON","Input3 on times");
    DEFINE("R_GENERAL_TIME_INPUT_3_ON","Input3 on time");
    DEFINE("R_GENERAL_COUNT_INPUT_4_ON","Input4 on times");
    DEFINE("R_GENERAL_TIME_INPUT_4_ON","Input4 on time");
    DEFINE("R_GENERAL_COUNT_INPUT_5_ON","Input5 on times");
    DEFINE("R_GENERAL_TIME_INPUT_5_ON","Input5 on time");
    DEFINE("R_GENERAL_SUM_BY_CARTYPE","Total");
    DEFINE("R_GENERAL_SUM_BY_USERID","Sumary");
        
//    DEFINE("R_GENERAL_PERCENT_RUN","Tỷ lệ chạy (%)");    
//    DEFINE("R_GENERAL_FUEL","Nhiên liệu (lít)"); 
    /////////* Phuong : 21/03/2011 :End-r-general
    
    /////////* Phuong : 21/03/2011 :Start-r-fuel-changes
    DEFINE("R_FUEL_CHANGE_TITLE_INPUT","Filling");
    DEFINE("R_FUEL_CHANGE_TITLE_OUTPUT","Exhaust");
    DEFINE("R_FUEL_CHANGE_TITLE_BEFORE","Before  (liter)");
    DEFINE("R_FUEL_CHANGE_TITLE_AFTER","After  (liter) ");
    DEFINE("R_FUEL_CHANGE_TITLE_TOTAL_INPUT","Total filling times  ");
    DEFINE("R_FUEL_CHANGE_TITLE_TOTAL_OUTPUT","Total exhaust times ");
    /////////* Phuong : 21/03/2011 :End-r-fuel-changes
    
    /////////* Phuong : 21/03/2011 :Start active_loc_report    
    DEFINE("ACTIVE_LOC_REPORT_ACTION_LOCATION","ACTIVITY LOCATION REPORT");
    DEFINE("ACTIVE_LOC_REPORT_TUB_STOP","Tank-stop rolling");
    DEFINE("ACTIVE_LOC_REPORT_NO_TAP","No exhaust");
    DEFINE("ACTIVE_LOC_REPORT_NO_PUMB","No pump");
    DEFINE("ACTIVE_LOC_REPORT_NO_CRANE","No crane");
    DEFINE("ACTIVE_LOC_REPORT_TUB_MIX","Mixing tank");
    DEFINE("ACTIVE_LOC_REPORT_TAP","Exhaute");
    DEFINE("ACTIVE_LOC_REPORT_PUMP","Pump");
    DEFINE("ACTIVE_LOC_REPORT_CRANE","Crane");
    DEFINE("ACTIVE_LOC_REPORT_ON","In region"); 
    DEFINE("ACTIVE_LOC_REPORT_OUT","Out region");
    DEFINE("ACTIVE_LOC_REPORT_ON_LANDMARK","In region"); 
    DEFINE("ACTIVE_LOC_REPORT_OUT_LANDMARK","Out region");
    DEFINE("ACTIVE_LOC_REPORT_IF","Conditions");
    DEFINE("ACTIVE_LOC_REPORT_LOCATION_DIE"," (This had been deleted)");
    DEFINE("ACTIVE_LOC_TOTAL_TIME","Total of time "); 
    DEFINE("ACTIVE_LOC_TIME","Time ");
    /////////* Phuong : 21/03/2011 :End active_loc_report
    
    //Start active_loc_report_general "BÁO CÁO TỔNG HỢP VỊ TRÍ HOẠT ĐỘNG"
    DEFINE("ACTIVE_LOC_REPORT_GENERAL","ACTIVITY LOCATION GENERAL REPORT" );
    DEFINE("ACTIVE_LOC_REPORT_GENERAL_TITLE","activities_location_general_report_" );
    
    /////////* Phuong : 21/03/2011 :Start change_dev
    DEFINE("CHANGE_DEV_SUCCESS","DeviceChanging device is success");
    DEFINE("CHANGE_DEV_FAIL","Changing device is failure, please try later");
    DEFINE("CHANGE_DEV_ERR_MSG","Error occurred ");
    /////////* Phuong : 21/03/2011 :End change_dev
    
    /////////* Phuong : 21/03/2011 :Start change_pass
    DEFINE("CHANGE_PASS_INVALID_OLD_PASS","Old password is incorrect");
    DEFINE("CHANGE_PASS_SUCCESS","Changing password is success ");
    /////////* Phuong : 21/03/2011 :End change_pass
    
    /////////* Phuong : 21/03/2011 :Start change_store
    DEFINE("CHANGE_STORE_MUST_SELECT_STORE","No store selected for device or store to move device to ");
    DEFINE("CHANGE_STORE_MUST_SELECT_DEV","No store selected to move device to");
    DEFINE("CHANGE_STORE_SUCCESS","Changing a store is success");
    DEFINE("CHANGE_STORE_FROM_STORE","Changing from store: ");
    DEFINE("CHANGE_STORE_TO_STORE","To store: ");
    /////////* Phuong : 21/03/2011 :End chart_temperature
    
    /////////* Phuong : 21/03/2011 :Start chart_temperature
    DEFINE("CHART_TEMPERATURE_FINAL","Temperature chart was already processed");
    DEFINE("CHART_TEMPERATURE_NOT_FINAL","Temperature chart has not processed yet ");
    DEFINE("CHART_TEMPERATURE_TOP_LIMIT","Upper limits");
    DEFINE("CHART_TEMPERATURE_DOWN_LIMIT","Lower limits");
    DEFINE("CHART_TEMPERATURE_C","<sup>o</sup>C");
    
    /////////* Phuong : 21/03/2011 :End change_store

    /////////* Phuong : 21/03/2011 :Start chart_device,chartypedevice        
    DEFINE("CHART_DEVICE_PATH","Route chart (km)");
    DEFINE("CHART_DEVICE_MOTION_TIME","Running hour chart(hour)");
    DEFINE("CHART_DEVICE_FUEL","Fuel chart (liter)");
    DEFINE("CHART_DEVICE_COST","Cost chart (vnd)");
    /////////* Phuong : 21/03/2011 :End chart_device, chartypedevice
    
    
    /////////* Phuong : 21/03/2011 :Start-check
    DEFINE("CHECK_KEY_LEN","Key lenght is ten characters");    
    DEFINE("CHECK_KEY_NOT_EXIST","Key is existent");
    /////////* Phuong : 21/03/2011 :End-check
    
    /////////* Phuong : 21/03/2011 :Start-config        
    DEFINE("CONFIG_SENT_COMMAND","A command is aldready sent ");
    DEFINE("CONFIG_TO_DEVICE"," To device");    
    DEFINE("CONFIG_1","Configuration 01");
    DEFINE("CONFIG_2","Configuration 02");
    DEFINE("CONFIG_3","Configuration 03");
    /////////* Phuong : 21/03/2011 :End-config


    /////////* Phuong : 21/03/2011 :Start-device_manager
    DEFINE("DEVIVE_MANAGER_NOT_INPUT_DEVICE",'Device has not been input yet ');
    DEFINE("DEVIVE_MANAGER_NOT_ENOUGH_DATA_1",'PleasePlease fulfill device information: IMEI number, SIM, type of device  ');
    DEFINE("DEVIVE_MANAGER_NOT_SELECT_TO_DEL",'Please select the device to delete ');
    DEFINE("DEVIVE_MANAGER_DEVICE_NOT_EXIST",'The device with ID "{0}" does not exist');
    DEFINE("DEVIVE_MANAGER_DEVICE_IN_USE",'The device name "{0}" has already been used ');
    DEFINE("DEVIVE_MANAGER_IMEI_IN_USE",'The IMEI number "{0}" has already been used');
    DEFINE("DEVIVE_MANAGER_SIM_IN_USE",'The SIM number "{0}" has already been used ');
    DEFINE("DEVIVE_MANAGER_NAME_IN_USE",'The device name "{0}" has already been used');
    DEFINE("DEVIVE_MANAGER_SAVE_ERR",'Saving device is failed: "{0}" ');
    DEFINE("DEVIVE_MANAGER_SAVE_SUCCESS",'Device information "{0}" is saved sucess');
    DEFINE("DEVIVE_MANAGER_NOT_ENOUGH_DATA_2",'Please fulfill device information: IMEI number, SIM, type of device, store, account');
    DEFINE("DEVIVE_MANAGER_NOT_SELECT",'No device is selected to {0}');
    DEFINE("DEVIVE_MANAGER_ACTIVE_SUCCESS",'Already "{0}" device.');
    DEFINE("DEVIVE_MANAGER_ACTIVE_ERR",'Having an error when "{0}" device:');
    DEFINE("DEVIVE_MANAGER_NO_EXIST",'This device is not exist.'); 
    DEFINE("DEVIVE_MANAGER_ERR_SAVE_CONF",'Saving assigned configuration is failed');
    DEFINE("DEVIVE_MANAGER_ERR_SAVE_CONF_INPUT",'Saving INPUT configuration is failed'); 
    // ///////* Phuong : 21/03/2011 :End-device_manager
    
    // ///////* Phuong : 21/03/2011 :Start-device_manager
    DEFINE("DEVICE_PAY_LIST_MUST_PAY",'The list of device is going to be charged ');
    DEFINE("DEVICE_PAY_TYPE",'Type');
    DEFINE("DEVICE_PAY_STATUS",'Status');
    DEFINE("DEVICE_PAY_ACTIVE",'Activation');
    DEFINE("DEVICE_PAY_PERIOD_PAY",'Payment period');
    /////////* Phuong : 21/03/2011 : End-device_manager
     
    // ///////* Phuong : 21/03/2011 :Start-doorsignals_report
    DEFINE("DOORSIGNALS_REPORT_OPEN_CLOSE",'Close and open door report');
    DEFINE("DOORSIGNALS_REPORT_CAR_STOP",'Stop vehicle');
    DEFINE("DOORSIGNALS_REPORT_CAR_RUN",'Running vehicle');
    DEFINE("DOORSIGNALS_REPORT_CLOSE",'Closing door');
    DEFINE("DOORSIGNALS_REPORT_OPEN",'Open door');
    DEFINE("DOORSIGNALS_REPORT_TITLE_EXCEL_FILE",'Close and open door report.xls'); 
    // ///////* Phuong : 21/03/2011 :End-doorsignals_reportL

    // ///////* Phuong : 21/03/2011 :Start-edit_feedreply
    DEFINE("EDIT_FEEDREPLY_SMTP_SERVER",'mail.gmail.com');
    DEFINE("EDIT_FEEDREPLY_PREFIX_SERVER",'ssl');
    DEFINE("EDIT_FEEDREPLY_GMAIL",'smtp.gmail.com');
    DEFINE("EDIT_FEEDREPLY_PORT",465);
    DEFINE("EDIT_FEEDREPLY_USERNAME",'khanhnh@adasolution.net');
    DEFINE("EDIT_FEEDREPLY_PASS",'2009khanh');
    DEFINE("EDIT_FEEDREPLY_EMAIL",'khanhnh@adasolution.net');
    DEFINE("EDIT_FEEDREPLY_COMPANY",'ASIAN DRAGON Co.Ltd.');
    /////////* Phuong : 21/03/2011 : End-edit_feedreply
    
    /////////* Phuong : 21/03/2011 :Start-powers
    DEFINE("POWERS_TITLE_ROLE_NAME","Authority name");
    DEFINE("POWERS_TITLE_NOTE","Comment");
    DEFINE("POWERS_TITLE_ROLE_MODIFY","Update authority");
    DEFINE("POWERS_TITLE_ROLE_DELETE","Delete authority");
    DEFINE("POWERS_TITLE_SELECT_ROLE_DELETE","Selecting authority to delete");
    DEFINE("POWERS_TITLE_DELETE","Delete");
    DEFINE("POWERS_TITLE_MODIFY","Update");
    DEFINE("POWERS_MSG_EXISTS_ROLE","This authority already existed. Please check again.");
    DEFINE("POWERS_MSG_NOT_SELECT_ROLE","Have no set of authority is selected.");
    DEFINE("POWERS_MSG_NOT_INPUT_ROLENAME","Authority name has not been input yet");
    /////////* Phuong : 21/03/2011 :End-powers
    
    /////////* Phuong : 21/03/2011 :Start-power_alert_conf
    DEFINE("POWERS_ALERT_CONF_TITLE_TIME_LOST","Lost time (minute)");
    DEFINE("POWERS_ALERT_CONF_TITLE_NUMBER_SEND","Sending times");
    DEFINE("POWERS_ALERT_CONF_TITLE_ALERTINTERVAL","Interval sending minute");
    DEFINE("POWERS_ALERT_CONF_TITLE_MODIFY","Updating this configuration");
    DEFINE("POWERS_ALERT_CONF_TITLE_DELETE","Deleting this configuration");
    DEFINE("POWERS_ALERT_CONF_MSG_NOT_SELECT_DEVICE","You have not selected device yet to configure ");
    DEFINE("POWERS_ALERT_CONF_MSG_LIMIT","Time of power lost is not equal to zero");
    DEFINE("POWERS_ALERT_CONF_MSG_NOT_INPUT_PHONE","You have not input phone number yet to alert");
    DEFINE("POWERS_ALERT_CONF_MSG_NOT_SELECT_CONFIG","Configuration has not been selected ") ;           
    /////////* Phuong : 21/03/2011 :End-power_alert_conf
    
    /////////* Phuong : 21/03/2011 :Start-params
    DEFINE("PARAM_TITLE_MAXSPEED","V max (km/h)") ;
    DEFINE("PARAM_TITLE_ON_TOP_TIME","Stop time(hour)");
    DEFINE("PARAM_TITLE_VOLUME","Tank capacity (liter) ");
    DEFINE("PARAM_TITLE_MINVOL","Min Volt.");
    DEFINE("PARAM_TITLE_MAXVOL","Max Volt.");
    DEFINE("PARAM_MSG_LIMIT_OVERSPEED_0","Max speed is not equal to zero.");
    DEFINE("PARAM_MSG_LIMIT_STOPTIME_0","Stop time is not equal to zero");
    DEFINE("PARAM_MSG_LIMIT_VOLUME_0","Volume of gas tank is not equal to zero");
    /////////* Phuong : 21/03/2011 :End-params
    
    /////////* Phuong : 21/03/2011 :Start-notice_mail 
    DEFINE("NOTICE_MAIL_MSG_NOTINPUT_BODYMESSAGE","Report content has not been input yet."); 
    DEFINE("NOTICE_MAIL_MSG_NOTSELECT_ACCOUNT","No account selected to send report");
    DEFINE("NOTICE_MAIL_MSG_SEND_SUCCESS","Reported email already has been sent to selected accounts. ");
    DEFINE("NOTICE_MAIL_MSG_SEND_FAIL","Cannot send email, Please try later!");
    DEFINE("NOTICE_MAIL_TITLE_NAME","Name");
    DEFINE("NOTICE_MAIL_MSG_SEND_ALL","Sending all");
    DEFINE("NOTICE_MAIL_TITLE_SENDMAIL_THIS_ACCOUNT","Sending email to this account");
    /////////* Phuong : 21/03/2011 :End-notice_mail 
    
    /////////* Phuong : 21/03/2011 :Start-mixer_alert_conf
    DEFINE("MIXER_ALERT_CONF_MSG_AMOUNT_0","Number of message sending is not equal to zero");
    DEFINE("MIXER_ALERT_CONF_MSG_NOT_SELECT_ID","No configuration infor. selected");
    DEFINE("MIXER_ALERT_CONF_TITLE_OFF","Tank off");
    DEFINE("MIXER_ALERT_CONF_TITLE_STOP","Tank stop");
    DEFINE("MIXER_ALERT_CONF_TITLE_MIX","Mixing");
    DEFINE("MIXER_ALERT_CONF_ALERTNUMBER","Number of sending");
    DEFINE("MIXER_ALERT_CONF_ALERTINTERVAL","interval sending (minute)");
    DEFINE("MIXER_ALERT_CONF_SUMMARY","Summary");
    /////////* Phuong : 21/03/2011 :End-mixer_alert_conf    
  
    /////////* Phuong : 21/03/2011 :Start-ex_location_alert_conf
    DEFINE("EX_LOCATION_ALERT_CONF_NO_DEVICE",'Have no a device to configure!');
    DEFINE("EX_LOCATION_ALERT_CONF_NO_INPUT_PHONENUMBER",'Phone number has not been input!');
    DEFINE("EX_LOCATION_ALERT_CONF_SENDTIMES_FAIL",'Number of message sending is not equal to zero');
    DEFINE("EX_LOCATION_ALERT_CONF_TIME_BETWEEN_2_SENDTIMES",'Sending interval is not equal to zero');
    DEFINE("EX_LOCATION_ALERT_CONF_INFO_NOT_SUIT",'Configuration information is invalid.');
    DEFINE("EX_LOCATION_ALERT_CONF_INFO_NOT_EXIST",'Configuration information is not existent.');
    DEFINE("EX_LOCATION_ALERT_CONF_FIX",'Update');
    DEFINE("EX_LOCATION_ALERT_CONF_FIX_CONF",'Updating this configuration');
    DEFINE("EX_LOCATION_ALERT_CONF_DEL",'Delete');
    DEFINE("EX_LOCATION_ALERT_CONF_DEL_CONF",'Deleting this configuration');
    DEFINE("EX_LOCATION_ALERT_CONF_NO_DATA",'The data is empty ');
    DEFINE("EX_LOCATION_ALERT_CONF_NO_DATA_TO_CONF",'Have no device to configure');
    DEFINE("EX_LOCATION_ALERT_CONF_NO_DATA_TO_DEL",'Do not select configuration yet to delete');
    /////////* Phuong : 21/03/2011 :End-ex_location_alert_conf
    
    /////////* Phuong : 21/03/2011 :Start-ex_stop_alert_conf      
    DEFINE("EX_STOP_ALERT_CONF_STOP_TIME",'Stop time (minute)');
    DEFINE("EX_STOP_ALERT_CONF_FIX_CONF",'Updating this configuration.');
    DEFINE("EX_STOP_ALERT_CONF_DEL",'Delete');
    DEFINE("EX_STOP_ALERT_CONF_DEL_CONF",'Deleting This configuration.');
    DEFINE("EX_STOP_ALERT_CONF_NO_DATA",'Data is empty');
    DEFINE("EX_STOP_ALERT_CONF_FIX",'Update');
    DEFINE("EX_STOP_ALERT_CONF_NO_DATA_TO_CONF",'Have no device to configure');
    DEFINE("EX_STOP_ALERT_CONF_NO_DATA_TO_DEL",'HaveNo configuration selected to delete ');    
    DEFINE("EX_STOP_ALERT_CONF_TIME_CANOT_STOP",'Stop time is not equal to zero');
    DEFINE("EX_STOP_ALERT_CONF_NO_INPUT_PHONENUMBER",'You have not input phone number yet to alert');
    DEFINE("EX_STOP_ALERT_CONF_SENDTIMES_FAIL",'Number of message sending is not equal to zero');
    DEFINE("EX_STOP_ALERT_CONF_TIME_BETWEEN_2_SENDTIMES",'Time between two sendings is not equal to zero');
   
    DEFINE("EX_STOP_ALERT_CONF_INFO_NOT_EXIST",'Configuration information is inexistent ');
    // ///////* Phuong : 21/03/2011 :Cabin doors status report
    DEFINE("REPORT_OPENDOOR_CABIN_HEADER", "CABIN DOOR OPEN REPORT");
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_USER", "Account"); 
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_DEVICE", "Vehicle"); 
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_LOCATION_TYPE", "Type of location"); 
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_FROMDATE", "From");
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_TODATE", "To");

    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_ORDER", "No.");
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_GRID_OPENBOX", "Open door");
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_GRID_DURATION", "Time");
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_GRID_LOCATION", "Location");
    DEFINE("REPORT_OPENDOOR_CABIN_TITLE_GRID_TOTAL", "Total");
    
    /////////* Phuong : 21/03/2011 :Crane, pump, side/back door and mixing report
    DEFINE("REPORT_OPENDOOR_BOX_HEADER", "CRANE, TIP, TANK, PUMP AND PAIL OF GOODS REPORT");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_USER", "Account"); 
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_DEVICE", "Vehicle"); 
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_LOCATION_TYPE", "Type of location"); 
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_FROMDATE", "From");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_TODATE", "To");

    DEFINE("REPORT_OPENDOOR_BOX_TITLE_ORDER", "No.");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_GRID_OPENBOX", "Start Time");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_GRID_STATUS", "Status");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_GRID_DURATION", "Time");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_GRID_LOCATION", "Location");
    DEFINE("REPORT_OPENDOOR_BOX_TITLE_GRID_TOTAL", "Total");

    /////////* Phuong : 21/03/2011 :End-ex_stop_alert_conf
    DEFINE("STR_LANDMARK_TYPE","Type of location");
   /////////* Phuong : 21/03/2011 :Start-faq
    DEFINE("FAQ_FAIL",'Have an error when deleting user. Please inform to a administrator');
    /////////* Phuong : 21/03/2011 :End-faq
    
    /////////* Phuong : 21/03/2011 :Start-feedback
    DEFINE("FEEDBACK_LETTER",'Feedback is already sent.');
    /////////* Phuong : 21/03/2011 :End-feedback
    
    /////////* Phuong : 21/03/2011 :Start-forgotpass
    DEFINE("FORGOTPASS_PLS_INPUT_CORRET_PASS",'Please input correct password');
    DEFINE("FORGOTPASS_NOTE","You just made a request of password retrieval on the www.chuyennhat.vn <br>
    Please login with a new password.<br>
    New password:");
    DEFINE("FORGOTPASS_SENDMAIL_SUCCESS",'Email is already sent to {0}, please check the email and follow the instruction!');
    DEFINE("FORGOTPASS_SENDMAIL_FAIL",'Cannot send email');
    /////////* Phuong : 21/03/2011 :End-forgotpass
        
    /////////* Phuong : 21/03/2011 :Start-man_pay_device
    DEFINE("MAN_PAY_DEVICE_TITLE_SAVEACTIONLOG","UpdatingUpdating expiry date of payment");       
    /////////* Phuong : 21/03/2011 :End-man_pay_device
    
    /////////* Phuong : 21/03/2011 :Start-location_report
    DEFINE("LOCATION_REPORT_TITLE","Out and in geo-fence report");
    DEFINE("LOCATION_REPORT_TITLE_SELECTALL_DEVICE","All");
    DEFINE("LOCATION_REPORT_TITLE_TIME_IN","Time is in");
    DEFINE("LOCATION_REPORT_TITLE_TIME_OUT","Time id Out");
    DEFINE("LOCATION_REPORT_TITLE_GROUP_1","Group 1");
    DEFINE("LOCATION_REPORT_TITLE_GROUP_2","Group 2");     
    /////////* Phuong : 21/03/2011 :End-location_report
    
    /////////* Phuong : 21/03/2011 :Start-landmark
    DEFINE("LANDMARK_TITLE","LOCATION REPORT");     
    DEFINE("LANDMARK_TITLE_DISTANCE","Distance (km)");     
    DEFINE("LANDMARK_TITLE_SPEED","Average speed (km/h)");     
    DEFINE("LANDMARK_TITLE_TOTAL_DURATION","Total of time (hour)");    
    /////////* Phuong : 21/03/2011 :End-landmark
    
    /////////* Phuong : 21/03/2011 :Start-greport
    DEFINE("GREPORT_TITLE","GENERAL REPORT"); 
    DEFINE("GREPORT_TITLE_RUN_TIME","Running time ");
    DEFINE("GREPORT_TITLE_STOP_TIME","Stop Time ");
    DEFINE("GREPORT_TITLE_TOTAL_TIME","Total of time ");    
    DEFINE("GREPORT_TITLE_MOVE_PERCENT","Running(%)");    
    DEFINE("GREPORT_TITLE_AVG_SPEED","Average speed (km/h)");    
    DEFINE("GREPORT_TITLE_DISTANCE","Stretch of road (km)");    
    DEFINE("GREPORT_TITLE_FUELNORM","Fuel (liter)");    
    DEFINE("GREPORT_TITLE_GROUP_1","Group 1");
    DEFINE("GREPORT_TITLE_GROUP_2","Group 2");     
    /////////* Phuong : 21/03/2011 :End-greport
    
    /////////* Phuong : 21/03/2011 :Start-general_day 
    
    DEFINE("GENERAL_DAY_TITLE","GENERAL REPORT FOWLLOWING DATE");
    DEFINE("GENERAL_DAY_TITLE_DAY","Day");
    DEFINE("GENERAL_DAY_TITLE_RUN_TIME","Running time");
    DEFINE("GENERAL_DAY_TITLE_STOP_TIME","Stop time");
    DEFINE("GENERAL_DAY_TITLE_DISTANCE","Distance");
    DEFINE("GENERAL_DAY_TITLE_FUEL","Fuel (liter)");
    DEFINE("GENERAL_DAY_TITLE_TOTAL_TIME","Total of time");
    DEFINE("GENERAL_DAY_TITLE_FILE_NAME","Closing - opening door report.xls");
    DEFINE("GENERAL_DAY_TITLE_GROUP_1","Group 1");
    DEFINE("GENERAL_DAY_TITLE_GROUP_2","Group 2");
    DEFINE("GENERAL_DAY_TITLE_GPSTIMELOST","GPS lost signal time");  
    DEFINE("GENERAL_DAY_TITLE_GPRSTIMELOST","GPRS lost signal time");        
    /////////* Phuong : 21/03/2011 :End-general_day 
    
    /////////* Phuong : 21/03/2011 :Start-fuel_alert_conf
    DEFINE("FUEL_ALERT_CONF_TITLE_LIMIT","Lost ratio (liter)");      
    DEFINE("FUEL_ALERT_CONF_TITLE_MAXTIME","Max time (minute) ");      
    DEFINE("FUEL_ALERT_CONF_TITLE_MINTIME","Min time (minute) ");      
    DEFINE("FUEL_ALERT_CONF_TITLE_EDIT_CONF","Updating this configuration");      
    DEFINE("FUEL_ALERT_CONF_TITLE_DELETE_CONF","Deleting this configuration");      
    DEFINE("FUEL_ALERT_CONF_MSG_NOT_SELECT_DEVICE","You have not selected device to configure ");      
    DEFINE("FUEL_ALERT_CONF_MSG_FUEL_LIMIT_0","Lost ratio is not equal to zero");      
    DEFINE("FUEL_ALERT_CONF_MSG_INPUT_PHONE","You have not input phone number to alert ");      
    DEFINE("FUEL_ALERT_CONF_MSG_COMPARE_MAX_MIN","Max time is not less than min time");    
    DEFINE("FUEL_ALERT_CONF_MSG_COMPARE_MIN_19","Min time is not more than 19 minutes ");
    DEFINE("FUEL_ALERT_CONF_MSG_NOT_SELECT_DEVICE_DELETE","You have not selected a device to delete");             
    DEFINE("FUEL_ALERT_CONF_MSG_NOT_SELECT_CONF","You have not selected configuration to delete");             
    DEFINE("FUEL_ALERT_CONF_MSG_NOT_EXISTS_CONF","Configuration is inexist");            
    ////////* Phuong : 21/03/2011 :/End-fuel_alert_conf
    
    DEFINE("STR_UNDEFINED_NAME","Operating");
    DEFINE("STR_UNDEFINED","Normal");
    
    // SOS
    DEFINE("STR_SOS_ON","ON");
    DEFINE("STR_SOS_OFF","OFF");
    
        //trang thái xe
    DEFINE("STR_CAR_RUN","Run");
    DEFINE("STR_CAR_STOP","Stop");
    DEFINE("STR_CAR_ADDRESS_IN","in location");
    DEFINE("STR_CAR_ADDRESS_OUT","out location");
    
    ////////* Phuong : 21/03/2011 :/ 1. 
    DEFINE("STR_Turn_Car", "Concrete-mixer truck"); 
    DEFINE("STR_Turn_Name", "Tank"); 
    DEFINE("STR_Turn", "Tank mixing");
    DEFINE("STR_Turn_Against", "Tank exhaust ");
    DEFINE("STR_Turn_no", "Tank stop");
        
    ////////* Phuong : 21/03/2011 :/ 2.Pour Car 
    DEFINE("STR_Pour_Car", "Cement truck"); 
    DEFINE("STR_Pour_Name", "Operating");
    DEFINE("STR_Pour", "Exhaust");
    DEFINE("STR_Pour_no", "No exhaust");
        
    // ///////* Phuong : 21/03/2011 :3. Pump Car
    DEFINE("STR_Pump_Car", "Concrete-pumper truck"); 
    DEFINE("STR_Pump_Name", "Operating");
    DEFINE("STR_Pump", "Pump");
    DEFINE("STR_Pump_no", "No pump");
                                             
    /////////* Phuong : 21/03/2011 : 4. Ben Car
    DEFINE("STR_Ben_Car", "Tip truck"); 
    DEFINE("STR_Ben_Name", "Tip");
    DEFINE("STR_Ben", "Tip up");
    DEFINE("STR_Ben_no", "Tip down");
    
    // ///////* Phuong : 21/03/2011 :5. Crane Car
    DEFINE("STR_Crane_Car", "Crane truck");
    DEFINE("STR_Crane_Name", "Crane");
    DEFINE("STR_Crane_Truck", "Crane");
    DEFINE("STR_Crane_Truck_no", "No crane");

    // ///////* Phuong : 21/03/2011 :6. Truck Car    
    DEFINE("STR_Truck_Car", "Box truck");
    DEFINE("STR_Truck_Name", "Operating");
    DEFINE("STR_Truck", "Goods box open ");
    DEFINE("STR_Truck_no", "Goods box close ");
    
    // 6. Xe cabin  
    DEFINE("STR_CABIN", "open");
    DEFINE("STR_CABIN_NO", "close");
    
    /////////* Phuong : 21/03/2011 : 7. Car
    DEFINE("STR_Bon_Car", "Tank truck");
    DEFINE("STR_Bon_Name", "Tank");
    DEFINE("STR_Bon", "Exhaust goods");
    DEFINE("STR_Bon_no", "Valse close");
    
        // 9. Xe Thung lạnh
    DEFINE("STR_Refrigerator_Car", "Refrigerator cars");
    DEFINE("STR_Refrigerator_Name", "Temperature");
    
    /////////* Phuong : 21/03/2011 :Start-Maps
    DEFINE("STR_NO_GPRS","Lost GPRS");
    DEFINE("STR_STOP","Stop");
    DEFINE('STR_NO_GPS', 'Lost GPS');
    DEFINE('STR_RUN', 'Running');
    
    //DEFINE('STR_BUFFERING', 'Log transferring');
    
    DEFINE("POWER_OFF", 'Power off');
    DEFINE('POWER_LOW', 'Low power');
    DEFINE('POWER_NORMAL', 'Normal');
    DEFINE('POWER_BATTERY', 'Using battery');       // Trạng thái đang dùng Pin DF220
    /////////* Phuong : 21/03/2011 :End-Maps
    
    /////////* Phuong : 21/03/2011 : Loai phuong tien
        $arrCarTypesName = array('Concrete-mixer truck', 'Cement truck', 'Concrete-pumper truck', 'Tipper truck', 'Crane truck', 'Box truck', 'Tank truck','Refrigerator cars');
            
    /////////* Phuong : 21/03/2011 :Start-Format data type for Grid
    DEFINE('FORMAT_DATETIME_SHORT', 'yyyy-mm-dd');
    DEFINE('FORMAT_DATETIME_SHORT_EXCEL', 'Y-m-d');
    
    DEFINE('FORMAT_DATETIME_LONG', 'yyyy-mm-dd hh:nn:ss');
    DEFINE('FORMAT_DATETIME_LONG_EXC', 'd-m-Y');
    DEFINE('FORMAT_HOUR_EXCEL', '2');
    
    DEFINE('FORMAT_FUEL', '0,000.0');
    DEFINE('FORMAT_FUEL_EXCEL', '1');
    
    DEFINE('FORMAT_KM', '0,000.00');
    DEFINE('FORMAT_KM_EXCEL', '2');
    
    DEFINE('FORMAT_SPEED', '0,000.0');
    DEFINE('FORMAT_SPEED_EXCEL', '1');
    
    DEFINE('FORMAT_AMOUNT', '0,000.00');
    DEFINE('FORMAT_AMOUNT_EXCEL', '2');
    
    DEFINE('FORMAT_PERCENT', '0');;
    DEFINE('FORMAT_PERCENT_EXCEL', '0');
    
    DEFINE('FORMAT_LONGITUDE', '0.00000');
    DEFINE('FORMAT_LONGITUDE_EXCEL', '5');
    
    DEFINE('FORMAT_LATITUDE', '0.00000');
    DEFINE('FORMAT_LATITUDE_EXCEL', '5');
      
    DEFINE('FORMAT_TEMPERATURE', '0,000.');
    DEFINE('FORMAT_TEMPERATURE_EXCEL', '0');
    /////////* Phuong : 21/03/2011 :End-Format data type for Grid
    
    /////////* Phuong : 21/03/2011 :Start-File Excel
    DEFINE('EXCEL_PREFIX', 'ada_');
    
    DEFINE('EXCEL_REPLY_LIST', 'ReplyList');
    DEFINE('EXCEL_R_GENERAL', 'ReportGeneral');
    DEFINE('EXCEL_LAND_MARK', 'LandMarkReport');
    DEFINE('EXCEL_REPORT_GPS', 'gps_lost_signal_report_');
    DEFINE('EXCEL_GENERAL_DAY', 'GeneralByDayReport');
    DEFINE('EXCEL_ACTIVE_DAY', 'ActiveByDayReport');
    DEFINE('EXCEL_SPEED_REPORT', 'SpeedReport');
    DEFINE('EXCEL_ACTIVE_LOC', 'ActiveLocationReport');
    DEFINE('EXCEL_DEVICE_GENERAL_CARTYPE', 'vihicle_group_general_report_');
    DEFINE('EXCEL_ALERT_REPORT', 'alert_report_');//EXCEL_ROUT_GENERAL_REPORT 
    DEFINE('EXCEL_ROUT_GENERAL_REPORT', 'route_general_report_');
    DEFINE('EXCEL_SUM_MESSAGE_REPORT', 'SumalertMessageReport');
    DEFINE('EXCEL_SUMALERT_GENARAL_REPORT', 'SumalertGeneralReport');   
    DEFINE('EXCEL_INFOR_DEVICE_REPORT', 'InformationsDeviceReport'); 
    DEFINE('EXCEL_EXPIRED_DRIVER_REPORT', 'ExpiredDriverReport');
    DEFINE('EXCEL_CHANGE_lICENSE_DRIVER_REPORT', 'ChangLicenseDriverReport');
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_HEADER", "RENEW DRIVE LICENSE HISTORY REPORT");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_TITLE_USER", "Account");       
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_TITLE_DRIVER", "Driver"); 
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_ORDER", "No.");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_GRID_DRIVER", "Driver");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_GRID_LICENSE_TYPE", "Drive license type");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_GRID_DATE_REGISTRY", "Issued date");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_GRID_DATE_EXPIR", "Expiry date");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_GRID_DESC", "Comment");
    DEFINE("REPORT_CHANGE_lICENSE_DRIVER_GRID_IS_EXTENTION", "Renewed");
    DEFINE("EXCEL_CHANGE_HISTORY_STATUS_REPORT", "StatusHistoryReport");
    DEFINE("EXCEL_ADDRESS_DETAIL_REPORT", "detail_outside/inside_geo-fence_report_");
    DEFINE("EXCEL_ADDRESS_GENERAL_REPORT", "general_outside/inside_geo-fence_report_");
    DEFINE("EXCEL_REPORT_STOP", "StoppingPositionDetailReport");
    DEFINE("EXCEL_REPORT_STOP_GENERAL", "StoppingPositionGeneralReport");
    DEFINE("EXCEL_REPORT_PAY_DEVICE_ALL", "DevicePaymentGeneralReport");  
    
    /////////* Phuong : 21/03/2011 :END-File Excel
    /////////* Phuong : 21/03/2011 :START set constant to number
    DEFINE("TO_DAY","To day");  
    /////////* Phuong : 21/03/2011 : END set constant to number
    
    /////////* Phuong : 21/03/2011 : Alarm from device report
    define('STR_DEVICE', 'Device');
    define('STR_ALARM', 'Type of alert');
    define('STR_REPORT_ALARMS', 'Alert report from device');
    define('STR_REPORT_ALARMS_EXCEL', 'AlertReportFromDevice');
    define('STR_ALARM_TIME', 'Alert period');
    define('STR_ALARM_PRESENT', 'Present status');
    define('STR_ALARM_LOCATION','Start-alert location ');
    define('STR_ALARM_TITLE_EXCEL','alert_device_report_');
    
    //define('STR_ALL', 'All');
    define('ALARM_01', 'Low power');
    define('ALARM_02', 'Power lost');
    define('ALARM_03', 'Power On');
    
    define('STR_SIGNAL_TIME', 'Lost signal');
    DEFINE("STR_GPS", "Lost GPS");
     
    /////////* Phuong : 21/03/2011 :Insurance expire date report    
    DEFINE("REPORT_INSURANCE_OUTOFDATE_HEADER", "INSURANCE EXPIRY DATE REPORT");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_DEVICE", "Vehicle");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_TYPE", "Type of insurance");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_TODATE", "To");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_ORDER", "No.");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_CONTRACT", "Contract No.");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_COMPANY", "Insurance company");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_CONT", "Contact");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_DATE_BUY", "Insurance-buying date");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_DATE_OUT", "Insurance expiry date");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_FREE", "Insurance amount (vnd)");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_ALERT", "Alert period");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_NOTE", "Comment");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_RENEVAL", "Renewed");
    DEFINE("REPORT_INSURANCE_OUTOFDATE_FILE_EXCEL", "insurance_expire_date_report"); 
    /////////* Phuong : 21/03/2011 :End Insurance expire date report
    
    //Phuong add: insurence_index
    DEFINE("INSURANCE_INDEX_NAME_EXIST","Type of insurance is already existed.");
    DEFINE("INSURANCE_INDEX_TITLE","INSURANCE LIST");
    DEFINE("INSURANCE_INDEX_NO_SELECT","Not object selected to delete.");
    DEFINE("INSURANCE_INDEX_MAX_PAY","Max compensated amount (vnd)");     
    //End    Phuong add: insurence_index 
    
        //Phuong add: insurence_info
    DEFINE("INSURANCE_INFO_NAME_EXIST","Name of type is already existed.");
    DEFINE("INSURANCE_INFO_TITLE","INSURANCE INFORMATION");
    DEFINE("INSURANCE_INFO_NO_SELECT","Not object selected to delete.");
    DEFINE("INSURANCE_INFO_SELECT","-- Select --");
    DEFINE("INSURANCE_INFO_PRODUCTBY_EXIST","Supplier's contract no. is already existed.");     
    //End    Phuong add: insurence_info 
    
    /////////* Phuong : 21/03/2011 :maintain_outofdate_report 
    DEFINE("REPORT_MAINTAIN_ALERT_TITLE", "Maintenance expiry");   
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_HEADER", "MAINTENANCE EXPIRY DATE REPORT");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_DEVICE", "Vehicle");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_TYPE", "Type of maintenance");
    DEFINE("REPORT_MAINTAIN_DESCRIPTION", "Description");
    DEFINE("REPORT_MAINTAIN_SELECT_TYPE", "-- Select --");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_TODATE", "To");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_ORDER", "No.");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_INSTAN_KM", "Current km number (km)");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_COMPANY", "Maintenance company");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_CONF_KM", "Km norm (km)");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_DATE", "Maintenance date");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_DATE_NEXT", "Next maintaining date");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_FREE", "Insurance amount (vnd)");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_ALERT", "Alert period");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_NOTE", "Comment");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_RENEVAL", "Renewed");
    DEFINE("REPORT_MAINTAIN_OUTOFDATE_FILE_EXCEL", 'maintenance_expired_report_to_date');
    
    DEFINE("REPORT_MAINTAIN_DECRIPTION", "Maintenance description");
    DEFINE("REPORT_MAINTAIN_CONF_HOURS", "Hour norm (hour)");
    DEFINE("REPORT_MAINTAIN_ALARM_KM", "Alert before (km)"); 
    /////////* Phuong : 21/03/2011 :End maintain_outofdate_report
    
    /////////* Phuong : 21/03/2011 :insurance_process_report
    DEFINE("REPORT_INSURANCE_ALERT_TITLE", "Insurance expiry");    
    DEFINE("REPORT_INSURANCE_PROCESS_HEADER", "INSURANCE HISTORY REPORT");
    DEFINE("REPORT_INSURANCE_PROCESS_DEVICE", "Vehicle");
    DEFINE("REPORT_INSURANCE_PROCESS_TYPE", "Type of insurance");
    DEFINE("REPORT_INSURANCE_PROCESS_FROMDATE", "From");
    DEFINE("REPORT_INSURANCE_PROCESS_TODATE", "To");
    DEFINE("REPORT_INSURANCE_PROCESS_ORDER", "No.");
    DEFINE("REPORT_INSURANCE_PROCESS_CONTRACT", "Contract No.");
    DEFINE("REPORT_INSURANCE_PROCESS_COMPANY", "Insurance company");
    DEFINE("REPORT_INSURANCE_PROCESS_CONT", "Contact");

    DEFINE("REPORT_INSURANCE_PROCESS_DATE_BUY", "Insurance from");
    DEFINE("REPORT_INSURANCE_PROCESS_DATE_OUT", "Insurance expiry date"); 
    DEFINE("REPORT_INSURANCE_PROCESS_FREE", "Amount (vnd)");

    //DEFINE("REPORT_INSURANCE_PROCESS_DATE_BUY", "Insurance-buying date");
//    DEFINE("REPORT_INSURANCE_PROCESS_DATE_OUT", "Insurance-expired date"); 
//    DEFINE("REPORT_INSURANCE_PROCESS_FREE", "Insurance fee (vnd)");

    DEFINE("REPORT_INSURANCE_PROCESS_ALERT", "Process alert (day)");
    DEFINE("REPORT_INSURANCE_PROCESS_NOTE", "Comment");
    DEFINE("REPORT_INSURANCE_PROCESS_RENEVAL", "Renewed");
    /////////* Phuong : 21/03/2011 :insurance_process_report 
    
    /////////* Phuong : 21/03/2011 :maintain_process_report    
    DEFINE("REPORT_MAINTAIN_PROCESS_HEADER", "MAINTENANCE HISTORY REPORT");
    DEFINE("REPORT_MAINTAIN_PROCESS_DEVICE", "Vehicle");
    DEFINE("REPORT_MAINTAIN_PROCESS_TYPE", "Type of maintenance");
    DEFINE("REPORT_MAINTAIN_PROCESS_FROMDATE", "From");
    DEFINE("REPORT_MAINTAIN_PROCESS_TODATE", "To");
    DEFINE("REPORT_MAINTAIN_PROCESS_TODATE_EXCEL", "_to_date");
    DEFINE("REPORT_MAINTAIN_PROCESS_ORDER", "No.");
    DEFINE("REPORT_MAINTAIN_PROCESS_INSTAN_KM", "Current km number (km)");
    DEFINE("REPORT_MAINTAIN_PROCESS_COMPANY", "Insurance company");
    DEFINE("REPORT_MAINTAIN_PROCESS_CONF_KM", "Km norm (km)");
    DEFINE("REPORT_MAINTAIN_PROCESS_DATE", "Maintenance date");
    DEFINE("REPORT_MAINTAIN_PROCESS_DATE_NEXT", "Next maintaining date");
    DEFINE("REPORT_MAINTAIN_PROCESS_FREE", "Insurance amount");
    DEFINE("REPORT_MAINTAIN_PROCESS_ALERT", "Alert period");
    DEFINE("REPORT_MAINTAIN_PROCESS_NOTE", "Comment");
    DEFINE("REPORT_MAINTAIN_PROCESS_RENEVAL", "Renewed");
    DEFINE("REPORT_MAINTAIN_PROCESS_FILE_EXCEL", 'maintenance_history_report_from_date:');
    /////////* Phuong : 21/03/2011 :End bao cao quá trình bảo trì
    
    /////////* Phuong : 21/03/2011 :Start maintain_process_report  
    DEFINE("MAN_PAY_DEVICE_ADDBY", "Added by");
    DEFINE("MAN_PAY_DEVICE_PAYDATE", "Payment date"); 
    DEFINE("MAN_PAY_DEVICE_TITLE", "DEVICE PAYMENT MANAGEMENT");
    DEFINE("MAN_PAY_DEVICE_EXCEL_TITLE", "DevicePaymentManagement");     
    /////////* Phuong : 21/03/2011 :End maintain_process_report   
    
    //////////**Phuong: Driver scheduler ////////////
//     DEFINE("MAN_DRIVER_SCHEDULER_ALARM_UPDATE", "This driver has been assigned. please select other driver!");
     DEFINE("MAN_DRIVER_SCHEDULER_RUN_TIME", "Run time");
     DEFINE("MAN_DRIVER_SCHEDULER_STOP_TIME", "Stop time");
     DEFINE("MAN_DRIVER_SCHEDULER_ALARM_UPDATE", "Driver is updated. Please select other one!");
     //////////**Phuong: End Driver scheduler ////////////  
     //////////**Phuong:new tech ////////////
     DEFINE("NEWTECH_NOT_FEATURES", "Not feature selected."); 
     DEFINE("NEWTECH_TITLE_FEATURES_EXIST", "Vietnamese title of feature has already existed."); 
     DEFINE("NEWTECH_TITLE_EN_FEATURES_EXIST", "English title of feature has already existed.");   
     //////////**Phuong: new tech ////////////
     //////////**Phuong:menu list //////////// 
     DEFINE("MENU_TITLE_VI_EXIST", "Vietnamese index name has already existed ");
     DEFINE("MENU_TITLE_EN_EXIST", "English index name has already exist!");
     DEFINE("MENU_TITLE_FATHERLIST_EXIST", "Parent index name has already existed"); 
     DEFINE("MENU_LIST_NOT_EXIST", "Index name has not been found ");  
     //////////**Phuong:end menu list ////////////  
     DEFINE("DRIVER_GROUP_NAME_EXIST", "Driver group name has already existed.");
     DEFINE("DRIVER_GROUP_NAME_NO_EXIST", "Driver information has not been found!"); 
          ////****phuong: man pay device/////////
     DEFINE("MAN_PAY_DEVICE_TYPE", "Vehicle type");
     DEFINE("MAN_PAY_DEVICE_CREATEBY", "Added by"); 
     DEFINE("MAN_PAY_DEVICE_STORE", "Store"); 
     DEFINE("MAN_PAY_DEVICE_DATE_PAY", "Payment day");  
     ////*** end man pay device ///////////////////
     
     ///********quan ly tai xe ******/////////////
     //DEFINE("DRIVER_MANAGERMENT_DIVER_EXIST","TheDriver has been existed (Driver name, account name and rfid_tag duplicated) ");
     //DEFINE("DRIVER_MANAGERMENT_DIVER_NOT_EXIST ","Driver is not found. ");
     //DEFINE("DRIVER_MANAGERMENT_NO_SELECT","Cannot select a driver to delete. ");
     ///********quan ly tai xe ******/////////////

     
     ////////* Phuong: driver overtime *********////////////////////////////////
     DEFINE("DRIVER_OVERTIME_START_TIME","Start time" );
     DEFINE("DRIVER_OVERTIME_END_TIME","End time" );
     DEFINE("DRIVER_OVERTIME_OVERTIME","Overtime" );
     DEFINE("DRIVER_OVERTIME_START_ROUTE","Start route");
     DEFINE("DRIVER_OVERTIME_END_ROUTE","End route");
     DEFINE("DRIVER_OVERTIME_TOTAL","Total");
     DEFINE("DRIVER_OVERTIME_TIME","time"); 
     DEFINE("DRIVER_OVERTIME_DRIVER","Driver");
     DEFINE("DRIVER_OVERTIME_SPEED","Speed");
     DEFINE("DRIVER_OVERTIME_REPORT_TITLE","Driver over time report");
     DEFINE("BREAKDOWN_REPORT_FILENAME_EXCEL","Driver_over_time_report_from_");
     DEFINE("BREAKDOWN_TITLE_EXCEL","TRACKING VEHICLE REPORT");
     DEFINE("BREAKDOWN_REPORT_FILENAME_EXCEL_TO","_to_");  
     DEFINE("BREAKDOWN_REPORT_NOT_SELECT","Not report selected.");      
     ////////* Phuong: end driver overtime *********////////////////////////////

     
     ////////* Phuong: breakdown *********////////////////////////////////
      DEFINE("BREAKDOWN_ORDER","No.");
      DEFINE("BREAKDOWN_DATE","Reported date");
      DEFINE("BREAKDOWN_DEVICE","Vehicle");
      DEFINE("BREAKDOWN_SERIAL","IMEI number");
      DEFINE("BREAKDOWN_ACCOUNT","Account");
      DEFINE("BREAKDOWN_TIME","Event date time");
      DEFINE("BREAKDOWN_END_TIME","Ending date time");
      DEFINE("BREAKDOWN_EVENT","Event");
      DEFINE("BREAKDOWN_CREATE_ACCOUNT","Created account");
      DEFINE("BREAKDOWN_REMARK","Comment");
//      DEFINE("INDEX_SUPPORT_TITLE","Tech. support");
//      DEFINE("INDEX_SUPPORT_HN","Ha Noi");
//      DEFINE("INDEX_SUPPORT_DN","Da Nang");        
      ////////* Phuong: end breakdown *********////////////////////////////////

     //Phuc Start báo cáo tổng hợp vi phạm phương tiện
     DEFINE("DEV_SUM_ALERT_GENERAL_TITLE","VIOLENCE VEHICLE GENERAL REPORT" );
     DEFINE("DEV_SUM_ALERT_GENERAL_FROM","From" );
     DEFINE("DEV_SUM_ALERT_GENERAL_TO","To" );
     DEFINE("DEV_SUM_ALERT_GENERAL_ALERT_TYPE","Type of alert");
     DEFINE("DEV_SUM_ALERT_GENERAL_VEHICLE","Vehicle");
     DEFINE("DEV_SUM_ALERT_GENERAL_LIMIT","Limit");
     DEFINE("DEV_SUM_ALERT_GENERAL_SERRVER_TIME","Server date time"); 
     DEFINE("DEV_SUM_ALERT_GENERAL_DEVICE_TIME","Device date time");
     DEFINE("DEV_SUM_ALERT_GENERAL_ALL","All");
     DEFINE("DEV_SUM_ALERT_GENERAL_STT","No.");

    //Phuc End báo cáo tổng hợp vi phạm phương tiện 
                  
    ///////////*Phuong: Index and default////////////////////////////////////
      DEFINE("INDEX_TRACKING","Tracking");
      DEFINE("INDEX_REVIEW","Review");
      DEFINE("INDEX_HOME","Home");
      DEFINE("INDEX_WELLCOM","User");
      DEFINE("INDEX_LOGOUT","Logout");
      DEFINE("INDEX_ASSIGN","Assign");
      DEFINE("INDEX_PERSONAL","Personal");      
      DEFINE("INDEX_SUPPORT_TITLE","Tech. support");
      DEFINE("INDEX_SUPPORT_HN","Ha Noi");
      DEFINE("INDEX_SUPPORT_DN","Da Nang");     
      ///////////*Phuong: end Index and default////////////////////////////////
      
      //////*phuong: Report history status ////////////////////////////////////
      DEFINE("REPORT_HISTORY_STATUS_TITLE_EXCEL",'STATUS HISTORY REPORT' );
      DEFINE("REPORT_HISTORY_START_POSISION",'Start point' );
      DEFINE("REPORT_HISTORY_END_POSISION",'End point' );
      //////*phuong: End Report history status ////////////////////////////////////
      
      ///////*phuong: r_register_history //////////////////////////////////////////
      DEFINE("R_REGISTER_HISTORY_NO","Registered No.");
      DEFINE("R_REGISTER_HISTORY_BY","Registered company"); 
      DEFINE("R_REGISTER_HISTORY_DATE","Registered date");
      DEFINE("R_REGISTER_HISTORY_EXPIRE","Expiry date");
      DEFINE("R_REGISTER_HISTORY_REGISTERED","Registered");   
      DEFINE("R_REGISTER_HISTORY_AMOUNT","Amount (vnd)");
      DEFINE("R_REGISTER_HISTORY_REMARK","Comment");
      DEFINE("R_REGISTER_HISTORY_EXCEL_TITLE","REGISTERED HISTORY REPORT");
      DEFINE("R_REGISTER_HISTORY_FILE_EXCEL","Registered_history_report_");
      ///////*phuong: end r_register_history //////////////////////////////////////////
      
      ///////*phuong: r_register_EXPIRATION //////////////////////////////////////////
      DEFINE("REPORT_REGISTER_ALERT_TITLE", "Registered expiry");    
      DEFINE("R_REGISTER_EXPIRATION_NO","Registered No.");
      DEFINE("R_REGISTER_EXPIRATION_BY","Registered company"); 
      DEFINE("R_REGISTER_EXPIRATION_DATE","Registered date");
      DEFINE("R_REGISTER_EXPIRATION_EXPIRE","Expiry date");        
      DEFINE("R_REGISTER_EXPIRATION_REGISTERED","Registered");   
      DEFINE("R_REGISTER_EXPIRATION_AMOUNT","Amount (vnd)");
      DEFINE("R_REGISTER_EXPIRATION_EXCEL_TITLE","REGISTER EXPIRY DATE REPORT");
      DEFINE("R_REGISTER_EXPIRATION_FILE_EXCEL","Registered_history_report_");
      DEFINE("R_REGISTER_EXPIRATION_REMAIN_DAY","Remain day");
      ///////*phuong: end r_register_EXPIRATION //////////////////////////////////////////
      
      //////*phuong: F_FEE //////////////////////////////////////////////////////
      DEFINE("F_FEE_TYPE","Type of cost");
      DEFINE("F_FEE_AMOUNT","Amount (vnd)");
      DEFINE("F_FEE_REMARK","Comment"); 
      DEFINE("F_FEE_DEVICE_OWNER_PAID","Vehicle owner paid");
      DEFINE("F_FEE_DEVICE_OWNER_PAID_DRIVER","Driver paid");
      DEFINE("F_FEE_DEVICE_TITLE_EXCEL",'EXPENSE REPORT');
      DEFINE("F_FEE_DEVICE_FILE_EXCEL","Cost_managerment_");            
      DEFINE("F_FEE_STREET","Parking and traffic fee"); 
      /////*phuong:end F_FEE ////////////////////////////////////////////////////

    //Phuc End báo cáo tổng hợp vi phạm phương tiện
    //Phuc Start báo cáo tổng hợp vi phạm phương tiện
     DEFINE("ALERT_REPORT_TITLE","ALERT REPORT" );
     DEFINE("ALERT_REPORT_TIME","Time"); 
     DEFINE("ALERT_REPORT_CONTENT","Content");
     DEFINE("ALERT_REPORT_PHONE","Cell phone");
    //Phuc End báo cáo tổng hợp vi phạm phương tiện                              

   //Phuc Start báo cáo tổng hợp ra vao vung
     DEFINE("ADDRESS_GENERAL_REPORT_TITLE","GENERAL OUTSIDE/INSIDE GEO-FENCE REPORT" );
     DEFINE("ADDRESS_GENERAL_REPORT_DEVNAME","Vehicle");
     DEFINE("ADDRESS_GENERAL_REPORT_USER","Account");  
     DEFINE("ADDRESS_GENERAL_REPORT_ADDRESS","Type of location");    
     DEFINE("ADDRESS_GENERAL_REPORT_IN_TIME","Incoming times");
     DEFINE("ADDRESS_GENERAL_REPORT_OUT_TIME","Outgoing times");
     DEFINE("ADDRESS_GENERAL_REPORT_DURATION_TIME","Total staying time"); 
     DEFINE("ADDRESS_GENERAL_REPORT_STOPPING_TIME","Stop time"); 
     DEFINE("ADDRESS_GENERAL_REPORT_MINUTE","minute(s)"); 
     DEFINE("ADDRESS_GENERAL_REPORT_TOTAL","Total"); 
     DEFINE("ADDRESS_GENERAL_REPORT_DATE","date-");
     DEFINE("ADDRESS_GENERAL_REPORT_HOUR","h-");
     DEFINE("ADDRESS_GENERAL_REPORT_M","m");                           
    //Phuc End báo cáo tổng hợp ra vao vung F
    
      //Phuc Start báo cáo chi tiet ra vao vung General outside/inside geo-fence report GEO-FENCE DETAIL REPORT
     DEFINE("ADDRESS_DETAIL_REPORT_TITLE","DETAIL OUTSIDE/INSIDE GEO-FENCE REPORT");
     DEFINE("ADDRESS_DETAIL_REPORT_IN_TIME","Incoming date time");
     DEFINE("ADDRESS_DETAIL_REPORT_OUT_TIME","Outgoing date time");
     DEFINE("ADDRESS_DETAIL_REPORT_TIMES","times");
     DEFINE("ADDRESS_DETAIL_NO_OUT","No get out location"); 
    //Phuc End báo cáo chi tiet ra vao vung
    
    //Phuc Start báo cáo chi tiet diem dung
     DEFINE("STOPPING_DETAIL_REPORT_TITLE","STOPPING POSITION DETAIL REPORT" );
     DEFINE("STOPPING_DETAIL_REPORT_FROM","From");
     DEFINE("STOPPING_DETAIL_REPORT_TO","To");
     DEFINE("STOPPING_DETAIL_REPORT_STOP_LONG","Long stop");
     DEFINE("STOPPING_DETAIL_REPORT_STATUS","Status"); 
     DEFINE("STOPPING_DETAIL_REPORT_M_STATUS","Machine status");       
     DEFINE("STOPPING_DETAIL_REPORT_SELECT_DEVICE","Select"); 
     DEFINE("STOPPING_DETAIL_REPORT_ON","On");
     DEFINE("STOPPING_DETAIL_REPORT_OFF","Off");
     DEFINE("STOPPING_DETAIL_REPORT_ENGINE_ON","Engine on");
     DEFINE("STOPPING_DETAIL_REPORT_ENGINE_OFF","Engine off"); 
     DEFINE("STOPPING_DETAIL_REPORT_XXX_ON"," on");
     DEFINE("STOPPING_DETAIL_REPORT_XXX_OFF"," off");
     DEFINE("STOPPING_DETAIL_REPORT_BEN_TRUCK_BOX","Tip/Crane/pail"); 
     DEFINE("STOPPING_DETAIL_REPORT_NO_STATUS","No status");           
    //Phuc End báo cáo chi tiet diem dung                  
     //Phuc Start báo cáo tổng hợp diem dung
     DEFINE("STOPPING_GENERAL_REPORT_TITLE","STOPPING  GENERAL REPORT" );
     DEFINE("STOPPING_GENERAL_REPORT_TIMES_XXX_ON","Number of stop XXX on");
     DEFINE("STOPPING_GENERAL_REPORT_TIME_XXX_ON","Time of stop XXX on");    
     DEFINE("STOPPING_GENERAL_REPORT_TIME_ON","Stop time with engine on");
     DEFINE("STOPPING_GENERAL_REPORT_STOPPING_TIMES","Stop times");       
    //Phuc End  báo cáo tổng hợp diem dung                                  
    /////////* phuong: login_new_tech /////////////////////////
      DEFINE("LOGIN_NEW_TECH_VIEW_MORE","View more.");
      DEFINE("LOGIN_NEW_TECH_VIEW_VIDEO","view video");
      DEFINE("LOGIN_NEW_TECH_OR","or");
      DEFINE("LOGIN_NEW_TECH_COMMENT","Comment on the feature");
      DEFINE("LOGIN_NEW_TECH_FULLNAMEE","Full name");
      DEFINE("LOGIN_NEW_TECH_FEEDBACK","Feedback sending");
      DEFINE("LOGIN_NEW_TECH_TITLE","New feature");
      DEFINE("LOGIN_NEW_TECH_PHONE","Phone");
      DEFINE("LOGIN_NEW_TECH_CONTENT","Content");
      DEFINE("LOGIN_NEW_TECH_SENT","Send");
      DEFINE("LOGIN_NEW_TECH_CLEAR","Clear");
      DEFINE("LOGIN_NEW_TECH_BACK","Back");
      DEFINE("LOGIN_NEW_TECH_PROCESS","Processing data...");
      DEFINE("LOGIN_NEW_TECH_COMMENT_TITLE","Comment");
      DEFINE("LOGIN_NEW_TECH_FEEDBACK_FAIL",'Sending feedback is failed ');  
      /////////* phuong: end login_new_tech /////////////////////////       
            
      /////////* Phuong:   report_expired_license_driver ////////////
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_ORDER","No.");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_TITLE_EXCEL",'DRIVE LICENSE EXPIRY DATE REPORT');
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_TYPE","Drive license type");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_REMAINED_DAY","Remain day");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_ISSUED_DATE","Issued date");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_EXPIRE_DATE","Expiry date");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_REMARK","Comment");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_RENEWED","Renewed");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_EXPIRED","Expiry date");
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_EXPIRED_LEFT",'Expiry {0} days');
      DEFINE("REPORT_EXPIRED_LICENCE_DRIVER_REMAINED_LEFT",'Remain {0} days');
      /////////* Phuong: end report_expired_license_driver //////////
      
      /////////*  trung add: start main_fuelchart   *//////////
      DEFINE("FUELCHART_SPEED",'speed');
      DEFINE("FUELCHART_VOLUME",'fuel');  
      DEFINE("FUELCHART_LITER",'(liter)');
       DEFINE("FUELCHART_NO_PROCESS",'Row fuel chart')      ; 
      DEFINE("FUELCHART_ANALYST_DISTANCE_AND_SPEED",'Vehicle\'s distance and velocity analyzing chart')      ; 
      /////////*  trung add: end main_fuelchart   *//////////  
            /////* phuong add: devices_pay_all ///////
      DEFINE("DEVICE_PAY_ALL_TITLE",'DEVICE PAYMENT GENERAL REPORT');
      /////* phuong end add: devices_pay_all /////// 
      /////* phuong add: general_message ///////
      DEFINE("GENERAL_MESSAGE_TITLE",'SMS GENERAL MESSAGE');
      /////* phuong end add: general_message ///////
      
      /////* phuong add: _information_device. ///////
      DEFINE("INFORMATION_DEVICE_TITLE",'DEVICE TECH RELEVANT INFO');
      DEFINE("INFORMATION_DEVICE_TIME_DEVICE",'Device date time');
      DEFINE("INFORMATION_DEVICE_TIME_UPDATE",'Server date time');

      /////* phuong end add: _information_device. ///////  

      /////* phuong add: f_register_info. ///////    
      DEFINE("F_REGISTER_INFO_TITLE",'REGISTER INFORMATION');
      DEFINE("F_REGISTER_INFO_NUMBER",'Register number');
      DEFINE("F_REGISTER_INFO_BY",'Registered by');
      DEFINE("F_REGISTER_INFO_DATE",'Registered date');
      DEFINE("F_REGISTER_INFO_EXPIRE",'Expiry date');
      DEFINE("F_REGISTER_INFO_AMOUNT",'Amount (vnd)');
      DEFINE("F_REGISTER_INFO_LIMIT_ALRAM",'Warning deadline');
      DEFINE("F_REGISTER_INFO_LIMIT_ALRAM_DATE",'Warning deadline (date)'); 
      DEFINE("F_REGISTER_INFO_RENEWED",'Registered');
      DEFINE("F_REGISTER_INFO_REMARK",'Comment'); 
      DEFINE("F_REGISTER_INFO_EXIST","Register number already exists. Please input other number!");       
      /////* phuong end add: f_register_info. /////// 
      
      /////*phuong add: f_fee_type  /////////////////////
      DEFINE("F_FEE_TYPE_TITLE","COST LIST");
      DEFINE("F_FEE_TYPE_NAME","Cost name");
      DEFINE("F_FEE_TYPE_AMOUNT","Amount (vnd)");
      DEFINE("F_FEE_TYPE_OWNER_PAD","Vehicle owner paid");
      DEFINE("F_FEE_TYPE_EXIST","Cost name already exists. Please input other cost name!");
      DEFINE("F_FEE_TYPE_REMARK","Comment");        
      /////*phuong add: f_fee_type  ///////////////////// 
      
      /////*phuong add: f_fee_manager  /////////////////////
      DEFINE("F_FEE_MANAGER_TITLE","COST MANAGEMENT");
      DEFINE("F_FEE_MANAGER_TYPE","Cost type");
      DEFINE("F_FEE_MANAGER_MORE","Date");
      DEFINE("F_FEE_MANAGER_AMOUNT","Amount (vnd)");
      DEFINE("F_FEE_MANAGER_OWNER_PAID","Vehicle owner paid");
      DEFINE("F_FEE_MANAGER_REMARK","Comment"); 
      /////*phuong end: f_fee_manager  /////////////////////
      
      /////* phuong add: f_driver_license_term /////////////// 
      DEFINE("F_DRIVER_LICENSE_TERM_EXPIRED","Period");
      DEFINE("F_DRIVER_LICENSE_TERM_DAYS","Days");
      DEFINE("F_DRIVER_LICENSE_TERM_EXPIRED_SELECT","Select"); 
      DEFINE("F_DRIVER_LICENSE_TERM_EXPIRED_EXIST","Valid within type already exists!");
      DEFINE("F_DRIVER_LICENSE_TERM_EXIST","Driver expiry date  already exists!"); 
      /////* phuong end: f_driver_license_term ///////////////=======
      /////* phuong end add: _information_device. ///////  
      
      /////**////////////////
      DEFINE("FUNCTION_NOT_RUN",'not run'); 
      /////**////////////////
       // Phuc add BC TH Lộ trình  
      DEFINE("ROUTE_GENERAL_REPORT_TITLE",'ROUTE GENERAL REPORT');
      DEFINE("ROUTE_GENERAL_REPORT_FROM_DATE",'Departure date');
      DEFINE("ROUTE_GENERAL_REPORT_FROM_TIME",'Departure time');
      DEFINE("ROUTE_GENERAL_REPORT_TO_DATE",'Arrival date');
      DEFINE("ROUTE_GENERAL_REPORT_TO_TIME",'Arrival time');
      DEFINE("ROUTE_GENERAL_REPORT_TARGET",'Arrival location');
      DEFINE("ROUTE_GENERAL_REPORT_STARTADDRESS",'Deparute location');   
      DEFINE("ROUTE_GENERAL_REPORT_TOTAL_TIME",'Total of time');
      DEFINE("ROUTE_GENERAL_REPORT_MAXSPEED",'Max speed (km/h) ');
      DEFINE("ROUTE_GENERAL_REPORT_REAL_DISTANCE",'Real route(km) ');
      DEFINE("ROUTE_GENERAL_REPORT_MOVE_TIME",'Moving time');  
      DEFINE("ROUTE_GENERAL_REPORT_STOP_IN_AREA",'Stop time at assigned point (in region)');
      DEFINE("ROUTE_GENERAL_REPORT_STOP_OUT_AREA",'Other stop time (out of region)'); 
      DEFINE("ROUTE_GENERAL_REPORT_AVERRAGE_SPEED",'Average speed (km/h) ');
      DEFINE("ROUTE_GENERAL_REPORT_ENGINEOFF",'Engine off times');     
      DEFINE("ROUTE_GENERAL_REPORT_NUMOPENDOOR",'Cabin door open times'); 
       // Phuc add BC TH Lộ trình  
       // Phuc add BC vượt tốc đọ  
      DEFINE("OVER_SPEED_REPORT_TITLE",'OVER SPEED REPORT');
      DEFINE("OVER_SPEED_REPORT_DRIVER",'Driver');
      DEFINE("OVER_SPEED_REPORT_START_DATE",'Start date');
      DEFINE("OVER_SPEED_REPORT_END_DATE",'End date');
      DEFINE("OVER_SPEED_REPORT_TIME",'Time ');
      DEFINE("OVER_SPEED_REPORT_LIMIT_SPEED",'Limited speed(km/h)');
      DEFINE("OVER_SPEED_REPORT_OVER_SPEED",'Actual over speed(km/h)');   
      DEFINE("OVER_SPEED_REPORT_START_ADDRESS",'Starting address');
      DEFINE("OVER_SPEED_REPORT_END_ADDRESS",'Ending address');
      DEFINE("OVER_SPEED_REPORT_OVER_SPEED_TIMES",'Over speed times');
    
       // Phuc add BC vượt tốc đọ 
       
       //Phuong branch management 
      DEFINE("BRANCH_MANAGEMENT_NAME_EXIST","Branch name already exist!");
      DEFINE("BRANCH_MANAGEMENT_NO_SELECT","Not branch selected!"); 
       //End Phuong branch management  
       
       //Phuong add; functions_index.php
      DEFINE("FUNCTIONS_INDEX_LANG","Error, Lang directory is not exist!");       
       //End  Phuong add; functions_index.php

       //Phuong add: maps.php
       DEFINE("MAPS_DEVICE",'Please select a device!');
       DEFINE("MAPS_SOUND_SIGNAL",'Signal of hooter is sent successfully');
       DEFINE("MAPS_SOUND_SIGNAL_ERROR",'Cannot send the signal of hooter'); 
             
       DEFINE("MAPS_SOUND_SIGNAL_2",'Signal of second hooter is sent successfully');        
       DEFINE("MAPS_SOUND_SIGNAL_2_STOP",' Signal of second hooter is stop successfully! ');        
       DEFINE("MAPS_SOUND_SIGNAL_2_NOT_SEND",'Cannot send the signal of second hooter!');
        
       DEFINE("MAPS_SOUND_SIGNAL_3",'Signal of third hooter is sent successfully'); 
       DEFINE("MAPS_SOUND_SIGNAL_3_STOP",' Signal of third hooter is stop successfully ');        
       DEFINE("MAPS_SOUND_SIGNAL_3_NOT_SEND",'Cannot send the signal of third hooter');
       
       DEFINE("MAPS_NOT_INPUT_DEVICE",'You have not selected device or input content'); 
       DEFINE("MAPS_REQUESS_TACK_SEND",'Sending photograph request is success!');
       DEFINE("MAPS_REQUESS_TACK_SEND_FAIL",'Sending photograph request is failure ');
       
       DEFINE("LOCATION_EXCEL_REPORT",'LOCATIONS MANAGEMENT'); 
       DEFINE("LOCATION_TYPE_TITLE",'Type of location');
       DEFINE("LOCATION_NAME",'Location name');
       DEFINE("LOCATION_REMARK",'Comment');
       DEFINE("LOCATION_DATE_CREATED",'Date created');
       DEFINE("LOCATION_EXCEL_TITLE_REPORT",'location_management.xls'); 
       DEFINE("LOCATION_STATUS",'Deleted locations'); 
       //End Phương add: maps.php
       // Start Trung add : reply_list  
    
       DEFINE("REPLY_LIST_TITLE",'DEVICE REPLYING REPORT');    
       DEFINE("REPLY_LIST_ORDERNUM",'No.');
       DEFINE("REPLY_LIST_TIMEUPDATE",'Server date time');
       DEFINE("REPLY_LIST_TIMEDEVICE",'Device date time'); 
             
       DEFINE("REPLY_LIST_SPEED",'Speed (km/h)');        
       DEFINE("REPLY_LIST_LATITUDE",'Latitude');        
       DEFINE("REPLY_LIST_LONGITUDE",'Longitude');
        
       DEFINE("REPLY_LIST_FUEL",'Fuel(liters)'); 
       DEFINE("REPLY_LIST_TEMPURATURE",' Temparature ');        
       DEFINE("REPLY_LIST_STATUS",'Status');
       DEFINE("REPLY_LIST_TEM_C",'(temparature C)');
       DEFINE("REPLY_LIST_DOOR",'Door');  
       DEFINE("REPLY_LIST_AIRCON",'Air-conditioner'); 
       DEFINE("REPLY_LIST_ENGINE",'Engine');
       DEFINE("REPLY_LIST_MAP",'Map');
       DEFINE("REPLY_LIST_MAP_VI",'View Vietnamese Map');
       DEFINE("REPLY_LIST_DELETE",'Delete'); 
       // End Trung add : reply_list
       
       
      DEFINE("STR_USER1","Can't delete a agent ");    
      DEFINE("STR_USER2"," because agent ");  
      DEFINE("STR_USER3"," is storing a device. Please move a warehouse before deleting.");
       //Phuong add: historylog
       DEFINE("HISTORYLOG_AMOUNT_LOGIN","Login times");  
       DEFINE("HISTORYLOG_TIME_LOGIN","Login duration (seconds)");
        //End phuong add: historylog
        
        //Phuong add: device_general
      DEFINE("DEVICE_GENERAL_TITLE",'VEHICLE GROUP GENERAL REPORT');
      DEFINE("DEVICE_GENERAL_GROUP_NAME",'Vehicle group name');  
      DEFINE("DEVICE_GENERAL_TOTAL_DISTANT",'Total distance'); 
      DEFINE("DEVICE_GENERAL_AMOUNT",'Amount');
        //End      Phuong add: device_general 
        
        //Phuong add: landmark 
      DEFINE("LANMARK_TITLE","POSITION REPORT"); 
        //End Phuong add: landmark 
        //Start Phuc add Maintenance list
     DEFINE("MAINTENANCE_DESCRIPTION","Maintenance description");   
     DEFINE("MAINTENANCE_DURATION","Duration");
     DEFINE("MAINTENANCE_TYPE","Type");   
     DEFINE("MAINTENANCE_DISTANCE_NORM","Distance norm (km)");   
//     DEFINE("MAINTENANCE_HOUR_NORM","Hour norm");
     DEFINE("MAINTENANCE_HOUR_NORM","Hour norm (hour)");
     DEFINE("MAINTENANCE_NAME_EXIST","Type of maintenance name already exist.");
        //End Phuc add Maintenance list
        
                 //Phuong add: addfuel 
     DEFINE("ADDFUEL_TITLE","FILLING/EXHAUSTING FUEL REPORT");
     DEFINE("ADDFUEL_TITLE_EXCEL","filling/exhausting_fuel_report.xls");
     DEFINE("ADDFUEL_ADD","Filling fuel");
     DEFINE("ADDFUEL_OUT","Exhausting fuel");
     DEFINE("ADDFUEL_AMOUNT_LITER","liters");
       //End phuong add : addfuel
       
              //Phuong add: r_general_fuel
     DEFINE("R_GENERAL_FUEL_TITLE","GENERAL FUEL REPORT");
     DEFINE("R_GENERAL_FUEL_KM_AMOUNT","Distance (km)");
     DEFINE("R_GENERAL_FUEL_TIME_ENGIN_ON","Engine on time"); 
     DEFINE("R_GENERAL_FUEL_START","Initial fuel (liter)"); 
     DEFINE("R_GENERAL_FUEL_EXPENSE","Consumption fuel (liter)"); 
     DEFINE("R_GENERAL_FUEL_LOSE","Lossing fuel (liter)"); 
     DEFINE("R_GENERAL_FUEL_UPLOAD","Filling fuel (liter)"); 
     DEFINE("R_GENERAL_FUEL_NOW","Remain fuel (liter)"); 
//     DEFINE("R_GENERAL_FUEL_NORM","Norm fuel"); 
     DEFINE("R_GENERAL_FUEL_AVG","Average fuel/100km (liter)");
     DEFINE("R_GENERAL_FUEL_TITLE_EXCEL","general_fuel_report_");    
       //End Phuong add: r_general_fuel
       
       //Phuong add: r_general_fuel_by_day
     DEFINE("R_GENERAL_FUEL_BY_DAY_TITLE","GENERAL FUEL REPORT FOLLOWING DATE");      
     DEFINE("R_GENERAL_FUEL_BY_DAY_EXCEL","general_fuel_report_followng_date_");
     DEFINE("R_GENERAL_FUEL_BY_SUMARY","Total"); 
       //End Phuong add: r_general_fuel_by_day
       
       //Phuong add location_list
     DEFINE("LOCATION_LIST_RESTORE_ERR","Can not restore.");
     DEFINE("LOCATION_LIST_DELETED_LOCATION","(Deleted location)");     
       //End phuong add location_list
       // Phuong add Nhóm tài xế
     DEFINE("DRIVER_GROUP_REPORT_TITLE"," DRIVER GROUP MANAGEMENT");
     DEFINE("DRIVER_GROUP_REPORT_NAME","Driver group name");    
     DEFINE("DRIVER_GROUP_GRID_ACCOUNT","Account");
     DEFINE("DRIVER_GROUP_GRID_USER_CREATE","Created by");
     DEFINE("DRIVER_GROUP_GRID_UPDATE_DATE","Created date"); 
     DEFINE("DRIVER_GROUP_TITLE_EXCEL_FILE","driver_group_list_");
     DEFINE("DRIVER_GROUP_CHK",""); 
     DEFINE("DRIVER_GROUP_NO_CHK","containing "); 
     // End Phuong add Nhóm tài xế
     // Phuong add Nhóm xe
     DEFINE("VEHICLE_GROUP_REPORT_TITLE"," VEHICLE GROUP MANAGEMENT");
     DEFINE("VEHICLE_GROUP_REPORT_NAME","Vehicle group name");    
     DEFINE("VEHICLE_GROUP_GRID_ACCOUNT","Account");
     DEFINE("VEHICLE_GROUP_GRID_USER_CREATE","Created by");
     DEFINE("VEHICLE_GROUP_GRID_UPDATE_DATE","Created date"); 
     DEFINE("VEHICLE_GROUP_TITLE_EXCEL_FILE","vehicle_group_list_");
     DEFINE("VEHICLE_GROUP_CHK",""); 
     DEFINE("VEHICLE_GROUP_NO_CHK","containing ");       
     // End Phuong add Nhóm xe
     DEFINE("DRIVER_MANAGEMENT_CHK",""); 
     DEFINE("DRIVER_MANAGEMENT_NO_CHK","containing ");
     
     ///********Phuong: driver manager ******/////////////
     DEFINE("DRIVER_MANAGERMENT_DIVER_EXIST","Driver has been existed (Driver name, account name and rfid_tag duplicated)");
     DEFINE("DRIVER_MANAGERMENT_DIVER_NOT_EXIST ","Driver is not found");
     DEFINE("DRIVER_MANAGERMENT_NO_SELECT","Cannot select a driver to delete.");
     DEFINE("DRIVER_MANAGERMENT_REPORT_TITLE","DRIVER MANAGEMENT");
     DEFINE("DRIVER_MANAGERMENT_REPORT_SELECT_GROUP","Driver group");
     DEFINE("DRIVER_MANAGERMENT_REPORT_SELECT_DRIVER","Driver name");
     DEFINE("DRIVER_MANAGERMENT_GRID_NAME","Driver name"); 
     DEFINE("DRIVER_MANAGERMENT_GRID_PHONE","Cell phone"); 
     DEFINE("DRIVER_MANAGERMENT_GRID_DRIVER_ACCOUNT","Account"); 
     DEFINE("DRIVER_MANAGERMENT_GRID_DRIVER_EDIT_DATE","Update date"); 
     DEFINE("DRIVER_MANAGERMENT_GRID_DRIVER_INFO","Information"); 
     DEFINE("DRIVER_MANAGERMENT_GRID_DRIVER_RFID","RFID Tag"); 
     DEFINE("DRIVER_MANAGERMENT_GRID_DRIVER_GROUP","Driver group"); 
     DEFINE("DRIVER_MANAGERMENT_EXCEL_TITLE","driver_list_");
    // DEFINE("DRIVER_MANAGEMENT_NO_CHK","containing the:");
     ///********End Phuong: driver manager ******/////////////
     
     //start Trung add quan ly danh muc loai dia diem
      DEFINE("F_LOCATION_EXIST","This type of location already existed, please select other!");
     //start Trung add quan ly danh muc loai dia diem D
     
           //Start-general_day 
    DEFINE("GENERAL_DAY_EX_TITLE","GENERAL REPORT FOLLOWING DATE");
    DEFINE("GENERAL_DAY_EX_TITLE_DEVICE","Vehicle name");
    DEFINE("GENERAL_DAY_EX_TITLE_DAY","Date");    
    DEFINE("GENERAL_DAY_EX_TITLE_RUN_TIME","Running time");
    DEFINE("GENERAL_DAY_EX_TITLE_STOP_TIME","Stop time");
    DEFINE("GENERAL_DAY_EX_TITLE_STOP_COUNT","Stop times");   
    DEFINE("GENERAL_DAY_EX_TITLE_AVG_SPEED","Average speed (km/h)");
    DEFINE("GENERAL_DAY_EX_TITLE_MAX_SPEED","Max speed");
    DEFINE("GENERAL_DAY_EX_TITLE_OVERSPEED_COUNT","Over speed times");
    DEFINE("GENERAL_DAY_EX_TITLE_SUM_DISTANCE","Distance (km)");
    DEFINE("GENERAL_DAY_EX_TITLE_FUEL_CONF","Norm fuel (liter)");
    DEFINE("GENERAL_DAY_EX_TITLE_FUEL_NOW","Actual fuel (liter)");  
    DEFINE("GENERAL_DAY_EX_TITLE_ORTHER_FEE","Orther cost (vnd)"); 
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT1_COUNT","Input1 on times"); 
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT1_TIME","Input1 on time");
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT2_COUNT","Input2 on times"); 
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT2_TIME","Input2 on time");
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT3_COUNT","Input3 on times"); 
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT3_TIME","Input3 on time");
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT4_COUNT","Input4 on times"); 
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT4_TIME","Input4 on time");
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT5_COUNT","Input5 on times"); 
    DEFINE("GENERAL_DAY_EX_TITLE_INPUT5_TIME","Input5 on time");
    DEFINE("GENERAL_DAY_EX_EXCEL_FILE","general_report_fowllowing_date");   
    
    
    //End-general_day 
    
    DEFINE("ALERT_CONF_SELECT_REGION","Select alert region:");
    DEFINE("CLICK_VIEW","Click here to view report");     
    DEFINE("CLICK_EXCEL","Export to excel file"); 
    DEFINE("TITLE_SOHDBH","");     
    DEFINE("TITLE_LOAIBH","");     
    DEFINE("TITLE_NGAYMUABH","");     
    DEFINE("TITLE_HETHANBH","");     
    DEFINE("TITLE_PHIBH","");
    // log manager     
    DEFINE("TITLE_LOG_MANAGER","LOG MAMAGEMENT");    
    DEFINE("TYPE_OBJ_LOG_MANAGER","Type of object");   
    DEFINE("MONITOR_LOG_MANAGER","Menu");
    DEFINE("TASK_LOG_MANAGER","Action");
    DEFINE("CREATEBY_LOG_MANAGER","Created by");
    DEFINE("EXCEL_TITLE_LOG_MANAGER","logmamagement");    