<!DOCTYPE HTML>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Bootstrap-ecommerce by Vosidiy M.">

	<title>Tiendas Vallarta</title>

	<link href="{{ asset('style/images/favicon.ico') }}" rel="shortcut icon" type="image/x-icon">

	<!-- jQuery -->
	<script src="{{ asset('style/js/jquery-2.0.0.min.js') }}" type="text/javascript"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="{{ asset('style/jquery-ui/jquery-ui.min.css') }}">
	<!-- Bootstrap4 files-->

	<link href="{{ asset('style/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />

	<!-- Font awesome 5 -->
	<link href="{{ asset('style/fonts/fontawesome/css/all.min.css') }}" type="text/css" rel="stylesheet">

	<!-- plugin: fancybox  -->
	<script src="{{ asset('style/plugins/fancybox/fancybox.min.js') }}" type="text/javascript"></script>
	<link href="{{ asset('style/plugins/fancybox/fancybox.min.css') }}" type="text/css" rel="stylesheet">

	<!-- custom style -->
	<link href="{{ asset('style/css/ui.css') }}" rel="stylesheet" type="text/css" />
	<link href="{{asset('style/css/responsive.css')}}" rel="stylesheet" media="only screen and (max-width: 1200px)" />

	<!-- custom javascript -->
	<scrip src="{{ asset('style/js/script.js') }}" type="text/javascript">
		</script>
		<scrip src="{{ asset('style/js/appp.js') }}" type="text/javascript"></scrip>



</head>

<body>
	<style type="text/css">
		.section-content {
			min-height: 82vh;
		}
	</style>
	<header class="section-header">
		<nav class="navbar p-md-0 navbar-expand-lg navbar-light border-bottom">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop3"
					aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarTop3">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item">
							<a class="nav-link" href="#"> <i class="fa fa-phone"></i> Llámanos: 238-211-4426</a>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link " data-toggle="dropdown"> MXN </a>
						</li>
						<li class="nav-item dropdown">
							<a href="#" class="nav-link" data-toggle="dropdown"> ES </a>
						</li>
					</ul>
					<ul class="navbar-nav">
						<li class="nav-item"><a href="#" class="nav-link"> 12/12/2021</a></li>
					</ul> <!-- list-inline //  -->
				</div> <!-- navbar-collapse .// -->
			</div> <!-- container //  -->
		</nav>

		<section class="header-main border-bottom">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-3 col-4">
						<a href="/" class="brand-wrap">
							<h4>Tiendas Vallarta</h4>
						</a> <!-- brand-wrap.// -->
					</div>
					<div class="col-lg-6 col-sm-12 order-3 order-lg-2">
						<form action="{{route('search.main')}}" class="search" method="GET">
							<div class="input-group w-100">
								<select id="department" class="form-control " name="department"
									onchange="location = this.options[this.selectedIndex].value;">
									@foreach ($departments as $department)
									<option @if($department -> id == $id_department) selected @endif
										value="{{route('products.index',$department->id)}}">{{$department -> nombre}}
									</option>
								
									@endforeach
								</select>
								<input type="hidden" name="id_department" value="{{$id_department}}">
								<input type="text" name="product" id="products-search" class="form-control"
									style="width:50%;" placeholder="Buscar">

								<div class="input-group-append">
									@method('GET')
									@csrf
									<button class="btn btn-primary" type="submit">
										<i class="fa fa-search"></i>
									</button>
								</div>
							</div>
						</form> <!-- search-wrap .end// -->
					</div> <!-- col.// -->
					<div class="col-lg-3 col-sm-6 col-8 order-2 order-lg-3">
						@guest
						<div class="d-flex justify-content-end mb-3 mb-lg-0">
							<div class="widget-header">
								<small class="title text-muted">Bienvenido!</small>
								<div>
									<a href="{{ route('login') }}">Iniciar sesión</a> <span class="dark-transp"> |
									</span>
									<a href="{{route('register') }}"> Registrarse</a>
								</div>
							</div>
							<a href="{{route('admin')}}" class="widget-header pl-3 ml-3">
								<div class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></div>
							</a>
						</div> <!-- widgets-wrap.// -->
						@else
						<div class="d-flex justify-content-center mb-3 mb-lg-0">

							<div class="widget-header  justify-content-center">
								<small class="title text-muted">Bienvenido {{ Auth::user()->name }} !</small>

								<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
									{{ __('Cerrar Sesión') }}
								</a>
								<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
									@csrf
								</form>

							</div>
							<a href="{{route('admin')}}" class="widget-header pl-3 ml-3 ">
								<div class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></div>
							</a>

						</div> <!-- widgets-wrap.// -->
						@endguest


					</div> <!-- col.// -->
				</div> <!-- row.// -->
			</div> <!-- container.// -->
		</section> <!-- header-main .// -->


		<!--<nav class="navbar navbar-main navbar-expand-lg border-bottom">
			<div class="container">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav3"
					aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				 <div class="collapse navbar-collapse" id="main_nav3">
					@yield('breadcrumb')
				</div> collapse .// 
			</div> <!-- container .// 
		</nav> <!-- navbar main end.// -->

	</header> <!-- section-header.// -->

	<!-- ========================= SECTION CONTENT ========================= -->
	<section class="section-content  padding-y">
		<div class="container">
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
		<script>
		
    $("#products-search").autocomplete({
        source: function (request, response) {
            $.ajax({
                url: "{{route('search.products')}}",
				type : 'get',
                dataType: "json",
                data: {
                    term: request.term,
                },
                success: function (data) {
                    response(data);
					
                },
				error: function(data) {
                alert("error");  
            }
            });
        },
    });

		</script>
	</footer>
	<!-- ========================= FOOTER END // ========================= -->
</body>

</html>