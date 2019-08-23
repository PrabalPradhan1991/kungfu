@extends('user.main')

@section('content')
<div class="col-md-9">
    <div class="chpass">

        <div class="row">
        	@foreach($stages as $s)
        	<div class="col-md-4">
        		<a href="{{ route('view-stage', $s->id) }}" class="btn btn-info btn-flat form-control">{{ $s->stage_name }}</a>
        	</div>
        	@endforeach
        </div>

    </div>
</div>
@stop