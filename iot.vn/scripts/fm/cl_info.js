  function cl_info(id){
    var obj = new Object();    
    obj.flg_loader = false; 
    obj.sensor = new Object(); 
    obj.waspmote = new Object(); 
    obj.limit = new Object();
    obj.standard = new Object();
    obj.wasptype = new Object();
    obj.wt_sensor = new Object();    
    obj.wt_sensor_internal = new Object();    
    obj.arrList = new Object();
    obj.mocdo = new Array();
    obj.list_image = new Array();
    obj.language = new Array();
    obj.arrList['sensor'] = ['id','name_vi','name_en','description','chart_title_vi','y_title_vi','chart_title_en','y_title_en','unit','kihieu']; // lưu thông tin về sensor
    obj.arrList['waspmote'] = ['id','name_vi','name_en','description','timestamp','wasp_type','x','y','serie_num','img_link']; // lưu thông tin về wasp_mote
    obj.arrList['limit'] = ['id_wasp','id_sensor','min_val','max_val'];   // lưu thông tin giới hạn cảnh báo của từng thiết bị theo user 
    obj.arrList['wasptype'] = ['id','name'];          // lưu tên lại thiết bị
    obj.arrList['wt_sensor'] = ['wasp_type','sensor'];// lưu thông tin về loại wasp ứng với sensor gì
    obj.arrList['standard'] = ['id_wt','id_sensor','min_val','max_val']; 
    obj.arrList['mocdo'] = ['user_id','mocdo']; 
    obj.arrList['list_image'] = ['id_wasp','link_image']; 
    obj.arrList['language'] = ['id_element','vi','en']; 
    
   $.ajax({
            url: 'info_json.php',
            type: 'POST',
            data:{
                service_id:id
            } ,
            cache: true,
            
            success: function(string){
		index_str = string.indexOf('{"sensor"');
str_final = string.substring(index_str);
               var getData = JSON.parse(str_final);
              for(var i in getData){
                obj.assign(i,getData[i]);                    
               }
               obj.flg_loader=true;
               changeLanguage(lang_iot);
               cl_trking = new cl_tracking(1); 
            },

            error: function (){
                alert('có lỗi xảy ra');

            }

        });
obj.assign = function(maham,arr){// hàm này dùng gán gia tri cua mang cho doi tuong
          var templist = obj.arrList[maham];// mang chua thong tin cac field;
          for(var k in arr){
              if(k!='in_array'&&k!='containsValue'){
              if(typeof(arr[k])!='undefined'){
                  arrtemp = new Array();
                  for(var j in templist){
                      if(j!='in_array'&&j!='containsValue'){
                        if(typeof(arr[k][templist[j]])!='undefined'){
                            arrtemp[templist[j]]= arr[k][templist[j]];                       
                        }
                      }
                  }
                  obj.assignItem(maham,arrtemp);
                                   
              }
              }   
          }
                 
     }
     
     obj.assignItem=function(maham,arr){
         switch(maham){
             case 'sensor':id = arr['id']; obj.assignSensor(id,arr) ;break;
             case 'waspmote': id = arr['id']; obj.assignWaspmote(id,arr) ;break;
             case 'list_image': id = arr['id_wasp']; obj.assignListImage(id,arr) ;break;
             case 'mocdo':  obj.assignMocdo(arr) ;break;
             case 'wasptype': id = arr['id']; obj.assignWasptype(id,arr) ;break;
             case 'wt_sensor': id = arr['wasp_type']; obj.assignWt_sensor(id,arr) ;break;
             case 'language': id = arr['id_element']; obj.assignLanguage(id,arr) ;break;
             case 'limit': id_wasp = arr['id_wasp'];id_sensor = arr['id_sensor']; obj.assignLimit(id_wasp,id_sensor,arr) ; break;
             case 'standard': id_wt = arr['id_wt'];id_sensor = arr['id_sensor']; obj.assignStandard(id_wt,id_sensor,arr) ; break;
         }
     }     
     
     obj.deleteItem=function(maham,id){
         switch(maham){
             case 'sensor': delete obj.sensor[id] ;break;
             case 'waspmote': delete obj.waspmote[id] ;break;
             case 'list_image': delete obj.list_image[id] ;break;
             case 'wasptype': delete obj.wasptype[id] ;break;
             case 'mocdo': index_i = obj.modoc.indexOf(i); obj.modoc.splice(index_i,1) ;break;
             case 'wt_sensor': delete obj.wt_sensor[id] ;break;
             case 'language': delete obj.language[id] ;break;
             case 'limit': delete obj.limit[id] ;break;             
             case 'standard': delete obj.standard[id] ;break;             
         }
         
     }
     

    obj.assignSensor=function(id,arr){
        obj.sensor[id]= new Array();
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id'){                
                obj.sensor[id][i]=arr[i];
              }            
        }
            
    }    
    obj.assignListImage=function(id,arr){
        
         if(typeof(obj.list_image[id])=='undefined'){
            obj.list_image[id]= new Array();
        }
        
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id_wasp'){
                obj.list_image[id].push(arr[i]);
              }            
        }
            
    }     
    obj.assignMocdo=function(arr){          
        obj.mocdo.push(arr['mocdo']);            
    }   

    obj.assignWt_sensor=function(id,arr){
        if(typeof(obj.wt_sensor[id])=='undefined'){
            obj.wt_sensor[id]= new Array();
        }
        
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='wasp_type'){
                obj.wt_sensor[id].push(arr[i]);
              }            
        }
            
    } 
    
    obj.assignLanguage=function(id,arr){
        if(typeof(obj.language[id])=='undefined'){
            obj.language[id]= new Array();
        }
        
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id_element'){
                obj.language[id][i]= arr[i]; 
              }            
        }
            
    }   
      
     
    obj.assignWaspmote=function(id,arr){
        obj.waspmote[id]= new Array();
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id'){                
                obj.waspmote[id][i]=arr[i];
              }            
        }
            
    }     
    obj.assignWasptype=function(id,arr){
        obj.wasptype[id]= new Array();
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id'){                
                obj.wasptype[id][i]=arr[i];
              }            
        }
            
    }   
     obj.assignLimit=function(id_wasp,id_sensor,arr){
        if(typeof(obj.limit[id_wasp])=='undefined'){
            obj.limit[id_wasp]= new Object();
        }
        obj.limit[id_wasp][id_sensor]= new Array();
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id_wasp'&&i!='id_sensor'){                
                obj.limit[id_wasp][id_sensor][i]=arr[i]; 
            }            
        }
            
    }     
    obj.assignStandard=function(id_wt,id_sensor,arr){
        if(typeof(obj.standard[id_wt])=='undefined'){
            obj.standard[id_wt]= new Object();
        }
        obj.standard[id_wt][id_sensor]= new Array();
        for(var i in arr){
            if(i!='in_array'&&i!='containsValue'&&typeof(arr[i])!='undefined'&&i!='id_wt'&&i!='id_sensor'){                
                obj.standard[id_wt][id_sensor][i]=arr[i]; 
            }            
        }            
    }  
  
    obj.assignSensor_item=function(id,name_vi,name_en,description,id_ascii,chart_title_vi,y_title_vi,chart_title_en,y_title_en,unit,kihieu){
        obj.sensor[id]= new Array(); 
        obj.sensor[id]['name_vi']=name_vi;
        obj.sensor[id]['name_en']=name_en;
        obj.sensor[id]['description']=description;
        obj.sensor[id]['id_ascii']=id_ascii;
        obj.sensor[id]['chart_title_vi']=chart_title_vi;
        obj.sensor[id]['y_title_vi']=chart_title_vi;
        obj.sensor[id]['chart_title_en']=chart_title_en;
        obj.sensor[id]['y_title_en']=chart_title_en;
        obj.sensor[id]['unit']=unit;
        obj.sensor[id]['kihieu']=kihieu;
    } 
       
    obj.assignWaspmote_item=function(id,name_vi,name_en,description,timestamp,wasp_type,x,y,serie_num,img_link){
        obj.waspmote[id]= new Array(); 
        obj.waspmote[id]['name_vi']=name_vi;
        obj.waspmote[id]['name_en']=name_en;
        obj.waspmote[id]['description']=description;
        obj.waspmote[id]['timestamp']=timestamp;
        obj.waspmote[id]['wasp_type']=wasp_type;
        obj.waspmote[id]['x']=x;
        obj.waspmote[id]['y']=y;
        obj.waspmote[id]['serie_num']=serie_num;
        obj.waspmote[id]['img_link']=img_link;
    }   
    
    obj.assignWasptype_item=function(id,name){
        obj.waspmote[id]= new Array(); 
        obj.waspmote[id]['name']=name;
    }
    
    obj.assignLimit_item=function(id_wasp,id_sensor,min_val,max_val){
        if(typeof(obj.limit[id_wasp])=='undefined'){
            obj.limit[id_wasp]=new Object();
        }
        obj.limit[id_wasp][id_sensor]= new Array(); 
        obj.limit[id_wasp][id_sensor]['min_val']=min_val;
        obj.limit[id_wasp][id_sensor]['max_val']=max_val;
    }    
    obj.assignStandard_item=function(id_wt,id_sensor,min_val,max_val){
        if(typeof(obj.standard[id_wt])=='undefined'){
            obj.standard[id_wt]=new Object();
        }
        obj.standard[id_wt][id_sensor]= new Array(); 
        obj.standard[id_wt][id_sensor]['min_val']=min_val;
        obj.standard[id_wt][id_sensor]['max_val']=max_val;
    }    
    
    return obj;
    
}



