# isEngine

Is official repository of isEngine.

Latest version is 0.13<br>
Status is in development

Это официальный репозиторий isEngine.

Последняя версия - 0.13<br>
Статус - в разработке

# Project's links

* [Official site](https://isengine.org);
* [Official instagram](https://instagram.com/is.engine);
* [Сommunity in social networks](https://facebook.com/groups/isengine);
* [Packages for composer](https://packagist.org/packages/isengine/);
* [Project on Github](https://github.com/isengine).

# About

This is cool engine with automated processes for light and speed creating websites.

Now we are creating a new framework based on the engine to make it even more convenient.

We want to do everything possible to make life easier for developers. And your help in the development of this project can be invaluable!

# О системе

Это классный движок с автоматизированными процессами для легкого и быстрого создания сайтов.

Сейчас мы создаем на базе движка новый фреймворк, чтобы сделать его еще более удобным.

Мы хотим сделать все возможное, чтобы облегчить жизнь разработчикам. И ваша помощь в развитии этого проекта может быть неоценимой!

# Installation methods

1. Install via composer:

1.1. Use "composer create-project --stability dev --prefer-dist isengine/isengine NAME" in the root folder of the site (as "yoursite.com"), where NAME is the working folder of your project (as "public_html").

2. Install manually:

2.1. Download the "isengine" required branches and manually unpack them in "vendor/isengine" subfolder of your project.

2.2. As result, you should get the following:

* yoursite.com/
* /vendor/
* /vendor/isengine/
* /vendor/isengine/core/
* /vendor/isengine/framework/
* /vendor/isengine/install/

3. Launch your site in browser.

4. After the installation is complete, we strongly recommend that you delete the "vendor/isengine/install" folder in your project. If you started deleting the folder through the installer, check if everything is deleted.

# Способы установки

1. Установка через composer:

1.1. Используйте "composer create-project --stability dev --prefer-dist isengine/isengine NAME" в корневой папке сайта (например, "yoursite.com"), где NAME - рабочая папка Вашего проекта (например, "public_html").

2. Установка вручную:

2.1. Загрузите все необходимые для работы ветки проекта "isengine" и распакуйте их в подпапку "vendor/isengine" своего проекта.

2.2. В результате у вас должна получиться следующая структура:

* yoursite.com/
* /vendor/
* /vendor/isengine/
* /vendor/isengine/core/
* /vendor/isengine/framework/
* /vendor/isengine/install/

3. Запустите ваш сайт в браузере.

4. После завершения установки, мы настоятельно рекомендуем вам удалить папку "vendor/isengine/install" в вашем проекте. Если вы запустили удаление папки через установщик, проверьте, все ли удалилось.

# Update methods

1. Update via composer:

1.1. Use "composer update" in the root folder of the your project (as "yoursite.com/public_html").

2. Update manually:

2.1. Download the "isengine" required branches and manually unpack them into the correct folders in your project.

3. Look at the index file at the root of your project and uncomment the installation code.

4. The rest of the steps are the same as when installing via composer.

5. If you are upgrading the system, old system files will be saved in "backup" folder.

# Способы обновления

1. Через composer:

1.1. Используйте "composer update" в корневой папке проекта (например, "yoursite.com/public_html").

2. Вручную:

2.1. Загрузите используемые ветки "isengine" и вручную распакуйте их в нужные папки своего проекта.

3. Посмотрите индексный файл в корне вашего проекта и раскомментируйте код установки.

4. Остальные действия такие же, как при установке через composer.

5. Если вы обновляете систему, резервные копии старых файлов будут сохранены в папке "backup".
