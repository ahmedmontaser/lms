<!-- Footer -->
<footer class="page-footer font-small stylish-color-dark pt-4">

	<!-- Footer Links -->
	<div class="container text-center text-md-left">

		<!-- Grid row -->
		<div class="row">

			<!-- Grid column -->
			<div class="col-md-4 mx-auto">

				<!-- Content -->
				<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Learn with us</h5>
				<p>LearnCode is the most popular learning platform in the middle east where you can find all subjects
					that you need to develop your skills
					and start your career.
				</p>

			</div>

			<hr class="clearfix w-100 d-md-none">

			<div class="col-md-2 mx-auto">

				<h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

				<ul class="list-unstyled">
					<li>
						<a href="{{ route('home') }}">Home</a>
					</li>
					<li>
						<a href="{{ route('login') }}">Login</a>
					</li>
					<li>
						<a href="{{ route('mysubjects') }}">All Subjects</a>
					</li>
				</ul>

			</div>


			<hr class="clearfix w-100 d-md-none">

			<div class="motivation col-md-4 mx-auto">

				<video src="{{ asset('images') }}/22.mp4" poster="{{ asset('images') }}/7.jpg" width="480" controls>
				</video>

			</div>


		</div>

	</div>


	<hr>

	<!-- Call to action -->
	<ul class="list-unstyled list-inline text-center py-2">
		<li class="list-inline-item">
			<h5 class="mb-1">Register for free</h5>
		</li>
		<li class="list-inline-item">
			<a href="{{ route('register') }}" class="btn btn-danger btn-rounded">SIGN UP!</a>
		</li>
	</ul>
	<!-- Call to action -->

	<hr>

	<!-- Social buttons -->
	<ul class="list-unstyled list-inline text-center">
		<li class="list-inline-item">
			<a class="btn-floating btn-fb mx-1">
				<i class="fab fa-facebook-f"> </i>
			</a>
		</li>
		<li class="list-inline-item">
			<a class="btn-floating btn-tw mx-1">
				<i class="fab fa-twitter"> </i>
			</a>
		</li>
		<li class="list-inline-item">
			<a class="btn-floating btn-gplus mx-1">
				<i class="fab fa-google-plus-g"> </i>
			</a>
		</li>
		<li class="list-inline-item">
			<a class="btn-floating btn-li mx-1">
				<i class="fab fa-linkedin-in"> </i>
			</a>
		</li>
		<li class="list-inline-item">
			<a class="btn-floating btn-dribbble mx-1">
				<i class="fab fa-dribbble"> </i>
			</a>
		</li>
	</ul>
	<!-- Social buttons -->

	<!-- Copyright -->
	<div class="footer-copyright text-center py-3">© 2020 Copyright:
		<a style="color:#fff" href="#">Learncode.com</a>
	</div>
	<!-- Copyright -->

</footer>
<!-- Footer -->
