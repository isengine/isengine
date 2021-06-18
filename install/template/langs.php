<?php

namespace is\Install;

use is\Helpers\System;
use is\Install\Installer;

$installer = Installer::getInstance();

$langs = $installer -> lang -> get('langs');
$clang = $installer -> lang -> get('current');

if (System::typeIterable($langs)) :
?>

<div class="checkbox mb-3">
<?php
	$r = preg_replace('/(\?|\&)lang\=?\w*?(?=(\?|\&|$))/ui', '$3', $_SERVER['REQUEST_URI']);
	$r .= (!mb_strpos($r, '?') ? '?' : '&') . 'lang=';
	foreach ($langs as $item) :
		if ($item === $clang) :
?>
	<span class="btn btn-primary btn-sm active"><?= $item; ?></span>
<?php
		else :
?>
	<a href="<?= $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $r . $item; ?>" class="btn btn-primary btn-sm"><?= $item; ?></a>
<?php
		endif;
	endforeach;
	unset($item);
?>
</div>

<?php endif; ?>