<?php

namespace Database\Factories;

use App\Models\TagCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagCategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TagCategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_name' => 'contact',
        ];
    }
}
