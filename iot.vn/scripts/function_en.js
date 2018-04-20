// File function.js: chua cac ham dung chung
/**
* checkDate(): kiểm tra FromDate có lơn hơn ToDate không, nếu lớn hơn trả về true.
*
**/


//==========================================
/**
* Hàm kiểm tra FromDate có lơn hơn ToDate một lượng day ngày hay không
* Input:
* From: ngày bắt đầu
* To: ngày kết thúc.
* day : khoảng cách ngày, mặc định là bằng 0
* Output:
* Trả ra True nếu ngày bắt đầu lớn hơn ngày kết thúc.
* Trả ra False nếu ngày bắt đầu nhỏ hơn ngày kết thúc.
* Update History:
	 Ver.    TRB#        Date          Author    Note
	 3                   2010-08-27    Trungdt   Thêm tham số day
**/
 var SYSTEM_MAX_FILE_UPLOAD = "20000";
function checkDate(from, to, day)
{   
	var df = Date.parse(toDate(from));
	var dt = Date.parse(toDate(to));
	if (day==null)
		day=0;

	var ns = ((dt - df) / 3600000 / 24);     
    
	if(ns < day)
	{
		return true;
	}
	return false;
}

function fn_checkValidation(d)
{
    var dateCompTemp = d.split(" ");   
    var index =  dateCompTemp[0].indexOf("-");
    var dateComp; 
    if (index > 0)
    {
        dateComp = dateCompTemp[0].split("-");      
    }
    else
    {
        dateComp = dateCompTemp[0].split("/");   
    }
  
    dayInmonth = new Array(12);
    dayInmonth[0]=31;
    dayInmonth[1]=29;
    dayInmonth[2]=31;
    dayInmonth[3]=30;
    dayInmonth[4]=31;
    dayInmonth[5]=30;
    dayInmonth[6]=31;
    dayInmonth[7]=31;
    dayInmonth[8]=30;
    dayInmonth[9]=31;
    dayInmonth[10]=30;
    dayInmonth[11]=31;
    
     if (dateComp[0] % 4 == 0)
        {
            dayInmonth[1]=29;
        }
     else
        {
            dayInmonth[1]=28;        
        }
     if (dateComp[2] > dayInmonth[dateComp[1]-1] || dateComp[2] < 1)
        {
           
            return false;
        }
     
     return true;   
        
}

function toDate(dt)
{
	try
	{
        var arrFull = dt.split(" ");
         var arr = arrFull[0].split("-") ;  
        if(arrFull.length ==1)
        {
           
           return arr[1] + '/' + arr[2] + '/' + arr[0] + " 00:00:00"; 
        }
		//var arr = arrFull[0].split("-");          
		return arr[1] + '/' + arr[2] + '/' + arr[0] + " " + arrFull[1];        
	}
	catch(e)
	{
		return dt;
	}
}

//Start Trung Add 21/10/2010
function formatddmmyyyy(dt){
	var dttemp = dt.value;
	var arr = dttemp.split(" ");
	var result = dttemp;
	if(arr.length==2){			
		result = fmddmmyyyy(arr[0])+" "+fmddHHMMSS(arr[1]);
	}else if(arr.length==1){
		if(dttemp.length>=14){
			datetemp = dttemp.substring(0,dttemp.length-8);
			timetemp = dttemp.substring(dttemp.length-8,dttemp.length);
			result = fmddmmyyyy(datetemp)+" "+fmddHHMMSS(timetemp);
		}else{
			result = fmddmmyyyy(dttemp);
		}
	}
	dt.value = result;	
}

