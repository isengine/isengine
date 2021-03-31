<p align="center"><a href="https://isengine.org" target="_blank"><img src="https://raw.githubusercontent.com/isengine/docs/master/logo/poster.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/isengine/isengine"><img src="https://img.shields.io/packagist/dt/isengine/isengine" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/isengine/isengine"><img src="https://img.shields.io/packagist/v/isengine/isengine" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/isengine/isengine"><img src="https://img.shields.io/packagist/l/isengine/isengine" alt="License"></a>
</p>

## isEngine

Is official repository of isEngine.

Latest version is 0.13<br>
Status is in development

Это официальный репозиторий isEngine.

Последняя версия - 0.13<br>
Статус - в разработке

## Project's links

* [Official site](https://isengine.org);
* [Official instagram](https://instagram.com/is.engine);
* [Сommunity in social networks](https://facebook.com/groups/isengine);
* [Packages for composer](https://packagist.org/packages/isengine/);
* [Project on Github](https://github.com/isengine).

## About

This is cool engine with automated processes for light and speed creating websites.

Now we are creating a new framework based on the engine to make it even more convenient.

We want to do everything possible to make life easier for developers. And your help in the development of this project can be invaluable!

## О системе

Это классный движок с автоматизированными процессами для легкого и быстрого создания сайтов.

Сейчас мы создаем на базе движка новый фреймворк, чтобы сделать его еще более удобным.

Мы хотим сделать все возможное, чтобы облегчить жизнь разработчикам. И ваша помощь в развитии этого проекта может быть неоценимой!

## Installation methods

### Install via composer:

Use

    composer create-project --stability dev --prefer-dist isengine/isengine FOLDER

in the hosting root folder, where FOLDER is the working folder of your project (as "yourdomain.com").

### Install manually:

Download the "isengine" required branches and manually unpack them in "vendor/isengine" subfolder of your project.

As result, you should get the following:

* yourdomain.com/
* /vendor/
* /vendor/isengine/
* /vendor/isengine/core/
* /vendor/isengine/framework/
* /vendor/isengine/install/
* /vendor/public/

If necessary, rename the "public" folder to the index folder with files of your web application or site (as "public_html").

Launch your site in browser.

After the installation is complete, we strongly recommend that you delete the "vendor/isengine/install" folder in your project. If you started deleting the folder through the installer, check if everything is deleted.

## Способы установки

### Установка через composer:

Используйте

    composer create-project --stability dev --prefer-dist isengine/isengine FOLDER

в корневой папке хостинга, где FOLDER - рабочая папка вашего проекта (например, "yourdomain.com").

### Установка вручную:

Загрузите все необходимые для работы ветки проекта "isengine" и распакуйте их в подпапку "vendor/isengine" своего проекта.

В результате у вас должна получиться следующая структура:

* yourdomain.com/
* /vendor/
* /vendor/isengine/
* /vendor/isengine/core/
* /vendor/isengine/framework/
* /vendor/isengine/install/
* /vendor/public/

При необходимости, переименуйте папку "public" в индексную папку файлов вашего веб-приложения или сайта (например, "public_html").

Запустите ваш сайт в браузере.

После завершения установки, мы настоятельно рекомендуем вам удалить папку "vendor/isengine/install" в вашем проекте. Если вы запустили удаление папки через установщик, проверьте, все ли удалилось.

## Update methods

### Update via composer:

Use "composer update" in the root folder of the your project (as "yourdomain.com").

### Update manually:

Download the "isengine" required branches and manually unpack them into the correct folders in your project.

Look at the index file at the root of your project and uncomment the installation code.

The rest of the steps are the same as when installing via composer.

If you are upgrading the system, old system files will be saved in "backup" folder.

### Update dump only:

Use "composer dump-autoload" in the root folder of the your project (as "yourdomain.com").

## Способы обновления

### Через composer:

Используйте "composer update" в корневой папке проекта (например, "yourdomain.com").

### Вручную:

Загрузите используемые ветки "isengine" и вручную распакуйте их в нужные папки своего проекта.

Посмотрите индексный файл в корне вашего проекта и раскомментируйте код установки.

Остальные действия такие же, как при установке через composer.

Если вы обновляете систему, резервные копии старых файлов будут сохранены в папке "backup".

### Только дамп:

Используйте "composer dump-autoload" в корневой папке проекта (например, "yourdomain.com").

## Early PHP versions support

The minimum version is now "7.0".

Yes, the engine can still be run on version "5.6", but this will require a number of changes to the names of some helper functions, such as "print", "session", etc. These words are reserved by the system and should not be used.

## Поддержка предыдущих версий PHP

Теперь минимальной версией является "7.0".

Да, движок по-прежнему можно запустить на версии "5.6", но для этого придется внести ряд изменений в названия некоторых функций-хелперов, таких как "print", "session" и т.п. Эти слова являются зарезервированными системой и недопустимыми к использованию.

## Packet manager

### Use fxp/composer-asset-plugin

You can install packets from npm or bower use composer-asset-plugin by fxp.

From console:

	composer npm-asset/bootstrap

Add packets to composer.json:

	"npm-asset/bootstrap": ">=4.0",
	"bower-asset/jquery-2.1.0": "2.1.0"

### Use bowerphp.phar

You can install bower packets use bowerphp.phar from console:

	php bowerphp.phar install jquery
	php bowerphp.phar install twbs/bootstrap#4.1.0


## Менеджер пакетов

### Используя fxp/composer-asset-plugin

Вы можете установить пакеты из npm или bower используя composer-asset-plugin от fxp.

Из консоли:

	composer npm-asset/bootstrap

Добавить пакеты в composer.json:

	"npm-asset/bootstrap": ">=4.0",
	"bower-asset/jquery-2.1.0": "2.1.0"

### Используя bowerphp.phar

Вы можете установить пакеты bower используя bowerphp.phar из консоли:

	php bowerphp.phar install jquery
	php bowerphp.phar install twbs/bootstrap#4.1.0
