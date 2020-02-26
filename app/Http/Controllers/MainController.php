<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    //
		public function index()
{
    $data = [
        'title' => 'Тестовый сайт',
        'description' => 'Первое тестовое приложение'
    ];

    return view('index', $data);
}
}
