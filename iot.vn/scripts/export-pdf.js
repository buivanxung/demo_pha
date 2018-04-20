            
        
        function graphExReport(filename, title, divParent) {

            var doc = new jsPDF('l', 'pt', 'a4');            
            // lanscape a4 height 595.28, width 841.89
            var heightA4 = 594;
            var widthA4 = 840;
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
            yPdf = yTitle + dimT.h + 30;
            //find data export
            var hasFilter = false;
            var dataFisrt = false;
            var stillHafl = false;
            var filterFinder = divParent.find( ".filter-pdf" );            
            if (filterFinder != 'undefined')
            {
               hasFilter = true;
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
            //  $(this).waitForImages().done(function() {
                 var isFullPage = false;
                 if ($(this).hasClass('full-page-pdf'))
                 {
                    isFullPage = true;
                 }
                 //doc.setPage(page);
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
                                 doc.addPage();
                                 page++;
                                 doc.setPage(page);
                                 yPdf = (heightA4 - heightImg ) / 2;
                                 widthImg = widthA4 - xChart - xChart;
                                 doc.addImage(dataURI, 'JPEG', xChart, yPdf, widthImg, heightImg); 
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
                               doc.setPage(page);
                               
                              }       
                                                         
                            
                        }    
                        alert(window.btoa(unescape(encodeURIComponent(chartSVG))));
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
                        //doc.addImage(img.onload(), 'JPEG', paddingX, yPdf, widthI, heightI);                        
                        if (dataFisrt == false)
                        {
    
                           if (hasFilter == true && isFullPage == true)
                           {
                             doc.addPage();
                             page++;
                             doc.setPage(page);
                             yPdf = (heightA4 - heightImg ) / 2;
                             widthImg = widthA4 - xChart - xChart;                             
                             doc.addImage(dataURI, 'JPEG', xChart, yPdf, widthImg, heightImg);
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
                               
                           }                     
                        }
                        img.src = $(this).attr('src');
                        
                                       
                 }
            //  });
                 
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
        };