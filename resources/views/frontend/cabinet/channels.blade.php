@extends('frontend.layouts.layout')

@section('content')
    <section id="cabinet">
        <div class="container">
            <div class="row">
                @include('frontend.cabinet.partials._sidebar')


                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            @if ($channels->isEmpty())
                                <div class="alert alert-info" role="alert">
                                    Вы еще не добавили ни одного канала. <a href="{{route('frontend.cabinet.add')}}" class="alert-link">Нажмите здесь</a> чтобы добавить канал в каталог.
                                </div>
                            @else
                                <h4>Список каналов</h4>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Имя</th>
                                            <th>Ссылка</th>
                                            <th>Просмотры</th>
                                            <th>Переходы</th>
                                            <th>Статус</th>
                                            <th>Дата добавления</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($channels as $item)
                                            <tr>
                                                <td><a href="{{route('frontend.cabinet.channel', $item->slug)}}">{{$item->name}}</a></td>
                                                <td><a href="{{$item->url}}" target="_blank">{{$item->url}}</a></td>
                                                <td>{{$item->views}}</td>
                                                <td>{{$item->forwards}}</td>
                                                <td>{{$item->status == 1 ? 'Активен' : 'Не активен'}}</td>
                                                <td>{{Carbon\Carbon::parse($item->created_at)->toDateString()}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $channels->links('vendor.pagination.bootstrap-4') }}
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection