@extends($extend_page)

@section('custom-css')
<style>
.changedetails {margin: 1% 0; border:1px solid #ccc; padding: 10px;} 
.changedetails h1{margin:0; color: #008FDE; font-size: 28px;
display: inline-block;
border-bottom: 3px solid;
padding-bottom: 10px;
margin-bottom: 20px;}
.changedetails .form-control {
    font-size: 14px;
    border-radius: 0;
    border: 1px solid #ccc;
}
.changedetails .form-group label { text-transform: uppercase; font-size: 12px;}
.changedetails .col-sm-8 {
    width: 64%;
    border: 1px dotted #ccc;
    margin-right: 20px;
}



.upload-button-wrapper, .upload-button-wrapper-child {
   height: 200px !important; overflow: hidden !important; padding: 0px !important;
}
@media(max-width:480px){
.changedetails .col-sm-8 {
    width: 100%;
    border: 1px dotted #ccc;
    margin-right: 20px;
}

}


</style>
@stop

@section('content')

<div class="container">
   <div class="changedetails">
      <center><h1>Change Details</h1></center>
       <form method="post" enctype="multipart/form-data" id="update-details">
   <div class="row">
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
   </form>
   <form method="post" action="{{ route('delete-my-profile-picture-post') }}" id="delete-profile-picture-post">
      {{ csrf_field() }}
   </form>
   </div>

</div>



@stop

@section('custom-js')
   <script>
      $( function() {
       $( ".date" ).datepicker({ dateFormat: 'yy-mm-dd' });
     } );
      function addClassToBtnRemove() {
         $('#prabal-ajax-upload-image .btn-remove').addClass('a_submit_button')
         $('#prabal-ajax-upload-image .btn-remove').attr('related-id', 'delete-profile-picture-post')
      }

      $(function(){
         addClassToBtnRemove()
      })
   </script>
@stop