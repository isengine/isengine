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

use is\Masters\Database;
use is\Masters\Methods;

class Editor extends Methods\Form {
	
	public function launch() {
		
		$data = $this->getData();
		
		$names = ['ctime', 'mtime', 'dtime'];
		
		Objects::each($names, function($item) use (&$data) {
			
			$item = &$data[$item];
			
			if (!$item) {
				return;
			}
			
			$item = Datetimes::convert(
				$item,
				'{day}.{month}.{year} {hour}:{min}:{sec}',
				'{abs}'
			);
			
		});
		
		//System::debug($this);
		//System::debug($data);
		
		$db = Database::getInstance();
		$db->clear();
		
		$db->query('write');
		$db->collection($data['collection']);
		$db->driver->setData($data);
		$db->launch();
		
		$result = $db->driver->success();
		$error = $db->driver->getError();
		
		$db->clear();
		unset($db);
		
		if ($result) {
			$path = '/adminlte/editor/?collection=' . $data['collection'] . '&parents=' . Strings::join($data['parents'], ':') . '&name=' . Strings::join($data['name'], ':');
			$this->reload($fields);
		}
		
		System::debug($error);
		exit;
		
	}
	
}

?>