<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

$view -> get('block') -> launch('modal_lang', 'default', null);

$lang = $view -> get('vars') -> get('modal');

?>

<!-- Modal -->
<div id="modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			
			<!-- Nav tabs -->
			<ul class="nav nav-tabs nav-justified" role="tablist">
				<li class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab"><?= $lang['signin']['title']; ?></a></li>
				<li><a href="#registration" aria-controls="registration" role="tab" data-toggle="tab"><?= $lang['signup']['title']; ?></a></li>
				<li><a href="#" data-dismiss="modal">&times;</a></li>
			</ul>
			
			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="login">
					<?php
						$view -> get('block') -> launch('login_script', 'default', null);
						$view -> get('block') -> launch('login', 'default', null);
					?>
				</div>
				
				<div role="tabpanel" class="tab-pane" id="registration">
					<?php
						$view -> get('block') -> launch('registration_script', 'default', null);
						$view -> get('block') -> launch('registration', 'default', null);
					?>
				</div>
			</div>
			
		</div>

	</div>
</div>

<?php if ( isset($_POST['query']) && ($_POST['query'] == 'login' || $_POST['query'] == 'registration') ) : ?>
<script>
$(function(){
	$('#modal').modal();
	$('#modal a[href="#<?= $_POST['query']; ?>"]').tab('show'); 
});
</script>
<?php endif; ?>