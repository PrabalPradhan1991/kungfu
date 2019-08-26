@extends('backend.main')

@section('content')
<div class="row sierra-row">	
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
					<div class="d-flex align-items-center">
						Requests
					</div>
			</div>
			
			<div class="card-body">
				@if(!empty($data))
				<div class="table-responsive">
					<table id="add-row" class="table table-bordered table-striped">
						<thead>
							<tr>
								<th style="width: 10px">Sn</th>
								<th>User</th>
								<th>Email</th>
								<th>To Stage</th>
								<th>Description</th>
								<th style="width: 100px">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $index => $d)
								<tr>
									<td>{{ $index + 1 }}</td>
									<td>{{ $d->name }}</td>
									<td>{{ $d->email }}</td>
									<td>{{ $d->to_stage }}</td>
									<td>{{ $d->description }}</td>
									<td>
										<div class="form-button-action">
											<form method="post" action="{{ route('admin-stage-requests-post', ['approved', $d->id]) }}" class="prabal-confirm">
												{{ csrf_field() }}
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Approve">
												<i class="fa fa-check"></i>
												</button>
											</form>
											<form method="post" action="{{ route('admin-stage-requests-post', ['disapproved', $d->id]) }}" class="prabal-confirm">
												{{ csrf_field() }}
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Disapprove">
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