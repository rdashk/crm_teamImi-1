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
    * {
        font-family: Arial;
        font-size: 12pt;
    }
    .all {
        text-align: left;
        padding: 40pt;
    }
    .email {
        color: blue;
        font-weight: lighter;
    }
    .title_name {
        font-size: 20pt;
    }

</style>
<body>

    <div class="all">
        <b><div class="title_name">{{$brief->name}}</div></b>

        <div class="email point">
            <u>{{$brief->email}}</u>
        </div>
        <br />
        <br />

        <div class="skills point">
            <u>Ключевые навыки:</u>
            <?= ($brief->skills) ?>
        </div>
        <br />
        <br />

        <div class="cv point">
            <u>Резюме:</u>
            <?= ($brief->text) ?>
        </div>
        <br />
        <br />

        <div class="have point">
            <u>Опыт:</u>
            <?= $brief->experience ?>
        </div>
    </div>
</body>
</html>
