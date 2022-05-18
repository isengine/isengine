<?php

namespace is\Masters\Modules\Isengine\Breadcrumbs;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Components\Dom;
use is\Components\Router;
use is\Masters\View;

$view = View::getInstance();
$router = Router::getInstance();

$instance = $this->get('instance');
$sets = &$this->settings;

$position = null;
$count = null;

// template

$container = System::set($this->eget('container'));
$separator = System::set($this->eget('separator'));

if ($container) {
    $this->eget('container')->addCustom('itemscope', '');
    $this->eget('container')->addCustom('itemtype', 'http://schema.org/BreadcrumbList');
}

if ($separator) {
    $this->eget('separator')->addContent($sets['separator-symbol']);
}

$this->eget('item')->addCustom('itemprop', 'itemListElement');
$this->eget('item')->addCustom('itemscope', '');
$this->eget('item')->addCustom('itemtype', 'http://schema.org/ListItem');

$this->eget('link')->addCustom('itemprop', 'item');

// open

if ($container) {
    $this->eget('container')->open(true);
}

// home

if ($sets['index']) {
    $count++;
    $c = null;

    if ($sets['classes']['index']) {
        $c = $this->eget('item')->classes;
        $this->eget('item')->addClass($sets['classes']['index']);
    }

    $this->eget('item')->open(true);
    if (!$sets['index-active']) {
        $this->eget('link')->addTag('span');
    } else {
        $this->eget('link')->addLink('/');
    }
    $content = '<span>' . $view->get('lang|nav:index') . '</span><meta itemprop="position" content="' . $count . '">';
    $this->eget('link')->addContent($content);

    $this->eget('link')->open(true);
    $this->eget('link')->content(true);
    if ($separator) {
        $this->eget('separator')->print();
    }
    $this->eget('link')->close(true);

    $this->eget('item')->close(true);

    if ($c) {
        $this->eget('item')->setClass($c);
    }

    unset($c);
}

// other

if (System::typeIterable($this->route)) {
    $last = Objects::last($this->route, 'value');
    $this->route = Objects::unlast($this->route);
}

if (System::typeIterable($this->route)) {
    foreach ($this->route as $item) {
        $count++;
        $position .= ($position ? ':' : null) . $item;
        $link = $router->structure->getDataByName($position)['link'];
        $lang = $view->get('lang|nav')[$position ? $position : 'index'];
        $content = '<span>' . ($lang ? $lang : $item) . '</span><meta itemprop="position" content="' . $count . '">';

        $this->eget('item')->open(true);

        $this->eget('link')->addTag('a');
        $this->eget('link')->addLink($link ? $link : '#');
        $this->eget('link')->addContent($content);

        $this->eget('link')->open(true);
        $this->eget('link')->content(true);
        if ($separator) {
            $this->eget('separator')->print();
        }
        $this->eget('link')->close(true);

        $this->eget('item')->close(true);
    }
    unset($key, $item);
}

// last

if ($last && $sets['last-item']) {
    $count++;
    $position .= ($position ? ':' : null) . $last;

    if ($router->content['name']) {
        $p = Strings::join($router->content['parents'], '/');
        $link = '/' . ($p ? $p . '/' : null) . $router->content['link'] . '/';
    } else {
        $link = $router->structure->getDataByName($position)['link'];
    }

    //$pos = $position ? $position : 'index';
    //$nav = $view->get('lang|nav');
    $lang = $view->get('lang|nav:' . ($position ? $position : 'index'));
    //$lang = isset($view->get('lang|nav')[$position ? $position : 'index'];
    $content = '<span>' . ($lang ? $lang : $last) . '</span><meta itemprop="position" content="' . $count . '">';

    if ($sets['classes']['last-item']) {
        $this->eget('item')->addClass($sets['classes']['last-item']);
    }

    $this->eget('item')->addAria('current', 'page');

    $this->eget('item')->open(true);

    if (!$sets['last-item-active']) {
        $this->eget('link')->addTag('span');
    } else {
        $this->eget('link')->addLink($link ? $link : '#');
    }

    if ($sets['classes']['last-link']) {
        $this->eget('link')->addClass($sets['classes']['last-link']);
    }

    $this->eget('link')->addContent($content);

    $this->eget('link')->open(true);
    $this->eget('link')->content(true);
    $this->eget('link')->close(true);

    $this->eget('item')->close(true);
}

// close

if ($container) {
    $this->eget('container')->close(true);
}
