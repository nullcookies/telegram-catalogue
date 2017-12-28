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
            <h5>Cabinet</h5>
        </div>

    </div>
</div>