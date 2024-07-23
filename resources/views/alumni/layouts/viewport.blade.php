<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Meyawo landing page.">
    <meta name="author" content="Devcrud">
    <title>My Portfolio</title>
    <!-- font icons -->
    <link rel="stylesheet" href="{{asset('portfolio/assets/vendors/themify-icons/css/themify-icons.css')}}">
    <!-- Bootstrap + Meyawo main styles -->
    <link rel="stylesheet" href="{{asset('portfolio/assets/css/meyawo.css')}}">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">

    <!-- Page Navbar -->
    <nav class="custom-navbar" data-spy="affix" data-offset-top="20">
        <div class="container">
            <a class="logo" href="#">My Portfolio</a>
            <ul class="nav">
                <li class="item">
                    <a class="link" href="#home">Home</a>
                </li>
                <li class="item">
                    <a class="link" href="#about">About</a>
                </li>
                <li class="item">
                    <a class="link" href="#portfolio">Portfolio</a>
                </li>
                <li class="item">
                    <a class="link" href="#contact">Contact</a>
                </li>
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
                <span class="down">I am John Doe</span>
            </h1>
            <p class="header-subtitle">FRONTEND WEB DESIGNER</p>

            <a class="btn btn-primary" href="#portfolio">Visit My Works</a>
        </div>
    </header><!-- end of page header -->

    <!-- about section -->
    <section class="section pt-0" id="about">
        <!-- container -->
        <div class="container text-center">
            <!-- about wrapper -->
            <div class="about">
                <div class="about-img-holder">
                    <img src="{{asset('portfolio/assets/imgs/man.png')}}" class="about-img"
                        alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                </div>
                <div class="about-caption">
                    <p class="section-subtitle">Who Am I ?</p>
                    <h2 class="section-title mb-3">About Me</h2>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae aliquid ad provident aut
                        fuga animi soluta quae eos non cupiditate voluptates dolorem, doloremque quos dicta quibusdam
                        impedit iure nemo a iste
                        <br>culpa! Quasi quibusdam hic recusandae delectus velit officiis explicabo voluptatibus! Nemo
                        esse similique, voluptates labore distinctio, placeat explicabo facilis molestias, blanditiis
                        culpa iusto voluptatem ratione eligendi a, quia temporibus velit vero ipsa sint ex voluptatum
                        expedita aliquid! Debitis, nam!
                    </p>
                    <button class="btn-rounded btn btn-outline-primary mt-4">Download CV</button>
                </div>
            </div><!-- end of about wrapper -->
        </div><!-- end of container -->
    </section> <!-- end of about section -->

    <!-- service section -->
    <section class="section" id="service">
        <div class="container text-center">
            <p class="section-subtitle">What I Do ?</p>
            <h6 class="section-title mb-6">Service</h6>
            <!-- row -->
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="{{asset('portfolio/assets/imgs/pencil-case.svg')}}"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Adipisicing</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="{{asset('portfolio/assets/imgs/responsive.svg')}}"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Sapiente</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="{{asset('portfolio/assets/imgs/toolbox.svg')}}"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Placeat</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-card">
                        <div class="body">
                            <img src="{{asset('portfolio/assets/imgs/analytics.svg')}}"
                                alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page"
                                class="icon">
                            <h6 class="title">Iusto</h6>
                            <p class="subtitle">Labore velit culpa adipisci excepturi consequuntur itaque in nam
                                molestias dolorem iste quod.</p>
                        </div>
                    </div>
                </div>
            </div><!-- end of row -->
        </div>
    </section><!-- end of service section -->

    <!-- portfolio section -->
    <section class="section" id="portfolio">
        <div class="container text-center">
            <p class="section-subtitle">What I Did ?</p>
            <h6 class="section-title mb-6">Portfolio</h6>
            <!-- row -->
            <div class="row">
                <div class="col-md-4">
                    <a href="#" class="portfolio-card">
                        <img src="{{asset('portfolio/assets/imgs/folio-1.jpg')}}" class="portfolio-card-img"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Designing</h4>
                                    <p class="font-weight-normal">Category: Web Templates</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="{{asset('portfolio/assets/imgs/folio-2.jpg')}}" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Designing</h4>
                                    <p class="font-weight-normal">Category: Web Templates</p>
                            </span>
                        </span>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#" class="portfolio-card">
                        <img class="portfolio-card-img" src="{{asset('portfolio/assets/imgs/folio-3.jpg')}}" class="img-responsive rounded"
                            alt="Download free bootstrap 4 landing page, free boootstrap 4 templates, Download free bootstrap 4.1 landing page, free boootstrap 4.1.1 templates, meyawo Landing page">
                        <span class="portfolio-card-overlay">
                            <span class="portfolio-card-caption">
                                <h4>Web Designing</h4>
                                    <p class="font-weight-normal">Category: Web Templates</p>
                            </span>
                        </span>
                    </a>
                </div>
            </div><!-- end of row -->
        </div><!-- end of container -->
    </section> <!-- end of portfolio section -->


    <!-- contact section -->
    <section class="section" id="contact">
        <div class="container text-center">
            <p class="section-subtitle">How can you communicate?</p>
            <h6 class="section-title mb-5">Contact Me</h6>
            <!-- contact details -->
             
            <!-- end of contact details -->
        </div><!-- end of container -->
    </section><!-- end of contact section -->
    <!-- core  -->
    <script src="{{asset('portfolio/assets/vendors/jquery/jquery-3.4.1.js')}}"></script>
    <script src="{{asset('portfolio/assets/vendors/bootstrap/bootstrap.bundle.js')}}"></script>

    <!-- bootstrap 3 affix -->
    <script src="{{asset('portfolio/assets/vendors/bootstrap/bootstrap.affix.js')}}"></script>

    <!-- Meyawo js -->
    <script src="{{asset('portfolio/assets/js/meyawo.js')}}"></script>

</body>

</html>