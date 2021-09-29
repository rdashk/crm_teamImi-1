@if ($errors->any())
    <!-- Form Error List -->
    <div class="alert alert-danger">
        <strong>Есть пустые поля!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif
