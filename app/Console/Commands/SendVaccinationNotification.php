<?php

namespace App\Console\Commands;

use App\Mail\VaccinationReminder;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendVaccinationNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-vaccination-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $registrations = Registration::where('status', 'Scheduled')
            ->whereDate('scheduled_date', '=', Carbon::tomorrow()->format('Y-m-d'))
            ->get();
        
        foreach ($registrations as $registration) {
            Mail::to($registration->user->email)->send(new VaccinationReminder($registration));
        }
    }
}
