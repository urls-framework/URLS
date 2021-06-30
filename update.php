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

function urls_update() {
	if (isset($GLOBALS['BASE_URL'])/* && isset($GLOBALS['URLS_SETTINGS'])*/) {
		if ($urls = @fopen('https://raw.githubusercontent.com/urls-framework/URLS/main/src/urls.php?'.mt_rand(), 'r')) { 
			file_put_contents(basename(__DIR__).'/urls.php', $urls);
			fclose($urls);
		} else {
			return false;
		}

		if ($update = @fopen('https://raw.githubusercontent.com/urls-framework/URLS/main/src/update.php?'.mt_rand(), 'r')) { 
			file_put_contents(basename(__DIR__).'/update.php', $update);
			fclose($update);
		} else {
			return false;
		}

		if ($licence = @fopen('https://raw.githubusercontent.com/urls-framework/URLS/main/LICENSE?'.mt_rand(), 'r')) { 
			file_put_contents(basename(__DIR__).'/LICENSE', $licence);
			fclose($licence);
		} else {
			return false;
		}
		return true;
	} else {
		return false;
	}
}


?>