function fmddmmyyyy(dt){	
	//ddmmyyyy = /^((0[1-9]|([1-2][0-9])|3[0-1]))((0[1-9])|(1[0-2]))\d{4}$/;
    ddmmyyyy =  /^\d{4}((0[1-9])|(1[0-2]))((0[1-9]|([1-2][0-9])|3[0-1]))$/;
    
	//yyyymd   = /^([1-9])([1-9])\d{4}$/;
    yyyymd   =  /^\d{4}([1-9])([1-9])$/; 
    
	//dmmyyyy  = /^([1-9])(1[0-2])\d{4}$/;
    dmmyyyy  = /^\d{4}((0[1-9])|(1[0-2]))([1-9])$/;   
    
	//ddmyyyy  = /^(([1-2][0-9])|3[0-1])([1-9])\d{4}$/;
    ddmyyyy  =  /^\d{4}([1-9])((0[1-9])|([1-2][0-9])|3[0-1])$/; 
    
	//ddmmyy   = /^((0[1-9]|([1-2][0-9])|3[0-1]))((0[1-9])|(1[0-2]))\d{2}$/;	
    ddmmyy   = /^\d{2}((0[1-9])|(1[0-2]))((0[1-9]|([1-2][0-9])|3[0-1]))$/;
    
	//Fulldmy  = /^(([1-9]|0[1-9]|([1-2][0-9])|3[0-1]))\/(([1-9])|(0[1-9])|(1[0-2]))\/\d{4}$/;
    Fulldmy  = /^\d{4}-(([1-9])|(0[1-9])|(1[0-2]))-(([1-9]|0[1-9]|([1-2][0-9])|3[0-1]))$/;      
    
	//NoFuldmy = /^(([1-9]|0[1-9]|([1-2][0-9])|3[0-1]))\/(([1-9])|(0[1-9])|(1[0-2]))\/\d{2}$/;
    NoFuldmy = /^\d{2}-(([1-9])|(0[1-9])|(1[0-2]))-(([1-9]|0[1-9]|([1-2][0-9])|3[0-1]))$/; 
	var dttemp = dt;
    
	try
	{
		var temp="";
		if(Fulldmy.exec(dttemp)|| NoFuldmy.exec(dttemp)){ 
			temp = dttemp;
		}else if(ddmmyyyy.exec(dttemp)){
				temp = dttemp.substring(0,4)+"-"+dttemp.substring(4,6)+"-"+dttemp.substring(6,8);
		}
		else if(dmmyyyy.exec(dttemp)){
			temp = dttemp.substring(0,4)+"-"+dttemp.substring(4,6)+"-"+dttemp.substring(6,7);
			//return fmFullDate(temp);					
		}
		else if(ddmyyyy.exec(dttemp)){
			temp = dttemp.substring(0,4)+"-"+dttemp.substring(4,5)+"-"+dttemp.substring(5,7);
			//return fmFullDate(temp);
		}
		else if(dttemp.length==6){
			//alert('vao 6');
			var yy=dttemp.substring(0,2);
			if(yy=='20'||yy=='21'||yy=='19'){
				 temp = dttemp.substring(0,4)+"-"+dttemp.substring(4,5)+"-"+dttemp.substring(5,6);		 						
			}else if(ddmmyy.exec(dttemp)){				
				temp = dttemp.substring(0,2)+"-"+dttemp.substring(2,4)+"-"+dttemp.substring(4,6);										
			}		
		}
		if(temp!=""){
			return fmFullDate(temp);
		}else{
			return dt;
		}
		
	}
	catch(e)
	{
		return dt;
	}
	
}

