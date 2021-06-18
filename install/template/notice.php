<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;

$installer = Installer::getInstance();

if (isset($_GET['unlink'])) {
	$installer -> status -> addData($installer -> lang -> get('status:unlink'));
}

$status = $installer -> status -> getData();
if (System::typeIterable($status)) {

?>
	<div class="alert alert-warning" role="alert">
		<?php
			$installer -> buffer('set', 'a1');
			$installer -> buffer('end');
			$installer -> buffer('start');
			Objects::each($status, function($item){
				echo $item . '<br>';
			});
			$installer -> buffer('set', 'a3');
			$installer -> buffer('end');
			$installer -> buffer('start');
			echo '<hr>' . $installer -> lang -> get('template:notice');
			$installer -> buffer('set', 'a6');
			$installer -> buffer('end');
			$installer -> buffer('start');
		?>
	</div>
<?php

} elseif (!$_GET) {
	echo $installer -> lang -> get('template:install');
	echo '<div class="p-3 m-4 bg-info text-white">' . $installer -> lang -> get('template:notice') . '</div>';
}

?>