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

<form id="authorisation" class="form" action="/" method="post">
	<input type="hidden" name="query" value="login">
	<input type="hidden" name="hash" value="<?= $defaultsLogin['hash']; ?>">
	<input
		type="text"
		name="datalogin[login]"
		data-name="login"
		class="field"
		value="<?= htmlentities($defaultsLogin['login']); ?>"
		placeholder="<?= $lang['signin']['login']; ?>"
	/>
	<input
		type="password"
		name="datalogin[password]"
		data-name="password"
		class="field"
		value="<?= htmlentities($defaultsLogin['password']); ?>"
		placeholder="<?= $lang['signin']['password']; ?>"
	/>
	
	<label class="error">
		<?= htmlentities($lang['errors'][$errorsLogin['login']]) . ' '; ?>
		<?= htmlentities($lang['errors'][$errorsLogin['password']]) . ' '; ?>
		<?= htmlentities($lang['errors'][$errorsLogin['verify']]) . ' '; ?>
		<?= htmlentities($lang['errors'][$errorsLogin['ban']]) . ' '; ?>
	</label>
	
	<?php if ( isset($result['ban']) && $result['ban'] > 0 ) : ?>
		<p><img class="captcha" src="/<?= NAME_LIBRARIES; ?>/kcaptcha/?<?= session_name(); ?>=<?= session_id(); ?>"></p>
		<input type="text" name="datalogin[captcha]">
		<label class="error"><?= htmlentities($lang['errors'][$errorsLogin['captcha']]) . ' '; ?></label>
	<?php endif; ?>
	
	<button type="submit" class="submit"><?= $langActions['enter']; ?></button>
</form>