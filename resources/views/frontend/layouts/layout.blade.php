<html>
    <head>
        <title>Каталог Telegram каналов, каналы телеграмм, лучший каталог телеграмма - Главная</title>
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
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">
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
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Подтверждение пароля</label>
                    <input type="password" name="password" id="password" class="form-control">
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

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" type="text/javascript"></script>
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
        </script>
    @yield('js')
    </body>
</html>