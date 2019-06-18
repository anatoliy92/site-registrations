<h4>Здравствуйте, {{ $response->name }}!</h4>
<p>Вы получили данное письма так как запросили восстановление пароля на сайте nationalbank.kz.</p>

<p>Для продолжения вам необходимо пройти по <a href="{{ asset($section->path . '/restore/verify-' . $response->verify) }}">ссылке</a>, либо скопировать и вставить в браузер следующую строку:</p>
<p><a href="{{ asset($section->path . '/restore/verify-' . $response->verify) }}">{{ asset($section->path . '/restore/verify-' . $response->verify) }}</a></p>

<p>Если это были не вы, то просто проигнорируйте данное письмо.</p>
