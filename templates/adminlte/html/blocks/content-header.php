<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

$pagename = $view->get('lang|this:pagenames')[$view->get('vars|pagename')];

?>
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $pagename; ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/adminlte/"><?= $view->get('lang|this:pagenames:home'); ?></a></li>
              <!--<li class="breadcrumb-item"><a href="/adminlte/pages/">Pages</a></li>-->
              <li class="breadcrumb-item active"><?= $pagename; ?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->