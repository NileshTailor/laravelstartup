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
					<label for="" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-edit"></i> Customer Enquiry / Leads</b></label>
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
		<th>Follow Up</th>
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
			$f=$post->user_enquiry_followup;
	  ?>   
	  <tr>
        <td><b>{{$i}}</b></td>
		 <!--<td style="color:blue">
		 <form action="{{action('USERController@enquirystatus')}}" method="post">
            {{csrf_field()}}
			
			
			
            <input name="update_id" type="hidden" value="{{$post['id']}}">
            <button class="btn input-sm" style="{{$color}}" type="submit">{{$post['status']}}</button>
          </form></td>-->
		<td style="{{$color}}">{{$post['status']}}</td>
		  <td>
		<a class="" data-toggle="modal" href="#basic{{$post['id']}}">
									<u>follow-up</u> </a>
									<div class="modal fade" id="basic{{$post['id']}}" tabindex="-1" role="basic" aria-hidden="true">
								<form method="post" action="{{action('USERController@vendorfollowupcomment')}}">
								{{csrf_field()}}
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Enter Comment Here!</h4>
										</div>
										<div class="modal-body">
										<input type="hidden" value="{{$post['id']}}" name="user_enquiry_id">
										<input type="hidden" value="{{$post['user_id']}}" name="user_id">
										<input type="hidden" value="{{$post['vendor_id']}}" name="vendor_id">
											 <textarea class="form-control input-lg" name="comment" placeholder="Text here..."></textarea>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm default" data-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-sm green">Submit</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								</form>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
								</td>
								<td><a class="" data-toggle="modal" href="#basic1{{$post['id']}}">
									<b>{{$post['name']}}</b></a>
									<div class="modal fade" id="basic1{{$post['id']}}" tabindex="-1" role="basic1" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
											<h4 class="modal-title">Follow-up Details..</h4>
										</div>
										<div class="modal-body">
	<table class="table" id="main_tble">
    <thead>
	  <tr style="color:#4a5ab8; font-size:12px;">
		<th width="25%">Comment By</th>
		<th>Comment</th>
		<th>Created on</th>
       </tr>
    </thead>
    <tbody>
<?php 	
		foreach($f as $g){
		?>
		  <tr>
		  <td>{{$g['comment_by']}}</td>
		  <td>{{$g['comment']}}</td>
		   <td>{{date('D M j, Y H:i a', strtotime($g['deleted_at']))}}</td>
		  </tr>
		  <?php }?>
	  </tbody>
	  </table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-sm default" data-dismiss="modal">Close</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div></td>
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