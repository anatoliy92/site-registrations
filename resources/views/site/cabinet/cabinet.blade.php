@extends('base')

@section('css')
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection

@section('main')
	<div class="container">

		<div class="py-5 text-center">
			<h2>Cabinet</h2>
		</div>

		<div class="row">
			
			<div class="col-3">
				@include('registrations::site.cabinet.snippets.menu')
			</div>

			<div class="col-9">
				<div class="card">
					<div class="card-header">
						@yield('cabinetTitle')
					</div>
					<div class="card-body">
						@yield('cabinetBody')
					</div>
				</div>
			</div>

		</div>
	</div>
@endsection
