<?php

	$r = $_SERVER['REQUEST_URI'];
	$rp = mb_strpos($r, '?');
	if (!empty($rp)) {
		$r = mb_substr($r, 0, $rp);
	}
	
	$array = "";
	
	if (empty($get)) {
	  
		$array[] = 'install';
	  $array[] = 'update';
	  
	} else {
		
		if ($site !== true) {
	    $array[] = 'refresh';
		}
		
		if (!isset($get['unlink']) && !isset($get['unpack']) && !isset($get['install'])) {
		  $array[] = 'unpack';
		}
		
		if (!isset($get['unlink'])) {
		  $array[] = 'unlink';
		}
		
	}
  
	if ($site === true) {
		echo str_replace(
			['{a}', '{/a}'],
			['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/" class="' . $lang['template']['a'] . '">', '</a>'],
			$lang['link']['site']
		);
	}  
  
	foreach ($array as $item) {
		echo str_replace(
			['{a}', '{/a}'],
			['<a href="' . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . '?' . $item . '&lang=' . $currlang . '" class="' . $lang['template']['a'] . '">', '</a>'],
				$lang['link'][$item]
		);
	}
  
	unset($rp, $r);
	
?>