@extends('frontend.layouts.layout')

@section('content')
    <section id="cabinet">
        <div class="container">
            <div class="row">
                @include('frontend.cabinet.partials._sidebar')

                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div class="col">
                                    <h5>Канал - <strong>{{$channel->name}}</strong></h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-4">
                                    <img src="{{asset($channel->avatar)}}" width="100%" />
                                </div>
                                <div class="col-8">
                                    <div class="card">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><strong>Название:</strong><div style="float:right;">{{$channel->name}}</div></li>
                                            <li class="list-group-item"><strong>Ссылка:</strong><div style="float:right;"><a href="{{$channel->url}}" target="_blank    ">{{$channel->url}}</a></div></li>
                                            <li class="list-group-item"><strong>Количество подписчиков:</strong> <div style="float:right;">0</div></li>
                                            <li class="list-group-item"><strong>Просмотров:</strong> <div style="float:right;">{{$channel->views}}</div></li>
                                            <li class="list-group-item"><strong>Переходов:</strong> <div style="float:right;">{{$channel->forwards}}</div></li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="col top-30">
                                    <h4>Статистика</h4>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection