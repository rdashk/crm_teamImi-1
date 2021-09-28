@extends("base")

@section("title")
    CRM
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-around">
            <a class="btn col-2 btn-outline-dark" href="/briefs">DashBoard</a>
            <a class="btn col-2 btn-outline-dark" href="/decisions">Решения</a>
            <a class="btn col-2 btn-outline-dark" href="/levels">Уровни</a>
            <a class="btn col-2 btn-outline-dark" href="/positions">Позиции</a>
        </div>
    </div>
@endsection
