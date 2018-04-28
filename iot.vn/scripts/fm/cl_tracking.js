  function cl_tracking(w_type){
    var obj = new Object();   
    obj.arrLastTime  = new Object();
       $.ajax({
            url: 'tracking_json.php',
            type: 'POST',
            data:{
                sign_arr:fm_info.wt_sensor[1] ,
                wasp_type:w_type ,
                sign_ext:arrExtSensor
            } ,
            cache: false,
            
            success: function(string){

		index_str = string.indexOf('[{');
		str_final = string.substring(index_str);
            var getData = JSON.parse(str_final);
              flg_duyet=false;
              id_wasp_pre='';
              str_info =''; 
               strbody='' ;
               cnt =0;
               flg_alert = false;
               loc_total=0;
               loc_good=0;
               loc_alert=0;
               arrAo['good']=new Array();
               arrAo['alert']=new Array();
              for(var i in getData){
                  if(i!='in_array'&&i!='containsValue'){
                       // co luu lai xem co chi so sensor nao vuot han muc khong. neu co thi flg_alert= true
                      id_wasp_new = getData[i].id_wasp ;
                      sensor =   getData[i].sensor;
                       //val =      getData[i].value;
                       val =changeDO(parseFloat(getData[i].value),sensor); 
                       last_time =      getData[i].timestamp;
                           
                      if(id_wasp_new!=id_wasp_pre){
                                          // tao Marker cho ban do
                                          
                          if(flg_duyet){
                            arrInfoWindow[id_wasp_pre]=str_info+'<a class="w01_view" data="'+id_wasp_pre+'">'+((lang_iot=='vi')?'Xem chi tiết':'Details')+'</a></div>'; 
                            
                            arrMarker[id_wasp_pre]=createMarker(id_wasp_pre,flg_alert);
                            flg_alert = false;  
                          }              
                         str_info =  '<div ><div ><font data-toggle="modal" data-target="#w01_changename" id="w01_info-'
                         +id_wasp_new+'"  data="'+id_wasp_new+'">'
                         + ((lang_iot=='vi')?fm_info.waspmote[id_wasp_new]['name_vi']:fm_info.waspmote[id_wasp_new]['name_en'] )
                         +'</font></div>';// tao ten cua khu vuc
                         obj.arrLastTime[id_wasp_new] = last_time;
                          //ket thuc tao marker cho ban do   
                       
                      }
                     //cls = obj.checkLimit(id_wasp_new,sensor,val) ;    

                      cls = obj.checkLimit(id_wasp_new,sensor,val) ;  
                      if(cls!=''){
                          //str_info +='</br><font color="red">'+fm_info.sensor[sensor].name+':  '+ val+' ( '+fm_info.sensor[sensor].unit+' )</font>'; 
                          flg_alert=true;
                           
                      }else{
                          //str_info +='</br>'+fm_info.sensor[sensor].name+': '+ val+' ( '+fm_info.sensor[sensor].unit+' )';
                      }  
                    
                      flg_duyet=true; 
                   id_wasp_pre = id_wasp_new;       
                  }
                 
               }
               if(id_wasp_pre!=''){
                  arrMarker[id_wasp_pre]=createMarker(id_wasp_pre,flg_alert); 
               }  
                
               arrInfoWindow[id_wasp_pre]=str_info+'<a class="w01_view" data="'+id_wasp_pre+'">'+((lang_iot=='vi')?'Xem chi tiết':'Details')+'</a></div>'; 
                $('#w01_aotoan').html(Math.round(loc_good*100/loc_total)+'%');
                $('#w01_canhbao').html(Math.round(loc_alert*100/loc_total)+'%');
                $('#w01_num-antoan').html(loc_good);
                $('#w01_num-canhbao').html(loc_alert);  
                $('#header_alert').html('&nbsp;'+loc_alert);
                $('#header_safe').html('&nbsp;'+loc_good);
                setTimeout(loadMarker,1000);
                                 
            },

            error: function (){

                alert('có lỗi xảy ra');

            }

        });
          
     obj.checkLimit=function(id_wasp,sensor,val) {
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
     
    return obj;
    
}

function createMarker(id_wasp_new,flg_alert){ 

     lat = fm_info.waspmote[id_wasp_new].x;
     lng = fm_info.waspmote[id_wasp_new].y; 
     var myCenter=new google.maps.LatLng(lat,lng);
     loc_total++;
     image = 'iot.vn/images/map_good.png';
     if(flg_alert){
         loc_alert++;
        image = 'iot.vn/images/map_alert.png';
        arrAo['alert'].push(id_wasp_new); 
     }else{
         arrAo['good'].push(id_wasp_new); 
         loc_good++;
     }
     var marker=new google.maps.Marker({
        position:myCenter,
        icon:image
      });
  return  marker;         
}  

     //flg = -1 load cac cai xau; 
     //flg = 0 load tat ca
     //flg=  1  load cai tot
     function loadMarker(){
         flg=0;
            if(typeof(map)=='undefined'){
                setTimeout(loadMarker,2500);
                changeWaiting(1); 
                return;
            }
         if(flg==0){
             for(var i in arrMarker){
                if(i!='in_array'&&i!='containsValue'){ 
                    arrMarker[i].setMap(map);
                    var infowindow = new google.maps.InfoWindow({
                      content:arrInfoWindow[i] ,
                      maxWidth:250,
                      minWidth:230
                      });
                      infowindow.open(map,arrMarker[i]);
                      //changeCssInfowin();  
                      attachSecretMessage(arrMarker[i], arrInfoWindow[i]);
                }
             }
         }else{
                arrTemp = arrAo['alert'];
             if(flg==1){
                 arrTemp=arrAo['good']; 
             }
             for(i=0;i<arrTemp.length;i++){
                 arrMarker[arrTemp[i]].setMap(map);
                 var infowindow = new google.maps.InfoWindow({
                        content:arrInfoWindow[i] ,
                        maxWidth:250,
                        minWidth:230 
                      });
                      arrWindow[arrTemp[i]]=infowindow;
                  infowindow.open(map,arrMarker[i]);
                  //changeCssInfowin();  
                  attachSecretMessage(arrMarker[i], arrInfoWindow[i]);
             }
         }
         
         changeWaiting(1);
        // $('#section1').hide();   
         
     }   
     
     function attachSecretMessage(marker, mess) {
      var infowindow = new google.maps.InfoWindow({
          content: mess  ,
          maxWidth: 250
        });
        marker.addListener('click', function() {
          infowindow.open(marker.get('map'), marker);
          //changeCssInfowin();
        }); 
      }
      

