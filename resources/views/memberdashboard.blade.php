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
					<label for="" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-edit"></i>Your Enquiry / Leads</b></label>
				</div>
					<div class="actions">
					<input type="text" class="form-control input-medium pull-right" placeholder="Search Leads..." id="search3">
				</div>
			</div>
			
			<div class="portlet-body table-responsive">
  <div class="container">
  <table class="table" id="main_tble">
    <thead>
	  <tr style="color:#4a5ab8; font-size:15px;">
        <th>#</th>
		<th>Status</th>
        <th>Member Name</th>
        <th>Mobile No.</th>
        <th>Query</th>
        <th>Address</th>
		<th>Vendor Name</th>
		<th>Zone Name</th>
        <th>Category Name</th>
      </tr>
    </thead>
    <tbody>
	<?php $i = 0; ?>
	  @foreach($enquiries as $post)
	  <?php $i++;
	  if($post['status']=='closed')
			{
			  $color='color:red';
			}
			else
			{
				$color='color:green';
			} 
	  ?>   
	  <tr>
        <td><b>{{$i}}</b></td>
		 <td style="color:blue">
		 <td style="{{$color}}" >{{$post['status']}}</td>
        <td>{{$post['name']}}</td>
        <td>{{$post['mobile_no']}}</td>
        <td>{{$post['query']}}</td>
        <td>{{$post['address']}}</td>
		<td>{{$post->vendor['name']}}</td>
		<td>{{$post->zone['name']}}</td>
        <td>{{$post->category['name']}}</td>
		

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

