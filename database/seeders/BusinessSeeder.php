<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // remplazar for fillin

        // Personal Number && FEI/EIN Number
        
        $businesses = ['personal','empresarial'];

        foreach ($businesses as $business) {
            Business::create([
                'name' => $business
            ]);
        }
    }
}
