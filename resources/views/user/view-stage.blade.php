@extends('user.main')


<style type="text/css">
    .chpass h2{margin-top: 0; font-weight: bold; text-decoration: underline; color:red; text-align: center;}
    .chpass h2 i{margin-right: 10px;}
    .chpass h3{margin-top: 0; text-transform: uppercase; font-size:16px; font-weight: bold; text-align: center;}
    .chpass h4{margin-top: 0;  font-size:20px; font-weight: bold; color: red;}
    .chpass td a{color:#222; font-size: 16px;}
    .chpass video{width:100%;   height: auto; }
    .video-js .vjs-big-play-button {top: 41% !important; left: 42% !important;}
    .my-video-dimensions {
    width: 100%;
    height:303px;
    margin-bottom: 10px;
}
    .chpass .btn-default{margin-top: 10px;}
    .chpass p span{color: red; font-weight: bold; font-size: 13px;}



</style>

@section('content')
<link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
 <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<div class="col-md-9">
    <div class="chpass">

        <div class="row">
        	
        	<div class="col-md-8">
        		<div><h2><i class="fas fa-hand-point-right"></i>{{ $stage->stage_name }}</h2></div>
        		<div><h3>Price:{{ CURRENCY }} {{ $stage->price }}</h3></div>
        		
                <?php $status = (new \App\Http\Middleware\CheckStagePaymentStatus)->check(\Auth::user()->id, $stage->id, 'By Bank'); ?>
                @if(!$status['status'] && $status['purchase_status'] == 'purchased')
            		@if($selected_video)
            		<div class="row">
                        
    	        		<div class="col-md-12 ">               
    	        			<video id='my-video' class='video-js' controls preload='auto' data-setup='{}'>
    						    <source src="{{ route('get-video-from-filename', [$selected_video->video_filename, $video_id]) }}" type='{{ $selected_video->mime }}'>
    						    <p class='vjs-no-js'>
    						      To view this video please enable JavaScript, and consider upgrading to a web browser that
    						      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
    						    </p>
    						</video>
                                <center><p><b>{{ $selected_video->title }}</b></p></center>

    	        		</div>
                        <div class="col-md-12">
                            <h4>Description</h4>
                            <p>
                                {!! nl2br($stage->stage_description) !!}
                            </p>
                        </div>
                        
            		</div>
            		@endif
                @elseif($status['purchase_status'] == 'review')
                    <p>Your payment is under review</p>
                @else
                    <form method="post" action="{{ route('buy-stage') }}">
                        fsdf
                        <button type="submit" class="btn btn-default" name="payment_method" value="By Bank"><i class="fas fa-shopping-basket"></i> By Bank</button>
                        <button type="submit" class="btn btn-default" name="payment_method" value="By Paypal"><i class="fas fa-shopping-basket"></i> By Paypal</button>
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                        <input type="hidden" name="stage_id" value="{{ $stage->id }}">
                        <input type="hidden" name="return_url" value="{{ url()->current() }}">
                    </form>
                @endif
        	</div>

            @if(!$status['status'] && $status['purchase_status'] == 'purchased')
        	<div class="col-md-4">
        		<table class="table table-striped table-bordered">
        			<tbody>
        				<tr>
        					<th>SN</th>
        					<th>Videos</th>
        				</tr>
        				@foreach($videos as $index => $v)
        					<tr>
        						<td>{{ $index + 1 }}</td>
        						<td><a href="{{ route('view-stage', [$stage_id, $v->id]) }}">{{ $v->title }} </a></td>
        					</tr>
        				@endforeach
        				<tr>
        					<th>SN</th>
        					<th>PDFs</th>
        				</tr>
        				@foreach($pdfs as $index => $v)
        					<tr>
        						<td>{{ $index + 1 }}</td>
        						<td><a href="{{ route('get-asset', ['pdf', $v->pdf_filename]) }}" target="_blank">{{ $v->title }} </a></td>
        					</tr>
        				@endforeach
        			</tbody>
        		</table>
        	</div>
            <div class="col-md-12">
                <?php $next_stage = (new \App\Http\Controllers\CoreModules\Videos\StageModel)->getNextStage($stage->id); ?>
                @if(!is_null($next_stage))
                    <form method="post" action="{{ route('reqeust-access-stage-post', $next_stage->id) }}">
                        <center>
                            <?php $check = (new \App\Http\Middleware\CheckStageAccess)->check(\Auth::user()->id, $next_stage->id); ?>
                            @if(\App\Http\Controllers\CoreModules\Videos\RequestModel::where('to_stage_id', $next_stage->id)->where('user_id', \Auth::user()->id)->first())
                                <p><span>Request Pending<span></p>
                            @elseif($check == false)
                            <p></p>
                                <button type="submit" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Request Access To  {{ $next_stage->stage_name }}</button>

                            @elseif($check)
                            @endif
                        </center>
                        {{ csrf_field() }}
                    </form>
                @endif
            </div>
            @endif
        </div>

    </div>
    

</div>
@stop
@section('custom-js')
	<script src='https://vjs.zencdn.net/7.6.0/video.js'></script>
	<script>
		$('#my-video').bind("contextmenu",function(e){
	      return false ;
	   	});
	</script>
@stop