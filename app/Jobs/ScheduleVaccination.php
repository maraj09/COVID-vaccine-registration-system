<?php

namespace App\Jobs;

use App\Models\Registration;
use App\Models\VaccineCenter;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ScheduleVaccination implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $registration;

    public function __construct(Registration $registration)
    {
        $this->registration = $registration;
    }


    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $registration = $this->registration;
        $center = VaccineCenter::find($registration->vaccine_center_id);

        $scheduled_date = $this->getAvailableDate($center);

        if ($scheduled_date) {
            $registration->update([
                'scheduled_date' => $scheduled_date,
                'status' => 'Scheduled',
            ]);
        }
    }

    private function getAvailableDate($center)
    {
        $date = Carbon::now()->addDay();

        while ($date->dayOfWeek == Carbon::SATURDAY || $date->dayOfWeek == Carbon::FRIDAY) {
            $date->addDay();
        }

        $existingRegistrations = Registration::where('vaccine_center_id', $center->id)
            ->whereDate('scheduled_date', $date->format('Y-m-d'))
            ->count();

        if ($existingRegistrations < $center->daily_limit) {
            return $date->format('Y-m-d');
        }

        while ($existingRegistrations >= $center->daily_limit) {
            $date->addDay();

            while ($date->dayOfWeek == Carbon::SATURDAY || $date->dayOfWeek == Carbon::FRIDAY) {
                $date->addDay();
            }

            $existingRegistrations = Registration::where('vaccine_center_id', $center->id)
                ->whereDate('scheduled_date', $date->format('Y-m-d'))
                ->count();
        }

        return $date->format('Y-m-d');
    }
}
