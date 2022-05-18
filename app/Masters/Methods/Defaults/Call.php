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

class Call extends Master
{
    public function launch()
    {

        $data = $this->getData();

        $this->spam('check', 403);

        $this->settings();
        $this->fields();

        if (!$this->errors()) {
            // сюда добавляем обработку данных
            $message = Strings::combine([
                'Заказчик' => $this->getData('name'),
                'Телефон' => $this->getData('phone')
            ], '<br>', ' : ');
            //System::debug($message);

            // сюда добавляем отправку сообщения
            $send = $this->send([
                'subject' => 'Новая заявка на обратный звонок с сайта',
                'message' => $message
            ]);

            if (!$send) {
                $this->error('send', 'no send');
            }
        }

        $this->returns();
    }
}
