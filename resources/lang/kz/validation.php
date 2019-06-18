<?php

return [
	'surname.required' => 'Фамилия не зеполнена',
	'surname.max' => 'Поле не должно превыщать :max символов',

	'name.required' => 'Имя не зеполнено',
	'name.max' => 'Поле не должно превыщать :max символов',

	'patronymic.max' => 'Поле не должно превыщать :max символов',

	'dob.required' => 'Дата рождения не указана',
	'dob.date_format' => 'Укажите дату в формате: d.m.Y',

	'mobile.required' => 'Телефон не указан',
	'mobile.regex' => 'Укажите телефон в формате: +7 (777) 123-45-67',

	'email.required' => 'Email не заполнен',
	'email.email' => 'Email введен не верно',
	'email.unique' => 'Email уже зарегистрирован',

	'login.required' => 'Логин не указан',
	'login.unique' => 'Логин уже зарегистрирован',

	'password.required' => 'Пароль не указан',
	'password.min' => 'Пароль должен быть не менее :min символов',
	'password.max' => 'Пароль должен быть не более :max символов',

	'password_confirm.required' => 'Пароли не совпадают',
	'password_confirm.same' => 'Пароли не совпадают',
];
