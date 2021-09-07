<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::factory()->create([
            'name' => 'admin'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'dgr'
        ]);
        
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'active'
        ]);
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'stay-out-sales-rep-request'
        ]);
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'stay-out-already-customer'
        ]);
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'meeting-set'
        ]);
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'hot'
        ]);
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'priority'
        ]);

        \App\Models\TagCategory::factory()->create([
            'category_name' => 'contact'
        ]);
        \App\Models\TagCategory::factory()->create([
            'category_name' => 'company'
        ]);
        \App\Models\TagCategory::factory()->create([
            'category_name' => 'campaign'
        ]);
       
        \App\Models\User::factory()->create();
    }
}
