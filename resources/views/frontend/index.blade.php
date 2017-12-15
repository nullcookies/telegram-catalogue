@extends('frontend.layouts.layout')

@section('content')
<section id="index-nav">
    <div class="container">
        <div class="container">
            <br>
            <div class="row">
                <div class="col-3">
                    <a href="#" class="categories-button">Категории</a>
                </div>
                <div class="col-6">
                    <ul class="index-filters">
                        <li><a href="#">Топ</a></li>
                        <li><a href="#">за неделю</a></li>
                        <li><a href="#">Новые</a></li>
                    </ul>
                </div>
                <div class="col-3">
                    <form action="">
                        <div class="input-search">
                            <input type="search" placeholder="Поиск канала">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="main-header-text">Лучшие каналы</h4>
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
                                <a class="btn btn-outline-success btn-sm" href="{{route('frontend.channel', $item->slug)}}">Подписаться</a>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection