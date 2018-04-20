var objNameExcel = new Object();
objNameExcel['fmfrmreportdetail']='Báo cáo chi tiết'; 
objNameExcel['fmfrmreporttime']='Báo cáo tổng hợp thuê';
objNameExcel['cusfrmreportpay']='Báo cáo thu chi';
objNameExcel['fmfrmreportrevenue']='Báo Cáo Doanh Thu';
objNameExcel['fmfrmconfig']='Danh sách menu trong';
objNameExcel['cusfrmproducttype']='Danh sách loại sản phẩm';

objNameExcel['cusfrmproduct']='Danh sách sản phẩm';
objNameExcel['frmaccount']='Danh sách tài khoản con';
objNameExcel['fmfrmpromotion']='Danh sách khuyến mãi';
objNameExcel['fmfrmvoucher']='Danh sách Voucher';
objNameExcel['fmfrmroomtype']='Danh sách loại bàn';
objNameExcel['fmfrmroom']='Danh sách bàn';

objNameExcel['cusfrmpay']='Danh sách thu chi';
objNameExcel['fmfrmstaff']='Danh sách nhân viên';
objNameExcel['cusfrmimportproduct']='Danh sách nhập hàng';
objNameExcel['frminventory']='Báo cáo tồn kho';
objNameExcel['cusfrmreportproduct']='Báo cáo bán sản phẩm'; 
objNameExcel['fmfrmfilm']='Danh sách phim';
objNameExcel['fmfrmreportcurrent']='Báo cáo ngày hiện tại';

objNameExcel['frmmenu']='Danh sách nhóm chức năng thường';
objNameExcel['frmmenutab']='Danh sánh chức năng thường';
objNameExcel['frmcreatetable']='Tạo bảng';
objNameExcel['frmpowertype']='Danh sách loại quyền';
objNameExcel['frmaccountag']='Đổi mật khẩu';
objNameExcel['frmchangeexpire']='Gia hạn';
objNameExcel['frmproducttype']='Danh sách loại sản phẩm';
objNameExcel['frmproduct']='Danh sách sản phẩm';

objNameExcel['frmmenuag']='Danh sách chóm chức năng quản lý';
objNameExcel['frmmenutabag']='Danh sách chức năng quản lý';
objNameExcel['frmuser']='Danh sách tài khoản';
objNameExcel['frmreportsummary']='Danh sách ngày chạy tổng hợp';

