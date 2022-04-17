<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\MedicalCenter;

class MedicalCenterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = MedicalCenter::class;

    public function definition()
    {
        return [
            'medical_center_name' => $this->faker->title .  rand(2,15) 
        ];
    }
}
