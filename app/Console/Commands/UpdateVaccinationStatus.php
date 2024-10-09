<?php

namespace App\Console\Commands;

use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateVaccinationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-vaccination-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update vaccination status for users based on the scheduled date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $registrations = Registration::where('status', '!=', 'Vaccinated')
            ->where('scheduled_date', '<', Carbon::now())
            ->get();

        foreach ($registrations as $registration) {
            $registration->status = 'Vaccinated';
            $registration->save();
        }
    }
}
