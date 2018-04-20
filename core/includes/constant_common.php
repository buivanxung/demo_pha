<?php
define("VIP",1);
$arrmapTable = array();
$arrmapTable['frmpowertype'] = 'tbl_power_type';  
$arrmapTable['frmroomtype'] = 'tbl_room_type';  
$arrmapTable['frmmenu'] = 'tbl_main_menu_cus';  
$arrmapTable['frmmenutabag'] = 'tbl_menu';
$arrmapTable['frmmenuag'] = 'tbl_main_menu';  
$arrmapTable['frmmenutab'] = 'tbl_menu_cus';  
$arrmapTable['frmhotel']= 'tbl_service';  
$arrmapTable['frmuser']= 'tbl_user';  
$arrmapTable['frmunitcity']= 'tbl_city';  
$arrmapTable['frmcreatetable']= 'tbl_tablescript';  
$arrmapTable['frmroom']= 'tbl_room';  
$arrmapTable['frmproducttype']= 'tbl_product_type';  
$arrmapTable['frmproductnew']= 'tbl_product_new';  
$arrmapTable['frmproducttypenew']= 'tbl_product_new';  
$arrmapTable['frmproduct']= 'tbl_product';  
$arrmapTable['frmpay']= 'tbl_pay';  
$arrmapTable['frmroomproblem']= 'tbl_problem';  
$arrmapTable['fmfrmfilmtype']= 'fm_filmtype';  
$arrmapTable['fmfrmroom']= 'fm_room';  
$arrmapTable['fmfrmroomtype']= 'fm_room_type'; 
$arrmapTable['cusfrmproduct']= 'cus_product'; 
$arrmapTable['cusfrmproducttype']= 'cus_product'; 
$arrmapTable['fmfrmfilm']= 'fm_film'; 
$arrmapTable['fmfrmpromotion']= 'fm_promotion'; 
$arrmapTable['fmfrmvoucher']= 'fm_promotion'; 
$arrmapTable['fmfrmstaff']= 'cus_staff'; 
$arrmapTable['cusfrmimportproduct']= 'cus_importproduct'; 
$arrmapTable['frmaccount']= 'tbl_user'; 
$arrmapTable['cusfrmpay']= 'cus_pay'; 

$tbl_pay = array();
$tbl_pay[1]='flg';
$tbl_pay[2]='nguoithuchi';
$tbl_pay[3]='money';
$tbl_pay[4]='description';

$tbl_importproduct = array();
$tbl_importproduct[1]='quanlity';
$tbl_importproduct[2]='money';
$tbl_importproduct[3]='description';

$tbl_subuser = array();
$tbl_subuser[1]='email';
$tbl_subuser[2]='address';
$tbl_subuser[3]='phone';

$tbl_promotion = array();
$tbl_promotion[1]='name';
$tbl_promotion[2]='percent';
$tbl_promotion[3]='flg_promotion';
$tbl_promotion[4]='description';

$tbl_lsp = array();
$tbl_lsp[1]='name_vi';

$tbl_sp = array();
$tbl_sp[1]='name_vi';
$tbl_sp[2]='price';
$tbl_sp[3]='pricebuy';
$tbl_sp[4]='unit';
$tbl_sp[5]='checkquanlity';
$tbl_sp['parent_id']='parent_id';

$tbl_ldv = array();
$tbl_ldv[1]='name';

$tbl_dv = array();
$tbl_dv[1]='name';
$tbl_dv[2]='price';
$tbl_dv[3]='time_spent';
$tbl_dv[4]='tip';
$tbl_dv['parent_id']='parent_id';

$tbl_nhanvien = array();
$tbl_nhanvien[1]='name';
$tbl_nhanvien[2]='alias_name';
$tbl_nhanvien[3]='birthday';
$tbl_nhanvien[4]='cmnd';
$tbl_nhanvien[5]='phone';
$tbl_nhanvien[6]='salary';
$tbl_nhanvien[7]='date_work';

$tbl_loaiphong = array();
$tbl_loaiphong[1]='name';
$tbl_loaiphong[2]='extprice';

$tbl_phong = array();
$tbl_phong[1]='name';
$arrExtSensor = array("BAT", "IN_TEMP");

?>
