<?php 

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)) . '/BKSNet');

$controller = null;
$action = null;
$params = null;
	
$url = $_GET['url'] ?? null;

if ($url && $url != ''){
	include ROOT . '/lib/route.php';
} else {
	include ROOT . '/apps/view/layout/loginHeader.php';

	echo 'BKSNet xin chào ' . 
		 ' <br> Kiểm tra lại địa chỉ url theo định dạng: /BKSNet/controller/action/params...' . 
		 ' <br> Cảm ơn';

	include ROOT . '/apps/view/layout/loginFooter.php';
}


?>