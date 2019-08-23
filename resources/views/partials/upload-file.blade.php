<?php $is_single = isset($is_single) ? $is_single : false; ?>
<link rel="stylesheet" href="{{ asset('core/plugins/jquery-ui/jquery-ui.min.css') }}">
<style type="text/css">
	.upload-btn-wrapper {
	  position: relative;
	  display: inline-block;
	  cursor: pointer;
	  margin-right: 7px;
	}
.upload-btn-wrapper .progress{margin-top: 4px;}
.loading, .img-block,	.btn-upload {
	  border: 2px solid #aaa;
	  color: gray;
	  background-color: white;
	  height: 95px;
	  width: 95px;
	  border-radius: 8px !important;
	  font-size: 20px;
	  font-weight: bold;
	  text-align: center;
	}

	.loading ,.btn-upload{padding: 3px; height: 95px; width: 95px;}
	.loading img{text-align: center;vertical-align: middle;}
	.btn-upload img{padding-left: 5px;}
	.img-block img{padding: 3px; max-width: 100%; height: -webkit-fill-available;}
	.upload-btn-wrapper input[type=file] {
	  font-size: 100px;
	  position: absolute;
	  left: 0;
	  top: 0;
	  opacity: 0;
	}
	.input-upload-file { height: 100%; width: 100%; cursor: pointer }
	.btn-image{background: none; border:none; position: absolute; color: #aaa; font-size: 18px; top:3px;}
	.btn-rotate{left:-2px;  /*display: none;*/ transition: 0.4s all; z-index:9999;}
	.btn-remove{right: 0px; /*display: none;*/ transition: 0.4s all; z-index: 9999;}
	.upload-btn-wrapper:hover .btn-remove{ display: initial;}
	.upload-btn-wrapper:hover .btn-rotate{ display: initial;}
	.none{display:none;}
	.button-add-image-group{display: block; margin:15px 0;}
	.button-add-image-group .button-add{cborder-radius: 4px; color: #fff !important; font-weight: bold; padding:4px 6px; background: #17a2b8; font-family: roboto;; transition: 0.4s all;}
	.button-add-image-group .button-add:hover{opacity: 0.8;}
</style>
<div id="prabal-ajax-upload-image-add-element-add-images" class="none">
	<div class="upload-btn-wrapper prabal-added-images">
		<button type="button"class="btn-image btn-remove"><i class="fas fa-times-circle"></i></button>
		<div class="upload-btn-wrapper-child">
			
			<button class="btn-upload"><img src="{{ asset('core/images/upload_plus.png') }}"></button>
		  	<input type="file" class="input-upload-file-prabal-added-images form-control"  multiple/>
		  	<span class="error-block">
			</span>
		</div>
	  	<div class="progress">
			<div class="progress-bar initial" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">
			</div>
		</div>
	</div>
</div>
<?php $display_upload_button = true; ?>
<div class="img-responsive" id="prabal-ajax-upload-image">
	<?php  
		
		$_images = [];

		foreach($images as $i) {
			if(!is_null($i->image)) {
				$_images[] = $i;
			}
		}

		$images = $_images;
		unset($_images);
	?>
	<div class="upload-btn-wrapper" id="main-upload-btn-wrapper" @if($max_no_of_images == 1 && $images) style="display: none" @endif>

		<div class="upload-btn-wrapper-child">
			
			<button class="btn-upload"><img src="{{ asset('core/images/upload_plus.png') }}"></button>
		  	<input type="file" class="input-upload-file form-control" @if($max_no_of_images != 1) multiple @endif/>
		  	<span class="error-block">
			</span>
		</div>
	</div>

	<input type="hidden" id="prabal-ajax-upload-image-post" value="{{ route('ajax-upload-image-post') }}">
	<input type="hidden" id="prabal-ajax-upload-image-directory" value="{{ $directory }}">
	<input type="hidden" id="prabal-ajax-upload-image-asset-type" value="{{ $asset_type }}">
	<input type="hidden" id="prabal-ajax-upload-image-loading-image" value="{{ asset('core/images/giphy.gif') }}">
	<input type="hidden" id="prabal-ajax-upload-image-csrf-token" value="{{ csrf_token() }}">
	<input type="hidden" id="prabal-ajax-upload-image-max-no" value="{{ $max_no_of_images }}">
	
	@foreach($images as $i)
		<div class="upload-btn-wrapper prabal-added-images uploaded_image">
			<button type="button" class="btn-image btn-remove"><i class="fas fa-times-circle"></i></button>
			<div class="upload-btn-wrapper-child"><button type="button" class="btn-image btn-rotate"><i class="fas fa-undo"></i></button><div class="img-block"><img src="{{ route('get-image-asset-type-filename', [$asset_type, $i->image]) }}?v={{ str_random(5) }}"></div><input type="hidden" name="image[]" value="{{ $i->image }}"><input type="hidden" name="clockwise[]" class="pra_clockwise_value" value="0"></div>
		  	<div class="progress" style="display: flex; visibility: hidden;">
				<div class="progress-bar initial bg-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%; opacity: 0;">
				</div>
			</div>
		</div>
	@endforeach
</div>
<?php 
	/*\App\Http\Controllers\HelperController::addJsFile("backend_js", "https://code.jquery.com/ui/1.12.0/jquery-ui.min.js", NULL, "sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=", "anonymous"); */
	\App\Http\Controllers\HelperController::addJsFile("backend_js", asset('core/js/touch-punch.min.js'), 'text/javascript');
	\App\Http\Controllers\HelperController::addJsFile("backend_js", asset('core/js/prabal-image-upload.js'), 'text/javascript');
?>
<!-- <script
  src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"
  integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E="
  crossorigin="anonymous"></script> -->

<!-- <script src="{{ asset('core/js/touch-punch.min.js') }}" type="text/javascript"></script> -->
<!-- <script src="{{ asset('core/js/prabal-image-upload.js') }}" type="text/javascript"></script> -->