
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Việt bản đồ</title>

<style type="text/css">
<!--
-->
</style>
<?php
    define('IN_THUVIENCONGGIAO', TRUE);
    global $vkey, $gkey;   
    include_once('../../core/includes/functions.php');  
    GetMapsKey();
	/*if ($_SERVER['HTTP_HOST']=='192.168.0.149')
	{
		$vkey='E43pcmZHdUgHgZ1BVAdwb0qcGS57Z/Dw';
		$gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRTO6Nofa28CSIvRoZJ3A5zfJd6sJxQZ6RbD0XPodHHc55-ykJpyIzdPsg';
     
	}
	else if ($_SERVER['HTTP_HOST']=='210.86.239.199')
		{
			$vkey='5lJdIlKaLKebTH7QMtkzdYE/2OcAXFBz';
			$gkey='ABQIAAAAlztVfZUqzeQOopFxYIBBHhQAThoAZDUbKKqpcwHg1m-B1ZkOuhRx_s5O0pWJ5EN9AnpeP0Dbh_g13w';
		}
	else if ($_SERVER['HTTP_HOST']=='thuvienconggiao.com')
		{
			$vkey='5lJdIlKaLKebTH7QMtkzdYE/2OcAXFBz';
			$gkey= 'ABQIAAAA5jt47M8H8oITy6bqaDj9lRRBs9vyYicbEmSJTyHlzx-qOuBEuBRf0K8udIV55wIjtoUqgYBFhNJrDA';
	      
		}
	else if ($_SERVER['HTTP_HOST']=='www.thuvienconggiao.com')
		{
			$vkey='1hYnaBX17cQxRIBSO/B0ud2M8fah5NAv';
			$gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRQfjv_CbxCrA7BzWTVMIwhZfcGWTBSpgbI2IlVyibpmNhsnLAn-zFqv6g';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='theodoidinhvi.com')
		{
			$vkey='xRFQCP4sH3nCMD5LEK81H62YZO8sssaMI44EhSSXaos=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxQc9EHybtzV69KEmdh7xxYlsVH1KhQ_0YxGHJyODDwE6J9Z5G1b3JItaA';
	      
		}
	else if ($_SERVER['HTTP_HOST']=='www.theodoidinhvi.com')
		{
			$vkey='1hYnaBX17cSSY+AiMpzAdUFs7oV8CrDPwL0B7mmFx8c=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRh1QnnyfL7qKCd47VIa-GwMU7ZWRRmUgdEB4sPlyJID_Aa5p1hGpKK4g';
		}		
	//==== dinh vi theo doi
	else if ($_SERVER['HTTP_HOST']=='dinhvitheodoi.com')
		{
			$vkey='Rb3AOZxodVPHXVb+FymWGTfaZqoe7VqPwyc/GeA+aMo=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxQm6l6Pt1lYzw2QAvPgmtA1BXu28RRVoXBAG7nB86iYcSKBZNlEm_w-kQ';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='www.dinhvitheodoi.com')
		{
			$vkey='1hYnaBX17cS7NT/99yNx3z37Dz7EKkQuIaeEMUFjiys=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR7M6d_HFOK2ma5xKWlagXtnYXWHBR-MXmxHyMEvqOValdUZeMl5BTkrw';
	      
		}	
	//==== theo doi o to
	else if ($_SERVER['HTTP_HOST']=='theodoioto.com')
		{
			$vkey='xRFQCP4sH3npnISjL95Pjl3GrzFi5mQW';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRzNWJe9MXGIFjaaDpbNi1LOOm6vBRWN7cRIAIzbJ7iHXSlDeQPCcvDFA';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='www.theodoioto.com')
		{
			$vkey='1hYnaBX17cSSY+AiMpzAdfbtQLjaKONXWiBvgJl6DlY=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxS1mEdBchzjhgLg3qUHelcXR2Cz1BQsQ16gtZw4rJxwWsxPge_FpxaS0Q';
		}	
	//====
	elseif($_SERVER['HTTP_HOST'] == 'localhost')
		{
			$vkey='e7vjH+pgQHuSyV75dwG6hq0WQek+cVqm';
			$gkey='ABQIAAAA5jt47M8H8oITy6bqaDj9lRT2yXp_ZAY8_ufC3CFXhHIE1NvwkxRAN8zE0L5YLzQ4s3Grt2HN3XH-jg';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='gps.tru-e.vn')
		{
			$vkey='OgU0D+rO9mGR4SZLqM+NvAE+TL1KFyrG';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRj2rDGjOyISiWF9mP6wn2hudI4rxSxGUMpJQr1UUstwJfU12RJVwdsYw';
	      
		}
	else if ($_SERVER['HTTP_HOST']=='www.gps.tru-e.vn')
		{
			$vkey='1hYnaBX17cRYVi/HtGWCNdHsFWWb6d3YvhPTT4ZC2fM=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSw-WdHrSh9K4IqJ-cg8aMacIdIChQkrWW2LVUQYZP9AYZPJfDKFe1dAw';
	     
		}
	//====	
	else if ($_SERVER['HTTP_HOST']=='prossgps.com')
		{
			$vkey='MrR9ZR4xcGdY3wQK5vhpSdMbnTYUQwVw';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxQYI8XWnc9Nw82tfB6gw0RVRzBpxxQpFfl61F7l7aO2s0lwgsOzwD1GUw';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='www.prossgps.com')
		{
			$vkey='1hYnaBX17cTgN6SMySPzxdhalCnM+GlsuPr5h++Lt0Y=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR8_0RLBcv7iFwqetI0DjiPbEM5VhTsV7R2vyNvGVlPjJkto02mEy-rIg';
		}
	//====	
	else if ($_SERVER['HTTP_HOST']=='dcttgps.com')
		{
			$vkey='Rb3AOZxodVOqJxifEsi3g6YREXAx+kuH';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSm8H8fp7XLu_cOqfF4GPThBCuYIBQsoORMTcCrG0KFM6i0CxfBoobLHw';
		}
	else if ($_SERVER['HTTP_HOST']=='www.dcttgps.com')
		{
			$vkey='1hYnaBX17cRFVYvhy1bPc4GPkY4PjPdV';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRy78bcu6CmzIHFVw-ZzNK9oH0_sxQC5dWsuQfcZi-GxU_xjm0E0bMylA';
		}		
	//====
	else if ($_SERVER['HTTP_HOST']=='huyphatgps.com')
		{
			$vkey='ZJmw3yKQ3juiP3cVw7aIJb2ClC5V0xYd';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxTNJ6re42JINpO9v7ele3WPi73feBTxjrYZxq-LTu8RVzicwsx9KRVp8Q';
	      
		}
	else if ($_SERVER['HTTP_HOST']=='www.huyphatgps.com')
		{
			$vkey='1hYnaBX17cRi0tmnrEHVJeSLy77ZD1p+aCe0KpldL/I=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSxHD1wa6EkhsbxOxMJrM8azxET3RQygA4zeA02sxuqUyVKwBYH3HLwHw';
	     
		}		
	//====
	/////	
	else if ($_SERVER['HTTP_HOST']=='gps.phuhoa.com')
		{
			$vkey='OgU0D+rO9mGO6hel0BOyq1Ai4Hsc7zLp';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR3JnlpIZ9-xWp8E28TRkERPzeH1RQDBkI_ODi2-0Dx5uAVgvFlY9tt_Q';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='www.gps.phuhoa.com')
		{
			$vkey='1hYnaBX17cQcwZURoqNrZ4FhuuYHBWZWMwku4HYQCek=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRPPFw_Pq7qhP0LM7D66_-GTccNORSK0cHm1vrXtTXCRUtOB2y48CvLFQ';
	     
		}
	//====
	else if ($_SERVER['HTTP_HOST']=='www.dananggps.com')
		{		
			$vkey='1hYnaBX17cRCNxe9+dwoy8A/OH6OC1LhLB0WgbaSQKo=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxR8Ig2TBjUZyT-jIHEQ08MWhQc3lRTZzdfSAZJIddBIOqk8j98J0cPHcg';
	     
		}
	else if ($_SERVER['HTTP_HOST']=='dananggps.com')
		{
			$vkey='Rb3AOZxodVNrrkKrhsx7qx/x2QXgMKcb';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxTmSvPpRb7av6D0A3nXzH4ZWFNr7BRZE2FK73SHwgyXryTXfNLTtELjHA';
	     
		}	
	//======  gas thanh tai
	else if ($_SERVER['HTTP_HOST']=='www.gps.congnghethantai.com')
		{
			$vkey='1hYnaBX17cSD+92OxdCeO5okHQ321W1AfzXhpOqqSiIEstC7dDiJGg==';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSyzREWOFAiWn4bt_AnXvFElQsDbhQfJvdGOHcqwARFV-_I5lE-LnCgnA';
		}
	else if ($_SERVER['HTTP_HOST']=='gps.congnghethantai.com')
		{
			$vkey='OgU0D+rO9mGFLlC1IGNKZbmW8sVB7qmGhIu6+QXjYIY=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxSeot0UXC85Ssi64vTFvzC88W2GPBTRBtSKfvlWpbwqp6mmCLxr39Feqg';
	     
		}		
	//======
	else if ($_SERVER['HTTP_HOST']=='gps.adasolution.net')
		{
			
			$URL = 'gps.adasolution.net';
			$vkey='OgU0D+rO9mG4+2Y4dfYKZ6jbo+fpFJX/ry06bQ9lrH4=';
			$gkey='ABQIAAAAjid_8ZzkReKvKNPMF_W4ghSaamLcNm8Al0d6bQGTEEeFR3Gr9RQmI3yR_0vzRwiU9RkgP9lsxwpY1Q';	    
		}		
	else if ($_SERVER['HTTP_HOST']=='www.gps.adasolution.net')
		{
			
			$URL = 'gps.adasolution.net';
			$vkey='1hYnaBX17cQg5dLsQXOUKpKsTzuV5wJduWHRQ8+80wM=';
			$gkey='ABQIAAAAjid_8ZzkReKvKNPMF_W4ghSvKdP_G4heX4LTRt0J40doWMP3DBSOeTu4pilcr49aCcSBoXXzso90tw';	    
		}
	//====================== gps.thinhtoanvn.com ====================
	else if ($_SERVER['HTTP_HOST']=='gps.thinhtoanvn.com')
		{
			
			$URL = 'gps.adasolution.net';
			$vkey='OgU0D+rO9mHqRHm+0qKEwdXymtlIJyfPi2zlgOjl40w=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRiVrcjpmeL7GoeohGIPhFWfZ88SBTGAYFlfjqeD3t4lvHP_W7CQEXd8g';	    
		}		
	else if ($_SERVER['HTTP_HOST']=='www.gps.thinhtoanvn.com')
		{
			
			$URL = 'gps.adasolution.net';
			$vkey='1hYnaBX17cRYVi/HtGWCNVw9Uewvrf2ILBAzQZ0Y/jg=';
			$gkey='ABQIAAAAIzjnTw1ATrq-KV4C4vn8vxRwB9PGO0W1ud2MVLBuN28LI0Qd0RSg331KBQtRt1oJkZTViQsTkB49CQ';	    
		}
    else if ($_SERVER['HTTP_HOST']=='v3.thuvienconggiao.com')
    {
        $icon ='favicon.ico';
        $vkey='zR18NATbNEZXixl05tehka//+6ZRNa5p';
        $gkey='ABQIAAAAQSKty3ydIP9bHhY95JxgVRTaiOOMFheALUby0UD5OInaXRAtMxRhmeQLe334ojqHh6aAGG6kp8GkZA';
    }
	
	//=============================================================	
	else
		{
			//echo "<script type='text/javascript' src='http://www.vietbando.com/API/VBDMapAPI.js?key=PxVLItwK6WqNoaxTeGVU1L2npdqEq0Sx'></script>";
			$vkey='e7vjH+pgQHuSyV75dwG6hq0WQek+cVqm';
			$gkey='ABQIAAAAlztVfZUqzeQOopFxYIBBHhQ6uVi95azZxgPq8q4GvbuNKNjxwhQH1J1WPL7tAbPwpuUVGYSCJPAGPQ';
	      
		}
	//	Msgbox1($vkey);
    */
?>
 
<script type='text/javascript' src='http://vietbando.com/API/VBDMapAPI.js?key=<?php echo $vkey; ?>'></script>
<script type="text/javascript">

function addLoadEvent(func) { 
	var oldonload = window.onload; 
	if (typeof window.onload != 'function'){ 
		window.onload = func
	} else { 
		window.onload = function() {
			oldonload();
			func();
		}
	}
}
var map;
function loadMap() 
{
	map = new VMap(document.getElementById('map'));
	map.addControl(new VLargeMapControl());
	//map.addControl(new VMapTypeControl())
	map.setCenter(new VLatLng(16.130262012034766,106.171875),6);
	//map.setMapType(G_MAP_TYPE);
	map.addControl(new VOverviewMapControl())
	icon0 = new VIcon();
	icon0.iconSize = new VSize(20, 18);
	icon0.iconAnchor = new VPoint(10, 12);
	icon0.infoWindowAnchor = new VPoint(9, 2);
}
addLoadEvent(loadMap);
</script>
<?php
	$lat = $_REQUEST['lat'];
	$long = $_REQUEST['long'];
	$dname = $_REQUEST['dname'];
	$i = $_REQUEST['i'];
	$time = $_REQUEST['time'];
	$tempe = $_REQUEST['tempe'];
	$speed = round($_REQUEST['speed'],1);
	$gps = $_REQUEST['gps'];
	
	/*$lat = 16.130262012034766;
	$long = 106.171875;
	$dname = 'ADA';
	$i = 5;
	$time = '2010-06-29 00:06:00';
	$tempe = $_REQUEST['tempe'];
	$speed = 4;
	$gps = $_REQUEST['gps'];*/
	
	
	$txt = "<script language='javascript'>
	function xem()
	{
		var marker = new VMarker(new VLatLng(".$lat.",".$long."),icon0);
		popuphtml='<div style=\"width:210px; height:80px\" align=left> <b><font size=2>DEVICE NAME: </font>".$dname."</b><br><b><font size=2>TIME:</font></b> ".fDatetime($time)."<br><b><font size=2>SPEED: </font></b> ".(($speed<5) ? "stop" : ($speed." (km/h)"))." </div>';
		if (".$speed." < 5)
		{
			icon0.image = '../images/icons/icon_stop.gif';
		}
		else
		{
			icon0.image = '../images/icons/icon_run.png';			
		}
		
		map.addOverlay(marker);
		marker.openInfoWindow(popuphtml);
		VEvent.addListener(marker,'click',function() {marker.openInfoWindow(popuphtml);});	
		//VEvent.addListener(marker,'mouseout',function() {marker.closeInfoWindow(popuphtml);});	
		map.setCenter(new VLatLng(".($lat).",".($long)."),11);
		}
	addLoadEvent(xem);
	</script>";
	echo $txt;
	
//===============================================	
function fDatetime($dt)
{
	$dt1 = explode(" ",$dt);
	$dt2 = explode("-",$dt1[0]);
	$dt3 = $dt2[2]."/".$dt2[1]."/".$dt2[0]." ".$dt1[1];
	return $dt3;
}

?>
</head>
<body>
<div id="map" style="left: 0px; top: 0px; position: absolute; width: 99%; height: 99%;"></div>
<script>
	//resizemap();
</script>

</body>
</html>