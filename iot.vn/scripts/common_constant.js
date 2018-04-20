var UPPERCHARCODE = new Array(65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90);
var LOWERCHARCODE = new Array(97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122);
var NUMBERCHARCODE = new Array(48,49,50,51,52,53,54,55,56,57);
var SPECIELCHARCODE = new Array(45,59,95,64,44);
var ALLOWCHARCODE = new Array(46);
// Match Integer
var ExpInteger = /^(\d)+$/;
var ExpFloat = /^(\d)+(.(\d)+)*$/;
var NumberFormat = /^(?!0.00)\d{1,3}(,\d{3})*(\.\d{1,2})?$/
var TimeSpent = /^(\d)+h[0-5]?[0-9]p?$/;
var TimeSpentNew = /^(d{1,}):[0-5][0-9]$/;
//Match Name
var ExpName = /^(\w)+$/;
// matches 05:04 or 12:34 but not 75:83
var ExpTime24 = /^(([0-1][0-9])|(2[0-4])):[0-5][0-9]$/;
//matches email
var ExpEmail = /^(\w)+([.](\w)+)*@(\w)+([.](\w)+)+$/;
// Match mm/yyyy
var ExpMonthYear = /^(0[1-9])|(1[0-2]){1}\/\d{4}$/;
// Match dd/mm/yyyy
var ExpDayMonthYear = /^(([1-9]|0[1-9]|([1-2][0-9])|3[0-1]))\/(([1-9])|(0[1-9])|(1[0-2]))\/\d{4}$/;
// Match dd/mm/yyyy H:i:s
var ExpFullTime = /^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4} (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/;
// Match Phone number
var ExpPhone = /^(\d)+(\d|.|-)*(\d)$/;
// Match mobi phone full
var ExpMobiPhone = /^09[0|1|3|5|8]\d{7}$/;
var ExpBillNo = /^(\w)+([.-](\w)+)*$/;

const SEP_ROW      =  ';xrowx;';
const SEP_COL      =  ';xcolx;';
const SEP_TITLE    =  ';xtitlex;';