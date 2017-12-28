@extends('frontend.layouts.layout')

@section('content')
    <section id="cabinet">
        <div class="container">
            <div class="row">
                @include('frontend.cabinet.partials._sidebar')


                <div class="col-9">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4>Настройки</h4>
                                    <hr>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <form action="{{route('frontend.cabinet.settings.save')}}">
                                        <div class="form-group">
                                            <label for="avatar"><strong>Загрузить аватар</strong></label><br>
                                                <img src="http://via.placeholder.com/350x350" id="avatarPreview" width="250px" />
                                            <p></p>
                                            <input type="file" name="avatar" id="avatar">
                                        </div>
                                        <div class="form-group">
                                            <label for="telegram_account"><strong>Ник в телеграмм</strong></label>
                                            <input type="text" name="telegram_account" class="form-control">
                                        </div>
                                        <button class="btn btn-outline-success" id="saveButton">Сохранить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $(document).ready(function (e) {
            function readImage ( input ) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#avatarPreview').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }

            $('#avatar').change(function(){
                readImage(this);
            });

            $('#saveButton').click();
        });
    </script>
@endsection