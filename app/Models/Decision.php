<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    use HasFactory;

    public $timestamps = false;

    public static function getIdName(){
        $val = Decision::all();
        $return = [];
        foreach ($val as $a){
            $return[$a->id] = $a->name;
        }
        return $return;
    }
}
