<?php namespace Avl\SiteRegistrations\Controllers\Site\Cabinet;

use Avl\SiteRegistrations\Rules\EmailOrLoginRule;
	use App\Http\Controllers\Site\BaseController;
	use Illuminate\Support\Facades\Auth;
	use App\Models\{User, Roles};
	use Illuminate\Http\Request;
	use Carbon\Carbon;
	use Validator;
	use Api;

class AuthController extends BaseController
{

	/**
	 * Show auth form
	 * @return \Illuminate\Http\Response
	 */
	public function index ()
	{
		return view('registrations::site.cabinet.auth.index');
	}

	/**
	 * Authorization
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function auth (Request $request)
	{

		$validator = Validator::make($request->input(), [
			'email'    => [ 'required', new EmailOrLoginRule() ],
			'password' => 'required'
		], trans('registrations::validation'));

		if (!$validator->fails()) {

			$loginType = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'login';

			$role = Roles::whereName('guest')->first();

			Auth::attempt([
					$loginType => $request->input('email'),
					'password' => $request->input('password'),
					'role_id' => $role->id,
					'good' => 1
			], true);

			if ( Auth::check() ) {
				Api::request('PUT', 'api/user/' . Auth::id(), [
					'last_login' => Carbon::now()->format('Y-m-d H:i:s')
				]);

				return redirect()->route('cabinet.home');
			}

			$validator->errors()->add('password', 'Пароль введен не верно');
		}

		return redirect()->back()->withInput()->withErrors($validator);
	}

	public function logout (Request $request)
	{
		Auth::logout();
		$request->session()->flush();
		$request->session()->regenerate();
		return redirect()->route('site.home');
	}

}
