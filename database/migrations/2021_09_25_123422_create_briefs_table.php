<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBriefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('briefs', function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->string("email", 255);
            $table->foreignId("position_id")->references("id")->on("positions")->onDelete("cascade");
            $table->foreignId("level_id")->references("id")->on("levels")->onDelete("cascade");
            $table->date("interview_date")->nullable();
            $table->text("skills");
            $table->text("text");
            $table->text("experience");
            $table->foreignId("decision_id")->references("id")->on("decisions")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('briefs');
    }
}