function export_excel(formid)
{    
    tableid = formid.replace('_formExport','');    
    form = document.getElementById(formid);
    $('#'+formid).find('.params').remove();
    var hdreporttype=document.createElement( 'input' );
    hdreporttype.setAttribute('type','hidden');
    hdreporttype.setAttribute('value','export_excel');
    hdreporttype.setAttribute('name','export_type');
    form.appendChild(hdreporttype);

    var arr =  tableid.split('_'); 
    var reportId =  arr[0];
    var strCondition = '';
    if(typeof(ObjExport.Condition[reportId])!='undefined'){
        strCondition=ObjExport.Condition[reportId];
    }  
    var hdcondition=document.createElement( 'input' );
    hdcondition.setAttribute('type','hidden');
    hdcondition.setAttribute('value',strCondition);
    hdcondition.setAttribute('name','reportcondition');
    form.appendChild(hdcondition);
    
    var reporttitle ='';    
    reporttitle = objNameExcel[reportId];
    if(typeof(ObjExport.Title[reportId])!='undefined'){
        reporttitle=ObjExport.Title[reportId];
    }

    var hdtitle=document.createElement( 'input' );
    hdtitle.setAttribute('type','hidden');
  
    hdtitle.setAttribute('value',reporttitle);

    hdtitle.setAttribute('name','reporttitle');
    form.appendChild(hdtitle);
    
    var header =''; 
     $('#'+tableid+'_wrapper thead:eq(0)').find('tr').each(function(){
         flgstart = true;
        $(this).find('td:not(.no_export),th:not(.no_export)').each(function(){
            text = $(this).text();
            colspan = $(this).attr('colspan');
           
             if(typeof(colspan)=='undefined'||parseInt(colspan)<1){
              colspan=1;  
            }
            if(!flgstart){
              header = header + SEP_COL + text + SEP_TITLE + colspan;  
            }else{
               header = header + text + SEP_TITLE + colspan;
               flgstart= false;    
            }
            
        }) ;
       
        header = header + SEP_ROW ;       
    });
    if(header.length>0){
        var seprow = SEP_ROW;
        lengrow = seprow.length ;
        header = header.substr(0,header.length-lengrow);
    }
     
     
    var hdheader=document.createElement( 'input' );
    hdheader.setAttribute('type','hidden');
    hdheader.setAttribute('value',header);
    hdheader.setAttribute('name','header');
    hdheader.setAttribute('class','params');
    form.appendChild(hdheader);
    
    var body =''; 
     $('#'+tableid+'_wrapper tbody:eq(0)').find('tr').each(function(){
         flgstart = true;
        $(this).find('td:not(.no_export),th:not(.no_export)').each(function(){
            text = $(this).text();
            colspan = $(this).attr('colspan');
           
            if(typeof(colspan)=='undefined'||parseInt(colspan)<1){
              colspan=1;  
            }
            if(!flgstart){
              body = body + SEP_COL + text + SEP_TITLE + colspan;  
            }else {
               body = body+  text + SEP_TITLE + colspan; 
               flgstart = false;   
            }
            
        }) ;
       
        body = body + SEP_ROW ;       
    });
    if(body.length>0){
        var seprow = SEP_ROW;
        lengrow = seprow.length ;
        body = body.substr(0,body.length-lengrow);
    }
//alert(body);
    var hdbody=document.createElement( 'input' );
    hdbody.setAttribute('type','hidden');
    hdbody.setAttribute('value',body);
    hdbody.setAttribute('name','body');
    hdbody.setAttribute('class','params');   
    form.appendChild(hdbody);
    
    
        var footer =''; 
     $('#'+tableid+'_wrapper tfoot:eq(0)').find('tr').each(function(){
         flgstart = true;
        $(this).find('td:not(.no_export),th:not(.no_export)').each(function(){
            text = $(this).text();
            colspan = $(this).attr('colspan');
             if(typeof(colspan)=='undefined'||parseInt(colspan)<1){
              colspan=1;  
            }
            if(!flgstart){
              footer = footer + SEP_COL + text + SEP_TITLE + colspan;  
            }else{
                flgstart = false;
               footer =footer+ text + SEP_TITLE + colspan;    
            }
            
        }) ;
       
        footer = footer + SEP_ROW ;       
    });
    if(footer.length>0){
        var seprow = SEP_ROW;
        lengrow = seprow.length ;
        footer = footer.substr(0,footer.length-lengrow);
    }
     
    var hdfooter=document.createElement( 'input' );
    hdfooter.setAttribute('type','hidden');
    hdfooter.setAttribute('value',footer);
    hdfooter.setAttribute('name','footer');
    hdfooter.setAttribute('class','params');   
    form.appendChild(hdfooter);
    
    $('#'+formid).submit();    
    
}


