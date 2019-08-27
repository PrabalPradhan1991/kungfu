@extends('backend.main')

@section('content')
<div class="row sierra-row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					{{-- <div class="d-flex align-items-center">
						<a href="{{ route('admin-stages-create-get') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-plus"></i>
							 Create Feature
						</a>
					</div>	--}}
			</div>
			{{-- <form method="post" action="{{ route('admin-stages-delete-multiple-post') }}" class="prabal-confirm" id="prabal-delete-form">
				{{ csrf_field() }}
				<input type="submit" class="prabal-checkbox-submit btn btn-danger" related-id="add-row" related-form="prabal-delete-form" value="Delete">
				<div class="place-for-id-checkbox"></div>
			</form> --}}
			<div class="card-body">
				@if(!empty($data))
				<div class="table-responsive">
					<table id="add-row" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">Sn</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Stage</th>
								<th>Expiration Date</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $index => $d)
								<tr>
									<td>{{-- <input type="checkbox" name="rid[]" value="{{ $d->id }}" class="id-checkbox"> --}}{{ $index + 1 }}</td>
									<td>{{ $d->username }}</td>
									<td>{{ $d->email }}</td>
									<td>{{ $d->phone }}</td>
									<td>@if(isset($user_stage_data[$d->user_id])) {{ $user_stage_data[$d->user_id]['stage'] }} @endif</td>
									<td>{{ $d->expiration_date }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				@else
					<div class="row">
						<div class="col-md-12">
							No data found
						</div>
					</div>
				@endif

				{{-- {{ $data->appends($input)->links() }} --}}
			</div>
		</div>
	</div>
</div>			
@stop
@section('custom-js')

@stop