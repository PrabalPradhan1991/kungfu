
<style>

.left-sidebar{background: #fff; padding:10px; }	
.post-listing{margin: 1% 0 0 0; background:#e1e1e1;}
.post-listing ul{margin: 0; padding: 0;}
.post-listing ul li { list-style: none;  margin-bottom:0px; font-size: 16px; font-weight: bold;   padding: 0px 20px; line-height: 65px;  border-bottom: 1px solid #fff; }
.post-listing ul li a{text-decoration: none; color: #222;}
.post-listing ul li a i{width: 20px; color:#000;}
.btn-primary{background:red; width:150px;  border:#222; line-height: 34px; font-size: 16px; font-weight: bold; border-radius:0px; width: 100%; color: #fff;}
.btn-primary a{background: #222 !important;}

.btn-danger{background:#900; width:150px; margin: 0 auto; border:#222;line-height: 34px; font-size: 16px; font-weight: bold;  color: #fff}

.btn-change{
    height: 50px;
    width: 100%;
    border-radius: 0;
    color: #fff;
    background: red;
    font-size: 18px;
}
.btn-change:hover{

    background:red;
    color: #fff;
}



</style>

<div class="col-md-3 left-sidebar">

	<div class="post-listing">


	<ul>
		<li><a href="user-home.php"><i class="fa fa-home"></i> Home</a></li>
		<li><a href="#"><i class="fa fa-align-justify"></i> Grades</a></li>
		<li><a href="change-my-password.php"><i class="fa fa-key"></i> Change Password</a></li>
		<li> <a href="change-details.php"><i class="fa fa-edit"></i> Change Details</a></li>
		
			<form method="post" action="{{ route('logout') }}">
				
		<input type="submit" value="Logout" class="btn btn-change">
		</form>
		
	</ul>

	</div>
</div>