<!DOCTYPE html>
<html lang="en">
	@include('home.head')
	<body>
		<!-- HEADER -->
		<header>
			@include('home.navbar')
		</header>
		<!-- /HEADER -->

		@include('home.category')

		@yield('content')

		<!-- FOOTER -->
		@include('home.footer');
		<!-- /FOOTER -->
        <div class="modal fade" tabindex="-1" style="margin-top: 150px" id="modal_all_box">
            <div class="modal-dialog"></div>
        </div>
		<!-- jQuery Plugins -->
        @include('home.script')

	</body>
</html>
