<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('layout.style')
		
	</head>
	<body class="page-header-fixed page-quick-sidebar-over-content page-container-bg-solid">
		@include('layout.header')
		<div class="clearfix">
		</div>
		<div class="page-container">
				<div class="page-content">
					<!-- BEGIN PAGE CONTENT-->
					<div class="row">
						<div class="col-md-12">
							<div id="toast-container" class="toast-top-right" aria-live="polite" role="alert">
							@yield('content')
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT-->
				</div>
			</div>
		<!-- END CONTAINER -->
		<!-- BEGIN FOOTER -->
		@include('layout.footer')
		@include('layout.script')
		
			</body>
</html>