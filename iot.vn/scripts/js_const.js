//system 
var MSG_SYS_ERR_INPUT_DATA = "Có lõi xảy ra khi nhập dữ liệu.Vui lòng xem lại." ;
//var MSG_SYS_FORMAT_EMAIL = "Email chưa đúng định dạng." ;
var MSG_SYS_FORMAT_EMAIL = "Email chưa đúng định dạng(Vd : example@yahoo.com)." ;
var MSG_SYS_NOTINPUT_EMAIL = "Vui lòng nhập địa chỉ email.";

//User Info
var MSG_USERINFOR_NOT_INPUT_USERNAME = "Bạn chưa nhập tên đăng nhập.";
var MSG_USERINFOR_NOT_INPUT_EMAIL = "Vui lòng nhập email.";
var MSG_USERINFOR_NOT_INPUT_PHONE = "Bạn chưa nhập số điện thoại.";
//Change pass 
var MSG_CHANGEPASS_INPUTERR = "Nhập thông tin xác nhận mật khẩu sai."; //Nhập lại mật khẩu mới không đúng
var MSG_CHANGEPASS_NO_INPUT_NEWPASS = "Vui lòng  nhập mật khẩu mới.";
var MSG_CHANGEPASS_NO_INPUT_OLDPASS = "Vui lòng nhập mật khẩu cũ.";
MSG_CHANGEPASS_NO_INPUT_RENEWPASS = "Vui lòng nhập mật khẩu xác nhận.";
//User
var MSG_USER_CONFIRM_DELETE = "Bạn có chắc muốn xóa người dùng này không?";
var MSG_USER_CONFIRM_NOTINPUT_COMPANY = "Hãy nhập họ tên hoặc tên công ty bạn.";
var MSG_USER_SELECT_ACCOUNT = "Vui lòng chọn loại tài khoản.";
var MSG_USER_SELECT_ROLE = "Vui lòng chọn quyền cho tài khoản.";
var MSG_USER_CONFIRM_PASS = "Nhập thông tin xác nhận mật khẩu sai.";
var MSG_USER_NOTINPUT_PASS2 = "Vui lòng nhập mật khẩu xác nhận.";
var MSG_USER_NOTINPUT_PASS = "Vui lòng nhập mật khẩu.";
var MSG_USER_NOTINPUT_USERNAME = "Vui lòng nhập tên đăng nhập.";
var MSG_USER_CONFIRM_DELETEALL = "Bạn có chắc muốn xóa tất cả người dùng đã chọn không?";
var MSG_USER_CONFIRM_NOT_SELECT_USER = "Bạn chưa chọn người dùng cần xóa";
//change store
var MSG_CHANGESTORE_CONFIRM_SEARCH = "Nếu không nhập giá trị tìm, phải đánh dấu và ô tìm tương đối";
var MSG_CHANGESTORE_NOT_SELECT_DEVICE = "Chưa chọn kho chứa thiết bị.";
var MSG_CHANGESTORE_NOT_STORE_CHANGE_DEVICE = "Chưa chọn kho muốn chuyển thiết bị đến.";
var MSG_CHANGESTORE_NOT_STORE_WANT_CHANGE_DEVICE = "Chưa chọn thiết bị muốn chuyển kho.";
//subuser
var MSG_SUBUSER_NOT_SELECT_ROLES = "Chưa chọn quyền cho người dùng.";
var MSG_NOT_SELECT_FROMDATE = "Bạn chưa chọn ngày bắt đầu.";
var MSG_NOT_SELECT_TODATE = "Bạn chưa chọn ngày kết thúc.";
var MSG_FROMDATE_NOT_FORMAT = "Ngày bắt đầu không đúng định dạng.";
var MSG_TODATE_NOT_FORMAT = "Ngày kết thúc không đúng định dạng.";
var MSG_COMPARE_FROMDATE_TODATE = "Ngày bắt đầu lớn hơn ngày kết thúc.Mời bạn chọn lại.";
var MSG_SYS_NOT_ISNUMERIC = "phải là số và lớn hơn 0.Mời bạn nhập lại.";
var MSG_SYS_CONFIRM_DELETE = "Bạn có chắc muốn xóa thông tin này không?";
var MSG_SYS_NOT_EXPORT_DATA_TO_EXCEL = "Không có dữ liệu hoặc bạn chưa chọn nút xem trước khi chuyển dữ liệu sang Excel.";
var MSG_SYS_NOT_SELECT_USER = "Bạn chưa chọn user cần xem.";
var MSG_NORMS_SELECT_DEVICE =" Vui lòng chọn thiết bị muốn cấu hình.";
//system 

var MSG_SYS_ERR_INPUT_DATA = "Có lõi xảy ra khi nhập dữ liệu.Vui lòng xem lại." ;
var MSG_SYS_NOTINPUT_EMAIL = "Vui lòng nhập địa chỉ email.";
var MSG_DELETE_CONFIRM = "Bạn có thật sự muốn xóa?";
var MSG_INPUT_ERROR = "Dữ liệu nhập không chính xác.";
var MSG_NO_SELECT_ITEM =  "Chưa chọn mục để xóa.";

var EX_ERR_SPEED =  "Tốc độ tối đa phải lớn hơn 0."; 
    // START grneral for ex_xx_alert
