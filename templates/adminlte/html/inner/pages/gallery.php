<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
			<?php $view->get('block')->launch('widgets:gallery:filterizr'); ?>
          </div>
          <div class="col-12">
			<?php $view->get('block')->launch('widgets:gallery:ekko-lightbox'); ?>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->