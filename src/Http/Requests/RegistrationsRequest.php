<?php namespace Avl\SiteRegistrations\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ValidationMobileRule;

class RegistrationsRequest extends FormRequest
{
		/**
		 * Determine if the user is authorized to make this request.
		 *
		 * @return bool
		 */
		public function authorize()
		{
				return true;
		}

		/**
		 * Get the validation rules that apply to the request.
		 *
		 * @return array
		 */
		public function rules()
		{
				return [
					'surname' => 'required|max:255',
					'name' => 'required|max:255',
					'patronymic' => 'max:255',
					'dob' => 'required|date_format:"d.m.Y"',
					'mobile' => [
						'required',
						'regex:/^\+7 \([0-9]{3}\) [0-9]{3}-[0-9]{2}-[0-9]{2}$/',
						new ValidationMobileRule()
					],
					'login' => 'required|regex:/^[a-z]+$/i|unique:users,login',
					'email' => 'required|email|unique:users,email',
					'password' => 'required|min:5|max:200',
					'confirm' => 'required|same:password',
				];
		}

		public function messages()
		{
				return trans('registrations::validation');
		}
}
