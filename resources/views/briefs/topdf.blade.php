<?php

use App\Models\Brief;

/**
 * @var Brief $brief
 */
?>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{$brief->name}}</title>
</head>
<style>
    .all {
        font-family: Arial;
        text-align: left;
        font-size: 12pt;
        margin: 40pt;
    }
    .email {
        color: blue;
        font-weight: lighter;
        text-decoration: underline;
    }
    .small_title {
        text-decoration: underline;
    }

</style>
<body>

    <div class="all">
        <h1>{{$brief->name}}</h1>

        <div class="email point">{{$brief->email}}</div>
        <br />
        <br />

        <div class="skills point">
            <div class="small_title">Ключевые навыки:</div><br />
            <p><?= $brief->skills ?></p>
        </div>
        <br />
        <br />

        <div class="cv point">
            <div class="small_title">Резюме</div>
            <p><?= ($brief->text) ?></p>
        </div>
        <br />
        <br />

        <div class="have point">
            <div class="small_title">Опыт</div>
            <p><?= $brief->experience ?></p>
        </div>
    </div>
</body>
</html>
