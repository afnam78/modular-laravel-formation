<?php

namespace Modules\Comment\Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Comment\src\Domain\Entities\Comment;
use Modules\Publication\src\Domain\Entities\Publication;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Comment\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->text,
            'user_id' => User::factory()->create()->id,
            'publication_id' => Publication::factory()->create()->id,
        ];
    }
}
