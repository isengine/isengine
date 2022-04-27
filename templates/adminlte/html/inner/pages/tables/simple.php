<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
			<?php $view -> get('block') -> launch('widgets:tables:simple:bordered-table'); ?>
			<?php $view -> get('block') -> launch('widgets:tables:simple:condensed-full-width-table'); ?>
          </div>
          <!-- /.col -->
          <div class="col-md-6">
			<?php $view -> get('block') -> launch('widgets:tables:simple:simple-full-width-table'); ?>
			<?php $view -> get('block') -> launch('widgets:tables:simple:striped-full-width-table'); ?>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
			<?php $view -> get('block') -> launch('widgets:tables:simple:responsive-hover-table'); ?>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
			<?php $view -> get('block') -> launch('widgets:tables:simple:fixed-header-table'); ?>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
			<?php $view -> get('block') -> launch('widgets:tables:simple:expandable-table'); ?>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
			<?php $view -> get('block') -> launch('widgets:tables:simple:expandable-table-tree'); ?>
          </div>
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->