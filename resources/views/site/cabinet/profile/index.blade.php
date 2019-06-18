@extends('registrations::site.cabinet.cabinet')

@section('cabinetTitle')
	<b>Профиль</b> - {{ $user->fio }}
@endsection

@section('cabinetBody')
	<div class="row">

		<div class="col-3">
			<div class="img-thumbnail w-100">
				<img src="{{ asset('site/img/no-image.png') }}" alt="..." class="">
			</div>
		</div>

		<div class="col-9">

			@if (session('updated') === true)
				<div class="alert alert-success" role="alert">
					Данные профиля успешно сохранены
				</div>
			@else
				@if (session('updated') === false)
					<div class="alert alert-danger" role="alert">
						Произошла внутренняя ошибка.
					</div>
				@endif
			@endif

			{{ Form::open(['url' => route('cabinet.profile.update'), 'class' => 'needs-validation', 'novalidate' ]) }}

				<div class="row">

					<div class="col-md-4 mb-3">
						{{ Form::label('surname', trans('registrations::translate.surname') . ' *') }}
						{{ Form::text('surname', $user->surname ?? null, ['id' => 'surname', 'class' => 'form-control'. ($errors->has('surname') ? ' is-invalid' : '')]) }}
						<div class="invalid-feedback">{{ $errors->first('surname') ?? 'Error filling the field' }}</div>
					</div>

					<div class="col-md-4 mb-3">
						{{ Form::label('name', trans('registrations::translate.name') . ' *') }}
						{{ Form::text('name', $user->name ?? null, ['id' => 'name', 'class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '')]) }}
						<div class="invalid-feedback">{{ $errors->first('name') ?? 'Error filling the field' }}</div>
					</div>

					<div class="col-md-4 mb-3">
						{{ Form::label('patronymic', trans('registrations::translate.patronymic')) }}
						{{ Form::text('patronymic', $user->patronymic ?? null, ['id' => 'patronymic', 'class' => 'form-control'. ($errors->has('patronymic') ? ' is-invalid' : '')]) }}
						<div class="invalid-feedback">{{ $errors->first('patronymic') ?? 'Error filling the field' }}</div>
					</div>

				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						{{ Form::label('dob', trans('registrations::translate.dob')) }}
						{{ Form::text('dob', date('d.m.Y', strtotime($user->dob)) ?? null, ['id' => 'dob', 'class' => 'form-control'. ($errors->has('dob') ? ' is-invalid' : ''), 'placeholder' => '01.05.1990']) }}
						<div class="invalid-feedback">{{ $errors->first('dob') ?? 'Error filling the field' }}</div>
					</div>

					<div class="col-md-6 mb-3">
						{{ Form::label('mobile', trans('registrations::translate.mobile') . ' *') }}
						{{ Form::text('mobile', formatPhone($user->mobile) ?? null, ['id' => 'mobile', 'class' => 'form-control'. ($errors->has('mobile') ? ' is-invalid' : ''), 'placeholder' => '+7 (777) 123-45-67']) }}
						<div class="invalid-feedback">{{ $errors->first('mobile') ?? 'Error filling the field' }}</div>
					</div>
				</div>

				<hr class="mb-4">

				<div class="row">
					<div class="col-md-6 mb-3">
						{{ Form::label('login', trans('registrations::translate.login') . ' *') }}
						<div class="input-group">
							<div class="input-group-prepend"><span class="input-group-text">@</span></div>
							{{ Form::text('login', $user->login, ['id' => 'login', 'class' => 'form-control'. ($errors->has('login') ? ' is-invalid' : ''), 'placeholder' => 'Логин']) }}
							<div class="invalid-feedback">{{ $errors->first('login') ?? 'Error filling the field' }}</div>
						</div>
					</div>

					<div class="col-md-6 mb-3">
						{{ Form::label('email', trans('registrations::translate.email') . ' *') }}
						{{ Form::text('email', $user->email, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email', 'placeholder' => 'you@example.com']) }}
						<div class="invalid-feedback">{{ $errors->first('email') ?? 'Error filling the field' }}</div>
					</div>
				</div>

				<hr class="mb-4">

				<button class="btn btn-primary btn-lg btn-block" type="submit">{{ trans('registrations::translate.btn.save') }}</button>
			{{ Form::close() }}

		</div>

	</div>
@endsection
