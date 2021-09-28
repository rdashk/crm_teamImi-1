@if ($errors->any())
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@else
    <div class="alert alert-success">
        <strong>Все поля заполнены</strong>

        <br><br>
    </div>
@endif
