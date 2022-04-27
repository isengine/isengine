<?php

namespace is\Masters\Modules\Isengine\Form;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;
use is\Helpers\Paths;
use is\Masters\View;

$view = View::getInstance();

?>
<hr>
<div class="h3 py-1">
	Оформление заказа
</div>
<?php
$this -> printForm();

$view -> get('display') -> addBuffer('
<script>

$("#form-order .item-store").each(function(i){
	let n = $(this).attr("name");
	let v = is.Helpers.Sessions.getSession("form-order:" + n);
	if (v || v === 0) {
		$(this).val(v);
	}
	//console.log("get", v, n);
});

$("#form-order .item-store").on("focusout", function(i){
	let v = $(this).val();
	let n = $(this).attr("name");
	if (v || v === 0) {
		is.Helpers.Sessions.setSession("form-order:" + n, v);
	} else {
		is.Helpers.Sessions.unSession("form-order:" + n);
	}
	//console.log("set", v, n);
});

</script>
');
?>