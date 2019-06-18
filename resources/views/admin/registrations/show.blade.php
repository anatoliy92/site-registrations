@extends('avl.default')

@section('css')
	<link rel="stylesheet" href="/avl/js/jquery-ui/jquery-ui.min.css">
@endsection

@section('main')
	<div class="card">
		<div class="card-header">
			<i class="fa fa-align-justify"></i> {{ $section->name_ru }}
			<div class="card-actions">
				<a href="{{ route('adminreg::sections.reg.index', ['id' => $section->id]) }}" class="btn btn-default pl-3 pr-3" title="Назад"><i class="fa fa-arrow-left"></i></a>
			</div>
		</div>
		<div class="card-body">

			<div class="row">

				<div class="col-md-4 mb-3">
					{{ Form::label('surname', 'Фамилия *') }}
					{{ Form::text('surname', $user->surname ?? null, ['id' => 'surname', 'class' => 'form-control'. ($errors->has('surname') ? ' is-invalid' : '')]) }}
					<div class="invalid-feedback">{{ $errors->first('surname') ?? 'Error filling the field' }}</div>
				</div>

				<div class="col-md-4 mb-3">
					{{ Form::label('name', 'Имя *') }}
					{{ Form::text('name', $user->name ?? null, ['id' => 'name', 'class' => 'form-control'. ($errors->has('name') ? ' is-invalid' : '')]) }}
					<div class="invalid-feedback">{{ $errors->first('name') ?? 'Error filling the field' }}</div>
				</div>

				<div class="col-md-4 mb-3">
					{{ Form::label('patronymic', 'Отчество') }}
					{{ Form::text('patronymic', $user->patronymic ?? null, ['id' => 'patronymic', 'class' => 'form-control'. ($errors->has('patronymic') ? ' is-invalid' : '')]) }}
					<div class="invalid-feedback">{{ $errors->first('patronymic') ?? 'Error filling the field' }}</div>
				</div>

			</div>

			<div class="row">
				<div class="col-md-6 mb-3">
					{{ Form::label('dob', 'Дата рождения') }}
					{{ Form::text('dob', date('d.m.Y', strtotime($user->dob)) ?? null, ['id' => 'dob', 'class' => 'form-control'. ($errors->has('dob') ? ' is-invalid' : ''), 'placeholder' => '01.05.1990']) }}
					<div class="invalid-feedback">{{ $errors->first('dob') ?? 'Error filling the field' }}</div>
				</div>

				<div class="col-md-6 mb-3">
					{{ Form::label('mobile', 'Телефон *') }}
					{{ Form::text('mobile', formatPhone($user->mobile) ?? null, ['id' => 'mobile', 'class' => 'form-control'. ($errors->has('mobile') ? ' is-invalid' : ''), 'placeholder' => '+7 (777) 123-45-67']) }}
					<div class="invalid-feedback">{{ $errors->first('mobile') ?? 'Error filling the field' }}</div>
				</div>
			</div>

			<hr class="mb-4">

			<div class="row">
				<div class="col-md-6 mb-3">
					{{ Form::label('login', 'Логин *') }}
					<div class="input-group">
						<div class="input-group-prepend"><span class="input-group-text">@</span></div>
						{{ Form::text('login', $user->login, ['id' => 'login', 'class' => 'form-control'. ($errors->has('login') ? ' is-invalid' : ''), 'placeholder' => 'Логин']) }}
						<div class="invalid-feedback">{{ $errors->first('login') ?? 'Error filling the field' }}</div>
					</div>
				</div>

				<div class="col-md-6 mb-3">
					<label for="email">Email *</label>
					{{ Form::text('email', $user->email, ['class' => 'form-control'. ($errors->has('email') ? ' is-invalid' : ''), 'id' => 'email', 'placeholder' => 'you@example.com']) }}
					<div class="invalid-feedback">{{ $errors->first('email') ?? 'Error filling the field' }}</div>
				</div>
			</div>

		</div>
	</div>
@endsection
