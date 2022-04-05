<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" href="{{ asset('public/adminAssets/fonts/font.css') }}">
    <link rel="stylesheet" href="{{ asset('public/adminAssets/css/style.css') }}">
    <link rel="icon" href="{{ asset('public/adminAssets/images/favicon.png') }}" type="skype-img" />

    <title>Admin</title>
    <div class="shopholic-admin">
        <div class="container">
            <div class="row">
                <div class="col-md-6 img-bar">
                    <figure>
                        <img src="{{ asset('public/adminAssets/images/spalsh_art.svg') }}" alt="admin" width="100%">
                    </figure>
                </div>
                <div class="col-md-6 login-sec">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img src="{{ asset('public/adminAssets/images/logo.png') }}" alt="logo" width="160px">
                        <h3>ADMIN LOGIN</h3>
                        <div class="form-group">
                            <label>Login ID</label>
                            <input type="email" name="email" class="form-control @error('email') form-control-danger @enderror text-color" value="{{ old('email') }}" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('password') form-control-danger @enderror text-color" value="{{ old('password') }}" required>
                        </div>
                        <div class="col-md-12 ">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary bg-color">LOGIN</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</head>

<body>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".logo-sec .admin-login a").click(function() {
                $(".logo-sec .admin-login").toggleClass("admin-dropdopen");
            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $('.items').slick({
                dots: true,
                infinite: true,
                speed: 800,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        });
    </script>
    <script>
        var inputs = document.querySelectorAll('input[type=text], input[type=email], input[type="password"], input[type="number"], textarea');
        for (i = 0; i < inputs.length; i++) {
            var inputEl = inputs[i];
            if (inputEl.value.trim() !== '') {
                inputEl.parentNode.classList.add('input--filled');
            }
            inputEl.addEventListener('focus', onFocus);
            inputEl.addEventListener('blur', onBlur);
        }

        function onFocus(ev) {
            ev.target.parentNode.classList.add('inputs--filled');
        }

        function onBlur(ev) {
            if (ev.target.value.trim() === '') {
                ev.target.parentNode.classList.remove('inputs--filled');
            } else if (ev.target.checkValidity() == false) {
                ev.target.parentNode.classList.add('inputs--invalid');
                ev.target.addEventListener('input', liveValidation);
            } else if (ev.target.checkValidity() == true) {
                ev.target.parentNode.classList.remove('inputs--invalid');
                ev.target.addEventListener('input', liveValidation);
            }
        }

        function liveValidation(ev) {
            if (ev.target.checkValidity() == false) {
                ev.target.parentNode.classList.add('inputs--invalid');
            } else {
                ev.target.parentNode.classList.remove('inputs--invalid');
            }
        }

        var submitBtn = document.querySelector('input[type=submit]');
        submitBtn.addEventListener('click', onSubmit);

        function onSubmit(ev) {
            var inputsWrappers = ev.target.parentNode.querySelectorAll('div');
            for (i = 0; i < inputsWrappers.length; i++) {
                input = inputsWrappers[i].querySelector('input[type=text], input[type=email], input[type="password"] ,input[type="number"], textarea');
                if (input.checkValidity() == false) {
                    inputsWrappers[i].classList.add('inputs--invalid');
                } else if (input.checkValidity() == true) {
                    inputsWrappers[i].classList.remove('inputs--invalid');
                }
            }
        }
    </script>
</body>

</html>