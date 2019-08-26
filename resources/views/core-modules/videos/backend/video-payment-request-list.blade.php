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
			<form method="post" action="{{ route('admin-stages-delete-multiple-post') }}" class="prabal-confirm" id="prabal-delete-form">
				{{ csrf_field() }}
				<input type="submit" class="prabal-checkbox-submit btn btn-danger" related-id="add-row" related-form="prabal-delete-form" value="Delete">
				<div class="place-for-id-checkbox"></div>
			</form>
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
								<th>Created At</th>
								<th style="width: 100px">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $index => $d)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $d->name }}</td>
									<td>{{ $d->email }}</td>
									<td>{{ $d->phone }}</td>
									<td>{{ $d->stage_name }}</td>
									<td>{{ $d->created_at }}</td>
									<td>
										<div class="form-button-action">
											<form method="post" action="{{ route('admin-video-payment-request-post', [$d->id, 'approved']) }}" class="prabal-confirm">
												{{ csrf_field() }}
												<button type="submit" data-toggle="tooltip" title="Approve" class="btn btn-link btn-danger" data-original-title="Approve">
												<i class="fa fa-check"></i>
												</button>
											</form>
											<form method="post" action="{{ route('admin-video-payment-request-post', [$d->id, 'disapproved']) }}" class="prabal-confirm">
												{{ csrf_field() }}
												<button type="submit" data-toggle="tooltip" title="Disapprove" class="btn btn-link btn-danger" data-original-title="Disapprove">
												<i class="fa fa-times"></i>
												</button>
											</form>
										</div>			
									</td>
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