<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly(); 
        $schedule->call(function () {
            $dateThreshold = Carbon::now()->subDays(90)->toDateString();

            DB::table('losts')->where('tgl_kehilangan', '<', $dateThreshold)->delete();
        })->everyMinute(); //Untuk engecek perubahan setiap menit
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
