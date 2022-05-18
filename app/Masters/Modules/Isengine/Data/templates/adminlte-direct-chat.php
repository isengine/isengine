<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;

$classes = $this->getData('classes');
$user = $this->getData('user');
$contacts = $this->getData('contacts');
$chat = $this->getData('chat');

?>
<div class="card direct-chat <?= $classes['common']; ?>">
	
	<div class="card-header">
		<h3 class="card-title">Direct Chat</h3>
		<div class="card-tools">
			<span title="3 New Messages" class="badge <?= $classes['badge']; ?>">3</span>
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
			<button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
				<i class="fas fa-comments"></i>
			</button>
			<button type="button" class="btn btn-tool" data-card-widget="remove">
				<i class="fas fa-times"></i>
			</button>
		</div>
	</div>
	
	<div class="card-body">
		<div class="direct-chat-messages">
		<?php
			Objects::each($chat, function($item) use (&$user, &$contacts){
				$id = $item['id'];
				$name = $id ? $contacts['name'] : $user['name'];
		?>
			<div class="direct-chat-msg<?= $id ? '' : ' right'; ?>">
				<div class="direct-chat-infos clearfix">
					<span class="direct-chat-name float-<?= $id ? 'left' : 'right'; ?>"><?= $name; ?></span>
					<span class="direct-chat-timestamp float-<?= $id ? 'right' : 'left'; ?>"><?= $item['timestamp']; ?></span>
				</div>
				<img class="direct-chat-img" src="/dist/img/user<?= $id; ?>-128x128.jpg" alt="message user image">
				<div class="direct-chat-text">
					<?= $item['message']; ?>
				</div>
			</div>
		<?php }); ?>
		</div>
		
		<div class="direct-chat-contacts">
			<ul class="contacts-list">
			<?php Objects::each($contacts, function($item, $key){ ?>
				<li>
					<a href="#">
						<img class="contacts-list-img" src="/dist/img/user<?= $key; ?>-128x128.jpg" alt="User Avatar">
						<div class="contacts-list-info">
							<span class="contacts-list-name">
								<?= $item['name']; ?>
								<small class="contacts-list-date float-right"><?= $item['data']; ?></small>
							</span>
							<span class="contacts-list-msg"><?= $item['message']; ?></span>
						</div>
					</a>
				</li>
			<?php }); ?>
			</ul>
		</div>
	</div>
	
	<div class="card-footer">
		<form action="#" method="post">
			<div class="input-group">
				<input type="text" name="message" placeholder="Type Message ..." class="form-control">
				<span class="input-group-append">
					<button type="button" class="btn <?= $classes['button']; ?>">Send</button>
				</span>
			</div>
		</form>
	</div>
	
</div>