<?php namespace Avl\SiteRegistrations\Controllers\Site;

use App\Http\Controllers\Site\Sections\SectionsController;
	use Avl\SiteRegistrations\Requests\RegistrationsRequest;
	use Illuminate\Http\Request;
	use App\Models\User;
	use Carbon\Carbon;
	use Api;
	use Mail;
	use View;


class RegistrationsController extends SectionsController
{

	/**
	 * Show form registrations
	 * @param  string  $alias
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index ($alias, Request $request)
	{
		return view('registrations::site.registrations.index', [
			'alias' => $alias
		]);
	}

	/**
	 * Registration new user
	 * @param  RegistrationsRequest $request Validation
	 * @return \Illuminate\Http\Response
	 */
	public function register (RegistrationsRequest $request)
	{
		$response = Api::request('POST', 'api/user', [
			"surname" => $request->input("surname"),
			"name" => $request->input("name"),
			"patronymic" => $request->input("patronymic"),
			"dob" => Carbon::parse($request->input("dob"))->format("Y-m-d"),
			"mobile" => preg_replace('~[^0-9]+~', '', $request->input('mobile')),
			"login" => $request->input("login"),
			"email" => $request->input("email"),
			"password" => $request->input("password"),
			"verify" => bcrypt(date('Ymdhis') . rand(1000000, 9999999))
		]);

		if ($response->id) {
			Mail::send('registrations::emails.registrations', ['response' => $response, 'section' => $this->section], function ($message) use ($response) {
					$message->from(config('registrations.emailFrom'), config('registrations.emailFromName'));
					$message->subject('Регистрация - Национальный Банк Республики Казахстан');
					$message->to($response->email);
			});

			return redirect()->back()->with('successRegistration', true);
		}

		return redirect()->back()->withInput()->with('errorRegistration', true);
	}

	/**
	 * Show form page verification
	 * @param  string $alias
	 * @param  string $verify verification code
	 * @return \Illuminate\Http\Response
	 */
	public function verify ($alias, $verify)
	{
		$user = User::whereVerify($verify)->firstOrFail();

		$response = Api::request('PUT', 'api/user/' . $user->id, [
			"good" => 1,
			"verify" => '',
		]);

		return view('registrations::site.registrations.verify', [
			'success' => ($response->id) ? true : false
		]);
	}

	/**
	 * Show form by restore password
	 * @param  string $alias
	 * @return \Illuminate\Http\Response
	 */
	public function restore ($alias)
	{
		return view('registrations::site.registrations.restore', [
			'alias' => $alias
		]);
	}

	/**
	 * Send mail by form restore password
	 * @param  string $alias
	 * @return \Illuminate\Http\Response
	 */
	public function restorePost ($alias, Request $request)
	{
		$post = $this->validate(request(), [
			'email' => 'required|email|exists:users,email',
		], trans('registrations::validation'));

		$user = User::where('email', $post['email'])->first();

		if (!is_null($user)) {
			$response = Api::request('PUT', 'api/user/' . $user->id, [
				'verify' => bcrypt(date('Ymdhis') . rand(1000000, 9999999))
			]);

			if ($response->id) {
				Mail::send('registrations::emails.restore', ['response' => $response, 'section' => $this->section], function ($message) use ($response) {
					$message->from(config('registrations.emailFrom'), config('registrations.emailFromName'));
					$message->subject('Запрос на восстановление пароля' );
					$message->to($response->email);
				});

				return redirect()->back()->with(['success' => true]);
			}
		}

		return redirect()->back()->with(['errors' => false]);
	}

	/**
	 * Show form by enter new password
	 * @param  string $alias
	 * @param  string $verify verifica code
	 * @return \Illuminate\Http\Response
	 */
	public function update ($alias, $verify)
	{
		$user = User::where('verify', $verify)->first();

		return view('registrations::site.registrations.update', [
			'success' => (!is_null($user)) ? true : false,
			'updated' => false,
			'alias' => $alias,
			'verify' => $verify
		]);
	}

	/**
	 * Update password
	 * @param  string $alias
	 * @param  string $verify verifica code
	 * @return \Illuminate\Http\Response
	 */
	public function updatePassword ($alias, $verify)
	{
		$post = $this->validate(request(), [
			'password' => 'required|min:5|max:200',
			'confirm' => 'required|same:password',
		], trans('registrations::validation'));

		$user = User::where('verify', $verify)->firstOrFail();

		$response = Api::request('PUT', 'api/user/' . $user->id, [
			'password' => $post['password'],
			'verify' => ''
		]);

		return view('registrations::site.registrations.update', [
			'success' => ($response->id) ? true : false,
			'updated' => true,
			'alias' => $alias,
			'verify' => $verify
		]);
	}

}
