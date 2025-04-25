<?php

namespace Database\Seeders;

use App\Models\Call;
use App\Models\User;
use Illuminate\Database\Seeder;

class CallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Call::factory(500)->create(['user_id' => User::first()->id]);
    }
}
