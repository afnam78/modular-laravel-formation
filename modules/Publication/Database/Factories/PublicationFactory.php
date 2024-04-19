<?php

namespace Modules\Publication\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Publication\src\Domain\Entities\Publication;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Publication\src\Domain\Entities\Publication>
 */
class PublicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Publication::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'user_id' => User::factory()->create()->id,
        ];
    }
}
