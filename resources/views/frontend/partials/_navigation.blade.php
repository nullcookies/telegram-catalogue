<nav class="main-navigation">
    <div class="container">
        <ul style="float:left">
            @foreach($catTypes as $item)
                <li><a href="/">{{$item->title}}</a></li>
            @endforeach

        </ul>
        <a href="{{route('frontend.add-chanel')}}" class="btn btn-success" style="float:right;margin-top: 6px;">Добавить канал</a>
    </div>
</nav>
