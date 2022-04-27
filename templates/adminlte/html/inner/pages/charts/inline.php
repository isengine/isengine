<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
      <div class="container-fluid">
        <!-- row -->
        <div class="row">
          <div class="col-12">
			<?php $view -> get('block') -> launch('widgets:charts:inline:jquery-knob'); ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-12">
			<?php $view -> get('block') -> launch('widgets:charts:inline:jquery-knob-different-sizes'); ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

      </div>
      <!-- /.container-fluid -->