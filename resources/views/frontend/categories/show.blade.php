@extends('frontend.layouts.layout')

@section('content')
<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Категория - {{$category->title}}</h2>
            </div>
        </div>

        <div class="row">
            @foreach($channels as $item)
                <div class="col-4">
                    @include('frontend.partials._channel-block')
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection