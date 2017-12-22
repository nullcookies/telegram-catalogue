@extends('admin.layouts.layout')

@section('styles')
    <link rel="stylesheet" href="{{asset('css/metrics-graphics/metricsgraphics.css')}}">
    <script src="https://d3js.org/d3.v4.min.js"></script>
    <script src="{{'css/metrics-graphics/metricsgraphics.js'}}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Основная информация.</h1>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Пользователи
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Всего пользователей: {{$allUsers}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Заявки
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Заявок на модерации: {{$orders}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header">
                        Каналы
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Количество каналов: {{$channelsCount}}</li>
                    </ul>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col">
                <h4>График каналов</h4>
                <div id="channels">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        json = '[\n' +
            '        {\n' +
            '            "date": "2014-01-01",\n' +
            '            "value": 190000000\n' +
            '        },\n' +
            '        {\n' +
            '            "date": "2014-01-02",\n' +
            '            "value": 190379978\n' +
            '        },\n' +
            '        {\n' +
            '            "date": "2014-01-03",\n' +
            '            "value": 90493749\n' +
            '        },\n' +
            '        {\n' +
            '            "date": "2014-01-04",\n' +
            '            "value": 190785250\n' +
            '        }]';

        d3.json(json, function(data) {
            data = MG.convert.date(data, 'date');

            MG.data_graphic({
                title: "Line Chart",
                description: "This is a simple line chart. You can remove the area portion by adding area: false to the arguments list.",
                data: data,
                width: 600,
                height: 200,
                right: 40,
                target: document.getElementById('channels'),
                x_accessor: 'date',
                y_accessor: 'value'
            });
        });
    </script>
@endsection