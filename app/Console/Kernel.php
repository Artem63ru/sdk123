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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
       $schedule->call('App\Http\Controllers\XMLController@fifty_min')->cron('1,16,31,46  * * * *');
       $schedule->call('App\Http\Controllers\XMLController@xml_obj')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@element_status_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@element_status_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@element_status_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@report_scena_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@report_scena_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@report_scena_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@result_pk_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@result_pk_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@result_pk_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@status_opo_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@status_opo_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@status_opo_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@violation_report_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@violation_report_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@violation_report_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@repiat_report_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@repiat_report_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@repiat_report_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@event_pk_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@event_pk_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@event_pk_quarter_data')->cron('0 0 1 1,4,7,11 *');
        $schedule->call('App\Http\Controllers\ReportController_history@quality_criteria_day_data')->cron('59 23 * * *');
        $schedule->call('App\Http\Controllers\ReportController_history@quality_criteria_month_data')->cron('0 0 1 * *');
        $schedule->call('App\Http\Controllers\ReportController_history@quality_criteria_quarter_data')->cron('0 0 1 1,4,7,11 *');

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
