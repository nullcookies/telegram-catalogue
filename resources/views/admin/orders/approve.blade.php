@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <h2>Информация из заявки</h2>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Ссылка:</td>
                            <td><a href="{{$order->link}}" target="_blank">{{$order->link}}</a></td>
                        </tr>
                        <tr>
                            <td>Категория:</td>
                            <td>{{$order->category->title}}</td>
                        </tr>
                        <tr>
                            <td>Описание:</td>
                            <td>{{$order->description}}</td>
                        </tr>
                        <tr>
                            <td>Комментарий:</td>
                            <td>{{$order->comment}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col">
                <h2>Информация из телеграмма</h2>
                <form action="{{route('admin.orders.store')}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select name="category" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{$category->id == $order->category_id ? 'selected' : ''}}>{{$category->title}}</option>

                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <img src="{{asset($info['image'])}}" />
                    </div>
                    <div class="form-group">
                        <label for="name">Имя паблика/канала/бота</label>
                        <input type="text" class="form-control" value="{{$info['title']}}" name="name">
                    </div>
                    <div class="form-group">
                        <label for="url">url</label>
                        <input type="text" class="form-control" value="{{$order->link}}" name="url">
                    </div>
                    <div class="form-group">
                        <label for="description">Описание</label>
                        <textarea name="description" class="form-control" rows="5">{{$info['description']}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-outline-success btn-block">Апрувнуть</button>
                </form>
            </div>
        </div>
    </div>
@endsection