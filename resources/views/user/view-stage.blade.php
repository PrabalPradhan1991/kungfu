@extends('user.main')


<style type="text/css">
    .chpass h2{margin-top: 0; text-transform: uppercase; color:red;}
    .chpass h3{margin-top: 0; text-transform: uppercase; font-size: 20px;}
    .chpass td a{color:#222; font-size: 16px;}
    .chpass video{width:100%;   height: auto; }
    .video-js .vjs-big-play-button {top: 39% !important; left: 37% !important;}
    .my-video-dimensions {
    width: 340px;
    height: 210px;
}
    .chpass .btn-default{margin-top: 10px;}


</style>

@section('content')
<link href="https://vjs.zencdn.net/7.6.0/video-js.css" rel="stylesheet">
 <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
<div class="col-md-9">
    <div class="chpass">

        <div class="row">
        	
        	<div class="col-md-8">
        		<div><h2><i class="fas fa-hand-point-right"></i> {{ $stage->stage_name }}</h2></div>
        		<div><h3>Price: {{ $stage->price }}</h3></div>
        		<p>
        			{!! nl2br($stage->stage_description) !!}
        		</p>
                <?php $status = (new \App\Http\Middleware\CheckStagePaymentStatus)->check(\Auth::user()->id, $stage->id, 'By Bank'); ?>
                @if(!$status['status'] && $status['purchase_status'] == 'purchased')
            		@if($selected_video)
            		<div class="row">
    	        		<div class="col-md-12 ">               
    	        			<video id='my-video' class='video-js ' controls preload='auto' data-setup='{}'>
    						    <source src="{{ route('get-video-from-filename', [$selected_video->video_filename, $video_id]) }}" type='{{ $selected_video->mime }}'>
    						    <p class='vjs-no-js'>
    						      To view this video please enable JavaScript, and consider upgrading to a web browser that
    						      <a href='https://videojs.com/html5-video-support/' target='_blank'>supports HTML5 video</a>
    						    </p>
    						</video>
    	        		</div>
            		</div>
            		@endif
                @elseif($status['purchase_status'] == 'review')
                    <p>Your payment is under review</p>
                @else
                    <form method="post" action="{{ route('buy-stage') }}">
                        <button type="submit" class="btn btn-default" name="payment_method" value="By Bank"><i class="fas fa-shopping-basket"></i> By Bank</button>
                        <button type="submit" class="btn btn-default" name="payment_method" value="By Paypal"><i class="fas fa-shopping-basket"></i> By Paypal</button>
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ \Auth::user()->id }}">
                        <input type="hidden" name="stage_id" value="{{ $stage->id }}">
                        <input type="hidden" name="return_url" value="{{ url()->current() }}">
                    </form>
                @endif
        	</div>
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