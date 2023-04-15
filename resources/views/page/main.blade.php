<!DOCTYPE html>
<html lang="en">
<head>
    @include('page.head')
</head>
<body class="animsition">
	
	<!-- Header -->
	@include('page.header')

	<!-- Cart -->
	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				<div class="item-slick1" style="background-image: url(/template/page/images/slider-01.jpg);">
				</div>

				<div class="item-slick1" style="background-image: url(/template/page/images/slider-02.jpg);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
						</div>
					</div>
				</div>

				<div class="item-slick1" style="background-image: url(/template/page/images/slider-03.jpg);">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Product -->

	@yield('content')

	<!-- Footer -->
	@include('page.footer')
<!-- Link back to Colorlib can't be removed. /template is licensed under CC BY 3.0. -->

				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>

	<!-- Modal1 -->

@include('page.foot')

</body>
</html>