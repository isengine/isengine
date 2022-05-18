<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Masters\View;

$view = View::getInstance();
$url = $view->get('state|url');
$page = $view->get('state|page');

?>
<div class="container-fluid fixed ab bg-white b-0 bt border-gray-2">
    <div class="row align-items-end justify-content-between flex-nowrap align-center sm-none">
        <?php
            Objects::each($this->getData(), function ($item, $key) use ($url, $page) {
                $item = Objects::createByIndex(
                    ['type', 'link', 'icon', 'page', 'title'],
                    $item
                );
                ?>
        <a
                <?php if ($item['type'] === 'menu') { ?>
            href="#offcanvasCatalog" data-bs-toggle="offcanvas" role="button" aria-controls="offcanvasCatalog"
                <?php } else { ?>
            href="<?= $item['link'] ? $item['link'] : $url . '#'; ?>"
                <?php } ?>
        class="col py-05 color-gray-8 color-second-hover<?= (!$page && !$key) || $page === $item['page'] ? ' active' : null; ?><?= $item['page'] ? ' ' . $item['page'] : null; ?>">
            <i class="<?= $item['icon']; ?> fs-2"></i>
            <p class="p-0 m-0"><?= $item['title']; ?></p>
            <span class="none"></span>
        </a>
            <?php }); ?>
    </div>
</div>