function fmddHHMMSS(input){	
	FullHMS   = /^([0-9]|0[0-9]|1[0-9]|2[0-4]):([0-9]|[0-5][0-9]):([0-9]|[0-5][0-9])$/ ;
	NoFullHMS = /^([0-9]|[0[0-9]|1[0-9]|2[0-4])([0-5][0-9])([0-5][0-9])$/ ;
	var dttemp = input;
	try
	{
		var temp="";
		if(FullHMS.exec(dttemp)){
			temp = dttemp;
		}else if(NoFullHMS.exec(dttemp)){	
			lenInput = dttemp.length;
			temp = dttemp.substring(0,lenInput-4)+":"+dttemp.substring(lenInput-4,lenInput-2)+":"+dttemp.substring(lenInput-2,lenInput);
		}
		if(temp!=""){
			return fmFullTime(temp);
		}else{
			return input;
		}
	}
		catch(e)
	{
		return input;
	}	
}

function fmFullTime(dt){
	try
	{
		var arr = dt.split(":");
		var HH  = arr[0];
		var MM  = arr[1];
		var SS  = arr[2];
		if(HH.length==1){
			HH ='0'+HH;
		}
		if(MM.length==1){
			MM ='0'+MM;
		}
		if(SS.length==1){
			SS ='0'+SS;
		}	
		return HH + ':' + MM + ':' + SS;
	}
	catch(e)
	{
		return dt;
	}
}

function fmFullDate(dt){
	try
	{
		var arr = dt.split("-");
		var dd  = arr[2];
		var mm  = arr[1];
		var yyyy  = arr[0];
		if(dd.length==1){
			dd ='0'+dd;
		}
		if(mm.length==1){
			mm ='0'+mm;
		}
		if(yyyy.length==2){
			yyyy ='20'+yyyy;
		}
		return yyyy + '-' + mm + '-' + dd;
	}
	catch(e)
	{
		return dt;
	}
}
//End Trung Add 21/10/2010

/*
Ham convert 1 chuoi ngay (dd/MM/yyyy hoac dd/MM/yyyy HH:mm:ss)
den 1 chuoi ngay (yyyy/MM/dd hoac yyyy/MM/dd HH:mm:ss)

@dt: yyyy/MM/dd hoac yyyy/MM/dd HH:mm:ss
*/


/*
So sanh 2 chuoi ngay.
@dtFrm: Tu Ngay (dd/MM/yyyy hoac dd/MM/yyyy HH:mm:ss)
@dtTo: Den Ngay (dd/MM/yyyy hoac dd/MM/yyyy HH:mm:ss)
Neu dtFrm > dtTo ham tra va gia tri FALSE, nguoc lai tra ve gia tri TRUE
*/
function CompareDateTime(dtFrm, dtTo)  {      
    var sDtFrm = ConvertDateTime(dtFrm);    
    if(dtTo=='now'){
        var currentTime = new Date();
        var month = currentTime.getMonth() + 1;
        var day = currentTime.getDate();
        var year = currentTime.getFullYear();
        var tempdate =  year + "-" + month + "-" + day;       
        var timeTo = '';
        if(dtFrm.length>15){
            //var hour = currentTime.getHours() + 1;
           // var minute = currentTime.getMinutes();
           // var second = currentTime.getSeconds();
           // var temptime =  hour + ":" + minute + ":" + second;
           // timeTo = " "+fmFullTime(temptime);
            timeTo = " 23:59:59";
        }
       
        dtTo = fmFullDate(tempdate)+timeTo;                         
    }
    var sDtTo = ConvertDateTime(dtTo);
    if (sDtFrm > sDtTo) 
    {
        return false;
    }
    
    return true;
}

/* Start - Trim */
function trim(str, chars) {
	return ltrim(rtrim(str, chars), chars);
}

function ltrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("^[" + chars + "]+", "g"), "");
}

function rtrim(str, chars) {
	chars = chars || "\\s";
	return str.replace(new RegExp("[" + chars + "]+$", "g"), "");
}
/* End - Trim */

// Check e-mail
function validateEmail(id) {
	var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+.[a-zA-Z]{2,4}$/;
	return emailPattern.test(id);
}

