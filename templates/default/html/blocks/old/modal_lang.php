<?php

// Рабочее пространство имен

namespace is;

use is\Helpers\System;
use is\Helpers\Strings;
use is\Helpers\Objects;
use is\Helpers\Paths;
use is\Components\Display;
use is\Components\Log;
use is\Masters\View;

// читаем

$view = View::getInstance();

$lang = [
	'ru' => [
		'signin' => [
			'title' => 'Вход',
			'login' => 'Email или телефон',
			'password' => 'Пароль',
			'error' => 'При попытке входа произошла ошибка. Повторите попытку позже.',
		],
		'signup' => [
			'title' => 'Регистрация',
			'email' => 'E-mail (на него придет подтверждение)',
			'email_desc' => 'Этот адрес должен быть действующим. На него будет отправлено письмо, чтобы вы подтвердили регистрацию',
			'phone' => 'Телефон (в международном формате)',
			'phone_desc' => 'Если хотите, укажите здесь свой номер телефона в международном формате (например, +7 900 123-45-67). Разрешенные символы: + - ( ) и пробелы',
			'password' => 'Пароль (от 6 символов)',
			'password_desc' => 'Для большей защиты рекомендуем задать пароль не меньше 8 символов и использовать хотя бы одну цифру, одну прописную и одну строчную буквы',
			'password_confirm' => 'Повтор пароля',
			'password_confirm_desc' => 'Повторите здесь свой пароль, чтобы исключить случайную не ошибку при установке пароля',
			'plan' => 'Выбрать тариф (можно пропустить)',
			'plan_link' => 'сравнить тарифные планы',
			'description' => '
				<p>
					Нажимая на кнопку "Отправить" вы даёте согласие на обработку ваших персональных данных на основании ФЗ № 152-ФЗ «О персональных данных» от 27.07.2006 г.
				</p>
			',
			'error' => 'При попытке регистрации произошла ошибка. Повторите попытку позже.',
		],
		'errors' => [
			'login' => 'Такой логин недопустим.',
			'loginlen' => 'Логин должен содержать как минимум 6 знаков.',
			'password' => 'Пароль должен быть не меньше 6 и не больше 30 символов.',
			'password_confirm' => 'Пароль и подтверждение пароля не совпадают.',
			'email' => 'Такой Email недопустим.',
			'phone' => 'Телефон введен неверно.',
			'phonelen' => 'Телефон должен содержать 10 или 11 цифр.',
			'plan' => 'Выберите один из предложенных тарифных планов.',
			'verifyreg' => 'Пользователь с такими данными уже зарегистрирован.',
			'verifylogin' => 'Данные для входа указаны неверно. Возможно, вы не подтвердили регистрацию.',
			'verify' => 'Возникла техническая ошибка. Попробуйте повторить вход позже.',
			'enter' => 'Логин или пароль введены неверно.',
			'captcha' => 'Данные капчи указаны неверно.',
		]
	],
	'en' => [
		'signin' => [
			'title' => 'Login',
			'login' => 'Email or phone',
			'password' => 'Password',
			'error' => 'An error occurred while trying to sign in. Please try again later.',
		],
		'signup' => [
			'title' => 'Registration',
			'email' => 'E-mail (need to confirm)',
			'email_desc' => 'This e-mail must be real and active. A letter will be sent to this box to confirm the registration',
			'phone' => 'Phone (in international format)',
			'phone_desc' => 'If possible, specify the phone number in international 11-symbol format. Allowed characters is + - ( ) and spaces',
			'password' => 'Password (min 6 symbols)',
			'password_desc' => 'For more protection reccomended lenght from 8 symbol and use as minimum one digit and uppercase and lowercase letter',
			'password_confirm' => 'Confirm Password',
			'password_confirm_desc' => 'Input your password here to make sure that you did not accidentally set it wrong',
			'plan' => 'Choose a plan (can skip)',
			'plan_link' => 'compare tariff plans',
			'description' => '
				<p>
					By clicking on the "Send" button you consent to the processing of your personal data.
				</p>
			',
			'error' => 'An error occurred while trying to sign up. Please try again later.',
		],
		'errors' => [
			'login' => 'Login is invalid.',
			'loginlen' => 'Login must be at least 6 characters.',
			'password' => 'Password must be at least 6 and not more than 30 characters.',
			'password_confirm' => 'Password and confirmation of the password do not match.',
			'email' => 'Email is invalid.',
			'phone' => 'Phone is incorrect.',
			'phonelen' => 'Phone must contain 10 or 11 digits.',
			'plan' => 'Choose one of the offered tariff plans.',
			'verifyreg' => 'User with such data is already registered.',
			'verifylogin' => 'The data is invalid. Perhaps you did not confirm the registration.',
			'verify' => 'There was a technical error. Try again later.',
			'enter' => 'Login or password is incorrect.',
			'captcha' => 'Captcha is incorrect.',
		]
	]
];

$lang = $lang[ $view -> get('state|lang') ];

$view -> get('vars') -> set('modal', $lang);

?>