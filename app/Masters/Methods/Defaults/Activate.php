<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Datetimes;
use is\Helpers\Parser;
use is\Helpers\Prepare;
use is\Helpers\Sessions;
use is\Components\Config;
use is\Components\Globals;
use is\Components\Session;
use is\Masters\Module;
use is\Masters\Database;

class Activate extends Master
{
    public function launch()
    {

        //$session = Session::getInstance();
        //$session->close();
        //
        //Sessions::setCookie('logout', true);
        //$this->returns(null);

        // хорошо бы сделать метод, позволяющий искать в коллекции
        // записи по данным и возвращать эти записи
        // либо все, либо первую найденную

        $name = null;
        $confirm_name = null;
        $login = $this->getData('login');
        $confirm = $this->getData('confirm');

        if (!$login || !$confirm) {
            echo 'user confirm not set';
            return;
        }

        $data = $this->findUser($login);

        if (!$data['user']) {
            echo 'user not found';
            return;
        }

        foreach ($data['settings'] as $item) {
            if ($item->data['special'] === 'confirm') {
                $name = $item->name;
                $confirm_name = $data['user']->data[$name];
                break;
            }
        }
        unset($item);

        if (!$confirm_name) {
            echo 'confirm not need';
            return;
        }

        if ($confirm_name !== $confirm) {
            // сюда еще надо добавить сброс кода подтверждения
            // запись нового кода в данные пользователя
            // и отправку соответствующего письма
            //
            // здесь штука в том, что если даже пользователь активен
            // и злоумышленник отправил такой запрос,
            // это никак не повредит пользователю
            // просто придет письмо об активации аккаунта
            //
            // можно еще сделать код не хешированием,
            // а кодированием в base64 по времени
            // и потом декодировать его и сравнивать время, сколько прошло
            // и делать ограничение по времени - если слишком поздно,
            // то код меняется и активация нужна повторная
            echo 'confirm code is not correct';
            return;
        }

        // а здесь код, когда подтверждение совпало

        // мы сбрасываем код активации
        $array = json_decode(json_encode($data['user']), true);
        $db = Database::getInstance();
        $db->collection('users');
        $db->rights(true);

        $db->query('delete');
        $db->driver->setData($array);
        $db->launch();

        $result = $db->driver->success();

        if (!$result) {
            echo 'confirm by user entry was not removed';
            return;
        }

        $array['data'][$name] = null;
        $array['parents'] = ['registered'];

        $db->query('create');
        $db->driver->setData($array);
        $db->launch();

        $result = $db->driver->success();

        if (!$result) {
            echo 'user entry was not activated';
            return;
        }

        $db->query('read');
        $db->clear();

        if ($result) {
            // отправка еще одного письма после активации

            $send = $this->send([
                'subject' => 'Активация на ' . System::server('host'),
                'template' => 'app:Masters:Methods:Defaults:templates:activate:admin',
                'message' => $this->getData()
            ]);

            if ($send) {
                if ($this->getData('login')) {
                    $this->send([
                        'to' => $this->getData('login'),
                        'subject' => 'Активация на ' . System::server('host'),
                        'template' => 'app:Masters:Methods:Defaults:templates:activate:user',
                        'message' => $this->getData()
                    ]);
                }
                Sessions::setCookie('activate', true);
            } else {
                $this->error('send', 'no send');
            }
        }

        //System::debug($name);
        //System::debug($confirm);
        //System::debug($data);

        if ($this->errors()) {
            $this->errors = [
                'login' => true,
                'phone' => true,
                'password' => true
            ];
        }

        $this->returns();
    }
}
