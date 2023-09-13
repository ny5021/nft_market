<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class NftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $i = 1;

    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'artiste' => $this->faker->name(),
            'description' => $this->faker->sentence,
            'adresse' => $this->faker->unique()->numberBetween(10000, 15000),
            'price' => $this->faker->numberBetween(1000, 20000),
            'token_standard' => $this->faker->randomElement(['ERC-721', 'ERC-1155', 'ERC-998']),
            'image' => config('app.url'). '/images/' . 'nft-' . self::$i++ . '.jpg',
            'user_id' => 1, // admin id
            'category_id' => function () {
                return Category::all()->random()->id;
            },
        ];
    }
}
