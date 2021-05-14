<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Learncode') }}</title>

        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css') }}/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">

    </head>
    <body class="contact-us">

        <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">

            <div class="container-fluid">

                <a class="navbar-brand" href="#"><span class="logo">LC</span> Learncode</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse links" id="navbarSupportedContent">
                    <form class="search-form form-inline mr-auto" action="{{route('search')}}" method="GET">
                        <input class="form-control" type="text" name="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-mdb-color btn-rounded btn-sm my-0 ml-sm-2" type="submit">Search</button>
                    </form>

                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('homeuser')}}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('allsubjects') }}">All subjects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contactget') }}">Contact us</a>
                        </li>
                        <li class="nav-item active dropdown">
                            <a class="nav-link @auth dropdown-toggle @endauth" href="{{ route('login') }}" @auth id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" @endauth>
                                @auth
                                {{\Str::limit(auth()->user()->name, 10)}}
                                @endauth
                                @guest
                                Login
                                @endguest
                            </a>
                            @auth

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a href="{{ route('profile') }}" class="dropdown-item">
                                    <i style="margin-right:5px" class="fas fa-male"></i>
                                    <span>{{ __('My profile') }}</span>
                                </a>

                                @if(auth()->user()->admin == 1 || auth()->user()->admin == 2)
                                    <a style="margin-bottom:7px" href="{{ route('home') }}" class="dropdown-item">
                                        <i style="margin-left:-7px;margin-right:5px" class="fas fa-home"></i>
                                        <span>{{ __('go to admin') }}</span>
                                    </a>
                                @endif
                                <a href="{{ route('mysubjects') }}" class="dropdown-item">
                                    <i style="margin-left:-7px;margin-right:5px" class="fas fa-chalkboard-teacher"></i>
                                    <span>{{ __('My Subjects') }}</span>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    <i style="margin-right:3px" class="fas fa-sign-out-alt"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>
                            </div>
                            @endauth
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
                        <div class="container-fluid contact">
                            <div class="row contact-page">
                                <div class="col-sm-6">
                                    <div class="text-center contact-title">
                                        <h1>Get In Touch</h1>
                                        <h2>We are always ready to respond to you</h2>
                                        <img class="img-fluid img-thumbnail" src="{{ asset('images') }}/img-01.png" class="card-img-top" alt="Subject Photo">
                                        <img class="email img-fluid img-thumbnail" src="{{ asset('images') }}/email-us.webp" class="card-img-top" alt="Subject Photo">
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                </div>

                                <div class="col-sm-5">
                                    <p id="error" role="alert" class="alert alert-danger" style="font-size:16px;font-family:'lato';padding: 8px 15px;display:none;margin-top:10px">

                                        please enter your name , email , subject and message correctly
                                    </p>
                                    <p id="message" role="alert" class="alert alert-success" style="font-size:16px;font-family:'lato';padding: 8px 15px;display:none;margin-top:10px"></p>
                                    <div class="contact-info">
                                                <form method="POST" id="contact-form" action="{{route('contactpost')}}" autocomplete="off">

                                                    @csrf
                                                    <h2 class="heading-small">{{ __('Contact information') }}</h2>

                                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                                        <input type="text" name="name" id="input-name" class="contact-field form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="" required autofocus>

                                                        @if ($errors->has('name'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                                        <input type="email" name="email" id="input-email" class="contact-field form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="" required>

                                                        @if ($errors->has('email'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>

                                                    <div class="form-group{{ $errors->has('subject') ? ' has-danger' : '' }}">
                                                        <label class="form-control-label" for="input-subject">{{ __('Subject') }}</label>
                                                        <input type="text" name="subject" id="input-subject" class="contact-field form-control form-control-alternative{{ $errors->has('subject') ? ' is-invalid' : '' }}" placeholder="{{ __('subject') }}" value="">

                                                        @if ($errors->has('subject'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('subject') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-control-label" for="input-message">{{ __('Message') }}</label>
                                                        <textarea name="message" id="input-message" class="contact-field form-control form-control-alternative" placeholder="{{ __('message') }}" value="" rows="6"></textarea>


                                                        @if ($errors->has('message'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('message') }}</strong>
                                                            </span>
                                                        @endif

                                                    </div>

                                                    <div class="text-center submit">
                                                        <button type="submit" class="btn btn-primary mt-2"><i style="margin-right:10px"class="fas fa-envelope"></i>{{ __('Send') }}</button>
                                                    </div>

                                                </form>
                                        </div>
                                </div>
                            </div>
                        </div>

    <footer class="page-footer font-small stylish-color-dark pt-4">

<!-- Footer Links -->
        <div class="container text-center text-md-left">

        <!-- Grid row -->
        <div class="row">

            <!-- Grid column -->
            <div class="col-md-4 mx-auto">

            <!-- Content -->
            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Learn with us</h5>
            <p>LearnCode is the most popular learning platform in the middle east where you can find all subjects that you need to develop your skills
                and start your career.
            </p>

            </div>

            <hr class="clearfix w-100 d-md-none">

            <div class="col-md-2 mx-auto">

            <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Links</h5>

            <ul class="list-unstyled">
                <li>
                <a href="{{route('homeuser')}}">Home</a>
                </li>
                <li>
                <a href="{{ route('contactget') }}">Contact</a>
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

                        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('js') }}/script.js"></script>
        <script src="{{ asset('js') }}/jquery-3.5.1.min.js">
        //<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
        <script src="{{ asset('js') }}/bootstrap.min.js"></script>
        <script src="{{ asset('js') }}/bootstrap.js"></script>


    </body>
</html>
