<?php namespace Avl\SiteRegistrations\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use Illuminate\Support\Facades\Auth;
use Avl\SiteRegistrations\Requests\ProfileRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class ProfileController extends BaseController
{

		/**
		 * Show profile page
		 * @return Illuminate\Http\Request
		 */
		public function index ()
		{
			return view('registrations::site.cabinet.profile.index', [
				'user' => Auth::user()
			]);
		}

		/**
		 * Update profile
		 * @return redirect to profile page
		 */
		public function update (ProfileRequest $request)
		{
			$response = \Api::request('PUT', 'api/user/' . Auth::id(), [
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

			return redirect()->back()->with('updated', ($response->id) ? true : false);
		}

		/**
		 * Show form to change password
		 * @return Illuminate\Http\Request
		 */
		public function password ()
		{
			return view('registrations::site.cabinet.profile.password', [
				'user' => Auth::user()
			]);
		}

		/**
		 * Update password
		 * @return redirect to auth form
		 */
		public function updatePassword (Request $request)
		{
			$post = $this->validate(request(), [
				'password' => 'required|min:5|max:200',
				'confirm' => 'required|same:password',
			], trans('registrations::validation'));

			$user = User::findOrFail(Auth::id());

			$response = \Api::request('PUT', 'api/user/' . $user->id, [
				'password' => $post['password'],
				'verify' => ''
			]);

			Auth::logout();
			$request->session()->flush();
			$request->session()->regenerate();

			return redirect()->route('cabinet.auth');
		}

}
