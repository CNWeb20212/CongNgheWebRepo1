<?php

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Main Call Function **/

function callHook() {
	global $url;
	global $controller, $action, $params;

	$urlArray = array();
	$urlArray = explode("/", $url);

	$controller = $urlArray[0];
	array_shift($urlArray);
	$action = $urlArray[0];
	array_shift($urlArray);
	$params = $urlArray;

	$ctrl = new $controller();

	if ((int)method_exists($controller, $action)) {
		call_user_func_array(array($ctrl,$action),$params);
	} else {
		/* Error Generation Code Here */
	}
}

/** Autoload any classes that are required **/

function autoloader($className) {

	if (file_exists(ROOT . '/lib/' . strtolower($className) . '.php')) {
		require_once(ROOT . '/lib/' . strtolower($className) . '.php');
	} else if (file_exists(ROOT . '/apps/controller/' . strtolower($className) . '.php')) {
		require_once(ROOT . '/apps/controller/' . strtolower($className) . '.php');
	} else if (file_exists(ROOT . '/apps/model/' . strtolower($className) . '.php')) {
		require_once(ROOT . '/apps/model/' . strtolower($className) . '.php');
	} else {
	}
}

// hàm gettime theo định dạng y/m/d h/m/s
function gettime(){
	$timestamp = time() + 5*3600;
	$time = date("Y/m/d h:i:s", $timestamp);
	return $time;
}

spl_autoload_register('autoloader');

removeMagicQuotes();
unregisterGlobals();
callHook();
