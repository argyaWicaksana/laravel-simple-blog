<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\post>
 */
class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = $this->faker->sentence(mt_rand(2,5));
        $slug = Str::slug($title);
        return [
            'title' => $title,
            'excerpt' => $this->faker->sentences(mt_rand(3,4),true),
            // 'body' => $this->faker->paragraphs(mt_rand(3,5),true),
            'body' => collect($this->faker->paragraphs(mt_rand(3,5)))
                        ->map(fn($p)=> "<p>$p</p>")->implode(''),
            'slug' => $slug,
            'category_id' => mt_rand(1,3),
            'user_id' => mt_rand(1,5),
        ];
    }
}
