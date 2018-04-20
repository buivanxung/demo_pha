<?php
// Ham dao nguoc dang ngay/thang/nam ---> nam-thang-ngay
function RevertDate($sDate, $bTime = false)
{
	$sTime = '';
	if($bTime)
	{
		$sTime = substr($sDate, -8);
		// Kiem tra ngay thang dung dinh dang
		$TimePatt = '/^(([0-1][0-9])|(2[0-4])):[0-5][0-9]:[0-5][0-9]$/';
		if(!preg_match($TimePatt, $sTime))
		{
			//MsgBox1('Gio khong hop le');
			return('');
		}
		$sDate = substr($sDate, 0, 10);
	}

	$DatePatt = '/^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4}$/';
	if(!preg_match($DatePatt, $sDate))
	{
		//MsgBox1('Ngay khong hop le: '.$sDate);
		return('');
	}

    $arrTmp = split("/", $sDate);
    if(count($arrTmp) != 3)
    {
		MsgBox1('Ngay khong hop le 1: '.$sDate);
        return("");
    }
    $sReturn = $arrTmp[2]."-".$arrTmp[1]."-".$arrTmp[0].' '.$sTime;
    return(trim($sReturn));
}
// Het ham dao nguoc ngay thang

// Ham chuyen dinh dang ngay thang: nam-thang-ngay chuyen thanh ngay/thang/nam
function ConvertDate($sDate, $bTime = false)
{
	$sTime = '';
	if($bTime)
	{
		$sTime = substr($sDate, -8);
		// Kiem tra ngay thang dung dinh dang
		$TimePatt = '/^(([0-1][0-9])|(2[0-4])):[0-5][0-9]:[0-5][0-9]$/';
		if(!preg_match($TimePatt, $sTime))
		{
			//MsgBox1('Gio khong hop le');
			return('');
		}
		$sDate = substr($sDate, 0, 10);
	}

	$DatePatt = '/^\d{4}-((0[1-9])|(1[0-2]))-((0[1-9]|([1-2][0-9])|3[0-1]))$/';
	if(!preg_match($DatePatt, $sDate))
	{
		//MsgBox1('Ngay khong hop le: '.$sDate);
		return('');
	}

    $arrTmp = split("-", $sDate);
    if(count($arrTmp) != 3)
    {
		//MsgBox1('Ngay khong hop le 1: '.$sDate);
        return("");
    }
    $sReturn = $arrTmp[2]."/".$arrTmp[1]."/".$arrTmp[0].' '.$sTime;
    return(trim($sReturn));
}
// Het ham chuyen dinh dang ngay thang

/* Add-Start by lamdhn - 2010.12.07 */

/**
* True: Giờ Phút lẻ
* False: Giờ Phút chẳn
* 
* @param mixed $h: Giờ
* @param mixed $i: Phút
* @param mixed $iExt: Phút chênh lệch
*/
function IsOddTime($h, $i, $iExt)
{
    // Neu gio la 00:00 hoac 23:59 thi la gio chan (false) nguoc lai la le (true)
    if (($h == '00' && $i - $iExt <= 0) || ($h== "23" && $i + $iExt >= 59))
    {
        return false;
    }
    
    return true;
}

/**
* True: Lớn hơn hoặc bằng giờ hiện tại
* False: Nhỏ hơn giờ hiện tại
* 
* @param mixed $hi: Giờ phút
* @param mixed $h: Giờ
* @param mixed $i: Phút
* @param mixed $hiCurr: Giờ phút hiện tại
* @param mixed $hCurr: Giờ hiện tại
* @param mixed $iCurr: Phút hiện tại
* @param mixed $iExt: Phút chênh lệch
*/
function IsMoreOrEqualCurrTime($d, $hi, $h, $i, $dCurr, $hiCurr, $hCurr, $iCurr, $iExt)
{
    if ($d < $dCurr)
    {
        return false;
    }
    
    if ($hi >= $hiCurr || ($h == $hCurr && $i + $iExt >= $iCurr))
    {
        return true;
    }
    
    return false;
}

