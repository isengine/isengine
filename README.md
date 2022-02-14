<p align="center"><a href="https://isengine.org" target="_blank"><img src="https://raw.githubusercontent.com/isengine/docs/master/logo/poster.svg" width="400"></a></p>

<p align="center">
<a href="https://packagist.org/packages/isengine/isengine"><img src="https://img.shields.io/packagist/dt/isengine/isengine" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/isengine/isengine"><img src="https://img.shields.io/packagist/v/isengine/isengine" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/isengine/isengine"><img src="https://img.shields.io/packagist/l/isengine/isengine" alt="License"></a>
</p>

## isEngine

Is official repository of isEngine.

Latest version is 1.0 beta<br>
Status is in development

Это официальный репозиторий isEngine.

Последняя версия - 1.0 бета<br>
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

Yes, the engine can still be run on version "5.6", but support for this version is not a priority, and problems may arise in working on it.

## Поддержка предыдущих версий PHP

Теперь минимальной версией является "7.0".

Да, движок по-прежнему можно запустить на версии "5.6", но поддержка этой версии не стоит в приоритете, и в работе на ней могут возникнуть проблемы.

## Packet manager

You can install bower packets use bowerphp.phar from console in the root folder of the your project:

	php bowerphp.phar install PACKAGE

Package is package name in bower ‎packages store. Supported formats:

	jquery
	twbs/bootstrap#^4.1.0

To save new dependencies to "bower.json" use:

	php bowerphp.phar install PACKAGE --save

Also, you can add dependencies to "bower.json" manually.

To do this, specify the required packages in the "dependencies" section in this format:

	"jquery": "*",
	"bootstrap": "4.1.0"

Then use command in console:

	bower install

If your public project folder will be change (as "public"), you will be need change install libraries path in ".bowerrc" file.

## Менеджер пакетов

Вы можете установить пакеты bower используя bowerphp.phar из консоли, находясь в корневой папке проекта:

	php bowerphp.phar install PACKAGE

Package - это имя пакета из хранилища bower. Поддерживаемые форматы:

	jquery
	twbs/bootstrap#^4.1.0

Чтобы добавить зависимость в файл "bower.json" используйте:

	php bowerphp.phar install PACKAGE --save

Также, вы можете добавить зависимости в файл "bower.json" вручную. Для этого пропищите в секцию "dependencies" необходимые пакеты в формате:

	"jquery": "*",
	"bootstrap": "4.1.0"

Затем используйте команду в консоли:

	php bowerphp.phar install

Если публичная папка вашего проекта изменится (по-умолчанию, "public"), вам необходимо изменить путь установки библиотек в файле ".bowerrc".
