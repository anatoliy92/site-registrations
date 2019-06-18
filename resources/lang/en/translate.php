<?php
/**
 * Transliterable
 * @var array
 */
return [
	'surname' => 'Surname',
	'name' => 'Name',
	'patronymic' => 'Patronymic',
	'dob' => 'Date of Birth',
	'mobile' => 'Mobile',
	'login' => 'Login',
	'email' => 'E-mail',
	'password' => 'Password',
	'confirm' => 'Password confirmation',

	'registrations' => [
		'form-name' => 'Форма регистрации',
		'success' => 'Регистрация успешно завершена. Для продолжения Вам необходимо перейти по ссылке отправленной на E-mail указанный при регистрации.',
		'error' => 'Ошибка при регистрации. Обратитесь к администратору'
	],

	'auth' => [
		'form-name' => 'Sign in',
		'login' => 'E-mail or login',
		'invitation' => 'Если вы не были зарегистрированы ранее, то вам необходимо пройти <a href="'. route('reg.index', ['alias' => 'registrations']) .'">регистрацию</a>.',
		'restore' => 'Если вы забыли пароль, то попробуйте его <a href="'. route('reg.restore', ['alias' => 'registrations']) .'">восстановить</a>.'
	],

	'restore' => [
		'form-name' => 'Восстановление пароля',
		'description' => 'Инструкции будут отправлены на <b>e-mail</b>, указанный при регистрации.',
		'message' => 'На указанный вами <b>e-mail</b> отправлено письмо для восстановления пароля.'
	],

	// Обновление пароля после сброса
	'update' => [
		'form-name' => 'Сброс пароля',
		'password' => 'Введите новый пароль',
		'confirm' => 'Подтвердите новый пароль',

		'success' => 'Пароль успешно изменен.',
		'error' => 'Произошла ошибка, обратитесь к администратору.'
	],

	// Подтверждение e-mail
	'verify' => [
		'form-name' => 'Подтверждение',
		'success' => 'Email успешно подтвержден. Теперь Вы можете войти в личный кабинет.',
		'error' => 'Код верификации не найден.'
	],

	'btn' => [
		'register' => 'Check in',
		'enter' => 'Войти',
		'restore' => 'Сбросить пароль',
		'save' => 'Save',
		'update' => 'Изменить пароль'
	]

];
