@extends('base')

@section('css')
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('main')

	<div class="container">
		<div class="py-5 text-center">
			<h2>{{ trans('registrations::translate.verify.form-name') }}</h2>
		</div>

		@if($success == false)
			<div class="row">
				<div class="col-md-8 m-auto">
					<div class="alert alert-danger" role="alert">
						{{ trans('registrations::translate.verify.error') }}
					</div>
				</div>
			</div>
		@endif

		@if($success == true)
			<div class="row">
				<div class="col-md-8 m-auto">
					<div class="alert alert-success" role="alert">
						{{ trans('registrations::translate.verify.success') }}
					</div>
				</div>
			</div>
		@endif

	</div>

@endsection
