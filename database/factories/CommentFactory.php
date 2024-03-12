<?php

namespace Database\Factories;

use App\Models\Meow;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => fake()->sentence(10),
            'meow_id' => DB::table('meows')->inRandomOrder()->first()->id,
            'user_id' => DB::table('users')->inRandomOrder()->first()->id,
        ];
    }
}
