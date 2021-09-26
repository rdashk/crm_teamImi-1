@extends("base")

@section('navigation')
    <div class="p-3 mb-2 container bg-secondary" id="navigation">
        <div class="row justify-content-around">
            <a class="btn col-2 btn-light" href="/briefs">DashBoard</a>
            <a class="btn col-2 btn-light" href="/decisions">Решения</a>
            <a class="btn col-2 btn-light" href="/levels">Уровни</a>
            <a class="btn col-2 btn-light" href="/positions">Позиции</a>
        </div>
    </div>
@endsection