function checkVNPhone(sNumber)
{
	var arrReg = new Array();
	arrReg[0] = /^09\d\d\d\d\d\d\d\d$/;	//Di dong
	arrReg[1] = /^012\d\d\d\d\d\d\d\d$/;
	arrReg[2] = /^016\d\d\d\d\d\d\d\d$/;
	arrReg[36] = /^019\d\d\d\d\d\d\d\d/;
	arrReg[3] = /^04\d\d\d\d\d\d$/;							//Ha Noi
	arrReg[4] = /^04\d\d\d\d\d\d\d$/;
	arrReg[37] = /^04\d\d\d\d\d\d\d\d$/;
	arrReg[5] = /^08\d\d\d\d\d\d$/;							//TPHCM
	arrReg[6] = /^08\d\d\d\d\d\d\d$/;
	arrReg[36] = /^08\d\d\d\d\d\d\d\d$/;
	arrReg[7] = /^01[8|9]\d\d\d\d\d\d$/;						//Hoa binh, Ha Giang
	arrReg[8] = /^01[8|9]\d\d\d\d\d\d\d$/;
	arrReg[9] = /^02[0|2|3|5|6|7|9]\d\d\d\d\d\d$/;			//Lao Cai, Son La, Lai Chau, Dien Bien, Lang Son, Tuyen Quang, Cao Bang, Yen Bai
	arrReg[10] = /^02[0|2|3|5|6|7|9]\d\d\d\d\d\d\d$/;
	arrReg[11] = /^03[0|1|3|4|6|7|8|9]\d\d\d\d\d\d$/;			//Ninh Binh, Hai Phong, Quang Ninh, Ha Tay, Thai Binh, Thanh Hoa, Nghe An, Ha Tinh
	arrReg[12] = /^03[0|1|3|4|6|7|8|9]\d\d\d\d\d\d\d$/;
	arrReg[13] = /^05[0|2|3|4|5|6|7|8|9]\d\d\d\d\d\d$/;		//Dac Lac, Dac Nong, Quang Binh, Quang Tri, Hue, Quang Ngai, Binh Dinh, Phu Yen, Khanh Hoa, Gia Lai
	arrReg[14] = /^05[0|2|3|4|5|6|7|8|9]\d\d\d\d\d\d\d$/;
	arrReg[15] = /^06[0|1|2|3|4|6|7|8]d\d\d\d\d\d$/;			//Kon Tum, Dong Nai, Binh Thuan, Lam Dong, Ba Ria Vung Tau, Tay Ninh, Dong Thap, Ninh Thuan
	arrReg[16] = /^06[0|1|2|3|4|6|7|8]\d\d\d\d\d\d\d$/;
	arrReg[17] = /^0613\d\d\d\d\d\d\d$/;						//Dong Nai
	arrReg[18] = /^07[0|1|2|3|4|5|6|7|9]\d\d\d\d\d\d$/;		//Vinh Long, Can Tho, Hau Giang,Long An, Tien Giang, Tra Vinh, Ben Tre, An Giang, Kien Giang, Soc Trang
	arrReg[19] = /^07[0|1|2|3|4|5|6|7|9]\d\d\d\d\d\d\d$/;
	arrReg[20] = /^021[0|1]\d\d\d\d\d\d$/;					//Phu Tho, Vinh Phuc
	arrReg[21] = /^021[0|1]\d\d\d\d\d\d\d$/;
	arrReg[22] = /^024[0|1]\d\d\d\d\d\d$/;					//Bac Ninh, Bac Giang
	arrReg[23] = /^024[0|1]d\d\d\d\d\d\d$/;
	arrReg[24] = /^028[0|1]\d\d\d\d\d\d$/;					//Thai Nguyen, Bac Can
	arrReg[25] = /^028[0|1]\d\d\d\d\d\d\d$/;
	arrReg[26] = /^32[0|1]0\d\d\d\d\d\d$/;					//Hai Duong, Hung Yen
	arrReg[27] = /^032[0|1]\d\d\d\d\d\d\d$/;
	arrReg[28] = /^035[0|1]\d\d\d\d\d\d$/;					//Nam Dinh, Ha Nam
	arrReg[29] = /^035[0|1]\d\d\d\d\d\d\d$/;
	arrReg[30] = /^051[0|1]\d\d\d\d\d\d$/;					//Quang Nam, Da Nang
	arrReg[31] = /^051[0|1]\d\d\d\d\d\d\d$/;
	arrReg[32] = /^065[0|1]\d\d\d\d\d\d$/;					//Binh Duong, Binh Phuoc
	arrReg[33] = /^065[0|1]\d\d\d\d\d\d\d$/;
	arrReg[34] = /^078[0|1]\d\d\d\d\d\d$/;					//Ca Mau, Bac Lieu
	arrReg[35] = /^078[0|1]\d\d\d\d\d\d\d$/;
	arrReg[38] = /^[+]84\d\d\d\d\d\d\d\d\d$/;
	arrReg[39] = /^[+]84\d\d\d\d\d\d\d\d\d\d$/;
	arrReg[40] = /^[+]84\d\d\d\d\d\d\d\d\d\d\d$/;

	var bResult = false;
	for(i = 0; i < 41; i++)
	{
		if(arrReg[i].test(sNumber))
		{
			bResult = true;
			break;
		}
	}
	return bResult;
}

function checkInvalidDate(date)
{
	var check = /^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4} (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/;
	return check.test(date);
}

/*
 * Adjust the behavior of the dataProcessor to avoid styles
 * and make it look like FCKeditor HTML output.
 */
