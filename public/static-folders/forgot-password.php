
<?php include 'include/header.php';?>

<body>
<div class="container">
    <div class="row">
        <div class="forgot-password">
        <div class="col-md-4"></div>
        <div class="col-md-4">
           <center><img src="images/forgot-password.png" alt="" class="img-responsive"></center>
            <h3>Forgot your password ?</h3>
            <h4>No worries we are here to help.</h4>
                    <form class="form-horizontal" method="post" action="" id="backendForm">
                                <div class="form-group  row required">
                                    <div class="col-sm-12">
                                        <label class="control-label ">Please enter email address associated with your Traditional Shaolin account. </label>
                                        <input type="email" name="recovery_email" value="">
                                    </div>
                                </div>

                               
                                
                                <div class="form-group  row required text-center">

                                    <div class="col-sm-12 ">
                                        
                                         <input type="hidden" name="_token" value="">
                                        <button type="submit" class="btn">SUBMIT
                                           </button>
                                    </div>
                                </div>
                            </form>
                      

            <p>NOTE : If the email address associated with your Traditional Shaolin account has changed. Please contact us to restore your account access.</p>

        </div>
        <div class="col-md-4"></div>
    </div>
    </div>

</div>
<?php include 'include/footer.php';?>
</body>