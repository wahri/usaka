<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Projects</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/hover-front.css" rel="stylesheet">
    <link href="./css/style-front.css" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-2.2.1.min.js"></script>
    {{-- <link href="./css/style.css" rel="stylesheet"> --}}

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <style>
        #preloader {
            position: fixed;
            cursor: pointer;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #D8E0EA;
        }

        .logo {
            /* width: 50px; */
            background-color: #D8E0EA;
            border-radius: 100%;
            box-sizing: border-box;
        }

        .card-usaka {
            background-color: #D8E0EA;
        }

        .card-usaka-pink {
            background-color: #F4C1C7;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #3f4e5f;
            background-color: #F4C1C7;
        }

        /* .container-search-box{
            width: 350px;
            height: 50px;
        } */
        .container-search {
            width: 350px;
            height: 50px;
            background-color: #1e272e;
            /* top: 50%;
            left: 50%;
            transform: translate(-50%, -50%); */
            border-radius: 4rem;
            padding: 10px;
            margin-left: 1rem;
        }

        .search__box {
            float: left;
            width: 0;
            height: auto;
            background: none;
            color: #f7f7f7;
            /* font-size: 1.5rem; */
            border-radius: 2rem;
            outline: none;
            border: none;
            position: relative;
            opacity: 1;
            transition: all .75s ease-in;
            cursor: pointer;
        }


        .search__icon {
            box-sizing: border-box;
            float: right;
            /* font-size: 2.5rem; */
            display: inline-block;
            margin-left: .8rem;
            margin-top: 0;
            cursor: pointer;
            position: absolute;
            color: #D8E0EA;
            transition: all .25s ease-in;
            padding: .3rem;
            border-radius: 50%;
        }

        .container-search:hover>.search__box,
        .search__box:active>.search__box {
            width: 85%;
            padding: 0 1rem;
        }

        .container-search:hover>.search__icon,
        .search__box:active>.search__icon {
            color: #3f4e5f;
            background-color: #D8E0EA;
        }

        .show {
            width: 85%;
            border: 1px solid red;
        }
    </style>

    <script>
        $(function() {
            $("#preloader").fadeOut(2000);
            // $("#preloader").on("click", function() {
            //     $("#preloader").fadeOut(500);
            // });
        });
    </script>
</head>

<body>

    <div id="preloader">
        <div class="d-flex flex-column min-vh-100 min-vw-100">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <img src="{{ asset('image/logo_usaka.png') }}" alt="" width="150px">
            </div>
        </div>
    </div>

    <div class="container-fluid d-flex flex-column min-vh-100 min-vw-100 p-4" style="background-color: #3f4e5f;">

        <div class="row mb-3 d-flex align-items-center justify-content-center">
            <div class="col d-flex justify-content-center">
                <img src="{{ asset('image/logo_usaka_circle.png') }}" alt="usaka" style="width: 50px;">

                <div class="container-search">
                    <input type="text" id="box" placeholder="Search something..." class="search__box">
                    <i class="fas fa-search search__icon" id="icon" onclick="toggleShow()"></i>
                </div>
            </div>
        </div>

        <div class="d-flex flex-grow-1 justify-content-center align-items-center mb-3">
            <div class="items d-flex flex-row flex-nowrap overflow-auto p-3" id="all-scroll"
                style="background-color: #d8e0ea; border-radius: 15px;">
                @foreach ($projectAll->chunk(2) as $twoProject)
                    <div>
                        @foreach ($twoProject as $item)
                            <?php
                            $image = $item->projectImages[0]->image;
                            ?>
                            <a href="/project/{{ $item->id }}">
                                <div class="card card-block m-2 mb-3 bg-dark border-0"
                                    style="min-width: 332px; max-height: 220px;">
                                    <div class="hover hover-1 text-dark rounded">
                                        <img src="/image/{{ $image }}" alt="" class="img-fluid">
                                        <div class="hover-overlay"></div>
                                        <div class="hover-1-content px-3">
                                            <span class="hover-1-description font-weight-bold text-white mb-0">
                                                {{ $item['title'] }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <footer class="footer">
            <div class="d-flex flex-grow-1 justify-content-center align-items-center">
                <nav id="navbar" class="navbar">
                    <ul class="nav nav-pills">
                        <li><a class="nav-link" href="{{ route('home') }}">Projects</a></li>
                        <li><a class="nav-link text-light" href="{{ route('about') }}">About Us</a></li>
                        <li><a class="nav-link text-light" href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </footer>
        <!-- <div data-src="./components/footer.html"></div> -->
    </div>

    <script src="./js/jquery-3.6.1.min.js"></script>
    <script src="./js/include-html.js"></script>
    <script src="./js/scroll-handler.js"></script>

    <script>
        function transformScroll(event) {
            if (!event.deltaY) {
                return;
            }

            event.currentTarget.scrollLeft += event.deltaY + event.deltaX;
            event.preventDefault();
        }

        var element = document.getElementById("all-scroll");
        element.addEventListener('wheel', transformScroll);
    </script>
</body>

</html>
