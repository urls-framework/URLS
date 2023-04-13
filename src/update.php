<?php
/*
Copyright 2023 Micah Baumann
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

function urls_update($deleteFiles=false) {
	if (isset(Urls::$base)) {
		// Delete all files in this directory
		$files = glob(basename(__DIR__).'/*');
		foreach($files as $file) {
			if(is_file($file)) {
				unlink($file);
			}
		}

		// Download the update files
		$updateFilePath = basename(__DIR__).'/UrlsUpdate.zip';
		file_put_contents($updateFilePath, file_get_contents('https://raw.githubusercontent.com/urls-framework/URLS/main/update_files/UrlsUpdate.zip?'.mt_rand()));

		// Extract the zip folder
		$zip = new ZipArchive;
		$res = $zip->open($updateFilePath, PATHINFO_DIRNAME);
		if ($res === true) {
			$zip->extractTo(basename(__DIR__));
			$zip->close();
		} else {
			return false;
		}

		// Delete the update files
		if ($deleteFiles === true) {
			unlink($updateFilePath);
		}

		return true;
	} else {
		return false;
	}
}

if (Urls::$autoUpdate === true) {
	if ($version = @fopen("https://raw.githubusercontent.com/urls-framework/URLS/main/src/version.txt?".mt_rand(), "r")) {
		$versionRaw = fread($version, 10);
		fclose($version);

		if (version_compare($versionRaw, Urls::VERSION, '>')) {
			urls_update();
		}
	}
}

?>