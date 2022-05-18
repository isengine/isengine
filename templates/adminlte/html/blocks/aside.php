<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
<?php $view->get('block')->launch('side:logo'); ?>
    <!-- Sidebar -->
    <div class="sidebar">
<?php
$view->get('block')->launch('side:user-panel');
$view->get('block')->launch('side:search');
$view->get('block')->launch('side:nav');
?>
    </div>
    <!-- /.sidebar -->
  </aside>