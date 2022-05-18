<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

if (!$this->getData('token') || !$this->getData('id')) {
	$this->block('adminlte-yandex-metrika:get-token');
	return;
}

// week

$this->block('adminlte-yandex-metrika:week:process');

if ($this->getData('week')) {
	$this->block('adminlte-yandex-metrika:info-boxes');
}

// month and year

$this->block('adminlte-yandex-metrika:month:process');
$this->block('adminlte-yandex-metrika:year:process');

$this->block('adminlte-yandex-metrika:map');

if ($this->getData('month')) {
	$this->block('adminlte-yandex-metrika:month:data');
}
if ($this->getData('year')) {
	$this->block('adminlte-yandex-metrika:year:data');
}

//System::debug( $this->getData('metrics') );

?>