function configureHtmlOutput( ev )
{
	var editor = ev.editor,
		dataProcessor = editor.dataProcessor,
		htmlFilter = dataProcessor && dataProcessor.htmlFilter;

	// Out self closing tags the HTML4 way, like <br>.
	dataProcessor.writer.selfClosingEnd = '>';

	// Make output formatting behave similar to FCKeditor
	var dtd = CKEDITOR.dtd;
	for ( var e in CKEDITOR.tools.extend( {}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent ) )
	{
		dataProcessor.writer.setRules( e,
			{
				indent : true,
				breakBeforeOpen : true,
				breakAfterOpen : false,
				breakBeforeClose : !dtd[ e ][ '#' ],
				breakAfterClose : true
			});
	}

	// Output properties as attributes, not styles.
	htmlFilter.addRules(
		{
			elements :
			{
				$ : function( element )
				{
					// Output dimensions of images as width and height
					if ( element.name == 'img' )
					{
						var style = element.attributes.style;

						if ( style )
						{
							// Get the width from the style.
							var match = /(?:^|\s)width\s*:\s*(\d+)px/i.exec( style ),
								width = match && match[1];

							// Get the height from the style.
							match = /(?:^|\s)height\s*:\s*(\d+)px/i.exec( style );
							var height = match && match[1];

							if ( width )
							{
								element.attributes.style = element.attributes.style.replace( /(?:^|\s)width\s*:\s*(\d+)px;?/i , '' );
								element.attributes.width = width;
							}

							if ( height )
							{
								element.attributes.style = element.attributes.style.replace( /(?:^|\s)height\s*:\s*(\d+)px;?/i , '' );
								element.attributes.height = height;
							}
						}
					}

					// Output alignment of paragraphs using align
					if ( element.name == 'p' )
					{
						style = element.attributes.style;

						if ( style )
						{
							// Get the align from the style.
							match = /(?:^|\s)text-align\s*:\s*(\w*);/i.exec( style );
							var align = match && match[1];

							if ( align )
							{
								element.attributes.style = element.attributes.style.replace( /(?:^|\s)text-align\s*:\s*(\w*);?/i , '' );
								element.attributes.align = align;
							}
						}
					}

					if ( !element.attributes.style )
						delete element.attributes.style;

					return element;
				}
			},

			attributes :
				{
					style : function( value, element )
					{
						// Return #RGB for background and border colors
						return convertRGBToHex( value );
					}
				}
		} );
}

/**
* Convert a CSS rgb(R, G, B) color back to #RRGGBB format.
* @param Css style string (can include more than one color
* @return Converted css style.
*/
function convertRGBToHex( cssStyle )
{
	return cssStyle.replace( /(?:rgb\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\))/gi, function( match, red, green, blue )
		{
			red = parseInt( red, 10 ).toString( 16 );
			green = parseInt( green, 10 ).toString( 16 );
			blue = parseInt( blue, 10 ).toString( 16 );
			var color = [red, green, blue] ;

			// Add padding zeros if the hex value is less than 0x10.
			for ( var i = 0 ; i < color.length ; i++ )
				color[i] = String( '0' + color[i] ).slice( -2 ) ;

			return '#' + color.join( '' ) ;
		 });
}

/*
Description: Hàm trả về ngày giờ hiện tại.
@isTime = false -> dd/MM/yyyy (vd: 01/06/2010)
@isTime = true -> dd/MM/yyyy HH:mm:ss (vd: 01/06/2010 01:09:08)
*/
function GetCurrentDateTimeByVN(isTime)
{
    var today = new Date();
    var sResult = '';

    var dd = today.getDate();
    dd = dd < 10 ? "0" + dd : dd;

    var mm = today.getMonth() + 1;
    mm =  mm < 10 ? "0" + mm : mm;

    var yyyy = today.getFullYear();

    sResult = dd + "/" + mm + "/" + yyyy;
    if (isTime)
    {
        hh = today.getHours();
        hh =  hh < 10 ? "0" + hh : hh;

        m =today.getMinutes();
        m =  m < 10 ? "0" + m : m;

        ss = today.getSeconds();
        ss =  ss < 10 ? "0" + ss : ss;

        sResult += " " + hh + ":" + m + ":" + ss;
    }

    return sResult;
}

function isInteger(param) {
  if (param=='')return true;
     regex  = /^(\d)+$/;
    if(regex.exec(param))
         return true;
    return false;
}

