@extends('base')

@section('css')
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('main')
	<div class="container">
		<div class="py-5 text-center">
			<h2>{{ trans('registrations::translate.update.form-name') }}</h2>
		</div>

		<div class="row">
			<div class="col-md-8 m-auto">
				@if ($success == true)
					@if ($updated == false)

						{{ Form::open(['url' => route('reg.restore.updatePassword', ['alias' => $alias, 'verify' => $verify]), 'class' => 'needs-validation', 'novalidate' ]) }}
							<div class="row">
								<div class="col-12 mb-3">
									{{ Form::label('password', trans('registrations::translate.update.password')) }}
									{{ Form::password('password', ['class' => 'form-control'. ($errors->has('password') ? ' is-invalid' : ''), 'id' => 'password']) }}
									<div class="invalid-feedback">{{ $errors->first('password') ?? 'Error filling the field' }}</div>
								</div>

								<div class="col-12 mb-3">
									{{ Form::label('confirm', trans('registrations::translate.update.confirm')) }}
									{{ Form::password('confirm', ['class' => 'form-control'. ($errors->has('confirm') ? ' is-invalid' : ''), 'id' => 'confirm']) }}
									<div class="invalid-feedback">{{ $errors->first('confirm') ?? 'Error filling the field' }}</div>
								</div>
							</div>

							<button class="btn btn-primary btn-lg btn-block" type="submit">{{ trans('registrations::translate.btn.update') }}</button>
						{{ Form::close() }}
					@else
						{{ trans('registrations::translate.update.success') }}
					@endif
				@else
					<div class="text-center">
						{{ trans('registrations::translate.update.error') }}
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection
