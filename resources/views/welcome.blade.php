<style>
.rcorners {
    border-radius: 50%;
    width: 75px;
    height: 75px;
}
</style>
@extends('layout.layout')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<label for="" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-home"></i> Dashboard</b></label>
				</div>
			</div>
			<div class="portlet-body">
  <div class="container">
  
  <div class="col-md-12">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
				<div class="dashboard-stat blue-madison">
					<div class="visual">
						<i class="fa fa-comments"></i>
					</div>
					<div class="details">
						<div class="number">
							 {{ $users }}
						</div>
						<div class="desc">
							 Total Register Users
						</div>
					</div>
					<a class="more" href="#">
					View more <i class="m-icon-swapright m-icon-white"></i>
					</a>
				</div>
			</div>
			</div>
   </div>
  
  
  

</div>
</div>
</div>
</div>					
</div>
@endsection



