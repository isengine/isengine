<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

?>
<form class="contact-form-box" id="contact-form">
	<div class="row">
		<?php Objects::each($this -> getData(), function($item) { ?>
		<div class="form-group <?= $item['class']; ?>">
			<?php if ($item['type'] === 'select') { ?>
				<select class="select2" name="<?= $item['name']; ?>" data-error="<?= $item['error']; ?>"<?= $item['required'] ? ' required' : null; ?>>
					<option value=""><?= $item['title']; ?></option>
					<?php Objects::each($item['options'], function($i, $k) { ?>
						<option value="<?= $k; ?>"><?= $i; ?></option>
					<?php }); ?>
				</select>
			<?php } elseif ($item['type'] === 'button') { ?>
				<button class="item-btn"><?= $item['title']; ?></button>
			<?php } elseif ($item['type'] === 'textarea') { ?>
				<textarea placeholder="<?= $item['title']; ?>" class="textarea form-control" name="<?= $item['name']; ?>" id="form-<?= $item['name']; ?>" rows="<?= $item['rows']; ?>" cols="<?= $item['cols']; ?>" data-error="<?= $item['error']; ?>"<?= $item['required'] ? ' required' : null; ?>></textarea>
			<?php } else { ?>
				<input type="<?= $item['type']; ?>" placeholder="<?= $item['title']; ?>" class="form-control" name="<?= $item['name']; ?>" id="form-<?= $item['name']; ?>" data-error="<?= $item['error']; ?>"<?= $item['required'] ? ' required' : null; ?>>
			<?php } ?>
			<?php if ($item['type'] !== 'button') { ?>
				<div class="help-block with-errors"></div>
			<?php } ?>
		</div>
		<?php }); ?>
	</div>
	<div class="form-response"></div>
</form>