<?php

use App\Models\Task;
use App\Notifications\TaskReminder;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Artisan::command('send:task-reminders', function () {
    $now = now()->addHour();
    $tasks = Task::
        where('start_time', '>', $now)
        ->where('start_time', '<=', $now->clone()->addMinutes(30))->get();

    foreach ($tasks as $task) {
        $this->info("$task->title Found");
        $user = $task->user;

        $user->notify(new TaskReminder($task), $now->addSecond());

        $task->update(['notified' => true]);
    }

    $this->info('Task reminders sent.');
})->everyMinute();
