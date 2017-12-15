@extends('frontend.layouts.layout')

@section('content')
<section class="channel-block">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-content">
                        <p></p>
                        <div class="col-3">
                            <div class="row">
                                <div class="col">
                                    <div class="channel-image">
                                        <img src="{{asset($channel->avatar)}}" style="width: 70%;"/>
                                    </div>

                                </div>
                            </div>
                            <div class="row subscribe-btn">
                                <div class="col">
                                    <a href="#" class="btn btn-outline-primary btn-block">Добавить в телеграм</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-9">
                            <h1>{{$channel->name}}</h1>
                            <hr>
                            <div class="channel-address">
                                Адрес канала: <a href="{{$channel->url}}" onclick="redirect()" data-channel_id="{{$channel->id}}">{{$channel->user_name}}</a>
                                <br>
                                Категория: {{$channel->category->title}}
                            </div>
                            <p></p>
                            <div class="description">
                                <strong>Описание канала:</strong>
                                <br>
                                {{$channel->description}}
                            </div>
                            <p></p>
                            <a class="btn btn-outline-primary" href="{{$channel->url}}" onclick="redirect()" data-channel_id="{{$channel->id}}" target="_blank">Перейти на канал</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</section>

@endsection