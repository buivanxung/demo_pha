function drawChart(chartImg)
{            
    var chart2Canvas = document.createElement("canvas");        
    var width = chartImg.width;
    var height = chartImg.height;
    chart2Canvas.width = width;
    chart2Canvas.height = height;
    var ctx = chart2Canvas.getContext("2d"); 
    ctx.drawImage(chartImg, 0, 0, width, height);        
    var dataURL = chart2Canvas.toDataURL("image/jpeg");
    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
function maxA4(target , valueA4)
{
   if (target > valueA4)
   {
      target = valueA4 - 40;
   }
   return parseInt(target);
}

function ExportPDF(){
   $('#nav-menu').find('.cls_module').each(function(){
       id_section ='';
       if($(this).hasClass('menu-selected')){
         id_section = $(this).attr('id');
         switch(id_section){
             case 'link_section1':graphExMap();break;
             case 'link_section2':graphExTracking();break;
             case 'link_section3':graphExReport();break;
             case 'link_section4':alert('Đang cập nhật chức năng xuất pdf cho trang này');break;
         }  
       }
   }); 
}
function addLogo(obj,pagePDF)
{
    var img = new Image();
        img.onload = function(){
            var dataURI = drawChart(img);    
            obj.setPage(pagePDF)    ;        
            obj.addImage(dataURI, 'JPEG', 5, 5, 90, 40);                 
        }
    img.src = "iot.vn/images/PHA_Logo_Iot.png";
    obj.setPage(pagePDF);    
    obj.setFontSize(11);
    obj.setFontStyle('italic');
    var d = new Date();
    var date_text = 'Ngay : ' + (d.getDate() < 10 ? '0' + d.getDate() : d.getDate()) + '/' + ((d.getMonth()+1) < 10 ? '0' + (d.getMonth()+1) : (d.getMonth()+1)) + '/' + d.getFullYear();
    var time_text = 'Gio : ' + (d.getHours() < 10 ? '0' + d.getHours() : d.getHours()) + 'h' + (d.getMinutes() < 10 ? '0' + d.getMinutes() : d.getMinutes());
    obj.text(740, 15, date_text);
    obj.text(740, 30, time_text);
}
function graphExReport() {
    var title = (lang_iot=='vi'? 'Bao Cao Tieu Chuan':'Standard Report');
    var filename =(lang_iot=='vi'? 'BaoCaoTieuChuan':'StandardReport');
    var divParent = $('#section3');
    var doc = new jsPDF('l', 'pt', 'a4');            
    // lanscape a4 height 595.28, width 841.89
    var heightA4 = 594;
    var widthA4 = 840;
    var widthA4Hafl = parseInt(widthA4 * 3 / 4);
    var page = 1;
    var paddingX = 5;
    var paddingY = 30;            
    var yPdf  = paddingY;
    var heightA4Still = heightA4;
    // write title
    var lengthTitle = title.length;
    
    doc.setFontSize(22);
    doc.setFontStyle('bold');
    var dimT = doc.getTextDimensions(title);            
    var xTitle = (widthA4 - dimT.w) / 2;
    var yTitle = paddingY;
    doc.text(xTitle, yTitle, title);
    yPdf = yTitle + 10 + 30;
    addLogo(doc,1);        
    //find data export
    var hasFilter = false;
    var dataFisrt = false;
    var widthFilter = 0;
    var heightFilter = 0;
    var stillHafl = false;
    var filterFinder = divParent.find( ".filter-pdf" );            
    if (filterFinder != 'undefined')
    {
       hasFilter = true;
       widthFilter = $(".filter-pdf").width();    
       heightFilter =  $(".filter-pdf").height();       
    }
    var xChart = paddingX;
    var xChart_0 = 270;
    var yChart = yPdf;
    var distance2Chart = 20;
    var exportClass = divParent.find( ".for-pdf" );
    if (exportClass != 'undefined')
    {
      var len = $( ".for-pdf" ).length;                
      $( ".for-pdf" ).each(function( index ) {
         var isFullPage = false;         
         // if is chart
         if ($(this).hasClass('chart-pdf'))
         {
            var idChart = $(this).attr('id');                
                                
            if ($('#'+idChart).length > 0) {                                                 
                 var chartSVG = $('#'+idChart).highcharts().getSVG();    
                 var svg = $(this).find( "svg" );                                                
                 //get width , height for image;
                 var widthImg = $(svg).attr('width');                
                 widthImg = maxA4(widthImg, widthA4);
                 if (widthImg > widthA4Hafl)
                 {
                    isFullPage = true;
                 }                 
                 var heightImg = $(svg).attr('height');
                 heightImg = maxA4(heightImg, heightA4);                         
                 var  chartImg = new Image();    
                 // add image to pdf                         
                 chartImg.onload = function()
                 {                                                        
                    var dataURI = drawChart(chartImg);    
                    
                    if (dataFisrt == false)
                    {
                       if (widthFilter < widthA4Hafl)    
                       {
                          isFullPage = false;
                       }                                                              
                       if (hasFilter == true && isFullPage == true)
                       {                                           
                         var yChartF = paddingY + heightFilter + 50;
                         if (heightFilter > (heightA4*2/3)) 
                         {
                             doc.addPage();
                             page++;
                             addLogo(doc,page);
                             doc.setPage(page);                             
                             yChartF = (heightA4 - heightImg ) / 2;
                         }
                         widthImg = widthA4 - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChartF, widthImg, heightImg); 
                         stillHafl = false;                         
                       }
                       else if (hasFilter == true && isFullPage == false)
                       {
                         widthImg = widthA4 - xChart_0 - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart_0, yChart, widthImg, heightImg);
                         stillHafl = false;
                       }
                       else if (hasFilter == false && isFullPage == true)
                       {
                         widthImg = widthA4  - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = false;
                       }
                       else if (hasFilter == false && isFullPage == false)
                       {
                         widthImg = widthA4 / 2 - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = true;
                       }                                                              
                       dataFisrt = true;                               
                    }
                    else
                    {
                    
                       if (isFullPage == false)
                       {
                          if (stillHafl == true)
                          {                                     
                             widthImg = widthA4 / 2 - xChart;
                             var xChart_1 = widthA4 / 2 - xChart;
                             doc.addImage(dataURI, 'JPEG', xChart_1, yChart, widthImg, heightImg);
                             stillHafl = false;
                          }
                          else
                          {
                           
                             widthImg = widthA4 / 2 - xChart;                                                 
                             doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                             stillHafl = true;
                          }
                       }
                       else
                       {
                          if (stillHafl == true) {                        
                           doc.addPage();
                           yPdf = (heightA4 - heightImg ) / 2;
                           page++;
                           addLogo(doc,page);    
                           doc.setPage(page);        
                                                 
                          } 
                         widthImg = widthA4 - xChart - xChart;                            
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = false;
                       }
                       
                    
                    }
                    //add new page if still data
                     if (index < len - 1 && stillHafl == false) {                        
                       doc.addPage();
                       yPdf = (heightA4 - heightImg ) / 2;
                       page++;
                       addLogo(doc,page);
                       doc.setPage(page);
                      
                       
                      }                                  
                }    
             chartImg.src = "data:image/svg+xml;base64," + window.btoa(unescape(encodeURIComponent(chartSVG)));                        
            }                    
         }
        // if is image    
         else if ($(this).hasClass('image-pdf'))
         {            
                    
                var img = new Image();
                img.onload = function(){
                    var dataURI = drawChart(img);                                                
                    var widthImg = maxA4(img.width , widthA4);
                    var heightImg = maxA4(img.height, heightA4) - 30;    
                    if (widthImg > widthA4Hafl)
                    {
                        isFullPage = true;
                    }        
                                         
                    if (dataFisrt == false)
                    {
                       if (widthFilter < widthA4Hafl)    
                       {
                          isFullPage = false;
                       }    
                       if (hasFilter == true && isFullPage == true)
                       {
                         var yChartF = paddingY + heightFilter + 50;
                         if (heightFilter > (heightA4*2/3)) 
                         {
                             doc.addPage();
                             page++;
                             doc.setPage(page);
                             addLogo(doc,page);
                             yChartF = (heightA4 - heightImg ) / 2;
                         }
                         widthImg = widthA4 - xChart - xChart;                             
                         doc.addImage(dataURI, 'JPEG', xChart, yChartF, widthImg, heightImg);
                         stillHafl = false;                         
                       }
                       else if (hasFilter == true && isFullPage == false)
                       {
                         widthImg = widthA4 - xChart_0 - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart_0, yChart, widthImg, heightImg);                             
                         stillHafl = false;                            
                       }
                       else if (hasFilter == false && isFullPage == true)
                       {
                         widthImg = widthA4  - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = false;
                       }
                       else if (hasFilter == false && isFullPage == false)
                       {
                         widthImg = widthA4 / 2 - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = true;
                       }                                                              
                       dataFisrt = true;                               
                    }
                    else
                    {
                       var yChart2 = 30;
                       if (isFullPage == false)
                       {
                          if (stillHafl == true)
                          {
                             widthImg = widthA4 / 2 - xChart;
                             var xChart_1 = widthA4 / 2 - xChart;
                             doc.addImage(dataURI, 'JPEG', xChart_1, yChart2, widthImg, heightImg);
                             stillHafl = false;
                          }
                          else
                          {

                             widthImg = widthA4 / 2 - xChart;        
                             doc.addImage(dataURI, 'JPEG', xChart, yChart2, widthImg, heightImg);
                             stillHafl = true;
                          }
                       }
                       else
                       {
                         if (stillHafl == true) {                        
                               doc.addPage();
                               yPdf = (heightA4 - heightImg ) / 2;
                               page++;
                               doc.setPage(page);                                   
                         } 
                         widthImg = widthA4 - xChart - xChart;                            
                         doc.addImage(dataURI, 'JPEG', xChart, yChart2, widthImg, heightImg);
                         stillHafl = false;
                       }
                       
                    
                     }    
                        //add new page if still data
                        if (index < len - 1 && stillHafl == false) {                        
                           doc.addPage();
                           yPdf = (heightA4 - heightImg ) / 2;
                           page++;
                           doc.setPage(page);
                           addLogo(doc,page);
                           
                       }                     
                    }
                    img.src = $(this).attr('src');                 
         }                            
      });
    }
    //insert fillter search and  save file pdf
    setTimeout(function(){
            var filterClass = divParent.find( ".filter-pdf" );
            if (filterClass != 'undefined')
            {
                var element = $(".filter-pdf");            
                var width =   $(".filter-pdf").width();
                var height =  $(".filter-pdf").height();
                width =  maxA4(width, widthA4) - 15;
                height = maxA4(height, heightA4);
                var obj = html2canvas(element, {
                        onrendered: function(canvas) {
                        var imgData = canvas.toDataURL("image/png");        
                        doc.setPage(1);                                            
                        doc.addImage(imgData, 'JPEG', 15, yChart, width, height);
                        doc.save(filename + '.pdf');    
                    }
                });
            }
            else
            {
              doc.save(filename + '.pdf');    
            }
    }, 1000);
}
// export trang chu    
function graphExMap() {        


     var title = (lang_iot=='vi'? 'Trang chu':'Home page');
    var filename =(lang_iot=='vi'? 'trangchu':'homepage');
     var divParent = $('#section1');
     var doc = new jsPDF('l', 'pt', 'a4');            
    // lanscape a4 height 595.28, width 841.89
    var heightA4 = 594;
    var widthA4 = 840;
    var page = 1;
    var paddingX = 15;
    var paddingY = 30;            
    var yPdf  = paddingY;
    var heightA4Still = heightA4;
    // write title
    var lengthTitle = title.length;            
    doc.setFontSize(22);
    doc.setFontStyle('bold');
    var dimT = doc.getTextDimensions(title);            
    var xTitle = (widthA4 - dimT.w) / 2;
    var yTitle = paddingY;
    doc.text(xTitle, yTitle, title);
    yPdf = yTitle + dimT.h + 10;
    
    //add logo
    addLogo(doc,page);
    
    
    var mapClass = divParent.find( ".map-pdf" );
    if (mapClass != 'undefined')
    {        
      setTimeout(function(){
        var element = $(".map-pdf");                    
        var obj = html2canvas(element, {
            useCORS: true,
            onrendered: function(canvas) {
                var imgData = canvas.toDataURL("image/png");                    
                doc.addImage(imgData, 'PNG', 10, 50, 820, 540);
                doc.save(filename+'.pdf');    
            }
        });
      }, 1000);
    }
    
}
// export theo doi
function graphExTracking() {
     var title = (lang_iot=='vi'? 'Theo dõi':'Tracking');
    var filename =(lang_iot=='vi'? 'theodoi':'Tracking');
    var divParent = $('#section2');
    var doc = new jsPDF('l', 'pt', 'a4');            
    // lanscape a4 height 595.28, width 841.89
    var heightA4 = 594;
    var widthA4 = 840;
    var widthA4Hafl = parseInt(widthA4 * 3 / 4);
    var page = 1;
    var paddingX = 10;
    var paddingY = 30;            
    var yPdf  = paddingY;
    var heightA4Still = heightA4;
    // write title
    var lengthTitle = title.length;
    
    doc.setFontSize(22);
    doc.setFontStyle('bold');
    var dimT = doc.getTextDimensions(title);            
    var xTitle = (widthA4 - dimT.w) / 2;
    var yTitle = paddingY;
    doc.text(xTitle, yTitle, title);
    yPdf = yTitle + 10 + 30;
    addLogo(doc,1);        
    //find data export
    var hasFilter = false;
    var dataFisrt = false;
    var widthFilter = 0;
    var heightFilter = 0;
    var stillHafl = false;
    var filterFinder = divParent.find( ".filter-pdf" );            
    if (filterFinder != 'undefined')
    {
       hasFilter = true;
       widthFilter = $(".filter-pdf").width();    
       heightFilter =  $(".filter-pdf").height();       
    }
    var xChart = paddingX;
    var xChart_0 = 270;
    var yChart = yPdf;
    var distance2Chart = 20;
    var exportClass = divParent.find( ".for-pdf" );
    if (exportClass != 'undefined')
    {
      var len = $( ".for-pdf" ).length;                
      $( ".for-pdf" ).each(function( index ) {
         var isFullPage = false;         
         // if is chart
         if ($(this).hasClass('chart-pdf'))
         {
            var idChart = $(this).attr('id');                
                                
            if ($('#'+idChart).length > 0) {                                                 
                 var chartSVG = $('#'+idChart).highcharts().getSVG();    
                 var svg = $(this).find( "svg" );                                                
                 //get width , height for image;
                 var widthImg = $(svg).attr('width');                
                 widthImg = maxA4(widthImg, widthA4);                            
                 var heightImg = $(svg).attr('height');
                 heightImg = maxA4(heightImg, heightA4);                         
                 var  chartImg = new Image();    
                 // add image to pdf                         
                 chartImg.onload = function()
                 {                                                        
                    var dataURI = drawChart(chartImg);    
                    
                    if (dataFisrt == false)
                    {                                                                                
                       if (hasFilter == true && isFullPage == true)
                       {                                           
                         var yChartF = paddingY + heightFilter + 50;
                         if (heightFilter > (heightA4*2/3)) 
                         {
                             doc.addPage();
                             page++;
                             addLogo(doc,page);
                             doc.setPage(page);                             
                             yChartF = (heightA4 - heightImg ) / 2;
                         }
                         widthImg = widthA4 - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChartF, widthImg, heightImg); 
                         stillHafl = false;                         
                       }
                       else if (hasFilter == true && isFullPage == false)
                       {
                         widthImg = widthA4 / 2 - xChart;
                         yChartF = (heightA4 - heightImg ) / 2 + 180;
                         heightImg = heightA4 - 211 - 70;
                         doc.addImage(dataURI, 'JPEG', 5, yChartF, widthImg, heightImg);
                         stillHafl = true;
                       }
                       else if (hasFilter == false && isFullPage == true)
                       {
                         widthImg = widthA4  - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = true;
                       }
                       else if (hasFilter == false && isFullPage == false)
                       {
                         widthImg = widthA4 / 2 - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = true;
                       }                                                              
                       dataFisrt = true;                               
                    }
                    else
                    {
                    
                       if (isFullPage == false)
                       {
                          if (stillHafl == true)
                          {                                     
                             widthImg = widthA4 / 2 - xChart;
                             yChartF = (heightA4 - heightImg ) / 2 + 180;
                             heightImg = heightA4 - 211 - 70;    
                               var xChart_1 = widthA4 / 2 - xChart + 10;                              
                             doc.addImage(dataURI, 'JPEG', xChart_1, yChartF, widthImg, heightImg);
                             stillHafl = false;
                          }
                          else
                          {
                           
                             widthImg = widthA4 / 2 - xChart;
                             yChartF = (heightA4 - heightImg ) / 2 + 180;
                             heightImg = heightA4 - 211 - 70;    
                               var xChart_1 = widthA4 / 2 - xChart + 10;                             
                             doc.addImage(dataURI, 'JPEG', xChart_1, yChartF, widthImg, heightImg);
                             stillHafl = true;
                          }
                       }
                       else
                       {
                          if (stillHafl == true) {                        
                           doc.addPage();
                           yPdf = (heightA4 - heightImg ) / 2;
                           page++;
                           addLogo(doc,page);    
                           doc.setPage(page);        
                                                 
                          } 
                         widthImg = widthA4 - xChart - xChart;                            
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = false;
                       }
                       
                    
                    }
                    //add new page if still data
                     if (index < len - 1 && stillHafl == false) {                        
                       doc.addPage();
                       yPdf = (heightA4 - heightImg ) / 2;
                       page++;
                       addLogo(doc,page);
                       doc.setPage(page);                                            
                      }                                  
                }    
             chartImg.src = "data:image/svg+xml;base64," + window.btoa(unescape(encodeURIComponent(chartSVG)));                        
            }                    
         }
        // if is image    
         else if ($(this).hasClass('image-pdf'))
         {            
                    
                var img = new Image();
                img.onload = function(){
                    var dataURI = drawChart(img);                                                
                    var widthImg = maxA4(img.width , widthA4);
                    var heightImg = maxA4(img.height, heightA4) - 30;    
                    if (widthImg > widthA4Hafl)
                    {
                        isFullPage = true;
                    }        
                                         
                    if (dataFisrt == false)
                    {
                       if (widthFilter < widthA4Hafl)    
                       {
                          isFullPage = false;
                       }    
                       if (hasFilter == true && isFullPage == true)
                       {
                         var yChartF = paddingY + heightFilter + 50;
                         if (heightFilter > (heightA4*2/3)) 
                         {
                             doc.addPage();
                             page++;
                             doc.setPage(page);
                             addLogo(doc,page);
                             yChartF = (heightA4 - heightImg ) / 2;
                         }
                         widthImg = widthA4 - xChart - xChart;                             
                         doc.addImage(dataURI, 'JPEG', xChart, yChartF, widthImg, heightImg);
                         stillHafl = false;                         
                       }
                       else if (hasFilter == true && isFullPage == false)
                       {
                         widthImg = widthA4 - xChart_0 - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart_0, yChart, widthImg, heightImg);                             
                         stillHafl = false;                            
                       }
                       else if (hasFilter == false && isFullPage == true)
                       {
                         widthImg = widthA4  - xChart - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = false;
                       }
                       else if (hasFilter == false && isFullPage == false)
                       {
                         widthImg = widthA4 / 2 - xChart;
                         doc.addImage(dataURI, 'JPEG', xChart, yChart, widthImg, heightImg);
                         stillHafl = true;
                       }                                                              
                       dataFisrt = true;                               
                    }
                    else
                    {
                       var yChart2 = 50;
                       if (isFullPage == false)
                       {
                          if (stillHafl == true)
                          {
                             widthImg = widthA4 / 2 - xChart;
                             var xChart_1 = widthA4 / 2 - xChart;
                             doc.addImage(dataURI, 'JPEG', xChart_1, yChart2, widthImg, heightImg);
                             stillHafl = false;
                          }
                          else
                          {

                             widthImg = widthA4 / 2 - xChart;        
                             doc.addImage(dataURI, 'JPEG', xChart, yChart2, widthImg, heightImg);
                             stillHafl = true;
                          }
                       }
                       else
                       {
                         if (stillHafl == true) {                        
                               doc.addPage();
                               yPdf = (heightA4 - heightImg ) / 2;
                               page++;
                               doc.setPage(page);
                               addLogo(doc,page);                               
                         } 
                         widthImg = widthA4 - xChart - xChart;                            
                         doc.addImage(dataURI, 'JPEG', xChart, yChart2, widthImg, heightImg);
                         stillHafl = false;
                       }
                       
                    
                     }    
                        //add new page if still data
                        if (index < len - 1 && stillHafl == false) {                        
                           doc.addPage();
                           yPdf = (heightA4 - heightImg ) / 2;
                           page++;
                           doc.setPage(page);
                           addLogo(doc,page);
                           
                       }                     
                    }
                    img.src = $(this).attr('src');                 
         }                            
      });
    }
    //insert fillter search and  save file pdf
    setTimeout(function(){
            var filterClass = divParent.find( ".filter-pdf" );
            if (filterClass != 'undefined')
            {
                var element = $(".filter-pdf");            
                var width =   $(".filter-pdf").width();
                var height =  $(".filter-pdf").height();
                
                width =  maxA4(width, widthA4) - 15;
                height = maxA4(height, heightA4);                
                var obj = html2canvas(element, {
                        onrendered: function(canvas) {
                        var imgData = canvas.toDataURL("image/png");        
                        doc.setPage(1);                                            
                        doc.addImage(imgData, 'JPEG', 15, 45, width, height);
                        doc.save(filename + '.pdf');    
                    }
                });
            }
            else
            {
              doc.save(filename + '.pdf');    
            }
    }, 1000);
}
