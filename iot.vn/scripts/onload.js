var current_wm ='';// luu lai ai id của waspmote vừa mới thao táo
var fm_info = new cl_info(1);// lưu lại toàn bộ cấu hình chung của hệ thống
var arrMarker= new Object(); // lưu lại các marker
var arrInfoWindow=new Object(); // lưu lại các infowidow
var arrWindow =[];
var loc_total = 0;
var loc_good = 0;
var loc_alert = 0;
var arrAo = new Array();
arrAo['good']= new Array(); // luu thong tin ma ao tot
arrAo['alert']= new Array();  // luu thong tin ma ao xau  
var cl_trking= new Object();
var arrClick=['section1'] ;
var arrExtSensor= ['-1'];

  $(function(){
      
      startTime();
         $(document).delegate('#helpdiv','click',function(){
              var id_tab ='';
            $('#nav-menu').find('.cls_module').each(function(){
                id_section ='';
                if($(this).hasClass('menu-selected')){
                 id_section = $(this).attr('id');
                 switch(id_section){
                     case 'link_section1':id_tab='w01_trangchu';break;
                     case 'link_section2':id_tab='w02_tracking';break;                     
                     case 'link_section3': 
                      id_tab = $('#w03_baocao').find('[aria-hidden=false]:first').attr('aria-labelledby');break;                   
                     case 'link_section4': id_tab = $('#tabs').find('[aria-hidden=false]:first').attr('aria-labelledby');
                     break;
                 }  
                }
              });
     
            var URL = '../help.php?helpIndex='+id_tab;
            window.open(URL,'_blank',1,1); 
        });
        $(document).delegate('.cls_module','click',function(){
            
            if($(this).hasClass('menu-selected')){
                return false;
            }
            section_id= $(this).attr('data');
            if(arrClick.indexOf(section_id)<0){               
                changeWaiting(0); 
                page_id= $(this).attr('data_page'); 
                $('#'+section_id).load('templates/water/'+page_id);
                arrClick.push(section_id);
            } 
            $('.section').hide('slow');
            $('.cls_module').removeClass('menu-selected');
            $(this).addClass('menu-selected');
            $('#'+section_id).show();            

        });            

      
      $(document).delegate("#w02_dt_cbb_wm",'change',function() {
             val = $(this).val();
             w02_detail(val);
      });      
      $(document).delegate(".cls_locname",'click',function() {
             wm = $(this).attr('data');
             html = $(this).html();
             $('#w01_txt_locname').val(html);
             $('#w01_txt_locname').removeClass('cls_alert');
             $('#w01_hd_wm').val(wm);
;
      });
      $('#w01_savename').click(function(){ 
           name = $.trim($('#w01_txt_locname').val());
           id = $('#w01_hd_wm').val();
            if(name==''){
                alert('Vui lòng nhập tên ao') ;
                $('#w01_txt_locname').addClass('cls_alert');
                $('#w01_txt_locname').focus();
                
            }
            xajax_w01_savelocname(name,id);
             
        }) ;
        
        $('#w01_savepass').click(function(){ 
           txtOldPass = $.trim($('#frmchangepass_txtOldPass').val());
           txtNewPass = $.trim($('#frmchangepass_txtNewPass').val());
           txtNewPassConfirm = $.trim($('#frmchangepass_txtNewPassConfirm').val());
           if(txtOldPass==''){
                alert('Vui long nhap mat khau cu') ;
                $('#frmchangepass_txtOldPass').focus(); 
                return false;               
            }
             if(txtNewPass==''){
                alert('Vui long nhap mat khau moi') ;
                $('#frmchangepass_txtNewPass').focus(); 
                return false;               
            }
              
            if(txtNewPass.length<6){
                alert('Vui long nhap mat khau moi dai hon 6 ki tu') ;
                $('#frmchangepass_txtNewPass').focus(); 
                return false;               
            }
            
             if(txtNewPassConfirm==''){
                alert('Vui long nhap mat khau xac nhan') ;
                $('#frmchangepass_txtNewPassConfirm').focus(); 
                return false;               
            }
            if(txtNewPass!=txtNewPassConfirm){
              alert('Vui long nhap mat khau xac nhan trung voi mat khau moi') ;
              $('#frmchangepass_txtNewPassConfirm').focus(); 
              return false;   
            }
            var params = new Array();
            params['txtOldPass']= txtOldPass;
            params['txtNewPass']= txtNewPass;
            params['txtNewPassConfirm']= txtNewPassConfirm;
            changeWaiting(0);
            xajax_frmchangepass_save(params);
             
        }) ;
        
        
    $(document).delegate(".w01_view",'click',function() { 

        $('#section2').load('templates/water/w02_tracking.html');
        current_wm = $(this).attr('data');
        if(arrClick.indexOf('section2')<=0){
         arrClick.push('section2');   
        }

        $('#link_section1').removeClass('menu-selected');
        $('#link_section2').addClass('menu-selected');
        $('#section1').hide('slow');
        $('#section2').show();
                         
    }) ;
    
     if(lang_iot=='en'){
        $('#sys_flg_language').attr('src','iot.vn/images/vietnam-flag.png'); 
        $('#sys_flg_language').attr('title','Bấm vào để chọn tiếng việt'); 
     }else{
        $('#sys_flg_language').attr('src','iot.vn/images/anh-flag.png');
         $('#sys_flg_language').attr('title','Click to choosen English'); 
     }
      
      $( "#dialog" ).dialog({
      autoOpen: false,
      width:900,
      show: {
        effect: "blind",
        duration: 200
      },
      hide: {
        effect: "slow",
        duration: 200
      }
    });
    
    xajax_ChangeSysName();             
          
    })
     
    function createTab(id){

        $('#' + id ).tabs({ 
                beforeLoad: function( event, ui ) {
                if ( ui.tab.data( "loaded" ) ) {
                  event.preventDefault();
                  return;
                }

                ui.jqXHR.success(function() {
                  ui.tab.data( "loaded", true );
                });
              }
        });
        
    }
    
