<nav class="main-navigation">
    <div class="container">
        <ul>
            @foreach($catTypes as $item)
                <li><a href="#">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </div>
</nav>
