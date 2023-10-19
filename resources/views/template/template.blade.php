<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<link rel="icon" type="image/png" href="{{ url('/img/logo.png') }}">
	<title>LAWSON | Administrator</title>

	<!-- jQuery -->
	<script src="{{ url('/adminlte/plugins/js/jquery.min.js') }}"></script>

	<!-- jQuery UI 1.11.4 -->
	<script src="{{ url('/adminlte/plugins/js/jquery-ui.min.js') }}"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->

	<!-- SweetAlert -->
	<script src="{{ url('/js/sweetalert2.js') }}"></script>

	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome -->
	<!-- <link rel="stylesheet" href="{{ url('/adminlte/plugins/css/all.min.css') }}"> -->
	<script src="https://kit.fontawesome.com/92d96e629d.js" crossorigin="anonymous"></script>

	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="{{ url('/adminlte/plugins/css/bootstrap-4.min.css') }}">

	<!-- Toastr -->
	<link rel="stylesheet" href="{{ url('/adminlte/plugins/css/toastr.min.css') }}">

	<!-- SweetAlert2 -->
	<script src="{{ url('/adminlte/plugins/js/sweetalert2.min.js') }}"></script>

	<!-- Toastr -->
	<script src="{{ url('/adminlte/plugins/js/toastr.min.js') }}"></script>

	<!-- Theme style -->
	<link rel="stylesheet" href="{{ url('/adminlte/plugins/css/adminlte.min.css') }}">

	<!-- Bootstrap 4 -->
	<script src="{{ url('/js/bootstrap.bundle.min.js') }}"></script>

	<!-- Toast -->
	<script>
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
	</script>

	<style>
		.os-content-glue {
			height: 0px !important;
		}

		.os-content-arrange {
			height: 0px !important;
		}

		.sidebar {
			padding-left: 0 !important;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item d-none d-sm-inline-block">
					<a href="{{ url('/') }}" class="nav-link">Beranda</a>
				</li>
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="{{ url('beranda') }}" class="brand-link">
				<img src="<?= url('/img/Lawson_Station.png') ?>" alt="profile Logo" class="brand-image elevation-3">
				<span class="brand-text font-weight-light">LAWSON ADMIN</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-users"></i>
								<p>
									Users
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ url('users') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Users</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-gift"></i>
								<p>
									Products
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ url('product/products') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Product</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ url('product/merchant') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Merchant</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ url('product/city') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>City</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-truck"></i>
								<p>
									Orders
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ url('orders/order-item') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Order Item</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="{{ url('orders/master-status') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Master Status</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-file-excel"></i>
								<p>
									Report
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="{{ url('report/report-sales') }}" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Sales</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<div class="content-wrapper pt-3">
			@yield('content')
		</div>
		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->


	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>

	<!-- overlayScrollbars -->
	<script src="{{ url('/adminlte/plugins/js/jquery.overlayScrollbars.min.js') }}"></script>

	<!-- AdminLTE App -->
	<script src="{{ url('/adminlte/plugins/js/adminlte.js') }}"></script>

	<!-- AdminLTE for demo purposes -->
	<script src="{{ url('/adminlte/plugins/js/demo.js') }}"></script>

	@if (session()->has('success'))
	<script>
		Toast.fire({
			icon: 'success',
			title: '<?= session('success') ?>'
		})
	</script>
	@endif

	@if (session()->has('error'))
	<script>
		Toast.fire({
			icon: 'error',
			title: '<?= session('error') ?>'
		})
	</script>
	@endif

	@if (session()->has('errors'))
	<script>
		Toast.fire({
			icon: 'error',
			title: '<?= session('errors') ?>'
		})
	</script>
	@endif

</body>

</html>