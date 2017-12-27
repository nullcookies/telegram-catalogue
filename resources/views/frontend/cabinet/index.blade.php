@extends('frontend.layouts.layout')

@section('content')
    <section id="cabinet">
        <div class="container">
            <div class="row">
                @include('frontend.cabinet.partials._sidebar')


                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            @if (session('add-success'))
                                <div class="row">
                                    <div class="col">
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{session('add-success')}}
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row justify-content-between">
                                <div class="col-lg-4">
                                    <h5>Профиль</h5>
                                </div>
                                <div class="col-lg-2">
                                    <form action="{{route('logout')}}" method="POST">
                                        {{csrf_field()}}
                                        <button class="btn btn-outline-danger btn-block">Выход</button>
                                    </form>
                                </div>
                            </div>
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

                                    @if (!$channels->isEmpty())
                                        sjdfdsj
                                    @endif

                                    @if (!$orders->isEmpty())
                                        <h4>Заявки на модерации</h4>
                                        <table class="table">
                                            <tbody>
                                                @foreach($orders as $order)
                                                    <tr>
                                                        <td>{{$order->name}}</td>
                                                        <td>Добавлена: {{$order->created_at}}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif

                                    <div class="alert alert-info" role="alert">
                                        Вы еще не добавили ни одного канала. <a href="{{route('frontend.cabinet.add')}}" class="alert-link">Нажмите здесь</a> чтобы добавить канал в каталог.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection