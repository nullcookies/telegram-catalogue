@extends('frontend.layouts.layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="add-chanel">
                    <h2>Добавить новый канал</h2>
                    <form action="{{route('frontend.store-chanel')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="link"><strong>* Ссылка на канал</strong></label>
                            <input type="text" name="link" class="form-control" placeholder="https://t.me/qwerty">
                        </div>
                        <div class="form-group">
                            <label for="category"><strong>* Категория</strong></label>
                            <select class="form-control" name="category">
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea class="form-control" placeholder="Краткое описание" name="description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="comment">Информация</label>
                            <textarea class="form-control" placeholder="Любая полезная информация или комментарий" name="comment"></textarea>
                        </div>
                        <button class="btn btn-outline-success btn-block">Добавить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection