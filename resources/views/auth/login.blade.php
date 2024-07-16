<html dir="ltr">
<head>
    <title>Fedena</title>
    <link rel="shortcut icon" href="https://d316slxpfg6dut.cloudfront.net/uploads/5890/school_details/logos/3677/original/20210331040329/ist.png?Expires=1721035105&amp;Signature=dTCuDMqEH8OOZFNBOfFEs-OnGwnlvLoiM0yhljlJOenOUaeWaF~DfXCNCLBqZ8JFgnNnbt193khQpZlwlbDq-o8XkbJenybvxqPCDhz9XGZzWbQEzcS709gzSUrkV6gDPCqhepB2fI8arS9MjMDTe0hlvtc3Ta2Hu8l9T4Gz76M_&amp;Key-Pair-Id=APKAJZKMP45MLXDO32ZQ" type="image/png">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/_layouts/login.css?c34eccac6687c62c61455107dc949706" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/_styles/ui.all.css?02dd6a04a27da388e781a9f122adb15e" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/modalbox.css?0b38ef36bd8317ad8fc66dc0e094472b" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/autosuggest-menu.css?79f5238fee5ff2838d3c9b5734ac96f7" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/user/login.css?25c61d9217a3a0a025bc160a2b75ed01" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/online_exam_link_icon.css?e096ace09d081f97b3cd0f9af57d32ac" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/additional_report_link_icon.css?1b6eb850f7ecbeb20144fcbbf241c174" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/themes/11/theme_css.css?004233deda2ecd1a488120c571c6fa39" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/calendar.css?cb7709f8bf9483d12e902f0b1669fae7" media="screen" rel="stylesheet" type="text/css">
    <link href="https://d13ohw70dmfvjd.cloudfront.net/stylesheets/fonts/1/font.css?1576c4525455a665cc32129c2554f04c" media="screen" rel="stylesheet" type="text/css">
    <script src="https://d13ohw70dmfvjd.cloudfront.net/javascripts/prototype.js?b5684120e496c310977713be34be4868" type="text/javascript"></script>
    <script src="https://d13ohw70dmfvjd.cloudfront.net/javascripts/effects.js?a7d95dc040992701ba78fd5b97af950e" type="text/javascript"></script>
    <script src="https://d13ohw70dmfvjd.cloudfront.net/javascripts/dragdrop.js?3aa08ad9af21eb305a120e2e1a47d1af" type="text/javascript"></script>
    <script src="https://d13ohw70dmfvjd.cloudfront.net/javascripts/controls.js?136701e951925f3dcb84f9a231f9326e" type="text/javascript"></script>
    <script src="https://d13ohw70dmfvjd.cloudfront.net/javascripts/application.js?6f146efc802e43c1e1d8ed60d8e6a624" type="text/javascript"></script>
    <style>
        .input-box:focus {
            border-color: red;
            outline: none;
            box-shadow: 0 0 0 1px red;
        }
        .login-btn {
            background-color: red;
            border-color: red;
        }
    </style>
</head>

<body id="container" style="background-image: url('')">
    <div id="wrapper">
        <div id="login_box">
            <div id="school-name">Institute of Software Technologies</div>
            <div id="big_login-input-box">
                <div id="big_logo_area">
                    <div id="big_top_logo">
                        <img alt="Ist" src="https://d316slxpfg6dut.cloudfront.net/uploads/5890/school_details/logos/3677/original/20210331040329/ist.png?Expires=1721035105&amp;Signature=dTCuDMqEH8OOZFNBOfFEs-OnGwnlvLoiM0yhljlJOenOUaeWaF~DfXCNCLBqZ8JFgnNnbt193khQpZlwlbDq-o8XkbJenybvxqPCDhz9XGZzWbQEzcS709gzSUrkV6gDPCqhepB2fI8arS9MjMDTe0hlvtc3Ta2Hu8l9T4Gz76M_&amp;Key-Pair-Id=APKAJZKMP45MLXDO32ZQ">
                    </div>
                </div>

                <!-- Laravel Login Form -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div id="login_area">
                        <div id="username_textbox_bg">
                            <x-text-input id="email" class="block mt-1 w-full input-box" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" placeholder="Username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        
                        <div id="password_textbox_bg">
                            <x-text-input id="password" class="block mt-1 w-full input-box" type="password" name="password" required autocomplete="current-password" placeholder="Password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div id="submit_area" class="flex items-center justify-end mt-4">
                            <x-primary-button class="ms-3 login-btn">
                                {{ __('Login') }}
                            </x-primary-button>

                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                    {{ __('Forgot password?') }}
                                </a>
                            @endif
                        </div>
                        
                        <div id="google_login_area">
                            <a href="/oauth/new?provider=google"><span class="google-signin-icon"></span></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="powered_by_div">
            Powered by <a href="http://www.fedena.com/" target="_blank" class="themed_text">Fedena </a>
        </div>
    </div>

    <script type="text/javascript">
        document.getElementById('user_username').focus();
    </script>
</body>
</html>
