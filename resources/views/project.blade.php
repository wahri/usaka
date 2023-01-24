<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Detail</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl-detail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid d-flex flex-column min-vh-100 min-vw-100 pb-3" id="page">
        <div class="d-flex flex-grow-1 justify-content-center align-items-center">
            <div class="row">
                <div class="col-md-8">
                    <div class="sliderbanner container" id="project-image">
                        <div class="owl-carousel owl-theme" id="blanter-carousel">
                            @foreach ($project->projectImages as $eachImage)
                                <div class="blanter-owl-image item my-5">
                                    <img class="img-fluid" alt="carousel-slider"
                                        src="{{ asset('image/' . $eachImage['image']) }}" />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                        <div class="contact sliderbanner" style="border-radius: 15px">
                            <div class="owl-carousel owl-theme" id="blanter-carousel" style="background-color: #d8e0ea;">
                                <div class="blanter-owl-image item my-5">
                                    <img class="img-fluid" alt="carousel-slider" src="https://picsum.photos/500?random=1" />
                                </div>
                                <div class="blanter-owl-image item my-5">
                                    <img class="img-fluid" alt="carousel-slider" src="https://picsum.photos/500?random=2" />
                                </div>
                                <div class="blanter-owl-image item my-5">
                                    <img class="img-fluid" alt="carousel-slider" src="https://picsum.photos/500?random=3" />
                                </div>
                                <div class="blanter-owl-image item my-5">
                                    <img class="img-fluid" alt="carousel-slider" src="https://picsum.photos/500?random=4" />
                                </div>
                            </div>
            
                        </div>
            
                    </div> --}}

                </div>
                <div class="col-md-4">
                    <div class="desc-project card card-block border-0 py-5 px-3"
                        style="background-color: #d8e0ea;border-radius: 25px;">
                        <h4 class="text-center mb-3">{{ $project->title }}</h4>
                        <div class="body-desc">
                            {!! $project->description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div data-src="./components/footer.html"></div> -->
        <footer class="footer">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <nav id="navbar" class="navbar">
                    <ul class="nav nav-pills">
                        <li><a class="nav-link text-light" href="{{ route('home') }}">Projects</a></li>
                        <li><a class="nav-link text-light" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="nav-link text-light" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
    <script src="{{ asset('js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('js/include-html.js') }}"></script>
    <script src="{{ asset('js/blanter-owlcarousel.js') }}"></script>
    <script src="{{ asset('js/owl.js') }}"></script>

    <script>
        function transformScroll(event) {
            if (!event.deltaY) {
                return;
            }

            event.currentTarget.scrollLeft += event.deltaY + event.deltaX;
            event.preventDefault();
        }

        var element = document.getElementById("project-imag");
        element.addEventListener('wheel', transformScroll);
    </script>
</body>


</html>
