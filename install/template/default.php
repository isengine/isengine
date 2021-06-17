<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;
use is\Install\Language;

$installer = Installer::getInstance();
$lang = Language::getInstance();

?>
<!DOCTYPE HTML>
<html lang="<?= $lang -> get('current'); ?>">
<head>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<title><?= $lang -> get('template:title'); ?></title>
	
	<!-- Bootstrap core CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	
	<?php $installer -> template('style'); ?>
	
</head>

<body class="text-center">
<div class="form-signin">
	
	<img class="mb-4" src="<?php $installer -> template('logo'); ?>" alt="" width="144" height="144">
	<h1 class="h3 mb-3 font-weight-normal"><?= $lang -> get('template:title'); ?></h1>
	
	<div class="checkbox mb-3">
	<?php
		$installer -> template('status');
		$installer -> template('buttons');
		if (!empty($status)) {
	?>
    <div class="alert alert-warning" role="alert">
	    <?= $lang -> get('template:notice'); ?>
    </div>
  <?php
		}
	?>
	</div>
	
	<?php $installer -> template('langs'); ?>
	
  <button type="button" class="btn btn-link" data-toggle="modal" data-target="#licenseModal">
		<?= $lang -> get('template:license') . $installer -> get('system:license'); ?>
  </button>
	
	<p class="mt-5 mb-3 text-muted">
		<?= $lang -> get('template:version') . $installer -> get('system:version'); ?><br>
		(<?= $lang -> get('template:core') . $installer -> get('core:version'); ?>, <?= $lang -> get('template:framework') . $installer -> get('framework:version'); ?>)<br>
		© 2017-<?= date('Y'); ?>
	</p>
	
</div>

<!-- Modal -->
<div class="modal fade" id="licenseModal" tabindex="-1" aria-labelledby="licenseModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="licenseModalLabel">
        	<?= $lang -> get('template:license') . $installer -> get('system:license'); ?>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
