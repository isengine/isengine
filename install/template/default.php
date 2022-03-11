<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;

$installer = Installer::getInstance();

$installer -> buffer('start');

?>
<!DOCTYPE HTML>
<html lang="<?= $installer -> lang -> get('current'); ?>">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?= $installer -> lang -> get('template:title'); ?></title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
	<?php $installer -> template('style'); ?>
	
</head>

<body class="text-center">
<div class="form-signin">
	
	<img class="mb-4" src="https://raw.githubusercontent.com/isengine/docs/master/logo/logo.svg" alt="" width="100%" height="144">
	<h1 class="h3 font-weight-normal"><?= $installer -> lang -> get('template:title'); ?></h1>
	
	<div class="checkbox my-4">
		<?php
			$installer -> template('notice');
		?>
	</div>
	<div class="checkbox mb-4">
		<?php
			$installer -> template('buttons');
		?>
	</div>
	
	<?php $installer -> template('langs'); ?>
	
	<button type="button" class="btn btn-link" data-toggle="modal" data-target="#licenseModal">
		<?= $installer -> lang -> get('template:license') . $installer -> get('system:license'); ?>
	</button>
	
	<p class="my-3 text-muted">
		<?= $installer -> lang -> get('template:version') . $installer -> get('system:version'); ?><br>
		(<?= $installer -> lang -> get('template:core') . $installer -> get('core:version'); ?>, <?= $installer -> lang -> get('template:framework') . $installer -> get('framework:version'); ?>)<br>
		© 2017-<?= date('Y'); ?>
	</p>
	
</div>

<!-- Modal -->
<div class="modal fade" id="licenseModal" tabindex="-1" aria-labelledby="licenseModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="licenseModalLabel">
					<?= $installer -> lang -> get('template:license') . $installer -> get('system:license'); ?>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body text-left">
				<?= $installer -> get('license'); ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

</body>
</html>
<?php

$installer -> buffer('set', 'a9');
$installer -> buffer('end');

?>