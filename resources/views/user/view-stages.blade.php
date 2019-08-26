@extends('user.main')

<style type="text/css">
	.chpass .stages{margin:10px 0; }
	.chpass .stage{margin:10px 0; line-height: 40px; background:#05A76F; font-size: 20px; color: #fff; text-align: center;  height: 50px; cursor: pointer; border-radius: 5px; border:1px solid #0ACE87; text-transform: uppercase; text-decoration: none; }
	.chpass .stage-disabled{margin:10px 0; line-height: 40px; background: #e9e9e9; font-size: 20px; 
		color:#999; text-align: center;  height: 50px; border-radius: 5px; border:1px solid #333; text-transform: uppercase; text-decoration: none; cursor: not-allowed;}
	.stages .btn-default{ width: 100px; height:36px; font-size: 14px; }
</style>

@section('content')
<div class="col-md-9">
    <div class="chpass">

        <div class="row">
        	@foreach($stages as $s)
        	<div class="col-md-4">
        		<a href="{{ route('view-stage', $s->id) }}" class="btn btn-info btn-flat form-control">{{ $s->stage_name }}</a>
        	</div>
        	@endforeach
        </div>
		<div class="row">
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/1" class="form-control stage"><i class="fas fa-hand-point-right"></i> Stage 1</a>
					<form>
					<center><p>Request Pending</p> </center>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/2" class="form-control stage-disabled" ><i class="fas fa-hand-point-right"></i> Stage 2</a>
					<form>
					<center><button type="button" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Buy Now</button></center>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/3" class="form-control stage-disabled"><i class="fas fa-hand-point-right"></i> Stage 3</a>
					<form>
					<center><button type="button" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Buy Now</button></center>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/4" class="form-control stage-disabled"><i class="fas fa-hand-point-right"></i> Stage 4</a>
					<form>
					<center><button type="button" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Buy Now</button></center>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/5" class="form-control stage-disabled"><i class="fas fa-hand-point-right"></i> Stage 5</a>
					<form>
					<center><button type="button" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Buy Now</button></center>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/6" class="form-control stage-disabled"><i class="fas fa-hand-point-right"></i> Stage 6</a>
					<form>
					<center><button type="button" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Buy Now</button></center>
					</form>
				</div>
			</div>
			<div class="col-md-3">
				<div class="stages">  		
					<a href="http://localhost:8000/view-stage/7" class="form-control stage-disabled"><i class="fas fa-hand-point-right"></i> Stage 7</a>
					<form>
					<center><button type="button" class="btn btn-default"><i class="fas fa-shopping-basket"></i> Buy Now</button></center>" 
					</form>
				</div>
			</div>
		</div>
    </div>
</div>
@stop

