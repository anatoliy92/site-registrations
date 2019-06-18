<?php namespace Avl\SiteRegistrations\Controllers\Admin;

use App\Http\Controllers\Avl\AvlController;
	use Illuminate\Http\Request;
	use App\Models\{User, Sections};
	use Carbon\Carbon;


class RegistrationsController extends AvlController
{

	/**
	 * Show list registered users
	 * @param  integer  $id
	 * @param  Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function index ($id, Request $request)
	{
		$section = Sections::whereId($id)->first();

		$this->authorize('view', $section);

		$users = User::whereHas('role', function ($query) {
			$query->whereName('guest');
		});

		return view('registrations::admin.registrations.index', [
			'users' => $users->latest()->paginate(30),
			'section' => $section
		]);
	}

	/**
	 * Show user info
	 * @param  integer $id
	 * @return \Illuminate\Http\Response
	 */
	public function show ($id, $userId)
	{
		$section = Sections::whereId($id)->first();

		$this->authorize('view', $section);

		return view('registrations::admin.registrations.show', [
			'user' => User::findOrFail($userId),
			'section' => $section
		]);
	}

}
