@extends('admin.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <h1>Добавить новую категорию</h1>
                <form action="{{route('admin.categories.update', $category->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="title">Имя категории</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Введите имя категории" value="{{$category->title}}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Статус</label>
                        <select name="status" id="status" class="form-control">
                            <option {{$category->status == 1 ? 'selected' : ''}} value="1">Активна</option>
                            <option {{$category->status == 0 ? 'selected' : ''}} value="0">Неактивна</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection