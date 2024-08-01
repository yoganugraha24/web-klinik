<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poli>
 */
class PoliFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idPoli = \App\Models\Poli::pluck('id')->toArray();
        return [
            'nama' => $this->faker->name(),
            'biaya' => $this->faker->numberBetween(10000, 100000),
            'keterangan' => $this->faker->sentence(),
        ];
    }
}
