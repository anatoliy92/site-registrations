<?php namespace Avl\SiteRegistrations\Rules;


use Illuminate\Contracts\Validation\Rule;
use App\Models\User;

class EmailOrLoginRule implements Rule
{
		/**
		 * Create a new rule instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
				//
		}

		/**
		 * Determine if the validation rule passes.
		 *
		 * @param  string $attribute
		 * @param  mixed  $value
		 * @return bool
		 */
		public function passes($attribute, $value)
		{
			$user = User::where('email', $value)->orWhere('login', $value)->first();

			return (!is_null($user)) ? true : false;
		}

		/**
		 * Get the validation error message.
		 *
		 * @return string
		 */
		public function message()
		{
			return 'Пользователь не найден';
		}
}
