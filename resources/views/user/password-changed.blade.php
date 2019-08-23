@include('user.include.header')

<body>
<div class="container">
    <div class="row">
        <div class="forgot-password">
        <div class="col-md-4"></div>
        <div class="col-md-4">
           <center><img src="{{ asset('user/images/forgot-password.png') }}" alt="" class="img-responsive"></center>
            <h3>Forgot your password ?</h3>
            <h4>No worries we are here to help.</h4>
            <p>We have sent you an email. Please <a href="{{ route('login') }}">click here</a> to login</p>
            <p>NOTE : If the email address associated with your Traditional Shaolin account has changed. Please contact us to restore your account access.</p>

        </div>
        <div class="col-md-4"></div>
    </div>
    </div>

</div>
@include('user.include.footer')
</body>
</html>