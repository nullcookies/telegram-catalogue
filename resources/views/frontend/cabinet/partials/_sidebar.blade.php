<div class="col-3">
    <div class="list-group">
        <a href="{{route('frontend.cabinet')}}" class="list-group-item list-group-item-action">Профиль</a>
        <a href="{{route('frontend.cabinet.add')}}" class="list-group-item list-group-item-action">Добавить</a>
        <a href="{{route('frontend.cabinet.channels')}}" class="list-group-item list-group-item-action">Мои каналы</a>
        <a href="{{route('frontend.cabinet.settings')}}" class="list-group-item list-group-item-action">Настройки</a>
        <form action="{{route('logout')}}" method="POST">
            {{csrf_field()}}
            <button class="list-group-item list-group-item-danger list-group-item-action">Выход</button>
        </form>

    </div>
    <p></p>
    <div class="card">

        <div class="card-body">
            <h5>Популярные каналы</h5>
            @foreach($topChannels as $item)
                <div class="top-channel-container">
                    <div class="top-channel-image">
                        <img src="{{asset($item->avatar)}}" alt="{{$item->description}}" width="100%">
                    </div>
                    <div class="top-channel-content">
                        <div class="top-channel-header">
                            <h5>{{$item->name}}</h5>
                        </div>
                        <div class="top-channel-stat row">
                            <div class="top-channel-star col">

                            </div>
                            <div class="top-channel-button col">
                                <a class="btn btn-outline-success btn-sm" href="{{$item->url}}" target="_blank">Подписаться</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>