function isFloat(param) {
  if (param=='')return true;
     regex  =/^(\d)+(.(\d)+)*$/;
    if(regex.exec(param)){
        if (parseFloat(param)>=0) return true;
    }
        
    return false;
}
function isDate(param) {
  
    if (param=='')return true;
     regex  =/^\d{4}[-|\/]((0[1-9])|(1[0-2]))[-|\/]((0[1-9]|([1-2][0-9])|3[0-1]))$/;
    if(regex.exec(param))
        return true;        
    return false;
}
function isDateTime(param){
        if (param=='')return true;
     regex  =/^\d{4}[-|\/]((0[1-9])|(1[0-2]))[-|\/]((0[1-9]|([1-2][0-9])|3[0-1])) (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/; 
    if(regex.exec(param))
        return true;        
    return false;
}

// Hoang Phuc 04/12/2010 Thay đổi giá trị cho the span
function fn_Waiting(value)
{
    if (value == 1)
    {
      $('#spanWaiting').html(PROCESS_DATA);   
    }
    else if (value == 2)
    {
      $('#spanWaiting').html(PROCESS_INSERT);   
    }
    else if (value == 3)
    {
      $('#spanWaiting').html(PROCESS_UPDATE);   
    }
    else if (value == 4)
    {
      $('#spanWaiting').html(PROCESS_DELETE);   
    }
}
//Trung add ham dung de dinh dang theo kieu tien te
function CurrentFormatted(amount)
{
    amount = String(amount);
    var delimiter = ","; // replace comma if desired
    var a = amount.split('.');
    var i = parseInt(a[0]);
    if(isNaN(i)) { return ''; }
    var minus = '';
    if(i < 0) { minus = '-'; }
    i = Math.abs(i);
    var n = new String(i);
    var temp = a;
    var a = [];
    while(n.length > 3)
    {
        var nn = n.substr(n.length-3);
        a.unshift(nn);
        n = n.substr(0,n.length-3);
    }
    if(n.length > 0) { a.unshift(n); }
    n = a.join(delimiter);
    if(temp.length < 2) { amount = n; }
    else { amount = n + '.' + temp[1]; }
    amount = minus + amount;
    return amount;
}
// ham lay ngay hien tai format theo dd/mm/yyyy
function getCurDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1;
    var yyyy = today.getFullYear();
    if(dd<10){dd='0'+dd}
    if(mm<10){mm='0'+mm}    
    return yyyy+'-'+mm+'-'+dd;
    
}
// ham nay dung de kiem tra co phai so dung so trang can nhau den hay ko
// neu sai hoac lon hon so trang hien co thi se nhay ve trang truoc do
function checkIndexPage(currentPage){
    
    if((!isInteger(currentPage) || parseInt(currentPage) > parseInt($("#hdPageNum").val()) || parseInt(currentPage)<1)&&$("#hdPageNum").val()!=0){
      document.getElementById('txtcurrentpage1').value = document.getElementById('hdCurrPage').value   ;
      document.getElementById('txtcurrentpage2').value = document.getElementById('hdCurrPage').value   ;
      return false;
    }
    return true;
}

function trimAllSpace(sString)
{
    while (sString.substring(0,1) == ' ')
    {
        sString = sString.substring(1, sString.length);
    }
    while (sString.substring(sString.length-1, sString.length) == ' ')
    {
        sString = sString.substring(0,sString.length-1);
    }
    return sString;
}
// End Trung add
//Start  Phuc addd
function unCheck(lat,long)
{
    var chk = $('#chkPriveLoc').attr('checked');
    if (chk == true)
    {
     $('#chkPriveLoc').attr('checked',false); 
    }
    $("#hdlatitude").val(lat);
    $("#hdlongitude").val(long);  
    showLocation(lat,long)  ;  
} 
function showLocation(lat,long)
{
    _global.gMap.InitMap('maptracking2'); 
     _global.gMap.PanTo(lat,long);
     _global.gMap.map.clearOverlays();
     var pnt = new GLatLng(lat, long);
     var marker3 = new GMarker(pnt);
     _global.gMap.map.addOverlay(marker3);     
}
function FullPage()
{
  var lat = $("#hdlatitude").val();
  var long = $("#hdlongitude").val(); 
  var user = $("#hdgroupdata").val();      
   if (lat == 0 && long == 0)
  {
      alert("Please select object to display.");
      return false;
  }
    $('#full_page').dialog('open');
    _global.gMap.InitMap('mapfullpage'); 
    _global.myMap.PanTo(lat,long);         
    _global.gMap.map.clearOverlays();    
    var pnt = new GLatLng(lat, long);
    var marker3 = new GMarker(pnt);
    _global.gMap.map.addOverlay(marker3);
     var chk = $('#chkPriveLoc').attr('checked'); 
      if (chk == true)
      {
        xajax_ShowPrivareLoc(lat,long,user);
      }   
}
function ViewPrivateLocation()
{
  
  var chk = $('#chkPriveLoc').attr('checked');    
  var lat = $("#hdlatitude").val();
  var long = $("#hdlongitude").val();
  var user = $("#hdgroupdata").val();
  if (lat == 0 && long == 0)
  {
      alert("Please select object to display.");
      $('#chkPriveLoc').attr('checked',false);    
      return false;
  }
   showLocation(lat,long);           
  if (chk == true)
  {
    xajax_ShowPrivareLoc(lat,long,user);
  }
}
// End  Phuc add
function fn_showwating()
 {
    document.getElementById("dvwt").style.display="";
    document.getElementById("dvwt").innerHTML = document.getElementById("divWaiting").innerHTML ;
 }
  
