@extends("template")

@section("title")
    Добавить резюме
@endsection
<?php
use App\Http\Controllers\BriefsController;
use App\Models\Brief;use App\Models\Decision;
use App\Models\Level;
use App\Models\Position;
use Carbon\Carbon;
?>
@section("content")
    {{Form::open(["action" => 'App\Http\Controllers\BriefsController@store', "method" => "POST", "class" => "container"])}}
    @csrf
    <div class="form-group">

        @include('errors')

        <label for="name">ФИО</label>
        {{Form::text("name", null, ["placeholder" => "ФИО", "class" => "form-control", "id"=>"name"])}}

    </div>

    <div class="form-group">
        <label for="position_id">Позиция</label>
        {{Form::select("position_id", $positions, null, ["class" => "form-control", "id"=>"position_id"])}}
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        {{Form::text("email", null, ["placeholder" => "E-mail", "class" => "form-control", "id"=>"email"])}}
    </div>

    <div class="form-group">
        <label for="level_id">Уровень</label>
        {{Form::select("level_id", $levels, null, ["class" => "form-control", "id"=>"level_id"])}}
    </div>
    <div class="form-group">
        <label for="decision_id">Решение</label>
        {{Form::select("decision_id", $decisions, null, ["class" => "form-control", "id"=>"decision_id"])}}
    </div>
    <div class="form-group">
        <label for="interview_date">Дата собеседования</label>
        {{Form::date("interview_date", null, ["class" => "form-control", "id"=>"interview_date"])}}
    </div>
    <div class="form-group">
        <label for="skills">Ключевые навыки</label>
        {{Form::textarea("skills", null, ["placeholder" => "Ключевые навыки", "class" => "form-control", "id"=>"skills", "style"=>"display: none"])}}
        <div id="quill-skills"></div>
    </div>
    <div class="form-group editor">
        <label for="experience">Опыт работы</label>
        {{Form::textarea("experience", null, ["placeholder" => "Опыт работы", "class" => "form-control", "id"=>"experience", "style"=>"display: none"])}}
        <div id="quill-exp"></div>
    </div>
    <div class="form-group editor">
        <label for="text">Резюме</label>
        {{Form::textarea("text", null, ["placeholder" => "Резюме", "class" => "form-control", "id"=>"text", "style"=>"display: none"])}}
        <div id="quill-text"></div>
    </div>
    <div class="form-group">
        {{Form::submit("Отправить", ["class" => "btn bth-submit form-control btn-outline-dark", "id" => "submit"])}}
    </div>
    <div id="editor"></div>
    {{Form::close()}}
@endsection

@prepend('scripts')
    <script>
        $(document).on('change', '#name', createEmail);
        $(document).on('change', '#position_id', createEmail);
        function createEmail(){

            var all_email = '<?php echo Brief::pluck("email");?>';
            //console.log(all_email);

            var arr = $('#name').val().split(' ');
            if (arr.length === 1) {
                var name_for_email = translit(arr[0]);
            }
            else {
                var name_for_email = translit(arr[0]) + "." + translit(arr[1]);
            }
            var pos = "-" + $('#position_id option:selected').text().substr(0,3) + "@adict.ru";

            while (all_email.indexOf(name_for_email+pos) !== -1) {
                name_for_email += Math.round(Math.random()*10);
            }
            var val_email = name_for_email + pos;

            $('#email').val(val_email);
        }

        function translit(word) {
            var converter = {
                'а': 'a', 'б': 'b', 'в': 'v', 'г': 'g', 'д': 'd',
                'е': 'e', 'ё': 'e', 'ж': 'zh', 'з': 'z', 'и': 'i',
                'й': 'y', 'к': 'k', 'л': 'l', 'м': 'm', 'н': 'n',
                'о': 'o', 'п': 'p', 'р': 'r', 'с': 's', 'т': 't',
                'у': 'u', 'ф': 'f', 'х': 'h', 'ц': 'c', 'ч': 'ch',
                'ш': 'sh', 'щ': 'sch', 'ь': '', 'ы': 'y', 'ъ': '',
                'э': 'e', 'ю': 'yu', 'я': 'ya'
            };

            word = word.toLowerCase();

            var answer = '';
            for (var i = 0; i < word.length; ++i) {
                if (converter[word[i]] === undefined) {
                    answer += word[i];
                } else {
                    answer += converter[word[i]];
                }
            }

            answer = answer.replace(/[^-0-9a-z]/g, '-');
            answer = answer.replace(/[-]+/g, '-');
            answer = answer.replace(/^\-|-$/g, '');
            return answer;
        }
    </script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var skillsTA = document.getElementById("skills");
        var expTA = document.getElementById("experience");
        var textTA = document.getElementById("text");

        var skills = new Quill("#quill-skills", {
            theme: 'snow',
            modules: {
                toolbar: [['bold', 'italic', 'underline', 'link'], [{ 'list': 'ordered'}, { 'list': 'bullet' }]]
            },
            placeholder: "Ключевые навыки",
        });
        var exp = new Quill("#quill-exp", {
            theme: 'snow',
            modules: {
                toolbar: [['bold', 'italic', 'underline', 'link'], [{ 'list': 'ordered'}, { 'list': 'bullet' }]]
            },
            placeholder: "Опыт работы",
        });
        var text = new Quill("#quill-text", {
            theme: 'snow',
            modules: {
                toolbar: [['bold', 'italic', 'underline', 'link'], [{ 'list': 'ordered'}, { 'list': 'bullet' }]]
            },
            placeholder: "Резюме",
        })

        skills.on('text-change', function(){
            skillsTA.innerHTML = skills.root.innerHTML;
        });
        exp.on('text-change', function(){
            expTA.innerHTML = exp.root.innerHTML;
        });
        text.on('text-change', function(){
            textTA.innerHTML = text.root.innerHTML;
        });
        text.root.innerHTML = textTA.innerText;
        exp.root.innerHTML = expTA.innerText;
        skills.root.innerHTML = skillsTA.innerText;
    </script>
    <style>
        .ql-editor{
            min-height: 250px!important;
        }
    </style>
@endprepend
