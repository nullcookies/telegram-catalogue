@extends('frontend.layouts.layout')

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <section id="cabinet">
        <div class="container">
            <div class="row">
                @include('frontend.cabinet.partials._sidebar')


                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <h5>Добавление в каталог</h5>
                            <hr>
                        </div>
                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <form action="{{route('frontend.add.post')}}" method="POST">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <label for="type"><strong>Что добавляем?</strong></label>
                                            <select name="type" id="type" class="form-control">
                                                @foreach ($types as $type)
                                                    <option value="{{$type->id}}">{{$type->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category"><strong>Выберите категорию</strong></label>
                                            <select name="category" id="category" class="form-control">
                                                @foreach ($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name"><strong>Введите название</strong></label>
                                            <input type="text" name="name" id="name" class="form-control" reqiured>
                                            <small id="nameHelpBlock" class="form-text text-muted">
                                                Вводите название идентичное названию в телеграме
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="url"><strong>Ссылка</strong></label>
                                            <input type="text" name="url" id="url" class="form-control" placeholder="https://t.me/name">
                                            <small id="urlHelpBlock" class="form-text text-muted">
                                                Ссылка для шеринга канала или имя бота
                                            </small>
                                        </div>
                                        <div class="form-group">
                                            <label for="description"><strong>Описание</strong></label>
                                            <textarea name="description" id="description" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                        <small class="form-text text-muted">
                                            Все каналы, боты, чаты в telegram проходят ручную модерацию. Время проверки
                                            занимает от 1 часа до 24х часов. В качестве аватара канала используется изображение
                                            из телеграма. Обновление данных производится один раз в сутки. При обновлении данных
                                            загружается новый аватар и обновляется количество подписчиков.
                                        </small>
                                        <br>
                                        <button class="btn btn-outline-success btn-block">Добавить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <br>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#category').select2();
        });
    </script>
@endsection