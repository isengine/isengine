<?php

namespace is\Masters\Modules\Isengine\Content;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$map = $this->getData()->map->count;

if (System::typeOf($map, 'iterable')) {
    $map = Objects::unfirst($map);
}

if (!System::typeOf($map, 'iterable')) {
    return;
}

?>
<div class="row">
    <?php
        Objects::each($map, function ($name, $item) {

            if (!$name) {
                return;
            }

            $link = Strings::replace($item, ':', '/');
            $name = Strings::after($item, ':', null, true);

            $image = '{img|/content/groups/' . $link . '.jpg:/content/groups/default.jpg:lazyload w-100 align-image-contain radius-1:' . $name . '}';
            $this->tvars($image);

            ?>
        <div class="col-6 sm-col-4 md-col-3 align-center mb-2">
            <a href="/<?= $link ?>/" class="block m-05">
                <div class="block border radius-1 mt-1">
                    <?= $image; ?>
                </div>
            </a>
            <a href="/<?= $link ?>/" class="btn bg-theme">
                <div class="">
                    <?= $name; ?>
                </div>
            </a>
        </div>
            <?php
        });
        ?>
</div>
