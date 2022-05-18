<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

?>
<ul>
	<?php Objects::each($this->getData(), function($item) { ?>
		<li>
			<a href="<?= $item['link']; ?>">
				<i class="<?= $item['icon']; ?>"></i>
				<?= $item['title']; ?>
			</a>
		</li>
	<?php }); ?>
</ul>