<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
			<?php $view->get('block')->launch('widgets:charts:chartjs:area-chart'); ?>
			<?php $view->get('block')->launch('widgets:charts:chartjs:donut-chart'); ?>
			<?php $view->get('block')->launch('widgets:charts:chartjs:pie-chart'); ?>
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
			<?php $view->get('block')->launch('widgets:charts:chartjs:line-chart'); ?>
			<?php $view->get('block')->launch('widgets:charts:chartjs:bar-chart'); ?>
			<?php $view->get('block')->launch('widgets:charts:chartjs:stacked-bar-chart'); ?>
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->