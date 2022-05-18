<?php

namespace is\Masters\Methods\Defaults;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Datetimes;
use is\Helpers\Local;
use is\Helpers\Parser;
use is\Helpers\Prepare;
use is\Helpers\Sessions;
use is\Components\Config;
use is\Components\Globals;
use is\Components\Session;
use is\Components\User;
use is\Masters\Module;
use is\Masters\Database;

class Create extends Master
{
    public function launch()
    {
        $this->spam('check', 403);

        $this->settings();
        $this->fields();

        // ищем пользователя

        $user = User::getInstance();
        $udata = $user->getData();

        $id = Datetimes::convert(
            time(),
            '{abs}',
            '{year}{month}{day}-{hour}{min}{sec}'
        );

        if (
            empty($udata)
            || !System::typeIterable($udata)
        ) {
            $this->error('user', 'not authorised');
        }

        //$files = !empty($_FILES['photo'])
        //    ? $_FILES['photo']
        //    : Objects::join(
        //        [
        //            'name',
        //            'full_path',
        //            'type',
        //            'tmp_name',
        //            'error',
        //            'size'
        //        ],
        //        [],
        //        []
        //    );
        //
        //System::debug($user);
        //echo '<hr>';
        //System::debug($data);
        //echo '<hr>';
        //System::debug($files);
        //echo '<hr>';
        //echo '<hr>';
        //exit;

        if (!$this->errors()) {
            $uname = $udata->getEntryKey('name');
            //$uparents = $udata->getEntryKey('parents');
            $upath = DI . 'content' . DS . 'create' . DS
                //. ($uparents ? Strings::join($uparents, DS) . DS : '')
                . Prepare::htmlencode($uname) . DS
                . $id . DS;

            //System::debug($upath);

            $data = [
                'name' => $id,
                'parents' => ['create', $uname],
                'owner' => [$uname],
                'data' => Objects::removeByIndex(
                    $this->getData(),
                    [
                        'instance',
                        'check',
                        'submit-confirm',
                        'submit'
                    ]
                )
            ];

            //System::debug($data);

            $db = Database::getInstance();
            $db->collection('content');
            $db->query('create');
            $db->rights(true);

            $db->driver->setData($data);

            $db->launch();
            $result = $db->driver->success();

            $db->query('read');
            $db->clear();

            if (!$result) {
                $this->error('create', 'no create content entry');
            }

            if ($result) {
                $files = !empty($_FILES['photo'])
                    ? $_FILES['photo']
                    : Objects::join(
                        [
                            'name',
                            'full_path',
                            'type',
                            'tmp_name',
                            'error',
                            'size'
                        ],
                        [],
                        []
                    );

                Objects::each($files['error'], function ($item, $key) use ($upath, $files) {
                    $name = $files['name'][$key];
                    $type = Strings::before($files['type'][$key], '/');
                    $path = $files['tmp_name'][$key];

                    if (
                        $item === UPLOAD_ERR_OK
                        && $type === 'image'
                    ) {
                        Local::createFolder($upath);
                        move_uploaded_file($path, $upath . $name);
                    }
                });

                $send = $this->send([
                    'subject' => 'Новый заказ на ' . System::server('host'),
                    'template' => 'app:Masters:Methods:Defaults:templates:create:admin',
                    'message' => $data
                ]);

                if ($send) {
                    $this->send([
                        'to' => $uname,
                        'subject' => 'Новый заказ на ' . System::server('host'),
                        'template' => 'app:Masters:Methods:Defaults:templates:create:user',
                        'message' => $data
                    ]);

                    Sessions::setCookie('create', true);
                } else {
                    $this->error('send', 'no send');
                }
            }

        }

        // проверяем данные

        if ($this->errors()) {
            $this->errors = [
                'login' => true,
                'phone' => true,
                'password' => true
            ];
        }

        //exit;
        $this->returns();
    }
}
