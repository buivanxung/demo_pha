<?php
$arrTable = array();
$arrTable['tbl_user'] = array(
                            'txtAddUserName'=>'username',
                            'txtAddPassWord'=>'pass',
                            'txtAddEmail'=>'email',
                            'txtAddCellPhone'=>'mobi',
                            'txtAddHomePhone'=>'phone',                            
                            'cmbAddPowerType'=>'power_type_id',
                            'cmbAddPower'=>'power_id',
                            'cmbAddCity'=>'city_id'
                            );
$arrTable['tbl_menu'] = array(
                            'txtViMenu'=>'name_vi_menu',
                            'txtViForm'=>'name_vi_form',
                            'txtEnMenu'=>'name_en_menu',
                            'txtEnForm'=>'name_en_form',
                            'cmbCategoryType'=>'category_type',                            
                            'chkActive'=>'active',
                            'category_order'=>'category_order',
                            'txtModule'=>'module',
                            'cmbFather'=>'father_id',
                            'chkHelp'=>'help'
                            );
$arrTable['tbl_power_type'] = array(
                            'txtNameVi'=>'name_vi',
                            'txtNameEn'=>'name_en',
                            'txtPowerType' =>'power_type_id', 
                            'description' =>'description'                          
                            );
$arrTable['tbl_city'] = array(
                            'txtAddCity'=>'city_name',
                            'hdlat'=>'latcenter' ,
                            'hdlong'=>'longcenter'                           
                            );
$arrTable['tbl_province'] = array(
                            'cmbCity1'=>'city_id',
                            'txtAddProvince'=>'province_name',
                            'hdlat'=>'latcenter' ,
                            'hdlong'=>'longcenter'                           
                            );
$arrTable['tbl_ward'] = array(
                            'cmbCity2'=>'city_id',
                            'cmbProvince'=>'province_id',
                            'txtAddWard'=>'ward_name',
                            'hdlat'=>'latcenter' ,
                            'hdlong'=>'longcenter'                           
                            );
?>
