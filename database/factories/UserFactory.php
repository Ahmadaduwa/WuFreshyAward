<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(), // กำหนด username ที่ไม่ซ้ำ
            'password' => fake()->unique()->numerify('####'), // กำหนด password ที่มีความยาว 8 ตัวอักษร
            'name' => fake()->name(), // สุ่มชื่อให้ฟิลด์ name
            'seat' => fake()->unique()->randomElement(['A1/1', 'A2/2', 'B1/3', 'B2/4', 'C1/5', 'C2/7', 'D1/6', 'D2/1', 'E1/5', 'E2/5']), // กำหนดที่นั่งแบบไม่ซ้ำ
            'reserved' => fake()->boolean(), // สถานะการจอง 0 หรือ 1
            'pin' => fake()->unique()->numerify('####'), // PIN 4 หลักที่ไม่ซ้ำ
            'arrived' => fake()->boolean(), // สุ่มสถานะ arrived เป็น 0 หรือ 1 // สถานะการจอง 0 หรือ 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
