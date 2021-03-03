<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

	<title>Tiendas Vallarta</title>

	<link href="{{ asset('images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

	<!-- jQuery -->
	<script src="{{ asset('js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>

	<!-- Bootstrap4 files-->
	
	<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="{{ asset('fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">

	<!-- plugin: fancybox  -->
	<script src="{{ asset('plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
	<link href="{{ asset('plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">

	<!-- custom style -->
	<link href="{{ asset('css/ui.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
	<script src="{{ asset('js/app.js') }}" type="text/javascript"></script>

	</script>

</head>

<body>
	<style type="text/css">
		.section-content {
			min-height: 82vh;
		}
	</style>
	<header class="section-header">
		
		<section class="border-bottom">
			<nav class="navbar navbar-main  navbar-expand-lg navbar-light">
				<div class="container">
					<a class="navbar-brand" href="/"><img src="../images/logo.png" class="logo"></a>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav2"
						aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="main_nav2">
						<ul class="navbar-nav mr-auto">
					
							<li class="nav-item">
								<a class="nav-link" href="/">Inicio</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Abarrotes</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Ferreteria</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Zapatos</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Ropa</a>
							</li>

						</ul>

						<form class="form-inline my-2 my-lg-0">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Buscar...">
								<div class="input-group-append">
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</form>

					</div> <!-- collapse .// -->
				</div> <!-- container .// -->
			</nav>
		</section> <!-- header-main .// -->
	</header> <!-- section-header.// -->
	<!-- ========================= SECTION PAGETOP ========================= -->
	<section class="section-pagetop ">
		<div class="container ">
			@yield('breadcrumb')
		</div> <!-- container //  -->
	</section>

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content  padding-y">
		<div class="container text-center">
			@yield('content')
		</div> <!-- container .//  -->
	</section>
	<!-- ========================= SECTION CONTENT END// ========================= -->

	<!-- ========================= FOOTER ========================= -->
	<footer class="section-footer border-top padding-y-sm ">
		<div class="container">
			<p class="float-md-right">
				&copy Copyright 2021 All rights reserved
			</p>
			<p>
				<a href="#">Tiendas Vallarta</a>
			</p>
		</div><!-- //container -->

	</footer>
	<!-- ========================= FOOTER END // ========================= -->
</body>

</html>