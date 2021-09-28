<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function position()
    {
        return $this->hasOne(Position::class, "id", "position_id");
    }

    public function level(){
        return $this->hasOne(Level::class, "id", "level_id");
    }

    public function decision(){
        return $this->hasOne(Decision::class, "id", "decision_id");
    }
}
