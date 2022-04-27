<?php

namespace is\Masters\Methods\Adminlte;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;

use is\Helpers\Datetimes;
use is\Helpers\Local;
use is\Helpers\Parser;
use is\Helpers\Paths;
use is\Helpers\Prepare;
use is\Helpers\Sessions;

use is\Components\Config;
use is\Components\Globals;
use is\Components\Session;

use is\Masters\Methods;

class Putitems extends Methods\Form {
	
	public function launch() {
		
		$path = $this -> getData('path');
		
		if (!$path || empty($_FILES)) {
			exit;
		}
		
		$real = DI . Paths::toReal($path) . DS;
		$url = '/' . Paths::toUrl($path) . '/';
		
		move_uploaded_file($_FILES['file']['tmp_name'], $real . $_FILES['file']['name']);
		
		$data = [
			'path' => $url,
			'filename' => $_FILES['file']['name'],
		];
		
		echo json_encode($data);
		
		/*
		
		$url = '/' . Paths::toUrl($path) . '/';
		
		$local = Local::search($real, [
			'merge' => true,
			'subfolders' => false
		]);
		
		$json = [];
		
		Objects::each($local, function($item) use (&$json, $url) {
			
			if ($item['type'] !== 'file') {
				return;
			}
			
			$json[] = [
				'path' => $url,
				'filename' => $item['name']
			];
			
			return $item;
			
		});
		
		$json = Parser::toJson($json, true);
		
		//System::debug($json);
		
		echo $json;
		*/
		exit;
		
	}
	
}

?>