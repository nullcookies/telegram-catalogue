<nav class="main-navigation">
    <div class="container">
        <ul style="float:right">
            <li><a href="/">Главная</a></li>
            <li><a href="/channels">Каналы</a></li>
            @if (Auth::user() != null)
                <li><a href="{{route('frontend.add-chanel')}}">Добавить канал</a></li>
            @else
                <li><a href="#" class="login">Добавить канал</a></li>
            @endif
            <li><a href="{{route('frontend.add-chanel')}}" class="login">Вход</a></li>
        </ul>

    </div>
</nav>
