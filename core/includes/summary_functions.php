<?php

function fm_summary($service_id,$from='',$to=''){
    global $objDbUpdate; 
    $sql= "select DATE_FORMAT(timeend, '%Y-%m-%d') as date_sum,sum(TIMESTAMPDIFF(MINUTE,timestart,timeend)) as timerent ,
    sum(num_voucher) as numvoucher,sum(numperson) as numperson,
    count(id) as numrent,sum(price_voucher) as money_voucher,sum(num_glass) as numglass
    ,sum(money_glass) as money_glass,sum(money_person) as money_person
    ,sum(total) as money_total,sum(arising_price) as money_arising from fm_current_book_$service_id WHERE datediff(timeend,'$from')>=0 and datediff(timeend,'$to')<=0 and flg_cancel=0
    group by DATE_FORMAT(timeend, '%y %m %d') order by timeend";   
    
    $arr =  $objDbUpdate->GetArray($sql);
    $count = count($arr);
    $strvalue='';
    if($count>0){
       for($i=0;$i<$count;$i++){
           
            //$date_sum = $arr[$i]['date_sum'];
            $date_sum = $from;
            $timerent = $arr[$i]['timerent'];
            $numvoucher = $arr[$i]['numvoucher'];
            $numperson = $arr[$i]['numperson'];
            $numrent = $arr[$i]['numrent'];
            $money_voucher = $arr[$i]['money_voucher'];
            $money_promotion = 0;
            $numglass = $arr[$i]['numglass'];
            $money_glass = $arr[$i]['money_glass'];
            $money_person = $arr[$i]['money_person'];
            $money_total = $arr[$i]['money_total'];
            $money_arising = $arr[$i]['money_arising'];
            
         $money_get = 0;
        $money_pay =0;
        $sqlpay = "select sum(money) as money,flg from cus_pay where datediff(date_created,'$date_sum')=0 
        and service_id = '$service_id' group by flg ";
        $arrPay = $objDbUpdate->GetArray($sqlpay);
        for($i=0;$i<count($arrPay);$i++){
            if($arrPay[$i]['flg']==1){
               $money_get = $arrPay[$i]['money']==''?0:$arrPay[$i]['money']; 
            }else{
                $money_pay = $arrPay[$i]['money']==''?0:$arrPay[$i]['money'];  
            }
        }
        $money_revenue = $money_total - $money_pay + $money_get;
            
        $strvalue.=",('$date_sum','$timerent','$numvoucher','$numperson','$numrent','$money_voucher','$money_promotion','$numglass',
            '$money_glass','$money_person','$money_total','$money_arising','$money_pay','$money_get','$money_revenue','$service_id')";
        }
        $strvalue = substr($strvalue,1); 
        $sqlDelete = "delete from fm_summary where datediff(date_sum,'$from')<=0 and datediff(date_sum,'$to')>=0 and service_id = $service_id"; 
        $objDbUpdate->Execute($sqlDelete);
        
        $sqlInsert = "INSERT INTO fm_summary(date_sum,timerent,numvoucher,numperson,numrent,money_voucher,money_promotion,numglass,
            money_glass,money_person,money_total,money_arising,other_pay,other_get,money_revenue,service_id) values$strvalue" ; 
            //echo  $sqlInsert; 
        $objDbUpdate->Execute($sqlInsert);  
    }
    
   
     
}

function summary_projector($service_id,$date,$redo =false){
  global $objDbUpdate; 

  $sql = "select DATE_FORMAT(h.timeend, '%Y-%m-%d') as date_sum,sum(TIMESTAMPDIFF(MINUTE,h.timestart,h.timeend))
 as timespent ,p.id,p.timespent as timestart from fm_projector as p left join  fm_history_projector as h on 
 p.id = h.projector_id and  h.service_id = $service_id and datediff(timeend,'$date')=0
 WHERE p.service_id = $service_id group by p.id";
 $arr =  $objDbUpdate->GetArray($sql);
 
  $sqlSum = "select projector_id,timespent from fm_summary_projector where service_id = $service_id and datediff(date_sum,'$date')=0";
 $arrSum = $objDbUpdate->GetArray($sqlSum); 
    $count = count($arr);
    $countsum = count($arrSum) ;
    $arrTemp = array();
    for($i=0;$i<$countsum;$i++){
      $arrTemp[$arrSum[$i]['projector_id']]= $arrSum[$i]['timespent']; 
    }
    $strvalue=''; 
    if($count>0){
        for($i=0;$i<$count;$i++){ 
            
            $id = $arr[$i]['id'];
            $timespent = $arr[$i]['timespent']==''?0:$arr[$i]['timespent']; 
            $timespentsum = isset($arrTemp[$id])?$arrTemp[$id]:0;
            $timeOffset = (int) ($timespent-$timespentsum);
            $timespentstart = $arr[$i]['timestart'];
            $timespentend =  $timespent + $timespentstart;
            if($timeOffset!=0){
                $sqlupdate = " UPDATE fm_projector set timespent = timespent+($timeOffset),date_sum='$date' where id = $id " ;
                $objDbUpdate->Execute($sqlupdate); 
            } 

            $strvalue.=",($id,'$timespentstart','$timespentend','$timespent','$date',now(),service_id)";
        }
        
        $sqlDelete = "delete from fm_summary_projector where datediff(date_sum,'$date')=0 and service_id = '$service_id'" ;
        $objDbUpdate->Execute($sqlDelete); 
        $strvalue = substr($strvalue,1);
        $sqlInsert = "INSERT INTO fm_summary_projector(projector_id, timespentstart, timespentend, timespent,date_sum, date_created,$service_id)
         values$strvalue" ;     
        $objDbUpdate->Execute($sqlInsert); 
    }
     
}

// $redo = true : có nghĩa là chạy lại
// $redo = false : có nghĩa là chạy lần đầu 
function summary_product($service_id,$date,$redo =false){
  global $objDbUpdate;
  if(!$redo){
      $sql="SELECT p.quanlity as numstart,p.id,sum(num) as num  , (select sum(i.quanlity)  from  cus_importproduct as i
            WHERE i.product_id = p.id and datediff(i.date_created,'$date')=0 and service_id = '$service_id')  as quanlity 
            FROM cus_product_$service_id as p left join cus_history_product_$service_id as h on p.id =h.product_id
            AND datediff(h.date_created,'$date')=0 where p.checkquanlity = 1 group by p.id "; 
        $arr =  $objDbUpdate->GetArray($sql);
        $count = count($arr);
        $strvalue=''; 
        if($count>0){
            for($i=0;$i<$count;$i++){
                $out = (int)$arr[$i]['num'];
                $id = $arr[$i]['id'];
                $numstart = $arr[$i]['numstart'];
                $in = $arr[$i]['quanlity']==''?0:$arr[$i]['quanlity'];
                $numend =  $numstart + $in -$out;
                $sqlupdate = " UPDATE cus_product_$service_id set quanlity = '$numend',date_product='$date' where id = $id " ;
                $objDbUpdate->Execute($sqlupdate);
                $strvalue.=",($id,'$numstart','$numend','$in','$out','$date',now(),'$service_id')";  
                         
            }
            $sqlDelete = "delete from cus_summary_product where datediff(date_sum,'$date')=0 and service_id = $service_id " ;
            $objDbUpdate->Execute($sqlDelete); 
            $strvalue = substr($strvalue,1);
            $sqlInsert = "INSERT INTO cus_summary_product(product_id, num_start, num_end, num_in, num_out,date_sum, date_created,service_id) values$strvalue" ;     
            $objDbUpdate->Execute($sqlInsert);
    }
  }else{
      
   // sql này dành để làm cho   
        /*--------- bắt đầu lấy thông tin tồn đầu kỳ----------*/
        $sqlStart = " SELECT temp.product_id,s.num_end as num_start FROM cus_summary_product AS s JOIN (SELECT MAX(date_sum) AS date_sum ,product_id FROM cus_summary_product i 
        WHERE  i.service_id = '$service_id' AND date_sum < '$date'  GROUP BY i.`product_id` ) temp ON s.`product_id`=temp.product_id 
        AND s.`date_sum`=temp.date_sum ; ";
        
        /*--------- bắt đầu lấy thông tin số lượng sản phẩm bán ra (xuất)----------*/ 
        $sqlOut ="SELECT SUM(num) AS num_out , product_id  FROM cus_history_product_$service_id AS c JOIN cus_product_$service_id AS p ON c.`product_id`=p.id
        WHERE DATEDIFF(c.date_created,'$date')=0 AND p.`checkquanlity`=1 GROUP BY c.`product_id`;  ";
       // echo  $sqlOut;
        
        
        /*--------- bắt đầu lấy thông tin số lượng sản phẩm nhập vào----------*/ 
        $sqlIn = "SELECT SUM(quanlity) as num_in,product_id  FROM  cus_importproduct  
                WHERE  DATEDIFF(date_created,'$date')=0 AND service_id = '$service_id' group by product_id";
               // echo $sqlStart."-----------------------------------------".$sqlOut."-------------------------------".$sqlIn; die();
        
        $arrStart = $objDbUpdate->GetArray($sqlStart);
        $arrOutTemp = $objDbUpdate->GetArray($sqlOut);
        $arrInTemp = $objDbUpdate->GetArray($sqlIn);
        
        $countStart = count($arrStart);
        $countOut = count($arrOutTemp);
        $countIn  = count($arrInTemp);
        
        $arrOut= array();
        $arrIn= array();
        $strvalue='';
           
        for($i=0;$i<$countOut;$i++){
           $arrOut[$arrOutTemp[$i]['product_id']]= $arrOutTemp[$i]['num_out'];
        }
        for($i=0;$i<$countIn;$i++){
           $arrIn[$arrInTemp[$i]['product_id']]= $arrInTemp[$i]['num_in'];
        }
        
        /*--------------------- bắt đầu lấy danh sách sản phẩm đã tổng hợp trước -------------------*/         
        $sqlSumOld = " select `product_id`,(`num_end`-`num_start`) num_offset
                       from cus_summary_product where datediff(date_sum,'$date')=0 and service_id = '$service_id' " ; // lấy danh sách đã tổng hợp cũ     
        $arrSumOld = $objDbUpdate->GetArray($sqlSumOld);
        $arrOldLast = array();
        $flag= false;
        if(is_array($arrSumOld) && count($arrSumOld)){
            $flag = true;// biết là ngày này đã có tổng hợp hay chưa.
            $countOld = count($arrSumOld);
            for($i=0;$i<$countOld;$i++){
              $arrOldLast[$arrSumOld[$i]['product_id']]=$arrSumOld[$i]['num_offset'];  
            }
        }
        /*--------------------- kết thúc lấy danh sách sản phẩm đã tổng hợp trước -------------------*/ 
        
        for($i=0;$i<$countStart;$i++){
            
            $product_id = $arrStart[$i]['product_id'];
            $numstart = $arrStart[$i]['num_start'];
            $out=0;
            $in=0;
            $num_offsetOld =0;
            if(isset($arrOut[$product_id])){
              $out = $arrOut[$product_id]; 
              unset($arrOut[$product_id]); 
            }
            if(isset($arrIn[$product_id])){
              $in = $arrIn[$product_id];
              unset($arrIn[$product_id]);   
            }
            if(isset($arrOldLast[$product_id])){
              $num_offsetOld = $arrOldLast[$product_id];  
            }
            $numend =  $numstart + $in -$out;
            $num_offset =  $in - $out -$num_offsetOld;
            
            if($num_offset!=0){                    
                $sqlupdate = " UPDATE cus_product_$service_id set quanlity = quanlity +($num_offset),date_product='$date' where id = $product_id " ;
                $objDbUpdate->Execute($sqlupdate);
                //if($flag_dateOld){
                  $sqlupdateSum = " UPDATE cus_summary_product set num_start + ($num_offset),num_end + 
                  ($num_offset) where product_id = $product_id and service_id = $service_id and datediff(date_sum,'$date') > 0" ; 
                  $objDbUpdate->Execute($sqlupdateSum);  
               //}                    
            }
            $strvalue.=",('$product_id','$numstart','$numend','$in','$out','$date',now(),'$service_id')";

        }
        foreach($arrOut as $key=>$val){
            $numstart = 0;
             $out = $val;
             $in=0;
             $num_offsetOld =0;  
             if(isset($arrIn[$key])){
              $in = $arrIn[$key];
              unset($arrIn[$key]);   
            }
             if(isset($arrOldLast[$key])){
              $num_offsetOld = $arrOldLast[$key];  
            }
            $numend =  $numstart + $in -$out; 
            $num_offset =  $in - $out -$num_offsetOld;
             //echo $num_offsetOld.'---------';
            
            if($num_offset!=0){                    
                $sqlupdate = " UPDATE cus_product_$service_id set quanlity = quanlity +($num_offset),date_product='$date' where id = $key " ;
               //echo $sqlupdate.'-----------------------'; 
                $objDbUpdate->Execute($sqlupdate);
                if($flag_dateOld){
                  $sqlupdateSum = " UPDATE cus_summary_product set num_start + ($num_offset),num_end + 
                  ($num_offset) where product_id = $id and service_id = $service_id and datediff(date_sum,'$date') > 0" ; 
                  $objDbUpdate->Execute($sqlupdateSum);  
                }                    
            }
            $strvalue.=",('$key','$numstart','$numend','$in','$out','$date',now(),'$service_id')";
            
        }
        //die();
        
        foreach($arrIn as $key=>$val){
            $numstart = 0;           
             $out = 0;
             $in=$val;
             $num_offsetOld=0;
             if(isset($arrOldLast[$key])){
              $num_offsetOld = $arrOldLast[$key];  
            }
             $numend =  $numstart + $in -$out; 
            $num_offset =  $in - $out -$num_offsetOld;
            
            if($num_offset!=0){                    
                $sqlupdate = " UPDATE cus_product_$service_id set quanlity = quanlity +($num_offset),date_product='$date' where id = $key " ;
                $objDbUpdate->Execute($sqlupdate);
                if($flag_dateOld){
                  $sqlupdateSum = " UPDATE cus_summary_product set num_start + ($num_offset),num_end + 
                  ($num_offset) where product_id = $id and service_id = $service_id and datediff(date_sum,'$date') > 0" ; 
                  $objDbUpdate->Execute($sqlupdateSum);  
                }                    
            }
            $strvalue.=",('$key','$numstart','$numend','$in','$out','$date',now(),'$service_id')";
            
        }
        
        $sqlDelete = "delete from cus_summary_product where datediff(date_sum,'$date')=0 and service_id = $service_id " ;
        $objDbUpdate->Execute($sqlDelete); 
        $strvalue = substr($strvalue,1);
        $sqlInsert = "INSERT INTO cus_summary_product(product_id, num_start, num_end, num_in, num_out,date_sum, date_created,service_id) values$strvalue" ;     
       
       //echo $sqlInsert; die();
       
        $objDbUpdate->Execute($sqlInsert);
  } 
}
?>
