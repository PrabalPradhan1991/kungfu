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
						<h1>Add/Edit PDF</h1>
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
			
			<form method="post" action="{{ route('admin-pdfs-delete-multiple-post') }}" class="prabal-confirm" id="prabal-delete-form">
				{{ csrf_field() }}
				<input type="submit" class="prabal-checkbox-submit btn btn-danger" related-id="add-row" related-form="prabal-delete-form" value="Delete">
				<div class="place-for-id-checkbox"></div>
			</form>
			
				<div class="card-body">
					<div class="col-sm-12">
						@if(!empty($pdfs))
							@foreach($pdfs as $v)
								<form method="post" id="admin-pdfs-delete-post-{{ $v->id }}" action="{{ route('admin-pdfs-delete-post', $v->id) }}" class="prabal-confirm">
									{{ csrf_field() }}
								</form>
							@endforeach
				<div class="table-responsive">
					<form method="post" action="{{ route('admin-edit-pdfs-get') }}">
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
								@foreach($pdfs as $index => $d)
									<tr>
										<td><input type="checkbox" name="rid[]" value="{{ $d->id }}" class="id-checkbox">{{ $index + 1 }}</td>
										<td><input type="text" name="pdf[{{ $d->id }}][title]" value="{{ $d->title }}"></td>
										<td><input type="number" name="pdf[{{ $d->id }}][ordering]" value="{{ $d->ordering }}"></td>
										<td>
											<div class="form-button-action">	
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger a_submit_button" data-original-title="Remove" related-id="admin-pdfs-delete-post-{{ $d->id }}">
												<i class="fa fa-times"></i>
												</button>
											</div>			
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						{{ csrf_field() }}
						<input type="submit" class="btn btn-danger" value="Edit">
					</form>
				</div>
				@else
					<div class="row">
						<div class="col-md-12">
							No data found
						</div>
					</div>
				@endif
				<form method="post" enctype="multipart/form-data">
						<div class="form-group">
							<label for="pdfs">PDFs</label>
							<a class="add-pdf btn btn-info" href="#">Add PDF</a>
							<div id="ajax-add-pdfs-element" style="display: none">
								<div class="row">
									<div class="col-md-5 col-sm-12">
										<div class="form-group">
											<label for="pdf">PDF</label>
											<input type="file" accept="application/pdf">
											<input type="hidden" class="pdf">
											<input type="hidden" class="mime">
											<img src=""/>
											<p></p>
											<div class="progress" style="display: flex;">
												<div class="progress-bar initial" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%; opacity: 100;">
												</div>
											</div>
											<span class="error-block">
											</span>
										</div>
									</div>
									<div class="col-md-7 col-sm-12">
										<div class="form-group">
											<label for="pdf_title">Title</label>
											<input type="text" class="form-control data-name" data-name="pdf_title[]">
										</div>
									</div>
									
									<div class="col-md-3 col-sm-12">
										<a href="#" class="btn btn-danger remove-pdf">Remove</a>
									</div>
								</div>
							</div>
							<div id="ajax-add-pdfs">
								<input type="hidden" id="prabal-ajax-upload-image-csrf-token" value="{{ csrf_token() }}">
								<input type="hidden" id="prabal-ajax-upload-image-directory" value="pdfs">
								<input type="hidden" id="prabal-ajax-upload-image-asset-type" value="pdf">
								<input type="hidden" id="prabal-ajax-upload-image-loading-image" value="{{ asset('core/images/giphy.gif') }}">
								<input type="hidden" id="ajax-upload-asset-post" value="{{ route('ajax-upload-asset-post') }}">
							</div>
						</div>


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

