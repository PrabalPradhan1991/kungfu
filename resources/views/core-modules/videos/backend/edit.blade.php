@extends('backend.main')
<style type="text/css">
	.subscriptionrequest{text-align: center; margin-top: 20px; }
	.subscriptionrequest h1{color:#0E4F88; font-size:36px; border-bottom: 2px #0E4F88 solid; padding-bottom: 10px;}
		.subscriptionrequest p{font-size: 16px; font-weight: bold;}

</style>
@section('content')
<div class="row sierra-row">	
	<div class="col-md-12">
		<div class="card">
			<div class="row">
				<div class="col-md-12">
					<div class="subscriptionrequest">
						<h1>Edit Stage</h1>
					</div>	
				</div>		
			</div>
			<div class="card-header">
					<div class="d-flex align-items-center">
						<a href="{{ route('admin-stages-list-get') }}" class="btn btn-primary btn-round ml-auto">
							<i class="fa fa-list"></i>&nbsp;
							 List Stages
						</a>
					</div>	
			</div>

			<form method="post" enctype="multipart/form-data">
				<div class="card-body">
					<div class="col-sm-10">
						<div class="form-group">
							<label for="stage_name">Stage Name</label>
							<input id="stage_name" type="text" name="stage[stage_name]" class="form-control stage_name" required value="{{ $data->stage_name }}">
							<span class="error-block">	@if($errors->has('stage_name'))
								@foreach($errors->get('stage_name') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						
						<div class="form-group">
							<label for="description">Price {{ CURRENCY }}</label>
							<input name="stage[price]" class="form-control" type="number" value="{{ $data->price }}"/>
							<span class="error-block">	@if($errors->has('price'))
								@foreach($errors->get('price') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>
						
						<div class="form-group">
							<label for="description">Description</label>
							<textarea name="stage[stage_description]" class="form-control" rows="5">{{ $data->stage_description }}</textarea>
							
							<span class="error-block">	@if($errors->has('stage_description'))
								@foreach($errors->get('stage_description') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
							</span>
						</div>

						{{-- <div class="form-group">
							<label for="ordering">Ordering</label>
							<input id="ordering" type="number" name="stage[ordering]" step=1 min=0 class="form-control ordering" value="{{ $data->ordering }}" required>
							@if($errors->has('ordering'))
								@foreach($errors->get('ordering') as $e)
									<p>{{ $e }}</p>
								@endforeach
							@endif
						</div> --}}


					</div>	
				</div>
			{{ csrf_field() }}
				<div class="card-action">
					<div class="col-sm-5">				
						<button type="submit" class="btn btn-success">Edit</button>
					</div>	
				</div>
			</form>
		</div>
	</div>
</div>			
@stop