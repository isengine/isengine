<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Local;
use is\Helpers\Prepare;
use is\Masters\View;

$view = View::getInstance();

$file = DR . 'database' . DS . 'content' . DS . 'catalog.list.ini';
//System::debug($file);

$content = Local::readFileArray($file);
//System::debug($content);

Objects::each($content, function ($item) {

    $item = Prepare::trim($item);

    if (
        !$item ||
        $item[0] === '!'
    ) {
        return;
    }

    $item = Strings::split($item, ':');
    //System::debug($item, '!q');

    $parents = $item[0];
    $title = Prepare::code($item[1]);
    $name = Prepare::alphanumeric($item[1]);

    $folder = DR . 'database' . DS . 'content_parse_data' . DS;
    $file = $folder . $parents . DS . $name . '.ini';
    //System::debug($file, '!q');

    $page = Local::readFile($file);
    //System::debug($page, '!code');

    $page = preg_replace(
        '/[\r\n\s]*?(<article class="tabs__content").*?>/u',
        '',
        $page
    );
    $page = preg_replace(
        '/[\r\n\s]*?(<\/article>)[\r\n\s]*/u',
        '',
        $page
    );
    $page = preg_replace(
        [
            '/\s*data-\w+=".*?"/u',
            '/\s*aria-\w+=".*?"/u',
            '/\s*href=".*?"/u',
            '/\s*alt=".*?"/u',
            '/\s*title=".*?"/u',
            '/\s*class=".*?"/u',
            '/\s*id=".*?"/u',
            '/\s*style=".*?"/u',
            '/\s*for=".*?"/u',
            '/\s*itemprop=".*?"/u',
            '/\s*itemtype=".*?"/u',
            '/\s*itemtype=".*?"/u',
            '/\s*content=".*?"/u',
            '/[\r\n\s]*?(<input).*?>[\r\n\s]*/u',
            '/[\r\n\s]*?(<!--)[\r\n\w\W]*?(-->)[\r\n\s]*/u'
        ],
        '',
        $page
    );
    $image = preg_replace(
        '/[\r\n\w\W]*?<img\s+?src="(.*)?">[\r\n\w\W]*/u',
        '$1',
        $page
    );
    $page = preg_replace(
        [
            '/[\r\n\w\W]*?(<img\s+?src=".*?">)[\r\n\w\W]*?Характеристики<\/label>/u',
            '/<br>/u',
            '/<b>/u',
            '/<\/b>/u',
            '/<i>/u',
            '/<\/i>/u',
            '/<\/div>/u',
            '/\&nbsp\;/u'
        ],
        '',
        $page
    );
    //System::debug($matches[0], '!code');

    $folder = DR . 'database' . DS . 'content_parse_data' . DS;
    $file = $folder . $parents . DS . $name . '.ini';

    if ($page) {
        Local::createFile($file);
        Local::writeFile($file, $page, 'replace');
        //System::debug($link);
    }

    $folder = DR . 'database' . DS . 'content_parse_data_image' . DS;
    $file = $folder . $parents . DS . $name . '.ini';

    if ($image) {
        Local::createFile($file);
        Local::writeFile($file, $image, 'replace');
        //System::debug($link);
    }

});

exit;
