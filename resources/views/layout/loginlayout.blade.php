<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('layout.loginstyle')
	</head>
			<body class="login" >
 <style type="text/css">
.title-main {
	font-weight: 400 !important;
	font: 28px "PT Sans Narrow",sans-serif;
	text-transform: uppercase !important;
	box-sizing:border-box;
	line-height:1.1;
}
option 
{
    border-top:1px solid #CACACA;
    padding:4px;
	cursor:pointer;
}
select 
{
	cursor:pointer;
}
</style>  
<body class="login" style="background-color:#fff">
<!-- BEGIN LOGO -->
<div class="logo">
</span><span class="title-main" style="color:#0ECCEE !important;">
<img src="../images/kotacarelogo.png" width="300px" height="125px"></img></span>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="content">
	@yield('content')
</div>
</body>
@include('layout.loginscript')
</html>