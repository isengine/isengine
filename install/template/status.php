<?php

if (!empty($status)) {
	echo '<hr>';
	if (is_array($status)) {
		foreach ($status as $item) {
			echo $item . '<br>';
		}
	} else {
		echo print_r($status, 1);
	}
	echo '<hr>';
}

?>