<html>
    <head>
        <title>Каталог Telegram каналов, каналы телеграмм, лучший каталог телеграмма</title>
        <meta charset="UTF-8">
        <meta name="description" content="Telegram-list.com - сайт-каталог со списком всех каналов, пабликов, ботов и стикеров.">
        <meta name="keywords" content="телеграм каналы,канал каталог,каналы телеграмм,раскрутка телеграмма,канал Telegram,каталог каналов,бот телеграмма,искать канал.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta property="og:url" content="https://telegram-list.com">
        <meta property="og:site_name" content="telegram-list.com">
        <meta property="og:title" content="tCatalog">
        <meta property="og:description" content="Полный каталог Telegram каналов">
        <meta property="og:image" content="https://telegram.org/img/t_logo.png">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
              integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link href="{{asset('css/main.css')}}"  rel="stylesheet"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/css/iziModal.min.css" />

        @yield('styles')
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111500609-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-111500609-1');
        </script>

    </head>
    <body>
    <div id="login-modal" data-iziModal-group="grupo1">
        <div class="auth-container">
            <form id="login-form">
                <div>
                    <h1>Вход</h1>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">Войти</button>
                <p></p>
                <small>Нет аккаунта? <a href="#" class="swap-auth-form">Зарегистрируйся</a></small>
            </form>

            <form id="register-form" style="display: none">
                <div>
                    <h1>Регистрация</h1>
                </div>
                <div class="form-group">
                    <label for="email-register">Email</label>
                    <input type="email" name="email-register" id="email-register" class="form-control">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-register">Пароль</label>
                    <input type="password" name="password-register" id="password-register" class="form-control">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-confirmation">Подтверждение пароля</label>
                    <input type="password" name="password-confirmation" id="password-confirmation" class="form-control">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-primary btn-block">Регистрация</button>
                <p></p>
                <small>Уже зарегистрирован? <a href="#" class="swap-auth-form">Авторизуйся</a></small>
            </form>
        </div>
    </div>

        @include('frontend.partials._navigation')

        @yield('content')

        @include('frontend.partials._footer')

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/izimodal/1.5.1/js/iziModal.min.js"></script>
        <script>
            $("#login-modal").iziModal();

            $(document).on('click', '.login', function (e) {
                e.preventDefault();
                $('#login-modal').iziModal('open')
            });

            $(document).on('click', '.swap-auth-form', function (e) {
                e.preventDefault();
                $('#login-form').toggle();
                $('#register-form').toggle();
            });

            // Auth form send
            $(document).on('submit', '#login-form', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/login',
                    method: 'POST',
                    data: {
                        'email': $('#email').val(),
                        'password': $('#password').val(),
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.success == true) {
                            window.location.href = '/cabinet';
                        }
                    },
                    error: function (response, xhr) {
                        if (xhr == 'error') {
                            if (response.responseJSON.errors.email != null) {
                                $('#email').addClass('is-invalid');
                                $('#email').siblings('.invalid-feedback').html(response.responseJSON.errors.email[0]);
                            }

                            if (response.responseJSON.errors.password != null) {
                                $('#password').addClass('is-invalid');
                                $('#password').siblings('.invalid-feedback').html(response.responseJSON.errors.password[0]);
                            }
                        }
                    }
                });
            });


            // Register form send
            $(document).on('submit', '#register-form', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '/register',
                    method: 'POST',
                    data: {
                        'email': $('#email-register').val(),
                        'password': $('#password-register').val(),
                        'password_confirmation': $('#password-confirmation').val(),
                        '_token': '{{csrf_token()}}'
                    },
                    success: function (response) {
                        if (response.reload == true) {
                            location.reload();
                        }
                    },
                    error: function (response, xhr) {
                        if (xhr == 'error') {
                            if (response.responseJSON.errors.email != null) {
                                $('#email-register').addClass('is-invalid');
                                $('#email-register').siblings('.invalid-feedback').html(response.responseJSON.errors.email[0]);
                            }

                            if (response.responseJSON.errors.password != null) {
                                $('#password-register').addClass('is-invalid');
                                $('#password-register').siblings('.invalid-feedback').html(response.responseJSON.errors.password[0]);
                            }
                        }
                    }
                });
            });
        </script>
    @yield('js')
    </body>
</html>