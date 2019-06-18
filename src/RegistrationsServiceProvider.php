<?php namespace Avl\SiteRegistrations;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Config;

class RegistrationsServiceProvider extends ServiceProvider
{

		/**
		 * Bootstrap the application services.
		 *
		 * @return void
		 */
		public function boot()
		{
				// Публикуем файл конфигурации
				$this->publishes([
						// config
						__DIR__ . '/../config/registrations.php' => config_path('registrations.php'),

						// views
						__DIR__ . '/../resources/views' => resource_path('views/vendor/registrations'),

						// langs
						__DIR__ . '/../resources/lang' => resource_path('lang/vendor/registrations'),
				]);

				// $this->publishes([
				// 		__DIR__ . '/../public' => public_path('vendor/registrations'),
				// ], 'public');

				$this->loadRoutesFrom(__DIR__ . '/routes.php');

				$this->loadViewsFrom(__DIR__ . '/../resources/views', 'registrations');

				$this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'registrations');
		}

		/**
		 * Register the application services.
		 *
		 * @return void
		 */
		public function register()
		{
				// Добавляем в глобальные настройки системы новый тип раздела если он не был создан ранее
				Config::set('avl.sections.reg', 'Регистрация');

				// объединение настроек с опубликованной версией
				$this->mergeConfigFrom(__DIR__ . '/../config/registrations.php', 'registrations');

				$this->app['router']->aliasMiddleware('cabinet', \Avl\SiteRegistrations\Middleware\CabinetMiddleware::class);
		}

}
