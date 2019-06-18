<?php namespace Avl\SiteRegistrations\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use View;
use Auth;

class HomeController extends BaseController
{

		/**
		 * Показать форму входа
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index ()
		{
			return view('registrations::site.cabinet.home');
		}

}