function export_pdf(formid){    
    tableid = formid.replace('_formExport','');
    
    form = document.getElementById(formid);
    $('#'+formid).find('.params').remove();
    var export_type=document.createElement( 'input' );
    export_type.setAttribute('type','hidden');
    export_type.setAttribute('value','export_pdf');
    export_type.setAttribute('name','export_type');
    form.appendChild(export_type); 
    var reporttitle =''; 
    var arr =  tableid.split('_'); 
    var reportId =  arr[0];   
    if(typeof(objNameExcel[reportId])!='undefined'){
        reporttitle=objNameExcel[reportId];
    } 
    var export_title =document.createElement( 'input' );
    export_title.setAttribute('type','hidden');
    export_title.setAttribute('value',reporttitle);
    export_title.setAttribute('name','export_title');
    form.appendChild(export_title);
    
    ///////////////////////////////////////

    // alert(reportId);
    
/*        var reporttitle ='';    
    if(typeof(objNameExcel[reportId])!='undefined'){
        reporttitle=objNameExcel[reportId];
    }*/
    htmlTilte = '<table width="100%"><tr><td colspan="2"  align="center" height="30" style="color:blue;font-size:50px" >'+reporttitle+"</td></tr>";
/*        var strCondition = '';
    if(typeof(ObjExport.Condition[reportId])!='undefined'){
        strCondition=ObjExport.Condition[reportId];
    } 
    var arrConditon = strCondition.split(SEP_ROW);
    for(i=0;i<arrConditon.length;i++){
        strTemp = arrConditon[i];
        arrDetaiTemp = strTemp.split(SEP_TITLE);
        htmlTilte += '<tr><td width="20%">' + arrDetaiTemp[0]+ "</td> <td>" +arrDetaiTemp[1]+"</td></tr>";
    }*/ 
   htmlTilte += "</table><h1></h1>";
    /////////////////////////////////////////////////////

 var contentTable =htmlTilte+'<table width="60%" boder="2" >'; 
     $('#'+tableid+'_wrapper thead:eq(0)').find('tr').each(function(){
         contentTable+= '<tr style="background-color:#c5c5c5">';
        $(this).find('td:not(.no_export),th:not(.no_export)').each(function(){
           contentTable+= '<td  '; 
            colspan = $(this).attr('colspan'); 
             if(typeof(colspan)=='undefined'||parseInt(colspan)<1){
              colspan=1;  
            }
            contentTable+= ' colspan="'+colspan+'" ';
            
             rowspan = $(this).attr('rowspan'); 
             if(typeof(rowspan)=='undefined'||parseInt(rowspan)<1){
              rowspan=1;  
            }
            contentTable+= ' rowspan="'+rowspan+'" ';
            
            //align = $(this).attr('align'); 
            align = 'center';
/*             if(typeof(align)=='undefined'){
              align='left';  
            }*/
            contentTable+= ' align="'+align+'" ';
              valign = $(this).attr('valign'); 
             if(typeof(valign)=='undefined'){
              valign='middle';  
            }
            contentTable+= ' valign="'+valign+'" ';
            
             style = $(this).attr('style'); 
             if(typeof(style)!='undefined'){
              contentTable+= ' style="'+style+'" ';  
            }
            width = $(this).attr('width'); 
            if(typeof(width)!='undefined'){
              contentTable+= ' width="'+width+'" ';  
            } 
             height = $(this).attr('height'); 
            if(typeof(height)!='undefined'){
              contentTable+= ' height="'+height+'" ';  
            }                      
                                 
            contentTable += '>' + $(this).text() +'</td>';
            
        }) ;
       
        contentTable += '</tr>';      
    });

     $('#'+tableid+'_wrapper tbody:eq(0)').find('tr').each(function(){
         contentTable+= '<tr>';
        $(this).find('td:not(.no_export),th:not(.no_export)').each(function(){
            
           contentTable+= '<td '; 
            colspan = $(this).attr('colspan'); 
             if(typeof(colspan)=='undefined'||parseInt(colspan)<1){
              colspan=1;  
            }
            contentTable+= ' colspan="'+colspan+'" ';
            
             rowspan = $(this).attr('rowspan'); 
             if(typeof(rowspan)=='undefined'||parseInt(rowspan)<1){
              rowspan=1;  
            }
            contentTable+= ' rowspan="'+rowspan+'" ';
            
            align = $(this).attr('align'); 
             if(typeof(align)=='undefined'){
              align='center';  
            }
            contentTable+= ' align="'+align+'" ';
              valign = $(this).attr('valign'); 
             if(typeof(valign)=='undefined'){
              valign='middle';  
            }
            contentTable+= ' valign="'+valign+'" ';
            
             style = $(this).attr('style'); 
             if(typeof(style)!='undefined'){
              contentTable+= ' style="'+style+'" ';  
            }   
             width = $(this).attr('width'); 
            if(typeof(width)!='undefined'){
              contentTable+= ' width="'+width+'" ';  
            } 
             height = $(this).attr('height'); 
            if(typeof(height)!='undefined'){
              contentTable+= ' height="'+height+'" ';  
            }                              
            contentTable += '>' + $(this).text() +'</td>';

            
        }) ;
       
       contentTable += '</tr>';         
    });
 
     $('#'+tableid+'_wrapper tfoot:last').find('tr').each(function(){
         contentTable+= '<tr style="font-weight: bold;color:blue ">';
        $(this).find('td:not(.no_export),th:not(.no_export)').each(function(){contentTable+= '<td '; 
            colspan = $(this).attr('colspan'); 
             if(typeof(colspan)=='undefined'||parseInt(colspan)<1){
              colspan=1;  
            }
            contentTable+= ' colspan="'+colspan+'" ';
            
             rowspan = $(this).attr('rowspan'); 
             if(typeof(rowspan)=='undefined'||parseInt(rowspan)<1){
              rowspan=1;  
            }
            contentTable+= ' rowspan="'+rowspan+'" ';
            
            align = $(this).attr('align'); 
             if(typeof(align)=='undefined'){
              align='left';  
            }
            contentTable+= ' align="'+align+'" ';
              valign = $(this).attr('valign'); 
             if(typeof(valign)=='undefined'){
              valign='middle';  
            }
            contentTable+= ' valign="'+valign+'" ';
            
             style = $(this).attr('style'); 
             if(typeof(style)!='undefined'){
              contentTable+= ' style="'+style+'" ';  
            }      
            
             width = $(this).attr('width'); 
            if(typeof(width)!='undefined'){
              contentTable+= ' width="'+width+'" ';  
            } 
             height = $(this).attr('height'); 
            if(typeof(height)!='undefined'){
              contentTable+= ' height="'+height+'" ';  
            }                           
            contentTable += '>' + $(this).text() +'</td>';
            
        }) ;
       
        contentTable += '</tr>';                
    });
    contentTable += '</table>';
     
    var hdcontent=document.createElement( 'input' );
    hdcontent.setAttribute('type','hidden');
    hdcontent.setAttribute('value',contentTable);
    hdcontent.setAttribute('name','pdfcontent');
    hdcontent.setAttribute('class','params');   
    form.appendChild(hdcontent);
       
    $('#'+formid).submit();    
    
}