google.maps.event.addDomListener(window, 'load', init_map); 
function init_map(){
    lat =10.577743 ;
    lng = 105.435396 ;
    var myOptions = {
        zoom:17,
        center:new google.maps.LatLng(lat,lng),
        mapTypeId: google.maps.MapTypeId.SATELLITE  
    };
    map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);    
} 
 
function w01_create_tracking(){
    changeWaiting(0);
    clearOverlays();
    setTimeout(w01_create_tracking,120000);         
}

function w02_detail(val){ 
changeWaiting(0);       
    if(val==''){
        val = $('#w02_dt_cbb_wm').val();
    }
    w02_CreateImage(val) ;
    current_wm = val;
    $('#w02_dt_cbb_wm').val(current_wm)  
    latx = parseFloat(fm_info.waspmote[val].x);
    lony = parseFloat(fm_info.waspmote[val].y);
        
    var myLatLng = {lat: latx, lng: lony};
          map.setCenter(myLatLng);
           map.setZoom(18);
          strdatetime = cl_trking.arrLastTime[val];
          arrdatetime = strdatetime.split(" ");
          strdate = arrdatetime[0];
          strtime = arrdatetime[1];
          $('#w02_dt_date').html(" "+strdate);
          $('#w02_dt_time').html(" "+strtime);
          $('#w02_dt_sn').html('S/N: ' + fm_info.waspmote[val].serie_num);
          $('#w02_dt_cbb_wm').val(val);          
          ss = fm_info.wt_sensor[1];
           var arrChart= [];
             $.ajax({
            url: 'tracking_detail.php',
            type: 'POST',
            data:{
                wm_id:val,
                param_ss:ss 
            } ,
            cache: false,
            
            success: function(string){
              	index_str = string.indexOf('{"lastdata"');
			str_final = string.substring(index_str);
               var getData = JSON.parse(str_final);

              arrSensor = [];
              arrData =[];
              str='';
              for(var i in getData['lastdata']){
                  var temp= new Object();
                  if(i!='in_array'&&i!='containsValue'){
                      sensor = getData['lastdata'][i].sensor;
                      s_type = parseInt(getData['lastdata'][i].s_type);
                      name =  ((lang_iot=='vi')?fm_info.sensor[sensor].name_vi:fm_info.sensor[sensor].name_en);
                      arrSensor.push(name);
                       valchart =   changeDO (parseFloat(getData['lastdata'][i].value),sensor);

                      if(s_type==2){
                          if(sensor=='IN_TEMP'){
                             $('#w02_dt_INTEMP').html(" "+valchart+" <sup>o</sup>C"); 
                          }
                          if(sensor=='BAT'){
                             $('#w02_dt_BAT').html(" "+valchart+"%"); 
                          }
                          continue; 
                      }
                      if(typeof(fm_info.limit[val][sensor])=='undefined'){                          
                          continue;
                      }
                     
                      cls = checkLimit(val,sensor,valchart) ;
                       str+='<tr><td width="60%">'+ ((lang_iot=='vi')?fm_info.sensor[sensor].name_vi:fm_info.sensor[sensor].name_en)+' ('+fm_info.sensor[sensor].kihieu+')'+'</td><td class="'+cls+'" style="text-align:center"  width="20%">'+valchart+'</td><td width="20%" align="center">'+fm_info.sensor[sensor].unit+'</td></tr>' ;
                       if(cls!=''){
                         temp.y=valchart;
                         if(cls=='cls_over'){
                            temp.color='#f0929c'; 
                         }else{
                            temp.color='#a88a67 '; 
                         }
                         
                         arrData.push(temp); 
                      }else{
                        arrData.push(valchart);  
                      } 
                    }
              } 
                $('#w02_body_info').html(str);
                $('#w02_user_dieukhien').html(getData['user_dieukhien']);
                $('#w02_trangthai_dieukhien').html(getData['trangthai_dieukhien']);
                $('#w02_chart_dt_current').highcharts({
                    chart: {
                        type: 'column'
                    },
                    exporting: {
                             enabled: false
                    },
                    title: {
                        text: ((lang_iot == 'vi')?'Ghi Nhận Thời Điểm Hiện Tại':'Current Time Values' )
                    },
                    /*subtitle: {
                        text: strdate +' ' +strtime
                    },*/
                    xAxis: {
                        categories: arrSensor,
                        crosshair: true
                    },
                    yAxis: {
                        title: {
                            text: ((lang_iot == 'vi')?'Giá Trị':'Values' ) 
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: ((lang_iot == 'vi')?fm_info.waspmote[val].name_vi:fm_info.waspmote[val].name_en ) ,
                        data:  arrData

                    }]
                });
                
                // phần chart theo thời gian 24h
                flg_duyet=false;
                str_info =''; 
                strbody='' ;
                var strName=''; 
                var arrChart = new Array();
                var arrX = new Array();
                var cntChart = new Array();
                $('#w02_report_chart').html('');
                
                for(var i in getData['sensorparser']){
                  if(i!='in_array'&&i!='containsValue'){
                      sensor = getData['sensorparser'][i].sensor;                      
                      val = changeDO(parseFloat(getData['sensorparser'][i].value),sensor);
                      time_stamp = getData['sensorparser'][i].timestamp;
                      if(strName!=sensor){
                        cntChart.push(sensor);
                        arrChart[sensor]=new Array();                            
                        arrX[sensor]=new Array();                            
                      }
                      arrChart[sensor].push(val);
                      arrX[sensor].push(time_stamp);
                      strName= sensor;
                      flg_duyet = true;      
                  }  
               }

               createChartTotal('w02_chart_dt_history',cntChart[0],arrX,arrChart,((lang_iot == 'vi')?'Diễn Biến Trong 24 Giờ Qua':'Last 24 Hour Values' ) ,strdate); 
            
                                                
            },

            error: function (){ 
                alert('có lỗi xảy ra');
            }

        });
     setTimeout(function(){$('#w02_right_info').height($('#w02_left_info').height())},300);
     changeWaiting(1);      
}

