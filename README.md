# site-registrations

### Информация

Модуль регистрации для CMS IRsite.

### Установка

```
$ composer require avl/site-registrations
```
Или в секцию **require** добавить строчку **"avl/site-registrations": "^1.0"**

```json
{
    "require": {
        "avl/site-registrations": "^1.0"
    }
}
```
### Настройка

Для публикации файла настроек необходимо выполнить команду:

```
$ php artisan vendor:publish --provider="Avl\SiteRegistrations\RegistrationsServiceProvider" --force
```