var  EX_ERR_PHONE = "Vui lòng nhập số điện thoại.";
var  EX_ERR_DEVICE = "Vui lòng chọn thiết bị để cấu hình.";
var  EX_ERR_SEND_MESSAGE = "Số lần gửi tin nhắn phải lớn hơn 0.";
var  EX_ERR_TIME_SEND_MESSAGE = "Thời gian giữa 2 tin nhắn phải lớn hơn 0.";
var  EX_ERR_TIME_SEND_EX_MESSAGE = "Thời gian giữa hai tin nhắn phải bằng 1 khi số lần gửi tin nhắn bằng 1.";
    
    // END grneral for ex_xx_alert
    
    // START PROCESSING MESSAGE
var  PROCESS_DELETE = "Đang xóa dữ liệu...";
var  PROCESS_UPDATE = "Đang cập nhật dữ liệu...";
var  PROCESS_INSERT = "Đang thêm mới dữ liệu...";
var  PROCESS_DATA = "Đang xử lí dữ liệu...";
    // END PROCESSING MESSAGE
    
    //START VIHICLE GROUP
var GROUP_SELECTED ="Không có nhóm nào được chọn.";
var GROUP_SELECTED ="Vui lòng nhập tên nhóm.";
var GROUP_DELETE_ALARM ="Bạn thật sự muốn xóa nhóm xe đã chọn? \n ( Các thiết bị (xe) thuộc nhóm này cũng sẽ bị xóa.)";  
    //END VIHICLE GROUP
    
    ///General form
var DRIVER_MANAGER_RFID = 'Chưa nhập thông RFID.';
var DRIVER_MANAGER_DRIVER_EXIST = 'Chưa chọn tài xế.';
var DRIVER_MANAGER_NAME = 'Chưa nhập tên tài xế.'    
    ///end General form
    // image manager
var DATE_FAIL = "Ngày tháng không hợp lệ";
var DATE_FROM_LESS_TO = "Ngày bắt đầu không thể lớn hơn ngày kết thúc!";
var DATE_NOT_MORE_15 = "Báo cáo chỉ được xem trong vòng 15 ngày!";
var IMAGE_NO_SELECT = "No camera selected";
var DEVICE_NO_SELECTED ="No device selected!";
    //end image manager=======
function fn_showwating()
 {
    document.getElementById("dvwt").style.display="";
    document.getElementById("dvwt").innerHTML = document.getElementById("divWaiting").innerHTML ;
 }
  
function CreateCalObject(objID, imgID)
{
    var theObj = document.getElementById(objID);
    if(!theObj)
    {
        tmpObj = document.getElementById(imgID);
        if(tmpObj)
        {
            tmpObj.style.display = "none";
        }
        return(false);
    }
    var objRet = new calendar2(theObj);
    if(!objRet)
    {
        tmpObj = document.getElementById(imgID);
        if(tmpObj)
        {
            tmpObj.style.display = "none";
        }
        return(false);
    }
    objRet.year_scroll = false;
    objRet.time_comp = false;
    return(objRet);
}
function CheckDate(date)
{    
    var check = /^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4} (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/;
    return check.test(date);   
}

function fn_compare_fromdate_todate(fromdate,todate)
{
    var ojReturn =false ;
    var df = Date.parse(toDate(fromdate ));
    var dt = Date.parse(toDate(todate));
    var ns = (dt - df);
    if( ns <= 0)
    {
       ojReturn = true ;
    }
    return ojReturn ;//true là ngày bắt đầu lớn hơn ngày kết thúc
}

function fn_isnumeric(value)
{
    var result = true ;
    var cnumber = Number(value);
    if (isNaN(cnumber)||cnumber <=0 ) 
    {
       result = false ;  
    }
    return result ;
}
function fn_viewmap_click(lat,slong,dname,i,tempe,time,speed)
{
    window.open("mapgoogle/map.php?lat="+lat+"&long="+slong+"&dname="+dname+"&i="+i+"&tempe="+tempe+"&time="+time+"&speed="+speed,"new","width=480,height=440,left=260,top=100,resizable=yes,location=yes");
}
//Xu ly khi nhap so trang va nhan enter
function fn_PageChange_Enter(txtname)
{
    //get total page
    var vtotalpage = document.getElementById("hdtotalpage").value ;
    var vnumberpage = document.getElementById(txtname).value ; 
    var vcurrentpage = document.getElementById("hdcurrentpage").value ; 
     
    
    var cnumber = Number(vtotalpage);
    var cnumber1 = Number(vnumberpage);
    // tranfer input page
    if((cnumber1 >= 1) && (cnumber1 <= cnumber))
    {
        document.getElementById(txtname).value =vnumberpage;
        document.getElementById("hdcurrentpage").value = vnumberpage ; 
    }
    //reset current page
    else
    {
       document.getElementById(txtname).value =vcurrentpage;    
    }
    
    fn_ViewData_Click(6);//6 la khi nhan Enter tren text box current page
}
 
//system 

var MSG_SYS_ERR_INPUT_DATA = "Có lõi xảy ra khi nhập dữ liệu.Vui lòng xem lại." ;
//var MSG_SYS_FORMAT_EMAIL = "Email chưa đúng định dạng." ;
var MSG_SYS_FORMAT_EMAIL = "Email chưa đúng định dạng(Vd : example@yahoo.com)." ;
var MSG_SYS_NOTINPUT_EMAIL = "Nhập địa chỉ email.";

