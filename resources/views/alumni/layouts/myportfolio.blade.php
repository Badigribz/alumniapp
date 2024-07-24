<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>My Portfolio</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{ asset('portfolio/assets/vendors/themify-icons/css/themify-icons.css') }}">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{ asset('portfolio/assets/css/meyawo.css') }}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="logo" href="#">My Portfolio</a>
            <ul class="nav">
                <li class="item"><a class="link" href="#home">Home</a></li>
                <li class="item"><a class="link" href="#about">About</a></li>
                <li class="item"><a class="link" href="#portfolio">Portfolio</a></li>
                <li class="item"><a class="link" href="#contact">Contact</a></li>
                <li class="item ml-md-3">
                    <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
                </li>
            </ul>
            <a href="javascript:void(0)" id="nav-toggle" class="hamburger hamburger--elastic">
                <div class="hamburger-box">
                    <div class="hamburger-inner"></div>
                </div>
            </a>
        </div>
    </nav><!-- End of Page Navbar -->

    <!-- page header -->
    <header id="home" class="header">
        <div class="overlay"></div>
        <div class="header-content container">
            <h1 class="header-title">
                <span class="up">HI!</span>
                <span class="down">I am {{ $user->name }}</span>
            </h1>
            <p class="header-subtitle">{{ $portfolio->profession }}</p>
            <a class="btn btn-primary" href="#portfolio">Visit My Works</a>
        </div>
    </header><!-- end of page header -->

    <!-- about section -->
    <section class="section pt-0" id="about">
        <div class="container text-center">
            <div class="about">
                <div class="about-img-holder">
                    <img src="{{ asset('portfolio/assets/imgs/man.png') }}" class="about-img" alt="Profile Image">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle">Who Am I ?</p>
                    <h2 class="section-title mb-3">About Me</h2>
                    <p>{{ $portfolio->about_me }}</p>
                    <button class="btn-rounded btn btn-outline-primary mt-4">Download CV</button>
                </div>
            </div>
        </div>
    </section> <!-- end of about section -->

    <!-- service section -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What I Do ?</p>
            <h6 class="section-title mb-6">Service</h6>
            <div class="row">
                @foreach($portfolio->services as $service)
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="{{ asset('portfolio/assets/imgs/pencil-case.svg') }}" alt="Service Icon" class="icon">
                            <h6 class="title">{{ $service->service }}</h6>
                            <p class="subtitle">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section><!-- end of service section -->

    <!-- portfolio section -->
    <section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Portfolio</h6>
            <div class="row">
                @foreach($portfolio->links as $link)
                <div class="col-md-4">
                    <a href="{{ $link->link }}" class="portfolio-card">
                        <img src="{{ asset('portfolio/assets/imgs/folio-1.jpg') }}" class="portfolio-card-img" alt="Portfolio Image">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>{{ $link->work_category }}</h4>
                                <p class="font-weight-normal">{{ $link->link }}</p>
                            </span>
                        </span>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
    </section> <!-- end of portfolio section -->

    <!-- contact section -->
    <section class="section" id="contact">
        <div class="container text-center">
            <p class="section-subtitle">How can you communicate?</p>
            <h6 class="section-title mb-5">Contact Me</h6>
            <p>Email: {{ $user->email }}</p>
            <p>Phone Number: {{ $portfolio->phone_number }}</p>
        </div>
    </section><!-- end of contact section -->

    <!-- core  -->
    <script src="{{ asset('portfolio/assets/vendors/jquery/jquery-3.4.1.js') }}"></script>
    <script src="{{ asset('portfolio/assets/vendors/bootstrap/bootstrap.bundle.js') }}"></script>
    <!-- bootstrap 3 affix -->
    <script src="{{ asset('portfolio/assets/vendors/bootstrap/bootstrap.affix.js') }}"></script>
    <!-- Meyawo js -->
    <script src="{{ asset('portfolio/assets/js/meyawo.js') }}"></script>

</body>
</html>
