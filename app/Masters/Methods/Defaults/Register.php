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

class Register extends Master
{
    public function launch()
    {
        $this->spam('check', 403);

        $this->settings();
        $this->fields();

        if (
            $this->getData('password') !== $this->getData('password-confirm')
        ) {
            $this->error('password', 'confirm');
        }

        // ищем пользователя

        $data = [];

        if (!$this->errors()) {
            // сначала по логину

            $data = $this->findUser(
                $this->getData('login')
            );
            if ($data['user']) {
                $this->error('login', 'exists');
            }

            // затем по телефону

            $data = $this->findUser(
                $this->getData('phone')
            );
            if ($data['user']) {
                $this->error('phone', 'exists');
            }

            $data = $data['settings'];
        }

        // собираем данные

        if (
            !$this->errors()
            && $data
        ) {
            $array = [];

            $config = Config::getInstance();

            $session = Session::getInstance();
            $session->open();
            $session->init();

            $confirm = Prepare::hash(Datetimes::mtime());

            foreach ($data as $item) {
                $name = $item->name;

                $array[$name] = $this->getData($name);

                $i = $item->data;

                if ($i['special'] === 'agents') {
                    $array[$name][] = $session->getSession('agent');
                }
                if ($i['special'] === 'ips') {
                    $array[$name][] = $session->getSession('ip');
                }
                if ($i['special'] === 'password') {
                    $array[$name] = Prepare::crypt($this->getData('password'));
                }
                if ($i['special'] === 'confirm') {
                    $array[$name] = $confirm;
                }

                if ($i['required'] && !$array[$name]) {
                    $this->error($name, 'not exists');
                }
            }
            unset($item, $i, $name);

            if (!$this->errors()) {
                $login = $this->getData('login');
                $parents = Parser::fromString($config->get('users:register'));
                $db = Database::getInstance();
                $db->collection('users');
                $db->query('create');
                $db->rights(true);

                $db->driver->setData([
                    'name' => $login,
                    'parents' => $parents,
                    'owner' => [$login],
                    'data' => $array
                ]);

                $db->launch();
                $result = $db->driver->success();

                $db->query('read');
                $db->clear();

                if (!$result) {
                    $this->error('create', 'no create user entry');
                }

                if ($result) {
                    // в ранних версиях было раздвоение регистрации
                    // все зависело от конфига
                    // если мы указывали одного родителя, то он назначался,
                    // и активации не было
                    // если родителей было двое, то шла активация
                    // и после активации, назначался второй родитель
                    //
                    // но теперь подход к родителям поменялся
                    // и поэтому мы будем назначать родителей согласно конфигу
                    // а активация лежит целиком на разработчике
                    // если она нужна - нужно вызывать соответствующий метод
                    // если нет, можно вызвать другой метод
                    //
                    // также можно использовать стандартный метод активации
                    // для построения собственного метода с другими условиями и т.п.

                    $send = $this->send([
                        'subject' => 'Регистрация на ' . System::server('host'),
                        'template' => 'app:Masters:Methods:Defaults:templates:register:admin',
                        'message' => $array
                    ]);

                    if ($send) {
                        if ($this->getData('login')) {
                            $this->send([
                                'to' => $this->getData('login'),
                                'subject' => 'Регистрация на ' . System::server('host'),
                                'template' => 'app:Masters:Methods:Defaults:templates:register:user',
                                'message' => $array
                            ]);
                        }

                        Sessions::setCookie('register', true);
                    } else {
                        $this->error('send', 'no send');
                    }
                }
            }

            unset($session, $array);
        }

        // проверяем данные

        //$login = Prepare::clear($login);
        //$password = Prepare::clear($password);
        //
        //echo '+++<br>';
        //echo $login . '<br>';
        //echo $password . '<br>';
        //
        //System::debug($this);
        //
        //echo '<hr>';

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
