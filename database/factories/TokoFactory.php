<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toko>
 */
class TokoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'nama_toko' => $this->faker->company,
            'slug' => $this->faker->slug(),
            'alamat' => $this->faker->address,
            'deskripsi' => $this->faker->sentence(),
        ];
    }
}
