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
            'name' => 'admin',
            'abbreviation' => 'Admin Role'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'dgr',
            'abbreviation' => 'Demand Generation Representative'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'cre',
            'abbreviation' => 'Client Relations Executive'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'dsr',
            'abbreviation' => 'Delivery Services Manager'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'csr',
            'abbreviation' => 'Client Support Representative'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'dqs',
            'abbreviation' => 'Data Quality Specialist'
        ]);
        \App\Models\Role::factory()->create([
            'name' => 'client',
            'abbreviation' => 'Client'
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
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'call-back'
        ]);
        \App\Models\CampaignCompanyStatus::factory()->create([
            'status_name' => 'send-info'
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
