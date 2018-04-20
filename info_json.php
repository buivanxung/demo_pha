<?php
// Connect Database
define('IN_CHUYENNHAT', TRUE);
include_once('iot.vn/cfg.php');
include_once(CORE_PATH.'database/commonDB.php');
if(!ConnectDB()) {
    die('Không kết nối được DATABASE');
}
global $objDbSelect,$user_id; 
$user_id = $_SESSION['current']['user_id'];
$result = array();
$result = null;
if(isset($_POST['service_id'])&&$_POST['service_id']!=''){ 
   // load cac loai sensor
    $sql = "select ifnull(m.`name_vi`,s.`name`) as `name_vi`,ifnull(m.`name_en`,s.`name`) as `name_en`,`description`,s.`id_ascii` as id, m.chart_title_vi as `chart_title_vi`,m.y_title_vi as `y_title_vi` , m.chart_title_en as `chart_title_en`,m.y_title_en as `y_title_en` ,m.unit,m.kihieu
    from sensors as s left join tbl_sensor_map as m on s.id_ascii = m.id_ascii order by m.priority" ;
    $arr = $objDbSelect->GetArray($sql);     
    $result['sensor']=$arr;  
        
     // load cac waspmote
    $sql = "SELECT `id` as id ,`name_vi`,`name_en`,`description`,`timestamp`,`wasp_type`,`x`,`y`,serie_num,img_link from tbl_waspmote where u_id = '$user_id' order by `name_vi` " ;
    $arr = $objDbSelect->GetArray($sql);     
    $result['waspmote']=$arr; 
    
    // load cac nguong canh bao
    $sql = "SELECT * from tbl_limit where id_wasp IN (select id from tbl_waspmote where u_id = '$user_id')" ;
    $arr = $objDbSelect->GetArray($sql); 
    $result['limit']=$arr; 
    
    // load cac nguong canh bao chuan
    $sql = "SELECT * from tbl_standard_limit where id_wt IN (select wasp_type from tbl_waspmote where u_id = '$user_id')" ;
    $arr = $objDbSelect->GetArray($sql); 
    $result['standard']=$arr;     
    
    // load cac loại waspmote_sensor
    $sql = "SELECT * from tbl_wasp_type where id IN (select wasp_type from tbl_waspmote where u_id = '$user_id')" ;
    $arr = $objDbSelect->GetArray($sql); 
    $result['wasptype']=$arr;    
    
     // load cac loại sensor cho tat ca cac loai wasp mote san co cua user
    $sql = "SELECT * FROM `tbl_wt_sensor` WHERE s_type =1 and `wasp_type` IN (SELECT `wasp_type` FROM tbl_waspmote WHERE u_id = '$user_id') order by wasp_type,sensor" ;
    $arr = $objDbSelect->GetArray($sql); 
    $result['wt_sensor']=$arr;
    
    $sql = "SELECT * FROM `tbl_list_image`  WHERE id_wasp IN (select id from tbl_waspmote where u_id = '$user_id')" ;  
    $arr = $objDbSelect->GetArray($sql); 
    $result['list_image']=$arr;
    
    
    $sql = "select * from tbl_mocdo where user_id = '$user_id' " ;
    $arr = $objDbSelect->GetArray($sql); 
    $result['mocdo']=$arr;  
    
    $sql = "select * from tbl_language " ;
    $arr = $objDbSelect->GetArray($sql); 
    $result['language']=$arr;  
   
}
CloseDB();
die (json_encode($result));
?>