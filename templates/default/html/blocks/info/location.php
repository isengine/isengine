<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

$view->get('module')->launch('map', 'default:location');

?>
<div class="bg-none align-center border-theme color-theme" id="mapLocation">
    <button class="btn px-0" data-bs-toggle="modal" href="#mapModal" role="button">
        <i class="bi bi-geo-alt-fill icon color-second"></i>
        <span class="map-location pl-025 align-center">Укажите адрес доставки</span>
    </button>
</div>
