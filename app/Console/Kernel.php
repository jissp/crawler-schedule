<?php

namespace App\Console;

use App\Console\Commands\RequestAwsRecentCrawling;
use App\Console\Commands\RequestNaverLandCrawling;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\App;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        if (App::isLocal()) {
            $schedule->command(RequestNaverLandCrawling::class)->everyMinute();
            $schedule->command(RequestAwsRecentCrawling::class)->everyMinute();
        } else {
            $schedule->command(RequestNaverLandCrawling::class)->everyThreeHours();
            $schedule->command(RequestAwsRecentCrawling::class)->everyThreeHours();
        }
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