//User Info
var MSG_USERINFOR_NOT_INPUT_USERNAME = "Bạn chưa nhập tên đăng nhập.";
var MSG_USERINFOR_NOT_INPUT_PHONE = "Bạn chưa nhập số điện thoại.";
var MSG_USERINFOR_NOT_INPUT_SOCMND = "Bạn chưa nhập Số CMND.";   
//Change pass 
var MSG_CHANGEPASS_INPUTERR = "Nhập thông tin xác nhận mật khẩu sai."; 
var MSG_CHANGEPASS_NO_INPUT_NEWPASS = "Vui lòng  nhập mật khẩu mới.";
var MSG_CHANGEPASS_NO_INPUT_OLDPASS = "Vui lòng nhập mật khẩu cũ.";
MSG_CHANGEPASS_NO_INPUT_RENEWPASS = "Vui lòng nhập mật khẩu xác nhận.";
//User
var MSG_USER_CONFIRM_DELETE = "Bạn có chắc muốn xóa người dùng này không?";
var MSG_USER_CONFIRM_NOTINPUT_COMPANY = "Hãy nhập họ tên hoặc tên công ty bạn.";
var MSG_USER_SELECT_ACCOUNT = "Vui lòng chọn loại tài khoản.";
var MSG_USER_SELECT_ROLE = "Vui lòng chọn quyền cho tài khoản.";
var MSG_USER_CONFIRM_PASS = "Nhập thông tin xác nhận mật khẩu sai.";
var MSG_USER_NOTINPUT_PASS2 = "Vui lòng nhập mật khẩu xác nhận.";
var MSG_USER_NOTINPUT_PASS = "Vui lòng nhập mật khẩu.";
var MSG_USER_NOTINPUT_USERNAME = "Vui lòng nhập tên đăng nhập.";
var MSG_USER_NOTSPACE_USERNAME = "Tên đăng nhập không được có khoảng trắng.";
var MSG_USER_CONFIRM_DELETEALL = "Bạn có chắc muốn xóa tất cả người dùng đã chọn không?";
var MSG_USER_CONFIRM_NOT_SELECT_USER = "Bạn chưa chọn người dùng cần xóa";
//change store
var MSG_CHANGESTORE_CONFIRM_SEARCH = "Nếu không nhập giá trị tìm, phải đánh dấu và ô Tìm tương đối";
var MSG_CHANGESTORE_NOT_SELECT_DEVICE = "Chưa chọn kho chứa thiết bị.";
var MSG_CHANGESTORE_NOT_STORE_CHANGE_DEVICE = "Chưa chọn kho muốn chuyển thiết bị đến.";
var MSG_CHANGESTORE_NOT_STORE_WANT_CHANGE_DEVICE = "Chưa chọn thiết bị muốn chuyển kho.";
//subuser
var MSG_SUBUSER_NOT_SELECT_ROLES = "Chưa chọn quyền cho người dùng.";
var MSG_NOT_SELECT_FROMDATE = "Bạn chưa chọn ngày bắt đầu.";
var MSG_NOT_SELECT_TODATE = "Bạn chưa chọn ngày kết thúc.";
var MSG_FROMDATE_NOT_FORMAT = "Ngày bắt đầu không đúng định dạng.";
var MSG_TODATE_NOT_FORMAT = "Ngày kết thúc không đúng định dạng.";
var MSG_COMPARE_FROMDATE_TODATE = "Ngày bắt đầu lớn hơn ngày kết thúc.Mời bạn chọn lại.";
var MSG_SYS_NOT_ISNUMERIC = "phải là số và lớn hơn 0.Mời bạn nhập lại.";
var MSG_SYS_CONFIRM_DELETE = "Bạn có chắc muốn xóa thông tin này không?";
var MSG_SYS_NOT_EXPORT_DATA_TO_EXCEL = "Không có dữ liệu hoặc bạn chưa chọn nút xem trước khi chuyển dữ liệu sang Excel.";
var MSG_SYS_NOT_SELECT_USER = "Bạn chưa chọn user cần xem.";
var MSG_NORMS_SELECT_DEVICE =" Vui lòng chọn phương tiện muốn cấu hình.";
//system 

var MSG_SYS_ERR_INPUT_DATA = "Có lõi xảy ra khi nhập dữ liệu.Vui lòng xem lại." ;
var MSG_SYS_NOTINPUT_EMAIL = "Vui lòng nhập địa chỉ email.";
var MSG_DELETE_CONFIRM = "Chắc chắn xóa mục này?";
var MSG_INPUT_ERROR = "Dữ liệu nhập không chính xác.";
var MSG_NO_SELECT_ITEM =  "Chưa chọn mục để xóa.";

var EX_ERR_SPEED =  "Tốc độ tối đa phải lớn hơn 0."; 
    // START grneral for ex_xx_alert
var  EX_ERR_PHONE = "Vui lòng nhập số điện thoại.";
var  EX_ERR_DEVICE = "Vui lòng chọn thiết bị để cấu hình.";
var  EX_ERR_SEND_MESSAGE = "Số lần gửi tin nhắn phải lớn hơn 0.";
var  EX_ERR_TIME_SEND_MESSAGE = "Thời gian giữa 2 tin nhắn phải lớn hơn 0.";
var  EX_ERR_TIME_SEND_MESSAGE_SUM = "Thời gian giữa 2 tin nhắn phải lớn hơn 1.";
    
    // END grneral for ex_xx_alert
    
    // START PROCESSING MESSAGE
var  PROCESS_DELETE = "Đang xóa dữ liệu...";
var  PROCESS_UPDATE = "Đang cập nhật dữ liệu...";
var  PROCESS_INSERT = "Đang thêm mới dữ liệu...";
var  PROCESS_DATA = "Đang xử lí dữ liệu...";
    // END PROCESSING MESSAGE
 
