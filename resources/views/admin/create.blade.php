@extends('layout.loginlayout')
@section('content')
<div class="login-box" style="">
	<div class="login-logo">
	</div>
   <div class="login-box-body">
    <p class="login-box-msg">  
	<form method="post" action="{{url('admin')}}" enctype="multipart/form-data">
      {{csrf_field()}}
		<h3 class="form-title" style="text-align:center"><b>Login</b></h3>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">User Name</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input type="text" class="form-control" name="username" required value="" placeholder="User Name">
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				 <input type="password" class="form-control" name="password" required placeholder="Password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
			</div>
		</div>
        
		<div class="form-actions">
			<label class="checkbox">
			<input type="hidden" name="remember" value="1"/> </label>
			<button type="submit" name="login_submit" class="btn green-haze pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
		</div>
	</form>
  </div>
</div>
@endsection

   
  
