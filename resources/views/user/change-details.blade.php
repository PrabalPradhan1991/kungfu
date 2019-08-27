@extends('user.main')

@section('content')
<div class="col-md-9">
   <div class="changedetails">
      <form method="post" enctype="multipart/form-data" id="update-details">
         <div class="row">
            <div class="col-md-12">
               <center>
                  <h1>Change Details</h1>
               </center>
            </div>
          </div>
          <div class="row">
            {{-- <div class="col-md-4">
               <div class="form-group">
                  <center>
                     <a href="#">
                     <img src="{{ asset('user/images/user-img.png') }}" alt="" style="object-fit:contain;" class="img-responsive userImg"></a>
                     <div class="profile">
                        <p>Profile Image</p>
                     </div>
                  </center>
               </div>
            </div> --}}
            <div class="col-md-8">
	            <div class="row">
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>Name</label>
	                     <input type="text" name="name" class="form-control" value="{{ $data->name }}">
	                     <span class="error-block">
	                        @if($errors->has('name'))
	                        @foreach($errors->get('name') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>Email</label>
	                     <input type="email" name="email" class="form-control" value="{{ $data->email }}">
	                     <span class="error-block">
	                        @if($errors->has('email'))
	                        @foreach($errors->get('email') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>DOB</label>
	                     <input type="text" name="details[dob]" class="form-control date" value="{{ $data->dob }}">
	                     <span class="error-block">
	                        @if($errors->has('details.dob'))
	                        @foreach($errors->get('details.dob') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>Phone</label>
	                     <input type="text" name="details[phone]" class="form-control" value="{{ $data->phone }}">
	                     <span class="error-block">
	                        @if($errors->has('details.phone'))
	                        @foreach($errors->get('details.phone') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>Street Address</label>
	                     <input type="text" name="details[street_address]" class="form-control" value="{{ $data->street_address }}">
	                     <span class="error-block">
	                        @if($errors->has('details.street_address'))
	                        @foreach($errors->get('details.street_address') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>Suburb</label>
	                     <input type="text" name="details[suburb]" class="form-control" value="{{ $data->suburb }}">
	                     <span class="error-block">
	                        @if($errors->has('details.suburb'))
	                        @foreach($errors->get('details.suburb') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>State</label>
	                     <select name="details[state]" class="form-control" required>
	                        <option value="">Select</option>
	                        @foreach(\App\UserDetailsModel::$states as $s)
	                        <option value="{{ $s }}" @if($data->state == $s) selected @endif>{{ $s }}</option>
	                        @endforeach
	                     </select>
	                     <span class="error-block">
	                        @if($errors->has('details.state'))
	                        @foreach($errors->get('details.state') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-6">
	                  <div class="form-group">
	                     <label>Post Code</label>
	                     <input type="text" name="details[post_code]" class="form-control" value="{{ $data->post_code }}">
	                     <span class="error-block">
	                        @if($errors->has('details.post_code'))
	                        @foreach($errors->get('details.post_code') as $e)
	                        <p>{{ $e }}</p>
	                        @endforeach
	                        @endif
	                     </span>
	                  </div>
	               </div>
	               <div class="col-md-12">
	                  <div class="form-group">
	                     {{ csrf_field() }}
	                     <br/> 
	                     <button type="submit" class="btn btn-danger" value="Edit">Save</button>
	                  </div>
	               </div>
	            </div>
        	</div>
          </div>
      <form method="post" action="" id="">
      </form>
      </div>
   </div>
</div>	
@stop

@section('custom-js')
<script>
      function addClassToBtnRemove() {
         $('#prabal-ajax-upload-image .btn-remove').addClass('a_submit_button')
         $('#prabal-ajax-upload-image .btn-remove').attr('related-id', 'delete-profile-picture-post')
      }

      $(function(){
         addClassToBtnRemove()
      })
   </script>
</body>
@stop