@section('custom-js')
	<script>
		$(document).on('click', '.add-pdf', function(e){
			e.preventDefault()
			let html = $('#ajax-add-pdfs-element').html();
			$('#ajax-add-pdfs').append(html)
			$('#ajax-add-pdfs').find('.data-name').each(function(){
				if(!(this).hasAttribute("name")) {
					$(this).attr('name', 'pdf[pdf_title][]')
				}
			})
		})

		$(document).on('click', '.remove-pdf', function(e){
			e.preventDefault()
			$(this).parent().parent().remove()
		})

		$('#ajax-add-pdfs').on('change', 'input[type="file"]', function(e)
		{
				var formData = new FormData;
				var files = e.target.files;
				var current_element = this;
				let count = files.length
				//current_element.parentElement.getElementsByClassName('error-block')[0].innerHTML = ''

				var formData = new FormData;

				formData.append('file', files[0])
				formData.append('_token', $('#prabal-ajax-upload-image-csrf-token').val())
				formData.append('directory', 'pdf')
				formData.append('asset_type', 'pdf')
				$(current_element).hide();
				$(current_element).parent().find('img').attr('src', $('#prabal-ajax-upload-image-loading-image').val());
				pdfAjax(this.parentElement, formData);
					
				
		})

		function pdfAjax(current_element, formData)
		{
			var c = $(current_element)
			//c.find('img').hide()
			//current_element.style.background = loadingBackground
			$.ajax(
			{
				url: $('#ajax-upload-asset-post').val(), // Url to which the request is send
				type: "POST",             // Type of request to be send, called as method
				data: formData, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
				contentType: false,       // The content type used when sending data to the server.
				cache: false,             // To unable request pages to be cached
				processData:false,        // To send DOMDocument or non processed data file it is set to false
				xhr: function() {
		                var myXhr = $.ajaxSettings.xhr();
		                if(myXhr.upload){
		                    myXhr.upload.addEventListener('progress',progress.bind(null, current_element), false);
		                }
		                return myXhr;
		        },
				success: function(data)   // A function to be called if request succeeds
				{
					if(data.status == true)
					{
						//$('#loading_image').html('<p>' + 'Images successfully uploaded' + '</p>');
						var images = '';
						var image_src = data.url;
						var image_name = data.filename;

						$(current_element).find('img').remove()
						$(current_element).find('p').html(data.original_filename)
						$(current_element).find('input[class="pdf"]').val(data.filename)
						$(current_element).find('input[class="pdf"]').attr('name', 'pdf[file][]')
						$(current_element).find('input[class="mime"]').attr('name', 'pdf[mime][]')
						$(current_element).find('input[class="mime"]').val(data.mime_type)
						//$(current_element).parent().find('.data-name').attr('name', 'pdf_title[]')

						current_element.parentElement.classList.add('uploaded_asset')
						progressComplete(current_element)
					}	
					else
					{
						//c.find('img').show()
						var error_html = '';
						error_html += '<p>' + data.message + '</p>';

						$.each(data.data, function(key, value)
						{
							error_html += '<p>' + value + '</p>';
						});
						current_element.parentElement.getElementsByClassName('error-message')[0].innerHTML = error_html
						current_element.style.background = uploadBackground


						//$(form_element).parent().find('.error-message').html(error_html);
					}
				},
				error: function(request, status, error) {
			        console.log(request);
			        console.log(error);
			        console.log(status);
			    }
			});
		}

		function progress(i, e)
		{
			//console.log(i.innerHTML)
			i.parentElement.getElementsByClassName('progress')[0].style.display = 'flex'
			if(e.lengthComputable){
		        var max = e.total;
		        var current = e.loaded;

		        //i.classList.remove("clean");
		        //i.classList.remove("fa-cloud-upload");

		        var Percentage = parseInt((current * 100)/max);

		        var max = e.total;
		        var current = e.loaded;

		        var Percentage = parseInt((current * 100)/max);

		        if(Percentage >= 95)
		        {
		        	Percentage = 95


		        }

		        var jquery_element = $(i);
		        jquery_element.animate({
					"value": Percentage + "%"
					}, 
					{
					duration: 600,
					easing: 'linear'
				});
		        
		        //if(Percentage 105)
		        //{

			        for(var j=i.parentElement.getElementsByClassName('progress-bar')[0].getAttribute('aria-valuenow'); j<=Percentage; j++)
			        {
		        		//console.log(j)
		        		i.parentElement.getElementsByClassName('progress-bar')[0].style.width = j + '%'
		        		i.parentElement.getElementsByClassName('progress-bar')[0].setAttribute('aria-valuenow', j)

			        }	
		        //}
		          
		        
			}
		}

		function progressComplete(i)
		{
			var Percentage = 100;
			i.parentElement.getElementsByClassName('progress-bar')[0].style.width = Percentage + '%'
			i.parentElement.getElementsByClassName('progress-bar')[0].setAttribute('aria-valuenow', Percentage)	
			i.parentElement.getElementsByClassName('progress-bar')[0].classList.add("bg-success");
		    //i.parentElement.getElementsByClassName('progress')[0].style.display = 'none'
		}
	</script>
@stop