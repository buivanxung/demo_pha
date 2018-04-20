<?php
class CValidator
{
    var $arrThePatt = array();	// Mang cac chuoi patterm

    function CValidator()
    {
        $this->arrThePatt['Integer']    = '/^(\d)+$/'; // Match Integer
        $this->arrThePatt['Name']       = '/^(\w)+$/';    //Match Name
        $this->arrThePatt['Time24']     = '/^(([0-1][0-9])|(2[0-4])):[0-5][0-9]$/'; // matches 05:04 or 12:34 but not 75:83
        $this->arrThePatt['Email']      = '/^(\w)+([.](\w)+)*@(\w)+([.](\w)+)+$/';  //matches email
        $this->arrThePatt['MonthYear']  = '/^(0[1-9])|(1[0-2]){1}\/\d{4}$/';        // Match mm/yyyy
        $this->arrThePatt['DayMonthYear']  = '/^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4}$/'; // Match dd/mm/yyyy
		$this->arrThePatt['DayMonthYearHMS']  = '/^((((31\/(0?[13578]|1[02]))|((29|30)\/(0?[1,3-9]|1[0-2])))\/(1[6-9]|[2-9]\d)?\d{2})|(29\/0?2\/(((1[6-9]|[2-9]\d)?(0[48]|[2468][048]|[13579][26])|((16|[2468][048]|[3579][26])00))))|(0?[1-9]|1\d|2[0-8])\/((0?[1-9])|(1[0-2]))\/((1[6-9]|[2-9]\d)?\d{2})) (20|21|22|23|[0-1]?\d):[0-5]?\d:[0-5]?\d$/'; // Match dd/mm/yyyy hh:ii:ss
        $this->arrThePatt['Phone']      = '/^(\d)+(\d|.|-)*(\d)$/'; // Match Phone number
        $this->arrThePatt['MobiPhone']  = '/^09[0|1|2|3|5|8]\d{7}$/';
        $this->arrThePatt['IPSerial']  = '/^IP(\d){6}$/';
        $this->arrThePatt['IPSerials']  = '/^IP(\d){6}(;IP(\d){6})*$/';
        return(true);
    }
    
    function CheckPatt($sPattern, $sString)
    {
        if(!isset($this->arrThePatt[$sPattern]))
        {
            return(true);
        }
        return(preg_match($this->arrThePatt[$sPattern], $sString));
    }
}// end of class CValidator
?>
