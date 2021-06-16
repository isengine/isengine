	</div>
	
	<?php if (!empty($langs) && is_array($langs)) : ?>
	<div class="checkbox mb-3">
	<?php
		$r = $_SERVER['REQUEST_URI'];
		$r = preg_replace('/(\?|\&)lang\=?\w*?(?=(\?|\&|$))/ui', '$3', $r);
		$r .= (empty(mb_strpos($r, '?')) ? '?' : '&') . 'lang=';
		foreach ($langs as $item) :
			if ($item === $currlang) :
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
	
	<p class="mt-5 mb-3 text-muted">
		<?php
			if (defined('isENGINE')) {
				echo $lang['template']['version'] . isENGINE . '<br>';
			}
		?>
		© 2017-<?= date('Y'); ?>
	</p>
</div>

</body>
</html>