/**
* True: Ngày kết thúc trừ ngày ban đầu >= 24h
* False: Ngày kết thúc trừ ngày ban đầu < 24h
* 
* @param mixed $dF: Ngày ban đầu
* @param mixed $dT: Ngày kết thúc
*/
function IsMoreOrEqual24h($dF, $dT)
{
    if (strtotime($dT) - strtotime($dF) >= 3600*24)
    {
        return true;
    }
    
    return false;
}

function IsSmallOrEqual24h($dF, $dT)
{
    if (strtotime($dT) - strtotime($dF) <= 3600*24)
    {
        return true;
    }
    
    return false;
}

function IsSmall24h($dF, $dT)
{
    if (strtotime($dT) - strtotime($dF) < 3600*24)
    {
        return true;
    }
    
    return false;
}

function GetDateTimeSummaryFrom($hF, $dF)
{
    if ($hF == '23')
    {
        return date('Y-m-d', strtotime($dF." 23:59:59") + 1);
    }
    else
    {
        return $dF;
    }
}

function GetDateTimeSummaryTo($hT, $dT)
{
     if ($hT == '23')
    {
        return $dT;
    }
    else
    {
        return date('Y-m-d', strtotime($dT." 00:00:00") - 1);
    }
}

function GetDateTimeLastDataTo($dtTo, $iExt)
{
    return date('Y-m-d H:i:s', strtotime($dtTo) + $iExt*60 + 60);
}

