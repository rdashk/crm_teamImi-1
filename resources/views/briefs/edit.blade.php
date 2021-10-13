@extends("template")

@section("title")
    Редактировать резюме
@endsection
<?php
use App\Models\Brief;
/**
 * @var Brief $brief
 * @var Array $levels
 * @var Array $decisions
 * @var Array $positoions
 */
?>
@section("content")
    {{Form::open(["action" => ['App\Http\Controllers\BriefsController@update', $brief->id], "method" => "PATCH", "class" => "container col-md-9 col-12"])}}
    @csrf
    <div class="row">
        <div class="form-group col-9">
            <label for="name">ФИО</label>
            {{Form::text("name", $brief->name, ["placeholder" => "Имя", "class" => "form-control", "id"=>"name"])}}
        </div>
        <div class="form-group col-3">
            <label for="position_id">Позиция</label>
            {{Form::select("position_id", $positions, $brief->position_id, ["class" => "form-control", "id"=>"position_id"])}}
        </div>
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        {{Form::text("email", $brief->email, ["placeholder" => "E-mail", "class" => "form-control", "id"=>"email"])}}
    </div>
    <div class="row">
        <div class="form-group col-3">
            <label for="level_id">Уровень</label>
            {{Form::select("level_id", $levels , $brief->level_id, ["class" => "form-control", "id"=>"level_id"])}}
        </div>
        <div class="form-group col-5">
            <label for="decision_id">Решение</label>
            {{Form::select("decision_id", $decisions, $brief->decision_id, ["class" => "form-control", "id"=>"decision_id"])}}
        </div>
        <div class="form-group col-4">
            <label for="interview_date">Дата собеседования</label>
            {{Form::date("interview_date", $brief->interview_date, ["class" => "form-control", "id"=>"interview_date"])}}
        </div>
    </div>
    <div class="form-group">
        <label for="skills">Ключевые навыки</label>
        {{Form::textarea("skills", $brief->skills, ["placeholder" => "Ключевые навыки", "class" => "form-control editor", "id"=>"skills", "style"=>"display: none"])}}
        <div id="quill-skills">
            <?=$brief->skills?>
        </div>
    </div>
    <div class="form-group">
        <label for="experience">Опыт работы</label>
        {{Form::textarea("experience", $brief->experience, ["placeholder" => "Опыт работы", "class" => "form-control editor", "id"=>"experience", "style"=>"display: none"])}}
        <div id="quill-exp">
            <?=$brief->experience?>
        </div>
    </div>
    <div class="form-group">
        <label for="text">Резюме</label>
        {{Form::textarea("text", $brief->text, ["placeholder" => "Резюме", "class" => "form-control editor", "id"=>"text", "style"=>"display: none"])}}
        <div id="quill-text">
            <?=$brief->text?>
        </div>
    </div>
    <div class="form-group">
        {{Form::submit("Отправить", ["class" => "btn form-control btn-outline-dark"])}}
        <div id="editor"></div>
    </div>
    {{Form::close()}}
@endsection

@prepend('scripts')
    <script src="//cdn.jsdelivr.net/medium-editor/latest/js/medium-editor.min.js"></script>
    <script>
        $(document).on('change', '#name', createEmail);
        $(document).on('change', '#position_id', createEmail);

        function createEmail() {

            var arr = $('#name').val().split(' ');
            var val_email = translit(arr[0]) + "." + translit(arr[1]) + "-" + $('#position_id option:selected').text().substr(0, 3) + "@adict.ru";
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
                if (converter[word[i]] == undefined) {
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
                toolbar: [['bold', 'italic', 'underline', 'link'], [{'list': 'ordered'}, {'list': 'bullet'}]]
            },
            placeholder: "Ключевые навыки",
        });
        var exp = new Quill("#quill-exp", {
            theme: 'snow',
            modules: {
                toolbar: [['bold', 'italic', 'underline', 'link'], [{'list': 'ordered'}, {'list': 'bullet'}]]
            },
            placeholder: "Опыт работы",
        });
        var text = new Quill("#quill-text", {
            theme: 'snow',
            modules: {
                toolbar: [['bold', 'italic', 'underline', 'link'], [{'list': 'ordered'}, {'list': 'bullet'}]]
            },
            placeholder: "Резюме",
        })

        skills.on('text-change', function () {
            skillsTA.innerHTML = skills.root.innerHTML;
        });
        exp.on('text-change', function () {
            expTA.innerHTML = exp.root.innerHTML;
        });
        text.on('text-change', function () {
            textTA.innerHTML = text.root.innerHTML;
        });
    </script>
    <style>
        .ql-editor {
            min-height: 250px !important;
        }
    </style>
@endprepend

