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

1. Install via composer:

1. 1. Use

    composer create-project --stability dev --prefer-dist isengine/isengine FOLDER

in the hosting root folder, where FOLDER is the working folder of your project (as "yourdomain.com").

2. Install manually:

2. 1. Download the "isengine" required branches and manually unpack them in "vendor/isengine" subfolder of your project.

2. 2. As result, you should get the following:

* yourdomain.com/
* /vendor/
* /vendor/isengine/
* /vendor/isengine/core/
* /vendor/isengine/framework/
* /vendor/isengine/install/
* /vendor/public/

3. If necessary, rename the "public" folder to the index folder with files of your web application or site (as "public_html").

4. Launch your site in browser.

5. After the installation is complete, we strongly recommend that you delete the "vendor/isengine/install" folder in your project. If you started deleting the folder through the installer, check if everything is deleted.

## Способы установки

1. Установка через composer:

1. 1. Используйте

    composer create-project --stability dev --prefer-dist isengine/isengine FOLDER

в корневой папке хостинга, где FOLDER - рабочая папка вашего проекта (например, "yourdomain.com").

2. Установка вручную:

2. 1. Загрузите все необходимые для работы ветки проекта "isengine" и распакуйте их в подпапку "vendor/isengine" своего проекта.

2. 2. В результате у вас должна получиться следующая структура:

* yourdomain.com/
* /vendor/
* /vendor/isengine/
* /vendor/isengine/core/
* /vendor/isengine/framework/
* /vendor/isengine/install/
* /vendor/public/

3. При необходимости, переименуйте папку "public" в индексную папку файлов вашего веб-приложения или сайта (например, "public_html").

4. Запустите ваш сайт в браузере.

5. После завершения установки, мы настоятельно рекомендуем вам удалить папку "vendor/isengine/install" в вашем проекте. Если вы запустили удаление папки через установщик, проверьте, все ли удалилось.

## Update methods

1. Update via composer:

1. 1. Use "composer update" in the root folder of the your project (as "yourdomain.com").

2. Update manually:

2. 1. Download the "isengine" required branches and manually unpack them into the correct folders in your project.

3. Look at the index file at the root of your project and uncomment the installation code.

4. The rest of the steps are the same as when installing via composer.

5. If you are upgrading the system, old system files will be saved in "backup" folder.

## Способы обновления

1. Через composer:

1. 1. Используйте "composer update" в корневой папке проекта (например, "yourdomain.com").

2. Вручную:

2. 1. Загрузите используемые ветки "isengine" и вручную распакуйте их в нужные папки своего проекта.

3. Посмотрите индексный файл в корне вашего проекта и раскомментируйте код установки.

4. Остальные действия такие же, как при установке через composer.

5. Если вы обновляете систему, резервные копии старых файлов будут сохранены в папке "backup".

## Early PHP versions support

The minimum version is now "7.0".

Yes, the engine can still be run on version "5.6", but this will require a number of changes to the names of some helper functions, such as "print", "session", etc. These words are reserved by the system and should not be used.

## Поддержка предыдущих версий PHP

Теперь минимальной версией является "7.0".

Да, движок по-прежнему можно запустить на версии "5.6", но для этого придется внести ряд изменений в названия некоторых функций-хелперов, таких как "print", "session" и т.п. Эти слова являются зарезервированными системой и недопустимыми к использованию.
