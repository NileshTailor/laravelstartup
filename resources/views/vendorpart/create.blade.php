

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
					<label class="paddingTop" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-user"></i> Vendor Registration Form</b></label>
				</div>
			</div>
			<div class="portlet-body">
  <form method="post" action="{{url('vendor')}}" enctype="multipart/form-data">
      {{csrf_field()}}
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">नाम / Name</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="name" width="100%" required placeholder="Name"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">Firm Name</label></div>
   <div class="col-md-3"><input type="text" id="" name="firm_name" required
   placeholder="Firm Name" class="form-control input-sm">
   </div>
   <div class="col-md-3"><label class="paddingTop">Mobile No.</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="mobile_no" required placeholder="Mobile No."></div>
   </div>
   </div>
   
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">Email</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="email" placeholder="Email ID"></div>
   <div class="col-md-3"><label class="paddingTop">Land Line No.</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="land_line_no" placeholder="Land Line No."></div>
   </div></div>
  
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">Address</label></div>
   <div class="col-md-9"><textarea type="text" rows="1" class="form-control input-sm" id="" name="address" style="resize: none" required placeholder="Address.."></textarea></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">Near By Landmark</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="landmark" placeholder="Landmark"></div>
   </div>
   </div>
   
	<div class="row">
	<div class="form-group">
   <div class="col-md-3"><label class="paddingTop">Select Zone</label></div>
	@foreach($zones as $post)
	<div class="col-md-2 paddingTop" style="">
	<input type="checkbox" class="form-control input-sm paddingTop" id="" name="zone_id[]" width="" value="{{$post['id']}}"> {{$post['name']}}
	</div>
	@endforeach
	</div>
	</div>
	
	<div class="row">
	 <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">Select Category</label></div>
	@foreach($categories as $post)
	<div class="col-md-2 paddingTop" style="">
	<input type="checkbox" class="form-control input-sm paddingTop" id="" name="category_id[]" width="" value="{{$post['id']}}"> {{$post['name']}}
	</div>
	@endforeach
	</div>
	</div>
  
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">फोटो सेलेक्ट करे  /  Upload Your Photo</label></div>
   <div class="col-md-9 paddingTop"><input type="file" name="photo"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-12" style="text-align:center"><button class="btn btn-lg btn-primary btn-medium btn-signin" type="submit">Register</button></div>
   </div>
   </div>
  
 </form>
</div>
</div>
</div>
</div>
@endsection


  
