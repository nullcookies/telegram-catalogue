<nav class="main-navigation">
    <div class="container">
        <ul style="float:right">
            <li><a href="/">Главная</a></li>
            <li><a href="/channels">Каналы</a></li>
            @if (Auth::user() != null)
                <li><a href="{{route('frontend.cabinet.add')}}">Добавить канал</a></li>
            @else
                <li><a href="#" class="login">Добавить канал</a></li>
            @endif
            @if (Auth::user() == null)
                <li><a href="#" class="login">Вход</a></li>
            @else
                <li><a href="{{route('frontend.cabinet')}}">Кабинет</a></li>
            @endif

            @if (Auth::check())
                @if (Auth::user()->access_level === 10)
                    <li><a href="{{route('admin.dashboard')}}">Админка</a></li>
                @endif
            @endif
        </ul>

    </div>
</nav>
<section id="index-nav">
    <div class="container">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-3">
                    <a href="#" class="categories-button">Категории</a>
                </div>
                <div class="col-6">
                    <ul class="index-filters">
                        <li><a href="#">Топ</a></li>
                        <li><a href="#">за неделю</a></li>
                        <li><a href="#">Новые</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <form action="">
                        <div class="input-search">
                            <input type="search" placeholder="Поиск канала">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
