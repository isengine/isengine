<?php

namespace is\Install;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Local;

use is\Install\Installer;
use is\Install\Language;

$installer = Installer::getInstance();
$lang = Language::getInstance();

$langs = $lang -> get('langs');
$clang = $lang -> get('current');

if (System::typeIterable($langs)) : ?>

<div class="checkbox mb-3">
<?php
	$r = preg_replace('/(\?|\&)lang\=?\w*?(?=(\?|\&|$))/ui', '$3', $_SERVER['REQUEST_URI']);
	$r .= (empty(mb_strpos($r, '?')) ? '?' : '&') . 'lang=';
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