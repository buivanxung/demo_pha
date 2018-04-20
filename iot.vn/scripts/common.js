var firefox=document.getElementById&&!document.all;
document.onmousemove=mouseMove;
var timePrevious = Date.now();
function mouseMove(e){                                                                                                        
var str;
var x,y;
if (firefox)
{

 x = e.clientX;
 y = e.clientY;
}
else
{
 
   x = event.clientX; 
   y = event.clientY; 
}
}

function call_user_func_array(cb, parameters) {
     var func;
 
    if (typeof cb === 'string') {
        func = (typeof this[cb] === 'function') ? this[cb] : func = (new Function(null, 'return ' + cb))();
    }
    else if (Object.prototype.toString.call(cb) === '[object Array]') {
        func = (typeof cb[0] == 'string') ? eval(cb[0] + "['" + cb[1] + "']") : func = cb[0][cb[1]];
    }
    else if (typeof cb === 'function') {
        func = cb;
    }
    if (typeof func !== 'function') {
        throw new Error(func + ' is not a valid function');
    }
return  func.apply(null, parameters) ;

}
function Add(){
    $('#divFormAdd').dialog('option', 'title', 'Them user');
    $('#divFormAdd').dialog('option','height',305);
    $('#divFormAdd').dialog('open');      
}
function CloseFormAdd(){
     $('#divFormAdd').dialog('close');      
}
function SaveFormAdd(oform,cus){
    var params = new Array();
    var elem = oform.elements;
    var flength = elem.length;    
    for(i=0;i<flength;i++){    
        if(elem[i].type !='button'&&elem[i].type !='reset'){
            if(elem[i].type!='checkbox'){
                 params[elem[i].id]=elem[i].value;
            }else{
               if($('#'+elem[i].id).attr('checked')==false){
                   params[elem[i].id]=0;
               }else{
                  params[elem[i].id]=1; 
               }
            }
           
        }
    }
    params['hdSaveStatus']=$('#hdSaveStatus').val();
    params['hdSaveId']=$('#hdSaveId').val();
    params['hdtable']=$('#hdtable').val();
    if(cus){
       xajax_SaveFormCus(params);  
    }else{
      xajax_SaveFormAdd(params);    
    }
       
}
function slideToggletemp(menu){
        var hdmenu = '#'+menu;
        $(hdmenu).val(0); 
        $('#hdmenu').val(hdmenu); 
}

$(function() {
        $( "input:submit, button" ).button();
        $( "a", ".demo" ).click(function() { return false; });
});
function changdisplay(id){
        if(id==1){
        $('#tabs').css('display','none'); 
        $('#tabs2').css('display','');   
        }else{
        $('#tabs').css('display',''); 
        $('#tabs2').css('display','none');   
        }
}

function SearchDataView(oform){
    var params = new Array();
    var elem = oform.elements;
    var flength = elem.length;    
    for(i=0;i<flength;i++){    
       if(elem[i].type !='button'&&elem[i].type !='reset'){
            if(elem[i].type!='checkbox'){
                 params[elem[i].id]=elem[i].value;
            }else{
               if($('#'+elem[i].id).attr('checked')==false){
                   params[elem[i].id]=0;
               }else{
                  params[elem[i].id]=1; 
               }
            }
           
        }
    }
    params['hdSaveStatus']=$('#hdSaveStatus').val();
    params['hdSaveId']=$('#hdSaveId').val();
    params['hdtable']=$('#hdtable').val();
    xajax_SearchDataView(params);    
}


