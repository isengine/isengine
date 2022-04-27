<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view -> get('display') -> addBuffer('
<script>
var toastElList = [].slice.call(document.querySelectorAll(".toast"))
var toastList = toastElList.map(function(toastEl) {
	return new bootstrap.Toast(toastEl, {
		"animation" : true,
		"autohide" : false
	}).show()
});
</script>
');

?>