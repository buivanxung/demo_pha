<html>
<?php
	$name = isset($_GET['n']) ? trim($_GET['n']) : "";
	$lat = isset($_GET['lat']) ? (float)$_GET['lat'] : 0;
	$lon = isset($_GET['lon']) ? (float)$_GET['lon'] : 0;
	$vel = isset($_GET['v']) ? (float)$_GET['v'] : 0;
	$time = isset($_GET['t']) ? trim($_GET['t']) : "";
	$lang = isset($_GET['l']) ? trim($_GET['l']) : "vi";
	$gps = isset($_GET['s']) ? (int)$_GET['s'] : 1;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>View on Wikimapia</title>
<link href="../styles/style_new.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
</script>
</head>

<body>
	<?php echo $lang == "en" ? "Center mark is your device position. Caution: donot move the map, use left navigation tool to zoom!" :
							   "Điểm giữa là vị trí Phương tiện. Chú ý: không di chuyển bản đồ, chỉ được sử dụng thanh công cụ bên trái để phóng to thu nhỏ!"; ?>
<div style="color: white; width: 200px; border: 1px blue solid; position: absolute; left: 580px; top: 50px; background-color: #C0C0C0;">
	<b><?php echo $lang == "en" ? "Device: " : "Phương tiện: "; ?></b><?php echo $name; ?><br>
	<b><?php echo $lang == "en" ? "Time: " : "Thời gian: "; ?></b><?php echo $time; ?><br>
	<b><?php echo $lang == "en" ? "Speed: " : "Vận tốc: "; ?></b><?php echo $vel; ?><br>
	<b><?php echo $lang == "en" ? "Status: " : "Trạng thái: "; ?></b><?php echo $gps == 0 ? ($lang == "en" ? "GPS signal good" : "Có tín hiệu GPS") : ($lang == "en" ? "No GPS signal" : "Không có tín hiệu GPS"); ?>
</div>
<iframe name="iWiki" id="iWiki" src="http://wikimapia.org/#lat=<?php echo $lat; ?>&lon=<?php echo $lon ?>&z=11&l=38&m=h&v=2" width="780" height="580" style="left: 0px; top: 0px;" frameborder="0"></iframe>
<!--<iframe name="iWiki" id="iWiki" src="module_wikimapia.org.php" width="780" height="580" style="left: 0px; top: 0px;" frameborder="0"></iframe>-->
</body>

</html>
