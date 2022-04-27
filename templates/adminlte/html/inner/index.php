<?php

namespace is;
use is\Masters\View;

$view = View::getInstance();

?>
<div class="container-fluid">
	<?php $view -> get('module') -> launch('data', 'adminlte-yandex-metrika', null, 43200); ?>
</div>
