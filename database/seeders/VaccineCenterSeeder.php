<?php

namespace Database\Seeders;

use App\Models\VaccineCenter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VaccineCenter::insert([
            ['name' => 'Dhaka Medical College', 'location' => 'Dhaka', 'daily_limit' => 10],
            ['name' => 'Chittagong Medical College', 'location' => 'Chittagong', 'daily_limit' => 15],
            ['name' => 'Rajshahi Medical College', 'location' => 'Rajshahi', 'daily_limit' => 70],
            ['name' => 'Sylhet MAG Osmani Medical College', 'location' => 'Sylhet', 'daily_limit' => 30],
            ['name' => 'Khulna Medical College', 'location' => 'Khulna', 'daily_limit' => 25],
            ['name' => 'Mymensingh Medical College', 'location' => 'Mymensingh', 'daily_limit' => 3],
            ['name' => 'Barisal Medical College', 'location' => 'Barisal', 'daily_limit' => 10],
            ['name' => 'Rangpur Medical College', 'location' => 'Rangpur', 'daily_limit' => 20],
            ['name' => 'Cumilla Medical College', 'location' => 'Cumilla', 'daily_limit' => 17],
            ['name' => 'Faridpur Medical College', 'location' => 'Faridpur', 'daily_limit' => 13],
            ['name' => 'Shaheed Suhrawardy Medical College', 'location' => 'Dhaka', 'daily_limit' => 95],
            ['name' => 'Sher-e-Bangla Medical College', 'location' => 'Barisal', 'daily_limit' => 50],
            ['name' => 'Sir Salimullah Medical College', 'location' => 'Dhaka', 'daily_limit' => 100],
            ['name' => 'Pabna Medical College', 'location' => 'Pabna', 'daily_limit' => 60],
        ]);
    }
}
