<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/owl.carousel.min.css" rel="stylesheet">
    <link href="./css/owl.theme.default.css" rel="stylesheet">
    <link href="./css/owl.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex flex-column min-vh-100 min-vw-100 pb-3" id="page">
        <div class="d-flex flex-grow-1 justify-content-center align-items-center">
            <div class="contact sliderbanner" style="border-radius: 15px">
                <div class="owl-carousel owl-theme" id="blanter-carousel" style="background-color: #d8e0ea;">
                    @foreach ($teams as $team)
                        <div class="blanter-owl-image item my-5">
                            <img alt="carousel-slider" src="/image/{{ $team->image }}" />
                            <div class="detail-contact text-center">
                                <p class="mt-2 mb-0 font-weight-bold">
                                    {{ $team->name }}
                                </p>
                                <p class="my-0">
                                    {{ $team->role }}
                                </p>
                                {!! $team->description !!}

                            </div>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>

        <!-- <div data-src="./components/footer.html"></div> -->
        <footer class="footer">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <nav id="navbar" class="navbar">
                    <ul class="nav nav-pills">
                        <li><a class="nav-link text-light" href="{{ route('home') }}">Projects</a></li>
                        <li><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="nav-link text-light" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>

    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js//blanter-owlcarousel.js"></script>
    <script src="js/include-html.js"></script>
    <script src="js/owl.js"></script>
    <script>
        if (window.matchMedia("(max-width: 768px)").matches) {
            $(".card").removeClass("w-50");
        } else {
            $(".card").addClass("w-50");
        }
    </script>
</body>

</html>
