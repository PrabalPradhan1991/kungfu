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
								<th>Title</th>
								<th>Ordering</th>
								<th style="width: 100px">Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($data as $index => $d)
								<tr>
									<td>{{-- <input type="checkbox" name="rid[]" value="{{ $d->id }}" class="id-checkbox"> --}}{{ $index + 1 }}</td>
									<td>{{ $d->stage_name }}</td>
									<td>{{ $d->ordering }}</td>
									<td>
										<div class="form-button-action">
											{{-- <form method="post" action="{{ route('admin-stages-delete-post', $d->id) }}" class="prabal-confirm">
												{{ csrf_field() }}
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
												<i class="fa fa-times"></i>
											</button>
											</form> --}}
											<a href="{{ route('admin-stages-edit-get', $d->id) }}" data-toggle="tooltip" title="Edit Stage" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Stage"><i class="fa fa-edit"></i>Edit Stage</a>
											<a href="{{ route('admin-stages-add-videos-get', $d->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Add Videos"><i class="fa fa-edit"></i>Add Videos</a>
											<a href="{{ route('admin-stages-add-pdfs-get', $d->id) }}" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Add PDFs"><i class="fa fa-edit"></i>Add Pdfs</a>
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