<?php

use App\Console\Commands\DailyTaskReminder;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Schedule::command(DailyTaskReminder::class);
