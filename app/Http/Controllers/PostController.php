<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Показать форму для создания нового сообщения в блоге.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

    }

    /**
     * Сохранить новую запись в блоге.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        // Поля заполнены ...
    }
}
