<?php
/*
Copyright 2022 Micah Baumann

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
header('X-Powered-By: URLS Framework v'.Urls::VERSION);
ob_start();
class Urls
{

	public function __construct(...$pathArrays) {
		$this->errorTemplates = array(
			404=>"<!DOCTYPE html><html><head><title>URLS - Error 404</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Error 404 - Page not found</h1><p><b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b> could not be found! Try checking the URL.</p><hr><i>URLS Framework/".Self::VERSION." ".apache_get_version()." Server at ".$_SERVER['SERVER_NAME']." Port ".$_SERVER['SERVER_PORT']."</i></body>",
			500=>"<!DOCTYPE html><html><head><title>URLS - Error 500</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Error 500 - Internal Server Error</h1><p>The server <b>".$_SERVER['SERVER_NAME']."</b> is having a problem! Try contacting the site admin.</p><hr>URLS Framework/".Self::VERSION."</body>",
			403=>"<!DOCTYPE html><html><head><title>URLS - Error 403</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Error 403 - Access Forbidden</h1><p>You are not authorized to access <b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b>! Try signing in first.</p><hr><i>URLS Framework/".Self::VERSION." ".apache_get_version()." Server at ".$_SERVER['SERVER_NAME']." Port ".$_SERVER['SERVER_PORT']."</i></body>",
			400=>"<!DOCTYPE html><html><head><title>URLS - Error 400</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Error 400 - Bad Request</h1><p>Something went wrong when your browser tried to access <b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b>! Try again.</p><hr><i>URLS Framework/".Self::VERSION." ".apache_get_version()." Server at ".$_SERVER['SERVER_NAME']." Port ".$_SERVER['SERVER_PORT']."</i></body>",
			401=>"<!DOCTYPE html><html><head><title>URLS - Error 401</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Error 401 - Unauthorized</h1><p>You are not authorized to access <b>".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."</b>! Try signing in first.</p><hr><i>URLS Framework/".Self::VERSION." ".apache_get_version()." Server at ".$_SERVER['SERVER_NAME']." Port ".$_SERVER['SERVER_PORT']."</i></body>",
			'other'=>"<!DOCTYPE html><html><head><title>URLS - Error</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Error</h1><p>There was an error.</p><hr><i>URLS Framework/".Self::VERSION." ".apache_get_version()." Server at ".$_SERVER['SERVER_NAME']." Port ".$_SERVER['SERVER_PORT']."</i></body>",
		);
		foreach ($pathArrays as $path) {
			$this->paths[$path[0]] = $path;
		}
	}

	// URLS globals
	public static $access = array();
	public static $debug = false;
	public static $autoUpdate = false;
	public static $vars = array();
	public static $base = '';
	public static $cs = true;
	public static $objects = array();
	public static $self;
	public static $objectsCalled = 0;
	public static $successPaths = array();

	// HTTP Error docs
	public $errors = array();

	// A global version of $errors
	public static $defaultErrors = array();

	private $paths = array();

	// Error templates
	private $errorTemplates;

	const VERSION = '2.0.0';

	private static $rewriteConds = array();

	private static $numOfChecks = 0;

	// Prints debug table rows
	private function printRow($msg, $value) {
		echo '<tr><td style="border: solid 1px black"><b>'.$msg.':</b></td><td style="border: solid 1px black">'.$value.'</td></tr>';
	}

	// adds rewrite conditions to htaccess
	public static function rewriteCond($cond, $htaccess=null) {
		if ($htaccess === null) {
			$htaccess = dirname(__DIR__, 1).'\.htaccess';
		}

		array_push(self::$rewriteConds, $cond);
		$conds = '';
		foreach (self::$rewriteConds as $i) {
			$conds = $conds."\n".$i;
		}

		$file = file_get_contents($htaccess);
		$newFile = preg_replace('/(\X*# --URLS BEGIN--\X*# --URLS ADD_COND BEGIN--)\X*(# --URLS ADD_COND END--\X*# --URLS END--\X*)/', "\$1".$conds."\n\$2", $file, 1);
		file_put_contents($htaccess, $newFile);
	}

	// Removed a rewrite condition
	public static function rewriteCondRemove($cond, $htaccess=null) {
		if ($htaccess === null) {
			$htaccess = dirname(__DIR__, 1).'\.htaccess';
		}

		unset(self::$rewriteConds[array_search($cond, self::$rewriteConds)]);
		$conds = '';
		foreach (self::$rewriteConds as $i) {
			$conds = $conds."\n".$i;
		}

		$file = file_get_contents($htaccess);
		$newFile = preg_replace('/(\X*# --URLS BEGIN--\X*# --URLS ADD_COND BEGIN--)\X*(# --URLS ADD_COND END--\X*# --URLS END--\X*)/', "\$1".$conds."\n\$2", $file, 1);
		file_put_contents($htaccess, $newFile);
	}

	// Adds a path
	public function path($path, $file, $end=false, $cs=null, $vars=null) {
		$this->paths[$path] = array($path, $file, $cs, $end, $vars);
	}

	// Adds a Redirect
	public function redirect($path, $to, $cs=true, $type=null) {
		$this->paths[$path] = array($path, $to, $cs, true, null, 'redirect', $type);
	}

	private function sort($array) {
		$end = array();
		$reg = array();
		foreach ($array as $value) {
			if ($value[3]) {
				$end[$value[0]] = $value;
			} else {
				$reg[$value[0]] = $value;
			}
		}
		krsort($end);
		krsort($reg);
		return array_merge($end, $reg);
	}

	public static $continue = false;

	public static function continue() {
		self::$continue = true;
	}

	// Checks if the path matches the url

	// Debug variable option now



	private function checkPath($path, $url, $cs=true, $end=false){
		$bt = debug_backtrace();
		$caller = array_shift($bt);
		$url = parse_url($url)["path"];

		//$dir = self::$base . $path;
		$dir = $path;

		if (!str_ends_with($url, '/')) {
			$url = $url.'/';
		}

		if (substr($url, 0, strlen(self::$base)) == self::$base) {
			$url = substr($url, strlen(self::$base));
		}
		//$url = ltrim($url, self::$base);

		if (self::$debug) {
			echo '<table style="border-collapse: collapse;border: solid 1px black;">';
			$this->printRow('Check Number', self::$numOfChecks);
			$this->printRow('Objects Called', self::$objectsCalled);
			$this->printRow('Request Path', htmlspecialchars($url));
			$this->printRow('Base Path', htmlspecialchars(self::$base));
			//echo '</table>';
		}

		if (str_contains($dir, '<')) {
			$include = true;
			$uri = array();

			preg_match_all('/\/?([^\/]*)\/?/', $url, $uriMatches, PREG_SET_ORDER, 0);
			foreach ($uriMatches as $uriMatch) { 
				array_push($uri, $uriMatch[1]);
			}

			preg_match_all('/\/?([^\/]*)\/?/', $dir, $dirMatches, PREG_SET_ORDER, 0);
			$dir = array();
			foreach ($dirMatches as $dirMatch) { 
				array_push($dir, $dirMatch[1]);
			}

			while ("" === end($dir)) {
				array_pop($dir);
			}

			while ("" === end($uri)) {
				array_pop($uri);
			}

			$count = count($dir);
			if ($count > count($uri)) {
				if (self::$debug) {
					$this->printRow('Success', 'false');
					echo '</table><br>';
				}
				return false;
			}

			if ($end && $count !== count($uri)) {
				if (self::$debug) {
					$this->printRow('Success', 'false');
					echo '</table><br>';
				}
				return false;
			}

			for ($i=0; $i < $count; $i++) { 
				if (isset($dir[$i]) && str_contains($dir[$i], '<')) {
					if (isset($uri[$i])) {
						$access = urldecode($uri[$i]);
					} else {
						$access = null;
					}
					self::$access[substr($dir[$i], 1, strlen($dir[$i]) - 2)] = $access;
					continue;
				}

				if (self::$debug) {
					$this->printRow('Request Path Part '.($i+1), htmlspecialchars($uri[$i]));
					$this->printRow('Test Path Part '.($i+1), htmlspecialchars($dir[$i]));
				}

				if ($cs) {
					if (!isset($dir[$i]) || !isset($uri[$i]) || $dir[$i] !== $uri[$i]) {
						self::$access = array();
						$include = false;
						break;
					}
				} else {
					if (!isset($dir[$i]) || !isset($uri[$i]) || strcasecmp($dir[$i], $uri[$i]) !== 0) {
						self::$access = array();
						$include = false;
						break;
					}
				}
			}

			if ($include) {
				for ($i=0; $i < $count; $i++) {
					self::$base = self::$base.$uri[$i].'/';
				}
			}

			if (self::$debug) {
				$this->printRow('Success', trim(var_export(var_export($include, true), true), '"\''));
				echo '</table><br>';
			}
			return $include;
		} else {
			if (empty($path)) {
				if (self::$debug) {
					//$this->printRow('Request Path Trimmed', htmlspecialchars(rtrim($url, '/')));
					$this->printRow('Test Path', htmlspecialchars(rtrim($dir, '/')));
					$this->printRow('Success', var_export(rtrim($dir, '/') == rtrim($url, '/'), true));
					echo '</table><br>';
				}
				return rtrim($dir, '/') == rtrim($url, '/');
			}
			
			if ($end) {
				$url = rtrim($url, '/');
			} else {
				$url = rtrim(substr($url, 0, strlen($dir)), '/');
			}

			if (self::$debug) {
				//$this->printRow('Request Path Trimmed', htmlspecialchars(rtrim($url, '/')));
				$this->printRow('Test Path', htmlspecialchars(rtrim($dir, '/')));
				if ($cs) {
					$this->printRow('CS (Case Sensitive)', 'cs');
					$this->printRow('Success', var_export($url === rtrim($dir, '/'), true));
				} else {
					$this->printRow('Success', var_export(strcasecmp($url, rtrim($dir, '/')) === 0, true));
				}
				echo '</table><br>';
			}

			if ($cs) {
				if ($url === rtrim($dir, '/')) {
					self::$base = self::$base.$url.'/';
					return true;
				}
			} else {
				if (strcasecmp($url, rtrim($dir, '/')) === 0) {
					self::$base = self::$base.$url.'/';
					return true;
				}
			}
		}
	}

	// Executes the paths
	public function exe() {
		$this->paths = $this->sort($this->paths);
		array_push(self::$objects, $this);
		self::$objectsCalled++;
		self::$self = $this;

		foreach ($this->paths as $path) {
			if ($path[2] === null) {
				$cs = self::$cs;
			} else {
				$cs = $path[2];
			}

			self::$numOfChecks++;

			if ($this->checkPath($path[0], $_SERVER['REQUEST_URI'], $cs, $path[3])) {
				if (isset($path[4])) {
					array_push(self::$vars, $path[4]);
				}

				// is type redirect if path array size is > 5
				if (isset($path[5]) && $path[5] == 'redirect') {
					if (isset($type)) {
						header('location: '.$path[1], true, $path[6]);
					} else {
						header('location: '.$path[1]);
					}
					exit();
				} elseif (is_object($path[1])) {
					array_push(self::$successPaths, $path[0]);
					//self::$base = self::$base.$path[0];
					$path[1]->exe();
				} elseif (is_array($path[1])) {
					if (!self::$debug) {
						ob_clean();
						ob_start();
					}
					array_push(self::$successPaths, $path[0]);
					echo $path[1][0];
					exit();
				} else {
					if (!self::$debug) {
						ob_clean();
						ob_start();
					}
					array_push(self::$successPaths, $path[0]);
					include $path[1];

					if (self::$continue) {
						self::$continue = false;
					} else {
						exit();
					}
				}
			}
		}
		$this->error_404();
	}

	public static function echo($echo='') {
		return array($echo);
	}

	// Generic Errors
	public function response_code($error, $doc=null, $showNoError=false) {
		if (!self::$debug) {
			ob_clean();
		}

		http_response_code($error);
		$err = null;

		if ($doc != null) {
			require $doc;
		} elseif (isset($this->errors[$error])) {
			require $this->errors[$error];
		} elseif (isset(self::$defaultErrors[$error])) {
			require self::$defaultErrors[$error];
		} else {
			if (!$showNoError) {
				switch ($error) {
					case 404:
						$err = $this->errorTemplates[404];
						break;
					case 500:
						$err = $this->errorTemplates[500];
						break;
					case 403:
						$err = $this->errorTemplates[403];
						break;
					case 400:
						$err = $this->errorTemplates[400];
						break;
					case 401:
						$err = $this->errorTemplates[401];
						break;
					
					default:
						$err = "<!DOCTYPE html><html><head><title>URLS - Response Code ".$error."</title><meta name=\"viewport\" content=\"width=device-width, initial-scale=1\"></head><body><h1>Response Code ".$error."</h1><p>This page's status is HTTP code ".$error.".</p><hr><i>URLS Framework/".Self::VERSION." ".apache_get_version()." Server at ".$_SERVER['SERVER_NAME']." Port ".$_SERVER['SERVER_PORT']."</i></body>";
						break;
				}
			}
		}
		die($err);
	}

	// Errors
	public function error_404($doc=null, $showNoError=false) {
		if (!self::$debug) {
			ob_clean();
		}

		http_response_code(404);
		$err = null;

		if ($doc !== null) {
			$err = (require $doc);
		} elseif (isset($this->errors[404])) {
			$err = (require $this->errors[404]);
		} elseif (isset(self::$defaultErrors[404])) {
			$err = (require self::$defaultErrors[404]);
		} else {
			if (!$showNoError) {
				$err = $this->errorTemplates[404];
			}
		}
		die($err);
	}

	public function error_500($doc=null, $showNoError=false) {
		if (!self::$debug) {
			ob_clean();
		}

		http_response_code(500);
		$err = null;

		if ($doc != null) {
			$err = (require $doc);
		} elseif (isset($this->errors[500])) {
			$err = (require $this->errors[500]);
		} elseif (isset(self::$defaultErrors[500])) {
			$err = (require self::$defaultErrors[500]);
		} else {
			if (!$showNoError) {
				$err = $this->errorTemplates[500];
			}
		}
		die($err);
	}

	public function error_403($doc=null, $showNoError=false) {
		if (!self::$debug) {
			ob_clean();
		}

		http_response_code(403);
		$err = null;

		if ($doc != null) {
			$err = (require $doc);
		} elseif (isset($this->errors[403])) {
			$err = (require $this->errors[403]);
		} elseif (isset(self::$defaultErrors[403])) {
			$err = (require self::$defaultErrors[403]);
		} else {
			if (!$showNoError) {
				$err = $this->errorTemplates[403];
			}
		}
		die($err);
	}

	public function error_400($doc=null, $showNoError=false) {
		if (!self::$debug) {
			ob_clean();
		}

		http_response_code(400);
		$err = null;

		if ($doc != null) {
			$err = (require $doc);
		} elseif (isset($this->errors[400])) {
			$err = (require $this->errors[400]);
		} elseif (isset(self::$defaultErrors[400])) {
			$err = (require self::$defaultErrors[400]);
		} else {
			if (!$showNoError) {
				$err = $this->errorTemplates[400];
			}
		}
		die($err);
	}

	public function error_401($doc=null, $showNoError=false) {
		if (!self::$debug) {
			ob_clean();
		}

		http_response_code(401);
		$err = null;

		if ($doc != null) {
			$err = (require $doc);
		} elseif (isset($this->errors[401])) {
			$err = (require $this->errors[401]);
		} elseif (isset(self::$defaultErrors[401])) {
			$err = (require self::$defaultErrors[401]);
		} else {
			if (!$showNoError) {
				$err = $this->errorTemplates[401];
			}
		}
		die($err);
	}

	public function error($doc=null, $str=null, $template="other", $code=null) {
		if (!self::$debug) {
			ob_clean();
		}

		if (isset($code)) {
			http_response_code($code);
		}

		$err = null;

		if ($doc != null) {
			$err = (require $doc);
		} elseif ($str != null) {
			$err = $str;
		} else {
			if (!isset($template)) {
				$template = "other";
			}

			$err = $this->errorTemplates[$template];
		}
		die($err);
	}
}

include "update.php";
?>