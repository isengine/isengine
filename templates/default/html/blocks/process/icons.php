<?php

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Masters\View;
use is\Masters\Database;
use claviska\SimpleImage;
use PHP_ICO;

$view = View::getInstance();

$icons = $view->get('icon')->getData();

$path = DI . $icons['settings']['path'] . DS;
$original = $path . $icons['settings']['original'];

System::debug($path);
System::debug($original);
System::debug($icons);

// Обработка ошибок

$error = [];
if (!extension_loaded('gd')) {
    $error[] = 'php extension \'GD\'';
}
if (!System::typeIterable($icons) || !file_exists($original)) {
    $error[] = 'needed icon settings';
}
if (!empty($error)) {
    echo 'icons can not generated:<br>';
    echo Strings::join($error, '<br>');
    exit;
}

// Фавиконки в формате ico

if (!empty($icons['favicon'])) {
    
    $name = DI . $icons['favicon']['name'] . '.ico';
    
    if (!file_exists($name)) {
        
        $ico_lib = new PHP_ICO();
        $sizes = [];
        
        if (System::typeIterable($icons['favicon']['sizes'])) {
            foreach ($icons['favicon']['sizes'] as $i) {
                $sizes[] = [$i, $i];
            }
            unset($i);
        } else {
            $sizes = [[16, 16], [24, 24], [32, 32], [48, 48]];
        }
        
        $ico_lib->add_image($original, $sizes);
        $ico_lib->save_ico($name);
        
        unset($sizes, $ico_lib);
        
    }
    
    unset($icons['favicon'], $name);
    
}

// Остальные иконки

foreach ($icons as $key => $item) {
    
    if (
        empty($item['name']) ||
        empty($item['sizes']) ||
        !System::typeIterable($item['sizes'])
    ) {
        continue;
    }
    
    foreach ($item['sizes'] as $i) {
        
        $size = Objects::convert($i);
        
        if (empty($size[1])) {
            $size[1] = $size[0];
        }
        
        // 0 - width
        // 1 - height
        
        $name = $path . $item['name'] . '-' . $size[0] . 'x' . $size[1] . '.png';
        
        if (!file_exists($name)) {
            
            if ($key === 'msapplication') {
                $size[0] = ceil($size[0] * 1.8);
                $size[1] = ceil($size[1] * 1.8);
            }
            
            $image = new SimpleImage();
            $image->fromFile($original);
            
            if (
                !empty($icons['settings']['resize']) &&
                $icons['settings']['resize'] === 'nocrop'
            ) {
                if ($size[0] > $size[1]) {
                    $image->resize(null, $size[1]);
                } else {
                    $image->resize($size[0], null);
                }
                $image->bestFit($size[0], $size[1]);
            } elseif (
                !empty($icons['settings']['resize']) &&
                $icons['settings']['resize'] === 'crop'
            ) {
                $image->thumbnail($size[0], $size[1]);
            } else {
                if ($size[0] > $size[1]) {
                    $image->thumbnail($size[1], $size[1]);
                } else {
                    $image->thumbnail($size[0], $size[0]);
                }
            }
            
            $image->toString('image/png');
            
            $newimage = new SimpleImage();
            $newimage
                ->fromNew($size[0], $size[1])
                ->overlay($image)
                ->toFile($name, 'image/png');
            
            unset($image, $newimage, $size, $name);
            
        }
        
    }
    
    unset($i);
    
}

unset($key, $item);

exit;