//Start Device management  
var MSG_DEV_MANAGER_INPUT_NAME_DEVICE =  'Vui lòng nhập tên thiết bị.';
var MSG_DEV_MANAGER_INPUT_IMEI_DEVICE =  'Vui lòng nhập số IMEI của thiết bị.';
var MSG_DEV_MANAGER_INPUT_SIM_DEVICE =  'Vui lòng nhập số SIM của thiết bị.';
var MSG_DEV_MANAGER_SELECT_TYPE_DEVICE =  'Vui lòng chọn Loại thiết bị.';
var MSG_DEV_MANAGER_SELECT_STORE =  'Vui lòng chọn kho hàng.';
var MSG_DEV_MANAGER_SELECT_TYPE_ACCOUNT =  'Vui lòng chọn Loại tài khoản.';
var MSG_DEV_MANAGER_SELECT_CART_TYPE =  'Vui lòng chọn loại xe.';
var MSG_DEV_MANAGER_SELECT_ACTIVE_DEVICE =  'Chưa chọn thiết bị để kích hoạt.';
var MSG_DEV_MANAGER_COMFIRM_ACTIVE_DEVICE =  'Bạn có chắc muốn kích hoạt các thiết bị này không ?';
var MSG_DEV_MANAGER_SELECT_INACTIVE_DEVICE =  'Chưa chọn thiết bị để bỏ kích hoạt.';
var MSG_DEV_MANAGER_COMFIRM_INACTIVE_DEVICE =  'Bạn có chắc muốn bỏ kích hoạt các thiết bị này không ?';
var MSG_DEV_MANAGER_SELECT_DELETE_DEVICE =  'Chưa chọn thiết bị để xóa.';
var MSG_DEV_MANAGER_COMFIRM_DELETE_DEVICE_ALL =  'Bạn có chắc muốn xóa các thiết bị này không ?';
var MSG_DEV_MANAGER_COMFIRM_DELETE_DEVICE =  'Bạn có chắc muốn xóa thiết bị này không ?'
var MSG_DEV_MANAGER_INPUT_FULL_INFO =  'Vui lòng nhập đầy đủ thông tin.';
var MSG_DEV_MANAGER_INPUT_SEARCH_EXACT =  'Tìm chính xác, Vui lòng nhập tên thiết bị.';
var MSG_DEV_MANAGER_INPUT_REASON_INACTIVE =  'Vui lòng nhập nguyên nhân bỏ kích hoạt.';
//END Device management     

    //START VIHICLE GROUP
var GROUP_SELECTED ="Không có nhóm nào được chọn.";
var GROUP_SELECTED ="Vui lòng nhập tên nhóm.";
var GROUP_DELETE_ALARM ="Bạn thật sự muốn xóa nhóm xe đã chọn? \n ( Các thiết bị (xe) thuộc nhóm này cũng sẽ bị xóa.)";  
    //END VIHICLE GROUP
    ///General form
var DRIVER_MANAGER_RFID = 'Vui lòng nhập RFID_tag';
var DRIVER_MANAGER_NAME = 'Vui lòng nhập tên tài xế.'
var DRIVER_MANAGER_DRIVER_EXIST = 'Tài xế này đã tồn tại!';
var ACCOUNT_NO_SELECT = "Vui lòng chọn tài khoản."; 
var DRIVER_NO_SELECT = "Vui lòng chọn tài xế.";    
    ///end General form
    
    // image manager
var DATE_FAIL = "Ngày tháng không đúng định dạng!";
var DATE_FROM_LESS_TO = "Ngày bắt đầu không được lớn hơn ngày kết thúc";
var DATE_TO_LESS_NOW = "Ngày kết thúc không lớn hơn ngày hiện tại";
var DATE_NOT_MORE_15 = "Báo báo chỉ được xem trong vòng 15 ngày!";
    //end image manager=======
    //index
var INDEX_CHECK_USER ="User khách hàng mới vào được chức năng này.Vui lòng chuyển User";
var INDEX_ALARM_NOT_SELECT_DEVICE_CAMERA = 'Chưa chọn thiết bị và camera chụp';
var INDEX_LIMIT_TIME ='Vui lòng nhập thời gian chụp từ 0 - 999 giây';
var INDEX_CONFIRM_PHOTO ='Bạn có muốn chụp hình?';
    // end index
    
     //Phuong global instant
var SYSTEM_DEVICE = "Thiết bị";
var SYSTEM_DRIVER ="Tài xế";
var SYSTEM_USER = "User";
var SYSTEM_ACCOUNT ="Tài khoản";
var SYSTEM_NOT_DEVICE_SELECT = "Không có thiết bị nào được chọn.";

var SYSTEM_DELETE_CONFIRM = "Chắc chắn muốn xóa?";
var SYSTEM_NOT_DEVICE_SELECT = "Không có thiết bị nào được chọn.";
   //f_fee_manager
var F_FEE_MANAGER_NOT_COST_TYPE_SELECT = 'Vui lòng chọn loại chi phí!';
var F_FEE_MANAGER_NOT_INTER_DATE = 'Vui lòng nhập ngay phát sinh!'; 
var F_FEE_MANAGER_NOT_INTER_AMOUNT = 'Vui lòng  nhập số tiền!';

