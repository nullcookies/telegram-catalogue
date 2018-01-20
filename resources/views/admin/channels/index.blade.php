@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <h3>Каналы</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Аватар</th>
                        <th scope="col">Ссылка</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Краткое описание</th>
                        <th scope="col">Просмотров</th>
                        <th scope="col">Переходов</th>
                        <th scope="col">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($channels as $channel)
                        <tr>
                            <td>{{$channel->id}}</td>
                            <td><img src="{{asset($channel->thumbnail)}}" /></td>
                            <td><a href="{{$channel->url}}" target="_blank">{{$channel->url}}</a></td>
                            <td>{{$channel->category->title}}</td>
                            <td>{{$channel->description}}</td>
                            <td>{{$channel->views}}</td>
                            <td>{{$channel->forwards}}</td>
                            <td>
                                <a href="{{route('admin.channels.edit', $channel->id)}}">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $channels->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection