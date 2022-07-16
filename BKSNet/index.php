<?php 

header('Content-Type: text/html; charset=utf-8');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)) . '/BKSNet');

$controller = null;
$action = null;
$params = null;
	
$url = $_GET['url'] ?? null;

if (($url != null) | ($url == "")){
	if ($url == ""){
		if (isset($_COOKIE['ttk'])){
			header('location: /BKSNet/postcontroller/postlist');
		} else {
			$url = '/logincontroller/login';
			include ROOT . '/lib/route.php';	
		}
	} else {
		include ROOT . '/lib/route.php';
	}
} else {
	include ROOT . '/apps/view/layout/loginHeader.php';

	echo 'BKSNet xin chào ' . 
		 ' <br> Kiểm tra lại địa chỉ url theo định dạng: /BKSNet/controller/action/params...' . 
		 ' <br> Cảm ơn' . '<br>';
	echo 'Địa chỉ url của bạn: ' . $url;

	include ROOT . '/apps/view/layout/loginFooter.php';
}


?>