<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Parser;
use is\Helpers\Prepare;
use is\Helpers\Sessions;
use is\Components\Config;
use is\Components\Language;
use is\Masters\Exchange;
use is\Masters\Module;
use is\Masters\Database;
use is\Masters\Methods;

class Master extends Methods\Form
{
    /*
    это фактически интерфейс метода
    работаем с подготовленными запросами
    */

    public function generateCode($val = 4, $mode = 0)
    {

        // первым аргументом задаем количество чисел в коде
        // вторым - режим работы

        if (!$mode) {
            // первый способ генерации - числа от 000... до 999...
            $result = Strings::get(Strings::add(mt_rand(0, Strings::add('', $val, 9)), $val - 1, 0, true), -$val);
        } else {
            // второй способ генерации - числа от 100... до 999...
            $result = mt_rand(Strings::add(1, $val - 1, 0), Strings::add('', $val, 9));
        }

        // для теста
        // результат возвращается разбитым на две группы чисел - для удобства
        //$num = (int) ($val / 2);
        //$result = Strings::get($result, 0, $num) . '-' . Strings::get($result, -($val - $num));

        return $result;
    }

    public function findUser($login)
    {

        // подготавливаем массив имен полей

        $data = [
            'authorise' => null,
            'password' => null,
            'settings' => null,
            'user' => null
        ];

        // инициализируем базу данных
        // и читаем из нее настройки полей пользователей
        // конкретно нас интересует, как называются все поля,
        // по которым идет авторизация

        $db = Database::getInstance();
        $db->collection('users');
        $db->driver->filter->addFilter('type', 'settings');
        $db->launch();

        $data['settings'] = $db->data->getData();

        $db->data->resetFilter();
        $db->data->addFilter('data:special', 'authorise');
        $db->data->filtration();

        $data['authorise'] = $db->data->getNames();

        $db->data->resetFilter();
        $db->data->addFilter('data:special', 'password');
        $db->data->filtration();

        $data['password'] = $db->data->getNames();

        $db->clear();

        // повторный запрос в базу данных,
        // но теперь уже мы ищем подходящего пользователя
        // по полям авторизации

        $db->driver->filter->methodFilter('or');

        foreach ($data['authorise'] as $item) {
            $db->driver->filter->addFilter('data:' . $item, '+' . $login);
            // если здесь убрать знак плюс, то некоторые поля, например телефон,
            // который начинается со знака '+' не будут правильно распознаны,
            // т.к. первый плюс всегда является синтаксическим знаком
            // и не входит в строку поиска
            // либо телефон можно указывать без знака '+' вначале,
            // но это должно быть предусмотрено конкретной реализацией
            // а здесь мы сделали так
        }
        unset($item);
        $db->launch();

        $db->data->resetFilter();
        $db->data->addFilter('type', '-settings');
        $db->data->filtration();

        $names = $db->data->getNames();
        if (System::typeIterable($names)) {
            $data['user'] = $db->data->getByName(Objects::first($names, 'value'));
        }

        $db->clear();

        unset($names, $db);

        return $data;
    }

    public function lang($data, $prepare = null)
    {
        $lang = Language::getInstance()->get($data);
        Objects::each(Parser::fromString($prepare), function ($item) use (&$lang) {
            $lang = Prepare::$item($lang);
        });
        return $lang;
    }

    public function send($array = null)
    {
        if (empty($array['to'])) {
            $array['to'] = $this->lang('information:email:0');
        }

        $send = new Exchange('email');
        $send->init($array);
        $send->send();

        return $send->success();
    }
}