function clearOverlays() {
  for (var i in  arrMarker) {
    if(i!='in_array'&&i!='containsValue'){ 
        arrMarker[i].setMap(null);
    }
  }
  arrMarker = new Object;
}

function showMarker(flg){
      for (var i in  arrMarker) {
        if(i!='in_array'&&i!='containsValue'){ 
            arrMarker[i].setVisible(true);
        }
      }
    if(flg==-1){
        for (var i in  arrAo['good']) {
            if(i!='in_array'&&i!='containsValue'){ 
                arrMarker[arrAo['good'][i]].setVisible(false);
            }
        }  
    }else if(flg==1){
        for (var i in  arrAo['alert']) {
            if(i!='in_array'&&i!='containsValue'){ 
                arrMarker[arrAo['alert'][i]].setVisible(false);
            }
        }   
    } 
}
 
function startTime() {
        var dt = new Date();    // DATE() CONSTRUCTOR FOR CURRENT SYSTEM DATE AND TIME.
        var hrs = dt.getHours();
        var min = dt.getMinutes();
        var sec = dt.getSeconds();

        min = Ticking(min);
        sec = Ticking(sec);
        temp_hr = hrs%12==0?12:Ticking(hrs%12) ;

        document.getElementById('dc').innerHTML = temp_hr + ":" + min;
        document.getElementById('dc_second').innerHTML = sec;
        if (hrs > 12) { document.getElementById('dc_hour').innerHTML = 'PM'; }
        else { document.getElementById('dc_hour').innerHTML = 'AM'; }
     
                
        // CALL THE FUNCTION EVERY 1 SECOND (RECURSION).
         setTimeout('startTime()', 1000);
    }

    function Ticking(ticVal) {
        if (ticVal < 10) {
            ticVal = "0" + ticVal;
        }
        return ticVal;
    }