function DeleteData(){
        var arID = new Array();
        var i = 0;
        $('INPUT[name=chkDelete]').each(function(){
            if($(this).attr('checked'))
            {
                arID[i] = $(this).attr('id');
                i++;
            }
        });
        var table = $('#hdtable').val();
        xajax_DeleteData(arID,table);        
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

function deletea(id){
     tmpObj = document.getElementById(id);
    tmpObj.style.display = "none";
}
var cal1 = CreateCalObject('txtFromDate', 'imgCal1');
var cal2 = CreateCalObject('txtToDate', 'imgCal2');

function fn_CheckAll(chkId,chksubName)
{
   
   var bCheck = document.getElementById(chkId).checked ;   
   $('INPUT[name="'+chksubName+'"]').attr('checked', bCheck);
  // filterChange();     
}
function fn_SubChkChange(chkId,chksubName)
{
   var test = true;    
   $('INPUT[name="'+chksubName+'"]').each(function()
    {
        if($(this).attr('checked')!='checked') 
        {
           test = false ;         
        }
    });
    
    $("#"+chkId).attr('checked', test) ;    
}
// ham nay dung de hien thi cac the div theo id duoc chon
function changeDisplay(id){
    var arrId = new Array();
    arrId[0]=1;
    arrId[1]=3;
    arrId[2]=4;
    arrId[3]=2;
    for(i=0;i<arrId.length;i++){
        $('#divTab'+arrId[i]).css('display','none');
    }
     $('#divTab'+id).css('display','');  
    
}
// hàm dùng để chuyển đổi trạng thái hiển thị hoặc hok hiển thị của div
function toggleDisplay(obj,id){
    if($('#'+id).css('display')=='none'){
       $('#'+id).css('display',''); 
    }else{
       $('#'+id).css('display','none');   
    }
    return false;
}

function formattab(){    
    for(i=0;i<arrId.length;i++){
      changeTab(id);
    }  
}

function changeTab(id){
    $( "#divTab"+id ).tabs({
        cache : false,
        ajaxOptions: {
            error: function( xhr, status, index, anchor ) {
                $( anchor.hash ).html(
                    "Couldn't load this tab. We'll try to fix this as soon as possible. " +
                    "If this wouldn't be a demo." );
            }
        }
    });
}

 function InitGridTable(id){
     
     $("#"+id).tablesorter({ debug: false, sortList: [[0, 0]], widgets: ['zebra', 'columnHighlight'] })
                .tablesorterPager({ container: $("#pagerOne"), positionFixed: false });
     
 }
 
 function changeActive(id){
     var name = id;
   if($('#'+name).attr('src')=='images/icons/icon-active.gif'){
      $('#'+name).attr('src','images/icons/icon-deactivated.gif') ;
      $('#'+name).attr('title','Kích hoạt') ;
   }else{
      $('#'+name).attr('src','images/icons/icon-active.gif') ;
      $('#'+name).attr('title','Bỏ kích hoạt') ; 
   }
}

function initForm(formid){
   $('#' + formid).find('.lblRequired').prepend('<img width="12" height="12" style="float:right" src="iot.vn/images/menu/constraint_3.png">');  
  // $('#' + formid).find('.datepicker').attr('title',TEXT_DATEPICKER );
   $('#' + formid).find('.dpkstart').attr('title',TEXT_DATEPICKER_START );
   $('#' + formid).find('.dpkstart').attr('alt',TEXT_DATEPICKER_START );
   $('#' + formid).find('.dpkend').attr('title',TEXT_DATEPICKER_END );
   $('#' + formid).find('.dpkend').attr('alt',TEXT_DATEPICKER_END );
   $('#' + formid).find('.isNumber').attr('title', NUMBER_REQUIRED);
   $('#' + formid).find('.isNumber').css('text-align', 'right');
   $('#' + formid).find('.isEmail').attr('title', EMAIL_REQUIRED);
   $('#' + formid).find('.cbbRequired').attr('title', CBB_REQUIRED);
   $('#' + formid).find('.isName').attr('title', NAME_REQUIRED);
   $('#' + formid).find('.isChar').attr('title', CHAR_REQUIRED);
   $('#' + formid).find('.txtRequired').bind('focus',function(){
      // $(this).removeClass('txtFormatRequired');       
       if($(this).val()==TEXT_REQUIRED){
          $(this).val('') ;
       }

   });   
/*   $('#' + formid).find('.isNumber').bind('keypress',function(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode <= 31 || ALLOWCHARCODE.in_array(charCode)|| NUMBERCHARCODE.in_array(charCode))
            return true;
         return false; 
   });  */
   
    $('#' + formid).find('.isNumber').each(function(){
        $(this).jStepper({minValue:0});
   });
   
   $('#' + formid).find('.isName').bind('keypress',function(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode <= 31|| ALLOWCHARCODE.in_array(charCode) || UPPERCHARCODE.in_array(charCode) 
         || LOWERCHARCODE.in_array(charCode)|| NUMBERCHARCODE.in_array(charCode)
         || SPECIELCHARCODE.in_array(charCode) )
            return true;
         return false; 
   });
   $('#' + formid).find('.isChar').bind('keypress',function(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode <= 32  || ALLOWCHARCODE.in_array(charCode)  || UPPERCHARCODE.in_array(charCode)||LOWERCHARCODE.in_array(charCode) )
            return true;
         return false; 
   });    
    
   $('#' + formid).find('.txtRequired').bind('blur',function(){
       
       if($(this).val()!=''){
           $(this).css('background-color', 'transparent');
       }
   });
   
    $('#' + formid).find('.cbbRequired').bind('change',function(){
       if($(this).val()!=''){
           $(this).css('background-color', 'transparent');
       }
   });
   
   //$('#' + formid).find('.txtRequired').attr('placeholder',TEXT_REQUIRED);  
   $('#' + formid).find('.txtRequired').attr('title',TEXT_REQUIRED);  
   $('#' + formid).find('.txtRequired').attr('alt',TEXT_REQUIRED);  
}

function checkValidate1(obj){
    if(!$(obj).hasClass('validate')){
        return true;
    }
    tbl_id = $(obj).attr('for');
    var parent = $('#'+tbl_id);
    var test=true;
       $(parent).find('.txtRequired').each(function(){
           if($(this).css('display')!='none'&&$(this).attr('disabled')!='disabled'){
               var val = $.trim($(this).val());
               if(val==''){
                 $(this).addClass('clsInvalid'); 
                 test = false; 
               }
           }
          
       });
       
       $(parent).find('.cbbRequired').each(function(){
           if($(this).css('display')!='none'&&$(this).attr('disabled')!='disabled'){
               var val = $.trim($(this).val());
               if(val==''||val=='-1'){
                 $(this).addClass('clsInvalid'); 
                 test = false; 
               }
           }
       }); 
        
       $(parent).find('.isEmail').each(function(){
           if($(this).css('display')!='none'&&$(this).attr('disabled')!='disabled'){
               var val = $.trim($(this).val());
               if(val.length>0){
                 if(!ExpEmail.exec(val)){
                      $(this).addClass('clsInvalid'); 
                     test = false; 
                 }
               }
               
           }
       });
       $(parent).find('.isFloat').each(function(){
           if($(this).css('display')!='none'&&$(this).attr('disabled')!='disabled'){
               var val = $.trim($(this).val());
               if(!ExpFloat.exec(val)){
                  $(this).addClass('clsInvalid');
                 test = false; 
               }
           }
       });
       $(parent).find('.isDate').each(function(){
           if($(this).css('display')!='none'&&$(this).attr('disabled')!='disabled'){
               var val = $.trim($(this).val());
               if(!ExpDayMonthYear.exec(val)){
                  $(this).addClass('clsInvalid');
                 test = false; 
               }
           }
       });
       $(parent).find('.isPhoneList').each(function(){
           var val = $.trim($(this).val());           
           if(!ValidatePhoneList(val)){
              $(this).addClass('clsInvalid'); 
             test = false; 
           }
       }); 
       
       return test;      
}


