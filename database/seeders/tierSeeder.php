<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tier;
class tierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        tier::insert(
    [
            ['tier_name' => 'Basic'],
        
        [
            'tier_name' => 'Silver',
        ],
        [
            'tier_name' => 'Gold',
        ],
        [
            'tier_name' => 'VIP'],
        ]);
    }

    
}