function CreateCalObject(objID, imgID)
{
    var theObj = document.getElementById(objID);
    if(!theObj)
    {
        tmpObj = document.getElementById(imgID);
        if(tmpObj)
        {
            tmpObj.style.display = "none";
        }
        return(false);
    }
    var objRet = new calendar2(theObj);
    if(!objRet)
    {
        tmpObj = document.getElementById(imgID);
        if(tmpObj)
        {
            tmpObj.style.display = "none";
        }
        return(false);
    }
    objRet.year_scroll = false;
    objRet.time_comp = false;
    return(objRet);
}
function CheckDate(date)
{    
     var check = /^\d{4}[-|\/]((0[1-9])|(1[0-2]))[-|\/]((0[1-9]|([1-2][0-9])|3[0-1])) (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/;  
   
    //var check = /^((0[1-9]|([1-2][0-9])|3[0-1]))\/((0[1-9])|(1[0-2]))\/\d{4} (0[0-9]|1[0-9]|2[0-4]):([0-5][0-9]):([0-5][0-9])$/;
//    var check = /^(19|20)\d\d[- /.](0[1-9]|1[012])[- /.](0[1-9]|[12][0-9]|3[01])$/;
    return check.test(date);   
}

function fn_compare_fromdate_todate(fromdate,todate)
{
    var ojReturn =false ;
    var df = Date.parse(toDate(fromdate ));
    var dt = Date.parse(toDate(todate));
    var ns = (dt - df);
    if( ns <= 0)
    {
       ojReturn = true ;
    }
    return ojReturn ;//true là ngày bắt đầu lớn hơn ngày kết thúc
}

function fn_isnumeric(value)
{
    var result = true ;
    var cnumber = Number(value);
    if (isNaN(cnumber)||cnumber <=0 ) 
    {
       result = false ;  
    }
    return result ;
}
function fn_viewmap_click(lat,slong,dname,i,tempe,time,speed)
{
    window.open("mapgoogle/map.php?lat="+lat+"&long="+slong+"&dname="+dname+"&i="+i+"&tempe="+tempe+"&time="+time+"&speed="+speed,"new","width=480,height=440,left=260,top=100,resizable=yes,location=yes");
}
//Xu ly khi nhap so trang va nhan enter
function fn_PageChange_Enter(txtname)
{
    //get total page
    var vtotalpage = document.getElementById("hdtotalpage").value ;
    var vnumberpage = document.getElementById(txtname).value ; 
    var vcurrentpage = document.getElementById("hdcurrentpage").value ; 
     
    
    var cnumber = Number(vtotalpage);
    var cnumber1 = Number(vnumberpage);
    // tranfer input page
    if((cnumber1 >= 1) && (cnumber1 <= cnumber))
    {
        document.getElementById(txtname).value =vnumberpage;
        document.getElementById("hdcurrentpage").value = vnumberpage ; 
    }
    //reset current page
    else
    {
       document.getElementById(txtname).value =vcurrentpage;    
    }
    
    fn_ViewData_Click(6);//6 la khi nhan Enter tren text box current page
}
 