function changeCssInfowin() {

    // Reference to the DIV that wraps the bottom of infowindow
    var iwOuter = $('.gm-style-iw');

    /* Since this div is in a position prior to .gm-div style-iw.
     * We use jQuery and create a iwBackground variable,
     * and took advantage of the existing reference .gm-style-iw for the previous div with .prev().
    */
    var iwBackground = iwOuter.prev();

    // Removes background shadow DIV
    iwBackground.children(':nth-child(2)').css({'display' : 'none'});

    // Removes white background DIV
    iwBackground.children(':nth-child(4)').css({'display' : 'none'});

    // Moves the infowindow 115px to the right.
    iwOuter.parent().parent().css({left: '115px'});

    // Moves the shadow of the arrow 76px to the left margin.
    iwBackground.children(':nth-child(1)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Moves the arrow 76px to the left margin.
    iwBackground.children(':nth-child(3)').attr('style', function(i,s){ return s + 'left: 76px !important;'});

    // Changes the desired tail shadow color.
    iwBackground.children(':nth-child(3)').find('div').children().css({'box-shadow': 'rgba(72, 181, 233, 0.6) 0px 1px 6px', 'z-index' : '1'});

    // Reference to the div that groups the close button elements.
    var iwCloseBtn = iwOuter.next();

    // Apply the desired effect to the close button
    iwCloseBtn.css({opacity: '1', right: '35px', top: '6px', border: '2px solid #48b5e9', 'border-radius': '1px', 'box-shadow': '0 0 5px #3990B9'});

    // If the content of infowindow not exceed the set maximum height, then the gradient is removed.
    if($('.iw-content').height() < 140){
      $('.iw-bottom-gradient').css({display: 'none'});
    }

    // The API automatically applies 0.7 opacity to the button after the mouseout event. This function reverses this event to the desired value.
    iwCloseBtn.mouseout(function(){
      $(this).css({opacity: '1'});
    });
  } 
  
  function updatetitle(){
     var param = new Array();
     if($.trim($('#newtitle_vi').val())==''){
         alert('Vui lòng nhập phần thông tin tiếng Việt');
     }
     if($.trim($('#newtitle_en').val())==''){
         alert('Vui lòng nhập phần thông tin tiếng Anh');
     }
     param['newtitle_vi']=$('#newtitle_vi').val();
     param['newtitle_en']=$('#newtitle_en').val(); 
     param['id']=$('#w01_hd_sysNameId').val(); 
     xajax_saveSysName(param);
  }

function runControlWasp(){
    var param = new Array();
    if($.trim($('#control_wasp_id').val())==''){
         alert('Hệ thống hiện không xác nhận được ID thiết bị');
    }
    param['control_wasp_id']=$('#control_wasp_id').val(); 
    param['control_den_status']=$('#control_den_status').val();
    param['control_oxyday_status']=$('#control_oxyday_status').val();
    param['control_quat_status']=$('#control_quat_status').val();
    param['control_oxynhuyen_status']=$('#control_oxynhuyen_status').val();
    xajax_saveControlWasp(param);
}
$(document).delegate('#btct_den_off','click',function(){  
    $('#control_den_status').val('0');
});
$(document).delegate('#btct_den_on','click',function(){ 
    $('#control_den_status').val('1');
}) ;
$(document).delegate('#btct_oxyday_off','click',function(){
    $('#control_oxyday_status').val('0');
});
$(document).delegate('#btct_oxyday_on','click',function(){
    $('#control_oxyday_status').val('1');
});
$(document).delegate('#btct_quat_off','click',function(){
    $('#control_quat_status').val('0');
});
$(document).delegate('#btct_quat_on','click',function(){
    $('#control_quat_status').val('1');
});
$(document).delegate('#btct_oxynhuyen_off','click',function(){
    $('#control_oxynhuyen_status').val('0');
});
$(document).delegate('#btct_oxynhuyen_on','click',function(){
    $('#control_oxynhuyen_status').val('1');
});
$(document).delegate('#w02_dt_btn_control','click',function(){
    var val;
    val = $('#w02_dt_cbb_wm').val();    
    var arrChart= [];
     $.ajax({
        url: 'tracking_back_control.php',
        type: 'POST',
        data:{
            wm_id:val,
        } ,
        cache: false,            
        success: function(string){
            index_str = string.indexOf('{"lastdata"');
            str_final = string.substring(index_str);
            var getData = JSON.parse(str_final);            
            $('#control_wasp_id').val(val);         
            if(getData['lastdata']['DEN'] == 1) {
                $('#btct_den_off').removeClass('btn-danger');
                $('#control_den_status').val('1');
                $('#btct_den_on').addClass('btn-danger');
            } else {
                $('#btct_den_off').addClass('btn-danger');
                $('#btct_den_on').removeClass('btn-danger');
                $('#control_den_status').val('0');
            }
            if(getData['lastdata']['OXY_DAY'] == 1) {
                $('#control_oxyday_status').val('1');
                $('#btct_oxyday_off').removeClass('btn-danger');
                $('#btct_oxyday_on').addClass('btn-danger');
            } else {
                $('#control_oxyday_status').val('0');
                $('#btct_oxyday_off').addClass('btn-danger');
                $('#btct_oxyday_on').removeClass('btn-danger');
            }
            if(getData['lastdata']['QUAT'] == 1) {
                $('#control_quat_status').val('1');
                $('#btct_quat_off').removeClass('btn-danger');
                $('#btct_quat_on').addClass('btn-danger');
            } else {
                $('#control_oxyday_status').val('0');
                $('#btct_quat_off').addClass('btn-danger');
                $('#btct_quat_on').removeClass('btn-danger');
            }
            if(getData['lastdata']['OXY_NHUYEN'] == 1) {
                $('#control_oxynhuyen_status').val('1');
                $('#btct_oxynhuyen_off').removeClass('btn-danger');
                $('#btct_oxynhuyen_on').addClass('btn-danger');
            } else {
                $('#control_oxynhuyen_status').val('0');
                $('#btct_oxynhuyen_off').addClass('btn-danger');
                $('#btct_oxynhuyen_on').removeClass('btn-danger');
            }
        },
    });
   $('#w02_control').modal('show');
});




