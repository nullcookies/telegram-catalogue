@extends('frontend.layouts.layout')

@section('content')

<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="main-header-text">Каналы</h4>
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

<section class="chanels">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h4 class="main-header-text">Последние добаленные каналы</h4>
            </div>
        </div>

        <div class="row">
            @foreach($newChannels as $item)
                <div class="col-4">
                    @include('frontend.partials._channel-block')
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('js')

@endsection