@extends('frontend.layouts.layout')

@section('content')
<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Список всех категорий</h2>
            </div>
        </div>

        <div class="row">
            @foreach($categories as $item)
                <div class="col-3" style="margin-bottom: 25px;">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{route('frontend.category', $item->slug)}}">{{$item->title}}</a> ({{$item->channels_count}})
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection