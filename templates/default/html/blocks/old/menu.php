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
<nav>
    <ul class="flex parts">
        <div class="flex left part">
            <li class="item logo">
                <a href="#" class="link">
                    <img src="https://raw.githubusercontent.com/isengine/docs/master/logo/mask-64.png" alt="<?= $view->get('lang|title'); ?>" title="<?= $view->get('lang|title'); ?>">
                </a>
            </li>
            <li class="item">
                <a href="#" class="link">
                    <?= $view->get('lang|menu:index'); ?>
                </a>
            </li>
            <li class="item">
                <a href="#info" class="link">
                    <?= $view->get('lang|menu:news'); ?>
                </a>
            </li>
            <li class="item">
                <a href="#news" class="link">
                    <?= $view->get('lang|menu:contacts'); ?>
                </a>
            </li>
        </div>
        <div class="flex right part">
            
            <?php if (isset($_COOKIE['UID'])) : ?>
                <li class="item enter">
                    <a href="/<?= PATH_PERSONAL ?>">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <?= ($_COOKIE['UN'] != '') ? $_COOKIE['UN'] : $langMenu['profile']; ?>
                    </a>
                </li>
                <li class="item logout">
                    <form action="\" method="post">
                        <input type="hidden" name="query" value="logout">
                        <input type="hidden" name="hash" value="<?= $hash; ?>">
                        <button class="link logout" type="submit">
                            <i class="fa fa-sign-out" aria-hidden="true"></i>
                            <?= $langMenu['exit'] ?>
                        </button>
                    </form>
                </li>
                
            <?php else : ?>
                <li class="item login">
                    <button href="#" class="link" data-toggle="modal" data-target="#modal">
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                        <?= $view->get('lang|common:signin') . ' / ' . $view->get('lang|common:register'); ?>
                    </button>
                </li>
                
            <?php endif; ?>
            
        </div>
    </ul>
</nav>
