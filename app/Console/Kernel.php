<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Регистрация команд приложения
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ListIntervalsCommand::class, // Добавьте эту строку
    ];

    /**
     * Определение расписания команд
     */
    protected function schedule(Schedule $schedule)
    {
        // ...
    }

    /**
     * Регистрация команд
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