function objExport(text,colspan,rowspan){
    var obj = new Object();
    obj.colspan =(colspan==''|| typeof(colspan)=='undefined')?1:colspan;
    obj.rowspan =(rowspan==''|| typeof(rowspan)=='undefined')?1:rowspan;
    obj.text = (text==''|| typeof(text)=='undefined')?'':text; 
    return obj;
}

function objParamsExport(){

    this.paramExport = new Object();
    this.paramChart = new Object();
    this.paramTitle = new Object(); 
    this.addParamsExport = function(tbl_id,strName,StrValue){
         this.paramExport[tbl_id] = this.asignParam(strName,StrValue);      
    }
    this.addTitle = function(tbl_id,title){
         this.paramTitle[tbl_id] = title;      
    }
    this.asignParam = function(strName,StrValue){
        arrName = strName.split(';');
        arrValue = StrValue.split(';_x_;');
        var obj = new Object();
        for(i=0;i<arrName.length;i++){
            name = arrName[i]; 
            value = typeof(arrValue[i])!='undefined'?arrValue[i]:''; 
            obj[name]  = value;
        }         
        return obj;
    }
}
function ObjectExport(){
      this.Title = new Object();      
      this.Condition = new Object(); 
     
     this.AssignTitle = function(id,title){
         this.Title[id] = new Object();
         this.Title[id]=title; 
     }      
     this.AssignCondition = function(id,strCondition){
         this.Condition[id] = new Object();
         this.Condition[id]=strCondition;
     }         
}



