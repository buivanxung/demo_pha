<?php
class CCounter
{
	var $sFilePath 		= "";       // Path of data file
	var $sImgPath 		= "images"; 	// Path of images dir
	var $sImgExt        = "jpg";    // Image extendsion
	var $bGraphicMode   = 0;        // 0: text mode, 1: graphic mode
	var $nMaxCount  	= -1;       // Max count, -1 is unlimited
	var $nMinCount  	= 1;        // Min count
	
	// Initial function
	function CCounter($sData, $sImg='')
	{
	    $this->sFilePath 	= $sData;
	    $this->sClassPath = $sClassPath;
	    $this->sImgPath 	= $sImg;
	}
	
	// Set data file
	function SetDataFile($sFileName)
	{
	    $this->sFilePath = $sFileName;
	}// end of set datafile
	
	// Set image dir
	function SetImgDir($sImgDir)
	{
	    $this->sImgPath = $sImgDir;
	}// end of set images dir
	
	// Set image dir
	function SetImgExt($sImgExt)
	{
	    $this->sImgExt = $sImgExt;
	}// end of set images dir
	
	
	// Set graphic mode
	function SetMode($nMode)
	{
	    if($nMode == 1)
	    {
	        $this->bGraphicMode = 1;
		}
		else
		{
		    $this->bGraphicMode = 0;
		}
	}
	
	// Set some properties
	function SetProp($arrProp)
	{
	    if(isset($arrProp['filepath']))
	    {
	        $this->sFilePath = $arrProp['filepath'];
		}
		
		if(isset($arrProp['imgpath']))
	    {
	        $this->sImgPath = $arrProp['imgpath'];
		}
		
		if(isset($arrProp['imgext']))
	    {
	        $this->sImgExt = $arrProp['imgext'];
		}
		
		if(isset($arrProp['mode']))
	    {
	        $this->bGraphicMode = $arrProp['mode'];
		}
		
		if(isset($arrProp['max']))
	    {
	        $this->nMaxCount = $arrProp['max'];
		}
		
		if(isset($arrProp['min']))
	    {
	        $this->nMinCount = $arrProp['min'];
		}
	}// end of function SetProp()	
	
	// Get counter
	function GetCount1($bUpdate = false)
	{		
		$nReturn = 1;
		if( file_exists($this->sFilePath) )
	   {	   	
	   	 // Include ADODB
	   	 $conn = new SQLiteDatabase($this->sFilePath);    		
    		 // create connection object    		 	   	
    		 $sSQL = 'select cnt_cnt from tbl_counter';
    		 $rsResult = $conn->singleQuery($sSQL, true);
    		 if(isset($rsResult) )
    		 {
    		 	$nReturn = (int)$rsResult;
    		 }
    		     		 
    		 if(!isset($nReturn) || !is_numeric($nReturn) )
    		 {
    		 		//echo 'Lay gia tri bang khong';
    		 		$nReturn = 0;
    		 }
    		 
    		 $nReturn++;    		 	 
    		 if($bUpdate === true)
	       {
	       	usleep(200);
	       	$sError = '';
	       	$sSQL = 'update tbl_counter set cnt_cnt = '.$nReturn.' ';
	       	$rsResult1 = $conn->queryExec($sSQL, $sError);
	       	echo $sError;
	       	// Kiem tra so dong duoc cap nhat vao
	       	if($conn->changes() === 0)
	       	{
	       		// Truong hop chua co dong nao het thi insert vao
	       		{
	       			$sSQL = 'insert into tbl_counter values(1, 1)';
	       			$rsResult1 = $conn->queryExec($sSQL, $sError);
	       		}
	       	}
				echo $sError;
			 }			
	   }// end of if(file_exists($this->sFilePath))
		
		if($this->bGraphicMode)
		{
		    $nReturn = $this->MakeGraph($nReturn);
		}
		
		return($nReturn);
	}
	
	// Set new count
	function SetCount($nNewCount)
	{
		if( file_exists($this ->sFilePath) )
	   {
	   	// Include ADODB
	   	$conn = new SQLiteDatabase($this->sFilePath);
    		 if(!isset($nNewCount) || !is_numeric($nNewCount) )
    		 {
    		 		$nNewCount = 1;
    		 }  		 
	      $sError = '';
       	$sSQL = 'update tbl_counter set cnt_cnt = '.$nNewCount.' ';
       	$rsResult1 = $conn->queryExec($sSQL, $sError);
       	if($conn->changes() === 0)
       	{
       		// Truong hop chua co dong nao het thi insert vao
       		{
       			$sSQL = 'insert into tbl_counter values(1, 1)';
       			$rsResult1 = $conn->queryExec($sSQL, $sError);
       		}
       	}
	       return(true);
	   }// end of if(file_exists($this->sFilePath))
	   // Truong hop khong co file thi tra ve loi
	   return(false);
	}// end of function SetCount()
	
	function MakeGraph($nSrc)
	{
	   $sReturn = "";
	   $nSrc = strval($nSrc);	    
	   for($i = 0; $i < strlen($nSrc); $i++)
	   {
	        $sReturn = $sReturn."<img src='./".$this->sImgPath."/".$nSrc[$i].".".$this->sImgExt."'>";
		}
		return($sReturn);
	}
}
?>