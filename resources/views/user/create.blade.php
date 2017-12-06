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
					<label class="paddingTop" style="color:#4a5ab8; font-size:18px;"><b><i class="fa fa-user"></i> वरिष्ठ पंजीकरण प्रपत्र / Senior Citizen Registration Form</b></label>
				</div>
			</div>
			<div class="portlet-body table-responsive">
  <form method="post" action="{{url('user')}}" enctype="multipart/form-data">
      {{csrf_field()}}
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">नाम / Name</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="name" width="100%" required placeholder="Name"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">जन्म तारीख  / Date of Birth</label></div>
   <div class="col-md-3"><input type="text" id="" name="dob" required
   placeholder="dd-mm-yyyy" class="form-control input-sm date-picker" data-date-format="dd-mm-yyyy" label="false" placeholder="Date of Birth">
   </div>
   <div class="col-md-3"><label class="paddingTop">मोबाइल नं.  / Mobile No.</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="mobile_no" required placeholder="Mobile No."></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">पति / पत्नी का नाम  / Spouse Name</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="spouse_name" placeholder="Spouse Name"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">जन्म तारीख  / Date of Birth</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="spouse_dob" required
   placeholder="dd-mm-yyyy" class="date-picker" data-date-format="dd-mm-yyyy" label="false"></div>
   <div class="col-md-3"><label class="paddingTop">मोबाइल नं.  / Mobile No.</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="spouse_mobile_no" placeholder="Spouse Mobile No."></div>
   </div></div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">ईमेल  / Email</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="email" placeholder="Email ID"></div>
   <div class="col-md-3"><label class="paddingTop">फ़ोन नं.  / Land Line No.</label></div>
   <div class="col-md-3"><input type="text" id="" class="form-control input-sm" name="land_line_no" placeholder="Land Line No."></div>
   </div></div>
   
 
  
	<div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">पिता का नाम / Fathers Name</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="father_name" placeholder="Father Name"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">पता / Address</label></div>
   <div class="col-md-9"><textarea type="text" rows="1" class="form-control input-sm" id="" name="address" style="resize: none" required placeholder="Address.."></textarea></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">निकटस्थ पहचान स्थल / Near By Landmark</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="landmark" placeholder="Landmark"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">अभिरुचि / Hobby</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="hobby" placeholder="Hobby"></div>
   </div>
   </div>
  
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">आपातकालीन संपर्क व्यक्ति का नाम व  मोबाइल नं. / 
   Contact Person in case of Emergancy Name & Mobile No.</label></div>
   <div class="col-md-9"><input type="text" class="form-control input-sm" id="" name="emergancy_contact_detail" placeholder="Emergancy Details"></div>
   </div>
   </div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">वार्षिक आय / Annual Income</label></div>
   <div class="col-md-9"><input type="text" id="" class="form-control input-sm" name="annual_income" placeholder="Annual Income"></div>
   </div></div>
   
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">क्या आप स्मार्ट फ़ोन यूज करते है? / Do You Use Smart Phone?</label></div>
   <br><div class="col-md-9"><input type="radio" id="yes" name="use_smart_phone" value="Yes" checked> <b>YES</b> &nbsp;&nbsp;<input type="radio" id="no" name="use_smart_phone" value="No"> <b>NO</b></div>
   </div>
   </div>
   
	<div class="row">
	<div class="form-group">
	<div class="col-md-12"><label class="paddingTop"><b>सलंग्न पहचान प्रमाण / Enclosed Identity Proof</b></label></div>
	</div>
	</div>	
   
	<div class="row">
	@foreach($identityProofs as $post)
	<div class="col-md-3" style="padding-left:26px">
	<input type="checkbox" class="form-control input-sm" id="" name="identity_proof_id[]" width="20%" value="{{$post['id']}}"> {{$post['name']}}
	</div>
	@endforeach
	</div>
  <br>
   <div class="row">
   <div class="form-group">
   <div class="col-md-3"><label class="paddingTop">फोटो सेलेक्ट करे  /  Upload Your Photo</label></div>
   <div class="col-md-9 paddingTop"><input type="file" name="photo"></div>
   </div>
   </div>
   
  
	  <div class="row">
	<div class="form-group">
	<div class="col-md-3">
	<label class="paddingTop">सेलेक्ट क्षेत्र  /  Select Zone</label></div>
	<div class="col-md-3 paddingTop" style="">
		<select type="" class="form-control input-sm zoneId" id="zoneId" name="zone_id" zone_id="<?php echo $post['id'];?>">
		<option value="">--select--</option>
		@foreach($zones as $post1)
		<option value="{{$post1['id']}}">{{$post1['name']}}</option>
		@endforeach
		</select>
		</div>
	<div class="col-md-3">
	<label class="paddingTop">सेलेक्ट एरिया  / Select Area</label></div>
	<div class="col-md-3 paddingTop" style="">
		<select type="" class="form-control input-sm" id="areaId" name="area_id">
		@foreach($areas as $post)
		<option value="{{$post['id']}}">{{$post['name']}}</option>
		@endforeach
		</select>
		</div>
	</div>
	</div>
	<br>
	
   
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
<!--<script src='../assets/global/plugins/jquery.min.js' type="text/javascript"></script>
<script>
$(document).on('change','#zoneId',function(){
    var zone_id = $(this).val();
	$.ajax({
                    url : "/user/destroy/id="+zone_id,
                    type: "POST",
                    dataType: "JSON",
                    success: function(data)
                    {
                        alert("congrts");
					//refresh_modal();
					//msgalert("Delete successfully.");
                    }
});
});
</script>-->
   
  