@extends('frontend.layouts.layout')

@section('content')
<section id="search">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h5>Быстрый поиск каналов</h5>
                <form action="">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Попробуйте ввести название канала">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Популярные каналы</h2>
            </div>
        </div>

        <div class="row">
            @foreach($items as $item)
                <div class="col-4">
                    <div class="chanel_item">
                        <div class="chanel_panel">
                            <div class="chanel_item_image" style="background: url('{{$item->thumbnail}}');"></div>
                            <div class="chanel_item_info">
                                <div class="chanel_item_title">
                                    <a class="chanel_item_category" href="#">{{$item->category->title}}</a>
                                    <a class="chanel_item_name" href="#">{{$item->name}}</a>
                                </div>
                                <div class="chanel_item_description">
                                    {{str_limit($item->description, 125)}}
                                </div>
                            </div>
                        </div>
                        <div class="chanel_control">
                            <div class="chanel_item_add">
                                <a class="btn btn-outline-success btn-sm" href="#">Подписаться</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Популярные Боты</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="chanel_item">
                    <div class="chanel_panel">
                        <div class="chanel_item_image" style="background: url('http://via.placeholder.com/50x50');"></div>
                        <div class="chanel_item_info">
                            <div class="chanel_item_title">
                                <a class="chanel_item_category" href="#">Спорт</a>
                                <a class="chanel_item_name" href="#">Bodybuilding & Fitness</a>
                            </div>
                            <div class="chanel_item_description">
                                Simple short description for item
                            </div>
                        </div>
                    </div>
                    <div class="chanel_control">
                        <div class="chanel_item_add">
                            <a class="btn btn-outline-success btn-sm" href="#">Подписаться</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="chanel_item">
                    <div class="chanel_panel">
                        <div class="chanel_item_image" style="background: url('http://via.placeholder.com/50x50');"></div>
                        <div class="chanel_item_info">
                            <div class="chanel_item_title">
                                <a class="chanel_item_category" href="#">Спорт</a>
                                <a class="chanel_item_name" href="#">Bodybuilding & Fitness</a>
                            </div>
                            <div class="chanel_item_description">
                                Simple short description for item
                            </div>
                        </div>
                    </div>
                    <div class="chanel_control">
                        <div class="chanel_item_add">
                            <a class="btn btn-outline-success btn-sm" href="#">Подписаться</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="chanel_item">
                    <div class="chanel_panel">
                        <div class="chanel_item_image" style="background: url('http://via.placeholder.com/50x50');"></div>
                        <div class="chanel_item_info">
                            <div class="chanel_item_title">
                                <a class="chanel_item_category" href="#">Спорт</a>
                                <a class="chanel_item_name" href="#">Bodybuilding & Fitness</a>
                            </div>
                            <div class="chanel_item_description">
                                Simple short description for item
                            </div>
                        </div>
                    </div>
                    <div class="chanel_control">
                        <div class="chanel_item_add">
                            <a class="btn btn-outline-success btn-sm" href="#">Подписаться</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="chanel_item">
                    <div class="chanel_panel">
                        <div class="chanel_item_image" style="background: url('http://via.placeholder.com/50x50');"></div>
                        <div class="chanel_item_info">
                            <div class="chanel_item_title">
                                <a class="chanel_item_category" href="#">Спорт</a>
                                <a class="chanel_item_name" href="#">Bodybuilding & Fitness</a>
                            </div>
                            <div class="chanel_item_description">
                                Simple short description for item
                            </div>
                        </div>
                    </div>
                    <div class="chanel_control">
                        <div class="chanel_item_add">
                            <a class="btn btn-outline-success btn-sm" href="#">Подписаться</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection