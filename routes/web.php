<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

Route::get('/', function (): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View {
    return view('welcome');
});
