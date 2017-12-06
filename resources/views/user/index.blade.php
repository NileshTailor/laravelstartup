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
					<label for="" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-edit"></i> वरिष्ठ पंजीकरण सूची / Senior Citizen Registration List</b></label>
				</div>
					<div class="actions">
					
				<a href="{{ URL::to('memberExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
				<a href="{{ URL::to('memberExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
				<a href="{{ URL::to('memberExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>					
					<input type="text" class="form-control input-medium pull-right" placeholder="Search Member..." id="search3">
				</div>
			</div>
			
			<div class="portlet-body table-responsive">
  <div class="container">
  <table class="table" id="main_tble">
    <thead>
	  <tr style="color:#4a5ab8; font-size:15px;">
        <th>#</th>
		<th>Photo</th>
        <th>Name</th>
        <th>Spouse Name</th>
        <th>Mobile No.</th>
        <th>Email ID</th>
        <th>Address</th>
        <th>Smartphone User?</th>
      </tr>
    </thead>
    <tbody>
	<?php $i = 0; ?>
	  @foreach($users as $post)
	  <?php $i++; ?>   
	  <tr>
        <td><b>{{$i}}</b></td>
		<td><img src="images/{{$post['photo']}}" class="rcorners"></img></td>
        <td>{{$post['name']}}</td>
        <td>{{$post['spouse_name']}}</td>
        <td>{{$post['mobile_no']}}</td>
        <td>{{$post['email']}}</td>
        <td>{{$post['address']}}</td>
        <td>{{$post['use_smart_phone']}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
  </div>
  </div>
</div>
</div>					
</div>
@endsection

<script src='../assets/global/plugins/jquery.min.js'></script>
<script>
$(document).ready(function() {
var $rows = $('#main_tble tbody tr');
	$('#search3').on('keyup',function() {
		var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
		var v = $(this).val();
		if(v){ 
			$rows.show().filter(function() {
				var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
	
				return !~text.indexOf(val);
			}).hide();
		}else{
			$rows.show();
		}
	});
	});
</script>

