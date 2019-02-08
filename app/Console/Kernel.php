<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\PassiveStudent::class,
        Commands\SmsSendBirthdate::class,
        Commands\SmsSendCourse::class,
        Commands\SmsSendInstallment::class,
        Commands\EmailSendInstallment::class,
        
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        /* $schedule->command('student:passive')->timezone('Europe/Istanbul')->saturdays();
        $schedule->command('sms:course')->timezone('Europe/Istanbul')->fridays();
        $schedule->command('sms:birthdate')->timezone('Europe/Istanbul')->daily();
        $schedule->command('sms:installment')->timezone('Europe/Istanbul')->daily();
        $schedule->command('email:installment')->timezone('Europe/Istanbul'); */
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
