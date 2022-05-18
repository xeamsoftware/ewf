<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Incentive;

class IncentiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Incentive::create([
            'name' => 'John Doe',
            'from' => '25',
            'to' => '75',
            'percentage' => '85',
            'status' => '1',
            'incentive_note' => 'As you can see from the above code we have the sam...',
        ]);
    }
}
