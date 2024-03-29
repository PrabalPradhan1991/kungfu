@extends('user.main')

<style type="text/css">
	.chpass .stages{margin:10px 0; }
	.chpass .stage{margin:10px 0; line-height: 40px; background:#05A76F; font-size: 20px; color: #fff; text-align: center;  height: 50px; cursor: pointer; border-radius: 5px; border:1px solid #0ACE87; text-transform: uppercase; text-decoration: none; }
	.chpass .stage-disabled{margin:10px 0; line-height: 40px; background: #e9e9e9; font-size: 20px; 
		color:#999; text-align: center;  height: 50px; border-radius: 5px; border:1px solid #333; text-transform: uppercase; text-decoration: none; cursor: not-allowed;}
	.stages .btn-default{ width: 150px; height:36px; font-size: 14px; }
	.chpass p span{color: red; font-weight: bold; font-size: 13px;}
</style>

@section('content')
<div class="col-md-9">
    <div class="chpass">
    	
        <div class="row">
        	<div class="col-md-12 grading">
	        	<h2><i class="fas fa-bacon"></i> Grading System:</h2>
	    		<p>Access to the grading system is allowed in stages. one needs to complete a sash & request access in order to progress to the next stage.</p>	
        	</div>
        	@foreach($stages as $index => $s)
        	<?php $check = (new \App\Http\Middleware\CheckStageAccess)->check(\Auth::user()->id, $s->id); ?>
        	<div class="col-md-4">
        		<div class="stages">
	        		<a @if($check) href="{{ route('view-stage', $s->id) }}" @endif class="btn btn-info btn-flat form-control @if($check) stage @else stage-disabled @endif" style="background: {{ $s->color  }} !important; color: #999">@if($check)<i class="fas fa-hand-point-right">@else<i class="fas fa-ban"></i>@endif</i> {{ $s->stage_name }}</a>
	        		<form method="post" action="{{ route('reqeust-access-stage-post', $s->id) }}">
						<center>
							@if(\App\Http\Controllers\CoreModules\Videos\RequestModel::where('to_stage_id', $s->id)->where('user_id', \Auth::user()->id)->first())
								<p><span>Request Pending<span></p>
							@elseif($check == false && $index == 0)
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

