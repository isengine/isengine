<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
      <div class="container-fluid">
        
		<h5 class="mb-2">Info Box</h5>
		<?php $view -> get('module') -> launch('data', 'adminlte-info-box'); ?>
        <h5 class="mt-4 mb-2">Info Box With <code>bg-*</code></h5>
		<?php $view -> get('module') -> launch('data', 'adminlte-info-box2'); ?>
        <h5 class="mb-2 mt-4">Small Box</h5>
		<?php $view -> get('module') -> launch('data', 'adminlte-info-box3'); ?>
        
        <h4 class="mb-2 mt-4">Cards</h4>
		<h5 class="mb-2">Abilities</h5>
		<?php $view -> get('module') -> launch('data', 'adminlte-cards'); ?>
		
        <h4 class="mt-4 mb-2">Direct Chat</h4>
		<?php $view -> get('block') -> launch('widgets:direct-chat'); ?>
		
        <h3 class="mt-4 mb-4">Social Widgets</h3>
		<?php $view -> get('block') -> launch('widgets:social-widgets'); ?>
		<?php $view -> get('block') -> launch('widgets:box-comment'); ?>
        
        <h5 class="mb-2">Card with Image Overlay</h5>
		<?php $view -> get('block') -> launch('widgets:card-image'); ?>
		
      </div>
      <!-- /.container-fluid -->