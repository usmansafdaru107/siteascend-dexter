<?php

namespace Database\Factories;

use App\Models\CampaignCompanyStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampaignCompanyStatusFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CampaignCompanyStatus::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'status_name' => 'active'
        ];
    }
}
