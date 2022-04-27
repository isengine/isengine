<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

$pagename = $view -> get('vars|pagename');

?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $view -> get('block') -> launch('control-sidebar'); ?>
<?php $view -> get('block') -> launch('footer'); ?>

</div>
<!-- ./wrapper -->

<?php $view -> get('block') -> launch('scripts:' . $pagename); ?>
<?php $view -> get('block') -> launch('items:display', 'default', null); ?>

</body>
</html>