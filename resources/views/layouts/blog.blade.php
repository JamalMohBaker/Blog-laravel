<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap4.6.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.jpg') }}" type="image/x-icon">
</head>
<body>
    <section id="nav">
        <nav class="navbar navbar-expand-lg navbar-light  ml-5">
            <a class="navbar-brand" href="index.html">
                <img src="{{ '/storage/' . $attributes['image'] }}" alt="Image">
            </a>
            <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars "></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active act">
                    <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>

                @if( auth()->check() )
                    {{-- <li class="nav-item">
                        <a class="nav-link fav" href="favorite.html"> Favorite <i class="fa-solid fa-heart"></i> </a>
                    </li> --}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('suggestionss.create') }} ">Suggestions & Complaints</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile.edit') }}"> Profile </a>
                    </li>
                    @if(auth()->user()->type === 'admin')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logos.index') }}"> Dashboard </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutform').submit()">
                           <form action="{{ route('logout') }}" method="POST" id="logoutform" class="d-none">
                               @csrf
                           </form>
                           Logout
                       </a>
                    </li>
                @endif
                @if( ! auth()->check() )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login / Sign Up</a>
                    </li>
                @endif
                </ul>
                <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
                    <button class="icon-container my-2 my-sm-0" type="submit">
                        <i class="fa-solid fa-magnifying-glass fa-lg"></i>
                    </button>
                </form>
            </div>
        </nav>
    </section>

    {{ $slot }}


   <section id="footer">
    <div class="all">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 d-flex justify-content-center flex-column align-items-center">
                    <div class="image mt-2">
                        <img src="{{ '/storage/' . $attributes['image'] }}" alt="Image">
                    </div>
                    <div class="description  mt-5">
                        This Is My Blog To Post Articles And News
                        I hope you all like it and are satisfied
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12  d-flex justify-content-center flex-column align-items-center">
                    <div class="icon m-5 p-5">
                        <p><i class="fa-solid fa-phone"></i> 0592280485</p>
                        <p><i class="fa-brands fa-facebook"></i> FaceBook</p>
                        <p><i class="fa-brands fa-square-instagram"></i> Instagram</p>
                        <p><i class="fa-brands fa-linkedin"></i> Linkedin</p>
                        <p><i class="fa-brands fa-square-twitter"></i> Twitter</p>
                        <p><i class="fa-brands fa-youtube"></i> Youtube</p>
                        <p><i class="fa-brands fa-telegram"></i> Telegram</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12 text-center d-flex justify-content-center align-items-center">
                    <p>all rights reserved © 2023</p>
                </div>
            </div>

        </div>
    </div>
   </section>
   <div class="design text-center p-2 ">
    <i class="fa-brands fa-dev"></i>  Designed by Me Dev-jamal
    </div>

   {{-- <section id="loading-section">
    <!-- <span class="loader">BL&nbsp;G</span> -->
    <div class="lds-hourglass"></div>
   </section> --}}

    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/Bootstrap4.6.js') }}"></script>
    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/fonts.js') }}"></script>
</body>
</html>
