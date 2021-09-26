<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Position;

class Brief extends Model
{
    use HasFactory;

    protected $fillable = ["name",
        "email",
        "position_id",
        "level_id",
        "interview_date",
        "skills",
        "text",
        "experience",
        "decision_id",
    ];

    public function getPositionName(){
        return Position::find($this->position_id)->name;
    }

    public function getLevelName(){
        return Level::find($this->level_id)->name;
    }

    public function getDecisionName(){
        return Decision::find($this->decision_id)->name;
    }
}
