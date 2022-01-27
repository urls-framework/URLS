<?php
/*
Copyright 2021 Micah Baumann

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
*/

// Variables
$_ACCESS = array();
$URLS_DEBUG = false;
$URLS_AUTO_UPDATE = true;
$URLS_VERSION = '1.4';
$URLS_VARS = array();
// $TRAILING_SLASH = true;
// $TRAILING_SLASH_STRICT = false;
$URLS_ERROR_TEMPLATES = array(
	404=>"<!DOCTYPE html><html><head><title>URLS - Error 404</title></head><body><h1>Error 404 - Page not found</h1><p><b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b> could not be found! Try checking the URL.</p><hr>URLS Framework</body>",
	500=>"<!DOCTYPE html><html><head><title>URLS - Error 500</title></head><body><h1>Error 500 - Internal Server Error</h1><p>The server <b>".$_SERVER['SERVER_NAME']."</b> is having a problem! Try contacting the site admin.</p><hr>URLS Framework</body>",
	403=>"<!DOCTYPE html><html><head><title>URLS - Error 403</title></head><body><h1>Error 403 - Access Forbidden</h1><p>You are not authorized to access <b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b>! Try signing in first.</p><hr>URLS Framework</body>",
	400=>"<!DOCTYPE html><html><head><title>URLS - Error 400</title></head><body><h1>Error 400 - Bad Request</h1><p>Something went wrong when your browser tryed to access <b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b>! Try again.</p><hr>URLS Framework</body>",
	401=>"<!DOCTYPE html><html><head><title>URLS - Error 401</title></head><body><h1>Error 401 - Unauthorized</h1><p>You are not authorized to access <b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b>! Try signing in first.</p><hr>URLS Framework</body>",
	'other'=>"<!DOCTYPE html><html><head><title>URLS - Error</title></head><body><h1>Error</h1><p>There was an error.</p><hr>URLS Framework</body>",


);

header('X-Powered-By: URLS Framework v'.$URLS_VERSION);

// Update
include 'update.php';

// Functions
function urls_response_code($error, $doc=null, $showNoError=false) {
	http_response_code($error);
	if ($doc != null) {
		require $doc;
	} elseif (isset($GLOBALS['RESPONSE_'.$error])) {
		require $GLOBALS['RESPONSE_'.$error];
	} else {
		if (!$showNoError) {
			switch ($error) {
				case 404:
					$err = $GLOBALS['URLS_ERROR_TEMPLATES'][404];
					break;
				case 500:
					$err = $GLOBALS['URLS_ERROR_TEMPLATES'][500];
					break;
				case 403:
					$err = $GLOBALS['URLS_ERROR_TEMPLATES'][403];
					break;
				case 400:
					$err = $GLOBALS['URLS_ERROR_TEMPLATES'][400];
					break;
				case 401:
					$err = $GLOBALS['URLS_ERROR_TEMPLATES'][401];
					break;
				
				default:
					$err = "<!DOCTYPE html><html><head><title>URLS - Response Code ".$error."</title></head><body><h1>Response Code ".$error."</h1><p>This page's status is HTTP code ".$error.".</p><hr>URLS Framework</body>";
					break;
			}
		}
	}
	die($err);
}

function urls_404($doc=null, $showNoError=false) {
	ob_end_clean();
	http_response_code(404);
	if ($doc != null) {
		$err = (require $doc);
	} elseif (isset($GLOBALS['ERROR_404'])) {
		$err = (require $GLOBALS['ERROR_404']);
	} else {
		if (!$showNoError) {
			$err = $GLOBALS['URLS_ERROR_TEMPLATES'][404];
		}
	}
	
	die($err);
}

function urls_403($doc=null, $showNoError=false) {
	http_response_code(403);
	if ($doc != null) {
		$err = (require $doc);
	} elseif (isset($GLOBALS['ERROR_403'])) {
		$err = (require $GLOBALS['ERROR_403']);
	} else {
		if (!$showNoError) {
			$err = $GLOBALS['URLS_ERROR_TEMPLATES'][403];
		}
	}
	die($err);
}

function urls_401($doc=null, $showNoError=false) {
	http_response_code(401);
	if ($doc != null) {
		$err = (require $doc);
	} elseif (isset($GLOBALS['ERROR_401'])) {
		$err = (require $GLOBALS['ERROR_401']);
	} else {
		if (!$showNoError) {
			$err = $GLOBALS['URLS_ERROR_TEMPLATES'][401];
		}
	}
	die($err);
}

