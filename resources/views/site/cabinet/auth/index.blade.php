@extends('base')

@section('css')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('main')
	<div class="container">
		<div class="py-5 text-center">
			<h2>{{ trans('registrations::translate.auth.form-name') }}</h2>
		</div>

		<div class="row">

			<div class="col-md-6 m-auto">
				{{-- <form class="needs-validation" novalidate> --}}
				{{ Form::open(['url' => route('cabinet.auth.login'), 'class' => 'needs-validation', 'novalidate' ]) }}
					<div class="row">
						<div class="col-12 mb-4 text-center">
							{!! trans('registrations::translate.auth.invitation') !!}
						</div>
					</div>

					<div class="row">
						<div class="col-12 mb-3">
							{{ Form::label('email', trans('registrations::translate.auth.login')) }}
							{{ Form::text('email', null, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email']) }}
							<div class="invalid-feedback">{{ $errors->first('email') ?? 'Error filling the field' }}</div>
						</div>

						<div class="col-12 mb-3">
							{{ Form::label('password', trans('registrations::translate.password')) }}
							{{ Form::password('password', ['id' => 'password', 'class' => 'form-control' . ($errors->has('password') ? ' is-invalid' : '')]) }}
							<div class="invalid-feedback">{{ $errors->first('password') ?? 'Error filling the field' }}</div>
						</div>
					</div>

					<button class="btn btn-primary btn-lg btn-block" type="submit">{{ trans('registrations::translate.btn.enter') }}</button>

					<div class="row">
						<div class="col-12 mt-4 text-center">
							{!! trans('registrations::translate.auth.restore') !!}
						</div>
					</div>
				{{ Form::close() }}
			</div>
		</div>

	</div>


@endsection
