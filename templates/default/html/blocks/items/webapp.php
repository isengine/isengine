<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Sessions;
use is\Helpers\Parser;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

$webapp = $view -> get('state|settings:webapp');

if (!System::typeIterable($webapp)) {
    return;
}
?>

<!-- Web Application -->
<?php
if (System::set($webapp['msapplication'])) {
?>
<meta name="msapplication-tooltip" content="<?= $view -> get('lang|title') . ' ' . $view -> get('state|site'); ?>" />
<meta name="msapplication-starturl" content="<?= $view -> get('state|domain'); ?>" />
<?php
	if ($webapp['msapplication'] === true) {
?>
<meta name="msapplication-TileColor" content="<?= $webapp['color']; ?>" />
<?php
		$icons = $view -> get('icon') -> getData();
		$path = '/' . $icons['settings']['path'] . '/';
		$print = null;
		
		$item = [
			'name' => $icons['msapplication']['name'],
			'metaname' => null,
			'size' => null,
			'height' => null
		];
		
		if (System::typeIterable($icons['msapplication']['sizes'])) {
		foreach ($icons['msapplication']['sizes'] as $i) {
			
			//$item['size'] = dataParse($i, true);
			$item['size'] = Parser::fromString($i);
			
			if (empty($item['size'][1])) {
				$item['size'][1] = $item['size'][0];
			}
			
			
			if ($item['size'][0] == '144') {
				$item['metaname'] = 'TileImage';
			} elseif ($item['size'][0] !== $item['size'][1]) {
				$item['metaname'] = 'wide' . $item['size'][0] . 'x' . $item['size'][1] . 'logo';
			} else {
				$item['metaname'] = 'square' . $item['size'][0] . 'x' . $item['size'][1] . 'logo';
			}
			
			$print .= '<meta name="msapplication-' . $item['metaname'] . '" content="' . $path . $item['name'] . '-' . $item['size'][0] . 'x' . $item['size'][1] . '.png">';
			
		}
		}
		
		echo $print;
		
		unset($i, $item, $print, $path, $icons);
		
	} else {
?>
<meta name="msapplication-config" content="<?= $view -> get('state|domain'); ?>ieconfig.xml" />
<?php
	}
}
if ($webapp['apple']) {
?>
<meta name="apple-mobile-web-app-title" content="<?= $view -> get('lang|title'); ?>">
<meta name="apple-mobile-web-app-capable" content="yes">
<?php
}
?>
<meta name="application-name" content="<?= $view -> get('lang|title'); ?>">
<meta name="theme-color" content="<?= $webapp['color']; ?>" />
<link rel="manifest" href="<?= $view -> get('state|domain'); ?>manifest.json<?php
if ($webapp['settings']) {
	echo '?template=' . $view -> get('state|template') . '&lang=' . $view -> get('state|lang');
};
?>">
<?php
if (!empty($webapp['serviceworker'])) {
	if ($webapp['serviceworker'] === true) {
?>
<script type="module">
/*
 This code uses the pwa-update web component https://github.com/pwa-builder/pwa-update to register your service worker,
 tell the user when there is an update available and let the user know when your PWA is ready to use offline.
*/
import 'https://cdn.jsdelivr.net/npm/@pwabuilder/pwaupdate';
const el = document.createElement('pwa-update');
document.body.appendChild(el);
<?php
	} else {
?>
<script>
if ("serviceWorker" in navigator) {
	self.addEventListener("load", async () => {
		const container = navigator.serviceWorker;
		if (container.controller === null) {
			const reg = await container.register("/<?= !$webapp['serviceworker']['path'] ? $webapp['serviceworker']['name'] : 'serviceworker.js'; ?>");
		}
	});
}
<?php /* ?>
<script type="text/javascript">
if ('serviceWorker' in navigator) {
  window.addEventListener('load', function() {  
    navigator.serviceWorker.register('/<?= !$webapp['custompath'] ? $webapp['serviceworker'] : 'serviceworker.script'; ?>').then(
      function(registration) {
        // Registration was successful
        console.log('ServiceWorker registration successful with scope: ', registration.scope); },
      function(err) {
        // registration failed
        console.log('ServiceWorker registration failed: ', err);
      });
  });
}
<?php */ ?>
<?php
	}
?>
</script>
<?php
}
unset($webapp);
?>