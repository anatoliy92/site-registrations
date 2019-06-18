@extends('base')

@section('css')
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('main')
	<div class="container">
		<div class="py-5 text-center">
			<h2>{{ trans('registrations::translate.restore.form-name') }}</h2>
		</div>

		<div class="row">
			<div class="col-md-8 m-auto">
			  @if (!session()->has('success'))
					<h4 class="mb-3 text-center">{!! trans('registrations::translate.restore.description') !!}</h4>

					{{ Form::open(['url' => route('reg.restore.post', ['alias' => $alias]), 'class' => 'needs-validation', 'novalidate' ]) }}
						<div class="row">

							<div class="col-12 mb-3">
								{{ Form::label('email', trans('registrations::translate.email')) }}
								{{ Form::text('email', null, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email', 'placeholder' => 'you@example.com']) }}
								<div class="invalid-feedback">{{ $errors->first('email') ?? 'Error filling the field' }}</div>
							</div>
						</div>

						<hr class="mb-4">

						<button class="btn btn-primary btn-lg btn-block" type="submit">{{ trans('registrations::translate.btn.restore') }}</button>
					{{ Form::close() }}
			  @else
			    <div class="form-box form-box-response">
			      <div class="form-response">
			        <div class="form-response-figure mb-20">
								<i class="fa fa-check-circle"></i>
			        </div>

			        <div class="form-response-text mb-20">
			          {!! trans('registrations::translate.restore.message') !!}
			        </div>
			      </div>
			    </div>
			  @endif
			</div>
		</div>
	</div>
@endsection
