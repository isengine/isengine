<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

$view = View::getInstance();

?>
<footer class="footer">
	<div class="container">
		<div class="row">
			
			<div class="social flex">
				<a href="https://www.facebook.com/" target="_blank" class="item">
					<i class="icon fa fa-facebook" aria-hidden="true"></i>
				</a>
				<a href="https://www.instagram.com/" target="_blank" class="item">
					<i class="icon fa fa-instagram" aria-hidden="true"></i>
				</a>
				<a href="https://vk.com/" target="_blank" class="item">
					<i class="icon fa fa-vk" aria-hidden="true"></i>
				</a>
				<a href="https://telegram.org/" target="_blank" class="item">
					<i class="icon fa fa-paper-plane" aria-hidden="true"></i>
				</a>
				<a href="https://twitter.com/" target="_blank" class="item">
					<i class="icon fa fa-twitter" aria-hidden="true"></i>
				</a>
				<a href="https://www.youtube.com/channel/" target="_blank" class="item">
					<i class="icon fa fa-youtube" aria-hidden="true"></i>
				</a>
			</div>
			
			<div class="copyright">
				<p>
					<?= $view->get('lang|information:company'); ?>
				</p>
				<p>
					<?= $view->get('lang|agency:version'); ?>
				</p>
				<p>
					<a href="<?= $view->get('lang|agency:site'); ?>">
						<?= $view->get('lang|agency:name'); ?>
					</a>
				</p>
			</div>
			
		</div>
	</div>
</footer>

<?php $view->get('block')->launch('modal', 'default', null); ?>