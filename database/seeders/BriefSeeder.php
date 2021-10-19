<?php

namespace Database\Seeders;

use App\Models\Brief;
use Illuminate\Database\Seeder;

class BriefSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $kBrief = new Brief();
            $kBrief->name = "Белогуб Константин Евгеньевич";
            $kBrief->email = "kobelogub@gmail.com";
            $kBrief->position_id = 1;
            $kBrief->level_id = 1;
            $kBrief->decision_id = 1;
            $kBrief->skills = "<ul><li>php 8</li><li>Laravel 8</li><li>HTML5, CSS3, JS</li><li>MySQL, PostgreSQL</li><li>IDE - PhpStorm</li></ul>";
            $kBrief->text = "<p>Я студент 3 курса бакалавриата ИМИТ ИГУ. Из учебных дисциплин особый интерес представили предметы, связанные с веб-разработкой. С php был знаком за рамками университетского образования - изучал самостоятельно.</p><p>Во время обучения довелось принять и успешно завершить курс от компании КРОК \"Введение в язык Java и платформу разработки</p><p>Считаю, что нет проблемы или задачи, с которой совсем было бы невозможно разобраться, наблюдал на личном опыте, но мне требуется некоторое время.</p><p>Обладаю аналитическим складом ума, усидчивостью и трудолюбием.</p>";
            $kBrief->experience = "<p>Без опыта работы.</p>";
            $kBrief->save();
        }
    }
}
