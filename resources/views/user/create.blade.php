<style>

input[type=text] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    //box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #a9a9a9;
	background-color: #fff;
}
textarea[type=text] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    //box-sizing: border-box;
    border: none;
    border-bottom: 2px solid #a9a9a9;
	background-color: #fff;
}
tr.noBorder td {
  border: 0;
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

@extends('master')
@section('content')
<div class="container">
  <form method="post" action="{{url('user')}}" enctype="multipart/form-data">
      {{csrf_field()}}
	  
		<div id="legend" style="text-align:center">
		<legend class=""><label for="" style="color:#4a5ab8; font-size:18px;">वरिष्ठ पंजीकरण प्रपत्र / Senior Citizen Registration Form</label></legend>
		</div>
		</br>
		
		<!--<div id="legend" style="text-align:left;">
		<legend class="">
		<label for="" style="text-align:left;">
		<button class="btn btn-lg btn-primary btn-block">निजी जानकारी / Personal Information</button>
		</label></legend>
		</div>-->
		</br>
   
  <table>
  <tr class="noBorder">
  <td width="25%"><label for="">नाम / Name</label></td>
  <td colspan="3" width="75%"><input type="text" id="" name="name" width="100%"></td>
  </tr>
 <tr class="noBorder">
  <td><label for="">जन्म तारीख  / Date of Birth</label></td>
  <td><input type="text" id="" name="dob" ></td>
 <td><label for="">मोबाइल नं.  / Mobile No.</label></td>
 <td><input type="text" id="" name="mobile_no"></td>
 </tr>
  <tr class="noBorder">
  <td><label for="">पति / पत्नी का नाम  / Spouse Name</label></td>
  <td colspan="3"><input type="text" id="" name="spouse_name" ></td>
  </tr>
  
 <tr class="noBorder">
  <td><label for="">जन्म तारीख  / Date of Birth</label></td>
  <td><input type="text" id="" name="spouce_dob" ></td>
 <td><label for="">मोबाइल नं.  / Mobile No.</label></td>
 <td><input type="text" id="" name="spouce_mobile_no"></td>
 </tr>
 
  <tr class="noBorder">
  <td><label for="">ईमेल  / Email</label></td>
  <td><input type="text" id="" name="email" ></td>
 <td><label for="">फ़ोन नं.  / Land Line No.</label></td>
 <td><input type="text" id="" name="land_line_no"></td>
 </tr>
 
  <tr class="noBorder">
  <td><label for="">पिता का नाम / Fathers Name</label></td>
  <td colspan="3"><input type="text" id="" name="father_name" ></td>
  </tr>
  
   <tr class="noBorder">
  <td><label for="">पता / Address</label></td>
  <td colspan="3"><textarea type="text" rows="1" id="" name="address" style="resize: none" ></textarea></td>
  </tr>
  
  <tr class="noBorder">
  <td><label for="">निकटस्थ पहचान स्थल / Near By Landmark</label></td>
  <td colspan="3"><input type="text" id="" name="landmark" ></td>
  </tr>
  
  <tr class="noBorder">
  <td><label for="">अभिरुचि / Hobby</label></td>
  <td colspan="3"><input type="text" id="" name="hobby" ></td>
  </tr>
  
    <tr class="noBorder">
  <td><label for="">आपातकालीन संपर्क व्यक्ति का नाम व  मोबाइल नं. / Contact Person in case of Emergancy Name & Mobile No.</label></td>
  <td colspan="3"><input type="text" id="" name="emergancy_contact_detail" ></td>
  </tr>
  
   <tr class="noBorder">
  <td><label for="">वार्षिक आय / Annual Income</label></td>
  <td colspan="3"><input type="text" id="" name="annual_income" ></td>
  </tr>
  
  <tr class="noBorder">
  <td><label for="">क्या आप स्मार्ट फ़ोन यूज करते है? / Do You Use Smart Phone?</label></td>
  <td colspan="3"><input type="text" id="" name="use_smart_phone" ></td>
  </tr>
  <tr class="noBorder">
  <td colspan="4" style="text-align:left;"><label for="">सलंग्न पहचान प्रमाण / Enclosed Identity Proof</label></td>
  </tr>
  
  <!--<tr class="noBorder">
  <td>
  <input type="checkbox" id="" name="" width="20%">आधार कार्ड / Adhar Card
  </td>
  <td>
  <input type="checkbox" id="" name="" width="20%">पेन कार्ड / Pan Card
  </td>
  <td>
  <input type="checkbox" id="" name="" width="20%">ड्राइविंग लाइसेंस  / Driving Licence
  </td>
  <td>
  <input type="checkbox" id="" name="" width="20%">अन्य पहचान पत्र / Any ID Proof
  </td>
  </tr>-->
   @foreach($identityProofs as $post)
      <tr>
  <td><input type="checkbox" id="" name="" width="20%" value="{{$post['id']}}">{{$post['name']}}
  </td>
      </tr>
      @endforeach
  
  <tr class="noBorder">
   <td style="padding-top:40px"><label for="">फोटो सेलेक्ट करे  /  Upload Your Photo</label></td>
  <td colspan="3" style="text-align: left; padding-top:40px">
  <input type="file" name="photo">
  </td>
  </tr>
  
  <tr class="noBorder" style="">
  <td colspan="4" style="text-align:center; padding-top:40px">
  <button class="btn btn-lg btn-primary btn-medium btn-signin" type="submit">Register</button>
  </td>
  </tr>
 </table>
 </form>
</div>
@endsection