function GetDatesBySummaryReport($dtFrm, $dtTo)
{    
    // So phut lệch
    $estMinute = 3;
                    
    // Current date time
    $dateCurr = date('Y-m-d'); // yyyy/MM/dd
    $timeCurr = date('H:i:s'); // HH:mm
    $hiCurr = substr($timeCurr, 0, 5); // HH:mm
    $hCurr = substr($timeCurr, 0, 2); // HH    
    $iCurr = substr($timeCurr, 3, 2); // mm
    $sCurrDateTime = $dateCurr .' '.$timeCurr;
    
    // Tu ngay    
    $sDateTimeFrom = $dtFrm;
    $sDateTimeFrom = ToMySQLDateTime($sDateTimeFrom);
    $arrData = split(" ", $sDateTimeFrom);
    $dF = $arrData[0]; // yyyy/MM/dd 
    $hisF = $arrData[1]; // HH:mm:ss
    $hiF = substr($hisF, 0, 5); // HH:mm
    $hF = substr($hiF, 0, 2); // HH
    $iF = (int)substr($hiF, 3, 2); // mm
    
    // Den ngay
    $sDateTimeTo = $dtTo;
    $sDateTimeTo = ToMySQLDateTime($sDateTimeTo);            
    $arrData = split(" ", $sDateTimeTo);
    $dT = $arrData[0]; // yyyy/MM/dd 
    $hisT = $arrData[1]; // HH:mm:ss
    $hiT = substr($hisT, 0, 5); // HH:mm
    $hT = substr($hiT, 0, 2); // HH
    $iT = (int)substr($hiT, 3, 2); // mm
    
    // Giờ Phút ban đầu là chẳn
    $IsOddTimeF = IsOddTime($hF, $iF, $estMinute);
    // Giờ Phút kết thúc là chẳn
    $IsOddTimeT = IsOddTime($hT, $iT, $estMinute);
    
    // Giờ Phút ban đầu >= Giờ Phút hiện tại
    $IsMoreOrEqualCurrTimeF = IsMoreOrEqualCurrTime($dF, $hiF, $hF, $iF, $dateCurr, $hiCurr, $hCurr, $iCurr, $estMinute);
    // Giờ Phút kết thúc >= Giờ Phút hiện tại
    $IsMoreOrEqualCurrTimeT = IsMoreOrEqualCurrTime($dT, $hiT, $hT, $iT, $dateCurr, $hiCurr, $hCurr, $iCurr, $estMinute);
    
    // Ngày hiện tại trừ ngày ban đầu >= 24h
    $IsMoreOrEqual24hF = IsMoreOrEqual24h($dF, $dateCurr);
        
    // Ngày kết thúc trừ ngày hiện tại >= 24h
    $IsMoreOrEqual24hT = IsMoreOrEqual24h($dateCurr, $dT);
            
    // Ngày kết thúc trừ ngày ban đầu < 24h
    $IsSmall24h = IsSmall24h($dF, $dT);    
    
    
    /**
    * 1. Trường hợp chỉ lấy table Last Data
    * Nếu Ngày ban đầu >= Ngày hiện tại
    *   Và Giờ Phút ban đầu là chẳn
    *   Và Giờ Phút kết thúc >= Giờ Phút hiện tại
    */
    if (($sDateTimeFrom >= $sCurrDateTime // Ngày ban đầu >= Ngày hiện tại
        && (!$IsOddTimeF) // Giờ Phút ban đầu là chẳn        
        )
        ||
        (
        $dF == $dateCurr
        && (!$IsOddTimeF) // Giờ Phút ban đầu là chẳn        
        && $sDateTimeTo >= $sCurrDateTime
        ))
    {
        $arrParams['IsLastData'] = true;
        $arrParams['DateLastFrom'] = $sDateTimeFrom;
        $arrParams['DateLastTo'] = GetDateTimeLastDataTo($sDateTimeTo, $estMinute);
        
        return $arrParams;
    }
    
    /**
    * 2. Trường hợp chỉ lấy table Sumamary Info
    * Nếu ngày kết thúc <= ngày hiện tại
    *   Và Giờ Phút của ngày ban đầu là chẳn
    *   Và Giờ Phút của ngày kết thúc là chẳn 
    */
    if ($sDateTimeTo <= $sCurrDateTime // Ngày kết thúc <= ngày hiện tại 
        && (!$IsOddTimeF) // Giờ Phút ban đầu là chẳn
        && (!$IsOddTimeT) // Giờ Phút kết thúc là chẳn
       )
    {
        $arrParams['IsSummary'] = true;
        $arrParams['DateSummaryFrom'] = GetDateTimeSummaryFrom($hF, $dF);
        $arrParams['DateSummaryTo'] = GetDateTimeSummaryTo($hT, $dT);
        
        return $arrParams;
    }
    
    /**
    * 3. Trường hợp chỉ lấy table Data
    * Nếu Ngày kết thúc <= Ngày hiện tại    
    *   Và Giờ phút kết thúc Or Giờ ban đầu là lẻ    
    *   Và Ngày kết thúc trừ ngày ban đầu < 24h
    */
    if (($sDateTimeTo <= $sCurrDateTime // Ngày kết thúc <= ngày hiện tại 
        && ($IsOddTimeT || $IsOddTimeF) // Giờ Phút kết thúc Or Gio ban dau là lẻ        
        && ($IsSmall24h) // Ngày kết thúc trừ ngày ban đầu < 24h
       )
       ||
       (
         $dF == $dateCurr // Ngày ban dau = ngày hiện tại 
         && $IsOddTimeF   // Giờ Phút ban dau là lẻ        
       ))
    {
        $arrParams['IsDataFrom'] = true;
        $arrParams['DateFirstFrom'] = $sDateTimeFrom;
        $arrParams['DateFirstTo'] = $sDateTimeTo;
                
        return $arrParams;
    }
    
    /**
    * 4. Trường hợp lấy table Sumamary Info và table Data
    * Nếu ngày giờ kết thúc <= ngày giờ hiện tại
    *   Và Giờ Phút của ngày ban đầu là chẳn
    *   Và Giờ Phút của ngày kết thúc là lẻ
    *   Và Ngày hiện tại trừ ngày ban đầu >= 24h    
    */
    if ($sDateTimeTo <= $sCurrDateTime // Ngày kết thúc <= ngày hiện tại 
        && (!$IsOddTimeF) // Giờ Phút ban đầu là chẳn 
        && ($IsOddTimeT) // Giờ Phút kết thúc là lẻ 
        && ($IsMoreOrEqual24hF) // Ngày hiện tại trừ ngày ban đầu >= 24h        
       )
    {        
        $sDateSummaryFrom = GetDateTimeSummaryFrom($hF, $dF);
        $sDateSummaryTo = date('Y-m-d', strtotime($dT." 00:00:00") - 1);
        //GetDateTimeSummaryTo($hT, $dT);
        
        if ($sDateSummaryTo >= $sDateSummaryFrom)
        {
            $arrParams['IsSummary'] = true;
            $arrParams['DateSummaryFrom'] = $sDateSummaryFrom;
            $arrParams['DateSummaryTo'] = $sDateSummaryTo;
        }
               
        $arrParams['IsDataFrom'] = true;
        $arrParams['DateFirstFrom'] = $dT." 00:00:00";
        $arrParams['DateFirstTo'] = $sDateTimeTo;
                
        return $arrParams;
    }
    
    /**
    * 5. Trường hợp lấy table Sumamary Info và Last Data
    * Nếu ngày kết thúc >= ngày hiện tại
    *   Và Giờ Phút của ngày ban đầu là chẳn
    *   Và Ngày hiện tại trừ ngày ban đầu > 1 Ngày        
    */
    if ($sDateTimeTo >= $sCurrDateTime // Ngày giờ kết thúc >= ngày giờ hiện tại 
        && ($IsMoreOrEqual24hF) // Ngày hiện tại trừ ngày ban đầu > 1 Ngày        
        && (!$IsOddTimeF) // Giờ Phút ban đầu là chẳn 
       )
    {
        $sDateSummaryFrom = GetDateTimeSummaryFrom($hF, $dF);
        $sDateSummaryTo = date('Y-m-d', strtotime($dateCurr." 00:00:00") - 1);
        
        if ($sDateSummaryTo >= $sDateSummaryFrom)
        {
            $arrParams['IsSummary'] = true;
            $arrParams['DateSummaryFrom'] = $sDateSummaryFrom;
            $arrParams['DateSummaryTo'] = $sDateSummaryTo;
        }
        
        $arrParams['IsLastData'] = true;
        $arrParams['DateLastFrom'] = $dateCurr." 00:00:00";
        $arrParams['DateLastTo'] = GetDateTimeLastDataTo($sDateTimeTo, $estMinute);
                
        return $arrParams;
    }
                
    /**
    * 6. Trường hợp lấy table Data và Summary Info
    * Nếu Ngày kết thúc <= Ngày hiện tại    
    *   Và Giờ Phút của ngày ban đầu là lẻ     
    *   Và Giờ phút của ngày kết thúc là chẳn
    *   Và Giờ phút của ngày kết thúc < Giờ phút hiện tại
    */
    if ($dT <= $dateCurr // Ngày kết thúc <= ngày hiện tại
        && ($IsOddTimeF) // Giờ Phút ban đầu là lẻ
        && (!$IsOddTimeT) // Giờ Phút kết thúc là chẳn
        && (!$IsMoreOrEqualCurrTimeT) // Giờ Phút kết thúc < Giờ Phút hiện tại 
       )
    {
        $arrParams['IsDataFrom'] = true;
        $arrParams['DateFirstFrom'] = $sDateTimeFrom;
        $arrParams['DateFirstTo'] = $dF." 23:59:59";
        
        $sDateSummaryFrom = date('Y-m-d', strtotime($arrParams['DateFirstTo']) + 1);
        $sDateSummaryTo =  GetDateTimeSummaryTo($hT, $dT);
        
        if ($sDateSummaryTo >= $sDateSummaryFrom)
        {
            $arrParams['IsSummary'] = true;
            $arrParams['DateSummaryFrom'] = $sDateSummaryFrom;
            $arrParams['DateSummaryTo'] = $sDateSummaryTo;
        }
               
        return $arrParams;
    }
    
    /**
    * 7. Trường hợp lấy table Data và Last Data
    * Nếu Ngày ban đầu < Ngày hiện tại    
    *   Và Giờ Phút của ngày ban đầu là lẻ 
    *   Và Ngay giờ của ngày kết thúc >= Ngày giờ hiện tại
    *   Và Ngày kết thúc trừ ngày ban đầu <= 1 ngày 
    */
    if ($dF < $dateCurr // Ngày ban đầu < ngày hiện tại         
        && ($IsOddTimeF) // Giờ Phút ban đầu là lẻ        
        && ($sDateTimeTo >= $sCurrDateTime) // Ngay Giờ kết thúc >= Ngay Giờ hiện tại 
        && (!$IsMoreOrEqual24hF) // Ngày hiện tại trừ ngày ban đầu < 24h
        //&& ($IsSmall24h) // Ngày kết thúc trừ ngày ban đầu < 24h
       )
    {
        $arrParams['IsDataFrom'] = true;
        $arrParams['DateFirstFrom'] = $sDateTimeFrom;
        $arrParams['DateFirstTo'] = $dF." 23:59:59";
                        
        $arrParams['IsLastData'] = true;
        $arrParams['DateLastFrom'] = $dateCurr." 00:00:00";
        $arrParams['DateLastTo'] = GetDateTimeLastDataTo($sDateTimeTo, $estMinute);
                
        return $arrParams;
    }
        
    /**
    * 8. Trường hợp lấy table Data, Summary Info và table Data
    * Nếu Ngày kết thúc <= Ngày hiện tại
    *   Và Ngày hiện tại trừ ngày ban đầu >= 24h
    *   Và Giờ Phút của ngày ban đầu là lẻ 
    *   Và Giờ kết thúc là lẻ    
    */
    if ($sDateTimeTo <= $sCurrDateTime // Ngày kết thúc <= ngày hiện tại 
        && ($IsMoreOrEqual24hF) // Ngày hiện tại trừ ngày ban đầu >= 24h
        && ($IsOddTimeF) // Giờ Phút ban đầu là lẻ        
        && ($IsOddTimeT) // Giờ Phút kết thúc là lẻ
       )
    {
        $arrParams['IsDataFrom'] = true;
        $arrParams['DateFirstFrom'] = $sDateTimeFrom;
        $arrParams['DateFirstTo'] = $dF." 23:59:59";
        
        $sDateSummaryFrom = date('Y-m-d', strtotime($arrParams['DateFirstTo']) + 1);
        $sDateSummaryTo = date('Y-m-d', strtotime($dT," 00:00:00") - 1);
        
        if ($sDateSummaryTo >= $sDateSummaryFrom)
        {
            $arrParams['IsSummary'] = true;
            $arrParams['DateSummaryFrom'] = $sDateSummaryFrom;
            $arrParams['DateSummaryTo'] = $sDateSummaryTo;
        }
        
        $arrParams['IsDataTo'] = true;
        $arrParams['DateLastFrom'] = $dT." 00:00:00";
        $arrParams['DateLastTo'] = GetDateTimeLastDataTo($sDateTimeTo, $estMinute);
                
        return $arrParams;
    }
    
    /**
    * 9. Trường hợp lấy table Data, Summary Info va Last Data
    * Nếu Ngày kết thúc >= Ngày hiện tại    
    *   Và Ngày hiện tại trừ ngày ban đầu >= 24h
    *   Và Giờ Phút của ngày ban đầu là lẻ 
    */
    if ($sDateTimeTo >= $sCurrDateTime // Ngày giờ kết thúc >= ngày giờ hiện tại 
        && ($IsMoreOrEqual24hF) // Ngày hiện tại trừ ngày ban đầu >= 24h
        && ($IsOddTimeF) // Giờ Phút ban đầu là lẻ
       )
    {
        $arrParams['IsDataFrom'] = true;
        $arrParams['DateFirstFrom'] = $sDateTimeFrom;
        $arrParams['DateFirstTo'] = $dF." 23:59:59";
        
        $sDateSummaryFrom = date('Y-m-d', strtotime($arrParams['DateFirstTo']) + 1);
        $sDateSummaryTo = date('Y-m-d', strtotime($dateCurr." 00:00:00") - 1);
        
        if ($sDateSummaryTo >= $sDateSummaryFrom)
        {
            $arrParams['IsSummary'] = true;
            $arrParams['DateSummaryFrom'] = $sDateSummaryFrom;
            $arrParams['DateSummaryTo'] = $sDateSummaryTo;
        }
        
        $arrParams['IsLastData'] = true;
        $arrParams['DateLastFrom'] = $dateCurr." 00:00:00";
        $arrParams['DateLastTo'] = GetDateTimeLastDataTo($sDateTimeTo, $estMinute); 
                
        return $arrParams;
    }
    
    /**
    * Neu cac truong hop tren ko xay ra
    * thi xet truong hop dac biet chi lay trong table data        
    */
    $arrParams['IsDataFrom'] = true;
    $arrParams['DateFirstFrom'] = $sDateTimeFrom;
    $arrParams['DateFirstTo'] = $sDateTimeTo;
    
    return $arrParams;
} 

/* Add-End by lamdhn - 2010.12.07 */