<style>
input[type=text] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    //box-sizing: border-box;
   // border: 1px thin;
   // border-bottom: 2px solid #a9a9a9;
	//background-color: #fff;
}
textarea[type=text] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    //box-sizing: border-box;
   // border: none;
    //border-bottom: 2px solid #a9a9a9;
	//background-color: #fff;
}
tr.noBorder td {
  border: 0;
}
</style>
<style>
.paddingTop{

     padding:10px !important;
}
</style>
<style>
#custom-search-input {
        margin:0;
        margin-top: 10px;
        padding: 0;
    }
 
    #custom-search-input .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
       
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-input button {
        border: 0;
        background: none;
        /** belows styles are working good */
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
       
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        color:#D9230F;
    }
                
@media only screen and (max-width: 500px) {
.container {
    padding-right: 25px;
    padding-left: 25px;
    margin-right: auto;
    margin-left: auto;
   }
}

</style>
@extends('layout.layout')
@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="portlet light ">
			<div class="portlet-title">
				<div class="caption">
					<label class="paddingTop" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-user"></i>  Add Enquiry</b>
					</label>
					<a href="http://localhost:8000/user/create" class="btn green">
					<i class="fa fa-plus"> Add New Member</i>
					</a>
				</div>
			</div>
			<div class="portlet-body">
  <form method="post" action="{{action('USERController@addEnquiry')}}" enctype="multipart/form-data">
      {{csrf_field()}}
	  
	  <div class="row">
   <div class="form-group">
   <div class="col-md-2"><label class="paddingTop">Member Name</label></div>
   <div class="col-md-9">
   <select type="" class="form-control input-sm userId" id="userId" name="user_id" required>
		<option value="">-- Select Member Name --</option>
		@foreach($users as $post)
		<option value="{{$post['id']}}" attrname="{{$post['name']}}" attrmobile="{{$post['mobile_no']}}" attraddress="{{$post['address']}}">{{$post['name']}}</option>
		@endforeach
		</select></div>
   </div>
   </div>
   
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-2"><label class="paddingTop">Name</label></div>
   <div class="col-md-9"><input type="text" id="nameid" class="form-control input-sm" name="name" width="100%" required placeholder="Name" readonly></div>
   </div>
   </div>
  
   <div class="row">
   <div class="form-group">
   <div class="col-md-2"><label class="paddingTop">Mobile No.</label></div>
   <div class="col-md-3"><input type="text" id="mobileid" class="form-control input-sm" name="mobile_no" required placeholder="Mobile No." readonly></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-2"><label class="paddingTop">Address</label></div>
   <div class="col-md-9"><textarea type="text" rows="1" class="form-control input-sm" id="addressid" name="address" style="resize: none" required placeholder="Address.." readonly></textarea></div>
   </div>
   </div>

   <div class="row">
	<div class="form-group">
	<div class="col-md-2">
	<label class="paddingTop">Select catgory</label></div>
	<div class="col-md-3 paddingTop" style="">
					<select type="" class="form-control input-sm" id="categoryId" name="category_id" required>
							<option value="">-- select --</option>
		@foreach($categories as $post)
		<option value="{{$post['id']}}">{{$post['name']}}</option>
		@endforeach
		</select>
		</div>
		<div class="col-md-2" style="text-align:center">
	<label class="paddingTop">Select Zone</label></div>
	<div class="col-md-3 paddingTop" style="">
					<select type="" class="form-control input-sm zoneId" id="zoneId" name="zone_id" required>
		<option value="">-- select --</option>
		@foreach($zones as $post1)
		<option value="{{$post1['id']}}">{{$post1['name']}}</option>
		@endforeach
		</select>
		</div>
		</div></div>
		 <div class="row">
	<div class="form-group">
	<div class="col-md-2">
	<label class="paddingTop">Select Vendor</label></div>
	<div class="col-md-3 paddingTop" style="">
					<select type="" class="form-control input-sm vendorId" id="vendorId" name="vendor_id" required>
		<option value="">-- select --</option>
		@foreach($vendors as $post)
		<option value="{{$post['id']}}">{{$post['name']}}</option>
		@endforeach
		</select>
		</div>
	</div>
	</div>
	
	 <div class="row">
   <div class="form-group">
   <div class="col-md-2"><label class="paddingTop">Query / Description</label></div>
   <div class="col-md-9"><textarea type="text" rows="1" class="form-control input-sm" id="" name="query" style="resize: none" required placeholder="Type your Query or Requirement .."></textarea></div>
   </div>
   </div>
   
   
	<br>
	
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-12" style="text-align:center"><button class="btn btn-primary btn-medium btn-signin" type="submit">Submit</button></div>
   </div>
   </div> 
   
 </form>
</div>

</div>
</div>
</div>
@endsection
<script src='../assets/global/plugins/jquery.min.js' type="text/javascript"></script>
<script>
$(document).on('change','#userId',function(){
    var userId = $(this).val();
	var attrname = $(this).find(':selected').attr('attrname');
	var attrmobile = $(this).find(':selected').attr('attrmobile');
	var attraddress = $(this).find(':selected').attr('attraddress');
	$("#nameid").val(attrname);
	$("#mobileid").val(attrmobile);
	$("#addressid").val(attraddress);
});

$(document).on('change','#zoneId',function(){
    var zoneid = $(this).val();
	var categoryid = $("#categoryId").find(':selected').val();
	if(categoryid=='')
	{
	alert("select Service Category");
	}
		$.ajax({
		type: "POST",
		url: './orderdata', // This is what I have updated
		data: "",
			success: function() {
            console.log("Geodata sent");
        }
		});

});


</script>
   
  