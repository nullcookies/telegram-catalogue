@extends('admin.layouts.layout')

@section('content')
    <div class="container-fluid">
        <br>
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h3>Канал - {{$channel->name}}</h3>
                <img src="{{asset($channel->avatar)}}" width="50%" alt="">
                <form action="{{route('admin.channels.update', $channel->id)}}" method="POST">
                    {{csrf_field()}}
                    {{method_field('PATCH')}}
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control" value="{{$channel->name}}">
                    </div>
                    <div class="form-group">
                        <label for="url">Url</label>
                        <input type="text" name="url" id="url" class="form-control" value="{{$channel->url}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select name="category" id="category" class="form-control">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}" {{$channel->category_id == $category->id ? 'selected' : ''}}>{{$category->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control">{{$channel->description}}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="0" {{$channel->status == 0 ? 'selected' : ''}}>Не активна</option>
                            <option value="1" {{$channel->status == 1 ? 'selected' : ''}}>Активна</option>
                        </select>
                    </div>
                    <button class="btn btn-default">Save</button>
                    <br>
                    <hr>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#category').select2();
        });
    </script>
@endsection