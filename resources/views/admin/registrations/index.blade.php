@extends('avl.default')

@section('css')
	<link rel="stylesheet" href="/avl/js/jquery-ui/jquery-ui.min.css">
@endsection

@section('main')
	<div class="card">
		<div class="card-header">
			<i class="fa fa-align-justify"></i> {{ $section->name_ru }}
		</div>
		<div class="card-body">

			@if ($users)
				<div class="table-responsive">
					@php $iteration = 30 * ($users->currentPage() - 1); @endphp
					<table class="table table-bordered">
						<thead>
							<tr>
								<th width="50" class="text-center">#</th>
								<th width="50" class="text-center">Status</th>
								<th class="text-center">ФИО</th>
								<th class="text-center">Email</th>
								<th class="text-center">Телефон</th>
								<th class="text-center" style="width: 160px">Последний вход</th>
								<th class="text-center" style="width: 160px">Дата регистрации</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
								<tr class="position-relative">
									<td class="text-center">{{ ++$iteration }}</td>
									<td class="text-center"><i class="fa fa-circle {{ ($user->good) ? 'text-success' : 'text-danger' }}"></i></td>
									<td><a href="{{ route('adminreg::sections.reg.show', ['id' => $section->id, 'reg' => $user->id]) }}">{{ $user->fio }}</a></td>
									<td>{{ $user->email }}</td>
									<td>{{ formatPhone($user->mobile) }}</td>
									<td class="text-center">{{ $user->last_login ? date('Y-m-d H:i', strtotime($user->last_login)) : '' }}</td>
									<td class="text-center">{{ date('Y-m-d H:i', strtotime($user->created_at)) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>

					<div class="d-flex justify-content-end">
						{{ $users->appends($_GET)->links('vendor.pagination.bootstrap-4') }}
					</div>
				</div>
			@endif
		</div>
	</div>
@endsection
