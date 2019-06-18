@extends('registrations::site.cabinet.cabinet')

@section('cabinetTitle')
	<b>Профиль</b> - смена пароля
@endsection

@section('cabinetBody')
	<div class="row">

		<div class="col-12">

			{{ Form::open(['url' => route('cabinet.profile.updatePassword'), 'class' => 'needs-validation', 'novalidate' ]) }}
				<div class="row mb-4">
					<div class="col-md-6 mb-3">
						{{ Form::label('password', trans('registrations::translate.password') . ' *') }}
						{{ Form::password('password', ['id' => 'password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
						<div class="invalid-feedback">{{ $errors->first('password') ?? 'Error filling the field' }}</div>
					</div>

					<div class="col-md-6 mb-3">
						{{ Form::label('confirm', trans('registrations::translate.confirm') . ' *') }}
						{{ Form::password('confirm', ['id' => 'confirm', 'class' => 'form-control' . ($errors->has('confirm') ? ' is-invalid' : '')]) }}
						<div class="invalid-feedback">{{ $errors->first('confirm') ?? 'Error filling the field' }}</div>
					</div>
				</div>

				<button class="btn btn-primary btn-lg btn-block" type="submit">Обновить пароль</button>
			{{ Form::close() }}

		</div>

	</div>
@endsection
