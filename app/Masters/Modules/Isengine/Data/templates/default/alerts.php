<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Prepare;
use is\Masters\View;

$this->iterate(function ($item, $key, $pos) {

    ?>

<section class="container-fluid<?= $pos === 'alone' || $pos === 'last' ? ' mb-05' : ' mb-0'; ?> <?= $item['class'] ? $item['class'] : 'bg-second'; ?> alert radius-0" id="alert-<?= $key; ?>" role="alert">
    <div class="sm-container">
        <div class="row">
            <div class="col">
                <?= $item['message']; ?>
                <?php
                if ($item['link']) {
                    $view = View::getInstance();
                    ?>
                <a href="<?= $item['link']; ?>" class="color-white">
                    <u><?= $view->get('lang|common:readmore'); ?></u>
                </a>
                <?php } ?>
            </div>
            <div class="col-auto">
                <button type="button" class="btn-close btn-close-white" id="alert-<?= $key; ?>-button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
    <?php if ($item['cookie']) { ?>
    <script>
        let button_<?= $key; ?> = document.getElementById("alert-<?= $key; ?>-button"); 
        button_<?= $key; ?>.onclick = function() {
            <?= $item['cookie']; ?>
            let block_<?= $key; ?> = document.getElementById("alert-<?= $key; ?>");
            block_<?= $key; ?>.remove();
        };
    </script>
    <?php } ?>
</section>

    <?php
}, null, null);

?>