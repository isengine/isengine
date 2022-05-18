<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;

$view = View::getInstance();

?>
<form action="" method="get">
    <div class="input-group">
        <input name="search" type="text" class="form-control" placeholder="Поиск" aria-label="Search" aria-describedby="button-search"
        list="searchDatalist" id="exampleDataList">
        <datalist id="searchDatalist" class="bg-white">
            <option value="товар из топа 1">
            <option value="товар из топа 2">
            <option value="товар из топа 3">
            <option value="товар из топа 4">
            <option value="товар из топа 5">
        </datalist>
        <button class="btn btn-outline-secondary" type="submit" id="button-search">
            <i class="bi bi-search"></i>
        </button>
    </div>
</form>