var F_FEE_MANAGER_NOT_AMOUNT_MORE_0 = 'Số tiền phải lớn hơn 0!';
var F_FEE_MANAGER_TEST_INPUT_DATA = 'Kiểm tra lại dữ liệu Input!';
 // end phuong
 
 
  //Phuong add: Global.js
 var GLOBAL_HIDE_DEVICE      = "Ẩn chọn phương tiện";
 var GLOBAL_CHOOSE_DEVICE    = "Chọn phương tiện"; 
 var GLOBAL_CHOOSE_TIME      = "Nhập thời gian giữa 2 điểm từ 0.1 đến 99 giây"; 
 var GLOBAL_NUMBER           = "Chu kỳ là số";
 var GLOBAL_CHOOSE_FROM_DATE = "Chưa chọn từ ngày";
 var GLOBAL_CHOOSE_TO_DATE   = "Chưa chọn đến ngày";
 var GLOBAL_TRKTIME          = "Thời gian:"; 
 var GLOBAL_TRKSTATUS        = "Trạng thái:"; 
 var GLOBAL_LOCATION         = "Địa điểm";
 var GLOBAL_STOP_FOR         = "Đã dừng"; 
 var GLOBAL_LOST_FOR         = "Mất tín hiệu";
 var GLOBAL_GPS_FOR          = "Mất GPS";
 var GLOBAL_RUNNING          = "Đang chạy";
 var GLOBAL_NUMLIMIT         = "Chu kỳ phải >= 30s";
 var GLOBAL_BUFFER           = "Đang truyền log";
 //End Phuong add: Global.js
 
 //Phuong add: GoogleFuncs.js
 var GOOGLEFUNCS_MUST_STOP       ='Bạn phải nhấn nút "dừng" trước';
 var GOOGLEFUNCS_SHOW_LIST       ="Hiện danh sách điểm";
 var GOOGLEFUNCS_HIDE_LIST       ='Ẩn danh sách điểm';
 var GOOGLEFUNCS_SORRY_G         ='Trình duyệt của bạn không hỗ trợ Google map, chúng tôi khuyến cáo bạn sử dụng Google Chrome';
 var GOOGLEFUNCS_ALL_DEVICE      ='---Tất cả---';
 var GOOGLEFUNCS_30_999          ='Nhập số nguyên từ 30 đến 999';
 var GOOGLEFUNCS_CONNECT         ='Không thể kết nối đến server' ;
 var GOOGLEFUNCS_NO_DATA         ='Không có dữ liệu';
 var GOOGLEFUNCS_DATA_ERR        ='Dữ liệu bị lỗi';
 var GOOGLEFUNCS_STOPED          ='Đã dừng ' ;
 var GOOGLEFUNCS_LOST_FOR        ='Mất tín hiệu ';
 var GOOGLEFUNCS_LOST_GPS        ='Mất GPS ';
 var GOOGLEFUNCS_UNKNOW          ='Không xác định';
 var GOOGLEFUNCS_DEVICENAME      ='PHƯƠNG TIỆN: ';
 var GOOGLEFUNCS_TIME            ='THỜI GIAN: ';
 var GOOGLEFUNCS_TTIME           ='ĐI ĐƯỢC: ';
 var GOOGLEFUNCS_STATUS          ='TRẠNG THÁI: ';
 var GOOGLEFUNCS_DISTANCE        ='KM TRONG NGÀY: ';
 var GOOGLEFUNCS_DISTANCE_REVIEW ='KHOẢNG CÁCH: ';
 var GOOGLEFUNCS_DISTANCE_TOTAL  ='TỔNG: ';
 var GOOGLEFUNCS_ACTIVE          ='HOẠT ĐỘNG: ';
 var GOOGLEFUNCS_SATELLITE       ='vệ tinh';
 var GOOGLEFUNCS_MOVING          ='Di chuyển - ';
 var GOOGLEFUNCS_PLAY            ='Bắt đầu';
 var GOOGLEFUNCS_STOP            ='Dừng' ;
 var GOOGLEFUNCS_DRIVER          ='TÀI XẾ: ';
 var GOOGLEFUNCS_LOCATION        ='Địa điểm ' ;
 var GOOGLEFUNCS_LAT_LONG        ='Tọa độ: ';
 var GOOGLEFUNCS_ADD_NEW         ='Tạo điểm mới: ';
 var GOOGLEFUNCS_NEW_NAME        ='Địa điểm: ';  
 var GOOGLEFUNCS_NEW_LOC_TYPE    ='Loại địa điểm: ';  
 var GOOGLEFUNCS_SELECT_TYPE     ='--Chọn loại địa điểm--';  
 var GOOGLEFUNCS_ADDRESS         = 'Địa chỉ :';  
 var GOOGLEFUNCS_CONTACT         ='Liên hệ :' ;  
 var GOOGLEFUNCS_PHONE           ='Điện thoại :';  
 var GOOGLEFUNCS_AMOUNT          ='Chi phí :';  
 var GOOGLEFUNCS_IMAGE           ='Hình ảnh :';  
 var GOOGLEFUNCS_RADIUS          ='Bán kính: ';  
 var GOOGLEFUNCS_UNITS           ='đơn vị ';  
 var GOOGLEFUNCS_REMARK          ='Ghi chú: ';  
 var GOOGLEFUNCS_SAVE            ='Lưu ' ;  
 var GOOGLEFUNCS_CANCEL          ='Bỏ qua ';  
 var GOOGLEFUNCS_MAP1            ='Bản đồ ';  
 var GOOGLEFUNCS_MAP2            ='Vệ tinh ';  
 var GOOGLEFUNCS_MAP3            ='Kết hợp ' ;  
 var GOOGLEFUNCS_MAP4            ='Địa hình '; 