function checkValidateReport(obj){
    if(!$(obj).hasClass('validate')){
        return true;
    }
    var parent =  $(obj).parents('table:eq(0)');
    var test=true;
       $(parent).find('.txtRequired').each(function(){
           var val = $.trim($(this).val());
           if(val==''){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       }); 
       $(parent).find('.isEmail').each(function(){
           var val = $.trim($(this).val());
           if(!ExpEmail.exec(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });
       $(parent).find('.isFloat').each(function(){
           var val = $.trim($(this).val());
           if(!ExpFloat.exec(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });
       $(parent).find('.isDate').each(function(){
           var val = $.trim($(this).val());
           if(!ExpDayMonthYear.exec(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });       
       $(parent).find('.isPhoneList').each(function(){
           var val = $.trim($(this).val());           
           if(!ValidatePhoneList(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });       
       return test;      
}



function checkValidate(formid){
    var test=true;
       $('#' + formid).find('.txtRequired').each(function(){
           var val = $.trim($(this).val());
           if(val==''||val==TEXT_REQUIRED){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       }); 
       $('#' + formid).find('.isEmail').each(function(){
           var val = $.trim($(this).val());
           if(!ExpEmail.exec(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });
       $('#' + formid).find('.isFloat').each(function(){
           var val = $.trim($(this).val());
           if(!ExpFloat.exec(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });
       $('#' + formid).find('.isDate').each(function(){
           var val = $.trim($(this).val());
           if(!ExpDayMonthYear.exec(val)){
             $(this).css('background-color', '#567890'); 
             test = false; 
           }
       });
       $('#' + formid).find('.isPhoneList').each(function(){
           var val = $.trim($(this).val());           
           if(!ValidatePhoneList(val)){
             $(this).css('background-color', COLOR_ALERT); 
             test = false; 
           }
       });       
       
       $('#' + formid).find(':input').attr('disabled','');
       return test;
      
}

Array.prototype.in_array = function(p_val) {
    for(var i = 0, l = this.length; i < l; i++) {
        if(this[i] == p_val) {
            return true;
        }
    }
    return false;
}


function changeWaiting(type){
    if(type==0){
       $('#divWaiting').css('display','block'); 
    }else{
       $('#divWaiting').css('display','none');
    }
}

function filterChange(){    
      $("div.dataTables_scrollBody").find(".checkOne").each( function() {
      var tr = $(this).parent().parent();
     if ( $(this).attr("checked") )
      {
         $(tr).addClass("row_selected");
      }
      else
      {  
        $(tr).removeClass("row_selected");
      }                                           
    });
}

 function getParams(obj){
     var result = new Array();
     tbl_id = $(obj).attr('for');
     var parent = $('#'+tbl_id);
     $(parent).find(':input:not(:button)').each(function(){
         try{
             var arr = new Array();
             arr = $(this).attr('id').split('_');             
             id = arr[0];
             if(arr.length>1){
                id = arr[1];  
             }
            if($(this).attr('type')=='radio'||$(this).attr('type')=='checkbox'){
                    if($(this).prop('checked')){
                        if($(this).attr('type')=='radio'){
                            arrname = $(this).attr('name').split('_');             
                             name = arrname[0];
                             if(arrname.length>1){
                                name = arrname[1];  
                             }                            
                            result[name]=$.trim($(this).val());
                        }else{
                             result[id] = 1; 
                        }
                   
                    }else{
                        if($(this).attr('type')!='radio'){
                          result[id] = 0;   
                        }                       
                    }
                           
            }else{
                
               result[id]=$(this).val(); 
               if($(this).hasClass('txtTien')){
                 result[id] = replaceTien(result[id]);                 
               }               
               if($(this).hasClass('datereport')){
                 result[id] = ConvertoDateEN(result[id]);                 
               }
               
            }
         }catch(err){
             alert(err);
         }
        
     })  ;    
     return result;
 }

 function checkAll(){
      $('.checkAll').each(function(){
           var tblparent = $(this).parents('table:eq(1)');
              var test = $(this).attr('checked');  
              
              $(tblparent).find('.checkOne').each(function(){
                  $(this).attr('checked',test);  
              });
      });
      //filterChange(); 
 }
 
  function checkOne(){      
      //var test = true;
      $('div.divGrid').each(function(){
          var test = true;
          var display = 'none';
          var flg = false;
          $(this).find('.checkOne').each(function(){
                    flg = true;
                      if(!$(this).attr('checked')){
                         test=false; 
                      }else{
                         display = ''; 
                      }
                    
          });
           $(this).find('.checkAll').attr('checked',test&&flg);
/*           $(this).find('.deleteAll').css('display',display);  */
                     
      });  

      //filterChange(); 
 }
 function deleteRowlogic(){
    var anSelected = fnGetSelected( oTable );
    for ( var i=0 ; i<anSelected.length ; i++ )
    {
    oTable.fnDeleteRow( anSelected[i] );
    } 
 }
 

function changeCssEdit(id){
    return false;
}


function createReport(divId){
    arr = divId.split('-');
    $('#'+divId).attr('width','800px');
    var tableId = arr[0]+'_tbl_' + arr[1];
    $('#'+divId+' table:eq(0)').attr('id',tableId);
    $('#'+tableId).attr('width','100%');
    
    dataTableObj.CreatDataTable(tableId);
}

/*flg=0; tieng viet,1 tieng ang 
has_time=0; la khong co;
has_time = 1 la bat dau 00:00:00,
has_time = 2 la ket thuc 23:59:59
has_time = 3 la ket thuc now
*/
function GetToday(flg,has_time,add_date){
    if(typeof(add_date)=='undefined'){
       add_date=0; 
    }
    var time='';
    switch(has_time){
        case 0:time='';break;
        case 1:time=' 00:00';break;
        case 2:time=' 23:59';break;        
    }                
    var now = new Date();  
    now.setDate(now.getDate() - add_date); 
    var y = now.getFullYear();
    var m = parseInt(now.getMonth()) + 1; 
    var d = now.getDate();
    var YMD = '';
    m = (m< 10?'0'+m:m);
    d = (d< 10?'0'+d:d);
    if(flg!=1){
     YMD = d+'/'+m+'/'+y+time;    
    }else{
      YMD = y+'-'+m+'-'+d+time;   
    }     
    return YMD;  
}


function GetCurrentDay(){
    var now = new Date();
    var d = now.getDate();
    return d; 
}
function GetCurrentMonth(){
     var now = new Date();
    var m = parseInt(now.getMonth()) + 1; 
    return m; 
}
function GetCurrentYear(){
    var now = new Date();
    var y=now.getFullYear();
    return y; 
}

/*flg=0; tieng viet,1 tieng ang 
has_time=0; la khong co;
has_time = 1 la bat dau 00:00:00,
has_time = 2 la ket thuc 23:59:59
has_time = 3 la ket thuc now
*/
function GetStartDay(flg,has_time){
    var now = new Date();
    var y = now.getFullYear();
    var m = parseInt(now.getMonth()) + 1; 
    var time='';
    switch(has_time){
        case 0:time='';break;
        case 1:time=' 00:00';break;
        case 2:time=' 23:59';break;
    }
    var YMD ='';
    m = (m< 10?'0'+m:m);
    if(flg!=1){
     YMD = '01/'+m+'/'+y+time;   
    }else{
     YMD = y+'-'+m+'-01'+time;
    }
    return YMD;  
}


function GetHHMM(){
    var now = new Date();
    var hh = now.getHours();
    var mm = now.getMinutes(); 
    return hh+'h'+mm;     
}

function focusbutton(index){
    $('.cls_focus').removeClass('cls_focus');
    $('#mainbtn-'+index).addClass('cls_focus');
    $('#mainbtn-'+index).addClass('ui-state-hover');
    
    if(hasChange && hasScrMngr){
        hasChange = false;
        changeWaiting(0);
        xajax_fmfrmmanager_init(); 
    }
            
}

function createArrConditionExeport(reportId,strTitle,strValue){
    
}
////////////////////////////////////// format number
// onkeypress="validate(event)" onkeyup="NumericDotOnly(this)"
$(function() {

//    $( ".txtTien").live().keypress(function(event) {
//        validate(event);
//    });
    $(document).delegate(".txtTien",'keydown',function(event) {
        validate(event);
    });
    $(document).delegate(".txtTien",'keyup',function() {
        NumericDotOnly(this);
    });
    //$('.txtTien').bind('keyup', function() { NumericDotOnly(this); } );
});

function NumericDotOnly(obj)
{
    obj.value =numberFormat(obj.value);
}
function numberFormat(nr){
    //remove the existing ,
    var regex = /,/g;
    nr = nr.replace(regex,'');
    //force it to be a string
    nr += '';
    //split it into 2 parts  (for numbers with decimals, ex: 125.05125)
    var x = nr.split('.');
    var p1 = x[0];
    var p2 = x.length > 1 ? '.' + x[1] : '';
    //match groups of 3 numbers (0-9) and add , between them
    regex = /(\d+)(\d{3})/;
    while (regex.test(p1)) {
        p1 = p1.replace(regex, '$1' + ',' + '$2');
    }
    //join the 2 parts and return the formatted number
    return p1;
}
function validate(evt) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    if(key===8) {return;} //neu xoa lui thi cho phep
    key = String.fromCharCode( key );
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}

function replaceTien(src){
    return src.replace(/,/g,'');
}
/*
 Chuyển một chuyển kiểu ngày tháng bất kì sang kiểu ngày tháng theo định dạng yyyy/mm/dd 
*/
function ConvertoDateEN(dt){
   var arr = dt.split(' ');
    
    var t = "";
    
    // Time
    if (arr.length > 1) 
    {
        t = arr[1];            
    }
    // Date
    arr1 = arr[0].split('/');
    if(arr1.length>1){
       var s = "";
        if (t != "") 
        {
            s = arr1[2] + "-" + arr1[1] + "-" + arr1[0] + " " + t;
        }
        else
        {
           s = arr1[2] + "-" + arr1[1] + "-" + arr1[0];
        }  
    }else{
        return dt;
    }
    
   
    
    return s;
    
}

function checkListPhone(strphone,checkEmty){// kiểm tra xem chuổi đưa vào có đúng định dạng số điện thoại hay ko
     var ExpPhoneSMS = /^(\d)+(\d|.|-)*(\d)$/;  
      var $phonenumber = strphone;
      if($phonenumber.length==0 && checkEmty){
          alert('Vui lòng nhập số điện thoại cần gửi');
          return false;
      } 
   var arrPhone = new Array();
   arrPhone = $phonenumber.split(";");

   flg = true; 
   for(var i = 0;i<arrPhone.length;i++){
     if(!ExpPhoneSMS.test(arrPhone[i])){
         flg = false;
         break;
     }  
   }
   if(!flg){
     alert('Vui lòng nhập (danh sách) số điện thoại cho chính xác');
          return false;  
   }
   return true;   
}

function ValidatePhoneList(strphone){// kiểm tra xem chuổi đưa vào có đúng định dạng số điện thoại hay ko
     var ExpPhoneSMS = /^(\d)+(\d|.|-)*(\d)$/;  
      var $phonenumber = strphone;
      if($phonenumber.length==0){          
          return true;
      } 
   var arrPhone = new Array();
   arrPhone = $phonenumber.split(";");

   flg = true; 
   for(var i = 0;i<arrPhone.length;i++){
     if(!ExpPhoneSMS.test(arrPhone[i])){
         flg = false;
         break;
     }  
   }

   return flg;   
}

function checkStatusSMS(){
    if(STATUS_SMS ==0) return true;
    switch(STATUS_SMS){
        case 1: alert('Đang cập nhật chương trình nhắn tin');break;
        case 2: alert('Chương trình nhắn tin đang gặp sự cố');break;
        default: alert('Chương trình nhắn tin đang được bảo trì');break;    
    }
    return false;
}

//success  =0 :Lưu lại thất bại
//success  =1 :Thêm mới thất bại
//status  =1 :Update
//status  =0 :Thêm mới
//formId   :Id của form vừa submit


function checkUpdateStatus(success,formId,status){
    if(success==0){
        if(status=='1'){
          alert('Lưu thất bại, vui lòng thử lại!');  
        }else{
          alert('Thêm mới thất bại, vui lòng thử lại!');  
        }
    }else{
        $('#'+formId+'_submit').html(NAME_INSERT);
        $('#'+formId+'_hdEdit').val(0);
        $('#'+formId+'_hdId').val('');
    }
/*    switch(status){
      case -2: alert('Lưu thất bại, vui lòng thử lại!');break;  
      case -1: alert('Thêm mới thất bại, vui lòng thử lại!');break;  
      default: 
      $('#'+formId+'_submit').html(NAME_INSERT);
      $('#'+formId+'_hdEdit').val(0);
      $('#'+formId+'_hdId').val('');
      break;
    }*/
    changeWaiting(1);
    
}

function formatMoney(result){
    result+='';
  return  result.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,");   
}

function strip(html)
{
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   return tmp.textContent || tmp.innerText || "";
}
 
function checkHtmlTag(html)
{
   var tmp = document.createElement("DIV");
   tmp.innerHTML = html;
   str_new = tmp.textContent || tmp.innerText || "";
  if(str_new!=html){
      return true; 
  }
  return false;
}
/*
 Hàm này dùng để set back ground của from đó về dạng tranparents
 nếu self=true thì là reset_backround cho chính nó
*/
function resetBGForm(fromId,self){
    if(self){
       $('#'+fromId).css('background-color','transparent');
       return;   
    }
    $('#'+fromId).find(':input').css('background-color','transparent');
    
}
/*
 Hàm này dùng để set back ground của control do theo mau canh bao
*/
function setBG(ctrlID){
   $('#'+ctrlID).css('background-color',COLOR_ALERT);  
}
/* hàm biết đổi thời gian từ giây sang kiểu giờ:phút:giây*/
function creaeteTime(time,frm){   
     h = parseInt(time/3600);
     m = parseInt((parseInt(time%3600))/60);
     s = parseInt(time%60);
     sep =':';
     var d = new Date();
     var n = d.getSeconds(); 
     odd = n%2;
     if(odd==0){
        sep ='<font color="#5F98C1">:</font>';
     }
     
     h = h<10?'0'+h:h;
     m = m<10?'0'+m:m;
     s = s<10?'0'+s:s;
     result =''; 
     switch(frm){
         case 'S': result=m+":"+s;break;
         case 's': result=h+":"+m+":"+s;break;
         case 'm': result=h+sep+m;break;
         case 'h': result=h ; break;
         default :result=h+":"+m+":"+s;break;
     }
     return result;
}

function add_stt(tbl_id){
     index = 1;
     $("#"+tbl_id +' tbody').find('tr:not(.trlast)').each(function(){
         if(!$(this).hasClass('pr-group')){
             td_stt =$(this).find('.stt:first').html(index++);
         }
        
     });     
}

function changerow(tbl_id,id_new,thutu){
   //alert(thutu);
   
   obj_tr= $("#"+tbl_id +' tbody tr:eq('+thutu+')');
   if(obj_tr.hasClass('trlast')){
       addrow = table_map[tbl_id]['trlast'];
       //alert(2);
       obj_tr.before(addrow);       
   }
   obj_tr.removeClass('trlast').removeClass('clsnew');
   image_new = table_map['common_edit'];
   obj_tr.find('td.clsaction:first').html(image_new);
   obj_tr.find('td.tdactive:first').html(table_map['common_active']);
  // alert();
   if(id_new!=''){
      tr_id_new = table_map[tbl_id]['tr_prefix']+id_new;
      obj_tr.attr('id',tr_id_new); 
   }
  // alert(table_id);
   
   add_stt(tbl_id);   
}
//tbl_id tên table
//col_index chỉ số cột cần group
//show_colname hiển thị tên cột
function groupTable(tbl_id,col_index,show_colname){
    tbody = $('#'+tbl_id+' tbody');
    length = $('#'+tbl_id+' thead').find('tr:first').find('th').length-1;
    $('#'+tbl_id+' thead').find('tr:first').find('th:eq('+col_index+')').hide();
    pre_name = '';
    tr_index =0;
    tbody.find('tr').each(function(){
        tr_obj = $(this);
        current_name = tr_obj.find('td:eq('+col_index+')').html();
        
        tr_obj.find('td:eq('+col_index+')').hide();
        if(pre_name!=current_name){
            
            //alert(current_name);
            str = '<tr class="pr-group expand"><td colspan="'+length+'" >'+current_name+'</td></tr>';
            pre_name = current_name;
            //$('#'+tbl_id+' tbody').prepend(str);
            //alert(str);
            tr_obj.before(str);
            tr_index++;
            
        }else{           
           tr_index++; 
        }
        tr_obj.addClass('item');
    });    
}

$(document).ready(function (){
    
    
$(document).delegate('.clsundo','click',function(){ 
            $parent=$(this).parents('tr:first'); 
            $id=$parent.attr('id'); 
            tbl_id = $parent.parents('table:first').attr('id');
            var index=0;
            $parent.find('td.editable').each(function(){
            $(this).css('background-color','transparent'); 
                 if($(this).find('select').length>0){
                     $(this).find('select:first').val(fm_storage[tbl_id][$id][index++]);
                   $(this).find('select:first').attr('disabled','disabled'); 
                                      
                }else if($(this).find(':checkbox').length>0){
                   $(this).find(':checkbox:first').prop('disabled','disabled'); 
                   $(this).find(':checkbox:first').prop('checked',fm_storage[tbl_id][$id][index++]); 
               }else{
                   Ihtml = fm_storage[tbl_id][$id][index++];
                   $(this).html(Ihtml);
                }
        });
        $parent.find('td.clsaction:first').html('<img src="iot.vn/images/edit.png" title="Bấm để sửa thông tin dòng này!" class="clsedit"/><img src="iot.vn/images/delete.png" title="Bấm để xóa thông tin dòng này!" class="clsdelete"/>');
});

  $(document).delegate('.clsdelete','click',function(){
      tbl_id = $(this).parents('table:first').attr('id');
      name = table_map[tbl_id]['name'];
      
        if(confirm('Bạn muốn xóa '+name+' này?')){
           obj_tr=$(this).parents('tr:first');
           id= obj_tr.attr('id');
           switch(tbl_id){
               case 'f02_tbl':xajax_f02_delete(id);break;
               case 'f12_tbl':xajax_f12_delete(id);break;
               case 'f13_tbl':xajax_f13_delete(id);break;
               case 'f13_tbl_ldv':xajax_f13_delete_ldv(id);break;
               case 'f14_tbl':xajax_f14_delete(id);break;
               case 'f14_tbl_lsp':xajax_f14_delete_lsp(id);break;
               case 'f15_tbl':xajax_f15_delete(id);break;
               case 'f17_tbl':xajax_f17_delete(id);break;
               case 'f18_tbl':xajax_f18_delete(id);break;
               case 'f19_tbl':xajax_f19_delete(id);break;
           }
           
           obj_tr.remove();
           add_stt(tbl_id);
        }
    });
    

$(document).delegate('.clsedit','click',function(){ 

        $parent=$(this).parents('tr:first'); 
        $id = $parent.attr('id');
        tbl_id = $parent.parents('table:first').attr('id');
        index=0;
        if(typeof(fm_storage[tbl_id])=='undefined'){
            fm_storage[tbl_id] = new Object();
        }
        fm_storage[tbl_id][$id]= new Array();
        $parent.find('td.editable').each(function(){
            if($(this).find('select').length>0){
               $(this).find('select:first').removeAttr('disabled'); 
               fm_storage[tbl_id][$id][index++]=$(this).find('select:first').val();
               
            }else if($(this).find(':checkbox').length>0){
               $(this).find(':checkbox:first').removeAttr('disabled'); 
               fm_storage[tbl_id][$id][index++]=$(this).find(':checkbox:first').prop('checked'); 
            }else{
               Ihtml = $(this).html();
               fm_storage[tbl_id][$id][index++]=Ihtml;
               txt='<input type="text" value="'+Ihtml+'" class="w100"/>'; 
               $(this).html(txt);
            }
        });
        $parent.find('td.clsaction:first').html(table_map['common_undo']);
    }); 
    
    $(document).delegate('.save','click',function(){
        tbl_id = $(this).attr('for');
        var parent = $('#'+tbl_id);
        $(parent).find(":input:not(:radio):not(:button)").removeClass('clsInvalid');  
        var arr = new Array();
        arr = tbl_id.split('_');       
        var funcname = 'xajax_'+arr[0]+'_save';
        if(checkValidate1(this)){
            var params = new Array();
            var arguments = getParams(this);
            params[0]=arguments;
            changeWaiting(0); 
        
            call_user_func_array(funcname,params);
        }      
    });
    
   /* $(document).delegate('.named','click',function(){
        id = $(this).attr(id);
        alert(id);
        if(power_type=='0'){ 
           $('#w01_hd_sysNameId').val('')
        }
          
    });   */
    
    
    
    
    
    $(document).delegate('.clssave','click',function(){
        tbl_id = $(this).parents('table:first').attr('id');
        $parent=$(this).parents('tr:first');   
       test=false; 
        var param = new Array();
       var index = 1;
        param['stt']= $parent.index();
        param['id']=typeof($parent.attr('id'))=='undefined'?'':$parent.attr('id');  
 
        $parent.find('td.editable').each(function(){
            
        html ='';
        if($(this).find(':checkbox').length>0){
          html =   $(this).find(':checkbox:first').prop('checked')?1:0;
        }else{
           html = $.trim($(this).find('input:not(:checkbox):first').val())||$.trim($(this).find(':selected').val()); 
        }
          
           
           $(this).removeClass('clsInvalid'); 
           param[index++]= html;  
           if($(this).hasClass('required')){
               if(html==''){
                  $(this).addClass('clsInvalid');
                  test=true;
               }
           }                 

        });
        
        cur_index = $parent.index();
        hasParent = false; // chưa tìm đuợc cha
        tbody_pr = $parent.parent();
        if(tbody_pr.find('.pr-group').length>0){
            while(!hasParent&&cur_index>=0){
                cur_index--;
                tr_cur = $('#'+tbl_id+' tbody tr:eq('+cur_index+')');
              if(tr_cur.hasClass('pr-group')){
                  tr_id =tr_cur.attr('id'); 
                  arr_id = tr_id.split('-');
                  id = arr_id[1];
                  param['parent_id']=id;
                  hasParent= true;//đã tìm đuợc cha
              }  // truờng hợp chưa tìm đuợc cha thì phải tìm thêm
            }            
        }        
        if(test){
            alert('vui lòng nhập đầy đủ thông tin');
            return false;
        }
       
              
       $parent.find('td.editable').each(function(){
           $(this).css('background-color','transparent');
           if($(this).find('select').length>0){
            $(this).find('select:first').attr('disabled','disabled') ;  
           }else if($(this).find(':checkbox').length>0){
              $(this).find(':checkbox').attr('disabled','disabled') ;    
           }else{
              html =$.trim($(this).find('input:first').val());           
              $(this).html(html); 
           }
           
        }); 
        switch(tbl_id){
            case 'f02_tbl':xajax_f02_save(param);break;
            case 'f12_tbl':xajax_f12_save(param);break;
            //case 'f03_tbl':xajax_f03_save(param);break;
            case 'f13_tbl':xajax_f13_save(param);break;
            case 'f13_tbl_ldv':xajax_f13_save_ldv(param);break;
            case 'f14_tbl':xajax_f14_save(param);break;
            case 'f14_tbl_lsp':xajax_f14_save_lsp(param);break;
            case 'f15_tbl':xajax_f15_save(param);break;
            case 'f17_tbl':xajax_f17_save(param);break;
            case 'f18_tbl':xajax_f18_save(param);break;
            case 'f19_tbl':xajax_f19_save(param);break;
        }
        
    });

    
    $(document).delegate('.pr-group','click',function(){
        var tblparent = $(this).parents('table:eq(0) tbody');
        curr_html = $(this).find('td:first').html();
        index_tr =0;
        flg_expand =0;

        if($(this).hasClass('rutgon')){
            $(this).removeClass('rutgon').addClass('expand');
            flg_expand =1;
        }else{
           $(this).removeClass('expand').addClass('rutgon'); 
        }
        flg_index = true;
         curr_index = $(this).index();
         test = true;
         while(test){
             curr_index++;
             tr_item=tblparent.find('tr:eq('+curr_index+')');
             if(tr_item.hasClass('item')){
                 if(flg_expand==1){
                    tr_item.show('slow'); 
                 }else{
                   tr_item.hide('slow');  
                 }
                 
             }else{
               test  = false;
             }
         }
        
    });   
    
     $(document).delegate('.checkAll','click',function(){
        var tblparent = $(this).parents('table:eq(0)');
        var test = $(this).prop('checked');
        tblparent.find('.checkOne').each(function(){
         $(this).prop('checked',test); 
        }) ;     
        if(test){
        tblparent.find('.deleteAll').css('display','');  
        } else{
       tblparent.find('.deleteAll').css('display','none');
        }
        //filterChange();   
    });
    
    

    $(document).delegate('.checkOne','click',function(){
        var tblparent = $(this).parents('table:eq(0)');
        var test = $(this).prop('checked');
        var display = 'none';  
        $(tblparent).find('.checkOne').each(function(){
        if(!$(this).prop('checked')){
            test=false; 
        }else{
            display = '';
        }
        });
        tblparent.find('.deleteAll').css('display','');
        tblparent.find('.checkAll').prop('checked',test);
        var tr = $(this).find('tr:first');
        if ( $(this).prop("checked") )
        {
            $(tr).addClass("row_selected");
        }
        else
        {  
            $(tr).removeClass("row_selected");
        }                                           
    });

    $(document).delegate('.fg-button','click',function(){
        
        $('div.divGrid').each(function(){
        var display = 'none';
        var chkall = true;
        
        $(this).find('.checkOne').each(function(){
            if($(this).attr('checked')){
                display = '';  
            }else{
               chkall= false; 
            }           
        });
        $('.deleteAll').css('display',display);
        $(this).find('.checkAll').attr('checked',chkall);
        });     
    });
    
    $(document).delegate('.active','click',function(){
        var id = $(this).parents('tr:eq(0)').attr('id');
        xajax_active(id);   
    });
})

function changeActive(tr_id){
    
var img = $('#'+tr_id+' img.active:first').attr('src');
        var lastimg = 'iot.vn/images/icons/active1.gif';
        if(img=='iot.vn/images/icons/active1.gif'){
            lastimg = 'iot.vn/images/icons/active0.gif';
        }
        $('#'+tr_id).find('img.active').attr('src',lastimg);
}

function create_CBB_DVT(id){
    str = '<select class="cls_dvt"><option value="">Chọn</option>';
    for(var i in fm_info.dvt){
        selected ='';
        if(id==i){
          selected='selected="selected"';  
        }
      str+='<option value="'+i+'" '+selected+'>'+ fm_info.dvt[i].name+'</option>' ;
    }
    str+='</select>';
    return str;
}

function remove_parent(tr_code,id){
    tr_cur = $('#'+tr_code+id);
    while(tr_cur.next().hasClass('item')){
       tr_cur.next().remove(); 
    }
    tr_cur.remove();
}

function ConvertDateTime(dt) 
{    
    var arr = dt.split(' ');
    
    var t = "";
    
    // Time
    if (arr.length > 1) 
    {
        t = arr[1];            
    }
    // Date
    arr1 = arr[0].split('/');
    
    var s = "";
    if (t != "") 
    {
        s = arr1[2] + "-" + arr1[1] + "-" + arr1[0] + " " + t;
    }
    else
    {
       s = arr1[2] + "-" + arr1[1] + "-" + arr1[0];
    }
    
    return s;
}

function createDivChart(screen_id,arr_chart){
  lng = arr_chart.length;  
  str = '<div class="row">';
  flg=false;
  for(i=0;i<lng;i++){
      chart_name = arr_chart[i];
       if(i%2==0){                  
          if(flg){
            str+='</div><div class="row">';  
          }         
       }
       if(i<lng-1){
            str+='<div  class="col-xs-12 col-sm-12 col-md-6 col-lg-6 for-pdf chart-pdf" style="padding:0px" id="'+screen_id+'-'+chart_name+'" ></div>'; 
       }else{
          if(lng%2==1){
            str+='<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 for-pdf chart-pdf full-page-pdf" style="padding:0px" id="'+screen_id+'-'+chart_name+'" ></div>';      
          }else{
            str+='<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 for-pdf chart-pdf" style="padding:0px" id="'+screen_id+'-'+chart_name+'" ></div>';   
          } 
       }
       flg=true ;  
  }
  str+='</div>';
  return str; 
} 
function createLineChart(div_id,chartType,arrX,arrValue,pl_id){
   min_val = parseFloat(fm_info.limit[pl_id][chartType].min_val);
   max_val = parseFloat(fm_info.limit[pl_id][chartType].max_val); 
    var ranges = [];
    var averages = [];
        for(i in arrX[chartType]){
            if(i!='in_array'&&i!='containsValue'){
                temp_r = [arrX[chartType][i],min_val,max_val] ;
                temp_v = [arrX[chartType][i],arrValue[chartType][i]] ;
                ranges.push(temp_r);
                averages.push(temp_v);
            }
        }


    $('#'+div_id+'-'+chartType).highcharts({
    exporting: {
        enabled: false
    },

        title: {
            text: (lang_iot=='vi'?fm_info.sensor[chartType].chart_title_vi: fm_info.sensor[chartType].chart_title_en)
        },

        xAxis: {
            type: 'string'
        },

        yAxis: {
            title: {
                text: fm_info.sensor[chartType].unit
            }
        },

        tooltip: {
            crosshairs: true,
            shared: true,
            valueSuffix: ''
        },

        legend: {
        },

        series: [{
            name: ((lang_iot=='vi')?fm_info.sensor[chartType].name_vi:fm_info.sensor[chartType].name_en),
            data: averages,
            zIndex: 1,
            marker: {
                fillColor: 'red',
                lineWidth: 1,
                lineColor: Highcharts.getOptions().colors[5]
            }
        }, {
            name: ((lang_iot=='vi')?'Giới hạn':'Range'), 
            data: ranges,
            type: 'arearange',
            lineWidth: 0,
            linkedTo: ':previous',
            color: Highcharts.getOptions().colors[2],
            fillOpacity: 0.3,
            zIndex: 0
        }]
    });
    
}

function createChartTotal(div_id,chartType,arrX,arrValue,chartname,subtitle){
    var arrdata = new Array();
/*    if(div_id == 'w02_chart_dt_history'){
       txtsubtitle = date.now(); 
    } */
    for(i in arrValue){
        var temp= new Object();
        temp.data= new Array();
        temp.name='';
        if(i!='in_array'&&i!='containsValue'){  
            temp.name= ((lang_iot=='vi')?fm_info.sensor[i].name_vi:fm_info.sensor[i].name_en);
            for(k in arrValue[i]){
                if(k!='in_array'&&k!='containsValue'){
                   temp.data.push(parseFloat(arrValue[i][k]));                   
                } 
            } 
            arrdata.push(temp);
        }
    } 
    
        $('#'+div_id).highcharts({
        exporting: {
                enabled: false
        },
        title: {
            text: chartname,
            x: -20 //center
        },
        subtitle: {
            text:subtitle,
            x: -20
        },
        xAxis: {
            categories: arrX[chartType]
        },
        yAxis: {
            title: {
                text: ((lang_iot == 'vi')?'Giá Trị':'Values' )
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ''
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: arrdata
    });
    
}
function create_waspmote_type(cbb_id,flg_multi){
    multi =  flg_multi?'multiple="multiple"':'';
    str = '<select id="'+cbb_id+'"' +multi+ ' class="w100" >';
    strtemp = '';
    cnt = 0;
    for(i in fm_info.wasptype){
        if(i!='in_array'&&i!='containsValue'){
            cnt++;
           name = fm_info.wasptype[i].name;
           strtemp+='<option value="'+i+'">'+name+'</option>'; 
        }
    }
/*    if(cnt>1&&!flg_multi){
       str+='<option value="">Vui lòng chọn</option>'; 
    }*/
    str+= strtemp;
    str+='</select>';
    return str;
}
function create_waspmote(wasp_type,cbb_id,flg_multi){
    multi =  flg_multi?'multiple="multiple"':'';
    str = '<select id="'+cbb_id+'"' +multi+ ' class="w100">';
    strtemp = '';
    cnt = 0; 
    for(i in fm_info.waspmote){
        if(i!='in_array'&&i!='containsValue'){
            if(fm_info.waspmote[i].wasp_type==wasp_type){
               cnt++;
               name = (lang_iot == 'vi')?fm_info.waspmote[i].name_vi:fm_info.waspmote[i].name_en;
               strtemp+='<option value="'+i+'">'+name+'</option>'; 
           }
        }
    }
/*    if(cnt>1&&!flg_multi){
       str+='<option value="">Vui lòng chọn</option>'; 
    }  */
    str+= strtemp;
    str+='</select>';
    return str;
}
function create_sensor(wasp_type,cbb_id,flg_multi,min_width){
    multi =  flg_multi?'multiple="multiple"':'';
   // str = '<select id="'+cbb_id+'"' +multi+ ' class="w100">';
   str = '<select id="'+cbb_id+'"' +multi+ 'style="min-width:'+min_width+'%" >';
    lng = fm_info.wt_sensor[wasp_type].length;
    if(lng>1&&!flg_multi){
       str+='<option value="">Vui lòng chọn</option>'; 
    }
    for(i in fm_info.wt_sensor[wasp_type]){
        if(i!='in_array'&&i!='containsValue'){
               name = fm_info.wt_sensor[wasp_type][i];
               str+='<option value="'+name+'" selected="selected">'+name+'</option>'; 
        }
    }
    str+='</select>';
    return str;
}

// hàm này dùng đếm số phần tử trong đối tượng
function countObject(obj){
    cnt = 0;
    for(i in obj){
        if(i!='in_array'&&i!='containsValue'){
               cnt++;
        }
    }
    return cnt;  
}

 function checkLimit(id_wasp,sensor,val) { 
     max_val = fm_info.limit[id_wasp][sensor].max_val;
     min_val = fm_info.limit[id_wasp][sensor].min_val;
     if(parseFloat(val)>=parseFloat(max_val)){
         return 'cls_over';
     }
     if(parseFloat(val)<=parseFloat(min_val)){
         return 'cls_under';
     }
     return ''; 
     
 }
 
 function changeWMName(name,id){
     $('#w02_cbb_place option[value="'+id+'"]').html(name);
     $('#w01_dt_cbb_wm option[value="'+id+'"]').html(name);
     $('#w01_info-'+id).html(name);
     $('#w04_body_grid_limit #w04_tr-'+id+' td.w04_name').html(name);
     $('#w01_changename').modal('hide');
 }
 
 
 function addDate(date,numadd){
     var someDate = new Date(date);
      someDate.setDate(someDate.getDate() + numadd); 
     return  someDate.yyyymmdd();
 }
 function changeDO(val,sensor){
    return val; 
 }
 
 Date.prototype.yyyymmdd = function() {
   var yyyy = this.getFullYear();
   var mm = this.getMonth() < 9 ? "0" + (this.getMonth() + 1) : (this.getMonth() + 1); // getMonth() is zero-based
   var dd  = this.getDate() < 10 ? "0" + this.getDate() : this.getDate();
   return "".concat(yyyy).concat('-').concat(mm).concat('-').concat(dd);
  };
  
  function loadlocation(){
    str = create_waspmote(1,'w02_dt_cbb_wm',false);
    $('#w02_dt_wm').html(str);
    if(current_wm!=''){
       $('#w02_dt_cbb_wm').val(current_wm); 
    }
}

function changeLanguage(language){
   for(var i in fm_info.language){
      if(i!='in_array'&&i!='containsValue'){ 
          $('#'+i).html(fm_info.language[i][language]);  
          
      } 
   } 
}

function asignId(obj){
    id = $(obj).attr('id');
    text_vi = fm_info.language[id]['vi'];
    text_en = fm_info.language[id]['en'];
    if(power_type=='1'){ 
        $('#w01_hd_sysNameId').val(id) ;
        $('#oldtitle_vi').text(text_vi) ;
        $('#newtitle_vi').val(text_vi) ;
        $('#oldtitle_en').text(text_en) ;
        $('#newtitle_en').val(text_en) ;
    } 
	
}
   // tạo  bảng header cho bang   
