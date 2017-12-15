<footer>
    <div class="container">
        <div class="row">
            <div class="col-3">
                <span class="copyright">{{env('APP_NAME')}} © 2017</span>
            </div>
            <div class="col-9">
                <nav class="footer-nav">
                    <ul>
                        <li><a href="{{URL::to('/')}}">Главная</a></li>
                        <li><a href="{{route('frontend.channels')}}">Каналы</a></li>
                        <li><a href="{{route('frontend.feedback')}}">Обратная связь</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</footer>