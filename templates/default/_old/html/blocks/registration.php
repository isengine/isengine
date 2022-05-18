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

$lang = $view->get('vars')->get('modal');

?>

<form id="registration" class="form" action="\" method="post">
	<input type="hidden" name="query" value="registration">
	<input type="hidden" name="hash" value="<?= $defaultsRegistration['hash']; ?>">
	<input type="hidden" name="dataregistration[ref]" value="">
	
	<input
		type="text"
		name="dataregistration[email]"
		class="field"
		value="<?= htmlentities($defaultsRegistration['email']); ?>"
		placeholder="<?= $lang['signup']['email']; ?>"
		data-trigger="focus" data-toggle="popover" data-placement="top"
		data-content="<?= $lang['signup']['email_desc']; ?>"
	/>
	<?php if ( isset($errorsRegistration['email']) ) : ?>
	<label class="error">
		<?= htmlentities($lang['errors'][$errorsRegistration['email']]) . ' '; ?>
	</label>
	<?php endif; ?>
	
	<input
		type="text"
		name="dataregistration[phone]"
		class="field"
		value="<?= htmlentities($defaultsRegistration['phone']); ?>"
		placeholder="<?= $lang['signup']['phone']; ?>"
		data-trigger="focus" data-toggle="popover" data-placement="top"
		data-content="<?= $lang['signup']['phone_desc']; ?>"
	/>
	<?php if ( isset($errorsRegistration['phone']) ) : ?>
	<label class="error">
		<?= htmlentities($lang['errors'][$errorsRegistration['phone']]) . ' '; ?>
	</label>
	<?php endif; ?>
	
	<input
		type="password"
		name="dataregistration[password]"
		class="field"
		value="<?= htmlentities($defaultsRegistration['password']); ?>"
		placeholder="<?= $lang['signup']['password']; ?>"
		data-trigger="focus" data-toggle="popover" data-placement="top"
		data-content="<?= $lang['signup']['password_desc']; ?>"
	/>
	<input
		type="password"
		name="dataregistration[password_confirm]"
		class="field"
		placeholder="<?= $lang['signup']['password_confirm']; ?>"
		data-trigger="focus" data-toggle="popover" data-placement="top"
		data-content="<?= $lang['signup']['password_confirm_desc']; ?>"
	/>
	<?php if ( isset($errorsRegistration['password']) ) : ?>
	<label class="error">
		<?= htmlentities($lang['errors'][$errorsRegistration['password']]) . ' '; ?>
	</label>
	<?php endif; ?>
	
	<? /*
	<select
		name="dataregistration[plan]"
		class="field"
	>
		<option value=""><?= $lang['signup']['plan']; ?></option>
		<?php foreach ($plans as $planname => $plan) : ?>
			<option
				value="<?= htmlentities($plan) ?>"
				<?= isset($defaultsRegistration['plan'][$plan]) ? $defaultsRegistration['plan'][$plan] : "" ?>
			>
				<?= htmlentities($planname) ?>
			</option>
		<?php endforeach; ?>
	</select>
	*/ ?>
	<?php if ( isset($errorsRegistration['plan']) ) : ?>
	<label class="error">
		<?= htmlentities($lang['errors'][$errorsRegistration['plan']]) . ' '; ?>
	</label>
	<?php endif; ?>
	<? /*
	<a href="#" class="link"><?= $lang['signup']['plan_link']; ?></a>
	*/ ?>
	
	<label class="error">
		<?= htmlentities($lang['errors'][$errorsRegistration['verify']]) . ' '; ?>
		<?= htmlentities($lang['errors'][$errorsRegistration['ban']]) . ' '; ?>
	</label>
	
	<?php if ( isset($result['ban']) && $result['ban'] > 0 ) : ?>
		<p><img class="captcha" src="/<?= NAME_LIBRARIES; ?>/kcaptcha/?<?= session_name()?>=<?= session_id()?>"></p>
		<input type="text" name="dataregistration[captcha]">
		<label class="error"><?= htmlentities($lang['errors'][$errorsRegistration['captcha']]) . ' '; ?></label>
	<?php endif; ?>
	
	<div class="info">
		<?= $lang['signup']['description']; ?>
	</div>
	
	<button type="submit" class="submit"><?= $langActions['send']; ?></button>
</form>