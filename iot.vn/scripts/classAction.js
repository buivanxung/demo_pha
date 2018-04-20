const timeOut = 60*1000;
function ChangeTr(trId,type){
    if(type==0){
         $('#'+trId).removeClass('reduceProduct');
         $('#'+trId).addClass('newProduct');  
    }else{
           $('#'+trId).removeClass('newProduct');
           $('#'+trId).addClass('reduceProduct');
    }

    setTimeout(ChangeStatus,timeOut,trId,type);
}
function ChangeStatus(trId,type){
    if(type==0){
        $('#'+trId).removeClass('newProduct'); 
    }else{
        $('#'+trId).removeClass('reduceProduct'); 
    }
   
}
