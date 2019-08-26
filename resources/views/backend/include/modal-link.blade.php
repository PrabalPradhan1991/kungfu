<!-- The Modal -->
@section('custom-css')
<style type="text/css">
.copy-icon i{transition: 0.4s all;}
.copy-icon i:hover{color: #31ce36 !important;}	
.modal-select-link .table td,.modal-select-link .table th{height:auto !important; padding: 5px 10px !important;}
</style>
@stop
						  <div class="modal modal-select-link" id="myModal">
						    <div class="modal-dialog">
						      <div class="modal-content">
						      
						        <!-- Modal Header -->
						        <div class="modal-header">
						          <h1 class="modal-title h1" style=" font-size: 24px; font-weight: 700; text-transform: uppercase; font-family: raleway; color: #0e4f88 !important;">Select Link</h1>
						          <button type="button" class="close" data-dismiss="modal">×</button>
						        </div>
						        
						        <!-- Modal body -->
						        <div class="modal-body">
						          <h3 style="color: #333; font-weight: 700;">Select a link to copy:</h3>
						          	<?php $blogs = \App\BlogModel::orderBy('title', 'ASC')->get(); ?>
						          	<?php $links = \App\PageModel::orderBy('title', 'ASC')->get(); ?>
						          	<div class="table-responsive">	

						          	<table  id="add-row-link" class="display table table-striped table-hover" style="width: 100%;">	
						          		<thead>	
						          			<tr>
						          				<td><b>Type </b></td>
						          				<td><b>Page Title</b></td>
						          				<td><b>Link </b></td>
						          			</tr>
						          		</thead>
						          	   <tbody>
						          	   		<tr>
						          	   			<td>Core</td>
						          				<td>Contact Us</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\contact-us</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>
						          			<tr>
						          				<td>Core</td>
						          				<td>Blog List</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\blog-list</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>
						          			<tr>
						          				<td>Core</td>
						          				<td>Gallery</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\gallery</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>
						          			<tr>
						          				<td>Core</td>
						          				<td>Coupon</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\coupon</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>
						          			<tr>
						          				<td>Core</td>
						          				<td>About Us</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\about-us</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>
						          			<tr>
						          				<td>Core</td>
						          				<td>Products</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\products</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>

						          			@foreach($links as $l)       	
						          			<tr>
						          				<td>Page</td>
						          				<td>{{$l->title}}</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\page\{{ $l->slug }}</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>					          		
						          			@endforeach
						          			@foreach($blogs as $l)       	
						          			<tr>
						          				<td>Blog</td>
						          				<td>{{$l->title}}</td>
						          				<td>
						          					<a  class="myText text-info" style="cursor: pointer;">\blog\{{ $l->slug }}</a> 
						          					<a class="copy-icon" title="Copy page link" style="cursor: pointer; padding-left: 15px;" ><i class="fas fa-copy" style="font-size: 18px;"></i></a>
						          				</td>
						          			</tr>					          		
						          			@endforeach
						          		</tbody>
						          	</table>
						          	</div>
						        </div>
						        
						        <!-- Modal footer -->
						        <div class="modal-footer">
						          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						        </div>
						        
						      </div>
						    </div>
						  </div>
						 @section('custom-js')
<script type="text/javascript">
		$('.copy-icon').on('click', function(){
            var current_element = $(this);
            var class_copy = current_element.parent().find('.myText').text();
            console.log(class_copy);
            $('#link ').val(class_copy);
            $('#link ').val(class_copy);
       });
		$('#add-row-link').DataTable({
				"pageLength": 5,
		});
</script>
@stop