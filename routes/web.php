<?php

use App\Models\Project;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/bot', function () {

  return Telegram::getMe();;
});
