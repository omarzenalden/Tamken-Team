<?php
namespace Database\Factories;
use App\Models\User;
use App\Models\Ticketing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticketing>
 */
class ticketingFactory extends Factory
{

    protected $model = Ticketing::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {//enum('status',['pending','finished','ongoing'])
        return [
            'ticket_name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'status' => $this->faker->randomElement(['pending', 'finished', 'ongoing']),
            'dead_line' => $this->faker->date(),
            //يمكن الاستغناء عن ال inRandomOrder()->first()->id
            // والاكتفاء بال  'user_id' => User::factory();
            'user_id' => User::inRandomOrder()->first()->id,
            'assign_user_id' => User::inRandomOrder()->first()->id,
        ];
    }
}
