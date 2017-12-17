@extends('frontend.layouts.layout')

@section('content')
    <section id="cabinet">
        <div class="container">
            <div class="row">
                @include('frontend.cabinet.partials._sidebar')


                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h5>Профиль</h5>
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-4">
                                    <img src="http://via.placeholder.com/350x350" width="100%" />
                                </div>
                                <div class="col-8">
                                    <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Имя:</strong><div style="float:right;">{{Auth::user()->name != null ? Auth::user()->name : 'Не указано'}}</div></li>
                                            <li class="list-group-item"><strong>Email:</strong><div style="float:right;">{{Auth::user()->email}}</div></li>
                                            <li class="list-group-item"><strong>Дата регистрации:</strong> <div style="float:right;">{{Auth::user()->created_at}}</div></li>
                                            <li class="list-group-item"><strong>Telegram аккаунт:</strong></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col top-30">
                                    <h5>Добавленые каналы:</h5>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection