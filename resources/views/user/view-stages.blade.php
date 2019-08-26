@extends('user.main')

<style type="text/css">
	.chpass .stages{margin:10px 0; }
	.chpass .stage{margin:10px 0; line-height: 40px; background:#05A76F; font-size: 20px; color: #fff; text-align: center;  height: 50px; cursor: pointer; border-radius: 5px; border:1px solid #0ACE87; text-transform: uppercase; text-decoration: none; }
	.chpass .stage-disabled{margin:10px 0; line-height: 40px; background: #e9e9e9; font-size: 20px; 
		color:#999; text-align: center;  height: 50px; border-radius: 5px; border:1px solid #333; text-transform: uppercase; text-decoration: none; cursor: not-allowed;}
	.stages .btn-default{ width: 150px; height:36px; font-size: 14px; }
</style>

@section('content')
<div class="col-md-9">
    <div class="chpass">

        <div class="row">
        	@foreach($stages as $s)
        	<?php $check = (new \App\Http\Middleware\CheckStageAccess)->check(\Auth::user()->id, $s->id); ?>
        	<div class="col-md-4">
        		<div class="stages">
	        		<a @if($check) href="{{ route('view-stage', $s->id) }}" @endif class="btn btn-info btn-flat form-control @if($check) stage @else stage-disabled @endif"><i class="fas fa-hand-point-right"></i> {{ $s->stage_name }}</a>
	        		<form method="post" action="{{ route('reqeust-access-stage-post', $s->id) }}">
						<center>
							@if(\App\Http\Controllers\CoreModules\Videos\RequestModel::where('to_stage_id', $s->id)->where('user_id', \Auth::user()->id)->first())
								<p>Request Pending</p>
							@elseif($check == false)
								<button type="submit" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Request Access</button>
							@elseif($check)
							@endif
						</center>
						{{ csrf_field() }}
					</form>
				</div>
        	</div>
        	@endforeach
        </div>
    </div>
</div>
@stop