function urls_error($doc=null, $str=null, $error=array(), $template="other", $code=500) {
	http_response_code($code);
	if ($doc != null) {
		$err = (require $doc);
	} elseif ($str != null) {
		$err = $str;
	} else {
		$err = $GLOBALS['URLS_ERROR_TEMPLATES'][$template];
	}
	die($err);
}

function urls_path($path, $file, $vars=null) {
	// Update

	if ($GLOBALS['URLS_AUTO_UPDATE']) {
		if ($version = @fopen("https://raw.githubusercontent.com/urls-framework/URLS/main/src/version.txt?".mt_rand(), "r")) {
			$versionRaw = fread($version, 10);
			fclose($version);
			preg_match_all('/([^.]*).?/', $versionRaw, $verMatches, PREG_SET_ORDER, 0);
			$ver = array();
			for ($i=0; $i < count($verMatches)-1; $i++) { 
				array_push($ver, $verMatches[$i][1]);
			}
			preg_match_all('/([^.]*).?/', $GLOBALS['URLS_VERSION'], $curVerMatches, PREG_SET_ORDER, 0);
			$curVersion = array();
			for ($i=0; $i < count($curVerMatches)-1; $i++) { 
				array_push($curVersion, $curVerMatches[$i][1]);
			}
			if ($GLOBALS['URLS_AUTO_UPDATE'] && ($curVersion[0] == $ver[0] && $curVersion[1] != $ver[1])) {
				urls_update();
			}
		}
	}

	// vars
	if ($vars != null) {
		$URLS_VARS = $vars;
	}


	$bt = debug_backtrace();
	$caller = array_shift($bt);
	if (strpos($_SERVER['REQUEST_URI'], '?')) {
		$url = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '?'));
	} elseif (strpos($_SERVER['REQUEST_URI'], '#')) {
		$url = substr($_SERVER['REQUEST_URI'], 0, strpos($_SERVER['REQUEST_URI'], '#'));
	} else {
		$url = $_SERVER['REQUEST_URI'];
	}

	$dir = $GLOBALS['BASE_URL'] . $path;

	if (str_contains($dir, '<')) {
		$include = true;
		$uri = array();
		preg_match_all('/\/?([^\/]*)\/?/', $url, $uriMatches, PREG_SET_ORDER, 0);
		for ($i=0; $i < count($uriMatches) - 1; $i++) { 
			array_push($uri, $uriMatches[$i][1]);
		}
		preg_match_all('/\/?([^\/]*)\/?/', $dir, $dirMatches, PREG_SET_ORDER, 0);
		$dir = array();
		for ($i=0; $i < count($dirMatches) - 1; $i++) { 
			array_push($dir, $dirMatches[$i][1]);
		}
		for ($i=0; $i < max(count($uri), count($dir)); $i++) { 
			if (isset($dir[$i]) && str_contains($dir[$i], '<')) {
				if (isset($uri[$i])) {
					$access = urldecode($uri[$i]);
				} else {
					$access = null;
				}
				$_ACCESS[substr($dir[$i], 1, strlen($dir[$i]) - 2)] = $access;
				continue;
			}
			if (!isset($dir[$i]) || !isset($uri[$i]) || $dir[$i] != $uri[$i]) {
				$_ACCESS = array();
				$include = false;
				break;
			}
		}
		if ($include) {
			ob_start();
			//if (file_exists('/'.$path)) {
				include $file;
			// } else {
			// 	if ($GLOBALS['URLS_DEBUG']) {
			// 		urls_error(null, '<!DOCTYPE html><html><head><title>URLS - Template Not Found</title></head><body><p><b>URLS Error</b>: File, <b>'.$file.'</b> requested in the function on line #'.$caller['line'].' does not exist.</p></body></html>');
			// 		exit();
			// 	}
			// 	urls_404();
			// 	exit();
			// }
			exit();
		}
	} else {
		if ($url[strlen($url)-1] == '/') {
			$url = substr($url, 0, strlen($url)-1);
		}
		$dir = substr($dir, 0, strlen($dir)-1);
		if ($url == $dir) {
			ob_start();
			//if (file_exists('/'.$path)) {
				include $file;
			// } else {
			// 	if ($GLOBALS['URLS_DEBUG']) {
			// 		urls_error(null, '<!DOCTYPE html><html><head><title>URLS - Template Not Found</title></head><body><p><b>URLS Error</b>: File, <b>'.$file.'</b> requested in the function on line #'.$caller['line'].' does not exist.</p></body></html>');
			// 		exit();
			// 	}
			// 	urls_404();
			// 	exit();
			// }
			exit();
		}
	}
}


?>

