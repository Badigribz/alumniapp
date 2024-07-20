<meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>SuperAdmin Dashboard</title>
    <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no"name="viewport"/>
    <link rel="icon"href="{{asset('assets/img/kaiadmin/favicon.ico')}}"type="image/x-icon"/>

    <!-- Fonts and icons -->
    <script src="{{asset('assets/js/plugin/webfont/webfont.min.js')}}"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["{{asset('DashT/assets/css/fonts.min.css')}}"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{asset('DashT/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('DashT/assets/css/plugins.min.css')}}" />
    <link rel="stylesheet" href="{{asset('DashT/assets/css/kaiadmin.min.css')}}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
