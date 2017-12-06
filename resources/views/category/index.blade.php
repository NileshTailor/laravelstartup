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
					<label for="" style="color:#000;"><i class="fa fa-edit"></i> Category Details</label>
				</div>
					<div class="actions">
					
				<!-- <a href="{{ URL::to('memberExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
				<a href="{{ URL::to('memberExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
				<a href="{{ URL::to('memberExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>	 -->		
					<input type="text" class="form-control input-medium pull-right" placeholder="Search category..." id="search3">
				</div>
			</div>
			
			<div class="portlet-body">
  <table class="table table-condensed table-hover table-bordered" id="main_tble">
    <thead>
	  <tr style="color:#000;">
        <th>#</th>
        <th>Category Name</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
	<?php $i = 0; ?>
	  @foreach($categories as $post)
	  <?php $i++; ?>   
	  <tr>
        <td><b>{{$i}}</b></td>
        <td width="75%">{{$post['name']}}</td>
         <td><a href="{{action('CategoryController@edit', $post['id'])}}" class="btn btn-warning input-sm">Edit</a></td>
        <td><form action="{{action('CategoryController@destroy', $post['id'])}}" method="post">
            {{csrf_field()}}
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger input-sm" type="submit">Delete</button>
          </form></td>
      </tr>
      @endforeach
    </tbody>
  </table>
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

