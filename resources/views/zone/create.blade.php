

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
					<label class="paddingTop" style="color:#000;"><i class="fa fa-circle"></i> Zone</label>
				</div>
			</div>
			<div class="portlet-body">
  <form method="post" action="{{url('zone')}}" enctype="multipart/form-data">
      {{csrf_field()}}
   <div class="row">
   <div class="form-group">
   <div class="col-md-2">
   <label class="paddingTop">Zone Name</label></div>
   <div class="col-md-3">
   <input type="text" id="" class="form-control input-sm" name="name" width="100%" required placeholder="Zone Name"></div>
   </div>
   </div>
   <div class="row">
   <div class="col-md-2"></div>
   <div class="col-md-3" style="text-align:center">
   <button class="btn btn-lg btn-primary input-sm btn-signin" type="submit">Add</button></div>
   </div>
   </div>
   
 </form>
</div>


</div>
</div>
</div>
@endsection
   
  