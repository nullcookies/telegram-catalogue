@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg">
                <h3>Заявки на добавление</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Ссылка</th>
                        <th scope="col">Категория</th>
                        <th scope="col">Краткое описание</th>
                        <th scope="col">Комментарий</th>
                        <th scope="col">Управление</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td><a href="{{$order->link}}" target="_blank">{{$order->link}}</a></td>
                            <td>{{$order->category->title}}</td>
                            <td>{{$order->description}}</td>
                            <td>{{$order->comment}}</td>
                            <td>
                                <a href="{{route('admin.orders.approve')}}"></a>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection