<?php

namespace is\Masters\Modules\Isengine\Data;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Prepare;

$map = $this->getData();

if (!System::typeOf($map, 'iterable')) {
    return;
}

// рекурсивная функция для вложенного многоуровневого меню

if (!function_exists('is\Masters\Modules\Isengine\Data\fnDropdownMenu')) {
    function fnDropdownMenu($map, $parents = [])
    {
        Objects::each($map, function ($data) use (&$parents) {

            if (!$data) {
                return;
            }

            $current = Strings::join($parents, '/');
            $key = Prepare::urlencode($data['title'], '/');
            $link = $data['link'] ? $data['link'] : '/' . ($current ? $current . '/' : null) . $key . '/';
            $name = $data['title'];
            ?>
    <li class="nav-item dropdown">
        <div class="btn-group width-100">
            <a href="<?= $link; ?>" class="btn align-left"><?= $name; ?></a>
            <?php
            if ($data['data']) {
                $parents[] = $key;
                ?>
            <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside">
                <span class="visually-hidden">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu color-black">
                <?php fnDropdownMenu($data['data'], $parents); ?>
            </ul>
                <?php
                $parents = Objects::unlast($parents);
            }
            ?>
        </div>
    </li>
            <?php
        }, true);
    }
}

fnDropdownMenu($map, ['catalog']);

?>