// var GOOGLEFUNCS_VIEPMAP         ='Vietbando '; 
 var GOOGLEFUNCS_MAP5            ='Wiki map ';  
 var GOOGLEFUNCS_POWER           ='NGUỒN: ';  
 var GOOGLEFUNCS_INPUT1          ="";  
 var GOOGLEFUNCS_INPUT2          ="";  
 var GOOGLEFUNCS_INPUT3_ON       ='<font color="#009933">Mở</font>';  
 var GOOGLEFUNCS_INPUT3_OFF      ='<font color="#cc3300">Đóng</font> ';  
 var GOOGLEFUNCS_INPUT4_ON       ='<font color="#009933">Mở</font>';  
 var GOOGLEFUNCS_INPUT4_OFF      ='<font color="#cc3300">Tắt</font> ';
 var GOOGLEFUNCS_INPUT5_ON       ='Máy nổ';
 var GOOGLEFUNCS_INPUT5_OFF      ='Máy tắt' ; 
 //End Phuong add: GoogleFuncs.js  
 
 //Phuong add: Devices.js
 var DEVICES_INPUT1   = 'Chắc chắn xóa mục này?';
 var DEVICES_INPUT2   = "" ;
 var DEVICES_INPUT3_ON   = '<font color="#009933">Mở</font>';
 var DEVICES_INPUT3_OFF   = '<font color="#cc3300">Đóng</font> ';
 var DEVICES_INPUT4_ON   = '<font color="#009933">Mở</font>' ;
 var DEVICES_INPUT4_OFF   = '<font color="#cc3300">Tắt</font> ';
 var DEVICES_INPUT5_ON   = '<font color="#009933">Nổ</font>' ;
 var DEVICES_INPUT5_OFF   = '<font color="#cc3300">Tắt</font>';
 var DEVICES_OBJ_SHOW   = 'Đối tượng chưa được hiển thị' ;
 var DEVICES_NO_DATA   = 'Không tồn tại phần tử này' ; 
 //End Phuong add: Devices.js
 
 //Phuong add: Locations.js
 var LOCATIONS_DELETE = 'Chắc chắn xóa mục này?';
 var LOCATIONS_SHOW   = 'Đối tượng chưa được hiển thị';
 var LOCATIONS_DATA   = 'Không tồn tại phần tử này';
 var LOCATIONS_ADDRESS   = 'Địa chỉ:';
 var LOCATIONS_TYPE   = 'Loại địa điểm: ';
 var LOCATIONS_CONTACT   = 'Liên hệ:';
 var LOCATIONS_PHONE   = 'Điện thoại:';
 var LOCATIONS_COST   = 'Chi phí:';
 var LOCATIONS_RADIUS   = 'Bán kính:';
 var LOCATIONS_DECRIPTION   = 'Mô tả:';
 var LOCATIONS_UNIT   = '(đơn vị 100m) <br />';
 var LOCATIONS_NOT_INPUT_L   = 'Vui lòng nhập tên địa điểm!';
 //End  Phuong add: Locations.js 
 
 //Phuong add: VDBFuncs.js
 var VDBFUNCS_MUST_STOP       ='Bạn phải nhấn nút "Dừng" trước';
 var VDBFUNCS_SHOW_LIST       ="Hiện danh sách điểm";
 var VDBFUNCS_HIDE_LIST       ='Ẩn danh sách điểm';
 var VDBFUNCS_SORRY_G         ='Trình duyệt của bạn không hỗ trợ Google map, chúng tôi khuyến cáo bạn sử dụng Google Chrome';
 var VDBFUNCS_ALL_DEVICE      ='---Tất cả---';
 var VDBFUNCS_30_999          ='Nhập số nguyên từ 30 đến 999';
 var VDBFUNCS_CONNECT         ='Không thể kết nối đến server' ;
 var VDBFUNCS_NO_DATA         ='Không có dữ liệu';
 var VDBFUNCS_DATA_ERR        ='Dữ liệu bị lỗi';
 var VDBFUNCS_STOPED          ='Đã dừng ' ;
 var VDBFUNCS_LOST_FOR        ='Mất tín hiệu ';
 var VDBFUNCS_LOST_GPS        ='Mất GPS ';
 var VDBFUNCS_UNKNOW          ='Không xác định';
 var VDBFUNCS_DEVICENAME      ='PHƯƠNG TIỆN: ';
 var VDBFUNCS_TIME            ='THỜI GIAN: ';
 var VDBFUNCS_TTIME           ='ĐI ĐƯỢC: ';
 var VDBFUNCS_STATUS          ='TRẠNG THÁI: ';
 var VDBFUNCS_DISTANCE        ='KM TRONG NGÀY: ';
 var VDBFUNCS_DISTANCE_REVIEW ='KHOẢNG CÁCH: ';
 var VDBFUNCS_DISTANCE_TOTAL  ='TỔNG: ';
 var VDBFUNCS_ACTIVE          ='HOẠT ĐỘNG: ';
 var VDBFUNCS_SATELLITE       ='vệ tinh';
 var VDBFUNCS_MOVING          ='Di chuyển - ';
 var VDBFUNCS_PLAY            ='Bắt đầu';
 var VDBFUNCS_STOP            ='Dừng' ;
 var VDBFUNCS_DRIVER          ='TÀI XẾ: ';
 var VDBFUNCS_LOCATION        ='Địa Điểm ' ;
 var VDBFUNCS_LAT_LONG        ='Tọa Độ: ';
 var VDBFUNCS_DEV_NOT_SELECT  = 'Phương tiện chưa được chọn: ';
 var VDBFUNCS_ADD_NEW         ='Tạo điểm mới: ';
 var VDBFUNCS_NEW_NAME        ='Địa Điểm: ';  
 var VDBFUNCS_NEW_LOC_TYPE    ='Loại địa điểm: ';  
 var VDBFUNCS_SELECT_TYPE     ='--Chọn loại địa điểm--';  
 var VDBFUNCS_ADDRESS         = 'Địa chỉ :';  
 var VDBFUNCS_CONTACT         ='Liên hệ :' ;  
 var VDBFUNCS_PHONE           ='Điện thoại :';  
 var VDBFUNCS_AMOUNT          ='Chi phí :';  
 var VDBFUNCS_IMAGE           ='Hình ảnh :';  
 var VDBFUNCS_RADIUS          ='Bán kính: ';  
 var VDBFUNCS_UNITS           ='đơn vị ';  
 var VDBFUNCS_REMARK          ='Ghi chú: ';  
 var VDBFUNCS_SAVE            ='Lưu ' ;  
 var VDBFUNCS_CANCEL          ='Bỏ qua ';  
 var VDBFUNCS_MAP1            ='Bản đồ ';  
 var VDBFUNCS_MAP2            ='Vệ tinh ';  
 var VDBFUNCS_MAP3            ='Kết hợp ' ;  
 var VDBFUNCS_MAP4            ='Địa hình ';  
 var VDBFUNCS_MAP5            ='Wiki map ';  
 var VDBFUNCS_POWER           ='NGUỒN: ';  
 var VDBFUNCS_INPUT1          ="";  
 var VDBFUNCS_INPUT2          ="";  
 var VDBFUNCS_INPUT3_ON       ='<font color="#009933">Mở</font>';  
 var VDBFUNCS_INPUT3_OFF      ='<font color="#cc3300">Đóng</font> ';  
 var VDBFUNCS_INPUT4_ON       ='<font color="#009933">Mở</font>';  
 var VDBFUNCS_INPUT4_OFF      ='<font color="#cc3300">Tắt</font> ';
 var VDBFUNCS_INPUT5_ON       ='Máy nổ';
 var VDBFUNCS_INPUT5_OFF      ='Máy tắt' ;   
 //End Phuong add: VDBFuncs.js 
 
 //Phuong add: flexigrid.js
 var FLEXIGRID_TITLE = 'Ẩn/Hiện cột';
 //end Phuong add: flexigrid.js 
 
 //Phương add: Instant_alert.js
 var INSTANT_ALERT_LIST = "Danh sách cảnh báo";
 var INSTANT_ALERT_NOT_SEE = 'Không có cảnh báo nào chưa xem!'; 
 var INSTANT_ALERT_NO_SELECT = 'Chưa chọn dòng cảnh báo nào để xóa!'; 
 var INSTANT_ALERT_SURE_DELETE = "Bạn có thật sự muốn xóa các dòng cảnh báo đã chọn ?" ;
 //Phương add: Instant_alert.js
 
 //Phuong add: myscripts.js
 var MYSCRIPTS_MON ="Thứ hai";
 var MYSCRIPTS_TUE ="Thứ ba";
 var MYSCRIPTS_WED ="Thứ tư";
 var MYSCRIPTS_THU ="Thứ năm";
 var MYSCRIPTS_FRI ="Thứ sáu";
 var MYSCRIPTS_SAT ="Thứ bảy";
 var MYSCRIPTS_SUN ="Chúa nhật"; 
 var MYSCRIPTS_NON_OBJ = 'Lỗi không tìm thấy đối tượng'   ;       
 var MYSCRIPTS_NON_CHECKBOX = 'Không tìm thấy check box' ;
 var MYSCRIPTS_NON_FORM = 'không tìm thấy form' ; 
 //End Phuong add: myscripts.js
 
 //Phuong add; myutils.js
 var MYUTILS_FUNCTION_SUPPORT = "Một số chức năng không được hổ trợ trên trình duyệt này.Khuyến cáo sử dụng Google Chrome";
 var MYUTILS_CREATE_LOC_START = "Bắt đầu tạo địa điểm";
 var MYUTILS_CREATE_LOC_END   = "Kết thúc tạo địa điểm";
 //End Phuong add; myutils.js
 
 //Phương add: calenders.js
 var CALENDER2_ALARM_CALL_1 = 'Lỗi gọi lịch: không kiểm soát được mục tiêu quy định';
 var CALENDER2_ALARM_CALL_2 = "Lỗi gọi lịch: tham số quy định là không kiểm soát được mục tiêu hợp lệ";
 var CALENDER2_FORMAT_INVALID = "Định dạng ngày không hợp lệ: '";
 var CALENDER2_FORMAT_DAY_INVALID = "Ngày không hợp lệ: '";
 var CALENDER2_FORMAT_MONTH_INVALID ="Giá trị Tháng không đúng: '" ;
 var CALENDER2_FORMAT_YEAR_INVALID ="Năm vừa nhập không đúng: '" ;
 var CALENDER2_FORMAT_TRUE       = "'.\nĐịnh dạng được chấp nhận là dd/mm/yyyy.";
 var CALENDER2_FORMAT_DAY_NOT_IN_MONTH = "'.\nNgày này không tìm thấy trong tháng hiện tại.";
 var CALENDER2_FORMAT_DAY_MORE_0 = "'.\nNgày là số và lớn hơn 0.";
 var CALENDER2_FORMAT_MONTH_INPUT_INVALID ="'.\nTháng vừa nhập không đúng.";
 var CALENDER2_FORMAT_MONTH_TRUE ="'.\nTháng là số, lớn hơn 0 và nhỏ hơn 13.";
 var CALENDER2_FORMAT_YEAR_INPUT_INVALID="'.\nNăm vừa nhập không đúng.";
 var CALENDER2_FORMAT_YEAR_TRUE ="'.\nNăm phải nhập là số .";
 var CALENDER2_MONTH_IN_YEAR = "'.\nTháng cho phép nhập từ 01-12.";
 var CALENDER2_DAY_IN_MONTH = "'.\nNgày cho phép nhập là 01-";
 var CALENDER2_DAY_IN_MONTH_INVALID ="Ngày trong tháng vừa nhập không đúng: '";
 
 var CALENDER2_HOURS_INVALID       ="Giờ nhập không đúng: '" ;
 var CALENDER2_HOURS_00_23     ="'.\nChỉ cho phép nhập từ 00-23.";
 var CALENDER2_HOURS_IS_INT   =   "'.\nGiờ phải nhập số."; 
  
 var CALENDER2_MINUTES_INVALID = "Phút nhập không đúng: '";
 var CALENDER2_MINUTES_00_59 ="'.\nPhút cho phép nhập từ 00-59.";
 var CALENDER2_MINUTES_IS_INT ="'.\nPhút phải nhập số.";
 
 var CALENDER2_SECONDS_INVALID = "Giây nhập không đúng: '";
 var CALENDER2_SECONDS_00_59 =  "'.\nGiây cho phép nhập từ 00-59.";
 var CALENDER2_SECONDS_IS_INT = "'.\nGiây phải nhập số.";
 //End Phương add: calenders.js
 
 //Phuong add: subuserdevs
 var SUBUSERDEVS_SELECT_SUBUSER = "Vui lòng chọn tài khoản con!";
 //End Phuong add: subuserdevs   
 
 //Phuong add ; newtech_management
 var NEWTECH_ACTIVE   = 'Vui lòng chọn tính năng để kích hoạt.';
 var NEWTECH_AVTIVE_CONFIRM = 'Bạn có chắc muốn kích hoạt các tính năng này không?';
 var NEWTECH_DEACTIVE = 'Vui lòng chọn tính năng để bỏ kích hoạt.';
 var NEWTECH_DEAVTIVE_CONFIRM = 'Bạn có chắc muốn bỏ kích hoạt các tính năng này không?';
 var NEWTECH_VI_TITLE = 'Tiêu đề tiếng Việt là bắt buộc';
 var NEWTECH_VI_SUM   = 'Nội dung tóm tắt tiếng Việt là bắt buộc' ;
 var NEWTECH_VI_CONT  = 'Nội dung chi tiết tiếng Việt là bắt buộc' ;
 var NEWTECH_EN_TITLE = 'Tiêu đề tiếng Anh là bắt buộc';
 var NEWTECH_EN_SUM   = 'Nội dung tóm tắt tiếng Anh là bắt buộc' ;
 var NEWTECH_EN_CONT  = 'Nội dung chi tiết tiếng Anh là bắt buộc';
 var NEWTECH_DELETE_CONFIRM = 'Bạn có thật sự muốn xóa tính năng này?';
 var NEWTECH_DELETE_SELECT  = 'Không có tính năng nào được chọn!';
 //End Phuong add ; newtech_management
 
 var TITLE_DELETE_THISITEM = "Chắc chắn muốn xóa mục này?";
 var TITLE_NOT_SELECT_ITEM = "Vui lòng chọn (các) mục để xóa!";
 var TITLE_SURE_DELETE = "Chắc chắn muốn xóa (các) mục đã chọn?";
 var MSG_SYS_ACCESS_DENIED = "Bạn không có quyền truy cập chức năng này.";
 
 var  TITLE_ENTER_FROM_DATE = "Vui lòng nhập từ ngày."  ;
 var  TITLE_ENTER_TO_DATE = "Vui lòng nhập đến ngày."   ; 
 var  TITLE_INVALID_FROM_DATE = "Kiểu dữ liệu từ ngày sai định dạng."    ;
 var  TITLE_INVALID_TO_DATE = "Kiểu dữ liệu đến ngày sai định dạng."    ;
 var  TITLE_SELECT_ACCOUNT = "Vui lòng chọn tài khoản."    ;
 var  TITLE_SELECT_VIHICLE = "Vui lòng chọn phương tiện."    ;
 var  TITLE_SELECT_DEVICE = "Vui lòng chọn thiết bị."    ;
 var  TITLE_INVALID_DATE = "Ngày tháng không hợp lệ."  ; 
 var  TITLE_TO_DATE_MUST_GREATER_FROM_DATE = "Thời gian kết thúc không được nhỏ hơn thời gian bắt đầu." ;
 var  TITLE_VIEW_IN_TWO_MONTH = "Vui lòng xem báo cáo nhỏ hơn 2 tháng." ; 
 var MSG_USER_NOTSPACE_USERNAME = "Tên đăng nhập không có khoảng trắng.";
 var MSG_USER_NOTSPECIAL_USERNAME ="Tên đăng nhập không được có ký tự đặc biệt";
 
 
